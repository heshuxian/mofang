/*var i = 0;
function showNotice(){
	$.post('/portal/GetNotice',function(data){
		eval('var ret=' + data);
		for(i=0; i<10; i++)
		{
			$('div[id="notice"] a:last-child').remove();
			var obj = '<a href="/portal/showDetail?id='+ ret.NoticeList[i].id'" style="color:#A9A9A9;">'+ ret.NoticeList[i].title + '</a>';
			$('#notice').append(obj);
			setTimeout(,1000);
		}
	});
}
window.onload=function(){
	setInterval(showNotice,10000);
}*/

$(document).ready(function(){
	var noticeArr = new Array();

	$.get('/portal/GetDynamicNotice',{},function(data){
		eval('var ret=' + data);
		if(ret.ret == 0){
			for(i = 0 ; i < ret.noticeList.length ; i++)
			noticeArr.push(ret.noticeList[i]);
		}else{
			
		}
	});
	
	setInterval(setNotice,10000);
	function setNotice()
	{
		$('#notice').find('a:eq(1)').attr('href','/portal/showDetail?id=' + noticeArr[$('#notice').attr('cur_id')].id);
		$('#notice').find('a:eq(1)').text(noticeArr[$('#notice').attr('cur_id')].title );
		curId = Number($('#notice').attr('cur_id')) + 1;
		curId = curId % (noticeArr.length > 10 ? 9 : noticeArr.length);
		$('#notice').attr('cur_id',curId);
	}
});