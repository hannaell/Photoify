//Saving input and img elements from document
const input = document.querySelector(".inputUpload");
const preview = document.querySelector(".uploadPhoto");

//Function for putting preview of chosen picture on the page
const showPreview = input => {
  if (input.files && input.files[0]) {
    let reader = new FileReader();
    reader.onload = e => {
      preview.src = e.target.result;
    };
    reader.readAsDataURL(input.files[0]);
  }
};
//Waiting for a image to be chosen in input element
input.addEventListener("input", () => {
  showPreview(input);
});
