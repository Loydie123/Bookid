<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Calendar</title>
    <link rel="icon" href="../images/about/title.png" type="image/x-icon" />
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <style>
        :root {
            --resort-primary: #8B4513;
            --resort-secondary: #DEB887;
            --resort-accent: #F4A460;
            --resort-light: #FFEFD5;
            --resort-dark: #5C2E0B;
        }

        h3 {
            color: var(--resort-dark);
            font-weight: 700;
            position: relative;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }

        h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 3px;
            background: var(--resort-accent);
            border-radius: 2px;
        }

        /* Calendar Customization */
        #calendar {
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.05);
        }

        .fc-toolbar {
            margin-bottom: 20px !important;
        }

        .fc-toolbar h2 {
            font-size: 1.5rem !important;
            color: var(--resort-dark) !important;
            font-weight: 600 !important;
        }

        .fc-button {
            background: linear-gradient(135deg, var(--resort-primary), var(--resort-dark)) !important;
            border: none !important;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1) !important;
            transition: all 0.3s ease !important;
        }

        .fc-button:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15) !important;
        }

        .fc-day-header {
            background: linear-gradient(135deg, var(--resort-primary), var(--resort-dark)) !important;
            color: white !important;
            padding: 12px 0 !important;
            font-weight: 500 !important;
        }

        .fc-day {
            transition: all 0.3s ease !important;
        }

        .fc-day:hover {
            background-color: var(--resort-light) !important;
        }

        .fc-event {
            border: none !important;
            border-radius: 4px !important;
            padding: 3px 5px !important;
            font-size: 13px !important;
            transition: all 0.3s ease !important;
        }

        .fc-event:hover {
            transform: translateY(-1px) !important;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1) !important;
        }

        /* Modal Styling */
        .modal-content {
            border-radius: 15px;
            border: none;
            box-shadow: 0 0 30px rgba(0,0,0,0.1);
        }

        .modal-header {
            background: linear-gradient(135deg, var(--resort-primary), var(--resort-dark));
            color: white;
            padding: 20px 25px;
            border: none;
        }

        .modal-title {
            color: white;
            font-weight: 600;
            font-size: 1.2rem;
        }

        .modal-body {
            padding: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            color: var(--resort-dark);
            font-weight: 600 !important;
            margin-bottom: 8px;
        }

        .form-control {
            border: 2px solid #e1e1e1;
            border-radius: 8px;
            padding: 12px 15px;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: var(--resort-accent);
            box-shadow: 0 0 15px rgba(244, 164, 96, 0.1);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--resort-primary), var(--resort-dark));
            border: none;
            padding: 8px 20px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
        }

        .btn-danger {
            background: #e74c3c;
            border: none;
            padding: 8px 20px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-danger:hover {
            background: #c0392b;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
        }

        .btn-secondary {
            color: var(--resort-dark);
            background: transparent;
            border: none;
            padding: 8px 20px;
            font-size: 14px;
            font-weight: 500;
        }

        .close {
            color: white;
            opacity: 1;
            text-shadow: none;
            transition: all 0.3s;
        }

        .close:hover {
            color: var(--resort-light);
            opacity: 1;
        }

        @media (max-width: 768px) {
            #calendar {
                padding: 10px;
            }

            .fc-toolbar h2 {
                font-size: 1.2rem !important;
            }
        }
    </style>
