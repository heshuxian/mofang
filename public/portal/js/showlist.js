$(document).ready(function(){
	var type_id = null;
	$('#pagination').append('<li class="gotoPage"><span>跳转至：</span><input id="page" type="text" value="" class="page"><span>页&nbsp;&nbsp;</span><input id="gotoPage" type="button" value="GO" class="more"></li>');

	$("#page").numeric();
	$('#gotoPage').click(function(){
		type_id = $('#page_id').val();
		window.location.replace('/portal/showList?type_id='+type_id +'&per_page=' + ($('#page').val() - 1) * 10);
	});
});