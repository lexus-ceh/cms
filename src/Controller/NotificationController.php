<?php


namespace App\Controller;


use App\Model\Subscriber;

class NotificationController
{
    public function changeSubscription()
    {
        if (isset($_POST['subscription']) && ($_POST['subscription'] === 'subscribe')) {
            if (isLogined()) {
                $email = $_SESSION['email'];
            } else {
                $email = $_POST['email'] ?? 0;
            }
            if ($email) {
                $subscriber = Subscriber::firstOrNew(
                    ['email' => $email]
                );
                $subscriber->save();
            }
        }

        if (isset($_POST['subscription']) && ($_POST['subscription'] === 'unsubscribe')) {
            if (isLogined()) {
                $email = $_SESSION['email'];
            } else {
                $email = $_POST['email'] ?? 0;
            }
            if ($email) {
                Subscriber::where('email', $email)->delete();
            }
        }
        return json_encode('success');
    }
}