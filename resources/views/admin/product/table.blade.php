@extends('layouts.admin')
@section('content')
            <table class="table table-striped border">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">title</th>
                    <th scope="col"> </th>
                </tr>
                </thead>
                <tbody>
                @php $counter = 1 @endphp
                @foreach ($productData as $data)

                <tr>
                    <th scope="row">
                        {{$counter++}}
                    </th>
                    <td>
                        {{$data->title}}
                    </td>
                    <td>
                        <div style="display:flex; justify-content:end;">
                            <form action="{{route('product.destroy',$data->id)}}" method="post" style="display: inline;">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit">delete</button>
                            </form>
                            <a href="{{route('product.edit',$data->id)}}" class="btn btn-info"> edit</a>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <a href="{{route('product.create')}}" class="btn btn-success">add</a>

{{--<input type="hidden" value="<?= isset($message)?$message:''?>" id="message">--}}

{{--<script>--}}
{{--    // let link = document.querySelector('#contact');--}}

{{--    var SweetAlertMessage = document.querySelector('#message').value;--}}
{{--    if (SweetAlertMessage.trim() !== '') {--}}
{{--        Swal.fire({--}}
{{--            icon: 'success',--}}
{{--            title: 'yeah',--}}
{{--            text: SweetAlertMessage,--}}
{{--            //footer: '<a href="">Why do I have this issue?</a>'--}}
{{--        })--}}
{{--    }--}}
{{--</script>--}}
@endsection