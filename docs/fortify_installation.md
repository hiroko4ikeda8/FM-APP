# Fortifyインストール手順

このドキュメントでは、LaravelアプリケーションにFortifyをインストールし、設定する手順を説明します。

## 前提条件

- Laravel 8.x以上
- PHP 7.4以上
- MySQLまたは他のデータベースが設定済み

## 1. Fortifyパッケージのインストール

まず、FortifyパッケージをComposerを使ってインストールします。

```bash
composer require laravel/fortify
```

## 2. サービスプロバイダの登録
Laravel 8以降では、Fortifyのサービスプロバイダは自動で登録されますが、もし手動で追加する必要がある場合、config/app.phpのproviders配列に以下を追加します。

```php
/*
 * Package Service Providers...
 */
Laravel\Fortify\FortifyServiceProvider::class, # ここに記述する
```

## 3. Fortify設定ファイルの公開
次に、Fortifyの設定ファイルを公開します。この設定ファイルをカスタマイズして、アプリケーションに合わせた設定を行います。

```bash
php artisan vendor:publish --provider="Laravel\Fortify\FortifyServiceProvider" --tag=config
```

これで、config/fortify.phpという設定ファイルが生成されます。

## 4. ユーザー認証関連のマイグレーション
Fortifyは、ユーザー認証に必要なテーブルを提供しませんが、usersテーブルを使用する場合は、適切なカラムを追加する必要があります。
マイグレーションを作成して、必要なカラムを追加してください。

```bash

php artisan make:migration add_columns_to_users_table --table=users
```

マイグレーションファイルを編集し、ユーザーに必要なカラム（例：name, email, passwordなど）を追加します。
その後、マイグレーションを実行します。

```bash

php artisan migrate
```

## 5. Fortifyのルート設定
config/fortify.phpファイルを開き、認証に関連するルート（ログイン、登録、パスワードリセットなど）の設定を行います。
デフォルトで多くのルートは有効になっていますが、必要に応じてカスタマイズが可能です。

## 6. Fortifyのビュー設定（オプション）
もしカスタムビューを使用したい場合、Fortifyでは認証画面のビューをカスタマイズすることができます。
ビューを公開して、カスタマイズを行います。

```bash

php artisan vendor:publish --provider="Laravel\Fortify\FortifyServiceProvider" --tag=views
```

その後、resources/views/vendor/fortifyディレクトリに生成されたビューを編集します。

## 7. 追加設定（オプション）
Fortifyは、認証の設定をさらにカスタマイズするためのオプションを提供しています。
例えば、ユーザー認証方法の変更（メール認証、二段階認証など）や、ユーザーの登録、パスワードリセットなどのロジックを変更できます。

Fortifyを使用することで、セキュアでスケーラブルな認証システムを簡単に実装できます。必要な機能が自動で提供されるので、開発者はビジネスロジックに集中できます。

## 8. 完了
以上で、Fortifyのインストールと設定が完了しました。アプリケーション内で認証機能を利用できるようになります。

必要に応じて、さらに設定をカスタマイズしてアプリケーションに最適な認証システムを作り上げてください。


READMEに戻る # [README.md](../README.md)
