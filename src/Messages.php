<?php

namespace Vahid\Respond;

class Messages extends Main
{

    /**
     * Request succeeded and contains json result
     * @param array $data
     * @return mixed
     * @since May 2, 2016 9:50:51 AM
     * @uses
     * @see
     * @author Shima Payro <sh.payro@anetwork.ir>
     */
	public function succeed( $data ) {

		return $this->setStatusCode( 200 )
					->setStatusText( 'success' )
					->respondWithResult( $data );

	}

    /**
     * Delete action is succeed
     * @param String $message
     * @return mixed
     * @since May 2, 2016 9:52:05 AM
     * @uses
     * @see
     * @author Shima Payro <sh.payro@anetwork.ir>
     */
	public function deleteSucceeded( $message = null ) {

		if ( is_null( $message ) )
			$message = $this->config[ 'success' ][ 'delete' ];

		return $this->setStatusCode( 200 )
					->setStatusText( 'success' )
					->respondWithMessage( $message );

	}

    /**
     * Update action is succeed
     * @param String $message
     * @return mixed
     * @since May 2, 2016 9:52:52 AM
     * @uses
     * @see
     * @author Shima Payro <sh.payro@anetwork.ir>
     */
	public function updateSucceeded( $message = null ) {

		if ( is_null( $message ) )
			$message = $this->config[ 'success' ][ 'update' ];

		return $this->setStatusCode( 200 )
					->setStatusText( 'success' )
					->respondWithMessage( $message );

	}

    /**
     * Insert action is succeed
     * @param String $message
     * @return mixed
     * @since May 2, 2016 9:53:26 AM
     * @uses
     * @see
     * @author Shima Payro <sh.payro@anetwork.ir>
     */
	public function insertSucceeded( $message = null ) {

		if ( is_null( $message ) )
			$message = $this->config[ 'success' ][ 'insert' ];

		return $this->setStatusCode( 200 )
					->setStatusText( 'success' )
					->respondWithMessage( $message );

	}

    /**
     * Delete action is faild
     * @param String $message
     * @return mixed
     * @since May 2, 2016 9:53:53 AM
     * @uses
     * @see
     * @author Shima Payro <sh.payro@anetwork.ir>
     */
	public function deleteFaild( $message = null ) {

		if ( is_null( $message ) )
			$message = $this->config[ 'fail' ][ 'delete' ];

		return $this->setStatusCode( 447 )
					->setStatusText( 'fail' )
					->setErrorCode( 5447 )
					->respondWithMessage( $message );

	}

    /**
     * Update action is succeed
     * @param String $message
     * @return mixed
     * @since May 2, 2016 9:54:09 AM
     * @uses
     * @see
     * @author Shima Payro <sh.payro@anetwork.ir>
     */
	public function updateFaild( $message = null ) {

		if ( is_null( $message ) )
			$message = $this->config[ 'fail' ][ 'update' ];

		return $this->setStatusCode( 449 )
					->setStatusText( 'fail' )
					->setErrorCode( 5449 )
					->respondWithMessage( $message );

	}

    /**
     * Insert action is faild
     * @param String $message
     * @return mixed
     * @since May 2, 2016 9:54:27 AM
     * @uses
     * @see
     * @author Shima Payro <sh.payro@anetwork.ir>
     */
	public function insertFaild( $message = null ) {

		if ( is_null( $message ) )
			$message = $this->config[ 'fail' ][ 'insert' ];

		return $this->setStatusCode( 448 )
					->setStatusText( 'fail' )
					->setErrorCode( 5448 )
					->respondWithMessage( $message );

	}

    /**
     * Database connection is refused
     * @return mixed
     * @since May 2, 2016 9:54:45 AM
     * @uses
     * @see
     * @author Shima Payro <sh.payro@anetwork.ir>
     */
	public function connectionRefused() {

		return $this->setStatusCode( 445 )
					->setStatusText( 'fail' )
					->setErrorCode( 5445 )
					->respondWithMessage();

	}

    /**
     * page requested is not found
     * @param String $message
     * @return mixed
     * @since May 2, 2016 9:55:20 AM
     * @uses
     * @see
     * @author Shima Payro <sh.payro@anetwork.ir>
     */
	public function notFound() {

		return $this->setStatusCode( 404 )
					->setStatusText( 'fail' )
					->setErrorCode( 5404 )
					->respondWithMessage();

	}

    /**
     * Wrong parameters are entered
     * @param String $message
     * @return mixed
     * @since May 2, 2016 9:55:20 AM
     * @uses
     * @see
     * @author Shima Payro <sh.payro@anetwork.ir>
     */
	public function wrongParameters() {

		return $this->setStatusCode( 406 )
					->setStatusText( 'fail' )
					->setErrorCode( 5406 )
					->respondWithMessage();

	}

    /**
     * Method is not allowed
     * @param String $message
     * @return mixed
     * @since May 2, 2016 9:55:20 AM
     * @uses
     * @see
     * @author Shima Payro <sh.payro@anetwork.ir>
     */
	public function methodNotAllowed() {

		return $this->setStatusCode( 405 )
					->setStatusText( 'fail' )
					->setErrorCode( 5405 )
					->respondWithMessage();

	}

    /**
     * There ara validation errors
     * @param $data array
     * @return mixed
     * @since May 2, 2016 9:55:20 AM
     * @uses
     * @see
     * @author Shima Payro <sh.payro@anetwork.ir>
     */
	public function validationErrors( $message = null ) {

		return $this->setStatusCode( 420 )
					->setStatusText( 'fail' )
					->setErrorCode( 5420 )
					->respondWithResult( $message );

	}

    /**
     * The request field is not found
     * @param String $message
     * @return mixed
     * @since May 2, 2016 9:55:20 AM
     * @uses
     * @see
     * @author Shima Payro <sh.payro@anetwork.ir>
     */
	public function requestFieldNotFound() {

		return $this->setStatusCode( 446 )
					->setStatusText( 'fail' )
					->setErrorCode( 1001 )
					->respondWithMessage();

	}

	/**
	 * The request field is doublicated
	 * @author Mehdi Hosseini <mehdi.hosseini.dev@gmail.com>
	 * @since August 24, 2016
	 * @return mixed
	 */
	public function requestFieldDuplicated() {

	  return $this->setStatusCode( 400 )
					->setStatusText( 'fail' )
					->SetErrorCode(1004)
					->respondWithMessage();

	}

	/**
	 * Custom error message according to error config file
	 * @author Mehdi Hosseini <mehdi.hosseini.dev@gmail.com>
	 * @since August 24, 2016
	 * @param $code integer
	 * @return mixed
	 */
	public function error( $code ) {

	  return $this->setStatusCode( 400 )
					->setStatusText( 'fail' )
					->setErrorCode( $code )
					->respondWithMessage();

	}


}
