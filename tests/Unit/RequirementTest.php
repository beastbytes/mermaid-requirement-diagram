<?php

use BeastBytes\Mermaid\Mermaid;
use BeastBytes\Mermaid\RequirementDiagram\Requirement;
use BeastBytes\Mermaid\RequirementDiagram\Risk;
use BeastBytes\Mermaid\RequirementDiagram\Type;
use BeastBytes\Mermaid\RequirementDiagram\VerificationMethod;

test('Requirement', function (Risk $risk, Type $type, VerificationMethod $verificationMethod) {
    expect((new Requirement($type, 'requirement_0', 'r0', 'Some text', $risk, $verificationMethod))
        ->render(Mermaid::INDENTATION)
    )
        ->toBe($type->value . " requirement_0 {\n"
            . Mermaid::INDENTATION . "id: r0\n"
            . Mermaid::INDENTATION . "text: Some text\n"
            . Mermaid::INDENTATION . 'risk: ' . $risk->value . "\n"
            . Mermaid::INDENTATION . 'verifyMethod: ' . $verificationMethod->value . "\n"
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
