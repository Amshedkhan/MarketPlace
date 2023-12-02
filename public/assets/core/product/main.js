$("#submitForm").append('<input type="hidden" name="product_id" >');
$(".alert-info").hide();
$("body").on("click", ".addRecord", function (e) {
    e.preventDefault();
    var form = $('#submitForm')[0];
    var data = new FormData(form);
    $.ajax({
        type: "POST",
        enctype: "multipart/form-data",
        url: "/product",
        enctype: 'multipart/form-data',
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
           console.log(response);
           if(response.status === 400){
            $(".alert-info").show();
            // const error = JSON.parse(response.message);
             $(".alert-info").html(response.message);
           }else{
            showSuccessMessage("Success Done")
            $("#add_product").modal("hide");
            $(".alert-info").html('');
            $(".alert-info").hide();
            $("#main_table").DataTable().ajax.reload();
            $('#submitForm')[0].reset();
           }
        }
    });
});

$('body').on('click', '.delete', function (){
    var id = $(this).data("id");
   swal({
     title: "Are you sure?",
     text: "Once deleted, you will not be able to recover this record!",
     icon: "warning",
     buttons: true,
     dangerMode: true,
   }).then((willDelete) => {
     if (willDelete) {
        $.ajax({
        type: "DELETE",
        url: "/product/" + id,
        dataType: "json",
        success: function (response) {
         console.log(response);
         if (response.status == 200) {
          $("#main_table").DataTable().ajax.reload();
      }
   },
   });
         swal("Poof! Your record has been deleted!", {
             icon: "success",
         });
     }
   });
 })
 $("body").on("click", ".openModal", function (e) {
    $("#add_product").modal("hide");
    $("input[name=product_id]").val('');
    $(".modal-header > h5").html('Add Product') 
    $('#submitForm')[0].reset(); 
});
 $("body").on("click", ".update2", function (e) {
    $("#add_product").modal("hide");
    $(".modal-header > h5").html('Edit Product')  
    $("input[name=product_id]").val($(this).data("id"));
    $("input[name=name]").val($(this).data("name"));
    $("input[name=qty]").val($(this).data("qty"));
    $("textarea[name=description]").val($(this).data("description"));
    $("input[name=price]").val($(this).data("price"));
    
});