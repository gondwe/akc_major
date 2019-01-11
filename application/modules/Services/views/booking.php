<div class="row">
    <div class="col-md-5">
<?php


/* cross check against No.of seats */
if($toto >= $bk->seat ){
    
    /* booked to capacity no more room */
    pf("Fully Booked");

}else{
    
    /* process new booking */
    $r = new Tablo('bookings');
    $r->hidden('sched',$bk->id);
    $r->formgrid(6,6,12);
    $r->aliases("stage,select your stage");
    $r->combos('stage',"select id, names from stages where stage = '$bk->routeId'");
    $r->hidden('client',$this->session->user_id);
    $r->newform();
    
}
?>
<div class="p-4">
    <!-- <hr> -->
  <h4>Details</h4>
    <?php 
        // pf($toto);
        
        ?>
    <h6><b>Time : </b><?=ucwords($bk->rush)?></h6>
    <h6><b>Route : </b><?=ucwords($bk->route)?></h6>
    <h6><b>Origin : </b><?=ucwords($bk->stage)." (".$bk->origin?>)</h6>
    <h6><b>Available Seats : </b><span class="badge badge-primary"><?=($bk->seat - $toto)?></span></h6>
    <h5><b>Cost : </b><?=ucwords($bk->fare)?></h5>
    <h6><b>Vehicle : </b><?=ucwords($bk->car)?> (Capacity : <?=$bk->seat?>)</h6>
    <hr>
    <p><b></b><?=($bk->dated)?></br>
    <b></b><?=($bk->rushdata)?></p>
    
</div>
</div>

<div class="col-md-7 pt-5">
  

<!-- <h5>My Bookings</h5> -->

<?php 

$d = new Tablo('bookings');
$d->combos('client',"select id, concat(first_name,' ',last_name) from users");
$d->combos('stage',"select id, names from stages");
$d->where('client',$this->session->userid);
$d->edit = false;
$d->hide('sched');
$d->table(0);
// </div>
// </div>