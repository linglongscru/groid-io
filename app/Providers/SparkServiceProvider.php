<?php

namespace Groid\Providers;

use Laravel\Spark\Spark;
use Carbon\Carbon;
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
        Spark::useStripe()->noCardUpFront()->teamTrialDays(30);

        Spark::freeTeamPlan()
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

        Spark::createUsersWith(function ($request) {
            $user = Spark::user();

            $data = $request->all();

            $user->forceFill([
                'name' => $data['name'],
                'email' => $data['email'],
                'activation_token' => str_random(60).$request->input('email'),
                'password' => bcrypt($data['password']),
                'last_read_announcements_at' => Carbon::now(),
                'trial_ends_at' => Carbon::now()->addDays(Spark::trialDays()),
            ])->save();

            return $user;
        });
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
