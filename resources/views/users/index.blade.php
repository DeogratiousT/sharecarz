@extends('layouts.main')

@section('main')
    <h3 class="float-left">Users</h3>

    <a href="{{ route('users.create') }}" class="btn btn-info float-right mb-2"><i class="mdi mdi-plus-circle mr-1"></i>Add User</a>

    <div class="clearfix"></div>

    <table id="users-laratable" class="table table-hover table-centered w-100 dt-responsive nowrap">
        <thead class="thead-light">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>

    <script>
        $(document).ready(function(){
            $("#users-laratable").DataTable({
                serverSide: true,
                ajax: "{{ route('users.index') }}",
                columns: [
                    { name: 'name' },
                    { name: 'email' },
                    { name: 'role.name', orderable:false },
                    { name: 'state', orderable:false, searchable:false },
                    { name: 'created_at' },
                    { name: 'action', orderable:false, searchable:false },
                ],
            });
        });
    </script>

    <!-- JQUERY -->
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>

@endsection