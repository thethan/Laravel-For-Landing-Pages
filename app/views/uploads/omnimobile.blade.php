       <?php 
			extract($variables);
		?>
<!DOCTYPE html>
<html>
  <head>
    <title>Mobile Test</title>
    <script type="text/javascript" src="http://fast.fonts.net/jsapi/b75b8f60-98a5-48c0-9f59-c933fbf22789.js"></script>
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1">
	<meta name = "apple-mobile-web-app-capable" content = "yes" /> 
		
    <!-- Bootstrap -->
			<style type="text/css">
			.iosSlider {
				
				min-height: 200px;
				height:100%;
			}
			
			.iosSlider .slider {
				width: 100%;
				height: 100%;
			}
			
			.iosSlider .slider .item {
				position: relative;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
				background: #fff;
				margin: 0 0 0 0;
				
			}
			
			
			<?php echo $sliderimages;?> 
			
			.iosSliderButtons 
			{
				position: absolute;
				bottom: 10px;
				left: 10px;
				width: 600px;
				height: 15px;
			}
			
			.iosSliderButtons .button {
				float: left;
				width: 9px;
				height: 9px;
				background: #999;
				margin: 5px 10px 0 0;
				opacity: 0.25;
				filter: alpha(opacity:25);
				border: 1px solid #999;
				padding: 1px;
				-webkit-border-radius: 15px;
				-moz-border-radius: 15px;


			}
			
			
			.iosSliderButtons .selected 
			{
				background: #2ba4ff;
				opacity: 1;
				filter: alpha(opacity:100);
			}
			.prevSlide, .nextSlide {
				color:#fff;
				float:left;
			}
			.prevSlide {
					margin: 0 11px 0 0;
				}
		</style>
    <link href="<?php echo asset('assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo asset('assets/css/omnimobile.css' );?>" rel="stylesheet">
    <link href="<?php echo asset('assets/css/autocomplete.css');?>" rel="stylesheet">
    <link href="<?php echo asset('assets/css/formmobile.css');?>" rel="stylesheet">
    
    
    <script src="https://code.jquery.com/jquery.js"></script>
	<script src="<?php echo asset('assets/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo asset('assets/js/jquery.ui.js');?>"></script>
	<script type="text/javascript" src = "<?php echo asset('assets/js/jquery.validate.js');?>"></script>
	<script type="text/javascript" src = "<?php echo asset('assets/js/jquery.easing-1.3.js');?>"></script>
	<script src = "<?php echo asset('assets/js/jquery.iosslider.js');?>"></script>
      <script type="text/javascript">
			$(document).ready(function() {
			
				$('.iosSlider').iosSlider({
					autoSlide: true,
					scrollbar: false,
					snapToChildren: true,
					desktopClickDrag: true,
					scrollbarLocation: 'top',
					scrollbarBorderRadius: '0',
					responsiveSlideWidth: true,
					navSlideSelector: $('.iosSliderButtons .button'),
					navPrevSelector: $(' .prevSlide'),
					navNextSelector: $(' .nextSlide'),
					infiniteSlider: true,
					onSlideChange: slideContentChange,
					onSlideComplete: slideContentComplete,
					onSliderLoaded: slideContentLoaded
				});
				
				function slideContentChange(args) {
					
					/* indicator */
					$(args.sliderObject).parent().find('.iosSliderButtons .button').removeClass('selected');
					$(args.sliderObject).parent().find('.iosSliderButtons .button:eq(' + (args.currentSlideNumber - 1) + ')').addClass('selected');
					
				}
				
				function slideContentComplete(args) {
					
					if(!args.slideChanged) return false;
					
					/* animation */
					$(args.sliderObject).find('.text1, .text2').attr('style', '');
					
					$(args.currentSlideObject).children('.text1').animate({
						right: '100px',
						opacity: '1'
					}, 400, 'easeOutQuint');
					
					$(args.currentSlideObject).children('.text2').delay(200).animate({
						right: '50px',
						opacity: '1'
					}, 400, 'easeOutQuint');
					
				}
				
				function slideContentLoaded(args) {
					
					/* animation */
					$(args.sliderObject).find('.text1, .text2').attr('style', '');
				
					$(args.currentSlideObject).children('.text1').animate({
						right: '100px',
						opacity: '1'
					}, 400, 'easeOutQuint');
					
					$(args.currentSlideObject).children('.text2').delay(200).animate({
						right: '50px',
						opacity: '1'
					}, 400, 'easeOutQuint');
					
					/* indicator */
					$(args.sliderObject).parent().find('.iosSliderButtons .button').removeClass('selected');
					$(args.sliderObject).parent().find('.iosSliderButtons .button:eq(' + (args.currentSlideNumber - 1) + ')').addClass('selected');
					
				}
				
			});
		</script>
  </head>
 
  <body id="<?php echo $slug; ?>">
  	
		<header class="row">
        	<div class="col-sm-12">
        		<h2>The <span>Los Angeles</span> Film School<span class="reg">&reg;</span></h2>
            	<h3 class="icon">{{ $college_of }}</h3>
			</div>
        </header>
        <div class="row">
            <div class=" iosSlider">
                    <div class="slider">
                
						 <?php echo $slideritems; ?>					
                
                </div>
            </div> 
    	</div>
         <article class="row">
             <div class="description col-sm-12">
                <h1 class="col-sm-12">
                   {{ $headline }}
                </h1>
                  
				<p class="col-sm-12">
			Our Film Program is home to artists, storytellers and visionaries. 
			Our students live and breathe cinema and work toward creating a motion picture legacy. 
			When you begin our career-focused and accredited Associate of Science degree program, you join a unique group of people who understand and share that desire. 
			You’ll explore every aspect of modern filmmaking, from pre to post-production and everything in between. Get ready to tell your story.
             </p>
             </div>  
       <div class="row" id="callus">
            <h4><a href="tel:+13174562564" class="col-sm-12 fill-div">PRESS HERE TO CALL US NOW </a></h4>
     </div>
            
                
