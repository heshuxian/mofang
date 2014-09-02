<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		主页
		<small><?php if(isset($imageObj)){?>编辑<?php } else{?>添加<?php }?>封面图</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i> 主页</a></li>
		<li><a href="/account/imagemanage"><i class="fa fa-dashboard"></i> 封面图列表</a></li>
		<li class="active"><?php if(isset($imageObj)){?>编辑<?php } else{?>添加<?php }?>封面图</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class='col-md-8'>
	<div  class="box">
	<!--  class="col-md-6 box box-info"  class="form-horizontal center"   class="control-group"-->
		 <div class="box-header">
			<h3 class="box-title"><?php if(isset($imageObj)){?>编辑<?php } else{?>添加<?php }?>封面图</h3>
		</div>
		<form method="POST" enctype="multipart/form-data" target="upload_target" action="/portal/uploadArticleImg">
			<div class="form-group">
	            <label>上传封面图片(1000*292)：</label>
	            <div>
					<input type="file" data-no-uniform="true" name="uploadImage">
	        		<button type="submit" class="btn btn-small">上传</button>
	            </div>
	        </div>
		</form>
		<div class="timeline-body hidden" id='fileAddr'></div>
		<iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
		
<!-- 		<div class="box-body"> -->
		<form method="post" id="addimage_form" role="form">
			<div class='box-body '>
				<?php if(isset($error_msg)){?>
				<div class="alert alert-danger alert-dismissable">
					<i class="fa fa-ban"></i>
					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
					<b><?php echo $error_msg;?></b>
				</div>
				<?php }?>
				<?php if(isset($imageObj)){?>
				<input type='hidden' name='txtId' value="<?php echo $imageObj->id;?>"/>
				<?php }?>
				<div class="form-group">
					<label style="color: red">*</label><label>封面图文件名称:</label>
					<input autofocus="autofocus" type="text" <?php if(!isset($imageObj)){?> placeholder="请输入封面图文件名称" <?php }?> name = "txtImgName" id = "txtImgName" class="form-control" value='<?php if(isset($imageObj)) echo $imageObj->img_name;?>'/>
				</div><br>
				<div class="form-group">
					<label>封面图描述:</label>
					<input type="text" <?php if(!isset($imageObj)){?> placeholder="请输入封面图描述" <?php }?> name = "txtMemo" id = "txtMemo" class="form-control" value='<?php if(isset($imageObj)) echo $imageObj->memo;?>'/>
				</div><br>
			</div>
			<div class='box-footer clearfix'>
				<button type="submit" class="btn btn-primary pull-right" id="btnSave">保存</button>
			</div>
		</form>
	</div>
	</div>
</section>
<!-- /.content -->