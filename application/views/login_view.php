<head>

  <meta charset="UTF-8">

  <title>Login</title>
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
  <form method="post" action="<?php echo base_url();?>index.php/login/checkLogin" onsubmit="return validateLogin();">
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

<style> 

*{margin:0;padding:0;}

.bg-login-container
{
/*    
  background: url("../assets/images/login_bg.png") repeat-x;
  
 
  width:100%;
  position: fixed;
  bottom:0;*/
    
  
}
body{
  
  font-family:'Open Sans',sans-serif;
    
    background: url("<?php echo base_url();?>assets/images/login_bg.png") no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  
}

.button{
  width:100px;
  background:#FEF7DA;
  display:block;
  margin:0 auto;
  margin-top:1%;
  padding:10px;
  text-align:center;
  text-decoration:none;
  color:#fff;
  cursor:pointer;
  transition:background .3s;
  -webkit-transition:background .3s;
}

.button:hover{
  background:#F7F7F7;
}

#login{
  width:400px;
  margin:0 auto;
  
  margin-bottom:2%;
  position: relative;
  top:20%;
  transition:opacity 1s;
  -webkit-transition:opacity 1s;
}

#triangle{
  width:0;
  border-top:12x solid transparent;
  border-right:12px solid transparent;
  border-bottom:12px solid #3399cc;
  border-left:12px solid transparent;
  margin:0 auto;
}

#login h1{
  background:#F0F0F0;
  padding: 20px 0;
  font-family:'Open Sans',sans-serif;
  font-size:150%;
  color:#d21c20;
  font-weight:600;
  text-align:center;
  color:#d21c20;
}

form{
  background:#f0f0f0;
  padding:6% 4%;
}

input[type="text"],input[type="password"]{
  width:100%;
  
  margin-bottom:4%;
  border:1px solid #d21c20;;
  padding:4%;
  font-family:'Open Sans',sans-serif;
  font-size:95%;
  color:#d21c20;
}

input[type="submit"]{
  width:100%;
  background:#F0C982;
  border:0;
  padding:4%;
  font-family:'Open Sans',sans-serif;
  font-size:150%;
  color:#d21c20;
  font-weight: 600;
  cursor:pointer;
  transition:background .3s;
  -webkit-transition:background .3s;
}

input[type="submit"]:hover{
  background:#F0E0B4;
  color:#d21c20;;
}
    </style>
    
    
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
                $('#js-error-block-message').text("Please Enter Username");
            else if(password == "")
                $('#js-error-block-message').text("Please Enter Password");
            
            $('#js-error-block').show();
            
    
            return false;
        }
        
    
        return true;
    }
     </script>