</head>
<body class="bg-light">
    <?php require('inc/header.php'); ?>
    
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3>Calendar</h3>
                <div id="calendar"></div>
            </div>
        </div>
    </div>

    <!-- Modal for Update/Delete -->
    <div id="eventModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Event Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="eventForm">
                        <div class="form-group">
                            <label class="form-label" for="eventTitle">Event Title</label>
                            <input type="text" class="form-control" id="eventTitle" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="eventStart">Start Date</label>
                            <input type="date" class="form-control" id="eventStart" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="eventEnd">End Date</label>
                            <input type="date" class="form-control" id="eventEnd" required>
                        </div>
                        <input type="hidden" id="eventId">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="deleteEventBtn">Delete</button>
                    <button type="button" class="btn btn-primary" id="updateEventBtn">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        var calendar; // Global calendar variable

        $(document).ready(function() {
            initializeCalendar();
        });

        function initializeCalendar() {
            // Clear any existing calendar
            if (calendar) {
                calendar.fullCalendar('destroy');
            }
            $('#calendar').empty();
            
            // Fetch events and initialize calendar
            $.ajax({
                url: '../display_event.php',  
                dataType: 'json',
                success: function(response) {
                    var events = [];
                    if (response.status === "success") {
                        var result = response.data;
                        $.each(result, function(i, item) {
                            events.push({
                                event_id: result[i].event_id,
                                title: result[i].title,
                                start: result[i].start,
                                end: result[i].end,
                                color: result[i].color
                            });
                        });

                        calendar = $('#calendar').fullCalendar({
                            defaultView: 'month',
                            timeZone: 'local',
                            editable: true,
                            selectable: true,
                            selectHelper: true,
                            header: {
                                left: 'prev',
                                center: 'title',
                                right: 'next'
                            },
                            events: events,
                            select: function(start, end) {
                                var eventName = prompt('Enter Event Title:');
                                if (eventName) {
                                    save_event(eventName, start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));
                                }
                                $('#calendar').fullCalendar('unselect');
                            },
                            eventClick: function(event) {
                                $('#eventTitle').val(event.title);
                                $('#eventStart').val(event.start.format('YYYY-MM-DD'));
                                $('#eventEnd').val(event.end.format('YYYY-MM-DD'));
                                $('#eventId').val(event.event_id);
                                $('#eventModal').modal('show');
                            }
                        });
                    } else {
                        alert("Error: " + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    alert("Failed to load events: " + error);
                }
            });
        }

        // Save new event
        function save_event(event_name, start_date, end_date) {
            $.ajax({
                url: "../save_event.php",
                type: "POST",
                data: {event_name: event_name, event_start_date: start_date, event_end_date: end_date},
                success: function(response) {
                    if (response.status === "success") {
                        alert('Event Saved!');
                        initializeCalendar(); // Completely reinitialize calendar
                    } else {
                        alert('Failed to save event: ' + response.message);
                    }
                }
            });    
        }

        // Update existing event
        $('#updateEventBtn').click(function() {
            var eventId = $('#eventId').val();
            var title = $('#eventTitle').val();
            var start_date = $('#eventStart').val();
            var end_date = $('#eventEnd').val();

            if (title && start_date && end_date) {
                $.ajax({
                    url: "../update_event.php",
                    type: "POST",
                    data: { event_id: eventId, event_title: title, event_start_date: start_date, event_end_date: end_date },
                    success: function(response) {
                        $('#eventModal').modal('hide');
                        
                        setTimeout(function() {
                            if (response.status === "success") {
                                alert('Event Updated!');
                                initializeCalendar(); // Completely reinitialize calendar
                            } else {
                                alert('Failed to update event: ' + response.message);
                            }
                        }, 500);
                    }
                });
            } else {
                alert('Please fill in all fields.');
            }
        });

        // Delete event
        $('#deleteEventBtn').click(function() {
            var eventId = $('#eventId').val();
            
            $.ajax({
                url: '../delete_event.php',
                type: 'POST',
                data: {event_id: eventId},
                success: function(response) {
                    $('#eventModal').modal('hide');
                    
                    setTimeout(function() {
                        if (response.status === "success") {
                            alert('Event Deleted Successfully');
                            initializeCalendar(); // Completely reinitialize calendar
                        } else {
                            alert('Failed to delete event: ' + response.message);
                        }
                    }, 500);
                },
                error: function() {
                    $('#eventModal').modal('hide');
                    setTimeout(function() {
                        alert('A server error occurred. Please try again.');
                    }, 500);
                }
            });
        });
    </script>
</body>
</html>
