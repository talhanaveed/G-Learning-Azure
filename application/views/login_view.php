<html>
<head>
    <title>G-Learning | Login</title>
     <link rel="stylesheet" href="http://glearning-test.azurewebsites.net//assets/css/login.css" type="text/css">
     <script src="http://glearning-test.azurewebsites.net//assets/js/jquery.min.js"></script>
     <script>
         $(document).ready(function(){    
          $("body").delay(800).animate({ opacity:'1'
          } , {duration: 1500});
    });

     </script>
</head>
<body >
<div class="login-page-container" id="login-page-container">
    <div class="tool-tip-right-container">
        <div class="tool-tip-right" id="tool-tip-right-container">
            <img src="http://glearning-test.azurewebsites.net//assets/images/tooltip.png" alt="Superman" />
            <span>Enter the e-mail ID given to you by your teacher.</span>
        </div>
    </div>

    <div class="tool-tip-right-bottom-container" >
        <div class="tool-tip-right-bottom" id="tool-tip-right-bottom-container">
            <img src="http://glearning-test.azurewebsites.net//assets/images/tooltip-green-r.png" alt="Superman" />
            <span>Enter the password given to you by your teacher.</span>
        </div>
    </div>

    <div id="login-box-wrapper">
        <div class="logo"></div>
        <br/><br/><br/>
        <form method="post" action="http://glearning-test.azurewebsites.net/index.php/home/student_dashboard">
            <div class="form-field">
                <div class="field">
                    <input type="email" name="username"  id="username" value="Email" onfocus="if (this.value == 'Email') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Email';}" >
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