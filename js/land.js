document.addEventListener("DOMContentLoaded", function () {
  // Initialize the thumbnails swiper first
  const thumbsSwiper = new Swiper(".thumbs-swiper", {
    slidesPerView: 4, // Number of thumbnails to show at once
    spaceBetween: 10, // Space between thumbnails
    freeMode: true, // Allows free scrolling through the thumbnails
    watchSlidesVisibility: true, // Ensures visible slides are updated
    watchSlidesProgress: true, // Tracks progress of the slides
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
      swiper: thumbsSwiper, // Link to the thumbs swiper
    },
    speed: 1000, // Transition speed for the main slider
  });
});

// JavaScript for handling multiple custom select elements

// Function to initialize a custom select
function initializeCustomSelect(selectElement) {
  const selectBox = selectElement.querySelector(".select-box");
  const optionsContainer = selectElement.querySelector(".options-container");
  const options = selectElement.querySelectorAll(".option");
  const selectId = selectElement.getAttribute("id");
  // Remove active-option class from all options
  function removeActiveClassFromOptions() {
    options.forEach((option) => {
      option.classList.remove("active-option");
    });
  }

  // Open and close the dropdown
  selectBox.addEventListener("click", () => {
    optionsContainer.classList.toggle("select-open");
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

      // Get the current URL
      let url = new URL(window.location.href);
      // Create a new URLSearchParams object from the current query string
      let params = new URLSearchParams(url.search);
      // Add a new parameter or update an existing one
      params.set(selectId, optionValue);
      // Update the URL with the new query string
      url.search = params.toString();
      // Update the browser's address bar without reloading the page
      window.location.href = url;
    });
  });

  // Close options container when clicking outside
  document.addEventListener("click", (e) => {
    if (!e.target.closest(".custom-select")) {
      optionsContainer.classList.remove("select-open");
    }
  });
}

// Initialize each custom select dropdown
document.querySelectorAll(".custom-select").forEach((selectElement) => {
  initializeCustomSelect(selectElement);
});
