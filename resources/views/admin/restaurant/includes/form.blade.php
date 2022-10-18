<div class="container-lg">
    <div class="row">
        <div class="col-12">
            <form action="{{ route($route, $argument) }}" method="POST" enctype="multipart/form-data" id="checkGroup">
                @csrf
                @method($method)

                <div class="mb-3">
                    <label for="name" class="form-label">Restaurant Name*</label>
                    <input type="text" class="form-control" id="name" placeholder="Insert the restaurant name"
                    name="name" value="{{ old('name', $newRestaurant->name) }}" required>
                </div>
                @error('name')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror

                <div class="mb-3">
                    <label for="address" class="form-label">Restaurant Address*</label>
                    <input type="text" class="form-control" id="address"
                    placeholder="Insert the restaurant address" name="address"
                    value="{{ old('address', $newRestaurant->address) }}" required>
                </div>
                @error('address')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror

                <div class="mb-3">
                    <label for="open" class="form-label">Open*</label>
                    <input type="text" class="form-control" id="open" placeholder="Insert the opening time"
                    name="open" value="{{ old('open', substr($newRestaurant->open , 0 , 5 )) }}" required maxlength="5">
                </div>
                @error('open')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror

                <div class="mb-3">
                    <label for="close" class="form-label">Close*</label>
                    <input type="text" class="form-control" id="close" placeholder="Insert the closing time"
                    name="close" value="{{ old('close', substr($newRestaurant->close , 0 , 5 )) }}" required maxlength="5">
                </div>
                @error('close')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror

                <div class="mb-3">
                    <label for="restaurantPic" class="form-label">Restaurant Picture*</label>
                    {{-- <input class="form-control" id="restaurantPic" placeholder="Insert the restaurant picture"
                    name="restaurantPic" value="{{ old('restaurantPic', $newRestaurant->restaurantPic) }}"> --}}
                    <input type="file" class="form-control" id="restaurantPic"
                    placeholder="Insert the restaurant picture" name="restaurantPic"
                    @if ($method == 'POST')  required @endif>
                </div>
                @error('restaurantPic')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror

                <div class="mb-3">
                    @forelse ($categories as $category)
                        <div class="form-check">
                            @if ($errors->any())
                                <input class="form-check-input" type="checkbox" name="categories[]" id="categories"
                                    value="{{ $category->id }}"
                                    {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="category">
                                    {{ $category->name }}
                                </label>
                            @else
                                <input class="form-check-input" type="checkbox" name="categories[]" id="categories"
                                    value="{{ $category->id }}"
                                    {{ $newRestaurant->categories->contains($category->id) ? 'checked' : '' }}>
                                <label class="form-check-label" for="category">
                                    {{ $category->name }}
                                </label>
                            @endif
                        </div>
                    @empty
                        There is no category!
                    @endforelse
                </div>
                @error('categories')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror


                <button type="submit" class="btn btn-warning mt-3 rounded-pill" name="submit">Send</button>
            </form>
        </div>
    </div>
</div>
