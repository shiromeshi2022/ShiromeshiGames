'use strict';
{
// <!---------------------------------------↓↓↓[start]↓↓↓--------------------------------------------->
const start_window = document.getElementById('start');
const startBtn = document.getElementById('startBtn');
const countdown = document.getElementById('countdown');
const play_window = document.getElementById('play');

//クリックスタート
startBtn.addEventListener('click', () => {
  start_window.classList.remove('d-flex');
  start_window.classList.add('d-none');
  play_window.classList.remove('d-none');
  startGame();
});

// スタートゲーム機能
let isPlaying = false;
function startGame() {
  if(isPlaying === true){
    return;
  }

  //カウントダウン
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
  {sen:'犬も歩けば棒に当たる',roma:'INUMOARUKEBABOUNIATARU'},{sen:'人にやられて嫌なことはやるな',roma:'HITONIYARARETEIYANAKOTOHAYARUNA'},{sen:'情けは人のためならず', roma:'NASAKEHAHITONOTAMENARAZU'},{sen:'急がば回れ',roma:'ISOGABAMAWARE'},{sen:'やらずに後悔よりやって後悔',roma:'YARAZUNIKOUKAIYORIYATTEKOUKAI'},{sen:'これからはIT（アイティー）の時代だ！',roma:'KOREKARAHAAITHI-NOJIDAIDA!'},{sen:'相手の気持ちを考えてみよう',roma:'AITENOKIMOTIWOKANGAETEMIYOU'},{sen:'他者と比較するのではなく、過去の自分と比較',roma:'TASYATOHIKAKUSURUNODEHANAKU,KAKONOJIBUNTOHIKAKU'},{sen:'幸福とは幸福を探すことである',roma:'KOUFUKUTOHAKOUFUKUWOSAGASUKOTODEARU'},{sen:'環境を変えたいなら、まず自分を変えなさい',roma:'KANKYOUWOKAETAINARA,MAZUJIBUNWOKAENASAI'},{sen:'聞き上手は、話上手',roma:'KIKIJOUZUHA,HANASIJOUZU'},{sen:'夢は実現させるためにある',roma:'YUMEHAJITUGENSASERUTAMENIARU'},{sen:'過去は変えられないが、未来は変えられる',roma:'KAKOHAKAERARENAIGA,MIRAIHAKAERARERU'},{sen:'後悔はするな。反省するのだ。',roma:'KOUKAIHASURUNA.HANSEISURUNODA'},{sen:'僕の前に道はない。僕の後ろに道はできる。',roma:'BOKUNOMAENIMITIHANAI.BOKUNOUSIRONIMITIHADEKIRU'},{sen:'人は短所で愛されるんだよ',roma:'HITOHATANSYODEAISARERUNDAYO'},{sen:'前進をしない人は、後退をしているのだ。',roma:'ZENSINWOSINAIHITOHA,KOUTAIWOSITEIRUNODA.'},{sen:'人生は楽ではない。そこが面白い。',roma:'JINSEIHARAKUDEHANAI.SOKOGAOMOSIROI.'},{sen:'笑顔は心の処方箋',roma:'EGAOHAKOKORONOSYOHOUSEN'},{sen:'大切なのは問うのをやめないことだ',roma:'TAISETUNANOHATOUNOWOYAMENAIKOTODA'},{sen:'自分で自分をあきらめなければ、人生に負けはない。',roma:'JIBUNDEJIBUNWOAKIRAMENAKEREBA,JINSEINIMAKEHANAI.'},{sen:'自分は未熟という前提で生きる',roma:'JIBUNHAMIJUKUTOIUZENTEIDEIKIRU'},{sen:'天才とは本質を見抜く人である',roma:'TENSAITOHAHONSITUWOMINUKUHITODEARU'},{sen:'陰口をいうのは暇な証拠である',roma:'KAGEGUTIWOIUNOHAHIMANASYOUKODEARU'},{sen:'花はただ咲く。ただひたすらに。',roma:'HANAHATADASAKU.TADAHITASURANI.'},{sen:'20代の借金は、貯金や',roma:'20DAINOSYAKKINNHA,TYOKINNYA'},{sen:'クセがすごい！',roma:'KUSEGASUGOI!'},{sen:'努力は裏切らない',roma:'DORYOKUHAURAGIRANAI'},{sen:'天才は努力から成る',roma:'TENSAIHADORYOKUKARANARU'},{sen:'早起きは三文の特',roma:'HAYAOKIHASANMONNNOTOKU'},{sen:'元気が一番',roma:'GENKIGAITIBAN'},{sen:'行動に起こしてみよう',roma:'KOUDOUNIOKOSITEMIYOU'},{sen:'食べるために生きるな。生きるために食べよ。',roma:'TABERUTAMENIIKIRUNA.IKIRUTAMENITABEYO.'},{sen:'百聞は一見にしかず',roma:'HYAKUBUNHAIKKENNNISIKAZU'},{sen:'石の上にも三年',roma:'ISINOUENIMOSANNNEN'},{sen:'石橋を叩いて渡る',roma:'ISIBASIWOTATAITEWATARU'},{sen:'一寸の虫にも五分の魂',roma:'ISSUNNNOMUSINIMOGOBUNOTAMASII'},{sen:'井の中の蛙大海を知らず',roma:'INONAKANOKAWAZUTAIKAIWOSIRAZU'},{sen:'生みの親より育ての親',roma:'UMINOOYAYORISODATENOOYA'},{sen:'果報は寝て待て',roma:'KAHOUHANETEMATE'},{sen:'亀の甲より年の功',roma:'KAMENOKOUYORITOSINOKOU'},{sen:'聞くは一時の恥聞かぬは一生の恥',roma:'KIKUHAITTOKINOHAJIKIKANUHAISSYOUNOHAJI'},{sen:'腐っても鯛',roma:'KUSATTEMOTAI'},{sen:'光陰矢の如し',roma:'KOUINNYANOGOTOSI'},{sen:'怪我の功名',roma:'KEGANOKOUMYOU'},{sen:'後悔先に立たず',roma:'KOUKAISAKINITATAZU'},{sen:'弘法も筆の誤り',roma:'KOUBOUMOFUDENOAYAMARI'},{sen:'猿も木から落ちる',roma:'SARUMOKIKARAOTIRU'},{sen:'虎穴に入らずんば虎児を得ず',roma:'KOKETUNIHAIRAZUNBAKOJIWOEZU'},{sen:'塞翁が馬',roma:'SAIOUGAUMA'},{sen:'三人よれば文殊の知恵',roma:'SANNNINNYOREBAMONJUNOTIE'},{sen:'初心忘れるべからず',roma:'SYOSINWASURERUBEKARAZU'},{sen:'急いては事を仕損じる',roma:'SEITEHAKOTOWOSISONJIRU'},{sen:'人の口に戸は立てられぬ',roma:'HITONOKUTINITOHATATERARENU'},{sen:'大は小を兼ねる',roma:'DAIHASYOUWOKANERU'},{sen:'塵も積もれば山となる',roma:'TIRIMOTUMOREBAYAMATONARU'},{sen:'燈台下くらし',roma:'TOUDAIMOTOKURASI'},{sen:'出る杭は打たれる',roma:'DERUKUIHAUTARERU'},{sen:'良薬は口に苦し',roma:'RYOUYAKUHAKUTININIGASI'},{sen:'類は友を呼ぶ',roma:'RUIHATOMOWOYOBU'},
  // {sen:'ここに日本語',roma:'KOKONIROMAJI'},{sen:'ここに日本語',roma:'KOKONIROMAJI'},{sen:'ここに日本語',roma:'KOKONIROMAJI'},{sen:'ここに日本語',roma:'KOKONIROMAJI'},{sen:'ここに日本語',roma:'KOKONIROMAJI'},{sen:'ここに日本語',roma:'KOKONIROMAJI'},{sen:'ここに日本語',roma:'KOKONIROMAJI'},{sen:'ここに日本語',roma:'KOKONIROMAJI'},{sen:'ここに日本語',roma:'KOKONIROMAJI'},{sen:'ここに日本語',roma:'KOKONIROMAJI'},{sen:'ここに日本語',roma:'KOKONIROMAJI'},{sen:'ここに日本語',roma:'KOKONIROMAJI'},{sen:'ここに日本語',roma:'KOKONIROMAJI'},{sen:'ここに日本語',roma:'KOKONIROMAJI'},{sen:'ここに日本語',roma:'KOKONIROMAJI'},{sen:'ここに日本語',roma:'KOKONIROMAJI'},{sen:'ここに日本語',roma:'KOKONIROMAJI'},{sen:'ここに日本語',roma:'KOKONIROMAJI'},
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
  for(let i = 0; i < key_tips.length; ++i) {key_tips[i].classList.remove('key-tips');}
}

// finger-tipsクラス付与関数
function addFingerTipsClass(id) {
  document.getElementById(id).classList.add('finger-tips');
}

// finger-tipsクラス全消し関数
function removeAllFingerTipsClass() {
  const finger_tips = document.getElementsByClassName('finger-tips');
  for(let i = 0; i < finger_tips.length; ++i) finger_tips[i].classList.remove('finger-tips');
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
    url: `typing_record/${userid}`,
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
  result_window.classList.add('d-none');
  play_window.classList.remove('d-none');
  correct = 0;
  miss = 0;
  score = 0;
  startGame();
});




}
