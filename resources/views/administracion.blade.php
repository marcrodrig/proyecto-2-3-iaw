@extends('layouts.sleek')

@section('head')
     <!-- GOOGLE FONTS -->
     <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />
    
    <link href='https://unpkg.com/@fullcalendar/core@4.4.2/main.min.css' rel='stylesheet' />
    <link href='https://unpkg.com/@fullcalendar/daygrid@4.4.2/main.min.css' rel='stylesheet' />
    <link href='https://unpkg.com/@fullcalendar/timegrid@4.4.2/main.min.css' rel='stylesheet' />
    <link href="https://unpkg.com/@fullcalendar/bootstrap@4.4.2/main.min.css" rel="stylesheet">

    <link href='https://use.fontawesome.com/releases/v5.0.6/css/all.css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet' />

    <link href="{{ asset('css/daterangepicker.css') }}" rel="stylesheet" />
@endsection

@section('content')
        <div class="breadcrumb-wrapper d-flex justify-content-between align-items-center">
            <div>
                <h1>Calendar</h1>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb p-0">
                        <li class="breadcrumb-item">
                            <a href="index.html">
                                <span class="mdi mdi-home"></span>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            app
                        </li>
                        <li class="breadcrumb-item" aria-current="page">calendar</li>
                    </ol>
                </nav>

            </div>

            <div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-event">
                    <i class="mdi mdi-plus mr-1"></i> Add New Event
                </button>
            </div>
        </div>

        <div class="card card-default">
            <div class="card-body p-0">
                <div class="full-calendar">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>

        <!-- Add Event Button  -->
        <div class="modal fade" id="modal-add-event" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <form>
                        <div class="modal-header px-4">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Add New Event</h5>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body px-4">

                            <div class="form-group">
                                <label for="firstName">Title</label>
                                <input type="text" class="form-control" value="Meeting">
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="firstName">Date</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="mdi mdi-calendar-range"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control date-range" name="dateRange" value=""
                                                placeholder="Date" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect3">Time</label>
                                        <select class="form-control" id="exampleFormControlSelect3">
                                            <option>10:00am</option>
                                            <option>10:30am</option>
                                            <option>11am</option>
                                            <option>11:30am</option>
                                            <option>12:00pm</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <label for="firstName">Description</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                            </div>
                        </div>

                        <div class="modal-footer border-top-0 px-4 pt-0">
                            <button type="button" class="btn btn-primary btn-pill m-0">Creat Event</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

@section('scripts')
    <script src='https://unpkg.com/@fullcalendar/core@4.4.2/main.min.js'></script>
    <script src='https://unpkg.com/@fullcalendar/daygrid@4.4.2/main.min.js'></script>
    <script src='https://unpkg.com/@fullcalendar/timegrid@4.4.2/main.min.js'></script>
    <script src="https://unpkg.com/@fullcalendar/bootstrap@4.4.2/main.min.js"></script>
    <script src='js/app.calendar.js'></script>

    <script src="js/moment.min.js"></script>
    <script src="js/daterangepicker.js"></script>
    <script>
    jQuery(document).ready(function() {
        jQuery('input[name="dateRange"]').daterangepicker({
            autoUpdateInput: false,
            singleDatePicker: true,
            locale: {
                cancelLabel: 'Clear'
            }
        });
        jQuery('input[name="dateRange"]').on('apply.daterangepicker', function(ev, picker) {
            jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
        });
        jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function(ev, picker) {
            jQuery(this).val('');
        });
    });
    </script>
@endsection