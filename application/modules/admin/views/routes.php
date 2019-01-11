<h5>Add Routes</h5>
<?php 

$t = new Tablo('routes');
$t->formgrid(6,12,12);
$t->aliases('names,route');
$t->combos('town','select id, names from regions');
$t->ucase("names");
$t->ucase("town");
$t->formgrid(4,4,12);
$t->newform();

hr();
$t->edit = false;
$t->table(0);