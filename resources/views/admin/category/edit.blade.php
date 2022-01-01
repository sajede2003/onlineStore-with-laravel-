@extends('layouts.admin')
@section('content')
    <form action="{{route('category.update' , $category->id)}}" method="POST">
        @csrf
        @method('put')
        <input type="hidden" name="id" value="{{$category->id}}">
        <div class="form-floating mb-3 col-5">
            <input type="text" name="title" value="{{$category->title}}" class="form-control mb-2" id="title" placeholder="name@example.com">
            <label for="FullName">Full name</label>
            @error('title')
            <span class="invalid-feedback bg-danger">
                {{$message}}
            </span>
            @enderror
        </div>
        <span>
            <button class=" btn btn-lg btn-primary col-1" type="submit">edit</button>
            <a class=" btn btn-lg btn-danger" href="/dashboard/category">back</a>
        </span>
    </form>
@endsection