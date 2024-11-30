<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        /* .section-bg {
            background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSIsgnrZpaFbvjTBZztjD0L90FCKkAKJibQTw&s');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .form-container {
            background-color: #fff;
            border-radius: 0.375rem;
            box-shadow: 0 0 0.5rem rgba(0, 0, 0, 0.1);
            padding: 2rem;
        }
        
        .form-outline input[type="email"],
        .form-outline input[type="password"] {
            width: 100%;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            color: #495057;
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        
        .form-outline input[type="email"]:focus,
        .form-outline input[type="password"]:focus {
            color: #495057;
            background-color: #fff;
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        
        .form-outline label.form-label {
            position: absolute;
            top: -0.625rem;
            left: 1rem;
            font-size: 0.875rem;
            color: #495057;
            background-color: #fff;
            padding: 0 0.25rem;
            transition: all 0.3s ease;
            transform-origin: 0 0;
        }
        
        .form-outline input[type="email"]:focus + .form-label,
        .form-outline input[type="password"]:focus + .form-label {
            top: -1.25rem;
            left: 0.875rem;
            font-size: 0.75rem;
            color: #007bff;
        }
        
        .text-danger {
            font-size: 0.875rem;
            margin-top: 0.25rem;
            color: #dc3545;
        }
        
        .btn-primary {
            width: 100%;
        } */
        .gradient-custom-2 {
/* fallback for old browsers */
background: #fccb90;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
}

@media (min-width: 768px) {
.gradient-form {
height: 100vh !important;
}
}
@media (min-width: 769px) {
.gradient-custom-2 {
border-top-right-radius: .3rem;
border-bottom-right-radius: .3rem;
}
}
    </style>
</head>
<body>
    {{-- <section class="section-bg">
        <div class="container">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="form-container">
                        <form action="{{ route('authenticate') }}" method="post">
                            @csrf
                            <h2 class="text-center mb-4">Login</h2>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                                <label class="form-label" for="email">Email address</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                                <label class="form-label" for="password">Password</label>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="rememberMe" />
                                    <label class="form-check-label" for="rememberMe">Remember me</label>
                                </div>
                                <a href="#!" class="text-body">Forgot password?</a>
                            </div>

                            <div class="text-center">
                                <input type="submit" class="btn btn-primary" value="Login">
                                <h4 class="my-3">or</h4>
                                <h6><a href="{{ route('login_with_otp') }}">Login with OTP</a></h6>
                                <p class="small mt-3">Don't have an account? <a href="{{ route('register') }}" class="link-danger">Register</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
              <div class="card rounded-3 text-black">
                <div class="row g-0">
                  <div class="col-lg-6">
                    <div class="card-body p-md-5 mx-md-4">
      
                      <div class="text-center">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                          style="width: 185px;" alt="logo">
                        <h4 class="mt-1 mb-5 pb-1">We are The Lotus Team</h4>
                      </div>
      
                      <form action="{{ route('authenticate') }}" method="post">
                        @csrf

                        <p>Please login to your account</p>
      
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                          <label class="form-label" for="form2Example11">Username</label>
                        </div>
      
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                          <label class="form-label" for="form2Example22">Password</label>
                        </div>
      
                        <div class="text-center pt-1 mb-5 pb-1">
                            <input type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary  btn-block fa-lg gradient-custom-2 mb-3" value="Login">

                          <a class="text-muted" href="#!">Forgot password?</a>
                        </div>
      
                        <div class="d-flex align-items-center justify-content-center pb-4">
                          <p class="mb-0 me-2">Don't have an account?</p>
                          <a href="{{ route('register') }}" class="link-danger">
                              <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-danger">Create new</button>
                          </a>
                        </div>
      
                      </form>
      
                    </div>
                  </div>
                  <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                    <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                      <h4 class="mb-4">Payroll  Management</h4>
                      <p class="small mb-0">Gives you the new technologises of payroll</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</body>
</html>
