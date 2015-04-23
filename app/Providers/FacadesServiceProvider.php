<?php namespace App\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class FacadesServiceProvider extends ServiceProvider
{
    private $converseFacades = [
        'Question' => 'Askme\Domain\Questions\QuestionsService',
    ];

    private $bindings = [
        'Askme\Domain\Questions\QuestionsService' => 'App\Services\Askme\Questions\QuestionsService',
    ];

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->bindings as $interface => $service) {
            $this->app->bind($interface, $service);
        }

        foreach ($this->converseFacades as $alias => $class) {
            $this->app->booting(function() use ($alias, $class)  {
                $loader = AliasLoader::getInstance();
                $loader->alias($alias, $class);
            });
        }
    }
}