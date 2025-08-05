<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use LdapRecord\Models\ActiveDirectory\User as BaseLdapUser;
use App\Models\User as EloquentUser;
use Illuminate\Support\Str;

class UserLdap extends BaseLdapUser
{
     public function createEloquentModel(){

        return new EloquentUser(); 

    }

    public function syncWithEloquent($user){

        // Mapeo correcto de campos según tu estructura de tabla
        $user->name = $this->getFirstAttribute('givenname');
        $user->username = $this->getFirstAttribute('samaccountname');
        $user->lastName = $this->getFirstAttribute('sn'); 
        // $user->email = $this->getFirstAttribute('mail');
        $user->email = $this->getFirstAttribute('mail')
            ?? $this->getFirstAttribute('userprincipalname')
            ?? $this->generateTempEmail();
        $user->guid = $this->getConvertedGuid();
        
        // Campos adicionales específicos de tu aplicación
        $user->departamentoId = $this->getDepartmentId();
        $user->tipo_usuario = 'Acodeco';
        $user->estatus = 'Activo';
        
        $user->save();

    }

    protected function generateTempEmail(): string{

        return Str::slug($this->getFirstAttribute('cn')).'@ldap.temp';

    }

    protected function generateLdapCode(): string{

        return 'LDAP'.time().rand(100, 999);

    }

    protected function getDepartmentId(): ?int {

        $dept = $this->getFirstAttribute('department');
        return $dept ? (int)$dept : null;

    }

    protected function getRoleId(): ?int{

        $groups = $this->getAttribute('memberof') ?? [];

        return 3; // Valor por defecto

    }

    public static function findByUsername($username){

        return static::where('samaccountname', $username)->first();

    }

    public static function findByEmail($email) {
        return static::where('mail', $email)->first();

    }
}
