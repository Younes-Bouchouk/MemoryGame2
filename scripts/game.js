
// Les pages

let pageLevel = document.getElementById('levelPage');
let pageTheme = document.getElementById('themePage');
pageTheme.style.display = 'none';
let arena = document.getElementById('gameArena');
let endPage = document.getElementById('end');
endPage.style.display = 'none';
let table = document.getElementById('table')

var tabJeu;
var tabResultat;
var sec = 0

// Les Fonctions

function displayTheme() {
    pageLevel.style.display = 'none';
    pageTheme.style.display = 'block';
    console.log(level);
    tabJeu = genereTableauDepart();
    tabResultat = genereTableauAleatoire();
}

function displayMemory() {
    pageTheme.style.display = 'none';
    console.log(theme);

    afficherTableau();
    start();
}

function afficherTableau() {
    var txt = "";
    table.style.backgroundImage = "url('" + dirTheme + "background.jpg')";

    for (var i = 0; i < tabJeu.length; i++) {
        txt += "<tr>";

        for (var j = 0; j < tabJeu[i].length; j++) {
            if (tabJeu[i][j] === 0) {
                txt += "<td class='card-back' onClick='verif(\"" + i + "-" + j + "\")'> <img style='aspect-ratio: 1 / 2' src='" + dirTheme + "0.png' > </td>";
            } else {
                txt += "<td class='card-back' > <img src='" + getCards(tabJeu[i][j]) + "' > </td>";
                console.log(tabJeu[i][j]);
            }
        }
        txt += "</tr>";
    }
    table.innerHTML = txt;
}

function genereTableauDepart() {
    var tab = [];

    for (var i = 0; i < nbRow; i++) {
        var ligne = [];
        for (var j = 0; j < nbCol; j++) {
            ligne.push(0);
        }

        tab.push(ligne);
    }

    return tab;
}

function genereTableauAleatoire() {
    var tab = [];
    var nbImagePosition = [];

    for (var k = 0; k < repet; k++) {
        nbImagePosition.push(0);
    }

    for (var i = 0; i < nbRow; i++) {
        var ligne = [];
        for (var j = 0; j < nbCol; j++) {
            var fin = false;
            while (!fin) {
                var randomImage = Math.floor(Math.random() * repet);
                if (nbImagePosition[randomImage] < paire) {
                    ligne.push(randomImage + 1);
                    nbImagePosition[randomImage]++;
                    fin = true;
                }
            }
        }
        tab.push(ligne);
    }

    return tab;
}

function exists(arr, search) {
    return arr.some(row => row.includes(search));
}

function endGame() {
    var totalEmptyCells = 0;

    for (var i = 0; i < tabJeu.length; i++) {
        for (var j = 0; j < tabJeu[i].length; j++) {
            if (tabJeu[i][j] === 0) {
                totalEmptyCells++;
            }
        }
    }

    if (totalEmptyCells === 0) {
        return true;
    } else {
        console.log('CONTINUE');
    }
}

var oldSelection = [];
var nbAffiche = 0;
var ready = true;

function verif(card) {
    if (ready) {
        nbAffiche++;
        console.log("nbAffiche =" + nbAffiche);
        console.log("oldSelection =" + oldSelection);

        var ligne = card.substr(0, 1);
        var colonne = card.substr(2, 1);


        tabJeu[ligne][colonne] = tabResultat[ligne][colonne];
        afficherTableau();

        if (nbAffiche > 1) {
            ready = false;

            setTimeout(() => {
                if (tabJeu[ligne][colonne] !== tabResultat[oldSelection[0]][oldSelection[1]]) {
                    tabJeu[ligne][colonne] = 0;
                    tabJeu[oldSelection[0]][oldSelection[1]] = 0;
                }
                afficherTableau();
                ready = true;
                nbAffiche = 0;
                oldSelection = [ligne, colonne];
                if (endGame()) {
                    stop();
                    insertScore();
                    displayEndPage();
                }
            }, 500);
        } else {
            oldSelection = [ligne, colonne];
        }
    }
}

