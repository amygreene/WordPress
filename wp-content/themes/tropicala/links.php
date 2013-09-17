<?php
/*
Template Name: Links
*/
?>

<?php get_header(); ?>

  <div id="main_content">

    <h2>Links:</h2>
    <ul class="links_page">
    <?php wp_list_bookmarks(); ?>
    </ul>

  </div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
