<?php
/**
 * @copyright Copyright © 2023 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid\RequirementDiagram;

use phpDocumentor\Reflection\Types\Self_;

final class Element
{
    private const DOC_REF = "\n%sdocRef: %s";
    private const ELEMENT = "element %s {\n%s%s\n}";
    private const TYPE = "%stype: %s";

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
        return sprintf(
            self::ELEMENT,
            $this->name,
            sprintf(self::TYPE, $indentation, $this->type),
            $this->docRef === '' ? '' : sprintf(self::DOC_REF, $indentation, $this->docRef),
        );
    }
}
