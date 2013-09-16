<?php get_header(); ?>

<?php include("loop.php"); ?>

<?php get_sidebar(); ?>
<?php if(is_single() || is_page()) { ?>
<?php if ( comments_open() ) { ?> <?php comments_template('',true); ?><?php } ?>
<?php } ?>
<?php get_footer(); ?>