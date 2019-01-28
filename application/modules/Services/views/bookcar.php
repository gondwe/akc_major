<?php 

$bky = $this->db->query("select count(id) c from bookings where sched = '$bk->id' and stage = '$bk->routeId' and date(created_at) = date(curdate()) ")->row('c');

?>
<div class="row">

    <?php $this->load->view('trip/details', ['bk'=>$bk,'id'=>$id,'wallet'=>$wallet,'toto'=>$toto]); ?>

    <div class="col-md-6">
<?php

if($bky > 0){
    
    echo "<p class='mt-3'>Thanks for booking this Trip today.. Find MORE !</p>";

    echo '<a class="btn alert-success" href="'.base_url('Services/find').'">Search Cabs</a>';

}else{
    
    $this->load->view('trip/newbooking', ['bk'=>$bk,'id'=>$id,'wallet'=>$wallet,'toto'=>$toto]);

}

?>
<!-- free localstorage of schedule -->
<script>localStorage.removeItem('bombaSchedule')</script>