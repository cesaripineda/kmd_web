<?php
$this->assign('title', 'KMD MÉXICO CERTIFICACIÓN KOSHER');
echo $this->Html->css(
	array('Buscador'),
	array('inline' => false)
);
echo $this->Html->script('nicepage');
?>
<style>
	input::placeholder,
	textarea::placeholder {
		font-size: 18px;
		color:black !important;
		font-weight: normal;
	}

</style>
<section class="u-clearfix u-section-1" id="block-2">
	<div class="u-clearfix u-sheet u-sheet-1">
		<h1 class="u-align-center u-text u-text-default u-text-1">Buscador</h1>
		<div class="custom-expanded u-align-center u-form u-form-1" style="margin-bottom:5%">
			<?= $this->Form->create('Producto',array('url'=>array('action'=>'buscar','controller'=>'productos'),'type'=>'get'))?>
			<?= $this->Form->input('search_str',array('placeholder'=>'Escribe el nombre, marca o categoría del producto que estás buscando','label'=>false,'div'=>'u-form-group u-form-name u-label-none jet-ajax-search__field-wrapper','class'=>'u-border-3 u-border-grey-70 u-input u-input-rectangle u-radius u-text-body-color u-input-1'))?>
			<?= $this->Form->submit('Buscar',array('class'=>'u-active-custom-color-2 u-align-center u-border-none u-btn u-button-style u-custom-color-6 u-hover-custom-color-2 u-btn-1','style'=>'background-color:#f1c50e; color:white'))?>
			<?= $this->Form->end()?>
		</div>
		<h3 class="u-align-center u-text u-text-default u-text-2">Encuentra tus productos por categoría</h3>
		<div class="u-expanded-width u-list u-list-1">
			<div class="u-repeater u-repeater-1">
				<a href="<?= $this->Html->url(array('controller'=>'productos','action'=>'buscar',1))?>">
					<div class="u-container-align-center u-container-style u-image u-list-item u-repeater-item u-image-1" data-image-width="233" data-image-height="220">
						<div class="u-container-layout u-similar-container u-container-layout-1">
							<div class="u-align-center u-container-style u-expanded-width u-group u-shading u-group-1">
								<div class="u-container-layout u-valign-middle u-container-layout-2">
									<p class="u-text u-text-3">Abarrotes<br>Enlatados<br>Semillas<br>Especias
									</p>
								</div>
							</div>
						</div>
					</div>
				</a>
				<a href="<?= $this->Html->url(array('controller'=>'productos','action'=>'buscar',2))?>">
				<div class="u-container-style u-image u-list-item u-repeater-item u-image-2" data-image-width="233" data-image-height="220">
					<div class="u-container-layout u-similar-container u-container-layout-3">
						<div class="u-align-center u-container-style u-expanded-width u-group u-shading u-group-2">
							<div class="u-container-layout u-valign-middle u-container-layout-4">
								<p class="u-text u-text-4">Carne<br>Pollo<br>Carnes Frías
								</p>
							</div>
						</div>
					</div>
				</div>
				</a>
				<a href="<?= $this->Html->url(array('controller'=>'productos','action'=>'buscar',3))?>">
				<div class="u-container-style u-image u-list-item u-repeater-item u-image-3" data-image-width="233" data-image-height="220">
					<div class="u-container-layout u-similar-container u-container-layout-5">
						<div class="u-align-center u-container-style u-expanded-width u-group u-shading u-group-3">
							<div class="u-container-layout u-valign-middle u-container-layout-6">
								<p class="u-text u-text-5">Pescado</p>
							</div>
						</div>
					</div>
				</div>
				</a>
				<a href="<?= $this->Html->url(array('controller'=>'productos','action'=>'buscar',4))?>">
				<div class="u-container-style u-image u-list-item u-repeater-item u-image-4" data-image-width="233" data-image-height="220">
					<div class="u-container-layout u-similar-container u-container-layout-7">
						<div class="u-align-center u-container-style u-expanded-width u-group u-shading u-group-4">
							<div class="u-container-layout u-valign-middle u-container-layout-8">
								<p class="u-text u-text-6">Quesos<br>Lácteos
								</p>
							</div>
						</div>
					</div>
				</div>
				</a>
				<a href="<?= $this->Html->url(array('controller'=>'productos','action'=>'buscar',5))?>">
				<div class="u-container-style u-image u-list-item u-repeater-item u-image-5" data-image-width="233" data-image-height="220">
					<div class="u-container-layout u-similar-container u-container-layout-9">
						<div class="u-align-center u-container-style u-expanded-width u-group u-shading u-group-5">
							<div class="u-container-layout u-valign-middle u-container-layout-10">
								<p class="u-text u-text-7">Suplementos alimenticios y vitaminas</p>
							</div>
						</div>
					</div>
				</div>
				</a>
				<a href="<?= $this->Html->url(array('controller'=>'productos','action'=>'buscar',6))?>">
				<div class="u-container-style u-image u-list-item u-repeater-item u-image-6" data-image-width="233" data-image-height="220">
					<div class="u-container-layout u-similar-container u-container-layout-11">
						<div class="u-align-center u-container-style u-expanded-width u-group u-shading u-group-6">
							<div class="u-container-layout u-valign-middle u-container-layout-12">
								<p class="u-text u-text-8">Postres<br>Repostería
								</p>
							</div>
						</div>
					</div>
				</div>
				</a>
				<a href="<?= $this->Html->url(array('controller'=>'productos','action'=>'buscar',7))?>">
				<div class="u-container-style u-image u-list-item u-repeater-item u-image-7" data-image-width="233" data-image-height="220">
					<div class="u-container-layout u-similar-container u-container-layout-13">
						<div class="u-align-center u-container-style u-expanded-width u-group u-shading u-group-7">
							<div class="u-container-layout u-valign-middle u-container-layout-14">
								<p class="u-text u-text-9">Panes<br>Galletas saladas<br>Cereales<br>Harina
								</p>
							</div>
						</div>
					</div>
				</div>
				</a>
				<a href="<?= $this->Html->url(array('controller'=>'productos','action'=>'buscar',8))?>">
				<div class="u-container-style u-image u-list-item u-repeater-item u-image-8" data-image-width="233" data-image-height="220">
					<div class="u-container-layout u-similar-container u-container-layout-15">
						<div class="u-align-center u-container-style u-expanded-width u-group u-shading u-group-8">
							<div class="u-container-layout u-valign-middle u-container-layout-16">
								<p class="u-text u-text-10">Chocolate<br>Dulces<br>Botanas<br>Frituras
								</p>
							</div>
						</div>
					</div>
				</div>
				</a>
				<a href="<?= $this->Html->url(array('controller'=>'productos','action'=>'buscar',9))?>">
				<div class="u-container-style u-image u-list-item u-repeater-item u-image-9" data-image-width="233" data-image-height="220">
					<div class="u-container-layout u-similar-container u-container-layout-17">
						<div class="u-align-center u-container-style u-expanded-width u-group u-shading u-group-9">
							<div class="u-container-layout u-valign-middle u-container-layout-18">
								<p class="u-text u-text-11">Bebidas<br>Cafés<br>Vinos<br>Licores
								</p>
							</div>
						</div>
					</div>
				</div>
				</a>
				<a href="<?= $this->Html->url(array('controller'=>'productos','action'=>'buscar',10))?>">
				<div class="u-container-style u-image u-list-item u-repeater-item u-image-10" data-image-width="233" data-image-height="220">
					<div class="u-container-layout u-similar-container u-container-layout-19">
						<div class="u-align-center u-container-style u-expanded-width u-group u-shading u-group-10">
							<div class="u-container-layout u-valign-middle u-container-layout-20">
								<p class="u-text u-text-12">Comida preparada y semi preparada, congelada y/o refrigerada</p>
							</div>
						</div>
					</div>
				</div>
				</a>
			</div>
		</div>
	</div>
</section>

