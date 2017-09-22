@extends('layouts.app')
<link href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<style>
    .example-modal .modal {
        position: relative;
        top: auto;
        bottom: auto;
        right: auto;
        left: auto;
        display: block;
        z-index: 1;
    }

    .example-modal .modal {
        background: transparent !important;
    }
</style>
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">CRM Request List</h3>
                </div>
                <div class="form-group" style="margin:15px;">
                    <a href="{{route('addrequest')}}" class="btn btn-info">Add Request</a>
                </div>


                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>CRM Case</th>
                                <th>Work Type</th>
                                <th>Sub Work Type</th>
                                <th>Case Type</th>
                                <th>RM Case</th>
                                <th>Email Subject</th>
                                <th>Start Date</th>
                                <th>Due Date</th>
                                <th>Comments</th>
                                <th>More</th>
                                <th>Upload Files</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $request) { ?>
                                <tr>
                                    <td>{{ $request['id'] }}</td>
                                    <td>{{ $request['crm_case'] }}</td>
                                    <td>{{ $request['work_type'] }}</td>
                                    <td>{{ $request['sub_work_type'] }}</td>
                                    <td>{{ $request['case_type'] }}</td>
                                    <td>{{ $request['rm_case'] }}</td>
                                    <td>{{ $request['email_subject'] }}</td>
                                    <td>{{ date('d/m/Y', strtotime($request['start_date'])) }}</td>
                                    <td>{{ date('d/m/Y', strtotime($request['due_date'])) }}</td>
                                    <td>{{ $request['comment'] }}</td>
                                    <td><a href="{{route('editrequest', $request['id'])}}" class="btn btn-success">Edit</a> &nbsp; <a href="{{route('deleterequest', $request['id'])}}" class="btn btn-danger">Delete</a></td>
                                    <td><button type="button" class="btn btn-primary openDialog" data-toggle="modal" data-id="{{$request['id']}}">Upload files</button></td>
                                </tr>
                            <?php } ?>
                            </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
</div>
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
            </div>

            <form method="post" action="{{ route('adminUploadFile') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">

                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" id="exampleInputFile" name="upload[]" multiple >

                        <input type="text" name="request_id" id="request_id" value=""/>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection
<script src="{{ asset('bower_components/jquery/dist/jquery-1.12.4.js') }}"></script>
<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script> -->
<script>
$(function () {
    $('#example1').DataTable()
});
$(document).ready(function () {
    $(".openDialog").click(function () {
        $('#request_id').val($(this).data('id'));
        $('#modal-default').modal('show');
    });
});
</script>

