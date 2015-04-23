<?php namespace App\Http\Controllers;

use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Response;

class ApiController extends Controller
{
    /**
     * @param array $data
     *
     * @return mixed
     */
    protected function respondWithArray(array $data)
    {
        return Response::json([
            $data
        ], HttpResponse::HTTP_OK);
    }

    /**
     * @return mixed
     */
    protected function respondWithNotFound()
    {
        return Response::json([
            'status' => 'error',
            'data' => 'User Not found',
        ], HttpResponse::HTTP_NOT_FOUND);
    }

    /**
     * @param $errors
     *
     * @return mixed
     */
    protected function respondWithErrors($errors)
    {
        return Response::json([
            'status' => 'error',
            'data' => $errors,
        ], HttpResponse::HTTP_BAD_REQUEST);
    }

    /**
     * @param $data
     * @param $type
     *
     * @return mixed
     */
    protected function respondWithSuccess($data, $type)
    {
        $success = array_merge([
            'status' => 'success',
            'message' => 'User successfully ' . $type,
        ], $data);

        return $this->respondWithArray($success);
    }

    /**
     * @return mixed
     */
    protected function respondWithUnauthorized()
    {
        return Response::json([
            'status' => 'error',
            'message' => 'Unauthorized entry not permitted',
        ], HttpResponse::HTTP_UNAUTHORIZED);
    }
}