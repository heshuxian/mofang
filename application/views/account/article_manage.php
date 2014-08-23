<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		主页
		<small>文章管理</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i> 主页</a></li>
		<li class="active">文章管理</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">文章列表</h3>
			<div class="box-tools">
				<a class=" btn btn-primary pull-right" href='/account/addarticle'><i></i>添加文章</a>
			</div>
		</div>
		<div class="box-body">
			<table class="table table-bordered">
				<tbody>
				<tr>
					<th style="width: 5%">No.</th>
					<th>类型</th>
					<th>标题</th>
					<th>添加时间</th>
					<th>添加人</th>
					<th style="width: 10%">操作</th>
				</tr>
				<?php $i=1; foreach ($articleList as $articleObj):?>
				<tr>
					<td class="center"><?php echo $offset+($i++);?></td>
					<td><?php echo $typeArr[$articleObj->type_id];?></td>
					<td><?php echo $articleObj->title;?></td>
					<td><?php echo $articleObj->add_datetime;?></td>
					<td><?php echo $articleObj->manager;?></td>
					<td class="center actions">
						<div class="btn-group" article_id= <?php echo $articleObj->id;?>>
							<a href="/account/addarticle?article_id=<?php echo $articleObj->id;?>" title='编辑' class="btn btn-small btn-primary">
							<i class="fa fa-edit"></i></a>
							<a href="#" title='删除' class="btn btn-small btn-primary delete">
							<i class="fa fa-fw fa-times-circle"></i></a>
						</div>   
					</td>
				</tr>
				<?php endforeach;?>
			</tbody>
			</table>			
		</div><!-- /.box-body -->
		<div class='box-footer clearfix'>
			<?php echo $pagination?>
		</div>
	</div>
</section>
<!-- /.content -->