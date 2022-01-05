<?php

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
use App\Cliente;
use App\Endereco;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clientes', function(){
    $clientes = Cliente::all();
    foreach ($clientes as $c){
        echo '<p>ID:'. $c->id . "</p>";
        echo '<p>Nome:'. $c->nome . "</p>";
        echo '<p>Nome:'. $c->telefone . "</p>";
        echo '<p>ID:'. $c->endereco->id . "</p>";
        echo '<p>Rua'. $c->endereco->rua . "</p>";
        echo '<p>Numero:'. $c->endereco->numero . "</p>";
        echo '<p>Bairro:'. $c->endereco->bairro . "</p>";
        echo '<p>Cidade'. $c->endereco->cidade . "<p>";
        echo '<p>Cidade'. $c->endereco->cidade . "<p>";
        echo '<p>Uf'. $c->endereco->uf . "<p>";
        echo '<p>cep'. $c->endereco->cep . "<p>";
        echo '<hr>';
    }
});


Route::get('/enderecos', function(){
    $enderecos = Endereco::all();
    foreach ($enderecos as $e){
        echo '<p>ID:'. $e->id . "</p>";
        echo '<p>Rua'. $e->rua . "</p>";
        echo '<p>Numero:'. $e->numero . "</p>";
        echo '<p>Bairro:'. $e->bairro . "</p>";
        echo '<p>Cidade'. $e->cidade . "<p>";
        echo '<p>Uf'. $e->uf . "<p>";
        echo '<p>cep'. $e->cep . "<p>";
        echo '<p>cliente' . $e->cliente->nome . "<p>";
        echo '<p>cliente' . $e->cliente->nome . "<p>";
        echo '<hr>';
    }
});

Route::get('/inserir', function(){
    $c = new Cliente();
    $c->nome = "Felipe";
    $c->telefone = "35765246";
    $c->save();
    $e = new Endereco();
    $e->rua = "Alfaneiros";
    $e->bairro = "Parque da Bandeiras";
    $e->numero = "450";
    $e->uf = "SP";
    $e->cidade = "SV";
    $e->cep = "12321312312332";
    $c->endereco()->save($e);

});

Route::get('clientes/json', function(){
    $clientes= Cliente::with(['endereco'])->get();
    //$clientes= Cliente::with(['endereco', 'outras tabelas'])->get();
    return $clientes->toJson();
});
