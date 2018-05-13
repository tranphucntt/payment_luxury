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

$SECURE_SECRET = "2CA069E4BE57D8F3F40DB6426E27137D";


// If there has been a merchant secret set then sort and loop through all the

// data in the Virtual Payment Client response. While we have the data, we can

// append all the fields that contain values (except the secure hash) so that

// we can create a hash and validate it against the secure hash in the Virtual

// Payment Client response.


// NOTE: If the vpc_TxnResponseCode in not a single character then

// there was a Virtual Payment Client error and we cannot accurately validate

// the incoming data from the secure hash. */


// get and remove the vpc_TxnResponseCode code from the response fields as we

// do not want to include this field in the hash calculation

$vpc_Txn_Secure_Hash = $_GET["vpc_SecureHash"];

$vpc_MerchTxnRef = $_GET["vpc_MerchTxnRef"];

$vpc_AcqResponseCode = $_GET["vpc_AcqResponseCode"];

unset($_GET["vpc_SecureHash"]);

// set a flag to indicate if hash has been validated

$errorExists = false;


//$_GET["vpc_3DSXID"] = urldecode ($_GET["vpc_3DSXID"]);
//$_GET["vpc_VerToken"] = urldecode ($_GET["vpc_VerToken"]);

if (strlen($SECURE_SECRET) > 0 && $_GET["vpc_TxnResponseCode"] != "7" && $_GET["vpc_TxnResponseCode"] != "No Value Returned") {


    ksort($_GET);

    //$md5HashData = $SECURE_SECRET;

    //kh?i t?o chu?i m� h�a r?ng

    $md5HashData = "";

    // sort all the incoming vpc response fields and leave out any with no value

    foreach ($_GET as $key => $value) {

//        if ($key != "vpc_SecureHash" or strlen($value) > 0) {

//            $md5HashData .= $value;

//        }

//      ch? l?y c�c tham s? b?t d?u b?ng "vpc_" ho?c "user_" v� kh�c tr?ng v� kh�ng ph?i chu?i hash code tr? v?

        if ($key != "vpc_SecureHash" && (strlen($value) > 0) && ($key != "vpc_SecureHashType") && ((substr($key, 0, 4) == "vpc_") || (substr($key, 0, 5) == "user_"))) {

            $md5HashData .= $key . "=" . $value . "&";

        }

    }

//  X�a d?u & th?a cu?i chu?i d? li?u

    $md5HashData = rtrim($md5HashData, "&");


//    if (strtoupper ( $vpc_Txn_Secure_Hash ) == strtoupper ( md5 ( $md5HashData ) )) {

//    Thay h�m t?o chu?i m� h�a

    if (strtoupper($vpc_Txn_Secure_Hash) == strtoupper(hash_hmac('SHA256', $md5HashData, pack('H*', $SECURE_SECRET)))) {

        // Secure Hash validation succeeded, add a data field to be displayed

        // later.

        $hashValidated = "CORRECT";

    } else {

        // Secure Hash validation failed, add a data field to be displayed

        // later.

        $hashValidated = "INVALID HASH";

    }

} else {

    // Secure Hash was not validated, add a data field to be displayed later.

    $hashValidated = "INVALID HASH";

}


// Define Variables

// ----------------

// Extract the available receipt fields from the VPC Response

// If not present then let the value be equal to 'No Value Returned'


// Standard Receipt Data

$amount = null2unknown($_GET["vpc_Amount"]);

$locale = null2unknown($_GET["vpc_Locale"]);

$batchNo = null2unknown($_GET["vpc_BatchNo"]);

$command = null2unknown($_GET["vpc_Command"]);

$message = null2unknown($_GET["vpc_Message"]);

$version = null2unknown($_GET["vpc_Version"]);

$cardType = null2unknown($_GET["vpc_Card"]);

$orderInfo = null2unknown($_GET["vpc_OrderInfo"]);

$receiptNo = null2unknown($_GET["vpc_ReceiptNo"]);

$merchantID = null2unknown($_GET["vpc_Merchant"]);

$authorizeID = null2unknown($_GET["vpc_AuthorizeId"]);

$merchTxnRef = null2unknown($_GET["vpc_MerchTxnRef"]);

$transactionNo = null2unknown($_GET["vpc_TransactionNo"]);

$acqResponseCode = null2unknown($_GET["vpc_AcqResponseCode"]);