function getCards(valeur) {
    var imgTxt = dirTheme;

    switch (valeur) {
        case 1:
            imgTxt += "1.png";
            break;
        case 2:
            imgTxt += "2.png";
            break;
        case 3:
            imgTxt += "3.png";
            break;
        case 4:
            imgTxt += "4.png";
            break;
        case 5:
            imgTxt += "5.png";
            break;
        case 6:
            imgTxt += "6.png";
            break;
        case 7:
            imgTxt += "7.png";
            break;
        case 8:
            imgTxt += "8.png";
            break;
        case 9:
            imgTxt += "9.png";
            break;
        case 10:
            imgTxt += "10.png";
            break;
        case 11:
            imgTxt += "11.png";
            break;
        case 12:
            imgTxt += "12.png";
            break;
        case 13:
            imgTxt += "13.png";
            break;
        case 14:
            imgTxt += "14.png";
            break;
        case 15:
            imgTxt += "15.png";
            break;
        case 16:
            imgTxt += "16.png";
            break;
        case 17:
            imgTxt += "17.png";
            break;
        case 18:
            imgTxt += "18.png";
            break;
        case 19:
            imgTxt += "19.png";
            break;
        case 20:
            imgTxt += "20.png";
            break;
        case 21:
            imgTxt += "21.png";
            break;
        case 22:
            imgTxt += "22.png";
            break;
        case 23:
            imgTxt += "23.png";
            break;
        case 24:
            imgTxt += "24.png";
            break;
        case 25:
            imgTxt += "25.png";
            break;
        case 26:
            imgTxt += "26.png";
            break;
        case 27:
            imgTxt += "27.png";
            break;
        case 28:
            imgTxt += "28.png";
            break;
        case 29:
            imgTxt += "29.png";
            break;
        case 30:
            imgTxt += "30.png";
            break;
        case 31:
            imgTxt += "31.png";
            break;
        case 32:
            imgTxt += "32.png";
            break;
        case 33:
            imgTxt += "33.png";
            break;
        case 34:
            imgTxt += "34.png";
            break;
        case 35:
            imgTxt += "35.png";
            break;
        case 36:
            imgTxt += "36.png";
            break;
    }

    return imgTxt;
}
var pause = false;

function toggle() {
    if (pause == false) {
        stop();
        ready = false
        pause = true;
    } else {
        start();
        ready = true
        pause = false;
    }
}

// FONCTION CHRONO

let time = document.getElementById('time');
let time2 = document.getElementById('ms');
let ms = 0;

function update_chrono() {
    ms += 1;

    if (ms >= 10) {
        ms = 0;
        sec += 1;
    }

    time.innerText = sec;
    time2.innerText = ms;
}

function start() {
    t = setInterval(update_chrono, 100);
    // btn_start.disabled = false
}

function stop() {
    clearInterval(t);
    // btn_start.disabled = false
}

function reset() {
    clearInterval(t);
    i = false;
    // btn_start.disabled = false

    sec = 0, ms = 0;
    sp[0].innerText = h;
    sp[1].innerText = min;
    sp[2].innerText = sec;
    sp[3].innerText = ms;
}

// Les boutons de la page Level

let level = null;

let nbRow = null;
let nbCol = null;
let repet = null;

document.getElementById('btnNovice').addEventListener('click', function() {
    level = 'Novice';
    table.classList.add('Novice')
    nbRow = 4;
    nbCol = 4;
    repet = 8;
    paire = 2;
    displayTheme();
});

document.getElementById('btnFacile').addEventListener('click', function() {
    level = 'Facile';
    table.classList.add('Facile')
    nbRow = 6;
    nbCol = 5;
    repet = 15;
    paire = 2;
    displayTheme();
});

document.getElementById('btnIntermediaire').addEventListener('click', function() {
    level = 'Intermediaire';
    table.classList.add('Intermediaire')
    nbRow = 8;
    nbCol = 8;
    repet = 32;
    paire = 2;
    displayTheme();
});

document.getElementById('btnDifficile').addEventListener('click', function() {
    level = 'Difficile';
    table.classList.add('Difficile')
    nbRow = 12;
    nbCol = 12;
    repet = 36;
    paire = 4;
    displayTheme();
});

document.getElementById('btnExtreme').addEventListener('click', function() {
    level = 'Extreme';
    table.classList.add('Extreme')
    nbRow = 20;
    nbCol = 20;
    repet = 36;
    paire = 6;
    displayTheme();
});

// Les boutons de la page Theme

let theme = null;
let bg = null;
let dirTheme = null;
var themeSound = document.getElementById('themeSound');

document.getElementById('themeFuturiste').addEventListener('click', function() {
    theme = 'Futuriste';
    dirTheme = '../../assets/deck_futuriste/';
    var themeSound = document.getElementById('themeSoundFutur');
    themeSound.play();
    displayMemory();
});

document.getElementById('themeMagic').addEventListener('click', function() {
    theme = 'Magic';
    dirTheme = '../../assets/deck_magic/';
    var themeSound = document.getElementById('themeSoundMagics');
    themeSound.play();
    displayMemory();
});

document.getElementById('themeHeathstone').addEventListener('click', function() {
    theme = 'Hearthstone';
    dirTheme = '../../assets/deck_hearthstone/';
    var themeSound = document.getElementById('themeSoundHearth');
    themeSound.play();
    displayMemory();
});

document.getElementById('themeClash').addEventListener('click', function() {
    theme = 'Clash';
    dirTheme = '../../assets/deck_clashRoyale/';
    var themeSound = document.getElementById('themeSoundClash');
    themeSound.play();
    displayMemory();
});

function displayEndPage() {
    endPage.style.display = 'flex';
    document.getElementById('endScore').innerText = sec;
    reset()
}

function insertScore() {
    var xhr = new XMLHttpRequest();
    var url = "../../utils/ajaxInsertScore.php";
    var params = "score=" + sec + "&level=" + level;
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Gérer la réponse du serveur ici (par exemple, afficher un message de confirmation)
            console.log(xhr.responseText);
        }
    };

    xhr.send(params);
}



