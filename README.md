# pingpp-laravel5-plus
pingxx基于laravel5的封装

[![Latest Stable Version](https://poser.pugx.org/lyt8384/pingpp-laravel5-plus/v/stable)](https://packagist.org/packages/lyt8384/pingpp-laravel5-plus) [![Total Downloads](https://poser.pugx.org/lyt8384/pingpp-laravel5-plus/downloads)](https://packagist.org/packages/lyt8384/pingpp-laravel5-plus) [![Latest Unstable Version](https://poser.pugx.org/lyt8384/pingpp-laravel5-plus/v/unstable)](https://packagist.org/packages/lyt8384/pingpp-laravel5-plus) [![License](https://poser.pugx.org/lyt8384/pingpp-laravel5-plus/license)](https://packagist.org/packages/lyt8384/pingpp-laravel5-plus)

# 配置方法
1. 在`composer.json`里添加如下内容，并运行`composer update`:
```json
{
    "require": {
        "lyt8384/pingpp-laravel5-plus": "dev-master"
    }
}
```
1. 在`app/config/app.php`文件里的providers变量下添加`lyt8384\Pingpp\PingppServiceProvider::class,`
1. 在`app/config/app.php`文件里的aliases变量下添加`'Pingpp' => lyt8384\Pingpp\Facades\Pingpp::class,`
1. 运行`php artisan vendor:publish`生成配置文件
1. 修改配置文件里面的2组key
1. 若需回调验证，请填写`pub_key`，**注意该处是KEY的内容！**
1. 若需要使用商户身份验证，请填写`private_key_path`，**注意该处是路径！**

# 使用方法
```php
use Pingpp;

class SomeClass extends Controller {
    
    public function someFunction()
    {
    	Pingpp::Charge()->create([
            'order_no'  => '123456789',
		    'amount'    => '100',
		    'app'       => array('id' => 'app_xxxxxxxxxxxxxx'),
		    'channel'   => 'upacp',
		    'currency'  => 'cny',
		    'client_ip' => '127.0.0.1',
		    'subject'   => 'Your Subject',
		    'body'      => 'Your Body'
        ]);
    }
}
```

```php
use Pingpp;

class SomeClass extends Controller {
    
    public function someFunction()
    {
    	Pingpp::RedEnvelope()->create([
            'order_no'  => '123456789',
	        'app'       => array('id' => 'APP_ID'),
	        'channel'   => 'wx_pub',
	        'amount'    => 100,
	        'currency'  => 'cny',
	        'subject'   => 'Your Subject',
	        'body'      => 'Your Body',
	        'extra'     => array(
	            'nick_name' => 'Nick Name',
	            'send_name' => 'Send Name'
	        ),
	        'recipient'   => 'Openid',
	        'description' => 'Your Description'
        ]);
    }
}
```

# 错误调用
当Pingpp调用发生错误的时候会`return false`，此时调用`Pingpp::getError();`返回具体错误内容。

# 接收 Webhooks 通知
直接调用`Pingpp::notice()`，若验证成功,会返回通知的`array`结构数据,若失败直接弹出错误回Pingpp。如果需要记录错误，请自行监听系统错误，详见[Errors & Logging](https://laravel.com/docs/5.1/errors)

其他使用方法见官方文档[PingPlusPlus](https://github.com/PingPlusPlus/pingpp-php)
