<h5>Car-Route Binding</h5>
<?php 

$t = new Tablo('bindings');
$t->formgrid(4,6,12);
$t->combos('car','select id, name from cars');
$t->combos('route','select id, names from routes');
$t->ucase('route');
$t->newform();

hr();
$t->edit = false;
$t->table(0);