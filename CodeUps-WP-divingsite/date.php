<?php get_header(); ?>
<section class="mv">
	<figure class="mv__img">
		<picture>
			<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/mv-blog.jpg" media="(min-width: 768px)" />
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/mv-blog-sp.jpg" alt="ファーストビュー画像" />
		</picture>
	</figure>
	<h2 class="mv__title"><?php echo get_the_archive_title(); ?></h2>
</section>
<?php get_template_part('common/breadcrumb') ?>


<div class="blog blog-layout">
	<div class="blog__inner inner">
		<div class="blog__container fish">
			<div class="blog__main">
				<ul class="blog__items blog-cards blog-cards--2col">
					<?php
						// 投稿があるかを確認する
						if (have_posts()) :
							// ループ開始
							while (have_posts()) : the_post(); ?>
					<!-- 投稿のループ開始 -->
					<li class="blog-card">
						<a href="<?php the_permalink(); ?>" class="blog-card__link">
							<figure class="blog-card__img">
								<?php if (has_post_thumbnail()) : ?>
								<!-- サムネイル画像がある場合 -->
								<?php the_post_thumbnail('full', ['alt' => esc_attr(get_the_title())]); ?>
								<?php else : ?>
								<!-- サムネイルがない場合のデフォルト画像 -->
								<img src="<?php echo esc_url(get_theme_file_uri('/assets/images/default.jpg')); ?>"
									alt="<?php esc_attr_e('Default Image', 'text-domain'); ?>" />
								<?php endif; ?>
							</figure>
							<div class="blog-card__body">
								<div class="blog-card__top">
									<!-- 投稿日時の表示 -->
									<time datetime="<?php echo esc_attr(get_the_time('c')); ?>" class="blog-card__date">
										<?php echo esc_html(get_the_date('Y.m/d')); ?>
									</time>
									<!-- 投稿タイトルの表示 -->
									<div class="blog-card__title"><?php the_title(); ?></div>
								</div>
								<!-- 投稿の抜粋を表示（20語まで） -->
								<div class="blog-card__text">
									<?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
								</div>
							</div>
						</a>
					</li>
					<!-- 投稿のループ終了 -->
					<?php endwhile; ?>
					<?php endif; ?>
				</ul>

				<!-- ページネーションの表示 -->
				<div class="blog__nav page-nav">
					<div class="page-nav__pager">
						<?php wp_pagenavi(); ?>
					</div>
				</div>
			</div>

			<?php get_sidebar(); ?>
			<!--blog__side終わり-->
		</div>
		<!--blog__container終わり-->
	</div>
</div>


<?php get_footer(); ?>
