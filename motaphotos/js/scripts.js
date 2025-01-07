// Modal Logic
document.addEventListener('DOMContentLoaded', function () {
    var modal = document.getElementById("myModal");
    var modalContent = document.querySelector(".photo-modale");
    var btnContact = document.getElementById("btn_contact");
    var btnContact2 = document.getElementById("btn_contact2");
    var modalOverlay = document.querySelector(".overlay");

    // Click event to close modal when clicking outside
    document.addEventListener('click', function(event) {
        if (modal.classList.contains("active") && 
            !modalContent.contains(event.target) && 
            event.target !== modalOverlay && 
            event.target !== btnContact && 
            event.target !== btnContact2) {
            closeNav();
        }
    });

    // Open modal when buttons are clicked
    if (btnContact2) {
        btnContact2.onclick = openNav;
    }
    btnContact.onclick = openNav;

    // Open and Close Modal Functions
    function openNav() {
        modal.classList.add("active");
        modalOverlay.classList.add("active");
    }

    function closeNav() {
        modal.classList.remove("active");
        modalOverlay.classList.remove("active");
    }
});

// Burger Menu Logic
var btnBurger = document.getElementById("btn_burger"); 
var closeBtn = document.getElementById("closeBtn");
var nav = document.querySelector("nav");

btnBurger.onclick = openMenu;
closeBtn.onclick = closeMenu;

function openMenu() {
  nav.style.display = 'block';
  nav.classList.add('active');
  closeBtn.style.display = 'block';
  btnBurger.style.display = 'none';
}

function closeMenu() {
  nav.style.display = 'none';
  nav.classList.remove('active');
  closeBtn.style.display = 'none';
  btnBurger.style.display = 'block';
}

//recuperer les reférences dans modale
jQuery(document).ready(function($) {
    if (typeof ma_reference !== 'undefined' && ma_reference !== '') {
  
        $("#ma_reference").val(ma_reference);
    }
});

// Menu déroulant filtre photos

document.addEventListener('DOMContentLoaded', function() {
    function fetchPhotos(categoryName, format, dateOrder) {
        var postID = document.querySelector('#category-select').getAttribute('data-categorie'); 
        var nonce = ajax_params.nonce; 

        // Données à envoyer pour la requête AJAX
        var data = {
            action: 'galerie_photos',
            postid: postID,
            nonce: nonce,
            category_name: categoryName,
            format: format,      // Ajout du filtre format
            date_order: dateOrder // Ajout du filtre de date
        };

        // Requête AJAX avec fetch
        fetch(ajax_params.ajaxurl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'Cache-Control': 'no-cache'
            },
            body: new URLSearchParams(data)
        })
        .then(response => response.text())
        .then(responseData => {
            document.querySelector('#photos-area').innerHTML = responseData;
        })
        .catch(error => {
            console.error('Erreur de requête :', error);
        });
    }

    // Lorsque l'utilisateur change de catégorie dans le menu déroulant
    document.querySelector('#category-select').addEventListener('change', function() {
        var categoryName = this.options[this.selectedIndex].getAttribute('data-name');
        var format = document.querySelector('#format-select').value; // Récupérer la valeur du format
        var dateOrder = document.querySelector('#date-select').value; // Récupérer la valeur de tri par date

        if (categoryName !== 'all') {
            fetchPhotos(categoryName, format, dateOrder);
        } else {
            fetchPhotos('all', format, dateOrder);
        }
    });

    // Lorsque l'utilisateur change le format
    document.querySelector('#format-select').addEventListener('change', function() {
        var categoryName = document.querySelector('#category-select').value;
        var format = this.value;
        var dateOrder = document.querySelector('#date-select').value;
        
        fetchPhotos(categoryName, format, dateOrder);
    });

    // Lorsque l'utilisateur change le tri par date
    document.querySelector('#date-select').addEventListener('change', function() {
        var categoryName = document.querySelector('#category-select').value;
        var format = document.querySelector('#format-select').value;
        var dateOrder = this.value;
        
        fetchPhotos(categoryName, format, dateOrder);
    });

    // Charge toutes les photos dès le chargement de la page (si "all" est sélectionné par défaut)
    fetchPhotos('all', 'all', 'asc');
});


