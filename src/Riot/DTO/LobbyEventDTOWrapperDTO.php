<?php

declare(strict_types=1);

namespace Riot\DTO;

use Riot\Collection\LobbyEventDTOCollection;

final class LobbyEventDTOWrapperDTO implements DTOInterface
{
    private LobbyEventDTOCollection $eventList;

    public function __construct(LobbyEventDTOCollection $eventList)
    {
        $this->eventList = $eventList;
    }

    /**
     * @return LobbyEventDTOCollection<LobbyEventDTO>
     */
    public function getEventList(): LobbyEventDTOCollection
    {
        return $this->eventList;
    }

    public static function createFromArray(array $data): self
    {
        return new self(LobbyEventDTOCollection::createFromArray($data['eventList']));
    }
}
