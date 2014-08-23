<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		主页
		<small>课程管理</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i> 主页</a></li>
		<li class="active">课程管理</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="box">
		<div class="box-body">
			<h3 class="box-title">课程类型列表</h3>
		</div>
		<div class="box-body">
			<div class="box-footer">
				<a class=" btn btn-primary" href='/account/addcourse'><i></i>添加课程类型</a>
			</div>
			<table class="table table-bordered">
				<tbody><tr>
					<th style="width: 5%">No.</th>
					<th>课程类型名称</th>
					<th>课程类型描述</th>
					<th style="width: 20%">操作</th>
				</tr>
				<?php $i=1; foreach ($courseTypeList as $courseTypeObj):?>
				<tr>
					<td class="center"><?php echo $i++;?></td>
					<td><?php echo $courseTypeObj->name;?></td>
					<td><?php echo $courseTypeObj->memo;?></td>
					<td class="center actions">
						<div class="btn-group" course_id= <?php echo $courseTypeObj->id;?>>
							<a href="/account/addcourse?course_id=<?php echo $courseTypeObj->id;?>" title='编辑' class="btn btn-small btn-primary">
							<i class="fa fa-edit"></i></a>
							<a href="#" title='删除' class="btn btn-small btn-primary delete">
							<i class="fa fa-fw fa-times-circle"></i></a>
						</div>   
					</td>
				</tr>
				<?php endforeach;?>
			</tbody></table>
		</div><!-- /.box-body -->
	</div>
</section>
<!-- /.content -->