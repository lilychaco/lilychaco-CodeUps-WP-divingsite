<?php get_header(); ?>
<section class="mv">
	<figure class="mv__img">
		<picture>
			<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/mv-price.jpg" media="(min-width: 768px)" />
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/mv-price-sp.jpg" alt="ファーストビュー画像" />
		</picture>
	</figure>
	<h2 class="mv__title">price</h2>
</section>

<?php get_template_part('common/breadcrumb') ?>

<div class="page-price page-price-layout">
	<div class="page-price__inner inner">
		<div class="page-price__item page-price-list fish">
			<div class="page-price-list__title">
				<div class="page-price-list__heading">
					<div class="page-price-list__icon">
						<img src="<?php echo get_theme_file_uri(); ?>/assets/images/icon01.png" alt="" />
					</div>
					<p>ライセンス講習</p>
				</div>
			</div>
			<ul class="page-price-list__items">
				<?php
				// Smart Custom Fields (SCF) を使って、'license_pricelist' グループを取得します。
				$license_pricelist = SCF::get('license_pricelist');

				// 取得したデータが空でないかをチェックします。
				if (!empty($license_pricelist)) {
        // 取得した繰り返しフィールドの各アイテムをループで処理します。
        foreach ($license_pricelist as $item) {
            // 各アイテムの 'license_name' フィールドの値を取得します。
            if (!empty($item['license_kinds'])) {
                // 'license_name' の値を安全に出力します。
                echo '<li class="page-price-list__item">';
                echo '<p class="page-price-list__name">' . nl2br(esc_html($item['license_kinds'])) . '</p>';
                // 仮に値段のフィールドがある場合は以下のように出力します（例として 'price' フィールドを仮定）
                if (!empty($item['license_price'])) {
                    echo '<p class="page-price-list__number">' . esc_html($item['license_price']). '</p>';
                }
										echo '</li>';
								}
						}
					} else {
							// 繰り返しフィールドが空の場合のメッセージ
							echo '<li class="page-price-list__item">';
							echo '<p class="page-price-list__name">ライセンス情報がありません。</p>';
							echo '</li>';
					}
					?>
			</ul>

		</div>
		<div class="page-price__item page-price-list">
			<div class="page-price-list__title">
				<div class="page-price-list__heading">
					<div class="page-price-list__icon">
						<img src="<?php echo get_theme_file_uri(); ?>/assets/images/icon01.png" alt="" />
					</div>
					<p>体験ダイビング</p>
				</div>
			</div>
			<ul class="page-price-list__items">
				<?php
				// Smart Custom Fields (SCF) を使って、'experience_pricelist' グループを取得します。
				$experience_pricelist = SCF::get('experience_pricelist');

				// 取得したデータが空でないかをチェックします。
				if (!empty($experience_pricelist)) {
        // 取得した繰り返しフィールドの各アイテムをループで処理します。
        foreach ($experience_pricelist as $item) {
            // 各アイテムの 'license_name' フィールドの値を取得します。
            if (!empty($item['experience_name'])) {
                // 'license_name' の値を安全に出力します。
                echo '<li class="page-price-list__item">';
                echo '<p class="page-price-list__name">' . nl2br(esc_html($item['experience_name'])) . '</p>';
                // 仮に値段のフィールドがある場合は以下のように出力します（例として 'price' フィールドを仮定）
                if (!empty($item['experience_price'])) {
                    echo '<p class="page-price-list__number">' . esc_html($item['experience_price']). '</p>';
                }
										echo '</li>';
								}
						}
					} else {
							// 繰り返しフィールドが空の場合のメッセージ
							echo '<li class="page-price-list__item">';
							echo '<p class="page-price-list__name">体験ダイビング情報がありません。</p>';
							echo '</li>';
					}
					?>
			</ul>
		</div>
		<div class="page-price__item page-price-list">
			<div class="page-price-list__title">
				<div class="page-price-list__heading">
					<div class="page-price-list__icon">
						<img src="<?php echo get_theme_file_uri(); ?>/assets/images/icon01.png" alt="" />
					</div>
					<p>ファンダイビング</p>
				</div>
			</div>
			<ul class="page-price-list__items">
				<?php
				// Smart Custom Fields (SCF) を使って、'fundiving_pricelist' グループを取得します。
				$fundiving_pricelist = SCF::get('fundiving_pricelist');

				// 取得したデータが空でないかをチェックします。
				if (!empty($fundiving_pricelist)) {
        // 取得した繰り返しフィールドの各アイテムをループで処理します。
        foreach ($fundiving_pricelist as $item) {
            // 各アイテムの 'fundiving_name' フィールドの値を取得します。
            if (!empty($item['fundiving_name'])) {
                // 'license_name' の値を安全に出力します。
                echo '<li class="page-price-list__item">';
                echo '<p class="page-price-list__name">' . nl2br(esc_html($item['fundiving_name'])) . '</p>';
                // 仮に値段のフィールドがある場合は以下のように出力します
                if (!empty($item['fundiving_price'])) {
                    echo '<p class="page-price-list__number">' . esc_html($item['fundiving_price']). '</p>';
                }
										echo '</li>';
								}
						}
					} else {
							// 繰り返しフィールドが空の場合のメッセージ
							echo '<li class="page-price-list__item">';
							echo '<p class="page-price-list__name">ライセンス情報がありません。</p>';
							echo '</li>';
					}
					?>
			</ul>
		</div>
		<div class="page-price__item page-price-list">
			<div class="page-price-list__title">
				<div class="page-price-list__heading">
					<div class="page-price-list__icon">
						<img src="<?php echo get_theme_file_uri(); ?>/assets/images/icon01.png" alt="" />
					</div>
					<p>スペシャルダイビング</p>
				</div>
			</div>
			<ul class="page-price-list__items">
				<?php
				// Smart Custom Fields (SCF) を使って、'fundiving_pricelist' グループを取得します。
				$specialdiving_pricelist = SCF::get('specialdiving_pricelist');

				// 取得したデータが空でないかをチェックします。
				if (!empty($specialdiving_pricelist)) {
        // 取得した繰り返しフィールドの各アイテムをループで処理します。
        foreach ($specialdiving_pricelist as $item) {
            // 各アイテムの 'fundiving_name' フィールドの値を取得します。
            if (!empty($item['specialdiving_name'])) {
                // 'license_name' の値を安全に出力します。
                echo '<li class="page-price-list__item">';
                echo '<p class="page-price-list__name">' . nl2br(esc_html($item['specialdiving_name'])) . '</p>';
                // 仮に値段のフィールドがある場合は以下のように出力します
                if (!empty($item['specialdiving_price'])) {
                    echo '<p class="page-price-list__number">' . esc_html($item['specialdiving_price']). '</p>';
                }
										echo '</li>';
								}
						}
					} else {
							// 繰り返しフィールドが空の場合のメッセージ
							echo '<li class="page-price-list__item">';
							echo '<p class="page-price-list__name">ライセンス情報がありません。</p>';
							echo '</li>';
					}
					?>
			</ul>
		</div>
	</div>
</div>

<div class="contact-wrapper">
	<?php get_template_part('common/contact') ?>
</div>

<?php get_footer(); ?>
