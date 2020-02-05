<div class="bg">
@extends('layouts.master')

@section('title')
Welcome
@endsection
    @section('subNav')
        {{-- this section will not be shown --}}
    @stop
@section('content')
        @include('includes.message-block')
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100 p-t-30 p-b-50">

                    <form action="{{route('signin')}}" method="post" class="login100-form validate-form p-b-33 p-t-5">
                       <h2 class="text-center"> Account Login </h2>
                        <div class="wrap-input100 validate-input" data-validate = "Enter Email">

                            <input class="input100" type="text" name="email" placeholder="Email" id="email" value="{{Request::old('email')}}">
                            <span class="focus-input100" data-placeholder="&#xe818;"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Enter password">
                            <input class="input100" type="password" name="password" placeholder="Password" id="password" value="{{Request::old('password')}}">
                            <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                        </div>

                        <div class="container-login100-form-btn m-t-32">
                            <button type="submit" class="login100-form-btn">
                                Login
                            </button>
                            <input type="hidden" name="_token" value="{{Session::token()}}">
                        </div>

                    </form>
                </div>
            </div>
        </div>


        <div id="dropDownSelect1"></div>

        <!--===============================================================================================-->
        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/animsition/js/animsition.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/bootstrap/js/popper.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/daterangepicker/moment.min.js"></script>
        <script src="vendor/daterangepicker/daterangepicker.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/countdowntime/countdowntime.js"></script>
        <!--===============================================================================================-->
        <script src="js/main.js"></script>



@endsection
