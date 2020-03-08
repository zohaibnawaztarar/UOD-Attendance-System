@extends('layouts.masterDashboard')

@section('title')
    Sign Attendance
@endsection

@section('content')
    @include('includes.message-block')
    <div class="container-fluid">
        <div class="row"></div>
        <h1 class="text-center">Manual Sign In</h1>

        <form action="{{route('manualSignin.Signin')}}" method="post" class="login100-form validate-form p-b-33 p-t-5">
            <br>
            <h1 class="text-center"> Enter Session PIN </h1>
            <div class="wrap-input100 validate-input" data-validate = "Enter PIN">
                <input class="input100" type="text" name="pin" placeholder="PIN" id="pin" value="{{Request::old('pin')}}">
                <span class="focus-input100" data-placeholder="&#xe818;"></span>
                {{--<input type="hidden" name="attendee_id" value="{{Auth::user()->id}}">--}}
                <input type="hidden" name="status" value="1">
                {{--  <input type="hidden" name="session_id" value="2">--}}

            </div>
            <br>
            <br>
            <div class="grouped fields field">

                <label style="-webkit-text-stroke: medium;">Select Student(s)</label>

                <table id="example" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th>Student First Name</th>
                        <th>Student Last Name</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    @isset($students)
                        @foreach ($students as $data)
                            <tr>
                                <td><div class="field">
                                        <div class="ui checkbox">
                                            <input type="checkbox" name="attendee_id[]" value="{{$data->id}}" id="student_id">
                                            <label>{{$data->first_name}}</label>
                                        </div>
                                    </div></td>
                                <td><label>{{$data->last_name}}</label></td>
                                <td><label>{{$data->email}}</label></td>
                            </tr>
                @endforeach
                @endisset

            </div>
            </tbody>
            </table>
            <div class="container-login100-form-btn m-t-32">
                <button class="login100-form-btn" type="submit" name="submit"> Sign Student(s)</button>
            </div>
        </form>

    </div>

    <br>
@endsection
