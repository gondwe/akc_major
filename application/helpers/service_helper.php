<?php 
function serve($view, $data=[]){$ci = &get_instance();$ci->load->view("section/header", $data);$ci->load->view($view,$data);$ci->load->view("section/footer");}function beefSecurity(){ redirect("auth/logout"); }function pf($i){ echo "<pre>"; print_r($i); echo "</pre>"; }function notify($message){}


function imgLoop($arr, $active=null){
    $uploaded = $arr->upload;
    $path = "assets/images/".$uploaded;
    $file = base_url($path);
    $src = file_exists($path) && $uploaded ? $file : $default;
    echo '

    <div class="carousel-item '.$active.'" style="height:200px;">
    <img class="d-block w-100" src="'.$src.'" alt="Slide Img" >
    </div>
    ';
}

function carList($cars){
    ?>
        <ol>
        <?php foreach($cars as $car) : ?>
            <li>
                <a href="<?=base_url('car/detail/'.$car->id)?>" class="list-group-item list-group-item-action">
                    <?=$car->name?>, 
                    <span class='text-danger'><?=$car->seat?> Seater</span>
                    <?php if($car->status){?>
                    <span class="badge badge-primary pull-right">On Hire</span>
                    <?php }else{ ?>
                    <span class="px-2 rounded btn-success pull-right" onclick='hireme(this)'>Available</span>
                    <?php } ?>
                </a>
            </li>
        <?php endforeach ?>
  </ol>
    <?php
}

function carListed($cars){
    ?>
        <?php foreach($cars as $car) : ?>
            <!-- <li> -->
                <a href="<?=base_url('car/detail/'.$car->id)?>" class="list-group-item d-flex-inline list-group-item-action">
                    <?=$car->name?>, 
                    <span class='text-danger'><?=$car->seat?> Seater</span>
                    <span class='rounded px-2 badge-warning'><?=$car->region?></span>
                    <!-- <span class='cite'><?=$car->cardesc?></span> -->
                    <?php if($car->status){?>
                    <span class="badge badge-primary pull-right">On Hire</span>
                    <?php }else{ ?>
                    <span class="px-2 rounded btn-success pull-right" onclick='hireme(this)'>Available</span>
                    <?php } ?>
                </a>
        <?php endforeach ?>
    <?php
}

function iownthiscar($id){
    $ci = &get_instance();
    $mycars = $ci->db->select("id")->where("uid", $ci->session->user_id)->get("cars")->result_array();
    $mc = empty($mycars)? [] : array_column($mycars,"id");
    return in_array($id,$mc) ? true : false;
}