<?php

/**
 * This file is part of the contentful-management.php package.
 *
 * @copyright 2015-2017 Contentful GmbH
 * @license   MIT
 */

namespace Contentful\Tests\Unit\Resource;

use Contentful\Management\ResourceBuilder;
use PHPUnit\Framework\TestCase;

class EntrySnapshotTest extends TestCase
{
    public function testJsonSerialize()
    {
        $builder = new ResourceBuilder();

        $data = [
            'sys' => [
                'type' => 'Snapshot',
                'snapshotEntityType' => 'Entry',
            ],
            'snapshot' => [
                'fields' => [
                    'name' => [
                        'en-US' => 'Consuela Bananahammock',
                    ],
                    'jobTitle' => [
                        'en-US' => 'Princess',
                    ],
                ],
                'sys' => [
                    'type' => 'Entry',
                ],
            ],
        ];

        $entrySnapshot = $builder->buildObjectsFromRawData($data);
        $json = '{"snapshot":{"sys":{"type":"Entry"},"fields":{"name":{"en-US":"Consuela Bananahammock"},"jobTitle":{"en-US":"Princess"}}},"sys":{"type":"Snapshot","snapshotEntityType":"Entry"}}';

        $this->assertJsonStringEqualsJsonString($json, json_encode($entrySnapshot));
    }
}