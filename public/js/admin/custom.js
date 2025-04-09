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


//Creamos un array con los botones que tengan la clase .delete-article
const updateButtons = document.querySelectorAll(".update-article");
/*
  Aquí, recorremos con un foreach el array que hemos creado antes y a cada enlace le añadimos el evento
  click donde primero nos pregunta si estamos seguros de borrar y si le damos a que si,
  nos manda a la página que hemos definido en el footer concatenando "&id=" y le pasamos por la url
  el atributo que obtenemos por data-id.
*/
updateButtons.forEach(function(updateButton) {
  updateButton.addEventListener("click", () => {
      window.location.href = urlUpdateArticle+"&id="+updateButton.getAttribute('data-id');
  });
});



const deleteOrderButtons = document.querySelectorAll(".delete-order");

deleteOrderButtons.forEach(function(deleteOrder) {
  deleteOrder.addEventListener("click", () => {
    if (window.confirm("¿Estás seguro de borrar?")) {
      window.location.href = urlDeleteOrder+"&id="+deleteOrder.getAttribute('data-id');
    } 
  });
});



const updateOrders = document.querySelectorAll(".update-order");

updateOrders.forEach(function(updateOrder) {
  updateOrder.addEventListener("click", () => {
      window.location.href = urlUpdateOrder+"&id="+updateOrder.getAttribute('data-id');
  });
});


const deleteTypeButtons = document.querySelectorAll(".delete-type");

deleteTypeButtons.forEach(function(deleteType) {
  deleteType.addEventListener("click", () => {
    if (window.confirm("¿Estás seguro de borrar?")) {
      window.location.href = urlDeleteType+"&id="+deleteType.getAttribute('data-id');
    } 
  });
});

const updateTypes = document.querySelectorAll(".update-type");

updateTypes.forEach(function(updateType) {
  updateType.addEventListener("click", () => {
      window.location.href = urlUpdateType+"&id="+updateType.getAttribute('data-id');
  });
});


const deleteUserButtons = document.querySelectorAll(".delete-user");

deleteUserButtons.forEach(function(deleteUser) {
  deleteUser.addEventListener("click", () => {
    if (window.confirm("¿Estás seguro de borrar?")) {
      window.location.href = urlDeleteUser+"&id="+deleteUser.getAttribute('data-id');
    } 
  });
});

const updateUsers = document.querySelectorAll(".update-user");

updateUsers.forEach(function(updateUser) {
  updateUser.addEventListener("click", () => {
      window.location.href = urlUpdateUser+"&id="+updateUser.getAttribute('data-id');
  });
});

