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
              <form method="post" action="<?php echo base_url('merchant/products/store_item') ?>" id="add_online_store_product" enctype="multipart/form-data">
                <h6 class="heading-small text-muted mb-4">Product information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group"> 
                        <label class="form-control-label" for="input-name">Product Categories</label>
                          <select class="form-control cat_id multiple-selects" required="" id="categories" name="categories[]"  multiple="multiple">
                            <option value="">Select Category</option>
                             <?php if(!empty($categories)) {?> 
                        <?php foreach ($categories as $key => $value) { ?>
                              <option data-id="<?php echo $value->name ?>" value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                        <?php } }?>
                          </select>
                      </div>
                    </div>
                  </div>

                  <div class="row mt-3">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-name">Product Name</label>
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
                        <label class="form-control-label" for="input-description">Description</label>
                        <textarea class="form-control" name="product_description" id="product_description" cols="5" rows="5"></textarea>
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