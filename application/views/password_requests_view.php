hh    <div class="main_container_general">
    <div class="main_heading_general">
        <label>Admin Portal</label>
    </div>
    
    <div class="mid_content_general">
        <div class="right_nav_general">
            <div id="right_nav_general">
                <a href='http://glearning-test.azurewebsites.net/admin/student'>
                    <div class="nav_element_top nav_element_default">
                        <label>Student</label>
                    </div>
                </a>
                <a href='http://glearning-test.azurewebsites.net/admin/teacher'>
                    <div class="nav_element">
                        <label>Teacher</label>
                    </div>
                </a>
                <a href='#'>
                    <div class="nav_element_bottom">
                        <label>Password Requests</label>
                    </div>
                </a>
            </div>
            <div id="right_nav_general_anim">
                <div class="right_nav_anim">
                    <label>Menu</label>
                </div>
            </div>
        </div>
        
        <div class='password_request_container'>
            <div class='password_request_body'>
                <div class='password_request_heading'>
                    <label>Password Requests</label>
                </div>
                <div class="scroll_content mCustomScrollbar">
                    <div class='password_request_row_container'>
                        <div class='password_request_row'>
                            <div class="password_request_date"><label>28-10-2014</label></div>
                            <div class="password_request_note"><label><span>Username:</span> Please update my password</label></div>
                            <form method="post" action="#">
                                <div class="password_request_input">
                                    <span>New Password: <input type="password" required="true" name="password" placeholder="Enter New Password" /></span>
                                </div>
                                <div class="password_request_buttons">
                                    <input type="submit" value="Change Password"/>
                                    <br/>
                                    <input type="button" value="Delete Request"/>
                                </div>
                            </form>
                        </div>
                        <div class='password_request_row'>
                            <div class="password_request_date"><label>28-10-2014</label></div>
                            <div class="password_request_note"><label><span>Username:</span> Please update my password</label></div>
                            <form method="post" action="#">
                                <div class="password_request_input">
                                    <span>New Password: <input type="password" required="true" name="password" placeholder="Enter New Password" /></span>
                                </div>
                                <div class="password_request_buttons">
                                    <input type="submit" value="Change Password"/>
                                    <br/>
                                    <input type="button" value="Delete Request"/>
                                </div>
                            </form>
                        </div>
                        <div class='password_request_row'>
                            <div class="password_request_date"><label>28-10-2014</label></div>
                            <div class="password_request_note"><label><span>Username:</span> Please update my password</label></div>
                            <form method="post" action="#">
                                <div class="password_request_input">
                                    <span>New Password: <input type="password" required="true" name="password" placeholder="Enter New Password" /></span>
                                </div>
                                <div class="password_request_buttons">
                                    <input type="submit" value="Change Password"/>
                                    <br/>
                                    <input type="button" value="Delete Request"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
</script>