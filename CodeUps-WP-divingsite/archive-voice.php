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
				<li class="category-list__item">
					<!-- ALLカテゴリへのリンク（archive-campaign.phpに戻る） -->
					<a href="<?php echo esc_url(get_post_type_archive_link('voice')); ?>"
						class="category-list__link <?php echo (!isset($_GET['term']) || $_GET['term'] == 'all') ? 'is-current' : ''; ?>">
						ALL
					</a>
				</li>

				<?php
					// 'voice_category'タクソノミーの用語を取得
					$terms = get_terms(array(
							'taxonomy' => 'voice_category',
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
			<ul class="archive-voice__content voice-cards">
				<?php
		// ループはそのまま利用可能
		if (have_posts()) : while (have_posts()) : the_post();
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


		<div class="archive-campaign__nav page-nav">
			<ul class="page-nav__pager">
				<?php wp_pagenavi(); ?>
			</ul>
		</div>
	</div>
</div>





<div class="contact-wrapper">
	<?php get_template_part('common/contact'); ?>
</div>
<?php get_footer(); ?>
