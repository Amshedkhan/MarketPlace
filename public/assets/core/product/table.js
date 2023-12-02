$('#main_table').DataTable({
    "processing": true,
    "serverSide": true,
    "order": [],
    
   ajax:{ 
       type: "GET",
       url: "/product",
       },
      columns: [            
       {title:"#",  
       data: 'DT_RowIndex',
       orderable: false, 
       searchable: false
       },
       {title:"Name",data: 'name', name: 'name'},
       {title:"Price", data: 'price', name: 'price' },
       {title:"Qty", data: 'qty', name: 'qty' },
       {title:"Description", data: 'description', name: 'description' },
       {title:"created_at", data: 'created_at', name: 'created_at'},
       {
       
        title: "Action",
        render: function (data, type, row, meta) {
            return (
                '<a href="javascript:void(0)" class="delete btn btn-danger btn-sm mt-2 " style="margin-right:10px" data-toggle="tooltip" title="evaluation" data-id="' +
                row.id +
                '" data-table="evaluation-table" data-original-title="Delete Record"><i class="far fa-trash-alt" ></i></a>' +
                '<a href="javascript:void(0)"  data-id="'+row.id+'" data-qty="'+row.qty+'" data-description="'+row.description+'" data-price="'+row.price+'" data-name="'+row.name+'" data-price="'+row.price+'" class="update2 mt-2 btn btn-info btn-sm" data-toggle="modal" data-target="#add_product"><i class="mdi mdi-plus-circle-outline"></i> <i class="fas fa-edit"></i></a>' 
                
            );  
        },
        orderable: false,
        searchable: false,
       }
       
    ],
   
    
});  
