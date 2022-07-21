<?php

declare(strict_types=1);

namespace Tests\Integration;

use DobroSite\TimeService\PhpTimeService;
use DobroSite\TimeService\TimeService;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DobroSite\TimeService\PhpTimeService
 */
class PhpTimeServiceTest extends TestCase
{
    /**
     * @throws \Throwable
     */
    public function testImplementsTimeServiceInterface(): void
    {
        self::assertTrue(is_a(PhpTimeService::class, TimeService::class, true));
    }

    /**
     * @throws \Throwable
     */
    public function testReturnCurrentTime(): void
    {
        $timeService = new PhpTimeService();

        self::assertEqualsWithDelta(
            date_create('now'),
            $timeService->getCurrentTime(),
            5
        );
    }

    /**
     * @throws \Throwable
     */
    public function testUseSpecifiedTimeZone(): void
    {
        $timeService = new PhpTimeService('Asia/Omsk');

        self::assertSame('Asia/Omsk', $timeService->getTimezone()->getName());
        self::assertSame('Asia/Omsk', $timeService->getCurrentTime()->getTimezone()->getName());

        date_default_timezone_set('UTC');
        self::assertSame('Asia/Omsk', $timeService->getTimezone()->getName());
        self::assertSame('Asia/Omsk', $timeService->getCurrentTime()->getTimezone()->getName());
    }
}
