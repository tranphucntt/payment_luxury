<?php
	session_start();
	$timenow = time();
	if(isset($_POST["vpc_Bookingcode"]))
	{
		$vpc_Bookingcode = $_POST["vpc_Bookingcode"];	
	}
	if(isset($_POST["vpc_Fullname"]))
	{
		$vpc_Fullname = $_POST["vpc_Fullname"];
	}
	if(isset($_POST["vpc_Email"]))
	{
		$vpc_Email = $_POST["vpc_Email"];	
	}
	if(isset($_POST["vpc_Amount"]))
	{
		$vpc_Amount = intval($_POST["vpc_Amount"]);	
	}
	$vpc_Amount_convert =  $vpc_Amount*100;

	$vpc_order_id = time();
	$vpc_order_id = "PAY-".$vpc_order_id;

	$_SESSION["OrderInfo"] = "$vpc_order_id||$vpc_Fullname||$vpc_Email||$vpc_Bookingcode||$vpc_Amount";
	$OrderInfo = $vpc_order_id;
	if ($vpc_Bookingcode == "" || $vpc_Fullname == "" || $vpc_Email == "" || $vpc_Amount == "")
	{
	        //echo '<p align="center"><b>Your confirm is not correct. Please try again !!!</b></p>';
	        echo '<script>alert(\'Your confirm is not correct. Please try again !!!\');window.location=\'payment.htm\';</script>';
		exit();
	 }

	?>


<HTML>
<HEAD>
<TITLE>Award Winning Luxury Tour Operator and Full Travel Service Agency to Discover Vietnam, Thailand, Laos, Cambodia and Myanmar in Luxury and Style </TITLE>
<META NAME="description" CONTENT="Award Winning Luxury Tour Operator and Full Travel Service Agency Vietnam, Thailand, Laos, Cambodia and Myanmar, 100% Satisfaction, if not money back guaranteed, Visit US Today Vietnam's First Luxury Tour Operator and Full Travel Service Agency, We Sell Your Our Experiences For A Hassle Free Holiday. Contact Us Today!">
<META name="keywords" CONTENT=" Vietnam, Thailand, Laos, Cambodia, Myanmar Luxury travel, Luxury Vacations, holidays, Hotels, Luxury Travel Vietnam, Vietnam luxury hotels, Travel, Holidays, Vacation, Travel, Tours, Hotel, Luxury Travel, Holidays, Vietnam Tour Operator, Vietnam Travel Agent,Vietnam Hotels, Customized tours Vietnam,Vietnam Tour Operator,Vietnam Discounted Hotels, Vietnam Tour, Vietnam Hotel, Vietnam Luxury Travel, Vietnam Holidays, Vietnam Tour Operator">
<meta name="Page-topic" content="Vietnam Travel">
<meta name="Abstract" content="Vietnam Travel">
<meta name="Classification" content="Vietnam Travel">
<meta name="Area" content="Vietnam Travel">
<meta name="placename" content="Vietnam">
<META NAME="GOOGLEBOT" CONTENT="all, index, follow">
<META name="revisit-after" CONTENT="2 days">
<META NAME="copyright" CONTENT="Luxury Travel Group Co,. Ltd (Vietnam)">
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<META http-equiv=Content-Style-Type content=text/css>
<LINK href="thailh_nghean.css" type=text/css rel=stylesheet>

<link rel="shortcut icon" href="images/lux-guide.png"/>
<script type="text/javascript" src="https://luxurytravelvietnam.com/snowstorm.js"></script>

