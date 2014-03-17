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
			/*
			.iosSlider .slider #item1 
			{
				background: url('img/slider/A/image1.png') no-repeat 50% 0 ;
				background-size:100%;
				
			}
			

			.iosSlider .slider #item2 {
				background: url('img/slider/A/image2.png')  no-repeat 50% 0;
				background-size:100%;
			}
			
			.iosSlider .slider #item3 
			{
				background: url('img/slider/A/image3.png')  no-repeat 50% 0;
				background-size:100%;
			}
			
			.iosSlider .slider #item4 
			{
				background: url('img/slider/A/image4.png')  no-repeat 50% 0;
				background-size:100%;
			}

			.iosSlider .slider #item5 
			{
				background: url('img/slider/A/image5.png')  no-repeat 50% 0;
				background-size:100%;
			}

			.iosSlider .slider #item6 
			{
				background: url('img/slider/A/image6.png')  no-repeat 50% 0;
				background-size:100%;
			}

			.iosSlider .slider #item7 
			{
				background: url('img/slider/A/image7.png')  no-repeat 50% 0;
				background-size:100%;
			}

			.iosSlider .slider #item8 
			{
				background: url('img/slider/A/image8.png')  no-repeat 50% 0;
				background-size:100%;
			}

			.iosSlider .slider #item9 
			{
				background: url('img/slider/A/image9.png')  no-repeat 50% 0;
				background-size:100%;
			}

			.iosSlider .slider #item10 
			{
				background: url('img/slider/A/image10.png')  no-repeat 50% 0;
				background-size:100%;
			}

			.iosSlider .slider #item11 
			{
				background: url('img/slider/A/image11.png')  no-repeat 50% 0;
				background-size:100%;
			}

			.iosSlider .slider #item12 
			{
				background: url('img/slider/A/image12.png')  no-repeat 50% 0;
				background-size:100%;
			}

			.iosSlider .slider #item13 
			{
				background: url('img/slider/A/image13.png')  no-repeat 50% 0;
				background-size:100%;
			}

			.iosSlider .slider #item14 
			{
				background: url('img/slider/A/image14.png')  no-repeat 50% 0;
				background-size:100%;
			}
			*/


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
				opacity: 0;
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
				margin: 0 10px 0 0;
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
		</style>
    <!-- Bootstrap -->
    <link href="<?php echo asset('assets/css/bootstrap.min.css') ;?>" rel="stylesheet">
    <link href="<?php echo asset('assets/css/versiona.css') ;?>" rel="stylesheet">
    <script src="https://code.jquery.com/jquery.js"></script>
	<script src="<?php echo asset('assets/js/bootstrap.min.js') ;?>"></script>
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
  			<div class="col-md-9">
  				<div class="col-md-1 col-xs-1" id='icon'></div>
  					<h2 class="col-md-11 col-xs-11">
  						<span id="college">{{ $college }}</span>
  					</h2>
  			</div>
  			<h3 class="col-md-3"><a href="tel:+13174562564"> CALL NOW! 877-9LA-FILM </a> </h3>
  		</header>

   <div class = 'iosSlider row'>
		
		
			<div class = 'slider'>
			
				<?php echo $slideritems; ?>
				
			
			</div>
			
			<div class = 'iosSliderButtons hidden-sm hidden-xs'>
				<?php echo $sliderbuttons;?>
			</div>
		</div>

  		<div class="row container"> 
  			<aside class="col-xs-12 col-sm-6 col-md-5 col-lg-4 pull-right hidden-xs" > 
						<div id="formbox" class="col-md-12 col-xs-12 col-xs-12">
							<?php echo $form; ?>
                      </div>
						<div id="launchbox" class="col-md-12 col-xs-12 center-block">
						<img src="../img/Ad.png" id="comp" />
								<h5>
									A Laptop for Every Student*
								</h5>
										<h6> 	We outfit you with a laptop computer and software package so you can 			take your work anywhere! 
										</h6>
							</div>
			</aside>
            <aside class="col-xs-12 col-sm-6 col-md-5 col-lg-4 hidden-sm hidden-md hidden-lg hidden-xl" > 
						<div id="formbox" class="col-md-12 col-xs-12 col-xs-12">
							<?php echo $form; ?>
                      </div>
						<div id="launchbox" class="col-md-12 col-xs-12 center-block hidden-mobile">
						<img src="../img/Ad.png" id="comp" />
								<h5>
									A Laptop for Every Student*
								</h5>
										<h6> 	We outfit you with a laptop computer and software package so you can 			take your work anywhere! 
										</h6>
							</div>
			</aside>
  				<article class="col-md-6 col-lg-6 col-sm-5  ">
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
									{{ $block1_subheading }}	
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
		 {{ $disclaimer }}

	</footer>
	</section>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
   	<script>
    	$(document).ready(function(e) {
               $('#rfisubmit').click(function(){

							//e.preventDefault();
							var data = $('#rfiform').serialize();
								 $.ajax({
								  type: "POST",
								  url: "<?php echo route('formers.store');?>", //i put my public in "localhost/laravel/public/"
								  cache: false,
								  data: data,
								  success: function(data) {
									return alert('boom');
									//location.reload();
									
								  },
								  error: function(response) {
									return alert("ERROR:" + response.responseText);
								  }
								});
									
							
				});
        });
    </script>

  </body>

</html>