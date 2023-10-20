<?php
namespace App\Http\Controllers;
class UsersController extends Controller
{
    /**
    * Create a new controller instance.
    * @return void
    */
    public function __construct()
    {
        //
    }
    
    // 2. Silahkan anda membuat routing seperti dibawah ini.
    public function getStatus()
    {
        return response()->json([
            'service name' => 'PHP Running Serve',
            'status' => 'Running'
        ]);
    }
    public function getUsers()
    {
        $users = [
            [
                'id' => 1,
                'name' => 'Sumatrana',
                'email' => 'sumatrana@gmail.com',
                'address' => 'Padang',
                'gender' => 'Laki-laki'
            ],
            [
                'id' => 2,
                'name' => 'Jawarianto',
                'email' => 'jawarianto@gmail.com', 
                'address' => 'Cimahi',
                'gender' => 'Laki-laki',
            ],
            [
                'id' => 3,
                'name' => 'Kalimatanio',
                'email' => 'kalimatanio@gmail.com',
                'address' => 'Samarinda', 
                'gender' => 'Laki-laki',
            ],
            [
                'id' => 4,
                'name' => 'Sulawesiani',
                'email' => 'sulawesiani@gmail.com',
                'address' => 'Makassar',
                'gender' => 'Perempuan',
            ],
            [
                'id' => 5,
                'name' => 'Papuani',
                'email' => 'papuani@gmail.com',
                'address' => 'Jayapura',
                'gender' => 'Perempuan',
            ],
        ];        
        return response()->json($users);
    }
    public function getUsersById($userId)
    {
        $user = $this->findUsersById($userId);

        if ($user) {
            return response()->json($user);
        } else {
            return response()->json(['message' => 'Pengguna tidak ditemukan'], 404);
        }
    }
    private function findUsersById($userId)
    {
        $users = [
            [
                'id' => 1,
                'name' => 'Sumatrana',
                'email' => 'sumatrana@gmail.com',
                'address' => 'Padang',
                'gender' => 'Laki-laki'
            ],
            [
                'id' => 2,
                'name' => 'Jawarianto',
                'email' => 'jawarianto@gmail.com', 
                'address' => 'Cimahi',
                'gender' => 'Laki-laki',
            ],
            [
                'id' => 3,
                'name' => 'Kalimatanio',
                'email' => 'kalimatanio@gmail.com',
                'address' => 'Samarinda', 
                'gender' => 'Laki-laki',
            ],
            [
                'id' => 4,
                'name' => 'Sulawesiani',
                'email' => 'sulawesiani@gmail.com',
                'address' => 'Makassar',
                'gender' => 'Perempuan',
            ],
            [
                'id' => 5,
                'name' => 'Papuani',
                'email' => 'papuani@gmail.com',
                'address' => 'Jayapura',
                'gender' => 'Perempuan',
            ],
        ];

        foreach ($users as $user) {
            if ($user['id'] == $userId) {
                return $user;
            }
        }
        
        return null;
    }
}