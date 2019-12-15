<?php
use App\User;
use Illuminate\Database\Seeder;
//use Caffeinated\Shinobi\Models\Permission;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permiso1 = new Permission();
        $permiso1->name = "eliminar usuario";
        $permiso1->slug = "eliminar_usuario";
        $permiso1->description = "puede eliminar cualquier usuario en el sistema";
        $permiso1->save();

        $permiso2 = new Permission();
        $permiso2->name = "editar usuario";
        $permiso2->slug = "editar_usuario";
        $permiso2->description = "puede editar cualquier usuario en el sistema";
        $permiso2->save();

        $permiso3 = new Permission();
        $permiso3->name = "crear usuario";
        $permiso3->slug = "crear_usuario";
        $permiso3->description = "puede crear  cualquier usuario en el sistema";
        $permiso3->save();
    
        $permiso4 = new Permission();
        $permiso4->name = "ver usuario";
        $permiso4->slug = "ver_usuario";
        $permiso4->description = "puede ver todos los usario registrado";
        $permiso4->save();

        $permiso5 = new Permission();
        $permiso5->name = "eliminar rol";
        $permiso5->slug = "eliminar_rol";
        $permiso5->description = "puede eliminar cualquier rol en el sistema";
        $permiso5->save();

        $permiso6 = new Permission();
        $permiso6->name = "editar rol";
        $permiso6->slug = "editar_rol";
        $permiso6->description = "puede editar cualquier rol en el sistema";
        $permiso6->save();

        $permiso7 = new Permission();
        $permiso7->name = "crear rol";
        $permiso7->slug = "crear_rol";
        $permiso7->description = "puede crear cualquier rol en el sistema";
        $permiso7->save();
        
        $permiso8 = new Permission();
        $permiso8->name = "ver rol";
        $permiso8->slug = "ver_rol";
        $permiso8->description = "puede ver todos los rol registrado";
        $permiso8->save();

        $rol = Role::find(1);
        $rol->permissions()->attach($permiso1);
        $rol->permissions()->attach($permiso2);
        $rol->permissions()->attach($permiso3);
        $rol->permissions()->attach($permiso4);
        $rol->permissions()->attach($permiso5);
        $rol->permissions()->attach($permiso6);
        $rol->permissions()->attach($permiso7);
        $rol->permissions()->attach($permiso8);        
    }
}
