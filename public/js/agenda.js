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
        eventDidMount: function(info) {
            info.el.style.backgroundColor = "cornflowerblue";
            info.el.style.color = "white"; // Change text color for contrast
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

        eventContent: function(info) {
            return {
                html: `<b>${info.event.extendedProps.type}</b>: ${info.event.title}`,
            };
        }
    });

    calendar.render();

    // Reset modal fields
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

        // Fix: Ensure the PIC (title) input shows the correct data
        // let picTitle = event.extendedProps.title ? event.extendedProps.title : event.title;
        $("#title").val(event.title);

        $("#eventType").val(event.extendedProps.type || event.type);
        $("#description").val(event.extendedProps.description || "");
    }


    // Save or Update Event
    $("#agendaForm").submit(function(e) {
        e.preventDefault();

        let eventId = $("#eventId").val();
        let eventTitle = $("#title").val().trim();
        let eventStartRaw = $("#eventDate").val(); // Get raw date

        // ✅ Fix: Ensure the date format is correct for MySQL
        let eventStart = eventStartRaw.split("T")[0]; // Extract YYYY-MM-DD

        let eventData = {
            id: eventId,
            title: eventTitle,
            start: eventStart, // Correct format
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
                        existingEvent.setProp("title", eventData.title);
                        existingEvent.setDates(eventData.start);
                        existingEvent.setExtendedProp("description", eventData
                            .description);
                        existingEvent.setExtendedProp("type", eventData.type);
                    }
                } else {
                    calendar.addEvent(response);
                }
                $("#calendarModal").modal("hide");
            },
            error: function(xhr) {
                console.error("Error saving event:", xhr.responseText);
            },
        });
    });


    // Delete Event
    $("#deleteEvent").click(function() {
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