<?php

use App\Support\Zeitrundung;

// Firmenregel: Es wird immer auf die NÄCHSTE Viertelstunde AUFGERUNDET.

it('rundet auf die nächste Viertelstunde auf', function (int $erfasst, int $erwartet) {
    expect(Zeitrundung::aufViertelstunde($erfasst))->toBe($erwartet);
})->with([
    '1 Minute' => [1, 15],
    '7 Minuten' => [7, 15],
    'genau 15' => [15, 15],
    '16 Minuten' => [16, 30],
    '44 Minuten' => [44, 45],
    'genau 60' => [60, 60],
    '61 Minuten' => [61, 75],
]);
