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
  let url = "searchNaw.php?searchPersoon=" + data.get("searchPersoon");
  console.log(url);

  fetch(url).then(async (response) => {
    console.log(response);
    let json = await response.json();
    console.log(json);
    ShowPersoon(json);
  });

  // Implementeer hier de logica om de formuliergegevens te verwerken
  // ...
}

function ShowPersoon(json) {
  let person = json[0]; // Aanname: de eerste persoon in de lijst is degene die we willen tonen

  // Update de inhoud van de paragrafen
  document.getElementById("naam").textContent = "Naam: " + person.naam;
  document.getElementById("straat").textContent = "Straat: " + person.straat;
  document.getElementById("huisnummer").textContent =
    "Huisnummer: " + person.huisnummer;
  document.getElementById("postcode").textContent =
    "Postcode: " + person.postcode;
  document.getElementById("email").textContent = "Email: " + person.email;
  // Voeg meer toe indien nodig
}
