<?php
namespace MessageQueue;

interface IMessageStore
{
    /**
     * Добавление сообщения
     * @param $key
     * @param $message
     */
    public function add($key, $message);

    /**
     * Возвращает кол-во сообщений в очереди
     * @param $key
     * @return mixed
     */
    public function getCountMessages($key);

    /**
     * Возвращает сообщения
     * @param $key
     * @param $limit
     * @return array
     */
    public function getMessages($key, int $limit);

    /**
     * Удаляет сообщение
     * @param $id
     */
    public function remove(int $id);
}