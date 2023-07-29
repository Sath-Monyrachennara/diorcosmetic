var user = document.getElementById("userAcc");
var showUser = document.querySelector(".show_userAcc");

user.onclick = function(){
    showUser.classList.toggle("active");
};