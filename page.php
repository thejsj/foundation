<?php get_header(); ?>        
<!-- Page Wrap Begins -->
<section class="container">        
        <!-- Page Content Begins -->
        <?php if(have_posts()) : ?>
                <?php while(have_posts()) : ?>
                        <?php the_post(); ?> 
                        <section class="content page-content">
                                <h2><?php the_title();?></h2>
                                <?php the_content(); ?>
                        </section>
                <?php endwhile; ?>
        <?php endif;?>
        <!-- Page Content Ends -->
</section>
<?php get_footer(); ?>