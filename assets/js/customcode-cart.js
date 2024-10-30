
    var url = window.location.href;
    var cartitems = logico_ajax_data_cart.cartIds;
    var cartcolltitle = logico_ajax_data_cart.titles; 
    var cartsku = logico_ajax_data_cart.cartSKU; 
    var ty_orderamt = logico_ajax_data_cart.totalamount;
    var urlSite = window.location.href;
     var urlSrc = urlSite.match(/^http:\/\/[^/]+/);
     var campaignId = logico_ajax_data_cart.campaignId;


    //console.log(cartitems);
    //console.log(cartcolltitle);
    //console.log(cartsku);
    //console.log(ty_orderamt); 
    //console.log(campaignId);

    rtgsettings ={
        'pdt_id': cartitems,
        'pdt_sku':cartsku,
        'pdt_category_list': cartcolltitle,
        'pdt_url': url,
        'ty_orderamt':ty_orderamt,
        'ty_orderdate':'$ty_orderdate$',
        'ty_orderstatus':'$ty_orderstatus$',
        'pagetype': 'basket',
        'key': 'SPY',
        'token': campaignId,
        'layer': 'iframe'
    };
    (function(d) {
    var s = d.createElement('script'); s.async = true;s.id='madv2014rtg';s.type='text/javascript';
    s.src = (d.location.protocol == 'https:' ? 'https:' : 'http:') + '//apppartner.mainad.com/shopify-js/main-min.js';
    var a = d.getElementsByTagName('script')[0]; a.parentNode.insertBefore(s, a);
    }(document));