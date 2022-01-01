@extends('layouts.admin')
@section('content')
    <p>Hi {{auth()->user()->name}} welcome in dashboard</p>
@endsection