<?php get_header()?>
<div class="home-featured">
	<div class="h-featured-txt-wrapp">
		<div class="h-featured-txt">
			<h1>Featured Big Tittle</h1>
			<h2>Featured Sub-tittle</h2>
			<div class="featured-exerp">
			This is the text for the featured space
			</div>
		</div>
	</div>
	<img src="<?php echo get_option('govi_feat_bg_image');?>" class="h-featured-bg-img" width="100%" height="300px"/>
</div>
<div class="centered-980">
<?php get_sidebar()?>
<div id="left">
	<?php while(have_posts()): the_post()?>
		<h2><a href="<?php the_permalink() ?>"><?php the_title()?></a></h2>
		<p>
			<a href="<?php echo get_the_author_link(false, $authordata-ID, $authordata->user_nicename); ?>"><?php the_author(); ?></a>
		</p>
		<?php the_content(__('Continue Reading'));?>
		
	<?php endwhile;?>
	<div class="clear"></div>
</div>
</div>
<?php get_footer()?>
 