<?php 


foreach($data as $dat){
?>
<div class="col-md-6">
<div class="card mb-3">
  <h5 class="card-header"><?=$dat->name?></h5>
  <div class="card-body">
    <h5 class="card-title">Posted By <a href="<?=base_url('home/driver/'.$dat->uid)?>"><?=$dat->user?></a></h5>
    <h6 class="card-subtitle text-muted"><?=$dat->seat?> seater |  <div class="badge badge-primary"><?=$dat->region?></div></h6>
  </div>
  <?php $this->load->view('carousel', ['id'=>$dat->id]); ?>
  <div class="card-body">
    <p class="card-text"><?=$dat->cardesc?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Contact : +<?=$dat->phone?></li>
    <li class="list-group-item"><?=$dat->count ? $dat->count.' successful hires' : 'Now Hiring..'  ?></li>
  </ul>
  <!-- <div class="card-body"> -->
    <a href="#" class="card-link pull-right btn btn-info">View & Hire</a>
  <!-- </div> -->
  <div class="card-footer text-muted">
    Recent Hire
    <div class="pull-right">2 days ago</div>
  </div>
</div>
</div>
<?php 
}