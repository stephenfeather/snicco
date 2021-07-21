<?php


    declare(strict_types = 1);


    namespace Tests\integration\Database;

    use Snicco\Database\BetterWPDb;
    use Snicco\Database\Contracts\BetterWPDbInterface;
    use Snicco\Database\Contracts\WPConnectionInterface;
    use Snicco\Database\FakeDB;
    use Snicco\Database\Illuminate\MySqlSchemaBuilder;
    use Snicco\Database\WPConnection;
    use Snicco\Database\WPConnectionResolver;
    use Snicco\Database\Contracts\ConnectionResolverInterface;
    use Snicco\Database\Illuminate\DispatcherAdapter;
    use Faker\Generator;
    use Illuminate\Contracts\Events\Dispatcher;
    use Illuminate\Database\Eloquent\Model as Eloquent;
    use Illuminate\Database\Query\Builder;
    use Illuminate\Support\Facades\DB;

    class DatabaseServiceProviderTest extends DatabaseTestCase
    {

        protected $defer_boot = true;

        /** @test */
        public function the_illuminate_event_dispatcher_adapter_is_bound()
        {

            $this->boot();

            $this->assertInstanceOf(DispatcherAdapter::class, $this->app->resolve(Dispatcher::class));
            $this->assertInstanceOf(DispatcherAdapter::class, $this->app->resolve('events'));

        }

        /** @test */
        public function eloquent_is_booted()
        {

            $this->boot();

            $events = Eloquent::getEventDispatcher();
            $this->assertInstanceOf(DispatcherAdapter::class, $events);

            $resolver = Eloquent::getConnectionResolver();
            $this->assertInstanceOf(WPConnectionResolver::class, $resolver);

        }

        /** @test */
        public function the_connection_resolver_is_bound_correctly()
        {

            $this->boot();

            $this->assertInstanceOf(WPConnectionResolver::class, $this->app->resolve(ConnectionResolverInterface::class));

        }

        /** @test */
        public function the_default_connection_is_set()
        {

            $this->boot();

            /** @var ConnectionResolverInterface $resolver */
            $resolver = $this->app->resolve(ConnectionResolverInterface::class);

            $this->assertSame('wp_connection', $resolver->getDefaultConnection());

        }

        /** @test */
        public function by_default_the_current_wpdb_instance_is_used()
        {

            $this->boot();

            /** @var ConnectionResolverInterface $resolver */
            $resolver = $this->app->resolve(ConnectionResolverInterface::class);
            $c = $resolver->connection();

            $this->assertInstanceOf(WPConnectionInterface::class, $c);

            $this->assertSame(DB_USER, $c->dbInstance()->dbuser);
            $this->assertSame(DB_HOST, $c->dbInstance()->dbhost);
            $this->assertSame(DB_NAME, $c->dbInstance()->dbname);
            $this->assertSame(DB_PASSWORD, $c->dbInstance()->dbpassword);


        }

        /** @test */
        public function the_wpdb_abstraction_can_be_changed () {

            $this->boot();
            $this->assertSame(BetterWPDb::class, $this->app->resolve(BetterWPDbInterface::class));

            $this->instance(BetterWPDbInterface::class, FakeDB::class );
            $this->assertSame(FakeDB::class, $this->app->resolve(BetterWPDbInterface::class));


        }

        /** @test */
        public function the_schema_builder_can_be_resolved_for_the_default_connection () {

            $this->boot();

            $b = $this->app->resolve(MySqlSchemaBuilder::class);
            $this->assertInstanceOf(MySqlSchemaBuilder::class, $b);


        }

        /** @test */
        public function the_connection_can_be_resolved_as_a_closure () {

            $this->boot();

            $connection = $this->app->resolve(WPConnectionInterface::class)();
            $this->assertInstanceOf(WPConnection::class, $connection);

        }

        /** @test */
        public function the_db_facade_works () {

            $this->boot();

            $connection = DB::connection();
            $this->assertInstanceOf(WPConnection::class, $connection);

            $builder = DB::table('foo');
            $this->assertInstanceOf(Builder::class, $builder);


        }

        /** @test */
        public function the_faker_instance_is_registered () {

            $this->boot();
            $this->assertInstanceOf(Generator::class, $this->app->resolve(Generator::class));

        }

    }