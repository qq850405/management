<!-- Overlays -->
<div class="ms-aside-overlay ms-overlay-left ms-toggler" data-target="#ms-side-nav" data-toggle="slideLeft"></div>
<div class="ms-aside-overlay ms-overlay-right ms-toggler" data-target="#ms-recent-activity" data-toggle="slideRight"></div>
<!-- Sidebar Navigation Left -->
<aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">
    <!-- Logo -->
    <div class="logo-sn ms-d-block-lg">
        <a class="pl-0 ml-0 text-center" href="/">
            <img src="{{ asset('/images/logo.png') }}" alt="logo">
        </a>
    </div>
    <!-- Navigation -->
    <ul class="accordion ms-main-aside fs-14" id="side-nav-accordion">
        <!-- Dashboard -->
        <li class="menu-item">
            <a href="/">
                <span><i class="material-icons fs-16">dashboard</i>Dashboard </span>
            </a>
        </li>
        <!-- /Dashboard -->
        <!-- product -->
        <li class="menu-item">
            <a href="#" class="has-chevron" data-toggle="collapse" data-target="#product" aria-expanded="false"
                aria-controls="product"> <span><i class="fa fa-archive fs-16"></i>Menus </span>
            </a>
            <ul id="product" class="collapse" aria-labelledby="product" data-parent="#side-nav-accordion">
                <li> <a href="/product/list">Menu List</a>
                </li>
                <li> <a href="/product/add">Add Product</a>
                </li>
            </ul>
        </li>
        <!-- product end -->
        <!-- orders -->
        {{--        <li class="menu-item"> --}}
        {{--            <a href="order/detail"> <span><i class="fas fa-clipboard-list fs-16"></i>Orders</span> --}}
        {{--            </a> --}}
        {{--        </li> --}}
        <li class="menu-item">
            <a href="#" class="has-chevron" data-toggle="collapse" data-target="#system" aria-expanded="false"
                aria-controls="system"> <span><i class="fa fa-cog fs-16"></i>System </span>
            </a>
            <ul id="system" class="collapse" aria-labelledby="system" data-parent="#side-nav-accordion">
                <li> <a href="/system/poster">Poster</a>
                </li>

            </ul>
        </li>
    </ul>
</aside>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
