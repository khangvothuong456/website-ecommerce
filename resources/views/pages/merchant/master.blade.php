<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thời trang nam & nữ - Alumbale</title>
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
    <!-- FontAwesome, Bootstrap CSS, then main.css -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/main-merchant.css')}}" type="text/css">
</head>
<body>

    <!-- START: header -->
    <header>
        <div class="app-header-top">
            <div class="container d-flex justify-content-between">
                <div class="app-header-top__left py-1">
                    <span class="mr-3"><i class="fas fa-phone"></i> (039) xxx 0434</span>
                    <span><i class="fas fa-envelope"></i> alumble@hotline.com</span>
                </div>
                <div class="app-header-top__right py-1">
                    <div class="d-flex justify-content-end">
                        <a href="#" class="nav-link dropdown-toggle p-0 text-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user mr-1"></i> Phan Chí Khang</a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" class="dropdown-item"> Tài khoản của tôi</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{route('logout')}}" class="dropdown-item"> Đăng xuất</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </header>
    <!-- END: header -->

    @yield('content')
    
    <!-- jQuery first, then Popper.js, Bootstrap JS, then main.js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{asset('js/main-merchant.js')}}"></script>
</body>
</html>