<link href="<?php echo base_url();?>assets/css/normalize.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/css/nav_menu.css" rel="stylesheet" type="text/css">
<!--Navigation panel script-->
<script type="text/javascript">
    
    $(document).ready(function(){
        setInterval(function(){ 
            $('#loadingGif').hide();
            $('#report_card').show();
            $('#book_main_page').show();
            $('#assignment_list').show();
        }, 3000);
    });
    
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
<div class="main_container_general">
    <div class="main_heading_general">
        <label>Parents Portal</label>
    </div>
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
                       <li><a class="current" href="#">Home</a></li>
                        <!--<li class="separator"></li>-->
                        <li><a href="<?php echo base_url();?>login/logout">Logout</a></li>
                    </ul>
                </div>
            </div>
	</div>  
    
    <div class="mid_content_general">
        <div id="loadingGif">
            <img src="<?php echo base_url();?>/assets/images/loading.gif"/>
        </div>
        <div class="flipbook-viewport" id="report_card">
            <div class="container">
		<div class="flipbook">
                    <div class="book_main_page" id="book_main_page">
                        <div class="report_card_heading">
                            <label class="school_name">National University of Computer & Emerging Sciences</label><br/>
                            <label class="report_name">Report Card</label><br/>
                            <label class="student_name"><?php echo $name;?></label>
                        </div>
                    </div>
                    <div class="assignment_list" id="assignment_list">
                        <div class="result_sheet_heading">Result Sheet</div>
                        <?php if($AssessmentCount != 0){?>
                            <div id="content-1" class="scroll_content">
                                <div class="CSSTableGenerator">
                                    <table>
                                        <tr style="border:1px solid #7f0000 !important;"> 
                                            <td>Assessment Name</td>
                                            <td >Obtained Marks</td>
                                            <td>Total Marks</td>
                                        </tr>
                                        <?php for($i = 0; $i < $AssessmentCount; $i++){ ?>
                                            <tr>
                                                <td><?php echo $gradeSheet[$i][0]; ?></td>
                                                <td><?php echo $gradeSheet[$i][1]; ?></td>
                                                <td><?php echo $gradeSheet[$i][2]; ?></td>
                                            </tr>
                                        <?php }?>
                                    </table>
                                </div>
                            </div>
                        <?php }else {?>
                            <div class="result_sheet_heading">No Assessment Attempted Yet!</div>
                        <?php }?>
                    </div>
                    
                    <div class="graph_container">
                        <?php if($minAssessment != "") {?>
                            <label>Remarks: <span>Pay Attention on <?php echo $minAssessment;?></span></label>
                        <?php } ?>
                            <br/><label style="color:#6FB89F;">Performance Graph</label>
                        <?php if($AssessmentCount != 0){?>
                        <div class="graph_body">
                            <div class="scrollTo-demo">
                                <div class="scroll_content demo-x">
                                    <canvas id="canvas"></canvas>
                                </div>
                            </div>
                        </div>
                        <?php }else {?>
                            <div class="result_sheet_heading">No Assessment Attempted Yet!</div>
                        <?php }?>
                    </div>
		</div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var assessmentNames = new Array();
    var myMarks = new Array;
    var maxMarks = new Array;
    var totalMarks = new Array;
    var counter = 0;
    var myBar;
    
    $(document).ready(function(){
        var baseurl = "<?php print base_url();?>";
        $.ajax({
            url:  baseurl +"parents/getAssessmentsGraph",
            type:'POST',
            cache:false,
            dataType: 'json',
            data: {},
            success:function(data){
                if(data){
                    for(var i = 0; i < data.length; i++){
                        assessmentNames[counter] = data[i][0];
                        myMarks[counter] = data[i][1];
                        totalMarks[counter] = data[i][2];
                        maxMarks[counter] = data[i][3];
                        counter++;
                    }
                    var barChartData = {
                        labels : ["assessmentNames"],
                        datasets : [
                            {
                                label: "Total Marks",
                                fillColor : "rgba(151,187,205,0.5)",
                                strokeColor : "rgba(151,187,205,0.8)",
                                highlightFill : "rgba(151,187,205,0.75)",
                                highlightStroke : "rgba(151,187,205,1)",
                                data : [randomScalingFactor()]
                            }
                            ,{
                                label: "Maximum Marks",
                                fillColor : "rgba(220,220,220,0.5)",
                                strokeColor : "rgba(220,220,220,0.8)",
                                highlightFill: "rgba(220,220,220,0.75)",
                                highlightStroke: "rgba(220,220,220,1)",
                                data : [randomScalingFactor()]
                            },
                            {
                                label: "My Marks",
                                fillColor : "rgba(151,187,205,0.5)",
                                strokeColor : "rgba(151,187,205,0.8)",
                                highlightFill : "rgba(151,187,205,0.75)",
                                highlightStroke : "rgba(151,187,205,1)",
                                data : [randomScalingFactor()]
                            }
                        ]
                    }
                    window.onload = function(){
                        var ctx = document.getElementById("canvas").getContext("2d");
                        ctx.canvas.width = 460;
                        ctx.canvas.height = 400;
                        myBar = new Chart(ctx).Bar(barChartData, {
                                responsive : false
                        });
                        for(var j = 0; j < assessmentNames.length; j++){
                            var array = new Array();
                            array[0] = totalMarks[j];
                            array[1] = maxMarks[j];
                            array[2] = myMarks[j];
                            myBar.addData( array, assessmentNames[j]);
                        }
                        myBar.removeData();
                    };
                }
            },
            error:function(x,e){
            }
        }); 
    });

        var randomScalingFactor = function(){ 
            return Math.round(Math.random()*100)
        };

function loadApp() {
	// Create the flipbook
	$('.flipbook').turn({
            // Width
            width:922,
            // Height
            height:600,
            // Elevation
            elevation: 50,
            // Enable gradients
            gradients: true,
            // Auto center this flipbook
            autoCenter: true
	});
}
// Load the HTML4 version if there's not CSS transform
yepnope({
	test : Modernizr.csstransforms,
	yep: ['<?php echo base_url();?>/assets/js/turn.js'],
	nope: ['<?php echo base_url();?>/assets/js/turn.html4.min.js'],
	both: ['<?php echo base_url();?>/assets/css/basic.css'],
	complete: loadApp
});
</script>

<script>window.jQuery || document.write('<script src="<?php echo base_url();?>/assets/js/jquery-1.11.0.min.js"><\/script>')</script>	
<script src="<?php echo base_url();?>/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script>
    (function($){
            $(window).load(function(){
                $("#content-1").mCustomScrollbar({
                        axis:"y",
                        advanced:{autoExpandHorizontalScroll:true}
                });
            });
    })(jQuery);
    (function($){
            $(window).load(function(){
                    $(".demo-x").mCustomScrollbar({
                            axis:"x",
                            advanced:{autoExpandHorizontalScroll:true}
                    });
            });
    })(jQuery);
</script>