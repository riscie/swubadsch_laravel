<?php

class RoutingTests extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testAuthRoutes()
	{
        $this->call('GET', '/auth/register');
        $this->assertResponseOk();

        $this->call('GET', '/auth/login');
        $this->assertResponseOk();

    }



    public function testPasswordRoutes()
    {
        $this->call('GET', '/password/email');
        $this->assertResponseOk();
    }


}
