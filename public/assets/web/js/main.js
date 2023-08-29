//toggle menu
const menu__mobile = document.getElementById("menu__mobile");
const list = document.getElementById("header__nav-list");


let isToggleOn = false;

menu__mobile.addEventListener("click", function() {
    list.classList.toggle("show__mobile");
    isToggleOn = !isToggleOn;
})


//hiển thị submenu
const menuParent = document.querySelector(".header__nav-parent");

menuParent.addEventListener("click", function(){
    list.classList.add("block");
});
