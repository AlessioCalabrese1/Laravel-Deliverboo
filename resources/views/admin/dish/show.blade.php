@extends('layouts.app')

@section('content')
    <div class="container-lg my-5">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-10 mx-auto mb-4">
            @if (session('edited'))
            <div class="alert alert-success my-alert-success container-lg" role="alert">
                <div class="row align-items-center">
                    <div class="box-success-img ">
                        <img src="{{ url('https://www.svgrepo.com/show/13650/success.svg') }}" alt="success">
                    </div>
                    <div class="col-9">
                        <strong>Success!</strong>
                        <span class="text-capitalize">{{ session('edited') }}</span>
                    </div>
                </div>
            </div>
            @endif

            @if (session('created'))
            <div class="alert alert-success my-alert-success container-lg" role="alert">
                <div class="row align-items-center">
                    <div class="box-success-img ">
                        <img src="{{ url('https://www.svgrepo.com/show/13650/success.svg') }}" alt="success">
                    </div>
                    <div class="col-9">
                        <strong>Success!</strong>
                        <span class="text-capitalize">{{ session('created') }}</span>
                    </div>
                </div>
            </div>
            @endif
        </div>

        <div class="card col-lg-6 col-md-6 col-sm-10 my-rounded my-shadow mx-auto border-0">
            {{-- @dd(asset('/' . $dish->dishPic)) --}}

            @if (filter_var($dish->dishPic, FILTER_VALIDATE_URL))
                <img src="{{ $dish->dishPic }}" class="card-img-top my-rounded-top" alt="{{ $dish->name }} photo">
            @else
                <img src="{{ asset('storage/' . $dish->dishPic)}}" class="card-img-top my-rounded-top" alt="{{ $dish->name }} photo">
            @endif
            {{-- @if (substr(filter_var($dish->dishPic), 0, 4) === 'http')
                <img src="{{ $dish->dishPic }}" class="card-img-top" alt="{{ $dish->name }} photo">
            @else
                <img src="{{ asset('storage/' . $dish->dishPic)}}" class="card-img-top" alt="{{ $dish->name }} photo">
            @endif --}}

            <div class="card-body p-5">

                @if ($dish->visible==0)
                    <div class="badge my-badge-success badge-pill w-25 mb-3"><small>available</small></div>
                @else
                    <div class="badge my-badge-danger badge-pill w-25 mb-3"><small>not available</small></div>
                @endif

                <h2 class="card-title text-capitalize font-weight-bold">{{ $dish->name }}</h2>
                <p class="card-text my-4">{{ $dish->description }}</p>
                <hr>
                <h4 class="card-text font-weight-bolder mt-4">€ {{ $dish->price }}</h4>
                <div class="row mt-5">
                    <div class="col-12 p-0">
                        <a href="{{ route('admin.dish.edit', $dish->id) }}" class="btn my-btn-success w-100 rounded-pill text-white my-btn-shadow p-2">Edit</a>
                    </div>
                    <div class="col-12 p-0 mt-3">
                        <form action="{{ route('admin.dish.destroy', $dish->id) }}" method="POST" class="btn-delete">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn my-btn-danger w-100 rounded-pill text-white my-btn-shadow p-2">Delete</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
