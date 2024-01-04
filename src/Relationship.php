<?php
/**
 * @copyright Copyright © 2023 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid\RequirementDiagram;

final class Relationship
{
    public function __construct(
        private readonly Element|Requirement $source,
        private readonly Element|Requirement $destination,
        private readonly RelationshipType $type
    )
    {
    }

    /** @internal  */
    public function render(string $indentation): string
    {
        return $indentation
            . $this->source->getName()
            . ' - '
            . $this->type->value
            . ' -> '
            . $this->destination->getName()
        ;
    }
}
