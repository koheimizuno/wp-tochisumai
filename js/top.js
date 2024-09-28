(function($) {
	var cursor = $("#loading_stoker");
	$(document).on("mousemove", function(e) {
		var x = e.clientX;
		var y = e.clientY;
		cursor.css({
			"opacity": "1",
			"top": (y - 7) + "px",
			"left": (x - 7) + "px"
		});
	});
});

jQuery(window).on('load', function() {
	jQuery(function($) {
		// スマートフォンかどうかを判定（767px以下）
		var isMobile = window.matchMedia("(max-width: 767px)").matches;
		
		// スマートフォンの場合は遅延時間を短縮
		var delay = isMobile ? 300 : 1300;
		var initialDelay = isMobile ? 500 : 1500;

		setTimeout(function() {
			$('#loading_box').delay(delay).queue(function() {
				$(this).addClass('loading_logo__scale');
			})
			$('#loading').delay(delay + 200).queue(function() {
				$(this).addClass('loading_fadeOut');
			})
			$('#loading-bar').delay(delay + 200).queue(function() {
				$(this).addClass('loading__finish');
			})
			$("#loading_stoker").delay(delay + 200).fadeOut('slow');
			$('.main-slider').delay(delay + 1000).queue(function() {
				$(this).addClass('main_visual__fadeIn');
			})
			$('.fv_text_main').delay(delay + 1800).queue(function() {
				$(this).addClass('header_pc__fadeIn');
			})
			$('.fv_text_sub').delay(delay + 1500).queue(function() {
				$(this).addClass('header_pc__fadeIn');
			})
			$('.header, .nav_btn_wrap').delay(delay + 2000).queue(function() {
				$(this).addClass('header_pc__fadeIn');
			})

			// ... existing code ...

		}, initialDelay);
	});
});

