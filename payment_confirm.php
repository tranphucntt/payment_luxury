<?php
session_start();
$timenow = time();
if (isset($_POST["vpc_Bookingcode"])) {
    $vpc_Bookingcode = $_POST["vpc_Bookingcode"];
}
if (isset($_POST["vpc_Fullname"])) {
    $vpc_Fullname = $_POST["vpc_Fullname"];
}
if (isset($_POST["vpc_Email"])) {
    $vpc_Email = $_POST["vpc_Email"];
}
if (isset($_POST["vpc_Amount"])) {
    $vpc_Amount = intval($_POST["vpc_Amount"]);
}
$vpc_Amount_convert = $vpc_Amount * 100;

$vpc_order_id = time();
$vpc_order_id = "PAY-" . $vpc_order_id;

$_SESSION["OrderInfo"] = "$vpc_order_id||$vpc_Fullname||$vpc_Email||$vpc_Bookingcode||$vpc_Amount";
$OrderInfo = $vpc_order_id;
if ($vpc_Bookingcode == "" || $vpc_Fullname == "" || $vpc_Email == "" || $vpc_Amount == "") {
    //echo '<p align="center"><b>Your confirm is not correct. Please try again !!!</b></p>';
    echo '<script>alert(\'Your confirm is not correct. Please try again !!!\');window.location=\'payment.htm\';</script>';
    exit();
}

?>

<?php include("header.php"); ?>

    <table width="850" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
            <!--<td>&nbsp;</td>-->
            <!--<td background="images/bk.gif">&nbsp;</td>-->
            <td height="45" colspan="3" align="center" valign="middle" bgcolor="EEEFF0" class="style3">
                <p><strong>"The Best Luxury Tour Operator in Vietnam"</strong>- The Guide
                    Magazine<strong>. </strong></p></td>
            <!--<td background="images/bk.gif">&nbsp;</td>-->
            <!--<td>&nbsp;</td>-->
        </tr>

        <tr>
            <!--    <td>&nbsp;</td>-->
            <!--    <td background="images/bk.gif">&nbsp;</td>-->
            <td colspan="3" align="center" valign="middle">
                <div style="text-align:right">
                    <table class="content" width="100%" border="0" cellspacing="0" cellpadding="5">
                        <tr>
                            <td align="right">
                                <table align="center" class="content" width="400px" border="0" cellspacing="2"
                                       cellpadding="3">
                                    <tr>
                                        <td width="130px"
                                            style="border-bottom: 2px solid #727272; margin-right: 5px;color:#727272;">
                                            <b>Payment Infomation</b></td>
                                        <td width="10px"></td>
                                        <td width="120px" style="border-bottom: 2px solid #F17E01; margin-right: 5px;">
                                            <b>Confirm Payment</b></td>
                                        <td width="10px"></td>
                                        <td width="100px"
                                            style="border-bottom: 2px solid #727272; margin-right: 5px;color:#727272;">
                                            <b>Payment</b></td>
                                        <td width="10px"></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <br></div>
                <div>
                    <FIELDSET style="text-align:center;width:500px;">
                        <LEGEND class="title_1"> </i><b> Confirm Payment </b></LEGEND>
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
                            <input type="hidden" name="virtualPaymentClientURL" size="63"
                                   value="https://onepay.vn/vpcpay/vpcpay.op" maxlength="250">
                            <input type="hidden" name="vpc_Version" value="2" size="20" maxlength="8">
                            <input type="hidden" name="vpc_Command" value="pay" size="20" maxlength="16">
                            <input type="hidden" name="vpc_AccessCode" value="4DE4C28C" size="20" maxlength="8">
                            <input type="hidden" name="vpc_MerchTxnRef" value="<?= $vpc_order_id ?>" size="20"
                                   maxlength="40">
                            <input type="hidden" name="vpc_Merchant" value="OP_LUXURY" size="20" maxlength="16">
                            <input type="hidden" name="vpc_OrderInfo" value="<?= $OrderInfo ?>" size="20"
                                   maxlength="34">
                            <input type="hidden" name="vpc_Amount" value="<?= $vpc_Amount_convert ?>" size="20"
                                   maxlength="10">
                            <input type="hidden" name="vpc_Locale" value="en" size="20" maxlength="5">
                            <input type="hidden" name="vpc_ReturnURL" size="63"
                                   value="https://luxurytravelvietnam.com/msg.php" maxlength="250">

                            <table class="content" bgcolor="#F7F9FF" width="100%" border="0" cellspacing="2"
                                   cellpadding="5">
                                <tr>
                                    <td></td>
                                    <td><input type="hidden" name="textfield"></td>
                                </tr>
                                <tr>
                                    <td><strong>Booking Code / Trip Code or Proposal Code: </strong></td>
                                    <td><?= $vpc_Bookingcode ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Credit Card Holder's Fullname: </strong></td>
                                    <td><?= $vpc_Fullname ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Email: </strong></td>
                                    <td><?= $vpc_Email ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Total Amount: </strong></td>
                                    <td><font color="red"><b><? echo $vpc_Amount; ?></font> USD</b></font></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="hidden" name="vpc_TicketNo"
                                                           value="<?= $_SERVER['REMOTE_ADDR'] ?>" maxlength="15"></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td><input type="submit" name="SubButL" value="Pay Now!"></td>
                                </tr>
                            </table>

                        </form>


                    </FIELDSET>
                </div>
                <!--    <p>&nbsp;</p></td>-->
                <!--    <td background="images/bk.gif">&nbsp;</td>-->
                <!--    <td>&nbsp;</td>-->
        </tr>
        <!--  <tr>-->
        <!--    <td>&nbsp;</td>-->
        <!--    <td background="images/bk.gif">&nbsp;</td>-->
        <!--    <td colspan="3" align="center" valign="middle">&nbsp;</td>-->
        <!--    <td background="images/bk.gif">&nbsp;</td>-->
        <!--    <td>&nbsp;</td>-->
        <!--  </tr>-->
        <!--  -->
        <tr>
            <td>&nbsp;</td>
            <td background="images/bk.gif">&nbsp;</td>
            <td colspan="3" valign="middle">
                <div align="center" class="style1"> We accept the majors credit cards: <img
                        src="images/1359_partner.png" border="0" align="absmiddle"></div>
            </td>
            <td background="images/bk.gif">&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    </table>

<?php include("footer.php"); ?>