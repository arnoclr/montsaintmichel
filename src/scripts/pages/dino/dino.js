
const playDiv = document.getElementById('play');
const playDiv_p = document.getElementById('play_p');
const playDiv_icon = document.getElementById('play_icon');
const score = document.getElementById('score');
const shareDiv = document.getElementById('share');
const copyInp = document.getElementById('copyInp');

const canvas = document.getElementById('canvas');
let ctx = canvas.getContext('2d');
ctx.imageSmoothingEnabled = false;

const canvasWidth = canvas.width;
const canvasHeight = canvas.height;


const canvasSheep = document.getElementById('canvasSheep');
let ctxSheep = canvasSheep.getContext('2d');
ctxSheep.imageSmoothingEnabled = false;

const canvasSheepWidth = canvasSheep.width;
const canvasSheepHeight = canvasSheep.height;


const canvasFence = document.getElementById('canvasFence');
let ctxFence = canvasFence.getContext('2d');
ctxFence.imageSmoothingEnabled = false;

const canvasFenceWidth = canvasFence.width;
const canvasFenceHeight = canvasFence.height;


const ciel0 = new Image();
ciel0.src = 'https://i.imgur.com/BneFYyp.png' // '../../../img/dino/ciel0.png';
const ciel1 = new Image();
ciel1.src = 'https://i.imgur.com/xt96Spz.png' // '../../../img/dino/ciel1.png';
const ciel2 = new Image();
ciel2.src = 'https://i.imgur.com/XxABUfG.png' // '../../../img/dino/ciel2.png';
const ciel3 = new Image();
ciel3.src = 'https://i.imgur.com/ZGryMcG.png' // '../../../img/dino/ciel3.png';
const cielmsm = new Image();
cielmsm.src = 'https://i.imgur.com/VDe5CxV.png' // '../../../img/dino/cielmsm.png';

const landscape_grass = new Image();
landscape_grass.src = 'https://i.imgur.com/5VdH2hE.png' // '../../../img/dino/landscape.png';

const fence = new Image();
fence.src = 'https://i.imgur.com/2BczOio.png' // '../../../img/dino/fence.png';

const sheep = new Image();
sheep.src = 'https://i.imgur.com/gB3WgxJ.png' // '../../../img/dino/sheep.png';
const sheep1 = new Image();
sheep1.src = 'https://i.imgur.com/NdYXllD.png' // '../../../img/dino/sheep1.png';
const sheep2 = new Image();
sheep2.src = 'https://i.imgur.com/MPkRDoB.png' // '../../../img/dino/sheep2.png';

const jumpSound = new Audio('https://cdn.arnocellarier.fr/s/iut/msm/mp3/aubert/jump.mp3') // '../../../sounds/dino/jump.mp3'
jumpSound.volume = 0.7;

const hitSound = new Audio('https://cdn.arnocellarier.fr/s/iut/msm/mp3/aubert/hit.mp3') // '../../../sounds/dino/hit.mp3'
hitSound.volume = 0.5;


ctxSheep.fillStyle = 'black';
ctxSheep.font = "50px Arial";
ctxSheep.fillText('Loading...', 300, 200);
let load = new Image();
load.src = 'https://i.imgur.com/AD3MbBi.jpeg';

let waitForAllImages = setInterval(function () {
    console.log(waitForAllImages);
    if (
        ciel0.complete &&
        ciel1.complete &&
        ciel2.complete &&
        ciel3.complete &&
        cielmsm.complete &&
        landscape_grass.complete &&
        fence.complete &&
        sheep.complete &&
        sheep1.complete &&
        sheep2.complete
    ) {
        ctxSheep.clearRect(0, 0, canvasSheepWidth, canvasSheepHeight);
        init();
        clearInterval(waitForAllImages);
        return true;
    }
}, 10);



score.innerHTML = '0';
let getScore = false;
let block = true;
let isPlaying = false;
let sheep_1 = true;
let sheep_2 = false;
let requestAnimation = true;
let letDraw = false;

window.addEventListener('keydown', function (e) {
    if (e.key === ' ' && e.target == document.body) {
        e.preventDefault();
    }
});

document.addEventListener('keydown', function (e) {
    if (playDiv.innerHTML == 'Rejouer ?' && !isPlaying) {
        if (e.key === ' ') { play(); }
    }
});

playDiv.addEventListener('click', play);

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// PLAY
async function play() {
    playDiv.style.display = 'none';
    shareDiv.style.display = 'none';

    await new Promise(resolve => setTimeout(resolve, 100)); // léger délai avant de lancer le jeu afin de rendre le lancement plus naturel.

    block = false;
    isPlaying = true;
    letDraw = true;
    rdmFence = Math.floor(Math.random() * (0 - cw2) + cw2);
    newGame();

    document.addEventListener('keydown', function (e) {
        if (e.key === ' ') { jump(); }
    });

    animSheep();
    animSky();

    getScore = true;
    score.innerHTML = '0';
}

