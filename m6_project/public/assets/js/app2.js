const searchForm = document.getElementById("searchForm");

// Voeg een event listener toe aan het formulier
searchForm.addEventListener("submit", (event) => {
  // Roep de searchPersoon functie aan en geef het event door
  searchPersoon(event);
});

function searchPersoon(event) {
  console.log("Formulier verzonden");
  // Voorkom het standaard verzendgedrag van het formulier
  event.preventDefault();
  let form = event.target;
  const data = new FormData(form);
  let url = "search.php?search=" + data.get("searchPersoon");
  console.log(url);

  fetch(url).then(async (response) => {
    console.log(response);
    let json = await response.json();
    console.log(json);
  });

  // Implementeer hier de logica om de formuliergegevens te verwerken
  // ...
}
