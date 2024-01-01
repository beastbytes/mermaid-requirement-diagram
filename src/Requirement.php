<?php
/**
 * @copyright Copyright © 2023 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid\RequirementDiagram;

final class Requirement
{
    private const REQUIREMENT = "%s %s {\n%sid: %s\n%stext: %s\n%srisk: %s\n%sverifyMethod: %s\n}";

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
        return sprintf(
            self::REQUIREMENT,
            $this->type->value,
            $this->name,
            $indentation,
            $this->id,
            $indentation,
            $this->text,
            $indentation,
            $this->risk->value,
            $indentation,
            $this->verificationMethod->value
        );
    }
}
