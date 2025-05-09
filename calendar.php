<!-- admin_calendar.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require('inc/links.php'); ?>
  <title><?php echo $settings_r['site_title'] ?>-CALENDAR</title>
  <link rel="icon" href="images/about/title.png" type="image/x-icon" />
  
  <style>
    :root {
      --primary-color: #2c3e50;
      --secondary-color: #1a2e40;
      --text-dark: #2c3e50;
      --text-light: #95a5a6;
    }

    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
      background-color: #ffffff;
      overflow-x: hidden;
    }

    body {
      display: flex;
      flex-direction: column;
    }

    .container {
      flex-grow: 1;
      margin-top: 50px;
      margin-bottom: 50px;
    }

    .header-margin {
      margin-bottom: 40px;
    }

    /* Calendar Premium Styling */
    #calendar {
      margin: 20px auto 40px;
      background: white;
      padding: 25px;
      border-radius: 15px;
      box-shadow: 0 8px 30px rgba(0,0,0,0.1);
      max-width: 1200px;
      opacity: 0;
      transform: translateY(30px);
      animation: fadeInUp 0.8s forwards 0.5s;
      transition: all 0.5s ease;
    }

    #calendar:hover {
      box-shadow: 0 15px 40px rgba(0,0,0,0.15);
      transform: translateY(-5px);
    }

    .fc-header-toolbar {
      margin-bottom: 25px !important;
    }

    .fc button {
      background-color: var(--primary-color) !important;
      border-color: var(--primary-color) !important;
      color: white !important;
      padding: 10px 20px !important;
      text-transform: uppercase;
      font-weight: 500;
      letter-spacing: 0.5px;
      border-radius: 50px !important;
      transition: all 0.3s ease;
    }

    .fc button::before {
      content: none;
    }

    .fc button:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      background-color: #1a2e40 !important;
    }

    .fc-day-header {
      padding: 15px 0 !important;
      text-transform: uppercase;
      font-weight: 600 !important;
      color: var(--primary-color);
      letter-spacing: 1px;
    }

    .fc-day {
      transition: all 0.3s ease;
    }

    .fc-day:hover {
      background-color: rgba(44, 62, 80, 0.05);
      transform: scale(1.02);
    }

    .fc-event {
      border-radius: 30px !important;
      padding: 5px 10px !important;
      font-size: 0.9em !important;
      border: none !important;
      margin: 2px !important;
      transition: all 0.3s ease;
      background-color: var(--primary-color) !important;
    }

    .fc-event:hover {
      transform: translateY(-2px) scale(1.03);
      box-shadow: 0 5px 15px rgba(0,0,0,0.15);
      background-color: #1a2e40 !important;
    }

    /* Modal Premium Styling */
    .modal-content {
      border: none;
      border-radius: 15px;
      box-shadow: 0 15px 50px rgba(0,0,0,0.1);
      padding: 30px;
      transform: scale(0.9);
      opacity: 0;
      transition: all 0.4s ease;
    }

    .modal.show .modal-content {
      transform: scale(1);
      opacity: 1;
    }

    .modal-header {
      border-bottom: 2px solid #f8f9fa;
      padding: 20px 30px;
    }

    .modal-title {
      color: var(--primary-color);
      font-weight: 600;
      letter-spacing: 0.5px;
      font-size: 1.5rem;
      position: relative;
      display: inline-block;
    }

    .modal-title::after {
      content: '';
      position: absolute;
      bottom: -5px;
      left: 0;
      width: 40%;
      height: 2px;
      background: var(--primary-color);
      transition: width 0.3s ease;
    }

    .modal-title:hover::after {
      width: 100%;
    }

    .modal-body {
      padding: 30px;
    }

    .form-group label {
      color: var(--text-dark);
      font-weight: 500;
      margin-bottom: 10px;
      transition: all 0.3s ease;
    }

    .form-group:hover label {
      color: #2c3e50;
      transform: translateX(3px);
    }

    .form-control {
      border-radius: 10px;
      padding: 12px 15px;
      border: 2px solid #eee;
      transition: all 0.3s ease;
    }

    .form-control:focus {
      border-color: var(--primary-color);
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      transform: translateY(-2px);
    }

    .modal-footer {
      border-top: 2px solid #f8f9fa;
      padding: 20px 30px;
    }

    .btn-primary {
      background-color: var(--primary-color);
      border: none;
      padding: 12px 30px;
      border-radius: 50px;
      font-weight: 500;
      letter-spacing: 0.5px;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
      z-index: 1;
    }

    .btn-primary::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: #1a2e40;
      transition: all 0.4s ease;
      z-index: -1;
    }

    .btn-primary:hover::before {
      left: 0;
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .btn-danger {
      background: #e74c3c;
      border: none;
      padding: 12px 30px;
      border-radius: 50px;
      font-weight: 500;
      letter-spacing: 0.5px;
      transition: all 0.3s ease;
    }

    .btn-danger:hover {
      background: #c0392b;
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(0,0,0,0.15);
    }

    .btn-secondary {
      color: var(--text-dark);
      background: transparent;
      border: none;
      padding: 12px 30px;
      border-radius: 50px;
      font-weight: 500;
      letter-spacing: 0.5px;
      transition: all 0.3s ease;
    }

    /* Page Title Styling */
    .page-title {
      text-align: center;
      color: var(--primary-color);
      font-size: 2.5rem;
      font-weight: 600;
      margin-bottom: 2rem;
      position: relative;
      padding-bottom: 15px;
      animation: fadeInDown 1s forwards;
    }

    .page-title:after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 80px;
      height: 3px;
      background: var(--primary-color);
      transition: width 0.6s ease;
    }

    .page-title:hover:after {
      width: 120px;
    }

    /* Animation Keyframes */
    @keyframes fadeInDown {
      from {
        opacity: 0;
        transform: translateY(-30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @media (max-width: 768px) {
      .container {
        margin-top: 30px;
        margin-bottom: 30px;
      }

      #calendar {
        padding: 15px;
      }

      .modal-content {
        padding: 15px;
      }

      .modal-body {
        padding: 15px;
      }

      .fc button {
        padding: 8px 15px !important;
        font-size: 0.9rem !important;
      }
    }
  </style>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body class="calendar-page">
  
  <?php require('inc/header.php');?>

  <!-- Container for Calendar -->
  <div class="container">
    <h2 class="page-title">Minangun's Calendar</h2>
    <div class="row header-margin">
      <div class="col-lg-12">
        <div id="calendar"></div>
      </div>
    </div>
  </div>

  <br>

  <?php require('inc/footer.php'); ?>

  <script>
    $(document).ready(function() {
      display_events();
    });

    function display_events() {
      var events = [];
      $.ajax({
        url: 'display_event.php',  
        dataType: 'json',
        success: function(response) {
          if (response.status === "success") {
            var result = response.data;
            $.each(result, function(i, item) {
              events.push({
                event_id: result[i].event_id,
                title: result[i].title,
                start: result[i].start,
                end: result[i].end,
                color: result[i].color,
                url: result[i].url
              }); 
            });

            var calendar = $('#calendar').fullCalendar({
              defaultView: 'month',
              timeZone: 'local',
              editable: false,
              selectable: false,
              selectHelper: false,
              header: {
                left: 'prev',
                center: 'title',
                right: 'next'
              },
              events: events,
            });
          } else {
            alert("Error: " + response.message);
          }
        },
        error: function(xhr, status) {
          alert('Failed to load events.');
        }
      });
    }
  </script>
</body>
</html>
