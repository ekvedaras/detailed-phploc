<?php

namespace SebastianBergmann\PHPLOC;

class SingleFileCollectorThatCollectsToAggregatedCollector implements CollectorInterface
{
    /** @var CollectorInterface */
    private $singleFileCollector;

    /** @var CollectorInterface */
    private $aggregatedCollector;

    /** @var CollectorInterface[] */
    private $collectors = [];

    public function __construct(CollectorInterface $singleFileCollector, CollectorInterface $aggregatedCollector)
    {
        $this->collectors = [
            'singleFile' => $this->singleFileCollector = $singleFileCollector,
            'aggregated' => $this->aggregatedCollector = $aggregatedCollector,
        ];
    }

    public function getSingleFilePublisher()
    {
        return $this->singleFileCollector->getPublisher();
    }

    public function getPublisher()
    {
        return $this->aggregatedCollector->getPublisher();
    }

    private function proxy(string $method, array $args): void
    {
        $method = substr($method, strpos($method, '::') + 2);
        array_walk($this->collectors, function (CollectorInterface $collector) use ($args, $method) {
            call_user_func_array([$collector, $method], $args);
        });
    }

    public function addFile($filename): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function incrementLines($number): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function incrementCommentLines($number): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function incrementLogicalLines(): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function currentClassReset(): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function currentClassStop(): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function currentClassIncrementComplexity(): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function currentClassIncrementLines(): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function currentMethodStart(): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function currentClassIncrementMethods(): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function currentMethodIncrementComplexity(): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function currentMethodIncrementLines(): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function currentMethodStop(): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function incrementFunctionLines(): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function incrementComplexity(): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function addPossibleConstantAccesses($name): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function addConstant($name): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function incrementGlobalVariableAccesses(): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function incrementSuperGlobalVariableAccesses(): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function incrementNonStaticAttributeAccesses(): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function incrementStaticAttributeAccesses(): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function incrementNonStaticMethodCalls(): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function incrementStaticMethodCalls(): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function addNamespace($namespace): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function incrementInterfaces(): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function incrementTraits(): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function incrementAbstractClasses(): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function incrementNonFinalClasses(): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function incrementFinalClasses(): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function incrementNonStaticMethods(): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function incrementStaticMethods(): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function incrementPublicMethods(): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function incrementProtectedMethods(): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function incrementPrivateMethods(): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function incrementNamedFunctions(): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function incrementAnonymousFunctions(): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function incrementGlobalConstants(): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function incrementPublicClassConstants(): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function incrementNonPublicClassConstants(): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function incrementTestClasses(): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }

    public function incrementTestMethods(): void
    {
        $this->proxy(__METHOD__, func_get_args());
    }
}