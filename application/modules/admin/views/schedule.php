<h5>Schedule Bomba Rides</h5>
<?php 

$t = new Tablo('schedules');
// $t->formgrid(4,6,12);
// $t->combos('car','select id, name from cars');
$t->combos('route','select id, names from routes');
$t->combos('rushhour','select id, names from rush_hours');
// $t->ucase('route');
$t->newform();

hr();
$t->edit = false;
$t->table(0);