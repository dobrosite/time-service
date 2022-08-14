<?php

declare(strict_types=1);

namespace Tests\Unit\Test;

use DobroSite\TimeService\Test\TestTimeService;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DobroSite\TimeService\Test\TestTimeService
 */
final class TestTimeServiceTest extends TestCase
{
    /**
     * @throws \Throwable
     */
    public function testGetAndChangeCurrentTime(): void
    {
        $timeService = new TestTimeService();

        $initialTime = $timeService->getCurrentTime();

        // При повторных запросах должно возвращаться то же время.
        self::assertEquals($initialTime, $timeService->getCurrentTime());

        // Если мы меняем время, должно возвращаться оно.
        $newTimeAsString = '1900-10-20 11:22:33 MSK';
        $timeService->setCurrentTime($newTimeAsString);
        $newTime = $timeService->getCurrentTime();
        self::assertEquals(new \DateTimeImmutable($newTimeAsString), $newTime);
        self::assertNotEquals($initialTime, $newTime);

        // Если сбрасываем время, снова должно возвращаться время по умолчанию.
        $timeService->resetCurrentTime();
        self::assertEquals($initialTime, $timeService->getCurrentTime());
    }

    /**
     * @throws \Throwable
     */
    public function testGetCurrentTime(): void
    {
        $timeService = new TestTimeService();

        $time = $timeService->getCurrentTime();
        self::assertSame('2001-02-03T04:05:06+07:00', $time->format(DATE_RFC3339));
    }

    /**
     * @throws \Throwable
     */
    public function testGetTimeZone(): void
    {
        $timeService = new TestTimeService();

        $tz = $timeService->getTimeZone();
        self::assertSame('+07:00', $tz->getName());
    }
}
