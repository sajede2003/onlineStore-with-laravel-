@extends('layouts.main')

@section('content')
{{--user name with session--}}
    <h1>welcome {{session()->get('user_name')}} in my website</h1>
@endsection