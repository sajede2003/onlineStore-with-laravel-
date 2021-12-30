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
{{--            @php $counter = 1 @endphp--}}
{{--            @foreach ($allData as $key => $data)--}}
            <tr>
                <td>
{{--                    {{$counter++}}--}}
                </td>
                <td>
{{--                    {{$data->full_name}}--}}
                </td>
                <td>
{{--                    {{$data->phone_number}}--}}
                </td>
                <td>
{{--                    {{$data->email}}--}}
                </td>
                <td class="f-flex col-2">
                    <a href="/dashboard/users/delete?id=
{{--                        {{$data->id}}--}}
                            " class="btn  btn-danger "> delete</a>
                    <a href="/dashboard/users/edit?id=
{{--                        {{$data->id}}--}}
                            " class="btn btn-info"> edit</a>
                </td>
            </tr>
{{--            @endforeach--}}
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