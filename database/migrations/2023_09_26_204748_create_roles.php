<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('create_roles', function (Blueprint $table) {
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Distribuidor']);
        $role3 = Role::create(['name' => 'Limpieza']);
        $role4 = Role::create(['name' => 'RecursosHumanos']);
        $role5 = Role::create(['name' => 'EntradaPromocion']);
        $user = User::find(1);
        $user->assignRole($role1);
        $user = User::find(2);
        $user->assignRole($role2);
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('create_roles');
    }
};
