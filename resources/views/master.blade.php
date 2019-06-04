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
    <link rel="stylesheet" href="{{asset('css/main.css')}}" type="text/css">
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
                    @if(!Auth::check())
                        <a href="javascript:" class="mr-3" data-toggle="modal" data-target="#loginModal"><i class="fas fa-user mr-1"></i> Đăng nhập</a>
                        <a href="{{route('register.create')}}"><i class="fas fa-sign-in-alt mr-1"></i> Đăng ký</a>            
                    @else
                        <a href="#" class="nav-link dropdown-toggle p-0 text-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user mr-1"></i> Phan Chí Khang</a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" class="dropdown-item"> Đơn mua</a>
                            <a href="#" class="dropdown-item"> Tài khoản của tôi</a>
                            <a href="{{route('merchant-channel')}}" class="dropdown-item"> Kênh người bán</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{route('logout')}}" class="dropdown-item"> Đăng xuất</a>
                        </div>
                    @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="app-header-middle my-3">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-4 col-md-6 col-12" id="brand-box">
                        <a href="{{route('home')}}"><img src="{{asset('storage/logo.png')}}" alt=""></a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 my-auto">
                        <form id="search-box" action="" method="GET" autocomplete="off">
                            <select name="" id="">
                                <option value="">- Tất cả -</option>
                            </select><input type="text" name="" value=""><button><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>                
            </div>
        </div>
        <div class="app-header-bottom">
            <div class="container d-flex justify-content-between align-items-center">
                <ul class="app-nav">
                    <li><a href="{{route('home')}}" class="active">Trang chủ</a></li>
                    @foreach($categories as $cate)
                    @if($cate->id_parent===0)
                    <li>
                        <a href="javascript:">{{$cate->name}} <i class="fas fa-angle-down ml-1"></i></a>
                        <div class="app-nav__mega-menu">
                            @foreach($cate->child as $cate_child)
                            <div class="mega-menu__column">
                                <h2><a href="{{$cate_child->name_url}}">{{$cate_child->name}}</a></h2>
                                <ul>
                                    @foreach($cate_child->child as $c)
                                    <li><a href="{{$c->name_url}}"><i class="fas fa-arrow-right mr-1"></i> {{$c->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            @endforeach
                        </div>
                    </li>
                    @endif
                    @endforeach
                    <!--
                    <li>
                        <a href="#">Thời trang nam <i class="fas fa-angle-down ml-1"></i></a>
                        <div class="app-nav__mega-menu">
                            <div class="mega-menu__column">
                                <h2><a href="#">Áo nam</a></h2>
                                <ul>
                                    <li><a href="#"><i class="fas fa-arrow-right mr-1"></i> Áo Vest</a></li>
                                    <li><a href="#"><i class="fas fa-arrow-right mr-1"></i> Áo Sơ-mi</a></li>
                                    <li><a href="#"><i class="fas fa-arrow-right mr-1"></i> Áo Thun</a></li>
                                    <li><a href="#"><i class="fas fa-arrow-right mr-1"></i> Áo Khoác</a></li>
                                </ul>
                            </div>
                            <div class="mega-menu__column">
                                <h2><a href="#">Quần nam</a></h2>
                                <ul>
                                    <li><a href="#"><i class="fas fa-arrow-right mr-1"></i> Quần Tây</a></li>
                                    <li><a href="#"><i class="fas fa-arrow-right mr-1"></i> Quần Jeans</a></li>
                                    <li><a href="#"><i class="fas fa-arrow-right mr-1"></i> Quần Jogger</a></li>
                                    <li><a href="#"><i class="fas fa-arrow-right mr-1"></i> Quần Thun</a></li>
                                    <li><a href="#"><i class="fas fa-arrow-right mr-1"></i> Quần Short</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="#">Thời trang nữ <i class="fas fa-angle-down ml-1"></i></a>
                        <div class="app-nav__mega-menu">
                            <div class="mega-menu__column">
                                <h2><a href="#">Áo nữ</a></h2>
                                <ul>
                                    <li><a href="#"><i class="fas fa-arrow-right mr-1"></i> Áo Vest</a></li>
                                    <li><a href="#"><i class="fas fa-arrow-right mr-1"></i> Áo Sơ-mi</a></li>
                                    <li><a href="#"><i class="fas fa-arrow-right mr-1"></i> Áo Thun</a></li>
                                    <li><a href="#"><i class="fas fa-arrow-right mr-1"></i> Áo Khoác</a></li>
                                </ul>
                            </div>
                            <div class="mega-menu__column">
                                <h2><a href="#">Quần nữ</a></h2>
                                <ul>
                                    <li><a href="#"><i class="fas fa-arrow-right mr-1"></i> Quần Tây</a></li>
                                    <li><a href="#"><i class="fas fa-arrow-right mr-1"></i> Quần Jeans</a></li>
                                    <li><a href="#"><i class="fas fa-arrow-right mr-1"></i> Quần Jogger</a></li>
                                    <li><a href="#"><i class="fas fa-arrow-right mr-1"></i> Quần Thun</a></li>
                                    <li><a href="#"><i class="fas fa-arrow-right mr-1"></i> Quần Short</a></li>
                                </ul>
                            </div>
                            <div class="mega-menu__column">
                                <h2><a href="#">Váy</a></h2>
                                <ul>
                                    <li><a href="#"><i class="fas fa-arrow-right mr-1"></i> Váy Xòe</a></li>
                                    <li><a href="#"><i class="fas fa-arrow-right mr-1"></i> Váy Cưới</a></li>
                                    <li><a href="#"><i class="fas fa-arrow-right mr-1"></i> Váy Chữ A</a></li>
                                    <li><a href="#"><i class="fas fa-arrow-right mr-1"></i> Váy Tiệc</a></li>
                                    <li><a href="#"><i class="fas fa-arrow-right mr-1"></i> Váy Công Sở</a></li>
                                </ul>
                            </div>
                            <div class="mega-menu__column">
                                <h2><a href="#">Đầm</a></h2>
                                <ul>
                                    <li><a href="#"><i class="fas fa-arrow-right mr-1"></i> Đầm Công Sở</a></li>
                                    <li><a href="#"><i class="fas fa-arrow-right mr-1"></i> Đầm Dạ Hội</a></li>
                                    <li><a href="#"><i class="fas fa-arrow-right mr-1"></i> Đầm ngủ</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    -->
                </ul>
                <div class="app-cart">
                    <div class="toggle-cart">
                        <i class="fas fa-shopping-basket"></i> Giỏ hàng <span class="badge badge-primary">0</span>
                    </div>
                    <div class="cart-box p-1">
                        <div style="min-width:330px;min-height:60px;max-height:200px;overflow-y:auto;">
                            <div class="cart-item">
                                <span class="cart-item-left">
                                    <img src="http://lorempixel.com/50/50/" alt="IMG_CART_ITEM"/>
                                    <span class="cart-item-info">
                                        <h3>Món gì đó 1</h3>
                                        <p class="mt-1"><span class="text-danger"><i>1.000.000<sup>đ</sup></i></span> x 1</p>
                                    </span>
                                </span>
                                <span class="cart-item-right">
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </span>
                            </div>
                            <div class="cart-item">
                                <span class="cart-item-left">
                                    <img src="http://lorempixel.com/50/50/" alt="IMG_CART_ITEM"/>
                                    <span class="cart-item-info">
                                        <h3>Món gì đó 1</h3>
                                        <p class="mt-1"><span class="text-danger"><i>1.000.000<sup>đ</sup></i></span> x 1</p>
                                    </span>
                                </span>
                                <span class="cart-item-right">
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </span>
                            </div> 
                        </div>
                        <div style="text-align:center;border-top:1px solid #eee;padding:10px 0;cursor:initial">
                            <a href="{{route('cart.show')}}" style="display:inline-block;font-size:16px;font-weight:bold">Xem giỏ hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- END: header -->

    <!-- START: Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle" style="color:var(--purple-2)"><i class="fas fa-user"></i> Đăng Nhập</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if(session()->has('errorLogin'))
                    <div class="alert alert-danger" role="alert">
                        {{ session()->get('errorLogin') }}
                    </div>
                    @endif
                    <form action="{{route('login')}}" method="POST" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="email" name="email" class="form-control" placeholder="Nhập tài khoản của bạn...">                            
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu của bạn...">
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Ghi nhớ đăng nhập?</label>
                        </div>
                        <div class="text-right mt-3">
                            <button class="btn btn-primary">Đăng Nhập</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer text-center" style="display:block">
                    <p class="m-0">Chưa có tài khoản?<a href="{{route('register.create')}}" class="text-primary"> Đăng ký</a></p>
                    <p class="m-0"><a href="#" class="text-danger">Quên mật khẩu?</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Login Modal -->

    <!-- START: sidebar -->
    <!-- END: sidebar -->

    <!-- START: Slide Show -->
    <section class="my-3">
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{asset('uploads/slideShow/banner_1.jpg')}}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{asset('uploads/slideShow/banner_2.jpg')}}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{asset('uploads/slideShow/banner_3.jpg')}}" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>
    <!-- END: Slide Show -->

    <!-- START: main -->
    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>
    <!-- END: main -->

    <!-- START: footer -->
    <footer class="app-footer">
        <div class="app-footer-middle">
            <div class="container">
                <div class="row">
                    <div class=" col-md-3 app-footer-middle_left mb-3">
                        <div class="footer-title">
                            <h4>Vô Thượng</h4>
                        </div>
                        <div class="footer-content">
                        Mua hàng trực tuyến (mua hàng online) mang lại sự tiện lợi, lựa chọn đa dạng hơn và các dịch vụ tốt hơn cho người tiêu dùng, 
                        thế nhưng người tiêu dùng Việt Nam vẫn chưa tận hưởng được những tiện ích đó. Chính vì vậy Vô Thượng được triển khai với mong muốn trở thành trung tâm mua sắm trực tuyến số 1 tại Việt Nam, 
                        nơi bạn có thể chọn lựa cho mình những mẫu thời trang nam, nữ với giá cả phải chăng nhất. <br>
                        </div>
                    </div>
                    <div class="col-md-3 app-footer-middle_left mb-3">
                        <div class="footer-content">
                        Ngoài ra bạn cũng có thể tham gia bán hàng trực tuyến thông qua hệ thống marketplace của Vô Thượng với rất nhiều hỗ trợ và dịch vụ hấp dẫn. 
                        Bây giờ bạn có thể trải nghiệm mua hoặc xem các mẫu thời trang online thỏa thích mà Vô Thượng mang lại. Dù bạn là một nhà quản lý bận rộn với công việc hay là người nội trợ với danh sách dài việc phải làm, 
                        chắc chắn bạn cũng sẽ yêu thích trải nghiệm mua hàng tại Vô Thượng - mua những sản phẩm thời trang trực tuyến dễ dàng hơn, thuận tiện hơn và tiết kiệm thời gian.
                        </div>
                    </div>
                    <div class="col-md-3 app-footer-middle__middle mb-3">
                        <div class="footer-title">
                            <h4>Liên hệ</h4>
                        </div>
                        <div class="footer-content">
                            <p>
                                <i class="fas fa-phone"></i>&nbsp;Hotline 1: (090) 9999 333
                            </p>
                            <p>
                                <i class="fas fa-phone"></i>&nbsp;Hotline 2: (090) 9999 888
                            </p>
                            <p>
                                <i class="far fa-envelope"></i>&nbsp;Email: vothuong@hotline.com
                            </p>
                            <p>
                               <i class="fas fa-map-marker-alt"></i>&nbsp;Địa chỉ: Tp.Hồ Chí Minh
                            </p>  
                        </div>
                        <div class="footer-title mt-3">
                            <h4>Hãy liên kết với chúng tôi</h4>
                        </div>
                        <div class="footer-content">   
                            <p class="footer-social-network mb-0">
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-facebook-square"></i></a>
                                <a href="#"><i class="fab fa-google-plus-square"></i></a>
                                <a href="#"><i class="fab fa-skype"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                            </p>                       
                        </div>
                    </div>
                    <div class="col-md-3 app-footer-middle__right mb-3">
                        <div class="footer-title">
                            <h4>Các danh mục</h4>
                        </div>
                        <div class="footer-content">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-footer-bottom">
            <p>&copy; 2019 - Design by Vô Thượng</p>
        </div>
    </footer>
    <!-- END: footer -->

    <!-- jQuery first, then Popper.js, Bootstrap JS, then main.js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>