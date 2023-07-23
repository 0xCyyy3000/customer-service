@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />

    <div class="row gap-4 align-items-start">
        <div id='calendar' class="bg-white col-8 p-4 rounded-3 shadow" style="width: 700px"></div>
        <div class="col-4 p-2 @if (Auth::user()->type != 0) mt-2 @endif">
            @if (Auth::user()->type == 0)
                <div class="d-flex gap-3 mb-2">
                    <div class="d-flex gap-2 align-content-center">
                        <box-icon name='circle' type='solid' color='tomato'></box-icon>
                        <p class="mb-0">Taken</p>
                    </div>
                    <div class="d-flex gap-2 align-content-center">
                        <box-icon name='circle' type='solid' color='#0d6efd'></box-icon>
                        <p class="mb-0">Your appointment</p>
                    </div>
                </div>

                <div class="row" style="margin-bottom: 1.90rem !important;">
                    <small class="text-muted fw-bold">Available slots: <br></small>
                    <span id="slots" class="small text-muted">Please select a date</span>
                </div>
            @endif

            <form class="row g-3 px-3 pb-4 bg-white rounded-3 " action="{{ route('appointment.store') }}">
                @csrf
                @method('POST')
                <h4 class="text-muted">Appointment form</h4>
                <div class="col-md-12">
                    <label for="client" class="form-label">Client</label>
                    <input type="text" class="form-control text-muted" value="{{ Auth::user()->full_name }}"
                        id="client" readonly>
                    <input type="hidden" class="form-control text-muted" value="{{ Auth::user()->id }}" name="client"
                        readonly>
                </div>
                <div class="col-md-12">
                    <label for="appointment_date" class="form-label">Date</label>
                    <input type="text" required autocomplete="off" class="form-control"
                        placeholder="Select from Calendar" id="appointment_date" name="appointment_date">
                </div>
                <div class="col-md-12">
                    <label for="appointment_time" class="form-label">Time</label>
                    <select required name="appointment_time" id="appointment_time" class="form-select">
                        <option value="08">08 AM</option>
                        <option value="09">09 AM</option>
                        <option value="10">10 AM</option>
                        <option value="11">11 AM</option>
                        <option value="13">01 PM</option>
                        <option value="14">02 PM</option>
                        <option value="15">03 PM</option>
                        <option value="16">04 PM</option>
                    </select>
                </div>

                <div class="col-md-12 mb-4">
                    <label for="purpose" class="form-label">Purpose</label>
                    <input required type="text" class="form-control" placeholder="Indicate your purpose" id="purpose"
                        name="purpose">
                </div>
                <div class="col-12">
                    <button type="submit" id="submit_appointment"
                        class="btn btn-primary w-100 rounded d-flex gap-2 justify-content-center">
                        <box-icon name='send' color="white"></box-icon>
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
    {{-- Scripts --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let sameDate = 0,
                currentDate = '';

            const APPOINTMENTS_URL = "{{ url('/admin') }}";

            var calendar = $('#calendar').fullCalendar({
                editable: false,
                hiddenDays: [0, 6],
                header: {
                    left: 'prev,next, today',
                    center: 'title',
                    right: 'prevYear,month,listWeek,nextYear'
                },
                eventColor: 'grey',
                events: APPOINTMENTS_URL + "/appointments",
                selectable: true,
                selectHelper: false,
                timeFormat: "hh:mm A",
                // eventAfterRender: function(event, element, view) {
                // const DATE = $.fullCalendar.formatDate(event.start, 'Y-MM-D');
                // if (DATE == currentDate)
                //     sameDate++;

                // currentDate = DATE;
                // view.css('background-color', 'pink');
                // if (sameDate == 8)

                // },
                select: function(start, end, allDay) {
                    $('#appointment_date').val($.fullCalendar.formatDate(start, 'Y-MM-D'));
                    $('#appointment_time').html('');

                    $.ajax({
                        url: APPOINTMENTS_URL + "/appointments",
                        type: "GET",
                        data: {
                            start: $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss'),
                            end: $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss'),
                            type: 'getSlots'
                        },
                        success: function(data) {
                            let template = ``;
                            const AVAILABLE_HOURS = Object.values(data);
                            $("#slots").text(AVAILABLE_HOURS);
                            if (AVAILABLE_HOURS.length) {
                                $('#submit_appointment').removeClass('btn-danger');
                                $('#submit_appointment').addClass('btn-primary')
                                $('#submit_appointment').attr('disabled', false);
                                $('#submit_appointment').html(
                                    "<box-icon name='send' color='white'></box-icon>" +
                                    'Submit');

                                AVAILABLE_HOURS.forEach(val => {
                                    template +=
                                        `<option value="${val}">${val}</option>`;
                                });
                                $('#appointment_time').append(template);
                            } else {
                                $('#submit_appointment').addClass('btn-danger');
                                $('#submit_appointment').removeClass('btn-primary')
                                $('#submit_appointment').attr('disabled', true);
                                $('#submit_appointment').text('No available slot')
                            }
                        }
                    })

                    // if (title) {
                    //     var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');
                    //     var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');

                    //     $.ajax({
                    //         url: "{{ url('/') }}/action",
                    //         type: "POST",
                    //         data: {
                    //             title: title,
                    //             start: start,
                    //             end: end,
                    //             type: 'add'
                    //         },
                    //         success: function(data) {
                    //             calendar.fullCalendar('refetchEvents');
                    //             alert("Event Created Successfully");
                    //         }
                    //     })
                    // }
                },
                // editable: true,
                // eventResize: function(event, delta) {
                //     var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                //     var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                //     var title = event.title;
                //     var id = event.id;
                //     $.ajax({
                //         url: "/full-calender/action",
                //         type: "POST",
                //         data: {
                //             title: title,
                //             start: start,
                //             end: end,
                //             id: id,
                //             type: 'update'
                //         },
                //         success: function(response) {
                //             calendar.fullCalendar('refetchEvents');
                //             alert("Event Updated Successfully");
                //         }
                //     })
                // },
                // eventDrop: function(event, delta) {
                //     var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                //     var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                //     var title = event.title;
                //     var id = event.id;
                //     $.ajax({
                //         url: "/full-calender/action",
                //         type: "POST",
                //         data: {
                //             title: title,
                //             start: start,
                //             end: end,
                //             id: id,
                //             type: 'update'
                //         },
                //         success: function(response) {
                //             calendar.fullCalendar('refetchEvents');
                //             alert("Event Updated Successfully");
                //         }
                //     })
                // },

                eventClick: function(event) {
                    // if (confirm("Are you sure you want to remove it?")) {
                    //     var id = event.id;
                    //     $.ajax({
                    //         url: "/full-calender/action",
                    //         type: "POST",
                    //         data: {
                    //             id: id,
                    //             type: "delete"
                    //         },
                    //         success: function(response) {
                    //             calendar.fullCalendar('refetchEvents');
                    //             alert("Event Deleted Successfully");
                    //         }
                    //     })
                    // }
                    console.log(event);
                }
            });

        });
    </script>
@endsection
