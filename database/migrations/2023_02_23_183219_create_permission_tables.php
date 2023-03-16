          "\n  Warning - The configuration file did not pass validation!\n  The following problems have been detected:\n"
                    );

                    $this->write($arguments['configurationObject']->validationErrors());

                    $this->write("\n  Test results may not be as expected.\n\n");
                }
            }
        }

        if (isset($arguments['xdebugFilterFile'], $codeCoverageConfiguration)) {
            $this->write(PHP_EOL . 'Please note that --dump-xdebug-filter and --prepend are deprecated and will be removed in PHPUnit 10.' . PHP_EOL);

            $script = (new XdebugFilterScriptGenerator)->generate($codeCoverageConfiguration);

            if ($arguments['xdebugFilterFile'] !== 'php://stdout' && $arguments['xdebugFilterFile'] !== 'php://stderr' && !Filesystem::createDirectory(dirname($arguments['xdebugFilterFile']))) {
                $this->write(sprintf('Cannot write Xdebug filter script to %s ' . PHP_EOL, $arguments['xdebugFilterFile']));

                exit(self::EXCEPTION_EXIT);
            }

            file_put_contents($arguments['xdebugFilterFile'], $script);

            $this->write(sprintf('Wrote Xdebug filter script to %s ' . PHP_EOL . PHP_EOL, $arguments['xdebugFilterFile']));

            exit(self::SUCCESS_EXIT);
        }

        $this->write("\n");

        if (isset($codeCoverage)) {
            $result->setCodeCoverage($codeCoverage);
        }

        $result->beStrictAboutTestsThatDoNotTestAnything($arguments['reportUselessTests']);
        $result->beStrictAboutOutputDuringTests($arguments['disallowTestOutput']);
        $result->beStrictAboutTodoAnnotatedTests($arguments['disallowTodoAnnotatedTests']);
        $result->beStrictAboutResourceUsageDuringSmallTests($arguments['beStrictAboutResourceUsageDuringSmallTests']);

        if ($arguments['enforceTimeLimit'] === true && !(new Invoker)->canInvokeWithTimeout()) {
            $this->writeMessage('Error', 'PHP extension pcntl is required for enforcing time limits');
        }

        $result->enforceTimeLimit($arguments['enforceTimeLimit']);
        $result->setDefaultTimeLimit($arguments['defaultTimeLimit']);
        $result->setTimeoutForSmallTests($arguments['timeoutForSmallTests']);
        $result->setTimeoutForMediumTests($arguments['timeoutForMediumTests']);
        $result->setTimeoutForLargeTests($arguments['timeoutForLargeTests']);

        if (isset($arguments['forceCoversAnnotation']) && $arguments['forceCoversAnnotation'] === true) {
            $result->forceCoversAnnotation();
        }

        $this->processSuiteFilters($suite, $arguments);
        $suite->setRunTestInSeparateProcess($arguments['processIsolation']);

        foreach ($this->extensions as $extension) {
            if ($extension instanceof BeforeFirstTestHook) {
                $extension->executeBeforeFirstTest();
            }
        }

        $suite->run($result);

        foreach ($this->extensions as $extension) {
            if ($extension instanceof AfterLastTestHook) {
                $extension->executeAfterLastTest();
            }
        }

        $result->flushListeners();
        $this->printer->printResult($result);

        if (isset($codeCoverage)) {
            if (isset($arguments['coverageClover'])) {
                $this->codeCoverageGenerationStart('Clover XML');

                try {
                    $writer = new CloverReport;
                    $writer->process($codeCoverage, $arguments['coverageClover']);

                    $this->codeCoverageGenerationSucceeded();

                    unset($writer);
                } catch (CodeCoverageException $e) {
                    $this->codeCoverageGenerationFailed($e);
                }
            }

            if (isset($arguments['coverageCobertura'])) {
                $this->codeCoverageGenerationStart('Cobertura XML');

                try {
                    $writer = new CoberturaReport;
                    $writer->process($codeCoverage, $arguments['coverageCobertura']);

                    $this->codeCoverageGenerationSucceeded();

                    unset($writer);
                } catch (CodeCoverageException $e) {
                    $this->codeCoverageGenerationFailed($e);
                }
            }

            if (isset($arguments['coverageCrap4J'])) {
                $this->codeCoverageGenerationStart('Crap4J XML');

                try {
                    $writer = new Crap4jReport($arguments['crap4jThreshold']);
                    $writer->process($codeCoverage, $arguments['coverageCrap4J']);

                    $this->codeCoverageGenerationSucceeded();

                    unset($writer);
                } catch (CodeCoverageException $e) {
                    $this->codeCoverageGenerationFailed($e);
                }
            }

            if (isset($arguments['coverageHtml'])) {
                $this->codeCoverageGenerationStart('HTML');

                try {
                    $writer = new HtmlReport(
                        $arguments['reportLowUpperBound'],
                        $arguments['reportHighLowerBound'],
                        sprintf(
                            ' and <a href="https://phpunit.de/">PHPUnit %s</a>',
                            Version::id()
                        )
                    );

                    $writer->process($codeCoverage, $arguments['coverageHtml']);

                    $this->codeCoverageGenerationSucceeded();

                    unset($writer);
                } catch (CodeCoverageException $e) {
                    $this->codeCoverageGenerationFailed($e);
                }
            }

            if (isset($arguments['coveragePHP'])) {
                $this->codeCoverageGenerationStart('PHP');

                try {
                    $writer = new PhpReport;
                    $writer->process($codeCoverage, $arguments['coveragePHP']);

                    $this->codeCoverageGenerationSucceeded();

                    unset($writer);
                } catch (CodeCoverageException $e) {
                    $this->codeCoverageGenerationFailed($e);
                }
            }

            if (isset($arguments['coverageText'])) {
                if ($arguments['coverageText'] === 'php://stdout') {
                    $outputStream = $this->printer;
                    $colors       = $arguments['colors'] && $arguments['colors'] !== DefaultResultPrinter::COLOR_NEVER;
                } else {
                    $outputStream = new