## 概要

塾運営支援アプリ作る


## 技術スタック

- Laravel8
    - DDD採用予定
- Vue3 + ts (laravel-mix)
- DevOps(Docker) 非必須, plantUML 必須(設計ファイル見れなくても良い人はなくてもいいけど推奨)
- CI/CD
- AWS(s3, ECS)
- css(sass)


## Git
### Repository
git@github.com:cresta522/Jucudent.git

https://github.com/cresta522/Jucudent

### 注意事項

必ず作業前・一日の初めなど着手するタイミングで最新状態pullしてください。

不要なコンフリクトの原因にもなるし、コミット量が多くなります。

### 保護設定

[参考サイト](https://qiita.com/da-sugi/items/ba3cd83e64c689795c50)

### ブランチルール

以下を参考に、作業ブランチから親ブランチへPR(Pull Request)投げてください

### 開発

#### 親ブランチ

`develop`ブランチ

#### 作業ブランチ

`feature/***`ブランチ

### アイデア

#### 親ブランチ

`idea`ブランチ

#### 作業ブランチ

`idea-feature/***`ブランチ

### 設計

#### 親ブランチ

`system_design`ブランチ

#### 作業ブランチ

`system_design-feature/***`ブランチ

### ドキュメント

#### 親ブランチ

`docs` ブランチ

#### 作業ブランチ

`docs-feature/***`

## コーディングルール

- PSRに則ってください。
- テーブルの列にenumは許可しません。
- マジックナンバーも許容しません。
- インデントは4スペースとします。
- 関数の型宣言必須とします。
- ControllerにValidateは禁止します。make:requestで作成されたRequestに設定してください。
- viewを返すアクションでredirectする際はExceptionを吐き、Exception内でreturnしてください。
- urlはケバブケースに統一します。
- Routingにnameは必須とします。
- DDDについては一度勉強会開きます :)

## ディレクトリ階層(DDD込み)

```
docker/                       Dockerコンテナ群
src/
   ├─ app/                    メインコード
   │   ├─ Actions
   │   │   └─ Commands/       Fortify(Fortify認証 カスタマイズ用)
   │   ├─ Console/
   │   │   └─ Commands/       コマンド (Laravel標準)
   │   │
   │   ├─ Core/               共通機能
   │   │
   │   ├─ Domain/             業務ドメイン(DDD)
   │   │   ├─ Entity/         エンティティ（集約）
   │   │   │   └─ Validator/  エンティティバリデーター
   │   │   ├─ Event/          ドメインイベント
   │   │   ├─ Service/        ドメインサービス
   │   │   └─ ValueObjects/   値オブジェクト（エンティティ用）
   │   │
   │   ├─ Exception/          例外
   │   │
   │   ├─ Http/
   │   │   ├─ Controllers/    Webコントローラ (Laravel標準)
   │   │   │
   │   │   ├─ Middleware/     ミドルウェア (Laravel標準)
   │   │   └─ Requests/       フォームバリデーション (Laravel標準)
   │   │
   │   ├─ Jobs/               ジョブ (Laravel標準)
   │   ├─ Listeners/          イベントリスナー (Laravel標準)
   │   │
   │   ├─ Models/             Eloquentモデル (Laravel標準)
   │   │   ├─ Event/          Eloquentイベント
   │   │   └─ Validator/      Eloquentモデルバリデーター
   │   │
   │   ├─ Providers/          サービスプロバイダ (Laravel標準)
   │   │
   │   ├─ Repositories/       リポジトリ
   │   │   └─ Domain/         業務ドメイン/エンティティ（集約） 用リポジトリ
   │   │
   │   ├─ Rules/              バリデーションルール (Laravel標準)
   │   │
   │   ├─ Services/           アプリケーションサービス
   │   │
   │   ├─ ValueObjects/       値オブジェクト
   │   └─ View/               ビュー用のヘルパー
   │
   ├─ bootstrap               起動
   │
   ├─ config                  設定ファイル
   │
   ├─ database
   │   └─ migrations          マイグレーション
   │
   ├─ resources               ビュー、js、sass
   │
   ├─ routes                  ルーティング
   │
   └─ tests/                  テスト
       ├─ Browser             E2Eテスト (Laravel Dusk)
       ├─ Feature             機能テスト (Feature test)
       └─ Unit                単体テスト (Unit test)
```