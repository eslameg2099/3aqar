<?php

namespace App\Providers;

use App\Models\Contractor;
use App\Models\Customer;
use App\Models\EngineeringOffice;

use App\Models\Estate;
use App\Models\Office;
use App\Models\Order;
use App\Models\User;
use App\Models\Expert;
use App\Models\Advisor;

use App\Observers\AttachCitiesToContractorObserver;
use App\Observers\AttachCitiesToExpertObserver;
use App\Observers\EngineeringOfficeObserver;
use App\Observers\AttachCitiesToAdvisorObserver;


use App\Observers\AttachCitiesToEstateObserver;
use App\Observers\AttachCitiesToOfficeObserver;
use App\Observers\AttachCitiesToOrderObserver;
use App\Observers\AttachCitiesToUserObserver;
use App\Observers\OrderObserver;
use Illuminate\Auth\Events\Registered;
use App\Observers\PhoneVerificationObserver;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        \App\Events\FeedbackSent::class => [
            \App\Listeners\SendFeedbackMessage::class,
        ],
        \App\Events\VerificationCreated::class => [
            \App\Listeners\SendVerificationCode::class,
        ],
        \App\Support\Chat\Events\MessageSent::class => [
            \App\Listeners\MessageSentListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Customer::observe(PhoneVerificationObserver::class);
        Estate::observe(AttachCitiesToEstateObserver::class);
        User::observe(AttachCitiesToUserObserver::class);
        Office::observe(AttachCitiesToOfficeObserver::class);
        Contractor::observe(AttachCitiesToContractorObserver::class);
        Order::observe(OrderObserver::class);
        Order::observe(AttachCitiesToOrderObserver::class);
        Expert::observe(AttachCitiesToExpertObserver::class);
        EngineeringOffice::observe(EngineeringOfficeObserver::class);
        Advisor::observe(AttachCitiesToAdvisorObserver::class);

        


    }
}
