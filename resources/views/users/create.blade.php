@extends('layouts.main')

@section('main')

<h3>Users <small> > Create</small> </h3>

    <div class="container">
        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}" type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" placeholder="Enter the First Name" required>
                @if ($errors->has('first_name'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('first_name') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="other_names">Other Names</label>
                <input class="form-control {{ $errors->has('other_names') ? ' is-invalid' : '' }}" type="text" id="other_names" name="other_names" value="{{ old('other_names') }}" placeholder="Enter the user Other Names" required>
                @if ($errors->has('other_names'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('other_names') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input class="form-control {{ $errors->has('phone_number') ? ' is-invalid' : '' }}" type="integer" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" placeholder="Enter the user phone number" required>
                @if ($errors->has('phone_number'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('phone_number') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="organisation">Organisation / Institution</label>
                <input class="form-control {{ $errors->has('organisation') ? ' is-invalid' : '' }}" type="text" id="organisation" name="organisation" value="{{ old('organisation') }}" placeholder="Enter the user Organisation / Institution">
                @if ($errors->has('organisation'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('organisation') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="email">User Email</label>
                <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" id="email" name="email" value="{{ old('email') }}" placeholder="Enter the User Email" required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('email') }}
                    </span>
                @endif
            </div>

            <input type="hidden" name="password" value="Password1234">
            <input type="hidden" name="password_confirmation" value="Password1234">
            <input type="hidden" name="verif" value="verif">

            <div class="form-group">
                <label for="role_id">Role</label>
                <select class="form-control {{ $errors->has('role_id') ? ' is-invalid' : '' }}" name="role_id" id="role_id">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('role_id'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('role_id') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="profile_image">Profile Image</label>
                <input type="file" id="profile_image" name="profile_image" class="form-control-file {{ $errors->has('profile_image') ? ' is-invalid' : '' }}">
                @if ($errors->has('profile_image'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('profile_image') }}
                    </span>
                @endif
            </div>

            <div class="form-group mb-2 text-center">
                <button class="btn btn-primary btn-block" type="submit">
                    <i class="mdi mdi-content-save"></i> Submit
                </button>
            </div>
        </form>
    </div>
@endsection