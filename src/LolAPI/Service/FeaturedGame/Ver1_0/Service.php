<?php
namespace LolAPI\Service\FeaturedGame\Ver1_0;

use LolAPI\AbstractService;

class Service extends AbstractService
{
    /**
     * Create and returns a new "featuredGames" query
     * @param Request $request
     * @return Query
     */
    public function createQuery(Request $request)
    {
        return new Query($this->getAPIHandler(), $request);
    }
}