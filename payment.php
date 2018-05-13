
<?php include("header.php"); ?>


            <table width="850" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                <tbody>
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
                    <!--<td>&nbsp;</td>-->
                    <!--<td background="images/bk.gif">&nbsp;</td>-->
                    <td colspan="3" align="center" valign="middle">
                        <div style="text-align:right">
                            <table class="content" width="100%" border="0" cellspacing="0" cellpadding="5">
                                <tbody>
                                <tr>
                                    <td align="right">
                                        <table align="center" class="content" width="400px" border="0" cellspacing="2"
                                               cellpadding="3">
                                            <tbody>
                                            <tr>
                                                <td width="130px"
                                                    style="border-bottom: 2px solid #F17E01; margin-right: 5px;"><b>Payment
                                                    Infomation</b></td>
                                                <td width="10px"></td>
                                                <td width="120px"
                                                    style="border-bottom: 2px solid #727272; margin-right: 5px;color:#727272;">
                                                    <b>Confirm Payment</b></td>
                                                <td width="10px"></td>
                                                <td width="100px"
                                                    style="border-bottom: 2px solid #727272; margin-right: 5px;color:#727272;">
                                                    <b>Payment</b></td>
                                                <td width="10px"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <br></div>
                        <div>
                            <fieldset style="text-align:center;">
                                <legend class="title_1"><b> Payment Infomation </b></legend>
                                <script language="javascript">
                                    function checkPayment(f) {
                                        var vpc_Bookingcode = f.vpc_Bookingcode.value;
                                        if (vpc_Bookingcode == '') {
                                            alert("Please enter Booking code!");
                                            f.vpc_Bookingcode.focus();
                                            return false;
                                        }
                                        var vpc_Fullname = f.vpc_Fullname.value;
                                        if (vpc_Fullname == '') {
                                            alert("Please enter Full Name !");
                                            f.vpc_Fullname.focus();
                                            return false;
                                        }

                                        var re = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,5})$/gi;
                                        vpc_Email = f.vpc_Email.value;
                                        if (vpc_Email == '') {
                                            alert("Please enter Email address !");
                                            f.vpc_Email.focus();
                                            return false;
                                        }
                                        var vpc_Amount = f.vpc_Amount.value;
                                        if (vpc_Amount == '' || vpc_Amount <= 0) {
                                            alert("Please enter Amount (Only Number ) !");
                                            f.vpc_Amount.focus();
                                            return false;
                                        }
                                        var vpc_TxSourceSubType = f.vpc_TxSourceSubType;
                                        if (!vpc_TxSourceSubType.checked) {
                                            alert("You must click to accept the Terms and Conditions!");
                                            return false;
                                        }

                                        return true;
                                    }
                                </script>

                                <form id="pay_online" name="pay_online" method="post"
                                      onsubmit="return checkPayment(this)" action="payment_confirm.php">
                                    <table class="content" bgcolor="#F7F9FF" width="100%" border="0" cellspacing="2"
                                           cellpadding="5">
                                        <tbody>
                                        <tr>
                                            <td><strong>Booking Code / Trip Code or Proposal Code: </strong></td>
                                            <td><input type="text" name="vpc_Bookingcode"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Credit Card Holder's Fullname: </strong></td>
                                            <td><input type="text" name="vpc_Fullname"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email: </strong></td>
                                            <td><input type="text" name="vpc_Email" onblur="email_cf();"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Total Amount: </strong><br>
                                                <i>Only Number [ 1 ... 9 ]</i></td>
                                            <td><input type="text" name="vpc_Amount"> <br><b>USD</b></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><p class="style5">Terms and Conditions</p>
                                                <textarea name="textarea" cols="52" rows="5" style="width: 100%;">Deposits &amp; Payment Policy

Deposit of 20% of the total of tour is required upon confirmation of booking tour.  You have peace of mind until 2 months before departure dates. At that point, we would require full prepayment only 60 days before departure for all services by money transfer or credit card payment with all bank transfer charges/ fees to be paid by the client.

The bank account name: LUXURY TRAVEL Co., Ltd.
The bank name: ANZ Bank, Hanoi Branch
The bank branch: Hanoi Branch
The International Banking Account Number: 6276881
Bank Swift Code: ANZB VNVX
The bank address: 14 Le Thai To Street, Hanoi , Vietnam
Website: www.anz.com/vietnam

All the tour packages on this website operate on a pre-payment basis. Payment can be made either using a major credit card as Visa, Mastercard and American Express Credit Card without credit card transaction fee ( 3% fee for Visa, Mastercard or 4% for American Express Credit Card).

- If you wish to pay us online on our secure server, please click here and fill in the form.

- Click here and then print a copy of our credit card charge form offline. Once completed please fax the form with one copy of 2 sides of your credit card with your signature to our Hanoi Head Office at ++84.4.3927 4118 or scan it and email us to sales@luxurytravelvietnam.com

After receiving your payment, we will issue you the hotel voucher and/or final confirmation itinerary, which can be sent to you by fax or e-mail.

Children Policies
+ Maximum 1 child can share the parent's existing bedding.
+ Child under 2 years old is free of charge and share the parent's existing bedding.
+ Child from 2 - under 6 years old: 50% of adult price and share the parent's existing bedding.
+ Child from 7 - under 12 years old: 75% of adult price and share the parent's existing bedding

Booking Amendment
Flexibilility is our strongest point. You can amend your booking when it is made. Just contact us at sales@luxurytravelvietnam.com with your booking number. Our reservations team is glad to amend your booking accordingly.

Cancellation Policy
NON REFUNDABLE deposit of 10 US$ for hotel, air ticket booking upon services confirmation or US$ 100 upon tours services confirmation

Cancellations will be charged as follow:
+ 60 days before arrival: No cancellation charge. We Guarantee 100% Money Back
+ 59-30 days before arrival: 5% cancellation charge.
+ 29-15 days before arrival: 10%
+ 14-8  days before arrival: 40%
+ 7 days before arrival: 100 %
+ No show: 100%

Refund of Unused Services

+ No refund will be given for any unused service after the trip has commenced. </textarea></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">&nbsp;        </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input name="vpc_TxSourceSubType" value="1" tabindex="103"
                                                       type="checkbox">
                                                I have read, understood, and accept the Terms and Conditions as stated
                                                in the agreement and release and discharge LUXURY TRAVEL Co., Ltd
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td><input type="submit" name="Submit" value="Confirm">
                                                <span class="intro">
     </span></td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </form>
                            </fieldset>
                        </div>
                        <!--<p>&nbsp;</p></td>-->
                    <!--<td background="images/bk.gif">&nbsp;</td>-->
                    <!--<td>&nbsp;</td>-->
                </tr>
                <!--<tr>-->
                    <!--<td>&nbsp;</td>-->
                    <!--<td background="images/bk.gif">&nbsp;</td>-->
                    <!--<td colspan="3" align="center" valign="middle">&nbsp;</td>-->
                    <!--<td background="images/bk.gif">&nbsp;</td>-->
                    <!--<td>&nbsp;</td>-->
                <!--</tr>-->

                <tr>
                    <!--<td>&nbsp;</td>-->
                    <!--<td background="images/bk.gif">&nbsp;</td>-->
                    <td colspan="3" valign="middle">
                        <div align="center" class="style1"> We accept the majors credit cards: <img
                                src="images/1359_partner.png" border="0" align="absmiddle"></div>
                    </td>
                    <!--<td background="images/bk.gif">&nbsp;</td>-->
                    <!--<td>&nbsp;</td>-->
                </tr>


                </tbody>
            </table>


<?php include("footer.php"); ?>