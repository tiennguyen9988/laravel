//----------------------------------------
function fnConfirm(){
	var r = confirm("Are you sure?!");
	if(r){return true;}else{return false;}
}
//----------------------------------------
$(document).ready(function() {
    $('#dataTables-example').DataTable({
            responsive: true
    });
    $('div.alert').delay(3000).slideUp();
});