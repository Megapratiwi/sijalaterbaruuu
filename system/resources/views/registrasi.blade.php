<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ url('public/admin') }}/registrasi/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ url('public/admin') }}/registrasi/css/style.css">
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="post" id="signup-form" class="signup-form" action="{{ url('storeg') }}">
                        @csrf 
                        <h2 class="form-title">Create account</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="nama" placeholder="Nama Lengkap"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="username" placeholder="Username"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="password" placeholder="Password"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="nim" placeholder="Nim"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="no_hp" placeholder="No.Handphone"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="semester" placeholder="Semester"/>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" id="submit" class="form-submit" value="Sign up">Sign Up</button>
                        </div>
                    </form>
                    <p class="loginhere">
                        Have already an account ? <a href="{{ url('login') }}" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{ url('public/admin') }}/registrasi/vendor/jquery/jquery.min.js"></script>
    <script src="{{ url('public/admin') }}/registrasi/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>