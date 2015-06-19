<link href="<?php echo base_url();?>assets/css/normalize.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/css/nav_menu.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url();?>/assets/js/jquery.js"></script>
<script src="<?php echo base_url();?>/assets/js/jsexcel.js"></script>
<script>
   
    $(document).ready(function () {
        
        codeAddress();    //runs on start
        $("#btnExport").click(function () {
        var uri =    $("#tblExport").battatech_excelexport({
                containerid: "result_table"
               , datatype: 'table'
               , returnUri : true
               
            });
            
           $(this).attr('download', 'ResultsSheet_'+Date()+'.xls') // set file name (you want to put formatted date here)
               .attr('href', uri)                     // data to download
               .attr('target', '_blank')              // open in new window (optional)
                ;
  
        });
    });
    function ChangePassword()
    {
        var baseurl = "<?php print base_url(); ?>";
            $.ajax({
                url:  baseurl +"DataEntry/sendPasswordRequest",
                type:'POST',
                cache:false,
                dataType: 'html',
                data: {},
                success:function(data){
                    
                        alertify.error("Request Sent");
                },
                error:function(x,e){
                }
            }); 
    }
    function SubmitAssessmentForm(value)
    {
      //  alert(value);
        $('#EditAssessment_name').val(value);
        $('#edit_assessment_form').submit();
    }
    function SubmitAssessmentDeleteForm(value)
    {
      //  alert(value);
        $('#DeleteAssessment_name').val(value);
        $('#delete_assessment_form').submit();
    }
</script>
    <style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
    .tg .tg-k6pi{font-size:12px}
    .tg .tg-47zg{font-weight:bold;background-color:#000000;color:#ffffff}
    </style>
<div class="main_container_general">
 
    <div class="top_container_teacher" style="height:420px ;background-color: #9BBA1F;">
        <div class="left_heading_half">
          <span class="span_left_heading">
          <br>
          <h1> Welcome! </h1>
          <br><br>
          <h2> - Our Teachers are our treasure - </h2>
          <br><br>
          <text> Teachers are the ones who can change the mentality of a nation. Lets work together to make Pakistan a better place :) </text>
          </span>
        </div>
        <div class="right_heading_half">
             <img src="<?php echo base_url();?>assets/images/teacher_header.png"/>
        </div>
    </div>
    <div class="start_work_teacher">
        <button onclick="return start_work_click();" class="btn_teacher">Start Working</button>
    </div>
    
<div class="main_container_general_teacher" id="main_teacher">
    <div class="main_heading_general">
        <label>Teacher Portal</label>
    </div>
  <div class="mid_content_general">
    <div class='page'>
            <div class="navigation expanded" id="navigation">
                <a class="nav-toggler" href="#" id="navToggler">
                    <span class="show-nav">&#9776;</span>
                    <span class="hide-nav">&times;</span>
                </a>
                <div class="navigation__inner">
                    <ul>
                        <li>
                            <h2>Menu</h2>
                        </li>
