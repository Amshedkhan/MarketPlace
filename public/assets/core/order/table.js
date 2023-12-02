$('#main_table').DataTable({
    "processing": true,
    "serverSide": true,
    "order": [],
    
   ajax:{ 
       type: "GET",
       url: "/orders",
       },
      columns: [            
       {title:"#",  
       data: 'DT_RowIndex',
       orderable: false, 
       searchable: false
       },
       {title:"Product Name",data: 'product.name', name: 'product.name'},
       {title:"Price", data: 'product.price', name: 'product.price' },
       {title:"created_at", data: 'created_at', name: 'created_at'},
       
    ],
   
    
});  
