@include('layouts.header');

<!-- Banner Start -->
<div class="banner">
    <img class="OF-cover img-responsive" src="images/menu-list-banner.jpg" alt="">
    <div class="banner-overlay"></div>
    <div class="banner-title">
        <h5>restaurant</h5>
        <h1>Menu</h1>
        <p>juicy flavours</p>
    </div>
</div>
<!-- Banner End -->
<!-- Content-Of-Blog-Detail Start -->
<div class="content menu-list menu-list-full">
    <div class="row gutter-md">
        @foreach($category as $cat)
            <div class="col-sm-12 col-md-12">
                <div class="menu-list-title">
                    <h2>{{$cat}}</h2>
                </div>
            </div>
            @foreach($menu as $m)
                @if($m->category == $cat)
                    <div class="col-sm-12 col-md-6">
                        <ul>
                            <li>
                                <div class="price-item-main">
                                    <h4 class="list-item-title">{{$m->name}}</h4>
                                    <div class="price-list-dotted-separator"></div>
                                    <div class="list-item-price">${{$m->price}}</div>
                                </div>
                                <div class="price-item-desc">
                                    <p>{!!nl2br($m->description)!!}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                @endif
            @endforeach
            <div class="col-sm-12 col-md-12">
                <div class="height-of-menu-list"></div>
            </div>
        @endforeach
    </div>
</div>
<!-- Content-Of-Blog-Detail End -->
