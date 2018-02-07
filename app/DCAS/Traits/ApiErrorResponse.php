<?php

namespace DCAS\Traits;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as SymphonyResponse;

trait ApiErrorResponse
{
    /**
     * @var int
     */
    protected $statusCode = SymphonyResponse::HTTP_OK;

    /**
     * @param string $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondNotFound($message = 'Not found.'): JsonResponse
    {
        return $this->setStatusCode(SymphonyResponse::HTTP_NOT_FOUND)->respondWithError($message);
    }

    /**
     * @param $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondWithError($message): JsonResponse
    {
        return $this->respond([
            'error' => [
                'message' => $message,
                'status_code' => $this->getStatusCode(),
            ],
        ]);
    }

    /**
     * @param       $data
     * @param array $headers
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respond($data, $headers = []): JsonResponse
    {
        return response()->json($data, $this->getStatusCode(), $headers);
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $StatusCode
     *
     * @return $this
     */
    public function setStatusCode($StatusCode)
    {
        $this->statusCode = $StatusCode;

        return $this;
    }

    /**
     * @param string $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondAccountAlreadyExists($message = 'Account already exists.'): JsonResponse
    {
        return $this->setStatusCode(SymphonyResponse::HTTP_CONFLICT)->respondWithError($message);
    }

    /**
     * @param string $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondAccountIsDisabled($message = 'Account is disabled.'): JsonResponse
    {
        return $this->setStatusCode(SymphonyResponse::HTTP_FORBIDDEN)->respondWithError($message);
    }

    /**
     * @param string $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondAuthenticationFailed($message = 'Authentication failed.'): JsonResponse
    {
        return $this->setStatusCode(SymphonyResponse::HTTP_FORBIDDEN)->respondWithError($message);
    }

    /**
     * @param string $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondInsufficientAccountPermissions($message = 'Insufficient account permissions.'): JsonResponse
    {
        return $this->setStatusCode(SymphonyResponse::HTTP_NOT_FOUND)->respondWithError($message);
    }

    /**
     * @param string $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondUnprocessableEntity($message = 'Unprocessable entity.'): JsonResponse
    {
        return $this->setStatusCode(SymphonyResponse::HTTP_UNPROCESSABLE_ENTITY)->respondWithError($message);
    }

    /**
     * @param string $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondUnsupportedQueryParameter($message = 'Unsupported query parameter.'): JsonResponse
    {
        return $this->setStatusCode(SymphonyResponse::HTTP_NOT_FOUND)->respondWithError($message);
    }

    /**
     * @param string $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondUnsupportedMediaType($message = 'Unsupported media type.'): JsonResponse
    {
        return $this->setStatusCode(SymphonyResponse::HTTP_UNSUPPORTED_MEDIA_TYPE)->respondWithError($message);
    }

    /**
     * @param string $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondNotImplemented($message = 'Not implemented.'): JsonResponse
    {
        return $this->setStatusCode(SymphonyResponse::HTTP_NOT_IMPLEMENTED)->respondWithError($message);
    }

    /**
     * @param string $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondMovedPermanently($message = 'Moved permanently.'): JsonResponse
    {
        return $this->setStatusCode(SymphonyResponse::HTTP_MOVED_PERMANENTLY)->respondWithError($message);
    }

    /**
     * @param string $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondMovedTemporarily($message = 'Moved temporarily.'): JsonResponse
    {
        return $this->setStatusCode(302)->respondWithError($message);
    }

    /**
     * @param string $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondResourceCreated($message = 'Resource created.'): JsonResponse
    {
        return $this->setStatusCode(SymphonyResponse::HTTP_CREATED)->respondWithError($message);
    }

    /**
     * @param string $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondTooManyRequests($message = 'Too many requests.'): JsonResponse
    {
        return $this->setStatusCode(SymphonyResponse::HTTP_TOO_MANY_REQUESTS)->respondWithError($message);
    }

    /**
     * @param string $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondNoDataReturned($message = 'No data returned.'): JsonResponse
    {
        return $this->setStatusCode(SymphonyResponse::HTTP_NOT_MODIFIED)->respondWithError($message);
    }
}
