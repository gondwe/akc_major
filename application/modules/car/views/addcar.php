<?=form_open('car/add')?>
    <div class="form-group col-md-8 pull-left">
        <label for="exampleInputEmail1">Vehicle Make & Model</label>
        <input type="text" required name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
        <small id="nameHelp" class="form-text text-muted">Descriptive Name of vehicle.</small>
    </div>
    <div class="form-group col-md-4 pull-right">
        <label for="exampleInputEmail1">Seating Capacity</label>
        <input required type="number" name="seat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Total Seats">
        <small id="nameHelp" class="form-text text-muted">No of Seats.</small>
    </div>
    <div class="form-group pull-left col-md-8">
      <label for="exampleTextarea">Description</label>
      <textarea name="cardesc" class="form-control" id="exampleTextarea" rows="3"></textarea>
    </div>
    <div class="form-group col-md-4 pull-right">
        <select name="region" id="" class="form-control">
            <option value="Nairobi">Nairobi</option>
            <option value="Mombasa">Mombasa</option>
            <option value="Kisumu">Kisumu</option>
            <option value="Nakuru">Nakuru</option>
        </select>
        <small id="nameHelp" class="form-text text-muted">No of Seats.</small>
    </div>
    <button type="submit" class="btn btn-primary pull-right mr-md-4">Submit</button>
</form>
<div class="clearfix"></div>
<hr >

<!-- <h4 class="mt-md-5">Recent</h4> -->
<?php 

$this->load->view("stock", ["uid"=>1]);

?>