<?php /**
* Template Name: Lander Page
* @package WordPress
* @subpackage FrEdHack
*/


get_header(); ?>
	<section id="content" role="main">
		<?php 
		$args = array(
			'category_name'	=>	'questions',
			'meta_key'		=>	'order_number',
			'orderby' 		=>	'meta_value_num',
			'order'			=>	'ASC',
		);
		
		$questions = new WP_Query($args);
		$postnum = 0;
		if ( $questions->have_posts() ) : while ( $questions->have_posts() ) : $questions->the_post(); ?>
			<div class="question question-<?php echo $postnum+1; ?> fullscreen<?php if ( $postnum === 0 ) { echo ' active shown'; } ?>">
				<header class="q-header">
					<h1 class="question-title"><?php the_title(); ?></h1>
					<h2 class="question-count">Question <?php echo ($postnum+1); ?>/<?php echo $questions->post_count; ?></h2>
					<div class="question-content"><?php the_content(); ?></div>
				</header>
				<div class="answers-wrap">
					<?php for ( $i = 1; $i <= 6 ; $i++ ) {
						$answer = get_field("answer_".$i);
						if ( $answer != '' ) { 
							$answer = explode( '(', $answer ); ?>
							<div class="answer-tile" data-key="<?php echo get_field('question_key'); ?>" data-val="<?php echo get_field('answer_'.$i.'_val'); ?>" >
								<div class="answer-txt-wrap">
									<h3 class="lang-row answer-en" ><?php echo $answer[0]; ?></h3>
									<p class="lang-row answer-fr"><?php echo str_replace( ')', '', $answer[1] ); ?></p>
								</div>
							</div> <?php
						}
					} ?>
				</div>
			</div>
		<?php $postnum++; endwhile; endif; ?>
		
		<div class="map-mock fullscreen">
			<h1 class="map-header">Join the movement to France!</h1>
			<p class="map-header-sub">Click the circles below to see stories from students with interests like yours, or adjust the sliders to see what others are getting up to <em>en France!</em></p>
			<div class="map-wrap">
				<img class="map-img" src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/countries.png" alt="Map mockup" />
				<img class="map-lines" src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/lines.png" alt="Map lines" />
				<svg class="icons" width="100%" height="100%">
					<defs>
						<pattern id="head1" x="0" y="0" patternUnits="objectBoundingBox" height="1" width="1">
							<image x="0" y="0" xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/library/images/head1.png"></image>
						</pattern>
						<pattern id="head2" x="0" y="0" patternUnits="objectBoundingBox" height="1" width="1">
							<image x="0" y="0" xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/library/images/head2.png"></image>
						</pattern>
						<pattern id="head3" x="0" y="0" patternUnits="objectBoundingBox" height="1" width="1">
							<image x="0" y="0" xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/library/images/head3.png"></image>
						</pattern>
					</defs>
					<circle cx="70%" cy="60%" r="40" fill="url(#head1)" />
					<circle cx="75%" cy="40%" r="40" fill="url(#head2)" />
					<circle cx="30%" cy="30%" r="40" fill="url(#head3)" />
				</svg>
				<div class="map-controls">
					<div class="ctrl-row ctrl-1">
						<span class="ctrl-label">Gender:</span>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/radio.png" />
						<span class="radio-label">Male</span>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/radio-f.png" />
						<span class="radio-label">Female</span>
					</div>
					<div class="ctrl-row ctrl-2">
						<span class="ctrl-label">Interest:</span>
						<span class="fake-select">Literature<img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/select-arrow.png" /></span>
					</div>
					<div class="ctrl-row ctrl-3">
						<span class="ctrl-label">French Level:</span>
						<span class="fake-select">Intermediate<img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/select-arrow.png" /></span>
					</div>
				</div>
			</div>
		</div>
		
	</section>
<?php get_footer(); ?>