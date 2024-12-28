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
	<?php
		// グループ外の単一フィールド「license_title」を取得
			$license_title = SCF::get('license_title');

			// Smart Custom Fields (SCF) を使って、'license_pricelist' グループを取得します。
			$license_pricelist = SCF::get('license_pricelist');
				?>
	<?php
			// 取得したデータが空でないかをチェックします。
			if (!empty($license_pricelist)) :
				?>
	<div class="page-price__inner inner">
		<div class="page-price__item page-price-list fish">
			<div class="page-price-list__title">
				<div class="page-price-list__heading">
					<div class="page-price-list__icon">
						<img src="<?php echo get_theme_file_uri(); ?>/assets/images/icon01.png" alt="" />
					</div>
					<p>
					<p><?= esc_html($license_title ?: 'ダイビング'); ?></p>
					</p>
				</div>
			</div>

			<ul class="page-price-list__items">
				<?php
        // 繰り返しフィールドの各アイテムをループで処理します。
        foreach ($license_pricelist as $item) :
            // 各アイテムの 'license_name' フィールドの値を取得します。
            if (!empty($item['license_name'])) :
        ?>
				<li class="page-price-list__item">
					<p class="page-price-list__name"><?php echo wp_kses_post($item['license_name']); ?></p>
					<?php if (!empty($item['license_price'])) : ?>
					<p class="page-price-list__number"><?php echo esc_html($item['license_price']); ?></p>
					<?php endif; ?>
				</li>
				<?php
            endif;
        endforeach;
        ?>
			</ul>
		</div>
		<?php endif; ?>

		<?php
				// グループ外の単一フィールド「experience_title」を取得
			$experience_title = SCF::get('experience_title');
				// Smart Custom Fields (SCF) を使って、'experience_pricelist' グループを取得します。
				$experience_pricelist = SCF::get('experience_pricelist');

				// 取得したデータが空でないかをチェックします。
				if (!empty($experience_pricelist)):
			?>

		<div class="page-price__item page-price-list">
			<div class="page-price-list__title">
				<div class="page-price-list__heading">
					<div class="page-price-list__icon">
						<img src="<?php echo get_theme_file_uri(); ?>/assets/images/icon01.png" alt="" />
					</div>
					<p><?= esc_html($experience_title ?: 'ダイビング'); ?></p>
				</div>
			</div>
			<ul class="page-price-list__items">
				<?php
        // 繰り返しフィールドの各アイテムをループで処理します。
      	foreach ($experience_pricelist as $item) :
				// 各アイテムの 'experience_name' フィールドの値を取得します。
				if (!empty($item['experience_name'])) :
        ?>

				<li class="page-price-list__item">
					<p class="page-price-list__name"><?php echo wp_kses_post($item['experience_name']); ?></p>

					<?php if (!empty($item['experience_price'])) : ?>
					<p class="page-price-list__number"><?php echo esc_html($item['experience_price']); ?></p>
					<?php endif; ?>
				</li>
				<?php
            endif;
        endforeach;
        ?>
			</ul>
		</div>
		<?php endif; ?>

		<?php
		// グループ外の単一フィールド「fundiving_title」を取得
			$fundiving_title = SCF::get('fundiving_title');
			// Smart Custom Fields (SCF) を使って、'fundiving_pricelist' グループを取得します。
			$fundiving_pricelist = SCF::get('fundiving_pricelist');

			// 取得したデータが空でない場合にのみ HTML を出力します。
			if (!empty($fundiving_pricelist)) :
		?>
		<div class="page-price__item page-price-list">
			<div class="page-price-list__title">
				<div class="page-price-list__heading">
					<div class="page-price-list__icon">
						<img src="<?php echo get_theme_file_uri(); ?>/assets/images/icon01.png" alt="" />
					</div>
					<p><?= esc_html($fundiving_title ?: 'ダイビング'); ?></p>
				</div>
			</div>
			<ul class="page-price-list__items">
				<?php
            // 取得した繰り返しフィールドの各アイテムをループで処理します。
            foreach ($fundiving_pricelist as $item) :
                // 'fundiving_name' フィールドの値を取得して出力します。
                if (!empty($item['fundiving_name'])) : ?>
				<li class="page-price-list__item">
					<p class="page-price-list__name"><?php echo wp_kses_post($item['fundiving_name']); ?></p>
					<?php
              // 'fundiving_price' フィールドが存在する場合は値を出力します。
              if (!empty($item['fundiving_price'])) : ?>
					<p class="page-price-list__number"><?php echo esc_html($item['fundiving_price']); ?></p>
					<?php endif; ?>
				</li>
				<?php endif;
            endforeach; ?>
			</ul>
		</div>
		<?php endif; ?>


		<?php
		// グループ外の単一フィールド「specialdiving_title」を取得
			$specialdiving_title = SCF::get('specialdiving_title');
				// Smart Custom Fields (SCF) を使って、'specialdiving_pricelist' グループを取得します。
				$specialdiving_pricelist = SCF::get('specialdiving_pricelist');

				// 取得したデータが空でないかをチェックします。
					if (!empty($specialdiving_pricelist)) :
			?>

		<div class="page-price__item page-price-list">
			<div class="page-price-list__title">
				<div class="page-price-list__heading">
					<div class="page-price-list__icon">
						<img src="<?php echo get_theme_file_uri(); ?>/assets/images/icon01.png" alt="" />
					</div>
					<p>
					<p><?= esc_html($specialdiving_title ?: 'ダイビング'); ?></p>
					</p>
				</div>
			</div>
			<ul class="page-price-list__items">
				<?php
						// 取得した繰り返しフィールドの各アイテムをループで処理します。
						foreach ($specialdiving_pricelist as $item) :
						// 各アイテムの 'specialdiving_name' フィールドの値を取得します。
						if (!empty($item['specialdiving_name'])) :
					?>
				<li class="page-price-list__item">
					<p class="page-price-list__name"><?php echo wp_kses_post($item['specialdiving_name']); ?></p>
					<?php if (!empty($item['specialdiving_price'])) : ?>
					<p class="page-price-list__number"><?php echo esc_html($item['specialdiving_price']); ?></p>
					<?php endif; ?>
				</li>
				<?php endif;  ?>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
	<?php endif;  ?>
</div>

<?php get_footer(); ?>