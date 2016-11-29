<?php

use Groid\User;
use Groid\Team;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Spark\Events\Subscription\SubscriptionCancelled;
use Laravel\Spark\Events\Teams\Subscription\SubscriptionCancelled as TeamSubscriptionCancelled;

/**
 * @group stripe
 */
class StripeWebhookControllerTest extends TestCase
{
    use CreatesTeams, DatabaseMigrations, InteractsWithPaymentProviders;



    public function test_events_are_fired_when_subscriptions_are_deleted()
    {
        $this->expectsEvents(SubscriptionCancelled::class);

        $user = $this->createSubscribedUser('spark-test-1');

        $this->json('POST', '/webhook/stripe', [
            'type' => 'customer.subscription_deleted',
            'id' => 'event-id',
            'data' => [
                'object' => [
                    'id' => $user->subscriptions->first()->stripe_id,
                    'customer' => $user->stripe_id,
                ],
            ],
        ]);

        $this->seeStatusCode(200);
    }

    public function test_team_events_are_fired_when_subscriptions_are_deleted()
    {
        $this->expectsEvents(TeamSubscriptionCancelled::class);

        $user = factory(User::class)->create();
        $team = $this->createTeam($user);
        $team->newSubscription('default', 'spark-test-1')->create($this->getStripeToken());

        $this->json('POST', '/webhook/stripe', [
            'type' => 'customer.subscription_deleted',
            'id' => 'event-id',
            'data' => [
                'object' => [
                    'id' => $team->subscriptions->first()->stripe_id,
                    'customer' => $team->stripe_id,
                ],
            ],
        ]);

        $this->seeStatusCode(200);
    }
}