<!--                        <li><a class="current" href="#">Add Assessment</a></li>-->
                        <li onclick="return AddAssessment();"><a href="#main_teacher">Add Assessment</a></li>
                        <li onclick="return EditAssessment();"><a href="#main_teacher">Edit Assessment</a></li>
                        <li onclick="return DeleteAssessment();"><a href="#main_teacher">Delete Assessment</a></li>
                        <li ><a href="<?php echo base_url();?>teacher/result_card">Result Cards</a></li>
                        <li ><a href="<?php echo base_url();?>DataEntry/ViewStudents">View Student</a></li>
                        <li onclick="return ChangePassword();"><a href="#main_teacher">Change Password</a></li>
                        <!--<li class="separator"></li>-->
                        <li><a href="<?php echo base_url();?>login/logout">Logout</a></li>
                    </ul>
                </div>
            </div>
	</div>    
        
    <div class="teacher_mid_right" id="teacher_mid_right">
            <div  class="add_assessment_div" id="add_assessment_div">
                <div class="heading_teacher">
                    <h1>Add Assessment</h1>
                </div>
                <!--type="submit" enctype="multipart/form-data" -->
               <form id="add_assessment_form" name="add_assessment_form" method="POST" action= "<?php echo base_url();?>DataEntry/add_assessment">
                   
                   <!--hidden field-->
                   <input type="hidden" name="Add_hiddenfield" id="Add_hiddenfield" value="0" />
                   
                    <div class="labelandtextbox">
                        <label>Assessment Name:</label>
                        <input type="text" name="AddAssessment_name" value="" id="AddAssessment_name" maxlength="20" placeholder="Enter Assessment Name" required="required">
                    </div>
                   <div class="drill_box">
                       <input type="hidden" name="hidden_drill_id" id="hidden_drill_id" value="Addition" />
                        <label>Select Drill:</label>
                        <select id="drill_select" onchange="updatehiddenselect();" required="required">
                            <?php for($i = 0; $i < $drillsCount; $i++){ ?>
                            <option value="<?php echo $drillsNames[$i]; ?>"><?php echo $drillsNames[$i]; ?></option>
                            <?php } ?>
                        </select>
                   </div>
                    <div class="subheading_teacher">
                        <h1>Questions:</h1>
                    </div>
                   <div class="questions_wrapper">

                    </div>
                    <div class="Add_another_question_tab">
                        <button id="add_question_button" type="button" onclick=" return addassess_addquestion();">Add Another Question</button>
                        <label id="question_limit">Question Limit Reached</label>
                    </div>
                    <div id="submit_button" class="submit_button_teacher">
                        <input type="submit" value='Upload Assessment' >
                    </div>
                </form>
            </div>
            <div id="edit_assessment_div" class="edit_assessment_div">
                <div class="heading_teacher">
                    <h1>Edit Assessment</h1>
                </div>
            <br>
            
            <table class="tg">
              <tr>
                <th class="tg-47zg">Assessment ID</th>
                <th class="tg-47zg">Assessment Name</th>
                <th class="tg-47zg">Drill Name</th>
                <th class="tg-47zg">Total Marks</th>
                <th class="tg-47zg">Edit</th>
              </tr>
           <?php  foreach($assessments as $assessment) 
           { 
          
            ?> 
              <tr>
                <td class="tg-031e">
                    <?php echo $assessment['assessment_id'] ?>
                </td>
                <td class="tg-031e">
                     <?php echo $assessment['assessment_name'] ?>
                </td>
                <td class="tg-031e">
                     <?php echo $assessment['drill_name'] ?>
                </td>
                <td class="tg-031e">
                     <?php echo $assessment['total_marks'] ?>
                </td>
                <td class="tg-k6pi">
                    <button onclick = "SubmitAssessmentForm('<?php echo $assessment['assessment_name'] ?>')">Edit</button>
                </td>
              </tr>
              <?php }?>
<!--              <tr>
                <td class="tg-031e"></td>
                <td class="tg-031e"></td>
                <td class="tg-031e"></td>
                <td class="tg-031e"></td>
                <td class="tg-031e"></td>
              </tr>-->
            </table>
                <form id="edit_assessment_form" name="edit_assessment_form" method="POST" action="<?php echo base_url();?>DataEntry/edit_assessment">
                    <div class="labelandtextbox">
                       
                        <input type="hidden" name="EditAssessment_name" value = "<?php if($scroll_to_div== "edit_assess_search_no_match" || $scroll_to_div== "edit_assess_search_match"){  echo $searched_assessment;  }?>" id="EditAssessment_name" maxlength="20" placeholder="Enter Assessment Name" required="required">
                    </div>
