<a name="" id="" class="mt-5 ml-5  btn btn-primary" href="<?=base_url('Services/find')?>" role="button">Find Cab</a>
<?php 


$d = new Tablo('bookings');
$d->combos('client',"select id, concat(first_name,' ',last_name) from users");
// $d->combos('stage',"select id, names from stages");
$d->where('client',$this->session->user_id);
$d->edit = false;
$d->hide('sched');
$d->sqlstring = "select b.id, date(b.created_at) date_ ,ucase( st.names) stage, sc.dept_time origin,
rh.names rush,rt.names route, concat('KES.',rt.fare) fare,
c.name car, concat(c.seat, ' seats') seats
from bookings b
left join schedules sc on sc.id = b.sched
left join rush_hours rh on rh.id = sc.rushhour
left join regions rg on rg.id = sc.town
left join routes rt on rt.id = sc.route
left join cars c on c.id = sc.car 
left join stages st on st.id = b.stage 

";


?>
<div class="m-md-3">
  <div class="card text-left">
    <button type="button" name="" id="" class="btn btn-info" btn-lg btn-block">Schedules</button>
    <div class="card-body">
      <p class="card-text"><?php $d->table(0)?></p>
    </div>
  </div>

</div>
