@extends('layouts.master')

@section('title')
    Welcome
@endsection
@section('subNav')
    {{-- this section will not be shown --}}
@stop
@section('content')
    <h1>This is dashboard page for School Staff only</h1>




            <div class="limiter">
                <div class="container-login100">
                    <div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Add Module
				</span>
                        <form action="{{route('schoolAdmin.addModule')}}" method="post" class="login100-form validate-form p-b-33 p-t-5">

                                <div class="wrap-input100 validate-input" data-validate = "Enter Module Code">
                                    <input class="input100" type="text" name="moduleCode" placeholder="Module Code" id="moduleCode" value="{{Request::old('moduleCode')}}">
                                    <span class="focus-input100" data-placeholder="&#xe818;"></span>
                                </div>

                                <div class="wrap-input100 validate-input" data-validate = "Enter Name">
                                    <input class="input100" type="text" name="name" placeholder="Module Name" id="name" value="{{Request::old('name')}}">
                                    <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                                </div>



                                <div class="container-login100-form-btn m-t-32">
                                    <button type="submit" class="login100-form-btn">
                                        Add Module
                                    </button>
                                    <input type="hidden" name="_token" value="{{Session::token()}}">
                                </div>

                        </form>
                        @if (count($errors) > 0)
                            <div class="row">
                                <div class="col-md-4"></div>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li><div align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$error}}</div></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
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


