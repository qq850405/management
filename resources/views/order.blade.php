<!DOCTYPE html>
<html lang="en">


@include('layouts.nav')
<!-- Restaurant Section Start -->
<body class="ms-body ms-aside-left-open ms-primary-theme ms-has-quickbar">
<nav class="navbar ms-navbar">
    <div class="ms-aside-toggler ms-toggler pl-0" data-target="#ms-side-nav" data-toggle="slideLeft">
        <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
    </div>
    <div class="logo-sn logo-sm ms-d-block-sm">

    </div>
    <ul class="ms-nav-list ms-inline mb-0" id="ms-nav-options">
        <li class="ms-nav-item ms-search-form pb-0 py-0">
            <form class="ms-form" method="post">
                <div class="ms-form-group my-0 mb-0 has-icon fs-14">
                    <input type="search" class="ms-form-input" name="search" placeholder="Search here..." value=""> <i class="flaticon-search text-disabled"></i>
                </div>
            </form>
        </li>


    </ul>
    <div class="ms-toggler ms-d-block-sm pr-0 ms-nav-toggler" data-toggle="slideDown" data-target="#ms-nav-options"> <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
    </div>
</nav>
<!-- Preloader -->
<div id="preloader-wrap">
    <div class="spinner spinner-8">
        <div class="ms-circle1 ms-child"></div>
        <div class="ms-circle2 ms-child"></div>
        <div class="ms-circle3 ms-child"></div>
        <div class="ms-circle4 ms-child"></div>
        <div class="ms-circle5 ms-child"></div>
        <div class="ms-circle6 ms-child"></div>
        <div class="ms-circle7 ms-child"></div>
        <div class="ms-circle8 ms-child"></div>
        <div class="ms-circle9 ms-child"></div>
        <div class="ms-circle10 ms-child"></div>
        <div class="ms-circle11 ms-child"></div>
        <div class="ms-circle12 ms-child"></div>
    </div>
</div>

<!-- Main Content -->
<main class="body-content">
    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">
        <div class="row">

            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb pl-0">
                        <li class="breadcrumb-item"><a href="/"><i class="material-icons">home</i> Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Details</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Order Details</li>
                    </ol>
                </nav>

                <div class="ms-panel">
                    <div class="ms-panel-header header-mini">
                        <div class="d-flex justify-content-between">
                            <h6>Order</h6>
                        </div>
                    </div>
                    <div class="ms-panel-body">

                        <!-- Invoice To -->
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="invoice-address">
                                    <h3>{{$detail[0]->billing_name}}</h3>
                                    <p>{{$detail[0]->billing_email}}</p>
                                    <p>{{$detail[0]->billing_phone}}</p>
                                    <p class="mb-0">{{$detail[0]->address}}</p>
                                </div>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <ul class="invoice-date">
                                    <li>Order Date : {{$detail[0]->created_at}}</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Invoice Table -->
                        <div class="ms-invoice-table table-responsive mt-5">
                            <table class="table table-hover text-right thead-light">
                                <thead>
                                <tr class="text-capitalize">
                                    <th class="text-left">description</th>
                                    <th>qty</th>
                                    <th>Price</th>
                                    <th>total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($detail as $d)
                                <tr>
                                    <td class="text-left">{{$d->name}}</td>
                                    <td>{{$d->quantity}}</td>
                                    <td>${{$d->price}}</td>
                                    <td>${{$d->quantity * $d->price}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="3">Total : </td>
                                    <td>${{$d->billing_total}}</td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="invoice-buttons text-right">
                            @if($detail[0]->status == null)
                                <a href="/order/update?status=preparing&order_id={{$d->id}}" class="btn btn-primary mr-2">Start To Prepare</a>
                            @elseif($detail[0]->status == 'preparing')
                                <a href="/order/update?status=done&order_id={{$d->id}}" class="btn btn-primary">Done</a>
                            @endif
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</main>
<!-- SCRIPTS -->
<!-- Global Required Scripts Start -->
<script src="{{asset("/assets/js/jquery-3.5.0.min.js")}}"></script>
<script src="{{asset("/assets/js/popper.min.js")}}"></script>
<script src="{{asset("/assets/js/bootstrap.min.js")}}"></script>
<script src="{{asset("/assets/js/perfect-scrollbar.js")}}"> </script>
<script src="{{asset("/assets/js/jquery-ui.min.js")}}"> </script>
<!-- Global Required Scripts End -->

<!-- Page Specific Scripts Start -->
<script src="{{asset("/assets/js/slick.min.js")}}"> </script>
<script src="{{asset("/assets/js/moment.js")}}"> </script>
<script src="{{asset("/assets/js/jquery.webticker.min.js")}}"> </script>
<script src="{{asset("/assets/js/Chart.bundle.min.js")}}"> </script>
<script src="{{asset("/assets/js/Chart.Financial.js")}}"> </script>
<!-- Page Specific Scripts Finish -->

<!-- Costic core JavaScript -->
<script src="{{asset("/assets/js/framework.js")}}"></script>

<!-- Settings -->
<script src="{{asset("/assets/js/settings.js")}}"></script>
</body>
@include('layouts.header')
</html>
