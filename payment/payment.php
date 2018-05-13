<?php

/* -----------------------------------------------------------------------------

 Version 2.0

------------------ Disclaimer --------------------------------------------------

Copyright 2004 Dialect Holdings.  All rights reserved.

This document is provided by Dialect Holdings on the basis that you will treat
it as confidential.

No part of this document may be reproduced or copied in any form by any means
without the written permission of Dialect Holdings.  Unless otherwise expressly
agreed in writing, the information contained in this document is subject to
change without notice and Dialect Holdings assumes no responsibility for any
alteration to, or any error or other deficiency, in this document.

All intellectual property rights in the Document and in all extracts and things
derived from any part of the Document are owned by Dialect and will be assigned
to Dialect on their creation. You will protect all the intellectual property
rights relating to the Document in a manner that is equal to the protection
you provide your own intellectual property.  You will notify Dialect
immediately, and in writing where you become aware of a breach of Dialect's
intellectual property rights in relation to the Document.

The names "Dialect", "QSI Payments" and all similar words are trademarks of
Dialect Holdings and you must not use that name or any similar name.

Dialect may at its sole discretion terminate the rights granted in this
document with immediate effect by notifying you in writing and you will
thereupon return (or destroy and certify that destruction to Dialect) all
copies and extracts of the Document in its possession or control.

Dialect does not warrant the accuracy or completeness of the Document or its
content or its usefulness to you or your merchant customers.   To the extent
permitted by law, all conditions and warranties implied by law (whether as to
fitness for any particular purpose or otherwise) are excluded.  Where the
exclusion is not effective, Dialect limits its liability to $100 or the
resupply of the Document (at Dialect's option).

Data used in examples and sample data files are intended to be fictional and
any resemblance to real persons or companies is entirely coincidental.

Dialect does not indemnify you or any third party in relation to the content or
any use of the content as contemplated in these terms and conditions.

Mention of any product not owned by Dialect does not constitute an endorsement
of that product.

This document is governed by the laws of New South Wales, Australia and is
intended to be legally binding.

-------------------------------------------------------------------------------

Following is a copy of the disclaimer / license agreement provided by RSA:

Copyright (C) 1991-2, RSA Data Security, Inc. Created 1991. All rights reserved.

License to copy and use this software is granted provided that it is identified
as the "RSA Data Security, Inc. MD5 Message-Digest Algorithm" in all material 
mentioning or referencing this software or this function.

License is also granted to make and use derivative works provided that such 
works are identified as "derived from the RSA Data Security, Inc. MD5 
Message-Digest Algorithm" in all material mentioning or referencing the 
derived work.

RSA Data Security, Inc. makes no representations concerning either the 
merchantability of this software or the suitability of this software for any 
particular purpose. It is provided "as is" without express or implied warranty 
of any kind.

These notices must be retained in any copies of any part of this documentation 
and/or software.

-------------------------------------------------------------------------------- 
 
This example assumes that a form has been sent to this example with the
required fields. The example then processes the command and displays the
receipt or error to a HTML page in the users web browser.

NOTE:
=====
  You may have installed the libeay32.dll and ssleay32.dll libraries 
  into your x:\WINNT\system32 directory to run this example.

--------------------------------------------------------------------------------

 @author Dialect Payment Solutions Pty Ltd Group 

------------------------------------------------------------------------------*/

// *********************
// START OF MAIN PROGRAM
// *********************

