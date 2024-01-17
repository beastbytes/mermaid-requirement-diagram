<?php

use BeastBytes\Mermaid\RequirementDiagram\Element;

defined('COMMENT') or define('COMMENT', 'comment');

test('Element', function () {
    expect((new Element('element_0', 'element_0_type'))->render(''))
        ->toBe("element element_0 {\n"
            . "  type: element_0_type\n"
            . '}'
        )
    ;
});

test('Element with doc ref', function () {
    expect((new Element('element_0', 'element_0_type', 'element_0_docref'))
               ->render('')
    )
        ->toBe("element element_0 {\n"
               . "  type: element_0_type\n"
               . "  docRef: element_0_docref\n"
               . '}'
        )
    ;
});

test('Element with comment', function () {
    expect((new Element('element_0', 'element_0_type', 'element_0_docref'))
        ->withComment(COMMENT)
        ->render('')
    )
        ->toBe('%% ' . COMMENT . "\n"
            . "element element_0 {\n"
            . "  type: element_0_type\n"
            . "  docRef: element_0_docref\n"
            . '}'
        )
    ;
});
