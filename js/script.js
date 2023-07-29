var showDesc = document.querySelector(".proDescription .para");
var showUser = document.querySelector(".header .show_userAcc");
var showseResult = document.querySelector(".header .searchForm"); 
var search_result = document.getElementById("searchResult");

function showDescription(){
    showDesc.classList.toggle('active');
}

function showUsers(){
    showUser.classList.toggle("actives");
}

function showResult(){
    showseResult.classList.toggle("show");
}

function cancel(){
    search_result.style.display = "none";
}
    

    