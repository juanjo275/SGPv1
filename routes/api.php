<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Bancos
    Route::apiResource('bancos', 'BancosApiController');

    // Tipo Cuenta Bancaria
    Route::apiResource('tipo-cuenta-bancaria', 'TipoCuentaBancariaApiController');

    // Cuenta Bancaria
    Route::apiResource('cuenta-bancaria', 'CuentaBancariaApiController');

    // Estado Documento Comercials
    Route::apiResource('estado-documento-comercials', 'EstadoDocumentoComercialApiController');

    // Tipo Documento Comercials
    Route::apiResource('tipo-documento-comercials', 'TipoDocumentoComercialApiController');

    // Proveedores
    Route::apiResource('proveedores', 'ProveedoresApiController');

    // Documento Comercials
    Route::post('documento-comercials/media', 'DocumentoComercialApiController@storeMedia')->name('documento-comercials.storeMedia');
    Route::apiResource('documento-comercials', 'DocumentoComercialApiController');
});
