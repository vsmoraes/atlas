@extends('layouts.default')

@section('content')
    <h1 class="page-header">New account</h1>

    {{ Form::open(['route' => 'accounts.store', 'class' => 'form-horizontal']) }}

        @include('accounts.form')

        <div class="row">
            <div class="col-sm-12">
                {{ Form::submit('Save account', ['class' => 'btn btn-primary']) }}
                <a href="{{ URL::route('accounts.index') }}" class="btn btn-default">Back to list</a>
            </div>
        </div>
    {{ Form::close() }}
@stop