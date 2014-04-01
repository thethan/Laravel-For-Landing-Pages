	<?php
			if (Auth::check())
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
			
			$asmp ='';
			$asf = '';
			$bseb = '';
			$asra = '';
			$bsave = '';
			$bsgpd = '';
			$bsdf = '';
			$bsebo = '';
			
			
			if(!$slug){$slug == '';}
			switch ($slug)
			{
				case 'mp':
				case 'mp-mobile':
					$asmp = 'selected';
				break;
				case 'film':
				case 'film-mobile':
					$asf = 'selected';
				break;
				case 'animation':
				case 'animation-mobile':
					$bsave = 'selected';
				break;
				case 'game-production':
				case 'game-mobile':
					$bsgpd = 'selected';
				break;
				case 'entertainment-business':
				case 'business-mobile':
					$bseb = 'selected';
				break;
				case 'recording-arts':
				case 'recording-arts-mobile':
					$asra = 'selected';
				break;
				case 'digital-filmmaking':
				case 'digital-filmmaking-mobile':
					$bsdf ='selected';
				break;
				case 'entertainment-business-online':
				case 'entertainment-business-online-mobile':
					$bsebo ='selected';
				break;
				default:
				break;
			}
			?>
<form id="rfiform" method="post" name="info">
			<h3>Request <span>Free</span> Information</h3>
               <div class="col-md-12">
                 <div class="styled-select selectDiv">	
                    <span class="selectDefault selectProgram">Program of Interest <span class="caret pull-right"></span></span>
                        <select name="program" id="AdProgramID" class="col-md-12 col-sm-12 selectProgramBox"  required>
                            <option></option>
                            <optgroup label="Campus Programs">
                                <option {{$asf}} value="ASF">Film</option>
                                
                                <option {{$bseb }} value="BSEB">Entertainment Business</option>
                                <option {{$asra}} value="ASRA">Recording Arts</option>
                                <option {{$bsgpd}} value="BGSPD">Game Production</option>
                                <option {{$bsave}} value="BSAVE">Computer Animation</option>
                                <option {{$asmp}} value="ASMP">Music Production</option>
                           </optgroup>
                          <optgroup label="Online Programs">
                          	<option {{$bsdf }} value="BSDC-O">Digital Filmmaking</option>
                             <option {{$bsebo }} value="BSEB-O">Entertainment Business</option>
                          </optgroup>
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
        <script>
 
	
				
        </script>
   
        <div id="run-loading"></div>