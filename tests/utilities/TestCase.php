<?php
use Ramsey\Uuid\Uuid;

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__ . '/../../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    /**
     * @param $user
     * @return string
     */
    public function apiToken($user)
    {
        $token = \Laravel\Spark\Token::create([
            'id' => Uuid::uuid4(),
            'user_id' => $user->id,
            'name' => 'test_token',
            'token' => str_random(60),
            'metadata' => '[]'
            ]);
        return 'api_token=' . $token->token;
    }
}