totalscore = 0;
let increaseScore = setInterval(function () {
    if (getScore) {
        score.innerHTML = parseInt(score.innerHTML) + 1;
        totalscore = parseInt(score.innerHTML);
    }
}, 200);

let gameSpeed = 1;
let increaseSpeed = setInterval(function () {
    if (totalscore % 150 == 0 && totalscore != 0) { gameSpeed = (gameSpeed * 10 + 0.1 * 10) / 10; }
    else if (totalscore % 300 == 0 && totalscore != 0) { gameSpeed = (gameSpeed * 10 + 0.1 * 10) / 10; clearInterval(increaseSpeed); }
}, 100);

let cw = canvasWidth;
let cw2 = canvasWidth / 2;
let x = 0;
let x2 = cw2
let yPos = 0;
let jumpHeight = 1;
let jumpMax = 90;
let jumping = false;
let gravity = 0.9;
let rdmFence;

let sky0_pos;
let sky1_pos;
let sky01_pos;
let sky2_pos;
let sky02_pos;
let sky3_pos;
let skymsm_pos;
let landscape_gras1_pos;
let landscape_gras2_pos;
let landscape_gras3_pos;
let landscape_gras4_pos;
let fence_pos;

let sky0;
let sky1;
let sky01;
let sky2;
let sky02;
let sky3;
let skymsm;
let landscape_gras1;
let landscape_gras2;
let landscape_gras3;
let landscape_gras4;
let fence_;
let sheep_;
let sheep1_;
let sheep2_;

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ANIMATION SHEEP
class Sky {
    constructor(img, speedModifier, pos) {
        this.x = pos;
        this.y = 0;
        this.width = cw2;
        this.height = canvasHeight;
        this.x2 = pos + cw2;
        this.img = img;
        this.speedModifier = speedModifier;
        this.speed = gameSpeed * this.speedModifier;
        this.yPos = yPos;
        this.rdmFence = rdmFence;
    }

    update() {
        this.speed = gameSpeed * this.speedModifier;
        if (this.x < -this.width) {
            this.x = cw + this.x2 - this.speed;
        }

        if (this.x2 < -this.width) {
            this.x2 = cw + this.x - this.speed;
        }

        this.x = Math.floor(this.x - this.speed);
        this.x2 = Math.floor(this.x2 - this.speed);
    }

    updateSheep() {
        ctxSheep.clearRect(0, 0, canvasSheepWidth, canvasSheepHeight);
    }

    updateFence() {
        this.speed = gameSpeed * this.speedModifier;
        if (this.x < -this.width - rdmFence) {
            this.x = cw + this.x2 - this.speed;
        }

        if (this.x2 < -cw) {
            this.x2 = cw + this.x - this.speed;
        }

        this.x = Math.floor(this.x - this.speed);
        this.x2 = Math.floor(this.x2 - this.speed);
    }

    renderJumpUp() {
        if (this.yPos <= jumpMax && jumping) {

            this.yPos += jumpHeight * gravity;
            this.updateSheep();
        }
    }

    renderJumpDown() {
        if (this.yPos >= 0 && !jumping) {

            this.yPos -= jumpHeight;
            this.updateSheep();
        }

        if (this.yPos <= 0) {
            block = false;
        }
    }

    draw() {
        ctx.drawImage(this.img, this.x, this.y, this.width, this.height);
    }

    drawfence(random) {
        ctxFence.drawImage(this.img, this.x + rdmFence, (canvasFenceHeight - 90), 40, 40);
    }

    drawsheep() {
        ctxSheep.drawImage(this.img, 10, ((canvasHeight - 90) - this.yPos), 50, 40);
    }

    isAliveSheep() {
        let fenceX = fence_.x + rdmFence;

        if (
            fenceX <= 60
            && fenceX + 40 >= 10
            && (canvasFenceHeight - 90) <= ((canvasFenceHeight - 50) - this.yPos)
            && (canvasFenceHeight - 50) >= ((canvasHeight - 90) - this.yPos)
        ) {

            hitSound.play();
            copyFinalScore = "J'ai réalisé un score de " + totalscore + " avec 🐑 Aubert 🐑 ! \n\nVenez me concurrencer sur https://montsaintmichel.christopherbeaurain.com/aubert";
            copyInp.value = copyFinalScore;
            stop();
        }
    }
}

