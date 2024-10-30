<?php
/*
 "Logico Bid-Smart Advertising" is free software: you can redistribute it and/or modify
   it under the terms of the GNU General Public License as published by
   the Free Software Foundation, either version 3 of the License, or
   (at your option) any later version.

   "Logico Bid-Smart Advertising" is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU General Public License for more details.

   You should have received a copy of the GNU General Public License
   along with "Logico Bid-Smart Advertising".  If not, see <https://www.gnu.org/licenses/>.
*/
?>
<?php $shop_url = get_bloginfo( 'title' ); ?>
<div class="loader api-loader" ></div>
<div class="registration_wrp">
   <div class="l-header" style="padding-bottom: 2%;">
      <div class="logo"></div>
      <div class="clear"></div>
   </div>
   <div class="login-wrap">
      <!--login-box start -->
      <div class="login-box registration-box">
         <div class="main-icon"><i class="fa fa-user" aria-hidden="true"></i></div>
         <h3 style="color: #747d82; display: block; text-align: center; text-transform: uppercase; padding-bottom: 6px; font-size: 20px;    font-weight: 500; margin-top:20px;">Signup to logico</h3>
         <input type="hidden" value="<?php echo $shop_url; ?>" id='shop'>
         <form id='target' action="https://api.logico3c.com/api/plugin/registration" method="post">   
         <div class="row">
            <div class="form-group col-sm-4">
               <label for="inputEmail">Email<span class="star">*</span></label>
               <input type="email" placeholder="demo@gmail.com" class="form-control" id="inputEmail"  onfocusout='Javascript:checkEmail();' name="UserEmail" required>
               <p class="emailerror">Please Enter Valid Email</p>
            </div>
            <div class="form-group col-sm-4">
               <label for="ddlProgramName">Shop Name<span class="star">*</span></label>
               <input type="text" class="form-control" id="ddlProgramName" name="ProgramName" placeholder="Store Name" title="Brand name or product name being promoted">
               <p class="programerror">Please Enter Valid Value</p>
            </div>
            <div class="form-group col-sm-4">
               <label for="contactNumber">Contact Number<span class="star">*</span></label>
               <input type="text" class="form-control" id="contactNumber" name="ContactNumber" placeholder="Contact Number" required>
               <p class="contacterror">Please Enter Valid Value</p>
            </div>
            <div class="form-group col-sm-4">
               <label for="ddlRegion">Select Regions<span class="star">*</span></label>
               <select id="ddlRegion" class="form-control" name="RegionCode">
                  <option selected value="All" class="regionOpt">Select Regions</option>
               </select>
               <p class="regionerror">Please Select Regions</p>
            </div>
            <div class="form-group col-sm-4">
               <label for="inputWebsiteURL">Website Domain URL<span class="star">*</span></label>
               <input type="text" class="form-control" id="inputWebsiteURL" name="DomainName" placeholder="https://xxxxxxxx.com" onfocusout='Javascript:validatedomain();'>
               <p class="domainerror">Please Enter Website URL</p>
            </div>
            <div class="form-group col-sm-4">
               <label for="inputStoreLogo">Store Logo URL<span class="star">*</span></label>
               <input type="text" class="form-control" id="inputStoreLogo" name="CompanyLogo" placeholder="https://xxxxxxxx.com/logo.png" onfocusout='Javascript:validatestore();'>
               <p class="storeerror">Please Enter Logo URL</p>
            </div>            
            <div class="form-group col-sm-4">
               <label for="ddlCurrency">Select Currency<span class="star">*</span></label>
               <select id="ddlCurrency" class="form-control" name="Currency">
                  <option value="empty" class="currencyOpt">Select Currency</option>
               </select>
               <p class="currencyerror">Please Select Currency</p>
            </div>                   
            
            <div class="form-group col-sm-4">
               <label for="dailylBudget">Daily Budget(€)<span class="star">*</span></label>
               <input type="number" class="form-control" id="dailylBudget" name="DailyBudget" placeholder="100">
               <p class="budegeterror">Please Enter Valid Value</p>
            </div>
            <div class="form-group col-sm-4">
               <label for="ddlBudget">Total Budget(€)<span class="star">*</span></label>
               <input type="number" class="form-control" id="ddlBudget" name="Budget" placeholder="3000">
               <p class="totalbudegeterror">Please Enter Valid Value</p>
            </div>                                                        
            <div class="form-group col-sm-12" style="width: 100%;">
               <label for="contactAddress">Contact Address</label>
               <textarea rows="5" cols="90" class="form-control"  name="ContactAddress" id="contactAddress"></textarea>
            </div>
            <div class="clear"></div>
			<div class="hidden">               
                <input type="hidden" class="form-control" id="inputCPM" name="MaxCPM" value="2"/>
				<input type="hidden" class="form-control" id="ddlCampaignType" name="CampaignType" value="CPM"/>
				<input type="hidden" class="form-control" id="ddlStrategy" name="Strategy" value="19"/>
				<input type="hidden" class="form-control" id="ddlPV" name="PV" value="2"/>
				<input type="hidden" class="form-control" id="ddlPC" name="PC" value="30"/>
				<input type="hidden" class="form-control" id="ddlfreqCap" name="FrequencyCap" value="5"/>
				<input type="hidden" class="form-control" id="ddlSpendDuration" name="SpendDuration" value="1"/>
				<input type="hidden" class="form-control" id="ddlLanguage" name="LanguageCode" value="EN"/>
				<input type="hidden" class="form-control" id="ChanelID" name="ChannelId" value="3"/>
				<input type="hidden" class="form-control" id="ddldeviceId" name="DeviceId" value="1"/>
				<input type="hidden" name="Network" value="Woocommerce">
				<input type="hidden" name="store" value="<?php echo str_replace(' ','.',$shop_url); ?>">
				<input type="hidden" class="form-control" id="txtresetlink" name="resetLink" value=""/> 

				
            </div>
            <div class="submit_wrp">
               <input type="button" id="regisnSubmit" name="submit" value="Sign Up" required>
            </div>
            </div>
         </form>
		 <div class="clear"></div>
      </div>
   </div>
</div>
<div class="customalert failedalert">
   <div class="customalert-inner">
      <div class="customalert-inner-div">
         <div class="customalertheader red-box"><i class="fa fa-thumbs-down" aria-hidden="true"></i></div>
         <p>Request failure!<br><span class="ng-binding">Registration Failed!</span></p>
         <button class="btn btn-red">Got it!</button>
      </div>
   </div>
</div>
<div class="customalert successalert">
   <div class="customalert-inner">
      <div class="customalert-inner-div">
         <div class="customalertheader green-box"><i class="fa fa-thumbs-up" aria-hidden="true"></i></div>
         <p>Request success!<br><span class="ng-binding">Registered Successfully!</span>
            <br><span class="ng-binding">Login details are in your registered email address</span>
         </p>
         <button class="btn btn-green">Got it!</button>
      </div>
   </div>
</div>
