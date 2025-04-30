(function(){
  let hero__radio__input = document.querySelectorAll(".hero__radio__input");
  let hero__carrousel = document.querySelectorAll(".hero__carrousel");
  let hero__animation = document.querySelectorAll(".hero__animation");
  let index__active = 0;
  let intervalle;

  // Fonction pour changer l'image active
  function ParcourirCarrousel(index) {
    hero__carrousel.forEach((image, i) => {
      image.classList.toggle("hero__carrousel--active", i == index);
    });
  }

  function ParcourirAnimation(index){
    hero__animation.forEach((anim, i) => {
      anim.classList.toggle("hero__animation--active", i == index);
    });
  }

  // Fonction pour mettre à jour l'attribut checked du bouton radio actif
  function MettreAJourRadioChecked(index) {
    hero__radio__input.forEach((input, i) => {
      input.checked = i == index;
    });
  }

  // Fonction pour démarrer l'intervalle pour changer d'image automatiquement
  function CommencerIntervalle() {
    intervalle = setInterval(() => {
      index__active = (index__active + 1) % hero__carrousel.length;
      ParcourirCarrousel(index__active);
      ParcourirAnimation(index__active);
      MettreAJourRadioChecked(index__active);
    }, 5000); // 5 secondes
  }

  // Fonction pour réinitialiser l'intervalle
  function ReinitialiserIntervalle() {
    clearInterval(intervalle);
    CommencerIntervalle();
  }

  // Initialisation au chargement de la page
  ParcourirCarrousel(index__active);
  ParcourirAnimation(index__active);
  MettreAJourRadioChecked(index__active);
  CommencerIntervalle();

  hero__radio__input.forEach((radio__input, index) => {
    radio__input.addEventListener("change", function() {
      // Changer l'image active lorsque le bouton radio est cliqué
      index__active = index;

      ParcourirCarrousel(index__active);
      ParcourirAnimation(index__active);
      MettreAJourRadioChecked(index__active);

      // Réinitialiser l'intervalle si l'utilisateur clique sur un bouton radio
      ReinitialiserIntervalle();
    });  
  });
})();