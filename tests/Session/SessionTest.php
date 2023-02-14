<?php

use App\Support\Session\Session;
use PHPUnit\Framework\TestCase;

class SessionTest extends TestCase
{
    protected function setUp(): void
    {
        // init
    }

    public function testPutAndGet() {
        Session::resetSession();

        Session::put("a", 1);
        Session::put("b", "1");
        Session::put("", "2");
        Session::put(1, "3");

        $this->assertEquals(1, Session::get("a"));
        $this->assertEquals("1", Session::get("b"));
        $this->assertEquals("2", Session::get(""));
        $this->assertEquals("3", Session::get(1));
    }

    public function testPutAndGetFlash() {

        Session::resetSession();

        Session::putFlash("name1", "abc");
        Session::putFlash("name2", 123);
        Session::putFlash("name3", "", "alert-warning");

        $flashArray = Session::getFlash();

        $actualArray = [
            "name1" => [
                "message" => "abc",
                "color" => "alert-success"
            ],
            "name2" => [
                "message" => "123",
                "color" => "alert-success"
            ],
            "name3" => [
                "message" => "",
                "color" => "alert-warning"
            ],
        ];


        $this->assertEquals($actualArray, $flashArray);
    }

    public function testClearFlash() {
        Session::putFlash("name3", "", "alert-warning");
        Session::resetFlash();
        $this->assertEmpty(Session::getFlash());
    }

    protected function tearDown(): void
    {
        //down
        Session::resetSession();
    }
}