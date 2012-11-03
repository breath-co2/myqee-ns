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
$config['libraries'] = array
(
    // 系统在初始化时就会自动加载的类库，必须是com.bigdir.subdir形式(其中com.为固定字符串前缀)，例如: com.mysite.test 表示加载 libraries/mysite/test/ 目录的类库，下同
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
        'com.myqee.for_app',
    ),

    // 调试环境下会加载的类库
    'debug' => array
    (
        'com.myqee.develop',
    ),

    // 后台模式下会加载的类库
    'admin' => array
    (
        'com.myqee.administration',
    ),
);


/**
 * 网站部署的根目录，/开始，/结尾
 *
 * @var string
 */
$config['root_path'] = '/';


/**
 * 网站根目录，可以http:// 或 https://，/结尾
 *
 * @var string
 */
$config['url']['site'] = '/';


/**
 * 默认网站后台目录，可以http:// 或 https:// 或 / 开头，必须/结尾
 *
 * @var string
 */
$config['url']['admin'] = '/admin/';


/**
 * 应用默认URL，可以http:// 或 https:// 或 / 开头，必须/结尾
 *
 * 如果是独立域名，请配置站点路径到apps目录
 *
 * @var string
 */
$config['url']['apps'] = '/apps/';


/**
 * 应用程序URL，可以http:// 或 https:// 或 / 开头，必须/结尾
 *
 * @var string
 */
$config['url']['statics'] = '/statics/';


/**
 * 页面编码
 *
 * @var string
 */
$config['charset'] = 'utf-8';


/**
 * 开启调试模式的密码，支持多个
 *
 * key为用户名，value为密码，清空则表示禁用开启debug模式
 *
 * @var array
 */
$config['debug_open_password'] = array
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
$config['debug_config'] = false;


/**
 * 错误等级
 *
 * @var int
 */
$config['error_reporting'] = 7;


/**
 * 服务器默认文件夹文件，取第一个即可
 *
 * @var string
 * @example index.html
 */
$config['server_index_page'] = 'index.html';


/**
 * 服务器开启HTTPS的关键字，通常是HTTPS，无需修改
 *
 * 特殊情况下可能需要修改，比如通过nginx的443端口代理apache的80端口，浏览器里https://...页面，而在apache中实际的是http://...页面，可以传 $_SERVER["HTTP_HTTPS"] = 'on' 参数告诉服务器是https请求，这样在Core::url()参数中输出的URL将做相应处理
 *
 * @var string
 */
$config['server_httpson_key'] = 'HTTPS';


/**
 * 默认时区
 *
 * PRC = 中国标准时区
 *
 * @var string
 * @see http://www.php.net/manual/en/timezones.php
 */
$config['timezone'] = 'PRC';


/**
 * 默认语言包
 *
 * @var string
 * @example zh-cn
 */
$config['lang'] = 'zh-cn';


/**
 * WEB服务的服务器列表，留空则禁用同步功能（比如只有1台web服务器时请禁用此功能）
 *
 * 可通过 HttpCall::sync_exec('uri',$param_1,$param_2,...); 实现在所有服务器上各自运行一遍URL为uri的请求（执行的控制器在controller/[system]/目录下）
 *
 * !! 另外，由于内部请求会对请求时效进行验证，所以请务必保持各个服务器之间时间差小于10分钟
 *
 *	 //可以是内网IP，确保服务器之间可以相互访问到，端口请确保指定到apache/IIS/nginx等端口上
 *   array(
 *       'default' => array
 *       (
 *           '192.168.1.2:81',      //第一个为主服
 *           '192.168.1.1',         //80端口可省略:80
 *           '192.168.1.3:81',
 *       ),
 *   )
 *
 * @var array
 */
$config['web_server_list'] = array
(
    // 默认服务器群
    'default' => array
    (
        //第一个为主服
    ),
);


