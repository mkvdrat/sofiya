<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'sofiya' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '1234' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '?{T8L( z;5rzDT1<PU%)1qRjjfmrN9Yva9l3lO`=M Ah3f?C[t[6;QhB4lXN4:s*' );
define( 'SECURE_AUTH_KEY',  '03RTFmEu<h)zmD+#m<Hw%Y;XiFAjQ(hc&w4Me/^yWXB><X3t&Bcsnq)Nl+krxPrh' );
define( 'LOGGED_IN_KEY',    '63.~9enzP)`_;~43qH9QXzBtN!Ci6W,ofj?i -wWJ,8_TI+R:`m,P}7`~.?<V^x@' );
define( 'NONCE_KEY',        '2}WqTTy*x7#j+m,d-EMFK$[9=~`PUw=B.jtA9VNE(G<ntQ=Bzz$Q2o_mbnqfOLZH' );
define( 'AUTH_SALT',        '!zQv(Ew-NX4tYHj.cbxnJ{7](W!N.zB)zo}viOIYDdN79 d>4~Hr:G0H,QI|,Hi3' );
define( 'SECURE_AUTH_SALT', 'LzUtgi{Os77(<`$wS$Tr&oCPy7wE{B(V+2!AK?HevRGm,H_i[JeZ.$zMmD@>coG^' );
define( 'LOGGED_IN_SALT',   'Gp=&mW.|VNNk,?,r* #$l2^QN4n`J6=1:x0+Scp<:y`.qqAMxnlSV,u}gUis }r/' );
define( 'NONCE_SALT',       '+t1f`[#]*|E+E3pHfv@u=Z H @{j.C6B%^uGr>H0[;4sYQjk.|=K=qMm?QiVt:M6' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
