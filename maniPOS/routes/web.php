<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\produtocontroller;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\clientesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\relatoriosPedidosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */

Route::get('/dashboard',[DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [Profilecontroller::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [Profilecontroller::class, 'update'])->name('profile.update');
    Route::delete('/profile', [Profilecontroller::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Route::prefix('usuarios')->group(function(){
    Route::get('/', [UsuariosControlles::class, 'index'])->name('clientes.CadClientes');
}); */

/*==================================ROTAS DOS CLIENTES================================*/
Route::prefix('clientes')->group(function(){
    Route::get('/', [clientescontroller::class, 'index'])->name('clientes.index');
    Route::get('/create', [clientescontroller::class, 'create'])->name('clientes.create');
    Route::post('/', [clientescontroller::class, 'store'])->name('clientes.store');
    Route::get('/{id}/edit', [clientescontroller::class, 'edit'])->where('id', '[0-9]+')->name('clientes.edit');
    Route::put('/{id}', [clientescontroller::class, 'update'])->where('id', '[0-9]+')->name('clientes.update');
    Route::delete('/{id}', [clientescontroller::class, 'destroy'])->where('id', '[0-9]+')->name('clientes.destroy');    
}); 



/*==================================ROTAS DOS PRODUTOS================================*/
 Route::prefix('produtos')->group(function(){
    Route::get('/', [produtocontroller::class, 'index'])->name('produtos.index');
    Route::get('/create', [produtocontroller::class, 'create'])->name('produtos.create');
    Route::post('/', [produtocontroller::class, 'store'])->name('produtos.store');
    Route::get('/{id}/edit', [produtocontroller::class, 'edit'])->where('id', '[0-9]+')->name('produtos.edit');
    Route::put('/{id}', [produtocontroller::class, 'update'])->where('id', '[0-9]+')->name('produtos.update');
    Route::delete('/{id}', [produtocontroller::class, 'destroy'])->where('id', '[0-9]+')->name('produtos.destroy');
}); 




/*==================================ROTAS DOS PEDIDOS ================================*/
/* Route::get('/pedidos', [PedidosController::class, 'index'])->name('pedidos.index'); */
//
Route::prefix('pedidos')->group(function(){
    Route::get('/',[PedidoController::class,'index'])->name('pedidos.index');
    Route::post('/', [Pedidocontroller::class, 'store'])->name('pedidos.store');
   /*  Route::get('/{id}/edit', [Pedidocontroller::class, 'edit'])->where('id', '[0-9]+')->name('pedidos.edit'); */
   Route::delete('/{id}', [Pedidocontroller::class, 'destroy'])->where('id', '[0-9]+')->name('pedidos.destroy');
    Route::get('/{id}/edit', [Pedidocontroller::class, 'pdfhistorico'])->where('id', '[0-9]+')->name('pedidos.edit');
});

/*==================================ROTAS DOS RELATORIOS ================================*/

Route::prefix('relatorios')->group(function(){
    Route::get('/homepedidos',[relatoriosPedidosController::class,'index'])->name('relatorios.homepedidos');
    Route::get('/historicoPedidos',[relatoriosPedidosController::class,'pedidosHistorico'])->name('relatorios.historicoPedidos');
    Route::get('/pedidosDoDia',[relatoriosPedidosController::class,'pedidosDoDia'])->name('relatorios.pedidosDoDia');
    Route::get('/PdfDoDia',[relatoriosPedidosController::class,'PdfDoDia'])->name('relatorios.PdfDoDia');
    Route::get('/pratos',[relatoriosPedidosController::class,'QtdPratos'])->name('relatorios.pratos');
   
});