<?php

use BeastBytes\Mermaid\Mermaid;
use BeastBytes\Mermaid\RequirementDiagram\Element;

test('Element', function () {
    expect((new Element('element_0', 'element_0_type'))->render(Mermaid::INDENTATION))
        ->toBe("element element_0 {\n"
            . Mermaid::INDENTATION . "type: element_0_type\n"
            . '}'
        )
    ;
});

test('Element with doc ref', function () {
    expect((new Element('element_0', 'element_0_type', 'element_0_docref'))
        ->render(Mermaid::INDENTATION)
    )
        ->toBe("element element_0 {\n"
            . Mermaid::INDENTATION . "type: element_0_type\n"
            . Mermaid::INDENTATION . "docRef: element_0_docref\n"
            . '}'
        )
    ;
});
