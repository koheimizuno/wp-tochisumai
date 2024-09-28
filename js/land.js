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
