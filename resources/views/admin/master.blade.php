<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang quản trị Alumbale</title>
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
    <!-- FontAwesome, Bootstrap CSS, then main.css -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}" type="text/css">
</head>
<body>

    <header id="app-header">
        <a href="#" class="app-header__brand"><img src="{{asset('storage/logo.png')}}" alt="" height="52"></a>
        <i class="fas fa-bars app-header__toggle"></i>
        <ul class="app-header__nav p-0 m-0 ml-auto">
            <li>
                <a href="#" class="dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"><span>&nbsp; Nguyễn Khánh</span></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a href="#" class="dropdown-item"><i class="far fa-user"></i>&nbsp; Thông tin</a>
                    <a href="{{route('logout')}}" class="dropdown-item"><i class="fas fa-sign-out-alt"></i>&nbsp; Đăng xuất</a>
                </div>
            </li>
        </ul>
    </header>

    <aside id="sidebar">
        <div class="app-sidebar">
            <div class="app-sidebar__user">
                <img src="{{asset('uploads/boy-avatar.png')}}" alt="Admin-avatar" class="app-sidebar__user-avatar">
                <div class="app-sidebar__user-info">
                    <h2 class="mb-2">Phan Chí Khang</h2>
                    <p class="mt-2"><i>Administrator</i></p>
                </div>
            </div>
            <ul class="app-sidebar__nav">
                <li><a href="{{route('dashboard')}}" class="{{ Request::segment(2)=='' ? 'active' : '' }}"><i class="fas fa-chart-pie"></i>Thống Kê</a></li>
                <li><a href="{{route('category')}}" class="{{ Request::segment(2)=='category' ? 'active' : '' }}"><i class="fas fa-list"></i> Danh mục</a></li>
                <li><a href=""><i class="fas fa-users"></i> Thành viên</a></li>
                <li><a href="{{route('slideShow')}}" class="{{ Request::segment(2)=='slide-show' ? 'active' : '' }}"><i class="far fa-images"></i> Slide-show</a></li>
            </ul>
        </div>
    </aside>

    <main id="app-main">
        @yield('content')
    </main>


    <!-- jQuery first, then Popper.js, Bootstrap JS, then main.js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{asset('js/admin.js')}}"></script>
</body>
</html>