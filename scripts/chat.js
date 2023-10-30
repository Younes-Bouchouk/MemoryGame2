// ---------- CHAT BOX ----------

var chatBtn = document.getElementById('chatbox-close') 
var chatBtnBar = document.querySelector('#chatbox-close::after') 
var chat = document.getElementById('chatbox')
var screen = document.getElementById("screen");



chatBtn.addEventListener('click', function() {

    chat.classList.toggle("chatbox-visible")
    chatBtnBar.style.display= 'block'
    screen.scrollTop= screen.scrollHeight;
})

// ---------- Bouton Send ----------

var sendBtn = document.getElementById("send");
var imgSendBtn = document.querySelector('#send>img')

sendBtn.addEventListener("mouseover", function() {
    imgSendBtn.src = "../assets/send_message_hover.png";
}); 

sendBtn.addEventListener("mouseout", function() {
    imgSendBtn.src = "../assets/send_message.png";
});