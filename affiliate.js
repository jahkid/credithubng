// FAQs
var acc = document.getElementsByClassName("questions");
var i;

for(i=0; i < acc.length; i++){
    acc[i].addEventListener( "click", function () {
        this.classList.toggle("active");

    var panel = this.nextElementSibling;
    if (panel.style.display === "block"){
        panel.style.display = "none";
    }
    else {
        panel.style.display = "block"
    }
    })
}

// modal popup
let modal = document.querySelector('.modal')
let popbtn = document.querySelector('.seehowBtn')
let closebtn = document.querySelector('.close')
let video = document.querySelector('.video')

popbtn.addEventListener('click', ()=>{
    modal.classList.add('activate')
    video.setAttribute("allow", "autoplay");
    video.play()
    video.currentTime = 0;
})
closebtn.addEventListener('click', ()=>{
    modal.classList.remove('activate')
    video.removeAttribute("allow", "autoplay")
    // video.src = " ";
    video.pause();
})

// closebtn.onclick = function(){
//     video.removeAttribute("allow", "autoplay")
//     modal.style.display = "none"
//     video.pause();
//     video.currentTime = 0;
// }
