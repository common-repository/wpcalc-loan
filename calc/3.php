<div class="wpcalc">
<form id="mainform">
<div class="wpcalc-usloviya">


<div class="wpcalc-col">
<div class="wpcalc-col-4"><b><?php esc_attr_e("Сost of car", "wpcalc-loan") ?>:</b></div><div class="wpcalc-col-4"><input type="text" name="stoimkv" value="<?php echo get_option('stoimkv3'); ?>" size=4 onkeyup="considerResult();this.value = (this.value.replace(/\s*/g,'')).replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1 ');"></div>
</div>

<div class="wpcalc-col">
<div class="wpcalc-col-4"><b><?php esc_attr_e("Down payment", "wpcalc-loan") ?>:</b></div><div class="wpcalc-col-4"><input type="text" name="firstpay" value="<?php echo get_option('firstpay3'); ?>" size=4 onkeyup="considerResult();this.value = (this.value.replace(/\s*/g,'')).replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1 ');"></div>
</div>

<div class="wpcalc-col">
<div class="wpcalc-col-4"><b><?php esc_attr_e("Credit term", "wpcalc-loan") ?>:</b></div><div class="wpcalc-col-4"><input type="text" name="term" value="<?php echo get_option('term3'); ?>" size=4 onkeyup="considerResult()"></div><div class="wpcalc-col-4"><select name="vremya" onclick="considerResult()" onkeyup="considerResult()"><option id="mes" value="1"> <?php esc_attr_e("months", "wpcalc-loan") ?> </option><option id="god" value="2"> <?php esc_attr_e("years", "wpcalc-loan") ?> </option></select></div>
</div>

<div class="wpcalc-col">
<div class="wpcalc-col-4"><b><?php esc_attr_e("Interest rate", "wpcalc-loan") ?>:</b></div><div class="wpcalc-col-4"><input  type="text" name="percent" size=4 value="<?php echo get_option('percent3'); ?>" onkeyup="considerResult()"></div><div class="wpcalc-col-4"><select name="nachisl" onclick="considerResult()" onkeyup="considerResult()"><option id="vmes" value="1">% <?php esc_attr_e("in year", "wpcalc-loan") ?></option><option id="vgod" value="2">%  <?php esc_attr_e("per month", "wpcalc-loan") ?> </option></select></div>
</div>

<div class="wpcalc-col">
<div class="wpcalc-col-4"><b><?php esc_attr_e("Scheme of repayment", "wpcalc-loan") ?></b></div><div class="wpcalc-col-8"><select name="Shema" onclick="considerResult()" onkeyup="considerResult()"><option id="annuitet" value="annuitet"><?php esc_attr_e("Annuity", "wpcalc-loan") ?></option><option id="classic" value="classic"><?php esc_attr_e("Classical", "wpcalc-loan") ?></option></select></div>
</div>

<div class="wpcalc-col">
<div class="wpcalc-col-4"><?php esc_attr_e("Single fee", "wpcalc-loan") ?> </div><div class="wpcalc-col-4"><input type="text" size=4 placeholder="%" name="pr1" value="" onkeyup="considerResult()"></div><div class="wpcalc-col-4"><input size=4 type="text" placeholder="<?php esc_attr_e("Amount", "wpcalc-loan") ?>" name="com1" value="" onkeyup="considerResult()"></div>
</div>

<div class="wpcalc-col">
<div class="wpcalc-col-4"><?php esc_attr_e("Monthly fee", "wpcalc-loan") ?></div><div class="wpcalc-col-4"><input type="text" placeholder="%" name="pr2" value="" size=4 onkeyup="considerResult()"></div><div class="wpcalc-col-4"><input type="text" size=4 placeholder="<?php esc_attr_e("Amount", "wpcalc-loan") ?>" name="com2" value="" onkeyup="considerResult()"></div>
</div>

<div class="wpcalc-col">
<div class="wpcalc-col-4"><?php esc_attr_e("Yearly fee", "wpcalc-loan") ?> </div><div class="wpcalc-col-4"><input type="text" size=4 placeholder="%" name="pr3" value="" onkeyup="considerResult()"></div><div class="wpcalc-col-4"><input type="text" size=4 placeholder="<?php esc_attr_e("Amount", "wpcalc-loan") ?>" name="com3" value="" onkeyup="considerResult()"></div>
</div>

<div class="wpcalc-col">
<div class="wpcalc-col-12"><center><input type="button" onclick="considerResult();displayplat();" value="<?php esc_attr_e("Calculate", "wpcalc-loan") ?>"></center></div>
</div>