<div class="panel-group row" id="accordion">

  <div class="panel">
    <div class="panel-heading col-sm-12">
      <div class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
       	 	<h4 class="rfi">
            
        	 	Request Free Information
           </h4>
        </a>
      </div>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body"> 
      		<?php
			/*if (Auth::check())
			{
   					 // If it is a user do nothing
					 $hid = 0;
					 
			} 
			else {		
				$hit = new Stat();
				$hit->hit = 1;
				$hit->vid = $id;
				$hit->lp_id = $lp_id;
				$hit->save();
				
				$hid = $hit->id;
			}
			*/
			$hid=0;
				
?>
<form id="rfiform" method="post" name="info">
			<h3>Request <span>Free</span> Information</h3>
               <div class="col-md-12">
                 <div class="styled-select selectDiv">	
                    <span class="selectDefault selectProgram">Program of Interest <span class="caret pull-right"></span></span>
                        <select name="program" id="AdProgramID" class="col-md-12 col-sm-12 selectProgramBox"  required>
                            <option></option>
                            <option value="ASF">Film</option>
                            <option value="BSEB">Entertainment Business</option>
                            <option value="ASRA">Recording Arts</option>
                            <option value="ASGP">Game Production</option>
                            <option value="ASCA">Computer Animation</option>
                            <option value="ASMP">Music Production</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="styled-select noback">	
                    	<div class="col-md-6 col-lg-6 col-xs-6 col-sm-6">
                        <input type="text" placeholder="First Name*" name="FirstName" class="sFirstName  first " required />
                  	</div>
                    	<div class="col-md-6 col-lg-6 col-xs-6 col-sm-6 pull-right">
                        <input type="text" placeholder="Last Name*" name="LastName" class="sLastName pull-right" required />
                      </div>
                   </div>
               </div>
               <div class="col-md-12">
                   <div class="styled-select">
                        <input type="text" placeholder="Zip/Post Code*" name="PostalCodeorZip" class="sPostalCode" required />
                   </div>
               </div>
               <div class="col-md-12">
                   <div class="styled-select">
                        <input type="text" placeholder="Phone*" name="Phone" class="sPhone" required/>
                   </div>
               </div>
               <div class="col-md-12">
	               <div class="styled-select">
                        <input type="email" placeholder="Email Address*" name="email" class="sEmailAddress full" required/>
                   </div>
               </div>
               <div class="col-md-12">
                   <div class="styled-select selectDiv">
                   		<span class="selectDefault selectAgency"><span class="caret pull-right"></span></span>
                        <select name="agency" class="Agency full chosen-select selectBox selectAgencyBox" required >
                            <option></option>
                            <option value="NON">US citizen with no military affiliation</option>
                            <option value="ACT">Active duty, US Armed Forces</option>
                            <option value="VET">Veteran of Armed Forces</option>
                            <option value="MDEP">Military dependent using benefits, US Armed Forces</option>
                            <option value="RESR">US citizen / Reservist or National Guard</option>
                            <option value="INTL1">Non-US citizen with student VISA</option>
                            <option value="INTL2">Non-US citizen without student VISA</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                   <div class="styled-select">	
                        <input  placeholder="Country*" class="country" required>
                        <input type="hidden" name="Country" id="country-id" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="styled-select selectDiv">
                    		<span class="selectDefault selectHighest"></span>
                        <select name="PreviousEducation" class="AmPrevEducCode full chosen-select selectBox selectHighestBox" required>
                                <option></option>
                                <option value="INHS">High School Student</option>
                                <option value="HS">High School Graduate</option>
                                <option value="COL">Attending College</option>
                                <option value="AA/AS">Associate's Degree Completed</option>
                                <option value="BA/BS">Bachelor's Degree Completed</option>
                                <option value="MS">Master's Degree Completed</option>			
                        </select>
                  	</div>
                  </div>
					<!--
					<div class="texting clear">
						<label for="texts">Sign up for text notifications</label>
						<input type="checkbox" id="texts" name="texts" />
					</div>
					-->
					
					<!--Lead source hidden value -->
					<?php  if(empty($_GET['src']) )
					 { $lead = 'GOOGLEPRS';}
					 	 else { $lead = $_GET['src'];
						 };
						 if(empty($_GET['format']) )
							 { $format = 'LandingPages';}
								 else { $format = $_GET['format'];
							 };
						  ?>
					<input type="hidden" name="leadSource" value="<?php echo $lead;?>" />
					<input type="hidden" name="format" value="<?php echo $format;?>" />	
                  <input type="hidden" name="stat_id" value="<?php echo $hid;?> " />
                  <?php if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
								$ip = $_SERVER['HTTP_CLIENT_IP'];
							} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
								$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
							} else {
								$ip = $_SERVER['REMOTE_ADDR'];
							} ?>
					<input type="hidden" name="ipaddress" value="<?php echo $ip;?>" >
					<div class="col-md-12">
						<h6></h6>
					<p class="disclaimer">By submitting this form, you give The Los Angeles Film School and its partner schools your consent to contact you via phone, email and/or text using automated technology at the information above, including your wireless number, if provided, regarding educational services. Please note that you are not required to provide this consent to receive educational services. </p>								
                   </div>
				<div class="col-md-12">
                <input type="submit" value="Send to Learn More" class="col-xs-7 col-sm-7 col-md-8" id="formSubmission" />
               </div>
		</form>	

   
        <div id="run-loading"></div>
      </div>
    </div>
  </div>
  <div class="panel">
    <div class="panel-heading">
      <div class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
       	 	<h4 class="Film">
          		Film
           </h4>
        </a>
      </div>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body"> 
      
      	<h5>
        {{ $film_healine }}
        </h5> 
			{{ $film_description }} 
      </div>
    </div>
  </div>
   <div class="panel">
    <div class="panel-heading">
      <div class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
       	 	<h4 class="Recording-Arts">
				Recording Arts
           </h4>
        </a>
      </div>
    </div>
    <div id="collapseFour" class="panel-collapse collapse">
      <div class="panel-body"> 
       	<h5>
        {{ $recording_arts_headline }}
        </h5>
       	{{ $recording_arts_description }}
      </div>
    </div>
  </div>
 <div class="panel selected">
    <div class="panel-heading">
      <div class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
       	 	<h4 class="computer-animation">
				Computer Animation
           </h4>
        </a>
      </div>
    </div>
    <div id="collapseFive" class="panel-collapse collapse">
      <div class="panel-body"> 
      	<h5>
        {{ $computer_animaton_headline }}
        </h5>
        {{ $computer_anmition_description }}
      </div>
    </div>
  </div>
   <div class="panel">
    <div class="panel-heading">
      <div class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
       	 	<h4 class="game-production">
				Game Production
           </h4>
        </a>
      </div>
    </div>
    <div id="collapseSix" class="panel-collapse collapse">
      <div class="panel-body"> 
      	<h5>
        {[ $game_production_headline }}
        </h5> 
        {{ $game_production_description }}
      </div>
    </div>
  </div>
 <div class="panel">
    <div class="panel-heading">
      <div class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
       	 	<h4 class="mp">
				Music Production
           </h4>
        </a>
      </div>
    </div>
    <div id="collapseSeven" class="panel-collapse collapse">
      <div class="panel-body"> 
      	<h5>
        {{ $music_production_headline }}
        </h5>
       	{{ $music_production_description }}
      </div>
    </div>
  </div>
  <div class="panel">
    <div class="panel-heading">
      <div class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseEight">
       	 	<h4 class="business">
        	 	Entertainmenrt Business
           </h4>
        </a>
      </div>
    </div>
    <div id="collapseEight" class="panel-collapse collapse">
      <div class="panel-body"> 
      	<h5>
        {{ $entertainment_business_headline }}
        </h5>
        {{ $entertainment_business_description }}
      </div>
    </div>
  </div>
</div>
</article>
		<footer class="row">
		<p class="col-sm-12" style="text-align:center;">
			
				ACCREDITED BY ACCSC &8226; Financial Aid and Military Benefits available to those who qualify.
		</p>

		<p class="col-sm-12" style="text-align:center;">
				*Laptop brand and software dependent on program. For more information on our programs and their outcomes, go to lafilm.edu/disclosures. Accredited College, ACCSC. VA-Approved by CSAAVE. Member of the Servicemembers Opportunity College Consortium. &#169; 2014 The Los Angeles Film School. All rights reserved. The term "The Los Angeles Film School" and The Los Angeles Film School logo are either service marks or registered service marks of The Los Angeles Film School. View our Privacy Policy.
		</p>

	</footer>
	<script>
    	
		$(document).ready(function() {
            $('.panel-heading').on('click', function(){
					$('.panel-heading.open').removeClass('open');
					$(this).addClass('open');
				});
        });
		
    </script>
  </body>

</html>