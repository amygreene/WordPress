<?php get_header(); ?>

<div id="content" class="narrowcolumn">
   <div id="pre">
 <div id="headr">
    <h1><a href="<?php echo get_option('home'); ?>/">
      <?php bloginfo('name'); ?>
      </a></h1>
    <div class="description">
      <?php bloginfo('description'); ?>
    </div>
  </div>
</div>

  <?php if (have_posts()) : ?>
  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
  <?php /* If this is a category archive */ if (is_category()) { ?>
  <h2 class="pagetitle"><?php _e('Archive for the',TEMPLATE_DOMAIN);?> &#8216;<?php echo single_cat_title(); ?>&#8217;</h2>
  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
  <h2 class="pagetitle"><?php _e('Archive for',TEMPLATE_DOMAIN);?>
    <?php the_time(__('F jS, Y')); ?>
  </h2>
  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
  <h2 class="pagetitle"><?php _e('Archive for',TEMPLATE_DOMAIN);?>
    <?php the_time('F, Y'); ?>
  </h2>
  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
  <h2 class="pagetitle"><?php _e('Archive for',TEMPLATE_DOMAIN);?>
    <?php the_time('Y'); ?>
  </h2>
  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
  <h2 class="pagetitle"><?php _e('Author Archive',TEMPLATE_DOMAIN);?></h2>
  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
    <h2 class="pagetitle"><?php _e('Blog Archives',TEMPLATE_DOMAIN);?></h2>
    <?php } ?>
  <div class="navigation">
    <div class="alignleft">
      <?php next_posts_link(__('&larr; Previous Entries',TEMPLATE_DOMAIN)) ?>
    </div>
    <div class="alignright">
      <?php previous_posts_link(__('Next Entries &rarr;',TEMPLATE_DOMAIN)) ?>
    </div>
  </div>
  <br class="clear" />
  <?php while (have_posts()) : the_post(); ?>
  <div class="post">
    <h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to',TEMPLATE_DOMAIN);?> <?php the_title(); ?>">
      <?php the_title(); ?>
      </a></h2>
	   <p class="postmeta">
	  <span class="timr">
      <?php _e("Post",TEMPLATE_DOMAIN); ?> <?php _e('on',TEMPLATE_DOMAIN);?> <?php the_time(__('F jS, Y')) ?>
      </span>
       <?php _e("by",TEMPLATE_DOMAIN); ?> <?php the_author() ?>
	  </a>
	  </p>
       <div class="entry">


<?php if( is_date() || is_search() || is_tag() || is_author() ) { ?>

<?php if(function_exists('the_post_thumbnail')) { ?><?php if(get_the_post_thumbnail() != "") { ?><div class="alignleft">
<?php the_post_thumbnail(); ?></div><?php } } ?>
<?php the_excerpt();?>
<?php if (function_exists('wp_ozh_wsa')) { wp_ozh_wsa("336280nocolor"); } ?>
<?php } else { ?>

<?php the_content( __('<p>Click here to read more</p>',TEMPLATE_DOMAIN) ); ?>
<?php wp_link_pages('before=<p>&after=</p>'); ?>
<?php if (function_exists('wp_ozh_wsa')) { wp_ozh_wsa("336280nocolor"); } ?>

<?php } ?>


    </div>
   <p class="postmetadata">
      <?php _e("Category",TEMPLATE_DOMAIN); ?>
      <span class="catr">
      <?php the_category(', ') ?>
      </span> |
      <?php edit_post_link(__('Edit',TEMPLATE_DOMAIN), '<span class="editr">', ' | </span>'); ?>
      <span class="commr">
      <?php comments_popup_link(__('No Comments &#187;',TEMPLATE_DOMAIN), __('1 Comment &#187;',TEMPLATE_DOMAIN), __('% Comments &#187;',TEMPLATE_DOMAIN)); ?>
      </span></p>
  </div>
  <?php endwhile; ?>
  <div class="navigation">
    <div class="alignleft">
      <?php next_posts_link( __('&laquo; Previous Entries',TEMPLATE_DOMAIN) ) ?>
    </div>
    <div class="alignright">
      <?php previous_posts_link( __('Next Entries &raquo;',TEMPLATE_DOMAIN) ) ?>
    </div>
  </div>
  <?php else : ?>
  <h2 class="center"><?php _e('Not Found',TEMPLATE_DOMAIN);?></h2>
  <?php include (TEMPLATEPATH . '/searchform.php'); ?>
  <?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
