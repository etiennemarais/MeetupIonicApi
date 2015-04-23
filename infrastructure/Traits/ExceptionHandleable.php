<?php namespace Infrastructure\Traits;

use Exception;
use Illuminate\Contracts\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

trait ExceptionHandleable
{
    public function handle(Exception $exception)
    {
        if ($exception instanceof ValidationException) {
            throw new HttpException(
                Response::HTTP_BAD_REQUEST,
                $exception->getMessage()
            );
        } else if ($exception instanceof ModelNotFoundException) {
            $model = $exception->getModel();

            throw new HttpException(
                Response::HTTP_NOT_FOUND,
                'The ' . (new $model)->readable . ' you are looking for cannot be found'
            );
        }

        throw new HttpException(
            Response::HTTP_INTERNAL_SERVER_ERROR,
            $exception->getMessage()
        );
    }
}