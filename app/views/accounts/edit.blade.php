@extends('layouts.default')

@section('content')
    <h1 class="page-header">Edit account</h1>

    {{ Form::open(['route' => ['accounts.update', $account->id], 'method' => 'PUT', 'class' => 'form-horizontal']) }}

        @include('accounts.form', ['account' => $account])

        <div class="row">
            <div class="col-sm-12">
                {{ Form::submit('Save account', ['class' => 'btn btn-primary']) }}
                <a href="{{ URL::route('accounts.index') }}" class="btn btn-default">Back to list</a>
            </div>
        </div>
    {{ Form::close() }}
@stop