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

const selectBox = document.getElementById("selectBox");
const optionsContainer = document.getElementById("optionsContainer");
const options = document.querySelectorAll(".option");

selectBox.addEventListener("click", () => {
  optionsContainer.classList.toggle("select-active");
  console.log("click");
});
var ajax_object = {
  ajax_url: "http://localhost/tochisumai/wp-admin/admin-ajax.php",
  nonce: "1234567890",
};

options.forEach((option) => {
  option.addEventListener("click", () => {
    selectBox.textContent = option.textContent;
    optionsContainer.classList.remove("select-active");

    const data = new FormData();
    data.append("action", "process_selection");
    data.append("selected_value", selectBox.textContent);
    data.append("security", ajax_object.nonce);

    fetch(ajax_object.ajax_url, {
      method: "POST",
      credentials: "same-origin",
      body: data,
    })
      .then((response) => {
        if (!response.ok) {
          return response.text().then((text) => {
            throw new Error(
              `HTTP error! status: ${response.status}, body: ${text}`
            );
          });
        }
        return response.json();
      })
      .then((data) => {
        console.log("Success:", data);
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  });
});

document.addEventListener("click", (e) => {
  if (!e.target.closest(".custom-select")) {
    optionsContainer.classList.remove("select-active");
  }
});
