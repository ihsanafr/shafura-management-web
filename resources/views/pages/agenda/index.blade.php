@extends('layouts.app')

@section('main')
<div class="container">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white p-4 text-center">
            <h2>Calendar Events</h2>
        </div>
        <div class="card-body">
            <!-- Dropdown Pilih Bulan -->
            <div class="form-group ml-3">
                <label for="monthSelector" class="form-label fw-bold">Pilih Bulan:</label>
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

            <div id="calendar"></div> <!-- Tampilan Calendar -->
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="calendarModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
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
                    <div class="form-group">
                        <label>PIC</label>
                        <input type="text" class="form-control" id="pic" placeholder="Assign to">
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <select class="form-control" id="eventType">
                            <option value="PICKET">PICKET</option>
                            <option value="PM">PM</option>
                            <option value="KT">KT</option>
                            <option value="MEETING">MEETING</option>
                            <option value="PROJECT">PROJECT</option>
                            <option value="CUTI">CUTI/GANTI HARI</option>
                            <option value="TRAINING">TRAINING</option>
                            <option value="UPGRADE">UPGRADE/UPDATE</option>
                            <option value="KDR">KDR</option>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            selectable: true,
            editable: true,
            locale: 'id',
            events: [],

            // Klik tanggal untuk menambah agenda
            dateClick: function (info) {
                $('#calendarModal').modal('show');
                $('#eventId').val('');
                $('#eventDate').val(info.dateStr);
                $('#pic').val('');
                $('#eventType').val('PICKET');
                $('#description').val('');
            },

            // Klik event untuk edit
            eventClick: function (info) {
                $('#calendarModal').modal('show');
                $('#eventId').val(info.event.id);
                $('#eventDate').val(info.event.startStr);
                $('#pic').val(info.event.extendedProps.pic || '');
                $('#eventType').val(info.event.extendedProps.type || 'PICKET');
                $('#description').val(info.event.extendedProps.description || '');
            }
        });

        calendar.render();

        $('#agendaForm').submit(function (e) {
            e.preventDefault();
            let eventId = $('#eventId').val();
            let eventData = {
                id: eventId || new Date().getTime().toString(),
                title: $('#eventType').val() + ': ' + $('#pic').val(),
                start: $('#eventDate').val(),
                extendedProps: {
                    pic: $('#pic').val(),
                    type: $('#eventType').val(),
                    description: $('#description').val()
                }
            };
            if (eventId) {
                let existingEvent = calendar.getEventById(eventId);
                existingEvent.remove();
            }
            calendar.addEvent(eventData);
            $('#calendarModal').modal('hide');
        });

        $('#deleteEvent').click(function () {
            let eventId = $('#eventId').val();
            if (eventId) {
                let existingEvent = calendar.getEventById(eventId);
                if (existingEvent) {
                    existingEvent.remove();
                }
            }
            $('#calendarModal').modal('hide');
        });


        // Fitur pilih bulan langsung
        document.getElementById('monthSelector').addEventListener('change', function() {
            let selectedMonth = parseInt(this.value);
            let today = new Date();
            today.setMonth(selectedMonth);
            calendar.gotoDate(today);
        });
    });

</script>
@endsection
