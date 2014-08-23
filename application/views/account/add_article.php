<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		主页
		<small><?php if(isset($articleObj)){?>编辑<?php } else{?>添加<?php }?>文章</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i> 主页</a></li>
		<li><a href="/account/usermanage"><i class="fa fa-dashboard"></i> 文章列表</a></li>
		<li class="active"><?php if(isset($articleObj)){?>编辑<?php } else{?>添加<?php }?>文章</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class='col-md-10'>
	<div  class="box">
	<!--  class="col-md-6 box box-info"  class="form-horizontal center"   class="control-group"-->
		 <div class="box-header">
			<h3 class="box-title"><?php if(isset($articleObj)){?>编辑<?php } else{?>添加<?php }?>文章</h3>
		</div>
		<form method="POST" enctype="multipart/form-data" target="upload_target" action="/portal/uploadArticleImg">
			<div class="form-group">
	            <label>上传文章图片(教师风采177*263，行业动态156*116，学员感悟44*44，活动相关245*145，俱乐部245*145)：</label>
	            <div>
					<input type="file" data-no-uniform="true" name="uploadImage">
	        		<button type="submit" class="btn btn-small">上传</button>
	            </div>
	        </div>
		</form>
		<div class="timeline-body hidden" id='fileAddr'></div>
		<iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
		<div ></div>
		<form method="post" id="addarticle_form">
			<div class="box-body">
				<?php if(isset($error_msg)){?>
				<div class="alert alert-danger alert-dismissable">
					<i class="fa fa-ban"></i>
					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
					<b><?php echo $error_msg;?></b>
				</div>
				<?php }?>
				<?php if(isset($articleObj)){?>
					<input type='hidden' name='txtId' value="<?php echo $articleObj->id;?>"/>
				<?php }?>
				<div class="form-group">
					<label style="color: red">*</label><label>文章类型:</label>
					<select   class='form-control' id='selArticleType' name='selArticleType'>
						<?php if(!isset($articleObj)){?>
						<option value='' selected='selected' >请选择</option>
						<?php }?>
						<?php for($i=0; $i < count($typeList); $i++){?>
						<option value='<?php echo $i;?>' <?php if(isset($articleObj)){ if($articleObj->type_id==$i){?> selected='selected' <?php }}?> > <?php echo $typeList[$i];?></option>
						<?php }?>
					</select>
				</div>
<!-- 				<div class="form-group col-md-8" <?php if(!isset($articleObj)){?> style="display:none;" <?php }?> <?php if(isset($articleObj)){if($articleObj->type_id != 2){?> style="display:none;" <?php }}?> id="course">  -->
<!-- 					<label>课程类型:</label> -->
<!-- 					<select   class='form-control' id='selCourseType' name='selCourseType'> -->
<!-- 						<option value='' selected='selected' >请选择</option> -->
<!--						<?php for($i=0; $i < count($courseTypeList); $i++){?> -->
<!--						<option value='<?php echo $courseTypeList[$i]->id;?>' <?php if(isset($articleObj)){ if($articleObj->course_id==$courseTypeList[$i]->id){?> selected='selected' <?php }}?> > <?php echo $courseTypeList[$i]->name;?></option> -->
<!--						<?php }?> -->
<!-- 					</select> -->
<!-- 				</div> -->
				<div class="form-group">
					<label style="color: red">*</label><label>标题:</label>
					<input type="text" <?php if(!isset($articleObj)){?> placeholder="请输入文章标题" <?php }?> name = "txtTitle" id = "txtTitle" class="form-control" value='<?php if(isset($articleObj)) echo $articleObj->title;?>'/>
				</div>
				<div class="form-group">
					<label>封面图片文件名:</label>
					<input type="text" <?php if(!isset($articleObj)){?> placeholder="请输入文章封面图片文件名" <?php }?> name = "txtImgLink" id = "txtImgLink" class="form-control" value='<?php if(isset($articleObj)) echo $articleObj->img_name;?>'/>
				</div>
				<div class="form-group">
					<label style="color: red">*</label><label>作者:</label>
					<input type="text" <?php if(!isset($articleObj)){?> placeholder="请输入文章作者" <?php }?> name = "txtAuthor" id = "txtAuthor" class="form-control" value='<?php if(isset($articleObj)) echo $articleObj->author;?>'/>
				</div>
				<div class="form-group">
					<label style="color: red">*</label><label>内容:</label>
					<textarea class="textarea" name="txtContent" id="txtContent" placeholder="请输入文章内容" style="width: 100%; height: 250px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php if(isset($articleObj)) echo $articleObj->content;?></textarea>
				</div>
			</div>
			<div class="box-footer clearfix">
				<button type="submit" class="btn btn-primary pull-right" id="btnSave">保存</button>
			</div>
		</form>
	</div>
	</div>
</section>
<!-- /.content -->