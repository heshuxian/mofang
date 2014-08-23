<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		主页
		<small><?php if(isset($courseObj)){?>编辑<?php } else{?>添加<?php }?>课程类型</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i> 主页</a></li>
		<li><a href="/account/usermanage"><i class="fa fa-dashboard"></i> 课程类型列表</a></li>
		<li class="active"><?php if(isset($courseObj)){?>编辑<?php } else{?>添加<?php }?>课程类型</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div  class="col-md-10">
	<!--  class="col-md-6 box box-info"  class="form-horizontal center"   class="control-group"-->
		 <div class="box-header">
			<h3 class="box-title"><?php if(isset($courseObj)){?>编辑<?php } else{?>添加<?php }?>课程类型</h3>
		</div>
		<div class='col-md-12'>
			<?php if(isset($error_msg)){?>
			<div class="alert alert-danger alert-dismissable">
				<i class="fa fa-ban"></i>
				<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
				<b><?php echo $error_msg;?></b>
			</div>
			<?php }?>
		<form method="post" id="addcourse_form">
			<div class="box-body">
				<?php if(isset($courseObj)){?>
					<input type='hidden' name='txtId' value="<?php echo $courseObj->id;?>"/>
				<?php }?>
				<div class="form-group col-md-8">
					<label>课程类型名称:</label>
					<input type="text" <?php if(!isset($courseObj)){?> placeholder="请输入课程类型名称" <?php }?> name = "txtName" id = "txtName" class="form-control" value='<?php if(isset($courseObj)) echo $courseObj->name;?>'/>
				</div><br><br><br><br>
				<div class="form-group col-md-8">
					<label>课程类型描述:</label>
					<input type="text" <?php if(!isset($courseObj)){?> placeholder="请输入课程类型描述" <?php }?> name = "txtMemo" id = "txtMemo" class="form-control" value='<?php if(isset($courseObj)) echo $courseObj->memo;?>'/>
				</div><br><br><br><br>
				<div style="text-align:center">
					<button type="submit" class="btn btn-primary" id="btnSave">保存</button>
				</div>
			</div>
		</form>
		</div>
	</div>
</section>
<!-- /.content -->