<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $page_title; ?></title>
    <meta charset="utf-8">
    <link rel="icon" href="http://glearning-test.azurewebsites.net//assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="http://glearning-test.azurewebsites.net//assets/css/bootstrap.css" type="text/css" media="screen">
    <link rel="stylesheet" href="http://glearning-test.azurewebsites.net//assets/css/bootstrap3.css" type="text/css" media="screen">
    <link rel="stylesheet" href="http://glearning-test.azurewebsites.net//assets/css/bootstrap3-theme.css" type="text/css" media="screen">
    <link rel="stylesheet" href="http://glearning-test.azurewebsites.net//assets/css/bootstrap-theme.min.css" type="text/css" media="screen">
    <link rel="stylesheet" href="http://glearning-test.azurewebsites.net//assets/css/student_dashboard.css" type="text/css" media="screen">
    <link rel="stylesheet" href="http://glearning-test.azurewebsites.net//assets/css/responsive.css" type="text/css" media="screen">
    <link rel="stylesheet" type="text/css" media="screen" href="http://glearning-test.azurewebsites.net//assets/css/grid_12.css">
    <link rel="stylesheet" type="text/css" media="screen" href="http://glearning-test.azurewebsites.net//assets/css/jquery-ui.css">
    <!--<link rel="stylesheet" href="http://glearning-test.azurewebsites.net//assets/css/jquery-qtip.css" type="text/css" media="screen">-->
     <!--<link rel="stylesheet" href="http://glearning-test.azurewebsites.net//assets/css/onepage-scroll.css" type="text/css" media="screen">-->
    <link rel="stylesheet" href="http://glearning-test.azurewebsites.net//assets/css/home.css" type="text/css" media="screen">
    <link rel="stylesheet" href="http://glearning-test.azurewebsites.net//assets/css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="http://glearning-test.azurewebsites.net//assets/css/jquery.mCustomScrollbar.css" type="text/css" media="screen">
    
    <script src="http://glearning-test.azurewebsites.net//assets/js/Chart.js"></script>
    
    <script src="http://glearning-test.azurewebsites.net//assets/js/modernizr.2.5.3.min.js"></script>
    <script>window.jQuery || document.write('<script src="http://glearning-test.azurewebsites.net//assets/js/jquery-1.11.0.min.js"><\/script>');</script>
    <script src="http://glearning-test.azurewebsites.net//assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    
    <script src="http://glearning-test.azurewebsites.net//assets/js/jquery.min.js"></script>
    <script src="http://glearning-test.azurewebsites.net//assets/js/jquery-ui.js"></script>
    <script src="http://glearning-test.azurewebsites.net//assets/js/bootstrap.js"></script>
    <script src="http://glearning-test.azurewebsites.net//assets/js/bootstrap3.js"></script>
    <script src="http://glearning-test.azurewebsites.net//assets/js/jquery-2.0.3.js"></script>
    <!-- <script src="http://glearning-test.azurewebsites.net//assets/js/npm.js"></script>-->
    
    <!--<script src="http://glearning-test.azurewebsites.net//assets/js/jquery-qtip.js"></script>-->    
    <!--<script src="http://glearning-test.azurewebsites.net//assets/js/jquery.onepage-scroll.js"></script>-->
    <script>   
  function handle(delta) {
                    if (delta != 0)
                    {
                    
                    }
                    
            }
            /** Event handler for mouse wheel event.
             */
            function wheel(event){
                    var delta = 0;
                    if (!event) /* For IE. */
                            event = window.event;
                    if (event.wheelDelta) { /* IE/Opera. */
                            delta = event.wheelDelta/120;
                    } else if (event.detail) { /** Mozilla case. */
                            /** In Mozilla, sign of delta is different than in IE.
                             * Also, delta is multiple of 3.
                             */
                            delta = -event.detail/3;
                    }
                    /** If delta is nonzero, handle it.
                     * Basically, delta is now positive if wheel was scrolled up,
                     * and negative, if wheel was scrolled down.
                     */
                    if (delta)
                            handle(delta);
                    /** Prevent default actions caused by mouse wheel.
                     * That might be ugly, but we handle scrolls somehow
                     * anyway, so don't bother here..
                     */
                    if (event.preventDefault)
                            event.preventDefault();
                    event.returnValue = false;
            }

            /** Initialization code. 
             * If you use your own event management code, change it as required.
             */
        $(document).ready(function() { 
                            

           // $("body").css("overflow", "hidden");
//            var s = 1;
//             var result = setInterval(function(){
//                 s++;
//                 if (s < 9)
//                 {
//                 $('#tooltip_navbar_container').fadeToggle(); }
//    }, 1500); 
                
             


//            if (window.addEventListener)
//                  /** DOMMouseScroll is for mozilla. */
//                  window.addEventListener('DOMMouseScroll', wheel, false);
//          /** IE/Opera. */
//            window.onmousewheel = document.onmousewheel = wheel;
            $('a[href^="#"]').on('click',function (e) {
        	    e.preventDefault();

                var target = this.hash;
                $target = $(target);

                $('body').stop().animate({
    	        'scrollTop': $target.offset().top
                }, 700, 'swing', function () {
               
	        window.location.hash = target;
	    });
             
                });  	
            $(".pink_icon_nav").hover(
                function(){
                    $(".pink_icon_img").slideUp();

                       $("#pink_icon_desc").slideDown();
                },
                function(){
                     $(".pink_icon_img").slideDown();
                       $("#pink_icon_desc").slideUp();
                }
            );     
           $(".blue_icon_nav").hover(
                function(){
                    $(".blue_icon_img").slideUp();
                       $("#blue_icon_desc").slideDown();
                },
                function(){
                     $(".blue_icon_img").slideDown();
                       $("#blue_icon_desc").slideUp();
                }
            );     

            $(".grey_icon_nav").hover(
                        function(){
                            $(".grey_icon_img").slideUp();
                               $("#grey_icon_desc").slideDown();
                        },
                        function(){
                             $(".grey_icon_img").slideDown();
                               $("#grey_icon_desc").slideUp();
                        }
                    );     

            $(".green_icon_nav").hover(
                        function(){
                            $(".green_icon_img").slideUp();
                               $("#green_icon_desc").slideDown();
                        },
                        function(){
                             $(".green_icon_img").slideDown();
                               $("#green_icon_desc").slideUp();
                        }
                    );                                                             
            $(window).scroll(function() {
                $('#main-header').delay(1000).css('top', $(this).scrollTop() + "px");
                });
            });
           
    </script>
