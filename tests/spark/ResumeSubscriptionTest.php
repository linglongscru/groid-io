<?php

use Groid\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * @group stripe
 */
class ResumeSubscriptionTest extends TestCase
{
    use DatabaseMigrations, InteractsWithPaymentProviders;

    public function test_subscription_can_be_resumed()
    {
        $user = $this->createSubscribedUser('spark-test-1');
        $user->subscription()->cancel();

        $this->assertTrue($user->subscription()->onGracePeriod());

        $this->actingAs($user)
                ->json('PUT', '/settings/subscription', [
                    'plan' => 'spark-test-1',
                ]);

        $user = $user->fresh();

        $this->seeStatusCode(200);
        $this->assertTrue($user->subscribed());
        $this->assertFalse($user->subscription()->onGracePeriod());
        $this->assertEquals('spark-test-1', $user->subscription()->stripe_plan);
    }
}
