if (document.querySelector("#dropdownSettings")) {
  const settings = document.querySelector("#dropdownSettings");
  const dropButton = document.querySelector(".dropButton");

  //Dropdown for settings.
  dropButton.addEventListener("click", () => {
    settings.classList.toggle("show");
  });
}
