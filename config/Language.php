<?php

namespace config;

class Language
{
    private static array $type = [
        1 => 'uzb',
        2 => 'ru',
        3 => 'eng',
        4 => 'jap'
    ];
    private static array $languege = [
        'layout' => [
            'uzb' => '',
            'ru' => '',
            'eng' => '',
            'jap' => '',
        ],
        'create　admin' => [
            'uzb' => 'Admin qoshish',
            'ru' => 'Создать админа',
            'eng' => 'Create admin',
            'jap' => 'アドミンを追加',
        ],
        'create seance' => [
            'uzb' => 'Seancs qoshish',
            'ru' => 'Создать сеанс',
            'eng' => 'Create seance',
            'jap' => 'セッションを追加',
        ],
        'admin list' => [
            'uzb' => 'Adminlar royxati',
            'ru' => 'Список админов',
            'eng' => 'Admin list',
            'jap' => 'アドミンリスト',
        ],
        'hall' => [
            'uzb' => 'Zal',
            'ru' => 'Зал',
            'eng' => 'Hall',
            'jap' => 'ホール',
        ],
        'seance list' => [
            'uzb' => 'Seans royxati',
            'ru' => 'Список сеанса',
            'eng' => 'Seance list',
            'jap' => 'セッションリスト',
        ],
        'user list' => [
            'uzb' => 'Foydalanuvchilar ro\'yxati',
            'ru' => 'Список пользователей',
            'eng' => 'Users list',
            'jap' => 'ユーザーリスト',
        ],
        'user view' => [
            'uzb' => 'Foydalanuvchi malumotlari',
            'ru' => 'Информация о пользователе',
            'eng' => 'User Information',
            'jap' => 'ユーザー情報',
        ],
        'movie list' => [
            'uzb' => 'Kinolar royxati',
            'ru' => 'Список кино',
            'eng' => 'Movie list',
            'jap' => '映画リスト',
        ],
        'first name' => [
            'uzb' => 'Ism',
            'ru' => 'Имя',
            'eng' => 'First name',
            'jap' => '名前',
        ],
        'last name' => [
            'uzb' => 'Familiya',
            'ru' => 'Фамилия',
            'eng' => 'Last name',
            'jap' => '名字',
        ],
        'email' => [
            'uzb' => 'Email pochta',
            'ru' => 'Электронная почта',
            'eng' => 'Email address',
            'jap' => '電子メール',
        ],
        'phone number' => [
            'uzb' => 'Telefon raqam',
            'ru' => 'Номер телефона',
            'eng' => 'Phone number',
            'jap' => '電話番号',
        ],
        'role' => [
            'uzb' => 'Vazifa',
            'ru' => 'Роль',
            'eng' => 'Role',
            'jap' => '役割',
        ],
        'password' => [
            'uzb' => 'Parol',
            'ru' => 'Пароль',
            'eng' => 'Password',
            'jap' => 'パスワード',
        ],
        'enter first name' => [
            'uzb' => 'Ismni kirting',
            'ru' => 'Введите имя',
            'eng' => 'Enter First name',
            'jap' => '名前を入力',
        ],
        'enter last name' => [
            'uzb' => 'Familiya kirting',
            'ru' => 'Введите фамилию',
            'eng' => 'Enter Last name',
            'jap' => '名字を入力',
        ],
        'enter email' => [
            'uzb' => 'Email pochta kirting',
            'ru' => 'Введите электронную почту',
            'eng' => 'Enter email',
            'jap' => '電子メールを入力',
        ],
        'enter phone number' => [
            'uzb' => 'Telefon raqam kirting',
            'ru' => 'Введите　номер телефона',
            'eng' => 'Enter phone number',
            'jap' => '電話番号を入力',
        ],
        'enter password' => [
            'uzb' => 'Parol kirting',
            'ru' => 'Введите пароль',
            'eng' => 'Enter password',
            'jap' => 'パスワードを入力',
        ],
        'simple admin' => [
            'uzb' => 'admin',
            'ru' => 'админ',
            'eng' => 'admin',
            'jap' => 'アドミン',
        ],
        'super admin' => [
            'uzb' => 'Super admin',
            'ru' => 'Супер админ',
            'eng' => 'Super admin',
            'jap' => 'スーパーアドミン',
        ],
        'update admin' => [
            'uzb' => 'Admin ma\'lumotlarni yangilash',
            'ru' => 'Обновить информацию админа',
            'eng' => 'Update admin information',
            'jap' => 'アドミン情報を変更する',
        ],
        'update category' => [
            'uzb' => 'Kategoriyani yangilash',
            'ru' => 'Обновить категорию',
            'eng' => 'Update Category',
            'jap' => 'カテゴリーを変更する',
        ],
        'update movie' => [
            'uzb' => 'Kino yangilash',
            'ru' => 'Обновить кино',
            'eng' => 'Update movie',
            'jap' => '映画を変更する',
        ],
        'view admin' => [
            'uzb' => 'Admin ma\'lumotlarni korish',
            'ru' => 'Просмотр информации админа',
            'eng' => 'View admin information',
            'jap' => 'アドミン情報の参照',
        ],
        'view movie' => [
            'uzb' => 'Kino ma\'lumotlarni korish',
            'ru' => 'Просмотр информации кино',
            'eng' => 'View movie information',
            'jap' => '映画情報の参照',
        ],
        'view seance' => [
            'uzb' => 'Seans korish',
            'ru' => 'Просмотр Создать сеанса',
            'eng' => 'View seance',
            'jap' => 'セッション情報の参照',
        ],
        'delete admin' => [
            'uzb' => 'Admin o\'chirish',
            'ru' => 'Удалить админа',
            'eng' => 'Delete admin',
            'jap' => 'アドミンを削除する',
        ],
        'back to list' => [
            'uzb' => 'Royhatga otish',
            'ru' => 'Назад в список',
            'eng' => 'Back to list',
            'jap' => 'リストに戻る',
        ],
        'category list' => [
            'uzb' => 'Kategoriya ro\'yxati',
            'ru' => 'Список категорий',
            'eng' => 'Category list',
            'jap' => 'カテゴリ一リスト',
        ],
        'not found' => [
            'uzb' => 'Ma\'lumotlar yoq',
            'ru' => 'Данных нет',
            'eng' => 'Data Not Found',
            'jap' => 'データがありません',
        ],
        'title uz' => [
            'uzb' => 'O\'zbekcha nom',
            'ru' => 'Узбекское названия',
            'eng' => 'Uzbek title',
            'jap' => 'ウズベク語のタイトル',
        ],
        'title ru' => [
            'uzb' => 'Ruscha nom',
            'ru' => 'Русское названия',
            'eng' => 'Russian title',
            'jap' => 'ロシア語のタイトル',
        ],
        'title eng' => [
            'uzb' => 'Inglizcha nom',
            'ru' => 'Английское названия',
            'eng' => 'English title',
            'jap' => '英語のタイトル',
        ],
        'title jap' => [
            'uzb' => 'Yaponcha nom',
            'ru' => 'Японское названия',
            'eng' => 'Japanese title',
            'jap' => '日本語のタイトル',
        ],
        'description uz' => [
            'uzb' => 'O\'zbekcha tavsifi',
            'ru' => 'Узбекское описание',
            'eng' => 'Uzbek description',
            'jap' => 'ウズベク語の説明',
        ],
        'description ru' => [
            'uzb' => 'Ruscha tavsifi',
            'ru' => 'Русское описание',
            'eng' => 'Russian description',
            'jap' => 'ロシア語の説明',
        ],
        'description eng' => [
            'uzb' => 'Inglizcha tavsifi',
            'ru' => 'Английское описание',
            'eng' => 'English description',
            'jap' => '英語の説明',
        ],
        'description jap' => [
            'uzb' => 'Yaponcha tavsifi',
            'ru' => 'Японское описание',
            'eng' => 'Japanese description',
            'jap' => '日本語の説明',
        ],
        'enter description uz' => [
            'uzb' => 'O\'zbekcha tavsifi kiriting',
            'ru' => 'Введите Узбекское описание',
            'eng' => 'Enter Uzbek description',
            'jap' => 'ウズベク語の説明を入力',
        ],
        'enter description ru' => [
            'uzb' => 'Ruscha tavsifi kiriting',
            'ru' => 'Введите Русское описание',
            'eng' => 'Enter Russian description',
            'jap' => 'ロシア語の説明を入力',
        ],
        'enter description eng' => [
            'uzb' => 'Inglizcha tavsifi kiriting',
            'ru' => 'Введите Английское описание',
            'eng' => 'Enter English description',
            'jap' => '英語の説明を入力',
        ],
        'enter description jap' => [
            'uzb' => 'Yaponcha tavsifi kiriting',
            'ru' => 'Введите Японское описание',
            'eng' => 'Enter Japanese description',
            'jap' => '日本語の説明を入力',
        ],
        'create category' => [
            'uzb' => 'Kategoriya qoshish',
            'ru' => 'Создать категорию',
            'eng' => 'Create category',
            'jap' => 'カテゴリーを追加',
        ],
        'create movie' => [
            'uzb' => 'Kino qoshish',
            'ru' => 'Создать кино',
            'eng' => 'Create movie',
            'jap' => '映画を追加',
        ],
        'enter title uz' => [
            'uzb' => 'O\'zbekcha nom kiriting',
            'ru' => 'Введите Узбекское названия',
            'eng' => 'Enter Uzbek title',
            'jap' => 'ウズベク語のタイトルを入力',
        ],
        'enter title ru' => [
            'uzb' => 'Ruscha nom kiriting',
            'ru' => 'Введите Русское названия',
            'eng' => 'Enter Russian title',
            'jap' => 'ロシア語のタイトルを入力',
        ],
        'enter title eng' => [
            'uzb' => 'Inglizcha nom kiriting',
            'ru' => 'Введите Английское названия',
            'eng' => 'Enter English title',
            'jap' => '英語のタイトルを入力',
        ],
        'enter title jap' => [
            'uzb' => 'Yaponcha nom kiriting',
            'ru' => 'Введите Японское названия',
            'eng' => 'Enter Japanese title',
            'jap' => '日本語のタイトルを入力',
        ],
        'delete category' => [
            'uzb' => 'Kategoriya o\'chirish',
            'ru' => 'Категорию админа',
            'eng' => 'Delete category',
            'jap' => 'カテゴリーを削除する',
        ],
        'created date' => [
            'uzb' => 'Yaratilgan sana',
            'ru' => 'Дата создания',
            'eng' => 'Created date',
            'jap' => '作成日',
        ],
        'seance date' => [
            'uzb' => 'Seans sanasi',
            'ru' => 'Дата сеанса',
            'eng' => 'Seance date',
            'jap' => 'セッション日付',
        ],
        'price' => [
            'uzb' => 'Narxi',
            'ru' => 'Дата сеанса',
            'eng' => 'Стоимость',
            'jap' => 'コスト',
        ],
        'duration' => [
            'uzb' => 'Davomiyligi',
            'ru' => 'Длительность',
            'eng' => 'Duration',
            'jap' => '映画の長さ',
        ],
        'lang' => [
            'uzb' => 'uz',
            'ru' => 'ru',
            'eng' => 'eng',
            'jap' => 'jap',
        ],
        'language type' => [
            'uzb' => 'Til',
            'ru' => 'Язык',
            'eng' => 'Language',
            'jap' => '言語',
        ],
        'movie image' => [
            'uzb' => 'Kino rasmi',
            'ru' => 'Изображение фильма',
            'eng' => 'Movie image',
            'jap' => '映画の画像',
        ],
        'place count' => [
            'uzb' => 'Joylar soni',
            'ru' => 'Количество мест',
            'eng' => 'Place count',
            'jap' => '座席数',
        ],
        'place' => [
            'uzb' => 'Joylar',
            'ru' => 'Места',
            'eng' => 'Place',
            'jap' => '座席',
        ],
        'user' => [
            'uzb' => 'Foydalanuvchi',
            'ru' => 'Пользователь',
            'eng' => 'User',
            'jap' => 'ユーザー',
        ],
        'admin' => [
            'uzb' => 'Admin',
            'ru' => 'Админ',
            'eng' => 'Admin',
            'jap' => 'アドミン',
        ],
        'category' => [
            'uzb' => 'Kategory',
            'ru' => 'Категория',
            'eng' => 'Category',
            'jap' => 'カテゴリー',
        ],
        'movie' => [
            'uzb' => 'Kino',
            'ru' => 'Кино',
            'eng' => 'Movie',
            'jap' => '映画',
        ],
        'movie seance' => [
            'uzb' => 'Seans',
            'ru' => 'Сеанс',
            'eng' => 'Seance',
            'jap' => 'セッション',
        ],
        'order' => [
            'uzb' => 'Buyurtma',
            'ru' => 'Заказ',
            'eng' => 'Order',
            'jap' => '注文',
        ],
        'logout' => [
            'uzb' => 'Chiqish',
            'ru' => 'Выйти',
            'eng' => 'Logout',
            'jap' => 'ログアウト',
        ]
    ];
    
    public static function get($key, $lang = null): string
    {
        if ($lang == null) {
            $lang = 4;
            if (isset($_SESSION['admin']['language'])) {
                $lang = $_SESSION['admin']['language'];
            }
        }
        return self::$languege[$key][self::$type[$lang]] ?? '';
    }
}