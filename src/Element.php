<?php
/**
 * @copyright Copyright © 2023 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid\RequirementDiagram;

use BeastBytes\Mermaid\Mermaid;
use phpDocumentor\Reflection\Types\Self_;

final class Element
{
    public function __construct(
        private readonly string $name,
        private readonly string $type,
        private readonly string $docRef = ''
    )
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    /** @internal  */
    public function render(string $indentation): string
    {
        $body = ['type: ' . $this->type];

        if ($this->docRef !== '') {
            $body[] = 'docRef: ' . $this->docRef;
        }

        $body = Mermaid::INDENTATION . implode("\n" . $indentation . Mermaid::INDENTATION, $body);

        return $indentation . implode(
            "\n" . $indentation,
            [
                'element ' . $this->name . ' {',
                $body,
                '}'
            ]
        );
    }
}
