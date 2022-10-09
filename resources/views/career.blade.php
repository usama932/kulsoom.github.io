@include('layouts.header')


<!-- start inner-banner -->
<section class="inner-banner">
    <h1 class="font-weight-bold text-center">Career</h1>
</section>
<!-- end inner-banner -->
<!-- start contact -->
<section class="contact-section">
    <div class="container">
        <div class="sec-title text-center mb-3" data-aos="fade-up" data-aos-duration="1000">
            <span class="title">Send your resume to get job opportunity!</span>
            <h2>Find a Career Opportunity</h2>

            <div class="divider">
                <span class="fa fa-mortar-board"></span>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class="career-form p-5" data-aos="fade-up" data-aos-duration="1000">
                    <div class="border-line"></div>
                    <h3 class="font-weight-bold color-orange">Job Application</h3>
                   
                    <form method="post" enctype="multipart/form-data" action="{{ route('career.store') }}" data-fouc>
                    @csrf
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputName">Name</label>
                                <input class="form-control" id="exampleInputName" name="name" placeholder="Enter Name" type="text" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Email Address</label>
                                <input class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter Email" type="email" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputNumber">Phone Number</label>
                                <input class="form-control" id="exampleInputNumber" name="phone" placeholder="Enter Number" type="text" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Position</label>
                                <select class="form-control" id="inputState" name="position">
                                    <option selected>Choose...</option>
                                    <option value="Teaching">Teaching</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Assisting">Assisting</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputMessage">Message</label>
                            <textarea class="form-control" name="message" id="exampleInputMessage" placeholder="Message"></textarea>
                        </div>

                        <div class="form-group">
                            <label>
                                <!-- <span class="mb-0 resume">Drop Your Resume</span> -->
                                <input class="form-control-file pl-0 border-0" id="resume" name="resume" type="file">
                            </label>
                        </div>
                        <button class="btn theme-orange border-0" type="submit">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end contact -->
@include('layouts.footer')
