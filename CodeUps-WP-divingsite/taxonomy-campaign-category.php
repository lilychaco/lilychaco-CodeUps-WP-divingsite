<?php get_header(); ?>
<section class="mv">
	<figure class="mv__img">
		<picture>
			<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/mv-campaign.jpg" media="(min-width: 768px)" />
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/mv-campaign-sp.jpg" alt="ファーストビュー画像" />
		</picture>
	</figure>

	<h2 class="mv__title"><?php echo get_the_archive_title(); ?></h2>
</section>

<?php get_template_part('common/breadcrumb'); ?>

<div class="archive-campaign archive-campaign-layout">
	<div class="archive-campaign__inner inner">
		<!-- カテゴリリスト部分 -->
		<ul class="archive-campaign__category-list category-list fish">
			<!-- ALL のリンク -->
			<li class="category-list__item">
				<a href="<?php echo esc_url(get_post_type_archive_link('campaign')); ?>"
					class="category-list__link <?php echo (is_post_type_archive('campaign') || is_tax('campaign-category')) ? '' : 'is-current'; ?>">
					ALL
				</a>
			</li>
			<?php
    // 'campaign-category'タクソノミーの用語を取得
    $taxonomy = 'campaign-category'; // タクソノミー名を変数に格納
    $terms = get_terms(array(
        'taxonomy' => $taxonomy,
        'hide_empty' => false,
    ));

    if (!empty($terms)) : ?>
			<?php foreach ($terms as $term) : ?>
			<li class="category-list__item">
				<a href="<?php echo esc_url(get_term_link($term)); ?>"
					class="category-list__link <?php echo (is_tax($taxonomy, $term->slug)) ? 'is-current' : ''; ?>">
					<?php echo esc_html($term->name); ?>
				</a>
			</li>
			<?php endforeach; ?>
			<?php endif; ?>
		</ul>

		<!-- 投稿リスト部分 -->

		<?php if (have_posts()) : ?>
		<ul class="archive-campaign__content archive-campaign-cards">
			<?php while (have_posts()) : the_post();
                    // ACFカスタムフィールドを取得
                    $price_old = get_field('campaign-price_old') ?: '設定なし';
                    $price_new = get_field('campaign-price_new') ?: '設定なし';
                    $period = get_field('campaign-period') ?: '期間未定';
                ?>
			<li class="archive-campaign-cards__item archive-campaign-card">
				<figure class="archive-campaign-card__img">
					<?php
						// アイキャッチ画像のHTMLを取得して変数に格納
						$thumbnail = get_the_post_thumbnail(
								get_the_ID(),
								'full',
								array('alt' => esc_attr(get_the_title() . 'の画像'))
						);
						?>
					<?php if ($thumbnail) : ?>
					<!-- アイキャッチ画像が設定されている場合 -->
					<?php echo $thumbnail; ?>
					<?php else : ?>
					<!-- アイキャッチ画像がない場合、デフォルト画像を表示 -->
					<img src="<?php echo esc_url(get_theme_file_uri('assets/images/campaign1.jpg')); ?>" alt="キャンペーンの画像" />
					<?php endif; ?>
				</figure>

				<div class="archive-campaign-card__body">
					<div class="archive-campaign-card__top">
						<div class="archive-campaign-card__category">
							<?php single_term_title(); // タクソノミー名を表示 ?>
						</div>
						<div class="archive-campaign-card__title"><?php the_title(); ?></div>
					</div>
					<div class="archive-campaign-card__text">
						<p class="archive-campaign-card__price-info">
							全部コミコミ(お一人様)
						</p>
						<div class="archive-campaign-card__price-text">
							<?php if (!empty($price_old)) : ?>
							<p class="archive-campaign-card__price-old">
								<?php echo esc_html($price_old); ?>
							</p>
							<?php endif; ?>
							<?php if (!empty($price_new)) : ?>
							<p class="archive-campaign-card__price-new">
								<?php echo esc_html($price_new); ?>
							</p>
							<?php endif; ?>
						</div>
					</div>
					<div class="archive-campaign-card__subbody">
						<div class="archive-campaign-card__subtext">
							<?php
									// 本文を取得し、HTMLタグを除去、86文字に制限して表示
									$content = strip_tags( get_the_content() ); // HTMLタグを除去
									$trimmed_content = mb_strlen( $content, 'UTF-8' ) > 164
									? mb_substr( $content, 0, 164, 'UTF-8' ) . ''
									: $content; // 86文字に切り詰め、省略記号を追加
									echo esc_html( $trimmed_content ); // エスケープして表示
									?>
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
			<?php endwhile; ?>
			<?php endif; ?>
		</ul>


		<!-- ページネーション -->
		<div class="archive-campaign__nav page-nav">
			<ul class="page-nav__pager">
				<?php wp_pagenavi(); ?>
			</ul>
		</div>

	</div>
</div>


<?php get_footer(); ?>