jQuery(window).on('load', function() {
    jQuery(function($) {
    setTimeout(function() {
      var $slider = $('.main-slider').slick({
        arrows: false,
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        autoplay: true,
        speed: 2200,
        autoplaySpeed: 2400,
        infinite: true,
        pauseOnHover: false,
        pauseOnFocus: false,
        cssEase: 'ease-in-out'
      });
      $slider.on('beforeChange', function(slick, currentSlide) {
        $('.glow_animation').addClass('glow_active');
      });
      $slider.on('afterChange', function(slick, currentSlide) {
        $('.glow_animation').removeClass('glow_active');
      });
    }, 4000)
    });
});
var parallaxBkImg = function() {
	jQuery(window).on('load resize', function() {
        jQuery(function($) {
            $(window).on('load scroll', function() {
                var $winTop = $(window).scrollTop();
                var $target = $('.js-parallax');
                var $winWidth = $(window).width();
                $target.each(function(index) {
                    var $position = $winTop - $target.eq(index).offset().top;
                    if ($winTop > $target.eq(index).offset().top - 800) {
                        $target.eq(index).css({
                            'background-position-y': $position * .5
                        });
                    }
                });
            });
		});
	});
}();
jQuery(document).ready(function($) {
//     const panels = document.querySelectorAll(".about");
// let currentPanel = null;
// let isScrolling = false;

// // ユーザーによるスクロールを防止
// window.addEventListener('wheel', function(e) {
//     e.preventDefault();
// }, { passive: false });

// function goToPanel(panel) {
//     if (currentPanel !== panel && !isScrolling) {
//         isScrolling = true;
//         const panelTop = panel.getBoundingClientRect().top + window.pageYOffset;
//         gsap.to(window, {
//             scrollTo: { y: panelTop, autoKill: false },
//             duration: 1,
//             ease: "power2.inOut",  // イージングを設定
//             onComplete: function() {
//                 isScrolling = false;
//             }
//         });
//         currentPanel = panel;
//     }
// }

// panels.forEach((panel) => {
//     ScrollTrigger.create({
//         trigger: panel,
//         end: "bottom top+=1",
//         markers: false,
//         onEnter: () => {
//             goToPanel(panel);
//             gsap.to(panel.querySelector(".about_title1"), {opacity: 1, delay: 1, duration: 1});
//             gsap.to(panel.querySelector(".about_text_wrap"), {opacity: 1, delay: 1.5, duration: 1});
//         },
//         onEnterBack: () => {
//             goToPanel(panel);
//             gsap.to(panel.querySelector(".about_title1"), {opacity: 1, delay: 1, duration: 1});
//             gsap.to(panel.querySelector(".about_text_wrap"), {opacity: 1, delay: 1.5, duration: 1});
//         },
//         onLeave: () => {
//             gsap.to(panel.querySelector(".about_title1"), {opacity: 0, duration: 1});
//             gsap.to(panel.querySelector(".about_text_wrap"), {opacity: 0, duration: 1});
//         },
//         onLeaveBack: () => {
//             gsap.to(panel.querySelector(".about_title1"), {opacity: 0, duration: 1});
//             gsap.to(panel.querySelector(".about_text_wrap"), {opacity: 0, duration: 1});
//         },
//     });
// });
const aboutWrap = document.querySelector(".about_wrap");
const panels = Array.from(aboutWrap.querySelectorAll(".about"));
let currentPanelIndex = 0;
let isScrolling = false;

function goToPanel(panel) {
    if (!isScrolling) {
        isScrolling = true;
        const panelTop = panel.getBoundingClientRect().top + window.pageYOffset;
        // 現在のパネルの要素の透明度を0に設定
        gsap.to(panels[currentPanelIndex].querySelector(".about_title1"), {opacity: 0, duration: 1});
        gsap.to(panels[currentPanelIndex].querySelector(".about_text_wrap"), {opacity: 0, duration: 1});
        gsap.to(window, {
            scrollTo: { y: panelTop, autoKill: false },
            duration: 1,
            ease: "power2.inOut",  // イージングを設定
            onComplete: function() {
                isScrolling = false;
            }
        });
        // 現在のパネルのアニメーションを追加
        gsap.to(panel.querySelector(".about_title1"), {opacity: 1, delay: 1, duration: 1});
        gsap.to(panel.querySelector(".about_text_wrap"), {opacity: 1, delay: 1.5, duration: 1});
    }
}



function isMobile() {
    return window.innerWidth <= 767;
}

function handleScroll(e) {
    if (isMobile()) {
        // モバイルの場合は通常のスクロール動作を許可
        return;
    }

    if (isScrolling) {
        e.preventDefault();
        return;
    }

    const rect = panels[0].getBoundingClientRect();
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    const offsetTop = rect.top + scrollTop;
    const offsetTop200 = offsetTop - 800; // 200px上に調整

    // スクロール位置がpanels[0]要素の下端から200px上になったときにテキストをフェードイン
    if (window.scrollY >= offsetTop200) {
        gsap.to(panels[0].querySelector(".about_title1"), {opacity: 1, delay: 0, duration: 1});
        gsap.to(panels[0].querySelector(".about_text_wrap"), {opacity: 1, delay: 0.5, duration: 1});
    }

    const currentPanel = panels[currentPanelIndex];
    const panelRect = currentPanel.getBoundingClientRect();

    if (e.deltaY > 0) {
        // 下スクロール
        if (panelRect.bottom > window.innerHeight) {
            // パネルが画面に収まっていない場合は、通常のスクロールを許可
            return;
        }
        if (currentPanelIndex < panels.length - 1) {
            currentPanelIndex++;
            goToPanel(panels[currentPanelIndex]);
            e.preventDefault();
        }
    } else if (e.deltaY < 0) {
        // 上スクロール
        if (panelRect.top < 0) {
            // パネルが画面に収まっていない場合は、通常のスクロールを許可
            return;
        }
        if (currentPanelIndex > 0) {
            currentPanelIndex--;
            goToPanel(panels[currentPanelIndex]);
            e.preventDefault();
        }
    }
}

function addOrRemoveScrollListener() {
    if (isMobile()) {
        aboutWrap.removeEventListener('wheel', handleScroll);
    } else {
        aboutWrap.addEventListener('wheel', handleScroll, { passive: false });
    }
}

// 初期化時にイベントリスナーを設定
addOrRemoveScrollListener();

// ウィンドウのリサイズ時にイベントリスナーを再設定
window.addEventListener('resize', addOrRemoveScrollListener);

    // WorksやEventのパネルを自動で移動する処理
    (() => {
        const observer = new IntersectionObserver((entries) => {
            // スマホ版のみの判定
            if (window.matchMedia('(max-width: 767px)').matches) {
                entries.some(entry => {
                    // 上にスクロールした場合は、最初のentryにマッチして移動する
                    // 下にスクロールした場合は、手前のentry=現在のentryなのでスキップされて、その次のentryがマッチして移動する
                    const entryIndex = panels.indexOf(entry.target);
                    if (entry.isIntersecting && entryIndex !== currentPanelIndex) {
                        currentPanelIndex = entryIndex;
                        goToPanel(panels[currentPanelIndex]);
                        return true;
                    }
                });
            }
        }, {
            root: null,
            rootMargin: '0px',
            threshold: [0.1, 0.9]
        });

        // 各パネルの表示状態を監視
        panels.forEach(panel => {
            observer.observe(panel);
        });
    })();

});

