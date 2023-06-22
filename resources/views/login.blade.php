@include('layouts.header')

<!-- Banner Start -->

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

