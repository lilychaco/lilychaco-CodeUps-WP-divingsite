<?php get_header(); ?>
<section class="mv">
	<figure class="mv__img">
		<picture>
			<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/mv-information.jpg"
				media="(min-width: 768px)" />
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/mv-information-sp.jpg" alt="ファーストビュー画像" />
		</picture>
	</figure>
	<h2 class="mv__title">information</h2>
</section>
<?php get_template_part('common/breadcrumb') ?>

<div class="information information-layout">
	<div class="information__inner inner">
		<div class="information__tab tab fish-02">
			<ul class="tab__list">
				<li class="tab__menu js-tab" data-tab="license-training" current>
					<p class="tab__text tab__text--01" id="license-training">
						ライセンス<br class="u-mobile" />講習
					</p>
				</li>
				<li class="tab__menu js-tab" data-tab="fun-diving">
					<p class="tab__text tab__text--02" id="fun-diving">
						ファン<br class="u-mobile" />ダイビング
					</p>
				</li>
				<li class="tab__menu js-tab" data-tab="trial-diving">
					<p class="tab__text tab__text--03" id="trial-diving">
						体験<br class="u-mobile" />ダイビング
					</p>
				</li>
			</ul>
			<div class="tab__contents">
				<div class="tab__content js-content info-card">
					<div class="info-card__container">
						<div class="info-card__body">
							<div class="info-card__title">ライセンス講習</div>
							<div class="info-card__text">
								泳げない人も、ちょっと水が苦手な人も、ダイビングを「安全に」楽しんでいただけるよう、スタッフがサポートいたします！スキューバダイビングを楽しむためには最低限の知識とスキルが要求されます。知識やスキルと言ってもそんなに難しい事ではなく、安全に楽しむ事を目的としたものです。プロダイバーの指導のもと知識とスキルを習得しCカードを取得して、ダイバーになろう！
							</div>
						</div>
						<div class="info-card__img">
							<img src="<?php echo get_theme_file_uri(); ?>/assets/images/info-card-img01.jpg"
								alt="ダイバーが海に浮かんでるのを空から撮影している写真" />
						</div>
					</div>
				</div>
				<div class="tab__content js-content info-card">
					<div class="info-card__container">
						<div class="info-card__body">
							<div class="info-card__title">ファンダイビング</div>
							<div class="info-card__text">
								ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！
							</div>
						</div>
						<div class="info-card__img">
							<img src="<?php echo get_theme_file_uri(); ?>/assets/images/info-card-img02.jpg" alt="" />
						</div>
					</div>
				</div>
				<div class="tab__content js-content info-card">
					<div class="info-card__container">
						<div class="info-card__body">
							<div class="info-card__title">体験ダイビング</div>
							<div class="info-card__text">
								ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！
							</div>
						</div>
						<div class="info-card__img">
							<img src="<?php echo get_theme_file_uri(); ?>/assets/images/info-card-img03.jpg" alt="" />
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php get_footer(); ?>
