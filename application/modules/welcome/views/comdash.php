<?php 

?>

<div class="container">
    <div class="text-center">

        <div class="form-group">
        <select autofocus=true class="form-control" name="town" id="town">
            <option value=""> - SELECT TOWN - </option>
            <?php foreach($towns as $id=>$town): ?>
                <option value="<?=$id?>"><?=$town?></option>
            <?php endforeach; ?>
        </select>
        </div>

        <div class="form-group hide" id="routeDiv">
        <select class="form-control" name="route" id="route">
            <option value=""> - SELECT ROUTE - </option>
           
        </select>
        </div>

        <div class="form-group hide" id="carDiv">
        <select class="form-control" name="car" id="car">
            <option value=""> - SELECT CAR - </option>
           
        </select>
        </div>

        <div id="card" class="card text-left  bg-secondary hide">
          <div class="card-body">
            <p>
            <b>Date : </b> <span id="date"></span>
            </p>
            <h4 class="card-title"></h4>
            <p class="card-text">
            <b>Route : </b> <span id="proute"></span></br>
            Leaves <span id="dept_town">Town X</span> at <span id="dept_time">Sharp</span></br>
            <span id="carded">Subaru Imprezza</span> ( <span id="capacity">4</span> Seater )</br>
            </p>    
            <hr>
            <a  class="btn btn-primary" href="<?=base_url('bookcar')?>" role="button">BOOK</a>
            <h3 class="alert-secondary pull-right" role="button">$<span id="fare"></span> </h3>

          </div>
        </div>





    </div>
</div>





<script>

    /* get routes from town */
    $('#town').change(function(){
        revolve(this.value, 'routeDiv','route','routes')
    })

    /* get cars from routes */
    $('#route').change(function(){
        revolve(this.value, 'carDiv','car','cars')
    })


    function revolve(value, div, item, url){
        if(value == ''){
            $('#'+ div).fadeOut('slow');
        }else{
            $('#' + div).fadeIn('slow',function(){
                $.getJSON("<?=base_url('Systems/api/')?>" + url + '/' + value, function(res){
                    
                    let list = ['<option value=""> - SELECT ' + item.toUpperCase() + ' - </option>'];
                    $.each(res, function(key,value){
                        list.push("<option value='" + key + "'>"+ value +"</option>");
                    })

                    $('#' + item ).html(list)
                })
            });
        }
    }
    
    /* get schedule from car info */
    $('#car').change(function(){
        let value = this.value
        let url = 'schedule'
        let div = 'card'
        if(value == ''){
            // $('#'+ div).fadeOut('slow');
        }else{
            $('#' + div).fadeIn('slow',function(){
                $.getJSON("<?=base_url('Systems/api/')?>" + url + '/' + value, function(res){
                    if(!$.isEmptyObject(res)){
                        $('.card-title').text(res.car);
                        $('#proute').text(res.route);
                        $('#carded').text(res.car);
                        $('#date').text(res.dated);
                        $('#fare').text(res.fare);
                        $('#capcity').text(res.capacity);
                        $('#dept_time').text(res.dept_time);
                        $('#dept_town').text(res.stage);
                    }
                    // console.log($.isEmptyObject(res));
                    
            })
        });
        }});
    

</script>


<style>

    .hide { display:none }

</style>