<?php get_header()?>
<div class="centered-980">
<?php get_sidebar()?>
<div id="left">
	<?php while(have_posts()): the_post() ?>
		<h2><?php the_title()?></h2>
		<?php the_content(__('Continue Reading')); ?>
		
	<?php endwhile; ?>

</div>
</div>

<?php get_footer()?>