$txnResponseCode = null2unknown($_GET["vpc_TxnResponseCode"]);


// 3-D Secure Data

$verType = array_key_exists("vpc_VerType", $_GET) ? $_GET["vpc_VerType"] : "No Value Returned";

$verStatus = array_key_exists("vpc_VerStatus", $_GET) ? $_GET["vpc_VerStatus"] : "No Value Returned";

$token = array_key_exists("vpc_VerToken", $_GET) ? $_GET["vpc_VerToken"] : "No Value Returned";

$verSecurLevel = array_key_exists("vpc_VerSecurityLevel", $_GET) ? $_GET["vpc_VerSecurityLevel"] : "No Value Returned";

$enrolled = array_key_exists("vpc_3DSenrolled", $_GET) ? $_GET["vpc_3DSenrolled"] : "No Value Returned";

$xid = array_key_exists("vpc_3DSXID", $_GET) ? $_GET["vpc_3DSXID"] : "No Value Returned";

$acqECI = array_key_exists("vpc_3DSECI", $_GET) ? $_GET["vpc_3DSECI"] : "No Value Returned";

$authStatus = array_key_exists("vpc_3DSstatus", $_GET) ? $_GET["vpc_3DSstatus"] : "No Value Returned";


// *******************

// END OF MAIN PROGRAM

// *******************


// FINISH TRANSACTION - Process the VPC Response Data

// =====================================================

// For the purposes of demonstration, we simply display the Result fields on a

// web page.


// Show 'Error' in title if an error condition

$errorTxt = "";


// Show this page as an error page if vpc_TxnResponseCode equals '7'

if ($txnResponseCode == "7" || $txnResponseCode == "No Value Returned" || $errorExists) {

    $errorTxt = "Error ";

}


// This is the display title for 'Receipt' page 

$title = $_GET["Title"];


// The URL link for the receipt to do another transaction.

// Note: This is ONLY used for this example and is not required for 

// production code. You would hard code your own URL into your application

// to allow customers to try another transaction.

//TK//$againLink = URLDecode($_GET["AgainLink"]);


$transStatus = "";

if ($hashValidated == "CORRECT" && $txnResponseCode == "0") {

    $transStatus = "Successful transaction.";

} elseif ($hashValidated == "CORRECT" && $txnResponseCode != "0") {

    $transStatus = "Transaction failed.";

} elseif ($hashValidated == "INVALID HASH") {

    $transStatus = "Transaction is pending, please contact your bank and Luxury Travel to reconfirm payment.";

}

sendMail($orderInfo, $transStatus, $amount);

?>

