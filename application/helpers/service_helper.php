<?php 
function serve($view, $data=[]){$ci = &get_instance();$ci->load->view("section/header", $data);$ci->load->view($view,$data);$ci->load->view("section/footer");}function beefSecurity(){ redirect("auth/logout"); }function pf($i){ echo "<pre>"; print_r($i); echo "</pre>"; }function notify($message){}
function render($view, $data=[]){$ci = &get_instance(); $ci->load->view("section/header2", $data);$ci->load->view($view,$data);$ci->load->view("section/footer");}

function get($sql){
    $raw = this()->db->query($sql)->result();
    
    $res = current($raw);
    $fields =  array_keys( (array) $res);
    
    if(count($fields) == 2){
        $first = current($fields);
        $last = end($fields);
        return (Object) array_combine(array_column($raw,$first),array_column($raw,$last));
    }
    
    return $raw;
    
}



function imgLoop($arr, $active=null){
    $default = "data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22318%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20318%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_158bd1d28ef%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A16pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_158bd1d28ef%22%3E%3Crect%20width%3D%22318%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22129.359375%22%20y%3D%2297.35%22%3EImage%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E";
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


function publicProps($obj){

    $props = [];
    $reflection = new ReflectionObject($obj);
    $allProps = $reflection->getProperties(ReflectionProperty::IS_PUBLIC);
      foreach($allProps as $p){
        $props[] = $p->getName();
      }
    
    return $props;
  
  }