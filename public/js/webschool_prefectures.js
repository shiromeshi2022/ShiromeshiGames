'use strict';
{
  const question = document.getElementById('question');
  const choices = document.getElementById('choices');
  const startBtn = document.getElementById('startBtn');
  const nextBtn = document.getElementById('nextBtn');
  const start = document.getElementById('start');
  const play = document.getElementById('play');
  const questionTurn = document.getElementById('questionTurn');
  const result = document.getElementById('result');
  const scoreLabel = document.querySelector('#result > p');
  const answer = document.getElementById('answer');
  const explanation = document.getElementById('explanation');
  const restartBtn = document.getElementById('restartBtn');

  //正解をc[0]におく
  const quiz_data = shuffle([
    {q: '北海道の道庁所在地は？', c: ['札幌市', '北海道市', '函館市'], e: '札幌市は日本の政令指定都市です。札幌時計台などの観光スポットがあります。'},
    {q: '青森県の県庁所在地は？', c: ['青森市', '弘前市', '盛岡市'], e: '青森市は、三内丸山遺跡やねぶた祭が有名です。'},
    {q: '岩手県の県庁所在地は？', c: ['盛岡市', '仙台市', '岩手市'], e: 'さんさ踊りや紫紺染など、中核市ながら古風を楽しむことができます。'},
    {q: '宮城県の県庁所在地は？', c: ['仙台市', '宮城市', '盛岡市'], e: '仙台七夕まつりが有名です。地元では「たなばたさん」と呼ばれています。'},
    {q: '秋田県の県庁所在地は？', c: ['秋田市', '仙台市', '男鹿市'], e: '千秋公園では久保城跡と桜を望むことができます。'},
    {q: '山形県の県庁所在地は？', c: ['山形市', '仙台市', '盛岡市'], e: '松尾芭蕉の「五月雨を集めて早し最上川」で有名な最上川をみることができます。'},
    {q: '福島県の県庁所在地は？', c: ['福島市', '仙台市', '盛岡市'], e: '花見山公園での桜は、絶景です。'},
    {q: '茨城県の県庁所在地は？', c: ['水戸市', '茨城市', '宇都宮市'], e: '由緒正しい日本庭園である偕楽園が有名です。'},
    {q: '栃木県の県庁所在地は？', c: ['宇都宮市', '栃木市', '水戸市'], e: '宇都宮餃子はとても美味しい！'},
    {q: '群馬県の県庁所在地は？', c: ['前橋市', '宇都宮市', '群馬市'], e: '赤城山は桜や神社が有名で、人気の観光スポットです。'},
    {q: '埼玉県の県庁所在地は？', c: ['さいたま市', '戸田市', '埼玉市'], e: '表記はひらがなで「さいたま市」です。気をつけましょう。'},
    {q: '千葉県の県庁所在地は？', c: ['千葉市', '戸田市', '浦安市'], e: '千葉市動物公園では様々な動物やパンダをみることができます。'},
    {q: '東京都の都庁所在地は？', c: ['新宿区', '世田谷区', '中央区'], e: '「東京23区」と表記されることがあります。正確には新宿区にありますが、テストでは先生の指示に従いましょう。'},
    {q: '神奈川県の都庁所在地は？', c: ['横浜市', '川崎市', '神奈川市'], e: '六大都市に数えられるほどの大都市です。江ノ島や中華街など、有名なスポットがたくさんあります。'},
    {q: '新潟県の県庁所在地は？', c: ['新潟市', '長岡市', '上越市'], e: '新潟花街茶屋の老舗割烹では古町芸妓の舞鑑賞を楽しみながら美味しい食事ができます。'},
    {q: '富山県の県庁所在地は？', c: ['富山市', '高岡市', '氷見市'], e: '日本100名城に数えられる富山城が有名です。'},
    {q: '石川県の県庁所在地は？', c: ['金沢市', '白山市', '市川市'], e: '日本3名園に数えられる兼六園が有名です。'},
    {q: '福井県の県庁所在地は？', c: ['福井市', '大野市', '越前市'], e: '東尋坊では、日本海の絶景を楽しみながら食事を楽しむことができます。'},
    {q: '山梨県の県庁所在地は？', c: ['甲府市', '山梨市', '中央市'], e: '紅葉が有名な昇仙峡や、富士山が見える精進湖などが有名です。'},
    {q: '長野県の県庁所在地は？', c: ['長野市', '松本市', '佐久市'], e: 'ことわざ「牛に引かれて善光寺参り」で有名な善光寺がおすすめスポットです。'},
    {q: '岐阜県の県庁所在地は？', c: ['岐阜市', '飛騨市', '大垣市'], e: 'かつて織田信長が統治した岐阜城、そして金華山が観光スポットとして有名です。'},
    {q: '静岡県の県庁所在地は？', c: ['静岡市', '掛川市', '浜松市'], e: '浜松市と間違いやすいですが、県庁所在地は静岡市です。気をつけましょう。'},
    {q: '愛知県の県庁所在地は？', c: ['名古屋市', '愛知市', '豊田市'], e: '名古屋城や熱田神宮で、大都市ながら古風を味わうことができます。'},
    {q: '三重県の県庁所在地は？', c: ['津市', '鈴鹿市', '三重市'], e: '滋賀県の大津市と取り違えないようにしましょう。'},
    {q: '滋賀県の県庁所在地は？', c: ['大津市', '滋賀市', '草津市'], e: '三重県の津市と取り違えないようにしましょう。'},
    {q: '京都府の府庁所在地は？', c: ['京都市', '宮津市', '宇治市'], e: '言わずもがな古都京都では、清水寺や金閣などを訪れることができます。'},
    {q: '大阪府の府庁所在地は？', c: ['大阪市', '和泉市', '堺市'], e: '道頓堀では賑わった町に訪れることができます。'},
    {q: '兵庫県の県庁所在地は？', c: ['神戸市', '兵庫市', '尼崎市'], e: '六甲山から街並みの景色を楽しむことができます。'},
    {q: '奈良県の県庁所在地は？', c: ['奈良市', '桜井市', '天理市'], e: '奈良公園、東大寺が人気の観光スポットです。'},
    {q: '和歌山県の県庁所在地は？', c: ['和歌山市', '海南市', '有田市'], e: '和歌山市にある和歌山マリーナシティは人気のレジャースポットです。'},
    {q: '鳥取県の県庁所在地は？', c: ['鳥取市', '倉吉市', '米子市'], e: '鳥取砂丘、砂の美術館では砂のアートを楽しむことができます。'},
    {q: '島根県の県庁所在地は？', c: ['松江市', '出雲市', '島根市'], e: '水の都松江市では、宍道湖で綺麗な夕日をみることができます。'},
    {q: '岡山県の県庁所在地は？', c: ['岡山市', '瀬戸内市', '倉敷市'], e: '日本3名園に数えられる後楽園が有名です。'},
    {q: '広島県の県庁所在地は？', c: ['広島市', '府中市', '三次市'], e: '原爆ドームや平和記念公園など、日本の平和を象徴する町です。'},
    {q: '山口県の県庁所在地は？', c: ['山口市', '長門市', '萩市'], e: '「西の京」山口市は、国宝瑠璃光寺が有名です。'},
    {q: '徳島県の県庁所在地は？', c: ['徳島市', '小松島市', '三好市'], e: '夏には阿波踊りの舞をおがむことができます。'},
    {q: '香川県の県庁所在地は？', c: ['高松市', 'さぬき市', '香川市'], e: '讃岐うどんはもちろん、日本庭園の栗林公園など観光スポットがいっぱい！'},
    {q: '愛媛県の県庁所在地は？', c: ['松山市', '愛媛市', '伊予市'], e: '道後温泉では最高の温泉と旅館を楽しむことができます。'},
    {q: '高知県の県庁所在地は？', c: ['高知市', '土佐市', '四万十市'], e: '高知城付近では土佐歴史に触れることができます。'},
    {q: '福岡県の県庁所在地は？', c: ['福岡市', '北九州市', '古賀市'], e: '福岡市の博多には美味しいご飯も観光スポットもたくさんあります！'},
    {q: '佐賀県の県庁所在地は？', c: ['佐賀市', '神崎市', '小城市'], e: '吉野ヶ里遺跡、佐賀城跡や九年庵など歴史を感じることができる観光スポットが有名です。'},
    {q: '長崎県の県庁所在地は？', c: ['長崎市', '平戸市', '島原市'], e: '長崎ちゃんぽんに加え、魚も美味しく楽しむことができます。'},
    {q: '熊本県の県庁所在地は？', c: ['熊本市', '水俣市', '八代市'], e: '熊本城は、日本３名城に数えられるほど立派です。'},
    {q: '大分県の県庁所在地は？', c: ['大分市', '別府市', '津久見市'], e: '高崎山では、紅葉とサルをみることができます。'},
    {q: '宮崎県の県庁所在地は？', c: ['宮崎市', '日南市', '小林市'], e: '宮崎市の宮崎神宮は、初代天皇の神武天皇が祀られています。'},
    {q: '鹿児島県の県庁所在地は？', c: ['鹿児島市', '垂水市', '曽於市'], e: '鹿児島市の桜島で大自然を感じることができます！'},
    {q: '沖縄県の県庁所在地は？', c: ['那覇市', '糸満市', '沖縄市'], e: '旅行の定番！海や首里城など観光スポットがいっぱい！'},
  ]);
  
  let currentNum = 0;
  let isAnswerd;
  let score = 0;
  
  function shuffle(arr) {
    for(let i = arr.length - 1; i > 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));
      [arr[i], arr[j]] = [arr[j], arr[i]];
    }
    return arr;
  }
  
  function checkAnswer(li) {
    if(isAnswerd) {
      return;
    }
    isAnswerd = true;
    if(li.textContent === quiz_data[currentNum].c[0]) {
      li.classList.add('correct');
      score++;
    } else {
      li.classList.add('wrong');
    }
    answer.textContent = `正解：${quiz_data[currentNum].c[0]}`;
    explanation.textContent = `${quiz_data[currentNum].e}`;
    nextBtn.classList.remove('btn-secondary');
    nextBtn.classList.add('btn-primary');}
  
  // ゲーム開始
  startBtn.addEventListener('click', () => {
    start.classList.remove('d-flex');
    start.classList.add('d-none');
    setQuiz();
    play.classList.remove('d-none');
  });
  // リプレイ
  restartBtn.addEventListener('click', () => {
    result.classList.add('d-none');
    currentNum = 0;
    nextBtn.textContent = '次の問題';
    setQuiz();
    play.classList.remove('d-none');
  });

  function setQuiz() {
    isAnswerd = false;
    answer.textContent = '';
    explanation.textContent = '';

    question.textContent = quiz_data[currentNum].q;
    questionTurn.textContent = `${currentNum + 1}問目`;
    while(choices.firstChild) {
      choices.removeChild(choices.firstChild);
    }
    const shuffledChoices = shuffle([...quiz_data[currentNum].c]);
    shuffledChoices.forEach(choice => {
      const li = document.createElement('li');
      li.textContent = choice;
      li.addEventListener('click', () => {
        checkAnswer(li);
      });
      choices.appendChild(li);
    });
    if (currentNum === quiz_data.length - 1) {
      nextBtn.textContent = '結果を見る';
    }
  }


  nextBtn.addEventListener('click', () => {
    if(nextBtn.classList.contains('btn-secondary')) {
      return;
    }
    nextBtn.classList.remove('btn-primary');
    nextBtn.classList.add('btn-secondary');
    if (currentNum === quiz_data.length - 1){
      showResult();
    } else {
      currentNum++;
      setQuiz();
    }
  });
  
  // ゲーム終了関数
  function showResult() {
    scoreLabel.textContent = `点数:${score} / ${quiz_data.length - 1}`;
    play.classList.add('d-none');
    result.classList.remove('d-none');

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
      url: `prefectures_record/${userid}`,
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

}