<?php


//formulario
echo $this->Form->create(null, array('url' => '/extra_subrubros/crear','inputDefaults' => (array('div' => 'ym-gbox'))));

?>
<?php echo $this->Form->hidden('ExtraSubrubro.id'); ?>
<?php echo $this->Form->hidden('ExtraSubrubro.descuento'); ?>
<?php echo $this->Form->hidden('ExtraSubrubro.impacto'); ?>

<div class="ym-grid">
	<div class="ym-g50 ym-gl"><?php echo $this->Form->input('ExtraSubrubro.extra_rubro_id',array('empty' => 'Seleccionar', 'options' => $extras_rubros, 'type'=>'select'));?></div>
    <div class="ym-g50 ym-gl"><?php echo $this->Form->input('ExtraSubrubro.subrubro');?></div>
</div>

<div class="ym-grid">
	<div class="ym-g50 ym-gl"><?php echo $this->Form->input('ExtraSubrubro.subrubro_ingles');?></div>
    <div class="ym-g50 ym-gl"><?php echo $this->Form->input('ExtraSubrubro.subrubro_portugues');?></div>
</div>





<span id="botonGuardar" onclick="guardar('<?php echo $this->Html->url('/extra_subrubros/guardar.json', true);?>',$('form').serialize(),{id:'w_extra_subrubros',url:'v2/extra_subrubros/index'});" class="boton guardar">Guardar <img src="<?php echo $this->webroot; ?>img/loading_save.gif" class="loading" id="loading_save" /></span>
<?php echo $this->Form->end(); ?>

<script>

</script>