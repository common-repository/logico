  
  var url = window.location.href;
  var res = url.split('/');

  var newdata = logico_ajax_data_shop.product_ids;
  var campaignId = logico_ajax_data_shop.campaignId;
  var urlSite = window.location.href;
  var urlSrc = urlSite.match(/^http:\/\/[^/]+/);
  //console.log(newdata);
  //console.log(campaignId);
  //console.log(res[3]);
  //console.log(url);
  rtgsettings ={
     'pdt_url': url,
     'pdt_category_list': res[3],
     'pdt_id': newdata,
     'pagetype': 'category',
     'key': 'SPY',
     'token': campaignId,
     'layer': 'iframe'
   };
  (function(d) {
   var s = d.createElement('script'); s.async = true;s.id='madv2014rtg';s.type='text/javascript';
   s.src = (d.location.protocol == 'https:' ? 'https:' : 'http:') + '//apppartner.mainad.com/shopify-js/main-min.js';
   var a = d.getElementsByTagName('script')[0]; a.parentNode.insertBefore(s, a);
  }(document));