<!--                    <div class="submit_button_teacher">
                        <input type="submit" value='Search Assessment'>
                    </div>-->
                </form>
                <?php if($scroll_to_div== "edit_assess_search_match") 
                    { ?>
                <form id="update_assessment_form" name="update_assessment_form" method="POST" action= "<?php echo base_url();?>DataEntry/update_assessment">
                   
                   <!--hidden field-->
                   <input type="hidden" name="update_hiddenfield_noofqs" id="update_hiddenfield_noofqs" value="<?php echo $no_of_questions ?>" />
                    <div class="subheading_teacher">
                        <h1>Questions:</h1>
                    </div>
                    <div class="questions_wrapper_update">
                    <?php for($i=0 ;$i<$no_of_questions;$i++)
                        { ?>
                        <div class="add_question_teacher">
                            <input type="hidden" name="update_hiddenfield_qid_<?php echo $i; ?>" id="update_hiddenfield_qid_<?php echo $i; ?>" value="<?php echo $questions['question_id'.$i] ?>" />
                            <div class="question_leftside">
                                <h1>    <?php echo $i+1; ?>    :</h1>
                                <textarea draggable="false" name="update_question_<?php echo $i; ?>" id="update_question_<?php echo $i; ?>" rows="5" required="required" placeholder="Write your question here..."><?php echo $questions['statement'.$i] ?></textarea>
                            </div>
                            <div class="question_rightside">
                                <input type="text" name="update_CorrectOption1_<?php echo $i; ?>" value="<?php echo $questions['answer'.$i] ?>" id="update_CorrectOption1_<?php echo $i; ?>" maxlength="20" placeholder="Correct Option" required="required" class="correctoption">
                                <input type="text" name="update_QuestionOption2_<?php echo $i; ?>" value="<?php echo $questions['option1'.$i] ?>" id="update_QuestionOption2_<?php echo $i; ?>" maxlength="20" placeholder="Wrong Option" required="required">
                                <input type="text" name="update_QuestionOption3_<?php echo $i; ?>" value="<?php echo $questions['option2'.$i] ?>" id="update_QuestionOption3_<?php echo $i; ?>" maxlength="20" placeholder="Wrong Option" required="required">
                                <input type="text" name="update_QuestionOption4_<?php echo $i; ?>" value="<?php echo $questions['option3'.$i] ?>" id="update_QuestionOption4_<?php echo $i; ?>" maxlength="20" placeholder="Wrong Option" required="required">
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                    <div id="submit_button" class="submit_button_teacher">
                        <input type="submit" value='Update Assessment' >
                    </div>
                </form>
                <?php } ?>
            </div>
            <div id="delete_assessment_div" class="delete_assessment_div">
                <div class="heading_teacher">
                    <h1>Delete Assessment</h1>
                </div>
                <br>
                  <table class="tg">
              <tr>
                <th class="tg-47zg">Assessment ID</th>
                <th class="tg-47zg">Assessment Name</th>
                <th class="tg-47zg">Drill Name</th>
                <th class="tg-47zg">Total Marks</th>
                <th class="tg-47zg">Delete</th>
              </tr>
           <?php  foreach($assessments as $assessment) 
           { 
          
            ?> 
              <tr>
                <td class="tg-031e">
                    <?php echo $assessment['assessment_id'] ?>
                </td>
                <td class="tg-031e">
                     <?php echo $assessment['assessment_name'] ?>
                </td>
                <td class="tg-031e">
                     <?php echo $assessment['drill_name'] ?>
                </td>
                <td class="tg-031e">
                     <?php echo $assessment['total_marks'] ?>
                </td>
                <td class="tg-k6pi">
                    <button onclick = "SubmitAssessmentDeleteForm('<?php echo $assessment['assessment_name'] ?>')">Delete</button>
                </td>
              </tr>
              <?php }?>
<!--              <tr>
                <td class="tg-031e"></td>
                <td class="tg-031e"></td>
                <td class="tg-031e"></td>
                <td class="tg-031e"></td>
                <td class="tg-031e"></td>
              </tr>-->
            </table>
                <form id="delete_assessment_form" name="delete_assessment_form" method="POST" action= "<?php echo base_url();?>DataEntry/delete_assessment">
                    <div class="labelandtextbox">
                        <!--<label>Assessment Name:</label>-->
                        <input type="hidden" name="DeleteAssessment_name" value="" id="DeleteAssessment_name" maxlength="20" placeholder="Enter Assessment Name" required="required">
                    </div>
                    <!--<div class="submit_button_teacher">
                        <input type="submit" value='Delete Assessment'>
                    </div>-->
                    
                </form>
            </div>
            
                <div id="result_card_div" class="result_card_div">
                    <div class="heading_teacher">
                        <h1>Students Statistics</h1>
                        
                    </div>
                   <?php if($results) { ?>
                    
                    
                    <?php if ($results){?>
                    <div style="padding:25px;margin:auto;text-align:center;"  >
                    <button class="btn-large btn-success"><a id="btnExport" >Export to Excel Sheet! </a></button>
                    </div>
                    <?php } ?>
                    <table class="tg" id="result_table">
                        <tr>
                          <th class="tg-c5de marks_th">Sr.No</th>
                          <th class="tg-c5de result_name_th">Name</th>
                          <?php for ($i = 0 ; $i<$assess_count; $i++) { ?>
                          <th class="tg-c5de marks_th "><?php echo 'A'.($i+1); ?> </th>
                          <?php } ?>
                          <th class="tg-c5de">Total Marks</th>
                          <th class="tg-c5de">Position</th>
                        </tr>
                        <?php for ( $srno= 0 ; $srno < count($results); $srno++ ) {?>
                        <tr>
                          
                          <td class="tg-031e marks_th"><?php echo $srno+1;?></td>
                          <td class="tg-031e result_name_th"><?php echo $results[$srno]['name']; ?></td>
                            
                          <?php for ($i = 0 ; $i< $assess_count; $i++) { ?>
                          <td class="tg-031e marks_th"><?php echo $results[$srno][$i];?> </td>
                          <?php } ?>
                          <td class="tg-031e"> <?php echo $results[$srno]['total_marks'];?> </td>
                          <td class="tg-031e"> <?php echo $results[$srno]['position'];?></td>
                          
                        </tr>
                        
                        
                        <?php } ?>
                    </table>
                   <?php } else { ?>
                   
                    <div class=" error_main_container "><label class="error_label"> No Students Yet!</label> </div>
                   <?php }?>
                    
            </div>
            <div id="view_students_div" class="view_students_div">
                <div class="heading_teacher">
                    <h1>Viewing Students</h1>
                </div>
                <div class="view_result_container">
                    <div class="student_view_tab">
<!--                        <div class="student_block">
                            <h1>Ranking</h1>
                        </div>-->
                    <?php if($scroll_to_div=="view_student" && $no_of_students==0)
                        { ?>
                        <div class="student_block_long_heading">
                            <label>You Have </label>
                        </div>
                        <div class="student_block_long_heading">
                            <label>Zero Students</label>
                        </div>
                    <?php 
                    }else{ ?>
                        <div class="student_block_long_heading">
                            <label>Name</label>
                        </div>
                        <div class="student_block_long_heading">
                            <label>Email</label>
                        </div>   
                    <?php 
                        }?>
                    </div>
                    <?php if($scroll_to_div=="view_student") {?>
                    <?php    for($k=0 ;$k<$no_of_students;$k++)
                            { ?>
                            <div class="student_view_tab">
<!--                                <div class="student_block">
                                    <label><?php echo $result['rank'.$k] ?><label>
                                </div>-->
                                <div class="student_block_long">
                                    <label><?php echo $result['student_name'.$k] ?><label>
                                </div>
                                <div class="student_block_long">
                                    <label><?php echo $result['student_contact'.$k] ?><label>
                                </div>
<!--                                <div class="student_block">
                                    <label><?php echo $result['score'.$k] ?><label>
                                </div>-->
                            </div>
                    
                      <?php 
                        }} ?>
                </div>
              </div>
            </div>
        </div>

</div>
    
</div>
<script type="text/javascript">
    var question_number;    //teep track of no. of questions in add_assessment div
    var question_limit =5;  //limit on no. of questions in add_assessment div
    
    function codeAddress() //runs every time on page load
    {
        question_number=0;
        $("#edit_assessment_div").hide();
        $("#delete_assessment_div").hide();
        $("#view_students_div").hide();
        $("#result_card_div").hide();
        addassess_addquestion();
        <?php if($scroll_to_div == "add_assess")
                { ?>
                alertify.error("Assessment Added");
                start_work_click();
                AddAssessment();

        <?php }else if($scroll_to_div == "edit_assess")
                {?>
                alertify.error("Assessment Updated");
                EditAssessment();

        <?php }else if($scroll_to_div == "delete_assess")
                 { ?>
                alertify.error("Assessment Deleted");
                start_work_click();
                DeleteAssessment();
                
         <?php }else if($scroll_to_div == "delete_failed")
                 { ?>
                alertify.error("Assessment not Found");
                start_work_click();
                DeleteAssessment();
                
        <?php }else if($scroll_to_div == "edit_assess_search_match")
                 { ?>
                alertify.error("Assessment Found");
                start_work_click();
                EditAssessment();
        <?php }else if($scroll_to_div == "edit_assess_search_no_match")
                 { ?>
                alertify.error("Assessment name not found");
                start_work_click();
                EditAssessment();
        <?php }else if($scroll_to_div == "update_assess")
                 { ?>
                alertify.error("Assessment updated");
                start_work_click();
                EditAssessment();
        <?php }else if($scroll_to_div == "update_assess_updation_error")
                 { ?>
                alertify.error("Assessment not updated");
                start_work_click();
                EditAssessment();
         <?php }else if($scroll_to_div == "view_student")
                 { ?>
                alertify.error("Students Loaded");
                start_work_click();
                ViewStudents();       
                
        <?php } else if($scroll_to_div == "result_card")
            { ?>
                 alertify.error("Result Card Generated uptil "+ Date());
                 start_work_click();
                 SeeResultCards();
                
        <?php } ?>
            
            
        return true;
    }
    
    
    function start_work_click()
    {
        $('html,body').animate({
        scrollTop: $(".main_container_general_teacher").offset().top},
        'slow');
        return true;
    }
    function hide_alldivs()
    {
        $("#no_option_seleted").hide();
        $("#add_assessment_div").hide();
        $("#edit_assessment_div").hide();
        $("#delete_assessment_div").hide();
        $("#view_students_div").hide();
        $("#result_card_div").hide();
        return true;
    }
    function AddAssessment()
    {
        hide_alldivs();
        $("#add_assessment_div").show();
        return true;
    }
    
    function SeeResultCards()
    {
        hide_alldivs();
        $("#result_card_div").show();
        return true;
    }
    
    function EditAssessment()
    {
        hide_alldivs();
        $("#edit_assessment_div").show();
        return true;
    }
    function DeleteAssessment()
    {
        hide_alldivs();
        $("#delete_assessment_div").show();
        return true;
    }
    function ViewStudents()
    {
        hide_alldivs();
        $("#view_students_div").show();
        return true;
    }
    function addassess_addquestion()
    {
        if(question_number<question_limit)
        {
            if(question_number!==0)  //scroll inside
                submit_button_teacher();
        
            var i= ++question_number ;
            var element = document.getElementById("Add_hiddenfield");
            element.value = ""+i+"";
            var wrapper = $(".questions_wrapper");
            //to remove a row you can place a cross button with all questions
            $(wrapper).append('<div class="add_question_teacher"><div class="question_leftside"><h1>'+i+':</h1><textarea draggable="false" name="question_'+i+'" id="question_'+i+'" rows="5" required="required" placeholder="Write your question here..."></textarea></div><div class="question_rightside"><input type="text" name="CorrectOption1_'+i+'" value="" id="CorrectOption1_'+i+'" maxlength="20" placeholder="Correct Option" required="required" class="correctoption"><input type="text" name="QuestionOption2_'+i+'" value="" id="QuestionOption2_'+i+'" maxlength="20" placeholder="Wrong Option 1" required="required"><input type="text" name="QuestionOption3_'+i+'" value="" id="QuestionOption3_'+i+'" maxlength="20" placeholder="Wrong Option 2" required="required"><input type="text" name="QuestionOption4_'+i+'" value="" id="QuestionOption4_'+i+'" maxlength="20" placeholder="Wrong Option 3" required="required"></div></div>');
            if(question_number==question_limit)
            {
                var element = document.getElementById("question_limit");
                element.style.visibility="visible";
                var element = document.getElementById("add_question_button");
                element.style.visibility="hidden";
            }
            return true;   //to cancel submission of form
        }else{
            return false;
        }
    }
    function submit_button_teacher() //scroll inside add_assessment
    {
        $('#teacher_mid_right').animate({
            scrollTop: $("#submit_button").offset().top
        }, 'slow');
        return true;
    }
    function updatehiddenselect()
    {
        var element = document.getElementById("hidden_drill_id");
        element.value = $( "#drill_select option:selected" ).text();
    }
</script>
<!--Navigation panel script-->
<script type="text/javascript">
(function ($, window, document, undefined) {
    $(function () {
        var $navigation = $('#navigation'), $navToggler = $('#navToggler');
        $('#navToggler').on('click', function (e) {
            e.preventDefault();
            $navigation.toggleClass('expanded');
        });
    });
}(jQuery, this, this.document));

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>



