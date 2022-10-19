@extends('layouts.app')

@section('content')
    <div class="d-flex">
        <div class="container-fluid myBackground text-center align-self-center">
            <img class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-xs-4  error-image pt-3" src="{{ asset('images/hamburger.png') }}" alt="no pass">
        </div>
    </div>

    <h1 class="text-center">Access Denied</h1>
    <div class="text-error text-center">Sorry, but you are not allowed to enter this section.</div>

    <div class="">
        <div class="mx-auto w-25">
            <div class="my-btn my-btn-shadow mt-5 rounded-pill text-center">
                <a class="nav-link px-0" href="/">Go Home</a>
            </div>
        </div>
    </div>



@endsection
