<?php
/**
 * @copyright Copyright © 2023 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid\RequirementDiagram;

enum RelationshipType: string
{
    case Contains = 'contains';
    case Copies = 'copies';
    case Derives = 'derives';
    case Refines = 'refines';
    case Satisfies = 'satisfies';
    case Traces = 'traces';
    case Verifies = 'verifies';
}
