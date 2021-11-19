<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    MainController,
    SobreController,
    ContatoController
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
*/


Route::get('/', [MainController::class, 'main'])->name('site.index');

Route::get('/sobre', [SobreController::class, 'sobre'])->name('site.sobre');

Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');

Route::get('/login', function () {return 'login';})->name('site.login');



Route::prefix('/app')->group(function () {

    Route::get('/clientes', function () {
        return 'clientes';})->name('app.clientes');


    Route::get('/fornecedores', function () {
        return 'fornecedores';})->name('app.fornecedoresx');


    Route::get('/produtos', function () {
        return 'produtos';})->name('app.produtos');
    });

    Route::get('/rota1', function () {
        echo 'rota1';
    })->name('site.rota1');

    Route::get('/rota2', function () {
        return redirect()->route('site.rota1');})->name('site.rota2');

/*  Redirect
    Route::get('/rota1', function () {
       echo 'rota1';})->name('site.rota1');
    Route::redirect('/rota3', '/rota1');
 */

 Route::fallback(function () {
 echo 'A rota acessada não existe. <a href="' . route('site.index') . '"> Voltar a Home</a>';
 });







/* Rotas com parametros*/
/* Route::get(
    '/contato/{nome}/{categoria}/{assunto}/{contato}',
    function (string $nome, string $categoria, string $assunto, string $contato) {
        echo 'Aqui é o ' . $nome .
            ' minha categoria é dos ' . $categoria .
            ' eu falo sobre ' . $assunto .
            ' e meu contato é ' . $contato;
    }
); */


/* Rotas opcionais */
/* Route::get(
    '/contato/{nome?}/{categoria?}/{assunto?}/{mensagem?}',
    function (
        string $nome = 'Desconhecido',
        string $categoria = 'Informação',
        string $assunto = 'Contato',
        string $mensagem = 'Contato não informado'
    ) {
        echo 'Aqui é o ' . $nome .
            ' minha categoria é dos ' . $categoria .
            ' eu falo sobre ' . $assunto .
            ' e meu contato é ' . $mensagem;
    }
); */
/*


Rotas com interpolação */
/* Route::get(
    '/contato/{nome}/{categoria_id}',
    function (
        string $nome = 'Desconhecido',
        int $categoria_id = 1,

    ) {
        echo "Aqui $nome - $categoria_id";
    }
)->where('categoria_id','[0-9]+')->where('nome','[A-Za-z]+');
 */

