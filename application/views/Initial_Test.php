
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/initial_test.css" type="text/css" media="screen">
<?php   $q_array_size = 10;
        $q_array= array( // questions      //12
       
        0=>array(
        0=> "Q: Which number is Largest?",     //Statement
        1=> "6",               //option1
        2=> "2",                //option2
        3=> "12",                //option3
        4=> "15",                //option4
        5=> "15"                //corrent answer
        ),
        1=>array(
        0=> "Q: Which number is Smallest?",     //Statement
        1=> "1",                //option1
        2=> "9",                //option2
        3=> "6",                //option3
        4=> "10",                //option4
        5=> "1"                //corrent answer
            ),
        2=>array(
        0=> "Q: What is 5+7?",     //Statement
        1=> "11",                //option1
        2=> "9",                //option2
        3=> "12",                //option3
        4=> "20",                //option4
        5=> "12"                //corrent answer
            ),
        3=>array(
        0=> "Q: What is 11+13?",     //Statement
        1=> "11",                //option1
        2=> "24",                //option2
        3=> "29",                //option3
        4=> "32",                //option4
        5=> "24"                //corrent answer
            ),
        4=>array(
        0=> "Q: If Sana has 4 toffees and Ali has 3 toffees. How many toffees do they have altogether?",     //Statement
        1=> "7",                //option1
        2=> "5",                //option2
        3=> "11",                //option3
        4=> "12",                //option4
        5=> "7"                //corrent answer
            ),
        5=>array(
        0=> "Q: Talha has 5 dollars. He received a pocket money of 10 dollars from his father. How much money does he have altogether?",     //Statement
        1=> "12",                //option1
        2=> "19",                //option2
        3=> "15",                //option3
        4=> "16",                //option4
        5=> "15"                //corrent answer
            ), 
        6=>array(
        0=> "Q: Which of the numbers given is an even number?",     //Statement
        1=> "12",                //option1
        2=> "19",                //option2
        3=> "15",                //option3
        4=> "11",                //option4
        5=> "12"                //corrent answer
            ), 
        7=>array(
        0=> "Q: Which of the numbers given is an odd number?",     //Statement
        1=> "3",                //option1
        2=> "5",                //option2
        3=> "15",                //option3
        4=> "All",                //option4
        5=> "All"                //corrent answer
            ),  
        8=>array(
        0=> "Q: Ali has 5 cars. Is the number of cars even or odd?",     //Statement
        1=> "Even",                //option1
        2=> "Odd",                //option2
        3=> "Don't Know",                //option3
        4=> "None",                //option4
        5=> "Odd"                //corrent answer
            ),
        9=>array(
        0=> "Q: Zain has 3 choco bars. He went to the market to buy another. Does he have even number of chocolates?",     //Statement
        1=> "Yes",                //option1
        2=> "No",                //option2
        3=> "Don't Know",                //option3
        4=> "None",                //option4
        5=> "Yes"                //corrent answer
            )    
        );
        
?>

