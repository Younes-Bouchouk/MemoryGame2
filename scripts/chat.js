// ---------- CHAT BOX ----------

var chatBtn = document.getElementById('chatbox-close') 
var chat = document.getElementById('chatbox')
var screen = document.getElementById("screen");

chatBtn.addEventListener('click', function() {

    chat.classList.toggle("chatbox-visible")
    screen.scrollTop= screen.scrollHeight;
})

  // setInterval(function(){
  //   console.log("cccc")
  //    $.ajax({
  //     url: 'utils/ajaxUpdateChat.php', // Le script PHP pour récupérer les messages
  //     method: 'POST',
  //     success: function(data) {
  //       $('#screen').html(data); // Met à jour la contenu de la div avec les messages récupérés
  //     },
  //     error: function(jqXHR, textStatus, errorThrown) {
  //       console.error('Erreur lors de la récupération des messages : ' + textStatus, errorThrown);
  //     }
      
  //    });
  //    },3000);


//function insertMessage() {
  $("#formEnvoieMessage").on('submit'),(e) =>{
    e.preventDefault();
  var xhr = new XMLHttpRequest();
  var url = "../../utils/ajaxInsertMessage.php";
  var params = "message=" + document.getElementById('message').value;    
  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
  xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
          // Gérer la réponse du serveur ici (par exemple, afficher un message de confirmation)
          console.log(xhr.responseText);
      }
    }
  
  xhr.send(params);

}

function getMessages() {
  // Utilisation de l'objet XMLHttpRequest pour effectuer une requête AJAX
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "./utils/ajaxUpdateChat.php", true);

  xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
          var messages = JSON.parse(xhr.responseText);
          var chatDiv = document.getElementById("screen"); // Assurez-vous d'avoir un élément avec l'ID "chat" dans votre HTML

          // Efface le contenu actuel du chat
          chatDiv.innerHTML = "";

          // Affiche les messages dans le chat
          messages.forEach(function(message) {
              var messageDiv = document.createElement("div");
              messageDiv.textContent = message.content; // Assurez-vous d'adapter cette ligne en fonction de votre modèle de données
              chatDiv.appendChild(messageDiv);
          });
      }
  };

  xhr.send();
}

