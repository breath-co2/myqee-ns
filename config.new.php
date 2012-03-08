<?php

/**
 * 项目配置
 *
 * 系统每一次请求都是根据请求的URL来匹配是哪个项目，如果匹配不到则使用默认的application作为默认项目
 * 而在projects里的每一个项目的include_path都会包含application和core这两个目录
 *
 * 每一个项目都包含name和url和admin_url参数，分别表示项目的名称和前端URL和后台URL（2.0中的isuse参数被废除）
 * 其中项目的url和admin_url可以是字符串也可以是数组，可以/开头，也可以http://或https://开头。必须/结尾（2.0版本中不需要/结尾,系统在初始化时会进行处理，不存在的则会补上“/”）
 *
 * 主意：admin_url若配置成/开头，则它完整URL应该是接着url参数的，会受url参数影响。比如：
 *
 *   $config['projects']['test'] = array('name'=>'test','url'=>'http://www.abc.com/test/','admin_url'=>'/admin/');
 *
 * 那么实际上后台的URL应该是 http://www.abc.com/test/admin/ ，而不是 http://www.abc.com/admin/ 而若配置成下面这样，用http://或https://开头：
 *
 *   test = array('name'=>'test','url'=>'http://www.abc.com/test/','admin_url'=>'http://admin.abc.com/');
 *
 * 那么后台实际的URL就是 http://admin.abc.com/ ，不会受到url参数的影响
 *
 * @var array
 */
$config['projects'] = array
(
    'docs' => array
    (
        'name' => '项目手册',
        'url'  => '/docs/',
    ),
    'cms' => array
    (
        'name' => 'CMS',
        'url'  => 'http://cms.myqee.com/',
        'admin_url' => '/admin/',
    ),
    //... 可以增加自己的项目
);


/**
 * 设定的固定的APP的URL，不设置则可使用默APP URL可访问
 *
 * 类似项目配置中URL的设定，系统每次都会根据请求的URL去判断是否属于某个APP，其优先级低于项目中URL
 * url可以是字符串也可以是数组，可以/开头，也可以http://开头。必须/结尾（2.0版本中不需要/结尾,系统在初始化时会进行处理，不存在的则会补上“/”）
 *
 * @var array
 */
$config['apps_url'] = array
(
//    'bigdir/appdir' => 'http://test.app.abc.com/',
);


/**
 * 加载类库配置
 *
 * 将指定加载libraries目录的类库
 *
 * @var array
 */
$config['core']['libraries'] = array
(
    // 系统在初始化时就会自动加载的类库，必须是bigDir/subDir形式，例如: mysite/test 表示加载 libraries/mysite/test/ 目录的类库，下同
    'autoload' => array
    (

    ),

    // 命令行下会加载的类库
    'cli'  => array
    (

    ),

    // APP模式下会加载的类库
    'app'  => array
    (
        'myqee/for_app',
    ),

    // 调试环境下会加载的类库
    'debug' => array
    (
        'myqee/develop',
    ),

    // 后台模式下会加载的类库
    'admin' => array
    (
        'myqee/administration',
    ),
);


/**
 * 网站根目录，可以http:// 或 https:// 或 / 开头，必须/结尾
 *
 * @var string
 */
$config['core']['url']['site'] = '/';


/**
 * 默认网站后台目录，可以http:// 或 https:// 或 / 开头，必须/结尾
 *
 * @var string
 */
$config['core']['url']['admin'] = '/admin/';


/**
 * 应用默认URL，可以http:// 或 https:// 或 / 开头，必须/结尾
 *
 * 如果是独立域名，请配置站点路径到apps目录
 *
 * @var string
 */
$config['core']['url']['apps'] = '/apps/';


/**
 * 应用程序URL，可以http:// 或 https:// 或 / 开头，必须/结尾
 *
 * @var string
 */
$config['core']['url']['statics'] = '/statics/';


/**
 * 页面编码
 *
 * @var string
 */
$config['core']['charset'] = 'utf-8';


/**
 * 开启调试模式的密码，支持多个,key为用户名，value为密码，清空则表示禁用开启debug模式
 *
 * @var array
 */
$config['core']['debug_open_password'] = array
(
    'myqee' => '123456',
);


/**
 * 读取配置时是否获取***.debug.config.php文件的配置
 *
 * !! 本地开发建议开启，生产环境请务必关闭
 *
 * 用途如下：
 * 通常本地开发的测试服务器和正式服务器的环境配置都是不相同的（比如数据IP，用户名，密码等等），此开关可帮助你在本地读取补充配置
 * 例如设置true后：
 * database.config.php
 * 可被
 * database.debug.config.php
 * 里的数据覆盖，而生成环境上为关闭状态，会忽略 *.debug.config.php 文件
 *
 * @var boolean
 */
$config['debug_config'] = true;


/**
 * 错误等级
 *
 * @var int
 */
$config['core']['error_reporting'] = 7;


/**
 * 服务器默认文件夹文件，取第一个即可
 *
 * @var string
 * @example index.html
 */
$config['core']['server_index_page'] = 'index.html';


/**
 * 默认时区
 *
 * PRC = 中国标准时区
 *
 * @var string
 * @see http://www.php.net/manual/en/timezones.php
 */
$config['core']['timezone'] = 'PRC';


/**
 * 默认语言包
 *
 * @var string
 * @example zh-cn
 */
$config['core']['lang'] = 'zh-cn';


/**
 * 是否允许在线安装(及删除)应用
 *
 * @var boolean
 */
$config['core']['online_install_apps'] = true;


/**
 * 调试环境打开关键字
 *
 * 建议本地开发时设置打开调试环境，生产环境不设置php.ini即可
 *
 * 例如设置为 myqee.debug 则在php.ini中加入：
 *
 *   [MyQEE]
 *   myqee.debug = On
 *
 * 例如设置为 mytest.abc 则在php.ini中加入：
 *
 *   [MyQEE]
 *   mytest.abc = On
 *
 * 即可设置为默认打开调试模式，系统会自动加载$config['core']['libraries']['debug']中类库，且处于其它类库之上的优先级
 *
 * @var string
 */
$config['core']['local_debug_cfg'] = 'myqee.debug';

/**
 * 页面后缀，必须小写字母
 *
 * 例如设置成.html 可以用 http://yourhost/test.html 这样的形式来访问
 *
 * @var string
 */
$config['core']['url_suffix'] = '.html';


/**
 * 默认数据库配置
 *
 * @var array
 */
$config['database']['default'] = array
(
    'type'       => 'mysqli',
//  'connection' => 'mysql://root:123456@127.0.0.1/test/',
    'connection' => array
    (
        'hostname'   => '127.0.0.1',
        'database'   => 'test',
        'username'   => 'root',
        'password'   => '123456',
        'persistent' => false,
    ),
    'table_prefix' => '',
    'charset'      => 'utf8',
    'caching'      => false,
    'profiling'    => true,
);


