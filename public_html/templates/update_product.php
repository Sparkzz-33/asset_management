<div class="modal fade" id="up_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="update_product_form" onsubmit="return false">
            <div class="form-group">
              <label>Product Name</label>
              <input type="hidden" name="pid" id="pid" value=""/>
              <input type="text" class="form-control" name="update_product" id="update_product">
              <small id="brand_error" class="form-text text-muted"></small>
            </div>
           <div class="form-row">
            <div class="form-group col-md-6">
              <label>Product Price</label>
              <input type="text" class="form-control" id="update_product_price" name="update_product_price" >
            </div>

            <div class="form-group col-md-6">
              <label>Quantity</label>
              <input type="text" class="form-control" id="update_product_qty" name="update_product_qty" placeholder="Enter quantity of the Product">
            </div>
           </div>
          <div class="form-group">
            <label>Product Category</label>
            <select id="update_product_cat" name="update_product_cat" class="form-control">
              </select>
          </div>

          <div class="form-group">
            <label>Product Brand</label>
            <select id="update_product_brand" name="update_product_brand" class="form-control">
              </select>
          </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>