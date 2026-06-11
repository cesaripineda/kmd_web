<?php
$this->assign('title', 'Establecimientos Autorizados Kosher KMD');
echo $this->Html->css(
	array('Establecimientos'),
	array('inline' => false)
);
?>
<style>
	.current {
		background-color: #27245b;
		color: #e8ab5e;
		padding: 5px 10px 5px 10px;
		border-radius: 10px 10px 10px 10px;
	}
	.pagination{
		text-align: center;
	}

	.uform1{
		width: 1320px;
		height: 105px;
		margin: 25px auto 0;
	}
	.u-form-horizontal_1{
		display: flex;
		flex-flow: row;
		align-items: center;
		flex-grow: 1;
	}
	.u-form-horizontal_1 .u-form-group.u-label-top:not(.u-form-submit) {
		width: 100%;
	}
	.u-form-horizontal_1.u-form-spacing-10 .u-form-group {
		margin-right: 10px;
	}
	.u-section-1 .u-form-group-1 {
		margin-left: 0;
	}
</style>

<section class="u-clearfix u-section-1" id="block-3">
	<div class="u-container-style u-expanded-width u-grey-10 u-group u-group-1">
		<div class="u-container-layout u-valign-middle u-container-layout-1">
			<h1 class="u-text u-text-default u-text-1">Categoría de establecimientos </h1>
		</div>
	</div>
	<h2 class="u-text u-text-default u-text-2">Establecimientos encontrados (<?= sizeof($establecimientos)?>)</h2>
	<div class="uform1">
		<?= $this->Form->create('Establecimiento',array('class'=>'u-form-horizontal_1 u-form-spacing-10','type'=>'get'))?>
			<?= $this->Form->input('nombre',array('value'=>$this->request->query("nombre"),'placeholder'=>'Nombre de Establecimiento','div'=>'u-form-group u-label-top u-form-group-1','label'=>false,'class'=>'u-input u-input-rectangle'))?>
			<div class="u-form-group u-form-select u-label-top u-form-group-2">
				<div class="u-form-select-wrapper">
					<?= $this->Form->input('categoria',array('value'=>$this->request->query("categoria"),'empty'=>'Todas las categorías','type'=>'select','options'=>$categorias,'div'=>false,'label'=>false,'class'=>'u-input u-input-rectangle'))?>
					<svg class="u-caret u-caret-svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 16 16" style="fill:currentColor;" xml:space="preserve"><polygon class="st0" points="8,12 2,4 14,4 "></polygon></svg>
				</div>
			</div>
			<div class="u-align-left u-form-group u-form-submit u-label-top">
				<?= $this->Form->submit('Buscar',array('class'=>'u-btn u-btn-submit u-button-style'))?>
			</div>
		<?= $this->Form->end()?>
	</div>
	<div class="u-list u-list-1">
		<div class="u-repeater u-repeater-1">
			<?php foreach($establecimientos as $establecimiento):?>
				<div class="u-border-1 u-border-grey-75 u-container-style u-list-item u-radius u-repeater-item u-shape-round u-list-item-1" style="height: 550px;">
					<div class="u-container-layout u-similar-container u-container-layout-2">
						<div class="u-border-1 u-border-grey-75 u-container-style u-group u-preserve-proportions u-white u-group-2">
							<div class="u-container-layout u-container-layout-3">
								<img class="u-align-center u-image u-image-contain u-image-default u-preserve-proportions u-image-1" src="<?= $establecimiento['Establecimiento']['logo']=="" ? $this->Html->url('/img/favicon1.png') : "https://sistema.kosher.com.mx".$establecimiento['Establecimiento']['logo']?>" alt="" data-image-width="128" data-image-height="128">
							</div>
						</div>
						<h3 class="u-align-center u-text u-text-3"> <?= $establecimiento['Establecimiento']['nombre']?></h3>
						<a href="" class="u-align-center u-btn u-button-style u-custom-color-6 u-hover-custom-color-6 u-text-custom-color-1 u-text-hover-black u-btn-2"><?= $establecimiento['Establecimiento']['categoria']?> </a>
						<p style="font-size: .6em; text-align: center"><i><?= $establecimiento['Establecimiento']['categoria_2']?></i></p>
						<p class="u-align-left u-text u-text-4"> <b>Estatus:</b><br><?= $establecimiento['Establecimiento']['tipo_establecimiento']?><br><b>Dirección:</b><br>
							<?= $establecimiento['Establecimiento']['direccion']?>
							<br><b>Horarios:</b><br><?= $establecimiento['Establecimiento']['horario_trabajo']?>
						</p>
						<div class="u-expanded-width u-table u-table-responsive u-table-1">
							<table class="u-table-entity">
								<colgroup>
									<col width="33.3%">
									<col width="33.3%">
									<col width="33.4%">
								</colgroup>
								<tbody class="u-align-center u-table-body u-table-body-1">
								<tr style="height: 50px;">
									<td class="u-border-1 u-border-grey-dark-1 u-table-cell" style="border-top: 1px solid black;border-left: none;border-bottom: none;">
										<a href="<?= $establecimiento['Establecimiento']['coordenadas']?>" target="_blank"><span class="u-file-icon u-icon"><img src="<?= $this->Html->url('/img/447031.png') ?>" alt=""></span></a>
									</td>
									<td class="u-border-1 u-border-grey-dark-1 u-table-cell" style="border-bottom: none;">
										<a href="tel:<?= $establecimiento['Establecimiento']['telefonos']?>" target="_blank"><span class="u-file-icon u-icon"><img src="<?= $this->Html->url('/img/3002249.png') ?>" alt=""></span></a>
									</td>
									<td class="u-border-1 u-border-grey-dark-1 u-table-cell" style="border-right: none;border-bottom: none;">
										<a href="<?= $establecimiento['Establecimiento']['link_menu']?>" target="_blank"><span class="u-file-icon u-icon"><img src="<?= $this->Html->url('/img/395579.png') ?>" alt=""></span></a>
									</td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			<?php endforeach;?>
		</div>
	</div>
	<div class="pagination">
		<ul>
			<?= $this->Paginator->numbers() ?>
		</ul>
	</div>
</section>
