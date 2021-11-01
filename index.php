<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package elevkaren
 */

get_header();
?>
<style>
/*--------------------------------------------------------------
# PAGE HERO
--------------------------------------------------------------*/
.hero-section {
	width: 100%;
	height: calc(100vh + 10px);
	background-color: var(--dark-blue);
	position: relative;
	overflow-x: hidden;
	overflow-y: hidden;
}
.hero-bgd {
	width: 100%;
	height: 100%;
	background-position: center;
	background-repeat: no-repeat;
	background-size: cover;
	opacity: 0.26;
}
@keyframes zoomout {
	0% {transform: skewX(38deg) scale(2.2);}
	100% {transform: skewX(38deg) scale(1);}
}
.hero-skewed-rectangle {
	height: 100%;
	width: 1000px;
	top: 0;
	left: calc(50% - 500px);
	transform: skewX(38deg);
	position: absolute;
	background-color: var(--dark-blue);
	animation: zoomout 3s ease-out;
}
.hero-logotype {
	position: relative;
	display: flex;
	justify-content: center;
}
.hero-logotype img {
	width: 7em;
	margin-bottom: 3em;
}
.hero-info-wrap {
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	text-align: center;
}
h1 {
	font-size: calc(35px + 3vw);
	color: #F3D48F;
	line-height: 0.9;
	margin: 0;
	white-space: nowrap;
	font-family: var(--bely-bold);
}
.hero-info-wrap span {
	font-family: var(--bely);
	color: #F3D48F;
	display: block;
	font-size: calc(1.1em + 0.7vw);
	margin: 0.8em 0;
}
.cta-btn {
	display: inline-block;
	margin-top: 2em;
	padding: 1em 3em;
	border-radius: 0.8em;
	font-family: var(--bely-bold);
	white-space: nowrap;
	font-size: 1.4em;
	color: var(--bright-gold);
	-webkit-box-shadow: 10px 10px 40px 0px rgba(0,0,0,0.15), -10px -10px 40px 0px rgba(255,255,255,0.2);
	-moz-box-shadow: 10px 10px 40px 0px rgba(0,0,0,0.15), -10px -10px 40px 0px rgba(255,255,255,0.2);
	box-shadow: 10px 10px 40px 0px rgba(0,0,0,0.15), -10px -10px 40px 0px rgba(255,255,255,0.2);
	transition: 0.3s;
	border: 3px solid var(--bright-blue);
}
.cta-btn:hover {
	background-color: var(--bright-blue);
	border: 3px solid var(--bright-blue);
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
}
.hero-scroller {
	position: absolute;
	bottom: 8vh;
	left: 50%;
	transform: translateX(-50%);
}
.scroller-wrap {
	overflow: hidden;
}
.scroller-wrap span {
	font-family: var(--proxima);
	color: var(--bright-gold);
	position: relative;
	display: block;
	margin-bottom: 0.2em;
}
.scroller-scroller {
	position: relative;
	display: block;
	height: 0.2em;
	background-color: var(--bright-gold);
	animation: scroller 5s linear infinite;
}
@keyframes scroller {
	0% {transform: translateX(-100%);}
	50% {transform: translateX(0);}
	100% {transform: translateX(-100%);}
}
@media (max-width:576px) {
	.hero-section {
		background-color: var(--bright-blue);
	}
	.hero-skewed-rectangle {
		display: none;
		height: 100%;
		width: 500px;
		top: 0;
		left: calc(50% - 250px);
		transform: skewX(38deg);
		position: absolute;
		background-color: #960018;
		animation: zoomout 3s ease-out;
	}
	.hero-scroller {display: none;}
	.hero-logotype {
		position: relative;
		display: flex;
		justify-content: center;
	}
	.hero-logotype img {
		width: 5em;
		margin-bottom: 1em;
	}
	h1 {
		font-size: 2em;
	}
	.hero-info-wrap span {
		font-size: 1em;
	}
	.cta-btn {
		display: none;
	}
}
/*--------------------------------------------------------------
# UPCOMING EVENTS
--------------------------------------------------------------*/
.events-section {
	background-color: var(--bright-blue);
	position: relative;
	overflow: hidden;
	height: 400px;
}
.events-banner {
	height: 100px;
}
.banner-justify {
	white-space: nowrap;
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
}
.events-banner hr {
	background: url('<?php echo get_template_directory_uri() . "/assets/lightstrip.png";?>');
	height: 17px;
	border: none;
	width: 5000px;
	margin: 0;
}
.events-banner hr, .events-banner h2 {
	display: inline-block;
}
.events-banner h2 {
	color: var(--medium-bright-gold);
	font-family: var(--bely-bold);
	font-size: 2em;
	padding: 0 1em;
	margin: 0;
	line-height: 3;
}
.events-wrap {
	display: grid;
	grid-template-columns: 45% 45% 10%;
	column-gap: 2em;
}
.events-wrap-see-more {
	background-color: var(--dark-blue);
	color: var(--bright-gold);
}
/*--------------------------------------------------------------
# ABOUT US
--------------------------------------------------------------*/
.aboutus-section {
	background-color: var(--bright-red);
	position: relative;
	overflow: hidden;
}
.aboutus-wrap {
	height: 32vw;
	position: relative;
	margin: 4em 0;
	margin-right: 3em;
}
.aboutus-section h2 {
	display: inline-flex;
}
.aboutus-image-wrap {
	position: absolute;
	left: calc(2vw + 15px);
	height: 32vw;
	width: 42vw;
	transform: skewX(11deg);
	-ms-transform: skewX(11deg); /* IE 9 */
	-webkit-transform: skewX(11deg); /* Safari and Chrome */
    overflow: hidden;
    -webkit-transform-origin: top left;
    -ms-transform-origin: top left;
	transform-origin: top left;
}
.aboutus-image-wrap::before {
    content: "";
    transform: skewX(-11deg); 
    -ms-transform: skewX(-11deg); /* IE 9 */
    -webkit-transform: skewX(-11deg); /* Safari and Chrome */
    background-image: url('<?php echo get_template_directory_uri() . "/styrelsen.jpg";?>');
	background-repeat: no-repeat;
	background-size: cover;
    background-position: top right; 
    position: absolute;
    -webkit-transform-origin: top left;
    -ms-transform-origin: top left;
    transform-origin: top left;
    width: calc(42vw + 100px);
    height: calc(51vw);
}
.text-wrap-polygon {
	float: left;
    height: 32vw;
    width: 55vw;
    shape-outside: polygon(0 0, 90% 0, 100% 100%, 0% 100%);
}
.aboutus-info {
	position: relative;
	top: 50%;
	transform: translateY(-50%);
}
.aboutus-section h2 {
	font-family: var(--bely);
	font-size: calc(20px + 2vw);
	margin: 0;
	color: var(--bright-gold);
}
.aboutus-section p {
	font-family: var(--bely);
	color: var(--bright-gold);
}
.skewed-red-button {
	background-color: var(--bright-red);
	font-family: var(--bely-bold);
	color: var(--bright-gold);
	padding: 1em 2em;
	display: inline-block;
	margin-top: 2em;
	position: relative;
	-webkit-box-shadow: 10px 10px 40px 0px rgba(0,0,0,0.2), -10px -10px 40px 0px rgba(255,255,255,0.25);
	-moz-box-shadow: 10px 10px 40px 0px rgba(0,0,0,0.2), -10px -10px 40px 0px rgba(255,255,255,0.25);
	box-shadow: 10px 10px 40px 0px rgba(0,0,0,0.2), -10px -10px 40px 0px rgba(255,255,255,0.25);
	transition: 0.3s;
	border: 3px solid var(--bright-red);
	text-align: center;
}
.skewed-red-button:hover {
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
	border: 3px solid var(--dark-red);
}
.skewed-red-button::before {
	content: "";
	width: 0;
    height: 0;
    border-top: 50px solid var(--bright-red);
	border-left: 10px solid transparent;
	position: absolute;
	top: -3px;
	left: 0;
	margin-left: -10px;
}
.skewed-red-button::after {
	content: "";
	width: 0;
    height: 0;
    border-bottom: 50px solid var(--bright-red);
	border-right: 10px solid transparent;
	position: absolute;
	top: 3px;
	right: 0;
	margin-right: -10px;
}
@media (max-width: 1000px) {
	.aboutus-image-wrap {
		position: relative;
		left: auto;
		height: 50vw;
		width: 100%;
		transform: none;
		-ms-transform: none; /* IE 9 */
		-webkit-transform: none; /* Safari and Chrome */
		overflow: hidden;
	}
	.aboutus-image-wrap::before {
		transform: none; 
		-ms-transform: none; /* IE 9 */
		-webkit-transform: none; /* Safari and Chrome */
		background-position: top right; 
		position: absolute;
		-webkit-transform-origin: top left;
		-ms-transform-origin: top left;
		transform-origin: top left;
		width: 100%;
		height: 100%;
	}
	.aboutus-wrap {
		height: auto;
		position: relative;
		margin: 4em 2em;
	}
	.text-wrap-polygon {
		display: none;
	}
	.aboutus-info {
		position: relative;
		top: 0;
		transform: none;
		margin-top: 2em;
	}
	.skewed-red-button {
		padding: 1.5em 0;
		width: calc(100% - 30px);
		margin-top: 1em;
		font-size: 1.2em;
		margin-left: 15px;
	}
	.skewed-red-button::before {
		border-top: 85px solid var(--bright-red);
		border-left: 15px solid transparent;
		position: absolute;
		top: -3px;
		left: 0;
		margin-left: -15px;
	}
	.skewed-red-button::after {
		content: "";
		width: 0;
		height: 0;
		border-bottom: 82px solid var(--bright-red);
		border-right: 15px solid transparent;
		position: absolute;
		top: 0;
		right: 0;
		margin-right: -15px;
	}
	.aboutus-section h2 {
		font-size: 10vw;
	}
}

