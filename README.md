# simple-queue
# Реализация простой очереди(первый вошел, первый вышел)

```php
// Подключаем библиотеку
require_once('Queue.php');
use MessageQueue\Queue;

// Пример добавления в очередь
$queue = new Queue();
for($i = 0; $i <= 100000; $i++) {
    $queue->add('my_key', uniqid());
}

// пример обработки всей очереди
$queue = new Queue();
$queue->setLimit(1000);
$key = 'my_key';
$count = $queue->count($key);

// Будет работать пока есть сообщения в очереди
while($count > 0) {
    $messages = $queue->getQueue($key);
    if (count($messages) > 0) {
        foreach ($messages as $message) {
            /**
             * Имитация какой-либо логики работы с сообщениями
             */
            sleep(1);

            // удаляем сообщение из очереди
            $queue->read($message->id);
        }
    }
    $count = $queue->count($key);
}
```
