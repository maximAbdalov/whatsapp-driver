<?php

namespace Foxtes\WazzupDriver\Dto;

use Foxtes\WazzupDriver\Interfaces\WazzupItemDtoInterface;
use Foxtes\WazzupDriver\Interfaces\WazzupRequestDtoInterface;

class MessageRequestDto implements WazzupRequestDtoInterface
{
    public string $channelId;

    public string $chatType;

    public ?string $chatId = null;

    public ?string $text = null;
    public ?string $contentUri = null;
    public ?string $refMessageId = null;
    public ?string $crmUserId = null;
    public ?string $crmMessageId = null;
    public ?string $username = null;
    public ?string $phone = null;
    public bool $clearUnanswered = true;
    public ?string $templateId = null;
    public $templateValues = null;

    protected array $buttonsObject = [];

    public function addButton(MessageButtonDto $button): MessageRequestDto
    {
        $this->buttonsObject['buttons'][] = $button;
        return $this;
    }

    public function toArray(): array
    {
        $array = [
            'channelId'       => $this->channelId,
            'chatType'        => $this->chatType,
            'chatId'          => $this->chatId,
            'text'            => $this->text,
            'contentUri'      => $this->contentUri,
            'refMessageId'    => $this->refMessageId,
            'crmUserId'       => $this->crmUserId,
            'crmMessageId'    => $this->crmMessageId,
            'username'        => $this->username,
            'phone'           => $this->phone,
            'clearUnanswered' => $this->clearUnanswered,
            'templateId'      => $this->templateId,
            'templateValues'  => $this->templateValues
        ];
        if (!empty($this->buttonsObject)) {
            $array['buttonsObject'] = $this->buttonsObject;
        }
        return $array;
        
    }
}
