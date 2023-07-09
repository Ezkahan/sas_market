<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'Domain\Category\Models\Category'           => 'Domain\Category\Policies\CategoryPolicy',
        'Domain\Banner\Models\Banner'               => 'Domain\Banner\Policies\BannerPolicy',
        'Domain\Brand\Models\Brand'                 => 'Domain\Brand\Policies\BrandPolicy',
        'Domain\Coupon\Models\Coupon'               => 'Domain\Coupon\Policies\CouponPolicy',
        'Domain\Documentation\Models\Documentation' => 'Domain\Documentation\Policies\DocumentationPolicy',
        'Domain\News\Models\News'                   => 'Domain\News\Policies\NewsPolicy',
        'Domain\Order\Models\Order'                 => 'Domain\Order\Policies\OrderPolicy',
        'Domain\Page\Models\Page'                   => 'Domain\Page\Policies\PagePolicy',
        'Domain\Product\Models\Product'             => 'Domain\Product\Policies\ProductPolicy',
        'Domain\Promotion\Models\Promotion'         => 'Domain\Promotion\Policies\PromotionPolicy',
        'Domain\Subscriber\Models\Subscriber'       => 'Domain\Subscriber\Policies\SubscriberPolicy',
        'Domain\User\Models\User'                   => 'Domain\User\Policies\UserPolicy',
        'Domain\Setting\Models\Setting'             => 'Domain\Setting\Policies\SettingPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
