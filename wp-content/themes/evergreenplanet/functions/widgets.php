<?php

function kreative_tabbed_content_widget($option)
{
	echo $option['before_widget']; ?>
	<div class="tabbed fleft">
			<!-- The tabs -->
			<ul class="tabs">
				<li class="t1"><a class="t1 tab" title="Recent Posts">Recent</a></li>
				<li class="t2"><a class="t2 tab" title="Recent Comments">Comments</a></li>
				<li class="t3"><a class="t3 tab" title="Tags">Tags</a></li>
			</ul>

		<!-- tab 1 -->
		<div class="area t1">
			<ul>
				<?php wp_get_archives('title_li=&type=postbypost&limit=5'); ?>
			</ul>
		</div>
		
		<!-- tab 2 -->
		<div class="area t2">
			<?php echo kreative_recent_comment(); ?>
		</div>
		
		<!-- tab 3 -->
		<div class="area t3">
			<?php wp_tag_cloud(); ?> 
		</div>
	
	</div><!-- end of tabbed -->

	<div class="clear"></div>

	<?php echo $option['after_widget'];
}

function kreative_comment_widget($option)
{
	echo $option['before_widget'];
	echo $option['before_title'];
	echo 'Comments';
	echo $option['after_title'];
	echo kreative_recent_comment();
	echo $option['after_widget'];
}

function kreative_lifestream_widget($option)
{
	echo $option['before_widget'];
	echo $option['before_title'];
	echo 'Lifestream';
	echo $option['after_title'];
	echo lifestream();
	echo $option['after_widget'];
}

function kreative_300px_ads_widget($option)
{
	echo $option['before_widget'];
	echo $option['before_title'];
	echo 'Advertisements';
	echo $option['after_title'];
	kreative_show_ads('300x120', '1');
	kreative_show_ads('300x120', '2');
	echo $option['after_widget'];
}


function kreative_videopodcast_widget($option)
{
	echo '<div class="sidebar video alignright">';
	echo '<h2>Video Podcast</h2>';
	echo '<ul>';

	$q = "tag=video&showposts=1"; 
	$my_query = new WP_Query($q);
	
	if ($my_query->have_posts()) : while ($my_query->have_posts()) :
	$my_query->the_post();
	$do_not_duplicate = $my_query->post->ID;
	?>
		 
	<div class="block2">
		<?php
		
		$embed = GetVideo($my_query->post->ID);
		$embed = preg_replace('/(width)=("[^"]*")/i', 'width="270"', $embed);
		$embed = preg_replace('/(height)=("[^"]*")/i', 'height="175"', $embed);
		
		?>
				
		<div class="wrap">
			<?php echo $embed; ?>
		</div><!-- .wrap -->
				
		<h2><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		<?php the_content_rss('', TRUE, '', 30); ?>
	</div>
	
	<div class="clear"></div>
		 
	<?php 
	endwhile; 
	else:
	endif;
	
	echo '</ul>';
	echo '</div>';
}

register_sidebar_widget('BrightSky 300x120 Advertisements', 'kreative_300px_ads_widget');
register_sidebar_widget('BrightSky Video Podcast', 'kreative_videopodcast_widget');
register_sidebar_widget('BrightSky Recent Comment', 'kreative_comment_widget');
register_sidebar_widget('BrightSky Tabbed Comment', 'kreative_tabbed_content_widget');

if ( !! function_exists('lifestream'))
{
	register_sidebar_widget('BrightSky Lifestream', 'kreative_lifestream_widget');
}