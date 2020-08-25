'use strict';
{
  //↓要素取得↓
  const one = document.getElementById('one'); //電卓↓↓
  const two = document.getElementById('two');
  const three = document.getElementById('three');
  const four = document.getElementById('four');
  const five = document.getElementById('five');
  const six = document.getElementById('six');
  const seven = document.getElementById('seven');
  const eight = document.getElementById('eight');
  const nine = document.getElementById('nine');
  const zero = document.getElementById('zero');
  const addition = document.getElementById('addition');
  const subtract = document.getElementById('subtract');
  const multiple = document.getElementById('multiple');
  const divide = document.getElementById('divede');
  const answerBtn = document.getElementById('answer'); //電卓↑↑
  // const period = document.getElementById('period');
  const screen = document.getElementById('screen');
  const question = document.getElementById('question');
  const addedScoreNav = document.getElementById('addedScore'); //獲得点数表示
  const returnBtn = document.getElementById('returnBtn');
  const deleteBtn = document.getElementById('deleteBtn');
  const reloadBtn = document.getElementById('reloadBtn')
  const questionTurn = document.getElementById('questionTurn'); //game-nav
  const score = document.getElementById('score'); //game-nav
  const startWindow = document.getElementById('startWindow');
  const timer = document.getElementById('timer');
  const resulBtn = document.getElementById('startBtn');
  const timertWindow = document.getElementById('resultWindow');
  const resultScore = document.getElementById('resultScore');
  const resultCorrect = document.getElementById('resultCorrect');
  const resultMiss = document.getElementById('resultMiss');
  const restartBtn = document.getElementById('restartBtn');
  const menuBtn = document.getElementById('menuBtn');
  const navigation = document.getElementById('navigation');
  const userRecord = document.getElementById('userRecord');
  const showRecord = document.getElementById('showRecord');
  const informRecord = document.getElementById('informRecord');
  const sendRecordBtn = document.getElementById('sendRecordBtn');
  // ↑要素取得↑





  //↓変数宣言↓
  let firstTerm = true;
  let firstTermOne = true;
  let firstTermTen = false;
  let firstFormula = 0;

  let symbleTerm = false;
  let symble = '';

  let secondTerm = false;
  let secondTermOne = false;
  let secondTermTen = false;
  let secondFormula = 0;

  let answer = 0;

  let questionTurnNumber = 1;
  let addedScore = 0;
  let scoreCounter = 0;
  let correctCounter = 0;
  let missCounter = 0;

  let timeRunning = false;
  let startTime;
  let timeLimit = 60 * 1000;
  let timeLeft;

  let isGamePlaying = false;
  let questionSettable = true;
  // ↑変数宣言↑






  //↓クリック反応↓
    //↓クリック反応（電卓↓
  one.addEventListener('click', () => {
    addNumber(1);
    addedScore -= 5;
  });
  
  two.addEventListener('click', () => {
    addNumber(2);
  });
  
  three.addEventListener('click', () => {
    addNumber(3);
  });
  
  four.addEventListener('click', () => {
    addNumber(4);
  });
  
  five.addEventListener('click', () => {
    addNumber(5);
  });
  
  six.addEventListener('click', () => {
    addNumber(6);
  });
  
  seven.addEventListener('click', () => {
    addNumber(7);
  });
  
  eight.addEventListener('click', () => {
    addNumber(8);
  });
  
  nine.addEventListener('click', () => {
    addNumber(9);
  });
  
  zero.addEventListener('click', () => {
    addNumber(0);
    addedScore -= 5;
  });
  
  addition.addEventListener('click', () => {
    additionJoint();
  });
  
  subtract.addEventListener('click', () => {
    subtractJoint();
  });
  
  multiple.addEventListener('click', () => {
    multipleJoint();
  });
  
  divide.addEventListener('click', () => {
    divideJoint();
  });
  
  // period.addEventListener('click', () => {
  //   periodJoint();
  // });
    //↑クリック反応（電卓）↑

  deleteBtn.addEventListener('click', () => {
    reset();
  });

  reloadBtn.addEventListener('click', () => {
    location.reload();
  });

  startBtn.addEventListener('click', () => {
    startGame();
  });

  restartBtn.addEventListener('click', () => {
    restart();
  });
  // ↑クリック反応↑





  //↓スタートゲーム関数↓
  function startGame() {
    setQuestion();
    startWindow.classList.add('hidden');
    isGamePlaying = true;
    reset();
    startTime = Date.now();
    timeRunning = true;
    timerUpdate();
  }
  // ↑スタートゲーム関数↑




  //↓リスタート関数↓
  function restart() {
    resultWindow.classList.add('d-none');
    allReset();
    setQuestion();
    isGamePlaying = true;
    startTime = Date.now();
    timeRunning = true;
    timerUpdate();
  }
  //↑リスタート関数↑
  
  
  
  

  // ↓タイマー関数↓
  timer.textContent = '制限時間：60.00';

  function timerUpdate() {
    if(timeRunning === false) {
      return;
    }
    const timeoutId = setTimeout(() => {
      timeLeft = ((timeLimit + startTime - Date.now()) / 1000).toFixed(2);
      timerUpdate();
      timer.textContent = `制限時間：${timeLeft}`;
    }, 10); 
    
    if(timeLeft <= 0) {
      showResult();
      clearTimeout(timeoutId);
      setTimeout(() => {
        timer.textContent = "終了！";
      }, 10);
    } 
  }

  function timerReset() {
    timeLeft = timeLimit;
    timeRunning = false;
    timer.textContent = '制限時間：60.00';
  }
  // ↑タイマー関数↑





  // ↓点数表示↓
  score.textContent = `点数：${scoreCounter}点`;

  function showAddScore (addScore) {
    if(addScore >= 0) {
      addedScoreNav.style.color = 'blue';
      addedScoreNav.textContent = `+${addedScore}点`;
      addedScoreNav.classList.remove('d-none');
      setTimeout(() => {
        addedScoreNav.classList.add('d-none');
      }, 500);
      addedScore = 0;
    } else {
      addedScoreNav.style.color = 'red';
      addedScoreNav.textContent = `${addedScore}点`;
      addedScoreNav.classList.remove('d-none');
      setTimeout(() => {
        addedScoreNav.classList.add('d-none');
      }, 500);
      addedScore = 0;
    }
  }
  // ↑点数表示↑





  //↓電卓初期化関数↓
  function reset () {
    firstTerm = true;
    firstTermOne = true;
    firstTermTen = false;
    firstFormula = 0;
    symbleTerm = false;
    symble = '';
    secondTermOne = false;
    secondTermTen = false;
    secondFormula = 0;
    answer = 0;
    addedScore = 0;
    screen.textContent = '';
  }
  //↑電卓初期化関数↑




  //↓初期化関数↓
  function allReset () {
    reset();
    questionTurnNumber = 1;
    scoreCounter = 0;
    correctCounter = 0;
    missCounter = 0;

    resultWindow.classList.add('d-none');

    timerReset();
    score.textContent = `点数：${scoreCounter}`;
  }
  // ↑ 初期化関数↑
  



  //↓数字式関数↓
  function addNumber(number) {

    if(firstTermOne === true) {
      firstFormula += number;
      screen.textContent = firstFormula;
      firstTermOne = false;
      firstTermTen = true;
      symbleTerm = true;
      number = 0;
      return;
    } else if(firstTermTen === true) {
      firstFormula = (firstFormula * 10 + number); 
      screen.textContent = firstFormula;
      firstTermTen = false;
      symbleTerm = true;
      number = 0;
      return;
    }
        
    if(secondTermOne === true) {
      secondFormula += number;
      screen.textContent = firstFormula + symble + secondFormula;
      secondTermOne = false;
      secondTermTen = true;
      number = 0;
      return;
    } else if(secondTermTen === true){
      secondFormula = secondFormula * 10 + number ;
      screen.textContent = firstFormula + symble + secondFormula;
      secondTermTen = false;
      number = 0;
      return;
    }
  }
  //↑数字式関数↑





  //↓記号式関数↓
  function additionJoint() {
    if(symbleTerm === true) {
      symble = '+';
      screen.textContent = firstFormula + symble;
      firstTermTen = false;
      secondTermOne = true;
      symbleTerm = false;
    }
  }

  function subtractJoint() {
    if (symbleTerm === true) {
      symble = '-'
      screen.textContent = firstFormula + symble;
      firstTermTen = false;
      secondTermOne = true;
      symbleTerm = false;
    }
  }

  function multipleJoint() {
    if (symbleTerm === true) {
      symble = '×'
      screen.textContent = firstFormula + symble;
      firstTermTen = false;
      secondTermOne = true;
      symbleTerm = false;
      addedScore += 5;//ボーナス
    }
  }

  function divideJoint() {
    if (symbleTerm === true) {
      symble = '÷'
      screen.textContent = firstFormula + symble;
      firstTermTen = false;
      secondTermOne = true;
      symbleTerm = false;
      addedScore += 5; //ボーナス
    }
  }
  //↑記号式関数↑




  //↓答え演算関数 ↓
  function calculate(symble) {
    switch(symble) {
      case '+':
        answer = firstFormula + secondFormula;
        break;
      
      case '-':
        answer = firstFormula - secondFormula;
        break;

      case '×':
        answer = firstFormula * secondFormula;
        break;
      
      case '÷':
        answer = firstFormula / secondFormula;
        break;
    }
  }
  // ↑答え演算関数↑




  //↓問題作成↓
  let questionNumber;
  function setQuestion() {

    questionNumber = (Math.floor(Math.random() * 99)) + 2;
    question.textContent = `${questionNumber}にして！`;
    questionTurn.textContent = `${questionTurnNumber}問目`;
    
  }
  // ↑問題作成↑



  

  //↓正誤判定↓
  answerBtn.addEventListener('click', () => {
    if(isGamePlaying === false || questionSettable === false) {
      return;
    }
    questionSettable = false;
    calculate(symble);
    checkAnswer();
  });

  function checkAnswer() {
    if(answer === questionNumber) {
      getAnswer();
    } else if (answer !== questionNumber) {
      getMiss();
    }
  }
  
  function getAnswer() {
    question.textContent = '正解！';
    question.classList.add('correct');
    questionTurnNumber++;
    addedScore += 10;
    scoreCounter += addedScore;
    showAddScore(addedScore);
    score.textContent = `点数：${scoreCounter}`;
    correctCounter++;
    setTimeout(() => {
      questionSettable = true;
      setQuestion();
      reset();
      question.classList.remove('correct');
    }, 500) 
  }
  
  function getMiss() {
    question.textContent = '不正解！';
    question.classList.add('miss');
    questionTurnNumber++;
    addedScore = -10;
    scoreCounter += addedScore;
    showAddScore(addedScore);
    score.textContent = `点数：${scoreCounter}`;
    missCounter++;
    setTimeout(() => {
      questionSettable = true;
      setQuestion();
      reset();
      question.classList.remove('miss')
    }, 500) 
  }
  // ↑ 正誤判定↑





  //↓結果表示 ↓
  function showResult() {
    resultScore.textContent = `点数：${scoreCounter}`;
    resultCorrect.textContent = `正解数：${correctCounter}`;
    resultMiss.textContent = `不正解数：${missCounter}`;
    resultWindow.classList.remove('d-none');
    isGamePlaying = false;

    if(isUser){//ユーザーのみrecord更新
      if(recordScore < scoreCounter){
        //最高得点超えた場合の表示
        showRecord.classList.add('d-none');
        informRecord.classList.remove('d-none');
        sendRecordBtn.classList.remove('d-none');
        //formに点数追加
        const form = document.getElementById('sendRecord');
        const input = document.getElementById('sendRecordInput');
        input.value = scoreCounter;
        form.appendChild(input);
        console.log(form);
      }else{
        showRecord.classList.remove('d-none');
        informRecord.classList.add('d-none');
        sendRecordBtn.classList.add('d-none');
      }
    }
  }
  // ↑ 結果表示↑

}