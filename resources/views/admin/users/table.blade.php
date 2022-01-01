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
            <tr>
                <td>
                    {{$counter++}}
                </td>
                <td>
                    {{auth()->user()->name}}
                </td>
                <td>
                    {{auth()->user()->phone_number}}
                </td>
                <td>
                    {{auth()->user()->email}}
                </td>
                <td class="f-flex col-2">
                    <a href="/dashboard/users/delete?id=
                        {{auth()->user()->id}}
                            " class="btn  btn-danger "> delete</a>
                    <a href="/dashboard/users/edit?id=
                        {{auth()->user()->id}}
                            " class="btn btn-info"> edit</a>
                </td>
            </tr>
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