const bgPanelWrap = document.querySelector(".bg_panel_wrap");
const bgPanels = Array.from(bgPanelWrap.querySelectorAll(".bg_panel"));
let currentBgPanelIndex = 0;
let isScrolling = false;

function goToBgPanel(panel) {
    if (!isScrolling) {
        isScrolling = true;
        const panelTop = panel.getBoundingClientRect().top + window.pageYOffset;
        // 現在のパネルの要素の透明度を0に設定
        bgPanels[currentBgPanelIndex].querySelectorAll(".bg_panel_wrap .panel_item").forEach(element => {
            gsap.to(element, {opacity: 0, duration: 1});
        });
        gsap.to(window, {
            scrollTo: { y: panelTop, autoKill: false },
            duration: 1,
            ease: "power2.inOut",  // イージングを設定
            onComplete: function() {
                isScrolling = false;
            }
        });
        // 現在のパネルのアニメーションを追加
        panel.querySelectorAll(".bg_panel_wrap .panel_item").forEach((element, index) => {
            gsap.to(element, {opacity: 1, delay: 1 + index * 0.5, duration: 1});
        });
    }
}

function handleScroll(e) {
    if (isScrolling) {
        e.preventDefault();
    } else {
        const rect = bgPanels[0].getBoundingClientRect();
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        const offsetTop = rect.top + scrollTop;
        const offsetTop200 = offsetTop - 800; // 200px上に調整
        // スクロール位置がbgPanels[0]要素の下端から200px上になったときにテキストをフェードイン
        if (window.scrollY >= offsetTop200) {
            bgPanels[0].querySelectorAll(".bg_panel_wrap .panel_item").forEach((element, index) => {
                gsap.to(element, {opacity: 1, delay: index * 0.5, duration: 1});
            });
        }
        if (e.deltaY > 0 && currentBgPanelIndex < bgPanels.length - 1) {
            // マウスホイールが下に動いたとき
            // 画面幅をチェックして、スマホの場合は8割表示されたら次のパネルに移動
            const isMobile = window.innerWidth <= 767;
            const threshold = isMobile ? rect.height * 0.9 : rect.height;
            if (currentBgPanelIndex === 0 && window.scrollY < offsetTop - threshold) {
                // 最初のパネルのテキストをフェードイン
                return;
            }
            // 次のパネルに移動
            currentBgPanelIndex++;
            goToBgPanel(bgPanels[currentBgPanelIndex]);
            e.preventDefault();
        } else if (e.deltaY < 0 && currentBgPanelIndex > 0) {
            // マウスホイールが上に動いたとき
            // 前のパネルに移動
            currentBgPanelIndex--;
            goToBgPanel(bgPanels[currentBgPanelIndex]);
            e.preventDefault();
        }
    }
}

bgPanelWrap.addEventListener('wheel', handleScroll, { passive: false });

// タッチイベントの追加
let touchStartY = 0;
let touchEndY = 0;

bgPanelWrap.addEventListener('touchstart', function(e) {
    touchStartY = e.changedTouches[0].screenY;
}, { passive: false });

bgPanelWrap.addEventListener('touchmove', function(e) {
    touchEndY = e.changedTouches[0].screenY;
}, { passive: false });

bgPanelWrap.addEventListener('touchend', function(e) {
    if (touchEndY < touchStartY && currentBgPanelIndex < bgPanels.length - 1) {
        // 下にスクロール
        currentBgPanelIndex++;
        goToBgPanel(bgPanels[currentBgPanelIndex]);
    } else if (touchEndY > touchStartY && currentBgPanelIndex > 0) {
        // 上にスクロール
        currentBgPanelIndex--;
        goToBgPanel(bgPanels[currentBgPanelIndex]);
    }
}, { passive: false });




// (function () {
//     'use strict';
    
//     // 変数
//     var wrap = document.querySelector('.about_wrap'), // クラスセレクタに変更
//       elements = document.querySelectorAll('.about'), // 1画面分スクロールさせる要素
//       elRect = [], // 要素の位置情報を取得するための配列
//       elTop = [], // 要素の位置を入れるための配列
//       count = 0, // 
//       wheelFlag = false;
    
