var berger;
var big_wrapper;

function declare(){
    berger = document.querySelector(".berger");
    big_wrapper = document.querySelector(".big-wrapper");
}

declare();


function events(){
    berger.addEventListener("click",() =>{
        big_wrapper.classList.toggle("active");
    });
}

events()