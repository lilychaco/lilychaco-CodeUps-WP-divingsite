			<form class="form" method="post">
				<dl class="form__row">
					<dt>お名前<span>必須</span></dt>
					<dd>
						<input type="text" name="name" />
					</dd>
				</dl>
				<dl class="form__row">
					<dt>メールアドレス<span>必須</span></dt>
					<dd>
						<input type="email" name="email" />
					</dd>
				</dl>
				<dl class="form__row">
					<dt>電話番号<span>必須</span></dt>
					<dd>
						<input type="phone" name="phone" />
					</dd>
				</dl>
				<dl class="form__row form__row--checkbox">
					<dt>お問合せ項目<span>必須</span></dt>
					<dd class="form__checkbox-wrapper">
						<label class="form__checkbox" for="divingseminar">
							<input type="checkbox" name="kinds" id="divingseminar" />
							<span class="form__checkbox-mark"></span>ダイビング講習について
						</label>
						<label class="form__checkbox" for="fundiving">
							<input type="checkbox" name="kinds" id="fundiving" />
							<span class="form__checkbox-mark"></span>ファンダイビングについて
						</label>
						<label class="form__checkbox" for="testdiving">
							<input type="checkbox" name="kinds" id="testdiving" />
							<span class="form__checkbox-mark"></span>体験ダイビングについて</label>
					</dd>
				</dl>
				<dl class="form__row form__row--select">
					<dt>キャンペーン</dt>
					<dd class="form__select">
						<div class="form__select-items">
							<select id="campaign-select" name="campaign" class="form__select-item">
								<option value="">キャンペーン内容を選択</option>
								<option value="seminar">ライセンス講習</option>
								<option value="fundiving">ファンダイビング</option>
								<option value="testdiving">体験ダイビング</option>
							</select>
						</div>
					</dd>
				</dl>

				<dl class="form__row form__row--message">
					<dt>お問合せ内容<span>必須</span></dt>
					<dd>
						<textarea name="message" id=""></textarea>
					</dd>
				</dl>
				<div class="form__outside">
					<label for="form-privacy" class="form__privacy-label">
						<input type="checkbox" name="privacy" id="form-privacy" value="個人情報保護方針に同意する" />
						<span class="form__privacy-mark"></span>
						個人情報の取り扱いについて同意のうえ送信します。
					</label>

					<div class="form__btn">
						<button type="submit" class="button button--send">Send</button>
					</div>
				</div>
			</form>
