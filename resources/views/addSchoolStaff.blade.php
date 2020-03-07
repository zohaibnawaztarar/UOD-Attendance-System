@extends('layouts.masterDashboard')

@section('title')
    Add School Admin
@endsection

@section('content')
    @include('includes.message-block')

    <div class="container-fluid">
        <div class="row"></div>
        <h1 class="text-center"> Add New School Admin </h1>
        <div class="container-login100">
            <div class="wrap-login100 p-t-0 p-b-30">

                <form action="{{route('addSchoolStaff')}}" method="post"
                      class="login100-form validate-form p-b-33 p-t-5">

                    <div class="form-group  {{ $errors->has('email') ? 'has-error' : ''}}">
                        <div class="wrap-input100 validate-input" data-validate="Enter Email">
                            <input class="input100" type="text" name="email" placeholder="Email" id="email"
                                   value="{{Request::old('email')}}">
                            <span class="focus-input100" data-placeholder="&#xe818;"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Enter First Name">
                            <input class="input100" type="text" name="first_name" placeholder="First Name"
                                   id="first_name" value="{{Request::old('first_name')}}">
                            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Enter Last Name">
                            <input class="input100" type="text" name="last_name" placeholder="Last Name" id="last_name"
                                   value="{{Request::old('last_name')}}">
                            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Enter password">
                            <input class="input100" type="password" name="password" placeholder="Password" id="password"
                                   value="{{Request::old('password')}}">
                            <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                        </div>

                        <div class="container-login100-form-btn m-t-32">
                            <button type="submit" class="login100-form-btn">
                                Add School Admin
                            </button>
                            <input type="hidden" name="_token" value="{{Session::token()}}">
                        </div>

                </form>
                @if (count($errors) > 0)
                    <div class="row">
                        <div class="col-md-4"></div>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>
                                    <div align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$error}}</div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>
@endsection
