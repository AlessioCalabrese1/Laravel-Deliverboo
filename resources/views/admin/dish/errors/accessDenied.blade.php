@extends('layouts.app')

@section('content')
    <div class="d-flex">
        <div class="container-fluid myBackground text-center align-self-center">
            <img class="error-img-responsive pt-3" src="{{ url('https://pngimg.com/uploads/burger_sandwich/burger_sandwich_PNG96715.png') }}" alt="no pass">
        </div>
    </div>

    <div class="text-center txt-denied">Access Denied</div>
    <div class="text-error text-center">Sorry, but you are not allowed to enter this section.</div>

    <div class="">
        <div class="mx-auto my-btn-errorpage">
            <div class="my-btn my-btn my-btn-shadow mt-5 p-1 rounded-pill text-center">
                <a class="nav-link px-0 text-white" href="/">Go Home</a>
            </div>
        </div>
    </div>



@endsection
