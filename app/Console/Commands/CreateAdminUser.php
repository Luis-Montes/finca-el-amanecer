<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin 
                            {--name=Administrador : Nombre del administrador} 
                            {--email=admin@example.com : Correo electrónico} 
                            {--password=123456 : Contraseña por defecto} 
                            {--username=admin : Nombre de usuario (username)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea un usuario administrador en la base de datos';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->option('name');
        $email = $this->option('email');
        $password = $this->option('password');
        $username = $this->option('username');

        if (User::where('email', $email)->exists()) {
            $this->error("⚠️  Ya existe un usuario con el correo: $email");
            return;
        }

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'username' => $username,
            'telefono' => '0000000000',
            'direccion' => 'N/A',
            'password' => Hash::make($password),
            'role' => 'administrador',
        ]);

        $this->info("Usuario administrador creado correctamente.");
        $this->line("mail: {$user->email}");
        $this->line("Usuario: {$user->username}");
        $this->line("Contraseña: {$password}");
    }
}