</head>
<body>
    <header class="main-header">
            <span class="logo_span left">
                <img class="logo" src ="http://glearning-test.azurewebsites.net//assets/images/G-Learn.png" width="220" />
            </span>
            
           <div class="pull-right">
               
                <div id="myContainerRight">
                        <a href='#contactus'>  
                            <div class="green_icon_nav">
                                <div class="navbar-images-container green_icon_img">
                                    <img class="navbar-images" src="http://glearning-test.azurewebsites.net//assets/images/docs_nav.png"/>
                                </div>
                                 <div id="green_icon_desc" class="navbar_img_desc"> CONTACT US</div>
                            </div>
                        </a>
                          <a href='#team-info'> 
                              <div class="grey_icon_nav">
                                    <div class="navbar-images-container grey_icon_img">
                                        <img class="navbar-images" src="http://glearning-test.azurewebsites.net//assets/images/23.png"/>
                                    </div>
                                    <div id="grey_icon_desc" class="navbar_img_desc"> OUR TEAM</div>
                            </div>
                          </a>
                        <a href='#features'>
                            <div class="blue_icon_nav">
                                <div class="navbar-images-container blue_icon_img">
                                    <img class="navbar-images" src="http://glearning-test.azurewebsites.net//assets/images/features_nav.png"/>
                                </div>
                             <div id="blue_icon_desc" class="navbar_img_desc"> FEATURES</div>
                            </div>
                        </a>
                        <a href='#intro'>
                            <div class="pink_icon_nav">
                                <div class="navbar-images-container pink_icon_img">
                                    <img class="navbar-images" src="http://glearning-test.azurewebsites.net//assets/images/questionmark_nav.png"/>
                                </div>  
                                <div id="pink_icon_desc" class="navbar_img_desc"> WHAT <Br/> IS <br/> G-LEARNING </div>
                            </div>
                        </a>
                        
                      
                     </div> 
            </div>
</header>

