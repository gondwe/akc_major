<?php 
    $id = $id ?? $this->session->user_id;

    $cars = $this->db
        ->select('c.id,c.name,c.seat,h.status')
        ->where('c.uid',$id)
        ->from("cars c")
        ->join("hire h", 'h.carid = c.id','LEFT')
        ->get()
        ->result();
?>


<div class="list-group">
  <a href="#" class="">
    <h4 class='m-3'>Stock</h4>
  </a>
<?php carList($cars); ?>
</div>


<script>
    function hireme(me){
        console.log(me.id);
    }
</script>