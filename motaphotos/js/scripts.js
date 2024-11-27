document.addEventListener('DOMContentLoaded', function () {
    var navigation = document.getElementById("myModal");
    var modalContent = document.querySelector(".photo-modale");
    var btn_contact = document.getElementById("btn_contact");
    var btn_contact2 = document.getElementById("btn_contact2");
    var modalOverlay = document.querySelector(".overlay");

    document.addEventListener('click', function(event) {

        if (navigation.classList.contains("active") && 
            !modalContent.contains(event.target) && 
            event.target !== modalOverlay && 
            event.target !== btn_contact && 
            event.target !== btn_contact2) {
            closeNav();
        }
    });

    if (btn_contact2) {
        btn_contact2.onclick = openNav;
    }
    btn_contact.onclick = openNav;
    

    function openNav() {
        navigation.classList.add("active");
        modalOverlay.classList.add("active");
    }

    function closeNav() {
        navigation.classList.remove("active");
        modalOverlay.classList.remove("active");
    }
});

// Menu burger

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

//recuperer les reférences

jQuery(document).ready(function($) {
  
    if (typeof maReference !== 'undefined' && maReference !== '') {
  
        $("#la-reference").val(maReference);
    }
})

//Gestion de filtres
document.querySelector('.category-select').addEventListener('change', function() {
    var postID = this.getAttribute('data-categorie'); 
    var nonce = this.getAttribute('data-nonce');
    var categoryID = this.value;

    var data = {
        action: 'filtre_load',
        postid: postID,
        nonce: nonce,
        category_id: categoryID, 
        
   };
        
   console.log(categoryID);
    // Appel AJAX
    
});
