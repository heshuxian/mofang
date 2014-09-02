<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		主页
		<small><?php if(isset($friendshipObj)){?>编辑<?php } else{?>添加<?php }?>友情链接</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i> 主页</a></li>
		<li><a href="/account/friendshipmanage"><i class="fa fa-dashboard"></i> 友情链接列表111</a></li>
		<li class="active"><?php if(isset($friendshipObj)){?>编辑<?php } else{?>添加<?php }?>友情链接</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class='col-md-8'>
	<div  class="box">
	<!--  class="col-md-6 box box-info"  class="form-horizontal center"   class="control-group"-->
		 <div class="box-header">
			<h3 class="box-title"><?php if(isset($friendshipObj)){?>编辑<?php } else{?>添加<?php }?>友情链接</h3>
		</div>
		<form method="post" id="addfriendship_form">
			<div class="box-body">
				<?php if(isset($error_msg)){?>
				<div class="alert alert-danger alert-dismissable">
					<i class="fa fa-ban"></i>
					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
					<b><?php echo $error_msg;?></b>
				</div>
				<?php }?>
				<?php if(isset($friendshipObj)){?>
					<input type='hidden' name='txtId' value="<?php echo $friendshipObj->id;?>"/>
				<?php }?>
				<div class="form-group">
					<label style="color: red">*</label><label>友情链接名称:</label>
					<input type="text" <?php if(!isset($friendshipObj)){?> placeholder="请输入友情链接名称" <?php }?> name = "txtName" id = "txtName" class="form-control" value='<?php if(isset($friendshipObj)) echo $friendshipObj->name;?>' autofocus="autofocus"/>
				</div><br>
				<div class="form-group">
					<label style="color: red">*</label><label>友情链接链接:</label>
					<input type="text" <?php if(!isset($friendshipObj)){?> placeholder="请输入友情链接描述" <?php }?> name = "txtLink" id = "txtLink" class="form-control" value='<?php if(isset($friendshipObj)) echo $friendshipObj->link;?>'/>
				</div><br>
			</div>
			<div class="box-footer clearfix">
				<button type="submit" class="btn btn-primary pull-right" id="btnSave">保存</button>
			</div>
		</form>
		</div>
	</div>
</section>
<!-- /.content -->