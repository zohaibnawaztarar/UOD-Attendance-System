@extends('layouts.masterDashboard')

@section('title')
    Add New Location
@endsection
@section('subNav')
    {{-- this section will not be shown --}}
@stop
@section('content')
    @include('includes.message-block')

            <div class="limiter">
                <div class="container-login100">
                    <div class="wrap-login100 p-t-30 p-b-50">

                        <form action="{{route('schoolAdmin.addLocation')}}" method="post" class="login100-form validate-form p-b-33 p-t-5">
                            <h2 class="text-center"> Add Location </h2>
                                <div class="wrap-input100 validate-input" data-validate = "Enter Building Name">
                                    <input class="input100" type="text" name="building" placeholder="Building Name" id="building" value="{{Request::old('building')}}">
                                    <span class="focus-input100" data-placeholder="&#xe818;"></span>
                                </div>

                                <div class="wrap-input100 validate-input" data-validate = "Enter Room Name/No.">
                                    <input class="input100" type="text" name="room" placeholder="Room Name/No." id="room" value="{{Request::old('room')}}">
                                    <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                                </div>

                            <div class="wrap-input100 validate-input" data-validate = "Enter Room Capacity">
                                <input class="input100" type="text" name="capacity" placeholder="Room Capacity" id="capacity" value="{{Request::old('capacity')}}">
                                <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                            </div>



                                <div class="container-login100-form-btn m-t-32">
                                    <button type="submit" class="login100-form-btn">
                                        Add Location
                                    </button>
                                    <input type="hidden" name="_token" value="{{Session::token()}}">
                                </div>

                        </form>

                    </div>
                </div>
            </div>








@endsection


