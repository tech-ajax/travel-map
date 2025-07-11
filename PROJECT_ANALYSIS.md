# Travel Map - 旅行地図アプリ

## 概要 | Overview

**日本語**: 旅行先を地図上で記録・共有できるWebアプリです。写真やコメントと一緒に場所を保存し、他の人と共有できます。

**English**: A web app for recording and sharing travel destinations on a map. Save places with photos and comments, and share them with others.

## 主な機能 | Main Features

### ✈️ 場所の管理 | Place Management
- 旅行先の登録（名前、住所、写真、コメント）
- 地図上での位置表示
- Register travel destinations (name, address, photos, comments)
- Display locations on map

### 🔍 検索・発見 | Search & Discovery  
- キーワード検索
- ハッシュタグでの分類・絞り込み
- Keyword search
- Categorize and filter with hashtags

### ❤️ お気に入り | Favorites
- 気に入った場所をお気に入りに追加
- 個人のお気に入りリスト管理
- Add favorite places
- Manage personal favorites list

### 👤 ユーザー管理 | User Management
- アカウント作成・ログイン
- 個人の場所コレクション
- Account creation and login
- Personal place collections

## クイックスタート | Quick Start

### 必要なもの | Requirements
- PHP 7.2.5+
- MySQL
- Composer
- Node.js & NPM

### インストール | Installation
```bash
# リポジトリをクローン | Clone repository
git clone <repository-url>
cd travel-map

# 依存関係をインストール | Install dependencies
composer install
npm install

# 環境設定 | Environment setup
cp .env.example .env
php artisan key:generate

# データベース設定後マイグレーション | Configure database then migrate
php artisan migrate

# 開発サーバー起動 | Start development server
php artisan serve
npm run dev
```

## 技術情報 | Technology

### 主要技術 | Main Technologies
- **Laravel 6.x** - PHPフレームワーク | PHP Framework
- **MySQL** - データベース | Database  
- **JavaScript/jQuery** - フロントエンド | Frontend
- **Bootstrap** - UIコンポーネント | UI Components

### データベース | Database
- **users** - ユーザー情報 | User information
- **places** - 場所の詳細 | Place details  
- **favorites** - お気に入り関係 | Favorite relationships
- **hash_tags** - タグ分類 | Tag categorization

## 開発者向け | For Developers

### テスト実行 | Running Tests
```bash
vendor/bin/phpunit
```

### 主要ファイル | Key Files
```
app/Http/Controllers/
├── PlacesController.php     # 場所のCRUD | Place CRUD
├── FavoritesController.php  # お気に入り | Favorites  
└── UsersController.php      # ユーザー管理 | User management

resources/views/
├── places/                  # 場所関連画面 | Place views
├── users/                   # ユーザー画面 | User views
└── auth/                    # 認証画面 | Auth views
```

### セキュリティ | Security
- CSRF保護 | CSRF Protection
- 認証システム | Authentication System
- 入力検証 | Input Validation
- ファイルアップロード制限 | File Upload Restrictions

---

**このアプリについて | About This App**  
旅行好きの人が訪問した場所を記録し、写真や思い出と一緒に管理・共有するためのシンプルなプラットフォームです。

A simple platform for travel enthusiasts to record visited places and manage/share them with photos and memories.