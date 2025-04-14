(function(){
  console.log("carrousel.js")
  let hero__radio__input = document.querySelectorAll(".hero__radio__input");
  let hero__carrousel = document.querySelectorAll(".hero__carrousel");
  
  // Au départ, on cache toutes les images du carrousel sauf la première
  hero__carrousel.forEach((image, index) =>  {
    image.style.opacity = index == 0 ? "1" : "0";
  })
 
  hero__radio__input.forEach(radio__input => {
    radio__input.addEventListener("click", function() {

      // Récupérer l'ID du bouton radio et de l'image correspondante
      let hero__radio__input__id = radio__input.getAttribute("data-id_radio");

      // Afficher l'image correspondante et cacher les autres
      hero__carrousel.forEach((image, index) => {
        if (hero__radio__input__id == index) {
          image.style.opacity = "1";
        } else {
          image.style.opacity = "0";
        }
      });
    });  
  });
})();