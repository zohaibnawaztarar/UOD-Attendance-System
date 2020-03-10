@extends('layouts.masterDashboard')

@section('title')
    Enrol Students
@endsection

@section('content')
    @include('includes.message-block')
    <div class="container-fluid">
        <div class="row"></div>
        <h1 class="text-center">Enrol Students</h1>

        <form id="add_schedule_form" action="{{route('moduleEnrolment.moduleEnrolment')}}" class="" method="post" accept-charset="utf-8">
            {{ csrf_field() }}

            <div class="field ui form">
                <label style="-webkit-text-stroke: medium;">Select Module</label>
                <select class="ui search dropdown getid uppercase" name="module_id">
                    <option value="">Select Module</option>
                    @isset($modules)
                        @foreach ($modules as $module)
                            <option   value="{{ $module->id }}" id="module_id">{{$module->moduleCode}} - {{$module->name}} </option>
                        @endforeach
                    @endisset
                </select>
            </div>

            <br>
            <div class="grouped fields field">

                <label style="-webkit-text-stroke: medium;">Select Student(s)</label>

                <table id="example" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th>Student First Name</th>
                        <th>Student Last Name</th>
                        <th>Email</th>

                    </tr>
                    </thead>
                    <tbody>
                    @isset($students)
                        @foreach ($students as $data)
                            <tr>
                                <td><div class="field">
                                        <div class="ui checkbox">
                                            <input type="checkbox" name="student_id[]" value="{{$data->id}}" id="student_id">
                                            <label>{{$data->first_name}}</label>
                                        </div>
                                    </div></td>
                                <td><label>{{$data->last_name}}</label></td>
                                <td><label>{{$data->email}}</label></td>

                            </tr>
                @endforeach
                @endisset

            </div>
            </tbody>
            </table>
<div class="container-login100-form-btn m-t-32">
            <button class="login100-form-btn" type="submit" name="submit"> Enrol Student(s)</button>
    </div>
        </form>

    </div>
@endsection
