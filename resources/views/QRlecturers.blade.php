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
    </div>
<script>
    function myFunction() {
        window.print();
    }
</script>
@endsection
