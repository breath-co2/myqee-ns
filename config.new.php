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

    // 后台模式时加载的类库
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
 * 开启在线调试模式的密码，支持多个，清除密码则关闭在线调试功能
 *
 * 在线调试地址为根目录下 /opendebugger
 * 例如 http://www.mysite.com/opendebugger
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
 * 服务器文件夹默认文件
 *
 * 通常为 index.html 或 index.htm 等，只需第一个即可
 *
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
 * 默认语言包
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
 * 可通过 \Sync::exec($function,$param_1,$param_2,...); 实现在所有服务器上各自运行一遍$function
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
 * 例如设置为 myqee.debug 则在php.ini中加入：
 *
 *   myqee.debug = On
 *
 * 例如设置为 mytest.abc 则在php.ini中加入：
 *
 *   mytest.abc = On
 *
 * 即可设置为默认打开调试模式，系统会自动加载$config['core']['libraries']['debug']中类库，且处于其它类库之上的优先级，建议本地开发时设置，生产环境不设置php.ini即可
 *
 * @var string
 */
$config['core']['local_debug_cfg'] = 'myqee.debug';

/**
 * 默认数据库配置
 *
 * @var array
 */
$config['database']['default'] = array
(
    'type'       => 'mysqli',                //表示用mysqli类库连接，系统默认支持 mysql|mysqli|mango ，需要别的可自行扩展
    'connection' => array(
            'hostname'   => '127.0.0.1',     //服务器IP或域名
            'database'   => 'test',          //库名称
            'username'   => 'root',          //数据库用户
            'password'   => '123456',        //密码
    ),
    'table_prefix' => '',                    //表前缀，比如:text_
    'charset'      => 'utf8',                //表编码
    'caching'      => false,                 //是否使用同一进程SQL查询缓存（可防止同一SQL语句反复查询）
);






