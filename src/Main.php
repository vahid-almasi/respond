<?php

namespace Vahid\Respond;

class Main
{

    /**
     * Http status code
     * @var integer
     */
    protected $statusCode = 200;

    /**
     * Status text
     * @var string
     */
    protected $statusText = 'success';

    /**
     * Error code, message and text-key
     * @var array
     */
    protected $error;

    /**
     * Error code
     * @var integer
     */
    protected $errorCode;

    /**
     * Haeders
     * @var array
     */
    protected $headers = [];

    /**
     * @var string
     */
    protected $lang;

    /**
     * @var array
     */
    protected $config;

    /**
     * @author Shahrokh Niakan <shahrokhniakan@gmail.com>
     * @since Sep 24, 2016
     */
    public function __construct()
    {


        if (class_exists('\App')) {
            $this->lang = \App::getLocale();
        } else {
            $this->lang = /** @scrutinizer ignore-call */
                app('translator')->getLocale();
        }

        if (!file_exists(config_path($this->lang . '.php'))) {
            $this->config = include __DIR__ . '/../errors/lang/' . $this->lang . '.php';
        } else {
            $this->config = include config_path($this->lang . '.php');
        }

    }

    /**
     * Getter for $statusCode
     * @author Shima Payro <sh.payro@anetwork.ir>
     * @since May 2, 2016 9:46:27 AM
     * @uses
     * @see
     */
    public function getStatusCode()
    {

        return $this->statusCode;

    }

    /**
     * Setter for $statusCode
     * @param integer $statusCode
     * @return $this
     * @author Shima Payro <sh.payro@anetwork.ir>
     * @since May 2, 2016 9:47:04 AM
     * @uses
     * @see
     */
    public function setStatusCode($statusCode)
    {

        $this->statusCode = $statusCode;

        return $this;

    }

    /**
     * Getter for $statusText
     * @author Shima Payro <sh.payro@anetwork.ir>
     * @since May 2, 2016 9:47:36 AM
     * @uses
     * @see
     */
    public function getStatusText()
    {

        return $this->statusText;

    }

    /**
     * Setter for $statusText
     * @param String $statusText
     * @return $this
     * @author Shima Payro <sh.payro@anetwork.ir>
     * @since May 2, 2016 9:48:23 AM
     * @uses
     * @see
     */
    public function setStatusText($statusText)
    {

        $this->statusText = $statusText;

        return $this;

    }

    /**
     * Response
     * @param $data : json
     * @return mixed
     * @author Shima Payro <sh.payro@anetwork.ir>
     * @since May 2, 2016 9:48:45 AM
     * @uses
     * @see
     */
    public function respond($data)
    {

        $result = array_filter($this->getHeaders());

        if (empty($result))
            return response()->json($data, $this->getStatusCode());

        return response()->json($data, $this->getStatusCode())
            ->withHeaders($this->getHeaders());

    }

    /**
     * Response which conteins just a message
     * @param string $message
     * @return mixed
     * @since May 2, 2016 9:49:21 AM
     * @author Shima Payro <sh.payro@anetwork.ir>
     * @uses
     * @see
     */
    public function respondWithMessage($message = null)
    {

        $res['status'] = $this->getStatusText();

        //if it's about failure
        if ($this->getErrorCode()) {

            $res['error'] = $this->getErrorCode();

            if (is_null($message))
                $res['message'] = $this->getErrorMessage();
            else
                $res['message'] = $message;

        } else {

            $res['message'] = $message;

        }

        return $this->respond($res);

    }

    /**
     * Set error code in our result
     * @param $errorCode integer
     * @return $this
     * @author Mehdi Hosseini <mehdi.hosseini.dev@gmail.com>
     * @since August 24, 2016
     */
    public function setErrorCode($errorCode)
    {

        $this->error = $this->config[$errorCode];

        $this->errorCode = $errorCode;

        return $this;

    }

    /**
     * Return Error code
     * @return integer
     * @since August 24, 2016
     * @author Mehdi Hosseini <mehdi.hosseini.dev@gmail.com>
     */
    public function getErrorCode()
    {

        return $this->errorCode;

    }

    /**
     * Get error message
     * @return string
     * @since August 24, 2016
     * @author Mehdi Hosseini <mehdi.hosseini.dev@gmail.com>
     */
    public function getErrorMessage()
    {

        return $this->error['message'];

    }

    /**
     * Get headers
     * @return array
     * @since Sep 13, 2016
     * @author Shima Payro <sh.payro@anetwork.ir>
     */
    public function getHeaders()
    {

        return $this->headers;

    }

    /**
     * Set headers
     * @param array $headers
     * @return $this
     * @since Sep 13, 2016
     * @author Shima Payro <sh.payro@anetwork.ir>
     */
    public function setHeaders($headers = [])
    {

        $this->headers = $headers;

        return $this;

    }

    /**
     * Response which contains status and data
     * @param null|array $data
     * @return mixed
     * @since May 2, 2016 9:50:19 AM
     * @author Shima Payro <sh.payro@anetwork.ir>
     * @uses
     * @see
     */
    public function respondWithResult($data = NULL)
    {

        $res['status'] = $this->getStatusText();

        //if it's about laravel validation error
        if ($this->getErrorCode() && $this->getStatusCode() == 420) {

            $res['error'] = $this->getErrorCode();
            $res['message'] = $data;

        } else {

            $res['result'] = $data;

        }

        return $this->respond($res);

    }

}
