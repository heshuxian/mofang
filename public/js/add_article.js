$(document).ready(function(){
	var type_id = null;
	$('form:eq(0)').submit(function() {
		$('#upload_target').unbind().load(function() {
			var data = $('#upload_target').contents().find('body ').html();
			eval('var ret=' + data);
			if (ret.ret == 0) {
				$('#fileAddr').removeClass("hidden");
				var obj = '<div class="control"> <img class="margin" style="width:150px;height:100px" src="/article_img/' + ret.addr
					+ '"><span>/article_img/' + ret.addr + '</span> </div>';
				$('#fileAddr').append(obj);
			} else {
				alert('图片上传失败。');
			}
		});
	});
	$('#addarticle_form').validate({
		// 设置验证规则
		rules :{
			selArticleType : {
				required : true
			},
			txtTitle : {
				required : true,
				maxlength : 25
			},
			txtContent : {
				required : true
			},
			txtAuthor:{
				required : true,
				maxlength : 20
			}
		},
		// 设置错误信息
		messages :{
			selArticleType : {
				required : '请选择文章类型'
			},
			txtTitle : {
				required : '请填写文章标题',
				maxlength : '标题不能多于25个字符'
			},
			txtContent : {
				required : '请填写文章内容'
			},
			txtAuthor : {
				required : '请填写文章作者',
				maxlength : '作者名称不能多于20个字符'
			}
		},
		errorClass:'alert-danger'
//		errorElement:"div"
	});
	$('#btnSave').click(function(){
		var bRet = true;
		bRet &= $('#selArticleType').valid();
		bRet &= $('#txtTitle').valid();
		bRet &= $('#txtContent').valid();
		bRet &= $('#txtAuthor').valid();
		return bRet;
	});
//	$('#selArticleType').change(function(){
//		if($(this).val() == 2)
//		{
//			$('#course').show();
//			$.get('/account/getCourseTypeList/', {},function(data){
//				eval('var ret=' + data);
//				if(ret.courseTypeList){
//					$('#selCourseType').empty();
//					$('#selCourseType').append('<option select="selected">' + "请选择"+ '</option>');
//					for(i=0; i < ret.courseTypeList.length; i++)
//					{
//						var obj = ret.courseTypeList[i];
//						$('#selCourseType').append('<option value='+ obj.id +'>' + obj.name + '</option>');
//					}
//				}
//			});
//		}
//		else
//			$('#course').hide();
//	});
});
