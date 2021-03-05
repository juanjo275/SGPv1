<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Bancos
    Route::delete('bancos/destroy', 'BancosController@massDestroy')->name('bancos.massDestroy');
    Route::resource('bancos', 'BancosController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Tipo Cuenta Bancaria
    Route::delete('tipo-cuenta-bancaria/destroy', 'TipoCuentaBancariaController@massDestroy')->name('tipo-cuenta-bancaria.massDestroy');
    Route::resource('tipo-cuenta-bancaria', 'TipoCuentaBancariaController');

    // Cuenta Bancaria
    Route::delete('cuenta-bancaria/destroy', 'CuentaBancariaController@massDestroy')->name('cuenta-bancaria.massDestroy');
    Route::resource('cuenta-bancaria', 'CuentaBancariaController');

    // Estado Documento Comercials
    Route::delete('estado-documento-comercials/destroy', 'EstadoDocumentoComercialController@massDestroy')->name('estado-documento-comercials.massDestroy');
    Route::resource('estado-documento-comercials', 'EstadoDocumentoComercialController');

    // Tipo Documento Comercials
    Route::delete('tipo-documento-comercials/destroy', 'TipoDocumentoComercialController@massDestroy')->name('tipo-documento-comercials.massDestroy');
    Route::resource('tipo-documento-comercials', 'TipoDocumentoComercialController');

    // Proveedores
    Route::delete('proveedores/destroy', 'ProveedoresController@massDestroy')->name('proveedores.massDestroy');
    Route::resource('proveedores', 'ProveedoresController');

    // Documento Comercials
    Route::delete('documento-comercials/destroy', 'DocumentoComercialController@massDestroy')->name('documento-comercials.massDestroy');
    Route::post('documento-comercials/media', 'DocumentoComercialController@storeMedia')->name('documento-comercials.storeMedia');
    Route::post('documento-comercials/ckmedia', 'DocumentoComercialController@storeCKEditorImages')->name('documento-comercials.storeCKEditorImages');
    Route::resource('documento-comercials', 'DocumentoComercialController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
