<?php

namespace AhmedAliraqi\LangGenerator;

use Illuminate\Support\Arr;

class Manager
{
    /**
     * @return array
     */
    public function getMatched()
    {
        $paths = array_map(function ($path) {
            return $this->getDirContents($path);
        }, Arr::wrap(config('lang-generator.matches')));
        $paths = Arr::flatten($paths);
        $paths = array_filter($paths, function ($path) {
            return is_file($path);
        });
        $keys = [];
        foreach ($paths as $path) {
            if (file_exists($path)) {
                $content = file_get_contents($path);
                $pattern = '/(?: __\((?:\'|")|@lang\((?:\'|")|trans\((?:\'|"))([a-zA-Z0-9ء-ي\\\\\'"@$%*&!\s._-ًٍَُِ]+)(?:\'|")(?:,|\[|\s)?/miu';
                preg_match_all($pattern, $content, $matches, PREG_SET_ORDER, 0);
                foreach ($matches as $match) {
                    if (isset($match[1])) {
                        $keys[] = $match[1];
                    }
                }
            }
        }

        return array_unique($keys);
    }

    protected function getDirContents($dir, &$results = [])
    {
        $files = scandir($dir);

        foreach ($files as $key => $value) {
            $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
            if (! is_dir($path)) {
                $results[] = $path;
            } elseif ($value != "." && $value != "..") {
                $this->getDirContents($path, $results);
                $results[] = $path;
            }
        }

        return $results;
    }
}
