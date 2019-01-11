<h5>Add Stages</h5>
<?php 

$t = new Tablo('stages');
$t->formgrid(6,12,12);
$t->aliases('stage,route');
$t->aliases('names,stage');
$t->combos('stage','select id, names from routes');
$t->ucase("names");
$t->ucase("stage");
$t->formgrid(4,4,12);
$t->newform();

hr();
$t->edit = false;
$t->table(0);