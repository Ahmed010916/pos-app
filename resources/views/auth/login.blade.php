<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script defer src="{{asset('plugins/cdn.min.js')}}"></script>
    <link rel="icon" href="favicon.ico">
    <title>Tiny Dashboard - A Bootstrap Dashboard Template</title>
    @include('layouts._css')
  </head>
  <body class="light " x-data="{
    btn: true,
  }">
    <div class="wrapper vh-100">
      <div class="row align-items-center h-100">
        <div class="test-center">
        </div>
        <form @submit="btn = false" action="{{ route('login') }}" method="post" class="col-lg-3 col-md-4 col-10 mx-auto text-center">
            @csrf
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
            <svg version="1.1" id="logo" class="navbar-brand-img brand-md" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
              <g>
                <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
              </g>
            </svg>
          </a>
          <h1 class="h6 mb-3">Sign in</h1>
          @if (Session::has('acount_disabled'))
            <div class="alert alert-warning" role="alert">
               {{ Session::get('acount_disabled')}}
            </div>
          @endif
          <div class="form-group">
            <label for="inputEmail" class="sr-only">Email address</label>
            <input name="email" type="email" id="inputEmail" class="form-control form-control-lg" placeholder="Email address" required="" autofocus="">
            @error('email') <div style="color: red;display: flex; margin-top: 2px;">{{ $message }}</div> @enderror
           </div>
          <div class="form-group">
            <label for="inputPassword" class="sr-only">Password</label>
            <input name="password" type="password" id="inputPassword" class="form-control form-control-lg" placeholder="Password" required="">
            @error('password') <div style="color: red;display: flex; margin-top: 2px;" >{{ $message }}</div> @enderror
          </div>
          <button x-show="btn" class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
          <div x-show="!btn" class="spinner-border mr-3 text-primary" role="status"><span class="sr-only">Loading...</span></div>
          <a href="{{ route('register') }}" class="d-flex m-1">Create new Acount</a>
          <p class="mt-5 mb-3 text-muted">© 2022</p>
        </form>
      </div>
    </div>
    @include('layouts._js')
  </body>
</html>
</body>
</html>
