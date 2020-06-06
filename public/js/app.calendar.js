/* ====== Index ======

1. CALENDAR JS

====== End ======*/

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var year = new Date().getFullYear()
    var month = new Date().getMonth() + 1
    function n(n){
      return n > 9 ? "" + n: "0" + n;
    }
    var month = n(month)

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'dayGrid', 'timeGrid', 'bootstrap' ],
      defaultView: 'dayGridMonth',
      locale: "es",
      themeSystem: 'bootstrap',
      header: {
        left: 'prev,next today',
        center: 'title',            
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    buttonText: {
      month: "Mes",
      today: "Hoy",
      week: "Semana",
      day: "Día"
    },
    /*custom properties of GridView*/
    nowIndicator: "true", //indicator of current time
    minTime: "12:00:00", //start time
    maxTime: "23:59:00", //end time
    slotLabelFormat: {
      hour: "numeric",
      minute: "2-digit",
      omitZeroMinute: false,
      meridiem: ""
    }, //side time labels
    contentHeight: "auto", //resizes table to fit any screen
    navLinks: "true", //links any date to day view
    weekends: true,
    eventLimit: true,
    slotEventOverlap: true,
    views: {
      timeGrid: {
        eventLimit: 5
      }
    },
      eventRender: function(info) {
        var ntoday = moment().format('DDMMYYYY');
        var eventStart = moment( info.event.start ).format('DDMMYYYY');
        info.el.setAttribute("title", info.event.extendedProps.description);
        info.el.setAttribute("data-toggle", "tooltip");
        if (eventStart < ntoday){
          info.el.classList.add("fc-past-event");
        } else if (eventStart == ntoday){
          info.el.classList.add("fc-current-event");
        } else {
          info.el.classList.add("fc-future-event");
        }
      },

      events: [
        {
          title: 'Lunch',
          description: 'description for Lunch',
          start: year+'-'+month+'-26T12:00:00',
          end: year+'-'+month+'-26T12:00:00'
        },
        {
          title: 'Meeting',
          description: 'description for Meeting',
          start: year+'-'+month+'-26T14:30:00',
          end: year+'-'+month+'-26T14:30:00'
        },
        {
          title: 'Click for Google',
          description: 'description for Click for Google',
          url: 'http://google.com/',
          start: year+'-'+month+'-28',
          end: year+'-'+month+'-28'
        },
        {
          title: 'Lunch',
          description: 'description for Lunch',
          start: year+'-'+month+'-30T12:00:00',
          end: year+'-'+month+'-31T12:00:00'
        },
        {
          title: 'Meeting',
          description: 'description for Meeting',
          start: year+'-'+month+'-31T14:30:00',
          end: year+'-'+month+'-31T14:30:00'
        }
      ]
    });

    calendar.render();

  });