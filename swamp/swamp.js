/* Element vi arbetar med */
const eCanvas = document.querySelector("canvas");
const ePoäng = document.querySelector("#poäng");

/* Ställ in bredd och storlek */
eCanvas.width = 800;
eCanvas.height = 600;

/* Starta canvas rityta */
var ctx = eCanvas.getContext("2d");

/* ***************** */
/* Globala variabler */

/* Skapa piga och monster */
var piga = {
    rad: 0,
    kol: 0,
    rot: 0,
    bild: new Image()
}
var monster1 = {
    x: Math.ceil(Math.random() * 750 + 25),
    y: -Math.ceil(Math.random() * 500),
    bild: new Image()
}
var monster2 = {
    x: Math.ceil(Math.random() * 750 + 25),
    y: -Math.ceil(Math.random() * 500),
    bild: new Image()
}
var monster3 = {
    x: Math.ceil(Math.random() * 750 + 25),
    y: -Math.ceil(Math.random() * 500),
    bild: new Image()
}
var mynt1 = {
    x: Math.ceil(Math.random() * 750 + 25),
    y: -Math.ceil(Math.random() * 500),
    bild: new Image()
}
var mynt2 = {
    x: Math.ceil(Math.random() * 750 + 25),
    y: -Math.ceil(Math.random() * 500),
    bild: new Image()
}
var mynt3 = {
    x: Math.ceil(Math.random() * 750 + 25),
    y: -Math.ceil(Math.random() * 500),
    bild: new Image()
}

/* Spelets variabler */
var gameOver = false;
var poäng = 0;

/* 16 kolumner x 12 rader (varje ruta är 50*50px) */
var karta = [
    [0,  1,  2, 33, 33, 33,  3,  0,  0,  0, 54,  0,  0,  0, 54,  0],
    [0, 21, 13,  0, 54,  0, 56,  0, 54,  0, 55,  0, 54,  0, 55,  0],
    [0,  0, 55,  0, 55,  0,  0,  0, 55,  0, 55,  0, 55,  0, 55,  0],
    [31, 0, 55,  0, 21, 33, 33, 33, 35,  0, 56,  0, 55,  0, 55,  0],
    [0,  0, 56,  0,  0,  0,  0,  0, 56,  0,  0,  0, 55,  0, 55,  0],
    [0, 54, 32, 33, 34,  0,  1, 33, 33, 33, 34,  0, 55,  0, 55,  0],
    [0, 55,  0,  0,  0,  0, 55,  0,  0,  0,  0,  0, 55,  0, 55,  0],
    [0, 55,  0, 32,  3,  0, 55,  0, 32, 33,  3,  0, 55,  0, 55,  0],
    [0, 55,  0,  0, 55,  0, 55,  0,  0,  0, 55,  0, 55,  0, 55,  0],
    [0, 55, 31,  0, 55,  0, 21, 33, 34,  0, 55,  0, 55,  0, 56,  0],
    [0, 56,  0,  0, 56,  0,  0,  0,  0,  0, 56,  0, 56,  0,  0,  0],
    [0,  0,  0,  1,  2,  2,  2,  2,  2,  2,  2,  2,  2,  2,  2,  2]
];

/* ********************************* */
/* Inställningar innan spelet startar */

/* Ladda bilderna vi behöver */
piga.bild.src = "./nyckelpiga.png";
monster1.bild.src = "./monster.png";
monster2.bild.src = "./monster.png";
monster3.bild.src = "./monster.png";
mynt1.bild.src = "./coin-sprite.png";
mynt2.bild.src = "./coin-sprite.png";
mynt3.bild.src = "./coin-sprite.png";

/* Lagra alla monster i en array */
var monsters = [];
monsters.push(monster1);
monsters.push(monster2);
monsters.push(monster3);

/* Lägg alla mynt i en array */
var mynten = [];
mynten.push(mynt1);
mynten.push(mynt2);
mynten.push(mynt3);

/* Ladda in tilesheet */
var tileSheet = new Image();
tileSheet.src = "./tilesheet-swamp.png";

/* Välj textinställningar */
ctx.font = "bold 96px sans-serif";
ctx.textAlign = "center";
ctx.fillStyle = "#000";

