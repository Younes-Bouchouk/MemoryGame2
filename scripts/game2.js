// Les Fonctions

function displayTheme() {
    pageLevel.style.display='none';
    pageTheme.style.display='block';
    console.log(level)
}

function displayMemory() {
    pageTheme.style.display='none';    
    console.log(theme)
    generateGrille(level)
}

function generateGrille() {

    var table = document.createElement('table')

    table.style.backgroundImage = "url(" + dirTheme + "background.jpg)"

    arena.appendChild(table)


    for (i=0; i<nbRow; i++){
        var row1 = document.createElement('tr')

        table.appendChild(row1)

        for (j=0; j<nbCol; j++){

            var td1 = document.createElement('td')

            row1.appendChild(td1)

            td1.classList.add('carte')

            td1.style.backgroundImage = "url(" + dirTheme + "dos.png)"
        }
    }

    start()
}

function toggle(){
    if (pause == false){
        start()
        pause = true
    }
    else {
        stop()
        pause = false

    }
}


// FONCTION CHRONO

let time = document.getElementById('time')
let ms = 0
let sec = 0
var pause = false


function update_chrono() {
    ms += 1

    if (ms >= 10){
        ms = 0
        sec += 1
    }


    time.innerText = sec 
}

function toggle(){
    if (i == false){
        start()
        i = true
    }
    else {
        stop()
        i = false
        console.log('Lancement de la fonction AJAX')
        insertScore()
    }
}

function start(){
    t = setInterval(update_chrono,100)
}

function stop(){
    clearInterval(t)
}

function insertScore() {
    var xhr = new XMLHttpRequest();
    var url = "../../utils/ajaxInsertScore.php";
    var params = "score=" + sec + '&level=' + level;    
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Gérer la réponse du serveur ici (par exemple, afficher un message de confirmation)
            console.log(xhr.responseText);
        }
    };
    
    xhr.send(params);
}

// var data = "var1=" + value1 +  "&var2=" + value2;

// xhr.open("POST", "script.php", true);
// xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
// xhr.send(data);


// Les pages

let pageLevel = document.getElementById('levelPage')
let pageTheme = document.getElementById('themePage')
let arena = document.getElementById('gameArena')
let pageNovice = document.getElementsByClassName('quatre')

pageTheme.style.display='none';

// Les boutons de la page Level

let level = null;

let nbRow = null
let nbCol = null

document.getElementById('btnNovice').addEventListener('click', function() {
    level = 'NOVICE'
    nbRow = 4
    nbCol = 4
    pointToEnd = 8
    displayTheme()
})

document.getElementById('btnFacile').addEventListener('click', function() {
    level = 'FACILE'
    nbRow = 6
    nbCol = 5
    pointToEnd = 15
    displayTheme()
})

document.getElementById('btnIntermediaire').addEventListener('click', function() {
    level = 'INTERMEDIAIRE'
    nbRow = 8
    nbCol = 8
    pointToEnd = 32
    displayTheme()
})

document.getElementById('btnDifficile').addEventListener('click', function() {
    level = 'DIFFICILE'
    nbRow = 12
    nbCol = 12
    pointToEnd = 72
    displayTheme()
})

document.getElementById('btnExtreme').addEventListener('click', function() {
    level = 'EXTREME'
    nbRow = 20
    nbCol = 20
    pointToEnd = 200
    displayTheme()
})

// Les boutons de la page Theme

let theme = null
let bg = null
let dirTheme = null

document.getElementById('themeFuturiste').addEventListener('click', function() {
    theme = 'Futuriste'
    dirTheme = '../../assets/deck_futuriste/'
    displayMemory()
})

document.getElementById('themeMagic').addEventListener('click', function() {
    theme = 'Magic'
    dirTheme = '../../assets/deck_magic/'
    displayMemory()
})

document.getElementById('themeHeathstone').addEventListener('click', function() {
    theme = 'Hearthstone'
    dirTheme = '../../assets/deck_hearthstone/'
    displayMemory()
})

document.getElementById('themeClash').addEventListener('click', function() {
    theme = 'Clash'
    dirTheme = '../../assets/deck_clashRoyale/'
    displayMemory()
})



