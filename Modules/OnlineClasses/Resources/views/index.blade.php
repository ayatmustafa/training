@extends('onlineclasses::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('onlineclasses.name') !!}
    </p>
@endsection
