<?php

namespace App\Providers;

use Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        Blade::if('admin', function ($user = null) {
            if (! $user && auth()->check()) {
                $user = auth()->user();
            }

            if (! $user) {
                return false;
            }

            return $user->isAdmin();
        });

        // Add @break for Loops
        Blade::directive('break', function () {
            return '<?php break; ?>';
        });

        // Add @continue for Loops
        Blade::directive('continue', function () {
            return '<?php continue; ?>';
        });

        Blade::directive('csrf', function ($namespace) {
            $namespace = trim(str_replace('\'', '', $namespace)) ?: 'Laravel';
            $csrf = csrf_token();

            $metaTag = "<meta name=\"csrf-token\" content=\"{$csrf}\">";
            $scriptTag = "<script>window.{$namespace} = {'csrfToken': '{$csrf}'}</script>";

            return $metaTag.$scriptTag;
        });

        // add datetime for blade
        Blade::directive('datetime', function ($expression) {
            return "<?php echo '<time datetime=\'' . with{$expression}->toIso8601String()
      . '\' title=\'' . $expression . '\'>'
      . with{$expression}->diffForHumans() . '</time>' ?>";
        });

        /*
         * Laravel dd() function.
         *
         * Usage: @dd($variableToDump)
         */
        Blade::directive('dd', function ($expression) {
            return "<?php dd(with{$expression}); ?>";
        });

        Blade::if('disabled', function () {
            return auth()->check() && auth()->user()->isDisabled();
        });

        Blade::if('env', function ($environment) {
            return app()->environment($environment);
        });

        /*
         * php explode() function.
         *
         * Usage: @explode($delimiter, $string)
         */
        Blade::directive('explode', function ($argumentString) {
            list($delimiter, $string) = $this->getArguments($argumentString);

            return "<?php echo explode({$delimiter}, {$string}); ?>";
        });

        // Add @ifempty for Loops
        Blade::directive('ifempty', function ($expression) {
            return "<?php if(count$expression == 0): ?>";
        });

        // Add @endifempty for Loops
        Blade::directive('endifempty', function () {
            return '<?php endif; ?>';
        });

        /*
         * php implode() function.
         *
         * Usage: @implode($delimiter, $array)
         */
        Blade::directive('implode', function ($argumentString) {
            list($delimiter, $array) = $this->getArguments($argumentString);

            return "<?php echo implode({$delimiter}, {$array}); ?>";
        });

        Blade::directive('IsNull', function ($expression) {
            return "<?php if ($expression == 'null') { ?>";
        });

        Blade::directive('endIsNull', function () {
            return '<?php } ?>';
        });

        Blade::directive('IsNotNull', function ($expression) {
            return "<?php if ($expression !== 'null') { ?>";
        });

        Blade::directive('endIsNotNull', function () {
            return '<?php } ?>';
        });

        // Export data to window object
        Blade::directive('js', function ($arguments) {
            list($var, $data) = explode(',', str_replace(['(', ')', ' ', "'"], '', $arguments));

            return "<?php echo \"<script>window['{$var}']= {$data};</script>\" ?>";
        });

        // Add @optional for Complex Yielding
        Blade::directive('optional', function ($expression) {
            return "<?php if(trim(\$__env->yieldContent{$expression})): ?>";
        });

        // Add @endoptional for Complex Yielding
        Blade::directive('endoptional', function () {
            return '<?php endif; ?>';
        });

        // add pluralize for nouns
        Blade::directive('plural', function ($expression) {
            $expression = trim($expression, '()');
            $extraction = preg_split('/,\s*/', $expression);

            if (is_array($extraction)) {
                list($count, $str, $spacer) = array_pad(
                    $extraction,
                    3,
                    "' '"
                );

                return "<?php echo $count . $spacer . str_plural($str, $count) ?>";
            }

            if ($extraction !== true) {
                return false;
            }

            throw new \Exception('Unable to pluralize string.');
        });

        // Add @set for Variable Assignment
        Blade::directive('set', function ($expression) {
            list($variable, $value) = explode(',', $expression, 2);

            // Ensure variable has no spaces or apostrophes
            $variable = trim(str_replace('\'', '', $variable));

            // Make sure that the variable starts with $
            if (! starts_with($variable, '$')) {
                $variable = '$'.$variable;
            }

            $value = trim($value);

            return "<?php {$variable} = {$value}; ?>";
        });

        Blade::directive('truncate', function ($expression) {
            list($string, $length) = explode(',', str_replace(['(', ')', ' '], '', $expression));

            return "<?php echo e(strlen({$string}) > {$length} ? substr({$string},0,{$length}).'...' : {$string}); ?>";
        });

        /*
         * php var_dump() function.
         *
         * Usage: @var_dump($variableToDump)
         */
        Blade::directive('varDump', function ($expression) {
            return "<?php var_dump(with{$expression}); ?>";
        });
    }

    /**
     * Get argument array from argument string.
     *
     * @param string $argumentString
     *
     * @return array
     */
    private function getArguments($argumentString): array
    {
        return explode(', ', str_replace(['(', ')'], '', $argumentString));
    }

    /**
     * Register the application services.
     */
    public function register(): void
    {
    }
}
