@extends('layouts.main')
@section('content')
    <h1>login account</h1> <br>
    <form action="/login" method="post">
        @csrf
{{--        @push()--}}
        <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
{{--            <span class="invalidFeedback text-danger">--}}
{{--                @if(isset($error->email))--}}
{{--                    {{$error->email}}--}}
{{--                @endif--}}
{{--            </span>--}}
        </div>
        <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
{{--            <span class="invalidFeedback text-danger">--}}
{{--                @if(isset($error->password))--}}
{{--                    {{$error->password}}--}}
{{--                @endif--}}
{{--            </span> <br>--}}
        </div>
        <p>Not register yet?<a href="/register">create an account</a></p>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection