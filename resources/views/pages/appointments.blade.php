@extends('layouts.app')

@section('content')
    <div class="container mb-4 px-0">
        <button class="btn btn-primary d-flex align-content-center gap-1">
            <box-icon class="white-on-hover" name='plus' color="white"></box-icon>
            Create new
        </button>
    </div>
    {{-- <livewire:appointment-table /> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    <div class="mt-5 row">
        <div id='full_calendar_events' class="col-md-7 bg-light p-3 rounded-2"></div>
        <div class="col-4">
            <h3>Hello</h3>
        </div>
    </div>
    {{-- Scripts --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            const SITEURL = "{{ url('/admin') }}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            const calendar = $('#full_calendar_events').fullCalendar({
                hiddenDays: [0, 6],
                editable: false,
                events: SITEURL + "/appointments",
                displayEventTime: true,
                eventRender: function(event, element, view) {
                    // if (event.allDay === 'true') {
                    //     event.allDay = true;
                    // } else {
                    //     event.allDay = false;
                    // }
                },
                selectable: true,
                selectHelper: true,
                timeFormat: 'HH:mm a',
                // select: function(event_start, event_end, allDay) {
                //     var event_name = prompt('Event Name:');
                //     if (event_name) {
                //         var event_start = $.fullCalendar.formatDate(event_start, "Y-MM-DD HH:mm:ss");
                //         var event_end = $.fullCalendar.formatDate(event_end, "Y-MM-DD HH:mm:ss");
                //         $.ajax({
                //             url: SITEURL + "/calendar-crud-ajax",
                //             data: {
                //                 event_name: event_name,
                //                 event_start: event_start,
                //                 event_end: event_end,
                //                 type: 'create'
                //             },
                //             type: "POST",
                //             success: function(data) {
                //                 displayMessage("Event created.");
                //                 calendar.fullCalendar('renderEvent', {
                //                     id: data.id,
                //                     title: event_name,
                //                     start: event_start,
                //                     end: event_end,
                //                     allDay: allDay
                //                 }, true);
                //                 calendar.fullCalendar('unselect');
                //             }
                //         });
                //     }
                // },
                // eventDrop: function(event, delta) {
                //     var event_start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                //     var event_end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
                //     $.ajax({
                //         url: SITEURL + '/calendar-crud-ajax',
                //         data: {
                //             title: event.event_name,
                //             start: event_start,
                //             end: event_end,
                //             id: event.id,
                //             type: 'edit'
                //         },
                //         type: "POST",
                //         success: function(response) {
                //             displayMessage("Event updated");
                //         }
                //     });
                // },
                eventClick: function(event) {
                    // var eventDelete = confirm("Are you sure?");
                    // if (eventDelete) {
                    //     $.ajax({
                    //         type: "POST",
                    //         url: SITEURL + '/calendar-crud-ajax',
                    //         data: {
                    //             id: event.id,
                    //             type: 'delete'
                    //         },
                    //         success: function(response) {
                    //             calendar.fullCalendar('removeEvents', event.id);
                    //             displayMessage("Event removed");
                    //         }
                    //     });
                    // }
                    alert("The event id => " + event.full_name)
                }
            });
        });

        function displayMessage(message) {
            toastr.success(message, 'Event');
        }
    </script>
@endsection
