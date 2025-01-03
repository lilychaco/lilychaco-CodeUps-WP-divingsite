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
						<!-- 投稿日時の表示 -->
						<time datetime="<?php echo esc_attr(get_the_time('c')); ?>" class="blog-card__date">
							<?php echo esc_html(get_the_date('Y.m/d')); ?>
						</time>
						<div class="single-blog__title"><?php the_title(); ?></div>
						<figure class="single-blog__eyecatch">
							<?php
									// アイキャッチ画像のHTMLを取得して変数に格納
									$thumbnail = get_the_post_thumbnail(
											get_the_ID(),
											'full',
											array('alt' => esc_attr(get_the_title()))
									);
									?>
							<?php if ($thumbnail) : ?>
							<!-- アイキャッチ画像が設定されている場合 -->
							<?php echo $thumbnail; ?>
							<?php else : ?>
							<!-- アイキャッチ画像がない場合、デフォルト画像を表示 -->
							<img src="<?php echo esc_url(get_theme_file_uri('assets/images/default.jpg')); ?>"
								alt="<?php echo esc_attr__('Default Image', 'text-domain'); ?>" />
							<?php endif; ?>
						</figure>
					</div>

					<div class="single-blog__content">
						<?php the_content(); ?>
					</div>
				</div>


				<?php
							$prev = get_previous_post();
							$next = get_next_post();
							?>
				<div class="single-blog__nav page-nav">
					<div class="page-nav__arrows">
						<?php if($prev): ?>
						<div class="page-nav__arrow">
							<a href="<?php echo get_permalink( $prev->ID ); ?>" class="previouspostlink">＜</a>
						</div>
						<?php endif; ?>
						<?php if($next): ?>
						<div class="page-nav__arrow">
							<a href="<?php echo get_permalink( $next->ID ); ?>" class="nextpostlink">＞</a>
						</div>
						<?php endif; ?>
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
