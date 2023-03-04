<?php

use App\Book;
use App\BookList;

function runTest()
{
   
    $bl1 = new BookList(array());
    $b1 = new Book();
    $b1->setTitle("Евгений Онегин")
    ->setAuthors(array("А.С. Пушкин"))
    ->setPublisher("Азбука")
    ->setYear(2016);
    echo $b1 . PHP_EOL;

    
    $bl1->add($b1);
    echo "Количество книг в списке: " . $bl1->count() . PHP_EOL;

   
    $b2 = new Book();
    $b2->setTitle("Герой нашего времени")
    ->setAuthors(array("М. Ю. Лермонтов"))
    ->setPublisher("Эксмо")
    ->setYear(2022);
    echo $b2 . PHP_EOL;

   
    $bl1->add($b2);
    echo "Количество книг в списке: " . $bl1->count() . PHP_EOL;

   
    $bl1->store("Booklist.bin");

   
    $b3 = new Book();
    $b3->setTitle("На дне")
    ->setAuthors(array("М. Горький"))
    ->setPublisher("АСТ")
    ->setYear(2022);
    echo $b3 . PHP_EOL;

    
    $bl1->add($b3);
    echo "Количество книг в списке: " . $bl1->count() . PHP_EOL;

    
    for ($i = 0; $i < $bl1->count(); $i++) {
        echo "\nBookList1" . $bl1->get($i) . PHP_EOL;
    }

    
    $bl2 = new BookList(array());
    echo "Количество книг в списке: " . $bl2->count() . PHP_EOL;

   
    $bl2->load("Booklist.bin");
    echo "Количество книг в списке: " . $bl2->count() . PHP_EOL;
    for ($i = 0; $i < $bl2->count(); $i++) {
        echo "\nBooklist2" . $bl2->get($i) . PHP_EOL;
    }
}