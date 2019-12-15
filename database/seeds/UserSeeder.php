<?php

use Illuminate\Database\Seeder;
use App\User;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //CREACIÓN DE USUARIOS
        $user = new User();
        $user->nom_usu = 'Admin';
        $user->ape_usu = 'Admin';
        $user->email = 'admin@admin.com';
        $user->fecha_nac = '2000-03-08';
        $user->tel_usu = '76483633';
        $user->username = 'admin';

        $user->password = crypt('12345','');
        $user->save();
        
        $user2 = new User();
        $user2->nom_usu = 'María';
        $user2->ape_usu = 'Nogales';
        $user2->email = 'maria@gmail.com';
        $user2->fecha_nac = '1997-11-08';
        $user2->tel_usu = '4235221';
        $user2->username = 'maria';

        $user2->password = crypt('23456','');
        $user2->save();


        $user3 = new User();
        $user3->nom_usu = 'Jose';
        $user3->ape_usu = 'Apaza';
        $user3->email = 'jose@gmail.com';
        $user3->fecha_nac = '1997-03-08';
        $user3->tel_usu = '76789532';
        $user3->username = 'josee1';
      
        $user3->password = crypt('34567','');
        $user3->save();
        
        //CREACIÓN DE ROLES

        $rol = new Role();
        $rol->name = "administrador";
        $rol->slug = "administrador";
        $rol->description = "Tiene todos los permisos del sistema";
        $rol->save();

        $rol2 = new Role();
        $rol2->name = "psicologo";
        $rol2->slug = "psicologo";
        $rol2->description = "Tiene acceso al correo, puede leer las cartas, puede generar información a partir de una carta, le llegan notificaciones";
        $rol2->save();

        $rol3 = new Role();
        $rol3->name = "novelista";
        $rol3->slug = "novelista";
        $rol3->description = "Tiene acceso al correo, puede leer las cartas, puede generar información a partir de una carta";
        $rol3->save();

         $rol4 = new Role();
        $rol4->name = "editor";
        $rol4->slug = "editor";
        $rol4->description = "Tiene los permisos para crear y publicar boletines";
        $rol4->save();
         
        $user=User::find(1)->assignRole(1);
        $user=User::find(2)->assignRole(2);
        $user=User::find(3)->assignRole(4);

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

        $permiso9 = new Permission();
        $permiso9->name = "asignar rol";
        $permiso9->slug = "asignar_rol";
        $permiso9->description = "puede asignar rol a usuarios registrados";
        $permiso9->save();

        $permiso10 = new Permission();
        $permiso10->name = "asignar permiso";
        $permiso10->slug = "asignar_permiso";
        $permiso10->description = "puede asignar permisos a roles creados";
        $permiso10->save();

        $permiso11 = new Permission();
        $permiso11->name = "ver la lista de permisos";
        $permiso11->slug = "ver_lista_permisos";
        $permiso11->description = "puede ver la lista de los permisos existentes";
        $permiso11->save();

        $permiso12 = new Permission();
        $permiso12->name = "ver correo";
        $permiso12->slug = "ver_correo";
        $permiso12->description = "puede ver el correo, leer las cartas que enviaron los niños";
        $permiso12->save();
        $permiso13 = new Permission();
        $permiso13->name = "generar información a partir de una carta";
        $permiso13->slug = "generar_informacion";
        $permiso13->description = "puede generar nueva información a partir de una carta";
        $permiso13->save();
        $permiso14 = new Permission();
        $permiso14->name = "crear boletín";
        $permiso14->slug = "crear_boletin";
        $permiso14->description = "puede crear boletínes con todos sus datos correspondientes";
        $permiso14->save();

        $rol = Role::find(1);
        $rol->permissions()->attach($permiso1);
        $rol->permissions()->attach($permiso2);
        $rol->permissions()->attach($permiso3);
        $rol->permissions()->attach($permiso4);
        $rol->permissions()->attach($permiso5);
        $rol->permissions()->attach($permiso6);
        $rol->permissions()->attach($permiso7);
        $rol->permissions()->attach($permiso8);
        $rol->permissions()->attach($permiso9);
        $rol->permissions()->attach($permiso10);
        $rol->permissions()->attach($permiso11);
        $rol->permissions()->attach($permiso12);
        $rol->permissions()->attach($permiso13);
        $rol->permissions()->attach($permiso14);

        $rol2 = Role::find(2);
        $rol2->permissions()->attach($permiso12);
        $rol3 = Role::find(3);
        $rol3->permissions()->attach($permiso12);
        $rol4= Role::find(4);
        $rol4->permissions()->attach($permiso12);

    }
}
