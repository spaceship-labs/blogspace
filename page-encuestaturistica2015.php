<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Encuesta turística 2015</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
	<style>
		body{
			font-family: 'Open Sans', sans-serif;
			margin: 0;
		}
		.poll-spaceship-title{
			margin: 0;
			text-align: center;
			color: #fff;
			font-weight: 400;
			padding: 15px 25px;
			background: #0087cf; /* Old browsers */
			background: -moz-linear-gradient(left,  #0087cf 0%, #00bbce 100%); /* FF3.6+ */
			background: -webkit-gradient(linear, left top, right top, color-stop(0%,#0087cf), color-stop(100%,#00bbce)); /* Chrome,Safari4+ */
			background: -webkit-linear-gradient(left,  #0087cf 0%,#00bbce 100%); /* Chrome10+,Safari5.1+ */
			background: -o-linear-gradient(left,  #0087cf 0%,#00bbce 100%); /* Opera 11.10+ */
			background: -ms-linear-gradient(left,  #0087cf 0%,#00bbce 100%); /* IE10+ */
			background: linear-gradient(to right,  #0087cf 0%,#00bbce 100%); /* W3C */
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#0087cf', endColorstr='#00bbce',GradientType=1 ); /* IE6-9 */
		}
		.clear{clear: both;}
		.wrapper{
			border-bottom: 1px solid #E2E2E2;
			margin-bottom: 10px;
		}
		.content{
			max-width: 1000px;
			margin: 0 auto;
			padding: 0 15px;
		}
		.content-text h2{margin: 0}
		.content-text	{
			float: left;
			margin-top: 80px;
			margin-bottom: 15px;
			width: 50%;
		}
		.content-image{
			float: left;
			width: 50%;
		}
		.content-image img{
			display: block;
			max-width: 100%;
		}
		.content h2{
			color: #282828;
			font-size: 34px;
			font-weight: 300;
			margin-bottom: 0;
		}
		.content h2 + p{
			color: #0087CF;
			font-size: 14px;
			margin-top: 0;
		}
		.end-date-top,
		.end-date{
			font-weight: 300;
			margin: 0;
			line-height: 1.2;
			text-align: center;
		}
		.end-date-top{margin-top: 40px}
		.end-date{
			color: #0087CF;
			font-size: 48px;
			font-weight: 300;
		}
		.centered-message{
			padding: 20px;
			text-align: center;
		}
		.centered-message p{
			font-size: 18px;
			font-weight: 300;
			margin: 0;
		}
		.centered-message small{
			font-weight: 400;
			font-size: 12px;
		}
	</style>

</head>
<body>
	<h1 class="poll-spaceship-title">Encuesta Turística 2015</h1>
	<div class="wrapper">
		<div class="content content-main">
			<div class="content-text">
				<h2>Gánate una increíble iPad Air 2</h2>
				<p>¡solo debes contestar una encuesta y automáticamente entras a la rifa!</p>

				<p class="end-date-top">Fecha limite</p>
				<p class="end-date">10 de julio del 2015</p>
			</div>
			<div class="content-image">
				<img src="<?php bloginfo( 'template_directory' ); ?>/img/ipad-encuesta.png" alt="">
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="centered-message content">
		<p>Por medio de este sitio, daremos a conocer al ganador</p>
		<p><small>¡Gracias por participar, no olvides compartir este link con tus amigos!</small></p>
	</div>	

	<iframe frameborder='0' scrolling='no' src='https://poll-en.herokuapp.com/survey/embed/iwfdab' width='100%'></iframe><script src="https://code-rubik-cdn.s3.amazonaws.com/iframeresizer/2.7.1/host.js"></script><script type='text/javascript'>iFrameResize({ heightCalculationMethod: 'grow', enablePublicMethods: true });</script>
	
</body>

</html>