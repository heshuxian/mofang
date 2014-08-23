$(document).ready(function(){
	$('#addcooperation_form').validate({
		// 设置验证规则
		rules :{
			txtName : {
				required : true,
				maxlength : 100
			},
			txtLink : {
				required : true,
				maxlength : 100
			}
		},
		// 设置错误信息
		messages :{
			txtName : {
				required : '请输入合作机构名称',
				maxlength : '名称长度不能多于100个字符'
			},
			txtLink : {
				required : '请输入合作机构链接',
				maxlength : '链接长度不能多于100个字符'
			}
		},
		errorClass:'alert-danger'
//		errorElement:"div"
	});
	$('#btnSave').click(function(){
		var bRet = true;
		bRet &= $('#txtName').valid();
		bRet &= $('#txtLink').valid();
		return bRet;
	});
});