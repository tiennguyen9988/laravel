//----------------------------------------
function fnConfirm($mess){
	var mess = ($mess)?$mess:"Are you sure?!";
	var r = confirm(mess);
	if(r){return true;}else{return false;}
}
function addUploadToId($id,$html){
	$('#'+$id).append($html);
}
function deleteDetailImg($param){
	var url = "/admin/product/delimg/";
	var _token = $("form[name='frmEditProduct']").find("input[name='_token']").val();
	var src = $param.src;
	var idImg =  $param.id;
	$.ajax({
		url: url+idImg,
		type: 'POST',
		cache: false,
		data: {"_token": _token, "idImg": idImg, "urlImg": src},
		success: function(res){
			if(res){
				$('#img_detail'+idImg).remove();
			}else{
				alert('Error');
			}
		}
	});
}
//----------------------------------------
$(document).ready(function() {
    $('#dataTables-example').DataTable({
            responsive: true
    });
    $('div.alert').delay(3000).slideUp();
});