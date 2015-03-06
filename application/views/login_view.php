<html>
<head>
    <title>G-Learning | Login</title>
    <link rel="icon" href="<?php echo base_url(); ?>/assets/images/favicon.ico" type="image/x-icon">
     <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/login.css" type="text/css">
     <script src="<?php echo base_url();?>/assets/js/jquery.min.js"></script>
     
     <script>
         $(document).ready(function(){    
          $("body").delay(800).animate({ opacity:'1'
          } , {duration: 1500});
    });
    
    function validateLogin()
    {
        var username = document.getElementById('my-username').value;
        var password = document.getElementById('password').value;
        if(username == "Username" || password == "" || username == "")
        {
            if(username == "Username" || username == "")
                $('#js-error-block-message').text("Please Enter Username");
            else if(password == "")
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
        return true;
    }
     </script>
</head>
<body >
    
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
                    }, 5000);
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
                    }, 5000);
                </script>
            </div>
        </div>
        <?php }?>
    
<div class="login-page-container" id="login-page-container">
    <div class="tool-tip-right-container">
        <div class="tool-tip-right" id="tool-tip-right-container">
            <img src="<?php echo base_url();?>/assets/images/tooltip.png" alt="Superman" />
            <span>Enter the Username.</span>
        </div>
    </div>

    <div class="tool-tip-right-bottom-container" >
        <div class="tool-tip-right-bottom" id="tool-tip-right-bottom-container">
            <img src="<?php echo base_url();?>/assets/images/tooltip-green-r.png" alt="Superman" />
            <span>Enter the Password.</span>
        </div>
    </div>

    <div id="login-box-wrapper">
        <div class="logo"></div>
        <br/><br/><br/>
        <form method="post" action="<?php echo base_url();?>login/checkLogin" onsubmit="return validateLogin();">
            <div class="form-field">
                <div class="field">
                    <input type="text" name="username"  id="my-username" value="Username" onfocus="if (this.value == 'Username') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Username';}" >
                </div>
            </div>
            <div class="form-field">
                <div class="field">
                    <input type="password" name="password"  id="password" placeholder="Password" onfocus="if (this.value == '') {this.placeholder = '';}" onblur="if (this.value == '') {this.placeholder = 'Password';}">
                </div>
            </div>
            <div class="form-field" id="bottom">
                <div class="field">
                    <button type="submit">Sign in</button>
                </div>
            </div>
        </form>
        <div class="tip-button">
            <button id="HowButton">How?</button>
        </div>
        <div class="login-links">
            <p><a href="#">Privacy Policy&nbsp</a> | <a href="#" >User Agreement &nbsp</a> | <a href="#">Contact Us</a></p>    
        </div>
    </div>
</div>

    <script>
        $(function() {
            $("body").click(function(e) {
                if (e.target.id === "login-page-container" || $(e.target).parents("#login-page-container").size()) { 

                } else { 
                    $('.logo').fadeTo( "slow" , 1, function() {});
                    $('#bottom').fadeTo( "slow" , 1, function() {});
                    $('.tip-button').fadeTo( "slow" , 1, function() {});
                    $('.login-links').fadeTo( "slow" , 1, function() {});
                    $('#tool-tip-right-bottom-container').hide();
                    $('#tool-tip-right-container').hide();
                }
            });
        })
        
        $(document).ready(function() {
            $('#HowButton').click(function(){
                $('.logo').fadeTo( "slow" , 0.2, function() {});
                $('#bottom').fadeTo( "slow" , 0.2, function() {});
                $('.tip-button').fadeTo( "slow" , 0.2, function() {});
                $('.login-links').fadeTo( "slow" , 0.2, function() {});
                $('#tool-tip-right-container').show();
                $('#tool-tip-right-bottom-container').show();
            }); 
        });
    </script>
</body>
</html>