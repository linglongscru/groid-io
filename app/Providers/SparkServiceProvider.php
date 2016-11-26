<?php

namespace Groid\Providers;

use Laravel\Spark\Spark;
use Laravel\Spark\Providers\AppServiceProvider as ServiceProvider;

class SparkServiceProvider extends ServiceProvider
{
    /**
     * Your application and company details.
     *
     * @var array
     */
    protected $details = [
        'vendor' => 'edos.io',
        'product' => 'Groid',
        'street' => 'PO Box 111',
        'location' => 'Seattle, WA 98101',
        'phone' => '555-555-5555',
    ];

    /**
     * The address where customer support e-mails should be sent.
     *
     * @var string
     */
    protected $sendSupportEmailsTo = 'support@groid.io';

    /**
     * All of the application developer e-mail addresses.
     *
     * @var array
     */
    protected $developers = [
        'jeremyblc@gmail.com',
        'travhill1@gmail.com'
    ];

    /**
     * Indicates if the application will expose an API.
     *
     * @var bool
     */
    protected $usesApi = true;

    /**
     * Finish configuring Spark for the application.
     *
     * @return void
     */
    public function booted()
    {
        Spark::useStripe()->noCardUpFront()->teamTrialDays(10);

        Spark::teafreePlan()
            ->features([
                'First', 'Second', 'Third'
            ]);

        Spark::teamPlan('Basic', 'groid-basic-monthly')
            ->price(10)
            ->features([
                'First', 'Second', 'Third'
            ]);
        Spark::teamPlan('Basic', 'groid-basic-yearly')
            ->price(100)
            ->yearly()
            ->features([
                'First', 'Second', 'Third'
            ]);
    }

    /**
     * To maintain Groid namespace on Spark Update
     */
    public function register()
    {
        Spark::useUserModel('Groid\User');
        Spark::useTeamModel('Groid\Team');
    }
}