//     // 各要素の位置を取得
//     function getElTop() {
//       for (var i = 0; i < elements.length; i++) { // 要素の数ループ
//         elRect.push(elements[i].getBoundingClientRect()); // 要素の位置情報を配列へ
//       }
//       for (var i = 0; i < elRect.length; i++) { // 要素の数ループ
//         elTop.push(elRect[i].top + window.scrollY); // 要素の位置を配列へ
//       }
//     }
//     getElTop();
    
//     // 画面リサイズのときの処理
//     window.addEventListener('resize', function () {
//       elRect = []; // 位置情報の配列を一旦空に
//       elTop = []; // 位置の配列を一旦空に
//       getElTop(); // 位置を取得
//       window.scrollTo(0, elTop[count]); // 現在表示中の画面位置へ
//     });
//     // マウスホイールのときの処理
//     wrap.addEventListener('wheel', function (e) {
//         var currentScrollTop = window.scrollY; // 現在のスクロール位置を取得
//         if (count !== elements.length - 1 ){
//             e.preventDefault(); // デフォルトのスクロール動作を削除
//         }else if(e.deltaY < 0){  // ホイールが上方向だったら
//                 e.preventDefault(); // デフォルトのスクロール動作を削除
//         }else{
//             if(currentScrollTop < elTop[elements.length - 1] + elements[elements.length - 1].offsetHeight / 2){
//                 e.preventDefault(); // デフォルトのスクロール動作を削除
//             }
//         }
//         // alert(urrentScrollTop < elTop[count] + elements[count].offsetHeight / 2);

//       if (!wheelFlag) { // wheelFlagがfalseのときに発動
//         wheelFlag = true; // wheelFlagをtrueにして無駄に発動しないように
//         if (e.deltaY > 0) { // ホイールが下方向だったら
//           if (count >= elements.length - 1) { // 要素の数以上に増えないようにcountが要素の数を超えたら
//             // alert(count);
//             // alert(elements.length);
//             count = elements.length - 1; // countを要素の数とする
//           } else {
//             count++; // それまではcountをプラス
//           }
//         } else if (e.deltaY < 0) { // ホイールが上方向だったら
//           if (count <= 0) { // 0より小さくならないようにcountが0以下なら
//             count = 0; // countを0とする
//           } else {
//             count--; // それまではcountをマイナスしていく
//           }
//         }
//         setTimeout(function () { //0.8秒後にwheelFlagをfalseにして次のページめくれるように
//           wheelFlag = false;
//         },800);
//         setTimeout(function () {
//           window.scrollTo({ // count番目の要素へスクロール
//             top: elTop[count],
//             behavior: 'smooth',
//           });
//         },20); // スクロールまで時間差をつけて慣性スクロール対策
//       }

//     });
//   }());
  


(function($) {
    function addBlurTitle() {
        $(".enjoy_text_wrap, .enjoy_text_en_wrap").each(function() {
            var i = $(this).offset().top - 50;
            if ($(window).scrollTop() >= i - $(window).height()) {
                $(this).find(".enjoy_text").each(function(i) {
                    $(this).delay(700 * i).queue(function(next) {
                        $(this).addClass("blur-title");
                        next();
                    });
                });
            }
        });
    }

    // ページが読み込まれたときに関数を実行
    $(document).ready(addBlurTitle);

    // スクロールが発生したときに関数を実行
    $(window).scroll(addBlurTitle);
})(jQuery);

