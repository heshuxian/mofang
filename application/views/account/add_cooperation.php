<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		主页
		<small><?php if(isset($cooperationObj)){?>编辑<?php } else{?>添加<?php }?>合作机构</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i> 主页</a></li>
		<li><a href="/account/cooperationmanage"><i class="fa fa-dashboard"></i> 合作机构列表</a></li>
		<li class="active"><?php if(isset($cooperationObj)){?>编辑<?php } else{?>添加<?php }?>合作机构</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class='col-md-8'>
	<div  class="box">
	<!--  class="col-md-6 box box-info"  class="form-horizontal center"   class="control-group"-->
		 <div class="box-header">
			<h3 class="box-title"><?php if(isset($cooperationObj)){?>编辑<?php } else{?>添加<?php }?>合作机构</h3>
		</div>
<!-- 		<div class="box-body"> -->
		<form method="post" id="addcooperation_form" role="form">
			<div class='box-body '>
				<?php if(isset($error_msg)){?>
				<div class="alert alert-danger alert-dismissable">
					<i class="fa fa-ban"></i>
					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
					<b><?php echo $error_msg;?></b>
				</div>
				<?php }?>
				<?php if(isset($cooperationObj)){?>
				<input type='hidden' name='txtId' value="<?php echo $cooperationObj->id;?>"/>
				<?php }?>
				<div class="form-group">
					<label style="color: red">*</label><label>合作机构名称:</label>
					<input type="text" <?php if(!isset($cooperationObj)){?> placeholder="请输入合作机构名称" <?php }?> name = "txtName" id = "txtName" class="form-control" value='<?php if(isset($cooperationObj)) echo $cooperationObj->name;?>' autofocus="autofocus"/>
				</div><br>
				<div class="form-group">
					<label style="color: red">*</label><label>合作机构链接:</label>
					<input type="text" <?php if(!isset($cooperationObj)){?> placeholder="请输入合作机构链接" <?php }?> name = "txtLink" id = "txtLink" class="form-control" value='<?php if(isset($cooperationObj)) echo $cooperationObj->link;?>'/>
				</div>
			</div>
			<div class='box-footer clearfix'>
				<button type="submit" class="btn btn-primary pull-right" id="btnSave">保存</button>
			</div>
		</form>
	</div>
	</div>
</section>
<!-- /.content -->