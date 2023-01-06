@extends('layouts.staff')

@section('title', 'View Profile')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Staff Profile</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-3 col-sm-12 my-5">
                            <i class="fa fa-user" style="font-size:180px;"></i>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-6">
                           <ul  style="list-style:none">
                               <li>Name: {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</li>
                               <li class="my-4">Role: Staff</li>
                               <li class="my-4">Username: {{ Auth::user()->user_name }}</li>
                               <li class="my-4">Date of Enlistment: {{ Auth::user()->date_of_enlistment }}</li>
                               <li class="my-4">Gender: {{ Auth::user()->gender }}</li>
                               <li class="my-4">State of Origin: {{ Auth::user()->state_of_origin }}</li>
                               <li class="my-4">Qualification: {{ Auth::user()->qualification }}</li>
                               <li class="my-4">Year of Birth: {{ Auth::user()->year_of_birth }}</li>
                               <li class="my-4">Date of Promotion: 12-08-2019</li>
                           </ul>
                           <div class="btn btn-primary">Edit Profile</div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                   
                    

                </div>

        </div>
    </div>
@endsection