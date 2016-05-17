function updateCart(rowId){
	$qty = $('#qty'+rowId).val();
	$qty = ($qty!="")?$qty:null;
	$token = $('input[name="_token"]').val();
	if(rowId && $qty){
		$.ajax({
			url: 'cap-nhat-gio-hang/'+rowId+'/'+$qty,
			method: 'GET',
			cache: false,
			data: {'_token':$token, 'id':rowId, 'qty':$qty},
			success: function(res){
				alert(res);
				window.location.reload();
			}
		});
	}
}