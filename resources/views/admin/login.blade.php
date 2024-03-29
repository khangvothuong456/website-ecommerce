<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập quản trị Đậu Đậu Shop</title>    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body{background:#007bff;background:linear-gradient(to right, #0062E6, #33AEFF)}
        a{text-decoration:none !important}
        .card-signin{border:0;border-radius:1rem;box-shadow:0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1)}
        .card-signin .card-title{margin-bottom:2rem;font-weight:300;font-size:1.5rem}
        .card-signin .card-body{padding:2rem}
        .form-signin{width:100%}
        .form-signin .btn{font-size:80%;border-radius:5rem;letter-spacing:.1rem;font-weight:bold;padding:1rem;transition:all 0.2s;}
        .form-label-group{position:relative;margin-bottom:1rem}
        .form-label-group input{height:auto;border-radius:2rem}
        .form-label-group>input, .form-label-group>label{padding:0.75rem 1.5rem}
        .form-label-group>label{position:absolute;top:0;left:0;display:block;width:100%;margin-bottom:0;line-height:1.5;color:#495057;border:1px solid transparent;border-radius:.25rem;transition:all .1s ease-in-out}
        .form-label-group input::placeholder{color:transparent}
        .form-label-group input:not(:placeholder-shown) {padding-top:calc(0.75rem+0.75rem*(2 / 3));padding-bottom:calc(0.75rem/3)}
        .form-label-group input:not(:placeholder-shown)~label{padding-top:calc(0.75rem/3);padding-bottom:calc(0.75rem/3);font-size:12px;color:#777}
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Đăng Nhập</h5>
                    <form action="login" method="POST" class="form-signin">
                        {{ csrf_field() }}
                        <div class="form-label-group">
                            <input type="type" name="email" id="email" class="form-control" placeholder="Tài khoản" required autofocus>
                            <label for="email">Tài khoản</label>
                        </div>
                        <div class="form-label-group">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Mật khẩu" required>
                            <label for="password">Mật khẩu</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Ghi nhớ mật khẩu?</label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Đăng Nhập</button>
                        <div class="text-center mt-4">
                            <a href="#" class="text-danger">Quên mất khẩu?</a>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>