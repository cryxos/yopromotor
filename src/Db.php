<?php
namespace App;

use Medoo\Medoo;

class Db
{
    public static function getDbInstance()
    {
        $database = new Medoo([
            // required
            'database_type' => 'mysql',
            'database_name' => 'yopromotor',
            'server' => 'localhost',
            'username' => 'elpromotor',
            'password' => '123',

            // [optional]
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_general_ci' 

            /*  // required
            'database_type' => 'mysql',
            'database_name' => 'analewnk_yopromotor',
            'server' => 'localhost',
            'username' => 'analewnk_elpromotor',
            'password' => 'Oxford2020',

            // [optional]
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_general_ci',  */
        ]);
        return $database;
    }

              

    public static function insert($table, $data)
    {
        $db = self::getDbInstance();
        $resutl = $db->insert($table, $data);
        self::checkDbOperation($db);
        return $resutl;
    }
    public static function update($table, $data, $where)
    {
        $db = self::getDbInstance();
        $resutl = $db->update($table, $data, $where);
        self::checkDbOperation($db);
        return $resutl;
    }
    public static function select($table, $data, $where)
    {
        $db = self::getDbInstance();
        $resutl = $db->select($table, $data, $where);
        self::checkDbOperation($db);
        return $resutl;
    }
	   public static function selectx($table, $data)
    {
        $db = self::getDbInstance();
        $resutl = $db->select($table, $data);
        self::checkDbOperation($db);
        return $resutl;
    }
	public static function selectConsult($table, $data)
    {
        $db = self::getDbInstance();
        $resutl = $db->select($table, $data);
        self::checkDbOperation($db);
        return $resutl;
    }
	public static function selectall($table, $data)
    {
        $db = self::getDbInstance();
        $resutl = $db->select($table, $data);
        self::checkDbOperation($db);
        return $resutl;
    }
    public static function get($table, $data, $where)
    {
        $db = self::getDbInstance();
        $resutl = $db->get($table, $data, $where);
        self::checkDbOperation($db);
        return $resutl;
    }
    public static function has($table, $where)
    {
        $db = self::getDbInstance();
        $resutl = $db->has($table, $where);
        self::checkDbOperation($db);
        return $resutl;
    }
    public static function checkDbOperation($db)
    {
        $errorInfo = $db->error();
        if (APP_LOG_SQL) {
            Logger::addInfo('LAST QUERY>> ' . $db->last());
        }
        if ($errorInfo[2]) {
            $errorInfo[] = $db->last();
            Logger::addInfo(implode(' >>', $errorInfo));
        }
    }
}
