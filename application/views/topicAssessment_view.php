<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/initial_test.css" type="text/css" media="screen">
<?php   $q_array_size = $questionCount;
        $q_array= array(array());
        $q_array = $questionArray;
?>

<script>
    var progress = 0;
    var finalScore = 0;
    var q_running;
    var student_points;
    var Answers=[];
    var increment = 100/<?php echo $q_array_size; ?>;
            
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
        progress = progress + increment;
        $('#barSpan').css("width", progress+"%");
        calculateBarProgress();
        if(progress == 100)
        {
            $('#initialTestBody').hide();
            $('#finalResult').show();
            document.getElementById('score').innerHTML = "Your Score: " + finalScore;
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
                <h1>Addition Assessment</h1>
            </div>
                <div id="initialTestBody">
                    <?php for ($q_no = 0; $q_no<$q_array_size ; $q_no++){ ?> 

                    <div class='question_body' id='question_body_<?php echo $q_no?>'>
                        <div class='question_statement_tab'>
                            <p>Q: <?php echo $q_array[$q_no][0]?> </p>
                        </div>
                        <div class='question_options_tab'>
                            <input type="radio" name="option" value="<?php echo $q_array[$q_no][1]?>" ><label><?php echo $q_array[$q_no][1]?></label>
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
                        <p id="successContent">Congratulations! You have completed the Assessment.</p><br/>
                        <p id="score"></p><br/>
                    </div>
                    <div id="submit_button" class="submit_question">
                        <button type="button" onclick="location.href='<?php echo base_url();?>home/drills'">Next Drill</button>
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