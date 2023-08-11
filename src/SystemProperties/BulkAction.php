<?php

declare(strict_types=1);

namespace Contentful\Management\SystemProperties;

class BulkAction extends BaseSystemProperties
{
    use Component\EnvironmentTrait;
    use Component\SpaceTrait;

    public function __construct(array $sys)
    {
        $this->init('BulkAction', $sys['id'] ?? '');
        $this->initEnvironment($sys);
        $this->initSpace($sys);
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize(): array
    {
        return \array_merge(
            parent::jsonSerialize(),
            $this->jsonSerializeEnvironment(),
            $this->jsonSerializeSpace()
        );
    }
}