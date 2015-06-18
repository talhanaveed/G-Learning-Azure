
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>/assets/css/jquery-ui.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>/assets/css/demo.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>/assets/css/osx.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>/assets/css/alertify.core.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>/assets/css/alertify.default.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>/assets/css/rank_scroll.css">

<script src="<?php echo base_url(); ?>/assets/js/dw_scroll_c.js"></script>    
<script src="<?php echo base_url(); ?>/assets/js/jquery-1.10.2.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/alertify.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/alertify.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/osx.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/jquery.simplemodal.js"></script>


<script>
    
    $( document ).ready(function() {
     $('html,body').animate({
        scrollTop: $(".mid-content").offset().top},
        'slow');
    });
    function init_dw_Scroll() {
        // arguments: id of scroll area div, id of content div
        var wndo1 = new dw_scrollObj('wn1', 'lyr1');
        wndo1.buildScrollControls('scrollLinks1', 'h');

        var wndo2 = new dw_scrollObj('wn2', 'lyr2');
        wndo2.buildScrollControls('scrollLinks2', 'h');

        var wndo3 = new dw_scrollObj('wn3', 'lyr3');
        wndo3.buildScrollControls('scrollLinks3', 'h');

        var wndo4 = new dw_scrollObj('wn4', 'lyr4');
        wndo4.buildScrollControls('scrollLinks4', 'h');

        var wndo5 = new dw_scrollObj('wn5', 'lyr5');
        wndo5.buildScrollControls('scrollLinks5', 'h');

        var wndo6 = new dw_scrollObj('wn6', 'lyr6');
        wndo6.buildScrollControls('scrollLinks6', 'h');
    }

    // if code supported, link in the style sheet (optional) and call the init function onload
    if ( dw_scrollObj.isSupported() ) {
        dw_Util.writeStyleSheet('<?php echo base_url(); ?>/assets/css/scroll_h.css');
        dw_Event.add( window, 'load', init_dw_Scroll);
    }
    
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
</script>

<script type="text/javascript">
    function drawCircle(selector, center, radius, angle, x, y) {
      var total = $(selector).length;
      var alpha = Math.PI * 2 / total;
      angle *= Math.PI / 180;
           
      $(selector).each(function(index) {
        var theta = alpha * index;
        var pointx  =  Math.floor(Math.cos( theta + angle) * radius);
        var pointy  = Math.floor(Math.sin( theta + angle) * radius );
	
        $(this).css('margin-left', pointx + x + 'px');
        $(this).css('margin-top', pointy + y + 'px');
    });
   }
   
   function showDialog()
   {
        $( "#dialog-confirm" ).dialog({
        resizable: false,
        height:140,
        modal: true,
        buttons: {
          "Start Test": function() {
            window.location.href = "<?php echo base_url();?>"+"home/intitial_test";
          },
          Cancel: function() {
            $( this ).dialog( "close" );
          }
        }
      });
   }
   
   function checkLevel()
   {
       var baseurl = "<?php print base_url(); ?>";
        $.ajax({
            url:  baseurl +"DataEntry/checkLevel",
            type:'POST',
            cache:false,
            dataType: 'html',
            data: {},
            success:function(data){
                if(data == 0)
                    showDialog();
                else
                    window.location.href = "<?php echo base_url();?>"+"drills";
            },
            error:function(x,e){
            }
        }); 
   }
   
  $(document).ready(function() {
    var angle = 90;
    drawCircle('.box', 50, 195, angle, 310, 220);
    setInterval(function(){
        angle = angle + 0.07;
     drawCircle('.box', 50, 195, angle, 310, 220);
    },0.1);
//    $("#movebtn").on('click', function() {
//      angle = angle + 2;
//      drawCircle('.box', 50, 200, angle, 310, 220);
//    });

  });  
</script>

<div id="dialog-confirm" title="Get Started..." style='height: 50px !important; display: none;'>
  <p>Since it's your first time, You must give Initial Test.</p>
</div>

