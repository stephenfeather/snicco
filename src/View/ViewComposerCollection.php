<?php


	declare( strict_types = 1 );


	namespace Snicco\View;

	use Exception;
    use Illuminate\Support\Collection;
	use Snicco\Contracts\ViewComposer;
	use Snicco\Contracts\ViewInterface;
	use Snicco\Factories\ViewComposerFactory;
	use Snicco\Support\Arr;

	class ViewComposerCollection implements ViewComposer {

		/**
		 * @var \Snicco\View\ViewComposer[]
		 */
		private $composers;

		/**
		 * @var ViewComposerFactory
		 */
		private $composer_factory;




		public function __construct( ViewComposerFactory $composer_factory ) {

			$this->composers        = new Collection();
			$this->composer_factory = $composer_factory;

		}

		public function executeUsing( ...$args ) {

			$view = $args[0];

			$composers = $this->matchingComposers( $view );

			array_walk( $composers, function ( ViewComposer $composer ) use ( $view ) {

				$composer->executeUsing( $view );

			} );

		}

		/**
		 * @param  string|string[]  $views
		 * @param  string|array|callable  $callable
		 *
		 * @throws Exception
		 */
		public function addComposer( $views, $callable ) {

			$this->composers->push( [

				'views'    => Arr::wrap($views),
				'composer' => $this->composer_factory->createUsing( $callable ),


			] );

		}

		private function matchingComposers( ViewInterface $view ) {

			return $this->composers
				->filter( function ( $value ) use ( $view ) {

					return in_array( $view->name() , $value['views'] );

				})
				->pluck('composer')
				->all();

		}

	}