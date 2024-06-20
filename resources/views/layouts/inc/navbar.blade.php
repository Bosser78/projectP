
<section class="ftco-section">
    <div class="container-fluid px-md-5">
        <div class="row justify-content-between">
            <div class="col-md-8 order-md-last">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <a class="navbar-brand" href="index.html">Pharmacy<span>ร้านขายยา ขายทุกอย่างยกเว้นยา</span></a>
                    </div>
                    <div class="col-md-6 d-md-flex justify-content-end mb-md-0 mb-3">
                        <form action="#" class="searchform order-lg-last">
                            <div class="form-group d-flex">
                                <input type="text" class="form-control pl-3" placeholder="Search">
                                <button type="submit" placeholder="" class="form-control search"><span
                                        class="fa fa-search"></span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="social-media">
                    <p class="mb-0 d-flex">
                        <a href="#" class="d-flex align-items-center justify-content-center"><span
                                class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
                        <a href="#" class="d-flex align-items-center justify-content-center"><span
                                class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
                        <a href="#" class="d-flex align-items-center justify-content-center"><span
                                class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
                        <a href="#" class="d-flex align-items-center justify-content-center"><span
                                class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span> Menu
            </button>


                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item {{ request()->is('about') ? 'active' : '' }}"><a href="{{ url('about') }}" class="nav-link">หน้าหลัก</a></li>
                        <li class="nav-item {{ request()->is('about') ? '' : '' }}"><a href= "{{ url('viewcart') }}" class="nav-link">ตะกร้าสินค้า</a></li>
                        <li class="nav-item {{ request()->is('about') ? '' : '' }}"><a href="{{ url('history') }}" class="nav-link">ประวัติการซื้อ</a></li>
                        <li class="nav-item {{ request()->is('about') ? '' : '' }}"><a href="{{ url('chartgoogle') }}" class="nav-link">จำนวนสินค้าที่ขาย</a></li>
                       @if (session('userRole') == 'admin'&&Session::has('loginId'))
                       <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" id="dropdown04" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">การจัดการ</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                                <a class="dropdown-item" href={{ url('add-medic') }}>เพิ่มสินค้า</a>
                                <a class="dropdown-item" href={{ url('all-medic') }}>ลบ - แก้ไข</a>

                                <a class="dropdown-item" href="#">ดูรายการสินค้า</a>
                                <a class="dropdown-item" href="#">เพิ่มผู้ดูแลระบบ</a>
                            </div>
                        </li>@endif
                    </ul>
                </div>

            <div>

                 @if (Session::has('loginId'))
                <tr>
                                    <td >{{ $data->name }}&nbsp;&nbsp;</td>

                                    <td><a href="{{ url('logout') }}">logout</a></td>
                                </tr>
                                @endif
                 @unless (Session::has('loginId'))
        <td><a href="{{ url('login') }}">login</a></td>
    @endunless

            </div>
        </div>
    </nav>
    <!-- END nav -->
</section>
