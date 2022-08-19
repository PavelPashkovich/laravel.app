<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
//    public function test_example()
//    {
//        User::factory()->count(5)->create();
//        $this->assertDatabaseHas('users', [
//            'id' => 1,
//        ]);
//    }

//    public function test_create_user() {
//        User::create([
//            'email' => 'ololo@prod.ru',
//            'name' => 'ghjvmh',
//            'password' => 123,
//        ]);
//
//        $this->assertDatabaseHas('users', [
//            'email' => 'ololo@prod.ru',
//        ]);
//    }
//
//    public function test_delete_user() {
//        User::factory()->count(5)->create();
//        $user = User::find(1);
//        $user->delete();
//        $this->assertDeleted($user);
//    }


    /**
     * @param $expected
     * @param $data
     * @dataProvider provideCreateUserData2
     */
    public function test_create_user2($expected, $data){
        $data = trim($data);
        $this->assertSame($data, $expected);
    }

    public function provideCreateUserData2() {
        return [
            [
                'Hello World',
                ' Hello World',
            ],
            [
                'Hello World',
                " Hello World \n",
            ],
        ];
    }

}
