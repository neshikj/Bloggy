<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response as IlluminateResponse;
use Response;
use Request;
use SoapBox\Formatter\Formatter;

class ApiController extends Controller
{
    const TYPE_XML = 'application/xml';

    /**
     * @var null
     */
    protected $acceptHeader = null;

    /**
     * @var int
     */
    protected $statusCode = 200;

    function __construct()
    {
        $acceptHeader = Request::header('Accept');
        $this->setAcceptHeader($acceptHeader);
    }

    /**
     * @param string $message
     * @return mixed
     */
    public  function respondNotFound($message = 'Not found!')
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_NOT_FOUND)->respondWithError($message);
    }

    /**
     * @param string $message
     * @return mixed
     */
    public  function respondLimitNotAllowed($message = 'Not allowed!')
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_FORBIDDEN)->respondWithError($message);
    }

    /**
     * @param $data
     * @param array $headers
     * @return mixed
     */
    public function respond($data, $headers = [])
    {
        if ($this->getAcceptHeader() === self::TYPE_XML)
        {
            return $this->responseXML($data);
        }

        return $this->responseJSON($data, $headers);
    }

    public function respondWithError($message)
    {
        return $this->respond([
            'error' => [
                'message' => $message,
                'status_code' => $this->getStatusCode()
            ]
        ]);
    }

    /**
     * @param $posts
     * @param $data
     * @return mixed
     */
    protected function respondWithPagination($posts, $data)
    {
        $data = array_merge($data, [
            'paginator' => [
                'total_count' => $posts->total(),
                'total_pages' => ceil($posts->total() / $posts->perPage()),
                'current_page' => $posts->currentPage(),
                'limit' => $posts->perPage(),
            ]
        ]);
        return $this->respond($data);
    }

    /**
     * @param $data
     * @return mixed
     */
    protected function responseXML($data)
    {
        $formatter = Formatter::make($data, Formatter::ARR);
        $xml = $formatter->toXml();

        return $xml;
    }

    /**
     * @param $data
     * @param $headers
     * @return \Illuminate\Http\JsonResponse
     */
    protected function responseJSON($data, $headers)
    {
        return Response::json($data, $this->getStatusCode(), $headers);
    }

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @return null
     */
    public function getAcceptHeader()
    {
        return $this->acceptHeader;
    }

    /**
     * @param $acceptHeader
     * @return $this
     */
    public function setAcceptHeader($acceptHeader)
    {
        $this->acceptHeader = $acceptHeader;

        return $this;
    }
}
