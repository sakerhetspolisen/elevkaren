<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package elevkaren
 */

?>
<style>
	.site-footer {
		position: relative;
		overflow-x: hidden;
	}
	.rotated-element {
		transform: rotate(3deg);
		transform-origin: top left;
	}
	.golden-banner-rotated {
		background: linear-gradient(90deg, #97733B, #C5A14C,#97733B);
		overflow: hidden;
		margin-left: -2em;
		margin-right: -2em;
	}
	.golden-banner-rotated hr {
		background: url('<?php echo get_template_directory_uri() . "/assets/lightstrip.png";?>');
		height: 17px;
		border: none;
		margin: 0.5em 0;
	}
	.golden-banner-rotated hr:nth-of-type(2) {
		margin-top: 2.5em;
	}
	.contact-footer-banner {
		background-color: #08162B;
		display: inline-flex;
		width: 100%;
		flex-wrap: wrap;
		justify-content: center;
		align-items: stretch;
		font-family: var(--bely-bold);
		color: var(--bright-gold);
		font-size: 40px;
	}
	.contact-footer-banner a {
		background-color: #07101D;
		-webkit-text-fill-color: #07101D; /* Will override color (regardless of order) */
		-webkit-text-stroke-width: 2px;
		-webkit-text-stroke-color: var(--bright-gold);
		padding: 1em 0;
		transition: 0.3s;
		flex-grow: 1;
		text-align: center;
		display: flex;
		vertical-align: bottom;
		justify-content: center;
	}
	.contact-footer-banner a span {
		padding: 0 0.5em;
		line-height: 2.2;
	}
	.contact-footer-banner a::after {
		content: "";
		position: absolute;
		height: calc(92px + 2em);
		top: 2.25em;
		right: 0;
		width: 3em;
		margin-right: -3em;
		background-color: #07101D;
	}
	.contact-footer-banner a span::after {
		content: "→";
		margin-left: 0.5em;
		transition: 0.3s;
	}
	.contact-footer-banner a:hover > span::after{
		margin-left: 1em;
	}
	.contact-footer-banner div {
		padding: 1em 0;
		flex-grow: 2;
		flex-shrink: 2;
		position: relative;
	}
	.contact-footer-banner div::before {
		content: "";
		position: absolute;
		height: calc(92px + 2em);
		top: 0;
		left: 0;
		width: 3em;
		margin-left: -3em;
		background-color: #08162B;
	}
	.contact-footer-banner div span {
		display: block;
		text-align: center;
		margin: 0 0.5em;
	}
	.lower-footer {
		background-color: var(--bright-blue);
	}
	.site-info {
		background-color: var(--bright-blue);
		padding: 0 2.5em;
		padding-top: 3em;
		display: inline-flex;
		flex-wrap: wrap;
		align-items: center;
	}
	.footer-logo {
		width: 6em;
	}
	.site-info ul {
		list-style-type: none;
		padding: 0;
		margin: 0;
		font-family: var(--proxima);
		color: var(--bright-gold);
		font-weight: bold;
		font-size: 0.9em;
		margin-left: 1em;
	}
	.site-info ul li {
		float: left;
		margin: 1em;
	}
	.site-info ul li {
		float: left;
		margin: 1em;
	}
	.site-info ul li a {
		transition: 0.3s;
	}
	.site-info ul li a:hover {
		filter: brightness(0.7);
	}
	.attribution-msg {
		display: block;
		text-align: right;
		padding-bottom: 2em;
		padding-right: 2em;
		font-family: var(--proxima);
		color: #375B96;
		font-size: 0.9em;
	}
	@media (max-width:768px) {
		.contact-footer-banner {font-size: 30px;}
		.contact-footer-banner a::after {height: calc(98px + 1em);top: 3em;}
		.attribution-msg {
			text-align: center;
			font-size: 0.8em;
			padding: 2em;
			background-color: var(--dark-blue);
		}
		.site-info {margin-bottom: 1.5em;}
	}
	@media (max-width:576px) {
		.contact-footer-banner {font-size: 25px;}
		.rotated-element {transform: rotate(0);}
		.site-info {width: 100%;justify-content: center;padding: 0;margin: 1.8em 0 1em 0;}
		.site-info ul {margin-top: 1em;display: flex;white-space: nowrap;margin-left: 0;}
	}
</style>
	<footer id="colophon" class="site-footer">
		<div class="rotated-element">
			<div class="golden-banner-rotated"><hr><hr></div>
			<div class="contact-footer-banner">
				<div class="contact-title"><span>Vill du ha ett gött snack<br>med oss?</span></div>
				<a href="/kontakt"><span>Kontakt</span></a>
			</div>
		</div>
		<div class="lower-footer">
			<div class="site-info">
				<div class="footer-logo">
					<img src="<?php echo get_template_directory_uri() . '/assets/golden.png';?>">
				</div>
				<?php
					wp_nav_menu( array( 
					'theme_location' => 'footer', 
					'container' => '' ) ); 
				?>
			</div>
			<div class="attribution-msg"><a href="https://www.linkedin.com/in/karlsellergren" target="_blank">Skapad med ♥ av Karl Sellergren</a></div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
