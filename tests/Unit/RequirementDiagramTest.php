<?php

use BeastBytes\Mermaid\Mermaid;
use BeastBytes\Mermaid\RequirementDiagram\Element;
use BeastBytes\Mermaid\RequirementDiagram\Relationship;
use BeastBytes\Mermaid\RequirementDiagram\RelationshipType;
use BeastBytes\Mermaid\RequirementDiagram\Requirement;
use BeastBytes\Mermaid\RequirementDiagram\RequirementDiagram;
use BeastBytes\Mermaid\RequirementDiagram\Risk;
use BeastBytes\Mermaid\RequirementDiagram\Type;
use BeastBytes\Mermaid\RequirementDiagram\VerifyMethod;

defined('COMMENT') or define('COMMENT', 'comment');

test('Requirement Diagram', function () {
    $testReq1 = new Requirement(
        Type::requirement,
        'test_req1',
        '1',
        'the test text.',
        Risk::high,
        VerifyMethod::test
    );
    $testReq2 = new Requirement(
        Type::functionalRequirement,
        'test_req2',
        '1.1',
        'the second test text.',
        Risk::low,
        VerifyMethod::inspection
    );
    $testReq3 = new Requirement(
        Type::performanceRequirement,
        'test_req3',
         '1.2',
        'the third test text.',
        Risk::medium,
        VerifyMethod::demonstration
    );
    $testReq4 = new Requirement(
        Type::interfaceRequirement,
        'test_req4',
        '1.2.1',
        'the fourth test text.',
        Risk::medium,
        VerifyMethod::analysis
    );
    $testReq5 = new Requirement(
        Type::physicalRequirement,
        'test_req5',
        '1.2.2',
        'the fifth test text.',
        Risk::medium,
        VerifyMethod::analysis
    );
    $testReq6 = new Requirement(
        Type::designConstraint,
        'test_req6',
        '1.2.3',
        'the sixth test text.',
        Risk::medium,
        VerifyMethod::analysis
    );
    $testEntity = new Element('test_entity', 'simulation');
    $testEntity2 = new Element('test_entity2', 'word doc', 'reqs/test_entity');
    $testEntity3 = new Element('test_entity3', 'test suite', 'github.com/all_the_tests');

    $relationship1 = new Relationship($testEntity, $testReq2, RelationshipType::satisfies);
    $relationship2 = new Relationship($testReq1, $testReq2, RelationshipType::traces);
    $relationship3 = new Relationship($testReq1, $testReq3, RelationshipType::contains);
    $relationship4 = new Relationship($testReq3, $testReq4, RelationshipType::contains);
    $relationship5 = new Relationship($testReq4, $testReq5, RelationshipType::derives);
    $relationship6 = new Relationship($testReq5, $testReq6, RelationshipType::refines);
    $relationship7 = new Relationship($testEntity3, $testReq5, RelationshipType::verifies);
    $relationship8 = new Relationship($testEntity2, $testReq1, RelationshipType::copies);

    expect(Mermaid::create(RequirementDiagram::class)
        ->withComment(COMMENT)
        ->withRequirement($testReq1, $testReq2, $testReq3, $testReq4)
        ->withElement($testEntity, $testEntity2)
        ->withRelationship($relationship1, $relationship2, $relationship3, $relationship4)
        ->addRequirement($testReq5, $testReq6)
        ->addElement($testEntity3)
        ->addRelationship($relationship5, $relationship6, $relationship7, $relationship8)
        ->render()
    )
        ->toBe(<<<EXPECTED
<pre class="mermaid">
%% comment
requirementDiagram
  requirement "test_req1" {
    id: "1"
    text: "the test text."
    risk: high
    verifyMethod: test
  }
  functionalRequirement "test_req2" {
    id: "1.1"
    text: "the second test text."
    risk: low
    verifyMethod: inspection
  }
  performanceRequirement "test_req3" {
    id: "1.2"
    text: "the third test text."
    risk: medium
    verifyMethod: demonstration
  }
  interfaceRequirement "test_req4" {
    id: "1.2.1"
    text: "the fourth test text."
    risk: medium
    verifyMethod: analysis
  }
  physicalRequirement "test_req5" {
    id: "1.2.2"
    text: "the fifth test text."
    risk: medium
    verifyMethod: analysis
  }
  designConstraint "test_req6" {
    id: "1.2.3"
    text: "the sixth test text."
    risk: medium
    verifyMethod: analysis
  }
  element "test_entity" {
    type: "simulation"
  }
  element "test_entity2" {
    type: "word doc"
    docRef: "reqs/test_entity"
  }
  element "test_entity3" {
    type: "test suite"
    docRef: "github.com/all_the_tests"
  }
  test_entity - satisfies -> test_req2
  test_req1 - traces -> test_req2
  test_req1 - contains -> test_req3
  test_req3 - contains -> test_req4
  test_req4 - derives -> test_req5
  test_req5 - refines -> test_req6
  test_entity3 - verifies -> test_req5
  test_entity2 - copies -> test_req1
</pre>
EXPECTED
    );
});