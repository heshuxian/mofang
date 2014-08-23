<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		主页
		<small>封面图管理</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i> 主页</a></li>
		<li class="active">封面图管理</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">封面图列表</h3>
			<div class="box-tools">
				<a class=" btn btn-primary pull-right" href='/account/addimage'><i></i>添加封面图</a>
			</div>
		</div>
		<div class="box-body">
			<table class="table table-bordered">
				<tbody><tr>
					<th style="width: 5%">No.</th>
					<th>封面图</th>
					<th>封面图文件名</th>
					<th>封面图描述</th>
					<th style="width: 10%">操作</th>
				</tr>
				<?php $i=1; foreach ($imageList as $imageObj):?>
				<tr>
					<td class="center"><?php echo $offset+($i++);?></td>
					<td><img src="/portal/Get_Logo_small/<?php echo $imageObj->img_name;?>" /></td>
 					<td><?php echo $imageObj->img_name;?></td>
					<td><?php echo $imageObj->memo;?></td>
					<td class="center actions">
						<div class="btn-group" image_id= <?php echo $imageObj->id;?>>
							<a href="/account/addimage?image_id=<?php echo $imageObj->id;?>" title='编辑' class="btn btn-small btn-primary">
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