# Travel Map Project - プロジェクト概要

## 概要 (Overview)

このプロジェクトは、ユーザーが旅行先や訪問した場所を記録・共有できるLaravel製のWebアプリケーションです。Google Maps APIを活用して、地図上で場所を視覚的に管理できる旅行マップサービスです。

This is a Laravel-based web application that allows users to record and share travel destinations and visited places. It utilizes Google Maps API to visually manage locations on an interactive map, creating a comprehensive travel mapping service.

## 主な機能 (Key Features)

### 🗺️ 場所管理 (Place Management)
- **場所の登録**: 場所名、国、住所、座標（緯度・経度）、電話番号、Webサイトリンク、コメント、写真の登録
- **場所の編集・削除**: 登録した場所情報の更新・削除機能
- **地図表示**: Google Maps APIを使用した場所の地図表示
- **場所検索**: 登録済み場所の検索機能

### 👤 ユーザー管理 (User Management)
- **ユーザー認証**: 新規登録、ログイン、ログアウト機能
- **プロフィール管理**: ユーザープロフィールの表示・管理
- **役割管理**: ユーザーロール（owner/user）による権限制御

### 🏷️ ハッシュタグシステム (Hashtag System)
- **タグ付け**: 場所にハッシュタグを付けてカテゴリ分け
- **タグ検索**: ハッシュタグによる場所の絞り込み表示
- **関連場所表示**: 同じタグの場所一覧表示

### ⭐ お気に入り機能 (Favorites System)
- **お気に入り登録**: 気になる場所をお気に入りに追加
- **お気に入り解除**: お気に入りから場所を削除
- **お気に入り一覧**: ユーザーごとのお気に入り場所表示

## 技術スタック (Technology Stack)

### バックエンド (Backend)
- **Framework**: Laravel 6.x
- **Language**: PHP 7.2.5+ / 8.0+
- **ORM**: Eloquent ORM
- **Authentication**: Laravel標準認証システム

### フロントエンド (Frontend)
- **Template Engine**: Blade Templates
- **CSS Framework**: カスタムCSS (style.css)
- **JavaScript**: カスタムJS (style.js)
- **Maps**: Google Maps API

### データベース (Database)
- **ORM**: Laravel Eloquent
- **Migrations**: Laravel標準マイグレーション機能

### デプロイメント (Deployment)
- **Platform**: Heroku対応 (Procfile included)
- **Package Manager**: Composer (PHP), NPM (JavaScript)

## データベース構造 (Database Schema)

### Places Table
| Column | Type | Description |
|--------|------|-------------|
| id | Big Integer | プライマリキー |
| place_name | String | 場所名 |
| country | String | 国名 |
| address | String | 住所 |
| lat | Decimal | 緯度 |
| lng | Decimal | 経度 |
| phone | String | 電話番号 |
| link | String | Webサイトリンク |
| comment | Text | コメント |
| profile_photo | String | 写真パス |
| user_id | Foreign Key | 投稿者ID |

### Users Table
| Column | Type | Description |
|--------|------|-------------|
| id | Big Integer | プライマリキー |
| name | String | ユーザー名 |
| email | String | メールアドレス |
| role | String | ユーザーロール |
| password | String | パスワード（ハッシュ化） |

### HashTags Table
| Column | Type | Description |
|--------|------|-------------|
| id | Big Integer | プライマリキー |
| name | String | ハッシュタグ名 |

### Favorites Table (多対多中間テーブル)
| Column | Type | Description |
|--------|------|-------------|
| user_id | Foreign Key | ユーザーID |
| place_id | Foreign Key | 場所ID |
| timestamps | DateTime | 作成・更新日時 |

## リレーションシップ (Relationships)

### Place Model
- `belongsTo(User)`: 場所の投稿者
- `belongsToMany(HashTag)`: 場所に付けられたハッシュタグ
- `belongsToMany(User, 'favorites')`: 場所をお気に入りしたユーザー

### User Model
- `hasOne(Place)`: ユーザーが投稿した場所
- `belongsToMany(Place, 'favorites')`: ユーザーのお気に入り場所

### HashTag Model
- `belongsToMany(Place)`: ハッシュタグが付けられた場所

## セットアップ手順 (Setup Instructions)

### 1. 環境要件
- PHP 7.2.5以上
- Composer
- Node.js & NPM
- データベース（MySQL推奨）

### 2. インストール
```bash
# リポジトリのクローン
git clone https://github.com/tech-ajax/travel-map.git
cd travel-map

# Composer依存関係のインストール
composer install

# NPM依存関係のインストール
npm install

# 環境ファイルの設定
cp .env.example .env
php artisan key:generate

# データベースの設定（.envファイルを編集）
# DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD

# マイグレーションの実行
php artisan migrate

# ストレージリンクの作成
php artisan storage:link
```

### 3. Google Maps API設定
- Google Cloud PlatformでMaps JavaScript APIを有効化
- APIキーを取得
- 環境変数またはビューファイルでAPIキーを設定

### 4. 開発サーバーの起動
```bash
php artisan serve
```

## ファイル構成 (File Structure)

### 主要ディレクトリ
- `app/`: アプリケーションのコアファイル
  - `Http/Controllers/`: コントローラー
  - `Models/`: Eloquentモデル (Place.php, User.php, HashTag.php)
- `resources/views/`: Bladeテンプレート
  - `places/`: 場所関連のビュー
  - `users/`: ユーザー関連のビュー
  - `apis/`: 地図API関連のビュー
- `database/migrations/`: データベースマイグレーション
- `routes/web.php`: ルート定義
- `public/`: 公開ファイル（CSS, JS, 画像）

### 重要なファイル
- `app/Place.php`: 場所モデル
- `app/User.php`: ユーザーモデル
- `app/HashTag.php`: ハッシュタグモデル
- `app/Http/Controllers/PlacesController.php`: 場所管理コントローラー
- `app/Http/Controllers/FavoritesController.php`: お気に入り機能コントローラー
- `resources/views/apis/map.blade.php`: 地図表示ビュー

## 今後の改善提案 (Future Improvements)

### 機能拡張
1. **SNS機能**: ユーザー間のフォロー機能
2. **レビューシステム**: 場所に対する評価・レビュー機能
3. **写真ギャラリー**: 複数写真のアップロード・表示
4. **ルート機能**: 複数場所を結ぶ旅行ルートの作成
5. **エクスポート機能**: 旅行記録のPDF出力

### 技術的改善
1. **APIの実装**: RESTful APIの提供
2. **モバイル対応**: レスポンシブデザインの改善
3. **パフォーマンス最適化**: キャッシュ機能の実装
4. **テストの充実**: 単体テスト・結合テストの追加
5. **CI/CD**: 自動デプロイメントの設定

## 開発者向け情報 (Developer Information)

### Laravel バージョン
- Laravel Framework: 6.x
- PHP Version: 7.2.5+ / 8.0+

### 主要パッケージ
- `laravelcollective/html`: HTMLフォームヘルパー
- `fideloper/proxy`: プロキシサポート

### テスト
```bash
# PHPUnitテストの実行
vendor/bin/phpunit
```

### コード規約
- PSR-4準拠のオートローディング
- Laravel標準のコーディング規約に従う

---

**作成日**: 2025年7月11日  
**作成者**: Claude (AI Assistant)  
**バージョン**: 1.0.0