(function($) {
    // IntersectionObserverの設定
    var observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                var img = $(entry.target);
                img.css('backgroundImage', 'url(' + img.data('original') + ')');
                if (img.prop('tagName') === 'VIDEO') {
                    img.addClass('fLazy--loaded');
                }
                img.on('load', function() {
                    img.addClass('fLazy--loaded');
                });
                observer.unobserve(entry.target);
            }
        });
    }, {
        root: null,
        rootMargin: '0px',
        threshold: [0, 1]
    });

    // 画像要素をIntersectionObserverに登録
    $(".seasons .img").each(function() {
        observer.observe(this);
    });
    // テキスト要素を取得
    var textElements = $(".seasons .text_wrap");
    // GSAPの設定
    var tl = gsap.timeline({
        scrollTrigger: {
            trigger: ".seasons",
            start: "-5% center",
            end: function() {
                return "+=" + $(".seasons").height();
            },
            scrub: .2,
            pin: false
        }
    });

    // アニメーションの設定
    $(".seasons .img").each(function(i, el) {
        tl.from(el, {
            opacity: 0,
            rotationX: 20,
            scale: .75,
            duration: 2.0,
        }).to(el, {
            opacity: 1,
            scale: 1.06,
            duration: 2.0,
        });

        // textElements[i]をフェードイン
//         tl.from(textElements[i], {
//     opacity: 0,
//     duration: 0
// }).to(textElements[i], {
//     opacity: 1,
//     duration: 0,
//     delay: -3.0
// }).to(textElements[i], {
//     opacity: 0,
//     duration: 0
// });
// textElements[i]をフェードイン
tl.from(textElements[i], {
            opacity: 0,
            duration: 0,
            zIndex: 1,
            scrollTrigger: {
                trigger: textElements[i],
                start: "-5% center",
                end: function() {
                    return "+=" + $(textElements[i]).height();
                },
                scrub: .2,
                pin: false
            }
        }).to(textElements[i], {
            opacity: 1,
            duration: 0,
            delay: -3.0,
            zIndex: 2,
        }).to(textElements[i], {
            opacity: 0,
            duration: 0,
            zIndex: 1
        });

    });

})(jQuery);



(function($) {
    document.querySelectorAll(".experience_container").forEach(function(e) {
        var tl = gsap.timeline();
        var isMobile = window.innerWidth <= 767; // 画面幅が767px以下の場合にtrue
        var scaleValue = isMobile ? 0.21 : 0.44;

        tl.fromTo(e.children[0], {scale: 1}, {scale: scaleValue});

        var textMoveTl = gsap.timeline();
        textMoveTl.fromTo(".experience_text_left", {x: 0}, {x: "100vw"});
        textMoveTl.fromTo(".experience_text_right", {x: 0}, {x: "-100vw"}, 0);

        var scaleValue2 = isMobile ? 0.45 : 0.58;

        var textScaleTl = gsap.timeline();
        textScaleTl.fromTo(document.querySelector(".experience .experience_text_wrap"), {scale: 1}, {scale: scaleValue2});

        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    document.querySelector(".experience").style.opacity = "1";
                    entry.target.children[0].style.willChange = "transform";
                    document.querySelector(".experience_text_left, .experience_text_right").style.willChange = "transform";
                    tl.scrollTrigger.enable();
                    textMoveTl.scrollTrigger.enable();
                    textScaleTl.scrollTrigger.enable();
                } else {
                    document.querySelector(".experience").style.opacity = "0";
                    entry.target.children[0].style.willChange = "";
                    document.querySelector(".experience_text_left, .experience_text_right").style.willChange = "";
                    tl.scrollTrigger.disable();
                    textMoveTl.scrollTrigger.disable();
                    textScaleTl.scrollTrigger.disable();
                }
            });
        }, {
            root: null,
            rootMargin: "0px",
            threshold: [0, 1]
        });

        var h, b;
        if (isMobile) {
            h = window.innerWidth;
            b = window.innerHeight;
        } else {
            h = $(window).width();
            b = $(window).height();
        }

        [{
            trigger: ".experience",
            scrub: 0,
            start: "top+=".concat(1.5 * b, " top"),
            end: "top+=".concat(3.5 * b, " top"),
            toggleActions: "play none none reverse",
            animation: tl
        }, {
            trigger: ".experience",
            scrub: 0,
            start: "center top",
            end: "bottom top",
            toggleActions: "play none none reverse",
            animation: textMoveTl
        }, {
            trigger: ".experience",
            scrub: 0,
            start: "top+=".concat(1.5 * b, " top"),
            end: "top+=".concat(3.5 * b, " top"),
            toggleActions: "play none none reverse",
            animation: textScaleTl
        }].forEach(function(e) {
            ScrollTrigger.create(e).disable();
        });
        // .modelhouse_wrap1をスクロール位置でフェードインおよびフェードアウト
        ScrollTrigger.create({
            trigger: ".experience",
            start: "top+=".concat(4 * b, " top"), // スクロール位置を調整
            end: "top+=".concat(5 * b, " top"),
            onEnter: function() {
                gsap.to(".modelhouse_wrap1", {opacity: 1, duration: 0.5});
            },
            onLeaveBack: function() {
                gsap.to(".modelhouse_wrap1", {opacity: 0, duration: 0.5});
            }
        });

        observer.observe(e);
    });

    var y = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                entry.target.play();
            } else {
                entry.target.pause();
            }
        });
    }, {
        root: null,
        rootMargin: "0px",
        threshold: 0
    });

    $("movie").each(function() {
        y.observe(this);
    });
})(jQuery);
window.onload = function() {
      // .experienceセクションにスクロールが入ったときのトリガーを設定
  ScrollTrigger.create({
    trigger: ".experience_bg",
    start: "top bottom", // トリガーの開始位置
    end: "bottom top", // トリガーの終了位置
    onEnter: () => showVideo(), // セクションに入ったときの処理
    onLeaveBack: () => hideVideo(), // セクションから出たときの処理
    onLeave: () => hideVideo(), // セクションから出たときの処理（下方向）
    onEnterBack: () => showVideo() // セクションに戻ったときの処理（上方向）
  });
  // .scentセクションにスクロールが入ったときのトリガーを設定
  ScrollTrigger.create({
    trigger: ".scent",
    start: "top bottom", // トリガーの開始位置
    end: "bottom bottom", // トリガーの終了位置
    onEnter: () => changeBgImage(), // セクションに入ったときの処理
    onLeaveBack: () => resetBgImage(), // セクションから出たときの処理
    onLeave: () => changeBgImage(), // セクションから出たときの処理（下方向）
    onEnterBack: () => resetBgImage() // セクションに戻ったときの処理（上方向）
  });
    // .enjoyセクションにスクロールが入ったときのトリガーを設定
    ScrollTrigger.create({
    trigger: ".enjoy",
    start: "top bottom", // トリガーの開始位置
    end: "bottom bottom", // トリガーの終了位置
    onEnter: () => changeBgImageEnjoy(), // セクションに入ったときの処理
    onLeaveBack: () => changeBgImage(), // セクションから出たときの処理
    onLeave: () => changeBgImageEnjoy(), // セクションから出たときの処理（下方向）
    onEnterBack: () => changeBgImageEnjoy() // セクションに戻ったときの処理（上方向）
  });
    // .aestheticsセクションにスクロールが入ったときのトリガーを設定
    ScrollTrigger.create({
        trigger: ".aesthetics",
        start: "top bottom", // トリガーの開始位置
        end: "bottom bottom", // トリガーの終了位置
        onEnter: () => changeBgImageEnjoy(), // セクションに入ったときの処理
        onLeaveBack: () => resetBgImage(), // セクションから出たときの処理
        onLeave: () => resetBgImage(), // セクションから出たときの処理（下方向）
        onEnterBack: () => changeBgImageEnjoy() // セクションに戻ったときの処理（上方向）
      });
};

