ion setUp(): void
    {
    }

    /**
     * Performs assertions shared by all tests of a test case.
     *
     * This method is called between setUp() and test.
     */
    protected function assertPreConditions(): void
    {
    }

    /**
     * Performs assertions shared by all tests of a test case.
     *
     * This method is called between test and tearDown().
     */
    protected function assertPostConditions(): void
    {
    }

    /**
     * This method is called after each test.
     */
    protected function tearDown(): void
    {
    }

    /**
     * Returns a string representation of the test case.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     */
    public function toString(): string
    {
        try {
            $class = new ReflectionClass($this);
            // @codeCoverageIgnoreStart
        } catch (ReflectionException $e) {
            throw new Exception(
                $e->getMessage(),
                $e->getCode(),