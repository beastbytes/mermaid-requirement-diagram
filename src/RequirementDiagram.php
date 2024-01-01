<?php
/**
 * @copyright Copyright © 2023 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid\RequirementDiagram;

use BeastBytes\Mermaid\Mermaid;
use BeastBytes\Mermaid\MermaidInterface;

final class RequirementDiagram implements MermaidInterface
{
    private const TYPE = 'requirementDiagram';

    /** @var Element[] $elements */
    private array $elements = [];
    /** @var Relationship[] $relationships */
    private array $relationships = [];
    /** @var Requirement[] $s */
    private array $requirements = [];

    public function __toString(): string
    {
        return $this->render();
    }

    public function addElement(Element ...$element): self
    {
        $new = clone $this;
        $new->elements = array_merge($this->elements, $element);
        return $new;
    }

    public function withElement(Element ...$element): self
    {
        $new = clone $this;
        $new->elements = $element;
        return $new;
    }

    public function addRelationship(Relationship ...$relationship): self
    {
        $new = clone $this;
        $new->relationships = array_merge($this->relationships, $relationship);
        return $new;
    }

    public function withRelationship(Relationship ...$relationship): self
    {
        $new = clone $this;
        $new->relationships = $relationship;
        return $new;
    }

    public function addRequirement(Requirement ...$requirement): self
    {
        $new = clone $this;
        $new->requirements = array_merge($this->requirements, $requirement);
        return $new;
    }

    public function withRequirement(Requirement ...$requirement): self
    {
        $new = clone $this;
        $new->requirements = $requirement;
        return $new;
    }

    public function render(): string
    {
        $output = [];

        $output[] = self::TYPE;

        foreach ($this->requirements as $requirement) {
            $output[] = $requirement->render(Mermaid::INDENTATION);
        }

        foreach ($this->elements as $element) {
            $output[] = $element->render(Mermaid::INDENTATION);
        }

        foreach ($this->relationships as $relationship) {
            $output[] = $relationship->render();
        }

        return Mermaid::render($output);
    }
}
