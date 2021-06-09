<?php


    declare(strict_types = 1);


    namespace WPEmerge\Validation;

    use WPEmerge\Contracts\ServiceProvider;

    class ValidationServiceProvider extends ServiceProvider
    {

        public function register() : void
        {
            $this->bindConfig();
            $this->bindValidator();
        }

        function bootstrap() : void
        {
        }

        private function bindValidator()
        {

            $this->container->singleton(Validator::class, function () {

                $validator = new Validator();
                $validator->globalMessages($this->config->get('validation.messages'));

                return $validator;

            });

        }

        private function bindConfig()
        {

            $this->config->extend('validation.attributes', []);
            $this->config->extend('validation.messages', []);

        }

    }