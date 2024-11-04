document.addEventListener("DOMContentLoaded", function () {
  const thumbsWrapper = document.querySelector(".thumbs-swiper");
  const thumbsSlides = thumbsWrapper.querySelectorAll(".swiper-slide");

  if (thumbsSlides.length >= 2) {
    // Initialize the thumbnails swiper
    const thumbsSwiper = new Swiper(".thumbs-swiper", {
      slidesPerView: 4,
      spaceBetween: 10,
      freeMode: true,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
    });

    // Initialize the main swiper and link it with the thumbnails
    const mainSwiper = new Swiper(".main-swiper", {
      loop: true,
      centeredSlides: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      thumbs: {
        swiper: thumbsSwiper,
      },
      speed: 1000,
    });
  } else {
    // Initialize only the main swiper without thumbnails
    const mainSwiper = new Swiper(".main-swiper", {
      loop: true,
      centeredSlides: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      speed: 1000,
    });

    // Hide the thumbnails wrapper
    thumbsWrapper.style.display = "none";
  }

  // Function to initialize a custom select
  function initializeCustomSelect(selectElement) {
    const selectBox = selectElement.querySelector(".select-box");
    const optionsContainer = selectElement.querySelector(".options-container");
    const options = selectElement.querySelectorAll(".option");
    const selectId = selectElement.getAttribute("id");
    const reload = selectElement.getAttribute("reload");
    // Remove active-option class from all options
    function removeActiveClassFromOptions() {
      options.forEach((option) => {
        option.classList.remove("active-option");
      });
    }

    function closeOtherSelectBoxes(currentSelectElement) {
      const allSelectElements = document.querySelectorAll(".custom-select");
      allSelectElements.forEach((select) => {
        if (select !== currentSelectElement) {
          select
            .querySelector(".options-container")
            .classList.remove("select-open");
          select.querySelector(".select-box").classList.remove("rotate180");
        }
      });
    }

    // Open and close the dropdown
    selectBox.addEventListener("click", () => {
      closeOtherSelectBoxes(selectElement);
      optionsContainer.classList.toggle("select-open");
      selectBox.classList.toggle("rotate180");
    });

    // Add click listener to each option
    options.forEach((option) => {
      option.addEventListener("click", () => {
        const selectedOption = option.textContent;
        const optionValue = option.getAttribute("data-value");

        // Set the selected option in the selectBox
        selectBox.textContent = selectedOption;

        // Remove 'active-option' class from all options
        removeActiveClassFromOptions();

        // Add 'active-option' class to the clicked option
        option.classList.add("active-option");

        // Close the options dropdown
        optionsContainer.classList.remove("select-open");
        selectBox.classList.remove("rotate180");

        // Get the current URL
        let url = new URL(window.location.href);
        // Create a new URLSearchParams object from the current query string
        let params = new URLSearchParams(url.search);
        // Add a new parameter or update an existing one
        params.set(selectId, optionValue);
        // Update the URL with the new query string
        url.search = params.toString();

        if (reload == 1) {
          window.location.href = url;
        } else {
          if (optionValue !== "all") {
            window.history.pushState({}, "", url);
          } else {
            params.delete(selectId);
            url.search = params.toString();
            window.history.pushState({}, "", url);
          }
        }
      });
    });

    // Close options container when clicking outside
    document.addEventListener("click", (e) => {
      if (!e.target.closest(".custom-select")) {
        optionsContainer.classList.remove("select-open");
        selectBox.classList.remove("rotate180");
      }
    });
  }

  // Initialize each custom select dropdown
  document.querySelectorAll(".custom-select").forEach((selectElement) => {
    initializeCustomSelect(selectElement);
  });

  //Handle Search
  const btnSearch = document.querySelector(".btn-search");
  if (btnSearch) {
    btnSearch.addEventListener("click", () => {
      let url = new URL(window.location.href);
      let freeword = document.querySelector("#freeword").value;
      freeword && url.searchParams.set("freeword", freeword);
      window.location.href = url;
    });
  }

  // URL Query Clear
  const btnClear = document.querySelector(".btn-clear");
  if (btnClear) {
    btnClear.addEventListener("click", () => {
      let url = new URL(window.location.href);
      url.search = "";
      window.history.pushState({}, "", url);
      window.location.reload();
    });
  }

  // Accordion
  const accordionHeaders = document.querySelectorAll(".sec-search-header");

  accordionHeaders.forEach((header) => {
    header.addEventListener("click", () => {
      const accordionItem = header.parentElement;
      const isActive = accordionItem.classList.contains("accordion-active");

      // Close all accordion items
      document.querySelectorAll(".sec-search").forEach((item) => {
        item.classList.remove("accordion-active");
      });

      // Toggle the clicked accordion item
      if (!isActive) {
        accordionItem.classList.add("accordion-active");
      }
    });
  });

  const areaSelect = document.querySelector("#location");
  const citySelect = document.querySelector("#city");
  const areaOptions = areaSelect && areaSelect.querySelectorAll(".option");
  const cityOptionsContainer = citySelect.querySelector(".options-container");
  const citySelectBox = citySelect.querySelector(".select-box");

  // Function to update city options based on selected area
  function updateCityOptions(selectedArea) {
    const cities = JSON.parse(selectedArea.getAttribute("data-cities") || "[]");
    cityOptionsContainer.innerHTML = "";
    citySelectBox.textContent = "選択してください";

    cities.forEach((city, index) => {
      const cityOption = document.createElement("div");
      cityOption.classList.add("option");
      cityOption.textContent = city;
      cityOption.setAttribute("data-value", city);
      cityOptionsContainer.appendChild(cityOption);

      cityOption.addEventListener("click", function () {
        citySelectBox.textContent = city;
        const currentUrl = new URL(window.location.href);
        currentUrl.searchParams.set("city", index);
        window.history.pushState({}, "", currentUrl);

        cityOptionsContainer.classList.remove("select-open");
        citySelectBox.classList.remove("rotate180");
      });
    });
  }

  // Check for area in URL query and update city options accordingly
  const urlParams = new URLSearchParams(window.location.search);
  const areaParam = urlParams.get("area");
  if (areaParam) {
    const selectedArea = areaSelect.querySelector(
      `.option[data-value="${areaParam}"]`
    );
    if (selectedArea) {
      updateCityOptions(selectedArea);

      const cityParam = urlParams.get("city");
      if (cityParam) {
        const cityOptions = cityOptionsContainer.querySelectorAll(".option");
        if (cityOptions[cityParam]) {
          citySelectBox.textContent = cityOptions[cityParam].textContent;
        }
      }
    }
  }

  areaOptions &&
    areaOptions.forEach((option) => {
      option.addEventListener("click", function () {
        updateCityOptions(this);
      });
    });

  const pagePlanLink = document.getElementById("pagePlanLink");
  const pageLocationLink = document.getElementById("pageLocationLink");
  const pageAccessLink = document.getElementById("pageAccessLink");
  const pageOverviewLink = document.getElementById("pageOverviewLink");

  const pagePlan = document.getElementById("pagePlan");
  const pageLocation = document.getElementById("pageLocation");
  const pageAccess = document.getElementById("pageAccess");
  const pageOverview = document.getElementById("pageOverview");

  // Set initial visibility
  pagePlan.style.display = "block"; // Show pagePlan by default
  pageLocation.style.display = "none";
  pageAccess.style.display = "none";
  pageOverview.style.display = "none";

  // Event listeners to toggle visibility
  pagePlanLink.addEventListener("click", function () {
    pagePlan.style.display = "block";
    pageLocation.style.display = "none";
    pageAccess.style.display = "none";
    pageOverview.style.display = "none";
  });

  pageLocationLink.addEventListener("click", function () {
    pagePlan.style.display = "none";
    pageLocation.style.display = "block";
    pageAccess.style.display = "none";
    pageOverview.style.display = "none";
  });

  pageAccessLink.addEventListener("click", function () {
    pagePlan.style.display = "none";
    pageLocation.style.display = "none";
    pageAccess.style.display = "block";
    pageOverview.style.display = "none";
  });

  pageOverviewLink.addEventListener("click", function () {
    pagePlan.style.display = "none";
    pageLocation.style.display = "none";
    pageAccess.style.display = "none";
    pageOverview.style.display = "block";
  });
});
