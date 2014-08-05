//$.validator.setDefaults({
//    submitHandler: function () {
//        alert("submitted!");
//    },
//    showErrors: function (map, list) {
//        this.currentElements.parents('label:first, .controls:first').find('.error').remove();
//        this.currentElements.parents('.control-group:first').removeClass('error');
//
//        $.each(list, function (index, error) {
//            var ee = $(error.element);
//            var eep = ee.parents('label:first').length ? ee.parents('label:first') : ee.parents('.controls:first');
//
//            ee.parents('.control-group:first').addClass('error');
//            eep.find('.error').remove();
//            eep.append('<p class="error help-block"><span class="label label-important">' + error.message + '</span></p>');
//        });
//        //refreshScrollers();
//    }
//});
$(function () {
    // validate signup form on keyup and submit
    $("#loginForm").validate({
        rules: {
            txtUsername: {
                required: true,
                minlength: 2
            },
            txtPassword: {
                required: true,
                minlength: 5
            },
        },
        messages: {
        	txtUsername: {
                required: "请输入用户名",
                minlength: "用户名不能少于两个英文字母或者数字"
            },
            txtPassword: {
                required: "请输入密码",
                minlength: "密码长度不能少于5个字符"
            },
        },
        errorPlacement: function (error, element) {
        	error.addClass('label label-warning');
            element.after(error);
        },
        success: function(error,element){
        	error.remove();
        }
    });
    
    $('#btnLogin').click(function(){
    	var bRet = true;
		bRet = $("#txtUsername").valid() && bRet;
		bRet = $("#txtPassword").valid() && bRet;
		var btnObj = $(this);
		if (bRet) {
			return true;
		}
		return false;
    });
});