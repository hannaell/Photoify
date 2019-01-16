const portraitThumbnailImage = [...document.querySelectorAll(".photoProfile")];
portraitThumbnailImage.map(img => {
  img.clientHeight > img.clientWidth
    ? img.classList.add("portrait")
    : img.classList.add("landscape");
});
