<?php
namespace App\Http\Middleware;
use Google\Cloud\PubSub\PubSubClient;
class PubSubMiddleware {

    public function handle($request, $next)
    {
        $pubsub = new PubSubClient([
            'projectId' => 'labs-377812'
        ]);

        $question = $pubsub->topic('request_receiver');
        $answer = $pubsub->subscription('response_sender-sub');

        $id = uniqid();

        $question->publish(['data' => $id]);

        $messages = $answer->pull([
            'maxMessages' => 1,
            'returnImmediately' => false,
            'autoCreate' => true
        ]);

        foreach ($messages as $message) {
            $data = $message->data();
            $attributes = $message->attributes();
            if ($attributes['id'] == $id) {
                if ($data == 'true') {
                    return $next($request);
                } else {
                    return response()->json(['error' => true, 'message' => $data], 400);
                }
            }
        }

        return response()->json(['error' => true, 'message' => 'No response from server'], 400);
    }
}
