<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ShortUrlRule implements ValidationRule
{
    private $allowedRoutesList = [
        'redirect.execute',
    ];

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $routeCollection = Route::getRoutes();
        try {
            $route = $routeCollection->match(Request::create((string) $value));
        } catch (NotFoundHttpException $e) {
            return;
        } catch (MethodNotAllowedHttpException $e) {
            // do nothing
        }

        if (in_array($route->getName(), $this->allowedRoutesList)) {
            return;
        }

        $fail('The :attribute key has already been taken.')->translate();
    }
}
