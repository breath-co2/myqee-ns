<?php
/**
 * 服务器负载保护函数，本方法目前不支持window系统
 *
 * @see http://php.net/manual/en/function.sys-getloadavg.php
 */
$load_protection = function()
{
    // 最大负载不要超过3*N核，例如有16核（含8核超线程）则 16*3=48
    $max_load_avg = 48;

    if ( !function_exists('sys_getloadavg') )
    {
        return false;
    }

    // 获取load average
    $load = sys_getloadavg();

    if ( !isset($load[0]) )
    {
        return false;
    }

    if ( $load[0] <= $max_load_avg )
    {
        // 未超过负载，则跳出
        return false;
    }

    $msg_tpl = "[%s] HOST:%s LOAD:%s ARGV/URI:%s\n";
    $time = @date(DATE_RFC2822);
    $host = php_uname('n');
    $load = sprintf('%.2f', $load[0]);
    if ( php_sapi_name() == "cli" || empty($_SERVER['PHP_SELF']) )
    {
        $argv_or_uri = implode(',', $argv);
    }
    else
    {
        $argv_or_uri = $_SERVER['REQUEST_URI'];
    }

    $msg = sprintf($msg_tpl, $time, $host, $load, $argv_or_uri);

    $log_dir = dirname(__FILE__).'/../data/logs/';
    if ( @is_dir($log_dir) )
    {
        // 写入日志
        @file_put_contents( $log_dir.'php-server-overload.log', $msg, FILE_APPEND );
    }

    // 输出500错误
    header("HTTP/1.1 503 Too busy, try again later");
    header("Expires: " . gmdate("D, d M Y H:i:s", time()-999999) . " GMT");
    header("Cache-Control: private");
    header("Pragma: no-cache");

    exit( file_get_contents( dirname(__FILE__).'/errors/server_overload.html') );
};
$load_protection();
unset($load_protection);


// 加载系统
include dirname(__FILE__).'/../core/bootstrap.php';

// 执行bootstrap
Bootstrap::setup();