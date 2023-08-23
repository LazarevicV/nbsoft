function validateName(name) {
  return /^[a-zA-Z\s]+$/.test(name);
}

function validateGender(gender) {
  return gender !== "";
}

function validateBirthYear(year) {
  const currentYear = new Date().getFullYear();
  const parsedYear = parseInt(year);
  return !isNaN(parsedYear) && parsedYear >= 1900 && parsedYear <= currentYear;
}

function validateCity(city) {
  return /^[a-zA-Z\s]+$/.test(city);
}

function validateAddress(address) {
  return /^[a-zA-Z0-9\s#]+$/.test(address);
}

function validateData() {
  let ime = $("#ime").val();
  let prezime = $("#prezime").val();
  let pol = $("#pol").val();
  let godinaRodjenja = $("#godinaRodjenja").val();
  let grad = $("#grad").val();
  let adresa = $("#adresa").val();
  let prihvati = $("#prihvati").prop("checked");

  // remove all is-invalid classes if they exist
  $(".is-invalid").removeClass("is-invalid");

  if (!validateName(ime)) {
    $("#ime").addClass("is-invalid");
  }
  if (!validateName(prezime)) {
    $("#prezime").addClass("is-invalid");
  }
  if (!validateGender(pol)) {
    $("#pol").addClass("is-invalid");
  }
  if (!validateBirthYear(godinaRodjenja)) {
    $("#godinaRodjenja").addClass("is-invalid");
  }
  if (!validateCity(grad)) {
    $("#grad").addClass("is-invalid");
  }
  if (!validateAddress(adresa)) {
    $("#adresa").addClass("is-invalid");
  }
  if (!prihvati) {
    $("#prihvati").addClass("is-invalid");
  }

  data = {
    ime: ime,
    prezime: prezime,
    pol: pol,
    godinaRodjenja: godinaRodjenja,
    grad: grad,
    adresa: adresa,
    prihvati: prihvati,
  };

  return data;
}
