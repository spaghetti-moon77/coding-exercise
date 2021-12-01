<?php

declare(strict_types=1);

namespace App\Tests\Unit\Service;

use App\Service\CheckerService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CheckerServiceTest extends KernelTestCase
{
    public function testIsPalindromeSuccess()
    {
        $service = new CheckerService();

        $word = 'anna';

        $result = $service->isPalindrome($word);

        $this->assertEquals(true, $result);
    }

    public function testIsPalindromeDifferentCaseSuccess()
    {
        $service = new CheckerService();

        $word = 'Anna';

        $result = $service->isPalindrome($word);

        $this->assertEquals(true, $result);
    }
    
    public function testIsPalindromeFailure()
    {
        $service = new CheckerService();

        $word = 'Bark';

        $result = $service->isPalindrome($word);

        $this->assertEquals(false, $result);
    }

    public function testIsAnagramSuccess()
    {
        $service = new CheckerService();

        $word = 'coalface';
        $comparison = 'cacao elf';

        $result = $service->isAnagram($word, $comparison);

        $this->assertEquals(true, $result);
    }

    public function testIsAnagramFailure()
    {
        $service = new CheckerService();

        $word = 'coalface';
        $comparison = 'dark elf';

        $result = $service->isAnagram($word, $comparison);

        $this->assertEquals(false, $result);
    }

    public function testIsPangramSuccess()
    {
        $service = new CheckerService();

        $phrase = 'The quick brown fox jumps over the lazy dog';

        $result = $service->isPangram($phrase);

        $this->assertEquals(true, $result);
    }

    public function testIsPangramFailure()
    {
        $service = new CheckerService();

        $phrase = 'The British Broadcasting Company (BBC) is a British public service broadcaster';

        $result = $service->isPangram($phrase);

        $this->assertEquals(false, $result);
    }
}