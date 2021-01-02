<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // resetea el cache el los roles y permisos
        app()['cache']->forget('spatie.permission.cache');

        /// crea los permisos para el crud del roles
        Permission::create(['name' => 'create_rol', 'module' => 'Roles', 'description' => 'Permite crear un rol']);
        Permission::create(['name' => 'read_rol', 'module' => 'Roles', 'description' => 'Permite ver un rol']);
        Permission::create(['name' => 'update_rol', 'module' => 'Roles', 'description' => 'Permite modificar un rol']);
        Permission::create(['name' => 'destroy_rol', 'module' => 'Roles', 'description' => 'Permite eliminar un rol']);

        /// crea los permisos para el crud del usuario
        Permission::create(['name' => 'create_user', 'module' => 'Usuarios', 'description' => 'Permite crear un usuario']);
        Permission::create(['name' => 'read_user', 'module' => 'Usuarios', 'description' => 'Permite ver un usuario']);
        Permission::create(['name' => 'update_user', 'module' => 'Usuarios', 'description' => 'Permite modificar un usuario']);
        Permission::create(['name' => 'destroy_user', 'module' => 'Usuarios', 'description' => 'Permite eliminar un usuario']);

        /// crea los permisos para el crud delas locations
        Permission::create(['name' => 'create_location', 'module' => 'Ubicaciones', 'description' => 'Permite crear una ubicación']);
        Permission::create(['name' => 'read_location', 'module' => 'Ubicaciones', 'description' => 'Permite leer una ubicación']);
        Permission::create(['name' => 'update_location', 'module' => 'Ubicaciones', 'description' => 'Permite modificar una ubicación']);
        Permission::create(['name' => 'destroy_location', 'module' => 'Ubicaciones', 'description' => 'Permite eliminar una ubicación']);

        /// crea los permisos para el crud de los enclosures
        Permission::create(['name' => 'create_enclosure', 'module' => 'Recintos', 'description' => 'Permite crear un recinto']);
        Permission::create(['name' => 'read_enclosure', 'module' => 'Recintos', 'description' => 'Permite leer un recinto']);
        Permission::create(['name' => 'update_enclosure', 'module' => 'Recintos', 'description' => 'Permite modificar un recinto']);
        Permission::create(['name' => 'destroy_enclosure', 'module' => 'Recintos', 'description' => 'Permite eliminar un recinto']);

        //permisos para las organization
        Permission::create(['name' => 'create_organization', 'module' => 'Organización', 'description' => 'Permite crear una organización']);
        Permission::create(['name' => 'read_organization', 'module' => 'Organización', 'description' => 'Permite leer una organización']);
        Permission::create(['name' => 'update_organization', 'module' => 'Organización', 'description' => 'Permite modificar una organización']);
        Permission::create(['name' => 'destroy_organization', 'module' => 'Organización', 'description' => 'Permite eliminar una organización']);

        //permisos para las candidatos
        Permission::create(['name' => 'create_candidate', 'module' => 'Candidatos', 'description' => 'Permite crear un candidato']);
        Permission::create(['name' => 'read_candidate', 'module' => 'Candidatos', 'description' => 'Permite leer un candidato']);
        Permission::create(['name' => 'update_candidate', 'module' => 'Candidatos', 'description' => 'Permite modificar un candidato']);
        Permission::create(['name' => 'destroy_candidate', 'module' => 'Candidatos', 'description' => 'Permite eliminar un candidato']);

        //permisos para las positions
        Permission::create(['name' => 'create_position', 'module' => 'Cargo', 'description' => 'Permite crear un cargo']);
        Permission::create(['name' => 'read_position', 'module' => 'Cargo', 'description' => 'Permite leer un cargo']);
        Permission::create(['name' => 'update_position', 'module' => 'Cargo', 'description' => 'Permite modificar un cargo']);
        Permission::create(['name' => 'destroy_position', 'module' => 'Cargo', 'description' => 'Permite eliminar un cargo']);

        //permisos para las elecciones
        Permission::create(['name' => 'create_election', 'module' => 'Elecciones', 'description' => 'Permite crear una elección']);
        Permission::create(['name' => 'read_election', 'module' => 'Elecciones', 'description' => 'Permite leer una elección']);
        Permission::create(['name' => 'update_election', 'module' => 'Elecciones', 'description' => 'Permite modificar una elección']);
        Permission::create(['name' => 'destroy_election', 'module' => 'Elecciones', 'description' => 'Permite eliminar una eleción']);

        //permisos para las configuraciones
        Permission::create(['name' => 'create_setting', 'module' => 'Configuraciones', 'description' => 'Permite crear un configuraciones']);
        Permission::create(['name' => 'read_setting', 'module' => 'Configuraciones', 'description' => 'Permite leer un configuraciones']);
        Permission::create(['name' => 'update_setting', 'module' => 'Configuraciones', 'description' => 'Permite modificar un configuraciones']);
        Permission::create(['name' => 'destroy_setting', 'module' => 'Configuraciones', 'description' => 'Permite eliminar un configuraciones']);





        /// creamos los roles para que son superadmin
        $role = Role::create(['name' => 'SuperAdmin', 'description'=>'Todos los provilegios','status' => 1]);
        $role->givePermissionTo(Permission::all());
        //role de digitador
        $role = Role::create(['name' => 'Digitador', 'description'=>'Para digitadores','status' => 1]);
        //role admin
        $role = Role::create(['name' => 'Administrador', 'description'=>'Permisos de administrador','status' => 1]);
        $role->givePermissionTo(Permission::all());
        
        //role moderador
        $role = Role::create(['name' => 'Moderador', 'description'=>'Auxiliar de administración','status' => 1]);

        

        ///crearmos el usario por defecto
        $user_password = Hash::make('Elecciones2021');
        $user = User::create([
            'name' => 'SuperAdmin',
            'last_name' => 'Proviliegios',
            'username' => 'superadmin',
            'status' => 1,
            'avatar' => 'assets/images/superadmin.png',
            'email' => 'superadmin@gmail.com',
            'password' => $user_password]);
        $user->assignRole('SuperAdmin');

        ///crearmos el usario por defecto
        $user_password = Hash::make('root1234');
        $user = User::create([
            'name' => 'Admin',
            'last_name' => 'Usuario',
            'username' => 'admin',
            'status' => 1,
            'avatar' => 'assets/images/user.png',
            'email' => 'admin@gmail.com',
            'password' => $user_password]);
        $user->assignRole('Administrador');
    }
}
