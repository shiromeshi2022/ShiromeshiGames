'use strict';
{
// <!-----------------------↓↓[js for starting]↓↓--------------------------->

// ゲーム開始
const startSection = document.getElementById('startSection');
const startBtn = document.getElementById('startBtn');
const countDownSection = document.getElementById('countDownSection');

startBtn.addEventListener('click', () => {
  startSection.classList.add('d-none');
  countDownSection.classList.remove('d-none');
  countDown();
});


// カウントダウン関数
const countDownLabel = document.getElementById('countDownLabel');
function countDown() {
  countDownLabel.textContent = '3';
  setTimeout(() => {
    countDownLabel.textContent = '2';
    setTimeout(() => {
      countDownLabel.textContent = '1';
      setTimeout(() => {
        startGame();
      }, 1000);
    }, 1000);
  }, 1000);
}



// <!-----------------------↓↓[js for playing]↓↓--------------------------->

// 関数（ゲームスタート（リスタートは別途）→タイマー起動）
const playSection = document.getElementById('playSection');
let startedTime;
function startGame() {
  countDownSection.classList.add('d-none');
  playSection.classList.remove('d-none');
  startedTime = Date.now();
  timerUpdate();
  setGame();
}


// 関数（タイマー起動→更新→終了）
const timerLabel = document.getElementById('timerLabel');
const timeLimit = 60 * 1000;
let leftTime;

function timerUpdate() {
  const timeoutId = setTimeout(() => {
    leftTime = ((timeLimit + startedTime - Date.now()) / 1000).toFixed(2);
    timerUpdate();
    timerLabel.textContent = `制限時間：${leftTime}`;
  }, 10); 
  
  if(leftTime <= 0) {
    clearTimeout(timeoutId);
    setTimeout(() => {
      timerLabel.textContent = "終了！";
      showResult();
    }, 10);
  } 
}

//関数（タイマーリセット）
function timerReset() {
  leftTime = timeLimit;
  isTimerRunning = false;
  timerLabel.textContent = '制限時間：60.00';
}


// 関数（順番ゲームをセットする）
const numbers = [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16];
const colors = ['red', 'blue', 'yellow', 'skyblue', 'orange', 'lightgreen', 'pink', 'mediumpurple', 'palegoldenrod', 'salmon', 'palevioletred', 'aquamarine'];
const numberPlatesZone = document.getElementById('numberPlatesZone');

function setGame() {
  const shuffledNumbers = shuffle(numbers);
  for( let i = 0; i < numbers.length; i++ ){
    const div = document.createElement('div');
    div.textContent = shuffledNumbers[i];
    div.classList.add('numberPlate');
    div.style.background = colors[ Math.floor(Math.random() * colors.length) ];
    numberPlatesZone.appendChild(div);
  }
}

// 関数（シャッフルしてreturn）
function shuffle(arr) {
  for(let i = arr.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [arr[i], arr[j]] = [arr[j], arr[i]];
  }
  return arr;
}

// ナンバープレートのクリック反応
const numberPlates = document.getElementsByClassName('numberPlate');
numberPlates.forEach(numberPlate => {
  check();
});

// 関数（答えをチェックする）
let currentOrder = 1;
function check(playerAnswer) {
  if(currentOrder === playerAnswer){
    playerAnswer.style.background = 'gray';
    currentOrder++;
  }
}



// <!-----------------------↓↓[js for finishing]↓↓--------------------------->
const result = document.getElementById('result');
const scoreLabel = document.querySelector('#result > p');
const restartBtn = document.getElementById('restartBtn');

// ゲーム終了関数
function showResult() {
  scoreLabel.textContent = `点数:${score} / ${quiz_data.length - 1}`;
  play.classList.add('d-none');
  result.classList.remove('d-none');

  const showRecord = document.getElementById('showRecord');
  const informRecord = document.getElementById('informRecord');
  const sendRecordBtn = document.getElementById('sendRecordBtn');

  if(isUser){//ユーザーのみrecord更新
    if(recordScore < score){
      //最高得点超えた場合の表示
      showRecord.classList.add('d-none');
      informRecord.classList.remove('d-none');
      sendRecordBtn.classList.remove('d-none');
      //formに点数追加
      const form = document.getElementById('sendRecord');
      const input = document.getElementById('sendRecordInput');
      input.value = score;
      form.appendChild(input);
      console.log(form);
    }else{
      showRecord.classList.remove('d-none');
      informRecord.classList.add('d-none');
      sendRecordBtn.classList.add('d-none');
    }
  }
}


// リプレイ
restartBtn.addEventListener('click', () => {
  result.classList.add('d-none');
  currentNum = 0;
  nextBtn.textContent = '次の問題';
  setQuiz();
  play.classList.remove('d-none');
});


}