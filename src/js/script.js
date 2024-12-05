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
      // 初期設定として一番目のタブを表示
      $(".js-content").hide().first().show(); // すべて非表示にして最初だけ表示
      $(".js-tab").first().addClass("current"); // 最初のタブに選択状態を付与

      // タブクリック時のイベント
      $(".js-tab").on("click", function () {
        const $clickedTab = $(this); // クリックされたタブを取得
        const index = $clickedTab.index(); // タブのインデックス番号を取得

        $(".js-tab").removeClass("current"); // 全てのタブの選択状態を解除
        $clickedTab.addClass("current"); // クリックされたタブを選択状態に

        $(".js-content").hide().eq(index).fadeIn(300); // 対応するコンテンツを表示
      });
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
