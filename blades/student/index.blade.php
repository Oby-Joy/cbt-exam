@extends('layouts.student')

@section('title', 'Student')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <h3>Welcome, {{ Auth::user()->first_name }}  {{ Auth::user()->last_name }}. </h3><br>

                    <p>We are excited to have you with us. We offer the best courses in the country. <br> We promise to give you the best and to make sure you become an expert before leaving us. <br> Do enjoy your stay here.</p>
                    <p>Once again, you're welcome!.</p>
                </div>
            </div>

        </div>
    </div>

@endsection

