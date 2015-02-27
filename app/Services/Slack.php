<?php

namespace Larask\Services;

use GuzzleHttp\Client;

/**
 * Class Slack
 *
 * @author  Nam Hoang Luu <nam@mbearvn.com>
 * @package Larask\Services
 *
 */
class Slack
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $email
     * @param string $firstName
     * @param array  $channels
     *
     * @return bool
     */
    public function invite($email, $firstName, $channels = [])
    {
        $team     = config('slack.team');
        $channels = $channels ?: config('slack.default_channels');
        $token    = config('slack.token');
        $time     = time();

        $response = $this->client->post("https://{$team}.slack.com/api/users.admin.invite?t={$time}", [
            'body' => [
                'email'      => $email,
                'channels'   => implode(',', $channels),
                'first_name' => $firstName,
                'token'      => $token,
                'set_active' => true,
                '_attempts'  => 1,
            ],
        ]);

        $body = json_decode($response->getBody()->getContents());

        if ( ! $body['ok'])
            return false;

        return true;
    }
}
