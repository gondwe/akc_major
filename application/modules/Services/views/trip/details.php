<div class="col-md-6">
<div class="p-4">
    <!-- <hr> -->
  <h4>Details</h4>
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