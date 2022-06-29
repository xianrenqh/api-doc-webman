# api-doc-webman

webman开发框架可用的 简单的api-doc 文档
【注解】

## 安装

> composer require xianrenqh/api-doc-webman

## 使用

### 配置设置：

1. 基本配置
   路径：\config\plugin\xianrenqh\api-doc-webman\app.php

可以设置基本信息。
> 重要：
>
> 基本设置中： api_doc->下的 class 设置项，一定要设置成自己要加载的api接口文档的类文件，多个用数组。
>

2. 路由配置
   路径：\config\plugin\xianrenqh\api-doc-webman\route.php

路由设置里目前有两个路由：

1. api文档的前端访问路由
2. apidoc开启密码访问时，请求判断密码的校验地址路由

### 前端访问地址：

默认的：
http://127.0.0.1:8787/apidoc

你可以自行更改路由 apidoc 来定义访问地址

### api类文件的使用方法：

打开你要设置的注解的api类文件，

**例如：\app\api\controller\UserController.php**

1. 在 class UserController 之前增加注解代码：

```php
/**
 * @title   会员Api
 * @desc    API接口
 * Class APi
 * @package app\api\controller
 */
```

2. 在公共方法上增加注解代码：

```php
    /**
     * @title  会员登录
     * @url    /api
     * @header string XX-token header传递的token 空 必须
     * @param string method 路由参数 user.login 必须
     * @param string mobile 用户名或手机号 空 必须
     * @param string password 登录密码 空 必须
     * @param int platform 平台类型 1 否
     * @method POST
     * @code   200 成功
     * @code   0 失败
     * @json {"code":0,"msg":"没有找到此账号","data":[]}
     * @return int code 状态码 （具体参见状态码说明）
     * @return string msg 提示信息
     */ 
```


3. 来个控制器里的完整代码，仅做参考
```php
<?php

namespace app\api\controller;

use app\common\model\User as UserModel;

/**
 * @title   会员Api
 * @desc    API接口
 * Class APi
 * @package app\api\controller
 */
class UserController extends ApiController
{

    /**
     * @title  会员登录
     * @url    /api
     *
     * @param string method 路由参数 user.login 必须
     * @param string mobile 用户名或手机号 空 必须
     * @param string password 登录密码 空 必须
     * @param int platform 平台类型 1 否
     * @method POST
     *
     * @code   200 成功
     * @code   0 失败
     * @json {"code":0,"msg":"没有找到此账号","data":[]}
     * @return int code 状态码 （具体参见状态码说明）
     * @return string msg 提示信息
     */
    public function user_login()
    {
        //你的逻辑，啦啦啦
    }
}
 
```
> **打完，手工。你学废了吗？**

## 效果图
[![jne8gO.jpg](https://s1.ax1x.com/2022/06/29/jne8gO.jpg)](https://imgtu.com/i/jne8gO)

[![jner28.jpg](https://s1.ax1x.com/2022/06/29/jner28.jpg)](https://imgtu.com/i/jner28)
