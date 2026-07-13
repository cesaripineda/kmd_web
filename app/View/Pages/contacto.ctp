<?php
$this->assign('title', 'KMD MÉXICO CERTIFICACIÓN KOSHER');
echo $this->Html->css(
	array('Contacto'),
	array('inline' => false)
);
?>
<style>
	.input_kmd{
		background-color: #CECECE !important;
		border-width: 0px 0px 0px 0px !important;
		border-radius: 20px 20px 20px 20px !important;
	}
</style>
<section class="u-align-center u-clearfix u-section-1" id="block-1">
	<div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
		<h1 class="u-align-left u-text u-text-default u-text-1">CONTÁCTANOS</h1>
		<h2 class="u-align-left u-text u-text-default u-text-2"> Los campos marcados con <span class="u-text-palette-2-base">*</span> son obligatorios
		</h2>
		<div class="u-align-left u-form-1">
			<?= $this->Form->create('Contacto',array('url'=>array('action'=>'contacto','controller'=>'productos'))) ?>
			<?= $this->Form->input('nombre',array('required'=>true,'type'=>'text','label'=>array('class'=>'u-label u-label-1','text'=>'NOMBRE <span style="color:red">*</span>'),'class'=>'input_kmd u-border-3 u-border-custom-color-2 u-input u-input-rectangle u-radius u-input-1','div'=>'u-form-group u-form-name u-label-top'))?>
			<?= $this->Form->input('telefono',array('required'=>true,'type'=>'text','label'=>array('class'=>'u-label u-label-1','text'=>'TELÉFONO <span style="color:red">*</span>'),'class'=>'input_kmd u-border-3 u-border-custom-color-2 u-input u-input-rectangle u-radius u-input-1','div'=>'u-form-group u-form-name u-label-top'))?>
			<?= $this->Form->input('email',array('required'=>true,'type'=>'text','label'=>array('class'=>'u-label u-label-1','text'=>'EMAIL <span style="color:red">*</span>'),'class'=>'input_kmd u-border-3 u-border-custom-color-2 u-input u-input-rectangle u-radius u-input-1','div'=>'u-form-group u-form-name u-label-top'))?>
			<?= $this->Form->input('texto',array('required'=>true,'type'=>'textarea','label'=>array('class'=>'u-label u-label-1','text'=>'MENSAJE <span style="color:red">*</span>'),'class'=>'input_kmd u-border-3 u-border-custom-color-2 u-input u-input-rectangle u-radius u-input-1','div'=>'u-form-group u-form-name u-label-top'))?>
				<div class="u-align-left u-form-group u-form-submit u-label-top">
					<?= $this->Form->submit('Enviar Formulario',array('class'=>'u-btn u-btn-submit u-button-style u-custom-color-2 u-hover-custom-color-6 u-text-body-alt-color u-btn-1'))?>
				</div>
			<?= $this->Form->end()?>
		</div>
	</div>
</section>

