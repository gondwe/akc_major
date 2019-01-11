<h5>Add Region</h5>
<?php 

$t = new Tablo('regions');
$t->formgrid(6,12,12);
$t->ucase('names');
$t->aliases('names,region/town');
$t->newform();

hr();
$t->edit = false;
$t->table(0);