<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\RequirementDiagram;

enum Type
{
    case designConstraint;
    case functionalRequirement;
    case interfaceRequirement;
    case performanceRequirement;
    case physicalRequirement;
    case requirement;
}