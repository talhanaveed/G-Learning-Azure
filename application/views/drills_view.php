<link href="<?php echo base_url();?>assets/css/normalize.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/css/nav_menu.css" rel="stylesheet" type="text/css">

<script>
    function hideAll()
      {
          $('#addition').hide();
          $('#even').hide();
          $('#highest').hide();
          $('#multiples').hide();
          $('#AscendOrder').hide();
          $('#DescendOrder').hide();
          $('#Subtraction').hide();
      }
      
      function addition()
      {
          hideAll();
          $('#addition').show();
      }
      function AOrder()
      {
          hideAll();
          $('#AscendOrder').show();
      }
      function DOrder()
      {
          hideAll();
          $('#DescendOrder').show();
      }
      function Subtraction()
      {
          hideAll();
          $('#Subtraction').show();
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
            hideAll();
            addition();
        });
</script>
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

</script>

<div class="student_dashboard_body">
    <div class="drills-content">
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
                        <li><a  href="<?php echo base_url();?>home/student_dashboard">Dashboard</a></li>
                        <li><a  href="<?php echo base_url();?>drills/assessments">Assessments</a></li>
                        <li><a href="<?php echo base_url();?>login/logout">Logout</a></li>
                    </ul>
                </div>
            </div>
	</div>
        
<!--        <div class="leftpane">
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
        </div>-->

        <div class="rightpane">
            <div class="gamebox">
                
                <div class="drillheading">
                    <div class="dottedline"></div>
                        Drill Topics
                    <div class="dottedline"></div>
                    <div class="drill_text">
                        Following are the available drills. New drills will be unlocked as you progress. 
                    </div>
                    <div class="drill_text">
                        GOOD LUCK!
                    </div>
                          
                </div>
             <!--    <div class="botdotline"></div> -->
                
           <!--      <span id="addition"> -->
           <?php 
           $count = 0;

           foreach($drills as $drill) 
           { 
            if($count > $this->session->userdata('drill_level'))
                {
                    break;
                 }
            ?> 
                
                    <div class="game_row">
                        <figure>
                            <img alt="Runner" src="<?php echo base_url() . $drill['drill_image'];?>"/>
                            <figcaption>
                                <h3><?php echo $drill['drill_name']?></h3>
                                <p><?php echo $drill['drill_description']?></p>
                                <p><a href="<?php echo base_url() . $drill['drill_path'];?>">Play Game</a></p>
                            </figcaption>
                        </figure>
                        <div class="game_details">
                            <div class="game_caption">
                                <?php echo $drill['drill_name']?>
                            </div>
                            <div class="game_desc">
                                <p>
                               <?php echo $drill['drill_story']?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="botdotline" ></div>
            <?php 
                $count++;
             }?>
           <!--      </span> -->
                

            </div>
        </div>
    </div>
>>>>>>> master
</div>