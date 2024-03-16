<?php

declare(strict_types=1);

namespace App\Src\Helpers;

use Illuminate\Support\Facades\Log;

/**
 * Class Dates
 *
 * Provides various date helper functions
 */
class Dates
{
    /**
     * Create an ISO valid date string - YYYY/MM/DD
     *
     * @param string|int $year
     * @param string|int $month
     * @param string|int $day
     *
     * @return string
     */
    public function createIsoString(string|int $year, string|int $month, string|int $day): string
    {
        $iso = $year . '/';
        $iso .= str_pad($month, 2, '0', STR_PAD_LEFT) . '/';
        $iso .= str_pad($day, 2, '0', STR_PAD_LEFT);

        return $iso;
    }

    /**
     * Check if the person was married before the age of 18.
     *
     * @param string $birthday    The birthday of the person in 'Y-m-d' format.
     * @param string $marriageDay The date of marriage in 'Y-m-d' format.
     *
     * @return bool Returns true if the person was married before the age of 18, false otherwise.
     */
    public function marriedBefore18(string $birthday, string $marriageDay): bool
    {
        try {
            $dob   = new \DateTime($birthday);
            $dom   = new \DateTime($marriageDay);
            $years = $dob->diff($dom)->format('%y');
            return (int)$years < 18;
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return false;
        }
    }
}
