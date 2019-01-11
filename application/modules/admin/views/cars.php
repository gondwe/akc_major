<h5>Add Car</h5>
<?php 

$t = new Tablo('cars');
$t->combos('uid','select id, concat(first_name," ",last_name) from users');
$t->combos('region','select id, names from regions');
$t->aliases('uid,owner');
$t->aliases('name,name of car');
$t->aliases('seat,no. of seats');
$t->aliases('cardesc,description');
$t->newform();


hr();
// $t->edit = false;
$t->table(2);