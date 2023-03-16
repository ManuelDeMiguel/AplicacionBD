 }

    /**
     * Authorize a given condition or callback.
     *
     * @param  \Illuminate\Auth\Access\Response|\Closure|bool  $condition
     * @param  string|null  $message
     * @param  string|null  $code
     * @param  bool  $allowWhenResponseIs
     * @return \Illuminate\Auth\Access\Response
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    protected function authorizeOnDemand($condition, $message, $code, $allowWhenResponseIs)
    {
        $user = $this->resolveUser();

        if ($condition instanceof Closure) {
            $response = $this->canBeCalledWithUser($user, $condition)
                            ? $condition($user)
                            : new Response(false, $message, $code);
        } else {
            $response = $condition;
        }

        return with($response instanceof Response ? $response : new Response(
            (bool) $response === $allowWhenResponseIs, $message, $code
        ))->authorize();
    }

    /**
     * Define a new ability.
     *
     * @param  string  $ability
     * @param  callable|array|string  $callback
     * @return $this
     *
     * @throws \InvalidArgumentException
     */
    public function define($ability, $callback)
    {
        if (is_array($callback) && isset($callback[0]) && is_string($callback[0])) {
            $callback = $callback[0].'@'.$callback[1];
        }

        if (is_callable($callback)) {
            $this->abilities[$ability] = $callback;
        } elseif (is_string($callback)) {
            $this->stringCallbacks[$ability] = $callback;

            $this->abilities[$ability] = $this->buildAbilityCallback($ability, $callback);
        } else {
            throw new InvalidArgumentException("Callback must be a callable, callback array, 