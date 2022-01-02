@extends('layouts.main')
@section('content')
<h1>create an account</h1>
<form action="/register" method="POST">
    @csrf
    <div class=" form-floating mb-3">
        <input type="text" name="name" id="floatingInput" class="form-control" placeholder="name@example.com">
        <label for="floatingInput">Full Name *</label>
        @error('name')
            <span class="invalidFeedback text-danger">
                {{$message}}
            </span>
        @enderror
    </div>
    <div class="form-floating mb-3">
        <input type="text" name="phone_number" id="floatingPassword" class="form-control" placeholder="name@example.com">
        <label for="floatingInput">Phone Number *</label>
        @error('phone_number')
            <span class="invalidFeedback text-danger">
                    {{$message}}
            </span>
        @enderror
    </div>
    <div class="form-floating mb-3">
        <input type="email" name="email" id="floatingPassword" class="form-control" placeholder="name@example.com">
        <label for="floatingInput">Email Address *</label>
            @error('email')
                <span class="invalidFeedback text-danger">
                    {{$message}}
                </span>
            @enderror
    </div>
    <div class="form-floating mb-3">
        <input type="password" name="password" id="floatingPassword" class="form-control" placeholder="name@example.com">
        <label for="floatingInput">Password *</label>
        @error('password')
        <span class="invalidFeedback text-danger">
                    {{$message}}
                </span>
        @enderror
    </div>
    <div class="form-floating mb-3">
        <input type="password" name="password_confirmation" id="floatingPassword" class="form-control" placeholder="name@example.com">
        <label for="floatingInput">Confirm Password *</label>
        @error('password_confirmation')
        <span class="invalidFeedback text-danger">
                    {{$message}}
                </span>
        @enderror
    </div>
    <P>Do you have account? <a href="login">login</a></P>

    <button type="submit" class="btn btn-primary">Submit</button>

</form>

@endsection