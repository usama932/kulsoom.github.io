@include('layouts.header')
<!-- start inner-banner -->
<section class="inner-banner">
    <h1 class="font-weight-bold text-center">Contact Us</h1>
</section>
<!-- end inner-banner -->
<!-- start contact -->
<section class="contact-section">
    <div class="container">
        <div class="sec-title text-center mb-3" data-aos="fade-up" data-aos-duration="1000">
            <span class="title">Get In Touch</span>
            <h2>We’d Love To Here From You</h2>
            <div class="divider">
                <span class="fa fa-mortar-board"></span>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="contact-form p-5" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="border-line"></div>
                    <h3 class="font-weight-bold color-orange">Drop Message</h3>
                    <form action="{{ route('contact') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName">Name</label>
                            <input class="form-control" name="name" id="exampleInputName" placeholder="Enter Name" required type="text">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email Address</label>
                            <input class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter Email" required type="email">
                            <small class="form-text text-muted" id="emailHelp">We'll never share your email with anyone
                                else.
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNumber">Phone Number</label>
                            <input class="form-control" name="phone" id="exampleInputNumber" placeholder="Enter Number" type="text">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputMessage">Message</label>
                            <input class="form-control" name="message" id="exampleInputMessage" placeholder="Message" required type="text">
                        </div>
                       
                        <button class="btn theme-orange border-0 mt-4" name="submit" type="submit">Send Message</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 ml-minus">
                <div class="media p-3 align-items-center theme-blue mb-3" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="media-body text-left">
                        <h6 class="color-orange font-weight-bold mb-1">Address</h6>
                        <p class="mb-0">Gulshan - E - Iqbal</p>
                    </div>
                    <img class="img-fluid contact-icon" data-aos="zoom-in" data-aos-duration="1050" src="assets/images/icons/location.png" alt="Location">
                </div>
                <div class="media p-3 align-items-center theme-blue mb-3" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="media-body text-left">
                        <h6 class="color-orange font-weight-bold mb-1">Email</h6>
                        <p class="mb-0">fkulsoom813@gmail.com</p>
                    </div>
                    <img class="img-fluid contact-icon" data-aos="zoom-in" data-aos-duration="1500" src="assets/images/icons/mail.png" alt="Mail">
                </div>
                <div class="media p-3 align-items-center theme-blue" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="media-body text-left">
                        <h6 class="color-orange font-weight-bold mb-1">Contact Number</h6>
                        <p class="mb-0">+92-336-1279077</p>
                    </div>
                    <img class="img-fluid contact-icon" data-aos="zoom-in" data-aos-duration="1050" src="assets/images/icons/call.png" alt="Call">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end contact -->
<!-- start map -->
<section class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.15830872278!2d-74.11976395795979!3d40.69766374873451!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sin!4v1567509516196!5m2!1sen!2sin" class="w-100 border-0" height="450" allowfullscreen=""></iframe>
</section>
@include('layouts.footer')