</div>
<div class="wpcalc-result" id="plateg" style="display:none;" >


<div class="wpcalc-col">
<div class="wpcalc-col-6"><b><span id="pay_header"><?php esc_attr_e("Monthly loan payment", "wpcalc-loan") ?>:</span> </b></div><div class="wpcalc-col-6"><span id="monthPay" class="resaltmain"></span></div>
</div>

<div class="wpcalc-col">
<div class="wpcalc-col-6"><span><?php esc_attr_e("Monthly fee", "wpcalc-loan") ?>:<span></div><div class="wpcalc-col-6"><span id="monthlyFee" class="resaltother"></span></div>
</div>

<div class="wpcalc-col">
<div class="wpcalc-col-6"><span><b><?php esc_attr_e("Overpayment in monetary", "wpcalc-loan") ?>:</b><span></div><div class="wpcalc-col-6"><span id="overpayment" class="resaltmain"></span></div>
</div>

<div class="wpcalc-col">
<div class="wpcalc-col-2"></div><div class="wpcalc-col-10"><i><?php esc_attr_e("including", "wpcalc-loan") ?>:</i></div>
</div>


<div class="wpcalc-col">
<div class="wpcalc-col-6"><span><?php esc_attr_e("Interest on loan", "wpcalc-loan") ?>:<span></div><div class="wpcalc-col-6"><span id="interestOnLoan" class="resaltother"></span></div>
</div>

<div class="wpcalc-col">
<div class="wpcalc-col-6"><span><?php esc_attr_e("Sum Single fee", "wpcalc-loan") ?>:<span></div><div class="wpcalc-col-6"><span id="singleFee" class="resaltother"></span></div>
</div>

<div class="wpcalc-col">
<div class="wpcalc-col-6"><span><?php esc_attr_e("Sum Monthly fee", "wpcalc-loan") ?>:<span></div><div class="wpcalc-col-6"><span id="summMonthlyFee" class="resaltother"></span></div>
</div>

<div class="wpcalc-col">
<div class="wpcalc-col-6"><span><?php esc_attr_e("Sum Yearly fee", "wpcalc-loan") ?>:<span></div><div class="wpcalc-col-6"><span id="summEearFee" class="resaltother"></span></div>
</div>

<div class="wpcalc-col">
<div class="wpcalc-col-6"><span> <b><?php esc_attr_e("Overpayment Percentage", "wpcalc-loan") ?>:</b><span></div><div class="wpcalc-col-6"><span id="overpaymentPercentage" class="resaltmain"></span></div>
</div>

<div class="wpcalc-col">
<div class="wpcalc-col-6"><span><b><?php esc_attr_e("The total amount to be returned", "wpcalc-loan") ?>: </b><span></div><div class="wpcalc-col-6"><span id="allPay" class="resaltmain"></span></div>
</div>

</div>


<div id="print2" style="display:none;" class="wpcalc-col">
<div class="wpcalc-col-9"></div><div class="wpcalc-col-3"><input type="button" onclick="atoprint();" value="<?php esc_attr_e("Print", "wpcalc-loan") ?>">
</div>
</div>
<input type="hidden" name="textfirstpayment" value="<?php esc_attr_e("First payment", "wpcalc-loan") ?>"><input type="hidden" name="textmonthlypayment" value="<?php esc_attr_e("Monthly payment", "wpcalc-loan") ?>"><input type="hidden" name="textPeriod" value="<?php esc_attr_e("Period", "wpcalc-loan") ?>"><input type="hidden" name="textPayment" value="<?php esc_attr_e("Payment", "wpcalc-loan") ?>"><input type="hidden" name="textPrincipal" value="<?php esc_attr_e("Principal Paid", "wpcalc-loan") ?>"><input type="hidden" name="textInterest" value="<?php esc_attr_e("Interest Paid", "wpcalc-loan") ?>"><input type="hidden" name="textBalance" value="<?php esc_attr_e("Balance", "wpcalc-loan") ?>"><input type="hidden" name="textTotal" value="<?php esc_attr_e("Total", "wpcalc-loan") ?>"><input type="hidden" name="textmonths" value="<?php esc_attr_e(" months.", "wpcalc-loan") ?>"><input type="hidden" name="textyear" value="<?php esc_attr_e(" year", "wpcalc-loan") ?>"><input type="hidden" name="textprint" value="<?php esc_attr_e("Print", "wpcalc-loan") ?>">
</form>
</div>