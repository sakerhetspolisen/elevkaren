<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package elevkaren
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<script src="https://kit.fontawesome.com/f864ebff46.js" crossorigin="anonymous"></script>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'elevkaren' ); ?></a>

	<header id="masthead" class="site-header">
		<div id="rotating-emblem">ELEVKÅREN VID PROCIVITAS EST 1997 </div>
		<div class="site-branding">
			<img src="<?php echo get_template_directory_uri() . '/assets/golden.png';?>">
		</div><!-- .site-branding -->
		<div id="header-menu-button"><span><i class="fas fa-bars"></i></span></div>
	</header><!-- #masthead -->
	<div id="menu-grid-wrap">
		<ul class="grid-list">
			<li class="grid-item-link"><a href="/kommitteer"><span>Kommittéer</span></a></li>
			<li class="grid-item-link"><a href="/medlemskap"><span>Medlemskap</span></a></li>
			<li class="grid-item-link"><a href="/evenemang"><span>Evenemang</span></a></li>
			<li class="twin-grid-item">
				<div class="subgrid-item"><a href="/om-oss"><span>Om oss</span></a></div>
				<div class="subgrid-item"><a href="/kontakt"><span>Kontakta oss</span></a></div>
			</li>
			<li class="grid-item-link"><a href="/procivianen"><span><i class="fas fa-bookmark"></i> Procivianen</span></a></li>
			<li class="grid-item-link"><a href="https://www.killergame.procivitas.se"><span><i class="fas fa-tint"></i> Killergame</span></a></li>
			<li class="grid-item-link"><a href="/bilder"><span>Gamla bilder</span></a></li>
			<li class="grid-item-link"><a href="/rabatter"><span>Rabatter</span></a></li>
		</ul>
	</div>
	<script>
		var mo = false;
		document.getElementById("header-menu-button").onclick = function() {
			m = document.getElementById("menu-grid-wrap");
			if (mo == false) {
				m.style.display = "block";
				mo = true;
				document.getElementById("header-menu-button").innerHTML = '<span><i class="fas fa-times"></i></span>';
			} else {
				m.style.display = "none";
				mo = false;
				document.getElementById("header-menu-button").innerHTML = '<span><i class="fas fa-bars"></i></span>';
			}
		}
	</script>