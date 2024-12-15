<?php get_header(); ?>
<section class="mv">
	<figure class="mv__img">
		<picture>
			<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/mv-blog.jpg" media="(min-width: 768px)" />
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/mv-blog-sp.jpg" alt="ファーストビュー画像" />
		</picture>
	</figure>

	<h2 class="mv__title">blog</h2>
</section>
<?php get_template_part('common/breadcrumb') ?>

<div class="blog blog-layout">
	<div class="blog__inner inner">
		<div class="blog__container fish">
			<div class="blog__main single-blog">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<div class="single-blog__post">
					<div class="single-blog__top">
						<time datetime="<?php echo get_the_date('Y-m-d'); ?>"
							class="single-blog__date"><?php echo get_the_date(); ?></time>
						<div class="single-blog__title"><?php the_title(); ?></div>
						<figure class="single-blog__eyecatch">
							<?php if (has_post_thumbnail()) : ?>
							<?php the_post_thumbnail('full', ['alt' => esc_attr(get_the_title())]); ?> <?php else : ?> <img
								src="<?php echo esc_url(get_theme_file_uri('/assets/images/default.jpg')); ?>"
								alt="<?php esc_attr_e('Default Image', 'text-domain'); ?>" />
							<?php endif; ?>
						</figure>
					</div>

					<div class="single-blog__content">
						<?php the_content(); ?>
					</div>
				</div>

				<div class="single-blog__nav page-nav">
					<div class="page-nav__arrows">
						<?php
							$prev = get_previous_post();
							$next = get_next_post();
							?>
						<div class="page-nav__arrow">
							<?php if($prev): ?>
							<a href="<?php echo get_permalink( $prev->ID ); ?>" class="previouspostlink">＜</a>
							<?php endif; ?>
						</div>
						<div class="page-nav__arrow">
							<?php if($next): ?>
							<a href="<?php echo get_permalink( $next->ID ); ?>" class="nextpostlink">＞</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<?php endwhile; endif; ?>
			</div>
			<?php get_sidebar(); ?>
			<!--blog__side終わり-->
		</div>
	</div>
</div>

<!--blog終わり-->

<?php get_footer(); ?>
