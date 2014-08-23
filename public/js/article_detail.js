$(document).ready(function() {  
    iBShare.init();    //初始化  
}); 
	//bShare分享  
	var iBShare = {  
	    //初始化  
	    init: function() {  
	        var $shareBox = $(".bshare-custom");  
	        //加载分享工具  
	        var tools = '<a title="分享到QQ空间" class="bshare-qzone"></a>';  
	        tools += '<a title="分享到新浪微博" class="bshare-sinaminiblog"></a>';  
	        tools += '<a title="分享到人人网" class="bshare-renren"></a>';  
	        tools += '<a title="分享到腾讯微博" class="bshare-qqmb"></a>';  
	        tools += '<a title="分享到网易微博" class="bshare-neteasemb"></a>';  
	        tools += '<a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a>';  
	        $shareBox.append(tools);  
	    //绑定分享事件  
	        $shareBox.children("a").click(function() {  
	            var parents = $(this).parent();  
	            bShare.addEntry({  
	                title: parents.attr("title"),  
	                url: parents.attr("url"),  
	                summary: parents.attr("summary"),  
	                pic: parents.attr("pic")  
	            });  
	        });  
	    }  
	}  