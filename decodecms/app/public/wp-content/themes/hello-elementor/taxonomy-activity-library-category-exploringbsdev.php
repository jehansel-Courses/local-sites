<?php

/**
 * The template for displaying archive pages.
 *
 * @package HelloElementor
 */

$parent_id	=	get_queried_object()->parent;
$taxonomy   =   get_queried_object()->taxonomy;
$extradata_tax = get_option("taxonomy_term_" . get_queried_object()->term_id);
get_header();

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
?>

<div id="primary" class="content-area internal-page">
	<main id="main" class="site-main" role="main">

		<?php
		//if there is category image, uses it, else, uses activity library page			
		if (function_exists('z_taxonomy_image_url') && z_taxonomy_image_url()) {
			$categoryimage = z_taxonomy_image_url();
		} else {
			$activity_page		=	get_page_by_path('activity-library');
			$activity_page_id	=	$activity_page->ID;
			//define('ACTIVITY_LIBRARY_PAGE_ID',$activity_page_id);
			// $block1image = simple_fields_value("block1image",$activity_page_id); 
			$block1imagesrc = wp_get_attachment_image_src($block1image, 'large');
			$categoryimage = $block1imagesrc[0];
		}
		?>
		<img class="hidden" src="<?php echo $categoryimage; ?>" />
		<div class="row first-row screen-height">
			<div class="row-background desktop" style="background-image: url(<?php echo $categoryimage; ?>);"></div>
			<div class="row-background mobile" style="background-image: url(<?php echo $categoryimage; ?>);"></div>
			<div class="row-over-background dark-blue"></div>
			<div class="container">
				<div class="pageBox">
					<!-- <h2>taxonomy-activity-library-category.php</h2> -->
					<h3><?php echo single_cat_title('', false); ?>
						<a class="btn-back" href="javascript:history.back(-1)"><span>Back</span></a>
					</h3>
					<?php if (category_description() != "") { ?>
						<div class="intro green">
							<?php echo category_description(); ?>
						</div>

					<?php } ?>

				</div> <!--/pageBox -->

			</div>
		</div> <!--/row -->

		<div class="row content-block-4 withMargins">
			<div class="row-background" <?php /*style="background-image: url(<?php echo $block2imagesrc[0]; ?>);"*/ ?>></div>
			<div class="row-over-background dark-blue"></div>


			<div class="container">
				<div class="text-cont">
					<?php echo (is_array($extradata_tax)) ? '<h3>' . $extradata_tax['subtitle'] . '</h3>' : ''; ?>
					<?php echo (is_array($extradata_tax)) ? '<div class="subdesc"><p>' . stripslashes($extradata_tax['subtitledescription']) . '</p></div>' : ''; ?>
					<a class="viewMenu" href="javascript:void(0);">VIEW MENU <i class="fa fa-chevron-down"></i></a>
					<div class="leftColumnActivity">
						<ul>
							<?php
							$taxonomy	=	'activity-library-category';
							$activitylibrary_cats 	= 	array(
								'taxonomy'  	=> 	$taxonomy,
								'order' 		=> 	'ASC',
								'hide_empty'	=> 	false,
								'hierarchical'  => 	1,
								'title_li'      => 	'',
							);
							wp_list_categories($activitylibrary_cats);

							?>
						</ul>
					</div> <!--/leftColumnActivity -->

					<div class="rightColumnActivity">

						<?php
						$termID = get_queried_object()->term_id;
						$taxonomyName = $taxonomy;
						// $termchildren = get_terms( $taxonomyName, array( 'child_of' => $termID, 'orderby'       =>  'term_order',
						// 			'hide_empty'    => false ) );
						//	get_term_children( $termID, $taxonomyName );
						$termchildren = get_terms(array(
							'taxonomy' => $taxonomyName,
							'child_of' => $termID,
							// 'orderby' => 'term_order',
							'orderby' => 'name',
							'order' => 'ASC',
							'hide_empty' => false,
						));

						// echo var_dump($termchildren);

						if (!empty($termchildren)) {
							foreach ($termchildren as $child) {
								if ($child->count > 0) {

									if (term_is_ancestor_of(48, $termID, 'activity-library-category') or is_term(48, 'activity-library-category')) :
										$link = get_term_link($child->term_id, $taxonomy_name);
									else :
										$link = '#';
									endif;
						?>
									<div class="item">
										<?php if ($link == '#') { ?>
											<div class="soon soon-small">
												<span>Coming Soon</span>
											</div>
										<?php } ?>

										<div class="image <?php if ($link == '#') {
																echo ' bw';
															} ?>">
											<a href="<?php echo $link; ?>">
												<img src="<?php //echo z_taxonomy_image_url($child->term_id, 'thumbnail'); 
															?>" />
											</a>
										</div>

										<div class="text">
											<span class="itemTitle">
												<a href="<?php echo $link; ?>">
													<?php echo $child->name; ?>
												</a>
											</span>

											<span>
												<?php echo $child->description; ?>
											</span>
										</div>

										<a href="<?php echo $link; ?>">
											<span class="arrow">
											</span>
										</a>
									</div>
								<?php
								}
							}
							foreach ($termchildren as $child) {
								if ($child->count == 0) {
									$link = get_term_link($child->term_id, $taxonomy_name);
								?>
									<div class="item no-posts">
										<div class="soon soon-small">
											<span>Coming Soon</span>
										</div>

										<div class="image">
											<a href="<?php echo $link; ?>">
												<img src="<?php // echo z_taxonomy_image_url($child->term_id, 'thumbnail'); 
															?>" />
											</a>
										</div>

										<div class="text">
											<span class="itemTitle">
												<a href="<?php echo $link; ?>">
													<?php echo $child->name; ?>
												</a>
											</span>

											<span>
												<?php echo $child->description; ?>
											</span>
										</div>

										<a href="<?php echo $link; ?>">
											<span class="arrow">
											</span>
										</a>
									</div>
								<?php
								}
							}
						} else {
							while (have_posts()) :
								the_post();

								if (get_field('external_link')) :
									$link = get_field('external_link');
								else :
									$link = get_the_permalink();
								endif;

								if (get_field('open_in_new_tab')) :
									$target = 'target="_blank"';
								endif;

								if (get_the_title() == 'IACP TRAINING KEYS') {
									$link = 'http://iacppolice.ebiz.uapps.net/PersonifyEbusiness/Default.aspx?TabId=71&returnurl=%2fPersonifyEbusiness%2fDefault.aspx%3fTabID%3d1638" target="_blank"';
								}
								?>

								<div class="item">
									<?php if ($link == '#') { ?>
										<div class="soon soon-small">
											<span>Coming Soon</span>
										</div>
									<?php } ?>

									<div class="image <?php if ($link == '#') {
															echo ' bw';
														} ?>">
										<a href="<?php echo $link; ?>" <?php echo $target; ?>><?php the_post_thumbnail('thumbnail'); ?></a>
									</div>

									<div class="text">
										<span class="itemTitle">
											<a href="<?php echo $link; ?>" <?php echo $target; ?>><?php the_title(); ?></a>
										</span>

										<span>
											<?php the_excerpt(); ?>
										</span>
									</div>

									<a href="<?php echo $link; ?>" <?php echo $target; ?>>
										<span class="arrow"></span>
									</a>
								</div>
						<?php
							endwhile;
						}
						?>
						<?php // wp_pagenavi(); ?>
					</div> <!--/rightColumnActivity -->
				</div>
			</div>
		</div>
	</main><!-- .site-main -->
