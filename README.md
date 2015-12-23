# pingpp-laravel5-plus
pingxx基于laravel5的封装

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
其他使用方法见官方文档[PingPlusPlus](https://github.com/PingPlusPlus/pingpp-php)