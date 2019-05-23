# Laravel-Formacao
## SoftDeletes
No model Post:
<br>

	Importar SoftDeletes;(fora da classe)
	Use SoftDeletes;(na class)
	protected $dates=['deleted_at'];(na class11:18 13/05/2019)
    
Criar migration para acrescentar coluna 'deleted_at'

	php artisan make:migration add_collumn_deleted_at_to_posts_table --table=Post
    
No ficheiro migration

	Na funçao up meter $table->softDeletes();
	Na down meter $table->dropColumn('deleted_at');
    
Refrescar a database e dar seed

	php artisan db:refresh --seed


Ler do trash:

Todos os registos e o trash:

	$curso = Curso::withTrashed()->where('id', 4)->get();
	return $curso();

Restaurar:

	$cursos = Curso::onlyTrashed()->where('id', 4;
	$cursos->restore();

Apagar permanentemente:

    Post::withTrashed()->where('id', 4)->forceDelete();


--CASCADING DELETE

    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    
								                                        'restrict' 

## Forms

•Collective Forms: Package para construção de Formulários

	composer require laravelcollective/html
    
•adicionar o provider no ficheiro config/app.php

•criar aliases no mesmo ficheiro:

	‘Form’=>Collective\Html\FormFacade::class,
	‘Html’=>Collective\Html\HtmlFacade::class
    
#### Exemplo:

        {!! Form::model($post,['method'=>'PATCH','action'=>['PostController@update',$post->id]]) !!}
        <div class="form-group">
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::textArea('body', null, ['class' => 'form-control']) !!}
        </div>
        @include('layouts.errors')
        {!! Form::submit('edit', ['class' => 'btn btn-sm btn-success']) !!}
        {!! Form::close() !!}

## Request

    php artisan make:request

meter ‘authorize’ a true e copiar as rules que estavam no controller;

No ‘PostController’, metodo store, injetar argumento a clasee criada (em vez de Request)

# Middleware

## Função terminate

• Permite executar código depois da resposta ser enviada

    class StartSession
    {
        public function handle($request, Closure $next)
        {
            return $next($request);
        }

        public function terminate($request, $response)
        {
            // Store the session data...
        }
    }
