<!-- <h5>Book A Car</h5> -->
<h5>Upcoming Rides</h5>
<?php 


$s = new Tablo('schedules');
$s->where("dated >= curdate()");
$s->combos('car','select id, name from cars');
$s->combos('rushhour','select id, ucase(names) from rush_hours');
$s->combos('town','select id, ucase(names) from regions');
$s->combos('route','select id, ucase(names) from routes');
$s->button("view & book","booking");
$s->aliases("rushhour,time");
$s->hide("dated");
$s->table(0);