// Les Fonctions

function displayTheme() {
    pageLevel.style.display='none';
    pageTheme.style.display='block';
    console.log(level)
}

function displayMemory() {
    pageTheme.style.display='none';    
    console.log(theme)
}

// Les pages

let pageLevel = document.getElementById('levelPage')
let pageTheme = document.getElementById('themePage')
let pageNovice = document.getElementsByClassName('quatre')

pageTheme.style.display='none';

// Les boutons de la page Level

let level = null;

document.getElementById('btnNovice').addEventListener('click', function() {
    level = 'Novice'
    displayTheme()
})

document.getElementById('btnFacile').addEventListener('click', function() {
    level = 'Facile'
    displayTheme()
})

document.getElementById('btnIntermediaire').addEventListener('click', function() {
    level = 'Intermediaire'
    displayTheme()
})

document.getElementById('btnDifficile').addEventListener('click', function() {
    level = 'Difficile'
    displayTheme()
})

document.getElementById('btnExtreme').addEventListener('click', function() {
    level = 'Extreme'
    displayTheme()
})

// Les boutons de la page Theme

let theme = null

document.getElementById('themeFuturiste').addEventListener('click', function() {
    theme = 'Futuriste'
    displayMemory()
})

document.getElementById('themeMagic').addEventListener('click', function() {
    theme = 'Magic'
    displayMemory()
})

document.getElementById('themeHeathstone').addEventListener('click', function() {
    theme = 'Hearthstone'
    displayMemory()
})

document.getElementById('themeClash').addEventListener('click', function() {
    theme = 'Clash'
    displayMemory()
})



