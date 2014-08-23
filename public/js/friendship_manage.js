$(document).ready(function () {
	var friendship_id = null;
	var trObj = null;
	$('a.delete').click(function () {
		friendship_id = $(this).parent().attr('friendship_id');
		trObj = $(this).parent().parent().parent();
		bootbox.dialog({
			message: '<h3>确定删除？</h3>',
			buttons: {
				main: {
					label: "OK",
					className: "btn-danger",
					callback: function () {
						$.post('/account/deletefriendship/', {friendship_id: friendship_id}, function(data){
							eval('var ret=' + data);
							if(ret.ret)
							{
								var n = notyfy({
									text: '<span>'+ ret.msg +'</span>',
									type: 'error',
									timeout: true,
									layout: 'topCenter',
									closeWith: ['hover','click','button']
								});
							}
							else
							{
								var n = notyfy({
									text: '<span>删除成功.</span>',
									type: 'success',
									layout: 'topCenter',
									closeWith: ['hover','click','button']
								});
								trObj.remove();
							}
						});
					}
				}
			}
		});
	});
});