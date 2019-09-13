layui.use(['jquery', 'form','layer'], function() {
	var $ = layui.$,
		form = layui.form,
		layer=layui.layer;

	form.on('submit(reg)',function(data){
      
        
         	$.ajax({
								type: 'post',
								url: 'Handler/reg.php',
								data: data.field,
								success: function(d) {
									
									if(d=='2'){
										//console.log(data.field);
										layer.msg('注册成功', {
											icon: 1,
											time: 1000
										}, function() {

											location.href = "login.php"; //后台主页

										});

									}else if(d=='1'){
										layer.msg('用户已存在')
									}
								}
							});
							return false;
	  })
	 
	 
})
