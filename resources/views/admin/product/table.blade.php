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
{{--                @php $counter = 1; @endphp--}}
{{--                @foreach ($allData as $key => $data):--}}
                <tr>
                    <th scope="row">
{{--                        {{$counter++}}--}}
                    </th>
                    <td>
{{--                         $data->title--}}
                    </td>
                    <td>
                        <div style="display:flex; justify-content:end;">
                            <a href="/dashboard/product/delete?id=
{{--                                {{$data->id}}--}}
                                    " class="btn btn-danger text-white">delete</a>
                            <a href="/dashboard/product/edit?id=
{{--                                {{$data->id}} --}}
                                    " class="btn btn-info text-white mx-2">edit</a>
                        </div>
                    </td>
                </tr>
{{--                @endforeach--}}
                </tbody>
            </table>
            <a class="btn btn-success" href="/dashboard/product/add"> add </a>

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