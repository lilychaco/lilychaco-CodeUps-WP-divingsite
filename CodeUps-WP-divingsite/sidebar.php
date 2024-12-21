			<aside class="side">
				<section class="side-popular">
					<?php
							// 人気記事を取得するためのクエリを設定します。
							$popular_posts = new WP_Query(array(
									'posts_per_page' => 3, // 表示する投稿数
									'meta_key' => 'post_views_count', // カスタムフィールドのキー（人気度を示す）
									'orderby' => 'meta_value_num', // カスタムフィールドの値で並べ替え
									'order' => 'DESC', // 降順で並べ替え
									'post_type' => 'post' // 投稿タイプ
							));
							// クエリが成功し、投稿がある場合
							if ($popular_posts->have_posts()) : ?>
					<h2 class="side-popular__heading side-heading">人気記事</h2>
					<ul class="side-popular__cards">
						<?php while ($popular_posts->have_posts()) : $popular_posts->the_post(); ?>
						<li class="side-popular__card popular-card">
							<!-- 投稿のURLを取得し、カード全体をリンクとして包む -->
							<a href="<?php echo esc_url(get_permalink()); ?>" class="popular-card__link">
								<div class="popular-card__img">
									<?php
											// アイキャッチ画像のHTMLを取得して変数に格納
											$thumbnail = get_the_post_thumbnail(
													get_the_ID(),
													'thumbnail',
													array('alt' => esc_attr(get_the_title() . 'のサムネイル画像'))
											);
											?>
									<?php if ($thumbnail) : ?>
									<!-- アイキャッチ画像がある場合 -->
									<?php echo $thumbnail; ?>
									<?php else : ?>
									<!-- アイキャッチ画像がない場合、デフォルト画像を表示 -->
									<img src="<?php echo esc_url(get_theme_file_uri('assets/images/default.jpg')); ?>" alt="デフォルト画像" />
									<?php endif; ?>
								</div>
								<div class="popular-card__body">
									<!-- 投稿日時の表示 -->
									<time datetime="<?php echo esc_attr(get_the_time('c')); ?>" class="blog-card__date">
										<?php echo esc_html(get_the_date('Y.m/d')); ?>
									</time>
									<p class="popular-card__title"><?php the_title(); ?></p>
								</div>
							</a>
						</li>
						<?php endwhile; ?>
					</ul>
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>
				</section>

				<section class="side-voice">
					<?php
							// 最新の口コミを取得
							$latest_voice_args = array(
								'post_type' => 'voice', // カスタム投稿タイプが 'voice' であることを指定
								'posts_per_page' => 1,  // 1件のみ取得
								'orderby' => 'date',    // 日付順で取得
								'order' => 'DESC'       // 降順で取得
							);

							$latest_voice_query = new WP_Query($latest_voice_args);

							if ($latest_voice_query->have_posts()) : ?>
					<h2 class="side-voice__heading side-heading">口コミ</h2>

					<div class="side-voice__content">
						<?php while ($latest_voice_query->have_posts()) : $latest_voice_query->the_post(); ?>
						<div class="side-voice__item">
							<div class="side-voice__img">
								<img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>"
									alt="<?php echo esc_attr(get_the_title()); ?>" />
							</div>
							<p class="side-voice__caption">
								<?php
										// 年齢の値を取得
										$age = get_field('tag_age'); // ACFのフィールド名 "tag_age" を指定
										// 性別の値を取得
										$sex = get_field('tag_sex'); // ACFのフィールド名 "tag_sex" を指定

										// 年齢と性別が両方設定されている場合にHTMLを出力
										if ($age && $sex): ?>
								<?php echo esc_html($age); // 年齢を表示 ?>
								<span>
									<span>&#40;<?php echo esc_html($sex); // 性別を表示 ?>&#41;</span>
								</span>
								<?php endif; ?>
							</p>
							<div class="side-voice__title">
								<?php the_title(); ?>
							</div>
						</div>
						<?php endwhile; ?>

						<div class="side-voice__button">
							<a href="<?php echo esc_url(home_url('/voice')); ?>" class="button"> View more</a>
						</div>
					</div>
					<?php endif; ?>
					<?php  wp_reset_postdata(); ?>
				</section>

				<section class="side-campaign">
					<?php
							// 最新のキャンペーン情報を取得
							$latest_campaign_args = array(
								'post_type' => 'campaign', // カスタム投稿タイプが 'campaign' であることを指定
								'posts_per_page' => 2,  // 2件のみ取
								'orderby' => 'date',    // 日付順で取得
								'order' => 'DESC'       // 降順で取得
							);

							$latest_campaign_query = new WP_Query($latest_campaign_args);

							if ($latest_campaign_query->have_posts()) : ?>
					<h2 class="side-campaign__heading side-heading">キャンペーン</h2>
					<ul class="side-campaign__items">
						<?php while ($latest_campaign_query->have_posts()) : $latest_campaign_query->the_post(); ?>
						<?php
								// 現在の投稿のカスタムフィールドを取得
								$price_old = get_field('campaign-price_old');
								$price_new = get_field('campaign-price_new');
								$period = get_field('campaign-period');
								?>
						<li class="side-campaign__item">
							<figure class="side-campaign__img">
								<?php
								// サムネイルのURLを変数に格納
								$thumbnail = has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'full') : get_theme_file_uri('/assets/images/campaign1.jpg');
								// altテキストを設定
								$alt_text = has_post_thumbnail() ? get_the_title() : 'キャンペーンの画像';
								?>
								<img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr($alt_text); ?>" />
							</figure>
							<div class="side-campaign__body">
								<div class="side-campaign__top">
									<div class="side-campaign__title"><?php the_title(); ?>
									</div>
								</div>
								<div class="side-campaign__text">
									<p class="side-campaign__price-info">
										全部コミコミ(お一人様)
									</p>
									<div class="side-campaign__price">
										<?php if (!empty($price_old)) : ?>
										<p class="side-campaign__price-before"><?php echo esc_html($price_old); ?></p>
										<?php endif; ?>
										<?php if (!empty($price_new)) : ?>
										<p class="side-campaign__price-after"><?php echo esc_html($price_new); ?></p>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</li>
						<?php endwhile; ?>
					</ul>
					<div class="side-campaign__button">
						<a href="<?php echo esc_url(home_url('/campaign')); ?>" class="button">View&nbsp;more</a>
					</div>
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>
				</section>

				<section class="side-archive">
					<?php
						global $wpdb;

						// 投稿データを年と月ごとに取得する関数
						function get_yearly_monthly_archive_data() {
								global $wpdb;

								// 年月ごとに投稿データを取得
								$results = $wpdb->get_results("
										SELECT DISTINCT YEAR(post_date) AS year, MONTH(post_date) AS month, COUNT(ID) as post_count
										FROM {$wpdb->posts}
										WHERE post_type = 'post' AND post_status = 'publish'
										GROUP BY year, month
										ORDER BY year DESC, month DESC
								");

								// データを配列に整形
								$years = [];
								foreach ($results as $result) {
										$years[$result->year][] = [
												'month' => $result->month,
												'post_count' => $result->post_count,
												'url' => get_month_link($result->year, $result->month),
													];
											}
											return $years;
									}

									// データ取得
									$archives = get_yearly_monthly_archive_data();

									// 投稿がある場合のみアーカイブセクションを表示
									if (!empty($archives)) :
									?>

					<h2 class="side-archive__heading side-heading">アーカイブ</h2>
					<div class="side-archive__contents">
						<?php foreach ($archives as $year => $months): ?>
						<div class="side-archive__year" data-year="<?php echo esc_html($year); ?>">
							<!-- 年ごとのトグル -->
							<div class="side-archive__year-toggle js-year-toggle">
								<?php echo esc_html($year); ?>
							</div>
							<!-- 月ごとのリスト -->
							<div class="side-archive__month-list">
								<?php foreach ($months as $month): ?>
								<div class="side-archive__month">
									<a href="<?php echo esc_url($month['url']); ?>" class="side-archive__link">
										<?php echo esc_html($month['month']); ?>月 (<?php echo esc_html($month['post_count']); ?>件)
									</a>
								</div>
								<?php endforeach; ?>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
					<?php endif; ?>
				</section>

			</aside>
