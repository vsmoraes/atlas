@extends('layouts.default')

@section('content')
    <h1 class="page-header">Your transactions</h1>

    <div class="row">
        <div class="col-sm-12 table-responsive">
            <table class="table table-stripped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Account</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Due date</th>
                        <th>Previous amount</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach( $transaction_list AS $transaction )
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td><a href="{{ URL::route('accounts.show', $transaction->account_user->account->id) }}">{{ $transaction->account_user->account->name }}</a></td>
                        <td>{{ $transaction->description }}</td>
                        <td><span style="color:{{ ($transaction->amount >= 0 ? 'blue' : 'red') }}">{{ $transaction->amount }}</span></td>
                        <td>{{ $transaction->due_date }}</td>
                        <td><span style="color:{{ ($transaction->previous_amount >= 0 ? 'blue' : 'red') }}">{{ $transaction->previous_amount }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <a href="{{ URL::route('transactions.create') }}" class="btn btn-primary">New transaction</a>
        </div>
    </div>
@stop