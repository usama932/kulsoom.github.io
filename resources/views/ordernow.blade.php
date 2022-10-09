@include('layouts.header')
<!-- start inner-banner -->
<section class="inner-banner">
    <h1 class="font-weight-bold text-center">Order Now</h1>
</section>
<!-- end inner-banner -->

<div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="contact-form p-5" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="border-line"></div>

                    <h2>{{ $total }} </h2>
                    <h3 class="font-weight-bold color-orange">Drop Message</h3>
                    <form action="" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Payment Method</label> <br>
                            <input name="payment" required type="radio"> Cash On Delivery
                        </div>
                        <!-- <div class="form-group">
                            <label for="exampleInputadd">Address</label>
                            <input class="form-control" name="address" id="exampleInputadd" required type="text">
                           
                        </div> -->
                        
                       
                        <button class="btn theme-orange border-0 mt-4" name="order" type="submit">Order Now</button>
                    </form>
                </div>
            </div>


@include('layouts.footer')
