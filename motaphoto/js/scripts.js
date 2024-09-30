document.addEventListener('DOMContentLoaded', function () {
    // Get the modal
    var navigation = document.getElementById("myModal");
    var btn_contact = document.getElementById("btn_contact");
    var btn_close = document.getElementById("btn_close");
    var closeLink = document.querySelectorAll(".closeLink");
    
    btn_contact.onclick = openNav;
    btn_close.onclick = closeNav;
    closeLink.forEach(function (link) {
      link.onclick = closeNav;
    });
    
    function openNav() {
      navigation.classList.add("active");
    }
    function closeNav() {
      navigation.classList.remove("active");
      btn_close.innerHTML = "&times;";
    }
});
