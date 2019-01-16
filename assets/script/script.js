// // Manage likes on posts
// const [...posts] = document.querySelectorAll(".post");
//
// // Code do not edit
//
// posts.forEach(post => {
//   const id = post.dataset.id; // Get post ID
//   const likeForm = post.querySelector(".likeFormFeed");
//   const numberOfLikes = post.querySelector(".numberOfLikes");
//
//   likeForm.addEventListener("submit", event => {
//     event.preventDefault();
//
//     const formData = new FormData(likeForm);
//
//     fetch("app/posts/likes-posts.php", {
//       method: "POST",
//       body: formData
//     })
//       .then(response => response.json())
//       .then(json => {
//         console.log(json);
//
//         if (json.action === "liked") {
//           likeForm.querySelector("i").classList.remove("far");
//           likeForm.querySelector("i").classList.add("fas");
//           likeForm.querySelector("i").classList.remove("hartIconFeed");
//           likeForm.querySelector("i").classList.add("redHart");
//
//           numberOfLikes.querySelector(".likeCounterFeed").innerText =
//             json.likeCount;
//         } else {
//           likeForm.querySelector("i").classList.remove("fas");
//           likeForm.querySelector("i").classList.add("far");
//           likeForm.querySelector("i").classList.remove("redHart");
//           likeForm.querySelector("i").classList.add("hartIconFeed");
//
//           numberOfLikes.querySelector(".likeCounterFeed").innerText =
//             json.likeCount;
//         }
//       });
//   });
// });
//
// if (document.querySelector("#myDropdown")) {
//   const editPost = document.querySelector("#myDropdown");
//   const dropbtn = document.querySelector(".dropbtn");
//
//   //Dropdown for edit post.
//   dropbtn.addEventListener("click", () => {
//     editPost.classList.toggle("show");
//   });
// }
