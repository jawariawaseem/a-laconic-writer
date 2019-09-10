<?php get_header();
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );
while(have_posts()){
	the_post();
	?>

	<h2 class="page-heading"><?php the_title()?></h2>
	<div id="post-container">
		<section id="blogpost">
			<div class="card">
				<div class="card-meta-blogpost">
					Posted by <?php the_author(); ?> on <?php the_time('F j, Y')?>
					<?php if(get_post_type() == 'post'){ ?>
						in <a href=""><?php echo get_the_category_list(',') ?></a>
					<?php } ?>
				</div>
				<div class="card-image">
					<img src="<?php echo get_the_post_thumbnail_url(get_the_ID())?>" alt="Card Image">
				</div>
				<div class="card-description">
					<?php the_content() ?>
				</div>
			</div>

			<div id="comments-section">
				<?php
				$fields =  array(

					'author' =>
					'<input placeholder="Name" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
					'" size="30"' . $aria_req . ' />',

					'email' =>
					'<input placeholder="Email" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
					'" size="30"' . $aria_req . ' />',
				);
				$args = array(
					'title_reply' => 'Share Your Thoughts',
					'fields' => $fields,
					'comment_field' => '<input placeholder="Your Comment" id="comment" name="comment" aria-required="true">' .'</>',
					'comments_notes' => '<p class="comment-notes">Your email address will not be published. All fields are required.</p>',
					'comment_notes_before' => '<p id="required" class="form-allowed-tags hidden">* Required fields!</p>'
				);
				// ob_start(); 
				// comment_form($args, $post->ID);
				// $form = ob_get_clean(); 
				// $form = str_replace('class="comment-form"','class="comment-form my-class"', $form);
				// echo str_replace('id="submit"','id="comment-submit" class="btn btn-warning"', $form);
				comment_form($args);
				$comments_number = get_comments_number();
				if($comments_number != 0){
					?>
					<div class="comments">
						<h3>What others say</h3>
						<ol class="all-comments">
							<?php 
							$comments = get_comments(array(
								'post_id' => $post->ID,
								'status' => 'approve'
							));
							wp_list_comments(array(
								'per_page' => 3,
								$comments
							));
							?>
						</ol>
					</div>
					<?php
				}
				?>
			</div>
		</section>
	<?php } ?>
	<aside id="sidebar">
		<?php
		dynamic_sidebar('main_sidebar');
		?>
	</aside>
</div>
<?php get_footer(); ?>