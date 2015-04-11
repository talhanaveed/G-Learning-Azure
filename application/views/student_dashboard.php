<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>/assets/css/jquery-ui.css">
<script src="<?php echo base_url(); ?>/assets/js/jquery-1.10.2.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>/assets/css/alertify.core.css">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>/assets/css/alertify.default.css">
    <script src="<?php echo base_url(); ?>/assets/js/alertify.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/alertify.min.js"></script>
    

<script>
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
                    window.location.href = "<?php echo base_url();?>"+"home/drills";
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
    <div class="mid-content">
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
                            <img src="<?php echo base_url();?>assets/images/galley.png"/>
                            <label>Ranks</label>
                        </div>  
                    </a>
                </div>
                <div class="student_menu_tab">
                    <a href="#video">
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
                    <label>Let's Play Friend</label>
                </div>
            </a>
        </div>
        
        <br/><br/>
        
        <div class="student_top_quote" id="video">
            <label>Explore the magical world of G-Learning - An introductory walkthrough</label>
        </div>
        
        <br/><br/><br/><br/><br/>
        
        <div class="student_dashboard_video" id="video">            
            <video width="640" height="360" controls>
                <source src="<?php echo base_url();?>/assets/videos/play.mp4" type="video/mp4">
                <source src="movie.ogg" type="video/ogg">
                    Your browser does not support the video tag.
            </video>
        </div>
        
        <br/><br/><br/><br/><br/><br/>
        <div class="student_top_quote" id="ranks">
            <label>Our Student Rankings - Top 5</label>
        </div>
        <div class="rankings_container">
          <div class="box">
              <label class="box_Rank_Number">1st Rank</label>
              <label class="box_Student_Name">Haider Rasool</label>
              <label class="box_Student_Points">10,000pts</label>
          </div>
            <div class="box">
              <label class="box_Rank_Number">2nd Rank</label>
              <label class="box_Student_Name">Zain</label>
              <label class="box_Student_Points">10pts</label>
          </div>
            <div class="box">
              <label class="box_Rank_Number">3rd Rank</label>
              <label class="box_Student_Name">Talha Naveed</label>
              <label class="box_Student_Points">10pts</label>
          </div>
            <div class="box">
              <label class="box_Rank_Number">4th Rank</label>
              <label class="box_Student_Name">Haider</label>
              <label class="box_Student_Points">2,000pts</label>
          </div>
            <div class="box">
              <label class="box_Rank_Number">5th Rank</label>
              <label class="box_Student_Name">Adil Sarwar Khan</label>
              <label class="box_Student_Points">4,000pts</label>
          </div>
      </div>
    </div>
</div>