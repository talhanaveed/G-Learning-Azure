<script>
    function hideAll()
      {
          $('#addition').hide();
          $('#even').hide();
          $('#highest').hide();
          $('#multiples').hide();
      }
      
      function addition()
      {
          hideAll();
          $('#addition').show();
      }
      
      function even()
      {
          hideAll();
          $('#even').show();
      }
      
      function multiples()
      {
          hideAll();
          $('#multiples').show();
      }
      
      function highest()
      {
          hideAll();
          $('#highest').show();
      }
      
        $(document).ready(function(){
            $("#myTip").animate({ 
                top: "+=150px",
              }, 2800 );
        });
</script>
<div class="student_dashboard_body">
    <div class="drills-content">
        <div class="student_top_quote">
            <label id='myTip'>You can't score a goal if you don't take a shot</label>
        </div>
        <div class="leftpane">
            <div class="topicsbox">
                <div class="topicsBoxLabel">
                    <label>Topics</label>
                </div>
                <div id="radioButtons">
                    <input type="radio" checked="checked" name="topic" onclick="addition();"/> <span>Addition</span><br/>
                    <input type="radio" name="topic" onclick="even();"/> <span>Even / Odd</span><br/>
                    <input type="radio" name="topic" onclick="highest();"/> <span>Highest/Lowest</span> <br/>
                    <input type="radio" name="topic" onclick="multiples();"/> <span>Multiples of Number</span>
                </div>
            </div>
            <div class="goback_fixed_button">
                <a href="<?php echo base_url();?>home/student_dashboard">
                    <img src="<?php echo base_url();?>/assets/images/back.png" alt="back" />
                </a>
            </div>
        </div>

        <div class="rightpane">
            <div class="gamebox">
                <div class="game_row" id="addition">
                    <figure>
                        <img alt="Runner" src="<?php echo base_url();?>assets/images/runner_banner.jpg"/>
                        <figcaption>
                            <h3>Endless Adder</h3>
                            <p>Teaches the concept of Addition</p>
                            <p><a href="<?php echo base_url();?>games/runner">Play Game</a></p>
                        </figcaption>
                    </figure>
                </div>
                <div class="game_row" id="even">
                    <figure>
                        <img alt="Catchy" src="<?php echo base_url();?>assets/images/catchy-tile.png"/>
                        <figcaption>
                            <h3>Catchy</h3>
                            <p>Teaches the concept of Even / Odd numbers</p>
                            <p><a href="<?php echo base_url();?>games/play_cachy_even_odd">Play Game</a></p>
                        </figcaption>
                    </figure>
                </div>
                <div class="game_row" id="highest">
                    <figure>
                        <img alt="Catchy" src="<?php echo base_url();?>assets/images/BalloonParty_tile.png"/>
                        <figcaption>
                            <h3>Balloon Party</h3>
                            <p>Teaches the concept of Highest / Lowest numbers</p>
                            <p><a href="<?php echo base_url();?>games/balloon_party">Play Game</a></p>
                        </figcaption>
                    </figure>
                </div>
                <div class="game_row" id="multiples">
                    <figure>
                        <img alt="Catchy" src="<?php echo base_url();?>assets/images/catchy-tile-2.png"/>
                        <figcaption>
                            <h3>Catchy</h3>
                            <p>Teaches the concept of multiples of a number</p>
                            <p><a href="<?php echo base_url();?>games/play_cachy_multiples_of_5">Play Game</a></p>
                        </figcaption>
                    </figure>
                </div>
                
            </div>
        </div>
    </div>
</div>