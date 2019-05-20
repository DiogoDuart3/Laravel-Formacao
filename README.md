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
