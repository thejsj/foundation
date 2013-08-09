<?php get_header(); ?>	
<!-- PAGE WRAP BEGINS -->
<section class="page-wrap">	
	<div class="container">
		<div class="row-fluid">
			<div class="span8">
				<h1>INDEX</h1>
				<?php if(have_posts()) : ?>
					<!-- POST LIST BEGINS -->
					<?php while(have_posts()) : ?>
						<?php the_post(); ?> 						
						<article class="post-brief">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
							<?php the_excerpt(); ?>
						</article>
					<?php endwhile; ?>
					<!-- POST LIST ENDS -->
					<nav class="post-list-nav">
						<?php pagination('&lsaquo; Newer Posts', 'Older Posts &rsaquo;'); ?>
					</nav>	
				<?php else : ?>
					<h2>Sorry!</h2>
					<p>No posts have been published just yet.</p>	
				<?php endif;?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<!-- PAGE WRAP ENDS -->
<?php get_footer(); ?>