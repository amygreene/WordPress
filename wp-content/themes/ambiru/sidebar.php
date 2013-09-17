<div id="sidebar">


<div class="sec-a">
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar(1)) : ?>

<h2><?php _e('Categories','ambiru'); ?></h2>
<ul>
<?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0'); ?>
</ul>


<h2><?php _e('Archives','ambiru'); ?></h2>
<ul>
 <?php wp_get_archives('type=monthly'); ?>
</ul>

<?php endif; ?>
</div>



<div class="sec-a">
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar(2)) : ?>

<?php if (function_exists('wp_theme_switcher')){echo '<h2>Themes</h2>'; wp_theme_switcher();} ?>

<?php wp_list_bookmarks('title_li=&category_before=&category_after='); ?>

<?php endif; ?>

</div>
</div>