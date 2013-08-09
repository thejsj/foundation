<?php get_header(); ?>	
<!-- PAGE WRAP BEGINS -->
<section class="page-wrap">	
	<div class="container">
		<div class="row-fluid">
			<div class="span8">
				<?php if(have_posts()) : ?>
					<?php while(have_posts()) : ?>
						<?php the_post(); ?> 
						<!-- POST CONTENT BEGINS -->
						<article class="post-content">
							<h2><?php the_title();?></h2>
							<?php the_content(); ?>
							<?php edit_post_link(); ?>
						</article>
						<!-- POST CONTENT ENDS -->
					<?php endwhile; ?>
					<nav class="post-nav">
						<?php next_post_link('%link', '&lsaquo; Newer Post'); ?>
						<?php previous_post_link('%link', 'Older Post &rsaquo;'); ?>
					</nav>				
				<?php endif;?>
				<?php comments_template(); ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<!-- PAGE WRAP ENDS -->
<?php get_footer(); ?>