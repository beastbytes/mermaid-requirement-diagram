<?php

use BeastBytes\Mermaid\RequirementDiagram\Element;
use BeastBytes\Mermaid\RequirementDiagram\Relationship;
use BeastBytes\Mermaid\RequirementDiagram\RelationshipType;
use BeastBytes\Mermaid\RequirementDiagram\Requirement;
use BeastBytes\Mermaid\RequirementDiagram\Risk;
use BeastBytes\Mermaid\RequirementDiagram\Type;
use BeastBytes\Mermaid\RequirementDiagram\VerificationMethod;

test('Relationship', function (
    Element|Requirement $source,
    Element|Requirement $destination,
    RelationshipType $type
) {
    expect((new Relationship($source, $destination, $type))->render())
        ->toBe($source->getName() . ' - ' . $type->value . ' -> ' . $destination->getName())
    ;
})
    ->with('sources')
    ->with('destinations')
    ->with('relationshipTypes')
;

dataset('sources', [
    new Element('element_0', 'element_0_type'),
    new Requirement(
        Type::Requirement,
        'requirement_0',
        'r0',
        'Requirement 0 text',
        Risk::Medium,
        VerificationMethod::Test
    ),
]);

dataset('destinations', [
    new Element('element_1', 'element_1_type'),
    new Requirement(
        Type::Requirement,
        'requirement_1',
        'r1',
        'Requirement 1 text',
        Risk::Medium,
        VerificationMethod::Test
    ),
]);

dataset('relationshipTypes', [
    RelationshipType::Contains,
    RelationshipType::Copies,
    RelationshipType::Derives,
    RelationshipType::Refines,
    RelationshipType::Satisfies,
    RelationshipType::Traces,
    RelationshipType::Verifies,
]);
