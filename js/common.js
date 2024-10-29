jQuery(function ($) {
  $(".nav_btn_wrap").on("click", function () {
    $(this).toggleClass("active");
    $(".header_nav").toggleClass("active");
    $("body").toggleClass("nav-open");
  });
});

jQuery(function ($) {
  $(".header_nav_text").on("click", function () {
    $(this).toggleClass("header-active").next(".footer_nav").slideToggle();
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const footerNavWraps = document.querySelectorAll(".footer_nav_wrap");
  let isMobile = window.innerWidth < 768;

  function setupAccordion() {
    footerNavWraps.forEach((wrap) => {
      const navText = wrap.querySelector(".footer_nav_text");
      const navMenu = wrap.querySelector(".footer_nav");

      if (navText && navMenu) {
        const mainLink = navText.querySelector("a");

        // 「粋を知る」のリンクはスキップ
        if (mainLink && mainLink.textContent.trim() === "粋を知る") {
          return;
        }

        if (isMobile) {
          if (!wrap.querySelector(".accordion-toggle")) {
            const toggleBtn = document.createElement("button");
            toggleBtn.className = "accordion-toggle";
            toggleBtn.innerHTML = '<span aria-hidden="true">▼</span>';
            toggleBtn.setAttribute("aria-expanded", "false");
            navText.appendChild(toggleBtn);

            toggleBtn.addEventListener("click", function (e) {
              e.preventDefault();
              toggleAccordion(this, navMenu, wrap);
            });

            if (mainLink) {
              mainLink.addEventListener("click", preventDefault);
              mainLink.addEventListener("click", function () {
                toggleAccordion(toggleBtn, navMenu, wrap);
              });
            } else {
              navText.style.cursor = "pointer";
              navText.setAttribute("aria-expanded", "false");
              navText.addEventListener("click", function (e) {
                e.preventDefault();
                toggleAccordion(this, navMenu, wrap);
              });
            }
          }
          navMenu.classList.add("accordion-content");
          navMenu.style.maxHeight = "0px";
        } else {
          // デスクトップの場合は通常表示に戻す
          const toggleBtn = wrap.querySelector(".accordion-toggle");
          if (toggleBtn) {
            toggleBtn.remove();
          }
          if (mainLink) {
            mainLink.removeEventListener("click", preventDefault);
          }
          navText.style.cursor = "";
          navText.removeAttribute("aria-expanded");
          navMenu.classList.remove("accordion-content");
          navMenu.style.maxHeight = "";
          wrap.classList.remove("accordion-active");
        }
      }
    });
  }

  function toggleAccordion(element, navMenu, wrap) {
    const expanded = element.getAttribute("aria-expanded") === "true" || false;
    element.setAttribute("aria-expanded", !expanded);

    if (expanded) {
      navMenu.style.maxHeight = "0px";
      wrap.classList.remove("accordion-active");
    } else {
      navMenu.style.maxHeight = navMenu.scrollHeight + "px";
      wrap.classList.add("accordion-active");
    }

    if (element.querySelector("span")) {
      element.querySelector("span").textContent = expanded ? "▼" : "▲";
    }
  }

  function preventDefault(e) {
    if (isMobile) {
      e.preventDefault();
    }
  }

  // 初期設定
  setupAccordion();

  // リサイズイベントのリスナー
  window.addEventListener("resize", function () {
    const newIsMobile = window.innerWidth < 768;
    if (newIsMobile !== isMobile) {
      isMobile = newIsMobile;
      setupAccordion();
    }
  });

  // スタイルを動的に追加
  const style = document.createElement("style");
  style.textContent = `
    @media (max-width: 767px) {
      .accordion-toggle {
        background: none;
        border: none;
        cursor: pointer;
        padding: 0 5px;
      }
      .footer_nav_text {
        display: flex;
        justify-content: space-between;
        align-items: center;
      }
      .accordion-content {
        overflow: hidden;
        transition: max-height 0.3s ease-out;
      }
      .accordion-active .footer_nav_text {
        /* アクティブ時のスタイルをここに追加 */
        font-weight: bold;
      }
    }
  `;
  document.head.appendChild(style);
});

document.addEventListener("DOMContentLoaded", function () {
  // URLからパラメータを取得する関数
  function getParameterByName(name, url = window.location.href) {
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
      results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return "";
    return decodeURIComponent(results[2].replace(/\+/g, " "));
  }

  // イベント名パラメータを取得
  var eventName = getParameterByName("event-name");

  // イベント名が存在する場合、フォームに自動入力
  if (eventName) {
    var eventNameInput = document.getElementById("event-name");
    if (eventNameInput) {
      eventNameInput.value = eventName;
    }
  }
});

jQuery(function ($) {
  // MW WP Form autocomplete属性付与
  const formAttr = [
    // ["name属性値", "autocomplete属性値"] で記述
    ["name", "name"],
    ["kana", "off"], // フリガナは自動補完を無効にする場合
    ["email", "email"],
    ["zip", "postal-code"],
    ["prefecture", "address-level1"],
    ["address", "address-line1"],
    ["address02", "address-line2"],
    ["tel[data][0]", "tel"],
    ["tel[data][1]", "tel"],
    ["tel[data][2]", "tel"],
  ];

  const formAttrLen = formAttr.length;

  for (let i = 0; i < formAttrLen; i++) {
    // 特殊文字を含むname属性に対応するため、エスケープが必要な場合に考慮
    $("[name='" + formAttr[i][0] + "']").attr("autocomplete", formAttr[i][1]);
  }
});

jQuery(function ($) {
  // MW WP Form autocomplete属性付与
  const formAttr = [
    // ["name属性値", "autocomplete属性値"] で記述
    ["name", "name"],
    ["kana", "off"], // フリガナは自動補完を無効にする場合
    ["email", "email"],
    ["zip", "postal-code"],
    ["prefecture", "address-level1"],
    ["address", "address-line1"],
    ["address02", "address-line2"],
    ["address03", "address-line3"],
    ["tel[data][0]", "tel"],
    ["tel[data][1]", "tel"],
    ["tel[data][2]", "tel"],
    ["event-name", "off"], // イベント名は自動補完を無効にする
    ["event-day", "off"], // 日付は手動で選択
    ["event-time", "off"], // 時間指定は無効
    ["budget", "off"], // 予算も無効
    ["have-area", "off"], // 建築予定地に関するラジオボタン
    ["land-require", "off"], // 土地探し希望に関するラジオボタン
    ["other", "off"], // その他の意見や質問に関して無効
  ];

  const formAttrLen = formAttr.length;

  for (let i = 0; i < formAttrLen; i++) {
    // 特殊文字を含むname属性に対応するため、エスケープが必要な場合に考慮
    $("[name='" + formAttr[i][0] + "']").attr("autocomplete", formAttr[i][1]);
  }
});

jQuery(function ($) {
  // フォームフィールドに対して autocomplete 属性を付与
  const formAttr = [
    ["name", "name"], // 名前用の自動補完
    ["kana", "off"], // フリガナは自動補完を無効
    ["email", "email"], // メールアドレス自動補完
    ["tel[data][0]", "tel"], // 電話番号（前半）自動補完
    ["tel[data][1]", "tel"], // 電話番号（中間）自動補完
    ["tel[data][2]", "tel"], // 電話番号（後半）自動補完
    ["place", "off"], // 見学場所は自動補完を無効化
    ["want-day01", "off"], // 第1希望日時は手動で設定
    ["want-time01", "off"], // 第1希望時間は手動で設定
    ["want-day02", "off"], // 第2希望日時は手動で設定
    ["want-time02", "off"], // 第2希望時間は手動で設定
    ["want-day03", "off"], // 第3希望日時は手動で設定
    ["want-time03", "off"], // 第3希望時間は手動で設定
  ];

  // 自動補完属性をフィールドに追加
  const formAttrLen = formAttr.length;
  for (let i = 0; i < formAttrLen; i++) {
    $("[name='" + formAttr[i][0] + "']").attr("autocomplete", formAttr[i][1]);
  }
});

jQuery(function ($) {
  // フォームフィールドに対して autocomplete 属性を付与
  const formAttr = [
    ["name", "name"], // 名前用の自動補完
    ["kana", "off"], // フリガナは自動補完を無効
    ["email", "email"], // メールアドレス自動補完
    ["zip", "postal-code"], // 郵便番号自動補完
    ["prefecture", "address-level1"], // 都道府県
    ["address", "address-line1"], // 市区町村
    ["address02", "address-line2"], // 町名・番地
    ["address03", "address-line3"], // 建物名
    ["tel[data][0]", "tel"], // 電話番号
    ["tel[data][1]", "tel"], // 電話番号
    ["tel[data][2]", "tel"], // 電話番号
    ["exhibition", "off"], // 展示場は自動補完を無効
    ["want-day01", "off"], // 第1希望日
    ["want-time01", "off"], // 第1希望時間
    ["want-day02", "off"], // 第2希望日
    ["want-time02", "off"], // 第2希望時間
    ["want-day03", "off"], // 第3希望日
    ["want-time03", "off"], // 第3希望時間
    ["have-area", "off"], // 建築予定地のラジオボタン
  ];

  const formAttrLen = formAttr.length;
  for (let i = 0; i < formAttrLen; i++) {
    $("[name='" + formAttr[i][0] + "']").attr("autocomplete", formAttr[i][1]);
  }
});

document.addEventListener("DOMContentLoaded", function () {
  // 初期設定：最初のタブとそのコンテンツを表示
  var firstTabLink = document.querySelector(".tab-link");
  var firstTabContent = document.querySelector(".tab-content");

  // 最初のタブに 'active' クラスを追加
  firstTabLink.classList.add("active");
  // 最初のコンテンツを表示
  firstTabContent.style.display = "block";

  // タブリンクのクリックイベント
  document.querySelectorAll(".tab-link").forEach(function (tab) {
    tab.addEventListener("click", function () {
      var target = this.getAttribute("data-target");

      // すべてのタブコンテンツを非表示にする
      document.querySelectorAll(".tab-content").forEach(function (content) {
        content.style.display = "none";
      });

      // 対象のタブコンテンツを表示する
      document.querySelector("." + target).style.display = "block";

      // すべてのタブリンクから 'active' クラスを削除する
      document.querySelectorAll(".tab-link").forEach(function (tab) {
        tab.classList.remove("active");
      });

      // クリックされたタブリンクに 'active' クラスを追加する
      this.classList.add("active");
    });
  });
});

jQuery(document).ready(function ($) {
  var $wantArea = $(".want-area");
  var $areaSelect = $("#area-select");

  // 初期状態で選択肢を表示する
  $areaSelect.show();

  // 初期選択肢を設定
  $areaSelect.html('<option value="">選択してください</option>');

  $wantArea.each(function () {
    let item = $(this);
    item.on("change", function () {
      let selectedArea = $(this).val();
      let areaSelect = $(this).closest(".d-flex").find(".area-select");
      areaSelect.html('<option value="">選択してください</option>');
      switch (selectedArea) {
        case "茨城県北茨城市":
          areaSelect.append(
            $("<option>", {
              value: "パークサイド磯原",
              text: "パークサイド磯原",
            })
          );
          break;
        case "茨城県常陸太田市":
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン常陸太田山下町",
              text: "ノーブルガーデン常陸太田山下町",
            })
          );
          break;
        case "茨城県常陸大宮市":
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン抽ヶ台南",
              text: "ノーブルガーデン抽ヶ台南",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン常陸大宮市下町",
              text: "ノーブルガーデン常陸大宮市下町",
            })
          );
          break;
        case "茨城県日立市":
          areaSelect.append(
            $("<option>", {
              value: "日立市宮田町1丁目",
              text: "日立市宮田町1丁目",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "日立市助川町",
              text: "日立市助川町",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "日立市末広町三丁目",
              text: "日立市末広町三丁目",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン金沢町4丁目",
              text: "ノーブルガーデン金沢町4丁目",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン鮎川町5丁目",
              text: "ノーブルガーデン鮎川町5丁目",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン南高野町2丁目",
              text: "ノーブルガーデン南高野町2丁目",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン千石町2丁目",
              text: "ノーブルガーデン千石町2丁目",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン水木町",
              text: "ノーブルガーデン水木町",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "日立市東多賀町三丁目",
              text: "日立市東多賀町三丁目",
            })
          );
          break;
        case "茨城県那珂市":
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン菅谷東2期",
              text: "ノーブルガーデン菅谷東2期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン竹ノ内",
              text: "ノーブルガーデン竹ノ内",
            })
          );
          break;
        case "茨城県東海村":
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン豊岡",
              text: "ノーブルガーデン豊岡",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ブリージア東海白方中央",
              text: "ブリージア東海白方中央",
            })
          );
          break;
        case "茨城県ひたちなか市":
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン田彦4期",
              text: "ノーブルガーデン田彦4期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン稲田2期",
              text: "ノーブルガーデン稲田2期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン東大島3丁目",
              text: "ノーブルガーデン東大島3丁目",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン田彦3期",
              text: "ノーブルガーデン田彦3期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン馬渡6期",
              text: "ノーブルガーデン馬渡6期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン西大島2期",
              text: "ノーブルガーデン西大島2期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン六ツ野5期",
              text: "ノーブルガーデン六ツ野5期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン六ツ野6期",
              text: "ノーブルガーデン六ツ野6期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン六ツ野7期",
              text: "ノーブルガーデン六ツ野7期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン六ツ野8期",
              text: "ノーブルガーデン六ツ野8期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ひたちなか市馬渡7期",
              text: "ひたちなか市馬渡7期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン高場4期",
              text: "ノーブルガーデン高場4期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "レーガベーネ笹野町",
              text: "レーガベーネ笹野町",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン武田3期",
              text: "ノーブルガーデン武田3期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ウィステリア外野2期",
              text: "ウィステリア外野2期",
            })
          );
          break;
        case "茨城県水戸市":
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン元吉田4期",
              text: "ノーブルガーデン元吉田4期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "水戸市中丸町",
              text: "水戸市中丸町",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "笠原町中組",
              text: "笠原町中組",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "エムズタウン笠原5期",
              text: "エムズタウン笠原5期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン笠原2期",
              text: "ノーブルガーデン笠原2期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン笠原4期",
              text: "ノーブルガーデン笠原4期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン見和5期",
              text: "ノーブルガーデン見和5期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン浜田小南",
              text: "ノーブルガーデン浜田小南",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン千波小南",
              text: "ノーブルガーデン千波小南",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "トラストガーデン河和田2期",
              text: "トラストガーデン河和田2期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン南赤塚",
              text: "ノーブルガーデン南赤塚",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン南赤塚",
              text: "ノーブルガーデン南赤塚",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン笠原中南",
              text: "ノーブルガーデン笠原中南",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン見川3丁目",
              text: "ノーブルガーデン見川3丁目",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン見和3期",
              text: "ノーブルガーデン見和3期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン千波緑岡2期",
              text: "ノーブルガーデン千波緑岡2期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン酒門2期",
              text: "ノーブルガーデン酒門2期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン酒門2期",
              text: "ノーブルガーデン酒門2期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン見和4期",
              text: "ノーブルガーデン見和4期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ステージガーデン米沢3期",
              text: "ステージガーデン米沢3期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン米沢南",
              text: "ノーブルガーデン米沢南",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン見川2丁目",
              text: "ノーブルガーデン見川2丁目",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン浜田小南2期",
              text: "ノーブルガーデン浜田小南2期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン浜田小南2期",
              text: "ノーブルガーデン浜田小南2期",
            })
          );
          break;
        case "茨城県笠間市":
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン美原3期",
              text: "ノーブルガーデン美原3期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン旭町",
              text: "ノーブルガーデン旭町",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "セレクトタウン友部",
              text: "セレクトタウン友部",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン笠間市鴻巣",
              text: "ノーブルガーデン笠間市鴻巣",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン美原3期",
              text: "ノーブルガーデン美原3期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン美原4期",
              text: "ノーブルガーデン美原4期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン美原4期",
              text: "ノーブルガーデン美原4期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン美原5期",
              text: "ノーブルガーデン美原5期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン鯉淵2期",
              text: "ノーブルガーデン鯉淵2期",
            })
          );
          break;
        case "茨城県土浦市":
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン真鍋4丁目",
              text: "ノーブルガーデン真鍋4丁目",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "土浦市神立中央",
              text: "土浦市神立中央",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "土浦市神立町前山",
              text: "土浦市神立町前山",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ステージガーデン並木5丁目",
              text: "ステージガーデン並木5丁目",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン下高津",
              text: "ノーブルガーデン下高津",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン真鍋2丁目6期",
              text: "ノーブルガーデン真鍋2丁目6期",
            })
          );
          break;
        case "茨城県阿見町":
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデンうずら野4期",
              text: "ノーブルガーデンうずら野4期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "アストシティ阿見／荒川本郷",
              text: "アストシティ阿見／荒川本郷",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデンうずら野2期",
              text: "ノーブルガーデンうずら野2期",
            })
          );
          break;
        case "茨城県牛久市":
          areaSelect.append(
            $("<option>", {
              value: "ひたち野東2丁目",
              text: "ひたち野東2丁目",
            })
          );
          break;
        case "茨城県つくば市":
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン上河原崎4期",
              text: "ノーブルガーデン上河原崎4期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン倉掛",
              text: "ノーブルガーデン倉掛",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン陣場3期",
              text: "ノーブルガーデン陣場3期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン陣場4期",
              text: "ノーブルガーデン陣場4期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ブリージアつくば陣場",
              text: "ブリージアつくば陣場",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデンみどりの南3期",
              text: "ノーブルガーデンみどりの南3期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン万博記念公園4期",
              text: "ノーブルガーデン万博記念公園4期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン万博記念公園5期",
              text: "ノーブルガーデン万博記念公園5期",
            })
          );
          break;
        case "茨城県つくばみらい市":
          areaSelect.append(
            $("<option>", {
              value: "つくばみらい市陽光台",
              text: "つくばみらい市陽光台",
            })
          );
          break;
        case "茨城県かすみがうら市":
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン稲吉5丁目",
              text: "ノーブルガーデン稲吉5丁目",
            })
          );
          break;
        case "茨城県守谷市":
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン守谷市松前台3丁目",
              text: "ノーブルガーデン守谷市松前台3丁目",
            })
          );
          break;
        case "茨城県龍ケ崎市":
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン白羽4丁目",
              text: "ノーブルガーデン白羽4丁目",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ブリージア松ヶ丘",
              text: "ブリージア松ヶ丘",
            })
          );
          break;
        case "茨城県神栖市":
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン大野原中央2期",
              text: "ノーブルガーデン大野原中央2期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン神栖3丁目",
              text: "ノーブルガーデン神栖3丁目",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "アウェイク神栖・大野原中央",
              text: "アウェイク神栖・大野原中央",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン軽野小学校東",
              text: "ノーブルガーデン軽野小学校東",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン土合本町1丁目2期",
              text: "ノーブルガーデン土合本町1丁目2期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン知手前野",
              text: "ノーブルガーデン知手前野",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "神栖市土合本町1丁目",
              text: "神栖市土合本町1丁目",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン知手中央2期",
              text: "ノーブルガーデン知手中央2期",
            })
          );
          break;
        case "茨城県鹿嶋市":
          areaSelect.append(
            $("<option>", {
              value: "鹿嶋市厨5丁目",
              text: "鹿嶋市厨5丁目",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン宮津台４期",
              text: "ノーブルガーデン宮津台４期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン神野",
              text: "ノーブルガーデン神野",
            })
          );
          break;
        case "茨城県古河市":
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン上辺見2期",
              text: "ノーブルガーデン上辺見2期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "シーズンフォレスト上辺見",
              text: "シーズンフォレスト上辺見",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "古河市下大野2期",
              text: "古河市下大野2期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン西牛谷",
              text: "ノーブルガーデン西牛谷",
            })
          );
          break;
        case "茨城県筑西市":
          areaSelect.append(
            $("<option>", {
              value: "菅谷2期",
              text: "菅谷2期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン榎生",
              text: "ノーブルガーデン榎生",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "筑西市横島",
              text: "筑西市横島",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン筑西市丙",
              text: "ノーブルガーデン筑西市丙",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン市野辺2期",
              text: "ノーブルガーデン市野辺2期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン川島2期",
              text: "ノーブルガーデン川島2期",
            })
          );
          break;
        case "茨城県桜川市":
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン富士見台",
              text: "ノーブルガーデン富士見台",
            })
          );

          break;
        case "栃木県宇都宮市":
          areaSelect.append(
            $("<option>", {
              value: "アリエス・テラス江曽島",
              text: "アリエス・テラス江曽島",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "宇都宮市細谷町",
              text: "宇都宮市細谷町",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン平松本町2期",
              text: "ノーブルガーデン平松本町2期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "宇都宮市下荒針町",
              text: "宇都宮市下荒針町",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "宇都宮市宮原2期",
              text: "宇都宮市宮原2期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "宇都宮市駒生町",
              text: "宇都宮市駒生町",
            })
          );
          break;
        case "栃木県鹿沼市":
          areaSelect.append(
            $("<option>", {
              value: "晃望台通り西",
              text: "晃望台通り西",
            })
          );
          break;
        case "栃木県真岡市":
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン熊倉町",
              text: "ノーブルガーデン熊倉町",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "真岡市上高間木",
              text: "真岡市上高間木",
            })
          );
          break;
        case "栃木県下野市":
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン下石橋",
              text: "ノーブルガーデン下石橋",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン小金井3丁目2期",
              text: "ノーブルガーデン小金井3丁目2期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "下野小金井ネスト",
              text: "下野小金井ネスト",
            })
          );
          break;
        case "栃木県栃木市":
          areaSelect.append(
            $("<option>", {
              value: "都賀平川2期",
              text: "都賀平川2期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "マルワタウン今泉町２期",
              text: "マルワタウン今泉町２期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "マルワタウン運動公園東",
              text: "マルワタウン運動公園東",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "マルワタウン大宮町13期",
              text: "マルワタウン大宮町13期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "箱森小平区画整理2期",
              text: "箱森小平区画整理2期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "マルワタウン片柳町6期",
              text: "マルワタウン片柳町6期",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "栃木市昭和町3期",
              text: "栃木市昭和町3期",
            })
          );
          break;
        case "栃木県佐野市":
          areaSelect.append(
            $("<option>", {
              value: "佐野市堀米町",
              text: "佐野市堀米町",
            })
          );
          break;
        case "栃木県小山市":
          areaSelect.append(
            $("<option>", {
              value: "小山市東城南",
              text: "小山市東城南",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "小山市犬塚2丁目",
              text: "小山市犬塚2丁目",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "楽園の森ひととのやヴィレッジ",
              text: "楽園の森ひととのやヴィレッジ",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン横倉新田",
              text: "ノーブルガーデン横倉新田",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン城東3丁目",
              text: "ノーブルガーデン城東3丁目",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン駅南町2丁目",
              text: "ノーブルガーデン駅南町2丁目",
            })
          );
          break;
        case "千葉県柏市":
          areaSelect.append(
            $("<option>", {
              value: "柏市手賀の杜5丁目2期",
              text: "柏市手賀の杜5丁目2期",
            })
          );
          break;
        case "千葉県流山市":
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン流山セントラルパーク",
              text: "ノーブルガーデン流山セントラルパーク",
            })
          );
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン流山セントラルパーク駅北",
              text: "ノーブルガーデン流山セントラルパーク駅北",
            })
          );
          break;
        case "千葉県我孫子市":
          areaSelect.append(
            $("<option>", {
              value: "ノーブルガーデン我孫子市栄",
              text: "ノーブルガーデン我孫子市栄",
            })
          );
          break;
        case "千葉県印西市":
          areaSelect.append(
            $("<option>", {
              value: "印西市鹿黒南2期",
              text: "印西市鹿黒南2期",
            })
          );
          break;
        default:
          break;
      }
    });
  });

  $(".zipSubmit").on("click", function () {
    const zipCode = $("#zip").val();

    if (zipCode.length === 7) {
      // Japanese zip codes are 7 digits
      $.ajax({
        url: `https://zipcloud.ibsnet.co.jp/api/search?zipcode=${zipCode}`,
        type: "GET",
        dataType: "jsonp",
        success: function (data) {
          if (data && data.results) {
            const result = data.results[0];
            const address = `${result.address1} ${result.address2} ${result.address3}`;
            $("#pref").val(result.address1);
            $("#city").val(result.address2);
            $("#address02").val(result.address3);
          } else {
            $(".zip-error").text("アドレスが見つかりませんでした。");
          }
        },
        error: function () {
          $(".zip-error").text("アドレスの取得に失敗しました。");
        },
      });
    } else {
      $(".zip-error").text("7桁の郵便番号を入力してください。");
    }
  });
});

