<?php

namespace SebastianBergmann\PHPLOC;

interface CollectorInterface
{
    public function getPublisher();

    public function addFile($filename): void;

    public function incrementLines($number): void;

    public function incrementCommentLines($number): void;

    public function incrementLogicalLines(): void;

    public function currentClassReset(): void;

    public function currentClassStop(): void;

    public function currentClassIncrementComplexity(): void;

    public function currentClassIncrementLines(): void;

    public function currentMethodStart(): void;

    public function currentClassIncrementMethods(): void;

    public function currentMethodIncrementComplexity(): void;

    public function currentMethodIncrementLines(): void;

    public function currentMethodStop(): void;

    public function incrementFunctionLines(): void;

    public function incrementComplexity(): void;

    public function addPossibleConstantAccesses($name): void;

    public function addConstant($name): void;

    public function incrementGlobalVariableAccesses(): void;

    public function incrementSuperGlobalVariableAccesses(): void;

    public function incrementNonStaticAttributeAccesses(): void;

    public function incrementStaticAttributeAccesses(): void;

    public function incrementNonStaticMethodCalls(): void;

    public function incrementStaticMethodCalls(): void;

    public function addNamespace($namespace): void;

    public function incrementInterfaces(): void;

    public function incrementTraits(): void;

    public function incrementAbstractClasses(): void;

    public function incrementNonFinalClasses(): void;

    public function incrementFinalClasses(): void;

    public function incrementNonStaticMethods(): void;

    public function incrementStaticMethods(): void;

    public function incrementPublicMethods(): void;

    public function incrementProtectedMethods(): void;

    public function incrementPrivateMethods(): void;

    public function incrementNamedFunctions(): void;

    public function incrementAnonymousFunctions(): void;

    public function incrementGlobalConstants(): void;

    public function incrementPublicClassConstants(): void;

    public function incrementNonPublicClassConstants(): void;

    public function incrementTestClasses(): void;

    public function incrementTestMethods(): void;
}