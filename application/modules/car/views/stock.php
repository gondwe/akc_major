<?php 

?>


<div class="list-group">
  <a href="#" class="">
    <h4 class='m-3'>Stock</h4>
  </a>
  <ol>
    <li>
        <a href="#" class="list-group-item list-group-item-action">
            Toyota Land Cruiser, 
            <span class='text-danger'>5 Seater</span>
            <span class="badge badge-primary pull-right">On Hire</span>
        </a>
    </li>
    <li>
        <a href="#" class="list-group-item list-group-item-action">
            Subaru WRX, 
            <span class='text-danger'>5 Seater</span>
            <span class="px-2 rounded btn-success pull-right" onclick='hireme(this)'>Available</span>
        </a>
    </li>
  </ol>
</div>


<script>
    function hireme(me){
        console.log(me.id);
    }
</script>