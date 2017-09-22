@extends('layouts.app') @section('content')
<section class="content-header">
    <h1>
        Add new user / admin
      </h1>

</section>
<section class="content">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Create user</h3>
            </div>
            <form role="form" method="POST" action="{{ route('create') }}">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">Name</label>

                        <input id="name" type="text" class="form-control" name="name" placeholder="Enter name" value="{{ old('name') }}" required autofocus> @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span> @endif
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">Email address</label>

                        <input id="email" placeholder="Enter email" type="email" class="form-control" name="email" value="{{ old('email') }}" required> @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span> @endif
                    </div>
                    <!-- select -->
                    <div class="form-group{{ $errors->has('user_type') ? ' has-error' : '' }}">
                        <label>Select User type</label>
                        <select class="form-control" name="user_type" required>
                            <option value="0">Select User</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                        @if ($errors->has('user_type'))
                        <span class="help-block">
                            <strong>{{ $errors->first('user_type') }}</strong>
                        </span> @endif
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection