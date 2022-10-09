
<form method="post" enctype="multipart/form-data" class="wizard-form steps-validation ajax-store" action="{{ route('shop.store') }}" >
                    @csrf
                    <h6></h6>
                    <fieldset>
                    <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Name: <span class="text-danger">*</span></label>
                                    <input value="" required type="text" name="name" placeholder="Book Name" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Price: <span class="text-danger">*</span></label>
                                    <input value="" required type="text" name="price" placeholder="Book price" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Pages: <span class="text-danger">*</span></label>
                                    <input value="" required type="number" name="pages" placeholder="Pages Count" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Details: </label>
                                    <input value=""  type="text" name="description" placeholder="Book Details" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Quantity: </label>
                                    <input value=""  type="number" name="quantity" placeholder="Quantity" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="inputState">Category</label>
                                <select class="form-control" id="inputState" name="category">
                                    <option selected>Choose...</option>
                                    <option value="Science">Science</option>
                                    <option value="Arts">Arts</option>
                                    <option value="IT">IT</option>
                                    <option value="Medical">Medical</option>
                                    <option value="Poetry">Poetry</option>
                                    <option value="Commerce">Commerce</option>


                                    
                                </select>
                            </div>
                        </div>
                        

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Image: <span class="text-danger">*</span></label>
                                    <input value="" required type="file" name="image" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    
                                    <input value="Submit" type="submit" name="addPro" class="form-control btn btn-primary">
                                </div>
                            </div>
                        </div>
                        
                    </fieldset>
                    

                </form>

              
