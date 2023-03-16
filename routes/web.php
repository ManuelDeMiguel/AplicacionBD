ntDate Set to TRUE to return the current date if
     *                                                    it matches the cron expression.
     * @param null|string               $timeZone         TimeZone to use instead of the system default
     *
     * @throws \RuntimeException on too many iterations
     * @throws \Exception
     *
     * @return \DateTime
     */
    public function getNextRunDate($currentTime = 'now', int $nth = 0, bool $allowCurrentDate = false, $timeZone = null): DateTime
    {
        return $this->getRunDate($currentTime, $nth, false, $allowCurrentDate, $timeZone);
    }

    /**
     * Get a previous run date relative to the current date or a specific date.
     *
     * @param string|\DateTimeInterface $currentTime      Relative calculation date
     * @param int                       $nth              Number of matches to skip before returning
     * @param bool                      $allowCurrentDate Set to TRUE to return the
     *                                                    current date if it matches the cron expression
     * @param null|string               $timeZone         TimeZone to use instead of the system default
     *
     * @throws \RuntimeException on too many iterations
     * @throws \Exception
     *
     * @return \DateTime
     *
     * @see \Cron\CronExpression::getNextRunDate
     */
    public function getPreviousRunDate($currentTime = 'now', int $nth = 0, bool $allowCurrentDate = false, $timeZone = null): DateTime
    {
        return $this->getRunDate($currentTime, $nth, true, $allowCurrentDate, $timeZone);
    }

    /**
     * Get multiple run dates starting at the current date or a specific date.
   