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
    .then((data) => {
      showLink(data);
      console.log(data);
    })
    .catch((error) => console.error("Error:", error));
}

function showLink(json) {
  console.log("showLink aangeroepen", json);
  if (json.downloadlink) {
    let linkElement = document.getElementById("link");
    linkElement.style.display = "block";
    linkElement.setAttribute("href", "http://" + json.downloadlink);
    linkElement.textContent = "Download het plaatje";

    generateQRCode(json.downloadlink);
  }
}

function generateQRCode(url) {
  let qrContainer = document.getElementById("qrcode");
  qrContainer.innerHTML = "";
  new QRCode(qrContainer, {
    text: url,
    width: 128,
    height: 128,
  });
}
