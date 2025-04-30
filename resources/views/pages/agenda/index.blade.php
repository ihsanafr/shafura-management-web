@extends('layouts.app')

@push('head')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('main')
    <div class="container">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white p-4 text-center">
                <h2>Agenda</h2>
            </div>
            <div class="card-body">
                <!-- Dropdown Pilih Bulan -->
                <div class="form-group ml-3">
                    <label for="monthSelector" class="form-label fw-bold">Months:</label>
                    <div class="input-group">
                        <span class="input-group-text bg-primary text-white">
                            <i class="fas fa-calendar-alt"></i>
                        </span>
                        <select id="monthSelector" class="form-select">
                            <option value="0">Januari</option>
                            <option value="1">Februari</option>
                            <option value="2">Maret</option>
                            <option value="3">April</option>
                            <option value="4">Mei</option>
                            <option value="5">Juni</option>
                            <option value="6">Juli</option>
                            <option value="7">Agustus</option>
                            <option value="8">September</option>
                            <option value="9">Oktober</option>
                            <option value="10">November</option>
                            <option value="11">Desember</option>
                        </select>
                    </div>
                </div>

                <div id="calendar"></div> <!-- Calendar Display -->
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="calendarModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Calendar Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="agendaForm">
                        <input type="hidden" id="eventId">
                        <input type="hidden" id="eventDate">
                        <input type="hidden" id="background" value="">
                        <div class="form-group">
                            <label>PIC</label>
                            <input type="text" class="form-control" id="title" placeholder="Assign to">
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <select class="form-control" id="eventType">
                                <option value="PICKET">PICKET</option>
                                <option value="PM">PM &#40;Preventive Maintenance&#41;</option>
                                <option value="KT">KT &#40;Knowledge Transfer&#41;</option>
                                <option value="MEETING">MEETING</option>
                                <option value="PROJECT">PROJECT</option>
                                <option value="CUTI">CUTI/GANTI HARI</option>
                                <option value="TRAINING">TRAINING</option>
                                <option value="UPGRADE">UPGRADE/UPDATE</option>
                                <option value="KDR">KDR &#40;Kerja Dari Rumah&#41;</option>
                                <option value="INSTALL">INSTALL/UNINSTALL</option>
                                <option value="SAKIT">SAKIT</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" id="description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" id="deleteEvent" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Setting all agenda here -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            //Set up CSRF token for AJAX requests
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });


            var calendarEl = document.getElementById("calendar");
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: "dayGridMonth",
                selectable: true,
                editable: true,
                eventStartEditable: false, // Prevent events from being dragged to another day
                eventDurationEditable: false, // Prevents resizing events
                locale: "id",
                events: @json($events),

                //Set color for events
                eventDidMount: function(info) {
                    const type = info.event.extendedProps.type;
                    let color = getColorByType(type);
                    info.el.style.backgroundColor = color;
                    info.el.style.color = "white";
                    info.el.style.border = color;
                },

                // Click date to add event
                dateClick: function(info) {
                    resetModal();
                    $("#eventDate").val(info.dateStr);
                    $("#calendarModal").modal("show");
                },

                // Click event to edit
                eventClick: function(info) {
                    fillModal(info.event);
                    $("#calendarModal").modal("show");
                },

                //Content event
                eventContent: function(info) {
                    return {
                        html: `<b>${info.event.extendedProps.type}</b>: ${info.event.title}`,
                    };
                }
            });

            calendar.render();

            //getting color by type
            function getColorByType(type) {
                const colors = {
                    PICKET: "#3498db",
                    PM: "#1abc9c",
                    KT: "#e67e22",
                    MEETING: "#9b59b6",
                    PROJECT: "#f1c40f",
                    CUTI: "#e74c3c",
                    TRAINING: "#34495e",
                    UPGRADE: "#2ecc71",
                    KDR: "#95a5a6",
                    INSTALL: "#16a085",
                    SAKIT: "#c0392b",
                };
                return colors[type] || "cornflowerblue";
            }

            //reset all the content inside modal form
            function resetModal() {
                $("#eventId").val("");
                $("#eventDate").val("");
                $("#title").val("");
                $("#eventType").val("PICKET");
                $("#description").val("");
            }

            // Fill modal with event data
            function fillModal(event) {
                $("#eventId").val(event.id);
                $("#eventDate").val(event.startStr);
                $("#title").val(event.title);
                $("#eventType").val(event.extendedProps.type || event.type);
                $("#description").val(event.extendedProps.description || "");
            }


            // Save or Update Event
            $("#agendaForm").on("submit", function(e) {
                e.preventDefault();

                let eventId = $("#eventId").val();
                let eventTitle = $("#title").val().trim();
                let eventStart = $("#eventDate").val();

                let eventData = {
                    id: eventId,
                    title: eventTitle,
                    start: eventStart,
                    type: $("#eventType").val(),
                    description: $("#description").val(),
                };

                let url = eventId ? "/agenda/update" : "/agenda/store";

                $.ajax({
                    url: url,
                    method: "POST",
                    data: eventData,
                    success: function(response) {
                        if (eventId) {
                            let existingEvent = calendar.getEventById(eventId);
                            if (existingEvent) {
                                existingEvent.remove();
                            }
                        }

                        calendar.addEvent({
                            id: response.id || eventId,
                            title: eventData.title,
                            start: eventData.start,
                            extendedProps: {
                                type: eventData.type,
                                description: eventData.description,
                            }
                        });

                        $("#calendarModal").modal("hide");
                    },
                    error: function(xhr) {
                        console.error("Error saving event:", xhr.responseText);
                    },
                });
            });


            // Delete Event
            $("#deleteEvent").on("click", function() {
                let eventId = $("#eventId").val();
                if (!eventId) return;

                $.ajax({
                    url: "/agenda/delete",
                    method: "POST",
                    data: {
                        id: eventId
                    },
                    success: function() {
                        let existingEvent = calendar.getEventById(eventId);
                        if (existingEvent) existingEvent.remove();
                        $("#calendarModal").modal("hide");
                    },
                    error: function(xhr) {
                        console.error("Error deleting event:", xhr.responseText);
                    }
                });
            });

            // Change calendar month
            document.getElementById("monthSelector").addEventListener("change", function() {
                let selectedMonth = parseInt(this.value);
                let today = new Date();
                today.setMonth(selectedMonth);
                calendar.gotoDate(today);
            });

        });
    </script>
@endsection
