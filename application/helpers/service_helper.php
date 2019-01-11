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


function openDataTables(){
    echo '<link rel="stylesheet" href="'.base_url('assets/css/jquery-ui.css').'">';
    echo '<link rel="stylesheet" href="'.base_url('assets/css/dataTables.jqueryui.min.css').'">';
}


function closeDataTables($disp, $limit=25){
    ?>
        <script src="<?=base_url('assets/js/jquery.dataTables.min.js')?>"></script>
        <script>
        var disp = "<?=$disp?>"
        $(document).ready(function() { $("#example").DataTable({ 
            pageLength:<?=$limit?>,
            searching:disp == 0 ? false:true,
            paging:disp == 0 ? false:true,
            ordering:disp == 0 ? false:true,
        }); } ); 
        function dltr(url,id){ swaldel(url,id); }
        </script>
    <?php
}


function this(){ return $CI = & get_instance(); }

function rxx($i){ return ucwords(strtolower(str_replace("_"," ",$i))); }

function process($sql){ $db = this()->db; $db->query($sql); }  



function dataTableModals(){}


function linkTo($disp,$url){
  echo '<a class="btn btn-success btn-sm m-1" href="'.base_url($url).'" role="button">'.$disp.'</a>';
}


function printButton($div, $url, $view){
  echo '<p  data-div="'.$div.'" data-url="'.$url.'" data-view="'.$view.'" class="printer hide-print pull-right btn btn-info btn-sm" style="margin:3px">PRINT</p>';
}

function table(Array $tbody, $class=''){
  openDataTables();
  $th = array_shift($tbody);
    ?>
    <table class="<?=$class?>" style='width:98%; margin:5px  '>
      <thead style="background:#dcdcdc">
          <tr>
            <?php foreach ($th as $title):
                  echo "<th style='padding-left:3px'>{$title}</th>";
            endforeach;?>
          </tr>
      </thead>
      <tbody>
          <?php foreach ($tbody as $tr):
                  echo "<tr>";
              foreach ($tr as $td) {
                  echo "<td style='padding-left:5px'>{$td}</td>";
              }
              echo "</tr>";
          endforeach;?>
      </tbody>
    </table>
<?php closeDataTables(0); }


function ucase($i){ return strtoupper($i); }

function activeModules($active, $modules, $base='config')
{
  ?>
    <div class="row">
    <?php foreach($modules as $mod){ ?>
        <a class="btn mt-2 mx-2 btn-sm <?=$mod == $active ? 'btn-primary' : 'btn-info' ?>"  href="<?=base_url($base.'/'.strtolower($mod)) ?>"><?=ucwords($mod)?></a>
    <?php } ?>
    </div>
  <?php 
}


