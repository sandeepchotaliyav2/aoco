@extends('layouts.app') @section('content')
<!--<link href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">-->


<section class="content-header">
    <h1>
        Create Request
    </h1>

</section>
<section class="content">
    <!-- left column -->
    <div class="col-lg-10 col-lg-offset-1">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Create user</h3>
            </div>
            <form role="form" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group{{ $errors->has('crm') ? ' has-error' : '' }}">
                        <label for="crm">CRM</label>

                        <input id="crm" type="text" class="form-control" name="crm" placeholder="Enter CRM" value="{{ old('crm') }}" required autofocus> @if ($errors->has('crm'))
                        <span class="help-block">
                            <strong>{{ $errors->first('crm') }}</strong>
                        </span> @endif
                    </div>

                    <!-- select -->
                    <div class="form-group">
                        <label>Select Work type</label>
                        <select class="form-control" name="user_type">
                            <option value="">Select Work</option>
                            <option value="map-out">Map-Out</option>
                            <option value="map-in">Map-In</option>
                            <option value="map-both">Map-Both</option>
                            <option value="mdu">MDU</option>
                            <option value="planner">Planner</option>
                            <option value="inerror">Ingestion error</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Select Sub Category</label>
                        <select class="form-control" name="user_type">
                            <option value="">Select Sub Category</option>
                            <option value="map-out">MDU</option>
                            <option value="map-in">Verb Delete</option>
                            <option value="map-both">Advisory email</option>
                        </select>
                    </div>

                    <div class="form-group{{ $errors->has('rm_case') ? ' has-error' : '' }}">
                        <label for="rm_case">RM Case</label>

                        <input id="rm_case" type="text" class="form-control" name="rm_case" placeholder="Enter RM Case" value="{{ old('rm_case') }}" required autofocus> @if ($errors->has('rm_case'))
                        <span class="help-block">
                            <strong>{{ $errors->first('rm_case') }}</strong>
                        </span> @endif
                    </div>

                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </form>
        </div>
    </div>
</section>

<script>
//	$.noConflict();
//jQuery(document).ready(function ($) {
//    $('#datepicker').datepicker({
//      autoclose: true
//    })
//
//    $('#duedatepicker').datepicker({
//      autoclose: true
//    })
//});
</script>
@endsection