jQuery(function ($) {
  // ドキュメントが読み込まれた時に実行される
  $(document).ready(function () {
    // ハンバーガーボタンクリックで、ドロワーメニューの開閉
    $("#js-hamburger").click(function () {
      $("body").toggleClass("is-drawerActive");

      let isExpanded = $(this).attr("aria-expanded") === "true";
      $(this).attr("aria-expanded", !isExpanded);
      $("#js-global-menu")
        .css("visibility", isExpanded ? "hidden" : "visible")
        .attr("aria-hidden", isExpanded);
    });

    // ドロワーのリンクがクリックされたらメニューを閉じる
    $("#js-global-menu a").click(function () {
      $("body").toggleClass("is-drawerActive");
      $("#js-hamburger").attr("aria-expanded", false);
      $("#js-global-menu")
        .css("visibility", "hidden")
        .attr("aria-hidden", "true");
      $("#js-drawer-background").removeClass("is-drawerActive");
    });

    //================================
    // ボタンをクリックしてページトップに戻る
    // ==================================
    $(".js-page-top-button").click(function () {
      $("body,html").animate({ scrollTop: 0 }, 1000, "swing");
      return false;
    });




    // ==================================
    // インフォメーションページのタブの動きを制御
    // ==================================
    $(document).ready(function () {
      const urlParams = new URLSearchParams(window.location.search); // URLのクエリパラメータを取得
      const tabParam = urlParams.get("tab"); // "tab"パラメータの値を取得
      const $tabs = $(".js-tab"); // 全てのタブ
      const $contents = $(".js-content"); // 全てのコンテンツ

      if (tabParam) {
        // パラメータが指定されている場合
        const targetIndex = $tabs.filter(`[data-tab="${tabParam}"]`).index();
        if (targetIndex !== -1) {
          $tabs.removeClass("current").eq(targetIndex).addClass("current"); // 該当タブを選択状態に
          $contents.hide().eq(targetIndex).fadeIn(300); // 対応コンテンツを表示
        } else {
          // 該当するタブがない場合、デフォルトタブを表示
          showDefaultTab();
        }
      } else {
        // パラメータが指定されていない場合、デフォルトタブを表示
        showDefaultTab();
      }

      // タブクリック時のイベント
      $tabs.on("click", function () {
        const $clickedTab = $(this); // クリックされたタブを取得
        const index = $clickedTab.index(); // タブのインデックス番号を取得
        const tabId = $clickedTab.data("tab"); // タブに設定したデータ属性からIDを取得

        $tabs.removeClass("current"); // 全てのタブの選択状態を解除
        $clickedTab.addClass("current"); // クリックされたタブを選択状態に

        $contents.hide().eq(index).fadeIn(300); // 対応するコンテンツを表示

        // URLにクエリパラメータを設定
        const newUrl = `${window.location.origin}${window.location.pathname}?tab=${tabId}`;
        window.history.replaceState(null, null, newUrl);
      });

      // 初期タブ表示用の関数
      function showDefaultTab() {
        $tabs.first().addClass("current");
        $contents.hide().first().show();
      }
    });

    //================================
    //  サイドのアーカイブメニューの動作
    // ==================================
    $(".js-year-toggle").click(function () {
      var $monthList = $(this).next(".side-archive__month-list");
      $(".side-archive__month-list").not($monthList).slideUp();
      $monthList.slideToggle();
      $(this).parent(".side-archive__year").toggleClass("active");
    });

    //================================
    // アコーディオンの動作
    // ==================================
    $(".js-accordion-top").click(function () {
      // アコーディオンの開閉動作
      $(this).next().slideToggle(300);

      // 開いている場合はis-openを追加し、is-closeを削除
      if ($(this).hasClass("is-open")) {
        $(this).removeClass("is-open").addClass("is-close");
      } else {
        // 閉じている場合はis-closeを追加し、is-openを削除
        $(this).removeClass("is-close").addClass("is-open");
      }
    });

    // 画面の高さを取得してCSS変数として設定
    function setVh() {
      var vh = window.innerHeight * 0.01;
      document.documentElement.style.setProperty("--vh", `${vh}px`);
    }
    window.addEventListener("load", setVh);
    window.addEventListener("resize", setVh);
  });

  /*-----------------------------------
	scf SP版では全角スペースを改行に置換
	PC版では、全角スペースを削除
	-----------------------------------*/
  document.addEventListener("DOMContentLoaded", function () {
    function updateText() {
      var items = document.querySelectorAll(".page-price-list__name");
      items.forEach(function (item) {
        var text = item.innerHTML;
        if (window.innerWidth <= 768) {
          // SP版: 全角スペースを <br> タグに置換
          var modifiedText = text.replace(/　/g, "<br>");
        } else {
          // PC版: 全角スペースを削除
          var modifiedText = text.replace(/　/g, "");
        }
        item.innerHTML = modifiedText;
      });
    }

    // ページ読み込み時とリサイズ時に関数を呼び出す
    updateText();
    window.addEventListener("resize", function () {
      updateText();
    });
  });

  //================================
  // 画像に色背景がついてから、写真が出てくる
  // ==================================
  //要素の取得とスピードの設定
  var box = $(".colorbox"),
    speed = 700;

  //.colorboxの付いた全ての要素に対して下記の処理を行う
  box.each(function () {
    $(this).append('<div class="color"></div>');
    var color = $(this).find($(".color")),
      image = $(this).find("img");
    var counter = 0;
    image.css("opacity", "0");
    color.css("width", "0%");

    //inviewを使って背景色が画面に現れたら処理をする
    color.on("inview", function () {
      if (counter == 0) {
        $(this)
          .delay(200)
          .animate({ width: "100%" }, speed, function () {
            image.css("opacity", "1");
            $(this).css({ left: "0", right: "auto" });
            $(this).animate({ width: "0%" }, speed);
          });
        counter = 1;
      }
    });
  });

  //================================
  // gallery一覧の拡大画像モーダル処理
  // ==================================
  // モーダル画像の表示
  $(document).on("click", ".js-modal-open img", function () {
    // クリックされた画像を#grayDisplayにコピー
    $("#grayDisplay").html($(this).prop("outerHTML"));
    // モーダルをフェードインで表示
    $("#grayDisplay").fadeIn(200);

    // 背景のスクロールを無効化
    $("body").addClass("no-scroll");
    return false; // デフォルトのリンク動作を無効化
  });

  // モーダルを閉じるイベント
  $("#grayDisplay").click(function () {
    // モーダルをフェードアウトで非表示
    $("#grayDisplay").fadeOut(200);

    // 背景のスクロールを有効化
    $("body").removeClass("no-scroll");
    return false;
  });
});


  //================================
  //コンタクトフォーム7 未入力項目がある時に、警告メッセージを出す
  // ==================================
document.addEventListener("DOMContentLoaded", () => {
  // 警告メッセージを取得
  const warningMessage = document.getElementById("warningMessage");

  // Contact Form 7 フォームを取得
  const contactForm = document.querySelector(".wpcf7-form");

  // フォーム送信時の処理
  contactForm.addEventListener("submit", (e) => {
    const requiredFields = contactForm.querySelectorAll(
      "[aria-required='true']"
    );
    let isFormValid = true;

    // 必須項目のチェック
    requiredFields.forEach((field) => {
      if (!field.value.trim()) {
        isFormValid = false;
        field.classList.add("wpcf7-error"); // 未入力フィールドを強調するクラス
      } else {
        field.classList.remove("wpcf7-error");
      }
    });

    // フォームが無効な場合
    if (!isFormValid) {
      e.preventDefault(); // フォーム送信を中止
      warningMessage.style.display = "block"; // 警告メッセージを表示
    } else {
      warningMessage.style.display = "none"; // 警告メッセージを非表示
    }
  });
});