jQuery(function ($) {
  // 初期状態で全てのフォームを非表示
  $(".area-form01, .other-form, .hope-area-wrapper").hide();

  // ラジオボタンの変更を監視
  $('input[name="contact"]').change(function () {
    // 全てのフォームを一旦非表示
    $(".area-form01, .other-form").hide();

    var selectedValue = $(this).val();

    // 選択された値に応じて対応するフォームを表示
    if (selectedValue === "資料請求したい") {
      $(".area-form01").show();
    } else if (selectedValue === "その他") {
      $(".other-form").show();
    }

    // hiddenフィールドの初期設定
    if ($('input[name="mw-wp-form-post-title"]').length === 0) {
      $("<input>")
        .attr({
          type: "hidden",
          name: "mw-wp-form-post-title",
          value: selectedValue,
        })
        .appendTo("form");
    } else {
      $('input[name="mw-wp-form-post-title"]').val(selectedValue);
    }

    // 資料請求したいが選択された場合の処理
    if (selectedValue === "資料請求したい") {
      // ご希望場所のセレクトボックスを初期化
      $('#hope-area option[value="選択してください"]').remove();

      // 最初の有効な選択肢を選択
      var firstValue = $("#hope-area option:first").val();
      // $('#hope-area').val(firstValue);

      // hiddenフィールドに投稿タイトルと希望場所の値を設定
      $('input[name="mw-wp-form-post-title"]').val(
        postTitle + " - " + firstValue
      );

      // ご希望場所の選択が変更されたときのイベントリスナーを設定
      $("#hope-area").on("change", function () {
        var hopeAreaValue = $(this).val();
        $('input[name="mw-wp-form-post-title"]').val(
          postTitle + " - " + hopeAreaValue
        );
      });

      $("#hope-area").closest("dl").hide();
    } else {
      // 資料請求したい以外が選択された場合の処理
      $("#hope-area").off("change");

      // 「選択してください」オプションを戻す（必要な場合）
      if ($('#hope-area option[value="選択してください"]').length === 0) {
        $("#hope-area").prepend(
          '<option value="選択してください">選択してください</option>'
        );
      }
      // $('#hope-area').val('選択してください');
    }
  });
});

$(document).ready(function () {
  $('[data-fancybox="images_buttons"]').fancybox({
    buttons: [
      "zoom",
      "share",
      "slideShow",
      "fullScreen",
      "download",
      "thumbs",
      "close",
    ],
    thumbs: {
      autoStart: false,
    },
  });
});

function logTitle(title) {
  if (title) document.getElementById("hope-area").value = title;
}
