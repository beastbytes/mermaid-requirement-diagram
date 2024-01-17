<?php
/**
 * @copyright Copyright © 2023 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid\RequirementDiagram;

use BeastBytes\Mermaid\CommentTrait;
use BeastBytes\Mermaid\Mermaid;

final class Requirement
{
    use CommentTrait;

    public function __construct(
        private readonly Type $type,
        private readonly string $name,
        private readonly string $id,
        private readonly string $text,
        private readonly Risk $risk,
        private readonly VerificationMethod $verificationMethod
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
        $output[] = $indentation . $this->type->value . ' ' . $this->name . ' {';
        $output[] = $indentation . Mermaid::INDENTATION . 'id: ' . $this->id;
        $output[] = $indentation . Mermaid::INDENTATION . 'text: ' . $this->text;
        $output[] = $indentation . Mermaid::INDENTATION . 'risk: ' . $this->risk->value;
        $output[] = $indentation . Mermaid::INDENTATION . 'verifyMethod: ' . $this->verificationMethod->value;
        $output[] = $indentation . '}';

        return implode("\n", $output);
    }
}
