@extends('layouts.app')
@section('content')
@include('labs.partials.add')
<div class="col-md-12 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Icons</li>
            <li>Labs</li>
        </ol>
    </div><br>
    <!--/.row-->
    <!-- Modal -->
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Labs Table<a class="btn btn-success pull-right" data-toggle="modal"
                        href="#addLab"><span class="glyphicon glyphicon-plus"></span>Add Labs</a></div>
                <div class="panel-body">
                    <table id="example" class="table table-bordered table-condensed" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Bill</th>
                                <th>Customer</th>
                                <th>Frame</th>
                                <th>Fitter</th>
                                <th>Receive</th>
                                <th>Delivery</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($labs as $lab)
                            <tr>
                                <td>{{ $lab->bill }}</td>
                                <td>{{ $lab->cust_name }}</td>
                                <td>{{ $lab->frame_type }}</td>
                                <td>{{ $lab->fitter }}</td>
                                <td>{{ $lab->receive_date }}</td>
                                <td>{{ $lab->delivery_date }}</td>
                                <td>{{ $lab->time }}</td>
                                <td>
                                    {{-- <a href="{{ route('labs.edit', $lab->id) }}">Edit</a> --}}
                                    {{-- <a class="btn btn-sm btn-primary glyphicon glyphicon-eye-open"
                                        href="{{ route('labs.edit',$lab->id) }}"></a> --}}
                                    &nbsp;&nbsp;
                                    {{-- <form method="POST" action="{{ route('labs.destroy', $lab->id) }}">
                                        @csrf @method('DELETE')
                                        <button onclick="return confirm('Delete?')"><i
                                                class="glyphicon glyphicon-edit"></i></button>
                                    </form> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->
</div>
<!--/.main-->


@endsection