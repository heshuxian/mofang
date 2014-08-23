	<div class="main">
		<div class="mainnav">您当前的位置： <a href="/portal">首页</a> &gt; <a href="/portal/showList?type_id=<?php echo $pageIndex;?>"><?php echo $typeList[$pageIndex];?></a> &gt; <span><?php echo $articleObj->title?></span></div>
		<div class="content">
			<div class="conleft">
				<h2 class="detailtitle"><?php echo $articleObj->title;?></h2>
				<div class="detailtop">
					来源：<span>资本魔方</span>&nbsp;&nbsp;&nbsp;
					发布者：<span><?php echo $articleObj->manager;?></span>&nbsp;&nbsp;&nbsp;
					原作者：<span><?php echo $articleObj->author;?></span>&nbsp;&nbsp;&nbsp;
					发布时间：<span><?php echo $articleObj->add_datetime;?></span>&nbsp;&nbsp;&nbsp;
					<a class="bshareDiv" href="##" title="hhhhhhhhhh" pic='/portal/Get_Logo_5/39f3feafce2f511eec9d285287a88fd8.jpg'>分享</a>
				</div>
				<div class="detailcon">
					<p><?php echo $articleObj->content;?></p>					
				</div>
			</div>
			<div class="conright">
				<div class="righttitle"><?php echo $typeList[$rand_id];?></div>
				<ul class="rightlist">
					<?php $num = count($randList)>6 ? 6 : count($randList) ;?>
 					<?php for($i=0; $i < $num; $i++){?>
 					<li><a href="/portal/showDetail?id=<?php echo $randList[$i]->id;?>"><?php echo Util::cutArticle($randList[$i]->title,28);?></a></li>
 					<?php }?>
				</ul>
				<ul class="rightlist">
<!-- 					<?php foreach ($courseTypeList as $courseTypeObj):?> -->
<!-- 					<li><a href="/portal/showCourseList?course_id=<?php echo $courseTypeObj->id;?>"><?php echo $courseTypeObj->name?></a></li> -->
<!-- 					<?php endforeach;?> -->
				</ul>
				<h2><span>开课通知</span><a href="/portal/showList?type_id=2" class="more">更多</a></h2>
				<ul class="rightlist">
					<?php if(count($articleList)<5) $num=count($articleList);else $num=5;?>
					<?php for($i=0; $i < $num; $i++){?>
					<li><a href="/portal/showDetail?id=<?php echo $articleList[$i]->id;?>"><?php echo Util::cutArticle($articleList[$i]->title,28);?></a></li>
					<?php }?>
<!-- 					<li><a href="">资本魔方 - 50期 / 2014-08 ...</a></li> -->
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
					<li>+ <a href="/portal/showList?type_id=4">学生感悟</a></li>
				</ul>
			</div>
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