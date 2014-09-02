	<div class="main">
		<input type='hidden' id="page_id" value="<?php echo $type_id;?>"/>
		<div class="mainnav">您当前的位置： <a href="/portal">首页</a> &gt; <span><?php echo $typeList[$type_id];?></span></div>
		<div class="content">
			<div class="conleft">
				<h2><?php echo $typeList[$type_id];?></h2>
				<ul class="conlist">
					<?php foreach($articleList as $articleObj){?>
					<li>
						<div class="listpic">
							<a href="/portal/showDetail?id=<?php echo $articleObj->id;?>"><img src="/portal/<?php if($articleObj->img_name) $img_name = $articleObj->img_name;else $img_name = "1ee143402c13fdefae2bb9b40893590a.png"; if($type_id == 0) { echo 'Get_Logo_0/'.$img_name;}else { echo 'Get_Logo_1/'.$img_name; }?>"  style='width:156p;height:116px;'/></a>
						</div>
						<div class="listtext">
							<h3><a href="/portal/showDetail?id=<?php echo $articleObj->id;?>"><?php echo $articleObj->title;?></a></h3>
							<p><?php echo Util::cutArticle($articleObj->content,200);?></p>
							<p>[ <?php echo date("Y-m-d",strtotime($articleObj->add_datetime));?> 发布 ]</p>
						</div>
					</li>
				 	<?php }?> 
				</ul>
			</div>
			<div class="conright">
				<div class="righttitle"><?php echo $typeList[$rand_id];?></div>
				<ul class="rightlist">
					<?php $num = count($randList)>6 ? 6 : count($randList) ;?>
 					<?php for($i=0; $i < $num; $i++){?>
 					<li><a href="/portal/showDetail?id=<?php echo $randList[$i]->id;?>"><?php echo Util::cutArticle($randList[$i]->title,28);?></a></li>
 					<?php }?>
				</ul>
				<h2><span>开课通知</span><a href="/portal/showList?type_id=2" class="more">更多</a></h2>
				<ul class="rightlist">
					<?php if(count($courseList)<5) $num=count($courseList);else $num=5;?>
					<?php for($i=0; $i < $num; $i++){?>
					<li><a href="/portal/showDetail?id=<?php echo $courseList[$i]->id;?>"><?php echo Util::cutArticle($courseList[$i]->title,28);?></a></li>
					<?php }?>
				</ul>
				<h2><span>官方信息</span></h2>
				<div class="rightinfo">
					<div class="QRCode">
						<img src="/public/portal/images/QRCode.gif" />
						<p>资本魔方官方微信</p>
					</div>
					<a href="">资本魔方官方微博</a>
					<a href="">资本魔方APP下载</a>
				</div>
				<h2><span>相关推荐</span></h2>
				<ul class="rightlist">
					<li>+ <a href="/portal">资本魔方</a></li>
					<li>+ <a href="">官方消息</a></li>
					<li>+ <a href="/portal/showList?type_id=4">学员感悟</a></li>
				</ul>
			</div>
			<?php echo $pagination;?>
		</div>
	</div>
	<div class="footer">
		<div class="footerBox">
			<div class="left">
				<div class="footernav">
					<a href="">法律声明</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="">隐私保护</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="">联系我们</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="">网站地图</a>
				</div>
				<p>
					中国 陕西 西安 高新区绿地soho同盟B座808室 （710000）<br />
					电话：029-68910916<br />
					传真：029-68910916<br />
					Email：aifeiyi@aifeiyi.com<br />
					Copyright@2014 资本魔方. All Right Reserved.<br />
					陕ICP备00920000
				</p>
			</div>
			<div class="right">
				<div class="btn">
					<a href="/portal" class="more"><img src="/public/portal/images/home.gif" /><span>HOME</span></a>
					<a href="" class="more"><img src="/public/portal/images/top.gif" /><span>TOP</span></a>
				</div>
				<h3>合作机构</h3>
				<p>
				<?php $num = (count($friendshipList)>6 ? 6 : count($friendshipList));?>
				<?php for($i=0; $i<$num-1; $i++){?>
				<a href="<?php echo $cooperationList[$i]->link;?>"><?php echo $cooperationList[$i]->name;?></a>&nbsp;&nbsp;|&nbsp;&nbsp;
				<?php }?>
				<?php if($num > 1){?>
				<a href="<?php echo $cooperationList[$num-1]->link;?>"><?php echo $cooperationList[$num-1]->name;?></a>&nbsp;&nbsp;
				<?php }?>
				</p>
				<h3>友情链接</h3>
				<p>
				<?php $num = (count($friendshipList)>6 ? 6 : count($friendshipList));?>
				<?php for($i=0; $i<$num-1; $i++){?>
				<a href="<?php echo $friendshipList[$i]->link;?>"><?php echo $friendshipList[$i]->name;?></a>&nbsp;&nbsp;|&nbsp;&nbsp;
				<?php }?>
				<?php if($num > 1){?>
				<a href="<?php echo $friendshipList[$num-1]->link;?>"><?php echo $friendshipList[$num-1]->name;?></a>&nbsp;&nbsp;
				<?php }?>
				</p>
			</div>
		</div>
	</div>
