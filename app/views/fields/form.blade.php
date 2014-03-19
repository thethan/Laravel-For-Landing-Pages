<form name="info">
			<h3>Request <span>Free</span> Information</h3>
			<div class="styled-select">
					<?php 
						
					
					;?>
					<select name="program" id="AdProgramID" class="chosen-select" data-placeholder="Program of interest">
						<option value="">Program of Interest <span class="caret"></span></option>
                      <option value="ASF">Film</option>
						<option value="BSEB-HOLD">Entertainment Business</option>
						<option value="ASRA">Recording Arts</option>
						<option value="BSGPD-HOLD">Game Production</option>
						<option value="BSAVE-HOLD">Computer Animation</option>
						<option value="ASMP">Music Production</option>
					</select>
				</div>
                <div class="styled-select noback ">	
					<input type="text" placeholder="First Name*" name="FirstName" class="sFirstName half first" />
              
					<input type="text" placeholder="Last Name*" name="LastName" class="sLastName half" />
               </div>
               <div class="styled-select">
					<input type="text" placeholder="Zip/Post Code*" name="PostalCodeorZip" class="sPostalCode" />
               </div>
               <div class="styled-select">
					<input type="text" placeholder="Phone*" name="Phone" class="sPhone" />
               </div>
               <div class="styled-select">
					<input type="email" placeholder="Email Address*" name="email" class="sEmailAddress full" />
               </div>
               <div class="styled-select">
					<select name="agency" class="Agency full chosen-select" >
						<option value="" selected="">Military Affiliation/International Student</option>
						<option value="NON">US citizen with no military affiliation</option>
						<option value="ACT">Active duty, US Armed Forces</option>
						<option value="VET">Veteran of Armed Forces</option>
						<option value="MDEP">Military dependent using benefits, US Armed Forces</option>
						<option value="RESR">US citizen / Reservist or National Guard</option>
						<option value="INTL1">Non-US citizen with student VISA</option>
						<option value="INTL2">Non-US citizen without student VISA</option>
					</select>
				</div>
               <div class="styled-select">	
					<input  placeholder="Country*" class="country">
					<input type="hidden" name="Country" id="country-id" />
				</div>
                <div class="styled-select">
					<select name="PreviousEducation" class="AmPrevEducCode full chosen-select" >
							<option value="" selected="">Highest Level of Education</option>
							<option value="INHS">High School Student</option>
							<option value="HS">High School Graduate</option>
							<option value="COL">Attending College</option>
							<option value="AA/AS">Associate's Degree Completed</option>
							<option value="BA/BS">Bachelor's Degree Completed</option>
							<option value="MS">Master's Degree Completed</option>			
					</select>
              </div>
					<!--
					<div class="texting clear">
						<label for="texts">Sign up for text notifications</label>
						<input type="checkbox" id="texts" name="texts" />
					</div>
					-->
					
					<!--Lead source hidden value -->
					<input type="hidden" name="leadSource" value="<?php echo $_GET['LeadSoure'];?>" />
					<input type="hidden" name="format" value="LandingPages" />	

					
					<h6></h6>
					<p class="disclaimer">By submitting this form, you give The Los Angeles Film School and its partner schools your consent to contact you via phone, email and/or text using automated technology at the information above, including your wireless number, if provided, regarding educational services. Please note that you are not required to provide this consent to receive educational services. </p>

					x
			
		</form>	