@extends('layouts.masterDashboard')

@section('title')
    Enrol Students
@endsection
@section('subNav')
    {{-- this section will not be shown --}}
@stop

@section('content')
    @include('includes.message-block')
    <div class="limiter">
    <h1>Enrol Students</h1>

    <form id="add_schedule_form" action="{{route('moduleEnrolment.moduleEnrolment')}}" class="ui form" method="post" accept-charset="utf-8">
        {{ csrf_field() }}



            <div class="field">
                <label>Module</label>
                <select class="ui search dropdown getid uppercase" name="module_id">
                    <option value="">Select Module</option>
                    @isset($modules)
                        @foreach ($modules as $module)
                            <option   value="{{ $module->id }}" id="module_id">{{$module->moduleCode}} - {{$module->name}} </option>

                        @endforeach
                    @endisset
                </select>
            </div>

           {{-- <div class="grouped fields field">
            <label>Select Module</label>


                    @isset($modules)
                        @foreach ($modules as $data)
                    <div class="field">
                        <div class="ui checkbox">
                    <input type="checkbox" name="module_id" value="{{$data->id}}" id="module_id">
                    <label>{{$data->moduleCode}} - {{$data->name}}</label>
                        </div>
                    </div>
                        @endforeach
                    @endisset
            </div>--}}

            <div class="grouped fields field">

            <label>Select Student</label>


                @isset($students)
                    @foreach ($students as $data)
                        <div class="field">
                            <div class="ui checkbox">
                        <input type="checkbox" name="student_id[]" value="{{$data->id}}" id="student_id">
                        <label>{{$data->first_name}}  {{$data->last_name}}</label>
                            </div>
                        </div>
                    @endforeach
                @endisset

            </div>





            <button class="ui positive small button" type="submit" name="submit"><i class="ui checkmark icon"></i> Enrol</button>

        <br><br>


    </form>
    </div>



    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('/vendor/mdtimepicker/mdtimepicker.js') }}"></script>
    <script src="{{ asset('/vendor/air-datepicker/dist/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('/vendor/air-datepicker/dist/js/i18n/datepicker.en.js') }}"></script>




@endsection

