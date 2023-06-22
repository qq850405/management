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
    <br>
    <!-- Body Content Wrapper -->



    <div class="col-xl-12 col-md-12">
        <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
                <h6>Update Product Form</h6>
            </div>
            <div class="ms-panel-body">
                <form enctype="multipart/form-data" class="needs-validation clearfix" method="post" action="/product/update">
                    @csrf
                    <input type="hidden" name="id" value="{{$p->id}}"/>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom18">Product Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="validationCustom18" placeholder="Product Name" value="{{$p->name}}"  name="name" required>
                                <div class="valid-feedback">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="validationCustom22">Category</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="validationCustom18" placeholder="Category Name" value="{{$p->category}}" name="category" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom24">Inventory</label>
                            <div class="input-group">
                                <input type="number" step="0.1" class="form-control" id="validationCustom24" placeholder="01" name="inventory" value="{{$p->inventory}}" required>
                                <div class="invalid-feedback">
                                    Quantity
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom25">Price</label>
                            <div class="input-group">
                                <input type="number" step="0.1" class="form-control" id="validationCustom25" placeholder="10" name="price" value="{{$p->price}}" required>
                                <div class="invalid-feedback">
                                    Price
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom12">Description</label>
                            <div class="input-group">
                                <textarea rows="5" id="validationCustom12" class="form-control" placeholder="Message" name="description" >{{$p->description}}</textarea>
                                <div class="invalid-feedback">
                                    Please provide a message.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom12">Product Image</label>
                            <div class="custom-file">
                                <input type="file" name="photo" class="custom-file-input" accept="image/png, image/jpeg">
                                <label class="custom-file-label" for="validatedCustomFile">Upload Images...</label></div>
                        </div>

                        <div class="ms-panel-header new">
                            <p class="medium">Recommend</p>
                            <div>
                                <label class="ms-switch">
                                    <input type="checkbox" name = "recommend"  {{($p->recommendation == 'on') ? 'checked' : ''}}">
                                    <span class="ms-switch-slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="ms-panel-header new">
                            <p class="medium">Online Ordering</p>
                            <div>
                                <label class="ms-switch">
                                    <input type="checkbox"  name = "online_ordering" {{($p->online_ordering == 'on') ? 'checked' : ''}}>
                                    <span class="ms-switch-slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary d-block" type="submit">Update Product</button>
                </form>

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
