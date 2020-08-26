'use strict';
{
  // バックアップ
  //↓要素取得↓
  const oneBtn            = document.getElementById('oneBtn'); //電卓↓↓
  const twoBtn            = document.getElementById('twoBtn');
  const threeBtn          = document.getElementById('threeBtn');
  const fourBtn           = document.getElementById('fourBtn');
  const fiveBtn           = document.getElementById('fiveBtn');
  const sixBtn            = document.getElementById('sixBtn');
  const sevenBtn          = document.getElementById('sevenBtn');
  const eightBtn          = document.getElementById('eightBtn');
  const nineBtn           = document.getElementById('nineBtn');
  const zeroBtn           = document.getElementById('zeroBtn');
  const addBtn            = document.getElementById('addBtn');
  const subtractBtn       = document.getElementById('subtractBtn');
  const multipleBtn       = document.getElementById('multipleBtn');
  const divideBtn         = document.getElementById('divideBtn');
  const equalBtn          = document.getElementById('equalBtn'); //電卓↑↑
  const calculationScreen = document.getElementById('calculationScreen');
  const questionLabel     = document.getElementById('questionLabel');
  const addedScoreLabel   = document.getElementById('addedScoreLabel'); //獲得点数表示
  const returnBtn         = document.getElementById('returnBtn');
  const deleteBtn         = document.getElementById('deleteBtn');
  const reloadBtn         = document.getElementById('reloadBtn')
  const questionTurn      = document.getElementById('questionTurn'); //game-nav
  const scoreLabel        = document.getElementById('scoreLabel'); //game-nav
  const startWindow       = document.getElementById('startWindow');
  const timerLabel        = document.getElementById('timerLabel');
  const startBtn          = document.getElementById('startBtn');
  const resultWindow      = document.getElementById('resultWindow');
  const resultScore       = document.getElementById('resultScore');
  const resultCorrect     = document.getElementById('resultCorrect');
  const resultMiss        = document.getElementById('resultMiss');
  const restartBtn        = document.getElementById('restartBtn');
  const showRecordLabel   = document.getElementById('showRecordLabel');
  const informRecordLabel = document.getElementById('informRecordLabel');
  const sendRecordBtn     = document.getElementById('sendRecordBtn');
  // ↑要素取得↑





  //↓変数宣言↓ 
  let firstTerm = true;  //firstTerm = 左辺   One = 1の位  Ten = 10の位
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

  let isTimerRunning = false;
  let startedTime;
  let timeLimit = 60 * 1000;
  let leftTime;

  let isPlaying = false;
  let questionSettable = true;
  // ↑変数宣言↑






  //↓クリック反応↓
    //↓クリック反応（電卓↓
  oneBtn.addEventListener('click', () => {
    addNumber(1);
    addedScore -= 5;
  });
  
  twoBtn.addEventListener('click', () => {
    addNumber(2);
  });
  
  threeBtn.addEventListener('click', () => {
    addNumber(3);
  });
  
  fourBtn.addEventListener('click', () => {
    addNumber(4);
  });
  
  fiveBtn.addEventListener('click', () => {
    addNumber(5);
  });
  
  sixBtn.addEventListener('click', () => {
    addNumber(6);
  });
  
  sevenBtn.addEventListener('click', () => {
    addNumber(7);
  });
  
  eightBtn.addEventListener('click', () => {
    addNumber(8);
  });
  
  nineBtn.addEventListener('click', () => {
    addNumber(9);
  });
  
  zeroBtn.addEventListener('click', () => {
    addNumber(0);
    addedScore -= 5;
  });
  
  addBtn.addEventListener('click', () => {
    additionJoint();
  });
  
  subtractBtn.addEventListener('click', () => {
    subtractJoint();
  });
  
  multipleBtn.addEventListener('click', () => {
    multipleJoint();
  });
  
  divideBtn.addEventListener('click', () => {
    divideJoint();
  });

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
    isPlaying = true;
    reset();
    startedTime = Date.now();
    isTimerRunning = true;
    timerUpdate();
  }
  // ↑スタートゲーム関数↑




  //↓リスタート関数↓
  function restart() {
    resultWindow.classList.add('d-none');
    allReset();
    setQuestion();
    isPlaying = true;
    startedTime = Date.now();
    isTimerRunning = true;
    timerUpdate();
  }
  //↑リスタート関数↑
  
  
  
  

  // ↓タイマー関数↓
  timerLabel.textContent = '制限時間：60.00';

  function timerUpdate() {
    if(isTimerRunning === false) {
      return;
    }
    const timeoutId = setTimeout(() => {
      leftTime = ((timeLimit + startedTime - Date.now()) / 1000).toFixed(2);
      timerUpdate();
      timerLabel.textContent = `制限時間：${leftTime}`;
    }, 10); 
    
    if(leftTime <= 0) {
      showResult();
      clearTimeout(timeoutId);
      setTimeout(() => {
        timerLabel.textContent = "終了！";
      }, 10);
    } 
  }

  function timerReset() {
    leftTime = timeLimit;
    isTimerRunning = false;
    timerLabel.textContent = '制限時間：60.00';
  }
  // ↑タイマー関数↑





  // ↓点数表示↓
  scoreLabel.textContent = `点数：${scoreCounter}点`;

  function showAddScore (addedScore) {
    if(addedScore >= 0) {
      addedScoreLabel.style.color = 'blue';
      addedScoreLabel.textContent = `+${addedScore}点`;
      addedScoreLabel.classList.remove('d-none');
      setTimeout(() => {
        addedScoreLabel.classList.add('d-none');
      }, 500);
      addedScore = 0;
    } else {
      addedScoreLabel.style.color = 'red';
      addedScoreLabel.textContent = `${addedScore}点`;
      addedScoreLabel.classList.remove('d-none');
      setTimeout(() => {
        addedScoreLabel.classList.add('d-none');
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
    calculationScreen.textContent = '';
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
    scoreLabel.textContent = `点数：${scoreCounter}`;
  }
  // ↑ 初期化関数↑
  



  //↓数字式関数↓
  function addNumber(number) {

    if(firstTermOne === true) {
      firstFormula += number;
      calculationScreen.textContent = firstFormula;
      firstTermOne = false;
      firstTermTen = true;
      symbleTerm = true;
      number = 0;
      return;
    } else if(firstTermTen === true) {
      firstFormula = (firstFormula * 10 + number); 
      calculationScreen.textContent = firstFormula;
      firstTermTen = false;
      symbleTerm = true;
      number = 0;
      return;
    }
        
    if(secondTermOne === true) {
      secondFormula += number;
      calculationScreen.textContent = firstFormula + symble + secondFormula;
      secondTermOne = false;
      secondTermTen = true;
      number = 0;
      return;
    } else if(secondTermTen === true){
      secondFormula = secondFormula * 10 + number ;
      calculationScreen.textContent = firstFormula + symble + secondFormula;
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
      calculationScreen.textContent = firstFormula + symble;
      firstTermTen = false;
      secondTermOne = true;
      symbleTerm = false;
    }
  }

  function subtractJoint() {
    if (symbleTerm === true) {
      symble = '-'
      calculationScreen.textContent = firstFormula + symble;
      firstTermTen = false;
      secondTermOne = true;
      symbleTerm = false;
    }
  }

  function multipleJoint() {
    if (symbleTerm === true) {
      symble = '×'
      calculationScreen.textContent = firstFormula + symble;
      firstTermTen = false;
      secondTermOne = true;
      symbleTerm = false;
      addedScore += 5;//ボーナス
    }
  }

  function divideJoint() {
    if (symbleTerm === true) {
      symble = '÷'
      calculationScreen.textContent = firstFormula + symble;
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
    questionLabel.textContent = `${questionNumber}にして！`;
    questionTurn.textContent = `${questionTurnNumber}問目`;
    
  }
  // ↑問題作成↑



  

  //↓正誤判定↓
  equalBtn.addEventListener('click', () => {
    if(isPlaying === false || questionSettable === false) {
      return;
    }
    questionSettable = false;
    calculate(symble);
    check(answer);
  });

  function check(answer) {
    if(answer === questionNumber) {
      getAnswer();
    } else if (answer !== questionNumber) {
      getMiss();
    }
  }

  function getAnswer() {
    questionLabel.textContent = '正解！';
    questionLabel.classList.add('correct');
    questionTurnNumber++;
    addedScore += 10;
    scoreCounter += addedScore;
    showAddScore(addedScore);
    scoreLabel.textContent = `点数：${scoreCounter}`;
    correctCounter++;
    setTimeout(() => {
      questionSettable = true;
      setQuestion();
      reset();
      questionLabel.classList.remove('correct');
    }, 500) 
  }

  function getMiss() {
    questionLabel.textContent = '不正解！';
    questionLabel.classList.add('miss');
    questionTurnNumber++;
    addedScore = -10;
    scoreCounter += addedScore;
    showAddScore(addedScore);
    scoreLabel.textContent = `点数：${scoreCounter}`;
    missCounter++;
    setTimeout(() => {
      questionSettable = true;
      setQuestion();
      reset();
      questionLabel.classList.remove('miss')
    }, 500) 
  }
  // ↑ 正誤判定↑





  //↓結果表示 ↓
  function showResult() {
    resultScore.textContent = `点数：${scoreCounter}`;
    resultCorrect.textContent = `正解数：${correctCounter}`;
    resultMiss.textContent = `不正解数：${missCounter}`;
    resultWindow.classList.remove('d-none');
    isPlaying = false;

    if(isUser){//ユーザーのみrecord更新
      if(recordScore < scoreCounter){
        //最高得点超えた場合の表示
        showRecordLabel.classList.add('d-none');
        informRecordLabel.classList.remove('d-none');
        sendRecordBtn.classList.remove('d-none');
        //formに点数追加
        const form = document.getElementById('sendRecord');
        const input = document.getElementById('sendRecordInput');
        input.value = scoreCounter;
        form.appendChild(input);
        console.log(form);
      }else{
        showRecordLabel.classList.remove('d-none');
        informRecordLabel.classList.add('d-none');
        sendRecordBtn.classList.add('d-none');
      }
    }
  }
  // ↑ 結果表示↑

}