<!DOCTYPE html>
<html lang="en">
<style>
    .word-wrap-cell {
        max-width: 200px;
        /* 设置最大宽度 */
        word-wrap: break-word;
        /* 允许长单词换行 */
    }
</style>
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
        background-color: #fff;
        margin: 10% auto;
        padding: 20px;
        border: none;
        width: 50%;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .close {
        color: #666;
        float: right;
        font-size: 28px;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .custom-file-upload {
        border: 1px solid #ccc;
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
        border-radius: 4px;
        background-color: #f8f8f8;
        margin-bottom: 10px;
    }

    .btn {
        background-color: #008CBA;
        color: white;
        padding: 3px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 15px;
    }

    #fileInput {
        opacity: 0;
        position: absolute;
        z-index: -1;
    }

    #fileName {
        font-size: 16px;
        font-style: italic;
        margin-top: 5px;
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
                        <input type="search" class="ms-form-input" name="search" placeholder="Search here..."
                            value=""> <i class="flaticon-search text-disabled"></i>
                    </div>
                </form>
            </li>


        </ul>
        <div class="ms-toggler ms-d-block-sm pr-0 ms-nav-toggler" data-toggle="slideDown" data-target="#ms-nav-options">
            <span class="ms-toggler-bar bg-primary"></span>
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


                </head>

                <body>


                    <form method ="POST" action ="/system/poster/update" enctype="multipart/form-data">

                        <div id="myModal" class="modal">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                <label for="fileInput" class="custom-file-upload">
                                    選擇檔案
                                </label>
                                <input type="file" id="fileInput" name="fileInput" onchange="showFileName()" />
                                <div id="fileName">尚未選擇檔案</div>
                                <button type="submit" class="btn">送出</button>
                            </div>
                        </div>
                    </form>

                    <div class="col-md-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb pl-0">
                                <li class="breadcrumb-item"><a href="/"><i class="material-icons">home</i>
                                        Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">System</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Poster</li>
                            </ol>
                        </nav>

                        <div class="ms-panel">
                            <div class="ms-panel-header header-mini">
                                <div class="d-flex justify-content-between">
                                    <h6>Poster</h6>
                                    <button class="btn btn-secondary" id="btnOpenModal">Upload</button>
                                </div>
                            </div>



                            <div class="ms-panel-body">
                                    <table class="table table-hover thead-primary">
                                        <thead>
                                            <tr>

                                                <th scope="col">Upload Time</th>
                                                <th scope="col">Thumbnail</th>
                                                <th scope="col">Delete</th>

                                            </tr>
                                        </thead>
                                        <tbody>


                                            @foreach ($poster as $item)
                                                <tr>
                                                    <td>{{ $item->created_at }}</td>
                                                    <td>
                                                        <a href="/images/{{ $item->filename }}">
                                                            <img src="/images/{{ $item->filename }}" width="100px"
                                                                height="100px">
                                                        </a>
                                                    <td>
                                                        <a href="/system/poster/delete?id={{ $item->id }}"
                                                            onclick="return confirmDelete()">X</a>
                                                    </td>
                                            @endforeach
                                        </tbody>


                                    </table>

    </main>
    <!-- SCRIPTS -->
    <!-- Global Required Scripts Start -->
    <script src="{{ asset('/assets/js/jquery-3.5.0.min.js') }}"></script>
    <script src="{{ asset('/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('/assets/js/jquery-ui.min.js') }}"></script>
    <!-- Global Required Scripts End -->

    <!-- Page Specific Scripts Start -->
    <script src="{{ asset('/assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('/assets/js/moment.js') }}"></script>
    <script src="{{ asset('/assets/js/jquery.webticker.min.js') }}"></script>
    <script src="{{ asset('/assets/js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/js/Chart.Financial.js') }}"></script>
    <!-- Page Specific Scripts Finish -->

    <!-- Costic core JavaScript -->
    <script src="{{ asset('/assets/js/framework.js') }}"></script>

    <!-- Settings -->
    <script src="{{ asset('/assets/js/settings.js') }}"></script>
    <script>
        var modal = document.getElementById('myModal');
        var btn = document.getElementById('btnOpenModal');
        var span = document.getElementsByClassName('close')[0];

        btn.onclick = function() {
            modal.style.display = "block";
        }

        span.onclick = function() {
            modal.style.display = "none";
        }

        function closeModal() {
            alert('準備上傳檔案！');
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        function showFileName() {
            var input = document.getElementById('fileInput');
            var fileName = document.getElementById('fileName');
            if (input.files.length > 0) {
                var file = input.files[0];
                fileName.textContent = '選擇的檔案名稱: ' + file.name;
            } else {
                fileName.textContent = '尚未選擇檔案';
            }
        }

        function confirmDelete() {
            return confirm('Do you want to delete?');
        }
    </script>
</body>

@include('layouts.header')

</html>
