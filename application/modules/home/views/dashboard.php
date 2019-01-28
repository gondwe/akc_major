<h5>Dashboard</h5>
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="taby nav-link <?=$tab == 'home' ? 'active show' : null ?>" id="trip" data-toggle="tab" href="#home">Taxi Trip</a>
  </li>
  <li class="nav-item">
    <a class="taby nav-link <?=$tab == 'profile' ? 'active show' : null ?>" id="hire" data-toggle="tab" href="#profile">Car Hire</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Actions</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="<?=base_url('car/add')?>">Cars</a>
      <a class="dropdown-item" href="<?=base_url('home/membership')?>">Membership</a>
      <a class="dropdown-item" href="#">Settings</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">FAQs</a>
    </div>
  </li>
</ul>
<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade <?=$tab == 'home' ? 'active show' : null ?>" id="home">
    <p><?php $this->load->view('taxitrip')?></p>
  </div>
  <div class="tab-pane fade <?=$tab == 'profile' ? 'active show' : null ?>" id="profile">
    <p><?php $this->load->view('carhire')?></p>
  </div>
</div>

<script>
if(localStorage.getItem('bombaSchedule') != null){
  window.location = "<?=base_url('Services/bookcar/')?>"+ localStorage.getItem('bombaSchedule');
}

$('.taby').click(function(){
  window.location.href="<?=base_url('Home/')?>" + this.id
})
</script>