<?php
namespace MessageQueue;

require_once('MySQLStore.php');
use Storage\MySQLStore;

class Queue
{
    const DEFAULT_LIMIT = 100;
    private  $__limit;
    private $__store;

    public function __construct()
    {
        $this->__store = MySQLStore::getInstance();
        $this->__limit = self::DEFAULT_LIMIT;
    }

    /**
     *  Устанавливает лимит на получение сообщений из очереди
     * @param $limit
     */
    public function setLimit($limit)
    {
        $this->__limit = $limit;
    }

    /**
     * Добавляет сообщение в очередь
     * @param $key
     * @param $message
     */
    public function add($key, $message)
    {
        $this->__store->addMessage($key, $message);
    }

    /**
     * Возвращает кол-во сообщений в очереди по заданному ключу
     * @param $key
     */
    public function count($key)
    {
        $this->__store->getCountMessages($key);
    }

    /**
     * Возвращает список сообщений из очереди по заданному ключу
     * @param $key
     * @return mixed
     */
    public function getQueue($key)
    {
        return $this->__store->getMessages($key, $this->__limit);
    }

    /**
     * Удаляет сообщение из очереди
     * @param $id
     */
    public function read($id)
    {
        $this->__store->deleteMessage($id);
    }
} 