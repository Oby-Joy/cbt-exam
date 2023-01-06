@extends('layouts.master')

@section('title', 'Add Course')

@section('content')

    <div class="container-fluid">
        @if($message = Illuminate\Support\Facades\Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Add a New Course</h6>
            </div>
            <div class="card-body">
                <form action="/admin/create-course" method="POST" class="my-2">
                    @csrf
                    <input id="course" type="text" placeholder="Course name" class="form-control @error('course') is-invalid @enderror" name="course" value="{{ old('course') }}" autocomplete="course" autofocus>

                    <button type="submit" id="register" class="btn btn-success mt-3 col-md-12">
                         {{ __('Add Course Name') }} 
                    </button>
                </form>
            </div>
        </div>
    <div>

@endsection