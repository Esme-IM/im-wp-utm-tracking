(function($) {
	function setCookie(cname, cvalue, exdays){
	  var d = new Date();
	  d.setTime(d.getTime() + (exdays*24*60*60*1000));
	  var expires = "expires="+ d.toUTCString();
	  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
	}
	function getCookie(cname) {
	  let name = cname + "=";
	  let decodedCookie = decodeURIComponent(document.cookie);
	  let ca = decodedCookie.split(';');
	  for(let i = 0; i <ca.length; i++) {
		let c = ca[i];
		while (c.charAt(0) == ' ') {
		  c = c.substring(1);
		}
		if (c.indexOf(name) == 0) {
		  return c.substring(name.length, c.length);
		}
	  }
	  return "";
	}
	window.addEventListener('DOMContentLoaded', (event) => {
		console.log('loaded');
			var referrer = document.referrer;
			var currentHostname = window.location.hostname;
			var params = new URLSearchParams(window.location.search);
			var utm_source = params.get('utm_source');
			var utm_medium = params.get('utm_medium');
			var utm_campaign = params.get('utm_campaign');
			var utm_id = params.get('utm_id');
			var utm_term = params.get('utm_term');
			var utm_content = params.get('utm_content');
			console.log(params);
			console.log(utm_source);

			  if (utm_source){
					setCookie("utm_source",utm_source, 1);
					if (utm_medium){
						setCookie("utm_medium",utm_medium, 1);
					} else {
						setCookie("utm_medium",'', 0);
					}
					if (utm_campaign){
						setCookie("utm_campaign",utm_campaign, 1);
					} else {
						setCookie("utm_campaign",'', 0);
					}
					if (utm_id){
						setCookie("utm_id",utm_id, 1);
					} else {
						setCookie("utm_id",'', 0);
					}
					if (utm_term){
						setCookie("utm_term",utm_term, 1);
					} else {
						setCookie("utm_term",'', 0);
					}
					if (utm_content){
						setCookie("utm_content",utm_content, 1);
					} else {
						setCookie("utm_content",'', 0);
					}
			  } else {
					//do nothing - this is to prevent javascript errors
			  }
	});
	
	
	var utm_array = [
		'utm_source',
		'utm_medium',
		'utm_campaign',
		'utm_id',
		'utm_term',
		'utm_content',		
	];
	if($('.wpforms-field-container').length){
		$.each(utm_array,function(key, value){
			var utm_field = $('input[value=#cookieplaceholder-'+value+']','.wpforms-field-container');
			var utm_cookie = getCookie(value);
			console.log(utm_field);
			console.log(utm_cookie);
			if(utm_field.length && utm_field != ''){	
				utm_field.val(utm_cookie);
			} else {
				utm_field.val('');
			}
			//var utm_field = $('.'+value[0]+'>input','.wpforms-field-container');
			//var cookie = $.cookie(value[1]);
			/*if(utm_field.val() == false && cookie != false){	
				utm_field.val(cookie);
			}*/
		});
	}	
})( jQuery );