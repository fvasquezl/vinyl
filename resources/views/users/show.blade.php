@extends('layouts.master')
@section('content-header')
    @include('layouts.partials.contentHeader',$info =[
           'title' =>'User',
           'subtitle' => 'Profile',
           'breadCrumbs' =>['users','show']
           ])
@stop


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{asset('img/user1.png')}}"
                                 alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{ $user->name }}</h3>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <i class="fas fa-envelope"></i> <b>Email</b> <a
                                    class="float-right">{{ $user->email }}</a>
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-calendar-alt"></i> <b>User since:</b> <a
                                    class="float-right">{{ $user->present()->userCreatedat() }}</a>
                            </li>

                        </ul>

                        <a href="{{ route('users.edit',$user)}}" class="btn btn-primary btn-block"><b>Edit user</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@endsection
