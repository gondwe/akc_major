<div class="container">

<?php 

$p = new Tablo('wallet');
$p->aliases('uid,user');
$p->combos('uid','select id, ucase(concat(first_name," ", last_name)) names from users');
// $p->newform();



?>

<div class="clearfix">

</div>

<hr>
<?php
$g = new Tablo('walletPool');
$g->aliases('uid,user');
$g->combos('uid','select id, ucase(concat(first_name," ", last_name)) names from users');
$g->button('View Statement','statement');
$g->header = false;
$g->table();
?>
</div>