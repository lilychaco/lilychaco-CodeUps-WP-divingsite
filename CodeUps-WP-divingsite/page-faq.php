<?php get_header(); ?>
<section class="mv">
	<figure class="mv__img">
		<picture>
			<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/mv-faq.jpg" media="(min-width: 768px)" />
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/mv-faq-sp.jpg" alt="ファーストビュー画像" />
		</picture>
	</figure>

	<h2 class="mv__title">FAQ</h2>
</section>
<?php get_template_part('common/breadcrumb') ?>

<div class="page-faq page-faq-layout">
	<div class="page-faq__inner inner">
		<div class="accordion fish">
			<?php
    // Smart Custom Fields (SCF) を使って、'faq' グループを取得します。
    $faq = SCF::get('faq');

    // 各アイテムを表示する関数を定義します。
    function display_accordion_item($question, $answer) {
        ?>
			<div class="accordion__item accordion-card">
				<div class="accordion-card__top js-accordion-top is-open">
					<h3 class="accordion-card__title">
						<?php echo nl2br(esc_html($question)); ?></h3>
					<div class="accordion-card__icon">
						<div class="accordion-card__bar1"></div>
						<div class="accordion-card__bar2"></div>
					</div>
				</div>
				<div class="accordion-card__body">
					<?php if (!empty($answer)) { ?>
					<p class="accordion-card__content"><?php echo nl2br(esc_html($answer)); ?></p>
					<?php } ?>
				</div>
			</div>
			<?php } ?>
			<?php
			// 取得したデータが空でないかをチェックします。
			if (!empty($faq)) {
			// 取得した繰り返しフィールドの各アイテムをループで処理します。
			foreach ($faq as $item) {
			// 各アイテムの 'question' フィールドの値を取得し、表示します。
			if (!empty($item['question'])) {
			display_accordion_item($item['question'], $item['answer'] ?? '');
			}
			}
			} else {
			// 繰り返しフィールドが空の場合のメッセージ
			display_accordion_item('よくある質問がありません。', '');
			}
			?>
		</div>
	</div>
</div>


<?php get_footer(); ?>
