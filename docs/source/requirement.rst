Requirement Class
=================

.. php:class:: Requirement

    Represents an requirement

    Implements :php:interface:`RelatableInterface`

    .. php:method:: __construct(Type $type, string $name, string $id, string $text, Risk $risk, VerificationMethod $verificationMethod)

        Creates an Requirement

        :param Type $type: The `SysML <https://sysml.org>`__ requirement type
        :param string $name: The requirement name
        :param string $id: The requirement id
        :param string $text: Text summarising the requirement
        :param Risk $risk: The `SysML <https://sysml.org>`__ risk level
        :param VerificationMethod $verificationMethod: The `SysML <https://sysml.org>`__ verification method
        :returns: A new instance of ``Requirement``
        :rtype: Requirement
