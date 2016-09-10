//实现影评页 展开和缩进影评内容部分--开始

$("input").mousedown(function(){
    var icon=$(this).val();
    if(icon=="▼"){
            $(this).parent().next().next().css("display","none");
            $(this).parent().next().next().next().css("display","block");
            this.value="▲";
        }else{
            $(this).parent().next().next().css("display","block");
            $(this).parent().next().next().next().css("display","none");
            this.value="▼";
        }
});
            
//实现展开和缩进影评内容部分--结束


