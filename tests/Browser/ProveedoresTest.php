<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ProveedoresTest extends DuskTestCase
{
    public function testIndex()
    {
        $admin = App\Models\User::find(1);
        $this->browse(function (Browser $browser) use ($admin) {
            $browser->loginAs($admin);
            $browser->visit(route('admin.proveedores.index'));
            $browser->assertRouteIs('admin.proveedores.index');
        });
    }
}
