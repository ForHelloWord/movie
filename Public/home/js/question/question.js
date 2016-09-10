    $('#btn1').click(function(){
        $('#noreply').hide();
    });
    $('#btn2').click(function(){
        $('.hot').hide();
        $('#noreply').show();
    });
    $('#btn1').click(function(){
        $('#noreply').hide();
        $('.hot').show();
    });

//热门问题遍历开始
    function dealHotQueslist(ques_list){
        var str = '';
        if(ques_list){
            $.each(ques_list, function(i, $question){
                str += '<div class="content" id="hot"><p class="movie">来自《'+$question.qu.mid+'》</p><div class="title"><a href="__MODULE__/answers/answers/id/'+$question.qu.id+'>'+$question.qu.question+'</a></div><div class="quesnum">'+$question.qu.num+'个回答</div><div class="users">'+$question.re.uid+'回复:<span>'+$question.re.answer+'</span></div></div>';
            });
        }

        $('#list').html(str);

    }

//热门问题遍历结束


//待回答问题遍历开始
    function dealUnanswerQuesList(ques_list){
        var str ='';
        if(ques_list){
            $.each(ques_list,function(i,$noques){
                str += '<div class="content" id="hot"><p class="movie">来自《'+$noques.qu.mid+'》</p><div class="title"><a href="__MODULE__/answers/answers/id/'+$noques.qu.id+'>'+$noques.qu.question+'</a></div><div class="quesnum">'+$noques.qu.num+'个回答</div><div class="users">'+$question.re.uid+'回复:<span>'+$noques.re.answer+'</span></div></div>';
            });
        }
    }

//待回答问题遍历结束