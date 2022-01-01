@extends('layouts.admin')
@section('content')
    <form action="{{ route('users.update' , $user->id) }}" method="POST">
        @csrf
        @method('put')
        <input type="hidden" name="id" value="{{$user->id}}">
        <div class="form-floating mb-3 col-5">
            <input type="text" name="name" value="{{$user->name}}" class="form-control mb-2" id="FullName" placeholder="name@example.com">
            <label for="FullName">Full name</label>
            @error('name')
            <span class="invalidFeedback text-danger">
                    {{$message}}
                </span>
            @enderror
        </div>
        <div class="form-floating mb-3 col-5">
            <input type="text" name="phone_number" value=" {{$user->phone_number}} " class="form-control mb-2" id="PhoneNumber" placeholder="name@example.com">
            <label for="PhoneNumber">phone number</label>
            @error('phone_number')
            <span class="invalidFeedback text-danger">
                    {{$message}}
                </span>
            @enderror
        </div>
        <div class=" mb-3 col-5">
            <label for="email" class="form-label ">email : </label>
            <textarea name="email" class="form-control mb-2" id="email" rows="3">{{$user->email}}</textarea>
            @error('email')
            <span class="invalidFeedback text-danger">
                    {{$message}}
                </span>
            @enderror
        </div>

        <span>
            <button class=" btn btn-lg btn-primary col-1" type="submit">edit</button>
            <a class=" btn btn-lg btn-danger" href="/dashboard/users">back</a>
        </span>
    </form>
@endsection