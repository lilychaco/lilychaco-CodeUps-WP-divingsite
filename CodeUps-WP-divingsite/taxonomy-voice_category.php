<?php get_header(); ?>
<section class="mv">
	<figure class="mv__img">
		<picture>
			<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/mv-voice.jpg" media="(min-width: 768px)" />
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/mv-voice-sp.jpg" alt="ファーストビュー画像" />
		</picture>
	</figure>
	<h2 class="mv__title">
		Voice
	</h2>
</section>
<?php get_template_part('common/breadcrumb'); ?>

<div class="archive-voice archive-voice-layout">
	<div class="archive-voice__inner inner">
		<div class="archive-voice__container fish">

			<!-- カテゴリリスト部分 -->
			<ul class="archive-voice__category-list category-list">
				<!-- ALL のリンク -->
				<li class="category-list__item">
					<a href="<?php echo esc_url(get_post_type_archive_link('voice')); ?>"
						class="category-list__link <?php echo (is_post_type_archive('voice') || is_tax('voice_category')) ? '' : 'is-current'; ?>">
						ALL
					</a>
				</li>

				<?php
    // 'campaign-category'タクソノミーの用語を取得
    $terms = get_terms(array(
        'taxonomy' => 'voice_category',
        'hide_empty' => false,
    ));

    if (!empty($terms)) :
        foreach ($terms as $term) :
    ?>
				<li class="category-list__item">
					<a href="<?php echo esc_url(get_term_link($term)); ?>"
						class="category-list__link <?php echo (is_tax('voice_category', $term->slug)) ? 'is-current' : ''; ?>">
						<?php echo esc_html($term->name); ?>
					</a>
				</li>
				<?php endforeach; ?>
				<?php endif; ?>
			</ul>

			<!-- 投稿リスト部分 -->
			<ul class="archive-voice__content voice-cards">
				<?php
			// 現在のターム情報を取得
			$current_term = get_queried_object();

			// クエリの設定
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

			$args = array(
				'post_type' => 'voice', // カスタム投稿タイプ
				'tax_query' => array(
					array(
						'taxonomy' => 'voice_category', // タクソノミー名
						'field' => 'slug', // タームのフィールド（スラッグを使用）
						'terms' => $current_term->slug, // 現在のタームのスラッグ
					),
				),
				'posts_per_page' => 4, // 1ページあたりの投稿数
				'paged' => $paged, // ページ番号
			);

			$query = new WP_Query($args);
			/// ループ
			if ($query->have_posts()) :
				while ($query->have_posts()) : $query->the_post();
    ?>
				<li class="voice-cards__item voice-card">
					<a href="#" class="voice-card__link">
						<div class="voice-card__body">
							<div class="voice-card__top">
								<div class="voice-card__meta">
									<div class="voice-card__tag">
										<?php
                            $voice_tags = get_the_terms( get_the_ID(), 'voice_tag' );
                            if ( ! empty( $voice_tags ) && ! is_wp_error( $voice_tags ) ) {
                                foreach( $voice_tags as $tag ) {
                                    echo '<span>' . esc_html( $tag->name ) . '</span> ';
                                }
                            } else {
                                echo '<span>タグなし</span>';
                            }
                            ?>
									</div>
									<div class="voice-card__category">
										<?php
                                $terms = get_the_terms( get_the_ID(), 'voice_category' );
                                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                                    foreach( $terms as $term ) {
                                        echo '<span>' . esc_html( $term->name ) . '</span> ';
                                    }
                                } else {
                                    echo '<span>カテゴリなし</span>';
                                }
                                ?>
									</div>
								</div>
								<div class="voice-card__title">
									<?php the_title(); ?>
								</div>
							</div>
							<figure class="voice-card__img colorbox">
								<?php
                    // アイキャッチ画像を取得して変数に格納
                    $thumbnail = get_the_post_thumbnail(get_the_ID(), 'full', array('alt' => get_the_title()));
										// アイキャッチ画像がある場合は表示し、ない場合はデフォルト画像を表示
								if ( $thumbnail ) {
                        echo $thumbnail;
                    } else {
                        // デフォルトの画像のalt属性を投稿タイトルに変更
                        echo '<img src="' . esc_url( get_theme_file_uri() . '/assets/images/voice01.jpg' ) . '" alt="' . esc_attr( get_the_title() ) . 'の画像" />';
                    }
                    ?>
							</figure>
						</div>
						<div class="voice-card__text">
							<?php the_excerpt(); // 抜粋を表示 ?>
						</div>
					</a>
				</li>
				<?php endwhile; endif; ?>
			</ul>
		</div>


		<!-- ページネーション -->
		<div class="archive-voice__nav page-nav">
			<ul class="page-nav__pager">
				<?php
				// ページナビの表示
				if (function_exists('wp_pagenavi')) {
					wp_pagenavi(array('query' => $query));
				}
				?>
			</ul>
		</div>
		<?php wp_reset_postdata(); // クエリのリセット ?>
	</div>
</div>





<div class="contact-wrapper">
	<?php get_template_part('common/contact'); ?>
</div>
<?php get_footer(); ?>
