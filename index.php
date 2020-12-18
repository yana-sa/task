<?php

//1. Перевернути стрічку, не використовуючи функції strrev().

$string = 'string';
$len = strlen($string);
for ($i = $len; $i > 0; $i--){
    echo $string[$i-1];
}

//2. Чи буде $a == $b? Чи буде $b == $c? Чи буде $a == $c?

$a = 0;
$b = null;
$c = "0";
$a == $c;// true
$b == $c; // false
$a == $b; // true

//3. Регулярний вираз.
//Написати регулярний вираз, який буде валідувати email адрес.
$emails = [
    'test.mail@mail.com',
    'user@site.ua',
    '-user@site.ua',
    'user-email@site'];

foreach ($emails as $email) {
    $validation = "/^[a-zA-Z0-9.]+@[a-zA-Z0-9]+.[a-zA-Z]{2,4}$/";
    if (preg_match($validation, $email)) {
        echo "Email address '$email' is valid.<br>";
    } else {
        echo "Email address '$email' is invalid.<br>";
    }
}

// 4. Перевернути масив.
//Є масив $array = ['h', 'e', 'l', 'l', 'o'],
// як з нього отримати ['o', 'l', 'l', 'e', ' h '],
// не використовуючи функції array_reverse.

$array = ['h', 'e', 'l', 'l', 'o'];
$reversed = [ ];
for ($i = count($array) - 1; $i >= 0; $i --){
    $reversed = $array[$i];
    echo $reversed;
}

// 5.Обробка масиву.
//Дано масив:
//$array = [1, 2, 3, 4, 5];
//Видалити елемент із наведеного масиву. Після видалення елемента цілочисельні ключі масиву повинні бути впорядкованими.

$array = [1, 2, 3, 4, 5];

$sliced = array_slice($array, 1);
print_r($sliced);

//6. Запис даних в масив.
//Після кожного негативного елемента масиву, вставити елемент з нульовим значенням.

$array = [1, 2, 3, 4, -5, 6, 7, -8, 9, -10];
print_r($array);
$result = [];
foreach ($array as $value) {
    if ($value < 0) {
        $result[]=$value;
        $result[] = 0;
    }else{
        $result[]=$value;
    }
}
print_r($result);

//7. Сортування массиву.
//Потрібно відсортувати масив, не використовуючи php функцій для сортування масивів.
$array = [0 => 7, 1 => 1, 2 => 4, 3 => 2, 4 => 5];
sortArray($array);

function sortArray ($array) {
    $count = count($array);
    for($i = 1; $i < $count; $i ++) {

        $j = $i - 1;
        $item = $array[$i];
        while ( $j >= 0 && $array[$j] > $item ) {
            $array[$j + 1] = $array[$j];
            $array[$j] = $item;
            $j = $j - 1;
        }
    }
    print_r($array);
}

//8. Записати дані з масиву в csv файл.
//Результатом повинен бути CSV файл, де заголовками є ключі масиву, а даними, значення масивів. Значення, в яких є однакові ключі, змерджити в одне.

$one = [
    'title'       => 'Test title one',
    'description' => 'Test description one',
    'author'      => 'Igor Kril'
];

$two = [
    'description' => 'Test description two',
    'date'        => '2019-01-01',
    'title'       => 'Test title two',
    'phone'       => '0981111111'
];

$merged = array_merge($one, $two);

$fp = fopen('test.csv', 'w');

foreach ($merged as $key => $value) {
    fputcsv($fp, [$key, $value]);
}
fclose($fp);

//9. Функція
//Написати функцію, яка генерує 3 випадкових числа в діапазоні від 0 до 10. Якщо сума цих чисел менше 14, згенерувати нову трійку.


$sum = 0;
do {
    $num1 = rand(0, 10);
    $num2 = rand(0, 10);
    $num3 = rand(0, 10);
    $sum = $num1 + $num2 + $num3;
    echo "The sum of $num1, $num2, and $num3 is $sum.<br>";
} while ($sum < 14);

//10. Рекурсія
//Написати рекурсивну функцію, яка обчислює факторіал числа.

function factorial($n) {
    if ($n <= 0) return 1;
    return $n * factorial ($n-1);
}
echo factorial(5);

// 11. Отримати IP-адресу
//Як отримати IP-адресу клієнта в PHP.

$ip = $_SERVER['REMOTE_ADDR'];
$ip = $_SERVER['HTTP_CLIENT_IP'];
$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
$ip = $_SERVER['HTTP_X_FORWARDED'];
$ip = $_SERVER['HTTP_FORWARDED_FOR'];
$ip = $_SERVER['HTTP_FORWARDED'];

