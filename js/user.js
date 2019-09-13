
 
layui.define('form', function(exports){
  var $ = layui.$
  ,layer = layui.layer
  ,laytpl = layui.laytpl
  ,setter = layui.setter
  ,view = layui.view
  ,admin = layui.admin
  ,form = layui.form;

  var $body = $('body');
  
  //自定义验证
  form.verify({
    phone: function(value, item){ //value：表单的值、item：表单的DOM对象
      if(!/^1\d{10}$/g.test(value)){
			return "请输入正确的手机号";
      }
      
          }
    
    //我们既支持上述函数式的方式，也支持下述数组的形式
    //数组的两个值分别代表：[正则匹配、匹配不符时的提示文字]
    ,pass: [
      /^[\S]{6,12}$/
      ,'密码必须6到12位，且不能出现空格'
    ] 
  });
  
  
  //对外暴露的接口
  exports('user', {});
});