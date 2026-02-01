Usage
=====

RequirementDiagram allows the creation of requirement diagrams.

RequirementDiagram follows `SysML V1.6 <https://sysml.org>`_

A requirement diagram consists of `Requirements`, `Elements`, and the `Relationships` between them.

Requirement
+++++++++++

A requirement contains the requirement type, name, id, text, risk,
and a verification method for showing that the requirement has been met.

Element
+++++++

Elements typically provide references to other documents. They contain a name, type, and reference; all user defined.

Relationship
++++++++++++

Relationships link Requirements and/or Elements. They contain the source node, destination node and link type.

Example
-------

PHP
+++

.. code-block:: php

    $testReq1 = new Requirement(
        Type::requirement,
        'test_req1',
        '1',
        'the test text.',
        Risk::high,
        VerificationMethod::test
    );
    $testReq2 = new Requirement(
        Type::functionalRequirement,
        'test_req2',
        '1.1',
        'the second test text.',
        Risk::low,
        VerificationMethod::inspection
    );
    $testReq3 = new Requirement(
        Type::performanceRequirement,
        'test_req3',
         '1.2',
        'the third test text.',
        Risk::medium,
        VerificationMethod::demonstration
    );
    $testReq4 = new Requirement(
        Type::interfaceRequirement,
        'test_req4',
        '1.2.1',
        'the fourth test text.',
        Risk::medium,
        VerificationMethod::analysis
    );
    $testReq5 = new Requirement(
        Type::physicalRequirement,
        'test_req5',
        '1.2.2',
        'the fifth test text.',
        Risk::medium,
        VerificationMethod::analysis
    );
    $testReq6 = new Requirement(
        Type::designConstraint,
        'test_req6',
        '1.2.3',
        'the sixth test text.',
        Risk::medium,
        VerificationMethod::analysis
    );
    $testEntity = new Element('test_entity', 'simulation');
    $testEntity2 = new Element('test_entity2', 'word doc', 'reqs/test_entity');
    $testEntity3 = new Element('test_entity3', 'test suite', 'github.com/all_the_tests');

    echo Mermaid::create(RequirementDiagram::class)
        ->withRequirement($testReq1, $testReq2, $testReq3, $testReq4)
        ->withElement($testEntity, $testEntity2)
        ->withRelationship(
            new Relationship($testEntity, $testReq2, RelationshipType::satisfies),
            new Relationship($testReq1, $testReq2, RelationshipType::traces),
            new Relationship($testReq1, $testReq3, RelationshipType::contains),
            new Relationship($testReq3, $testReq4, RelationshipType::contains)
        )
        ->addRequirement($testReq5, $testReq6)
        ->addElement($testEntity3)
        ->addRelationship(
            new Relationship($testReq4, $testReq5, RelationshipType::derives),
            new Relationship($testReq5, $testReq6, RelationshipType::refines),
            new Relationship($testEntity3, $testReq5, RelationshipType::verifies),
            new Relationship($testEntity2, $testReq1, RelationshipType::copies)
        )
        ->render()
    ;

Generated Mermaid
+++++++++++++++++

.. code-block:: html

    <pre class="mermaid">
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

Mermaid Diagram
+++++++++++++++

.. mermaid::

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

