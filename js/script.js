"use strict";

jQuery(function ($) {
  // この中であればWordpressでも「$」が使用可能になる
  var topBtn = $('.page-top');
  topBtn.hide(); // ボタンの表示設定

  $(window).scroll(function () {
    if ($(this).scrollTop() > 70) {
      // 指定px以上のスクロールでボタンを表示
      topBtn.fadeIn();
    } else {
      // 画面が指定pxより上ならボタンを非表示
      topBtn.fadeOut();
    }
  }); // ボタンをクリックしたらスクロールして上に戻る

  topBtn.click(function () {
    $('body,html').animate({
      scrollTop: 0
    }, 300, 'swing');
    return false;
  }); //ドロワーメニュー

  $('.js-hamburger').click(function () {
    $(this).toggleClass('is-active');
    $('.p-drawer').toggleClass('is-active');
  }); // スムーススクロール (絶対パスのリンク先が現在のページであった場合でも作動)

  $(document).on('click', 'a[href*="#"]', function () {
    var time = 400;
    var header = $('header').innerHeight();
    var target = $(this.hash);
    if (!target.length) return;
    var targetY = target.offset().top - header;
    $('html,body').animate({
      scrollTop: targetY
    }, time, 'swing');
    return false;
  }); // ヘッダー


  
  $('.p-globalNav__menu').click(function () {
    $('.p-globalNav__menu').removeClass('is-selected');
    $(this).addClass('is-selected');
  });
  $('.js-subMenu').hover(function () {
    $('.p-globalNav__nav').slideToggle();
  });
  $('.p-globalNav__subMenu').hover(function () {
    $(this).toggleClass('is-selected');
  });
  $('.js-drawer-subMenu').click(function () {
    $(this).toggleClass('is-open');
    $('.p-drawer__subMenus').slideToggle();
  });
  $('.js-mv-slider').slick({
    arrows: true,
    autoplay: true,
    prevArrow: '<div class="slide-arrow prev-arrow"></div>',
    nextArrow: '<div class="slide-arrow next-arrow"></div>'
  });
});