<div class="student_dashboard_body">
    <div class="mid-content" id="mid-content">
        <div class="student_top_menu">
            <div class="student_menu_tabs">
                <div class="student_menu_tab">
                    <a onclick="ChangePassword();" href="#">
                        <div class="student_menu_tab_body">
                            <img src="<?php echo base_url();?>assets/images/galley.png"/>
                            <label>Change Password</label>
                        </div>
                    </a>
                </div>
                <div class="student_menu_tab">
                    <a href="#ranks">
                        <div class="student_menu_tab_body">
                            <img src="<?php echo base_url();?>assets/images/galley.png" onclick="getStudentDrillLevel();"/>
                            <label>Ranks</label>
                        </div>  
                    </a>
                </div>
                <div class="student_menu_tab">
                     <a href="#video_text">
                        <div class="student_menu_tab_body">
                            <img src="<?php echo base_url();?>assets/images/video.png"/>
                            <label>Videos</label>
                        </div>
                    </a>
                </div>
                <div class="student_menu_tab">
                    <a href="<?php echo base_url();?>login/logout">
                        <div class="student_menu_tab_body">
                            <img src="<?php echo base_url();?>assets/images/games.png"/>
                            <label>Logout</label>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="mid_images_container">
            <div class="student_mid_image">
                <br/><br/>
                <img src="<?php echo base_url();?>assets/images/doggy.png"/>
            </div>
             
            <a href="#" id="playButton" onclick="checkLevel();">
                <div class="welcome_cloud">
                    <img src="<?php echo base_url();?>assets/images/cloud2.png"/>
                
                </div>
            </a>
        </div>
        <br/><br/>
         <div class="student_top_quote" id="video_text" >
           <div class="drill_text-2" >
                Explore the magical world of G-Learning - An introductory walkthrough 
             </div>
        </div>
        <br/><br/>
        
        <div class="student_dashboard_video" id="video">            
            <video width="640" height="360" controls>
                <source src="<?php echo base_url();?>/assets/videos/play.mp4" type="video/mp4">
                <source src="movie.ogg" type="video/ogg">
                    Your browser does not support the video tag.
            </video>
        </div>
        <div class="student_top_quote" id="ranks">
            <div class = "drill_text-2">Our Student Rankings</div>
        </div>
        <div class="rankings_container">
            <div class="ranking_pic_body">
                <img src="<?php echo base_url();?>assets/images/ranking_bg.jpg" class="ranking_background ranking_pic" usemap="#image"/>
                <map name="image">
                    <area shape="rect" coords="191, 591, 291, 311" title="Addition Drill" />
                    <area shape="rect" coords="291, 591, 391, 311" title="Subtraction Drill" />
                    <area shape="rect" coords="391, 591, 491, 311" title="Multiples of a Number" />
                </map>

                <div id="student_pics">
                    <!-- DRILL 1 STUDENTS-->
                    <div id="wn1"> <!-- scroll area div -->
                        <div id="lyr1"> <!-- layer in scroll area (content div) -->
                            <ul id="horiz1">
                                <?php for($i = 0; $i < count($students); $i++ ){ if($students[$i][1] == 1){?>
                                    <li><img src="<?php echo base_url();?>assets/images/<?php echo $students[$i][0]?>" width="32" height="41"/></li>
                                <?php }}?>
                            </ul>
                        </div> <!-- end content div (lyr1) -->
                    </div>  <!-- end wn div -->
                    <div id="scrollLinks1"></div> <!-- code adds divs for left/right images -->

                    <!-- DRILL 2 STUDENTS-->
                    <div id="wn2"> <!-- scroll area div -->
                        <div id="lyr2"> <!-- layer in scroll area (content div) -->
                            <ul id="horiz2">
                                <?php for($i = 0; $i < count($students); $i++ ){ if($students[$i][1] == 2){?>
                                    <li><img src="<?php echo base_url();?>assets/images/<?php echo $students[$i][0]?>" width="32" height="41"/></li>
                                <?php }}?>
                            </ul>
                        </div> <!-- end content div (lyr1) -->
                    </div>  <!-- end wn div -->
                    <div id="scrollLinks2"></div> <!-- code adds divs for left/right images -->
                    
                    <!-- DRILL 3 STUDENTS-->
                    <div id="wn3"> <!-- scroll area div -->
                        <div id="lyr3"> <!-- layer in scroll area (content div) -->
                            <ul id="horiz3">
                                <?php for($i = 0; $i < count($students); $i++ ){ if($students[$i][1] == 3){?>
                                    <li><img src="<?php echo base_url();?>assets/images/<?php echo $students[$i][0]?>" width="32" height="41"/></li>
                                <?php }}?>
                            </ul>
                        </div> <!-- end content div (lyr1) -->
                    </div>  <!-- end wn div -->
                    <div id="scrollLinks3"></div> <!-- code adds divs for left/right images -->
                    
                    <!-- DRILL 4 STUDENTS-->
                    <div id="wn4"> <!-- scroll area div -->
                        <div id="lyr4"> <!-- layer in scroll area (content div) -->
                            <ul id="horiz4">
                                <?php for($i = 0; $i < count($students); $i++ ){ if($students[$i][1] == 4){?>
                                    <li><img src="<?php echo base_url();?>assets/images/<?php echo $students[$i][0]?>" width="32" height="41"/></li>
                                <?php }}?>
                            </ul>
                        </div> <!-- end content div (lyr1) -->
                    </div>  <!-- end wn div -->
                    <div id="scrollLinks4"></div> <!-- code adds divs for left/right images -->
                    
                    <!-- DRILL 5 STUDENTS-->
                    <div id="wn5"> <!-- scroll area div -->
                        <div id="lyr5"> <!-- layer in scroll area (content div) -->
                            <ul id="horiz5">
                                <?php for($i = 0; $i < count($students); $i++ ){ if($students[$i][1] == 5){?>
                                    <li><img src="<?php echo base_url();?>assets/images/<?php echo $students[$i][0]?>" width="32" height="41"/></li>
                                <?php }}?>
                            </ul>
                        </div> <!-- end content div (lyr1) -->
                    </div>  <!-- end wn div -->
                    <div id="scrollLinks5"></div> <!-- code adds divs for left/right images -->
                    
                    <!-- DRILL 6 STUDENTS-->
                    <div id="wn6"> <!-- scroll area div -->
                        <div id="lyr6"> <!-- layer in scroll area (content div) -->
                            <ul id="horiz6">
                                <?php for($i = 0; $i < count($students); $i++ ){ if($students[$i][1] == 6){?>
                                    <li><img src="<?php echo base_url();?>assets/images/<?php echo $students[$i][0]?>" width="32" height="41"/></li>
                                <?php }}?>
                            </ul>
                        </div> <!-- end content div (lyr1) -->
                    </div>  <!-- end wn div -->
                    <div id="scrollLinks6"></div> <!-- code adds divs for left/right images -->
                </div>
            </div>
        </div>
    </div>
</div>
