<div class="row">
        <div class="text-center col-md-8">
    <div class="display-4 text-info">
        Wallet : <?=$wallet?>
        </div>
        <h4 class="card-title">Mpesa Information</h4>
    <p class="card-text">
    Paybill 349534 <br>
    Business Name Bomba Services <br>
    Account No. 3495834958345</p>
    </div>
<div class="card  pull-right col-md-3 m-1">
  
</div>
</div>


<div class="clearfix">

</div>

<hr class="py-3">

<h5>Recent Payment Transactions</h5>
<?php 

$p = new Tablo('payments');
$p->where('uid = '.$this->session->user_id);
// $p->header = false;
$p->table();