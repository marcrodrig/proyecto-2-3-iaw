/* ====== Index ======

1. CALENDAR JS

====== End ======*/

document.addEventListener('DOMContentLoaded', function () {
	var calendarEl = document.getElementById('calendar');
	var SITEURL = "{{url('/')}}";
	var calendar = new FullCalendar.Calendar(calendarEl, {
		plugins: ['dayGrid', 'timeGrid', 'bootstrap', 'list'],
		defaultView: 'dayGridMonth',
		locale: "es",
		themeSystem: 'bootstrap',
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'dayGridMonth,timeGridWeek,timeGridDay listMonth'
		},
		views: {
			list: {
				noEventsMessage: "No hay turnos para mostrar."
			},
			timeGrid: {
				minTime: "12:00:00", //start time
				maxTime: "23:59:00", //end time
			},
			dayGrid: {
				slotLabelFormat: {
				meridiem: "short"
				}
			}
		},
		buttonText: {
			month: "Mes",
			today: "Hoy",
			week: "Semana",
			day: "Día",
			list: "Lista mensual"
		},
		allDaySlot: false,
		nowIndicator: "true", //indicator of current time
		omitZeroMinute: false,
		slotLabelFormat: {
			hour: "2-digit",
			minute: "2-digit",
			omitZeroMinute: false,
			meridiem: "short"
		}, //side time labels
		contentHeight: "auto", //resizes table to fit any screen
		navLinks: "true", //links any date to day view
		weekends: true,
		eventLimit: true,

		events: '/getEvents', // ver si url
		// SEGUIR CON UN EVENTCLICK PARA MOSTRAR UN MODAL PARA ELIMINAR Y BORRAR

		eventRender: function (info) {
			var ntoday = moment().format('YYYYMMDD');
			var eventStart = moment(info.event.start).format('YYYYMMDD');
			info.el.setAttribute("title", info.event.extendedProps.description);
			info.el.setAttribute("data-toggle", "tooltip");
			if (eventStart < ntoday) {
				info.el.classList.add("fc-past-event");
			} else if (eventStart == ntoday) {
				info.el.classList.add("fc-current-event");
			} else {
				info.el.classList.add("fc-future-event");
			}
		},
	});

	calendar.render();

});