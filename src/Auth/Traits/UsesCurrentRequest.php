<?php


    declare(strict_types = 1);


    namespace Snicco\Auth\Traits;

    use Snicco\Http\Psr7\Request;

    trait UsesCurrentRequest
    {

        /** @var Request */
        protected $request;

        public function setRequest(Request $request) {
            $this->request = $request;
            return $this;
        }

    }