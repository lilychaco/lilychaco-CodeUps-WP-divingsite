"use strict";

//================================
//FVのスライダー用
// ==================================
document.addEventListener("DOMContentLoaded", function () {
  var fvSlider = new Swiper(".js-fv-swiper", {
    slidesPerView: 1,
    // スライドを1枚表示
    spaceBetween: 0,
    // スライド間のスペース
    effect: "fade",
    // フェードエフェクト
    autoplay: {
      delay: 4000,
      // 4秒ごとに自動で次のスライドへ
      disableOnInteraction: false // ユーザーが操作しても自動再生を継続
    },

    speed: 2000 // スライドの切り替わり速度
  });
});

//================================
// campaignのスライダー用
// ==================================
document.addEventListener("DOMContentLoaded", function () {
  var campaignSlider = new Swiper(".js-campaign-swiper", {
    loop: true,
    autoplay: {
      delay: 2000,
      disableOnInteraction: false
    },
    speed: 2000,
    slidesPerView: "auto",
    // スライドの数を自動調整
    // 前後の矢印
    navigation: {
      nextEl: ".custom-swiper-button-next",
      prevEl: ".custom-swiper-button-prev"
    },
    breakpoints: {
      769: {
        // 769px以上のデバイスでの設定
        slidesPerView: "auto" // PCでは3枚半表示
      }
    }
  });
});