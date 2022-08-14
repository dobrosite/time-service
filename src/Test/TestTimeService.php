<?php

declare(strict_types=1);

namespace DobroSite\TimeService\Test;

use DobroSite\TimeService\TimeService;

/**
 * Тестовая версия {@see TimeService}.
 *
 * @since 1.0
 */
final class TestTimeService implements TimeService
{
    /**
     * Время, используемое {@see resetCurrentTime()} при сбросе.
     */
    private const DEFAULT_CURRENT_TIME = '2001-02-03T04:05:06+07:00';

    /**
     * Время, возвращаемое {@see getCurrentTime()}.
     */
    private \DateTimeImmutable $currentTime;

    /**
     * @throws \Throwable
     *
     * @since 1.0
     */
    public function __construct()
    {
        $this->resetCurrentTime();
    }

    public function getCurrentTime(): \DateTimeImmutable
    {
        return $this->currentTime;
    }

    public function getTimeZone(): \DateTimeZone
    {
        return $this->currentTime->getTimezone();
    }

    /**
     * Устанавливает время по умолчанию.
     *
     * @throws \Throwable
     *
     * @since 1.0
     */
    public function resetCurrentTime(): void
    {
        $this->currentTime = new \DateTimeImmutable(self::DEFAULT_CURRENT_TIME);
    }

    /**
     * Задаёт время, возвращаемое TimeService.
     *
     * @throws \Throwable
     *
     * @since 1.0
     */
    public function setCurrentTime(\DateTimeInterface|string $time): void
    {
        $time = is_string($time)
            ? new \DateTimeImmutable($time)
            : \DateTimeImmutable::createFromInterface($time);

        $this->currentTime = $time;
    }
}
