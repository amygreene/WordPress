body, #blog-description {
font-family: <?php echo $tn_focus_body_font; ?>!important;
color: <?php echo $tn_focus_text_color; ?>!important;
background: <?php echo $tn_focus_bg_color; ?>!important;
}

#wrapper body.home div.entry-date {
  color: #FFF !important;
}

p, div, em, code, blockquote, span {
color: <?php echo $tn_focus_text_color; ?>;
}

h1, h2, h3, h4, h5, h6 {
color: <?php echo $tn_focus_text_color; ?>!important;
font-family: <?php echo $tn_focus_headline_font; ?>!important;
}

#comments-list li.alt, .home .entry-content  { background: <?php echo $tn_focus_com_alt_color; ?>!important; }


<?php if($tn_focus_link_color != "")  { ?>
#wrapper a { color: <?php echo $tn_focus_link_color; ?>; }
div.reply a, div.reply a:hover { color: #fff!important; background: <?php echo $tn_focus_link_color; ?>!important; }
#commentform .cinput, #commentform .cinput:hover { color: #fff!important; background: <?php echo $tn_focus_link_color; ?>!important; }
<?php } ?>


<?php if($tn_focus_link_hover_color != "")  { ?>
#wrapper a:hover { color: <?php echo $tn_focus_link_hover_color; ?>; }
<?php } ?>



<?php if($tn_focus_twitter_box_color != "")  { ?>
#twitter-box { background: <?php echo $tn_focus_twitter_box_color; ?> url(images/twitter.png) no-repeat 95% 95% !important; }
<?php } ?>


<?php if($tn_focus_twitter_box_text_color != "")  { ?>
#twitter_update_list li, #twitter-box h2 {
color: <?php echo $tn_focus_twitter_box_text_color; ?> !important;
}
<?php } ?>


<?php if($tn_focus_twitter_box_text_link_color != "")  { ?>
#wrapper #twitter_update_list li a  {
color: <?php echo $tn_focus_twitter_box_text_link_color; ?> !important;
}
<?php } ?>


<?php if($tn_focus_bg_color != "")  { ?>
.home .featured.post.p1 { border-bottom: 5px solid <?php echo $tn_focus_bg_color; ?>!important; }

.home .featured.post.p2 { border-left: 5px solid <?php echo $tn_focus_bg_color; ?>!important; border-bottom:5px solid <?php echo $tn_focus_bg_color; ?>!important; }

.home .featured.post.p3 {border-bottom:5px solid <?php echo $tn_focus_bg_color; ?>!important; }

.home .featured.post.p4 {border-left:5px solid <?php echo $tn_focus_bg_color; ?>!important; border-bottom:5px solid <?php echo $tn_focus_bg_color; ?>!important; }

.home .featured.post.p5 {border-bottom:5px solid <?php echo $tn_focus_bg_color; ?>!important; }

.home .featured.post.p6 {border-left:5px solid <?php echo $tn_focus_bg_color; ?>!important; border-bottom:5px solid <?php echo $tn_focus_bg_color; ?>!important; }

.home .featured.post.p7 {border-left:5px solid <?php echo $tn_focus_bg_color; ?>!important; ;border-bottom:5px solid <?php echo $tn_focus_bg_color; ?>!important; }

.home .featured.post.p8 {border-bottom:5px solid <?php echo $tn_focus_bg_color; ?>!important; }

.home .featured.post.p9 {border-left:5px solid <?php echo $tn_focus_bg_color; ?>!important; border-bottom:5px solid <?php echo $tn_focus_bg_color; ?>!important; }

.home .featured.post.p10 {border-left:5px solid <?php echo $tn_focus_bg_color; ?>!important; border-bottom:5px solid <?php echo $tn_focus_bg_color; ?>!important; }

<?php } ?>
