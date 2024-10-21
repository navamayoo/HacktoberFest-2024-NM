const board = document.getElementById("game-board");
const moveCounter = document.getElementById("move-counter");
const restartBtn = document.getElementById("restart-btn");
const timerElement = document.getElementById("timer");

const endGameModal = document.getElementById("end-game-modal");
const finalStats = document.getElementById("final-stats");
const playAgainBtn = document.getElementById("play-again-btn");
const closeBtn = document.querySelector(".close-btn");

let cards = [];
let flippedCards = [];
let matchedCards = [];
let moves = 0;
let timer;
let timeElapsed = 0;
let gameStarted = false;

const cardIcons = ['🍎', '🍌', '🍇', '🍉', '🍒', '🍓', '🍍', '🥭'];

const allCards = [...cardIcons, ...cardIcons];

function shuffleCards(array) {
    return array.sort(() => 0.5 - Math.random());
}

function initGame() {
    board.innerHTML = "";
    matchedCards = [];
    flippedCards = [];
    moves = 0;
    moveCounter.textContent = moves;
    timeElapsed = 0;
    gameStarted = false;
    clearInterval(timer);
    updateTimer();

    const shuffledCards = shuffleCards(allCards);

    shuffledCards.forEach((icon, index) => {
        const card = document.createElement("div");
        card.classList.add("card");
        card.dataset.icon = icon;
        card.dataset.index = index;
        card.addEventListener("click", flipCard);
        board.appendChild(card);
        cards.push(card);
    });

    endGameModal.style.display = "none";
}

function flipCard() {
    if (!gameStarted) {
        startTimer();
        gameStarted = true;
    }

    if (flippedCards.length < 2 && !this.classList.contains("flipped")) {
        this.classList.add("flipped");
        this.textContent = this.dataset.icon;
        flippedCards.push(this);

        if (flippedCards.length === 2) {
            checkForMatch();
        }
    }
}

function checkForMatch() {
    moves++;
    moveCounter.textContent = moves;

    const [card1, card2] = flippedCards;

    if (card1.dataset.icon === card2.dataset.icon) {
        matchedCards.push(card1, card2);
        card1.classList.add("matched");
        card2.classList.add("matched");
        flippedCards = [];

        if (matchedCards.length === allCards.length) {
            setTimeout(endGame, 300);
        }
    } else {
        setTimeout(() => {
            card1.classList.remove("flipped");
            card2.classList.remove("flipped");
            card1.textContent = "";
            card2.textContent = "";
            flippedCards = [];
        }, 1000);
    }
}

function startTimer() {
    timer = setInterval(() => {
        timeElapsed++;
        updateTimer();
    }, 1000);
}

function updateTimer() {
    timerElement.textContent = `Time: ${formatTime(timeElapsed)}`;
}

function formatTime(seconds) {
    const minutes = Math.floor(seconds / 60);
    const remainingSeconds = seconds % 60;
    return `${String(minutes).padStart(2, "0")}:${String(remainingSeconds).padStart(2, "0")}`;
}

function endGame() {
    clearInterval(timer);
    finalStats.innerHTML = `You completed the game in <strong>${moves}</strong> moves and took <strong>${formatTime(timeElapsed)}</strong>.`;
    endGameModal.style.display = "flex";
}

closeBtn.onclick = function () {
    endGameModal.style.display = "none";
}

playAgainBtn.onclick = function () {
    initGame();
}

restartBtn.addEventListener("click", initGame);

window.onload = initGame;
