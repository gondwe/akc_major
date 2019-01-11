<?php 

?>

<script src="<?=base_url('assets/select2/select2.full.js')?>"></script>

<?php $this->load->view('section/parts/modals/modals'); ?>

<?php $this->load->view('section/parts/select2'); ?>

<?php $this->load->view('section/parts/print/printing'); ?>

<?php $this->load->view('section/parts/modals/modalscripts') ?>


<script>

    function pf(params) {
        console.log(params);
        
    }

</script>