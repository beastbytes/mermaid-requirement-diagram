<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\RequirementDiagram;

final class Relationship
{
    private const string RELATIONSHIP = '%s - %s -> %s';

    public function __construct(
        private readonly RelatableInterface $source,
        private readonly RelatableInterface $destination,
        private readonly RelationshipType $type
    )
    {
    }

    /** @internal  */
    public function render(string $indentation): string
    {
        return $indentation . sprintf(
            self::RELATIONSHIP,
            $this->source->getName(),
            $this->type->name,
            $this->destination->getName()
        );
    }
}