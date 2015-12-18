<?php
namespace Storage;

class MySQLStore
{
    private static $__instance;
    private $__db;
    private $__host = 'localhost';
    private $__user = 'root';
    private $__password = '111';
    private $__dbName = 'queue';

    private function __construct()
    {
        $this->__db = new \mysqli($this->__host, $this->__user, $this->__password, $this->__dbName);
        if ($this->__db->connect_error) {
            die('Ошибка соединения с сервером MySQL (' . $this->__db->connect_errno . ') ' . $this->__db->connect_error);
        }
    }

    public static function getInstance()
    {
        if (static::$__instance == null) {
            static::$__instance = new static();
        }
        return static::$__instance;
    }

    /**
     * Добавление сообщения
     * @param $key
     * @param $message
     */
    public function addMessage($key, $message)
    {
        $query = "INSERT INTO Messages(name, text) VALUES('" . $key . "', '" . $message . "')";
        $this->__db->query($query);
    }

    /**
     * Возвращает кол-во сообщений в очереди
     * @param $key
     * @return mixed
     */
    public function getCountMessages($key)
    {
        $query = "SELECT COUNT(id) AS cnt FROM Messages WHERE name = '".$key."'";
        $result = $this->__db->query($query);
        return $result->fetch_object()->cnt;
    }

    /**
     * Возвращает первые сообщения
     * @param $key
     * @param $limit
     * @return array
     */
    public function getMessages($key, $limit)
    {
        $messages = [];
        $query = "SELECT id, text AS message FROM Messages WHERE name = '" . $key . "' ORDER BY id ASC LIMIT 0, {$limit}";
        $result = $this->__db->query($query);
        $i = 0;
        while ($row = $result->fetch_object()) {
            $i++;
            $messages[$i] = $row;
        }

        return $messages;
    }

    /**
     * Удаляет сообщение
     * @param $id
     */
    public function deleteMessage($id)
    {
        $query = "DELETE FROM Messages WHERE id = {$id}";
        $this->__db->query($query);
    }
} 