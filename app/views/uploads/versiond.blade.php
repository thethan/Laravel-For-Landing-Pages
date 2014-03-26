       <?php 
			extract($variables);
		?>
<!DOCTYPE html>
<html>
  <head>
    <title>{{ $landing_title }}</title>
    <script type="text/javascript" src="http://fast.fonts.net/jsapi/b75b8f60-98a5-48c0-9f59-c933fbf22789.js"></script>
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1">
	<meta name = "apple-mobile-web-app-capable" content = "yes" /> 
			<style type="text/css">
			.iosSlider {
				min-width: 100%;
				height: 380px;
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
			

			.iosSlider .slider .item .text1 
			{
				position: absolute;
				top: 30px;
				right: 150px;
				opacity: 0;
				filter: alpha(opacity:0);
				background: #000;
			}
			
			.iosSlider .slider .item .text1 span 
			{
				color: #fff;
				font: bold 50px/60px "Helvetica Neue",Helvetica,Arial,sans-serif;
				padding: 0 8px;
			}
			
			.iosSlider .slider .item .text2 
			{
				position: absolute;
				top: 90px;
				right: 0;
				opacity: 
				filter: alpha(opacity:0);
				background: #000;
				padding: 5px 7px 7px 7px;
			}
			
			.iosSlider .slider .item .text2 span 
			{
				color: #fff;
				font: normal 16px/20px "Helvetica Neue",Helvetica,Arial,sans-serif;	
			}

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


			}
			
			.iosSliderButtons .selected 
			{
				background: #2ba4ff;
				opacity: 1;
				filter: alpha(opacity:100);
			}
						.iosSlider .prevButton {
				position: absolute;
				top: 130px;
				left: 0;
				width: 20px;
				height: 40px;
				color:#FFF;
				z-index: 2;
			}
			
			.iosSlider .nextButton {
				position: absolute;
				top: 130px;
				right: 0;
				width: 20px;
				height: 40px;
				color:#FFF;
				z-index: 2;
			}
			
			.prevSlide, .nextSlide {
				color:#fff;
				float:left;
			}
			.prevSlide {
					margin: 0 11px 0 0;
				}
			</style>
    <!-- Bootstrap -->
    <link href="<?php echo asset('assets/css/bootstrap.min.css') ;?>" rel="stylesheet">
    <link href="<?php echo asset('assets/css/versiond.css') ;?>" rel="stylesheet">
    <link href="<?php echo asset('assets/css/autocomplete.css') ;?>" rel="stylesheet">
    <link href="<?php echo asset('assets/css/form.css') ;?>" rel="stylesheet">
    <script src="https://code.jquery.com/jquery.js"></script>
	<script src="<?php echo asset('assets/js/jquery.ui.js') ;?>"></script>
	<script type="text/javascript" src = "<?php echo asset('assets/js/jquery.validate.js') ;?>"></script>
	<script type="text/javascript" src = "<?php echo asset('assets/js/jquery.easing-1.3.js') ;?>"></script>
	<script src = "<?php echo  asset('assets/js/jquery.iosslider.js') ;?>"></script>

	
	<script type="text/javascript">
			$(document).ready(function() {
			
				$('.iosSlider').iosSlider({
					autoSlide: true,
					scrollbar: false,
					snapToChildren: true,
					desktopClickDrag: false,
					scrollbarLocation: 'top',
					scrollbarBorderRadius: '0',
					responsiveSlideWidth: true,
					navSlideSelector: $('.iosSliderButtons .button'),
					navPrevSelector: $('.prevSlide'),
					navNextSelector: $('.nextSlide'),
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
  	<section class="container">
  		<header class="row">  			
  			<div class="col-md-8">
  				<div class="col-md-1 col-xs-1" id='icon'>
               </div>
               <div class="col-md-11 col-xs-11">
  					<h2 class="">
  						<span id="college">{{ $college }}</span>
  					</h2>
                </div>
  			</div>
  					<h3 class="col-md-4"><a href="tel:+13174562564"> <span>CALL NOW!</span> 877-9LA-FILM </a> </h3>
  		</header>

   <div class = 'iosSlider row'>
		
		
			<div class = 'slider'>
			
				<?php echo $slideritems; ?>
				
			
			</div>


			<div class = 'iosSliderButtons hidden-sm hidden-xs'>
            	<div class="glyphicon glyphicon-chevron-left prevSlide"></div>
				<?php echo $sliderbuttons;?>
              <div class="glyphicon glyphicon-chevron-right nextSlide"></div>  
			</div>
		</div>

  		<div class="row container"> 
  			<aside class="col-xs-12 col-sm-6 col-md-5 col-lg-4 pull-right" > 
						<div id="formbox" class="col-md-12 col-xs-12 col-xs-12">
							<?php echo $form; ?>
                      </div>
				<?php
					if($slug !== 'entertainment-business'){ ?>
                        <div id="launchbox" class="col-md-12 col-xs-12 center-block hidden-xs">
						<img src="<?php echo asset('assets/img/ad.png');?> " id="comp" />
								<h5>
									A Laptop for Every Student*
								</h5>
										<h6> 	We outfit you with a laptop computer and software package so you can 			take your work anywhere! 
										</h6>
							</div>
                    <?php } ?>
			</aside>

  				<article class="col-md-6 col-lg-7 col-sm-5  ">
						<h1>
							{{ $headline }}
						</h1>
					<p class="line-height">
							{{ $description }}
					</p>
				

			<div class="row">
				<div class="col-md-12 col-lg-6 col-sm-12">
                <div class="col-md-12">
							<h2>{{ $block1_title }}</h2>
							<h3> 
									{{ $block1_subheading }}	
							</h3>

							<p>{{ $block1_desc }}
							</p>
						</div>
                      <div class="col-md-12">
							<h2>{{ $block2_title }}</h2>
							<h3> 
									{{ $block2_subheading }}	
							</h3>

							<p>{{ $block2_desc }}
							</p>
						</div>
                                      <div class="col-md-12">
							<h2>{{ $block3_title }}</h2>
							<h3> 
									{{ $block3_subheading }}	
							</h3>

							<p>{{ $block3_desc }}
							</p>
						</div>

						
					</div>
						<div id="careerbox" class="col-md-6 col-sm-12">
								<h3>{{ $careertitle }}</h3>
                                {{ $careerbox }}
															
						</div>




				</div>
			</article>


	<div class="clear"></div>
	</div>
	<footer class="row">
		 <div class="col-md-12 center" style="margin:1em 0;"><img src="<?php echo asset('assets/img/bottomlogo.png');?>" /></div>
         {{ $disclaimer }}

	</footer>
	</section>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
   	<script src="<?php echo asset('assets/js/form.js');?>">
    </script>


  </body>

</html>
