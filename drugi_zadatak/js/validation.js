function validateName(name) {
  return /^[a-zA-Z\s]+$/.test(name);
}

function validateGender(gender) {
  return gender !== "";
}

function validateBirthYear(year) {
  const currentYear = new Date().getFullYear();
  const parsedYear = parseInt(year);
  const isValid =
    !isNaN(parsedYear) && parsedYear >= 1900 && parsedYear <= currentYear;

  return isValid;
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

  // remove all error messages if they exist
  let errorSpans = $("span[id*='Greska']");
  errorSpans.text("");

  if (!validateName(ime)) {
    $("#ime").addClass("is-invalid");
    $("#imeGreska").text("Name can contain only big and small letters!");
  }
  if (!validateName(prezime)) {
    $("#prezime").addClass("is-invalid");
    $("#prezimeGreska").text(
      "Last name can contain only big and small letters!"
    );
  }
  if (!validateGender(pol)) {
    $("#pol").addClass("is-invalid");
    $("#polGreska").text("You must pick something for your gender!");
  }
  if (!validateBirthYear(godinaRodjenja)) {
    $("#godinaRodjenja").addClass("is-invalid");
    $("#godinaRodjenjaGreska").text(
      "Birth year must be from 1900 to current year!"
    );
  }
  if (!validateCity(grad)) {
    $("#grad").addClass("is-invalid");
    $("#gradGreska").text("City can contain only big and small letters!");
  }
  if (!validateAddress(adresa)) {
    $("#adresa").addClass("is-invalid");
    $("#adresaGreska").text(
      "Adress can only contain big and small letters, numbers and spaces!"
    );
  }
  if (!prihvati) {
    $("#prihvati").addClass("is-invalid");
    $("#prihvatiGreska").text(
      "You must accept terms of conditions in order to continue!"
    );
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
