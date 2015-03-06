<link href="<?php echo base_url();?>assets/css/normalize.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/css/nav_menu.css" rel="stylesheet" type="text/css">
<script>
    $(document).ready(function(){
        var GlobalPersonID = "";
        
        $('#delete_button').on('click', function(e){
           var baseurl = "<?php print base_url(); ?>";
            $.ajax({
                url:  baseurl +"admin/deleteStudent",
                type:'POST',
                cache:false,
                dataType: 'html',
                data: { personID : GlobalPersonID },
                success:function(data){
                    if(data === "success")
                    {
                        $('#edit_main_form').hide();
                        $('#js-error-block-message').text("Student has been Deleted");
                        $('#js-error-block').show();
                        setTimeout(function(){
                            $('#js-error-block').fadeTo("slow",1.0);
                        }, 500);

//                        setTimeout(function(){
//                            $('#js-error-block').fadeTo("slow",0.0);
//                            $('#js-error-block').hide();
//                        }, 3500);
                    }
                    else
                    {
                        $('#edit_main_form').hide();
                        $('#js-error-block-message').text("Student Not Deleted. Some Error occured..!");
                        $('#js-error-block').show();
                        setTimeout(function(){
                            $('#js-error-block').fadeTo("slow",1.0);
                        }, 500);

//                        setTimeout(function(){
//                            $('#js-error-block').fadeTo("slow",0.0);
//                            $('#js-error-block').hide();
//                        }, 3500);
                    }
                },
                error:function(x,e){
                }
            }); 
            e.preventDefault();
        });
        
        $('#searchStudentForm').on('submit',function(e) {
        var query = document.getElementById('Searchusername').value;
        if(query == "")
        {
            $('#js-error-block-message').text("Please Enter Username");
            $('#js-error-block').show();
            setTimeout(function(){
                $('#js-error-block').fadeTo("slow",1.0);
            }, 500);

//            setTimeout(function(){
//                $('#js-error-block').fadeTo("slow",0.0);
//                $('#js-error-block').hide();
//            }, 4500);
        }
        else
        {
            var baseurl = "<?php print base_url(); ?>";
            $.ajax({
                url:  baseurl +"admin/searchStudent",
                type:'POST',
                cache:false,
                dataType: 'json',
                data: { query : query },
                success:function(data){
                    if(data.response === "success")
                    {
                        $('#edit_main_form').show();
                        $('#delete_button').show();
                        $('#edit_school').val(data.school_name);
                        $('#edit_firstName').val(data.first_name);
                        $('#edit_lastName').val(data.last_name);
                        $('#edit_HomeAddress').val(data.address);
                        
                        $('#edit_email').val(data.email);
                        $('#edit_email').prop('readonly', true);
                        $('#edit_email').css("background","white");
                        
                        $('#edit_username').val(data.username);
                        $('#edit_username').prop('readonly', true);
                        $('#edit_username').css("background","white");
                        
                        $('#edit_password').val(data.password);
                        $('#edit_Parentpassword').val(data.parent_password);
                        $('#person_id').val(data.person_id);
                        GlobalPersonID = data.person_id;
                    }
                    else
                    {
                        $('#edit_main_form').hide();
                        $('#js-error-block-message').text("Username Not Found");
                        $('#js-error-block').show();
                        setTimeout(function(){
                            $('#js-error-block').fadeTo("slow",1.0);
                        }, 500);

                        setTimeout(function(){
                            $('#js-error-block').fadeTo("slow",0.0);
                            $('#js-error-block').hide();
                        }, 2500);
                    }
                },
                error:function(x,e){
                }
            });
        }
        e.preventDefault(); //=== To Avoid Page Refresh and Fire the Event "Click"===
        });
    });
    
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
            <div class="navigation" id="navigation">
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
                
                <div class="search_general" id="search_general_edit">
                    <form id ="searchStudentForm" type="submit">
                        <table>
                            <tr>
                                <td  class="inputField" >Username:</td>
                                <td class="input">
                                      <div class="fieldgroup">
                                        <input type="text" name="Searchusername" value="" id="Searchusername" maxlength="20" placeholder="Enter Username">
                                      </div>
                                </td>
                            </tr>
                            <tr>
                                <td  class="inputField" ></td>
                                <td class="input">
                                      <div class="fieldgroup">
                                          <input type="submit" value='Search Student'><br/><br/>
                                      </div>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                
                <div id="main_form">
                    <form type="submit" method="POST" action="<?php echo base_url()?>admin/addStudent" onsubmit="return validateStudent();">
                        <table>
                            <tr>
                                <td  class="inputField" >School:</td>
                                <td class="input">
                                    <div class="fieldgroup">
                                        <select name="school" id="school">
                                            <option value="Educators">Educators</option>
                                            <option value="BeaconHouse">BeaconHouse</option>
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
                                            <option value="Educators">Educators</option>
                                            <option value="BeaconHouse">BeaconHouse</option>
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
        $("#search_general_edit").hide();
        $("#edit_main_form").hide();
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
        $("#search_general_edit").show();
        $("#edit_main_form").hide();
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
        $("#search_general_edit").show();
        $("#edit_main_form").hide();
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