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
<div class="dashboard_wrp">
   <div class="loader api-loader" ></div>
   <div class="header">
      <div class="leftHeader">
         <div class="header-wrp">
            <img src="<?php echo LOGICO_PLUGIN_DIR; ?>assets/images/logo.png">
         </div>
      </div>
      <div class="rightHeader">
         <div class="logButton">
            <a href="#" class="remainingBalance messageDisplayrefresh" style="color:#22d022 !important;">Balance : 0</a>
            <a href="#" class="messageHiderefresh"></a>
            <a href="#" class="messageDisplay" target="_blank">Add Funds</a>
            <a href="#" class="messageHide">Add Funds</a>
            <!-- <a href="#" class="destroyCookie">Logout</a> -->
            <a href="https://logico3c.com/#/login?ref=shopify&token=4cb9d996-b74d-4a05-89be-5cf59dde4366" class="pageRedr" target="_blank">Login to Logico</a>
            <a href="#" class="pageRefresh messageDisplayrefreshicon" ><img src="<?php echo LOGICO_PLUGIN_DIR; ?>assets/images/refresh.png"></a>
            <a href="#" class="messageHiderefreshicon"></a>
         </div>
      </div>
   </div>
   <!-- Tabs -->
   <section id="tabs">
      <div class="section-wrp">
         <h6 class="section-title h1">Logico3c Programmatic Dashboard</h6>
         <div class="row">
            <div class="col-xs-12" style="width: 100%;">
               <nav>
                  <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                     <a class="nav-item nav-link col-14 active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Report</a>
                     <a class="nav-item nav-link col-14" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Banner</a>
                     <a class="nav-item nav-link col-14" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Payment</a>
                     <a class="nav-item nav-link col-14" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">Settings</a>
                  </div>
               </nav>
               <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                     <div class="col-14">
                        <div class="leftHeading">
                           <h3>Today Performance</h3>
                        </div>
                        <div class="col-5 offset-right10">
                           <div class="content-box">
                              <span>Impressions</span>
                              <h4 class="dayImp"></h4>
                           </div>
                        </div>
                        <div class="col-5 offset-right10">
                           <div class="content-box">
                              <span>Clicks</span>
                              <h4 class="dayClk"></h4>
                           </div>
                        </div>
                        <div class="col-5 offset-right10">
                           <div class="content-box">
                              <span>Conversions</span>
                              <h4 class="dayPc conversionPc_PV"></h4>
                           </div>
                        </div>
                        <div class="col-5 offset-right10">
                           <div class="content-box">
                              <span>eCPA</span>
                              <h4 class="daypc_pv"></h4>
                           </div>
                        </div>
                        <div class="col-5 offset-right10">
                           <div class="content-box">
                              <span>Media Cost</span>
                              <h4 class="dayCost"></h4>
                           </div>
                        </div>
                        <div class="col-5 offset-right10">
                           <div class="content-box">
                              <span>eCPM</span>
                              <h4 class="daycpm"></h4>
                           </div>
                        </div>
                     </div>
                     <div class="col-5">
                        <div class="centerHeading">
                           <h3>Graphical View - Last 7 Days of General Performance</h3>
                        </div>
                        <div class="canvas-wrap">
                           <canvas id="myChart" style="background-color: #fff;"></canvas>
                           <h5 class="graphAlert">The Graph Impressions Scaled Down by 50 For Representation Purpose.</h5>
                        </div>
                     </div>
                     <div class="col-14">
                        <div class="rightHeading">
                           <h3>Last 7 Days Performance</h3>
                        </div>
                        <div class="col-5 offset-right10">
                           <div class="content-box">
                              <span>Impressions</span>
                              <h4 class="weekImp"></h4>
                           </div>
                        </div>
                        <div class="col-5 offset-right10">
                           <div class="content-box">
                              <span>Clicks</span>
                              <h4 class="weekClk"></h4>
                           </div>
                        </div>
                        <div class="col-5 offset-right10">
                           <div class="content-box">
                              <span>Conversions</span>
                              <h4 class="weekPc weekConversionPcPV"></h4>
                           </div>
                        </div>
                        <div class="col-5 offset-right10">
                           <div class="content-box">
                              <span>eCPA</span>
                              <h4 class="weekPc_Pv"></h4>
                           </div>
                        </div>
                        <div class="col-5 offset-right10">
                           <div class="content-box">
                              <span>Media Cost</span>
                              <h4 class="weekmedia"></h4>
                           </div>
                        </div>
                        <div class="col-5 offset-right10">
                           <div class="content-box">
                              <span>eCPM</span> 
                              <h4 class="weekCpm"></h4>
                           </div>
                        </div>
                     </div>
                     <br clear="all">
                     <form id='dailyreport' action="https://api.logico3c.com/api/plugin/dailyreport" method="post">
                        <input type="hidden" class="form-control token" value='<?php echo $_SESSION["token"];?>' name="token">
                        <input type="hidden" class="form-control CampaignId" value='<?php echo $_SESSION["campaignId"];?>' name="CampaignId">
                     </form>
                     <form id='remainBalance' action="https://api.logico3c.com/api/plugin/getSpend" method="post">
                        <input type="hidden" class="form-control token" value='<?php echo $_SESSION["token"];?>' name="token">
                        <input type="hidden" class="form-control CampaignId" value='<?php echo $_SESSION["campaignId"];?>' name="campaignId">
                     </form>
                  </div>
                  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                     <div class="bannerStaticwrp">
                        <a href="#" class="bannerstaticCreate" target="_blank">Create a Static Banner</a>
                     </div>
                     <table class="table table-striped table-bordered">
                        <form id='banner' action="https://api.logico3c.com/api/plugin/getauditbanner" method="post">
                           <input type="hidden" class="form-control userid" value='<?php echo $_SESSION["userId"];?>' name="UserId">
                           <input type="hidden" class="form-control token" value='<?php echo $_SESSION["token"];?>' name="Token">
                           <input type="hidden" class="form-control CampaignId" value='<?php echo $_SESSION["campaignId"];?>' name="CampaignId">
                        </form>
                        <tr>
                           <th>Banner Size</th>
                           <!--<th>Campaign Type</th>-->
                           <th>Banner Type</th>
                           <th>Bidder Status</th>
                           <th>&nbsp;</th>
                        </tr>
                        <tr class="dyncrow"></tr>
                     </table>
                     <div class="bannerInfo">
                        <a href="#" class="bannerURl" target="_blank">Creative Information - Details</a>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                     <div class="payment-wrp">
                        <h3 class="priceWrp">Remaining Budget : <span class="remainBudget">0</span></h3>
                        <h3 class="priceWrp">Total Budget : <span class="totalBudget">0</span></h3>
                        <br>
                        <h3 class="priceWrp">Total Payment Received : <span class="paymentRecevied">0</span></h3>
                        <h3 class="priceWrp">Total Remaining Fund Available : <span class="totalFundRemain">0</span></h3>
                        <a href="#" class="paymentBut customAddfunds" target="_blank">Add Funds</a>
                        <a href="#" class="refreshBut refreshIconbtn" title="Payment Refresh"><img src="<?php echo LOGICO_PLUGIN_DIR;?>assets/images/refreshnew.png"></a>
                        <h2 class="paymentDetailsHead">Last max(10) payments received </h2>
                        <table id="mytable" class="table table-striped table-bordered">
                           <tr>
                              <th>Paid Date</th>
                              <th>Paid Amount</th>
                           </tr>
                           <tr class="paydyncrow"></tr>
                        </table>
                        <form id='paymentsettings' action="https://api.logico3c.com/api/plugin/paymentdetails" method="post">
                           <input type="hidden" class="form-control token" value='<?php echo $_SESSION["token"];?>' name="token">
                           <input type="hidden" class="form-control CampaignId" value='<?php echo $_SESSION["campaignId"];?>' name="CampaignId">
                        </form>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                     <div class="register_wrp">
                        <h2 style="font-size: 26px;">User Settings</h2>
                        <input type="hidden" value="<?php echo $shop; ?>" id='shop'>
                        <div class="col-13 form-elem-wrap offset-right10">
                           <label for="cmpID">Campaign Id</label>
                           <input type="text" class="form-control cmpID" id="cmpID" name="campaignId" style="background: #dcdcdc;" readonly>
                        </div>
                        <div class="col-13 form-elem-wrap offset-right10">
                           <label for="cmpName">Campaign Name</label>
                           <input type="text" class="form-control" id="cmpName" style="background: #dcdcdc;" readonly>
                        </div>
                        <div class="col-13 form-elem-wrap offset-right10">
                           <label for="prmName">Program Name</label>
                           <input type="text" class="form-control" id="prmName" style="background: #dcdcdc;" readonly>
                        </div>
                        <div class="clear"></div>
                        <div class="col-13 form-elem-wrap offset-right10">
                           <label for="langName">Banner Language</label>
                           <input type="text" class="form-control" id="langName" style="background: #dcdcdc;" readonly>
                        </div>
                        <div class="col-13 form-elem-wrap offset-right10" style="display: none;">
                           <label for="regName" style="display: block;">Choose Additional Regions</label>
                           <input type="text" class="form-control deatilsShow" id="regName" readonly>
                           <a class='regionURL' target="_blank" href="#">Region Details</a>
                        </div>
                        <div class="col-13 form-elem-wrap offset-right10" style="display: none;">
                           <label for="device" style="display: block;">Choose Additional Devices</label>
                           <input type="text" class="form-control deatilsShow" id="device" readonly>
                           <a class="deiveURL" target="_blank" href="#">Device Details</a>
                        </div>
                       
                        <div class="col-13 form-elem-wrap offset-right10">
                           <label for="currency">Currency</label>
                           <input type="text" class="form-control" id="currency" style="background: #dcdcdc;" readonly>
                        </div>
                        <div class="col-13 form-elem-wrap offset-right10">
                           <label for="payuType">Payout Type</label>
                           <input type="text" class="form-control" id="payuType" style="background: #dcdcdc;" readonly>
                        </div>
                        <div class="col-13 form-elem-wrap offset-right10" style="display: none;">
                           <label for="campSat">Campaign Status</label>
                           <input type="text" class="form-control" id="campSat" readonly>
                        </div>
                        <div class="clear"></div>
                        <form id='updateSettings' action="https://api.logico3c.com/api/plugin/updatecampaignsettings" method="post">
                           <input type="hidden" class="form-control token" value='<?php echo $_SESSION["token"];?>' name="token">
                           <input type="hidden" class="form-control cmpID" id="cmpID" name="campaignId" >
                           <div class="col-13 form-elem-wrap offset-right10" style="display: none;">
                              <label for="chanelNm">Channel Name</label>
                              <select id="chanelNm" class="form-control" name="channelId">
                                 <option value="empty" class="channelOpt">Select Channel</option>
                              </select>
                           </div>
                           <div class="col-13 form-elem-wrap offset-right10" style="display: none;">
                              <label for="stragName">Strategy Name</label>
                              <select id="stragName" class="form-control" name="Strategy">
                                 <option selected value="empty" class="strategyOpt">Select Strategy</option>
                              </select>
                           </div>
                           <div class="col-13 form-elem-wrap offset-right10" style="display: none;">
                              <label for="camptpy">Campaign Type</label>
                              <select id="camptpy" class="form-control" name="campaignTypeId">
                                 <option value="empty" class="campOpt">Select Campaign</option>
                                 <option value="1" >Static</option>
                                 <option value="2" >Dynamic</option>
                              </select>
                              <!-- <input type="text" class="form-control" id="camptpy" > -->
                           </div>
                           <!-- <div class="clear"></div> -->
                           
                           <div class="col-13 form-elem-wrap offset-right10">
                              <label for="daiBud">Daily Budget(€)</label>
                              <input type="number" class="form-control" id="daiBud" name="dailyBudget" >
                              <p class="dailybuderror">Please Enter Valid Value</p>
                           </div>
                           <div class="col-13 form-elem-wrap offset-right10">
                              <label for="mntBud">Total Budget(€)</label>
                              <input type="number" class="form-control" id="mntBud" name="totalBudget">
                              <p class="totalbuderror">Please Enter Valid Value</p>
                           </div>

                           <div class="col-13 form-elem-wrap offset-right10">
                              <label for="bidStatus">Bidding Status</label>
                              <select id="bidStatus" class="form-control" name="bidderStatus">
                                 <!-- <option selected value="empty">Select Campaign</option> -->
                                 <option  value="Active">Active</option>
                                 <option  value="Pause">Pause</option>
                              </select>
                           </div>
                           <!-- <div class="clear"></div> -->
                           <div class="col-13 form-elem-wrap offset-right10" style="display: none;">
                              <label for="landPage">Landing Page</label>
                              <input type="text" onfocusout='Javascript:validatestore();' class="form-control" id="landPage" name="landingPage">
                              <p class="landignerror">Please Enter Valid Value</p>
                           </div>
                           <div class="col-13 form-elem-wrap offset-right10" style="display: none;">
                              <label for="freqCap">Frequency Cap</label>
                              <input type="number" class="form-control" id="freqCap" name="FrequencyCap">
                              <p class="freqerror">Please Enter Valid Value</p>
                           </div>
                           <div class="col-13 form-elem-wrap offset-right10" style="display: none;">
                              <label for="cokieTime">Post click cookie time(Min 1 Day)</label>
                              <input type="number" class="form-control" id="cokieTime" name="PC">
                              <p class="pcerror">Please Enter Valid Value</p>
                           </div>
                           <div class="clear"></div>
                           <div class="col-13 form-elem-wrap offset-right10" style="display: none;">
                              <label for="cokvTime">Post view cookie time(Min 1 Day)</label>
                              <input type="number"  class="form-control" id="cokvTime" name="PV">
                              <p class="pverror">Please Enter Valid Value</p>
                           </div>
                           <div class="col-13 form-elem-wrap offset-right10 text-right">
                              <label class="col-10">&nbsp;</label>
                              <input type="button" id="updatesettingSubmit" name="submit" value="Update Settings" required>
                           </div>
                        </form>
                        <!-- settings GEt form  -->
                        <form id='getsettings' action="https://api.logico3c.com/api/plugin/getcampaignsettings" method="post">
                           <input type="hidden" class="form-control userid" value='<?php echo $_SESSION["userId"];?>' name="userId">
                           <input type="hidden" class="form-control token" value='<?php echo $_SESSION["token"];?>' name="token">
                           <input type="hidden" class="form-control CampaignId" value='<?php echo $_SESSION["campaignId"];?>' name="campaignId">
                        </form>
                        <div class="clear"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="clear"></div>
         <div class='footer-Wrp'>
            <a href="" class="footerLink" target="_blank">Help</a>
         </div>
      </div>
   </section>
</div>
<div class="customalert failedalert">
   <div class="customalert-inner">
      <div class="customalert-inner-div">
         <div class="customalertheader red-box"><i class="fa fa-thumbs-down" aria-hidden="true"></i></div>
         <p>Request failure!<br><span class="ng-binding">Campaign Settings Not Updated!</span></p>
         <button class="btn btn-red">Got it!</button>
      </div>
   </div>
</div>
<div class="customalert successalert">
   <div class="customalert-inner">
      <div class="customalert-inner-div">
         <div class="customalertheader green-box"><i class="fa fa-thumbs-up" aria-hidden="true"></i></div>
         <p>Request success!<br><span class="ng-binding">Campaign Settings Updated Successfully!</span></p>
         <button class="btn btn-green cutommodelBtn">Got it!</button>
      </div>
   </div>
</div>

