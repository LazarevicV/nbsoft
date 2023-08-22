function validateName(name) {
  if (name === "") {
    let greska = $("#nameGreska");
    greska.text("Ime ne sme biti prazno");
    return false;
  }
  return true;
}

function validateData() {
  let ime = $("#ime").val();
  let prezime = $("#prezime").val();
  let pol = $("#pol").val();
  let godinaRodjenja = $("#godinaRodjenja").val();
  let grad = $("#grad").val();
  let adresa = $("#adresa").val();
  let prihvati = $("#prihvati").prop("checked");

  //   validateName(name);

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

$("#posalji").click(function (event) {
  event.preventDefault();
  let data = validateData();
  $.ajax({
    url: "insertIntoDB.php",
    type: "POST",
    dataType: "JSON",
    data: data,
    success: function (result) {
      let forma = $("#forma");
      forma.hide();
      let div = $("#successForm");
      div.text("Uspesno poslati podaci u bazu!");
    },
    error: function (error) {
      console.log(error);
    },
  });
});
