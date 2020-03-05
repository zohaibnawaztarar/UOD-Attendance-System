@extends('layouts.masterDashboard')

@section('title')
    Welcome
@endsection
@section('subNav')
    {{-- this section will not be shown --}}
@stop
@section('content')
    @include('includes.message-block')
    <h1>This is dashboard page for students only</h1>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-t-30 p-b-50">

                <form action="{{route('students.attendanceSignIn')}}" method="post" class="login100-form validate-form p-b-33 p-t-5">
                    <h2 class="text-center"> Sign Attendance </h2>
                    <div class="wrap-input100 validate-input" data-validate = "Enter PIN">
                        <input class="input100" type="text" name="pin" placeholder="PIN" id="pin" value="{{Request::old('pin')}}">
                        <span class="focus-input100" data-placeholder="&#xe818;"></span>
                        <input type="hidden" name="attendee_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="status" value="1">
                        <input type="hidden" name="session_id" value="2">
                        {{--{{ route('lecturers', ['teach_id' => Auth::user()->id]) }}--}}
                    </div>

                    <div class="container-login100-form-btn m-t-32">
                        <button type="submit" class="login100-form-btn">
                            Sign Now
                        </button>
                        <input type="hidden" name="_token" value="{{Session::token()}}">
                    </div>

                </form>

            </div>
        </div>
    </div>


    {{--=======================================QR Code Scanner=======================================================--}}
        <script src={{asset('js/instascan.min.js')}}></script>

        <video id="preview"></video>

        <script type="text/javascript">
            let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
            scanner.addListener('scan', function (content) {
                console.log(content);
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

        {{--=======================================QR Code Scanner=======================================================--}}




@endsection

{{--<script src="../js/jquery.min.js"></script>
<script src="../js/popper.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/main.js"></script>--}}



