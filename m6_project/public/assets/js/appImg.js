function FormToDictionary(form) {
  const data = new FormData(form);
  return data; // Gebruik FormData direct voor bestandsupload
}

document.addEventListener("DOMContentLoaded", () => {
  const imageForm = document.getElementById("imageForm"); // Zorg dat dit overeenkomt met de ID van je formulier

  imageForm.addEventListener("submit", (event) => {
    event.preventDefault();
    uploadFormFile(imageForm);
  });
});

function uploadFormFile(form) {
  let formData = new FormData(form);

  let options = {
    method: "POST",
    body: formData,
  };

  fetch("imagereceive.php", options)
    .then((response) => response.json())
    .then((data) => console.log(data))
    .catch((error) => console.error("Error:", error));
}
