<h5>Admin Dashboard</h5>

<?php 

?>

<div class="row">
    <div class="col-md-2">
        <?php 
            foreach ($mods as $key => $value) { $btn = $value == $active ? "primary" : "secondary";
                echo "<a class='btn btn-$btn d-flex m-1' href='".base_url('admin/'.strtolower($value))."'>".strtoupper($value)."</a>";
            }
        ?>
    </div>
    <div class="col-md-10">
        <?php 
            // foreach ($mods as $key => $value) { 
                $this->load->view('admin/'.$active);
            // }
        ?>   


    </div>
</div>
