<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class HomeControllerTestTest extends TestCase
{
    private $mock;
    public function setUp()
    {
        parent::setUp();

        $this->mock = $this->mock('App\Libs\Repositories\UserInterface');
    }

    public function mock($class)
    {
        $mock = Mockery::mock($class);

        $this->app->instance($class, $mock);

        return $mock;
    }

    /**
     * Test index() action in home controller.
     * Using Mockery to test the controller return a  View and has a variable assigned
     *
     * @return void
     */
    public function testIndex()
    {
        //Mock contact
        $mockContact = new stdClass();
        $mockContact->id = 1;
        $mockContact->contactname = 'test name';
        $mockContact->shortphonenumber = 134987156;

        $this->mock
            ->shouldReceive('getTopContacts')
            ->once()
            ->andReturn([$mockContact]);
        //Mock authenticated user
        $user = new User(['id', 1]);
        $this->be($user);

        $this->call('GET', 'home');
        $this->assertViewHas('contacts');
    }

    public function tearDown()
    {
        Mockery::close();
    }
}
