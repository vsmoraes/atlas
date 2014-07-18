@extends('layouts.default')

@section('content')
    <h1 class="page-header">Your accounts</h1>

    <div class="row">
        <div class="col-sm-12 table-responsive">
            <table class="table table-stripped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Amount</th>
                        <th style="width: 190px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $account_list AS $account )
                    <tr>
                        <td>{{ $account->id }}</td>
                        <td>{{ $account->name }}</td>
                        <td><span style="color:{{ ($account->amount >= 0 ? 'blue' : 'red') }}">{{ $account->amount }}</span></td>
                        <td>
                            <a href="{{ URL::route('transactions.show', ['account_id' => $account->id]) }}" class="btn btn-xs btn-success">Transactions</a>
                            <a href="{{ URL::route('accounts.edit', ['id' => $account->id]) }}" class="btn btn-xs btn-info">Edit</a>
                            <a href="#" class="btn btn-xs btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <a href="{{ URL::route('accounts.create') }}" class="btn btn-primary">New account</a>
        </div>
    </div>
@stop