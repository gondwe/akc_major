<div class="m-md-3">



<?php 

$data = $data ?? $this->db
->select("c.*,concat(u.first_name,' ',u.last_name) as user, u.phone, count(h.id) as count")
// ->where("c.id", $id)
->from("cars c")
->join("users u","u.id = c.uid", "left")
->join("hire h","u.id = h.carid", "left")
->group_by("c.id")
->get()
->result();

// pf($data);
?>

<h4>Available Cars</h4>

<?php
// foreach($data as $dat):
$this->load->view('car/card', ['data'=>$data]);
// endforeach;
?>




</div>