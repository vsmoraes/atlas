@extends('layouts.default-no-sidebar')

@section('content')
    <div class="container">    
        <div style="margin-top: 50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel {{ ( $errors->has() ? 'panel-danger' : 'panel-info' ) }}">

                <div class="panel-heading">
                    <div class="panel-title">{{ Lang::get('pages.auth.signup.panel-title') }}</div>
                </div>  

                <div class="panel-body">
                    @if ( $errors->has() )
                    <div class="alert alert-danger" role="alert">
                        {{ Lang::get('pages.auth.signup.form-error') }}
                    </div>
                    @endif

                    {{ Form::open(['route' => 'signUp', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form']) }}

                        <div class="form-group {{ ( $errors->has('email') ? 'has-error' : '' ) }}">
                            <label for="email" class="col-md-3 control-label">{{ Lang::get('pages.auth.signup.form-labels.email') }}</label>
                            <div class="col-md-9">
                                {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => Lang::get('pages.auth.signup.form-labels.email'), 'required' => 'required']) }}
                                {{ $errors->first('email', '<span class="help-block">:message</span>') }}
                            </div>
                        </div>
                                    
                        <div class="form-group {{ ( $errors->has('name') ? 'has-error' : '' ) }}">
                            <label for="name" class="col-md-3 control-label">{{ Lang::get('pages.auth.signup.form-labels.name') }}</label>
                            <div class="col-md-9">
                                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => Lang::get('pages.auth.signup.form-labels.name')]) }}
                                {{ $errors->first('name', '<span class="help-block">:message</span>') }}
                            </div>
                        </div>

                        <div class="form-group {{ ( $errors->has('password') ? 'has-error' : '' ) }}">
                            <label for="password" class="col-md-3 control-label">{{ Lang::get('pages.auth.signup.form-labels.password') }}</label>
                            <div class="col-md-9">
                                {{ Form::password('password', ['class' => 'form-control', 'placeholder' => Lang::get('pages.auth.signup.form-labels.password')]) }}
                                {{ $errors->first('password', '<span class="help-block">:message</span>') }}
                            </div>
                        </div>

                        <div class="form-group {{ ( $errors->has('password_confirmation') ? 'has-error' : '' ) }}">
                            <label for="password_confirmation" class="col-md-3 control-label">{{ Lang::get('pages.auth.signup.form-labels.password') }}</label>
                            <div class="col-md-9">
                                {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => Lang::get('pages.auth.signup.form-labels.password_confirmation')]) }}
                                {{ $errors->first('password_confirmation', '<span class="help-block">:message</span>') }}
                            </div>
                        </div>

                        <div class="form-group">
                            <!-- Button -->
                            <div class="col-md-offset-3 col-md-9">
                                {{ Form::submit(Lang::get('pages.auth.signup.signup-button'), ['class' => 'btn btn-primary']) }}
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div> 
    </div>
@stop