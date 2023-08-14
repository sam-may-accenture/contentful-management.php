<?php

namespace Contentful\Management\Resource;

use Contentful\Management\Resource\Behavior\CreatableInterface;
use function GuzzleHttp\json_encode as guzzle_json_encode;

class BulkActionValidate extends BulkAction implements CreatableInterface
{
    /**
     * @param Link[] $items
     */
    public function __construct(array $items = [])
    {
        $this->action = 'validate';
        $this->items = $items;
    }

    /**
     * {@inheritdoc}
     */
    public function asRequestBody()
    {
        $body = $this->jsonSerialize();

        unset($body['sys']);
        unset($body['error']);
        unset($body['action']);

        return guzzle_json_encode((object) $body, \JSON_UNESCAPED_UNICODE);
    }

    /**
     * {@inheritdoc}
     */
    public function getHeadersForCreation(): array
    {
        return [];
    }
}