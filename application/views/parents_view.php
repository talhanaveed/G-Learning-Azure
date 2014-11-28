<div class="main_container_general">
    <div class="main_heading_general">
        <label>Parents Portal</label>
    </div>
    <div class="mid_content_general">
        <div class="flipbook-viewport">
            <div class="container">
		<div class="flipbook">
                    <div class="book_main_page">
                        <div class="report_card_heading">
                            <label class="school_name">National University of Computer & Emerging Sciences</label>
                            <label class="report_name">Report Card</label>
                            <label class="student_name">Zain Malik</label>
                        </div>
                    </div>
                    <div class="assignment_list">
                        <div class="result_sheet_heading">Result Sheet</div>
                        <div id="content-1" class="scroll_content">
                            <div class="CSSTableGenerator">
                                <table>
                                    <tr style="border:1px solid #7f0000 !important;"> 
                                        <td>Assignment Name</td>
                                        <td >Obtained Marks</td>
                                        <td>Total Marks</td>
                                    </tr>
                                    <tr>
                                        <td>Addition</td>
                                        <td>100</td>
                                        <td>90</td>
                                    </tr>
                                    <tr>
                                        <td>Even/Odd</td>
                                        <td>100</td>
                                        <td>90</td>
                                    </tr>
                                    <tr>
                                        <td>Multiplication</td>
                                        <td>100</td>
                                        <td>90</td>
                                    </tr>
                                    <tr>
                                        <td>Addition</td>
                                        <td>100</td>
                                        <td>90</td>
                                    </tr>
                                    <tr>
                                        <td>Even/Odd</td>
                                        <td>100</td>
                                        <td>90</td>
                                    </tr>
                                    <tr>
                                        <td>Multiplication</td>
                                        <td>100</td>
                                        <td>90</td>
                                    </tr>
                                    <tr>
                                        <td>Addition</td>
                                        <td>100</td>
                                        <td>90</td>
                                    </tr>
                                    <tr>
                                        <td>Even/Odd</td>
                                        <td>100</td>
                                        <td>90</td>
                                    </tr>
                                    <tr>
                                        <td>Multiplication</td>
                                        <td>100</td>
                                        <td>90</td>
                                    </tr>
                                    <tr>
                                        <td>Addition</td>
                                        <td>100</td>
                                        <td>90</td>
                                    </tr>
                                    <tr>
                                        <td>Even/Odd</td>
                                        <td>100</td>
                                        <td>90</td>
                                    </tr>
                                    <tr>
                                        <td>Multiplication</td>
                                        <td>100</td>
                                        <td>90</td>
                                    </tr>
                                    <tr>
                                        <td>Addition</td>
                                        <td>100</td>
                                        <td>90</td>
                                    </tr>
                                    <tr>
                                        <td>Even/Odd</td>
                                        <td>100</td>
                                        <td>90</td>
                                    </tr>
                                    <tr>
                                        <td>Multiplication</td>
                                        <td>100</td>
                                        <td>90</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="graph_container">
                        <label>Performance Graph</label>
                        <div class="graph_body">
                            <div class="scrollTo-demo">
                                <div class="scroll_content demo-x">
                                    <canvas id="canvas"></canvas>
                                </div>
                            </div>
                            <label>Remarks: <span>Pay Attention on Addition</span></label>
                        </div>
                    </div>
		</div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

	var barChartData = {
		labels : ["Even","Odd","Addition","Subtraction","Multiplication"],
		datasets : [
			{
				fillColor : "rgba(220,220,220,0.5)",
				strokeColor : "rgba(220,220,220,0.8)",
				highlightFill: "rgba(220,220,220,0.75)",
				highlightStroke: "rgba(220,220,220,1)",
				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
			},
			{
				fillColor : "rgba(151,187,205,0.5)",
				strokeColor : "rgba(151,187,205,0.8)",
				highlightFill : "rgba(151,187,205,0.75)",
				highlightStroke : "rgba(151,187,205,1)",
				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
			}
		]

	}
	window.onload = function(){
		var ctx = document.getElementById("canvas").getContext("2d");
                ctx.canvas.width = 460;
                ctx.canvas.height = 400;
		window.myBar = new Chart(ctx).Bar(barChartData, {
			responsive : false
		});
	}

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