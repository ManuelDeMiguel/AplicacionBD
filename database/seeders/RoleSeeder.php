        // Add any delayed handles if needed.
        if ($this->delays) {
            $currentTime = Utils::currentTime();
            foreach ($this->delays as $id => $delay) {
                if ($currentTime >= $delay) {
                    unset($this->delays[$id]);
                    \curl_multi_add_handle(
                        $this->_mh,
                        $this->handles[$id]['easy']->handle
                    );
                }
            }
        }

        // Step through the task queue which may add additional requests.
        P\Utils::queue()->run();

        if ($this->active && \curl_multi_select($this->_mh, $this->selectTimeout) === -1) {
            // Perform a usleep if a select returns -1.
            // See: https://bugs.php.net/bug.php?id=61141
            \usleep(250);
        }

        while (\curl_multi_exec($this->_mh, $this->active) === \CURLM_CALL_MULTI_PERFORM);

        $this->processMessages();
    }

    /**
     * Runs until all outstanding connections have completed.
     */
    public function execute(): void
    {
        $queue = P\Utils: