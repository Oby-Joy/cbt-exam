@extends('layouts.master')

@section('title', 'View Profile')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Admin Profile</h6>
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
                               <li class="my-4">Email: {{ Auth::user()->email }}</li>
                               <li class="my-4">Role: admin</li>
                               <li class="my-4">Username: Jay</li>
                               <li class="my-4">Date of Enlistment: 22-09-2017</li>
                               <li class="my-4">Gender: Male</li>
                               <li class="my-4">State of Origin: Edo</li>
                               <li class="my-4">Qualification: HND</li>
                               <li class="my-4">Year of Birth: 1986</li>
                               <li class="my-4">Date of Promotion: 12-08-2019</li>
                           </ul>
                           <button class = "btn btn-primary">Edit Profile</button>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                   
                    

                </div>

        </div>
    </div>
@endsection