<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/13
 * Time: 17:26
 */
header('Content-type:text/html;charset=utf-8');


//判断 p 函数是否存在  如果不存在
if (!function_exists('p')) {
//    定义p函数
    function p($con)
    {
        echo "<pre style='padding: 15px;background: whitesmoke;border-radius: 46px;color: black;font-size: 18px;font-weight: 700'>";
        if (is_null($con)) {
            var_dump($con);
        } elseif (is_bool($con)) {
            var_dump($con);
        } else {
            print_r($con);
        }
        echo '</pre>';
    }
}

//判断 dd 函数是否存在  如果不存在
if (!function_exists('dd')) {
//    定义dd函数
    function dd($con)
    {
        echo "<pre style='padding: 15px;background: whitesmoke;border-radius: 46px;color: black;font-size: 18px;font-weight: 700'>";
        if (is_null($con)) {
            var_dump($con);
        } elseif (is_bool($con)) {
            var_dump($con);
        } else {
            print_r($con);
        }
        echo '</pre>';
        die;
    }
}


/**
 * 全局配置函数
 * 使用
 * config(database.db_host)
 */
//判断 config 函数是否存在  如果不存在
if (!function_exists('config')) {
//    定义config函数
    function config($path) //$path='database.db_host'
    {
        $arr = explode('.', $path);//字符串分割成数组
        $dirPath = '../app/' . $arr[0] . '.php';//配置项路径
        $filePath = include $dirPath;//获得配置项
//        Array
//        (
//            [db_host] => 127.0.0.1
//        )
//        dd($arr[1]);
        return isset($filePath[$arr[1]]) ? $filePath[$arr[1]] : NUll;
    }
}


/**
 * 全局变量
 *
 * @param $name 变量名
 * @param string $value 变量值
 *
 * @return mixed 返回值
 * v('a','abc');  v('a')
 * 使用：
 * $a =include '../app/database.php';
 * v('config', $a);
 * p(v('config.db_name'))/p(v('config'))
 *
 */
if (!function_exists('v')) {
    function v($name = null, $value = '[null]')
    {
        static $vars = [];
        if (is_null($name)) {
            return $vars;
        } else if ($value == '[null]') {
            //取变量
            $tmp = $vars;
            foreach (explode('.', $name) as $d) {
                if (isset($tmp[$d])) {
                    $tmp = $tmp[$d];
                } else {
                    return null;
                }
            }
            return $tmp;
        } else {
            //设置
            $tmp = &$vars;
            foreach (explode('.', $name) as $d) {
                if (!isset($tmp[$d])) {
                    $tmp[$d] = [];
                }
                $tmp = &$tmp[$d];
            }
            return $tmp = $value;
        }
    }

    /**
     * 打印用户自定义的常量
     */
    function pf()
    {
        $const = get_defined_constants(true);//获得自定义的常量
        p($const['user']);
    }











}





