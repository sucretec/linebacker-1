@extends('app')

@section('htmlheader_title')
    Users
@endsection

@section('main-content')

<div class="box box-primary">
            <div class="box-header with-border">
		@if(empty($user)) 
			<h3 class="box-title">New User</h3>
		@else 
			<h3 class="box-title">Edit User</h3>
		@endif
            </div>
            <!-- /.box-header -->
@if(empty($user)) 
	{!! Form::open(array('url' => 'users/store', 'id' => 'form')) !!}
@else
        @role('admin')
            {!! Form::open(array('url' => 'users/store/'.$user->id, 'id' => 'form')) !!}
        @endrole
        {!! Form::open(array('url' => 'users/editMy/'.$user->id, 'id' => 'form')) !!}
@endif
            <div class="box-body">
		{{--
		@if (count($errors) > 0)
			<div class="alert alert-danger">
				<span class="glyphicon glyphicon-info-sign"></span> <strong>Whoops!</strong> There were some problems with your input:
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		--}}
                <!-- input states -->
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
			<label for="name" class="control-label">{!! $errors->has('name') ? '<i class="fa fa-times-circle-o"></i> Name:' : 'Name' !!}@if( $errors->has('name') ) <small class="error">{{ $errors->first('name') }}</small>@endif
			</label>
                  <input type="text" placeholder="Name..." id="name" class="form-control" name="name" value="{{ empty($user->name)? Input::old('name') : $user->name }}">
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
			<label for="email" class="control-label">{!! $errors->has('email') ? '<i class="fa fa-times-circle-o"></i> E-Mail:' : 'E-Mail' !!}@if( $errors->has('email') ) <small class="error">{{ $errors->first('email') }}</small>@endif
			</label>
			<input type="email" placeholder="E-Mail..." id="email" class="form-control" name="email" value="{{ empty($user->email)? Input::old('email') : $user->email }}">
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
			<label for="password" class="control-label">{!! $errors->has('password') ? '<i class="fa fa-times-circle-o"></i> Password:' : 'Password' !!}@if( $errors->has('password') ) <small class="error">{{ $errors->first('password') }}</small>@endif
			</label>
			<input type="password" placeholder="Password..." id="password" class="form-control" name="password" value="">
                </div>
                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
			<label for="password_confirmation" class="control-label">{!! $errors->has('password_confirmation') ? '<i class="fa fa-times-circle-o"></i> Retype password:' : 'Retype password' !!}@if( $errors->has('password_confirmation') ) <small class="error">{{ $errors->first('password_confirmation') }}</small>@endif
			</label>
			<input type="password" placeholder="Retype password..." id="password_confirmation" class="form-control" name="password_confirmation" value="{{ Input::old('password_confirmation') }}">
                        <div class="form-group{{ $errors->has('in_active') ? ' has-error' : '' }}">
                        
                         </label> 
                        @role('admin')
                            @if( !empty($user) && $user->in_active ) 
                            <label for="in_active" class="control-label">{!! $errors->has('in_active') ? '<i class="fa fa-times-circle-o"></i> Inactive?:' : 'Inactive?' !!}@if( $errors->has('in_active') ) <small class="error">{{ $errors->first('in_active') }}</small>@endif
                                <input name="inactive" type="checkbox" value="1">
                            @else
                            <label for="in_active" class="control-label">{!! $errors->has('in_active') ? '<i class="fa fa-times-circle-o"></i> Active?:' : 'Active?' !!}@if( $errors->has('in_active') ) <small class="error">{{ $errors->first('in_active') }}</small>@endif
                            <input name="in_active" type="checkbox" value="1">
                                @if( $errors->has('in_active') ) <small class="error">{{ $errors->first('in_active') }}</small>@endif
                                 @endif
                        @endrole
                        </div>
                </div>
            </div>

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <!-- /.box-body -->
		<div class="box-footer">
                @if(Auth::check() && Auth::user()->is('admin'))<a class="btn btn-default" href="{{ URL::to('users') }}">Cancel</a> @else
                <a class="btn btn-default" href="{{ URL::to('users/account') }}">Cancel</a>@endif
                <button class="btn btn-info pull-right" type="submit">Save</button>
              </div>
{!! Form::close() !!}
</div>

@endsection
