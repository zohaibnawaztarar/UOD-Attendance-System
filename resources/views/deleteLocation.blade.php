@extends('layouts.masterDashboard')

@section('title')
    Current Locations
@endsection

@section('content')
    @include('includes.message-block')
    <div class="container-fluid">
        <div class="row"></div>
        <h1 class="text-center">Current Locations</h1>

        <table id="example" class="display" style="width:100%">
            <thead>
            <tr>
                <th>Building Name</th>
                <th>Room Name/No.</th>
                <th>Room Capacity</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($locations as $location)
                <tr>
                    <form action="{{ route('deleteLocation.delete', ['location_id' => $location->id]) }}" method="get">
                        <td>{{ $location->building }}</td>
                        <td>{{ $location->room }}</td>
                        <td>{{ $location->capacity }}</td>
                        <td><button class="btn btn-danger" type="submit">Delete Location</button></td>
                    </form>
                </tr>
            @endforeach
            </tbody>
        </table>
@endsection
