<!DOCTYPE html>
<html style="font-size: 18px;" lang="es-MX">
<head>

	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-GPPM5N9GKY"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'G-GPPM5N9GKY');
	</script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<meta name="keywords" content="​Encuentra lo que buscas en un solo click, ​Productos y establecimientos Kosher">
	<meta name="description" content="Descubre KMD, la principal certificadora de productos kosher en México. Conoce nuestro proceso de certificación y accede a un catálogo actualizado de productos autorizados para la comunidad judía. Garantizamos calidad y cumplimiento de las leyes dietéticas judías.">
	<title><?= $this->fetch('title')?></title>
	<?= $this->Html->css('nicepage')?>
	<?= $this->fetch('css')?>
	<?= $this->Html->script(array('jquery','nicepage'))?>
	<script src="https://kit.fontawesome.com/e2e8d19765.js" crossorigin="anonymous"></script>
	<?= $this->fetch('script')?>

	<meta name="generator" content="Nicepage 7.4.4, nicepage.com">
	<meta name="referrer" content="origin">
	<link rel="icon" href="<?= $this->Html->url('/img/favicon1.png')?>">
	<link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
	<script type="application/ld+json">{
			"@context": "http://schema.org",
			"@type": "Organization",
			"name": "Kosher Maguen David KMD",
			"sameAs": [
				"https://www.instagram.com/kosher_kmd?igsh=MWtib2d4Zm04cmdlNg%3D%3D",
				"https://www.instagram.com/kosher_kmd?igsh=MWtib2d4Zm04cmdlNg%3D%3D",
				"https://www.instagram.com/kosher_kmd?igsh=MWtib2d4Zm04cmdlNg%3D%3D",
				"https://www.instagram.com/kosher_kmd?igsh=MWtib2d4Zm04cmdlNg%3D%3D"
			]
		}</script>
	<meta name="theme-color" content="#478ac9">
	<meta property="og:title" content="Casa">
	<meta property="og:description" content="Descubre KMD, la principal certificadora de productos kosher en México. Conoce nuestro proceso de certificación y accede a un catálogo actualizado de productos autorizados para la comunidad judía. Garantizamos calidad y cumplimiento de las leyes dietéticas judías.">
	<meta property="og:type" content="website">
	<meta data-intl-tel-input-cdn-path="intlTelInput/">
</head>
<body data-home-page="Casa.html" data-home-page-title="Casa" data-path-to-root="./" data-include-products="false" class="u-body u-xxl-mode" data-lang="es">
<?= $this->Element('menu')?>
<?= $this->fetch('content')?>
<?= $this->Element('footer') ?>
<?= $this->Element('alertas')?>
</body>
