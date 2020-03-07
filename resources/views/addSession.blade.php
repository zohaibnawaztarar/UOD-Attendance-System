@extends('layouts.masterDashboard')

@section('title')
    Add Session
@endsection
@section('subNav')
    {{-- this section will not be shown --}}
@stop

@section('content')
    @include('includes.message-block')
    <div class="container-fluid">
        <div class="row"></div>
        <h1 class="text-center"> Add New Teaching Session </h1>




    <form id="add_schedule_form" action="{{route('addSession.addSession')}}" class="ui form" method="post" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="two fields">
        <div class="field">
            <label>Module</label>
            <select class="ui search dropdown getid uppercase" name="module_id">
                <option value="">Select Module</option>
                @isset($modules)
                    @foreach ($modules as $module)
                     <option  value="{{ $module->id }}" id="{{ $module->id }}">{{ $module->moduleCode }} - {{ $module->name }}</option>
                    @endforeach
                @endisset
            </select>
        </div>

            <div class="field">
                <label>Location</label>
                <select class="ui search dropdown getid uppercase" name="location_id">
                    <option value="">Select Location</option>
                    @isset($locations)
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}" id="location">{{ $location->building }} - {{ $location->room }} - {{ $location->capacity }} </option>
                        @endforeach
                    @endisset
                </select>
            </div>


        </div>

        <div class="two fields">
            <div class="field">
                <label for="">Start time</label>
                <input type="text" placeholder="00:00:00 AM" name="startTime" class="jtimepicker" id="startTime" value="{{Request::old('startTime')}}"/>
            </div>
            <div class="field">
                <label for="">End time</label>
                <input type="text" placeholder="00:00:00 PM" name="endTime" class="jtimepicker" id="endTime" value="{{Request::old('endTime')}}" />
            </div>
        </div>

        <div class="two fields">
        <div class="field">
            <label for="">Date</label>
            <input type="text" placeholder="Date" name="startDate" id="startDate" class="airdatepicker" value="{{Request::old('startDate')}}" />
        </div>

            <div class="field">
                <label>Teaching Staff</label>
                <select class="ui search dropdown getid uppercase" name="teacher_id">
                    <option value="">Select Teaching Staff</option>
                    @isset($teachers)
                        @foreach ($teachers as $teacher)
                            <option   value="{{ $teacher->id }}" id="{{ $teacher->id }}">{{ $teacher->first_name }}  {{ $teacher->last_name }} </option>

                        @endforeach
                    @endisset
                </select>
            </div>

            <input type="hidden" name="pin"  id="pin" value="{{rand(0,999)}}">
    </div>

        <div class="actions container-login100-form-btn m-t-32">
            <input type="hidden" name="id" value="">
            <button class="login100-form-btn align-right" type="submit" name="submit"> Add Teaching Session</button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
        <br><br>

        </div>
    </form>



    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('/vendor/mdtimepicker/mdtimepicker.js') }}"></script>
    <script src="{{ asset('/vendor/air-datepicker/dist/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('/vendor/air-datepicker/dist/js/i18n/datepicker.en.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTables-example').DataTable({responsive: true,pageLength: 15,lengthChange: false,searching: true,sorting: false,});
        });

        $('.jtimepicker').mdtimepicker({ format: 'hh:mm:ss', hourPadding: true });
        $('.airdatepicker').datepicker({ language: 'en', dateFormat: 'yyyy-mm-dd' });


    </script>


@endsection

