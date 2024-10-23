document.addEventListener('DOMContentLoaded', function () {
    var navigation = document.getElementById("myModal");
    var modalContent = document.querySelector(".photo-modale"); 
    var btn_contact = document.getElementById("btn_contact");

document.addEventListener('click', function(event) {
        if (navigation.classList.contains("active") && !modalContent.contains(event.target) && event.target !== btn_contact) {
            closeNav();
        }
    });

    btn_contact.onclick = openNav;
    
    function openNav() {
        navigation.classList.add("active");
    }
    
    function closeNav() {
        navigation.classList.remove("active");
    }
});
