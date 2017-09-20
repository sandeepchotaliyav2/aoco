@extends('layouts.app') @section('content')
<link href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">


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
                <h3 class="box-title">Add new request</h3>
            </div>
            <form role="form" method="POST" action="{{ route('storerequest') }}">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group{{ $errors->has('crm_case') ? ' has-error' : '' }}">
                        <label for="crm">CRM</label>

                        <input id="crm" type="text" class="form-control" name="crm_case" placeholder="Enter CRM" value="{{ old('crm_case') }}" required autofocus> 
                        @if ($errors->has('crm_case'))
                        <span class="help-block">
                            <strong>{{ $errors->first('crm_case') }}</strong>
                        </span> @endif
                    </div>

                    <!-- select -->
                    <div class="form-group">
                        <label>Select Work type</label>
                        <select class="form-control" name="work_type">
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
                        <select class="form-control" name="sub_work_type">
                            <option value="">Select Sub Category</option>
                            <option value="map-out">MDU</option>
                            <option value="map-in">Verb Delete</option>
                            <option value="map-both">Advisory email</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Select Case Type</label>
                        <select class="form-control" name="sub_work_type">
                            <option value="">Select Case Type</option>
                            <option value="c3">c3</option>
                            <option value="non-c3">non-c3</option>
                        </select>
                    </div>


                    <div class="form-group{{ $errors->has('rm_case') ? ' has-error' : '' }}">
                        <label for="rm_case">RM Case</label>

                        <input id="rm_case" type="text" class="form-control" name="rm_case" placeholder="Enter RM Case" value="{{ old('rm_case') }}" required autofocus> 
                        @if ($errors->has('rm_case'))
                        <span class="help-block">
                            <strong>{{ $errors->first('rm_case') }}</strong>
                        </span> @endif
                    </div>

                    <div class="form-group{{ $errors->has('email_subject') ? ' has-error' : '' }}">
                        <label for="rm_case">Email Subject</label>

                        <input id="email_subject" type="text" class="form-control" name="email_subject" placeholder="Enter Email subject line" value="{{ old('email_subject') }}" required autofocus> 
                        @if ($errors->has('email_subject'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email_subject') }}</strong>
                        </span> @endif
                    </div>

                    <!-- Date -->
                    <div class="form-group">
                        <label>Start Date:</label>

                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" name="start_date" id="datepicker">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Due Date:</label>

                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" name="due_date" id="duedatepicker">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="rm_case">Comment</label>
                        <textarea id="comment" name="comment" class="form-control" rows="5" placeholder="Enter Comment">{{ old('comment') }}</textarea>
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
    $.noConflict();
    jQuery(document).ready(function ($) {
        $('#datepicker').datepicker({
            autoclose: true
        })

        $('#duedatepicker').datepicker({
            autoclose: true
        })
    });
</script>
@endsection