@extends('layouts.default-no-sidebar')

@section('content')

<div class="jumbotron">
    <h1>Project Atlas</h1>
    <p>{{ Lang::get('pages.paragraphs.project_description') }}</p>
    <p><a class="btn btn-lg btn-primary" href="{{ URL::route('signUp') }}" role="button">{{ Lang::get('pages.buttons.signUp') }}</a></p>
</div>
@stop