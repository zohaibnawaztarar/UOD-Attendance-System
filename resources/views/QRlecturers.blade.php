@extends('layouts.masterDashboard')

@section('title')
    Welcome
@endsection
@section('subNav')
    {{-- this section will not be shown --}}
@stop
@section('content')
    @include('includes.message-block')
    <div class="container-fluid">
        <div class="row"></div>
        <h1 class="text-center"> Scan the QR code or use the PIN below to sign in for this session</h1>
        <div class="container-login100">
            <div class="p-t-0 p-b-30">



    {!!  QrCode::size(300)->generate('https://newsite.local/students/attendanceSignIn?pin='.$lec->pin.'&status=1&attendee_id=') !!}

    <h1 class="text-center">PIN: {{$lec->pin}} </h1>
                <div class="container-login100-form-btn m-t-32 hidden-print">
                    <button class="login100-form-btn hidden-print d-print-none" onclick="myFunction()"> Print</button>
                </div>
            </div>
        </div>



                {{-- Testing Absent below this part--}}
        <div class="container-login100">
            <div class="p-t-0 p-b-30">
                <form action="{{route('students.attendanceAbsentSignIn')}}" method="get" class="">

                    <input type="hidden" name="pin" placeholder="PIN" id="pin" value="{{$lec->pin}}">
                    <input type="hidden" name="status" value="0">
                    {{--attendee_id remove it from here--}}
                    {{--<input type="hidden" name="attendee_id" value="{{Auth::user()->id}}">--}}

                    <div class="container-login100-form-btn m-t-32">
                        <button type="submit" class="login100-form-btn hidden-print d-print-none">
                            Complete Attendance Collection
                        </button>
                        <br>
                        <input type="hidden" name="_token" value="{{Session::token()}}">
                    </div>
                    <br>
                </form>
            </div>
        </div>
                {{--Absent Testing Ends here--}}











    </div>
<script>
    function myFunction() {
        window.print();
    }
</script>
@endsection
