$("#posalji").click(function (event) {
  event.preventDefault();
  let recieved_data = validateData();

  // Check if all inputs are valid before submitting the form
  if (
    !recieved_data.ime ||
    !recieved_data.prezime ||
    !recieved_data.pol ||
    !recieved_data.godinaRodjenja ||
    !recieved_data.grad ||
    !recieved_data.adresa ||
    !recieved_data.prihvati
  ) {
    console.log("Form data is not valid.");
    return; // Stop form submission
  }

  $.ajax({
    url: "insertIntoDB.php",
    type: "POST",
    dataType: "JSON",
    data: recieved_data,
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
