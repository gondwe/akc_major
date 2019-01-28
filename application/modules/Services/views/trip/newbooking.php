<?php
/* cross check against No.of seats */
if($toto >= $bk->seat ){
    
    /* booked to capacity no more room */
    pf("Fully Booked");

}else{
    
    /* process new booking */
    $r = new Tablo('bookings');
    $r->hidden('sched',$bk->id);
    $r->formgrid(12,12,12);
    $r->combos('stage',"select id, names from stages where stage = '$bk->routeId'");
    $r->hidden('client',$this->session->user_id);
    
    if($bk->fare <= $wallet){
        
        $r->newform();

    }else{
        echo '<form action="" enctype="multipart/form-data" class="mx-md-1" method="post">
            <div class="form-group col-lg-12 col-md-12 col-sm-12 pull-left mb-3">
            <div class="input-group-prepend"><div class="p-2">STAGE</div></div>
            <select disabled name="stage" class="form-control"><option value="7"> - SELECT STAGE - </option></select></div>
            <div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left ">
            <div class="form-group">
            <label class="text-light">&nbsp;</label>
            <a href="'.base_url('topup').'" class="form-control text-light btn btn-info">KINDLY TOP-UP</a>
            </div></div></form>
            
            
            <span class="alert alert-danger d-flex">The Trip Costs KES.'.$bk->fare.' but your Wallet has only KES.'.$wallet.' left..</span>
            ';

    }
    
}