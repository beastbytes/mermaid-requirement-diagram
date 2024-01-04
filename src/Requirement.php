<?php
/**
 * @copyright Copyright © 2023 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid\RequirementDiagram;

use BeastBytes\Mermaid\Mermaid;

final class Requirement
{
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
        $body = $indentation . Mermaid::INDENTATION . implode(
            "\n" . $indentation . Mermaid::INDENTATION,
            [
                'id: ' . $this->id,
                'text: ' . $this->text,
                'risk: ' . $this->risk->value,
                'verifyMethod: ' . $this->verificationMethod->value
            ]
        );

        return implode(
            "\n",
            [
                $indentation . $this->type->value . ' ' . $this->name . ' {',
                $body,
                $indentation . '}'
            ]
        );
    }
}
