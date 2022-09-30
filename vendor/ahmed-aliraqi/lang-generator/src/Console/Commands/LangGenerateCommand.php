<?php

namespace AhmedAliraqi\LangGenerator\Console\Commands;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use AhmedAliraqi\LangGenerator\Manager;
use Laraeast\LaravelLocales\Facades\Locales;

class LangGenerateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lang:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Search for all lang keys from views and put them to lang files';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $matches = app(Manager::class)->getMatched();

        foreach (Locales::get() as $locale) {
            foreach ($matches as $key) {
                if (is_array($lang = $this->getLang($key, $locale->code))) {
                    if (file_exists($lang['path'])) {
                        file_put_contents(
                            $lang['path'],
                            "<?php\n\nreturn ".$this->arrayToString($lang['content']).";\n"
                        );
                    }
                } else {
                    $jsonPath = str_replace('{lang}', $locale->code, resource_path('lang/{lang}.json'));
                    $data = [];
                    if (file_exists($jsonPath)) {
                        $data = json_decode(file_get_contents($jsonPath), true);
                    }
                    if (! isset($data[$key])) {
                        $data[$key] = $key;
                    }

                    file_put_contents($jsonPath, json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
                }
            }
        }
    }

    public function getLang($match, $lang = 'en')
    {
        $langPaths = Arr::wrap(config('lang-generator.lang'));
        $default = config('lang-generator.defaultLang');

        foreach ($langPaths as $alias => $langPath) {
            if (Str::startsWith($match, $alias)) {
                $key = str_replace($alias.'.', '', $match);

                $content = [];

                if (file_exists($path = str_replace('{lang}', $lang, $langPath))) {
                    $content = require $path;
                } else {
                    if (file_exists($defaultPath = str_replace('{lang}', $default, $langPath))) {
                        $content = require $defaultPath;
                    }
                }
                if (! isset($content[$key])) {
                    if (Str::contains($key, '.')) {
                        if ($key && ! data_get($content, $key)) {
                            $this->dotToNested($content, $key, $key);
                        }
                    } else {
                        if ($key) {
                            $content[$key] = $key;
                        }
                    }
                }

                return [
                    'path' => str_replace('{lang}', $lang, $langPath),
                    'key' => $key,
                    'content' => $this->arrayFilter($content),
                ];
            }
        }
    }

    protected function arrayToString($expression)
    {
        $export = var_export($expression, true);
        $export = preg_replace("/^([ ]*)(.*)/m", '$1$1$2', $export);
        $array = preg_split("/\r\n|\n|\r/", $export);
        $array = preg_replace(["/\s*array\s\($/", "/\)(,)?$/", "/\s=>\s$/"], [null, ']$1', ' => ['], $array);
        $export = join(PHP_EOL, array_filter(["["] + $array));

        return $export;
    }

    protected function dotToNested(&$arr, $path, $value, $separator = '.')
    {
        $keys = explode($separator, $path);
        foreach ($keys as $key) {
            $arr = &$arr[$key];
        }
        $arr = $value;
    }

    protected function arrayFilter($arrayIn)
    {
        $output = [];
        if (is_array($arrayIn)) {
            foreach ($arrayIn as $key => $val) {
                if (! $key) {
                    continue;
                }
                if (is_array($val)) {
                    $output[$key] = $this->arrayFilter($val);
                } else {
                    $output[$key] = $val;
                }
            }
        }

        return $output;
    }
}
