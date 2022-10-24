<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Deliveboo') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    {{-- Sfaccimmmmmmo Pagamento --}}
    <script src="https://js.braintreegateway.com/web/dropin/1.33.4/js/dropin.min.js%22%3E</script>

  {{--   <!-- Fonts -->
    <link rel=" dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    {{-- fontawesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    {{-- Google Font Icon --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    {{-- Google Icons --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">

    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <link rel="icon" type="image/x-icon" href="https://cdn.discordapp.com/attachments/1027584701415833620/1030102849801179208/deliveboo-logo-mobile.png">

    <!-- Font Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;1,700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light mb-5 border-bottom">
            <div class="container">
                <a class="navbar-brand py-4 d-none d-md-block" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                    <img src="https://cdn.discordapp.com/attachments/1027584701415833620/1030102818239041627/deliveboo-logo-desktop.png" alt="logo" class="w-75">
                </a>
                <a href="{{ url('/') }}" class="d-block d-md-none">
                    <img src="https://cdn.discordapp.com/attachments/1027584701415833620/1030102849801179208/deliveboo-logo-mobile.png" alt="logo" class="w-50">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item btn btn-outline-secondary rounded-pill py-1 px-4 mr-3 mt-2 mt-md-0 text-center">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Log In') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item my-btn rounded-pill py-1 px-4 my-btn-shadow mt-2 mt-md-0 text-center ">
                                    <a class="nav-link text-white px-0" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown btn user-pill rounded-pill px-3">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle p-1" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span class="material-symbols-outlined align-middle pr-2">account_circle</span>Hi!
                                    <span class="font-weight-bolder my-user-name">{{ Auth::user()->name }}</span>
                                </a>

                                <div class="dropdown-menu border-0 text-center px-3 w-100 mt-2" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
        const deleteElements = document.querySelectorAll('.btn-delete');
        deleteElements.forEach(formElement =>{
            formElement.addEventListener('submit', function(event){
                event.preventDefault();
                const result =window.confirm('Are you sure?')
                if(result) this.submit();
            })
        })
        function validationCheck(){
            let checks = document.querySelectorAll('.form-check-input');
            let checked = 0;
            for(let i=0; i<checks.length; i++){
                if(checks[i].checked === true)
                {
                    checked++
                }
            }
            if (checked > 0){
                checks[checks.length - 1].setCustomValidity("");
                document.getElementById('checkGroup').submit();
            }
            else{
                checks[checks.length - 1].setCustomValidity('You have to check at least one category');
                checks[checks.length - 1].reportValidity();
            }
        }

        document.querySelector('[name=submit]').addEventListener('click', () => {
            validationCheck()
        });


        // Pagamento
        // const form = document.getElementById('payment-form');
        // braintree.dropin.create({
        //     container: document.getElementById('dropin-container'),
        //     authorization: sandbox_24xz6hxg_vds2qv5666hkyfqt,
        //     container: '#dropin-container'
        // }, (error, dropinInstance) => {
            
        // });


        var button = document.querySelector('#submit-button');

  braintree.dropin.create({
    // Insert your tokenization key here
    authorization: 'sandbox_24xz6hxg_vds2qv5666hkyfqt',
    container: '#dropin-container'
  }, function (createErr, instance) {
    button.addEventListener('click', function () {
      instance.requestPaymentMethod(function (requestPaymentMethodErr, payload) {
        // When the user clicks on the 'Submit payment' button this code will send the
        // encrypted payment information in a variable called a payment method nonce
        $.ajax({
          type: 'POST',
          url: '/checkout',
          data: {'paymentMethodNonce': payload.nonce}
        }).done(function(result) {
          // Tear down the Drop-in UI
          instance.teardown(function (teardownErr) {
            if (teardownErr) {
              console.error('Could not tear down Drop-in UI!');
            } else {
              console.info('Drop-in UI has been torn down!');
              // Remove the 'Submit payment' button
              $('#submit-button').remove();
            }
          });

          if (result.success) {
            $('#checkout-message').html('<h1>Success</h1><p>Your Drop-in UI is working! Check your <a href="https://sandbox.braintreegateway.com/login">sandbox Control Panel</a> for your test transactions.</p><p>Refresh to try another transaction.</p>');
          } else {
            console.log(result);
            $('#checkout-message').html('<h1>Error</h1><p>Check your console.</p>');
          }
        });
      });
    });
  });
    </script>
    </body>

</html>