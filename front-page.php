
<?php get_header(); ?>
<div id="banner">
	<h1>A Laconic Writer</h1>
	<h3>Mifra writes...</h3>
</div>
<main>
	<a href="<?php echo site_url('/blog'); ?>">
		<h2 class="section-heading">All Blogs</h2>
	</a>
	<section>
		<?php
		$args = array(
			'post_type'=> 'post',
			'posts_per_page' => 2
		);
		$blogposts = new WP_Query($args);
		while($blogposts->have_posts()){
			$blogposts->the_post();
			?>
			<div class="card">
				<div class="card-image">
					<a href="<?php echo the_permalink(); ?>">
						<img class="card-img" src="<?php echo get_the_post_thumbnail_url(get_the_ID())?>" alt="Card Image">
					</a>
				</div>
				<div class="card-description">
					<a href="<?php echo the_permalink()?>">
						<h3><?php the_title()?></h3>
					</a>
					<p>
						<?php echo wp_trim_words(get_the_excerpt(), 20)?>
					</p>
					<a href="<?php echo the_permalink()?>" class="btn-readmore">Read more</a>
				</div>
			</div>
			<?php 
		}
		wp_reset_query() ?>
	</section>
	<h2 class="section-heading">Gallery</h2>
	<section>
		<?php
		$args = array(
			'post_type'=> 'gallery',
			'posts_per_page' => 2
		);
		$gallery = new WP_Query($args);
		while($gallery->have_posts()){
			$gallery->the_post();
			?>
			<div class="card">
				<div class="card-image">
					<a href="<?php echo the_permalink(); ?>">
						<img class="card-img" src="<?php echo get_the_post_thumbnail_url(get_the_ID())?>" alt="Card Image">
					</a>
				</div>
				<div class="card-description">
					<a href="<?php echo the_permalink()?>">
						<h3><?php the_title()?></h3>
					</a>
					<p>
						<?php echo wp_trim_words(get_the_excerpt(), 20)?>
					</p>
					<a href="<?php echo the_permalink()?>" class="btn-readmore">Read more</a>
				</div>
			</div>
			<?php 
		}
		wp_reset_query() ?>
	</section>
	<?php get_footer(); ?>