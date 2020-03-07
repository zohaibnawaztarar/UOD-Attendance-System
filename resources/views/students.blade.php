@extends('layouts.masterDashboard')

@section('title')
    Sign Attendance
@endsection

@section('content')
    @include('includes.message-block')
    <div class="container-fluid">
        <div class="row"></div>
            <h1 class="text-center"> To sign attendance scan the QR code or enter the PIN code displayed in session  </h1>
        <div class="row">
        <div class="col-sm-6">

                <div class="container-login100">


                    {{--=======================================QR Code Scanner=======================================================--}}
                    <script src={{asset('js/instascan.min.js')}}></script>

                    <video id="preview" style="max-width: 100%;"></video>

                    <script type="text/javascript">
                        let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
                        scanner.addListener('scan', function (content) {
                            console.log(content);
                            window.location.replace(content+{{Auth::user()->id}});
                        });
                        Instascan.Camera.getCameras().then(function (cameras) {
                            if (cameras.length > 0) {
                                scanner.start(cameras[0]);
                            } else {
                                console.error('No cameras found.');
                            }
                        }).catch(function (e) {
                            console.error(e);
                        });
                    </script>
                </div>

            </div>
            {{--=======================================QR Code Scanner=======================================================--}}
            <div class="col-sm-6">


                <div class="container-login100">


                    <form action="{{route('students.attendanceSignIn')}}" method="get" class="login100-form validate-form p-b-33 p-t-5">
                       <br>
                        <h1 class="text-center"> Enter Session PIN </h1>
                        <div class="wrap-input100 validate-input" data-validate = "Enter PIN">
                            <input class="input100" type="text" name="pin" placeholder="PIN" id="pin" value="{{Request::old('pin')}}">
                            <span class="focus-input100" data-placeholder="&#xe818;"></span>
                            <input type="hidden" name="attendee_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="status" value="1">
                            <input type="hidden" name="session_id" value="2">

                        </div>

                        <div class="container-login100-form-btn m-t-32">
                            <button type="submit" class="login100-form-btn">
                                Sign Now
                            </button>
                            <br>
                            <input type="hidden" name="_token" value="{{Session::token()}}">
                        </div>
                        <br>
                    </form>

                </div>
            </div>
        </div>
    </div>









@endsection
