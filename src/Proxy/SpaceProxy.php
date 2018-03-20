<?php

/**
 * This file is part of the contentful-management.php package.
 *
 * @copyright 2015-2018 Contentful GmbH
 * @license   MIT
 */
declare(strict_types=1);

namespace Contentful\Management\Proxy;

use Contentful\Core\Api\Link;
use Contentful\Management\Client;
use Contentful\Management\Query;
use Contentful\Management\Resource\Behavior\CreatableInterface;
use Contentful\Management\Resource\ResourceInterface;

/**
 * SpaceProxy class.
 *
 * This class works as a lazy reference to a space resource.
 * You can use it for most space-related needs, such as fetching entries, assets and content types,
 * or creating them (attaching them to this space).
 *
 * To access this class, you can use the convenience method found in a client object.
 *
 * ``` php
 * $space = $client->getSpaceProxy($spaceId);
 * ```
 *
 * The methods provided are very similar to the getX() methods you will find in an actual space resource object.
 * The main difference is that when fetching a space resource, you will actually call the API,
 * whereas with this proxy, you're just holding a reference to a certain space.
 * This is the reason why in most situations you should prefer using a SpaceProxy rather than a space resource.
 *
 * ``` php
 * // Only the entries query will be made
 * $space = $client->getSpaceProxy($spaceId);
 * $entries = $space->getEntries();
 *
 * // Two queries will be made
 * $space = $client->getSpace($spaceId);
 * $entries = $space->getEntries();
 * ```
 */
class SpaceProxy
{
    use Extension\SpaceProxyExtension;

    /**
     * @var Client
     */
    private $client;

    /**
     * @var string
     */
    private $spaceId;

    /**
     * @param Client $client
     * @param string $spaceId
     */
    public function __construct(Client $client, string $spaceId)
    {
        $this->client = $client;
        $this->spaceId = $spaceId;
    }

    /**
     * {@inheritdoc}
     */
    protected function getSpaceId()
    {
        return $this->spaceId;
    }

    /**
     * Persist a new resource in Contentful.
     * This is a convenience method which just forwards to Client::create(),
     * but setting the `space` key to the current space ID in the parameters array.
     *
     * @param CreatableInterface         $resource
     * @param ResourceInterface|string[] $parameters
     * @param string                     $id
     *
     * @see \Contentful\Management\Client::create()
     */
    public function create(CreatableInterface $resource, $parameters = [], string $id = '')
    {
        if (\is_array($parameters)) {
            $parameters['space'] = $this->spaceId;
        }

        $this->client->create($resource, $parameters, $id);
    }

    /**
     * Resolves a Contentful link scoped to the current space.
     *
     * @param Link     $link
     * @param string[] $parameters
     *
     * @return ResourceInterface
     */
    public function resolveLink(Link $link, array $parameters = []): ResourceInterface
    {
        $parameters['space'] = $this->spaceId;

        return $this->client->resolveLink($link, $parameters);
    }
}