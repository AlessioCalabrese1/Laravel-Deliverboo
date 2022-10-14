<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=[
            [
                'name'=> 'boolean',
                'email'=> 'deliveboo1@ciao.com',
                'password'=> Hash::make('team4'),
                'p_iva'=>'39829432912',
                'role'=> 1,
                'profilePic'=> 'https://wips.plug.it/cips/notizie.virgilio.it/cms/2022/07/pippo-franco-ricoverato-ictus.jpg',
            ],

            [
                'name'=> 'boolean',
                'email'=> 'deliveboo2@ciao.com',
                'password'=> Hash::make('team4'),
                'p_iva'=>'39824932456',
                'role'=> 1,
                'profilePic'=> 'https://upload.wikimedia.org/wikipedia/commons/5/5a/John_Doe%2C_born_John_Nommensen_Duchac.jpg',
            ],

            [
                'name'=> 'boolean',
                'email'=> 'deliveboo3@ciao.com',
                'password'=> Hash::make('team4'),
                'p_iva'=>'32798427989',
                'role'=> 1,
                'profilePic'=> 'https://static.wikia.nocookie.net/villains/images/1/1f/BCS_S4_Gustavo_Fring.jpg/revision/latest?cb=20180828045024',
            ],

        ];

        foreach ($users as $user) {

            $newUser = new User();

            $newUser->name = $user['name'];
            $newUser->email = $user['email'];
            $newUser->password= $user['password'];
            $newUser->p_iva = $user['p_iva'];
            $newUser->role = $user['role'];
            $newUser->profilePic = $user['profilePic'];

            $newUser->save();
        };
    }

}
