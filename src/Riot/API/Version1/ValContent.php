<?php

declare(strict_types=1);

namespace Riot\API\Version1;

use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Riot\API\AbstractApi;
use Riot\DTO\Val\ContentDTO;
use Riot\Enum\ValRegionEnum;
use Riot\Exception as RiotException;

final class ValContent extends AbstractApi
{
    /**
     * @throws JsonException
     * @throws RiotException\BadGatewayException
     * @throws RiotException\BadRequestException
     * @throws RiotException\DataNotFoundException
     * @throws RiotException\ForbiddenException
     * @throws RiotException\GatewayTimeoutException
     * @throws RiotException\InternalServerErrorException
     * @throws RiotException\MethodNotAllowedException
     * @throws RiotException\RateLimitExceededException
     * @throws RiotException\ServiceUnavailableException
     * @throws RiotException\UnauthorizedException
     * @throws RiotException\UnsupportedMediaTypeException
     * @throws ClientExceptionInterface
     */
    public function get(ValRegionEnum $valRegion, ?string $locale = null): ContentDTO
    {
        if ($locale) {
            $locale = '?locale=' . $locale;
        }

        $response = $this->riotConnection->get(
            $valRegion->getValue(),
            sprintf('val/content/v1/contents%s', $locale),
        );

        return ContentDTO::createFromArray($response->getBodyContentsDecodedAsArray());
    }
}
