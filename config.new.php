<?php

/**
 * 加载类库配置
 *
 * 将指定加载libraries目录的类库
 *
 * @var array
 */
$config['core']['libraries'] = array(
    // 系统在初始化时就会自动加载的类库，必须是bigDir/subDir形式，例如: mysite/test 表示加载 libraries/mysite/test/ 目录的类库，下同
    'autoload' => array(

    ),

    // 命令行下会加载的类库
    'cli'      => array(

    ),

    // 调试环境下会加载的类库
    'debug'    => array(
        'myqee/develop',
    ),

    // 后台加载的类库
    'admin'    => array(
        'myqee/administration',
    ),
);

/**
 * 页面编码
 *
 * @var string
 */
$config['core']['charset'] = 'utf-8';

/**
 * 后台控制器模式URL前缀
 *
 *   array(
 *      '/admin/',                   // 所有/admin开头的URL都将被纳入后台控制器模式
 *      'http://admin.test.com/',    // 所有admin.test.com域名下的请求将被纳入后台控制器模式
 *   )
 *
 * @var array
 */
$config['core']['admin_mode_base_url'] = array(
    '/admin/',
);

/**
 * 读取配置时是否获取***.debug.config.php文件的配置
 *
 * 通常本地开发的测试服务器和正式服务器的环境配置都是不相同的，此开关可帮助你在本地读取补充配置
 * 例如设置true后：
 * database.config.php
 * 可被
 * database.debug.config.php
 * 里的数据覆盖
 *
 * @var boolean
 */
$config['core']['debug_config'] = true;

/**
 * 开启调试模式的密码，支持多个
 *
 * @var array
 */
$config['core']['debug_open_password'] = array(
        'myqee',
);

/**
 * 页面编码
 *
 * @var string
 */
$config['core']['charset'] = 'utf-8';

/**
 * 网站根目录
 *
 * 设为null则自动判断
 *
 * @var string
 */
$config['core']['base_url'] = null;

/**
 * 错误等级
 *
 * @var int
 */
$config['core']['error_reporting'] = 7;

/**
 * 服务器默认文件夹文件
 * @var string
 */
$config['core']['server_index_page'] = 'index.html';

/**
 * 默认时区
 *
 * @var string
 * @see http://www.php.net/manual/en/timezones.php
 */
$config['core']['timezone'] = 'PRC';

/**
 * 语言包
 *
 * @var string
 */
$config['core']['lang'] = 'zh-cn';

/**
 * 是否允许在线安装(及删除)应用
 *
 * @var boolean
 */
$config['core']['online_install_apps'] = true;

/**
 * WEB服务的服务器列表，留空则禁用同步功能（比如只有1台web服务器时请禁用此功能）
 *
 * 配置服务器后，可以实现服务器上data目录的文件同步功能，同步逻辑通过本系统完成，如果已经配置了data目录的sync同步机制，只需要配置1个主服务器即可
 * 可通过 Core::sync_exec($function,$param_1,$param_2,...); 实现在所有服务器上各自运行一遍$function
 *
 *	 //可以是内网IP，确保服务器之间可以相互访问到，端口请确保指定到apache/IIS/nginx等端口上
 *   array(
 * 	   '192.168.1.1',		//80端口可省略:80
 * 	   '192.168.1.2:81',
 * 	   '192.168.1.3:81',
 *   )
 *
 * @var array
 */
$config['core']['web_server_list'] = array(

);

/**
 * 调试环境打开关键字
 *
 * 可在php.ini中加入：
 *
 *   [MyQEE]
 *   myqee.debug = On
 *
 * 即可设置为默认打开调试模式，建议本地开发时设置，生产环境不设置php.ini即可
 *
 * @var string
 */
$config['core']['local_debug_cfg'] = 'myqee.debug';


/**
 * 默认数据库配置
 *
 * @var array
 */
$config['database']['default'] = array(

);
