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
            <div class="navigation" id="navigation">
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
                    
                    <div class="drill_radioButtons" id="radioButtons">
                        <div class="radio_wrapper">
                            <input type="radio" checked="checked" name="topic" onclick="addition();"/> <span >Addition</span><br/>
                            <input type="radio" name="topic" onclick="Subtraction();"/> <span>Subtraction</span><br/>
                            <input type="radio" name="topic" onclick="AOrder();"/> <span>Ascending Order</span><br/>
                            <input type="radio" name="topic" onclick="DOrder();"/> <span>Descending Order</span><br/>
                            <input type="radio" name="topic" onclick="even();"/> <span>Even / Odd</span><br/>
                            <input type="radio" name="topic" onclick="highest();"/> <span>Highest/Lowest</span> <br/>
                            <input type="radio" name="topic" onclick="multiples();"/> <span>Multiples of Number</span>
                        </div>
                    </div>
                    
                </div>
                <div class="botdotline"></div>
                
                <span id="addition">
                    <div class="game_row">
                        <figure>
                            <img alt="Runner" src="<?php echo base_url();?>assets/images/runner_banner.jpg"/>
                            <figcaption>
                                <h3>Endless Adder</h3>
                                <p>Teaches the concept of Addition</p>
                                <p><a href="<?php echo base_url();?>games/runner">Play Game</a></p>
                            </figcaption>
                        </figure>
                        <div class="game_details">
                            <div class="game_caption">
                                Endless Adder
                            </div>
                            <div class="game_desc">
                                <p>
                                Help Mike, the city boy, to master the art of addition by collecting the correct numbers in order to reach the required sum.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="botdotline" ></div>
                </span>
                
                
                <span id="even">
                    <div class="game_row" >
                        <figure>
                            <img alt="Catchy" src="<?php echo base_url();?>assets/images/catchy-tile.png"/>
                            <figcaption>
                                <h3>Catchy</h3>
                                <p>Teaches the concept of Even / Odd numbers</p>
                                <p><a href="<?php echo base_url();?>games/play_cachy_even_odd">Play Game</a></p>
                            </figcaption>
                        </figure>
                        <div class="game_details">
                            <div class="game_caption">
                                Catchy
                            </div>
                            <div class="game_desc">
                                <p>
                                Hank has been given a task to catch the apples with even numbers on them. Help him master the art of even numbers.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="botdotline"></div>
                </span>
                <span id="highest">
                    <div class="game_row" >
                        <figure>
                            <img alt="Catchy" src="<?php echo base_url();?>assets/images/BalloonParty_tile.png"/>
                            <figcaption>
                                <h3>Balloon Party</h3>
                                <p>Teaches the concept of Highest / Lowest numbers</p>
                                <p><a href="<?php echo base_url();?>games/balloon_party">Play Game</a></p>
                            </figcaption>
                        </figure>
                        <div class="game_details">
                            <div class="game_caption">
                                Balloon Party
                            </div>
                            <div class="game_desc">
                                <p>
                                This is a simple beach party game, find the required balloon to win as fast as you can.</p>
                            </div>
                        </div>
                    </div>
                    <div class="botdotline"></div>
                </span>
                <span  id="multiples">
                    <div class="game_row">
                        <figure>
                            <img alt="Catchy" src="<?php echo base_url();?>assets/images/catchy-tile-2.png"/>
                            <figcaption>
                                <h3>Catchy</h3>
                                <p>Teaches the concept of multiples of a number</p>
                                <p><a href="<?php echo base_url();?>games/play_cachy_multiples_of_5">Play Game</a></p>
                            </figcaption>
                        </figure>
                        <div class="game_details">
                            <div class="game_caption">
                                Endless Adder
                            </div>
                            <div class="game_desc">
                                <p>
                                Jack loves this game to find multiples of a number. Help him catch the apple having multiple of given number.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="botdotline"></div>
                </span>
                <span  id="AscendOrder">
                    <div class="game_row">
                        <figure>
                            <img alt="Racer" src="<?php echo base_url();?>assets/images/racergame.png"/>
                            <figcaption>
                                <h3>Racer</h3>
                                <p>Teaches the concept of Ascending Order of Numbers</p>
                                <p><a href="<?php echo base_url();?>games/racerAscending">Play Game</a></p>
                            </figcaption>
                        </figure>
                        <div class="game_details">
                            <div class="game_caption">
                                Racer
                            </div>
                            <div class="game_desc">
                                <p>
                                Help Flinstone learn driving by picking up numbers in Ascending order.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="botdotline"></div>
                </span>
                <span  id="DescendOrder">
                    <div class="game_row">
                        <figure>
                            <img alt="Racer" src="<?php echo base_url();?>assets/images/racergame.png"/>
                            <figcaption>
                                <h3>Racer</h3>
                                <p>Teaches the concept of Descending Order of Numbers</p>
                                <p><a href="<?php echo base_url();?>games/racerDescending">Play Game</a></p>
                            </figcaption>
                        </figure>
                        <div class="game_details">
                            <div class="game_caption">
                                Racer
                            </div>
                            <div class="game_desc">
                                <p>
                                Help Flinstone learn driving by picking up numbers in Descending order.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="botdotline"></div>
                </span>
                <span  id="Subtraction">
                    <div class="game_row">
                        <figure>
                            <img alt="Racer" src="<?php echo base_url();?>assets/images/lifeofbee.png"/>
                            <figcaption>
                                <h3>Life of a Bee</h3>
                                <p>Practice your concepts of Subtraction</p>
                                <p><a href="<?php echo base_url();?>games/LifeofBee">Play Game</a></p>
                            </figcaption>
                        </figure>
                        <div class="game_details">
                            <div class="game_caption">
                                Life of a Bee
                            </div>
                            <div class="game_desc">
                                <p>
                                Dora the honey bee is in danger, there are spiders everywhere. She needs hep finding her correct home.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="botdotline"></div>
                </span>
            </div>
        </div>
    </div>
</div>