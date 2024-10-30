jQuery(document).ready(function(){
	
    //console.log(logico_ajax_data); 

	var url = window.location.href;

	 rtgsettings ={

	     'pdt_url': url,
	     'pagetype': 'home',
	     'key': 'SPY',
	     'token': logico_ajax_data.campaignId,
	     'layer': 'iframe'
	   };
	 (function(d) {
	   var s = d.createElement('script'); s.async = true;s.id='madv2014rtg';s.type='text/javascript';
	   s.src = (d.location.protocol == 'https:' ? 'https:' : 'http:') + '//apppartner.mainad.com/shopify-js/main-min.js';
	   var a = d.getElementsByTagName('script')[0]; a.parentNode.insertBefore(s, a);
	 }(document));
 });