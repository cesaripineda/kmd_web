<!doctype html>
<html class="no-js">
<head>
	<meta charset="UTF-8">
	<title>Sistema Establecimientos KMD</title>
	<!--IE Compatibility modes-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!--Mobile first-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?= $this->Html->url('/img/logo1.ico')?>" type="image/x-icon">
	<!-- Global styles -->
	<?= $this->Html->css(
			array(
				'backoffice/components','backoffice/custom'
			)
		)
	?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<?= $this->fetch('css')?>
	<!--End of global styles-->
</head>
<body class="no_header">
<div class="preloader" style=" position: fixed;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  z-index: 100000;
  backface-visibility: hidden;
  background: #ffffff;">
	<div class="preloader_img" style="width: 200px;
  height: 200px;
  position: absolute;
  left: 48%;
  top: 48%;
  background-position: center;
z-index: 999999">
		<img src="<?= $this->Html->url('/img/loader.gif')?>" style=" width: 40px;" alt="loading...">
	</div>
</div>

<div id="wrap">
	<div class="wrapper">
		<?= $this->Element('menu_backoffice')?>
		<div id="content" class="bg-container">
			<header class="head">
				<div class="main-bar">
					<div class="row no-gutters">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<h4 class="nav_top_align">
								<?= $titulo_seccion?>
							</h4>
						</div>
					</div>
				</div>
			</header>
			<?= $this->Flash->render(); ?>
			<?= $this->fetch('content')?>
		</div>
		<!-- /#content -->
	</div>
	<!--wrapper-->
</div>

<!--Global scripts-->
<?= $this->Html->script(
		array(
			'backoffice/components','backoffice/custom'
		)
	)
?>
<!--End of global scripts-->
<?= $this->fetch('script')?>
</body>

</html>
