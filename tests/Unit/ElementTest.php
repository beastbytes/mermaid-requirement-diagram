<?php

use BeastBytes\Mermaid\RequirementDiagram\Element;

defined('COMMENT') or define('COMMENT', 'comment');

test('Element', function () {
    expect((new Element('element_0', 'element_0_type'))->render(''))
        ->toBe(<<<EXPECTED
element "element_0" {
  type: "element_0_type"
}
EXPECTED
        )
    ;
});

test('Element with doc ref', function () {
    expect((new Element('element_0', 'element_0_type', 'element_0_docref'))
               ->render('')
    )
        ->toBe(<<<EXPECTED
element "element_0" {
  type: "element_0_type"
  docRef: "element_0_docref"
}
EXPECTED
        )
    ;
});

test('Element with comment', function () {
    expect((new Element('element_0', 'element_0_type', 'element_0_docref'))
        ->withComment(COMMENT)
        ->render('')
    )
        ->toBe(<<<EXPECTED
%% comment
element "element_0" {
  type: "element_0_type"
  docRef: "element_0_docref"
}
EXPECTED
        )
    ;
});