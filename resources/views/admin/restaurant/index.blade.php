@extends('layouts.app')

@section('content')
    <div class="container" id="restaurant">

        @if (session('delete'))
            <div class="alert alert-success my-alert-delete container-lg" role="alert">

                    <div class="row align-items-center">
                        <div class="box-delete-img ">
                            <img src="{{ url('https://upload.wikimedia.org/wikipedia/commons/thumb/3/37/Oxygen480-actions-trash-empty.svg/192px-Oxygen480-actions-trash-empty.svg.png?20190510103517') }}" alt="success">
                        </div>
                        <div class="col-8">
                            <strong>Deleted!</strong>
                            <span class="text-capitalize">{{ session('delete') }}</span>
                        </div>
                    </div>

            </div>

        @endif

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
            {{-- <div class="alert alert-success my-alert-success" role="alert">
                <div class="pb-2">
                    <img class="w-25" src="{{ url('https://www.svgrepo.com/show/13650/success.svg') }}" alt="success">
                </div>
                <strong>Success!</strong>
                <span class="text-capitalize">{{ session('created') }}</span>
            </div> --}}
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

        <div class="row mt-1 align-items-center">
            <div class="col-md-5 col-6">
                <h1 class="font-weight-bolder">{{ $restaurants->name }}</h1>
            </div>
            <div class="col-md-7 col-6 d-flex justify-content-end flex-wrap">
                @forelse ($restaurants->categories as $category)
                    <span class="badge badge-pill text-white my-btn-shadow mx-2 px-3 py-2"
                        style="background-color: {{ $category->color }}">{{ $category->name }}</span>
                @empty
                @endforelse
            </div>
            <div class="col-md-5 col-6 mb-3">
                <p class="m-0"><span class="material-symbols-outlined h6 align-text-middle m-0">location_on</span>
                    &nbsp;{{ $restaurants->address }}</p>
                <p class="m-0"><span class="material-symbols-outlined h6 align-text-middle m-0">schedule</span>
                    &nbsp;{{ substr($restaurants->open, 0, 5) }} – {{ substr($restaurants->close, 0, 5) }}</p>
            </div>
        </div>
        {{-- <h1 class="mt-1 d-flex align-items-center">
        {{ $restaurants->name }}
        @forelse ($restaurants->categories as $category)
        <span class="badge badge-danger badge-pill small-badge mx-4">{{ $category->name }}</span>
        @empty

        @endforelse
    </h1>
    <p>
        {{ $restaurants->address }} | {{ substr( $restaurants->open , 0 , 5 ) }} - {{ substr( $restaurants->close , 0 ,
        5 ) }}
    </p> --}}
        <div class="container-fluid p-0 my-3 position-relative">
            @if (filter_var($restaurants->restaurantPic, FILTER_VALIDATE_URL))
                <img src="{{ $restaurants->restaurantPic }}" alt="{{ $restaurants->name }} photo" class="rounded-5 radius-shadow">
            @else
                <img src="{{ asset('storage/' . $restaurants->restaurantPic) }}" alt="{{ $restaurants->name }} photo"
                    class="rounded-5 radius-shadow">
            @endif
        </div>

        <div class="container-lg">
            {{-- <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Available</th>
                    <th scope="col" class="text-center"><a href="{{ route('admin.dish.create') }}"
                            class="btn btn-warning rounded-pill px-5 ">Add new Dish</a></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($restaurants->dishes as $dish)
                <tr>
                    <th scope="row">{{ $dish->id }}</th>
                    <td class="text-capitalize">{{ $dish->name }}</td>
                    <td> --}}
            {{-- Controlliamo la lunghezza della stringa, se è maggiore di 15 la tagliamo --}}
            {{-- @if (strlen($dish->description) > 15)
                        {{ substr($dish->description, 0, 15) }}...
                        @else
                        {{ $dish->description }}
                        @endif --}}
            {{-- </td>
                    <td>€{{ $dish->price }}</td>
                    <td>
                        @if ($dish->visible == 0)
                        Yes
                        @else
                        No
                        @endif
                    </td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('admin.dish.show' , $dish->id) }}"
                            class="btn btn-primary rounded-pill">View</a>
                        <a href="{{ route('admin.dish.edit', $dish->id) }}"
                            class="btn btn-success rounded-pill mx-1">Edit</a>
                        <form action="{{ route('admin.dish.destroy' , $dish->id) }}" method="POST" class="btn-delete">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger rounded-pill ">Delete</button>

                        </form>
                    </td>

                    @empty
                    <td scope="row">Could not find any dish</td>
                    @endforelse
                </tr>
            </tbody>
        </table>
        --}}
            <div class="row ">
                <div class="col-12 my-5">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <a href="{{ route('admin.restaurant.edit', $restaurants->id) }}"
                                class="btn btn-outline-secondary rounded-pill w-100 py-4 font-weight-bold">
                                <span class="material-symbols-outlined align-middle mx-2">settings</span> Change restaurant
                                info
                            </a>
                        </div>
                        <div class="col-12 col-md-6 mt-5 mt-md-0">
                            <a href="{{ route('admin.dish.create') }}"
                                class="btn btn-outline-warning rounded-pill w-100 py-4 font-weight-bold">
                                <span class="material-symbols-outlined align-middle mx-1">add</span> Add new Dish
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 my-4">
                    <h2><span class="material-symbols-outlined h1 align-middle">restaurant_menu</span>
                        &nbsp;<span class="text-capitalize">dishes</span>
                    </h2>
                </div>
            </div>
            <div class="row justify-content-between px-md-5">
                @forelse ($restaurants->dishes as $dish)
                    <div class="col-12 col-md-5 my-card my-shadow mb-5">
                        <div class="row">
                            <div class="col-2 my-text">ID</div>
                            <div class="col-4 my-text">Name</div>
                            <div class="col-2 my-text px-0">Price</div>
                            <div class="col-4 my-text">Status</div>
                            <div class="col-12 pr-md-4 w-100">
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2 font-weight-lighter">#{{ $dish->id }}</div>
                            <div class="col-4 text-capitalize font-weight-lighter">{{ $dish->name }}</div>
                            <div class="col-2 px-0 font-weight-lighter">€ {{ $dish->price }}</div>
                            <div class="col-4">
                                @if ($dish->visible == 0)
                                    <div class="badge my-badge-success badge-pill w-100"><small>available</small></div>
                                @else
                                    <div class="badge my-badge-danger badge-pill w-100"><small>not available</small></div>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-4 py-2 text-center">
                                <a href="{{ route('admin.dish.show', $dish->id) }}"
                                    class="btn my-btn-primary rounded-pill w-100 text-white my-btn-shadow p-2">View</a>
                            </div>
                            <div class="col-4 py-2 text-center">
                                <a href="{{ route('admin.dish.edit', $dish->id) }}"
                                    class="btn my-btn-success rounded-pill w-100 text-white my-btn-shadow p-2">Edit</a>
                            </div>
                            <div class="col-4 py-2 text-center">
                                <form action="{{ route('admin.dish.destroy', $dish->id) }}" method="POST"
                                    class="btn-delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="btn my-btn-danger rounded-pill w-100 text-white my-btn-shadow p-2">Delete</button>

                                </form>
                            </div>
                        </div>
                    </div>

                @empty
                    <h5>No dishes already created!</h5>
                @endforelse
            </div>


            {{-- TABELLA ORDINI --}}
            {{--
        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope='col'>Description</th>
                    <th scope="col">Address</th>
                    <th scope="col">Total Price</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($restaurants->orders as $order)
                <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <td class="text-capitalize">{{ $order->name }}</td>
                    <td class="text-capitalize">{{ $order->surname }}</td>
                    <td> --}}
            {{-- Controlliamo la lunghezza della stringa, se è maggiore di 15 la tagliamo --}}
            {{-- @if (strlen($order->description) > 15)
                        {{ substr($order->description, 0, 15) }}...
                        @else
                        {{ $order->description }}
                        @endif --}}
            {{-- </td>
                    <td>{{ $order->address }}</td>
                    <td>€ {{ $order->price}}</td>

                    <td class="d-flex justify-content-center">
                        <a href="{{ route('admin.order.show' , $order->id) }}"
                            class="btn btn-primary rounded-pill">View</a>
                        <form action="{{ route('admin.order.destroy' , $order->id) }}" method="POST" class="btn-delete">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger rounded-pill ">Delete</button>

                        </form>
                    </td>

                    @empty
                    <td scope="row">Could not find any order</td>
                    @endforelse
                </tr>
            </tbody>
        </table> --}}
            <div class="row">
                <div class="col-12 my-4">
                    <h2><span class="material-symbols-outlined h1 align-middle">list_alt</span>
                        &nbsp;<span class="text-capitalize">orders</span>
                    </h2>
                </div>
            </div>
            <div class="row justify-content-between px-md-5">
                @forelse ($restaurants->orders as $order)
                    <div class="col-12 col-md-5 my-card my-shadow mb-5">
                        <div class="row">
                            <div class="col-4 my-text">ID</div>
                            <div class="col-4 my-text">Name</div>
                            <div class="col-4 my-text px-0">Surname</div>
                            <div class="col-12 pr-md-4 w-100">
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 font-weight-lighter">#{{ $order->id }}</div>
                            <div class="col-4 text-capitalize font-weight-lighter">{{ $order->name }}</div>
                            <div class="col-4 px-1 font-weight-lighter">{{ $order->surname }}</div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-4 my-text text-capitalize">address</div>
                            <div class="col-4 my-text text-capitalize">comment</div>
                            <div class="col-4 my-text text-capitalize px-0">total price</div>
                            <div class="col-12 pr-md-4 w-100">
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 font-weight-lighter">{{ $order->address }}</div>
                            <div class="col-4 text-capitalize font-weight-lighter">{{ $order->comment }}</div>
                            <div class="col-4 font-weight-lighter px-0">€ {{ $order->price }}</div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-12 py-2 text-center">
                                <a href="{{ route('admin.order.show', $order->id) }}"
                                    class="btn my-btn-primary rounded-pill w-100 text-white my-btn-shadow p-2">View</a>
                            </div>
                            {{-- <div class="col-6 py-2 text-center">
                            <form action="{{ route('admin.order.destroy' , $order->id) }}" method="POST" class="btn-delete">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn my-btn-danger rounded-pill w-100 text-white my-btn-shadow p-2">Delete</button>

                            </form>
                        </div> --}}
                        </div>
                    </div>

                @empty
                    <h5>No orders!</h5>
                @endforelse
            </div>

        </div>
    </div>
@endsection
