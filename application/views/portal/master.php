<!DOCTYPE>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta content="width=device-width,initial-scale=1.0" name="viewport">
	<title>资本魔方 - 传播和实践资本智慧第一平台</title>
	<link href="/public/portal/style/layout.css" rel="stylesheet" type="text/css" />
	<!--[if lte IE 7]><link rel="stylesheet" href="style/ie7.css" type="text/css"/><![endif]-->
	<script src="/public/js/jquery.min.js" type="text/javascript"></script>
	<script src="/public/portal/js/jquery.superslide.2.1.1.js" type="text/javascript"></script>
	<script src="/public/portal/js/pptBox.js" type="text/javascript"></script>
	
	<script type="text/javascript"> 
	/*function AddFavorite(sURL, sTitle)
	{
	    try{window.external.addFavorite(sURL, sTitle);}
	    catch (e)
	    {
	        try{window.sidebar.addPanel(sTitle, sURL, "");}
	        catch (e){alert("加入收藏失败，请使用Ctrl+D进行添加");}
	    }
	}*/
	var isIE=(document.all&&document.getElementById&&!window.opera)?true:false;
	var isMozilla=(!document.all&&document.getElementById&&!window.opera)?true:false;
	var isOpera=(window.opera)?true:false;
	var seturl='url(#default#homepage)';
	var weburl=window.location.href;
	var webname=document.title;
	function myhomepage() {
		if(isMozilla){
		   try {netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");}
		   catch (e){alert("此操作被浏览器拒绝！\n请在浏览器地址栏输入'about:config'并回车\n然后将[signed.applets.codebase_principal_support]设置为'true'");}
		   var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
		   prefs.setCharPref('browser.startup.homepage',weburl);
		}
		if(isIE){
		   this.homepage.style.behavior=seturl;this.homepage.sethomepage(weburl);
		}
	}
	function addfavorite()
	{
		if(isMozilla){
		   if (document.all){ 
			   window.external.addFavorite(weburl,webname);
		   }
		   else if (window.sidebar){ 
			   window.sidebar.addPanel(webname, weburl,"");
		   }
		}
		if(isIE){
			window.external.AddFavorite(weburl, webname);
			}
	}
	</script>
</head>
<body>
	<div class="header">
		<h1 class="logo" title="资本魔方 - 传播和实践资本智慧第一平台"><a href="/portal">资本魔方 - 传播和实践资本智慧第一平台</a></h1>
		<div class="right">
			<div class="notice" id="notice" cur_id='0'>
				<a href='/portal/showList?type_id=7' class="redfont">[最新公告]</a>&nbsp; <a href="" style="color:#A9A9A9;">最新公告信息，最新公告信息标题摘要 ...</a>
					<!-- #C0C0C0 -->
			</div>
			<div class="righttop">
				<a href="/portal/registration">申请会员</a><a onCLick='javascript:addfavorite()'>收藏本站</a><a href="">联系我们</a><a href=""><img src="/public/portal/images/weibo.gif" /></a>
				<a href="#thumb" class="thumbnail"><img width="25px" height="28px" border="0" src="/public/portal/images/weixin.gif"><span><img src="/public/portal/images/QRCode.gif"><br></span></a>
			</div>
			<div class="search">
			<input class="input" type="text" value="请输入搜索关键字" onblur="if (this.value=='') this.value='请输入搜索关键字'" onclick="if (this.value=='请输入搜索关键字') this.value=''">
			<input class="btn" type="submit" value="搜 索" name="submit">
			</div>
		</div>
		<ul class="nav">
			<li <?php if($pageIndex == 10){?>  class="act" <?php }?>><a href="/portal">首页</a></li>
			<li <?php if($pageIndex == 0){?>  class="act" <?php }?>><a href="/portal/showList?type_id=0">老师风采</a></li>
			<li <?php if($pageIndex == 2){?>  class="act" <?php }?>><a href="/portal/showList?type_id=2">课程介绍</a></li>
			<li <?php if($pageIndex == 1){?>  class="act" <?php }?>><a href="/portal/showList?type_id=1">行业动态</a></li>
			<li <?php if($pageIndex == 3){?>  class="act" <?php }?>><a href="/portal/showList?type_id=3">活动相关</a></li>
			<li <?php if($pageIndex == 6){?>  class="act" <?php }?>><a href="/portal/showList?type_id=6">老师观点</a></li>
			<li <?php if($pageIndex == 4){?>  class="act" <?php }?>><a href="/portal/showList?type_id=4">学员感悟</a></li>
			<li <?php if($pageIndex == 5){?>  class="act" <?php }?>><a href="/portal/showList?type_id=5">加入俱乐部</a></li>
		</ul>
	</div>
	
	<?php echo $mainPlaceHolder;?>
	<?php echo $headerPlaceHolder;?>
</body>
</html>