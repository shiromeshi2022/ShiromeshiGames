<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# about - Shiromeshi Games（しろめしゲームズ）

※マーク作成者が就活ポートフォリオとして作成したサイトであり、開発者向けソースではありません。
※This site was created by the author as a portfolio, not a developer source.

しろめしゲームズとは、子供にweb上で学習機会を提供するweb学習サイトです。
脳トレ、学校勉強、IT学習の３コンテンツからなり、３つのジャンルを体系的に学習できるサイトです。
![shiromeshi_welcome](https://user-images.githubusercontent.com/66049360/100038090-bdb0c880-2e46-11eb-9ddd-cee524630c1a.jpg)


このリポジトリは教育用ゲームサイトです。
デプロイしているので、以下のリンクからアクセスすることができます。
<https://shiromeshigames.herokuapp.com>



# Philosophy

ポートフォリオを作るにあたり、「クオリティーが高くなかっとしても、せっかくなら実際に使ってもらえるサイトにしたい」という思いから制作を始めました。
高クオリティーでなくても、つい開きがちなサイトが私の場合はタイピングゲームサイトでした。
そのことから、時間が余った時にプレイができるゲームサイトを作りたいと思ったことが発端です。
しかし、暇つぶしに止まらず「身にならなければ意味がない」ため、自分が価値を生み出せる場所を模索しました。
その結果、塾講師アルバイトをしていた私が考えたのが、「子供が学ぶべきものを学んでいない、または学ぶことを嫌っているという現実を変えたい」というところでした。
私が学ぶべきと考えるものは「コンピューター・IT知識」であり、学ぶ上で知っておいて欲しいものが「楽しさ」です。

結果生まれた理念が*「楽しく学ぶべきものを」*です。
まだ未完成ですが、この理念に近づくためにアップデートを重ねています。



# Features
Shiromeshi Gamesは主に子供をターゲットにした教育用ゲームを提供します。


  ## contents
  当ゲームでは脳トレゲーム、学校知識ゲーム、コンピューター知識ゲームの３ジャンルを遊ぶことができます。
  いくつかのジャンルを用意することで、ユーザー登録してもらい総合的にプレイしていただける可能性を広げています。
  さらに、子供だけでなく様々な世代の方にプレイしてもらえるサイトにする目的もあります。
  しかし特出して、近年ITの需要が多いことに鑑み、特にIT知識に関するコンテンツを豊富にしていく予定です。


  ## function
  ユーザー名とパスワードだけで簡単にユーザー登録することができます。
  ajax非同期通信で点数を記録し、点数分だけゲーム内コインを獲得できます。
  ユーザーの最高得点などをマイページで確認することができ、獲得したコインで新しいアイコンなどを得ることができます。
  最高得点に応じて称号を獲得し、より高い称号を目指すことでユーザーは達成感を得られます。
  また、ユーザーランキングを表示していることで他のユーザーと点数を競い合うことができます。


  ## design
  ユーザーが使いやすく、シンプルで視覚的なわかりやすいページデザインを心がけています。
  子供が親しみを持ち覚えてもらえるようにという思いが込められています。



# Requirement

* PHP 7.3.11
* Laravel Framework 7.19.1
* 



# License

"Shiromeshi Games" is under [MIT license](https://en.wikipedia.org/wiki/MIT_License).



## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)
- [We Are The Robots Inc.](https://watr.mx/)
- [Understand.io](https://www.understand.io/)
- [Abdel Elrafa](https://abdelelrafa.com)
- [Hyper Host](https://hyper.host)
- [Appoly](https://www.appoly.co.uk)
- [OP.GG](https://op.gg)
- [云软科技](http://www.yunruan.ltd/)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
