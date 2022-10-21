@extends('layouts.app')

@section('content')
    <div class="container-lg mt-4">
        <div class="card col-lg-6 col-md-6 col-sm-10 mx-auto my-rounded my-shadow mx-auto border-0">
            <div class="card-body p-5">
                <h2 class="font-weight-bold">Details:</h2>
                <p class="card-title text-capitalize mt-5">Name: &nbsp;{{ $order->name . ' ' . $order->surname}}</p>
                <p class="card-text">Address: &nbsp;{{ $order->address }}</p>
                <p class="card-text text-capitalize">Other info: &nbsp;{{ $order->description }}</p>
                <hr class="my-4">
                <p class="mb-0">Total Price: <span class="card-text font-weight-bolder h4 align-botton">&nbsp;€ {{ $order->price }}</span></p>
                {{-- <div class="row">
                    <div class="col-12 p-0 mt-5">
                        <form action="{{ route('admin.order.destroy', $order->id) }}" method="POST" class="btn-delete">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn my-btn-danger w-100 rounded-pill text-white my-btn-shadow">Delete</button>
                        </form>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
