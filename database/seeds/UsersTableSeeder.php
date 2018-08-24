<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_records = array(
            array(
            	'name'		=> 'Dr Teguh',
            	'email'		=> 'maulanateguh87@gmail.com',
            	'username'	=> 'dr_teguh',
            	'password'	=> bcrypt('TeguhAdmin123'),
            	'status'	=> 2,
            	'status_show'	=> 1,
                'created_by'    => 1,
                'updated_by'    => 1,
                'created_at'	=> '2018-08-21 00:00:00',
                'updated_at'	=> '2018-08-21 00:00:00'
            ),
            array(
            	'name'		=> 'Fauzi',
            	'email'		=> 'fetruzie2@gmail.com',
            	'username'	=> 'fetruzie2@gmail.com',
            	'password'	=> bcrypt('getqwerty'),
            	'status'	=> 2,
            	'status_show'	=> 1,
                'created_by'    => 1,
                'updated_by'    => 1,
                'created_at'	=> '2018-08-21 00:00:00',
                'updated_at'	=> '2018-08-21 00:00:00'
            ),
            array(
            	'name'		=> 'Admin Riztafi',
            	'email'		=> 'admin@example.com',
            	'username'	=> 'admin',
            	'password'	=> bcrypt('admin'),
            	'status'	=> 2,
            	'status_show'	=> 2,
                'created_by'    => 1,
                'updated_by'    => 1,
                'created_at'	=> '2018-08-21 00:00:00',
                'updated_at'	=> '2018-08-21 00:00:00'
            ),
        );
        // insert record
        DB::table('users')->insert($data_records);
    }
}
