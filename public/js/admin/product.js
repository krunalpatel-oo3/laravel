/* Display products list */
$(function () {
	$.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  	});
	var table = $('.datatable-basic').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_URL + '/admin/productList',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'product_name', name: 'product_name'},
            {data: 'product_model', name: 'product_model'},
            {data: 'product_qty', name: 'product_qty'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });    
});

/* Code for remove products */
var deleteProduct = function(id){
	if(id != ''){
		var product_id = id;
		 swal({
            title: "Are you sure?",
            text: "You will not be able to recover this product!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#EF5350",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            closeOnConfirm: false,
            // closeOnCancel: false
        },
        function(isConfirm){
            if (isConfirm) {
                swal({
                    title: "Deleted!",
                    text: "Your product has been deleted.",
                    confirmButtonColor: "#66BB6A",
                    type: "success"
                });
                /* code for ajax delete */
                $.ajax({
					url:APP_URL + '/admin/deleteProduct',
					dataType:'json',
					type:'post',
					data:{
						id : id
					},
					beforeSend: function(){
						$('.myloader').removeClass('hide').show();
					},
					success: function(data){

						$('.myloader').removeClass('show').hide();

						if(data.status == true){
							// new PNotify({ title: 'Success', text: 'Deleted', addClass: 'bg-success', type: 'success' });
							var oTable = $('.datatable-basic').dataTable(); 
            				oTable.fnDraw(false);
						}else{
							new PNotify({ title: 'Error', text: data.message, addClass: 'bg-error', type: 'error' });
						}
						setTimeout(function(){
							swal.close();
						},2000);
					},
					error: function(){
						new PNotify({ title: 'Error', text: 'Something went wrong please try again later.', addClass: 'bg-error', type: 'error' });
						setTimeout(function(){
							location.reload();
						},1000);
					}
				});
            }
        });
	}
}