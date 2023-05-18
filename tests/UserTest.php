<?php

namespace Zubair\PhpTesting;

use PHPUnit\Framework\TestCase;

final class UserTest extends TestCase
{
    public function testClassConstructor()
    {
        $user = new User(18, 'John');

        $this->assertSame('John', $user->name);
        $this->assertSame(18, $user->age);
        $this->assertEmpty($user->favorite_movies);
    }

    public function testTellName()
    {
        $user = new User(18, 'John');

        $this->assertIsString($user->tellName());
        $this->assertStringContainsStringIgnoringCase('John', $user->tellName());
    }

    // The testAge method is very similar to testName and uses the same logic...or does it have to? ;)
    public function testTellAge()
    {
        $user = new User(18, 'John');

        $this->assertIsInt($user->tellAge());
        $this->assertEquals('18', $user->tellAge());
    }

    public function testAddFavoriteMovie()
    {
        $user = new User(18, 'John');

        $this->assertTrue($user->addFavoriteMovie('Avengers'));
        $this->assertContains('Avengers', $user->favorite_movies);
        $this->assertCount(1, $user->favorite_movies);
    }

    public function testRemoveFavoriteMovie()
    {
        $user = new User(18, 'John');

        $this->assertTrue($user->addFavoriteMovie('Avengers'));
        $this->assertTrue($user->addFavoriteMovie('Justice League'));

        $this->assertTrue($user->removeFavoriteMovie('Avengers'));
        $this->assertNotContains('Avengers', $user->favorite_movies);
        $this->assertCount(1, $user->favorite_movies);
    }
}
