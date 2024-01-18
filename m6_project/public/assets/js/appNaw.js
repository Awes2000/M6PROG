function FormToDictionary(form) {
  const data = new FormData(form);
  let formKeyValue = {};
  for (const [name, value] of data) {
    formKeyValue[name] = value;
  }
  return formKeyValue;
}

function addPerson(event) {
  event.preventDefault(); // Voorkom het standaardgedrag van het formulier

  let form = event.target;
  let jsonForm = FormToDictionary(form);
  console.log(jsonForm);

  let options = {
    method: "POST",
    cache: "no-cache",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(jsonForm),
  };

  fetch("nawopslaan2.php", options)
    .then(async (response) => {
      console.log(response);
      let json = await response.json();
      console.log(json);
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

let nawform = document.getElementById("nawForm");
nawform.addEventListener("submit", addPerson);
