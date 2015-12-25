<?php
/**
 * WordPress基础配置文件。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以不使用网站，您需要手动复制这个文件，
 * 并重命名为“wp-config.php”，然后填入相关信息。
 *
 * 本文件包含以下配置选项：
 *
 * * MySQL设置
 * * 密钥
 * * 数据库表名前缀
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define('DB_NAME', 'nearby');

/** MySQL数据库用户名 */
define('DB_USER', 'root');

/** MySQL数据库密码 */
define('DB_PASSWORD', 'wuwanni19821025');

/** MySQL主机 */
define('DB_HOST', 'localhost');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');

/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/
 * WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '9]p>7{yz(;S`E+Sh+YMW-]Ou}(kz>D8gkqB6z(NXUHfK+j#d!^}jAVJu&@:s5TX]');
define('SECURE_AUTH_KEY',  '*/:7NImY[L}p=Wg5mNhBerPt Q&g.>ZYO5TM%eJRH.@[IbES:PUKJ;+!3u92_k{k');
define('LOGGED_IN_KEY',    'o+BWQPud-c+XKJdKmHi&TW#r(0W-ynmVN8HhY| VD pFr@j2{HCqN_!=wO|n,`%l');
define('NONCE_KEY',        '>feCasVux%VLeE&FcL74v?3Yh(CuL+uR*./T&0uIy4q.{=|>=wHX{>V;WTlW<_^]');
define('AUTH_SALT',        'UN_0%aUnp5W#+m!ir#>67x,%X?c6d|<M~`f|`*{DiIB!x~iy|E2Wka0[>W4Pd<-n');
define('SECURE_AUTH_SALT', 'FOe]~Ix$3-y8]Gl-8}yQj-{^+3e#;n~fg1JC*8^F p-9o%|I.{_RutG`>lQJ:wI)');
define('LOGGED_IN_SALT',   'U0x|:Wa vsg%FC-?NW732Z}.d3kw4CMb~x(gIwV}I{|.lpz8hck-~oe+ws9H-SbF');
define('NONCE_SALT',       'PA1+-Z+LE4Uy7M:T$/Xuxq622()9B=;Gwj|jwcnI>|?J55{:GOd:.?>s-aFi_H?3');

/**#@-*/

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix  = 'nearby_';

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 *
 * 要获取其他能用于调试的信息，请访问Codex。
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/**
 * zh_CN本地化设置：启用ICP备案号显示
 *
 * 可在设置→常规中修改。
 * 如需禁用，请移除或注释掉本行。
 */
define('WP_ZH_CN_ICP_NUM', true);
define('WP_ALLOW_MULTISITE', true);

define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'lefans.com');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);
/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress目录的绝对路径。 */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** 设置WordPress变量和包含文件。 */
require_once(ABSPATH . 'wp-settings.php');

