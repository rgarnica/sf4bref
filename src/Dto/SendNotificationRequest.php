<?php

declare(strict_types=1);

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

final class SendNotificationRequest
{
    /**
     * @var string
     *
     * @Assert\NotBlank
     */
    private $template;

    /**
     * @var string
     *
     * @Assert\NotBlank
     *
     * @Assert\Email
     */
    private $email;

    public function __construct(?string $template, ?string $email)
    {
        $this->template = $template;
        $this->email = $email;
    }

    /**
     * @param array $data
     *
     * @return SendNotificationRequest
     */
    public static function fromRequestParameters(array $data): self
    {
        return new static(
            $data['template'] ?? null,
            $data['email'] ?? null,
        );
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getTemplate(): ?string
    {
        return $this->template;
    }

}
