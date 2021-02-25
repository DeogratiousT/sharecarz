@extends('layouts.app')

@section('content')

<h3>Users <small> {{ $user->name }} > Edit</small> </h3>

    <div class="container">
        <form action="{{ route('users.update',$user) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="name">User Name</label>
                <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" id="name" name="name" value="{{ $user->name }}" required>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('name') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="email">User Email</label>
                <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" id="email" name="email" value="{{ $user->email }}" required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('email') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="role_id">Role</label>
                <select class="form-control {{ $errors->has('role_id') ? ' is-invalid' : '' }}" name="role_id" id="role_id">
                    @foreach ($roles as $role)
                        <option @if($user->role->name == $role->name) selected @endif value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('role_id'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('role_id') }}
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