@extends('layouts.master')

@section('title', 'Add Students')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Brand Buttons -->
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Course Participant Registration</h6>
                </div>
                <div class="card-body">
                    @if($message = Illuminate\Support\Facades\Session::get('success'))
                        <div class="alert alert-success"> 
                            {{ $message }}
                        </div>
                    @endif
                    <p>Input all fields</p>
                    <form action="/admin/create-students" method="POST" class="my-2">
                        @csrf
                        <div class="form-group col-md-6 mb-3">
                            <label for="fname">First Name<span style="color:red;">*</span></label>

                            <input id="first_name" type="text" placeholder="First Name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" autocomplete="first_name" autofocus>

                            @error('first_name')
                               <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="lname">Last Name<span style="color:red;">*</span></label>

                            <input id="last_name" type="text" placeholder="Last Name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" autocomplete="last_name" autofocus>

                            @error('last_name')
                               <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="email">Email Address<span style="color:red;">*</span></label>

                            <input id="email" type="text" placeholder="Last Name" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                            @error('email')
                               <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="state_of_origin">State of Origin<span style="color:red;">*</span></label>
                            <input id="state_of_origin" type="text" placeholder="SOG" class="form-control @error('state_of_origin') is-invalid @enderror" name="state_of_origin" value="{{ old('state_of_origin') }}" autocomplete="state_of_origin" autofocus>

                            @error('state_of_origin')
                               <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="command">Command<span style="color:red;">*</span></label>
                            <input id="command" type="text" placeholder="Command" class="form-control @error('command') is-invalid @enderror" name="command" value="{{ old('command') }}" required autocomplete="command" autofocus>

                            @error('command')
                               <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="apf">AP/F No.<span style="color:red;">*</span></label>
                            <input id="apf" type="text" placeholder="AP/F No." class="form-control @error('apf') is-invalid @enderror" name="apf" value="{{ old('apf') }}" required autocomplete="apf" autofocus>

                            @error('apf')
                               <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputState">Gender</label>
                            <select name="gender" id="inputState" class="form-control">
                                <option value="male" selected>Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputState">Date of Enlistment</label>
                            <!--<input name="date_of_enlistment" type="text" placeholder="mm/dd/yy" class="form-control" value="" data-provide="datepicker">--> 
                            <input type="datetime-local" name="date_of_enlistment" value="" class="form-control"/>

                            @error('date_of_enlistment')
                               <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputState">Qualification</label>
                            <select name="qualification" id="inputState" class="form-control">
                                <option value="BSc" selected>BSc</option>
                                <option value="HND">HND</option>
                                <option value="OND">OND</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                             <label for="inputState">Year of Birth</label>
                            <select name="year_of_birth" id="inputState" class="form-control">
                                @for($i = 1000; $i <= 2022; $i++)
                                    <option value="{{ $i }}" selected>
                                        {{ $i }}
                                    </option>
                                @endfor
                                               
                            </select>
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="cn">Course Number</label>
                            <!--<select name="cn" id="inputState" class="form-control">
                                @foreach($courses as $course)
                                    <option value="{{ $course->course_number }}" selected>
                                        Course - {{ $course->course_number }}
                                    </option>
                                @endforeach
                                               
                            </select>-->
                            <input id="course_number" type="text" placeholder="Course Number" class="form-control @error('course_number') is-invalid @enderror" name="course_number" value="{{ old('course_number') }}" autocomplete="course_number" autofocus>
                        </div>

                         <div class="form-group col-md-4">
                            <label for="inputState">Password</label>
                            <input id="password" type="text" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" autocomplete="password" autofocus disabled>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8">
                                <button type="submit" id="register" class="btn btn-success">
                                    {{ __('Register') }}
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