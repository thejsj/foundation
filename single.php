<?php get_header(); ?>	

<section class="container">	

	<!-- POST CONTENT BEGINS -->
	<?php if(have_posts()) : ?>
		<?php while(have_posts()) : ?>
			<?php the_post(); ?> 
			
			<article class="content post-content">
				<h2><?php the_title();?></h2>
				<?php the_content(); ?>
			</article>
			
		<?php endwhile; ?>
		<nav class="post-nav">
			<?php next_post_link('%link', '&lsaquo; Newer Post'); ?>
			<?php previous_post_link('%link', 'Older Post &rsaquo;'); ?>
		</nav>				
	<?php endif;?>
	<?php comments_template(); ?>
	<!-- POST CONTENT ENDS -->

</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>