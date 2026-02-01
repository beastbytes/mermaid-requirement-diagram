<?php

use BeastBytes\Mermaid\Mermaid;
use BeastBytes\Mermaid\RequirementDiagram\Requirement;
use BeastBytes\Mermaid\RequirementDiagram\Risk;
use BeastBytes\Mermaid\RequirementDiagram\Type;
use BeastBytes\Mermaid\RequirementDiagram\VerifyMethod;

defined('COMMENT') or define('COMMENT', 'comment');

test('Requirement', function (Risk $risk, Type $type, VerifyMethod $verificationMethod) {
    expect((new Requirement($type, 'requirement_0', 'r0', 'Some text', $risk, $verificationMethod))
        ->withComment(COMMENT)
        ->render('')
    )
        ->toBe(<<<EXPECTED
%% comment
$type->name "requirement_0" {
  id: "r0"
  text: "Some text"
  risk: $risk->name
  verifyMethod: $verificationMethod->name
}
EXPECTED
        )
    ;
})
    ->with('risks')
    ->with('types')
    ->with('verificationMethods')
;

dataset('risks', [
    Risk::high,
    Risk::low,
    Risk::medium,
]);

dataset('types', [
    Type::designConstraint,
    Type::functionalRequirement,
    Type::interfaceRequirement,
    Type::performanceRequirement,
    Type::physicalRequirement,
    Type::requirement,
]);

dataset('verificationMethods', [
    VerifyMethod::analysis,
    VerifyMethod::demonstration,
    VerifyMethod::inspection,
    VerifyMethod::test,
]);