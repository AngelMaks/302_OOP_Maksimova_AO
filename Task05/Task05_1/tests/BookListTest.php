<?php

namespace App\Tests;

use App\BookList;
use App\Book;
use PHPUnit\Framework\TestCase;

class BookListTest extends TestCase
{
    static $bl1;
    public static function setUpBeforeClass(): void
    {
        $b1 = new Book();
        $b1->setTitle("Герой нашего времени")
        ->setAuthors(array("М.Ю.Лермонтов"))
        ->setPublisher("Азбука")
        ->setYear(2016);

        $b2 = new Book();
        $b2->setTitle("На дне")
        ->setAuthors(array("М.Горький"))
        ->setPublisher("Эксмо")
        ->setYear(2021);

        $b3 = new Book();
        $b3->setTitle("Вишневый сад")
        ->setAuthors(array("А.П.Чехов"))
        ->setPublisher("АСТ")
        ->setYear(2009);

        self::$bl1 = new BookList(array($b1, $b2, $b3));
    }
    public function testRewind()
    {
        self::$bl1->rewind();
        self::$bl1->next();
        self::$bl1->next();
        self::$bl1->next();
        self::$bl1->rewind();
        $this->assertSame(
            self::$bl1->get(0),
            self::$bl1->current()
        );
    }
    public function testNext()
    {
        self::$bl1->next();
        $this->assertSame(
            self::$bl1->get(1),
            self::$bl1->current()
        );
        self::$bl1->next();
        $this->assertSame(
            self::$bl1->get(2),
            self::$bl1->current()
        );
    }
    public function testValid()
    {
        self::$bl1->rewind();
        $this->assertSame(
            true,
            self::$bl1->valid()
        );
        self::$bl1->next();
        $this->assertSame(
            true,
            self::$bl1->valid()
        );
        self::$bl1->next();
        $this->assertSame(
            true,
            self::$bl1->valid()
        );
        self::$bl1->next();
        $this->assertSame(
            false,
            self::$bl1->valid()
        );
    }
    public function testValue()
    {
        self::$bl1->rewind();
        $this->assertSame(
            self::$bl1->get(0),
            self::$bl1->current()
        );
        self::$bl1->next();
        $this->assertSame(
            self::$bl1->get(1),
            self::$bl1->current()
        );
        self::$bl1->next();
        $this->assertSame(
            self::$bl1->get(2),
            self::$bl1->current()
        );
    }
    public function testKey()
    {
        self::$bl1->rewind();
        $this->assertSame(
            self::$bl1->get(0)->getId(),
            self::$bl1->key()
        );
        self::$bl1->next();
        $this->assertSame(
            self::$bl1->get(1)->getId(),
            self::$bl1->key()
        );
        self::$bl1->next();
        $this->assertSame(
            self::$bl1->get(2)->getId(),
            self::$bl1->key()
        );
    }
}