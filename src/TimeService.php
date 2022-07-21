<?php

declare(strict_types=1);

namespace DobroSite\TimeService;

/**
 * Служба времени.
 *
 * @since 1.0
 */
interface TimeService
{
    /**
     * Возвращает текущее время.
     *
     * @since 1.0
     */
    public function getCurrentTime(): \DateTimeImmutable;

    /**
     * Возвращает часовой пояс службы.
     *
     * @since 1.0
     */
    public function getTimeZone(): \DateTimeZone;
}
