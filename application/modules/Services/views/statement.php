<div class="d-row">
<div class="col-md-6 pull-left">
Credit
<hr>
<?php 
$g = new Tablo('wallet');
$g->aliases('uid,user');
$g->where('wallet.uid = '.$uid);
$g->combos('uid','select id, ucase(concat(first_name," ", last_name)) names from users');
$g->header = false;
$g->delete = false;
$g->edit = false;
$g->table(0);
?>
</div>

<div class="col-md-6 pull-right">
Debit
<hr>
<?php 
$g = new Tablo('expenditure');
$g->tableid = 'wallet';
$g->aliases('uid,user');
$g->where('uid = '.$uid);
$g->combos('uid','select id, ucase(concat(first_name," ", last_name)) names from users');
$g->header = false;
$g->delete = false;
$g->edit = false;
$g->table(0);
?>
</div>
</div>