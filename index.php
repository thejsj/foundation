<?php get_header(); ?>	
<!-- Page Wrap Begins -->
<section class="container">	
	<!-- Post List Begins -->
	<?php if(have_posts()) : ?>
		<?php while(have_posts()) : ?>
			<?php the_post(); ?> 						
			<article class="content list-content">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
				<?php the_excerpt(); ?>
			</article>
		<?php endwhile; ?>
		<nav class="post-list-nav">
			<?php pagination('&lsaquo; Newer Posts', 'Older Posts &rsaquo;'); ?>
		</nav>	
	<?php else : ?>
		<h2>Sorry!</h2>
		<p>No posts have been published just yet.</p>	
	<?php endif;?>
	<!-- Post List Ends -->
</section>
<?php get_footer(); ?>