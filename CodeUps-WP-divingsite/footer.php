   <?php if (!is_page(array('contact', 'thanks', 'error')) && !is_404()): ?>

   <div class="contact-wrapper">
   	<section class="contact inner" id="contact">
   		<div class="contact__inner">
   			<div class="contact__container">
   				<div class="contact__item contact-maparea">
   					<div class="contact-maparea__top">
   						<div class="contact-maparea__logo">
   							<a href="<?php echo esc_url(home_url('/')); ?>">
   								<picture>
   									<source
   										srcset="<?php echo get_template_directory_uri(); ?>/assets/images/codeups-contact-logo-pc.jpg"
   										media="(min-width: 768px)" />
   									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/codeups-contact-logo-sp.jpg"
   										alt="コンタクトーロゴ" />
   								</picture>
   							</a>
   						</div>
   					</div>
   					<div class="contact-maparea__body">
   						<div class="contact-maparea__address">
   							<p>沖縄県那覇市1-1</p>
   							<p>TEL:0120-000-0000</p>
   							<p>営業時間:8:30-19:00</p>
   							<p>定休日:毎週火曜日</p>
   						</div>
   						<div class="contact-maparea__map-wrapper">
   							<div class="contact-maparea__map">
   								<iframe
   									src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3506.2808799997147!2d129.6873916108525!3d28.50119587563551!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x351f9e89e0a00569%3A0xb48efef363eb23ad!2z44OA44Kk44OT44Oz44Kw44K344On44OD44OX44ON44OQ44O844Op44Oz44OJ!5e0!3m2!1sja!2sjp!4v1702196498890!5m2!1sja!2sjp"
   									width="100%" height="auto" style="border: 0" allowfullscreen="" loading="lazy"
   									referrerpolicy="no-referrer-when-downgrade"></iframe>
   							</div>
   						</div>
   					</div>
   				</div>
   				<div class="contact__item contact-verticalline"></div>
   				<div class="contact__item contact__cta">
   					<div class="contact__heading section-heading">
   						<h3 class="section-heading__title section-heading__title--contact">
   							Contact
   						</h3>
   						<h2 class="section-heading__subtitle section-heading__subtitle--contact u-desktop">
   							お問い合わせ
   						</h2>
   						<h2 class="section-heading__subtitle section-heading__subtitle--contact u-mobile">
   							お問合せ
   						</h2>
   						<p class="section-heading__text">
   							ご予約・お問い合わせはコチラ
   						</p>
   					</div>
   					<div class="contact__button">
   						<a href="<?php echo esc_url(home_url('/contact')); ?>" class="button">Contact us</a>
   					</div>
   				</div>
   			</div>
   		</div>
   	</section>
   </div>
   <?php endif; ?>


   <footer class="footer footer-layout">
   	<div class="footer__inner inner">
   		<div class="footer__top">
   			<div class="footer__logo">
   				<a href="<?php echo esc_url(home_url('/')); ?>">
   					<picture>
   						<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/footer-logo-pc.png"
   							media="(min-width: 768px)" />
   						<img src="<?php echo get_theme_file_uri(); ?>/assets/images/footer-logo-sp.png" alt="フッターロゴ" />
   					</picture>
   				</a>
   			</div>
   			<div class="footer__sns">
   				<a href="https://www.facebook.com/yumin.amakusa?locale=ja_JP" target=”_blank”><img
   						src="<?php echo get_theme_file_uri(); ?>/assets/images/facebooklogo.png" alt="フッター" /></a>
   				<a href="https://www.instagram.com/yumin52/" target=”_blank”><img
   						src="<?php echo get_theme_file_uri(); ?>/assets/images/instagramlogo.png" alt="フッターロゴ" /></a>
   			</div>
   		</div>
   		<div class="footer__nav nav-menu">
   			<!-- ブロック1 -->
   			<div class="nav-menu__box nav-menu__box--01 nav-menu__box--footer">
   				<div class="nav-menu__item">
   					<a href="<?php echo esc_url(home_url('/campaign')); ?>">
   						<p class="starfish-icon">キャンペーン</p>
   					</a>
   					<ul>
   						<li><a href="<?php echo esc_url(home_url('/campaign')); ?>">ライセンス取得</a></li>
   						<li><a href="<?php echo esc_url(home_url('/campaign')); ?>">貸切体験ダイビング</a></li>
   						<li><a href="<?php echo esc_url(home_url('/campaign')); ?>">ナイトダイビング</a></li>
   					</ul>
   				</div>
   				<div class="nav-menu__item nav-menu__item--01">
   					<a href="<?php echo esc_url(home_url('/aboutus')); ?>">
   						<p class="starfish-icon">私たちについて</p>
   					</a>
   				</div>
   			</div>

   			<!-- ブロック2 -->
   			<div class="nav-menu__box nav-menu__box--02">
   				<div class="nav-menu__item">
   					<a href="<?php echo esc_url(home_url('/information')); ?>">
   						<p class="starfish-icon">ダイビング情報</p>
   					</a>

   					<ul>
   						<li><a href="<?php echo esc_url(home_url('/information?tab=license-training')); ?>">ライセンス講習</a></li>
   						<li><a href="<?php echo esc_url(home_url('/information?tab=trial-diving')); ?>">体験ダイビング</a></li>
   						<li><a href="<?php echo esc_url(home_url('/information?tab=fun-diving')); ?>">ファンダイビング</a></li>
   					</ul>

   				</div>
   				<div class="nav-menu__item nav-menu__item--01">
   					<a href="<?php echo esc_url(home_url('/blog')); ?>">
   						<p class="starfish-icon">ブログ</p>
   					</a>
   				</div>
   			</div>

   			<!-- ブロック3 -->
   			<div class="nav-menu__box nav-menu__box--05">
   				<div class="nav-menu__item">
   					<a href="<?php echo esc_url(home_url('/voice')); ?>">
   						<p class="starfish-icon">お客様の声</p>
   					</a>
   				</div>
   				<div class="nav-menu__item">
   					<a href="<?php echo esc_url(home_url('/price')); ?>">
   						<p class="starfish-icon">料金一覧</p>
   					</a>
   					<ul>
   						<li><a href="<?php echo esc_url(home_url('/price')); ?>">ライセンス講習</a></li>
   						<li><a href="<?php echo esc_url(home_url('/price')); ?>">体験ダイビング</a></li>
   						<li><a href="<?php echo esc_url(home_url('/price')); ?>">ファンダイビング</a></li>
   					</ul>
   				</div>
   			</div>

   			<!-- ブロック4 -->
   			<div class="nav-menu__box nav-menu__box--06">
   				<div class="nav-menu__item">
   					<a href="<?php echo esc_url(home_url('/faq')); ?>">
   						<p class="starfish-icon">よくある質問</p>
   					</a>
   				</div>
   				<div class="nav-menu__item">
   					<a href="<?php echo esc_url(home_url('/privacypolicy')); ?>">
   						<p class="starfish-icon">
   							プライバシー<br class="u-mobile" />ポリシー
   						</p>
   					</a>
   				</div>
   				<div class="nav-menu__item">
   					<a href="<?php echo esc_url(home_url('/terms-of-service')); ?>">
   						<p class="starfish-icon">利用規約</p>
   					</a>
   				</div>
   				<div class="nav-menu__item">
   					<a href="<?php echo esc_url(home_url('/contact')); ?>">
   						<p class="starfish-icon">お問い合わせ</p>
   					</a>
   				</div>
   				<div class="nav-menu__item">
   					<a href="<?php echo esc_url(home_url('/sitemap')); ?>">
   						<p class="starfish-icon">サイトマップ</p>
   					</a>
   				</div>
   			</div>
   		</div>
   		<div class="footer__copyright">
   			<span>c</span>opyright&nbsp;©&nbsp;2021&nbsp;-&nbsp;2023&nbsp;CodeUps&nbsp;LLC.&nbsp;All&nbsp;Rights&nbsp;Reserved.
   		</div>
   	</div>

   	<?php if ( ! is_404() ) : ?>
   	<div class="footer__button page-top-button js-page-top-button">
   		<div class="page-top-button__img">
   			<picture>
   				<img src="<?php echo get_theme_file_uri(); ?>/assets/images/totop-button.png" alt="上に戻るボタン" />
   			</picture>
   		</div>
   	</div>
   	<?php endif; ?>
   </footer>
   <?php wp_footer(); ?>
   </body>

   </html>
