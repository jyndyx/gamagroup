<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PerleMedia
 */

?>

	<footer id="footer" class="site-footer">
		<section id="footer-main">
			<div class="site-container">
				<div class="footer-wrapper flex">
					
					<div class="column-1 flex">
						<div class="icon">
							<svg preserveAspectRatio="xMidYMid meet" data-bbox="0 0 1024 1536" viewBox="0 0 1024 1536" height="50" width="29" xmlns="http://www.w3.org/2000/svg" data-type="color" role="presentation" aria-hidden="true">
								<g>
									<path d="M768 512q0-106-75-181t-181-75-181 75-75 181 75 181 181 75 181-75 75-181zm256 0q0 109-33 179l-364 774q-16 33-47.5 52t-67.5 19-67.5-19-46.5-52L33 691Q0 621 0 512q0-212 150-362T512 0t362 150 150 362z" fill="#49590B" data-color="1" style="
								color: #49590b;
							"></path>
								</g>
							</svg>
						</div>
						<div class="content">
							<strong>GAMA Group</strong><br/>
							<?php echo get_field('company_address', 'option');?>
						</div>
					</div>

					<div class="column-2 flex">
						<div class="icon">
							<svg preserveAspectRatio="xMidYMid meet" data-bbox="0 0 1408 1408" viewBox="0 0 1408 1408" height="50" width="39" xmlns="http://www.w3.org/2000/svg" data-type="color" role="presentation" aria-hidden="true">
								<g>
									<path d="M1408 1112q0 27-10 70.5t-21 68.5q-21 50-122 106-94 51-186 51-27 0-53-3.5t-57.5-12.5-47-14.5T856 1357t-49-18q-98-35-175-83-127-79-264-216T152 776q-48-77-83-175-3-9-18-49t-20.5-55.5-14.5-47T3.5 392 0 339q0-92 51-186Q107 52 157 31q25-11 68.5-21T296 0q14 0 21 3 18 6 53 76 11 19 30 54t35 63.5 31 53.5q3 4 17.5 25t21.5 35.5 7 28.5q0 20-28.5 50t-62 55-62 53-28.5 46q0 9 5 22.5t8.5 20.5 14 24 11.5 19q76 137 174 235t235 174q2 1 19 11.5t24 14 20.5 8.5 22.5 5q18 0 46-28.5t53-62 55-62 50-28.5q14 0 28.5 7t35.5 21.5 25 17.5q25 15 53.5 31t63.5 35 54 30q70 35 76 53 3 7 3 21z" fill="#49590B" data-color="1"></path>
								</g>
							</svg>
						</div>
						<div class="content">
							<strong>Phone</strong><br/>
							<a href="tel:<?php echo get_field('company_phone', 'option');?>"><?php echo get_field('company_phone', 'option');?></a><br/>
							<a href="tel:<?php echo get_field('company_phone_secondary', 'option');?>"><?php echo get_field('company_phone_secondary', 'option');?></a>
						</div>
					</div>

					<div class="column-3 flex">
						<div class="icon">
							<svg preserveAspectRatio="xMidYMid meet" data-bbox="0 0 1792 1408" viewBox="0 0 1792 1408" height="50" width="50" xmlns="http://www.w3.org/2000/svg" data-type="color" role="presentation" aria-hidden="true">
								<g>
									<path d="M1792 454v794q0 66-47 113t-113 47H160q-66 0-113-47T0 1248V454q44 49 101 87 362 246 497 345 57 42 92.5 65.5t94.5 48 110 24.5h2q51 0 110-24.5t94.5-48T1194 886q170-123 498-345 57-39 100-87zm0-294q0 79-49 151t-122 123q-376 261-468 325-10 7-42.5 30.5t-54 38-52 32.5-57.5 27-50 9h-2q-23 0-50-9t-57.5-27-52-32.5-54-38T639 759q-91-64-262-182.5T172 434q-62-42-117-115.5T0 182q0-78 41.5-130T160 0h1472q65 0 112.5 47t47.5 113z" fill="#49590B" data-color="1"></path>
								</g>
							</svg>
						</div>
						<div class="content">
							<strong>Email</strong><br/>
							<a href="mailto:<?php echo get_field('company_email', 'option');?>"><?php echo get_field('company_email', 'option');?></a>
						</div>
					</div>
					<div class="column-4 flex">
						<div class="icon">
							<a href="https://www.facebook.com/www.GamaGroup.ie/" target="_blank">
								<img src="<?php echo get_site_url(); ?>/wp-content/uploads/2025/01/facebook.png" class="social"/>
							</a>
						</div>
					</div>
				</div>
			</div><!-- .site-container -->
		</section><!-- #footer-main -->

	</footer><!-- #footer -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
