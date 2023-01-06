@extends('layouts.master')

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
                               <li>Name: {{ $worker->first_name }} {{ $worker->last_name }}</li>
                               <li class="my-4">Email: {{ $worker->email }}</li>
                               <li class="my-4">Role: admin</li>
                               <li class="my-4">Username: {{ $worker->user_name }}</li>
                               <li class="my-4">Date of Enlistment: {{ $worker->date_of_enlistment }}</li>
                               <li class="my-4">Gender: {{ $worker->gender }}</li>
                               <li class="my-4">State of Origin: {{ $worker->state_of_origin }}</li>
                               <li class="my-4">Qualification: {{ $worker->qualification }}</li>
                               <li class="my-4">Year of Birth: {{ $worker->year_of_birth }}</li>
                               <li class="my-4">Date of Promotion: 12-08-2019</li>
                           </ul>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                   
                    

                </div>

        </div>
    </div>
@endsection