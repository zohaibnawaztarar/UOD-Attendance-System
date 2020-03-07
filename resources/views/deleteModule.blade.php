@extends('layouts.masterDashboard')

@section('title')
   Current Modules
@endsection

@section('content')
    @include('includes.message-block')
    <div class="container-fluid">
        <div class="row"></div>
        <h1 class="text-center">Current Modules</h1>

        <table id="example" class="display" style="width:100%">
            <thead>
            <tr>
                <th>Module Code</th>
                <th>Module Name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($modules as $module)
                <tr>
                    <form action="{{ route('deleteModule.delete', ['module_id' => $module->id]) }}" method="get">
                        <td>{{ $module->moduleCode }}</td>
                        <td>{{ $module->name }}</td>

                        <td><button class="btn btn-danger" type="submit">Delete Module</button></td>
                    </form>
                </tr>
            @endforeach
        </table>
        </tbody>
@endsection
