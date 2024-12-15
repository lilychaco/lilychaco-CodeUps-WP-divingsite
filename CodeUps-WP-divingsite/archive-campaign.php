<?php get_header(); ?>
<section class="mv">
	<figure class="mv__img">
		<picture>
			<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/mv-campaign.jpg" media="(min-width: 768px)" />
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/mv-campaign-sp.jpg" alt="ファーストビュー画像" />
		</picture>
	</figure>
	<h2 class="mv__title">
		<?php echo get_the_archive_title(); ?>
	</h2>
</section>
<?php get_template_part('common/breadcrumb'); ?>

<div class="archive-campaign archive-campaign-layout">
	<div class="archive-campaign__inner inner">
		<!-- カテゴリリスト部分 -->
		<ul class="archive-campaign__category-list category-list fish">
			<li class="category-list__item">
				<!-- ALLカテゴリへのリンク（archive-campaign.phpに戻る） -->
				<a href="<?php echo esc_url(get_post_type_archive_link('campaign')); ?>"
					class="category-list__link <?php echo (!isset($_GET['term']) || $_GET['term'] == 'all') ? 'is-current' : ''; ?>">
					ALL
				</a>
			</li>
			<?php
					// 'campaign-category'タクソノミーの用語を取得
					$terms = get_terms(array(
							'taxonomy' => 'campaign-category',
							'hide_empty' => false,
					));
					?>
			<?php if (!empty($terms)) : ?>
			<?php foreach ($terms as $term) : ?>
			<li class="category-list__item">
				<!-- タクソノミーのリンクを作成 -->
				<a href="<?php echo esc_url(get_term_link($term)); ?>"
					class="category-list__link <?php echo (isset($_GET['term']) && $_GET['term'] == $term->slug) ? 'is-current' : ''; ?>">
					<?php echo esc_html($term->name); ?>
				</a>
			</li>
			<?php endforeach; ?>
			<?php endif; ?>
		</ul>

		<!-- 投稿リスト部分 -->
		<ul class="archive-campaign__content archive-campaign-cards">
			<?php
		// ループはそのまま利用可能
		if (have_posts()) : while (have_posts()) : the_post();
        // カスタムフィールドの値を取得
        $price_old = get_field('campaign-price_old');
        $price_new = get_field('campaign-price_new');
        $period = get_field('campaign-period');
   			 ?>

			<li class="archive-campaign-cards__item archive-campaign-card">
				<figure class="archive-campaign-card__img">
					<?php if (has_post_thumbnail()) : the_post_thumbnail('full', array('alt' => get_the_title())); else : ?>
					<img src="<?php echo get_theme_file_uri(); ?>/assets/images/campaign1.jpg" alt="キャンペーンの画像" />
					<?php endif; ?>
				</figure>
				<div class="archive-campaign-card__body">
					<div class="archive-campaign-card__top">
						<div class="archive-campaign-card__category">
							<?php
                    $terms = get_the_terms(get_the_ID(), 'campaign-category');
                    if (!empty($terms) && !is_wp_error($terms)) {
                        foreach ($terms as $term) {
                            echo '<span>' . esc_html($term->name) . '</span> ';
                        }
                    } else {
                        echo '<span>カテゴリなし</span>';
                    }
                    ?>
						</div>
						<div class="archive-campaign-card__title"><?php the_title(); ?></div>
					</div>
					<div class="archive-campaign-card__text">
						<p class="archive-campaign-card__price-info">
							全部コミコミ(お一人様)
						</p>
						<div class="archive-campaign-card__price-text">
							<p class="archive-campaign-card__price-old">
								<?php echo esc_html($price_old); ?>
							</p>
							<p class="archive-campaign-card__price-new">
								<?php echo esc_html($price_new); ?>
							</p>
						</div>
					</div>
					<div class="archive-campaign-card__subbody">
						<div class="archive-campaign-card__subtext">
							<?php the_excerpt(); ?>
						</div>
						<div class="archive-campaign-card__meta">
							<div class="archive-campaign-card__date"><?php echo esc_html($period); ?></div>
							<div class="archive-campaign-card__microcopy">
								ご予約・お問い合わせはコチラ
							</div>
							<div class="archive-campaign-card__button">
								<a href="<?php echo esc_url(home_url('/contact')); ?>" class="button">Contact us</a>
							</div>
						</div>
					</div>
				</div>
			</li>
			<?php endwhile; else: ?>
			<p>No campaigns found.</p>
			<?php endif; ?>
		</ul>


		<div class="archive-campaign__nav page-nav">
			<ul class="page-nav__pager">
				<?php wp_pagenavi(); ?>
			</ul>
		</div>

	</div>
</div>

<?php get_footer(); ?>
