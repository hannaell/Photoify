// Manage likes on posts
const [...likeForms] = document.querySelectorAll(".likeFormFeed");

// Code do not edit

likeForms.forEach(likeForm => {
  likeForm.addEventListener("submit", event => {
    event.preventDefault();

    const formData = new FormData(likeForm);

    if (likeForm[1].value === "disliked") {
      likeForm[1].value = "liked";
    } else {
      likeForm[1].value = "disliked";
    }

    fetch("app/posts/likes-posts.php", {
      method: "POST",
      body: formData
    })
      .then(response => response.json())
      .then(
        json =>
          (likeForm.nextElementSibling.nextSibling.previousSibling.textContent =
            json.likes)
      );
  });
});
