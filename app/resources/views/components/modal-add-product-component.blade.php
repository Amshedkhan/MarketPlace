
<div class="modal fade" id="add_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content ">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           <form action="" id="submitForm">
            <div class="alert alert-info" role="alert">
              </div>
               <div class="form-group">
                <label for="">Product Name<span class="text-danger">*</span></label>
                <input type="text" name="name" id="" class="form-control">
                <span class="error text-danger universityErr"></span>
               </div>
               <div class="form-group">
                  <label for="">Price<span class="text-danger">*</span></label>
                  <input type="number" class="form-control" name="price">
                  <span class="error text-danger nameErr"></span>
               </div>
               <div class="form-group">
                 <label for="">Quantity</label>
                  <input type="number" name="qty" id="" class="form-control">
                  <span class="error text-danger start_dateErr"></span>
               </div>
               <div class="form-group">
                 <label for="">Description</label>
                  <textarea class="form-control" name="description" id="" cols="10" rows="3"></textarea>
               </div>

               
           </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary addRecord">Save</button>
        </div>
      </div>
    </div>
  </div>