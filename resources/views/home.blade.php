@extends('layouts.master')

@section('title')
Welcome
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3>Sign Up</h3>
            <form action="{{route('signup')}}" method="post">
                <div class="form-group  {{ $errors->has('email') ? 'has-error' : ''}}">
                    <label for="email">Your E-mail</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{Request::old('email')}}">
                </div>
                <div class="form-group">
                    <label for="first_name">Your First Name</label>
                    <input class="form-control" type="text" name="first_name" id="first_name" value="{{Request::old('first_name')}}">
                </div>
                <div class="form-group">
                    <label for="password">Your Password</label>
                    <input class="form-control" type="password" name="password" id="password" value="{{Request::old('password')}}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
            @if (count($errors) > 0)
                <div class="row">
                    <div class="col-md-4"></div>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="col-md-6">
            <h3>Sign In</h3>
            <form action="{{route('signin')}}" method="post">
                <div class="form-group">
                    <label for="email">Your E-mail</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{Request::old('email')}}">
                </div>
                <div class="form-group">
                    <label for="password">Your Password</label>
                    <input class="form-control" type="password" name="password" id="password" value="{{Request::old('password')}}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>
    </div>
@endsection
