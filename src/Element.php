<?php
/**
 * @copyright Copyright © 2023 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid\RequirementDiagram;

use BeastBytes\Mermaid\CommentTrait;
use BeastBytes\Mermaid\Mermaid;

final class Element
{
    use CommentTrait;

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
        $output = [];

        $this->renderComment($indentation, $output);
        $output[] = $indentation . 'element ' . $this->name . ' {';
        $output[] = $indentation . Mermaid::INDENTATION . 'type: ' . $this->type;
        if ($this->docRef !== '') {
            $output[] = $indentation . Mermaid::INDENTATION . 'docRef: ' . $this->docRef;
        }
        $output[] = $indentation . '}';

        return implode("\n", $output);
    }
}
