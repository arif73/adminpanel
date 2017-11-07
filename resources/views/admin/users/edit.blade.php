@extends('layouts.admin')


@section('content')


    <div class="row">
        <div class="col-sm-3">

         <img src="{{$user->photo ?$user->photo->file :"http://placehold.it/400x400" }}"alt="" class="img-responsive img-rounded">
        </div>

        <div class="col-sm-9">
    {!! Form::model($user,['method'=>'patch','action'=>['AdminUsersController@update',$user->id],'files'=>true]) !!}

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

           <div class="form-group">

            {!! Form::label('name','Name') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}

        </div>
        <div class="form-group">

            {!! Form::label('email','Email') !!}
            {!! Form::email('email',null,['class'=>'form-control']) !!}

        </div>
        <div class="form-group">

            {!! Form::label('role_id','Role') !!}
            {!! Form::select('role_id',[''=>'Choose Option']+ $roles,null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">

            {!! Form::label('is_active','Status') !!}
            {!! Form::select('is_active',array(1=>'active',0=>'Not active'),0,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">

            {!! Form::label('password','Password') !!}
            {!! Form::password('password',['class'=>'form-control']) !!}

        </div>
        <div class="form-group">

            {!! Form::label('photo_id','Photo ID') !!}
            {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">

            {!! Form::submit('update users',['class' => 'btn btn-info col-sm-6']) !!}
        </div>


            {!! Form::close() !!}


            {!! Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id]]) !!}

            {!! Form::submit('Delete User',['class'=>'btn btn-danger col-sm-6']) !!}


            {!! Form::close() !!}

        </div>

    </div>
    <div class="row">
        @include('includes.form_error')

    </div>

@endsection