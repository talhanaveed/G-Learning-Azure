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

<div class="student_dashboard_body">
    <div class="mid-content">
        <div class="student_top_menu">
            <div class="student_menu_tabs">
                <div class="student_menu_tab">
                    <a href="http://glearning-test.azurewebsites.net/parents/index/">
                        <div class="student_menu_tab_body">
                            <img src="http://glearning-test.azurewebsites.net/assets/images/galley.png"/>
                            <label>Parents</label>
                        </div>
                    </a>
                </div>
                <div class="student_menu_tab">
                    <a href="#ranks">
                        <div class="student_menu_tab_body">
                            <img src="http://glearning-test.azurewebsites.net/assets/images/galley.png"/>
                            <label>Ranks</label>
                        </div>  
                    </a>
                </div>
                <div class="student_menu_tab">
                    <a href="#video">
                        <div class="student_menu_tab_body">
                            <img src="http://glearning-test.azurewebsites.net/assets/images/video.png"/>
                            <label>Videos</label>
                        </div>
                    </a>
                </div>
                <div class="student_menu_tab">
                    <a href="http://glearning-test.azurewebsites.net/home/drills/">
                        <div class="student_menu_tab_body">
                            <img src="http://glearning-test.azurewebsites.net/assets/images/games.png"/>
                            <label>Games</label>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="mid_images_container">
            <div class="student_mid_image">
                <br/><br/>
                <img src="http://glearning-test.azurewebsites.net/assets/images/doggy.png"/>
            </div>
            <a href="http://glearning-test.azurewebsites.net/home/drills/">
                <div class="welcome_cloud">
                    <img src="http://glearning-test.azurewebsites.net/assets/images/cloud2.png"/>
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
                <source src="http://glearning-test.azurewebsites.net//assets/videos/play.mp4" type="video/mp4">
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