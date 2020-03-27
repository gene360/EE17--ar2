/* Element vi arbetar med */
const eCanvas = document.querySelector("canvas");

/* Ställ in bredd och storlek */
eCanvas.width = 800;
eCanvas.height = 600;

/* Starta canvas rityta */
var ctx = eCanvas.getContext("2d");

/* Globala variabler */
var piga = {
    rad: 0,
    kol: 0,
    rot: 0,
    bild: new Image()
}
var karta = [
    [0, 0, 1, 0, 1, 0, 0 , 1, 0, 0, 0, 0, 1, 0, 0, 0],
    [0, 0, 1, 0, 1, 0, 0 , 1, 0, 0, 0, 0, 1, 0, 1, 0],
    [0, 0, 1, 0, 1, 0, 0 , 1, 0, 0, 0, 0, 1, 0, 0, 0],
    [0, 0, 1, 0, 1, 1, 0 , 0, 0, 0, 1, 0, 0, 1, 0, 0],
    [0, 0, 1, 0, 1, 1, 0 , 0, 0, 0, 1, 0, 0, 1, 0, 0],
    [0, 0, 1, 0, 1, 1, 0 , 0, 0, 0, 1, 0, 0, 1, 0, 0],
    [0, 0, 1, 0, 1, 1, 0 , 0, 0, 0, 1, 0, 0, 1, 0, 0],
    [0, 0, 0, 0, 1, 0, 0 , 0, 0, 0, 1, 0, 0, 1, 0, 0],
    [0, 0, 0, 0, 1, 0, 0 , 0, 0, 0, 1, 0, 0, 1, 0, 0],
    [0, 0, 0, 0, 1, 0, 0 , 0, 0, 0, 1, 0, 0, 1, 0, 0],
    [0, 0, 0, 0, 1, 0, 0 , 0, 0, 0, 1, 0, 0, 1, 0, 0],
    [0, 0, 0, 0, 0, 0, 0 , 0, 0, 0, 1, 0, 0, 1, 0, 0],
    [0, 0, 0, 0, 0, 0, 0 , 0, 0, 0, 1, 0, 0, 1, 0, 0],
    [0, 0, 0, 0, 0, 0, 0 , 0, 0, 0, 1, 0, 0, 1, 0, 0],
    [0, 0, 0, 0, 0, 0, 0 , 0, 0, 0, 1, 0, 0, 1, 0, 0],
    [0, 0, 0, 0, 0, 0, 0 , 0, 0, 0, 1, 0, 0, 1, 0, 0]
];

/* Nyckelpigans startläge */
piga.x = 0;
piga.y = 0;
piga.bild.src = "./nyckelpiga.png";

monster.y = 0
monster.bild.src = "./monster.png";

/* Ladda in tilesheet */
var tileSheet = new Image();
tileSheet.src = "./tilesheet.png";

/* Rita ut nyckelpigan */
function ritaPiga() {
    ctx.save();
    ctx.translate(piga.kol * 50 + 25, piga.rad * 50 + 25);
    ctx.rotate(piga.rot);
    ctx.drawImage(piga.bild, -25, -25, 50, 50);
    ctx.restore();
}



/* Rita ut kartan */
function ritaKarta() {
    /* Gå igenom varje rad */
    for (let rad = 0; rad < karta.length; rad++) {
        /* Gå igenom varje kolumn */
        for (let kol = 0; kol < karta[rad].length; kol++) {
            if (karta[rad][kol] == 1) {
                /* Rita ut en svar fyrkant 50x50 px */
                var rutaPos = karta[rad][kol] * 32;
                ctx.drawImage(tileSheet, rutaPos, 0, 32, 32, kol * 50, rad * 50, 50, 50);
                //ctx.fillRect(kol * 50, rad * 50, 50, 50);
            }
        }
    }
}

/* Lyssna på pil-tangenter */
window.addEventListener("keydown", function(e) {
    switch (e.key) {
        case "ArrowRight":
            if (karta[piga.rad][piga.kol + 1] == 0) {
                piga.kol++;
            }
            piga.rot = 90 * (Math.PI / 180);
            break;
        case "ArrowLeft":
            if (karta[piga.rad][piga.kol - 1] == 0) {
                piga.kol--;
            }
            piga.rot = -90 * (Math.PI / 180)
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
    ritaPiga();

    requestAnimationFrame(gameLoop);
}

/* Starta spelet */
gameLoop();