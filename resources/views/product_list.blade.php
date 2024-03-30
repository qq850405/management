<!DOCTYPE html>
<html lang="en">

<style>
    .product_photo{
        width: 100px;
        height: 100px;
    }
    .ms-panel-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>
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
    <br>
    <!-- Body Content Wrapper -->



    <div class="ms-panel">
        <div class="ms-panel-header">
            <h6>Product List</h6>
            <a href="/product/onlineordering/update" class="btn btn-success">Turn on All Online Ordering</a>
        </div>
        <div class="ms-panel-body">
            <div class="table-responsive">
                <table class="table table-hover thead-primary">
                    <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Category</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Inventory</th>
                        <th scope="col">Online Ordering</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Remove</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($menu as $m)
                    <tr>
                        <td>{{$m->id}}</td>
                        <td>{{$m->category}}</td>
                        <td><a href="/product/update?id={{$m->id}}">{{$m->name}}</a></td>
                        <td>{{$m->price}}</td>
                        <td>{{$m->inventory}}</td>
                        <td>{{$m->online_ordering}}</td>
                        <td class="product_photo"><img src="{{asset(("images/".($m->photo ?? 'black.jpg')))}}" alt=""></td>
                        <td><a href="/product/delete?id={{$m->id}}" class="delete-confirm">X</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
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

<script>
    // 当文档加载完毕时
    document.addEventListener('DOMContentLoaded', function() {
        // 获取所有的删除确认链接
        var deleteLinks = document.querySelectorAll('.delete-confirm');

        // 为每个链接添加点击事件监听器
        deleteLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                // 阻止链接的默认行为
                event.preventDefault();
                // 弹出确认框
                var confirmResult = confirm('Are you sure you want to delete this item?');
                // 如果用户点击“确定”，则继续执行链接的href属性
                if (confirmResult) {
                    window.location.href = this.href;
                }
            });
        });
    });
</script>

</body>
@include('layouts.header')


</html>
