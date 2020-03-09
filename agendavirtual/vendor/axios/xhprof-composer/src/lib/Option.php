<?php
/**
 * @author  : axios
 * @email   : axiosleo@foxmail.com
 * @blog    : http://hanxv.cn
 * @datetime: 2018/8/7 17:46
 */

namespace xhprof\lib;

use api\tool\lib\ArrayTool;

class Option
{
    private static $options;

    public static function instance(array $options = [])
    {
        if (is_null(self::$options)) {
            self::$options = ArrayTool::instance();
            self::$options->set(self::defaultOption());
        }
        self::$options->set($options);
        return self::$options;
    }

    protected static function defaultOption()
    {
        $option = [
            'driver'=>'file',
            'file'=>[
                'dir'=>'/tmp/xhprof',
            ],
            'mongo' => [
                //连接名
                'connect_name'    => 'xhprof_mongo_database',
                // 数据库类型
                'type'            => 'mongo',
                // 服务器地址
                'hostname'        => '127.0.0.1',
                // 数据库名
                'database'        => 'xhprof',
                //表名
                'table'           => 'xhprof',
                // 是否是复制集
                'is_replica_set'  => false,
                // 用户名
                'username'        => '',
                // 密码
                'password'        => '',
                // 端口
                'hostport'        => 27017,
                // 连接dsn
                'dsn'             => '',
                // 数据库连接参数
                'params'          => [],
                // 数据库编码默认采用utf8
                'charset'         => 'utf8',
                // 主键名
                'pk'              => '_id',
                // 主键类型
                'pk_type'         => 'ObjectID',
                // 数据库表前缀
                'prefix'          => '',
                // 数据库调试模式
                'debug'           => false,
                // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
                'deploy'          => 0,
                // 数据库读写是否分离 主从式有效
                'rw_separate'     => false,
                // 读写分离后 主服务器数量
                'master_num'      => 1,
                // 指定从服务器序号
                'slave_no'        => '',
                // 是否严格检查字段是否存在
                'fields_strict'   => true,
                // 数据集返回类型
                'resultset_type'  => 'array',
                // 自动写入时间戳字段
                'auto_timestamp'  => false,
                // 时间字段取出后的默认时间格式
                'datetime_format' => 'Y-m-d H:i:s',
                // 是否需要进行SQL性能分析
                'sql_explain'     => false,
                // 是否_id转换为id
                'pk_convert_id'   => false,
                // typeMap
                'type_map'        => ['root' => 'array', 'document' => 'array'],
                // Query对象
                'query'           => '\\tpr\\db\\query\\MongoQuery',
            ],
            'redis'=>[
                'scheme' => 'tcp',
                'host'   => '127.0.0.1',
                'port'   => 6379,
            ]
        ];
        return $option;
    }
}