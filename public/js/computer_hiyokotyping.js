'use strict';
{
// <!---------------------------------------↓↓↓[start]↓↓↓--------------------------------------------->
const start_window = document.getElementById('start');
const startBtn = document.getElementById('startBtn');
const countdown = document.getElementById('countdown');
const play_window = document.getElementById('play');

//クリックスタート
startBtn.addEventListener('click', () => {
  startGame();
});
//Enterキースタート
window.addEventListener('keydown', e => {
  if(event.key === 'Enter'){
    startGame();
  }
});

// スタートゲーム機能
let isPlaying = false;
function startGame() {
  if(isPlaying === true){
    return;
  }else{
    isPlaying = true;
    start_window.classList.remove('d-flex');
    start_window.classList.add('d-none');
    result_window.classList.add('d-none');
    play_window.classList.remove('d-none');
    startCowntDown();
  }
}

//カウントダウン
function startCowntDown() {
  countdown.textContent = '3';
  setTimeout(() => {
    countdown.textContent = '2';
    setTimeout(() => {
      countdown.textContent = '1';
      setTimeout(() => {
        countdown.textContent = '';
        playGame();
      }, 1000);
    }, 1000);
  }, 1000);
}






// <!---------------------------------------↓↓↓[play]↓↓↓--------------------------------------------->

//ワードデータ
const word_data = [//romaji最大49文字  SI  SYASYUSYO  TYATYUTYU  TU  
  {sen:'ひよこ',roma:'HIYOKO'},{sen:'りんご',roma:'RINGO'},{sen:'いえ',roma:'IE'},{sen:'ごはん',roma:'GOHAN'},{sen:'しろめし',roma:'SIROMESI'},{sen:'ゲーム',roma:'GE-MU'},{sen:'こんにちは',roma:'KONNNITIHA'},{sen:'おはよう',roma:'OHAYOU'},{sen:'こんばんは',roma:'KONBANHA'},{sen:'おかね',roma:'OKANE'},{sen:'ズボン',roma:'ZUBON'},{sen:'シャツ',roma:'SYATU'},{sen:'ふとん',roma:'FUTON'},{sen:'がっこう',roma:'GAKKOU'},{sen:'うきわ',roma:'UKIWA'},{sen:'うみ',roma:'UMI'},{sen:'かぜ',roma:'KAZE'},{sen:'あり',roma:'ARI'},{sen:'そら',roma:'SORA'},{sen:'くもり',roma:'KUMORI'},{sen:'テレビ',roma:'TEREBI'},{sen:'アニメ',roma:'ANIME'},{sen:'ノート',roma:'NO-TO'},{sen:'こくご',roma:'KOKUGO'},{sen:'さんすう',roma:'SANSUU'},{sen:'サッカー',roma:'SAKKA-'},{sen:'タオル',roma:'TAORU'},{sen:'ドア',roma:'DOA'},{sen:'パソコン',roma:'PASOKON'},{sen:'キーボード',roma:'KI-BO-DO'},{sen:'でんしゃ',roma:'DENSYA'},{sen:'マウス',roma:'MAUSU'},{sen:'しんかんせん',roma:'SINKANSEN'},{sen:'てんき',roma:'TENKI'},{sen:'スマホ',roma:'SUMAHO'},{sen:'びょういん',roma:'BYOUIN'},{sen:'けいさつ',roma:'KEISATU'},{sen:'きょうかしょ',roma:'KYOUKASYO'},{sen:'えいご',roma:'EIGO'},{sen:'アメリカ',roma:'AMERIKA'},{sen:'フランス',roma:'FURANSU'},{sen:'にほん',roma:'NIHON'},{sen:'ちゅうごく',roma:'TYUUGOKU'},{sen:'かんこく',roma:'KANKOKU'},{sen:'イタリア',roma:'ITARIA'},{sen:'からあげ',roma:'KARAAGE'},{sen:'ヒーロー',roma:'HI-RO-'},{sen:'れいぞうこ',roma:'REIZOUKO'},{sen:'せんたくき',roma:'SENTAKUKI'},{sen:'はみがき',roma:'HAMIGAKI'},{sen:'おひさま',roma:'OHISAMA'},{sen:'ともだち',roma:'TOMODATI'},{sen:'おかあさん',roma:'OKAASAN'},{sen:'おとうさん',roma:'OTOUSAN'},{sen:'くつした',roma:'KUTUSITA'},{sen:'げんかん',roma:'GENKAN'},{sen:'ねこ',roma:'NEKO'},{sen:'いぬ',roma:'INU'},{sen:'くま',roma:'KUMA'},{sen:'はち',roma:'HATI'},{sen:'ニュース',roma:'NYU-SU'},{sen:'じかん',roma:'JIKAN'},{sen:'とけい',roma:'TOKEI'},{sen:'あさひ',roma:'ASAHI'},{sen:'ゆうひ',roma:'YUUHI'},{sen:'ゆうがた',roma:'YUUGATA'},{sen:'やけい',roma:'YAKEI'},{sen:'こうや',roma:'KOUYA'},{sen:'こうてい',roma:'KOUTEI'},{sen:'うんてい',roma:'UNTEI'},
];
console.log(word_data.length);

// プレイゲーム関数
const sentence_zone = document.getElementById('sentence');
const romaji_zone = document.getElementById('romaji');
let correct;
let miss;
let startTime;
function playGame() {
  setSentence();
  correct = 0;
  miss = 0;
  startTime = Date.now();
  uppdateTimer();
  isPlaying = true;
}

//文章セット関数
let word;
function setSentence() {
  loc = 0;
  let random_number = Math.floor(Math.random() * word_data.length);
  let sentence = word_data[random_number].sen;
  let romaji = word_data[random_number].roma;
  word = romaji;
  sentence_zone.textContent = sentence;
  romaji_zone.textContent = romaji;
  setTips();
}

//タイピング入力機能
let loc = 0;
let input;
window.addEventListener('keydown', e => {
  if(isPlaying !== true) {
    return;
  }
  input = e.key.toUpperCase();
  if (input == word[loc]) {
    correctTyping();
  }else{
    handleException(loc,input);
  }
});

//タイピング成功処理
function correctTyping(){
  loc++;
  correct++;
  if(loc === word.length) {
    loc = 0;
    setSentence();
  }
  updateTarget(loc,word);
}

//成功処理 文字色
const typed_romaji_zone = document.getElementById('typed_romaji');
function updateTarget(lo,wor) {
  typed_romaji_zone.textContent = wor.substring(0, lo);
  romaji_zone.textContent = wor.substr(lo);
  setTips();
}

//例外処理関数
function handleException(lo,inpu) {
  //しゃしゅしぇしょ
  if(word[lo-1] == 'S' && word[lo] == 'Y' && inpu == 'H'){
    word = word.replace(word[lo],'H');
    correctTyping();
    return;
    //ん
  }else if(word[lo-1] == 'N' && word[lo] !== 'N' && inpu == 'N'){
    word = word.replace(word[lo-1], 'NN');
    correctTyping();
    return;
    //し
  }else if(word[lo-1] == 'S' && word[lo] == 'I' && inpu == 'H'){
    word = word.replace(word[lo-1]+word[lo],'SHI');
    correctTyping();
    return;
    //ち
  }else if(word[lo] == 'T' && word[lo+1] == 'I' && inpu == 'C'){
    word = word.replace(word[lo]+word[lo+1],'CHI');
    lo++;
    correctTyping();
    return;
    //ちゃちゅちょ
  }else if(word[lo] == 'T' && word[lo+1] == 'Y' &&  inpu == 'C'){
    word = word.replace(word[lo]+word[lo+1],'CH');
    correctTyping();
    return;
    //ふ
  }else if(word[lo] == 'F' && word[lo+1] == 'U' && inpu == 'H'){
    word = word.replace(word[lo],'H');
    correctTyping();
    return;
    //つ
  }else if(word[lo-1] == 'T' && word[lo] == 'U' && inpu == 'S'){
    word = word.replace(word[lo],'SU');
    correctTyping();
    return;
    //じ
  }else if(inpu == 'Z'){
    if(word[lo] == 'J' && word[lo+1] == 'I'){
      word = word.replace(word[lo]+word[lo+1], 'ZI');
      console.log(lo);
      console.log();
      correctTyping();
      return;
    }
  }else{
    miss++;
    return;
  }
}

// ヒント表示関数
function setTips() {
  removeAllKeyTipsClass();
  removeAllKeyTipsClass();
  removeAllFingerTipsClass();
  switch(word[loc]){
    //小指（左）
    case '1':addKeyTipsClass('1');addFingerTipsClass('finger-l-5');break;
    case '!':addKeyTipsClass('1');addKeyTipsClass('shift-r');addFingerTipsClass('finger-l-5');break;
    case 'Q':addKeyTipsClass('Q');addFingerTipsClass('finger-l-5');break;
    case 'A':addKeyTipsClass('A');addFingerTipsClass('finger-l-5');break;
    case 'Z':addKeyTipsClass('Z');addFingerTipsClass('finger-l-5');break;
    //薬指（左）
    case '2':addKeyTipsClass('2');addFingerTipsClass('finger-l-4');break;
    case 'W':addKeyTipsClass('W');addFingerTipsClass('finger-l-4');break;
    case 'S':addKeyTipsClass('S');addFingerTipsClass('finger-l-4');break;
    case 'X':addKeyTipsClass('X');addFingerTipsClass('finger-l-4');break;
    //中指（左）
    case '3':addKeyTipsClass('3');addFingerTipsClass('finger-l-3');break;
    case 'E':addKeyTipsClass('E');addFingerTipsClass('finger-l-3');break;
    case 'D':addKeyTipsClass('D');addFingerTipsClass('finger-l-3');break;
    case 'C':addKeyTipsClass('C');addFingerTipsClass('finger-l-3');break;
    //人差し指（左）
    case '4':addKeyTipsClass('4');addFingerTipsClass('finger-l-2');break;
    case 'R':addKeyTipsClass('R');addFingerTipsClass('finger-l-2');break;
    case 'F':addKeyTipsClass('F');addFingerTipsClass('finger-l-2');break;
    case 'V':addKeyTipsClass('V');addFingerTipsClass('finger-l-2');break;
    case '5':addKeyTipsClass('5');addFingerTipsClass('finger-l-2');break;
    case 'T':addKeyTipsClass('T');addFingerTipsClass('finger-l-2');break;
    case 'G':addKeyTipsClass('G');addFingerTipsClass('finger-l-2');break;
    case 'B':addKeyTipsClass('B');addFingerTipsClass('finger-l-2');break;
    //親指
    case ' ':addKeyTipsClass('space');addFingerTipsClass('finger-l-1');addFingerTipsClass('finger-r-1');break;
    //人差し指（右）
    case '6':addKeyTipsClass('6');addFingerTipsClass('finger-r-2');break;
    case 'Y':addKeyTipsClass('Y');addFingerTipsClass('finger-r-2');break;
    case 'H':addKeyTipsClass('H');addFingerTipsClass('finger-r-2');break;
    case 'N':addKeyTipsClass('N');addFingerTipsClass('finger-r-2');break;
    case '7':addKeyTipsClass('7');addFingerTipsClass('finger-r-2');break;
    case 'U':addKeyTipsClass('U');addFingerTipsClass('finger-r-2');break;
    case 'J':addKeyTipsClass('J');addFingerTipsClass('finger-r-2');break;
    case 'M':addKeyTipsClass('M');addFingerTipsClass('finger-r-2');break;
    //中指（右）
    case '8':addKeyTipsClass('8');addFingerTipsClass('finger-r-3');break;
    case 'I':addKeyTipsClass('I');addFingerTipsClass('finger-r-3');break;
    case 'K':addKeyTipsClass('K');addFingerTipsClass('finger-r-3');break;
    case ',':addKeyTipsClass('comma');addFingerTipsClass('finger-r-3');break;
    case 'い':addKeyTipsClass('comma');addFingerTipsClass('finger-r-3');break;
    //薬指（右）
    case '9':addKeyTipsClass('9');addFingerTipsClass('finger-r-4');break;
    case 'O':addKeyTipsClass('O');addFingerTipsClass('finger-r-4');break;
    case 'L':addKeyTipsClass('L');addFingerTipsClass('finger-r-4');break;
    case '.':addKeyTipsClass('period');addFingerTipsClass('finger-r-4');break;
    //小指（右）
    case '0':addKeyTipsClass('0');addFingerTipsClass('finger-r-5');break;
    case 'P':addKeyTipsClass('P');addFingerTipsClass('finger-r-5');break;
    case '?':addKeyTipsClass('hatena');addKeyTipsClass('shift-l');addFingerTipsClass('finger-r-5');break;
    case '-':addKeyTipsClass('-');addFingerTipsClass('finger-r-5');break;
  }
}

// key-tipsクラス付与関数
function addKeyTipsClass(id) {
  document.getElementById(id).classList.add('key-tips');
}

// key-tipsクラス全消し関数
function removeAllKeyTipsClass() {
  const key_tips = document.getElementsByClassName('key-tips');
  for(let i = 0; i < key_tips.length; ++i) {
    key_tips[i].classList.remove('key-tips');
  }
}

// finger-tipsクラス付与関数
function addFingerTipsClass(id) {
  document.getElementById(id).classList.add('finger-tips');
}

// finger-tipsクラス全消し関数
function removeAllFingerTipsClass() {
  const finger_tips = document.getElementsByClassName('finger-tips');
  for(let i = 0; i < finger_tips.length; ++i){
    finger_tips[i].classList.remove('finger-tips');
  } 
}




//タイマー機能（関数宣言）
const timeLimit = 60 * 1000;
const timerLabel = document.getElementById('timer');
function uppdateTimer() {
  const timeLeft = startTime + timeLimit - Date.now();
  timerLabel.textContent = '残り時間 ： ' + (timeLeft / 1000).toFixed(2);

  const timeoutId = setTimeout(() => {
    uppdateTimer();
  }, 10);

  if(timeLeft <= 0) {
    clearTimeout(timeoutId);
    timerLabel.textContent = '残り時間 ： 0.00';
    setTimeout(() => {
      isPlaying = false;
      showResult();
      sentence_zone.textContent = '';
      romaji_zone.textContent = '';
      typed_romaji_zone.textContent = '';
      removeAllFingerTipsClass();
      removeAllKeyTipsClass();
      removeAllKeyTipsClass();
    } ,100);

  }
}






// <!---------------------------------------↓↓↓[result]↓↓↓--------------------------------------------->
//結果表示機能（関数宣言）
const result_window = document.getElementById('result');
const scoreLabel = document.getElementById('score');
const correctLabel = document.getElementById('correct');
const missLabel = document.getElementById('miss');
const percentLabel = document.getElementById('percent');
const speedLabel = document.getElementById('speed');
let score = 0;
function showResult() {
  correctLabel.textContent = correct;
  missLabel.textContent = miss;
  score = correct - miss;
  scoreLabel.textContent = `${score}点`;
  const accuracy = correct / (correct + miss) * 100;
  percentLabel.textContent = `成功タイプ率:${accuracy.toFixed(1)}％`;
  const speed = (correct / 60).toFixed(2);
  speedLabel.textContent = `1秒間に${speed}文字タイプしました！`;
  play_window.classList.add('d-none');
  result_window.classList.remove('d-none');

  //ユーザーのみの処理
  if(isUser){
    const gotCoinsLabel = document.getElementById('gotCoinsLabel');
    const userResultLabel = document.getElementById('userResultLabel');
    const updatedRecordLabel = document.getElementById('updatedRecordLabel');
    if(score > 0){
      gotCoinsLabel.textContent = `+${score}`;
    }
    userResultLabel.textContent = `${username}さんの最高得点 : ${recordScore}点`;
    //ユーザーの点数を記録
    post(score);
    //記録を更新した時の処理
    if(recordScore < score){
      recordScore = score;
      userResultLabel.textContent = `${username}さんの最高得点 : ${recordScore}点`;
      updatedRecordLabel.classList.remove('d-none');
      setTimeout(() => {
        updatedRecordLabel.classList.add('d-none');
      }, 30000);
    }
  }
}

//ajaxでpost送信
function post(score) {
  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    //POST通信
    type: "POST",
    //ここでデータの送信先URLを指定します。
    url: `hiyokotyping_record/${userid}`,
    data: {"score": score},

    success : function(data, dataType) {
      //成功時の処理
    },
    //処理がエラーであれば
    error : function() {
    alert('通信に失敗しました。点数が記録できません。');
    }
  });
  //submitによる画面遷移なし
  return false;
}



//リスタート
const restartBtn = document.getElementById('restartBtn');
restartBtn.addEventListener('click', () => {
  startGame();
});




}
