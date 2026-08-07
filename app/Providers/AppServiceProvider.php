<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator; // 👈 1. Import Paginator

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Schema::defaultStringLength(191);

        // Báo lỗi ngay lập tức nếu lỡ quên viết with() trong môi trường dev
        Model::preventLazyLoading(! app()->isProduction());
        
        // 👈 2. Đặt kiểu giao diện mặc định cho Pagination là Tailwind
        Paginator::useTailwind();

    }
}
