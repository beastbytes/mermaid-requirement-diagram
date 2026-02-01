<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\RequirementDiagram;

use BeastBytes\Mermaid\CommentTrait;
use BeastBytes\Mermaid\Diagram;
use BeastBytes\Mermaid\RenderItemsTrait;

final class RequirementDiagram extends Diagram
{
    use CommentTrait;
    use RenderItemsTrait;

    private const string TYPE = 'requirementDiagram';

    /** @var Element[] $elements */
    private array $elements = [];
    /** @var Relationship[] $relationships */
    private array $relationships = [];
    /** @var Requirement[] $s */
    private array $requirements = [];

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

    protected function renderDiagram(): string
    {
        $output = [];

        $output[] = $this->renderComment('');
        $output[] = self::TYPE;
        $output[] = $this->renderItems($this->requirements, '');
        $output[] = $this->renderItems($this->elements, '');
        $output[] = $this->renderItems($this->relationships, '');

        return implode("\n", array_filter($output, fn($v) => !empty($v)));
    }
}
