<?php
	$this->assign('title', 'KMD MÉXICO CERTIFICACIÓN KOSHER');
	echo $this->Html->css(
		array('index'),
		array('inline' => false)
	);

	echo $this->Html->script('nicepage');
?>
<section class="u-align-center u-clearfix u-container-align-center u-image u-section-1" id="sec-7796" data-image-width="1118" data-image-height="739">
	<div class="u-clearfix u-sheet u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-sheet-1">
		<h1 class="u-align-center u-text u-text-body-alt-color u-text-1"> Encuentra lo que buscas en un solo <span style="color:#f1c50e">click</span></h1>
		<div class="u-container-align-center u-container-style u-custom-color-2 u-group u-group-1">
			<div class="u-container-layout u-valign-middle u-container-layout-1">
				<h2 class="u-align-center u-text u-text-default u-text-2"> Productos certificados Kosher</h2>
			</div>
		</div>
		<div class="u-form u-form-1">

			<?= $this->Form->create('Producto',array('url'=>array('action'=>'buscar','controller'=>'productos'),'type'=>'get'))?>
			<?= $this->Form->input('search_str',array('value' => $this->request->query('search'),'placeholder'=>'Escribe el nombre, marca o categoría del producto que estás buscando','label'=>false,'div'=>'u-form-group u-form-name u-label-none','class'=>'u-border-2 u-border-black u-custom-font u-heading-font u-input u-input-rectangle u-radius u-input-1'))?>
			<?= $this->Form->submit('Buscar',array('class'=>'u-active-custom-color-2 u-align-center u-border-none u-btn u-button-style u-custom-color-6 u-hover-custom-color-2 u-btn-1','style'=>'background-color:#f1c50e; color:white'))?>
			<?= $this->Form->end()?>

		</div>
	</div>
