<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Rathod Optical Management System') }}</title>
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet" crossorigin="anonymous">
    <link href="{{ asset('css/datepicker3.css')}}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-table.css')}}" rel="stylesheet">
    <link href="{{ asset('css/styles.css')}}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome/css/all.css')}}" rel="stylesheet">
    <link href="{{ asset('css/datatable.css')}}" rel="stylesheet">
    <link href="{{ asset('css/buttons.dataTables.css')}}" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/timepicker.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/numpad.css')}}" rel="stylesheet">
    <link rel="favicon" sizes="32x32" href="/favicon-32x32.png">
    <link rel="favicon" sizes="16x16" href="/favicon-16x16.png">
    <link rel="icon" type="image/png" href="/favicon.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>
<script>
    window.Laravel = {
        !!json_encode([
            'csrfToken' => csrf_token(),
        ]) !!
    };
</script>
<script src="{{asset('js/lumino.glyphs.js')}}"></script>
<script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('js/easypiechart.js')}}"></script>
<script src="{{asset('js/easypiechart-data.js')}}"></script>
<script src="{{asset('js/bootstrap-table.js')}}"></script>
<script src="{{asset('js/nepali.datepicker.min.js')}}"></script>
<script src="{{asset('js/datatable.js')}}"></script>
<script src="{{asset('js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('js/buttonPrint.js')}}"></script>
<script src="{{asset('js/select2.min.js')}}"></script>
<script src="{{asset('js/timepicker.min.js')}}"></script>
<script src="{{asset('js/numpad.js')}}"></script>

<script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({
        order: [[0, 'desc']]
        });
        $('.example').DataTable({
        order: [[0, 'desc']]
        });
        $('.datepicker').datepicker();
        $('.datepicker1').datepicker({

            format: "mm/dd/yyyy",
            todayHighlight: true,
            autoclose: true,
        });
        $('.datepicker').change(function() {
            $(".datepicker").datepicker('hide');
        });
        $('.datepicker1').change(function() {
            $(".datepicker1").datepicker('hide')
        });
    });
</script>
<script>
    $(document).ready(function() {

        $('input.timepicker').timepicker({
            dropdown: true,
            scrollbar: true
        });

        $('#nepaliDateD').nepaliDatePicker({
            disableBefore: '12/08/2073',
            disableAfter: '12/20/2073'
        });
        $('#nepaliDateD1').nepaliDatePicker({
            disableDaysBefore: '10',
            disableDaysAfter: '10'
        });

        $('#nepaliDate5').nepaliDatePicker({
            npdMonth: true,
            npdYear: true,


        });
        $('#nepaliDate').nepaliDatePicker({
            onFocus: false,
            npdMonth: true,
            npdYear: true,
            ndpEnglishInput: 'englishDate',
            ndpTriggerButtonText: 'Date',
            ndpTriggerButtonClass: 'btn btn-primary btn-sm'
        });
        $('#nepaliDate1').nepaliDatePicker({
            onChange: function() {
                alert($('#nepaliDate1').val());
            }
        });
        $('#nepaliDate2').nepaliDatePicker();
        $('#nepaliDate3').nepaliDatePicker({
            onFocus: false,
            npdMonth: true,
            npdYear: true,
            ndpTriggerButton: true,
            ndpTriggerButtonText: 'Date',
            ndpTriggerButtonClass: 'btn btn-primary btn-sm'
        });

        $('#englishDate').change(function() {
            $('#nepaliDate').val(AD2BS($('#englishDate').val()));
        });

        $('#englishDate9').change(function() {
            $('#nepaliDate9').val(AD2BS($('#englishDate9').val()));
        });

        $('#nepaliDate9').change(function() {
            $('#englishDate9').val(BS2AD($('#nepaliDate9').val()));
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".select2").select2();

    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".select").select2();
    });
</script>
@yield('script')
<style type="text/css">
    li {
        margin-right: 10px;
    }
</style>

<body>
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container-fluid">

            <!-- Brand and toggle -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('dashboard.index') }}">
                    <i class="glyphicon glyphicon-eye-open"></i>
                    <strong>Rathod Optical System</strong>
                </a>
            </div>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="main-navbar">
                <ul class="nav navbar-nav">

                    <li class="{{ request()->is('/') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.index') }}">
                            <i class="glyphicon glyphicon-dashboard"></i> Dashboard
                        </a>
                    </li>

                    @permission('department.index')
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-cog"></i> Admin <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('service.index') }}">Services</a></li>
                            <li><a href="{{ route('employee.index') }}">Employees</a></li>
                            <li><a href="{{ route('doctor.index') }}">Doctor OPD</a></li>
                            <li><a href="{{ route('invoice.report') }}">Invoice Report</a></li>
                        </ul>
                    </li>
                    @endpermission

                    @permission('patient.index')
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-user"></i> Patient <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('patient.index') }}">Patient</a></li>
                            <li><a href="{{ route('appointment.index') }}">Appointment</a></li>
                        </ul>
                    </li>
                    @endpermission

                    @permission('invoice.report')
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-list-alt"></i> Report <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('account.opd') }}">OPD Sale Report</a></li>
                            <li><a href="{{ route('account.service') }}">Service Sale Report</a></li>
                        </ul>
                    </li>
                    @endpermission

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-usd"></i> Invoice/Bill <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('opd.index') }}">OPD Bill</a></li>
                            <li><a href="{{ route('invoice.index') }}">Service Bill</a></li>
                            @permission('search.invoice')
                            <li><a href="{{ route('search.invoice') }}">Invoice Report</a></li>
                            @endpermission
                        </ul>
                    </li>

                    @permission('hospital.setting')
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-wrench"></i> Setting <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            @permission('user.index')
                            <li><a href="{{ route('user.index') }}">Users</a></li>
                            @endpermission
                            @permission('role.index')
                            <li><a href="{{ route('role.index') }}">Roles</a></li>
                            @endpermission
                            <li><a href="{{ route('hospital.setting') }}">Settings</a></li>
                        </ul>
                    </li>
                    @endpermission

                </ul>

                <!-- Right side -->
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle text-capitalize" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-user"></i> {{ Auth::user()->name }} <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#" id="password_change">Change Password</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
    @if (count($errors))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        @foreach($errors->all() as $error)
        <strong>{{ $error }}</strong>
        @endforeach
    </div>
    @endif
    @include('change')
    @yield('content')
</body>

</html>