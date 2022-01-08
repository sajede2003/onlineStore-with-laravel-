<div>
@foreach($comments as $comment)
    <div class="card p-2 mb-2 {{$margin}}" style="background: {{$color}};">
        <div>
            <h4>{{$comment->user->name}}</h4>
        </div>
        <p>
            {{$comment->content}}
        </p>
        <div>
            <label for="#">replay:</label>
            <input type="radio" name="replay" value="{{$comment->id}}" class="replay">
        </div>
    </div>
        @include('product.single.comment', ['allComments'=>$allComments
        ,'comments' => $allComments->where('comment_parent',$comment->id)
         ,'color' => '#E9E9E9'
         , 'margin' => 'ms-5'])

@endforeach
</div>
