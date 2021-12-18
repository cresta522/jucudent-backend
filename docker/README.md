# Laravel環境構築

## 環境変数について

環境変数の利用には`.env`ファイルが必要です。

リポジトリの`.env.example`をコピーして該当ファイルを作成してください。

## Build & Up

`docker-compose up -d --build`

## コンテナ起動状態を確認

`docker-compose ps`

## Package Install

appコンテナに入る  
`docker-compose exec app bash`

## Laravelプロジェクト作成

`docker-compose exec app composer create-project --prefer-dist laravel/laravel . "8.x"`

## livewire インストール

```bash
docker-compose exec app composer require livewire/livewire  
docker-compose exec app npm install  
docker-compose exec app npm run dev  
docker-compose exec app php artisan migrate
```

## TSインストール

```bash
docker-compose exec -u root app npm install -g typescript
```  

または、rootで入って

```bash
npm install -g typescript
```

#### バージョンが表示されればOK

```bash
docker-compose exec -u root app tsc --version
```

#### TS設定用ファイル作成

```bash
docker-compose exec -u root app tsc --init
```

## Laravel Mix(webpack.mix.js)の設定

```php
mix.js('resources/js/app.js', 'public/js').vue()  
    .postCss('resources/css/app.css', 'public/css', [  
        require('postcss-import'),  
        require('tailwindcss'),  
    ])
    .webpackConfig(require('./webpack.config'))  
    .ts('resources/**/*', 'public/js/app.js'); //　<- 追記  
```

## AdminLTE3 導入

```bash
docker-compose exec app composer require jeroennoten/laravel-adminlte
docker-compose exec app php artisan adminlte:install
docker-compose exec app php artisan adminlte:install --only=auth_views
docker-compose exec app php artisan adminlte:install --only=main_views
```

## IDE-Helper 導入

```
docker-compose exec app composer require --dev barryvdh/laravel-ide-helper
```

## IDE-Helper 実行

```bash
# PHPDoc generation for Laravel Facades
docker-compose exec app php artisan ide-helper:generate 

# PHPDocs for models
docker-compose exec app php artisan ide-helper:models -W

```

## マイグレーションでカラム定義変更

```bash
docker-compose exec app composer require doctrine/dbal
```

## Debugbar

```bash
docker-compose exec app composer require --dev barryvdh/laravel-debugbar
docker-compose exec app php artisan vendor:publish --provider="Barryvdh\Debugbar\ServiceProvider"
```