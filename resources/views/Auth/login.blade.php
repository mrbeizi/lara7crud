
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Admisi Uvers</title>

    <link href="https://getbootstrap.com/docs/4.6/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('template/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/dist/css/adminlte.min.css')}}">

  </head>
  <body class="text-center">
    <div class="lockscreen-wrapper">
      <div class="lockscreen-logo">
        <a href="">Login <b>{{config('app.name')}}</b></a>
      </div>
      <div class="lockscreen-item">
        <div class="lockscreen-image">
          <img src="{{asset('template/dist/img/logo-uvers-admisi.jpg')}}" alt="User Image">
        </div>
        
        <div id="err" style="color: red">
          @if(session()->has('error'))
          <div class="alert alert-danger">{{ session('error') }}</div>
          @endif
        </div>
    
          <form class="sign-in-credentials" method="POST" action="{{route('login')}}">
            {{csrf_field()}}
            
            <div>
              <input type="email" value="{{old('email')}}" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Username" autofocus>
              @if ($errors->has('email'))
                <div class="invalid-feedback">
                  {{$errors->first('email')}}
                </div>          
              @endif
              <br>
              <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Password">
              @if ($errors->has('password'))
                <div class="invalid-feedback">
                  {{$errors->first('password')}}
                </div>          
              @endif
              <br>
      
              <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
            </div>
          </form>
          <p class="mt-4 text-muted">&copy;{{date('Y')}} - {{config('app.name')}} Universitas Universal</p>
    
      </div>
    </div>

  <script src="{{asset('template/plugins/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  </body>
</html>
