

<?php
$id = $id ?? end($this->uri->segments);
$car = $this->db->get('cars')->row('name');
$imgs = $this->db->get('uploads')->result();
$default = "data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22318%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20318%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_158bd1d28ef%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A16pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_158bd1d28ef%22%3E%3Crect%20width%3D%22318%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22129.359375%22%20y%3D%2297.35%22%3EImage%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E";

?>
<a href="<?=base_url('car/detail/'.$id)?>" class="btn btn-success pull-right">UPLOAD NEW</a>
<h4>Uploads for <small class='text-info font-weight-bold'><?=$car?></small></h4>
<div class="">
<?php 


$x = 2;

foreach($imgs as $img): 
  $uploaded = $img->upload;
  $path = "assets/images/".$uploaded;
  $file = base_url($path);
  $src = file_exists($path) && $uploaded ? $file : $default;
  
?>
<div class="img">
  <!-- <img class="d-block w-100" src="<?=$src?>" alt="Slide <?=$x?>"> -->
  <div class="col-md-4 float-left">
  <div class="card m-2">
  <h3 class="card-header"><?=$uploaded?></h3>
  <!-- <div class="card-body"> -->
    <a href="<?=base_url('car/delpics/'.$img->id."/".$id)?>" class="btn btn-primary">DELETE</a>
  <!-- </div> -->
  <img style="height: 200px; width: 100%; display: block;" src="<?=$src?>" alt="Card image">
  </div>
  
</div>
</div>
<?php $x++; endforeach; ?>