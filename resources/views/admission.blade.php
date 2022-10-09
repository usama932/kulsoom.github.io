@include('layouts.header')
<!-- start inner-banner -->
<section class="inner-banner">
    <h1 class="font-weight-bold text-center">Admission Form</h1>
</section>
<!-- end inner-banner -->
<!-- start contact -->
<section class="contact-section">
    <div class="container">
        <div class="sec-title text-center mb-3" data-aos="fade-up" data-aos-duration="1000">
            <span class="title">Submit your admission form request to us.</span>
            <h2>Admit Your Child</h2>
            <div class="divider">
                <span class="fa fa-mortar-board"></span>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class="career-form p-5" data-aos="fade-up" data-aos-duration="1000">
                    <div class="border-line"></div>
                    <h3 class="font-weight-bold color-orange">Admission Application</h3>
                   
                    <form method="post" enctype="multipart/form-data" action="{{ route('admission') }}">
                    @csrf
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputName">Student Name</label>
                                <input class="form-control" id="exampleInputName" name="stname" placeholder="Enter Student Name" type="text" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Email Address</label>
                                <input class="form-control" id="exampleInputEmail1"name="email" placeholder="Enter Email" type="email" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputNumber">Phone Number</label>
                                <input class="form-control" id="exampleInputNumber" name="phone" placeholder="Enter Number" type="text" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Class</label>
                                <select class="form-control" id="inputState" name="class">
                                    <option selected>Class for admission..</option>
                                    <option value="Nursery">Nursery</option>
                                    <option value="Junior">Junior</option>
                                    <option value="Senior">Senior</option>
                                    <option value="Class One">Class One</option>
                                    <option value="Class Two">Class Two</option>
                                    <option value="Class Three">Class Three</option>
                                    <option value="Class Four">Class Four</option>
                                    <option value="Class Five">Class Five</option>
                                    <option value="Class Six">Class Six</option>
                                    <option value="Class Seven">Class Seven</option>
                                    <option value="Class Eight">Class Eight</option>
                                    <option value="Class Nine">Class Nine</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleInpufname">Father Name</label>
                                <input class="form-control" id="exampleInputfname" name="father" placeholder="Enter Father Name" type="text" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputmname">Mother Name</label>
                                <input class="form-control" id="exampleInputmname"name="mother" placeholder="Enter Mother Name" type="text" >
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleInpuschool">Previous School</label>
                                <input class="form-control" id="exampleInputschool" name="previoussch" placeholder="Previous School Name" type="text" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputmname">Left School Year</label>
                                <select class="form-control" id="inputState" name="leftyear">
                                    <option selected>Year</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                   
                                </select>                
                                        </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputMessage">Additional Information</label>
                            <textarea class="form-control" name="info" id="exampleInputinfo" placeholder="Information"></textarea>
                        </div>

                       
                        <button class="btn theme-orange border-0" type="submit">Submit Application</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end contact -->
@include('layouts.footer')
