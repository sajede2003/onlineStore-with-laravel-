@extends('layouts.admin')
@section('content')
        <table class="table table-striped border">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">title</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @php $counter = 1; @endphp
            @foreach ($allData as  $data)
            <tr>
                <td>
                    {{$counter++ }}
                </td>
                <td>
                    {{$data->title}}
                </td>
                <td class="f-flex col-2">
                    <form action="{{route('category.destroy',$data->id)}}" method="post" style="display: inline;">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">delete</button>
                    </form>
                    <a href="{{route('category.edit',$data->id)}}" class="btn btn-info"> edit</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{route('category.create')}}" class="btn btn-success">add</a>



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