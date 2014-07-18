@extends('layouts.default')

@section('content')
    <h1 class="page-header">New transaction</h1>

    {{ Form::open(['route' => 'transactions.store', 'class' => 'form-horizontal']) }}

        <div class="form-group {{ ( $errors->has('description') ? 'has-error' : '' ) }}">
            <label for="description" class="col-md-3 control-label">Description</label>
            <div class="col-md-9">
                {{ Form::email('description', null, ['class' => 'form-control', 'placeholder' => 'Description', 'required' => 'required']) }}
                {{ $errors->first('description', '<span class="help-block">:message</span>') }}
            </div>
        </div>

        <div class="form-group {{ ( $errors->has('account_id') ? 'has-error' : '' ) }}">
            <label for="account_id" class="col-md-3 control-label">Account</label>
            <div class="col-md-9">
                {{ Form::select('account_id', $account_list, null, ['class' => 'form-control']) }}
                {{ $errors->first('account_id', '<span class="help-block">:message</span>') }}
            </div>
        </div>

        <div class="form-group {{ ( $errors->has('amount') ? 'has-error' : '' ) }}">
            <label for="amount" class="col-md-3 control-label">Amount</label>
            <div class="col-md-9">
                {{ Form::email('amount', null, ['class' => 'form-control', 'placeholder' => 'Amount', 'required' => 'required']) }}
                {{ $errors->first('amount', '<span class="help-block">:message</span>') }}
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                {{ Form::submit('Add transaction', ['class' => 'btn btn-primary']) }}
                <a href="{{ URL::route('transactions.index') }}" class="btn btn-default">Back to list</a>
            </div>
        </div>

    {{ Form::close() }}
@stop