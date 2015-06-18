
<link href="<?php echo base_url();?>assets/css/normalize.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/css/nav_menu.css" rel="stylesheet" type="text/css">
<script>
    function validatePassword()
    {
        var password = document.getElementById('password').value;
        if(password == "")
        {
            $('#js-error-block-message').text("Please Enter Password");
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
                        <li><a  href="<?php echo base_url();?>admin/student">Student</a></li>
                        <li><a href="<?php echo base_url();?>admin/teacher">Teacher</a></li>
                        <li><a class="current" href="#">Requests</a></li>
                        <!--<li class="separator"></li>-->
                        <li><a href="<?php echo base_url();?>login/logout">Logout</a></li>
                    </ul>
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
        
        <div class='password_request_container'>
            <div class='password_request_body'>
                <div class='password_request_heading'>
                    <label>Password Requests</label>
                </div>
                <?php if($result_count == 0){?>
                    <div class="password-note">
                        <label>No Requests</label>
                    </div>
                <?php } ?>
                <div class="scroll_content mCustomScrollbar">
                    <div class='password_request_row_container'>
                        <?php for($i= $result_count-1; $i >= 0; $i--){?>
                        <div class='password_request_row'>
                            <div class="password_request_date"><label><?php echo date('d-m-Y',strtotime($result['date'.$i])); ?></label></div>
                            <div class="password_request_note"><label><span style="color: #6FB89F;"><?php echo $result['username'.$i]; ?>:</span> Please update my password</label></div>
                            <form method="post" action="<?php echo base_url(); ?>admin/updatePassword" onsubmit="return validatePassword();">
                                <div class="password_request_input">
                                    <span>
                                        New Password: 
                                        <input type="password" name="password" placeholder="Enter New Password" id="password"/>
                                        <input type="hidden" name="username" value="<?php echo $result['username'.$i]; ?>"/>
                                    </span>
                                </div>
                                <div class="password_request_buttons">
                                    <input type="submit" value="Change Password"/>
                                    <br/>
                                    <a href="<?php echo base_url();?>admin/deleteRequest?requestID=<?php echo $result['request_id'.$i]; ?>" style="text-decoration: none;"><input type="button" value="Delete Request"/></a>
                                </div>
                            </form>
                        </div>
                        <?php }?>
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

>>>>>>> master
</script>