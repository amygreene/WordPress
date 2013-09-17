<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

  <div id="main_content">

    <h2>Archives by Month:</h2>
    <ul class="archives">
      <?php wp_get_archives('type=monthly'); ?>
    </ul>

    <h2>Archives by Subject:</h2>
    <ul class="archives">
       <?php wp_list_categories(); ?>
    </ul>

  </div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
