<header id="htc__header" class="htc__header__area header--one" style="background-color: #d4d4d4; height: 120px">
    <!-- Start Mainmenu Area -->
    <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
        <div class="container">
            <div class="row">
                <div class="menumenu__container clearfix" style="margin-top: 20px;">
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5" > 
                        <div class="logo pt-2">
                             <a href="/"><img src="../libs/giotai.png" alt="logo images" class="img-responsive" style="border-radius: 50%; height: 120px" ></a>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                        <nav class="main__menu__nav hidden-xs hidden-sm">
                            <ul class="main__menu">
                                <li class="drop"><a href="/">Trang Chủ</a></li>
                                <li class="drop"><a href="/shop">Cửa Hàng</a>
                                    <ul class="dropdown mega_dropdown">
                                        <!-- Start Single Mega MEnu -->
                                        <li><a class="mega__title" href="/shop">Không Gian</a>
                                            <ul class="mega__item">
                                                @foreach ($dataBrand as $item)
                                                <li><a href="/shop/brand/{{$item->brand_id}}-{{Str::slug($item->brand_name, '-')}}.html">{{$item->brand_name}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <!-- End Single Mega MEnu -->
                                        <!-- Start Single Mega MEnu -->
                                        <li><a class="mega__title" href="/shop">Loại Sản Phẩm</a>
                                            <ul class="mega__item">
                                                @foreach ($dataCategory as $item)
                                                <li><a href="/shop/category/{{$item->category_id}}-{{Str::slug($item->category_name, '-')}}.html">{{$item->category_name}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <!-- End Single Mega MEnu -->
                                    </ul>
                                </li>
                                <li class="drop"><a href="/blog">Giới thiệu</a></li>
                                <li><a href="/contact">Thông Tin Liên Hệ</a></li>
                            </ul>
                        </nav>

                        <div class="mobile-menu clearfix visible-xs visible-sm">
                            <nav id="mobile_dropdown">
                                <ul>
                                    <li class="drop"><a href="/">Trang Chủ</a></li>
                                    <li class="drop"><a href="/shop">Của Hàng</a>
                                    </li>
                                    <li class="drop"><a href="/blog">Bài Viết</a></li>
                                    <li><a href="/contact">Liên Hệ</a></li>
                                </ul>
                            </nav>
                        </div>  
                    </div>
                    <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                        <div class="header__right">
                            <div class="header__search search search__open">
                                <a href=""><i class="fa fa-search"></i></a>
                            </div>
                            <div class="header__account">
                                <a href="/customer"><i class="fa fa-user-circle-o"></i></a>
                            </div>
                            <div class="htc__shopping__cart">
                            
                                {{-- <button class="cart__menu" type="button"><i class="fa fa-cart-arrow-down"></button> --}}
                                <a class="cart__menu" href="javascript:;"><i class="fa fa-cart-arrow-down"></i></a>
                                {{-- <a href="#"> --}}
                                    {{-- <span class="htc__qua">{{$countCart}}</span> --}}
                                </a>
                            </div>
                            {{-- <div>
                                <div>
                                    <input type="checkbox" class="checkbox" id="checkbox">
                                    <label for="checkbox" class="label">
                                        <i class="fas fa-moon"></i>
                                        <i class="fas fa-sun"></i>
                                        <div class="ball"></div>
                                    </label>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu-area"></div>
        </div>
    </div>

    <!-- End Mainmenu Area -->
</header>