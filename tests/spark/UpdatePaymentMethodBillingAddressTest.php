<?php

use Groid\User;
use Laravel\Spark\Spark;
use Illuminate\Contracts\Auth\Authenticatable;
use Laravel\Spark\Services\Stripe as StripeService;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * @group stripe
 */
class UpdatePaymentMethodBillingAddressTest extends TestCase
{
    use DatabaseMigrations, InteractsWithPaymentProviders;

    public function test_payment_method_for_stripe_can_be_updated()
    {
        Spark::collectBillingAddress();

        $user = $this->createSubscribedUser('spark-test-1');

        $this->actingAs($user)
                ->json('PUT', '/settings/payment-method', [
                    'stripe_token' => $this->getStripeToken(),
                    'address' => 'Test',
                    'city' => 'Test',
                    'state' => 'AR',
                    'zip' => '71901',
                    'country' => 'US',
                ]);

        $this->seeStatusCode(200);

        Spark::collectBillingAddress(false);
    }

    public function test_payment_method_country_must_match_stripe_country()
    {
        Spark::collectBillingAddress();

        $user = $this->createSubscribedUser('spark-test-1');

        $this->actingAs($user)
                ->json('PUT', '/settings/payment-method', [
                    'stripe_token' => $this->getStripeToken(),
                    'address' => 'Test',
                    'city' => 'Test',
                    'state' => 'AR',
                    'zip' => '71901',
                    'country' => 'TV',
                ]);

        $this->seeStatusCode(500);

        Spark::collectBillingAddress(false);
    }

    public function test_payment_method_state_must_be_valid_for_country()
    {
        Spark::collectBillingAddress();

        $user = $this->createSubscribedUser('spark-test-1');

        $this->actingAs($user)
                ->json('PUT', '/settings/payment-method', [
                    'stripe_token' => $this->getStripeToken(),
                    'address' => 'Test',
                    'city' => 'Test',
                    'state' => 'TEST',
                    'zip' => '71901',
                    'country' => 'US',
                ]);

        $this->seeStatusCode(500);

        Spark::collectBillingAddress(false);
    }
}
