@extends('layouts.staff')

@section('title', 'Change Password')
 
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">Change Password</h6>
                </div>
                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @elseif(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group col-md-12 mb-3">
                            <input id="old_password" type="password" placeholder="Old Password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" value="{{ old('old_password') }}" autocomplete="old_password" autofocus>
                        </div>

                        <div class="form-group col-md-12 mb-3">
                            <input id="new_password" type="password" placeholder="New Password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" value="{{ old('new_password') }}" autocomplete="new_password" autofocus>
                        </div>

                        <div class="form-group col-md-12 mb-3">
                            <input id="new_password_confirmation" type="password" placeholder="Confirm Password" class="form-control @error('new_password_confirmation') is-invalid @enderror" name="new_password_confirmation" value="{{ old('new_password_confirmation') }}" autocomplete="new_password_confirmation" autofocus>
                        </div>

                        <button type="submit" id="register" class="btn btn-success mt-3 col-md-12">
                            {{ __('Change') }}
                        </button>
                    </form>
                </div>

        </div>
    </div>
@endsection