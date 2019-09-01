<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>APSIS ENGINE</title>

    <link href="{{asset('public/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/style.css')}}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">Welcome to ERP</h2>

                <p>
                    Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                </p>

                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                </p>

                <p>
                    When an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </p>

               

            </div>
            <div class="col-md-6">
                <div class="ibox-content">
				<form class="m-t" role="form" method="POST" action="{{ url('login') }}">
                    {{ csrf_field() }}
                        <div class="form-group">
                        <input id="email" type="email" placeholder="username or email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
						   name="email" value="{{ old('email') }}" required autofocus>

						@if ($errors->has('email'))
						<span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
						@endif
						</div>
                        <div class="form-group">
                        <input id="password" type="password" placeholder="password"
                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                        <a href="{{ route('password.request') }}">
                            <small>{{ __('Forgot Your Password?') }}</small>
                        </a>

                      
                    </form>
                   
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Copyright Apsis Solutions
            </div>
            <div class="col-md-6 text-right">
               <small>© 2018</small>
            </div>
        </div>
    </div>

</body>

</html>