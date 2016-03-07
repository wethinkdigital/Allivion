<?php
	
get_header();

?>

<div class="container a2apad">
	<div class="row">
		<div class="col-md-9">

			<?php
	
				while(have_posts() ) : the_post(); ?>
				
				<div class="post-item" id="post-<?php echo $post->ID; ?>">
					<h3 class="purple"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<?php the_content(); ?>
					<a href="<?php the_permalink(); ?>" class="purple">Read more</a>
				</div>
				
				<?php endwhile; ?>



		</div>
		<div class="col-md-3" id="sidebar">
			<?php dynamic_sidebar('blog_sidebar'); ?>
		</div>
	</div>
</div>

<?php 
	
get_footer();

?>