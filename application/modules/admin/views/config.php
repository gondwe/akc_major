<h5>Default Configurations</h5>

<div class="row">
    <div class="col-md-6">
<?php 

$towns = $this->db->select('id, ucase(names) names')->get('regions')->result();

$defs = $this->db->select('a, b')->get('config')->result_array();

$defs = (Object) array_combine(array_column($defs,'a'),array_column($defs,'b'));

?>




<select name="region" id="inputregion" class="form-control" required="required">
        <option value="" class='bg-danger'>SELECT DEFAULT TOWN</option>
    <?php foreach($towns as $town): $def = $defs->town == $town->id ? 'selected=true' : null ?>
        <option <?=$def?> value="<?=$town->id?>"><?=$town->names?></option>
    <?php endforeach; ?>
</select>
<p class="form-text text-muted">
    Default Town
</p>

<hr>




<button type="button" class="btn btn-success m-1 pull-right">SAVE</button>










<script>

/* save the default town */
$('[name="region"]').change(function(){ $.post('<?=base_url("admin/save/town/")?>' + this.value ); });

</script>