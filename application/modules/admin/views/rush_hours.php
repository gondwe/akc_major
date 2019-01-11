<h5>Custom Rush Hours</h5>
<?php 

$t = new Tablo('rush_hours');
$t->formgrid(4,6,12);
$t->newform();

hr();
$t->edit = false;
$t->table(0);