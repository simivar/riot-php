<?php

declare(strict_types=1);

namespace Riot\DTO\Val;

use Riot\DTO\DTOInterface;

final class LocalizedNamesDTO implements DTOInterface
{
    private string $arAe;
    private string $deDe;
    private string $enGb;
    private string $enUs;
    private string $esEs;
    private string $esMx;
    private string $frFr;
    private string $idId;
    private string $itIt;
    private string $jaJp;
    private string $koKr;
    private string $plPl;
    private string $ptBr;
    private string $ruRu;
    private string $thTh;
    private string $trTr;
    private string $viVn;
    private string $zhCn;
    private string $zhTw;

    public function __construct(
        string $arAe,
        string $deDe,
        string $enGb,
        string $enUs,
        string $esEs,
        string $esMx,
        string $frFr,
        string $idId,
        string $itIt,
        string $jaJp,
        string $koKr,
        string $plPl,
        string $ptBr,
        string $ruRu,
        string $thTh,
        string $trTr,
        string $viVn,
        string $zhCn,
        string $zhTw
    ) {
        $this->arAe = $arAe;
        $this->deDe = $deDe;
        $this->enGb = $enGb;
        $this->enUs = $enUs;
        $this->esEs = $esEs;
        $this->esMx = $esMx;
        $this->frFr = $frFr;
        $this->idId = $idId;
        $this->itIt = $itIt;
        $this->jaJp = $jaJp;
        $this->koKr = $koKr;
        $this->plPl = $plPl;
        $this->ptBr = $ptBr;
        $this->ruRu = $ruRu;
        $this->thTh = $thTh;
        $this->trTr = $trTr;
        $this->viVn = $viVn;
        $this->zhCn = $zhCn;
        $this->zhTw = $zhTw;
    }

    public function getArAe(): string
    {
        return $this->arAe;
    }

    public function getDeDe(): string
    {
        return $this->deDe;
    }

    public function getEnGb(): string
    {
        return $this->enGb;
    }

    public function getEnUs(): string
    {
        return $this->enUs;
    }

    public function getEsEs(): string
    {
        return $this->esEs;
    }

    public function getEsMx(): string
    {
        return $this->esMx;
    }

    public function getFrFr(): string
    {
        return $this->frFr;
    }

    public function getIdId(): string
    {
        return $this->idId;
    }

    public function getItIt(): string
    {
        return $this->itIt;
    }

    public function getJaJp(): string
    {
        return $this->jaJp;
    }

    public function getKoKr(): string
    {
        return $this->koKr;
    }

    public function getPlPl(): string
    {
        return $this->plPl;
    }

    public function getPtBr(): string
    {
        return $this->ptBr;
    }

    public function getRuRu(): string
    {
        return $this->ruRu;
    }

    public function getThTh(): string
    {
        return $this->thTh;
    }

    public function getTrTr(): string
    {
        return $this->trTr;
    }

    public function getViVn(): string
    {
        return $this->viVn;
    }

    public function getZhCn(): string
    {
        return $this->zhCn;
    }

    public function getZhTw(): string
    {
        return $this->zhTw;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['ar-AE'],
            $data['de-DE'],
            $data['en-GB'],
            $data['en-US'],
            $data['es-ES'],
            $data['es-MX'],
            $data['fr-FR'],
            $data['id-ID'],
            $data['it-IT'],
            $data['ja-JP'],
            $data['ko-KR'],
            $data['pl-PL'],
            $data['pt-BR'],
            $data['ru-RU'],
            $data['th-TH'],
            $data['tr-TR'],
            $data['vi-VN'],
            $data['zh-CN'],
            $data['zh-TW'],
        );
    }
}
