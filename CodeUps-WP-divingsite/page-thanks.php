<?php get_header(); ?>
<section class="mv">
	<figure class="mv__img">
		<picture>
			<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/mv-contact.jpg" media="(min-width: 768px)" />
			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/mv-contact-sp.jpg" alt="ファーストビュー画像" />
		</picture>
	</figure>

	<h2 class="mv__title">contact</h2>
</section>
<?php get_template_part('common/breadcrumb') ?>

<div class="page-thanks page-thanks-layout">
	<div class="page-thanks__inner inner">
		<p class="page-thanks__title fish">
			お問い合わせ内容を送信完了しました。
		</p>
		<p class="page-thanks__text">
			このたびは、お問い合わせ頂き<br class="u-mobile" />誠にありがとうございます。<br />
			お送り頂きました内容を確認の上、<br class="u-mobile" />3営業日以内に折り返しご連絡させて頂きます。<br />
			また、ご記入頂いたメールアドレスへ、<br class="u-mobile" />自動返信の確認メールをお送りしております。
		</p>
	</div>
</div>

<?php get_footer(); ?>
