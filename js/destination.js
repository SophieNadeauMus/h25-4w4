/*
* Script js permettant d'extraire les destinations de voyage
*/
(function(){
    const categoryId = 3; // Remplacez par l'ID de la catégorie souhaitée
    const domaine = window.location.href;
    const apiUrl = `${domaine}wp-json/wp/v2/posts?categories=${categoryId}`;

    parcourir_boutons();

    // Fonction pour parcourir les boutons de catégorie
    function parcourir_boutons() {
        const categorie__ul__li = document.querySelectorAll('.categorie__ul__li')
       
        categorie__ul__li.forEach(elm => {
            elm.addEventListener('click', function() {
                // console.log(elm.dataset.category_id);

                const categoryId = this.dataset.category_id;
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

                articleElement.innerHTML = `
                    <h3>${article.title.rendered}</h3>
                    
                    <p>${article.excerpt.rendered}</p>
                    <a href="${article.link}">Lire plus</a>
                `;
                destinationList .appendChild(articleElement);
            });
        })
        .catch(error => console.error('Erreur lors de la récupération des articles:', error));
    }   
})();