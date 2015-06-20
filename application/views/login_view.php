<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css" type="text/css" media="screen">
    <link rel="icon" href="<?php echo base_url(); ?>/assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/login.css" type="text/css">
    <script src="<?php echo base_url();?>/assets/js/jquery.min.js"></script>
</head>
<body>

<div id="login"  >

  <h1 >G-Learning</h1>
  <div class="error-div-failure" id="js-error-block" >
    <div class="failure" id="js-error-block-message" ></div>
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
  <form method="post" action="<?php echo base_url();?>login/checkLogin" onsubmit="return validateLogin();">
     <label for="username"> Username:</label>
      <input name="username" id="username"  type="text" placeholder="Username" />
      <label for="password"> Password:</label>
    <input name="password" id="password" type="password" placeholder="Password" />
        <div class="form-group ">
        <label for="type"> Type:</label>
        <select class="form-control" id="type" name="type">
          <option value="student">Student</option>
          <option value="parent">Parent</option>
          <option value="teacher">Teacher</option>
          <option value="admin">Admin</option>
        </select>
        </div>
    <input type="submit" value="Log in" class=""/>
    </form>

</div>

</body>



    <script>
            
        function validateLogin()
    {
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;
        if ( password == "" && username == "")
        {
            $('#js-error-block-message').text("Please Enter Username & Password");
                        $('#js-error-block').show();
            return false;
        }
        if( password == "" || username == "")
        {
    
            if(username == "")
                $('#js-error-block-message').text("Username is required");
            else if(password == "")
                $('#js-error-block-message').text("Password is required");

            $('#js-error-block').show();
            
    
            return false;
        }
        
    
        return true;
    }
     </script>