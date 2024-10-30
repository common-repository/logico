
jQuery(document).ready(function () {
	var login = sessionStorage.getItem("login");
	if (login === null) {
		jQuery('.api-loader').hide();
		jQuery('.login-wrp').show();
		jQuery('.register_wrp').show();
	} else {
		location.reload();
	}

	if( jQuery('#myusername').val() !='' && jQuery('#mypassword').val()!='' ) {
		setTimeout(function(){
		// alert('d');
		jQuery( "#loginSubmit" ).trigger( "click" );
		}, 2000);
	}


	jQuery("#loginSubmit").click(function (event) {
		var name = jQuery('#myusername').val();
		var pass = jQuery('#mypassword').val();
		if(name==''){
			jQuery('.usererror').show();
		}
		if(pass==''){
			jQuery('.passerror').show();
		}
		if(name!='' && pass!=''){
		jQuery('.api-loader').css('display', 'block');
		var shop = jQuery('#shop').val();


		var form = jQuery("#target");
		jQuery.ajax({
			type: form.attr('method'),
			url: form.attr('action'),
			data: form.serialize(),
			success: function (data) {
				//console.log(data);

				if (data.status.statusCode == 'F_200') {
					jQuery('.api-loader').css('display', 'none');
					jQuery('.failedalert').show();
				}
				if (data.status.statusCode == 'S_200') {
					var campaignId = data.campaigns[1].campaignId;
					var token = data.token;
					var userId = data.userId;
					//console.log(data.tc);

					if (typeof (Storage) !== "undefined") {

						
						jQuery.ajax({
									url : logico_ajax_url.ajax_url,
									type:'post',
									data:{
										action:'logico_set_login_details',
										username: name.trim(),
										userpass: pass.trim()
									},
									success: function (response) {
										//console.log(response);
									}
								});

						var username = jQuery('.custom_username').val();
						sessionStorage.setItem('login',username );
						sessionStorage.setItem('campaignId',campaignId );
						sessionStorage.setItem('token',token );
						sessionStorage.setItem('userId',userId );
						shop = sessionStorage.getItem("lastname");
						jQuery.ajax({
								url : logico_ajax_url.ajax_url,
								type:'post',
								data:{
									action:'logico_set_session_login',
									campaignId: sessionStorage.getItem('campaignId',campaignId ),
									token: sessionStorage.getItem('token',token ),
									userId: sessionStorage.getItem('userId',userId ),
								},
								success: function (response) {
									//console.log(response);
								}
							});
					} else {
						alert("Sorry, your browser does not support Web Storage...");
					}
				}
					if (data.tc == false) {
						jQuery('#mypassword').val('');
						var shopname = jQuery('#customstore').val();
						jQuery.ajax({
							url : logico_ajax_url.ajax_url,
							type:'post',
							data:{
								action:'logico_set_user_login',
								optionName:shopname,
								optionValue:0,
							},
							success: function (response) {
								//console.log(response);
								location.reload();
							}
						});
					} else {
						var shopname = jQuery('#customstore').val();
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
						// location.reload();
						//jQuery('#myusername').val();
					}
			}
		});
	  }
	});
	jQuery('.btn-green').click(function () {
		jQuery('.api-loader').show();
		location.reload();
	});
	jQuery('.btn-red').click(function () {
		jQuery('.failedalert').hide();
	});
});