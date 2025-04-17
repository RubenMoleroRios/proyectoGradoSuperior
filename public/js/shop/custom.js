const deleteArticles = document.querySelectorAll(".delete-article");

deleteArticles.forEach(function(deleteArticle) {
    deleteArticle.addEventListener("click", () => {
      if (window.confirm("¿Estás seguro de borrar?")) {
        window.location.href = urlDeleteArticleCarrito+"&id="+deleteArticle.getAttribute('data-id');
      } 
    });
  });
  

//   const deleteUserButtons = document.querySelectorAll(".delete-user");

// deleteUserButtons.forEach(function(deleteUser) {
//   deleteUser.addEventListener("click", () => {
//     if (window.confirm("¿Estás seguro de borrar?")) {
//       window.location.href = urlDeleteArticleCarrito+"&id="+deleteUser.getAttribute('data-id');
//     } 
//   });
// });
