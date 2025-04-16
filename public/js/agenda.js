document.addEventListener("DOMContentLoaded", function() {

    // Set up CSRF token for AJAX requests
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
        events: "/events",

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
        let eventStartRaw = $("#eventDate").val();
        let eventStart = eventStartRaw.split("T")[0];

        let eventData = {
            id: eventId,
            title: eventTitle,
            start: eventStart,
            type: $("#eventType").val(),
            description: $("#description").val(),
        };

        let url = eventId ? "/events/update" : "/events/store";

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
    $("#deleteEvent").on("click" ,function() {
        let eventId = $("#eventId").val();
        if (!eventId) return;

        $.ajax({
            url: "/events/delete",
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