<script>
    var progress = 0;
    var finalScore = 0;
    var q_running;
    var student_points;
    var Answers=[];
    
    function codeAddress() //runs every time on page load
    {
        hide_allQuestions();
        q_running=0;
        student_points=0;
        nextQuestion();
    } 
    
    window.onload = codeAddress;    //runs on start
    
    function hide_allQuestions()
    {
        <?php for ($q_no = 0; $q_no<$q_array_size ; $q_no++){ ?>
                document.getElementById('question_body_<?php echo $q_no?>').style.display = 'none';
        <?php }?>
        return true;
    }
    
    function unCheck()
    {
        var r = document.getElementsByName("option");
        for(var i=0; i < r.length; i++){
           r[i].checked = false;
        }
    }
    
    function Validate()
    {
        var r = document.getElementsByName("option")
        var c = -1

        for(var i=0; i < r.length; i++){
           if(r[i].checked) {
              c = i; 
           }
        }
        if (c == -1) 
        {
            $('#js-error-block-message').text("Please Select Any Answer");
            
            $('#js-error-block').show();
            setTimeout(function(){
                $('#js-error-block').fadeTo("slow",1.0);
            }, 500);
            
            setTimeout(function(){
                $('#js-error-block').fadeTo("slow",0.0);
                $('#js-error-block').hide();
            }, 2500);
            return false;
        }
        else
            return true;
    }
    
    var first_time = 0;
    function nextQuestion()
    {   
        var valid = true;
        if(first_time > 0)
            valid = Validate();
        
        first_time++;
        if(valid === false && q_running != 0)
            return false;
        else
        {
            if(q_running <= <?php echo $q_array_size?> && q_running==0)
            {
                hide_allQuestions();
                document.getElementById('question_body_'+q_running+'').style.display = 'block';
                q_running++;
                return true;
            }else
            if( q_running < <?php echo $q_array_size?>  )
            {
                hide_allQuestions();
                document.getElementById('question_body_'+q_running+'').style.display = 'block';
                Answers[q_running] = $("input[name=option]:checked").val();
                q_running++;
                unCheck();
                changeProgress();
                return true;
            }else
            if( q_running == <?php echo $q_array_size?>)     //last
            {
                Answers[q_running] = $("input[name=option]:checked").val();
                q_running++;    //just to stop

                <?php for ($q_no = 1; $q_no<$q_array_size+1 ; $q_no++){ ?>
                    if(Answers[<?php echo $q_no?>] === "<?php echo $q_array[$q_no-1][5]?>")
                    {
                        student_points+=10;
                    }
                <?php }?>
                    finalScore = student_points;
                    
                unCheck();
                changeProgress();    
                return true;
            }
            return false;
        }
    }
    
    function calculateBarProgress()
    {
        var bar = $('#barSpan');
        var p = $('#barP');
        var width = bar.attr('style');
        width = width.replace("width:", "");
        width = width.substr(0, width.length-1);
        var interval;
        var start = 0; 
        var end = parseInt(width);
        var current = start;

        var countUp = function() {
          current++;
          p.html(current + "%");

          if (current === end) {
            clearInterval(interval);
          }
        };
        interval = setInterval(countUp, (1000 / (end + 1)));
    }
        
    $(document).ready(function(){
        setInterval(function(){ 
            $('#loadingGif').hide();
            $('#questionBox').show();
        }, 3000);
        calculateBarProgress();
    });
    
    function changeProgress()
    {
        progress = progress + 10;
        $('#barSpan').css("width", progress+"%");
        calculateBarProgress();
        if(progress == 100)
        {
            $('#initialTestBody').hide();
            $('#finalResult').show();
            document.getElementById('score').innerHTML = "Your Score: " + finalScore;
            var level = 0;
            if(finalScore < 40)
            {
                level = 1;
                document.getElementById('level').innerHTML = "Your Level is Beginner";
            }
            else if(finalScore >=40 && finalScore <= 70)
            {
                level = 2;
                document.getElementById('level').innerHTML = "Your Level is Amateur";
            }
            else if(finalScore > 70)
            {
                level = 3;
                document.getElementById('level').innerHTML = "Your Level is Expert";
            }
            
            var baseurl = "<?php print base_url(); ?>";
            $.ajax({
                url:  baseurl +"DataEntry/updateLevel",
                type:'POST',
                cache:false,
                dataType: 'html',
                data: {Level:level},
                success:function(data){
                    
                },
                error:function(x,e){
                }
            }); 
        }
    }
</script>

<div class="initial_test_container">
    <div id="loadingGif">
        <img src="<?php echo base_url();?>/assets/images/loading.gif"/>
    </div>
    
    <div class="error-div-failure" id="js-error-block">
        <div class="failure" id="js-error-block-message"></div>
    </div>
    
    <div id="questionBox">
        <div class='question_box'>
            <form id="intitial_form" name="initial_form" method="POST" action= "#">
            <div class='question_heading'>
                <h1>Test</h1>
            </div>
                <div id="initialTestBody">
                    <?php for ($q_no = 0; $q_no<$q_array_size ; $q_no++){ ?> 

                    <div class='question_body' id='question_body_<?php echo $q_no?>'>
                        <div class='question_statement_tab'>
                            <p><?php echo $q_array[$q_no][0]?> </p>
                        </div>
                        <div class='question_options_tab'>
                            <input type="radio" name="option" value="<?php echo $q_array[$q_no][1]?>" checked><label><?php echo $q_array[$q_no][1]?></label>
                        </div>
                        <div class='question_options_tab'>
                            <input type="radio" name="option" value="<?php echo $q_array[$q_no][2]?>" ><label><?php echo $q_array[$q_no][2]?></label>
                        </div>
                        <div class='question_options_tab'>
                            <input type="radio" name="option" value="<?php echo $q_array[$q_no][3]?>" ><label><?php echo $q_array[$q_no][3]?></label>
                        </div>
                        <div class='question_options_tab'>
                            <input type="radio" name="option" value="<?php echo $q_array[$q_no][4]?>" ><label><?php echo $q_array[$q_no][4]?></label>
                        </div>
                    </div>
                    <?php }?>
                    <div id="submit_button" class="submit_question">
                        <button type="button" onclick=" return nextQuestion();">Next Question</button>
                    </div>
                </div>
                <div id="finalResult">
                    <div class='question_body'>
                        <p id="successContent">Congratulations! You have completed the initial Test.</p><br/>
                        <p id="score"></p><br/>
                        <p id="level"></p>
                    </div>
                    <div id="submit_button" class="submit_question">
                        <button type="button" onclick="location.href='<?php echo base_url();?>drills/'">Start Drills</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="barMargin">
            <div class="meter">
                <span style="width:1%" id="barSpan"></span>
                <p id="barP"></p>
            </div>
        </div>
        <div class="bar-text-margin">
            <p>Road to Drills</p>
        </div>
    </div>

</div>