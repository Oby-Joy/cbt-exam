@extends('layouts.master')

@section('title', 'Edit Staff')

@section('content')
<div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Add Worker</h6>
            </div>
            <div class="card-body">
                @if($message = Illuminate\Support\Facades\Session::get('success'))
                    <div class="alert alert-success"> 
                        {{ $message }}
                    </div>
                @endif
                <form action="/admin/{{$worker->id}}" method="POST" class="my-2">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="form-group col-md-6 mb-3">
                        <label for="first_name">First Name<span style="color:red;">*</span></label>
                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $worker->first_name }}" placeholder="First Name" autocomplete="first_name" autofocus>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="last_name">Last Name<span style="color:red;">*</span></label>
                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $worker->last_name }}" placeholder="Last Name" autocomplete="last_name" autofocus>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="user_name">User Name<span style="color:red;">*</span></label>
                        <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ $worker->user_name }}" placeholder="User Name" autocomplete="user_name" autofocus disabled>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="email">Email Address<span style="color:red;">*</span></label>  
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $worker->email }}" placeholder="Email" autocomplete="email" autofocus>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="state_of_origin">State Of Origin<span style="color:red;">*</span></label>
                        <input id="state_of_origin" type="text" class="form-control @error('state_of_origin') is-invalid @enderror" name="state_of_origin" placeholder="State of Origin" value="{{ $worker->state_of_origin}}" autocomplete="state_of_origin" autofocus>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="gender">Gender</label>
                        <select name="gender" id="inputState" class="form-control">
                        	<option value="{{ $worker->gender }}" selected>{{ $worker->gender }}</option>
                            <option value="Male" >Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="qualification">Qualification</label>
                        <select name="qualification" id="inputState" class="form-control">
                        	<option value="{{ $worker->qualification }}" selected>{{ $worker->qualification }}</option>
                            <option value="BSc" >BSc</option>
                            <option value="HND">HND</option>
                            <option value="OND">OND</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="year_of_birth">Year of Birth</label>
                        <select name="year_of_birth" id="inputState" class="form-control">
                        	<option value="{{ $worker->year_of_birth }}" selected>{{ $worker->year_of_birth }}</option>
                            @for($i = 1000; $i <= 2022; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" value="{{ $worker->password }}" autocomplete="password" disabled autofocus>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-8">
                            <button type="submit" id="register" class="btn btn-success">
                                {{ __('Save') }}
                            </button>
                            <button type="submit" class="btn btn-danger">
                                {{ __('Cancel') }}
                            </button>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    <div>
@endsection