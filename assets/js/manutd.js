// add a .dropdown class in dropdown menu
document.addEventListener("DOMContentLoaded", function () {
    // Select all <ul> elements with the class 'sub-menu'
    const subMenus = document.querySelectorAll("ul.sub-menu");

    // Add the 'dropdown' class to each sub-menu
    subMenus.forEach(function (subMenu) {
        subMenu.classList.add("dropdown");
    });
});