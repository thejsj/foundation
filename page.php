<?php get_header(); ?>	
<!-- PAGE WRAP BEGINS -->
<section class="page-wrap">	
	<div class="container">
		<div class="row-fluid">
			<div class="span8">
				<?php if(have_posts()) : ?>
					<?php while(have_posts()) : ?>
						<?php the_post(); ?> 
						<!-- PAGE CONTENT BEGINS -->
						<section class="page-content">
							<h2><?php the_title();?></h2>
							<?php the_content(); ?>
							<?php edit_post_link(); ?>
						</section>
						<!-- PAGE CONTENT ENDS -->
					<?php endwhile; ?>
				<?php endif;?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<!-- PAGE WRAP ENDS -->
<?php get_footer(); ?>