// .experienceセクションに入ったときに動画を表示する関数
function showVideo() {
    jQuery('.bg_fixed video').css('opacity', '1');
}

// .experienceセクションから出たときに動画を非表示にする関数
function hideVideo() {
    jQuery('.bg_fixed video').css('opacity', '0');
}
// .scentセクションの背景画像を変更する関数
function changeBgImage() {
    jQuery('.bg_fixed').css('background-image', 'url(./wp-content/themes/lightning_child/img/common/aesthetics_bg3.jpg)');
}
// .enjoyセクションの背景画像を変更する関数
function changeBgImageEnjoy() {
    jQuery('.bg_fixed').css('background-image', 'url(./wp-content/themes/lightning_child/img/top/enjoy_bg.jpg)');
}

// 背景画像を元に戻す関数
function resetBgImage() {
    jQuery('.bg_fixed').css('background-image', 'url(./wp-content/themes/lightning_child/img/common/aesthetics_bg2.jpg)');
}

jQuery(function ($) {
    jQuery(window).scroll(function (){
      $('.fadein').each(function(){
        var elemPos = $(this).offset().top,
        scroll = $(window).scrollTop(),
        windowHeight = $(window).height();
        if (scroll > elemPos - windowHeight + 200){
          $(this).addClass('active');
        }
      });
    });
  });


  const movie = document.querySelector('.movie');
  const modelhouseImg = document.querySelector('.modelhouse_wrap .img');
  const modal = document.getElementById('videoModal');
  const closeBtn = document.querySelector('.close');
  const video = document.getElementById('modalVideo');
  
  function openModal() {
      modal.style.display = 'block';
      video.play();
  }
  
  function closeModal() {
      modal.style.display = 'none';
      video.pause();
      video.currentTime = 0;
  }
  
  movie.addEventListener('click', openModal);
  modelhouseImg.addEventListener('click', openModal);
  
  closeBtn.addEventListener('click', closeModal);
  
  window.addEventListener('click', (event) => {
      if (event.target === modal) {
          closeModal();
      }
  });
