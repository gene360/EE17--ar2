/* Element vi jobbar med */
const eCanvas = document.querySelector("canvas");

/* Skapa canvas */
var ctx = eCanvas.getContext("2d");
eCanvas.width = 512;
eCanvas.height = 480;


/* Objekten i spelet */
var spel = {
    tid: 60,
    poäng: 0,
    isGameOver: false,
    bild: new Image()
};
var hjälte = {
    x: 0,
    y: 0,
    a: 5,
    bild: new Image()
};
var monster = {
    x: 0,
    y: 0,
    bild: new Image()
};

/* Ladda in bilderna */
spel.bild.src = "./bilder/background.png";
hjälte.bild.src = "./bilder/hero.png";
monster.bild.src = "./bilder/monster.png"

/* Canvas inställningar */
ctx.fillStyle = "#FFF";

/* Kör igång spelet */
reset();
gameLoop();

/* ********* */
/* Händelser */

/* Lyssna på tangentnedtryckningar */
window.addEventListener("keydown", function(e) {
    switch (e.key) {
        case "ArrowRight":
            if (hjälte.x < 455) {
                hjälte.x += hjälte.a;
            }
            break;
        case "ArrowLeft":
            if (hjälte.x < 30) {
                hjälte.x -= hjälte.a;
            }
            break;
        case "ArrowUp":
            if (hjälte.y < 420) {
                hjälte.y += hjälte.a;
            }
            break;
        case "ArrowDown":
            if (hjälte.y < 30) {
                hjälte.y += hjälte.a;
            }
            break;
    }
});

window.setInterval(function() {
    spel.tid --;

    if (spel.tid <= 0) {
        spel.isGameOver = true;
        ctx.fillText("Game Over!", 50, 240)
    }
    
}, 1000);

/* ************ */
/* Funktionerna */

/* Återställ spelet */


function reset() {
    /* Placera ut hjälten */
    hjälte.x = eCanvas.width / 2;
    hjälte.y = eCanvas.height / 2;

    /* Spawna monstret slumpmässigt */
    monster.x = 32 + Math.random() * (eCanvas.width - 100);
    monster.y = 32 + Math.random() * (eCanvas.height - 100);
}

/* Ritar ut */
function ritaBakgrund() {
    ctx.drawImage(spel.bild, 0, 0);
}
function ritaHjälte() {
    ctx.drawImage(hjälte.bild, hjälte.x, hjälte.y);
}
function ritaMonster() {
    ctx.drawImage(monster.bild, monster.x, monster.y);
}

/* Kollar om hjälten träffar monstret */
function kollaKollision() {
    /* Träffar hjälten monstret? */
    if (hjälte.x <= (monster.x + 32) && hjälte.x <= (monster.x + 32) && 
        hjälte.y <= (monster.y + 32) && hjälte.y <= (monster.y + 32)) {
        reset();
        spel.poäng++;
    }
    /* Skriv ut */
    ctx.font = "24px Helvetica"
    ctx.fillText("Fångade monster: " + spel.poäng, 32, 50);
    ctx.fillText("Tid kvar: " + spel.tid, 32, 80);
}

/* Spelloopen */
function gameLoop() {
    ritaBakgrund();
    ritaHjälte();
    ritaMonster();
    kollaKollision();

    if (!spel.isGameOver) {
        requestAnimationFrame(gameLoop);
    }
}