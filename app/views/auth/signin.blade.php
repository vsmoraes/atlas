@extends('layouts.default-no-sidebar')

@section('content')
    <div style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-5 col-sm-offset-2">                    
        <div class="panel {{ Session::has('auth_failed') || $errors->has() ? 'panel-danger' : 'panel-info' }}" >
            <div class="panel-heading">
                <div class="panel-title">{{ Lang::get('pages.auth.signin.panel-title') }}</div>
                <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="/recover_password">{{ Lang::get('pages.auth.signin.forgot-password') }}</a></div>
            </div>

            <div style="padding-top:30px" class="panel-body" >
                @if ( $errors->has() || Session::has('auth_failed') )
                <div class="alert alert-danger">{{ Lang::get('pages.auth.signin.failed') }}</div>
                @endif

                {{ Form::open(['route' => 'login', 'class' => 'form-horizontal', 'role' => 'form']) }}

                    <div class="form-group {{ ( $errors->has('email') ? 'has-error' : '' ) }}">
                        <label for="email" class="col-md-3 control-label">{{ Lang::get('pages.auth.signin.form-labels.email') }}</label>
                        <div class="col-md-9">
                            {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => Lang::get('pages.auth.signin.form-labels.email'), 'required' => 'required']) }}
                            {{ $errors->first('email', '<span class="help-block">:message</span>') }}
                        </div>
                    </div>
                                
                    <div class="form-group {{ ( $errors->has('password') ? 'has-error' : '' ) }}">
                        <label for="password" class="col-md-3 control-label">{{ Lang::get('pages.auth.signin.form-labels.password') }}</label>
                        <div class="col-md-9">
                            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => Lang::get('pages.auth.signin.form-labels.password')]) }}
                            {{ $errors->first('password', '<span class="help-block">:message</span>') }}
                        </div>
                    </div>

                    <div class="input-group">
                      <div class="checkbox">
                        <label>
                            {{ Form::checkbox('remember') }} {{ Lang::get('pages.auth.signin.form-labels.remember') }}
                        </label>
                      </div>
                    </div>

                    <div style="margin-top:10px" class="form-group">
                        <div class="col-sm-12 controls">
                          {{ Form::submit(Lang::get('pages.auth.signin.signin-button'), ['class' => 'btn btn-success']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 control">
                            <div style="border-top: 1px solid #888; padding-top:15px; font-size:85%" >
                                {{ Lang::get('pages.auth.signin.dont-have-account') }}
                                <a href="{{ URL::route('signUp') }}">{{ Lang::get('pages.auth.signin.signUp') }}</a>
                            </div>
                        </div>
                    </div>
                            </form>     



                        </div>                     
                    </div>  
        </div>
@stop