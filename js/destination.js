/*
* Script js permettant d'extraire les destinations de voyage
*/
(function(){
    const domaine = window.location.href;
    parcourir_boutons();

    // Fonction pour parcourir les boutons de catégorie
    function parcourir_boutons() {
        const categorie__ul__li = document.querySelectorAll('.categorie__ul__li');
       
        categorie__ul__li.forEach(elm => {
            elm.addEventListener('click', function() {
                // Supprimer la classe active de tous les boutons
                categorie__ul__li.forEach(elm => elm.classList.remove('active'));
                
                elm.classList.add('active'); // Ajouter la classe active au bouton cliqué
                
                // console.log(elm.dataset.category_id);
                const categoryId = elm.dataset.category_id;
                // console.log("categoryId = ", categoryId);

                // Mettre à jour l'URL de l'API avec la nouvelle catégorie
                const apiUrl = `${domaine}wp-json/wp/v2/posts?categories=${categoryId}`;
                parcourir_articles(apiUrl);
            });
        })
    }

    function parcourir_articles(apiUrl) {
        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                const destinationList = document.querySelector('.destination__list');
                destinationList.innerHTML = ''; // Vider la liste avant d'ajouter les nouveaux articles
                
                data.forEach(article => {
                    const articleElement = document.createElement('div');
                    articleElement.classList.add('destination__list__article');
                   
                    articleElement.innerHTML = `
                        <h3>${article.title.rendered}</h3>
                        <div class="destination__list__article__contenu" style="display: none;">
                            <p>${article.excerpt.rendered}</p>
                            <a href="${article.link}">Lire plus</a>
                        </div>
                    `;

                    // Ajouter un événement au clic pour afficher le contenu
                    const titreElement = articleElement.querySelector('h3');
                    const contenuElement = articleElement.querySelector('.destination__list__article__contenu');
                    
                    titreElement.addEventListener('click', function() {
                        // console.log("titreElement = ", titreElement);
                      
                        // Basculer l'affichage du contenu
                        const estVisible = contenuElement.style.display == 'block';
                        contenuElement.style.display = estVisible ? 'none' : 'block';                    
                    });

                    destinationList .appendChild(articleElement);
                });
            })
        .catch(error => console.error('Erreur lors de la récupération des articles:', error));
    }   
})();