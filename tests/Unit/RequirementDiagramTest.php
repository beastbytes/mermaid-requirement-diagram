<?php

use BeastBytes\Mermaid\RequirementDiagram\Element;
use BeastBytes\Mermaid\RequirementDiagram\Relationship;
use BeastBytes\Mermaid\RequirementDiagram\RelationshipType;
use BeastBytes\Mermaid\RequirementDiagram\Requirement;
use BeastBytes\Mermaid\RequirementDiagram\RequirementDiagram;
use BeastBytes\Mermaid\RequirementDiagram\Risk;
use BeastBytes\Mermaid\RequirementDiagram\Type;
use BeastBytes\Mermaid\RequirementDiagram\VerificationMethod;

defined('COMMENT') or define('COMMENT', 'comment');

test('Requirement Diagram', function () {
    $testReq1 = new Requirement(
        Type::Requirement,
        'test_req1',
        '1',
        'the test text.',
        Risk::High,
        VerificationMethod::Test
    );
    $testReq2 = new Requirement(
        Type::FunctionalRequirement,
        'test_req2',
        '1.1',
        'the second test text.',
        Risk::Low,
        VerificationMethod::Inspection
    );
    $testReq3 = new Requirement(
        Type::PerformanceRequirement,
        'test_req3',
         '1.2',
        'the third test text.',
        Risk::Medium,
        VerificationMethod::Demonstration
    );
    $testReq4 = new Requirement(
        Type::InterfaceRequirement,
        'test_req4',
        '1.2.1',
        'the fourth test text.',
        Risk::Medium,
        VerificationMethod::Analysis
    );
    $testReq5 = new Requirement(
        Type::PhysicalRequirement,
        'test_req5',
        '1.2.2',
        'the fifth test text.',
        Risk::Medium,
        VerificationMethod::Analysis
    );
    $testReq6 = new Requirement(
        Type::DesignConstraint,
        'test_req6',
        '1.2.3',
        'the sixth test text.',
        Risk::Medium,
        VerificationMethod::Analysis
    );
    $testEntity = new Element('test_entity', 'simulation');
    $testEntity2 = new Element('test_entity2', 'word doc', 'reqs/test_entity');
    $testEntity3 = new Element('test_entity3', 'test suite', 'github.com/all_the_tests');

    $relationship1 = new Relationship($testEntity, $testReq2, RelationshipType::Satisfies);
    $relationship2 = new Relationship($testReq1, $testReq2, RelationshipType::Traces);
    $relationship3 = new Relationship($testReq1, $testReq3, RelationshipType::Contains);
    $relationship4 = new Relationship($testReq3, $testReq4, RelationshipType::Contains);
    $relationship5 = new Relationship($testReq4, $testReq5, RelationshipType::Derives);
    $relationship6 = new Relationship($testReq5, $testReq6, RelationshipType::Refines);
    $relationship7 = new Relationship($testEntity3, $testReq5, RelationshipType::Verifies);
    $relationship8 = new Relationship($testEntity2, $testReq1, RelationshipType::Copies);

    expect((new RequirementDiagram())
        ->withComment(COMMENT)
        ->withRequirement($testReq1, $testReq2, $testReq3, $testReq4)
        ->withElement($testEntity, $testEntity2)
        ->withRelationship($relationship1, $relationship2, $relationship3, $relationship4)
        ->addRequirement($testReq5, $testReq6)
        ->addElement($testEntity3)
        ->addRelationship($relationship5, $relationship6, $relationship7, $relationship8)
        ->render()
    )
        ->toBe("<pre class=\"mermaid\">\n"
            . '%% ' . COMMENT . "\n"
            . "requirementDiagram\n"
            . "  requirement test_req1 {\n"
            . "    id: 1\n"
            . "    text: the test text.\n"
            . "    risk: high\n"
            . "    verifyMethod: test\n"
            . "  }\n"
            . "  functionalRequirement test_req2 {\n"
            . "    id: 1.1\n"
            . "    text: the second test text.\n"
            . "    risk: low\n"
            . "    verifyMethod: inspection\n"
            . "  }\n"
            . "  performanceRequirement test_req3 {\n"
            . "    id: 1.2\n"
            . "    text: the third test text.\n"
            . "    risk: medium\n"
            . "    verifyMethod: demonstration\n"
            . "  }\n"
            . "  interfaceRequirement test_req4 {\n"
            . "    id: 1.2.1\n"
            . "    text: the fourth test text.\n"
            . "    risk: medium\n"
            . "    verifyMethod: analysis\n"
            . "  }\n"
            . "  physicalRequirement test_req5 {\n"
            . "    id: 1.2.2\n"
            . "    text: the fifth test text.\n"
            . "    risk: medium\n"
            . "    verifyMethod: analysis\n"
            . "  }\n"
            . "  designConstraint test_req6 {\n"
            . "    id: 1.2.3\n"
            . "    text: the sixth test text.\n"
            . "    risk: medium\n"
            . "    verifyMethod: analysis\n"
            . "  }\n"
            . "  element test_entity {\n"
            . "    type: simulation\n"
            . "  }\n"
            . "  element test_entity2 {\n"
            . "    type: word doc\n"
            . "    docRef: reqs/test_entity\n"
            . "  }\n"
            . "  element test_entity3 {\n"
            . "    type: test suite\n"
            . "    docRef: github.com/all_the_tests\n"
            . "  }\n"
            . "  test_entity - satisfies -&gt; test_req2\n"
            . "  test_req1 - traces -&gt; test_req2\n"
            . "  test_req1 - contains -&gt; test_req3\n"
            . "  test_req3 - contains -&gt; test_req4\n"
            . "  test_req4 - derives -&gt; test_req5\n"
            . "  test_req5 - refines -&gt; test_req6\n"
            . "  test_entity3 - verifies -&gt; test_req5\n"
            . "  test_entity2 - copies -&gt; test_req1\n"
            . '</pre>'
    );
});
