/*ami*/


$(document).ready(function(){
	emailValidate();//检验邮件地址合法性
	newbieStyle();
	changeTab();
	changeContent();
	addMesMem ();
	tree();
	pSize();
})

function emailValidate(){
	var error = $(".error-info");
	error.hide();
	$(".error-info").parent().parent().next().children().children().focus(function(){
		var $emailAddress = $(".email").val();
		if(emailAddressTest($emailAddress)){
			error.hide();
		}else{
			error.show();
		}
	})

	//正则表达式检验地址是否合格
	function emailAddressTest(email){
		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    	return re.test(email);
	}
}

//给newbie-list添加样式
function newbieStyle(){
	var tr = $("tr");
	for(var i = 0; i < tr.length; i=i+2){
	tr[i].style.backgroundColor = "#EAF2D3";
	}
}

//workspace tab

function changeTab(){
	$('#change-info-head, #change-password-head, #newbie-con, #send-mes').click(function(event){
		var eventg = event.target
		startMove(eventg);
		$(eventg).parent().parent().find('.header-a').removeClass('active');
		console.log($(eventg).parent());
		$(eventg).addClass('active');

		function startMove(event){
			var $event = $(event);
			var eLeft = $event.position().left;
			var $block = $('#white-block');
			var bLeft = parseInt($block.position().left);

			if (bLeft == eLeft){
				clearTimeout(timer)
			}else if(bLeft < eLeft){
				bLeft += Math.ceil((eLeft-bLeft)/10);	
				$block.css("left",bLeft+'px')
				var timer = setTimeout(function(){
					startMove(eventg);
				},1)
			}else{
				bLeft -= Math.ceil((bLeft-eLeft)/10);	
				$block.css("left",bLeft+'px')
				var timer = setTimeout(function(){
					startMove(eventg);
				},1)
			}
		}
	})


}

//workspace淡入淡出
function changeContent () {
	changeClickEvent($('.change-info'))
	changeClickEvent($('.change-password'))
	changeClickEvent($('.newbie-con'))
	changeClickEvent($('.send-mes'))


	function changeClickEvent (content) {
		content.eq(0).click(function(){
			content.eq(1).fadeIn(500);
			content.siblings().fadeOut(500);
		})
	}
}

//ajax发送短信
function addMesMem () {
	$('#choose-department').unbind('submit').bind('submit',function(event){
		var $form = $(this),
			term = $form.find( "input[name='select[]']" ).val();
			url = $form.attr("action");
		event.preventDefault();
		var posting = $.post(url, { select:term} );
		posting.done(function(data){
			var data1 = $(data)
			$('#diliver-text').empty().append(data1);
		})
	})

}

//team树样式
function tree(){
	var $level1 = $('.level-1').find('.level-1-mem');
	var $name = $('.mem-name')
	for (var i=0; i<$level1.length; i++){
		$level1.eq(i).css("left",i*25+'%')
	}

	for (var j=0; j<$name.length; j++){
		$name.eq(j).click(function(){
			$(this).next().fadeIn(500);
		})

		$name.eq(j).mouseout(function(){
			$(this).next().fadeOut(500);
		})
	}

	$level2 = $('.level-2-mem')
	for (var k=0; k<$level2.length; k++){
		$level2.eq(k).css("left", k*25+'%')
	}
	
}

//子元素撑开父元素高度
function pSize () {
	var $parent = $('.level-2');
	var $son = $parent.find('.level-2-mem');
	var sonHeight = 0;
	for (var i=0; i<$son.length; i++){
		sonHeight = sonHeight < $son.eq(i).height()?$son.eq(i).height():sonHeight+60;
		console.log(sonHeight);
	}
	$parent.css('height',sonHeight + 'px')
	
}