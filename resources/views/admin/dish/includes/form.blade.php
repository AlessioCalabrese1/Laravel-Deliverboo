<div class="container-lg">
    <div class="row p-3">
        <div class="col-12">
            <form action="{{ route($route, $argument) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method($method)

                @if ($argument == ' ')
                    <h1 class="font-weight-bolder">Create new dish</h1>
                    <hr class="my-5">
                @else
                    <h1 class="font-weight-bolder">Edit dish</h1>
                    <hr class="my-5">
                @endif

                <div class="mb-3">
                    <label for="name" class="form-label">Name*</label>
                    <input type="text" class="form-control rounded-pill border-0 mb-4 font-weight-lighter" id="name" placeholder="Insert the dish name" name="name"
                        value="{{ old('name', $newDish->name) }}" required>
                        @error('name')
                        <div class="alert alert-danger">
                             {{ $message }}
                        </div>
                        @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description*</label>
                    <textarea class="form-control border-0 mb-4 font-weight-lighter" id="description" placeholder="Insert the dish description" name="description" rows="3" required>{{ old('description', $newDish->description) }}</textarea>
                    @error('description')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                <div class="mb-3">
                    <label for="dishPic" class="form-label">Picture
                        @if ($argument == ' ')
                            <span>*</span>
                        @else
                        @endif
                    </label>
                    {{-- <input type="text" class="form-control" id="dishPic" placeholder="Insert the dish picture"
                        name="dishPic" value="{{ old('dishPic', $newDish->dishPic) }}"> --}}
                    <input type="file" class="form-control rounded-pill border-0 mb-4 font-weight-lighter" id="dishPic" placeholder="Insert the dish picture"
                        name="dishPic"
                        @if ($method === 'POST')
                            required
                        @endif >

                        @error('dishPic')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price € *</label>
                    <input type="number" step=".01" class="form-control rounded-pill border-0 mb-4 font-weight-light" id="price" placeholder="Insert the dish price"
                        name="price" value="{{ old('price', $newDish->price) }}" min="0.01">
                        @error('price')
                        <div class="alert alert-danger">
                            <span class="material-icons-outlined">
                                done
                                </span> {{ $message }}
                        </div>
                        @enderror
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="visible" id="available"
                    @if ($newDish->visible == 0)
                        checked
                    @endif
                    value="0">
                    <label class="form-check-label font-weight-light" for="available">
                        Available
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="visible" id="notAvailable"
                    @if ($newDish->visible == 1)
                        checked
                    @endif
                    value="1">
                    <label class="form-check-label font-weight-light" for="notAvailable">
                        Not Available
                    </label>
                </div>
                @error('visible')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
                <button type="submit" class="btn btn-warning mt-5 rounded-pill px-5">{{ $submit }}</button>
            </form>
        </div>
    </div>
</div>