</section>
<section class="u-clearfix u-section-2" id="sec-242c">
	<div class="data-layout-selected u-clearfix u-expanded-width u-gutter-16 u-layout-spacing-vertical u-layout-wrap u-layout-wrap-1">
		<div class="u-layout">
			<div class="u-layout-row">
				<div class="u-container-style u-custom-color-2 u-layout-cell u-size-20 u-layout-cell-1">
					<div class="u-container-layout u-container-layout-1">
						<img class="u-expanded-width u-image u-image-default u-image-1" src="<?= $this->Html->url('/img/centificacion-kosher.jpg')?>" alt="" data-image-width="768" data-image-height="900">
						<h3 class="u-text u-text-1"> Obtén la certificación
							Kosher KMD</h3>
						<p class="u-large-text u-text u-text-variant u-text-2"> Descubre las ventajas, procesos y requisitos
							para obtener la certificación KMD</p>
						<a href="<?= $this->Html->url(array('controller'=>'pages','action'=>'certifica'))?>" class="u-border-none u-btn u-button-style u-hover-custom-color-6 u-white u-btn-1">MÁS INFORMACIÓN </a>
					</div>
				</div>
				<div class="u-container-style u-custom-color-6 u-layout-cell u-size-20 u-layout-cell-2">
					<div class="u-container-layout u-container-layout-2">
						<img class="u-expanded-width u-image u-image-default u-image-2" src="<?= $this->Html->url('/img/encontrar-prod.jpg')?>" alt="" data-image-width="375" data-image-height="440">
						<h3 class="u-text u-text-3"> La forma más fácil de
							encontrar todos los
							productos kosher</h3>
						<p class="u-large-text u-text u-text-variant u-text-4"> Encuentra productos y
							establecimientos certificados
							por Kosher KMD.</p>
						<a href="" class="u-border-none u-btn u-button-style u-hover-custom-color-6 u-white u-btn-2">
                  <span class="u-icon"><svg class="u-svg-content" viewBox="0 0 56.966 56.966" x="0px" y="0px" style="width: 1em; height: 1em;"><path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23
	s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92
	c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17
	s-17-7.626-17-17S14.61,6,23.984,6z"></path></svg></span>&nbsp;BUSCADOR
						</a>
					</div>
				</div>
				<div class="u-container-style u-custom-color-5 u-layout-cell u-size-20 u-layout-cell-3">
					<div class="u-container-layout u-container-layout-3">
						<img class="u-expanded-width u-image u-image-default u-image-3" src="<?= $this->Html->url('/img/listas-kmd.jpg')?>" alt="" data-image-width="374" data-image-height="439">
						<h3 class="u-text u-text-5"> Listas KMD</h3>
						<p class="u-large-text u-text u-text-variant u-text-6"> Descarga listas sobre
							productos y establecimientos
							que cuentan con la
							certificación KMD</p>
						<a href="<?= $this->Html->url(array('controller'=>'pages','action'=>'listas'))?>" class="u-border-none u-btn u-button-style u-hover-custom-color-6 u-white u-btn-3">
                  <span class="u-icon"><svg class="u-svg-content" viewBox="0 0 60 60" x="0px" y="0px" style="width: 1em; height: 1em;"><path d="M38.914,0H6.5v60h47V14.586L38.914,0z M17.5,14h10c0.552,0,1,0.447,1,1s-0.448,1-1,1h-10c-0.552,0-1-0.447-1-1
	S16.948,14,17.5,14z M42.5,48h-25c-0.552,0-1-0.447-1-1s0.448-1,1-1h25c0.552,0,1,0.447,1,1S43.052,48,42.5,48z M42.5,40h-25
	c-0.552,0-1-0.447-1-1s0.448-1,1-1h25c0.552,0,1,0.447,1,1S43.052,40,42.5,40z M42.5,32h-25c-0.552,0-1-0.447-1-1s0.448-1,1-1h25
	c0.552,0,1,0.447,1,1S43.052,32,42.5,32z M42.5,24h-25c-0.552,0-1-0.447-1-1s0.448-1,1-1h25c0.552,0,1,0.447,1,1S43.052,24,42.5,24z
	 M37.5,16V2l14,14H37.5z"></path></svg></span>&nbsp;LISTAS
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="u-clearfix u-section-3" id="block-1">
	<div class="u-clearfix u-sheet u-valign-bottom u-sheet-1">
		<div class="data-layout-selected u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
			<div class="u-layout">
				<div class="u-layout-row">
					<div class="u-container-style u-layout-cell u-size-20 u-layout-cell-1">
						<div class="u-container-layout u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-container-layout-1">
							<img class="custom-expanded u-absolute-hcenter u-expanded u-image u-image-contain u-image-default u-preserve-proportions" src="<?= $this->Html->url('/img/logo-azul.png')?>" alt="" data-image-width="500" data-image-height="320">
						</div>
					</div>
					<div class="u-container-style u-custom-color-2 u-layout-cell u-size-40 u-layout-cell-2">
						<div class="u-container-layout u-valign-middle u-container-layout-2">
							<h3 class="u-text u-text-default u-text-1">¿QUIÉNES SOMOS?</h3>
							<p class="u-text u-text-default u-text-2"> Somos KMD, la
								empresa líder en certificación Kosher en Latinoamérica. Nuestra
								integridad y disciplina son reconocidas a nivel mundial y nos han
								permitido crear alianzas estratégicas internacionales.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="data-layout-selected u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-2">
			<div class="u-layout">
				<div class="u-layout-col">
					<div class="u-size-30">
						<div class="u-layout-row">
							<div class="u-container-style u-layout-cell u-size-30 u-layout-cell-3">
								<div class="u-border-1 u-border-black u-border-no-left u-border-no-top u-container-layout u-valign-bottom u-container-layout-3">
									<h2 class="u-align-center u-text u-text-default u-text-3">Misión</h2>
									<p class="u-align-center u-text u-text-default u-text-4"> Existimos
										para que cada vez más personas coman Kosher, ofreciendo una amplia gama
										de productos que cumplen con las necesidades de toda la comunidad.</p>
									<span class="u-file-icon u-icon u-icon-1"><img src="<?= $this->Html->url('/img/Recurso-22x.png')?>" alt=""></span>
								</div>
							</div>
							<div class="u-container-style u-layout-cell u-size-30 u-layout-cell-4">
								<div class="u-border-1 u-border-grey-75 u-border-no-left u-border-no-right u-border-no-top u-container-layout u-valign-bottom u-container-layout-4">
									<h2 class="u-align-center u-text u-text-default u-text-5">Visión</h2>
									<p class="u-align-center u-text u-text-default u-text-6"> Ser la
										certificadora Kosher con mayor impacto en LATAM, accesible para todos,
										logrando mejorar la vida diaria en muchas personas.</p>
									<span class="u-align-center u-file-icon u-icon u-icon-2"><img src="<?= $this->Html->url('/img/Recurso-32x.png')?>" alt=""></span>
								</div>
							</div>
						</div>
					</div>
					<div class="u-size-30">
						<div class="u-layout-col">
							<div class="u-container-style u-layout-cell u-size-60 u-layout-cell-5">
								<div class="u-container-layout u-container-layout-5">
									<h2 class="u-align-center u-text u-text-default u-text-7">Valores</h2>
									<p class="u-align-center u-text u-text-default u-text-8">Compromiso con nuestros clientes.<br> Confianza "la más alta certificación". <br> Trabajamos en equipo en beneficio de la CMD.<br> Cumplimos y superamos las expectativas del cliente.<br> Tenemos pasión por nuestro trabajo.<br> Buscamos el como sí, de acuerdo a la halajá.<br> "Cumplimos con el precepto de Kashrut".<br>
									</p>
									<span class="u-align-center u-file-icon u-icon u-icon-3"><img src="<?= $this->Html->url('/img/Recurso-42x.png') ?>" alt=""></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="u-clearfix u-section-4" id="block-2">
	<div class="u-clearfix u-sheet u-sheet-1">
		<h2 class="u-align-center u-text u-text-default u-text-1"> Comprometidos con la excelencia: manejamos altos estándares de<br>calidad en todos nuestros productos, establecimientos y restaurantes.
		</h2>
		<div class="u-expanded-width u-list u-list-1">
			<div class="u-repeater u-repeater-1">
				<div class="u-align-center u-container-align-center u-container-style u-list-item u-repeater-item">
					<div class="u-container-layout u-similar-container u-valign-top u-container-layout-1">
						<h3 class="u-align-center u-text u-text-custom-color-6 u-text-default u-text-2" data-animation-name="counter" data-animation-event="scroll" data-animation-duration="3000">51</h3>
						<p class="u-align-center u-text u-text-3">Años de experiencia</p>
					</div>
				</div>
				<div class="u-align-center u-container-align-center u-container-style u-list-item u-repeater-item">
					<div class="u-container-layout u-similar-container u-valign-top u-container-layout-2">
						<h3 class="u-align-center u-text u-text-custom-color-6 u-text-default u-text-4" data-animation-name="counter" data-animation-event="scroll" data-animation-duration="3000">+2,500</h3>
						<p class="u-align-center u-text u-text-5">Productos certificados</p>
					</div>
				</div>
				<div class="u-align-center u-container-align-center u-container-style u-list-item u-repeater-item">
					<div class="u-container-layout u-similar-container u-valign-top u-container-layout-3">
						<h3 class="u-align-center u-text u-text-custom-color-6 u-text-default u-text-6" data-animation-name="counter" data-animation-event="scroll" data-animation-duration="3000">+500 </h3>
						<p class="u-align-center u-text u-text-7">Compañias certificadas</p>
					</div>
				</div>
			</div>
		</div>
		<a href="" class="u-active-custom-color-2 u-align-center u-border-none u-btn u-button-style u-custom-color-6 u-hover-custom-color-2 u-btn-1">
          <span class="u-icon"><svg class="u-svg-content" viewBox="0 0 56.966 56.966" x="0px" y="0px" style="width: 1em; height: 1em;"><path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23
	s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92
	c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17
	s-17-7.626-17-17S14.61,6,23.984,6z"></path></svg></span>&nbsp;BUSCADOR
		</a>
	</div>
</section>



