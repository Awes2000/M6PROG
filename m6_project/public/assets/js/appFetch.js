let getForm = document.getElementById("getForm");

let postForm = document.getElementById("postForm");

postForm.addEventListener("submit", (event) => {
  event.preventDefault();
  toPhpwithPost(event);
});

function toPhpwithget(event) {
  let form = event.target;
  const data = new FormData(form);

  console.log(data.get("article"));
  console.log(data.get("maxPrice"));
  let url =
    "fetchGet.php?article=" +
    data.get("article") +
    "&maxPrice=" +
    data.get("maxPrice");
  fetch(url).then((response) => {
    console.log(response);
  });
}

function toPhpwithPost(event) {
  let form = event.target;
  let jsonForm = FormToDictionary(form);
  console.log(jsonForm);
  let options = {
    method: "POST",
    cache: "no-cache",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(jsonForm),
  };
  fetch("fetchPost.php", options).then(async (response) => {
    console.log(response);
  });
  console.log(options);
}

function FormToDictionary(form) {
  const data = new FormData(form);
  let formKeyValue = {};
  for (const [name, value] of data) {
    formKeyValue[name] = value;
  }
  return formKeyValue;
}

getForm.addEventListener("submit", (event) => {
  event.preventDefault();
  toPhpwithget(event);
});
