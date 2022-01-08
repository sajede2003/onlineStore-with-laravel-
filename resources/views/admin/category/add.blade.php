@extends('layouts.admin')
@section('content')
    <form action="{{route('category.store')}}" method="POST">
        @csrf
        <h1 class="h3 mb-3 fw-normal">add category Page</h1>
        <div class="form-floating mb-3 col-5">
            <input type="text" name="title" value="{{old('title')}}" class="form-control mb-2" id="title" placeholder="name@example.com">
            <label for="title">title</label>
            @error('title')
            <span class="invalidFeedback text-danger">
                    {{$message}}
                </span>
            @enderror
        </div>
        <span>
            <button class=" btn btn-lg btn-primary col-1" type="submit">add</button>
            <a class=" btn btn-lg btn-danger" href="/dashboard/category">back</a>
        </span>
    </form>
@endsection()