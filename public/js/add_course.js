$(document).ready(function(){
	var type_id = null;
	$('#addcourse_form').validate({
		// 设置验证规则
			txtName : {
				required : true
			}
		},
		// 设置错误信息
		messages :{
			txtName : {
				required : '请输入课程类型名称'
			}
		},
		errorClass:'alert-danger'
//		errorElement:"div"
	});
	$('#btnSave').click(function(){
		var bRet = true;
		bRet &= $('#txtName').valid();
		return bRet;
	});
});