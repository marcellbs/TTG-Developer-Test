let startTime;
let elapsedTime = 0;
let interval;
let running = false;
const display = document.querySelector('.display');
const startPauseButton = document.getElementById('startPause');
const stopButton = document.getElementById('stop');
const flagButton = document.getElementById('flag');
const resetButton = document.getElementById('reset');
const flagsList = document.getElementById('flags');

function formatTime(ms) {
    const minutes = Math.floor(ms / 60000);
    const seconds = Math.floor((ms % 60000) / 1000);
    const milliseconds = ms % 1000;

    return `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}.${milliseconds.toString().padStart(3, '0')}`;
}

function updateDisplay() {
    const currentTime = running ? Date.now() - startTime + elapsedTime : elapsedTime;
    display.textContent = formatTime(currentTime);
}

startPauseButton.addEventListener('click', () => {
    if (running) {
        clearInterval(interval);
        startPauseButton.textContent = 'Start';
        startPauseButton.style.backgroundColor = '#008CBA';
        elapsedTime += Date.now() - startTime;
    } else {
        startTime = Date.now();
        interval = setInterval(updateDisplay, 10);
        startPauseButton.style.backgroundColor = 'orangered';
        startPauseButton.textContent = 'Pause';
    }
    running = !running;
});

stopButton.addEventListener('click', () => {
    clearInterval(interval);
    startPauseButton.textContent = 'Start';
    display.textContent = '00:00.000';
    running = false;
    startTime = undefined;
    elapsedTime = 0;
    // Hapus catatan flag
    flagsList.innerHTML = '';
});

flagButton.addEventListener('click', () => {
    if (running) {
        const currentTime = Date.now() - startTime + elapsedTime;
        const flagItem = document.createElement('li');
        flagItem.textContent = formatTime(currentTime);
        flagsList.appendChild(flagItem);
    }
});

// resetButton.addEventListener('click', () => {
//     clearInterval(interval);
//     startPauseButton.textContent = 'Start';
//     display.textContent = '00:00.000';
//     running = false;
//     startTime = undefined;
//     elapsedTime = 0;

    
// });

updateDisplay();
