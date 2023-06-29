<?php

/**
 * @param $userIds
 * @return array
 * Функция принимает id пользователей в виде строки. Выполняет поиск по id в таблице users и возвращет массив в виде ['id' => 'name']
 */

function loadUsersInfo($userIds) {
    $data = [];
    /**
     * если пришла пустота или null, вернем пустой массив data
     */
    if ($userIds) {
        /**
         * приводим строку к массиву
         */
        $user_ids = explode(',', $userIds);
        /**
         * Нет смысла каждую итерацию массива устанавливать новое подключение к базе и затем разрывать это подключение. Поэтому выносим из цикла.
         */
        $db = mysqli_connect("localhost", "root", "", "test");
        foreach ($user_ids as $user_id) {
            /**
             * Используем подготовленные запросы, для исключения sql иньекций.
             * user_ids строка пришедшая из адресной строки. Может содержать sql иньекцию.
             */
            $sql = $db->prepare("SELECT * FROM users WHERE id=?");
            $sql->bind_param("i", $user_id);
            $sql->execute();
            $sql = $sql->get_result();
            /**
             * id пользователя это уникальное значение, а значит запись будет одна.
             */
            $obj = $sql->fetch_object();
            if ($obj) {
                $data[$obj->id] = $obj->name;
            }
        }
        mysqli_close($db);
    }
    return $data;
}

/**
 * получаем массив пользователей
 */
$data = loadUsersInfo($_GET['user_ids']);
/**
 * циклом перебираем массив пользователей и выводим на экран
 */
foreach ($data as $user_id=>$name) {
    echo "<a href=\"/user.php?id=$user_id\">$name</a><br>";
}