<style type="text/css">
<!--
.style1 {font-weight: bold}
.style3 {font-size:14px; color:#333333; padding:5 5 5 5; font-family: Tahoma, Veranda, Arial, Helvetica, sans-serif;}
-->
</style>
</HEAD>
<BODY class="body">
<table width="850" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td width="5">&nbsp;</td>
    <td width="5" background="images/bk.gif">&nbsp;</td>
    <td height="100"><a href="index.htm">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/logo-luxurytravel.jpg" height="50"></p> ></a></td>
    <td align="right">&nbsp; </td>
    <td align="center"></td>
    <td width="5" background="images/bk.gif">&nbsp;</td>
    <td width="5">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td background="images/bk.gif">&nbsp;</td>
    <td height="30" colspan="3" align="left" valign="middle"><span class="list_nav">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Travel Search:</strong> <img src="images/vn.gif" width="16" height="11" hspace="5" border="0" align="absmiddle" /><a href="EN/6_TOURS/vietnam_tours.htm">Vietnam</a> | <img src="images/lao.gif" width="16" height="11" hspace="5" border="0" align="absmiddle" /><a href="EN/6_TOURS/laos_tours.htm">Laos</a> | <img src="images/ca.gif" width="16" height="11" hspace="5" border="0" align="absmiddle" /><a href="EN/6_TOURS/cambodia_tours.htm">Cambodia</a> | <img src="images/th.gif" width="16" height="11" hspace="5" border="0" align="absmiddle" /><a href="EN/thailand/index.htm">Thailand</a> | <img src="images/mm.gif" width="16" height="11" hspace="5" border="0" align="absmiddle" /><a href="EN/myanmar/index.htm">Myanmar</a> | <img src="EN/thailand/images/icons/world.png" width="16" height="16" hspace="5" border="0" align="absmiddle" /><a href="EN/6_TOURS/indochiana_tours.htm">Multi Countries</a></span></td>
    <td background="images/bk.gif">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  
  <tr>
    <td>&nbsp;</td>
    <td background="images/bk.gif">&nbsp;</td>
    <td height="45" colspan="3" align="center" valign="middle" bgcolor="EEEFF0" class="style3">
    <p>&quot; Luxury Travel has emerged as one of top high end tourist operators in Vietnam. <strong>Vietnam Discovery Magazine, Ministry of Culture, Sports and Tourism of Vietnam. </strong></p></td>
    <td background="images/bk.gif">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td background="images/bk.gif">&nbsp;</td>
    <td colspan="3" align="center" valign="middle">
    <div style="text-align:right">
  <table class="content" width="100%" border="0" cellspacing="0" cellpadding="5">
	<tr>
		<td align="right">
  <table align="center" class="content" width="400px" border="0" cellspacing="2" cellpadding="3">
	<tr>
		<td width="130px" style="border-bottom: 2px solid #727272; margin-right: 5px;color:#727272;"><b>Payment Infomation</b></td>
		<td width="10px"></td>
		<td width="120px" style="border-bottom: 2px solid #F17E01; margin-right: 5px;"><b>Confirm Payment</b></td>
		<td width="10px"></td>
		<td width="100px" style="border-bottom: 2px solid #727272; margin-right: 5px;color:#727272;"><b>Payment</b></td>
		<td width="10px"></td>
	</tr>
  </table>		
		</td>
	</tr>
  </table><br></div><div>
 						<FIELDSET style="text-align:center;width:500px;">
						<LEGEND class="title_1"> </i><b> Confirm Payment   </b></LEGEND>
   <script language=javascript>
	function checkPayment(f) {
		var vpc_TxSourceSubType = f.vpc_TxSourceSubType;
		if (!vpc_TxSourceSubType.checked) {
			alert("You must click to accept the Terms and Conditions!");
			return false;
		}
	}
</script>

<form action="./payment.php" onSubmit="return checkPayment(this)" method="post">
<input type="hidden" name="Title" value="PHP VPC 3-Party">
<input type="hidden" name="virtualPaymentClientURL" size="63" value="https://onepay.vn/vpcpay/vpcpay.op" maxlength="250">
<input type="hidden" name="vpc_Version" value="2" size="20" maxlength="8">
<input type="hidden" name="vpc_Command" value="pay" size="20" maxlength="16">
<input type="hidden" name="vpc_AccessCode" value="4DE4C28C" size="20" maxlength="8">
<input type="hidden" name="vpc_MerchTxnRef" value="<?=$vpc_order_id?>" size="20" maxlength="40">
<input type="hidden" name="vpc_Merchant" value="OP_LUXURY" size="20" maxlength="16">
<input type="hidden" name="vpc_OrderInfo" value="<?=$OrderInfo?>" size="20" maxlength="34">
<input type="hidden" name="vpc_Amount" value="<?=$vpc_Amount_convert?>" size="20" maxlength="10">
<input type="hidden" name="vpc_Locale" value="en" size="20" maxlength="5">
<input type="hidden" name="vpc_ReturnURL" size="63" value="https://luxurytravelvietnam.com/msg.php" maxlength="250">

  <table class="content" bgcolor="#F7F9FF" width="100%"  border="0" cellspacing="2" cellpadding="5">
    <tr>
      <td> </td>
      <td><input type="hidden" name="textfield"></td>
    </tr>
    <tr>
      <td> <strong>Booking Code / Trip Code or Proposal Code: </strong> </td>
      <td><?=$vpc_Bookingcode?></td>
    </tr>
    <tr>
      <td> <strong>Credit Card Holder's Fullname: </strong> </td>
      <td><?=$vpc_Fullname?></td>
    </tr>
      <tr>
      <td> <strong>Email: </strong> </td>
      <td><?=$vpc_Email?></td>
    </tr>
    <tr>
      <td> <strong>Total Amount: </strong> </td>
      <td><font color="red"><b><? echo $vpc_Amount; ?></font> USD</b></font></td>
    </tr>
    <tr>
      <td colspan="2"><input type="hidden" name="vpc_TicketNo" value="<?=$_SERVER['REMOTE_ADDR']?>" maxlength="15"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="SubButL" value="Pay Now!"></td>
    </tr>
  </table>

  </form>


						</FIELDSET>
</div>
    <p>&nbsp;</p></td>
    <td background="images/bk.gif">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td background="images/bk.gif">&nbsp;</td>
    <td colspan="3" align="center" valign="middle">&nbsp;</td>
    <td background="images/bk.gif">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td background="images/bk.gif">&nbsp;</td>
    <td colspan="3" valign="middle"><div align="center" class="style1"> We accept the majors credit cards: <img src="images/1359_partner.png" border="0" align="absmiddle"></div></td>
    <td background="images/bk.gif">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td background="images/bk.gif">&nbsp;</td>
    <td colspan="3" valign="middle" class="line-title"><img src="images/arrow.gif" width="9" height="9" hspace="0" vspace="0" border="0"></td>
    <td background="images/bk.gif">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td background="images/bk.gif">&nbsp;</td>
    <td colspan="3"><table width="100%"  border="0" cellpadding="0" cellspacing="10" bgcolor="EEEFF0">
      <tr>
        <td height="151" class="content"><p><strong>Luxury Travel Co., Ltd is Vietnam's First International Luxury Tour Operator Licence 01-074/ TCDL-GPLHQT</strong></p>
          <p> <span class="content_title">Hanoi Head Office:</span> #456 Lac Long Quan Str., Tay Ho Dist., Hanoi. | Call Center! <span class="content_title">++84.4.39 27 41 20</span> | Fax: ++84.4.39 27 41 18<br>
            Email : sales@luxurytravelvietnam.com<br>
            <br>
            <span class="content_title">Saigon Branch Office: </span>#Room 301, floor 3, Tran Quy Building, 57 Le Thi Hong Gam Str., Nguyen Thai Binh Ward, Dist 01, HCM | Tel: +84.8.38 24 34 08 | Fax: +84.8.38 24 34 11 <br>
            Email: dos@luxurytravelvietnam.com<br>
            <br>
          <span class="content_title">Hotlines 24/7:</span> +84.912 30 30 96 - Mr. Pham (English, French &amp; Vietnamese) or + 84.12 34 68 69 96 - Mr. David Nguyen  (English &amp; Vietnamese) </p>          </td>
      </tr>
    </table>    </td>
    <td background="images/bk.gif">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td background="images/bk.gif">&nbsp;</td>
    <td colspan="3" class="line-title">&nbsp;</td>
    <td background="images/bk.gif">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>  
</table>

</body>
</HTML>