</div><!-- .content-area -->












<main id="content" class="site-main" role="main">
	<h2>HELLO ELEMENTOR -> taxonomy-activity-library-category.php</h2>
	<?php if (apply_filters('hello_elementor_page_title', true)) : ?>

		<header class="page-header">
			<?php
			the_archive_title('<h1 class="entry-title">', '</h1>');
			the_archive_description('<p class="archive-description">', '</p>');
			?>
		</header>
		<h2>HEADER ends</h2>

	<?php endif; ?>

	<div class="page-content">
		<div id="primary" class="content-area internal-page">
			<main id="main" class="site-main" role="main">

				<?php
				//if there is category image, uses it, else, uses activity library page			
				if (function_exists('z_taxonomy_image_url') && z_taxonomy_image_url()) {
					$categoryimage = z_taxonomy_image_url();
				} else {
					$activity_page        =    get_page_by_path('activity-library');
					// echo "<br>activity_page -> " . var_dump($activity_page) . "<br>";
					$activity_page_id    =    $activity_page->ID;
					echo "<br>activity_page_id -> " . $activity_page_id . "<br>";
					//define('ACTIVITY_LIBRARY_PAGE_ID',$activity_page_id);
					// $block1image = simple_fields_value("block1image", $activity_page_id);
					// $block1imagesrc = wp_get_attachment_image_src($block1image, 'large');
					// $categoryimage = $block1imagesrc[0];
				}
				?>
				<img class="hidden" src="<?php echo $categoryimage; ?>" />
				<div class="row first-row screen-height">
					<div class="row-background desktop" style="background-image: url(<?php echo $categoryimage; ?>);"></div>
					<div class="row-background mobile" style="background-image: url(<?php echo $categoryimage; ?>);"></div>
					<div class="row-over-background dark-blue"></div>
					<div class="container">
						<div class="pageBox">
							<!-- <h2>taxonomy-activity-library-category.php</h2> -->
							<h3><?php echo single_cat_title('', false); ?>
								<a class="btn-back" href="javascript:history.back(-1)"><span>Back</span></a>
							</h3>
							<?php if (category_description() != "") { ?>
								<div class="intro green">
									<?php echo category_description(); ?>
								</div>

							<?php } ?>

						</div> <!--/pageBox -->

					</div>
				</div> <!--/row -->

				<div class="row content-block-4 withMargins">
					<div class="row-background" <?php /*style="background-image: url(<?php echo $block2imagesrc[0]; ?>);"*/ ?>></div>
					<div class="row-over-background dark-blue"></div>


					<div class="container">
						<div class="text-cont">
							<?php echo (is_array($extradata_tax)) ? '<h3>' . $extradata_tax['subtitle'] . '</h3>' : ''; ?>
							<?php echo (is_array($extradata_tax)) ? '<div class="subdesc"><p>' . stripslashes($extradata_tax['subtitledescription']) . '</p></div>' : ''; ?>
							<a class="viewMenu" href="javascript:void(0);">VIEW MENU <i class="fa fa-chevron-down"></i></a>
							<div class="leftColumnActivity">
								<ul>
									<?php
									$taxonomy    =    'activity-library-category';
									$activitylibrary_cats     =     array(
										'taxonomy'      =>     $taxonomy,
										'order'         =>     'ASC',
										'hide_empty'    =>     false,
										'hierarchical'  =>     1,
										'title_li'      =>     '',
									);
									wp_list_categories($activitylibrary_cats);

									?>
								</ul>
							</div> <!--/leftColumnActivity -->
							<div class="rightColumnActivity">

								<?php
								$termID = get_queried_object()->term_id;
								$taxonomyName = $taxonomy;
								// $termchildren = get_terms($taxonomyName, array(
								//     'child_of' => $termID, 'orderby'       =>  'term_order',
								//     'hide_empty'    => false
								// ));
								$termchildren = get_terms(array(
									'taxonomy' => $taxonomyName,
									'child_of' => $termID,
									// 'orderby' => 'term_order',
									'orderby' => 'name',
									'order' => 'ASC',
									'hide_empty' => false,
								));
								// $termchildren = get_terms($taxonomyName);


								echo "<br>parent_id = " . $parent_id;
								echo "<br>taxonomy = " . $taxonomy;
								echo "<br>extradata_tax = " . $extradata_tax;

								echo "<br>termID -> " . $termID;
								echo "<br>taxonomyName -> " . $taxonomyName;
								// echo "<br>termchildren -> " . var_dump($termchildren) . "<br>";
								echo "<br>count termchildren -> " . count($termchildren) . "<br>";
								echo "<br>!empty(termchildren) -> " . !empty($termchildren) . "<br>";

								// get_term_children($termID, $taxonomyName);

								if (!empty($termchildren)) {
									echo "<br>Inside IF !empty(termchildren)";

									foreach ($termchildren as $child) {

										$childLink = get_term_link($child->term_id, $taxonomyName);
										echo "<br><br>Inside foreach (termchildren as child)<br>";

										echo "<br>child->term_id -> " . $child->term_id;
										echo "<br>child->name -> " . $child->name;
										echo "<br>child->description -> " . $child->description;
										echo "<br>childLink -> " . $childLink;

										echo "<br><a href='" . $childLink . "'>" . $child->name . "</a>";
									}
								} else {
									echo "<br>SHOW THIS ACTIVITY LIBRARY CATEGORY posts";
									while (have_posts()) :
										the_post();
										//$link = get_the_permalink();
										if (get_field('external_link')) :
											$link = get_field('external_link');
										else :
											$link = get_the_permalink();
										endif;

										if (get_field('open_in_new_tab')) :
											$target = 'target="_blank"';
										endif;

										if (get_the_title() == 'IACP TRAINING KEYS') {
											$link = 'http://iacppolice.ebiz.uapps.net/PersonifyEbusiness/Default.aspx?TabId=71&returnurl=%2fPersonifyEbusiness%2fDefault.aspx%3fTabID%3d1638" target="_blank"';
										} ?>

										<div class="item">
											<?php if ($link == '#') { ?>
												<div class="soon soon-small">
													<span>Coming Soon</span>
												</div>
											<?php } ?>

											<div class="image <?php if ($link == '#') {
																	echo ' bw';
																} ?>">
												<a href="<?php echo $link; ?>" <?php echo $target; ?>>
													<?php the_post_thumbnail('thumbnail'); ?>
												</a>
											</div>

											<div class="text">
												<span class="itemTitle">
													<a href="<?php echo $link; ?>" <?php echo $target; ?>><?php the_title(); ?></a>
												</span>

												<span><?php the_excerpt(); ?></span>

											</div>

											<a href="<?php echo $link; ?>" <?php echo $target; ?>>
												<span class="arrow"></span>
											</a>

										</div>
								<?php
									endwhile;
								} // else
								?>

							</div> <!--/rightColumnActivity -->
						</div>
					</div>
				</div>
			</main><!-- .site-main -->
		</div><!-- .content-area -->

	</div>

</main>