/**
 * 系统内部请求通讯密钥
 *
 * 至少10位字符，内容不限
 * 留空时系统将采用config配置中所有core及database的序列化字符串作为key。如果各个服务器的配置都相同，推荐留空；若各个服务器之间的core或database配置存在差异则不能留空，否则通讯验证将无法通过，此时必须设置system_exec_key才可以保证通讯验证通过
 *
 * @var string
 */
$config['system_exec_key'] = '';


/**
 * 系统内部调用允许的IP列表，星号“*”表示匹配任意
 *
 * 127.0.0.1为永久允许IP，所以不需要加
 * 当请求的IP和服务器IP相同时（即服务器内部调用自己），即便没有在此列表时也会允许通过验证
 *
 * 请注意通常服务器都有内网IP和外网IP，请务必都加上，以免相互请求时无法通过验证
 *
 *    array
 *    (
 *        '192.168.1.*',
 *        '10.0.0.1',
 *        '10.0.0.2',
 *    )
 */
$config['system_exec_allow_ip'] = array
(

);


/**
 * 多服务器文件同步模式
 *
 * 可选参数：rsync|system|none
 * rsync  : 可靠性比较好。但需要在服务器上配置好rsync，将主服data,wwwroot目录同步到其它服上。此种模式下，系统在执行文件操作时，不管轮询到哪台机器上，都将只调用主服务器进行文件操作，然后由rsync来实现文件同步
 * system : 通过本系统内置的同步模式进行同步，无须额外配置。在执行文件操作时，将通过内部系统调用所有服务器进行操作，可靠性不及rsync
 * none   : 不做同步处理
 *
 * 当 $config['web_server_list'] 设置存在多服务器时，调用File类库保存文件时采取的多服务器同步模式
 * 当单服务器模式时，本参数无效
 *
 * @var string
 */
$config['file_sync_mode'] = 'system';


/**
 * 是否允许在线安装(删除)应用
 *
 * @var boolean
 */
$config['online_install_apps'] = true;


/**
 * APP账号
 *
 *     array
 *     (
 *         'user',   //账号
 *         'sn',     //序列号
 *     );
 *
 * @var array
 */
$config['app_user'] = array('myqee','**************');


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
 * 即可设置为默认打开调试模式，系统会自动加载$config['libraries']['debug']中类库，且处于其它类库之上的优先级
 *
 * @var string
 */
$config['local_debug_cfg'] = 'myqee.debug';

/**
 * 页面后缀，必须小写字母
 *
 * 例如设置成.html 可以用 http://yourhost/test.html 这样的形式来访问
 *
 * @var string
 */
$config['url_suffix'] = '.html';


/**
 * 记录慢查询的时间，单位毫秒。0表示不记录
 *
 * 在shell下执行SQL不记录
 * 慢查询将都记录在 Log目录的slow_query目录下，按年月分目录记录。类似：
 *
 *    GET  22:46:33 -   9037 - 127.0.0.1       http://www.test.com/abc/?a=1
 *         22:46:33 -   3003 - SELECT * FROM `admin_member` WHERE `id` = '1'
 *         22:46:36 -   3000 - SELECT * FROM `test` WHERE `id` = '1'
 *
 *  表示：
 *    11点13分50秒GET请求的http://www.test.com/abc/?a=1页面产生的SQL
 *    执行时的时间    耗时(单位毫秒)   查询语句
 *
 * @var int
 */
$config['slow_query_mtime'] = 2000;


/**
 * 系统日志设置
 *
 * @var array
 */
$config['log'] = array
(
    'use'    => 1,           //是否记录日志
    'file'   => 'Y/m/d/',    //文件格式
    'format' => ':time - :host::port - :url - :msg',    //内容格式化
);


/**
 * 此参数在部分安全要求比较高,不可执行eval的服务器上可设置成true，默认用false即可
 *
 * 关于本参数的详细说明，请查看相关手册
 *
 * @var boolean
 */
$config['disable_eval'] = false;

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
        'database'   => 'myqee',
        'username'   => 'root',
        'password'   => '123456',
        'persistent' => false,
    ),
    'table_prefix' => '',
    'charset'      => 'utf8',
    'caching'      => false,
    'profiling'    => true,
);


