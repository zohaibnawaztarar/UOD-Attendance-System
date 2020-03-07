@extends('layouts.masterDashboard')

@section('title')
    Add New Module
@endsection
@section('subNav')
    {{-- this section will not be shown --}}
@stop
@section('content')
    @include('includes.message-block')

    <div class="container-fluid">
        <div class="row"></div>
        <h1 class="text-center"> Add New Module </h1>
        <div class="container-login100">
            <div class="wrap-login100 p-t-0 p-b-30">

                <form action="{{route('schoolAdmin.addModule')}}" method="post"
                      class="login100-form validate-form p-b-33 p-t-5">

                    <div class="wrap-input100 validate-input" data-validate="Enter Module Code">
                        <input class="input100" type="text" name="moduleCode" placeholder="Module Code" id="moduleCode"
                               value="{{Request::old('moduleCode')}}">
                        <span class="focus-input100" data-placeholder="&#xe890;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter Name">
                        <input class="input100" type="text" name="name" placeholder="Module Name" id="name"
                               value="{{Request::old('name')}}">
                        <span class="focus-input100" data-placeholder="&#xe828;"></span>
                    </div>


                    <div class="container-login100-form-btn m-t-32">
                        <button type="submit" class="login100-form-btn">
                            Add Module
                        </button>
                        <input type="hidden" name="_token" value="{{Session::token()}}">
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection


