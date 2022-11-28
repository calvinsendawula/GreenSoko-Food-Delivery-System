var navoptions = document.getElementById("nav-options");
var navbutton = document.getElementById("nav-button");
var navbarX = document.getElementById("navbar");
var navbtnicon = document.getElementById("nav-btn-icon");
var mobilenav = document.getElementById("mobile-opts");

if (navbar.clientWidth <= 900) {
    navoptions.style.display = "none";
    navbutton.style.display = "block";
}

window.addEventListener('resize', function () {
    // console.log('hi')

    if (navbar.clientWidth <= 900) {
        navoptions.style.display = "none";
        navbutton.style.display = "block";
        navbtnicon.className = "fa-solid fa-bars";
    } else {
        navoptions.style.display = "flex";
        navbutton.style.display = "none";
        mobilenav.style.display = "none";
    }
})

navbutton.addEventListener('click', function () {
    if (navbtnicon.className == "fa-solid fa-bars") {
        navbtnicon.className = "fa-solid fa-xmark";
        mobilenav.style.display = "block";
    } else {
        navbtnicon.className = "fa-solid fa-bars";
        mobilenav.style.display = "none";
    }
})



// function clicked() {
//     alert('Keep my wifes name outta your f**ing mouth')
// }


