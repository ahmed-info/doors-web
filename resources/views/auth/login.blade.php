<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('adminassets/css/styles.css') }}">
</head>
<body>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="cover">
                <img src="{{ asset('adminassets/images/jjeans.jpg') }}" alt="" style="width: 100%;height:420px">
            </div>
        </div>
        <div class="box">
                <div class="col-md-6 col-sm-6 col-xs-12">
                <form class="form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <h2>Sign in</h2>
                    <div class="inputBox">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                        <span>Email</span>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                        <i></i>
                    </div>
                    <div class="inputBox">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <span>Password</span>
                        <i></i>
                    </div>
                    <div class="links">
                        <a href="#">Forgot Password</a>
                        <a href="#">Signup</a>
                    </div>
                    <input type="submit" value="Login">
                </form>
            </div>
        </div>
    </div>

</body>
</html>
