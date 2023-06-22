@include('layouts.header');

<!-- Banner Start -->
<div class="banner">
    <img class="OF-cover img-responsive" src="images/specialties-parra-img.jpg" alt="">
    <div class="banner-overlay"></div>
    <div class="banner-title">
        <h5>make an online</h5>
        <h1>Reservation</h1>
        <p>Or call us at <span>00 40 555 1234</span> any day from</p>
        <h4>10:00 AM - 07:00 PM</h4>
    </div>
</div>
<!-- Banner End -->
<!-- Reservation Form Section Start -->
<div class="content inner-pg reservation-section">
    <div class="container">
        <div class="reservation-form">
            <div class="row">
                <div class="col-sm-10 col-md-8 col-centered">
                    <form action="/login" method="POST" >
                        @csrf
                        <h5>Login</h5>
                        <div class="row">
                            <div class="col-sm-4 col-md-12">
                                <div class="form-group">
                                    <label>email</label>
                                    <input id="account" name="email" type="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-12">
                                <div class="form-group">
                                    <label>password</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                            </div>
                        </div>
                        <div class="send-message text-center">
                            <button type="submit" class="btn btn-default">login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Specialties Section Start -->