/* Starta spelet */
gameLoop();

/* ************ */
/* Funktionerna */

/* Rita ut nyckelpigan */
function ritaPiga() {
    ctx.save();
    ctx.translate(piga.kol * 50 + 25, piga.rad * 50 + 25);
    ctx.rotate(piga.rot);
    ctx.drawImage(piga.bild, -25, -25, 50, 50);
    ctx.restore();
}

/* Rita ut en monsterfigur */
function ritaMonster(figur) {
    ctx.drawImage(figur.bild, figur.x, figur.y);
    figur.y++;
    if (figur.y > 600) {
        figur.y = 0;
        figur.x = Math.ceil(Math.random() * 750);
    }
}

/* Rita ut ett mynt */
function ritaMynt(figur) {
    ctx.drawImage(figur.bild, 0, 0, 50, 50, figur.x, figur.y, 50, 50);
    figur.y++;
    if (figur.y > 600) {
        figur.y = 0;
        figur.x = Math.ceil(Math.random() * 750);
    }
}

/* Kolla om monsterfiguren krockar med pigan */
function krockMedPiga(figur) {
    var px = piga.kol * 50;
    var py = piga.rad * 50 + 25;

    /* Om monster är i höjd med pigan */
    if (py < figur.y && figur.y < py + 50) {
        if (px < figur.x && figur.x < px + 50) {
            gameOver = true;
        }
    }
}

/* Få poäng om mynt träffas av pigan */
function plockaMynt(figur) {
    if ((piga.rad * 50 - 25) < figur.y && figur.y < (piga.rad * 50 + 25)) {
        if ((piga.kol * 50 - 25) < figur.x && figur.x < (piga.kol * 50 + 25)) {

            /* Ge en poäng */
            poäng++;
            ePoäng.textContent = poäng;

            /* Spawna om myntet */
            figur.x = Math.ceil(Math.random() * 750);
            figur.y = -Math.ceil(Math.random() * 500);
        }
    }
}

/* Rita ut kartan */
function ritaKarta() {
    /* Gå igenom varje rad */
    for (let rad = 0; rad < karta.length; rad++) {
        /* Gå igenom varje kolumn */
        for (let kol = 0; kol < karta[rad].length; kol++) {
            if (karta[rad][kol] != 0) {
                var rutaId = karta[rad][kol] - 1;
                var rutaX = Math.floor(rutaId % 10) * 32;
                var rutaY = Math.floor(rutaId / 10) * 32;
                ctx.drawImage(tileSheet, rutaX, rutaY, 32, 32, kol * 50, rad * 50, 50, 50);
            }
        }
    }
}


/* Game Over */
function gameOver() {
    ctx.fillStyle = "#888";
    ctx.fillRect(0, 0, 800, 600);
    ctx.fillStyle = "red";
    ctx.fillText("Game Over!", 400, 300);
}

/* Lyssna på pil-tangenter */
window.addEventListener("keydown", function(e) {
    switch (e.key) {
        case "ArrowRight":
            if (karta[piga.rad][piga.kol + 1] == 0) {
                piga.kol++;
            }
            piga.rot = 90;
            break;
        case "ArrowLeft":
            if (karta[piga.rad][piga.kol - 1] == 0) {
                piga.kol--;
            }
            piga.rot = 270;
            break;
        case "ArrowDown":
            if (karta[piga.rad + 1][piga.kol] == 0) {
                piga.rad++;
            }
            piga.rot = Math.PI;
            break;
        case "ArrowUp":
            if (karta[piga.rad - 1][piga.kol] == 0) {
                piga.rad--;
            }
            piga.rot = 0;
            break;
    }
});

/* Animationsloopen */
function gameLoop() {
    /* Rensa canvas */
    ctx.clearRect(0, 0, eCanvas.width, eCanvas.height);

    ritaKarta();

    /* För varje mynt */
    mynten.forEach(ritaMynt);
    mynten.forEach(plockaMynt);

    ritaPiga();

    /* För varje monster i monsters-arrayen */
    monsters.forEach(ritaMonster);
    monsters.forEach(krockMedPiga);

    if (!gameOver) {
        requestAnimationFrame(gameLoop);
    } else {
        gameOver();
    }
}