@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 my-rounded my-shadow">
                    <div class="text-center pt-5 pb-3">
                        <h2>{{ __('Registration') }}</h2>
                    </div>

                    <hr>
                    <div class="card-body mt-3">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                {{--     <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label> --}}
                                <div class="col-md-10 mx-auto mb-2">
                                    <input id="name" type="text"
                                        class="py-4 border-0 px-4 my-rounded bg-light form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required minlength="2" maxlength="255"
                                        required autocomplete="name" autofocus placeholder="Name*">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}

                                <div class="col-md-10 mx-auto mb-2">
                                    <input id="email" type="email"
                                        class="py-4 border-0 px-4 my-rounded bg-light form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="E-mail*">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- partita iva input --}}
                            <div class="form-group row">
                                {{-- <label for="p_iva" class="col-md-4 col-form-label text-md-right">{{ __('P. IVA') }}</label> --}}

                                <div class="col-md-10 mx-auto mb-2">
                                    <input id="p_iva" type="number"
                                        class="py-4 border-0 px-4 my-rounded bg-light form-control @error('p_iva') is-invalid @enderror"
                                        name="p_iva" value="{{ old('p_iva') }}" required min="10000000000"
                                        max="99999999999" placeholder="P. IVA*">

                                    @error('p_iva')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                                <div class="col-md-10 mx-auto mb-2">
                                    <input id="password" type="password"
                                        class="py-4 border-0 px-4 my-rounded bg-light form-control @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="new-password" required minlength="8"
                                        maxlength="255" placeholder="Password*">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                {{-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label> --}}

                                <div class="col-md-10 mx-auto mb-4">
                                    <input id="password-confirm" type="password"
                                        class="py-4 border-0 px-4 my-rounded bg-light form-control"
                                        name="password_confirmation" required minlength="8"
                                        maxlength="255 required autocomplete="new-password" placeholder="Confirm Password*">
                                </div>
                            </div>
                            <div class="form-group row mb-5">
                                <div class="col-md-10 mx-auto">
                                    <button id="sign-up-button" name="submit" type="submit"
                                        class="btn my-btn w-100 my-rounded py-3 my-btn-shadow">
                                        {{ __('Sign up') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function checkIfPswMatch() {
            let password = document.getElementById('password');
            let passwordToMatch = document.getElementById('password-confirm');

            if(password.value === passwordToMatch.value){
                passwordToMatch.setCustomValidity("");
                console.warn('Password Match')
            } else {
                passwordToMatch.setCustomValidity("Password dosen\'t match, please try again");
                passwordToMatch.reportValidity();
                console.warn('password dosen\'t match')
            }
        }
        document.getElementById('sign-up-button').addEventListener('click', () => {
            checkIfPswMatch()
        });
    </script>
@endsection
