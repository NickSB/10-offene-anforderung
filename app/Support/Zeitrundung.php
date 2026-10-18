<?php

namespace App\Support;

class Zeitrundung
{
    /**
     * Firmenregel: Erfasste Zeit wird auf die nächste Viertelstunde aufgerundet.
     * Beispiele: 7 → 15, 15 → 15, 16 → 30
     */
    public static function aufViertelstunde(int $minuten): int
    {
        return (int) ceil($minuten / 15) * 15;
    }
}
