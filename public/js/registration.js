$(function () {
    // validate signup form on keyup and submit
    $("#registrationForm").validate({
        rules: {
            txtUsername: {
                required: true,
                minlength: 2,
                remote: '/portal/checkuser'
            },
            txtPassword: {
                required: true,
                minlength: 5
            },
            txtConfirmPassword: {
                required: true,
                minlength: 5,
                equalTo: '#txtPassword'
            },
            txtFullName : {
				required : true,
				minlength : 2
			},
			txtEmail : {
				required : true
			},
        },
        messages: {
        	txtUsername: {
                required: "请输入用户名",
                minlength: "用户名不能少于两个英文字母或者数字",
                remote: "此用户名已存在，请输入其他用户名"
            },
            txtPassword: {
                required: "请输入密码",
                minlength: "密码长度不能少于5个字符"
            },
            txtConfirmPassword: {
                required: "请输入确认密码",
                minlength: "密码长度不能少于5个字符",
                equalTo: '请输入与上方一致的密码'
            },
            txtFullName : {
				required : "请输入用户全名",
				minlength : "用户全名不能少于2个字符"
			},
			txtEmail : {
				required : "请输入邮箱"
			},
        },
        errorPlacement: function (error, element) {
        	error.addClass('label label-warning');
            element.after(error);
        },
        success: function(error,element){
        	error.remove();
        },
        errorClass:'alert-danger',
    });
    
    $('#btnRegistration').click(function(){
    	var bRet = true;
		bRet = $("#txtUsername").valid() && bRet;
		bRet = $("#txtPassword").valid() && bRet;
		bRet = $("#txtConfirmPassword").valid() && bRet;
		bRet = $("#txtFullName").valid() && bRet;
		bRet = $("#txtEmail").valid() && bRet;
		var btnObj = $(this);
		if (bRet) {
			return true;
		}
		return false;
    });
});