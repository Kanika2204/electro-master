$( document ).ready( function cartAction() {
    $( "span.addToCart" ).on( "click",  function cartAction() {
     var id = $(this).attr("data-id");
     $.ajax( {
      type: "GET",
      url: "ajax.php?id=" + id + "&action=add"
     })
     .done( function cartAction()
     {
      alert("Product have been added.");
     });
    });
   });