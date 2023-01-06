@extends('layouts.master')

@section('title', 'Assign Courses')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Add a New Course</h6>
                <p>A course can be assigned to more than one (1) lecturer
            </div>
            <div class="card-body">
                @if($message = Illuminate\Support\Facades\Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @endif
                <form action="/admin/assign-course" method="POST" class="my-2">
                    @csrf
                    <label for="course">Course</label>
                    <select name="title" id="inputState" class="form-control">
                        @foreach($courses as $course)
                            <option value="{{ $course->course }}" selected>{{ $course->course }}</option>
                        @endforeach
                            </select>

                    <label for="course" class="mt-4">Lecturer</label>
                    <input id="lecturer" type="text" class="form-control @error('lecturer') is-invalid @enderror" name="lecturer" value="{{ old('lecturer') }}" autocomplete="lecturer" autofocus>

                    <button type="submit" id="register" class="btn btn-success mt-3 col-md-12">
                         {{ __('Add') }}
                    </button>
                </form>
                
            </div>
        </div>
    <div>
@endsection