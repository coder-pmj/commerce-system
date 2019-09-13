layui.use('jquery', function() {
	var $ = layui.$;

	var btns = $("dl>dd")
	var divs = $("div#list-cont")

	for(var i = 1; i < divs.length; i++) {
		//先让底下的div全部隐藏
		divs[i].style.display = "none";
	}
	for(var i = 0; i < btns.length; i++) {
		
		
		btns[i].index = i
		btns[i].onclick = function() {
		
	
			for(var i = 0; i < divs.length; i++) {
				//先让底下的div全部隐藏
				divs[i].style.display = "none";
			}
			//然后给当前所点击按钮相关联的盒子添加指定属性
			divs[this.index].style.display = "block";

		}
	}
	
})