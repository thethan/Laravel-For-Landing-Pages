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
    <link href="<?php echo asset('mobile.css" rel="stylesheet');?>">
    <link href=""<?php echo asset('assets/css/autocomplete.css');?>" rel="stylesheet">
    <link href=""<?php echo asset('assets/css/form.css');?>" rel="stylesheet">
    
    
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
 
  <body id="<?php echo $slug;?>">
  	
		<header class="row">
        	<div class="col-sm-12">
        		<h2>The <span>Los Angeles</span> Film School<span class="reg">&reg;</span></h2>
            	<h3 class="icon">College of Film</h3>
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
                  
			{{ $descrpition }}
             </div>  
       <div class="row" id="callus">
            <h4><a href="tel:+13174562564" class="col-sm-12 fill-div"> CALL US NOW </a></h4>
     </div>
            
                
<div class="panel-group row" id="accordion">

  <div class="panel">
    <div class="panel-heading col-sm-12">
      <div class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
       	 	<h4 class="rfi">
            
        	 	Request Information
           </h4>
        </a>
      </div>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body"> 
<?php echo $form;
        ?>
      </div>
    </div>
  </div>
  <div class="panel">
    <div class="panel-heading">
      <div class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
       	 	<h4 class="aboutprogram">
        	 	About This Program
           </h4>
        </a>
      </div>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body"> 
      	<h5>
        {{ $program_headlin }}
        </h5> 
		{{ $program_description }}
      </div>
    </div>
  </div>
   <div class="panel">
    <div class="panel-heading">
      <div class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
       	 	<h4 class="highlighted">
           
        	 	Highlighted Courses
           </h4>
        </a>
      </div>
    </div>
    <div id="collapseFour" class="panel-collapse collapse">
      <div class="panel-body"> 
       	<h5>
        {{ $highlighted_courses_headline }}
        </h5>
		{{ $highlighted_courses_description }}
      </div>
    </div>
  </div>
 <div class="panel selected">
    <div class="panel-heading">
      <div class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
       	 	<h4 class="gearandsoftware">
	          
        	 	Gear and Software
           </h4>
        </a>
      </div>
    </div>
    <div id="collapseFive" class="panel-collapse collapse">
      <div class="panel-body"> 
      	<h5>
        {{ $gear_and_software_headline}}
        </h5>
        {{ $gear_and_software_desc }}
      </div>
    </div>
  </div>
   <div class="panel">
    <div class="panel-heading">
      <div class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
       	 	<h4 class="careers">
            	
        		Careers
           </h4>
        </a>
      </div>
    </div>
    <div id="collapseSix" class="panel-collapse collapse">
      <div class="panel-body"> 
      	<h5>
        {{ $careers_headline }}
        </h5> 
		{{ $careers_desc }}
      </div>
    </div>
  </div>
 <div class="panel">
    <div class="panel-heading">
      <div class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
       	 	<h4 class="campus">
				 
        	 	Campus
           </h4>
        </a>
      </div>
    </div>
    <div id="collapseSeven" class="panel-collapse collapse">
      <div class="panel-body"> 
      
      	<h5>
        {{ $campus_headline }}
        </h5>
		{{ $campus_description }}
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