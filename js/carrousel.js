(function(){
  let hero__radio__input = document.querySelectorAll(".hero__radio__input");
  let hero__carrousel = document.querySelectorAll(".hero__carrousel");
  let index__active = 0;
  let intervalle;

  // Fonction pour changer l'image active
  function AfficherImage(index) {
    hero__carrousel.forEach((image, i) => {
      image.classList.toggle("hero__carrousel--active", i == index);
    });

    // Mettre à jour l'attribut "checked" des boutons radio
    hero__radio__input.forEach((radio, i) => {
      radio.checked = (i == index);
    });
  }

  // Fonction pour démarrer l'intervalle pour changer d'image automatiquement
  function CommencerIntervalle() {
    intervalle = setInterval(() => {
      index__active = (index__active + 1) % hero__carrousel.length;
      AfficherImage(index__active);
    }, 5000); // 5 secondes
  }

  // Fonction pour réinitialiser l'intervalle
  function ReinitialiserIntervalle() {
    clearInterval(intervalle);
    CommencerIntervalle();
  }

  // Afficher l'image initiale au chargement de la page
  AfficherImage(index__active);
  CommencerIntervalle();

  hero__radio__input.forEach((radio__input, index ) => {
    radio__input.addEventListener("click", function() {
      // Changer l'image active lorsque le bouton radio est cliqué
      index__active = index;
      AfficherImage(index__active);
      // Réinitialiser l'intervalle si l'utilisateur clique sur un bouton radio
      ReinitialiserIntervalle();
    });  
  });
})();