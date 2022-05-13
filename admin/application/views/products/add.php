 <!-- Header -->
<!-- Page content -->
    <div class="container-fluid mt-6">
      <div class="row">
        <div class="col-xl-12 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Add Product </h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form method="post" action="<?php echo base_url('products/store_item') ?>" id="add_online_store_product" enctype="multipart/form-data">
                <h6 class="heading-small text-muted mb-4">Product information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group"> 
                        <label class="form-control-label" for="input-name">Product Categories</label>
                          <select class="form-control cat_id" required="" id="cat_id" name="cat_id">
                            <option value="">Select Category</option>
                             <?php if(!empty($AllCategories)) {?> 
                        <?php foreach ($AllCategories as $key => $value) { ?>
                              <option data-id="<?php echo $value->has_multiple_color ?>" value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                        <?php } }?>
                          </select>
                      </div>
                    </div>
                  </div>

                 
                  <div class="product_display_choices_section" style="display:none;">

                    <div class="form-check form-check-info text-start">
                    <input class="form-check-input" type="checkbox" value="1" id="has_wood_finish_choice" name="has_wood_finish_choice">
                    <label class="form-check-label" for="has_wood_finish_choice">
                      Has <a href="javascript:;" class="text-dark font-weight-bolder">Wood Finish Choice</a>
                    </label>
                  </div>

                   <!-- Wood Finish Choice Options -->
                  <div class="row has_wood_finish_choice_section mt-3 mb-2 ml-1" style="display:none;">
                    
                      <?php foreach ($AllWoodFinishChoices as $key => $value) { ?>
                              <div class="col-md-3">
                                <div class="form-check form-check-info text-start">
                              <input class="form-check-input" type="checkbox" value="<?php echo $value->id ?>" id="size_<?php echo $value->id ?>" name="wood_finish_choice_id[]" class="wood_finish_choice">
                              <label class="form-check-label" for="size_<?php echo $value->id ?>">
                               <?php echo $value->name ?>
                              </label>
                            </div>
                              </div>
                        <?php } ?>
                  </div>
                  <!-- End Wood Finish Choice Options -->

                   <div class="form-check form-check-info text-start">
                    <input class="form-check-input" type="checkbox" value="1" id="has_suede_mat_color" name="has_suede_mat_color">
                    <label class="form-check-label" for="has_suede_mat_color">
                      Has <a href="javascript:;" class="text-dark font-weight-bolder">Suede Mat Color</a>
                    </label>
                  </div>

                  <!-- Suede Mat Color Choice Options -->

                  <div class="row has_suede_mat_color_section mt-3 mb-2 ml-1" style="display:none;">
                      <?php foreach ($AllColors as $key => $value) { ?>
                              <div class="col-md-3">
                                <div class="form-check form-check-info text-start">
                              <input class="form-check-input" type="checkbox" value="<?php echo $value->id ?>" id="suede_mat_color_<?php echo $value->id ?>" name="suede_mat_color_id[]">
                              <label class="form-check-label" for="suede_mat_color_<?php echo $value->id ?>">
                               <?php echo $value->color ?>
                              </label>
                            </div>
                              </div>
                        <?php } ?>

                  </div>


                  <!-- End Suede Mat Color Choice Options -->

                   <div class="form-check form-check-info text-start">
                    <input class="form-check-input" type="checkbox" value="1" id="has_format" name="has_format">
                    <label class="form-check-label" for="has_format">
                      Has <a href="javascript:;" class="text-dark font-weight-bolder">Format</a>
                    </label>
                  </div>

                   <!-- Product Format Options -->

                  <div class="row has_format_section mt-3 mb-2 ml-1" style="display:none;">
                    <?php foreach ($AllProductFormat as $key => $value) { ?>
                              <div class="col-md-3">
                                <div class="form-check form-check-info text-start">
                              <input class="form-check-input" type="checkbox" value="<?php echo $value->id ?>" id="pro_format_id_<?php echo $value->id ?>" name="pro_format_id[]">
                              <label class="form-check-label" for="pro_format_id_<?php echo $value->id ?>">
                               <?php echo $value->format ?>
                              </label>
                            </div>
                              </div>
                        <?php } ?>
                  </div>

                  <!-- End Product Format Options -->

                  </div>

          
                 

                  <div class="form-check form-check-info text-start has_size">
                    <input class="form-check-input" type="checkbox" value="1" id="has_size" name="has_size">
                    <label class="form-check-label" for="has_size">
                      Has <a href="javascript:;" class="text-dark font-weight-bolder">Size</a>
                    </label>
                  </div>

                 

                  <div class="row has_sizes_section" style="display:none">

                    
                      <?php foreach ($AllSizes as $key => $value) { ?>
                              <div class="col-md-3">
                                <div class="form-check form-check-info text-start">
                              <input class="form-check-input" type="checkbox" value="<?php echo $value->id ?>" id="size_<?php echo $value->id ?>" name="sizes[]">
                              <label class="form-check-label" for="size_<?php echo $value->id ?>">
                               <?php echo $value->name ?>
                              </label>
                            </div>
                              </div>
                        <?php } ?>
                    
                  </div>


                    <label class="has_color mt-3" style="display:none;font-weight:bolder;">Colors</label>
                   <div class="row has_color_section" style="display:none">

                      <?php foreach ($AllColors as $key => $value) { ?>
                              <div class="col-md-3">
                                <div class="form-check form-check-info text-start">
                              <input class="form-check-input" type="checkbox" value="<?php echo $value->id ?>" id="color_<?php echo $value->id ?>" name="colors[]">
                              <label class="form-check-label" for="color_<?php echo $value->id ?>">
                               <?php echo $value->color ?>
                              </label>
                            </div>
                              </div>
                        <?php } ?>
                    
                  </div>


                  <div class="row mt-3">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-name">Name</label>
                        <input type="text" id="product_name" class="form-control" placeholder="Enter Item Name" name="product_name" required="">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-price">Price</label>
                        <input type="number" id="product_price" class="form-control" placeholder="Enter Item Price" name="product_price" required="" step=".01">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-photo">Photo</label>
                        <input type="file" id="product_picture" class="form-control" name="files[]" required="" multiple="multiple">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-description">Description</label>
                        <textarea class="form-control" name="product_description" id="product_description" cols="5" rows="5"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-description">Shipping & Returns</label>
                        <textarea class="form-control" name="shipping_returns" id="shipping_returns" cols="5" rows="5"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <input type="checkbox" name="is_eligible_for_coupon_code" id="is_eligible_for_coupon_code" value="1">&nbsp;Is Eligible for coupon code
                      </div>
                    </div>
                  </div>
                </div>
              <div class="col-4">
                 <input type="submit" class="btn btn-primary my-4" value="Add Item">
                  <a href="<?php echo base_url('products') ?>" class="btn btn-info pull-right">Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

<script src="https://cdn.tiny.cloud/1/1oygzsxmj2z65b12oe2xsmopyeb339ctejhzi5fgpu8ftp4r/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
tinymce.init({
  selector:'textarea',
  menubar :false,
});
</script>