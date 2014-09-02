	<div class="bannerbox">
		<ul class="slideshow">
			<?php if(count($bigImageList) > 3) $num=3; else $num=count($bigImageList);?>
			<?php for($i=0; $i < $num; $i ++){?>
			<li><a href="/portal" target="_blank"><img src="/portal/Get_Logo_big/<?php echo $bigImageList[$i]->img_name;?>" /></a></li>
			<?php }?>
		</ul>
		<a class="prev" href="javascript:void(0)"></a>
		<a class="next" href="javascript:void(0)"></a>
		<div class="num">
			<ul></ul>
		</div>
	</div>
	<script>
	/*鼠标移过，左右按钮显示*/
	$(".bannerbox").hover(function(){
		$(this).find(".prev,.next").fadeTo("show",0.1);
	},function(){
		$(this).find(".prev,.next").hide();
	})
	/*鼠标移过某个按钮 高亮显示*/
	$(".prev,.next").hover(function(){
		$(this).fadeTo("show",0.7);
	},function(){
		$(this).fadeTo("show",0.1);
	})
	$(".bannerbox").slide({ titCell:".num ul" , mainCell:".slideshow" , effect:"fold", autoPlay:true, delayTime:700 , autoPage:true });
	</script>
	
	<div class="main">
	
	  <div class="maincon">
	  	<div class="indexleft">
			<div class="introbox">
				<?php if(isset($teacherList) && count($teacherList) > 0){?>
				<div class="photo"><a href="/portal/showDetail?id=<?php echo $teacherList[0]->id;?>"><img src='/portal/Get_Logo_0/<?php echo $teacherList[0]->img_name;?>' /></a></div>
				<div class="text">
					<h2><a href="/portal/showDetail?id=<?php echo $teacherList[0]->id;?>"><?php echo $teacherList[0]->title;?></a></h2>
					<a href="/portal/showDetail?id=<?php echo $teacherList[0]->id;?>"><p><?php echo Util::cutArticle($teacherList[0]->content,500);?></p></a>
				</div>
				<?php }?>
			</div>
			<div class="indexlist">
				<h2><span><font>课程</font>介绍</span><a href="/portal/showList?type_id=2" class="more">更多</a></h2>
				<ul class="courselist">
					<?php $j=count($courseList); $num = $j>7 ? 7 : $j;?>
					<?php for($i=0; $i < $num; $i++){?>
					<li>- <a href="/portal/showDetail?id=<?php echo $courseList[$i]->id;?>"><?php echo Util::cutArticle($courseList[$i]->title,32);?></a></li>
					<?php }?>
<!-- 					<li>- <a href="">《资本魔方》50期 / 2014-08-04 / 上海 ...</a></li> -->
				</ul>
			</div>
			<div class="indexlist">
				<h2><span><font>活动</font>相关</span><a href="/portal/showList?type_id=3" class="more">更多</a></h2>
				<div class="activitie">
					<script>
					 <?php if(count($activityList)){ $count=0; ?>
						 var box =new PPTBox();
						 box.width = 245; //宽度
						 box.height = 145;//高度
						 box.autoplayer = 3;//自动播放间隔时间)
					 <?php foreach ($activityList as $obj){ if($count > 5) break;?>
					 box.add({"url":"/portal/Get_Logo_3/<?php echo $obj->img_name;?>","href":"/portal/showDetail?id=<?php echo $obj->id;?>","title":"<?php echo $obj->title;?>"})
					 <?php $count++;} ?>
					 box.show();
					 <?php }?>
					</script>
				</div>
			</div>
		</div>
		<div class="indexright">
			<div class="newsbox">
				<h2><span><font>行业</font>动态</span><a href="/portal/showList?type_id=1" class="more">更多</a></h2>
				<div class="newspic">
<!-- 					<a href=""><img src="/public/portal/images/newspic.png" /></a> -->
				<img src="/public/portal/images/newspic.png" />
				</div>
				<ul class="newslist">
					<?php $num = count($industryList) > 6 ? 6 : count($industryList);?>
					<?php for($i=0; $i < $num; $i++){?>
					<li>
						<div><a href="/portal/showDetail?id=<?php echo $industryList[$i]->id;?>"><?php echo Util::cutArticle($industryList[$i]->title,32);?></a></div>
						<span>[<?php echo  date("Y-m-d",strtotime($industryList[$i]->add_datetime));?>]</span>
					</li>
					<?php }?>
				</ul>
			</div>
			<div class="sentiment">
				<h2><span><font>学生</font>感悟</span><a href="/portal/showList?type_id=4" class="more">更多</a></h2>
				<ul class="sentimentlist">
					<?php $num = count($studentList) > 2 ? 2 : count($studentList);?>
					<?php for($i=0; $i < $num; $i++){?>
					<li>
						<div class="sentimentimg"><img src="/portal/Get_Logo_4/<?php echo $studentList[$i]->img_name;?>" /></div>
						<div class="sentimenttext">
							<a href='/portal/showDetail?id=<?php echo $studentList[$i]->id;?>'><p class="text"><?php echo Util::cutArticle($studentList[$i]->content,150);?></p></a>
							<p class="name">公司名称职务&nbsp;-&nbsp;<a href=""><?php echo $studentList[$i]->author;?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo date("Y-m-d",strtotime($studentList[$i]->add_datetime));?></p>
						</div>
					</li>
					<?php }?>
				</ul>
			</div>
		</div>
	  </div>
	</div>
	<div class="main">
		<div class="clubbox">
			<h2><span><font>俱乐部</font></span><a href="" class="more">+ 我要加入俱乐部</a></h2>
			<div class="clubcon">
				<div class="leftbtn"><img alt="leftbtn" src="/public/portal/images/left-disabled.gif" /></div>
				<div class="carousel-component">
					<div class="carousel-clip-region">
						<ul class="carousel-list">
							<?php if(count($clubList)<100) $num=count($studentList);else $num=100;?>
							<?php for($i=0; $i < $num; $i++){?>
							<li><a href="/portal/showDetail?id=<?php echo $clubList[$i]->id;?>"><img src="/portal/Get_Logo_5/<?php echo $clubList[$i]->img_name;?>" /><p><?php echo $clubList[$i]->title;?></p></a></li>
							<?php }?>
						  </ul>
					 </div>
				</div>
				<div class="rightbtn"><img alt="rightbtn" src="/public/portal/images/right-enabled.gif" /></div>
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