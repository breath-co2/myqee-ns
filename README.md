关于MyQEE
=========
MyQEE 3.0 完全融入PHP5.3的命名空间，在MyQEE2.0的基础上对性能上做了很大的优化，并且对多项目的支持进行升级，取消多项目的概念，采用通过URL进行配置选择加载类库达到MyQEE2.0的多项目功能。

MyQEE3.0充分利用了命名空间的优点将开发、核心类库和第三方扩展库及应用分开，在自动加载方面做了深入优化，使得系统在性能上比MyQEE2.0有更大的提升

MyQEE3.0对config和语言包的加载进行了全新的优化，在使用和可维护性上有了更好的体验。

控制器、类库等命名方式做了进一步优化和统一，更加方便开发。


检出代码
========

普通用户
克隆命令：

    git clone --recursive https://github.com/breath-co2/myqee.git
    cd myqee
    cp config.new.php config.php

注意加:--recursive 可以把submodule同时克隆下来

如果你是开发者，请这样克隆代码：

    git clone git@github.com:breath-co2/myqee.git
    cd myqee
    rm .gitmodules
    mv .gitmodules-dev .gitmodules
    git submodule update --init
    cp config.new.php config.php

这样就克隆下所有ssh版本的submodule。


本地环境搭建
===============
环境需求
------
首先安装好 Apache2+PHP5.3+MySQL5，Mac系统已默认安装apache和php，只需要自行安装MySQL
注：Apache需要开启rewrite


配置
------

Apache配置样例：

    NameVirtualHost *
    <Virtualhost *>
        ServerName local.myqee.com
    #    ServerAlias test.com
        DocumentRoot "~/Sites/myqee/"

        RewriteEngine On
        # 禁止.开头的文件被访问
        RewriteRule .*/\..* - [F,L]

        # 各个项目的wwwroot下的文件访问
        RewriteRule ^/~([a-zA-Z0-9\-_]+)~(.*)$ "/projects/$1/wwwroot/$2" [L]

        # wwwroot有文件，则定向到该文件上
        RewriteCond %{DOCUMENT_ROOT}wwwroot%{REQUEST_FILENAME} -f [OR]
        RewriteCond %{DOCUMENT_ROOT}wwwroot%{REQUEST_FILENAME} -d [OR]
        RewriteCond %{DOCUMENT_ROOT}wwwroot%{REQUEST_FILENAME} -l
        RewriteRule ^/(.*)$ /wwwroot/$1 [NC,L]

        # 文件不存在则都定向到php上执行
        RewriteRule ^/(.*)$ /index.php/$1 [NC,L]

        # 以下为过期设置
        ExpiresActive On
        ExpiresByType text/css "access plus 3 days"
        ExpiresByType image/png "access plus 14 days"
        ExpiresByType image/gif "access plus 14 days"
        ExpiresByType image/jpeg "access plus 14 days"
        ExpiresByType application/x-shockwave-flash "access plus 28 days"
    </Virtualhost>

以上参数 ServerName 和 DocumentRoot 按自己实际情况配置，其它不需要修改

*php.ini相关修改*
本地需要打开调试模式，方便开发，所以需要在php.ini里增加如下内容：

    myqee.debug = On


修改本地配置
--------
修改根目录的config.php文件，将 $config['debug_config'] 改成 true

    $config['debug_config'] = true;


访问
------
至此，进入浏览器访问 http://local.myqee.com/ 出现欢迎页面即表示配置成功（注意，域名换成自己的，如果需要用 local.myqee.com 域名，请在hosts它解析到127.0.0.1上）
