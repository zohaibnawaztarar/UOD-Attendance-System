@extends('layouts.masterDashboard')

@section('title')
    Settings
@endsection

@section('content')
    @include('includes.message-block')

    <div class="container-fluid">
        <div class="row"></div>
        <h1 class="text-center"> IP Restriction </h1>
        <div class="container-login100">
            <div class="wrap-login100 p-t-0 p-b-30">

                        <form action="{{route('settings.addIP')}}" method="post" class="login100-form validate-form p-b-33 p-t-5">

                            <label class="text-center">Enter allowed IP address. If more than one, add comma after each IP address.</label>
                                <div class="wrap-input100 validate-input" data-validate = "Enter IP Address">
                                   <textarea class="input100" name="ip" rows="5" placeholder="">@isset($settings){{ $settings}}@endisset</textarea>

                                    <span class="focus-input100" data-placeholder="&#xe810;"></span>

                                </div>




                                <div class="container-login100-form-btn m-t-32">
                                    <button type="submit" class="login100-form-btn">
                                       Update
                                    </button>
                                    <input type="hidden" name="_token" value="{{Session::token()}}">
                                </div>

                        </form>

                    </div>
                </div>
            </div>








@endsection


