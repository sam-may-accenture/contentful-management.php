<?php

/**
 * This file is part of the contentful/contentful-management package.
 *
 * @copyright 2015-2021 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Contentful\Management\Mapper\ContentType\Validation;

use Contentful\Management\Mapper\BaseMapper;
use Contentful\Management\Resource\ContentType\Validation\EnabledMarksValidation as ResourceClass;

/**
 * Class EnabledMarksValidation.
 */
class EnabledMarksValidation extends BaseMapper
{
    /**
     * {@inheritdoc}
     */
    public function map($resource, array $data): ResourceClass
    {
        return new ResourceClass();
    }
}
