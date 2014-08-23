$(document).ready(function(){
	$('form:eq(0)').submit(function() {
		$('#upload_target').unbind().load(function() {
			var data = $('#upload_target').contents().find('body ').html();
			eval('var ret=' + data);
			if (ret.ret == 0) {
				$('#fileAddr').removeClass("hidden");
				var obj = '<div class="control"> <img class="margin" style="width:150px;height:100px" src="' + ret.addr
					+ '"><span>' + ret.addr + '</span> </div>';
				$('#fileAddr').append(obj);
			} else {
				alert('图片上传失败。');
			}
		});
	});
	$('#addimage_form').validate({
		// 设置验证规则
		rules :{
			txtImgName : {
				required : true,
				maxlength : 50
			},
			txtMemo : {
				maxlength : 100
			}
		},
		// 设置错误信息
		messages :{
			txtImgName : {
				required : '请输入封面图文件名',
				maxlength : '链接长度不能多于50个字符'
			},
			txtMemo : {
				maxlength : '描述不能多于100个字符'
			}
		},
		errorClass:'alert-danger'
//		errorElement:"div"
	});
	$('#btnSave').click(function(){
		var bRet = true;
		bRet &= $('#txtImgName').valid();
		bRet &= $('#txtMemo').valid();
		return bRet;
	});
});