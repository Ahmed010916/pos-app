<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Tiny Dashboard - A Bootstrap Dashboard Template</title>
    @include('layouts._css')
  </head>
  <body class="light">
    <div class="wrapper vh-100">
      <div class="row align-items-center h-100">
        <form action="{{route('register')}}" method="POST" class="col-lg-6 col-md-8 col-10 mx-auto">
            @csrf
            <div class="mx-auto text-center my-4">
              <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="/">
                <svg version="1.1" id="logo" class="navbar-brand-img brand-md" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                  <g>
                    <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                    <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                    <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                  </g>
                </svg>
              </a>
              <h2 class="my-3">Register</h2>
            </div>
            <div class="form-group">
              <label for="Name">Name</label>
              <input name="name" type="text" class="form-control" id="Name">
              @error('name') <div style="color: red;display: flex; margin-top: 2px;" >{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="Email">Email</label>
                <input  name="email"  type="email" class="form-control" id="Email">
                @error('email') <div style="color: red;display: flex; margin-top: 2px;" >{{ $message }}</div> @enderror
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="Password">Password</label>
                  <input  name="password" type="password" class="form-control" id="Password">
                  @error('password') <div style="color: red;display: flex; margin-top: 2px;" >{{ $message }}</div> @enderror
                </div>
                <div >
                    <div class="form-group">
                        <label for="Confirm_Password">Confirm Password</label>
                        <input name="password_confirmation" type="password" class="form-control" id="Confirm_Password">
                        @error('password_confirmation') <div style="color: red;display: flex; margin-top: 2px;" >{{ $message }}</div> @enderror
                    </div>
                </div>
              </div>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
            <a href="{{ route('login') }}" class="d-flex m-1">login</a>
            <p class="mt-5 mb-3 text-muted text-center">© 2022</p>
          </form>
      </div>
    </div>
    @include('layouts._js')
  </body>
</html>
</body>
</html>