// Define Constants
// ----------------
// This is secret for encoding the MD5 hash
// This secret will vary from merchant to merchant
// To not create a secure hash, let SECURE_SECRET be an empty string - ""
// $SECURE_SECRET = "secure-hash-secret";
session_start();

	if(isset($_POST["vpc_MerchTxnRef"]))
	{
		$vpc_merchTxnRef = $_POST["vpc_MerchTxnRef"];	
	}
	if(isset($_POST["vpc_Merchant"]))
	{
		$vpc_merchant = $_POST["vpc_Merchant"];
	}
	if(isset($_POST["vpc_OrderInfo"]))
	{
		$vpc_oderinfo = $_POST["vpc_OrderInfo"];	
	}
	if(isset($_POST["vpc_Email"]))
	{
		$vpc_email = $_POST["vpc_Email"];	
	}
	if(isset($_POST["vpc_Amount"]))
	{
		$vpc_amount = $_POST["vpc_Amount"];	
	}
	//echo $_SESSION["OrderInfo"];
	$connect_sql = mysql_connect("localhost","luxvn_onepay",".eyTTL([pKa*") or die("cannot connect");
	mysql_select_db("luxvn_onepay") or die ("cannot select db");
	if ($vpc_merchant == "" || $vpc_amount == "" || $vpc_merchTxnRef == "")
	{
	        echo '<p align="center"><b>Your confirm is not correct. Please try again !!!</b></p>';
		exit();
	 }
	 else
{  
   $insert = 'INSERT INTO `tb_tran_op`(`vpc_order_id`, `vpc_MerchTxnRef`, `vpc_merchant`, `vpc_oderinfo`, `vpc_email`, `vpc_amount`,`vpc_date`) 
                                    VALUES("'.$vpc_oderinfo.'", "'.$vpc_MerchTxnRef.'", "'.$vpc_merchant.'", "'.$_SESSION["OrderInfo"].'", "'.$vpc_email.'", "'.$vpc_amount.'", NOW())';
   
   }
$result = mysql_query($insert);
//$transaction_id = mysql_insert_id($connect_sql);

	
$SECURE_SECRET = "2CA069E4BE57D8F3F40DB6426E27137D";

// add the start of the vpcURL querystring parameters
$vpcURL = $_POST["virtualPaymentClientURL"] . "?";

// Remove the Virtual Payment Client URL from the parameter hash as we 
// do not want to send these fields to the Virtual Payment Client.
unset($_POST["virtualPaymentClientURL"]); 
unset($_POST["btn_pay"]);
// The URL link for the receipt to do another transaction.
// Note: This is ONLY used for this example and is not required for 
// production code. You would hard code your own URL into your application.

// Get and URL Encode the AgainLink. Add the AgainLink to the array
// Shows how a user field (such as application SessionIDs) could be added
$_POST['AgainLink']="http://onepay.vn";
//$_POST['AgainLink']=urlencode($_SERVER['HTTP_REFERER']);
// Create the request to the Virtual Payment Client which is a URL encoded GET
// request. Since we are looping through all the data we may as well sort it in
// case we want to create a secure hash and add it to the VPC data if the
// merchant secret has been provided.
//$md5HashData = $SECURE_SECRET; Khởi tạo chuỗi dữ liệu mã hóa trống
$md5HashData = "";

ksort ($_POST);

// set a parameter to show the first pair in the URL
$appendAmp = 0;

foreach($_POST as $key => $value) {

    // create the md5 input and URL leaving out any fields that have no value
    if (strlen($value) > 0) {
        
        // this ensures the first paramter of the URL is preceded by the '?' char
        if ($appendAmp == 0) {
            $vpcURL .= urlencode($key) . '=' . urlencode($value);
            $appendAmp = 1;
        } else {
            $vpcURL .= '&' . urlencode($key) . "=" . urlencode($value);
        }
        //$md5HashData .= $value; sử dụng cả tên và giá trị tham số để mã hóa
        if ((strlen($value) > 0) && ((substr($key, 0,4)=="vpc_") || (substr($key,0,5) =="user_"))) {
		    $md5HashData .= $key . "=" . $value . "&";
		}
    }
}
//xóa ký tự & ở thừa ở cuối chuỗi dữ liệu mã hóa
$md5HashData = rtrim($md5HashData, "&");

//print $md5HashData;exit;
// Create the secure hash and append it to the Virtual Payment Client Data if
// the merchant secret has been provided.
if (strlen($SECURE_SECRET) > 0) {
    //$vpcURL .= "&vpc_SecureHash=" . strtoupper(md5($md5HashData));
    // Thay hàm mã hóa dữ liệu
    $vpcURL .= "&vpc_SecureHash=" . strtoupper(hash_hmac('SHA256', $md5HashData, pack('H*',$SECURE_SECRET)));
}
// add vpc_SecureHashType//
$vpcURL .= "&vpc_SecureHashType=SHA256";


// FINISH TRANSACTION - Redirect the customers using the Digital Order
// ===================================================================
header("Location: ".$vpcURL);

// *******************
// END OF MAIN PROGRAM
// *******************
?>