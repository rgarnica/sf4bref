<?php


namespace App\Tests\Unit;


use App\Dto\SendNotificationRequest;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;

class NotificationTest extends TestCase
{

    /**
     * @covers \App\Dto\SendNotificationRequest::fromRequestParameters
     */
    public function testCanCreateDtoFromRequestParameters()
    {
        $email = 'raphael@testing.com';
        $template = 'welcome-email';

        $sendNotification = SendNotificationRequest::fromRequestParameters(['email' => $email, 'template' => $template]);
        $this->assertInstanceOf(SendNotificationRequest::class, $sendNotification);
        $this->assertEquals($email, $sendNotification->getEmail());
        $this->assertEquals($template, $sendNotification->getTemplate());
    }

    /**
     * @covers \App\Dto\SendNotificationRequest::fromRequestParameters
     */
    public function testCanCreateDtoFromEmptyParameters()
    {
        $sendNotification = SendNotificationRequest::fromRequestParameters([]);
        $this->assertInstanceOf(SendNotificationRequest::class, $sendNotification);
    }

}
