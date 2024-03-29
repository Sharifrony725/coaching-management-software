<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coaching | Login Form</title>
    <!--    Font Awesome Stylesheet-->
    <link rel="stylesheet" href="{{ asset('admin/assets/fonts/fa/css/all.min.css') }}">
    <!--    Animate CSS-->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">
    <!--    Theme Stylesheet-->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.png') }}" type="image/x-icon">
</head>
<body>

<!--Content Start-->
<section class="container-fluid">
    <div class="row content login-form">
        <div class="col-12 pl-0 pr-0">
            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">Admin Login Form</h4>
                </div>
            </div>
             <!-- Validation Errors -->
       <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf
                 <div class="form-group col-12 mb-3">
                    <label for="fatherMobile" class="col-sm-3 col-form-label ">Email</label>
                    <input type="email" name="email" placeholder="E-mail" class="form-control col-sm-9" value="{{ old('email') }}" required>
                    <span class="text-danger"></span>
                </div>

                <div class="form-group col-12 mb-3">
                    <label for="password" class="col-sm-3 col-form-label ">Password</label>
                    <div class="input-group col-sm-9 pl-0 pr-0">
                        <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
                        <div class="input-group-append">
                            <span class="input-group-text ml-2" id="passwordToggle"><i class="fa fa-eye-slash"></i></span>
                        </div>
                    </div>
                    <span class="text-danger"></span>
                </div>

                <div class="form-group col-12 mb-3">
                    <label class="col-sm-3"></label>
                    <button type="submit" class="col-sm-9 btn btn-block my-btn-submit">Login</button>
                </div>
            </form>



        </div>
    </div>

</section>
<!--Content End-->

<script src="{{ asset('admin/assets/js/jquery-3.3.1.slim.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/script.js') }}"></script>
</body>
</html>
