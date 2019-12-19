<div class='center on'>
<div class='menu <?php echo $title ?>'><div class='menu_content'><div class='left'><div class='top'></div>
		<div class='middle'>
			<?php 
				$secciones = array('identidad_corporativa','diseno','ilustracion','publicidad','embalaje');
				for($i=0;$i<5;$i++){ ?>
					<div class='item hover'>
						<a class='background'><span class='hoverx'></span><span class='hover1'></span></a>
						<a href='#<?php echo $secciones[$i]; ?>' class='ico ready'><span class='hoverx'></span><span class='hover1'></span><span class='aux'></span></a>
						<div class='light'></div>
					</div>
			<?php } ?>
		</div>
	<div class='bottom'></div></div>
<div class='right'><div class='top'></div><div class='middle'></div><div class='bottom'></div></div></div></div>
	<div class='seccion' id='identidad_corporativa'>
		<h3><a class='blue2'>Identidad</a> Corporativa</h3>
		<div class='column'>
			<img class='icon' alt='icon' src='<?php bloginfo('template_directory') ?>/img/descripcion/icono1.png' />
			<p>Nosotros te ayudamos a crear (o recrear) la imagen de tu empresa para que aumente la lealtad del consumidor hacia tu producto o servicio, reconocimiento y memorabilidad</p>
			<p>Los elementos m&aacute;s comunes que se desarrollan en la identidad corporativa de una empresa son los siguientes:</p>
			<ul class='white'>
				<li>Dise&ntilde;o de logotipo, base para toda la imagen corporativa</li>
				<li>Dise&ntilde;o de tarjetas comerciales y tarjet&oacute;n</li>
				<li>Dise&ntilde;o de carpetas comerciales</li>
				<li>Dise&ntilde;o de sobres comerciales corporativos</li>
				<li>Dise&ntilde;o de hoka 1 y 2, hojas de facturaci&oacute;n</li>
				<li>Dise&ntilde;o de carteler&iacute;a comercial</li>
				<li>Dise&ntilde;o de banners, luminosos</li>
				<li>Dise&ntilde;o de imagen para web y redes sociales</li>
			</ul>
		</div>
		<img class='ilustracion' alt='icon' src='<?php bloginfo('template_directory') ?>/img/descripcion/img_identidad.png' />
	</div>
	<div class='seccion' id='diseno'>
		<h3><a class='blue2'>Dise&ntilde;o</a> de Logo</h3>
		<img class='icon' alt='icon' src='<?php bloginfo('template_directory') ?>/img/descripcion/icono2.png' />
		<p>Creamos un logotipo s&oacute;lido para tu compa&ntilde;ia, un s&iacute;mbolo o &iacute;cono, que al ser visto por las personas genere una relaci&oacute;n que inmediatamente conecte a sus ideales con tu empresa</p>
		<div class='crearlogo'>
			<h2>Pasos para realizar un logo?</h2>
			<a class='top_title'>Revisiones</a>
			<div class='step'><a>Env&iacute;a tu solicitud</a></div>
			<div class='step'><a>Creamos tu logo</a></div>
			<div class='step'><a>Retroalimentaci&oacute;n</a></div>
			<div class='step'><a>Tu logo est&aacute; listo</a></div>
		</div>
	</div>
	<div class='seccion' id='ilustracion'>
		<h3><a class='blue2'>Ilustraci&oacute;n</a> Publicitaria</h3>
		<div class='column'>
			<img class='icon' alt='icon' src='<?php bloginfo('template_directory') ?>/img/descripcion/icono3.png' />
			<p>La <a class='blue2'>Ilustraci&oacute;n publicitaria</a> nos permite presentar conceptos gr&aacute;ficamente, mostrar ideas mediante im&aacute;genes. Tenemos la seguridad de que transmitimos informaci&oacute;n llegando al destinatario con una sensaci&oacute;n de originalidad e identidad &uacute;nica.</p>
			<p>Nuestro servicio de <a class='blue2'>Ilustraci&oacute;n a medida</a> desarrolla ilustraciones originales y de calidad. Tenemos un servicio para cada necesidad de ilustraci&oacute;n.</p>
			<p>Algunos de los servicios m&aacute;s solicitados son:</p>
			<ul class='white'>
				<li>Ilustraci&oacute;n editorial</li>
				<li>Ilustraciones para carteler&iacute;a</li>
				<li>Ilustraciones publicitarias</li>
			</ul>
		</div>
		<img class='ilustracion' alt='icon' src='<?php bloginfo('template_directory') ?>/img/descripcion/illustracion.png' />
	</div>
	<div class='seccion' id='publicidad'>
		<h3><a class='blue2'>Publicidad</a> Impresa</h3>
		<img class='icon' alt='icon' src='<?php bloginfo('template_directory') ?>/img/descripcion/icono4.png' />
		<p>Nos encargamos tambi&eacute;n de la impresi&oacute;n y fabricaci&oacute;n de todo el material que dise&ntilde;amos. Gracias a la colaboraci&oacute;n de diferentes empresas especializadas (impresi&oacute;n en gran formato, imprenta, serigrafiado texteil). Conseguimos la mejor relaci&oacute;n calidad-precio en la fabricaci&oacute;n de d&iacute;pticos, tr&iacute;pticos, banners, banderas, camisetas. De este modo, nuestro cliente recibe completamente terminado el producto que nos ha solicitado, con el dise&ntilde;o y la fabricaci&oacute;n m&aacute;s cuidadas. Nos encargamos de todo con un servicio llave en mano.</p>
		<img class='printer' alt='icon' src='<?php bloginfo('template_directory') ?>/img/descripcion/printing_img.png' />
	</div>
	<div class='seccion' id='embalaje'>
		<h3><a class='blue2'>Embalaje</a></h3>
		<div class='column'>
			<img class='icon' alt='icon' src='<?php bloginfo('template_directory') ?>/img/descripcion/icono5.png' />
			<p>Quazar relies on a team of web designers & graphic designers passionate about quality standarts. We strongly believe that our mobile first approach reflects the experience & talent of our skilled troopers. We're humbled & proud of our website design clients, so we let our work do the talking.</p>
		</div>
		<img alt='icon' src='<?php bloginfo('template_directory') ?>/img/descripcion/embalaje_img1.png' />
		<img alt='icon' src='<?php bloginfo('template_directory') ?>/img/descripcion/embalaje-img2.png' />
	</div>
	<div class='clear'></div>
</div>
<div class='center'>
</div>