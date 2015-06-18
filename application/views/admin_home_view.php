
<link href="<?php echo base_url();?>assets/css/normalize.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/css/nav_menu.css" rel="stylesheet" type="text/css">
<script>
    function editSpecificStudent(student_id, fName, lName, username, email, address, pass, parentPass, school){
        $("#general_edit").hide();
        $("#edit_main_form").show();
        $('#person_id').val(student_id);
        $('#edit_firstName').val(fName);
        $('#edit_lastName').val(lName);
        $('#edit_username').val(username);
        $('#edit_email').val(email);
        $('#edit_HomeAddress').val(address);
        $('#edit_password').val(pass);
        $('#edit_Parentpassword').val(parentPass);
        $('#edit_school').val(school);
    }
    
    function validateEmail(email) { 
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
    
    function validateStudent()
    {
        var school = document.getElementById('school').value;
        var fname = document.getElementById('firstName').value;
        var lname = document.getElementById('lastName').value;
        var address = document.getElementById('HomeAddress').value;
        var email = document.getElementById('email').value;
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;
        var pPassword = document.getElementById('Parentpassword').value;
        
        if(school == "" || fname == "" || lname == "" || address == "" || email == "" || username == "" || password == "" || pPassword == "")
        {
            if(school == "")
                $('#js-error-block-message').text("Please Select School");
            else if(fname == "")
                $('#js-error-block-message').text("Please Enter First Name");
            else if(lname == "")
                $('#js-error-block-message').text("Please Enter Last Name");
            else if(address == "")
                $('#js-error-block-message').text("Please Enter Address");
            else if(username == "")
                $('#js-error-block-message').text("Please Enter Username");
            else if(email == "")
                $('#js-error-block-message').text("Please Enter Email Address");
            else if(!validateEmail(email))
                $('#js-error-block-message').text("Please Enter Valid Email Address");
            else if(password == "")
                $('#js-error-block-message').text("Please Enter Password");
            else if(pPassword == "")
                $('#js-error-block-message').text("Please Enter Parent Password");
            
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
    
    function validateEditStudent()
    {
        var school = document.getElementById('edit_school').value;
        var fname = document.getElementById('edit_firstName').value;
        var lname = document.getElementById('edit_lastName').value;
        var address = document.getElementById('edit_HomeAddress').value;
        var email = document.getElementById('edit_email').value;
        var username = document.getElementById('edit_username').value;
        var password = document.getElementById('edit_password').value;
        var pPassword = document.getElementById('edit_Parentpassword').value;
        
        if(school == "" || fname == "" || lname == "" || address == "" || email == "" || username == "" || password == "" || pPassword == "")
        {
            if(school == "")
                $('#js-error-block-message').text("Please Select School");
            else if(fname == "")
                $('#js-error-block-message').text("Please Enter First Name");
            else if(lname == "")
                $('#js-error-block-message').text("Please Enter Last Name");
            else if(address == "")
                $('#js-error-block-message').text("Please Enter Address");
            else if(username == "")
                $('#js-error-block-message').text("Please Enter Username");
            else if(email == "")
                $('#js-error-block-message').text("Please Enter Email Address");
            else if(!validateEmail(email))
                $('#js-error-block-message').text("Please Enter Valid Email Address");
            else if(password == "")
                $('#js-error-block-message').text("Please Enter Password");
            else if(pPassword == "")
                $('#js-error-block-message').text("Please Enter Parent Password");
            
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
</script>


<div class="main_container_general">
    <div class="main_heading_general">
        <label>Admin Portal</label>
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
                        <li><a class="current" href="#">Student</a></li>
                        <li><a href="<?php echo base_url();?>admin/teacher">Teacher</a></li>
                        <li><a href="<?php echo base_url();?>admin/passwordRequests">Requests</a></li>
                        <!--<li class="separator"></li>-->
                        <li><a href="<?php echo base_url();?>login/logout">Logout</a></li>
                    </ul>
                </div>
            </div>
	</div>
        
        <div class="top_tabs_general">
            <div class="top_tabs_element_default" onclick="return AddStudent();" id="add_student_class">
                <div class="top_tabs_inside_default" id="add_student_inside_class">
                    <label>Add Student</label>
                </div>
            </div>
            <div class="top_tabs_element" onclick="return EditStudent();" id="edit_student_class">
                <div class="top_tabs_inside" id="edit_student_inside_class">
                    <label>Edit Student</label>
                </div>
            </div>
            <div class="top_tabs_element" onclick="return DeleteStudent();" id="delete_student_class">
                <div class="top_tabs_inside" id="delete_student_inside_class">
                    <label>Delete Student</label>
                </div>
            </div>
        </div>
        
        <div class="error-div-failure" id="js-error-block">
            <div class="failure" id="js-error-block-message"></div>
        </div>
        
        <?php if(!$this->session->userdata('errorFlag') && $this->session->userdata('errorMessage'))
            {?>
        <div class="error-div-failure">
            <div class="failure"> 
                <?php echo $this->session->userdata('errorMessage');?> 
                <script>
                    setTimeout(function(){
                        $('.failure').fadeTo("slow",1.0);
                    }, 500);

                    setTimeout(function(){
                        $('.failure').fadeOut("slow");
                        $('.error-div-failure').hide();
                    }, 3000);
                </script>
            </div>
        </div>
        <?php }else if($this->session->userdata('errorFlag') && $this->session->userdata('errorMessage')){?>
        <div class="error-div-success">
            <div class="success"> 
                <?php echo $this->session->userdata('errorMessage');?> 
                <script>
                    setTimeout(function(){
                        $('.success').fadeTo("slow",1.0);
                    }, 500);

                    setTimeout(function(){
                        $('.success').fadeOut("slow");
                        $('.error-div-success').hide();
                    }, 3000);
                </script>
            </div>
        </div>
        <?php }?>
        
        <div class="mid_forms_general">
            <div class="mid_forms_body">
                <div id="add_student">
                    <div class="forms_heading">
                        <label>Add Student</label>
                    </div>
                </div>
                <div id="edit_student">
                    <div class="forms_heading">
                        <label>Edit Student</label>
                    </div>
                </div>
                <div id="delete_student">
                    <div class="forms_heading">
                        <label>Delete Student</label>
                    </div>
                </div>
                
                <div class="search_general" id="general_edit">
                    <div class="scroll_content mCustomScrollbar">
                        <?php  if(isset($students)){ ?>
                        <div class="CSSTableGenerator">
                            <table id="students_list">
                                <tr>
                                    <td>Name</td>
                                    <td>Username</td>
                                    <td>Update</td>
                                </tr>
                                <?php for($i = 0; $i < count($students); $i++ ) {?>
                                    <tr>
                                        <td><?php echo $students[$i][1]." ".$students[$i][2]; ?></td>
                                        <td><?php echo $students[$i][3]; ?></td>
                                        <td><a onclick="editSpecificStudent('<?php echo $students[$i][0]; ?>', '<?php echo $students[$i][1]; ?>', '<?php echo $students[$i][2]; ?>', '<?php echo $students[$i][3]; ?>', '<?php echo $students[$i][4]; ?>', '<?php echo $students[$i][5]; ?>', '<?php echo $students[$i][6]; ?>', '<?php echo $students[$i][7]; ?>', '<?php echo $students[$i][8]; ?>');" class="edit_link">Edit</a></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                        <?php } else { ?>
                            <div class="password-note">
                                <label>No Students</label>
                            </div>
                            <?php }   ?>
                    </div>
                </div>
                
                <div class="search_general" id="general_delete">
                    <div class="scroll_content mCustomScrollbar">
                        <?php  if(isset($students)){ ?>
                        <div class="CSSTableGenerator">
                            <table id="students_list">
                                <tr>
                                    <td>Name</td>
                                    <td>Username</td>
                                    <td>Delete</td>
                                </tr>
                                <?php  for($i = 0; $i < count($students); $i++ ) {?>
                                    <tr>
                                        <td><?php echo $students[$i][1]." ".$students[$i][2]; ?></td>
                                        <td><?php echo $students[$i][3]; ?></td>
                                        <td><a href="<?php print base_url(); ?>admin/deleteStudent?person_id=<?php echo $students[$i][0]; ?>" class="edit_link">Delete</a></td>
                                    </tr>
                                <?php }  ?>
                            </table>
                        </div>
                        <?php } else { ?>
                            <div class="password-note">
                                <label>No Students</label>
                            </div>
                            <?php }   ?>
                    </div>
                </div>
                
                <div id="main_form">
                    <form type="submit" method="POST" action="<?php echo base_url()?>admin/addStudent" onsubmit="return validateStudent();">
                        <table>
                            <tr>
                                <td  class="inputField" >School:</td>
                                <td class="input">
                                    <div class="fieldgroup">
                                        <select name="school" id="school">
                                            <?php for($i = 0; $i < $schoolCount; $i++){?>
                                            <option value="<?php echo $schools[$i];?>"><?php echo $schools[$i];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td  class="inputField" >First Name:</td>
                                <td class="input">
                                      <div class="fieldgroup">
                                        <input type="text" name="firstName" value="" id="firstName" maxlength="20" placeholder="Enter First Name">
                                      </div>
                                </td>
                            </tr>
                            <tr>
                                <td  class="inputField" >Last Name:</td>
                                <td class="input">
                                      <div class="fieldgroup">
                                        <input type="text" name="lastName" value="" id="lastName" maxlength="40" placeholder="Enter Last Name">
                                      </div>
                                </td>
                            </tr>
                            <tr>
                                <td  class="inputField" >Home Address:</td>
                                <td class="input">
                                      <div class="fieldgroup">
                                        <input type="text" name="HomeAddress" id="HomeAddress" maxlength="128" placeholder="Enter Home Address">
                                      </div>
                                </td>
                            </tr>
                            <tr>
                                <td  class="inputField" >Email Address:</td>
                                <td class="input">
                                      <div class="fieldgroup">
                                        <input type="email" name="email" id="email" maxlength="128" placeholder="Enter Email Address">
                                      </div>
                                </td>
                            </tr>
                            <tr>
                                <td  class="inputField" >Username:</td>
                                <td class="input">
                                      <div class="fieldgroup">
                                        <input type="text" name="username" id="username" maxlength="120" placeholder="Enter Username">
                                      </div>
                                </td>
                            </tr>
                            <tr>
                                <td  class="inputField" >Password:</td>
                                <td class="input">
                                      <div class="fieldgroup">
                                        <input type="password" name="password" id="password" maxlength="128" placeholder="Enter Password">
                                      </div>
                                </td>
                            </tr>
                            <tr>
                                <td  class="inputField" >Parent Password:</td>
                                <td class="input">
                                      <div class="fieldgroup">
                                        <input type="password" name="Parentpassword" id="Parentpassword" maxlength="128" placeholder="Enter Parent Password">
                                      </div>
                                </td>
                            </tr>
                            <tr>
                                <td  class="inputField" ></td>
                                <td class="input">
                                      <div class="fieldgroup">
                                        <input type="submit" value='Submit'><br/><br/>
                                      </div>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                
                <div id="edit_main_form">
                    <form type="submit" method="POST" action="<?php echo base_url()?>admin/editStudent" onsubmit="return validateEditStudent();">
                        <table>
                            <tr>
                                <td  class="inputField" >School:</td>
                                <td class="input">
                                    <div class="fieldgroup">
                                        <select name="school" id="edit_school">
                                            <?php for($i = 0; $i < $schoolCount; $i++){?>
                                            <option value="<?php echo $schools[$i];?>"><?php echo $schools[$i];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td  class="inputField" >First Name:</td>
                                <td class="input">
                                      <div class="fieldgroup">
                                        <input type="text" name="firstName" value="" id="edit_firstName" maxlength="20" placeholder="Enter First Name">
                                        <input type="hidden" name="person_id" value="" id="person_id">
                                      </div>
                                </td>
                            </tr>
                            <tr>
                                <td  class="inputField" >Last Name:</td>
                                <td class="input">
                                      <div class="fieldgroup">
                                        <input type="text" name="lastName" value="" id="edit_lastName" maxlength="40" placeholder="Enter Last Name">
                                      </div>
                                </td>
                            </tr>
                            <tr>
                                <td  class="inputField" >Home Address:</td>
                                <td class="input">
                                      <div class="fieldgroup">
                                        <input type="text" name="HomeAddress" id="edit_HomeAddress" maxlength="128" placeholder="Enter Home Address">
                                      </div>
                                </td>
                            </tr>
                            <tr>
                                <td  class="inputField" >Email Address:</td>
                                <td class="input">
                                      <div class="fieldgroup">
                                        <input type="email" name="email" id="edit_email" maxlength="128" placeholder="Enter Email Address">
                                      </div>
                                </td>
                            </tr>
                            <tr>
                                <td  class="inputField" >Username:</td>
                                <td class="input">
                                      <div class="fieldgroup">
                                        <input type="text" name="username" id="edit_username" maxlength="120" placeholder="Enter Username">
                                      </div>
                                </td>
                            </tr>
                            <tr>
                                <td  class="inputField" >Password:</td>
                                <td class="input">
                                      <div class="fieldgroup">
                                        <input type="password" name="password" id="edit_password" maxlength="128" placeholder="Enter Password">
                                      </div>
                                </td>
                            </tr>
                            <tr>
                                <td  class="inputField" >Parent Password:</td>
                                <td class="input">
                                      <div class="fieldgroup">
                                        <input type="password" name="Parentpassword" id="edit_Parentpassword" maxlength="128" placeholder="Enter Parent Password">
                                      </div>
                                </td>
                            </tr>
                            <tr>
                                <td  class="inputField" ></td>
                                <td class="input">
                                      <div class="fieldgroup">
                                        <input type="submit" value='Submit'>
                                        <input type="submit" value='Delete' id="delete_button"><br/><br/>
                                      </div>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>    
        </div>
        <br/><br/>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        $("body").click(function(e) {
            if (e.target.id == "right_nav_general" || $(e.target).parents("#right_nav_general").size()) { 

            } 
            else if (e.target.id == "right_nav_general_anim" || $(e.target).parents("#right_nav_general_anim").size())
            {}
            else { 
                $('#right_nav_general_anim').show();
                $('#right_nav_general').hide();
            }
        });
    })
    $(document).ready(function() {
        $('#right_nav_general_anim').click(function(){
            $('#right_nav_general_anim').hide();
            $('#right_nav_general').show();
        }); 
    });   
    
    function AddStudent()
    {
        $("#add_student_class").addClass("top_tabs_element_default").removeClass("top_tabs_element");
        $("#add_student_inside_class").addClass("top_tabs_inside_default").removeClass("top_tabs_inside");
        $("#delete_student_class").addClass("top_tabs_element").removeClass('top_tabs_element_default');
        $("#delete_student_inside_class").addClass("top_tabs_inside").removeClass('top_tabs_inside_default');
        $("#edit_student_class").addClass("top_tabs_element").removeClass('top_tabs_element_default');
        $("#edit_student_inside_class").addClass("top_tabs_inside").removeClass('top_tabs_inside_default');
        $("#delete_student").hide();
        $("#edit_student").hide();
        $("#add_student").show();
        $("#main_form").show();
        $("#general_edit").hide();
        $("#edit_main_form").hide();
        $("#general_delete").hide();
    }

    function EditStudent()
    {
        $("#edit_student_class").addClass("top_tabs_element_default").removeClass("top_tabs_element");
        $("#edit_student_inside_class").addClass("top_tabs_inside_default").removeClass("top_tabs_inside");
        $("#delete_student_class").addClass("top_tabs_element").removeClass('top_tabs_element_default');
        $("#delete_student_inside_class").addClass("top_tabs_inside").removeClass('top_tabs_inside_default');
        $("#add_student_class").addClass("top_tabs_element").removeClass('top_tabs_element_default');
        $("#add_student_inside_class").addClass("top_tabs_inside").removeClass('top_tabs_inside_default');
        $("#add_student").hide();
        $("#delete_student").hide();
        $("#edit_student").show();        
        $("#main_form").hide();
        $("#general_edit").show();
        $("#edit_main_form").hide();
        $("#general_delete").hide();
    }

    function DeleteStudent()
    {
        $("#delete_student_class").addClass("top_tabs_element_default").removeClass("top_tabs_element");
        $("#delete_student_inside_class").addClass("top_tabs_inside_default").removeClass("top_tabs_inside");
        $("#edit_student_class").addClass("top_tabs_element").removeClass('top_tabs_element_default');
        $("#edit_student_inside_class").addClass("top_tabs_inside").removeClass('top_tabs_inside_default');
        $("#add_student_class").addClass("top_tabs_element").removeClass('top_tabs_element_default');
        $("#add_student_inside_class").addClass("top_tabs_inside").removeClass('top_tabs_inside_default');
        $("#add_student").hide();
        $("#edit_student").hide();
        $("#delete_student").show();
        $("#main_form").hide();
        $("#general_edit").hide();
        $("#edit_main_form").hide();
        $("#general_delete").show();
    }
</script>

<script src='<?php echo base_url();?>assets/js/jquery_nav.min.js'></script>
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
