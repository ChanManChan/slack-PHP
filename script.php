<?php
require_once 'vendor/autoload.php';
Requests::register_autoloader();

// var_dump($argv);
// var_dump($_ENV);

echo "::debug ::Sending a request to slack\n";

$response=Requests::post(
  $_ENV['INPUT_SLACK_WEBHOOK'],
  array(
    'Content-Type' => 'application/json'
  ),
  json_encode(array (
    'blocks' =>
    array (
      0 =>
      array (
        'type' => 'section',
        'text' =>
        array (
          'type' => 'mrkdwn',
          'text' => $_ENV["INPUT_MESSAGE"],
        ),
      ),
      1 =>
      array (
        'type' => 'section',
        'fields' =>
        array (
          0 =>
          array (
            'type' => 'mrkdwn',
            'text' => "*Repository:*
            {$_ENV['GITHUB_REPOSITORY']}",
          ),
          1 =>
          array (
            'type' => 'mrkdwn',
            'text' => "*Event:*
            {$_ENV['GITHUB_EVENT_NAME']}",
          ),
          2 =>
          array (
            'type' => 'mrkdwn',
            'text' => "*Ref:*
            {$_ENV['GITHUB_REF']}",
          ),
          3 =>
          array (
            'type' => 'mrkdwn',
            'text' => "*SHA:*
            {$_ENV['GITHUB_SHA']}",
          ),
        ),
      ),
    ),
  ))
);


echo "::group::Slack response\n";
var_dump($response);
echo "::endgroup::\n";

if(!$response->success) {
  echo $response->body;
  exit(1);
}

