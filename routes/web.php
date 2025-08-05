<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*use App\Http\Controllers\Dist\DepartamentoController;
use App\Http\Controllers\Dist\TipoatencionController;
use App\Http\Controllers\Dist\PosicionesController;
use App\Http\Controllers\Dist\ColaboradoresController;
use App\Http\Controllers\Dist\DashboardController;
use App\Http\Controllers\Dist\SolicitudController; */

use App\Http\Controllers\Dist\{
    DashboardController,
    SolicitudController,
    DepartamentoController,
    TipoatencionController,
    PosicionesController,
    ColaboradoresController,
    MotivoController,
    SubmotivoController,
    PerfilController,
    ReporteController
};



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
    Route::get('/', function () {
        return view('welcome');
    }); 


*/



Route::middleware('guest')->group(function () {
    Route::get('/', [AuthenticatedSessionController::class, 'create'])
    ->name('login');
    });


    Route::middleware('auth')->group(function () {

    

        //dashboard

        // Route::get('/dashboard', function () {
        //     return view('dashboard');
        // })->middleware(['auth'])->name('dashboard');

        Route::prefix('dist/perfil')->name('perfil.')->group(function () {
            Route::get('/editar', [PerfilController::class, 'Editar'])->name('Editar');
            Route::post('/editar', [PerfilController::class, 'PostEditar'])->name('PostEditar');
        });


        Route::get('dashboard', [DashboardController::class, 'Dashboard']) ->name('Dashboard');  

        Route::get('dist/reporte/atencion', [ReporteController::class, 'Atencion']) ->name('Atencion');  

        // Route::get('dist/dashboard', [DashboardController::class, 'Index']) ->name('Index');  
        // Route::get('dist/dashboard/listado', [DashboardController::class, 'PostIndex']) ->name('PostIndex');  

        Route::prefix('dist/dashboard')->name('dashboard.')->group(function () {
            Route::get('/', [DashboardController::class, 'Index'])->name('index');
            Route::get('/listado', [DashboardController::class, 'PostIndex'])->name('postIndex');
        });

        // SOLICITUD
        Route::prefix('dist/solicitud')->name('solicitud.')->group(function () {
            Route::get('/', [SolicitudController::class, 'Index'])->name('index');
            Route::post('/', [SolicitudController::class, 'PostIndex'])->name('postIndex');
            Route::get('/nuevo', [SolicitudController::class, 'Nuevo'])->name('nuevo');
            Route::post('/nuevo', [SolicitudController::class, 'PostNuevo'])->name('postNuevo');
            Route::get('/editar/{Id}', [SolicitudController::class, 'Editar'])->name('editar');
            Route::post('/editar/{Id}', [SolicitudController::class, 'PostEditar'])->name('postEditar');
            Route::get('/mostrar/{Id}', [SolicitudController::class, 'Mostrar'])->name('mostrar');
            Route::post('/desactivar', [SolicitudController::class, 'Desactivar'])->name('desactivar');

            Route::post('/nuevo/buscatipoatencion', [SolicitudController::class, 'postBuscatipoatencion'])->name('buscatipoatencion');
            Route::post('/nuevo/buscamotivo', [SolicitudController::class, 'postBuscamotivo'])->name('buscamotivo');
        });

        Route::prefix('dist/missolicitudes')->name('missolicitudes.')->group(function () {
            Route::get('/{Id}', [SolicitudController::class, 'Missolicitudes'])->name('index');
            Route::post('/{Id}', [SolicitudController::class, 'PostMissolicitudes'])->name('post');
        });

        // DEPARTAMENTO
        Route::prefix('dist/departamento')->name('departamento.')->group(function () {
            Route::get('/', [DepartamentoController::class, 'Index'])->name('index');
            Route::post('/', [DepartamentoController::class, 'PostIndex'])->name('postIndex');
            Route::get('/nuevo', [DepartamentoController::class, 'Nuevo'])->name('nuevo');
            Route::post('/nuevo', [DepartamentoController::class, 'PostNuevo'])->name('postNuevo');
            Route::get('/editar/{Id}', [DepartamentoController::class, 'Editar'])->name('editar');
            Route::post('/editar/{Id}', [DepartamentoController::class, 'PostEditar'])->name('postEditar');
            Route::get('/mostrar/{Id}', [DepartamentoController::class, 'Mostrar'])->name('mostrar');
            Route::post('/desactivar', [DepartamentoController::class, 'Desactivar'])->name('desactivar');
        });

        // TIPO ATENCIÓN
        Route::prefix('dist/tipoatencion')->name('tipoatencion.')->group(function () {
            Route::get('/', [TipoatencionController::class, 'Index'])->name('index');
            Route::post('/', [TipoatencionController::class, 'PostIndex'])->name('postIndex');
            Route::get('/nuevo', [TipoatencionController::class, 'Nuevo'])->name('nuevo');
            Route::post('/nuevo', [TipoatencionController::class, 'PostNuevo'])->name('postNuevo');
            Route::get('/editar/{Id}', [TipoatencionController::class, 'Editar'])->name('editar');
            Route::post('/editar/{Id}', [TipoatencionController::class, 'PostEditar'])->name('postEditar');
            Route::get('/mostrar/{Id}', [TipoatencionController::class, 'Mostrar'])->name('mostrar');
            Route::post('/desactivar', [TipoatencionController::class, 'Desactivar'])->name('desactivar');
        });

        // MOTIVO
        Route::prefix('dist/motivo')->name('motivo.')->group(function () {
            Route::get('/', [MotivoController::class, 'Index'])->name('index');
            Route::post('/', [MotivoController::class, 'PostIndex'])->name('postIndex');
            Route::get('/nuevo', [MotivoController::class, 'Nuevo'])->name('nuevo');
            Route::post('/nuevo', [MotivoController::class, 'PostNuevo'])->name('postNuevo');
            Route::get('/editar/{Id}', [MotivoController::class, 'Editar'])->name('editar');
            Route::post('/editar/{Id}', [MotivoController::class, 'PostEditar'])->name('postEditar');
            Route::get('/mostrar/{Id}', [MotivoController::class, 'Mostrar'])->name('mostrar');
            Route::post('/desactivar', [MotivoController::class, 'Desactivar'])->name('desactivar');
        });

        // SUBMOTIVO
        Route::prefix('dist/submotivo')->name('submotivo.')->group(function () {
            Route::get('/', [SubmotivoController::class, 'Index'])->name('index');
            Route::post('/', [SubmotivoController::class, 'PostIndex'])->name('postIndex');
            Route::get('/nuevo', [SubmotivoController::class, 'Nuevo'])->name('nuevo');
            Route::post('/nuevo', [SubmotivoController::class, 'PostNuevo'])->name('postNuevo');
            Route::get('/editar/{Id}', [SubmotivoController::class, 'Editar'])->name('editar');
            Route::post('/editar/{Id}', [SubmotivoController::class, 'PostEditar'])->name('postEditar');
            Route::get('/mostrar/{Id}', [SubmotivoController::class, 'Mostrar'])->name('mostrar');
            Route::post('/desactivar', [SubmotivoController::class, 'Desactivar'])->name('desactivar');
        });

        // POSICIONES
        Route::prefix('dist/posiciones')->name('posiciones.')->group(function () {
            Route::get('/', [PosicionesController::class, 'Index'])->name('index');
            Route::post('/', [PosicionesController::class, 'PostIndex'])->name('postIndex');
            Route::get('/nuevo', [PosicionesController::class, 'Nuevo'])->name('nuevo');
            Route::post('/nuevo', [PosicionesController::class, 'PostNuevo'])->name('postNuevo');
            Route::get('/editar/{Id}', [PosicionesController::class, 'Editar'])->name('editar');
            Route::post('/editar/{Id}', [PosicionesController::class, 'PostEditar'])->name('postEditar');
            Route::get('/mostrar/{Id}', [PosicionesController::class, 'Mostrar'])->name('mostrar');
            Route::post('/desactivar', [PosicionesController::class, 'Desactivar'])->name('desactivar');
        });

        // COLABORADORES
        Route::prefix('dist/colaboradores')->name('colaboradores.')->group(function () {
            Route::get('/', [ColaboradoresController::class, 'Index'])->name('index');
            Route::post('/', [ColaboradoresController::class, 'PostIndex'])->name('postIndex');
            Route::get('/nuevo', [ColaboradoresController::class, 'Nuevo'])->name('nuevo');
            Route::post('/nuevo', [ColaboradoresController::class, 'PostNuevo'])->name('postNuevo');
            Route::get('/editar/{Id}', [ColaboradoresController::class, 'Editar'])->name('editar');
            Route::post('/editar/{Id}', [ColaboradoresController::class, 'PostEditar'])->name('postEditar');
            Route::get('/mostrar/{Id}', [ColaboradoresController::class, 'Mostrar'])->name('mostrar');
            Route::post('/desactivar', [ColaboradoresController::class, 'Desactivar'])->name('desactivar');

            Route::post('/nuevo/buscadistrito', [ColaboradoresController::class, 'postBuscadistrito'])->name('buscadistrito');
            Route::post('/nuevo/buscaposiciones', [ColaboradoresController::class, 'postBuscaposiciones'])->name('buscaposiciones');
        });

        /*Route::get('dist/organizacion/importar', [OrganizacionController::class, 'Importar']) ->name('Importar'); 
        Route::post('dist/organizacion/importar', [OrganizacionController::class, 'PostImportar']) ->name('PostImportar'); 
*/

    });


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
