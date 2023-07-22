<?php

class Person
{
    // プロパティ
    public $firstname;
    public $lastname;

    public function __construct($first, $last)
    {
        $this->firstname = $first;
        $this->lastname = $last;
    }

    // method
    public function sayHello()
    {
        echo 'こんにちは。私の名前は' . $this->firstname . $this->lastname .  'です。';
    }
}
// インスタンス化する。
$person = new Person('長尾', 'カゲトラ');
// $person->firstname = 'jumpei';
// $person->lastname = '長尾';
$person->sayHello();

// $person2 = new Person();
// $person2->firstname = 'jesus';
// $person2->lastname = 'nabas';
// $person2->sayHello();