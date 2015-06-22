
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Unity Web Player | Shoot'Em Up</title>
              
		<script type='text/javascript' src='https://ssl-webplayer.unity3d.com/download_webplayer-3.x/3.0/uo/jquery.min.js'></script>
		<script type="text/javascript">
		<!--
		var unityObjectUrl = "http://webplayer.unity3d.com/download_webplayer-3.x/3.0/uo/UnityObject2.js";
		if (document.location.protocol == 'https:')
			unityObjectUrl = unityObjectUrl.replace("http://", "https://ssl-");
		document.write('<script type="text\/javascript" src="' + unityObjectUrl + '"><\/script>');
		-->
	
		</script>
                
                
		<script type="text/javascript">
		<!--
                        var level = <?php echo $level;?>;
                        var drill_id = <?php echo $drill_id;?>;
                        var p_id = <?php echo $this->session->userdata['person_id']; ?>;
                        var assessment_id = 0;
			var config = {
				width: 960, 
				height: 540,
				params: { enableDebugging:"0" }
				
			};
			var u = new UnityObject2(config);

			jQuery(function() {

				var $missingScreen = jQuery("#unityPlayer").find(".missing");
				var $brokenScreen = jQuery("#unityPlayer").find(".broken");
				$missingScreen.hide();
				$brokenScreen.hide();
				
				u.observeProgress(function (progress) {
					switch(progress.pluginStatus) {
						case "broken":
							$brokenScreen.find("a").click(function (e) {
								e.stopPropagation();
								e.preventDefault();
								u.installPlugin();
								return false;
							});
							$brokenScreen.show();
						break;
						case "missing":
							$missingScreen.find("a").click(function (e) {
								e.stopPropagation();
								e.preventDefault();
								u.installPlugin();
								return false;
							});
							$missingScreen.show();
						break;
						case "installed":
							$missingScreen.remove();
						//	updateRange();
						break;
						case "first":
						break;
					}
				});
				u.initPlugin(jQuery("#unityPlayer")[0], "<?php echo base_url();?>assets/unitygames/Shoot.unity3d");

			});
                        $(document).ready(function(){
                                log("getting Questions");
                                getQuestionsXML();
                                log("Done with XML");
                        });
                        var XMLString = "";

                        var myArray = new Array();
                            function log(msg)
                            {
                                setTimeout(function(){
                                    throw new Error(msg);
                                    },0);
                            }
                            function getQuestionsXML()
                            {
                                var baseurl = "<?php print base_url(); ?>";
                                $.ajax({
                                    url:  baseurl +"games/topicAssessment",
                                    type:'POST',
                                    cache:true,
                                    dataType: 'json',
                                    success:function(data){
                                        if(data){                    
                                            myArray = data;
                                            makeXML();
                                            log(XMLString);
                                        }
                                        //else
                                            //alert("Error Parsing XML");
                                    },
                                    error:function(x,e){
                                    }
                                }); 
                            }

                            function makeXML(){
                                
                                var size = myArray[0];
                                XMLString = XMLString + "<assessment>\n<questions>"+size+"</questions>\n";
                                for(var i = 0; i < size; i++){
                                    XMLString = XMLString + "<question>\n";

                                    XMLString = XMLString + "<statement>";
                                    XMLString = XMLString + myArray[1][i][0];
                                    XMLString = XMLString + "</statement>\n";

                                    XMLString = XMLString + "<options>\n";
                                    for(var j = 1; j<=4;j++){
                                        XMLString = XMLString + "<option>";
                                        XMLString = XMLString + myArray[1][i][j];
                                        XMLString = XMLString + "</option>\n";
                                    }

                                    XMLString = XMLString + "</options>\n";

                                    XMLString = XMLString + "<answer>";
                                    XMLString = XMLString + myArray[1][i][5];
                                    XMLString = XMLString + "</answer>\n";

                                    XMLString = XMLString + "</question>\n";
                                }
                                XMLString = XMLString + "</assessment>";
                                
                            }
                                    
                                    

				function updateRange()
				{
                                   //alert(XMLString);
                                    u.getUnity().SendMessage("Camera", "PopulateQuestions",XMLString);                               
                                    //log('another message');
                                }
				function SayHello(arg )
				{
                                    updateRange();
                                    
				}
                                
                                function endGame( arg )
                                {
                                        var x = parseInt(arg);
                                        log(x);
                                        score(x);
                                }

                                function score(arg)
                                {
                                    var percentageScore = arg;
                                    var baseurl = "<?php print base_url(); ?>";
                                    log('storing score');
                                    $.ajax({
                                        url:  baseurl +"games/LogAssessmentScore",
                                        type:'POST',
                                        data: { score : percentageScore},
                                        cache:false,
                                        dataType: 'json',
                                        success:function(data)
                                        {
                                            if(data){  
                                               window.location.href = "<?php echo base_url();?>"+"drills/updateDrillLevel";
                                            }
                                        },
                                        error:function(x,e){
                                        }
                                    }); 
                                }
				
		-->
		</script>

		<style type="text/css">
		<!--
		body {
			font-family: Helvetica, Verdana, Arial, sans-serif;
			background-color: white;
			color: black;
			text-align: center;
		}
		a:link, a:visited {
			color: #000;
		}
		a:active, a:hover {
			color: #666;
		}
		p.header {
			font-size: small;
		}
		p.header span {
			font-weight: bold;
		}
		p.footer {
			font-size: x-small;
		}
		div.content {
			margin: auto;
			width: 960px;
		}
		div.broken,
		div.missing {
			margin: auto;
			position: relative;
			top: 50%;
			width: 193px;
		}
		div.broken a,
		div.missing a {
			height: 63px;
			position: relative;
			top: -31px;
		}
		div.broken img,
		div.missing img {
			border-width: 0px;
		}
		div.broken {
			display: none;
		}
		div#unityPlayer {
			cursor: default;
			height: 600px;
			width: 960px;
		}
                
		-->
		</style>
	</head>
	<body>
		<p class="header"><span>Unity Web Player | </span>Shoot'Em Up</p>
		<div class="content">
			<div id="unityPlayer">
				<div class="missing">
					<a href="http://unity3d.com/webplayer/" title="Unity Web Player. Install now!">
						<img alt="Unity Web Player. Install now!" src="http://webplayer.unity3d.com/installation/getunity.png" width="193" height="63" />
					</a>
				</div>
				<div class="broken">
					<a href="http://unity3d.com/webplayer/" title="Unity Web Player. Install now! Restart your browser after install.">
						<img alt="Unity Web Player. Install now! Restart your browser after install." src="http://webplayer.unity3d.com/installation/getunityrestart.png" width="193" height="63" />
					</a>
				</div>
			</div>
			<div>
				<script type="text/javascript">
		
				</script>
			</div>
		</div>
		<p class="footer">&laquo; created with <a href="http://unity3d.com/unity/" title="Go to unity3d.com">Unity</a> &raquo;</p>
	</body>
</html>
