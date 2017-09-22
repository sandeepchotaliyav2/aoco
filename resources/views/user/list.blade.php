@extends('layouts.app')
<link href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('bower_components/datatables.net-bs/css/select.dataTables.min.css') }}" rel="stylesheet">
@section('content')
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">CRM Request List</h3>
            </div>
            <div class="form-group" style="margin:15px;">
                <a href="{{route('adduser')}}" class="btn btn-info">Add User</a>
                <button id="delete_user" class="btn btn-danger">Delete User</button>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th></th>
                  <th>Id</th>
                  <th>Email</th>
                  <th>Name</th>
                  <th>User Type</th>
                  <th>Created Date</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; foreach($data as $request){?>
                <tr>
                  <td data-id="{{$request['id']}}"></td>
                  <td>{{ $i }}</td>
                  <td>{{ $request['email'] }}</td>
                  <td>{{ $request['name'] }}</td>
                  <td>{{ $request['user_type'] }}</td>
                  <td>{{ $request['created_at'] }}</td>
                  <td>{{ $request['status'] }}</td>
                </tr>
                <?php $i++;}?>
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
  @endsection
<script src="{{ asset('bower_components/jquery/dist/jquery-1.12.4.js') }}"></script>
<script>
    $(document).ready(function() {
         var table = $('#example1').DataTable( {
        columnDefs: [ {
            orderable: false,
            className: 'select-checkbox',
            targets:   0
        } ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]]
    } );
    $('#delete_user').on('click', function(e){
      
      //console.log(table.column(0));
      //var rows_selected = table.column(0).checkboxes.selected();
      var selectedCheckboxes = [];

      // Iterate over all selected checkboxes
      $.each($('.select-checkbox'), function(index, value){
        if($(this).parent().hasClass('selected')) {
          selectedCheckboxes.push($(this).data('id'));
        }
      });
      $.ajax({   
          type: "POST",  
          url: "../public/delete_user",  
          data: {user_id : selectedCheckboxes,_token:'<?php echo csrf_token(); ?>'}  ,
        success: function(response)  
        {   
          console.log('dasdsasad',response);
          if(response.status == 1){
            alert('User deleted successfully');
            //window.location = "http://localhost/aoco/public/userlist";
          }
        }   
      });
      console.log(selectedCheckboxes);
   });
    });
    //$('.select-checkbox').parent().hasClass('selected');
</script>
