       
       var url = window.location.href;
       var proId = logico_ajax_data_product.allData.pro_id;
       var proTitle = logico_ajax_data_product.allData.pro_title;
       var proPrice = logico_ajax_data_product.allData.saleprice;
       var procmpPrice = logico_ajax_data_product.allData.regularprice;
       var proImage = logico_ajax_data_product.allData.image;
       var proCate = logico_ajax_data_product.allData.pro_cat;
       var proDescription = logico_ajax_data_product.allData.pro_dis;
       var shopCurr =logico_ajax_data_product.allData.shopcurrency;
       var sku = logico_ajax_data_product.allData.proSKU;
       var ProInve = logico_ajax_data_product.allData.quantity;
       var urlSite = window.location.href;
       var urlSrc = urlSite.match(/^http:\/\/[^/]+/);
       var campaignIdcheck = logico_ajax_data_product.campaignId;

       //console.log(campaignIdcheck);

       // //console.log(proId);
       // //console.log(proTitle);
       // //console.log(proCate);
       // //console.log(proDescription);
       // //console.log(shopCurr);
       // //console.log(sku);
       // //console.log(ProInve); 
       // //console.log(proImage); 
       // //console.log(procmpPrice);       

       rtgsettings ={

           'pdt_id': proId,
           'pdt_sku': sku,
           'pdt_name': proTitle,
           'pdt_price': proPrice,
           'pdt_amount': procmpPrice,
           'pdt_currency': shopCurr,
           'pdt_url': url,
           'pdt_photo': proImage,
           'pdt_instock': ProInve ,
           'pdt_expdate': '$pdt_expdate$',
           'pdt_category_list': proCate,
           'pdt_smalldescription': proDescription,
           'pagetype': 'product',
           'key': 'SPY',
           'token': campaignIdcheck,
           'layer': 'iframe'
         };
       (function(d) {
         var s = d.createElement('script'); s.async = true;s.id='madv2014rtg';s.type='text/javascript';
         s.src = (d.location.protocol == 'https:' ? 'https:' : 'http:') + '//apppartner.mainad.com/shopify-js/prod-min.js';
         var a = d.getElementsByTagName('script')[0]; a.parentNode.insertBefore(s, a);
       }(document));