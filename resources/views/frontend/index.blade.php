@extends('layouts.frontend.app')
@section('content')
<section id="fh5co-home" data-section="home" style="background-image: url({!! asset('frontend/images/full_image_2.jpg') !!});" data-stellar-background-ratio="0.5">
	<div class="gradient"></div>
	<div class="container">
		<div class="text-wrap">
			<div class="text-inner">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
                        <h1 class="to-animate">Desarrollo Web</h1>
                        <h2>Sistema a tu medida</h2>
                        <h2>
                            <a href="#fh5co-contact" class="btn btn-primary">Solicita tu cotización</a>
                        </h2>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="slant"></div>
</section>

<section id="fh5co-intro">
		<div class="container">
			<div class="row row-bottom-padded-lg">
				<div class="fh5co-block to-animate" style="background-image: url({!! asset('frontend/images/img_7.jpg') !!});">
					<div class="overlay-darker"></div>
					<div class="overlay"></div>
					<div class="fh5co-text">
						<i class="fh5co-intro-icon icon-bulb"></i>
						<h2>Planear</h2>
						<p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Nulla cursus augue quis vestibulum tempus. 
                            Etiam eget dictum augue. Nullam vulputate magna non arcu laoreet, 
                            sit amet gravida diam tempor.
                        </p>
					</div>
				</div>
				<div class="fh5co-block to-animate" style="background-image: url({!! asset('frontend/images/img_8.jpg') !!});">
					<div class="overlay-darker"></div>
					<div class="overlay"></div>
					<div class="fh5co-text">
						<i class="fh5co-intro-icon icon-wrench"></i>
						<h2>Desarrollar</h2>
						<p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Nulla cursus augue quis vestibulum tempus. 
                            Etiam eget dictum augue. Nullam vulputate magna non arcu laoreet, 
                            sit amet gravida diam tempor.
                        </p>
					</div>
				</div>
				<div class="fh5co-block to-animate" style="background-image: url({!! asset('frontend/images/img_10.jpg') !!});">
					<div class="overlay-darker"></div>
					<div class="overlay"></div>
					<div class="fh5co-text">
						<i class="fh5co-intro-icon icon-rocket"></i>
						<h2>Iniciar</h2>
						<p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Nulla cursus augue quis vestibulum tempus. 
                            Etiam eget dictum augue. Nullam vulputate magna non arcu laoreet, 
                            sit amet gravida diam tempor.
                        </p>
					</div>
				</div>
			</div>
            {{--
            <div class="row watch-video text-center to-animate">
				<span>Watch the video</span>

				<a href="https://vimeo.com/channels/staffpicks/93951774" class="popup-vimeo btn-video"><i class="icon-play2"></i></a>
			</div>--}}
		</div>
</section>

<section id="fh5co-services" data-section="services">
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-left">
					<h2 class=" left-border to-animate">Servicios</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-sm-6 fh5co-service to-animate">
					<i class="icon to-animate-2 icon-layers2"></i>
					<h3>Web </h3>
					<p>
                        <ul>
                            <li>Laravel</li>
                            <li>CSS</li>
                            <li>JQuery</li>
                            <li>Leaftlet</li>
                            <li>WordPress</li>
                        </ul>
                    </p>
				</div>

				<div class="clearfix visible-sm-block"></div>

				<div class="col-md-6 col-sm-6 fh5co-service to-animate">
					<i class="icon to-animate-2 icon-monitor"></i>
					<h3>Lenguajes de programación</h3>
					<p>
                        <ul>
                            <li>PHP</li>                            
                            <li>JavaScript</li>
                            <li>Python</li>
                            <li>.Net</li>
                        </ul>
                    </p>
				</div>				
			</div>
		</div>
</section>

<section id="fh5co-about" data-section="about">
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate">Nosotros</h2>
					<div class="row">
						<div class="col-md-8 col-md-offset-2 subtext to-animate">
							<p>
                                Utilizamos las ultimas tecnologias para satisfacer a nuestros clientes, 
                                realizamos las soluciones de los sistemas de información automatizados para empresas de todo tipo de rubro, 
                                para la toma de decisiones.
                            </p>
                            <p>
                                Nos enfocamos en brindar soluciones tecnológicas desarrollando software, documenttando el código fuente 
                                haciendo pruebas continuas durante el desarrollo.
                            </p>
						</div>
					</div>
				</div>
			</div>
		</div>
</section>

<section id="fh5co-contact" data-section="contact">
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate">Contáctanos</h2>
					<div class="row">
						<div class="col-md-8 col-md-offset-2 subtext to-animate">
							<h3></h3>
						</div>
					</div>
				</div>
			</div>
			<div class="row row-bottom-padded-md">
				<div class="col-md-612 text-center">
					<ul class="fh5co-contact-info">
						<li class="fh5co-contact-address ">
							<i class="icon-home"></i>
							5555 Love Paradise 56 New Clity 5655, <br>Excel Tower United Kingdom
						</li>
						<!-- <li><i class="icon-phone"></i> (123) 465-6789</li> -->
                        <li><i class="icon-envelope"></i>ewill_za@hotmail.com</li>
                        <li><i class="icon-envelope"></i>soporte.azweb@gmail.com</li>
					</ul>
				</div>
			</div>
		</div>
</section>

<footer id="footer" role="contentinfo">
		<a href="#" class="gotop js-gotop">To<i class="icon-arrow-up2">Top</i></a>
		<div class="container">
			<div class="">
				<div class="col-md-12 text-center">
					<p>
                        Copyright&copy; 2020. 
                    </p>
					
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
                    {{--
					<ul class="social social-circle">
						<li><a href="#"><i class="icon-twitter"></i></a></li>
						<li><a href="#"><i class="icon-facebook"></i></a></li>
						<li><a href="#"><i class="icon-youtube"></i></a></li>
                    </ul>
                    --}}
				</div>
			</div>
		</div>
</footer>
		
@endsection