<?php include("header.php"); ?>

    <table width="100%" height="100%" border="0" align="center">


        <tr>
            <td align="center" valign="middle">
                <table width="50%" height="50%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                    <tr>
                        <td align="center" valign="middle">
                            <FIELDSET style="text-align:center;width:500px;">
                                <table class="content" width="100%" height="300px" border="0" cellpadding="0"
                                       cellspacing="0">
                                    <tr>
                                        <td align="center" valign="middle"><p><b>

                                                    <?php

                                                    echo $transStatus;

                                                    ?>

                                                </b></p>

                                            <p><img src="https://luxurytravelvietnam.com/images/Processing.gif" alt=""
                                                    width="32" height="32"><br>

                                                <br>

                                                [<a href="https://www.luxurytravelvietnam.com/">Click here to homepage
                                                    if you don't want to wait for a long time</a>]</p></td>
                                    </tr>
                                </table>
                            </FIELDSET>
                        </td>
                    </tr>
                </table>
            </td>


        </tr>


    </table>

<?php include("footer.php"); ?>

<?php



session_destroy();



?>





<?php

// End Processing


// This method uses the QSI Response code retrieved from the Digital

// Receipt and returns an appropriate description for the QSI Response Code

//

// @param $responseCode String containing the QSI Response Code

//

// @return String containing the appropriate description

//

function getResponseDescription($responseCode)
{


    switch ($responseCode) {

        case "0" :
            $result = "Transaction Successful";
            break;

        case "?" :
            $result = "Transaction status is unknown";
            break;

        case "1" :
            $result = "Bank system reject";
            break;

        case "2" :
            $result = "Bank Declined Transaction";
            break;

        case "3" :
            $result = "No Reply from Bank";
            break;

        case "4" :
            $result = "Expired Card";
            break;

        case "5" :
            $result = "Insufficient funds";
            break;

        case "6" :
            $result = "Error Communicating with Bank";
            break;

        case "7" :
            $result = "Payment Server System Error";
            break;

        case "8" :
            $result = "Transaction Type Not Supported";
            break;

        case "9" :
            $result = "Bank declined transaction (Do not contact Bank)";
            break;

        case "A" :
            $result = "Transaction Aborted";
            break;

        case "C" :
            $result = "Transaction Cancelled";
            break;

        case "D" :
            $result = "Deferred transaction has been received and is awaiting processing";
            break;

        case "E" :
            $result = "Referred";
            break;

        case "F" :
            $result = "3D Secure Authentication failed";
            break;

        case "I" :
            $result = "Card Security Code verification failed";
            break;

        case "L" :
            $result = "Shopping Transaction Locked (Please try the transaction again later)";
            break;

        case "N" :
            $result = "Cardholder is not enrolled in Authentication scheme";
            break;

        case "P" :
            $result = "Transaction has been received by the Payment Adaptor and is being processed";
            break;

        case "R" :
            $result = "Transaction was not processed - Reached limit of retry attempts allowed";
            break;

        case "S" :
            $result = "Duplicate SessionID (OrderInfo)";
            break;

        case "T" :
            $result = "Address Verification Failed";
            break;

        case "U" :
            $result = "Card Security Code Failed";
            break;

        case "V" :
            $result = "Address Verification and Card Security Code Failed";
            break;

        default  :
            $result = "Unable to be determined";

    }

    return $result;

}


// If input is null, returns string "No Value Returned", else returns input

function null2unknown($data)
{

    if ($data == "") {

        return "No Value Returned";

    } else {

        return $data;

    }

}

function updateTableResult($vpc_OrderInfo, $vpc_DR)
{

    $server = "localhost"; //  host  server

    $username = "luxvn_onepay"; // username

    $password = ".eyTTL([pKa*"; // password

    $connect = mysql_connect($server, $username, $password);

    mysql_select_db("luxvn_onepay") or die(mysql_error());

    mysql_query("UPDATE tb_tran_op SET vpc_returnURL = '$vpc_DR' WHERE LCASE(vpc_order_id) LIKE '%" . strtolower($orderInfo) . "%' LIMIT 1") or die(mysql_error());

    mysql_close($connect);

}

function sendMail($orderInfo, $transStatus, $amount)
{

// Get Infomation from SQL 

    $connect_sql = mysql_connect("localhost", "luxvn_onepay", ".eyTTL([pKa*") or die("cannot connect");

    mysql_select_db("luxvn_onepay") or die ("cannot select db");

    $select = "SELECT * FROM `tb_tran_op` WHERE LCASE(vpc_order_id) LIKE '%" . strtolower($orderInfo) . "%' LIMIT 1";

    $result = mysql_query($select);

    $num = mysql_numrows($result);

    $row = mysql_fetch_array($result);

    $orderInfoSql = $row["vpc_oderinfo"];

    list ($payment_code, $full_name, $email, $booking_code, $amount) = explode("||", $orderInfoSql);

    /*

    */

    $subject = "Online booking payment : $booking_code";


    $message = "\nInformation payment : ";;


//$message = "\nPayment Code : ".$orderInfo."\n\nFull name : ".$full_name."\nEmail: ".$email."\nBooking code : ".$booking_code."\nTotal Amount: ".number_format($amount,",")."\nStatus : ".$transStatus."";

    $message = "\nPayment Code : " . $orderInfo . "\n\nFull name : " . $full_name . "\nEmail: " . $email . "\nBooking code : " . $booking_code . "\nTotal Amount: " . "$" . $amount . "\nStatus : " . $transStatus . "";


    $msg1 = str_replace("<br>", "\n", $message);


    $messagebody = $msg1;


    $boundary = "==MP_Bound_xyccr948x==";


    //echo "$messagebody";

    $headers = "MIME-Version: 1.0\r\n";

    $headers .= "Content-type: multipart/alternative; boundary=\"$boundary\"\r\n";

    $headers .= "CC: \r\n";

    $headers .= "BCC: \r\n";

    $headers .= "From: $from\r\n";

    $to = "luxurytravelvietnam.com@gmail.com, admin@asiapremiumtravel.com," . $email;

    $mail = @mail($to, $subject, $messagebody, $header);

}

//  ----------------------------------------------------------------------------

?>