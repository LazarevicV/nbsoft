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
