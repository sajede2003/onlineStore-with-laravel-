@extends('layouts.main')
@section('content')
    <div class="content">
        <div class="post">
            <div class="w-100" style="height: 640px;">
                <img class="w-100 h-100" src="{{asset('images/' . $productData->pic)}}" alt="#">
            </div>
            <h1>title :
                {{$productData->title}}
            </h1>
            <div>
                <p>
                    {{$productData->description}}
                </p>
            </div>
            <div style="display: flex; justify-content:space-between;">
                <span>
                    <a href="
{{--                        {{route('like', $productData->id)}}--}}
                            " class="btn btn-danger">like</a>
                    <small>
    {{--                    {{$likeCount[0]['count']}}--}}
                    </small>
                </span>
                <span>
{{--            {{$score}}--}}
                    <label for="score">score</label>
                    <small id="score">
                        <output id="ShowScore">0</output>/5
                    </small>
                    <form action="/score" method="POST">
                        <input type="range" id="score" oninput="SaveValue.value = this.value;ShowScore.value=this.value" min="0" max="5">
                        <input type="hidden" name="score" id="SaveValue" value="">
                        <input type="hidden" name="product_id" value="
{{--                        {{$product->id}}--}}
                                ">
                        <button type="submit">send</button>
                    </form>
                </span>
                <span>
                    <form action="{{route('addBookmark' , $productData->id)}}" method="POST">
                        @csrf
                        <label for="bookmark">bookmark</label>
                        <input type="checkbox" id="bookmark">
                        <input type="hidden" name="product_id" value="{{$productData->id}}">
                        <button type="submit" id="bookmark_btn" style="display:none;"></button>
                    </form>
            </span>
                <span>
                <a href="{{route('addToCart' , $productData->id)}}" class="btn btn-success">add to cart</a>
            </span>
            </div>
        </div>
        <hr>
        <div class="comments border py-5 px-2">
            <form action="/comment" method="POST">
                <input type="hidden" name="product_id" value="
{{--                {{$product->id}}--}}
                        ">
                <div>
                    <label for="comment"> your comment : </label>
                </div>
                <textarea name="content" id="comment" class="w-100 p-3 " style="height: 100px;"></textarea>
                <input type="hidden" name="parent_comment" value="0" id="replay">
                <span>
                <button class="btn btn-info text-white">send</button>
            </span>
            </form>
            <h3>comments</h3>
            {{--                @include('Comments.php')--}}
        </div>
    </div>


    <script>
        let BookmarkInput = document.querySelector('#bookmark');
        let BookmarkBtn = document.querySelector('#bookmark_btn');
        let replaysRadio = document.querySelectorAll('.replay');
        let mainReplayBtn = document.querySelector('#replay');

        BookmarkInput.addEventListener('click', () => BookmarkBtn.click())


        replaysRadio.forEach(item => {
            console.log('as');
            item.addEventListener('click', () => {
                mainReplayBtn.value = item.value;
            })
        })
        let link = document.querySelector('#contact');

        var SweetAlertMessage = document.querySelector('#message').value;

        if (SweetAlertMessage.trim() !== '') {
            Swal.fire({
                icon: 'success',
                text: SweetAlertMessage,
            })
        }
    </script>
@endsection