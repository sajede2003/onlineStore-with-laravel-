@extends('layouts.admin')
@section('content')
    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <h1 class="h3 mb-3 fw-normal">add product Page</h1>
        <div class="form-floating mb-3 col-5">
            <input type="text" name="title" value="{{old('title')}}" class="form-control mb-2" id="title" placeholder="name@example.com">
            <label for="title">title</label>
            @error('title')
            <span class="invalidFeedback text-danger">
                    {{$message}}
                </span>
            @enderror
        </div>
        <div class=" mb-3 col-5">
            <label for="description">description</label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{old('description')}}</textarea>
            @error('description')
            <span class="invalidFeedback text-danger">
                    {{$message}}
                </span>
            @enderror
        </div>
        <div class=" mb-3 col-5">
            <label for="pic">pic</label>
            <input type="file" name="pic"  class=" mb-2" id="pic">
            @error('pic')
            <span class="invalidFeedback text-danger">
                    {{$message}}
                </span>
            @enderror
        </div>
        <div class="form-floating mb-3 col-5">
            <input type="number" name="price" value="{{old('price')}}" class="form-control mb-2" id="price" placeholder="name@example.com">
            <label for="price">price</label>
            @error('price')
            <span class="invalidFeedback text-danger">
                    {{$message}}
                </span>
            @enderror
        </div>
        <div class="form-floating mb-3 col-5">
            <input type="number" name="count" value="{{old('count')}}" class="form-control mb-2" id="count" placeholder="name@example.com">
            <label for="count">count</label>
            @error('count')
            <span class="invalidFeedback text-danger">
                    {{$message}}
                </span>
            @enderror
        </div>
        <div class=" mb-3 col-5">
            <label for="CategoryId"> category </label>
            <select name="category_id" id="CategoryId">
                @foreach ($category as $item)
                <option value="{{$item->id}}">{{$item->title}}</option>
                @endforeach
            </select>
        </div>
        <span>
            <button class=" btn btn-lg btn-primary col-1" type="submit">add</button>
            <a class=" btn btn-lg btn-danger" href="/dashboard/product">back</a>
        </span>
    </form>
@endsection