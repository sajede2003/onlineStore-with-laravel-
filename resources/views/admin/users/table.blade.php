@extends('layouts.admin')
@section('content')
        <table class="table table-striped border">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Full name</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Email</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            @php $counter = 1 @endphp
            @foreach ($users as $user)
            <tr>
                <td>
                    {{$counter++}}
                </td>
                <td>
                    {{$user->name}}
                </td>
                <td>
                    {{$user->phone_number}}
                </td>
                <td>
                    {{$user->email}}
                </td>
                <td class="f-flex col-2">
                    <form action="{{route('users.destroy',$user->id)}}" method="post" style="display: inline;">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">delete</button>
                    </form>
                    <a href="{{route('users.edit',$user->id)}}" class="btn btn-info"> edit</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

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