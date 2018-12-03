<div class="row">

<?php 

$id = $id ?? end($this->uri->segments);
$data = $data ?? $this->db
->select("c.*,concat(u.first_name,' ',u.last_name) as user, u.phone, count(h.id) as count")
->where("c.id", $id)
->from("cars c")
->join("users u","u.id = c.uid", "left")
->join("hire h","u.id = h.carid", "inner")
->get()
->result();

// pf($data);

$this->load->view("card", ['data'=>$data]);

?>

<?=form_open_multipart("car/image/".$id);?>
<h5 class="m-3">Add Images</h5>
<div class="form-group ml-4">
  <label for="exampleInputFile">File input</label>
  <input type="file" class="form-control-file" name='upload' id="exampleInputFile" aria-describedby="fileHelp">
  <small id="fileHelp" class="form-text text-muted"></small>
  <button type="submit" class='btn btn-success'>UPLOAD</button>
</div>
<?=form_close()?>
</div>