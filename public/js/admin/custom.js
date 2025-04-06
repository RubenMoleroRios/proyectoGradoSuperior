//Creamos un array con los botones que tengan la clase .delete-article
const deleteButtons = document.querySelectorAll(".delete-article");

/*
  Aquí, recorremos con un foreach el array que hemos creado antes y a cada enlace le añadimos el evento
  click donde primero nos pregunta si estamos seguros de borrar y si le damos a que si,
  nos manda a la página que hemos definido en el footer concatenando "&id=" y le pasamos por la url
  el atributo que obtenemos por data-id.
*/
deleteButtons.forEach(function(deleteButton) {
  deleteButton.addEventListener("click", () => {
    if (window.confirm("¿Estás seguro de borrar?")) {
      window.location.href = urlDeleteArticle+"&id="+deleteButton.getAttribute('data-id');
    } 
  });
});

