@extends('layouts.main')

@section('content')
    @if(auth()->user())
        <h1>Hello {{auth()->user()->name}} welcome in website</h1>
    @else
        <h2>welcome in website</h2>
    @endif
@endsection