<?php


namespace App\Tests\Functional;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class NotificationTest extends WebTestCase
{

    private $resourceUrl = '/api/v1/notification/send';

    /**
     * @covers \App\Controller\Api\SendNotificationController
     */
    public function testCanSendNotification()
    {
        $data = [
            'email' => 'raphael@testing.com',
            'template' => 'welcome-email',
        ];

        $client = self::createClient();
        $client->request('POST', $this->resourceUrl, $data);

        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    /**
     * @dataProvider invalidDataProvider
     * @covers \App\Controller\Api\SendNotificationController
     */
    public function testCanHandleInvalidData(array $data)
    {
        $client = self::createClient();
        $client->request('POST', $this->resourceUrl, $data);

        $this->assertEquals(422, $client->getResponse()->getStatusCode());
    }

    public function invalidDataProvider()
    {
        yield [['email' => 'this-is-an-invalid-email']];
        yield [['template' => 'valid-template']];
        yield [['email' => 'validemail@testing.com']];
        yield [[]];
    }

}
