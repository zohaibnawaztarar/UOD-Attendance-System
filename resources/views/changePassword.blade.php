@extends('layouts.masterDashboard')

@section('title')
    Change Password
@endsection
@section('subNav')
    {{-- this section will not be shown --}}
@stop


@section('content')
    @include('includes.message-block')

    <div class="container-fluid">
        <div class="row"></div>
        <h1 class="text-center"> Change your Password </h1>
        <div class="container-login100">
            <div class="wrap-login100 p-t-0 p-b-30">






                        <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
                            {{ csrf_field() }}
                            {{ $errors->has('current-password') ? ' has-error' : '' }}
                            <div class="form-group">
                                <label for="new-password" class="">Current Password</label>

                                <div class="">
                                    <input id="current-password" type="password" class="form-control" name="current-password" required>


                                </div>
                            </div>

                            <div class="form-group">
                                <label for="new-password" class="">New Password</label>

                                <div class="">
                                    <input id="new-password" type="password" class="form-control" name="new-password" required>


                                </div>
                            </div>

                            <div class="form-group">
                                <label for="new-password-confirm" class="">Confirm New Password</label>

                                <div class="">
                                    <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="container-login100-form-btn m-t-32">
                                    <button type="submit" class="login100-form-btn">
                                        Change Password
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
