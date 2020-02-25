@extends('layouts.masterDashboard')

@section('title')
    Welcome
@endsection
@section('subNav')
    {{-- this section will not be shown --}}
@stop


@section('content')
    @include('includes.message-block')
    <h1 class="text-center">View or Delete Teaching Staff</h1>


                <table width="100%" class="table table-striped table-hover" id="dataTables-example" data-order='[[ 7, "desc" ]]'>



        <thead>
        <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>E-Mail</th>

        <th>Action</th>

        <tr>
        </thead>
        <tbody>
        @foreach($users as $user)

            <tr>
                <form action="{{ route('systemAdmin.delete', ['user_id' => $user->id]) }}" method="get">
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"></td>

                    {{--{{ csrf_field() }}--}}

                    <td><button type="submit">Delete User</button></td>
                </form>
            </tr>
        </tbody>
        @endforeach

    </table>



    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTables-example').DataTable({responsive: true,pageLength: 15,lengthChange: false,searching: true,sorting: false,});
        });

        $('.jtimepicker').mdtimepicker({ format: 'hh:mm:ss', hourPadding: true });
        $('.airdatepicker').datepicker({ language: 'en', dateFormat: 'yyyy-mm-dd' });

        $('.ui.dropdown.getid').dropdown({ onChange: function(value, text, $selectedItem) {
                $('select[name="module"] option').each(function() {
                    if($(this).val()==value) {var id = $(this).attr('data-id');$('input[name="id"]').val(id);};
                });
            }});

    </script>

@endsection
