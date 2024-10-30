//console.log(logico_ajax_data_checkout.checkout_data);

var proID = logico_ajax_data_checkout.checkout_data.cartid; 
var SKU = logico_ajax_data_checkout.checkout_data.productsku; 
var price = logico_ajax_data_checkout.checkout_data.checkoutamount; 
var orderid = logico_ajax_data_checkout.checkout_data.orderid; 
var orderstatus = logico_ajax_data_checkout.checkout_data.orderstatus; 
var ordercurrency = logico_ajax_data_checkout.checkout_data.ordercurrency; 
var orderdate = logico_ajax_data_checkout.checkout_data.orderdate; 
var ordercustomer = logico_ajax_data_checkout.checkout_data.ordercustomer; 
var urlSite = window.location.href;
 var urlSrc = urlSite.match(/^http:\/\/[^/]+/);

//console.log(proID);
//console.log(SKU);
//console.log(orderid);
//console.log(orderstatus);
//console.log(ordercurrency);
//console.log(orderdate);
//console.log(ordercustomer);

rtgsettings ={
	'pdt_id': proID,
	'pdt_sku': SKU,
	'pdt_category_list': '$pdt_category_list$',
	'ty_orderid':orderid, 
	'ty_orderamt':price,
	'ty_orderdate':orderdate,
	'ty_orderstatus':orderstatus,
	'ty_googleclickid':'$ty_googleclickid$', 
	'ty_appmetadata':'$ty_appmetadata$',
	'ty_rawdeviceid':'$ty_rawdeviceid$',
	'ty_osname':'$ty_osname$',
	'ty_devicemodel':'$ty_devicemodel$',
	'ty_cusid':ordercustomer,
	'ty_currency':ordercurrency,
	'ty_custype':'$ty_custype$',
	'ty_cuscoupon':'$ty_ cuscoupon$',
	'pagetype': 'checkout',
	'key': 'SPY',
	'token': 'test_app',
	'layer': 'iframe'
};
(function(d) {
var s = d.createElement('script'); s.async = true;s.id='madv2014rtg';s.type='text/javascript';
s.src = (d.location.protocol == 'https:' ? 'https:' : 'http:') + '//apppartner.mainad.com/shopify-js/main-min.js';
var a = d.getElementsByTagName('script')[0]; a.parentNode.insertBefore(s, a);
}(document));