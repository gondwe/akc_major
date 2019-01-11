<h5>Schedule Bomba Rides</h5>

<div class="row">
    <div class="col-md-6">
<?php 


/* prepare routes */
$this->db->select('id, names');
if($defTown) $this->db->where('town',$defTown);
$routes = $this->db->get('routes')->result_array();
$routes = [NULL=>"SELECT ROUTE"] + array_combine(array_column($routes,'id'),array_column($routes,'names'));

/* prepare towns */
$towns = $this->db->select('id, names')->get('regions')->result_array();
$towns = [0=>"SELECT TOWN"] + array_combine(array_column($towns,'id'),array_column($towns,'names'));


/* prepare cars */
$cars = [0=>"SELECT CAR"] + [];
$stages = [0=>"SELECT STAGE"] + [];



$t = new Tablo('schedules');

$t->combos('rushhour','select id, names from rush_hours');
$t->combos('car',$cars);
$t->combos('dept_stage',$stages);
$t->combos('town',$towns,$defTown);
$t->combos('route',$routes);
$t->hide('status');
$t->formgrid(6,6,12);
$t->aliases('rushhour,rush');
$t->newform();


$availableRides = $this->db->query('select count(id) c from schedules where dated = curdate()')->row('c');
$upcomingRides = $this->db->query('select count(id) c from schedules where dated > curdate()')->row('c');


?>
</div>
<div class="col-md-6 text-center pt-5">

<h5>Available Rides</h5>
<h2><?=$availableRides?></h2>

<h5>Upcoming Rides</h5>
<h2><?=$upcomingRides?></h2>
</div>
</div>
<hr>    
<?php 

$t->hide('town');
$t->combos('car',"select id, name from cars");
$t->combos('dept_stage',"select id, names from stages");
$t->aliases('dept_stage,origin');
$t->edit = false;
$t->table(0);
$t->tabloprops();


// pf($availableRides->row("c"));
?>










<script>
$('[name="route"]').change(function(){
    /* find cars plying the given route */
    val = this.value;
    $.get('<?=base_url("admin/routeBound/")?>' +this.value, function(res){
        res = $.parseJSON(res);
        elem = "";
        $.each(res, function(index,value){
            elem += "<option value='"+ value.id +"'>"+ value.name +"</option>";
        });
        $("[name='car']").html(elem);


    }).then(
        function(){ 
            let val = $('[name="route"]').val()
            // pf(val);

            $.get("<?=base_url('admin/stageBound/')?>" +val, function(res){
                res = $.parseJSON(res);
                elem = "";
                $.each(res, function(index,value){
                    elem += "<option value='"+ value.id +"'>"+ value.name +"</option>";
                });
                $("[name='dept_stage']").html(elem);
            })
        }
    )

    
    
})


</script>