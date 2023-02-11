<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request)
    {
        return array_merge(parent::share($request), [
            'flash' => [
                'success' => fn () => $request->session()->get('success'),
                'error' => fn () => $request->session()->get('error'),
                'warning' => fn () => $request->session()->get('warning'),
                'info' => fn () => $request->session()->get('info'),
            ],
            'auth' => [
                'user' => $request->user(),
                'can' => $request->user() ? $request->user()->getPermissionArray() : [],
            ],
            'app' => [
                'name' => config('app.name'),
                'perpage' => [
                    ['label' => '5', 'value' => 5],
                    ['label' => '10', 'value' => 10],
                    ['label' => '20', 'value' => 20],
                    ['label' => '50', 'value' => 50],
                    ['label' => '100', 'value' => 100],
                ],
            ],
            'locale' => function () {                
                if(session()->has('locale')) {
                    app()->setLocale(session('locale'));
                }
                return app()->getLocale();
            },
            'language' => function () {
                $lang = __('app');
                return response()->json($lang);
            },
            'ziggy' => function () use ($request) {
                return array_merge((new Ziggy)->toArray(), [
                    'location' => $request->url(),
                ]);
            },
        ]);
    }
}
