@extends('layouts.master')

@section('title', 'Edit Students Profile')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Brand Buttons -->
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Edit Student</h6>
                </div>
                <div class="card-body">
                    @if(session()->get('success'))
                        <div class="alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <p>Input all fields</p>
                    <form action="/admin/student/{{ $student->id }}" method="POST" class="my-2">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="form-group col-md-6 mb-3">
                            <label for="first_name">First Name<span style="color:red;">*</span></label>

                            <input id="first_name" type="text" placeholder="First Name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $student->first_name }}" required autocomplete="first_name" autofocus>

                            
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="lname">Last Name<span style="color:red;">*</span></label>

                            <input id="last_name" type="text" placeholder="Last Name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $student->last_name }}" required autocomplete="last_name" autofocus>
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="email">Email Address<span style="color:red;">*</span></label>

                            <input id="email" type="text" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $student->email }}" required autocomplete="email" autofocus>
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="sog">State of Origin<span style="color:red;">*</span></label>
                            <input id="state_of_origin" type="text" placeholder="State of Origin" class="form-control @error('state_of_origin') is-invalid @enderror" name="state_of_origin" value="{{ $student->state_of_origin }}" required autocomplete="state_of_origin" autofocus>
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="command">Command<span style="color:red;">*</span></label>
                            <input id="command" type="text" placeholder="Command" class="form-control @error('command') is-invalid @enderror" name="command" value="{{ $student->command }}" required autocomplete="command" autofocus>
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="apf">AP/F No.<span style="color:red;">*</span></label>
                            <input id="apf" type="text" placeholder="AP/F No." class="form-control @error('apf') is-invalid @enderror" name="apf" value="{{ $student->apf }}" required autocomplete="apf" autofocus>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputState">Gender</label>
                            <select name="gender" id="inputState" class="form-control">
                                <option value="{{ $student->gender }}" selected>{{ $student->gender }}</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputState">Date of Enlistment</label>
                            <input name="date_of_enlistment" value="{{ $student->date_of_enlistment }}" type="text" class="form-control" data-provide="datepicker"> 
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputState">Qualification</label>
                            <select name="qualification" id="inputState" class="form-control">
                                <option value="{{$student->qualification}}" selected>{{$student->qualification}}</option>
                                <option value="Bsc">BSc</option>
                                <option value="HND">HND</option>
                                <option value="OND">OND</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                             <label for="inputState">Year of Birth</label>
                            <select name="year_of_birth" id="inputState" class="form-control">
                                <option value="{{ $student->year_of_birth }}" selected>{{ $student->year_of_birth }}</option>
                                @for($i = 1800; $i <= 2022; $i++)
                                    <option value="{{ $i }}">
                                        {{ $i }}
                                    </option>
                                @endfor
                                               
                            </select>
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="course_number">Course Number</label>
                            <input id="course_number" type="text" placeholder="Course Number" class="form-control @error('course_number') is-invalid @enderror" name="course_number" value="{{ $student->course_number }}" required autocomplete="course_number" autofocus>
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="password">Course Number</label>
                            <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ $student->password }}" required autocomplete="password" autofocus disabled>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8">
                                <button id="register" type="submit" class="btn btn-success">
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

        </div>
    </div>


@endsection