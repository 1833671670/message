<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 日志设置
// +----------------------------------------------------------------------
return [
// +----------------------------------------------------------------------
    // | Token设置
    // +----------------------------------------------------------------------
    // 缓存前缀
    'key'      => 'i3d6o32wo8fvs1fvdpwens',
    // 加密方式
    'hashalgo' => 'ripemd160',
    // 缓存有效期 0表示永久缓存
    'expire'   => 0,
    //登录验证码
    'login_captcha'       => true,
    //登录失败超过10则1天后重试
    'login_failure_retry' => true,
    'login_failure_count' => 10,
    //是否同一账号同一时间只能在一个地方登录
    'login_unique'        => false,
];