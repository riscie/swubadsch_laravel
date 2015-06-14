<?php

class RoutingTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testHomeRoute()
	{
        $this->call('GET', '/');
        $this->assertResponseOk();
	}

    public function testDatesRoute()
    {
        $this->call('GET', 'dates');
        $this->assertResponseOk();
    }

    public function testCommentsRoute()
    {
        $this->call('GET', 'comments');
        $this->assertResponseOk();
    }

    public function testAvatarssRoute()
    {
        $this->call('GET', 'avatars');
        $this->assertResponseOk();
    }

}
