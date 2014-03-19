// JavaScript Document

$(document).ready(function(){
	

			$('#rfiform').validate({
						
						rules: {
								email: {
									required: true, 
									email: true
									},
								FirstName: {
									required: true, 
									},
								LastName: {
									required: true, 
									},
								Country: {
									required: true, 
									},
								Phone: {
									required: true, 
									},
								program: {
									required: true, 
									},
								PostalCodeorZip: {
									required: true,
									},
								agency: {
									required: true,
									},
								PreviousEducation: {
									required:true,
									}
							},
						 messages: {
							 	email: "Email you entered is not valid", 
								required: "Email is a required field"
							 },
						  submitHandler: function() {
						 	$('#rfiform').fadeTo( "slow", 0.33 );
							$('#run-loading').show('slow');
							
						
                        $.ajax({
							
								url: 'forms/submit4LA', 
								type: "POST",
								data: $('#rfiform').serialize() , 
								
								dataType:"json", 
		
								success: function(data){
									window.location.href = "http://lafilm.edu/congratulations";
									
									//alert(data.res);
								}, 
								error: function(e){
									alert('error');
									$('#rfiform').fadeTo( "fast", 1 );
									}
								 
						});
						   }
						}
					);

       	var defaultpro = 'Program of Interest';
				var selected = $('.selectProgramBox').find(":selected").text();
				if(selected)
				{
					$('.selectProgram').text(selected);
				}
				$('.selectProgramBox').on('change',function(){
				   var defaultpro2 = $('.selectProgramBox').find(":selected").text(); 
					$('.selectProgram').text(defaultpro2);
					$('.selectProgram').addClass('valid');
				});
				
        	//var defaultage = $('.defualt-agency').text();
			var defaultage = 'Military / International';

				$('.selectAgency').text(defaultage);
				
				$('.selectAgencyBox').on('change',function(){
				   var defaultage2 = $('.selectAgencyBox').find(":selected").text(); 
					$('.selectAgency').text(defaultage2);
					$('.selectAgency').addClass('valid');
				});
				
        //	var defaulthighest = $('.defualt-highest').text();
			var defaulthighest = 'Highest Level of Education';
				$('.selectHighest').text(defaulthighest);
				
				$('.selectHighestBox').on('change',function(){
				   var defaulthighest2 = $('.selectHighestBox').find(":selected").text(); 
					$('.selectHighest').text(defaulthighest2);
					$('.selectHighest').addClass('valid');
					
				});	
				
			var countries = [
						{ value: 'USA', label: 'United States' },
						{ value: 'AF', label: 'Afghanistan' },
						{ value: 'AL', label: 'Albania' },
						{ value: 'DZ', label: 'Algeria' },
						{ value: 'AS', label: 'American Samoa' },
						{ value: 'AD', label: 'Andorra' },
						{ value: 'AO', label: 'Angola' },
						{ value: 'AI', label: 'Anguilla' },
						{ value: 'AQ', label: 'Antarctica' },
						{ value: 'AG', label: 'Antigua/Barbuda' },
						{ value: 'AR', label: 'Argentina' },
						{ value: 'AM', label: 'Armenia' },
						{ value: 'AQ', label: 'Aruba' },
						{ value: 'AU', label: 'Australia' },
						{ value: 'AT', label: 'Austria' },
						{ value: 'AZ', label: 'Azerbaijan' },
						{ value: 'BS', label: 'Bahamas' },
						{ value: 'BH', label: 'Bahrain ' },
						{ value: 'BD', label: 'Bangladesh' },
						{ value: 'BB', label: 'Barbados' },
						{ value: 'BY', label: 'Belarus' },
						{ value: 'BE', label: 'Belgium' },
						{ value: 'BZ', label: 'Belize' },
						{ value: 'BJ', label: 'Benin' },
						{ value: 'BM', label: 'Bermuda' },
						{ value: 'BT', label: 'Bhutan' },
						{ value: 'BO', label: 'Bolivia' },
						{ value: 'BA', label: 'Bosnia / Herzegovina' },
						{ value: 'BW', label: 'Botswana' },
						{ value: 'BV', label: 'Bouvet Island ' },
						{ value: 'BR', label: 'Brazil' },
						{ value: 'IO', label: 'British Indian Ocean Territory' },
						{ value: 'BN', label: 'Brunei Darussalam' },
						{ value: 'BG', label: 'Bulgaria' },
						{ value: 'BF', label: 'Burkina Faso' },
						{ value: 'BI', label: 'Burundi' },
						{ value: 'KH', label: 'Cambodia' },
						{ value: 'CM', label: 'Cameroon' },
						{ value: 'CAN', label: 'Canada' },
						{ value: 'CV', label: 'Cape Verde' },
						{ value: 'KY', label: 'Cayman Islands' },
						{ value: 'CF', label: 'Central African Republic' },
						{ value: 'TD', label: 'Chad' },
						{ value: 'CL', label: 'Chile' },
						{ value: 'CM', label: 'China' },
						{ value: 'CX', label: 'Christmas Island' },
						{ value: 'CC', label: 'Cocos (Keeling) Islands' },
						{ value: 'CO', label: 'Colombia' },
						{ value: 'KM', label: 'Comoros' },
						{ value: 'CG', label: 'Congo' }, 
						{ value: 'CD', label: 'Congo, Democratic Republic' },
						{ value: 'CK', label: 'Cook Islands' },
						{ value: 'CR', label: 'Costa Rica' },
						{ value: 'CI', label: 'Cote d\'Ivoire (Ivory Coast)' },
						{ value: 'HR', label: 'Croatia' },
						{ value: 'CU', label: 'Cuba' },
						{ value: 'CY', label: 'Cyprus' },
						{ value: 'CZ', label: 'Czech Republic' },
						{ value: 'CS', label: 'Czechoslovakia (former)' },
						{ value: 'DK', label: 'Denmark' },
						{ value: 'DJ', label: 'Djibouti' },
						{ value: 'DM', label: 'Dominica' },
						{ value: 'DO', label: 'Dominican Republic' },
						{ value: 'TP', label: 'East Timor' },
						{ value: 'EC', label: 'Ecuador' },
						{ value: 'EG', label: 'Egypt' },
						{ value: 'SV', label: 'El Salvador' },
						{ value: 'GQ', label: 'Equatorial Guinea' },
						{ value: 'ER', label: 'Eritrea' },
						{ value: 'EE', label: 'Estonia' },
						{ value: 'ET', label: 'Ethiopia' },
						{ value: 'MK', label: 'F.Y.R.O.M. (Macedonia)' },
						{ value: 'FK', label: 'Falkland Islands' },
						{ value: 'FO', label: 'Faroe Islands' },
						{ value: 'FJ', label: 'Fiji' },
						{ value: 'FI', label: 'Finland' },
						{ value: 'FR', label: 'France' },
						{ value: 'FX', label: 'France, Metropolitan' },
						{ value: 'GF', label: 'French Guiana' },
						{ value: 'PF', label: 'French Polynesia' },
						{ value: 'TF', label: 'French Southern Territories' },
						{ value: 'GA', label: 'Gabon' },
						{ value: 'GM', label: 'Gambia' },
						{ value: 'GE', label: 'Georgia (Soviet)' },
						{ value: 'DE', label: 'Germany' },
						{ value: 'GH', label: 'Ghana' },
						{ value: 'GI', label: 'Gibraltar' },
						{ value: 'GB', label: 'Great Britain (UK)' },
						{ value: 'GR', label: 'Greece' },
						{ value: 'GL', label: 'Greenland' },
						{ value: 'GD', label: 'Grenada' },
						{ value: 'GP', label: 'Guadeloupe' },
						{ value: 'GU', label: 'Guam' },
						{ value: 'GT', label: 'Guatemala' },
						{ value: 'GN', label: 'Guinea' },
						{ value: 'GB', label: 'Guinea-Bissau' },
						{ value: 'GY', label: 'Guyana' },
						{ value: 'HT', label: 'Haiti' },
						{ value: 'HM', label: 'Heard and McDonald Islands' },
						{ value: 'HN', label: 'Honduras' },
						{ value: 'HK', label: 'Hong Kong' },
						{ value: 'HU', label: 'Hungary' },
						{ value: 'IS', label: 'Iceland' },
						{ value: 'IN', label: 'India' },
						{ value: 'ID', label: 'Indonesia' },
						{ value: 'IR', label: 'Iran' },
						{ value: 'IQ', label: 'Iraq' },
						{ value: 'IE', label: 'Ireland' },
						{ value: 'IL', label: 'Israel' },
						{ value: 'IT', label: 'Italy' },
						{ value: 'JM', label: 'Jamaica' },
						{ value: 'JP', label: 'Japan' },
						{ value: 'JO', label: 'Jordan ' },
						{ value: 'KZ', label: 'Kazakhstan ' },
						{ value: 'KE', label: 'Kenya' },
						{ value: 'KI', label: 'Kiribati' },
						{ value: 'KP', label: 'Korea (North)' },
						{ value: 'KR', label: 'Korea (South)' },
						{ value: 'KW', label: 'Kuwait' },
						{ value: 'KG', label: 'Kyrgzstan' },
						{ value: 'LA', label: 'Laos' },
						{ value: 'LV', label: 'Latvia' },
						{ value: 'LB', label: 'Lebanon' },
						{ value: 'LS', label: 'Lesotho' },
						{ value: 'LR', label: 'Liberia' }, 
						{ value: 'LY', label: 'Libya' },
						{ value: 'LI', label: 'Liechtenstein' },
						{ value: 'LT', label: 'Lithuania' },
						{ value: 'LU', label: 'Luxembourg' },
						{ value: 'MO', label: 'Macau' },
						{ value: 'MG', label: 'Madagascar' },
						{ value: 'MW', label: 'Malawi' },
						{ value: 'MY', label: 'Malaysia' },
						{ value: 'MV', label: 'Maldives' },
						{ value: 'ML', label: 'Mali' },
						{ value: 'MT', label: 'Malta' },
						{ value: 'MH', label: 'Marshall Islands' },
						{ value: 'MQ', label: 'Martinique' },
						{ value: 'MR', label: 'Mauritania' },
						{ value: 'MU', label: 'Mauritius' },
						{ value: 'YT', label: 'Mayotte' },
						{ value: 'MX', label: 'Mexico' },
						{ value: 'FM', label: 'Micronesia' },
						{ value: 'MD', label: 'Moldova' },
						{ value: 'MC', label: 'Monaco' },
						{ value: 'MN', label: 'Mongolia' },
						{ value: 'MS', label: 'Montserrat' },
						{ value: 'MA', label: 'Morocco' },
						{ value: 'MZ', label: 'Mozambique' },
						{ value: 'MM', label: 'Myanmar' },
						{ value: 'NA', label: 'Namibia' },
						{ value: 'NR', label: 'Nauru' },
						{ value: 'NP', label: 'Nepal' },
						{ value: 'NL', label: 'Netherlands' },
						{ value: 'AN', label: 'Netherlands Antilles' },
						{ value: 'NT', label: 'Neutral Zone' },
						{ value: 'NC', label: 'New Caledonia' },
						{ value: 'NZ', label: 'New Zealand' },
						{ value: 'NI', label: 'Nicaragua' },
						{ value: 'NE', label: 'Niger' },
						{ value: 'NG', label: 'Nigeria' },
						{ value: 'NU', label: 'Niue' },
						{ value: 'NF', label: 'Norfolk Island' },
						{ value: 'MP', label: 'Northern Mariana Islands' },
						{ value: 'NO', label: 'Norway' },
						{ value: 'OM', label: 'Oman' },
						{ value: 'PK', label: 'Pakistan' },
						{ value: 'PA', label: 'Panama' },
						{ value: 'PG', label: 'Papua New Guinea' },
						{ value: 'PY', label: 'Paraguay' },
						{ value: 'PE', label: 'Peru' },
						{ value: 'PH', label: 'Philippines' },
						{ value: 'PN', label: 'Pitcairn' },
						{ value: 'PL', label: 'Poland' },
						{ value: 'PT', label: 'Portugal' },
						{ value: 'PA', label: 'Puerto Rico' }, 
						{ value: 'QA', label: 'Qatar' },
						{ value: 'RE', label: 'Reunion' },
						{ value: 'RO', label: 'Romania' }, 
						{ value: 'RU', label: 'Russia' },
						{ value: 'RW', label: 'Rwanda' },
						{ value: 'GS', label: 'S. Georgia and S. Sandwich Isls.' },
						{ value: 'KN', label: 'Saint Kitts and Nevis' },
						{ value: 'LC', label: 'Saint Lucia' },
						{ value: 'VC', label: 'Saint Vincent & the Grenadines' },
						{ value: 'WS', label: 'Samoa' },
						{ value: 'SM', label: 'San Marino' },
						{ value: 'ST', label: 'Sao Tome and Principe' },
						{ value: 'SA', label: 'Saudi Arabia' },
						{ value: 'SCO', label: 'Scotland' },
						{ value: 'SC', label: 'Seychelles' },
						{ value: 'SL', label: 'Sierra Leone' },
						{ value: 'SG', label: 'Singapore' },
						{ value: 'SK', label: 'Slovakia' },
						{ value: 'SI', label: 'Slovenia' },
						{ value: 'SO', label: 'Somalia' },
						{ value: 'ZA', label: 'South Africa' },
						{ value: 'SU', label: 'Soviet Union (former)' },
						{ value: 'ES', label: 'Spain' },
						{ value: 'LK', label: 'Sri Lanka' },
						{ value: 'SH', label: 'St. Helena' },
						{ value: 'PM', label: 'St. Pierre and Miquelon' },
						{ value: 'SD', label: 'Sudan' },
						{ value: 'SN', label: 'Suriname' },
						{ value: 'SJ', label: 'Svalbard & Jan Mayen Islands' },
						{ value: 'SZ', label: 'Swaziland' },
						{ value: 'SE', label: 'Sweden' },
						{ value: 'CH', label: 'Switzerland' },
						{ value: 'SY', label: 'Syria' },
						{ value: 'TW', label: 'Taiwan' },
						{ value: 'TJ', label: 'Tajikistan' },
						{ value: 'TZ', label: 'Tanzania' },
						{ value: 'TH', label: 'Thailand' },
						{ value: 'TG', label: 'Togo' },
						{ value: 'TK', label: 'Tokelau' },
						{ value: 'TO', label: 'Tonga' },
						{ value: 'TT', label: 'Trinidad / Tobago' }, 
						{ value: 'TN', label: 'Tunisia' },
						{ value: 'TR', label: 'Turkey' },
						{ value: 'TM', label: 'Turkmenistan' },
						{ value: 'TC', label: 'Turks and Caicos Islands' },
						{ value: 'TV', label: 'Tuvalu' },
						{ value: 'UG', label: 'Uganda' },
						{ value: 'UA', label: 'Ukraine' },
						{ value: 'AE', label: 'United Arab Emirates' },
						{ value: 'UK', label: 'United Kingdom' },
						{ value: 'UY', label: 'Uruguay' },
						{ value: 'UM', label: 'US Minor Outlying Islands' },
						{ value: 'UZ', label: 'Uzbekistan' },
						{ value: 'VU', label: 'Vanuatu' },
						{ value: 'VA', label: 'Vatican City State (Holy Sea)' },
						{ value: 'VE', label: 'Venezuela' },
						{ value: 'VN', label: 'Vietnam ' },
						{ value: 'VG', label: 'Virgin Islands (British)' },
						{ value: 'VI', label: 'Virgin Islands (US)' },
						{ value: 'WF', label: 'Wallis and Futuna Islands' },
						{ value: 'WI', label: 'West Indies' },
						{ value: 'EH', label: 'Western Sahara' },
						{ value: 'YE', label: 'Yemen' },
						{ value: 'YU', label: 'Yugoslavia (Serbia)' },
						{ value: 'ZR', label: 'Zaire' },
						{ value: 'ZM', label: 'Zambia ' },
						{ value: 'ZW', label: 'Zimbabwe' },
			  ];
$( ".country" ).autocomplete({
      source: countries,
      focus: function( event, ui ) {
        $( ".country" ).val( ui.item.label );
        return false;
      },
      select: function( event, ui ) {
        $( ".country" ).val( ui.item.label );
        $( "#country-id" ).val( ui.item.value );
         $( "#country-tour-id" ).val( ui.item.value );

 
        return false;
      }
    })
    .data( "ui-autocomplete" )._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append( "<a>" + item.label +"</a>" )
        .appendTo( ul );
    };		
	});




  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-2602072-2']);
  _gaq.push(['_setDomainName', 'lafilm.edu']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();


		