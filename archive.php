<?php get_header(); ?>	
<!-- Page Wrap Begins -->
<section class="container">	
	<!-- Archive Page -->
	<?php if(have_posts()) : ?>
		<?php if(is_category()) { ?>
			<h2>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
		<?php } elseif( is_tag() ) { ?>
			<h2>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
		<?php } elseif (is_day()) { ?>
			<h2>Archive for <?php the_time('F jS, Y'); ?></h2>
		<?php  } elseif (is_month()) { ?>
			<h2>Archive for <?php the_time('F, Y'); ?></h2>
		<?php } elseif (is_year()) { ?>
			<h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>
		<?php } elseif (is_author()) { ?>
			<h2 class="pagetitle">Author Archive</h2>
		<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<h2 class="pagetitle">Blog Archives</h2>
		<?php } ?>									
		<!-- Post List Begins -->
		<?php while(have_posts()) : ?>
			<?php the_post(); ?> 						
			<article class="content list-content">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
				<?php the_excerpt(); ?>
			</article>
		<?php endwhile; ?>
		<!-- Post List Ends -->
		<nav class="post-list-nav">
			<?php pagination('&lsaquo; Newer Posts', 'Older Posts &rsaquo;'); ?>
		</nav>
	<?php else : ?>
		<h2>Sorry!</h2>
		<p>No posts have been published just yet.</p>	
	<?php endif;?>
</section>
<?php get_footer(); ?>