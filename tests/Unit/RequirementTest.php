<?php

use BeastBytes\Mermaid\Mermaid;
use BeastBytes\Mermaid\RequirementDiagram\Requirement;
use BeastBytes\Mermaid\RequirementDiagram\Risk;
use BeastBytes\Mermaid\RequirementDiagram\Type;
use BeastBytes\Mermaid\RequirementDiagram\VerificationMethod;

defined('COMMENT') or define('COMMENT', 'comment');

test('Requirement', function (Risk $risk, Type $type, VerificationMethod $verificationMethod) {
    expect((new Requirement($type, 'requirement_0', 'r0', 'Some text', $risk, $verificationMethod))
        ->withComment(COMMENT)
        ->render('')
    )
        ->toBe('%% ' . COMMENT . "\n"
            . $type->value . " requirement_0 {\n"
            . "  id: r0\n"
            . "  text: Some text\n"
            . '  risk: ' . $risk->value . "\n"
            . '  verifyMethod: ' . $verificationMethod->value . "\n"
            . '}'
        )
    ;
})
    ->with('risks')
    ->with('types')
    ->with('verificationMethods')
;

dataset('risks', [
    Risk::High,
    Risk::Low,
    Risk::Medium,
]);

dataset('types', [
    Type::DesignConstraint,
    Type::FunctionalRequirement,
    Type::InterfaceRequirement,
    Type::PerformanceRequirement,
    Type::PhysicalRequirement,
    Type::Requirement,
]);

dataset('verificationMethods', [
    VerificationMethod::Analysis,
    VerificationMethod::Demonstration,
    VerificationMethod::Inspection,
    VerificationMethod::Test,
]);
