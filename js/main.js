"use strict";
document.addEventListener("DOMContentLoaded", function() {
    //When the visually impaired toggle is clicked: 
    //      Change the inverter filters opacity
    //      The positioning of the navigation bar
    //      The size of each review
    //      The gap between reviews
    document.getElementById("colorInverter").addEventListener("click", function() { 
        var elements = document.getElementsByClassName("posts");
        var navBar = document.getElementsByClassName("houses");
        var posts = document.getElementsByClassName("posts");
        if (document.body.style.filter == "invert(100%)"){
            sessionStorage.setItem('toggle', 'false');
            document.body.style.filter = "invert(0%)";
            for(var i = 0, length = elements.length; i < length; i++) {
                elements[i].style.width = '90%';
            }
            for(var i = 0, length = navBar.length; i < length; i++) {
                navBar[i].style.justifyContent = 'space-evenly';
            }
            for(var i = 0, length = posts.length; i < length; i++) {
                posts[i].style.marginTop = '1%';
            }
        }
        else{
            sessionStorage.setItem('toggle', 'true');
            document.body.style.filter = "invert(100%)";
            for(var i = 0, length = elements.length; i < length; i++) {
                elements[i].style.width = '50%';
            }
            for(var i = 0, length = navBar.length; i < length; i++) {
                navBar[i].style.justifyContent = "center";
            }
            for(var i = 0, length = posts.length; i < length; i++) {
                posts[i].style.marginTop = '10%';
            }
        }
    });
})

//When loaded in, set the scroll position to its last saved position
document.addEventListener("DOMContentLoaded", function(event) { 
    var scrollpos = sessionStorage.getItem('scrollpos');
    if (scrollpos) window.scrollTo(0, scrollpos);
});

//When loading to a new page, save current scroll position
window.onbeforeunload = function(e) {
    sessionStorage.setItem('scrollpos', window.scrollY);
};
//If the current page is a house, change the corresponding background color to indicate it.
document.addEventListener("DOMContentLoaded", function(event) { 
    var currentPage = window.location.search;
    const parcedCurrentPage = new URLSearchParams(currentPage);
    const house = parcedCurrentPage.get('house');
    document.getElementById(house + "click").style.backgroundColor = "#051E29";
});

document.addEventListener("DOMContentLoaded", function(event) { 
    var elements = document.getElementsByClassName("posts");
    var navBar = document.getElementsByClassName("houses");
    var posts = document.getElementsByClassName("posts");
    if (sessionStorage.getItem('toggle') == "true"){
        document.getElementById("colorInverter").checked = true;
        document.body.style.filter = "invert(100%)";
        for(var i = 0, length = elements.length; i < length; i++) {
            elements[i].style.width = '50%';
        }
        for(var i = 0, length = navBar.length; i < length; i++) {
            navBar[i].style.justifyContent = "center";
        }
        for(var i = 0, length = posts.length; i < length; i++) {
            posts[i].style.marginTop = '10%';
        }
    }
    else{
        document.getElementById("colorInverter").checked = false;
        document.body.style.filter = "invert(0%)";
        for(var i = 0, length = elements.length; i < length; i++) {
            elements[i].style.width = '90%';
        }
        for(var i = 0, length = navBar.length; i < length; i++) {
            navBar[i].style.justifyContent = 'space-evenly';
        }
        for(var i = 0, length = posts.length; i < length; i++) {
            posts[i].style.marginTop = '1%';
        }
    }
});
