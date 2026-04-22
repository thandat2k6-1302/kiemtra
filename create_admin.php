<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Hash;

$email = 'admin@gmail.com';
$password = '123456';

$user = User::where('email', $email)->first();
if (!$user) {
    $user = new User();
    $user->full_name = 'Admin';
    $user->email = $email;
    $user->password = Hash::make($password);
    $user->level = 1;
    $user->save();
    echo "Admin user created successfully.\n";
} else {
    $user->level = 1;
    $user->save();
    echo "Admin user already exists, level updated to 1.\n";
}
