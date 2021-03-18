@extends('layouts.main')

@section('main')
<div class="container">
    <br>
    <h3 class="float-left">My Rides</h3>

    {{-- <a href="{{ route('users.create') }}" class="btn btn-info float-right mb-2"><i class="mdi mdi-plus-circle mr-1"></i>Add User</a> --}}

    <div class="clearfix"></div>

    <table id="rides-laratable" class="table table-hover table-centered w-100 dt-responsive nowrap">
        <thead class="thead-light">
            <tr>
                <th>Serial</th>
                <th>Driver</th>
                <th>Driver's Phone</th>
                <th>Car Model</th>
                <th>Car Plate No.</th>
                <th>Car Capacity</th>
                <th>Status</th>
                <th>Created At</th>
            </tr>
        </thead>
    </table>

    <script>
        $(document).ready(function(){
            $("#rides-laratable").DataTable({
                serverSide: true,
                ajax: "{{ route('hire-cars-my-rides') }}",
                columns: [
                    { name: 'id' },
                    { name: 'driver.name', orderable:false, searchable:false },
                    { name: 'driver.phone_number', orderable:false, searchable:false },
                    { name: 'driver.car_model', orderable:false, searchable:false },
                    { name: 'driver.car_plate_number', orderable:false, searchable:false },
                    { name: 'driver.car_capacity', orderable:false, searchable:false },
                    { name: 'status', orderable:false, searchable:false },
                    { name: 'created_at' },
                ],
            });
        });
    </script>

    <!-- JQUERY -->
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
</div>
@endsection