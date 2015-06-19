<link href="<?php echo base_url();?>assets/css/normalize.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/css/nav_menu.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url();?>/assets/js/jquery.js"></script>
<script src="<?php echo base_url();?>/assets/js/jsexcel.js"></script>
<script>
    $(document).ready(function () {
        
    });
</script>

<div class="main_container_general ">
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
        
    <div class="teacher_mid_right">
        <div class="heading_teacher">
            <h1>Assessments</h1>
        </div>
        <br/>
            <?php if ($assessmentCount != 0){?>
                <table class="assess_tbl">
                    <tr>
                        <th class="tg-72fa">Sr.No</th>
                        <th class="tg-72fa">Assessment Name</th>
                        <th class="tg-72fa">Marks Obtained</th>
                        <th class="tg-72fa">Total Marks</th>
                    </tr>
                    
                    <?php  for ($i = 0 ; $i < $assessmentCount ; $i++) { ?>
                    <tr>
                        <td class="tg-eymq"><?php echo $i+1; ?></td>
                        <td class="tg-eymq"><?php echo $assessment[$i][0]; ?></td>
                        <td class="tg-eymq"><?php echo $assessment[$i][1]; ?></td>
                        <td class="tg-eymq"><?php echo $assessment[$i][2]; ?></td>
                    </tr>
                    <?php } ?>
                </table>
            <?php } else { ?>
            <div style="width:100%; margin:auto;" class="error_main_container "><label class="error_label"> <?php echo $msg; ?></label> </div>
            
            <?php } ?>
    </div>
            
        
           

</div>
<!--Navigation panel script-->
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



<style>
    

.assess_tbl  {
    border-collapse:collapse;
    border-spacing:0;
    
    
    width:100%;
   }
.assess_tbl td{
    font-family:Arial sans-serif;
    font-size:14px;
    padding:10px 5px;
    border:1px solid;
    border-color:#9BBA1F;
    overflow:hidden;
    word-break:normal;
}
.assess_tbl th{
    font-family:Arial, sans-serif;
    font-size:14px;
    font-weight:normal;
    padding:10px 5px;
    
    overflow:hidden;
    word-break:normal;
}
.assess_tbl .tg-72fa{
    font-weight:bold;
    font-size:24px;
    background-color:#9bba1f !important;
    color:#ffffff !important;
    text-align:center;
}
.assess_tbl .tg-eymq{
    font-weight:bold;
    font-size:24px;
    color:#000000 !important;
    text-align:center;
    font-family:Montserrat; 
}
                
</style>