function newGame() {
    sky0_pos = 0;
    sky1_pos = cw2;
    sky01_pos = cw2 * 2;
    sky2_pos = cw2 * 3;
    sky02_pos = cw2 * 4;
    sky3_pos = cw2 * 5;
    skymsm_pos = cw2;
    landscape_gras1_pos = 0;
    landscape_gras2_pos = cw2;
    landscape_gras3_pos = cw2 * 2;
    landscape_gras4_pos = cw2 * 3;
    fence_pos = cw;

    sky0 = new Sky(ciel0, 0.5, sky0_pos);
    sky1 = new Sky(ciel1, 0.5, sky1_pos);
    sky01 = new Sky(ciel0, 0.5, sky01_pos);
    sky2 = new Sky(ciel2, 0.5, sky2_pos);
    sky02 = new Sky(ciel0, 0.5, sky02_pos);
    sky3 = new Sky(ciel3, 0.5, sky3_pos);
    skymsm = new Sky(cielmsm, 0.5, sky2_pos);
    landscape_gras1 = new Sky(landscape_grass, 2, landscape_gras1_pos);
    landscape_gras2 = new Sky(landscape_grass, 2, landscape_gras2_pos);
    landscape_gras3 = new Sky(landscape_grass, 2, landscape_gras3_pos);
    landscape_gras4 = new Sky(landscape_grass, 2, landscape_gras4_pos);
    fence_ = new Sky(fence, 2, fence_pos);
    sheep_ = new Sky(sheep, 1, 50);
    sheep1_ = new Sky(sheep1, 1, 0);
    sheep2_ = new Sky(sheep2, 1, 0);
}

function anim(img) {
    img.update();
    img.draw();
}

function animSky() {

    if (letDraw) {
        ctx.clearRect(0, 0, canvasWidth, canvasHeight);
        ctxSheep.clearRect(0, 0, canvasSheepWidth, canvasSheepHeight);
        ctxFence.clearRect(0, 0, canvasFenceWidth, canvasFenceHeight);

        anim(sky0);
        anim(sky1);
        anim(sky01);
        anim(sky2);
        anim(sky02);
        anim(sky3);

        if (totalscore > 100 && totalscore < 160) { anim(skymsm); }

        anim(landscape_gras1);
        anim(landscape_gras2);
        anim(landscape_gras3);
        anim(landscape_gras4);

        fence_.updateFence();
        fence_.drawfence(rdmFence);

        requestAnimationFrame(animSky);

        if (requestAnimation) {
            requestAnimationFrame(animSheep);
        } else {
            requestAnimationFrame(animJump);
        }
    }
};

function animSheep() {
    if (sheep_1) {
        sheep1_.drawsheep();
        setTimeout(function () { sheep_1 = false; sheep_2 = true; sheep1_.updateSheep(); }, 200);
    }

    if (sheep_2) {
        sheep2_.drawsheep();
        setTimeout(function () { sheep_2 = false; sheep_1 = true; sheep2_.updateSheep(); }, 200);
    }
}

function animJump() {
    sheep_.update();
    sheep_.drawsheep();
}

function jump() {
    if (!block) {

        jumpSound.play();
        block = true;
        jumping = true;
        requestAnimation = false;

        let jumpIn = setInterval(function () {

            if (sheep_.yPos >= jumpMax) {
                clearInterval(jumpIn);
                jumping = false;
                let jumpOut = setInterval(function () {

                    if (sheep_.yPos <= 0) {
                        clearInterval(jumpOut);
                    }
                    sheep_.renderJumpDown();
                }, 3);
            }

            sheep_.renderJumpUp();
        }, 2);

        setTimeout(function () { sheep_.updateSheep(); requestAnimation = true; }, 800);
    }
}

let copyFinalScore;
let isAlive = setInterval(function () {
    if (isPlaying) {
        sheep_.isAliveSheep();
    }
}, 25);

shareDiv.onclick = function () {
    copyInp.select();
    document.execCommand('copy');
    console.log('vous avez copié ' + copyInp.value);
    fancyAlert("Copié dans le presse-papier", "done", "copy");
}

function stop() {
    playDiv_p.innerHTML = 'Rejouer ?';
    playDiv_icon.innerHTML = 'replay';
    playDiv.style.display = 'flex';
    playDiv.style.top = '55%';
    shareDiv.style.display = 'flex';
    shareDiv.style.top = '35%';

    getScore = false;
    isPlaying = false;
    block = true;
    letDraw = false;

    resetPos();
    return;
}

function resetPos() {
    sky0.x = 0;
    sky1.x = cw2;
    sky01.x = cw2 * 2;
    sky2.x = cw2 * 3;
    sky02.x = cw2 * 4;
    sky3.x = cw2 * 5;
    landscape_gras1.x = 0;
    landscape_gras2.x = cw2;
    landscape_gras3.x = cw2 * 2;
    landscape_gras4.x = cw2 * 3;
    fence_.x = cw;
    sheep_.x = 50;
    sheep1_.x = 0;
    sheep2_.x = 0;
}

function init() {
    newGame();
    sky0.draw();
    sky1.draw();
    sky01.draw();
    sky2.draw();
    sky02.draw();
    sky3.draw();

    landscape_gras1.draw();
    landscape_gras2.draw();
    landscape_gras3.draw();
    landscape_gras4.draw();

    sheep_.drawsheep();
}
