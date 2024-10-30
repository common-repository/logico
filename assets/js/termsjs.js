var ctoken = sessionStorage.getItem("token"); 
  var ttoken = ctoken.trim();
  if(ttoken){ 
    jQuery('#token').val(ttoken);
  }

jQuery(document).ready(function(){
  jQuery('.api-loader').css('display','none');
  jQuery( "#regisnSubmit" ).click(function( event ) {
    jQuery('.api-loader').css('display','block');
    var form= jQuery("#terms");
    //console.log(form.serialize());
    jQuery.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: form.serialize(),
        success: function (data) {
        //console.log(data);
        if(data.status.statusCode =='F_200')
         {
           
         }
         if(data.status.statusCode =='S_200')
         {
           
          var shopname = jQuery('#shop').val(); 
          jQuery.ajax({
            url : logico_ajax_url.ajax_url,
            type:'post',
            data:{
              action:'logico_set_user_login',
              optionName:shopname,
              optionValue:1,
            },
            success: function (response) {
              //console.log(response);
              location.reload();
            }
          }); 
         }
        }
    });
  });
});