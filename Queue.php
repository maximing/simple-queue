<?php
namespace MessageQueue;

class Queue
{
    const DEFAULT_LIMIT = 100;
    private  $__limit;
    private $__store;

    public function __construct(IMessageStore $store)
    {
        $this->__store = $store;
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
        $this->__store->add($key, $message);
    }

    /**
     * Возвращает кол-во сообщений в очереди по заданному ключу
     * @param $key
     * @return mixed
     */
    public function count($key)
    {
        return $this->__store->getCountMessages($key);
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
    public function read(int $id)
    {
        $this->__store->remove($id);
    }
} 