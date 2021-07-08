
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Admisi Uvers</title>

    

    <!-- Bootstrap core CSS -->
<link href="https://getbootstrap.com/docs/4.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
 
    <!-- Custom styles for this template -->
<link href="https://getbootstrap.com/docs/4.6/examples/sign-in/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin" method="POST" action="{{route('register')}}">
      {{csrf_field()}}
      <h1 class="h3 mb-3 font-weight-normal">Register {{config('app.name')}}</h1>

      <input type="text" name="name" id="inputName" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{old('name')}}" placeholder="Full Name" required autofocus>
      @if ($errors->has('name'))
        <div class="invalid-feedback">
          {{$errors->first('name')}}
        </div>          
      @endif

      <input type="email" name="email" id="inputEmail" value="{{old('email')}}" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Email Address" required>
      @if ($errors->has('email'))
        <div class="invalid-feedback">
          {{$errors->first('email')}}
        </div>          
      @endif

      <input type="password" name="password" id="inputPassword" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Password" required>
      @if ($errors->has('password'))
        <div class="invalid-feedback">
          {{$errors->first('password')}}
        </div>          
      @endif
      
      <input type="password" name="password_confirmation" id="inputPassword" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" placeholder="Re-type Password" required>
      @if ($errors->has('password_confirmation'))
        <div class="invalid-feedback">
          {{$errors->first('password_confirmation')}}
        </div>          
      @endif
      
      <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
      <p class="mt-5 mb-3 text-muted">&copy;{{ date('Y') }} - Universitas Universal</p>
    </form>    
  </body>
</html>
