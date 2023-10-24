var hamburger = document.getElementById('hamburger')
var nav = document.querySelector('nav')

hamburger.addEventListener('click', function() {
    nav.classList.toggle("nav-visible")
})

// ---------- CHAT BOX ----------

var chatBtn = document.getElementById('chatbox-close') 
var chatBtnBar = document.querySelector('#chatbox-close::after') 
var chat = document.getElementById('chatbox')


chatBtn.addEventListener('click', function() {
    chat.classList.toggle("chatbox-visible")
    chatBtnBar.style.display= 'block'
})

// --- Bouton Send ----------

var sendBtn = document.getElementById("send");
var imgSendBtn = document.querySelector('#send>img')

sendBtn.addEventListener("mouseover", function() {
    imgSendBtn.src = "../assets/send_message_hover.png";
});

sendBtn.addEventListener("mouseout", function() {
    imgSendBtn.src = "../assets/send_message.png";
});

