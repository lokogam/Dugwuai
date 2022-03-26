<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Rolseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Supervisor']);
        $role3 = Role::create(['name' => 'Usuario']);

        permission::create(['name' => 'rol.index',
                            'descripcion' =>'roles'])->syncRoles($role1);
        permission::create(['name' => 'permisos.index',
                            'descripcion' =>'permisos'])->syncRoles($role1);

        permission::create(['name' => 'perfil.index',
                            'descripcion' =>'ver perfil'])->syncRoles([$role1,$role2,$role3]);

        permission::create(['name' => 'usuario.export',
                            'descripcion' =>'exportar a excel'])->syncRoles([$role1,$role2]);
        permission::create(['name' => 'usuario.exportpdf',
                            'descripcion' =>'exportar a pdf'])->syncRoles([$role1,$role2]);

        permission::create(['name' => 'usuario.index',
                            'descripcion' =>'ver usuarios'])->syncRoles([$role1,$role2,$role3]);
        permission::create(['name' => 'usuario.create',
                            'descripcion' =>'crear usuarios'])->syncRoles($role1);
        permission::create(['name' => 'usuario.edit',
                            'descripcion' =>'editar usuario'])->syncRoles([$role1,$role2]);
        permission::create(['name' => 'usuario.destroy',
                            'descripcion' =>'eliminar usuario'])->syncRoles([$role1,$role2,]);
    }
}