/*--------------------------------------------------------------
# SOCIAL
--------------------------------------------------------------*/
.social-section {
	background-color: var(--bright-blue);
	position: relative;
	overflow: hidden;
}
.social-banner {
	height: 100px;
	margin-bottom: 50px;
}
.social-banner hr {
	border: none;
	border-top: 10px dotted var(--medium-bright-gold);
	width: 5000px;
	height: 10px;
	margin: 0;
}
/* Needed because the margin wasn't adding up */
.reversed-line {
	transform: rotate(180deg);
	border-top: none !important;
	border-bottom: 10px dotted var(--medium-bright-gold) !important;
}
.social-banner hr, .social-banner h2 {
	display: inline-block;
}
.social-banner h2 {
	color: var(--medium-bright-gold);
	font-family: var(--bely-bold);
	font-size: 3em;
	padding: 0 1em;
	margin: 0;
	line-height: 3;
}
.social-bio {
	position: relative;
	margin: 4em 0;
}
.bio-wrapper {
	width: 70%;
	background-color: var(--dark-blue);
	margin: 0 auto;
	display: grid;
	grid-template-columns: 180px calc(100% - 380px) 200px;
}
.bio-profile-pic {
	padding: 1em 0;
	position: relative;
}
.bio-profile-pic img {
	margin: 0 auto;
	display: block;
	border-radius: 100%;
	width: 60%;
	position: relative;
}
.bio-information {
	display: flex;
	justify-content: center;
	align-items: center;
	margin-right: 1.5em;
}
.bio-info-wrapper b,.bio-info-wrapper span {
	color: var(--medium-bright-gold);
	display: block;
	font-family: var(--proxima);
}
.bio-info-wrapper b {
	margin-bottom: 0.5em;
}
.bio-referrer {
	background-color: rgba(255,255,255,0.1);
	position: relative;
	transition: 0.3s;
}
.bio-referrer:hover {
	background-color: var(--dark-gold);
	position: relative;
	transform: rotate(3deg);
}
.bio-referrer:hover > span {
	color: var(--bright-blue);
}
.bio-referrer span {
	font-family: var(--bely-bold);
	color: var(--medium-bright-gold);
	font-size: 1.5em;
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
}
.social-wrap {
	padding: 0 3vw;
	margin-top: 4em;
}
.eapps-instagram-feed-posts-grid-load-more {
	border-radius: 0;
	width: 19.7em;
	height: 4.2em;
	margin-top: 5em;
	border: 5px dotted var(--dark-blue);
	-webkit-box-shadow: 0px 0px 0px 7px rgba(197,161,76,1);
	-moz-box-shadow: 0px 0px 0px 7px rgba(197,161,76,1);
	box-shadow: 0px 0px 0px 7px rgba(197,161,76,1);
	transition: 0.5s;
}
.eapps-instagram-feed-posts-grid-load-more::before {
	position: absolute;
	content: "Ladda fler inlägg";
	font-family: var(--proxima);
	color: var(--dark-blue);
	font-weight: bold;
	font-size: 1.2em;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
}
.eapps-instagram-feed-posts-grid-load-more:hover {
	filter: brightness(0.8);
}
.eapps-instagram-feed-posts-grid-load-more-text {
	visibility: collapse;
}
@media (max-width: 768px) {
	.bio-wrapper {
		width: 90%;
		font-size: 0.9em;
		grid-template-columns: 120px calc(100% - 290px) 170px;
	}
	.bio-information {padding: 1em 0;}
}
@media (max-width: 576px) {
	.social-banner {margin-bottom: 0;}
	.social-bio {margin-top: 0;}
	.social-banner h2 {font-size: 2em;}
	.bio-wrapper {
		width: 95%;
		grid-template-columns: 90px calc(100% - 90px) 0;
		font-size: 0.9em;
		padding: 1em 0;
	}
	.bio-referrer {display: none;}
	.bio-progile-pic {position: relative;}
	.bio-profile-pic img {
		width: 70%;
		top: 50%;
		transform: translateY(-50%);
		position: absolute;
		margin:0;
	}
}
/*--------------------------------------------------------------
# REDIRECT SECTION
--------------------------------------------------------------*/
.redirect-section {
	overflow: auto;
}
.redirect-wrapper {
	margin: 7em 0 10em 0;
}
.redirect-wrapper h2 {
	text-align: center;
	color: var(--bright-gold);
	font-family: var(--bely-bold);
	font-size: 2.5em;
	margin: 2.5em 0.5em 0 0.5em;
}
.redirect-wrapper svg {
	position: relative;
	left: 50%;
	transform: translateX(-50%);
	margin: 2em 0;
}
.redirect-buttons {
	width: 70%;
	display: grid;
	grid-template-columns: repeat(auto-fill,minmax(230px, 1fr));
	gap: 2em 2em;
	margin: 0 auto;
}
.re-btn {
	background-color: var(--bright-gold);
	text-align: center;
	padding: 1.5em;
	border-top: 4px solid transparent;
	border-bottom: 4px solid var(--medium-bright-gold);
	font-family: var(--bely-bold);
	font-size: 1.4em;
	color: var(--dark-blue);
	line-height: 1.2;
	transition: 0.3s;
}
.re-btn:hover {
	filter: brightness(0.9);
}
.btn-outline {
	-webkit-text-fill-color: var(--bright-gold); /* Will override color (regardless of order) */
	-webkit-text-stroke-width: 2px;
	-webkit-text-stroke-color: var(--dark-blue);
}
</style>
	<main id="primary" class="site-main">
		<div class="hero-section">
			<div class="hero-bgd" <?php if ( get_header_image() ) : ?>style="background-image: url('<?php header_image(); ?>');"<?php endif; ?>></div>
			<div class="hero-skewed-rectangle"></div>
			<div class="hero-info-wrap">
				<div class="hero-logotype">
					<?php if ( function_exists( 'the_custom_logo' ) ) {
						the_custom_logo();
					} ?>
				</div>
				<h1>Elevkåren vid<br>Procivitas</h1>
				<span>Sveriges helt klart bästa elevkår.</span>
				<a href="/bli-medlem">
					<div class="cta-btn"><?php echo get_theme_mod('cta_text_setting', 'Bli medlem'); ?></div>
				</a>
			</div>
			<div class="hero-scroller">
				<div class="scroller-wrap">
					<span>Skrolla för att utforska</span>
					<div class="scroller-scroller"></div>
				</div>
			</div>
		</div>
		<div class="events-section">
			<div class="events-banner">
				<div class="banner-justify">
					<hr style="transform: rotate(180deg);">
					<h2>Kommande evenemang</h2>
					<hr>
				</div>
			</div>
			<div class="events-wrap">
				<?php $loop = new WP_Query( array(
					'post_type' => 'evenemang',
					'posts_per_page' => 2
				  )
				);
				while ( $loop->have_posts() ) : $loop->the_post();
				get_template_part( 'template-parts/events-home' );
				endwhile; wp_reset_query(); ?>
				<div class="events-wrap-see-more"><i class="fas fa-arrow-right"></i></div>
			</div>
		</div>
		<div class="aboutus-section">
			<div class="aboutus-wrap">
				<div class="aboutus-image-wrap"></div>
				<div class="text-wrap-polygon"></div>
				<div class="aboutus-info">
					<h2><?php echo get_theme_mod('aboutus_title_setting', 'Låt oss presentera:'); ?></h2>
					<p><?php echo get_theme_mod('aboutus_content_setting', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.'); ?></p>
					<a href="/om-oss" class="skewed-red-button">Läs mer om oss</a>
				</div>
			</div>
		</div>
		<div class="social-section">
			<div class="social-banner">
				<div class="banner-justify">
					<hr class="reversed-line">
					<h2>Det senaste i flödet</h2>
					<hr>
				</div>
			</div>
			<div class="social-bio">
				<div class="bio-wrapper">
					<div class="bio-profile-pic">
						<img src="<?php echo get_template_directory_uri() . '/assets/socialpic.png';?>">
					</div>
					<div class="bio-information">
						<div class="bio-info-wrapper">
							<b>@elevkarenvidprocivitas</b>
							<span>Följ oss på våra sociala medier för att se vårt arbete bakom kulisserna och få uppdateringar om kommande evenemang.</span>
						</div>
					</div>
					<a class="bio-referrer" href="https://www.instagram.com/elevkarenvidprocivitas" target="_blank"><span>Följ oss</span></a>
				</div>
				<div class="social-wrap"><?php echo do_shortcode('[elfsight_instagram_feed id="1"]'); ?></div>
			</div>
		</div>
		<div class="redirect-section">
			<div class="redirect-wrapper">
				<h2>Är det något speciellt som du vill hitta?</h2>
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="83" height="16" viewBox="0 0 83 16">
					<defs>
						<style>.a{clip-path:url(#b);}.b,.c{fill:none;stroke:#f3d48f;stroke-linecap:round;}.b{stroke-width:3px;}.c{stroke-width:2px;}</style>
						<clipPath id="b">
							<rect width="83" height="16"/>
						</clipPath>
					</defs>
					<g id="a" class="a">
						<path class="b" d="M8649.169,4641.36s-9.522,9.555-18.209,0c-8.625-9.386-18.586-2.936-21.791,0" transform="translate(-8567.999 -4634)"/>
						<path class="b" d="M8609.169,4641.36s9.522,9.555,18.209,0c8.625-9.386,18.586-2.936,21.791,0" transform="translate(-8606.999 -4634)"/>
						<path class="c" d="M8985.964,4652.4s4.709-6.386,9.182-4.606" transform="translate(-8963 -4638)"/>
						<path class="c" d="M8995.146,4652.4s-4.709-6.386-9.182-4.606" transform="translate(-8934 -4638)"/>
					</g>
				</svg>
				<div class="redirect-buttons">
					<a class="re-btn committees" href="/kommitteer"><i class="fas fa-users"></i> Kommittéer</a>
					<a class="re-btn events" href="/evenemang"><i class="far fa-calendar-alt"></i> Evenemang</a>
					<a class="re-btn discounts" href="rabatter"><i class="fas fa-tags"></i> Rabatter</a>
					<a class="re-btn membership" href="medlemskap"><i class="fas fa-fire-alt"></i> Medlemskap</a>
					<a class="re-btn btn-outline procivianen" href="/procivianen"><i class="fas fa-bookmark"></i> Procivianen</a>
					<a class="re-btn btn-outline killergame" href="https://www.killergame.elevkarenvidprocivitas.se"><span><i class="fas fa-tint"> </i> Killergame</a>
				</div>
			</div>
		</div>
	</main><!-- #main -->
<?php
get_sidebar();
get_footer();
