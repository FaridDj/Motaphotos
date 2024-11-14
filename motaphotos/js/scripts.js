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

    btn_contact.onclick = openNav;
    btn_contact2.onclick = openNav;

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

// Fonction pour fermer le menu
function closeMenu() {
  nav.style.display = 'none';
  nav.classList.remove('active');
  closeBtn.style.display = 'none';
  btnBurger.style.display = 'block';
}
