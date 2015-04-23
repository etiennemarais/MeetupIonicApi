<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $bindings = [
        'Askme\Domain\Questions\QuestionsRepository' => 'Askme\Core\Questions\QuestionsRepository',
    ];

    /**
     * Bootstrap any application repositories.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application repositories.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->bindings as $interface => $repository) {
            $this->app->bind($interface, $repository);
        }
    }
}
