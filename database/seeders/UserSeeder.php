<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name' => 'Admin', 'email' => 'admin123@root.com', 'password' => Hash::make('admin123'), 'role' => 'Root', 'status' => 1]);
        User::create(['name' => 'Pegawai', 'email' => 'pegawai123@gmail.com', 'password' => Hash::make('pegawai123'), 'role' => 'Admin', 'status' => 1]);
        // User::create(['name' => 'Deni Kurniawan', 'email' => 'deni1234@gmail.com', 'password' => Hash::make('deni1234'), 'role' => 'Admin', 'status' => 1]);
        // User::create(['name' => 'Yanto Gaming', 'email' => 'yanto1234@gmail.com', 'password' => Hash::make('yanto1234'), 'role' => 'Admin', 'status' => 1]);
        // User::create(['name' => 'Dendi Sakalangkong', 'email' => 'dendi1234@gmail.com', 'password' => Hash::make('dendi1234'), 'role' => 'Admin', 'status' => 1]);
        // User::create(['name' => 'Robby Masyallah', 'email' => 'robby123@gmail.com', 'password' => Hash::make('robby123'), 'role' => 'Admin', 'status' => 1]);

        // User::create(['name' => 'Yadi Ermanu', 'email' => 'yadi1234@gmail.com', 'password' => Hash::make('yadi1234'), 'role' => 'Admin', 'status' => 1]);
        // User::create(['name' => 'Dono Mulawarman', 'email' => 'dono123@gmail.com', 'password' => Hash::make('dono123'), 'role' => 'Admin', 'status' => 1]);
        // User::create(['name' => 'Jojon su Jijin', 'email' => 'jojon123@gmail.com', 'password' => Hash::make('jojon123'), 'role' => 'Admin', 'status' => 1]);
        // User::create(['name' => 'Yeni Inka', 'email' => 'yeni1234@gmail.com', 'password' => Hash::make('yeni1234'), 'role' => 'Admin', 'status' => 1]);
        // User::create(['name' => 'Asmaul Husna', 'email' => 'maul1234@gmail.com', 'password' => Hash::make('maul1234'), 'role' => 'Admin', 'status' => 1]);

        // User::create(['name' => 'Minto Sujagat', 'email' => 'minto123@gmail.com', 'password' => Hash::make('minto123'), 'role' => 'Admin', 'status' => 1]);
        // User::create(['name' => 'Didin Mulani', 'email' => 'didin123@gmail.com', 'password' => Hash::make('didin123'), 'role' => 'Admin', 'status' => 1]);
    }
}
