<?php

declare(strict_types=1);

namespace DobroSite\TimeService;

/**
 * Служба времени, использующая встроенные средства PHP.
 *
 * @since 1.0
 */
final class PhpTimeService implements TimeService
{
    private \DateTimeZone $timezone;

    /**
     * @param string $timezone Используемый часовой пояс. Если не задан, будет взят из настроек PHP.
     *
     * @since 1.0
     */
    public function __construct(string $timezone = '')
    {
        if ($timezone === '') {
            $timezone = date_default_timezone_get();
        }
        $this->timezone = new \DateTimeZone($timezone);
    }

    /**
     * Возвращает текущее время.
     *
     * @since 1.0
     */
    public function getCurrentTime(): \DateTimeImmutable
    {
        return new \DateTimeImmutable('now', $this->timezone);
    }

    /**
     * Возвращает часовой пояс.
     *
     * @since 1.0
     */
    public function getTimeZone(): \DateTimeZone
    {
        return $this->getCurrentTime()->getTimezone();
    }
}
