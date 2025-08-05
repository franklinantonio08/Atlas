<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use LdapRecord\Container;

class TestLdapConnection extends Command
{
    protected $signature = 'ldap:test';
    protected $description = 'Probar conexión LDAP';

    public function handle()
    {
        try {
            $ldap = Container::getDefaultConnection();
            $ldap->connect();
            $this->info('Conexión LDAP exitosa ✅');
        } catch (\Exception $e) {
            $this->error('Error de conexión LDAP: ' . $e->getMessage());
        }
    }
}
