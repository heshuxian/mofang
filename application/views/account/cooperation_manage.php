<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		主页
		<small>合作机构管理</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i> 主页</a></li>
		<li class="active">合作机构管理</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">合作机构列表</h3>
			<div class="box-tools">
				<a class=" btn btn-primary pull-right" href='/account/addcooperation'><i></i>添加合作机构</a>
			</div>
		</div>
		<div class="box-body">
			<table class="table table-bordered">
				<tbody><tr>
					<th style="width: 5%">No.</th>
					<th>合作机构名称</th>
					<th>合作机构链接</th>
					<th style="width: 10%">操作</th>
				</tr>
				<?php $i=1; foreach ($cooperationList as $cooperationObj):?>
				<tr>
					<td class="center"><?php echo $offset+($i++);?></td>
					<td><?php echo $cooperationObj->name;?></td>
					<td><?php echo $cooperationObj->link;?></td>
					<td class="center actions">
						<div class="btn-group" cooperation_id= <?php echo $cooperationObj->id;?>>
							<a href="/account/addcooperation?cooperation_id=<?php echo $cooperationObj->id;?>" title='编辑' class="btn btn-small btn-primary">
							<i class="fa fa-edit"></i></a>
							<a href="#" title='删除' class="btn btn-small btn-primary delete">
							<i class="fa fa-fw fa-times-circle"></i></a>
						</div>   
					</td>
				</tr>
				<?php endforeach;?>
			</tbody></table>
		</div>
		<div class='box-footer clearfix'>
			<?php echo $pagination?>
		</div>
	</div>
</section>
<!-- /.content -->