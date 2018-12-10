<?php 


foreach($data as $dat){

  $where = ['carid'=>$dat->id, "status"=>1];
  $hired = count($this->db->where($where)->get('hire')->result());
  // pf($hired);  

?>
<div class="col-md-6">
<div class="card mb-3">
  <h5 class="card-header border-left"><?=$dat->name?>
  <?php if($hired){ ?>
    <small class="pull-right text-success">Booked <i class="fa fa-check-circle"></i></small>
  <?php } ?>
  </h5>
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
    <?php if($hired){ ?>
    <button data-toggle='modal' data-target='#cancel-<?=$dat->id?>' class="card-link pull-right btn btn-primary">Cancel Hire</button>
    <?php }else{ ?>
    <button data-toggle='modal' data-target='#modal-<?=$dat->id?>' class="card-link pull-right btn btn-success">Hire Vehicle</button>
    <?php } ?>
    
  <!-- </div> -->
  <!-- <div class="card-footer text-muted">
    Recent Hire
    <div class="pull-right">2 days ago</div>
  </div> -->
<!-- </div> -->
</div>

<div class="modal" id="modal-<?=$dat->id?>">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <?=form_open('car/hiresuccess/'.$dat->id)?>
      <div class="modal-header">
        <h5 class="modal-title">Hire Vehicle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Select Date Range/ Period</p>
        <div class="form-group">
        <input required class='form-control' type="date" name="dfrom" id="">
        </div>
        <div class="form-group">
        <input required class='form-control' type="date" name="dto" id="">
        </div>
        <input  type="hidden" name="carid" value="<?=$dat->id?>">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </form>
      </div>
  </div>
</div>

<div class="modal" id="cancel-<?=$dat->id?>">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <?=form_open('car/hirecancel/'.$dat->id)?>
      <div class="modal-header">
        <h5 class="modal-title">Cancel Hire</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- <div class="modal-body"> -->
        <!-- <p>Are you sure.?</p> -->
      <!-- </div> -->
        <button type="submit" class="btn btn-primary mb-4 btn-block">Cancel Hire Request</button>
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> -->
    </form>
      </div>
  </div>
<!-- </div> -->

<?php } ?>