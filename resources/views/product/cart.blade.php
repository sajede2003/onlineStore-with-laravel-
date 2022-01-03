@extends('layouts.main')
@section('content')
        <table class="table table-striped border">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">product name </th>
                <th scope="col"> count </th>
                <th scope="col"> link </th>
                <th scope="col">sum </th>
            </tr>
            </thead>
            <tbody>
            @if (count($cartData) == 0)
            <h3> there is no item to show </h3>
            @else
            @php $counter = 1; @endphp
            @foreach ($cartData as $key => $value)
                <tr>
                <th scope="row">{{$counter++}}
                </th>
                <td>
                    {{$value['title']}}
                </td>
                <td>
                    <p>
                        {{$value['count']}}
                    </p>
                </td>
                <td>
                    <a href="/more?id={{$key}}"> more</a>
                </td>
                <td>
                    <p>
                        {{$value['sum']}}
                    </p>
                </td>
                <td>
                    <div style="display:flex; justify-content:end;">
                        <a href="{{route('addToCart' , $key)}}" class="btn btn-danger text-white">+</a>
                        {{$value['count']}}
                        <a href="{{route('removeFromCart' , $key)}}" class="btn btn-info text-white mx-2">-</a>
                    </div>
                </td>
            </tr>
            @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>
{{--<input type="hidden" value="<?= isset($message)?$message:''?>" id="message">--}}

{{--<script>--}}
{{--    var SweetAlertMessage = document.querySelector('#message').value;--}}
{{--    if (SweetAlertMessage.trim() !== '') {--}}
{{--        Swal.fire({--}}
{{--            icon: 'success',--}}
{{--            title: 'yeah',--}}
{{--            text: SweetAlertMessage,--}}
{{--        })--}}
{{--    }--}}
{{--</script>--}}
@endsection