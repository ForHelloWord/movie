//影评回复 隐藏按钮部分---开始

$('.l-content').hover(function () {
    $('#btn').css("display", "none");
}, function () {
    $('#btn').css("display", "block");
});

//影评回复 隐藏按钮部分---结束


//遍历回复问答开始

//添加id为add的点击事件
$('#add').click(submitReply);

function submitReply() {

//得到textarea的value值 就是用户在文本框输入的内容
    var value = $('textarea').val();
    var uid=$("#userId").val();

    var answer = {'answer': value, 'qid': question_id,'uid':uid};

    var url = cur_controller + "/insert";

    $.post(url, answer, dealReturnResult, 'text');

    function dealReturnResult(insert_id) {
        if (insert_id) {
            var d = new Date();
            var replay_time = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate() + ' ' + d.getHours() + ':' + d.getMinutes() + ":" + d.getSeconds();

            var str = "<div class='reply'><div class='division'></div><div class='replie'><span style='color:#3377AA' class='uid'>" + user.username + "</span><span style='color:#bdbdbd'>于" + replay_time + "回答</span></div><div class='l-content'><div class='r-content'>" + answer.answer + "</div><div class='btn-site'></div></div></div>";

            var reply_count = $('#replies .reply').size() + 1;
            $("#count").html("共有" + reply_count + "条回复");
            $("#replies").prepend(str);
            $('.text textarea[name="rv_comment"]').val('');
            alert("添加成功");
        } else {
            alert("回答出现错误啦..请稍后再试");
        }
    }
}
