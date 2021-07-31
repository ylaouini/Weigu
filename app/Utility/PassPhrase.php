<?php

namespace App\Utility;

use Illuminate\Support\Facades\Cache;
use ReflectionClass;
use Illuminate\Support\Str;

class PassPhrase
{
    /**
     * returns a phrase containing a random number of words from the wordlist using a separator string
     *
     * @param int count of the number of words required
     * @param string seperator string
     * @return string
     */
    public function passPhrase(int $count, string $separator = '-') :string
    {
        $phraseWords = collect();
        $words = $this->wordsArray();
        $max = count($words)-1;  //max index

        foreach(range(1,$count) as $iter) {
            $phraseWords->push($words[random_int(0,$max)]);
        }

        return $phraseWords->implode($separator);

    }

    private function wordsArray()
    {
        return Cache::rememberForever('passphrase-words', function () {

            //assumes wordlist is in the same folder as this class.
            $reflector = new ReflectionClass(Self::class);
            //$filepath = Str::beforeLast($reflector->getFileName(),'/');   // linux
            $filepath = Str::beforeLast($reflector->getFileName(), DIRECTORY_SEPARATOR); // windows
            return explode("\n", file_get_contents($filepath . '/wordlist.txt'));

        });

    }
}
