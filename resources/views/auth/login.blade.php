<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rathod Optical Clinic - Login</title>

    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <style>
        body {
            background-image: url("{{ asset('images/optical-bg.jpg') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .login-panel {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px;
        }

        .login-panel .panel-heading {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-control {
            height: 45px;
            font-size: 16px;
        }

        .btn-success {
            width: 100%;
            font-size: 18px;
            padding: 10px;
        }

        .checkbox label {
            font-size: 14px;
        }

        .alert {
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <div class="login-panel panel panel-default">
        <div class="panel-heading">{{ $setting->name ?? 'Rathod Optical Clinic' }}</div>
        <div class="panel-body">
            @if ($success = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $success }}</strong>
            </div>
            @endif
            @if(count($errors))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                @foreach($errors->all() as $error)
                <strong>{{ $error }}</strong><br>
                @endforeach
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <input class="form-control" placeholder="Username" name="name" type="text" required autofocus>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Password" name="password" type="password" required>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                </div>
                <button type="submit" class="btn btn-success">Login</button>
            </form>
        </div>
    </div>

</body>

</html>