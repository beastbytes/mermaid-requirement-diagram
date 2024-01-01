<?php
/**
 * @copyright Copyright © 2023 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid\RequirementDiagram;

enum Type: string
{
    case DesignConstraint = 'designConstraint';
    case FunctionalRequirement = 'functionalRequirement';
    case InterfaceRequirement = 'interfaceRequirement';
    case PerformanceRequirement = 'performanceRequirement';
    case PhysicalRequirement = 'physicalRequirement';
    case Requirement = 'requirement';
}
