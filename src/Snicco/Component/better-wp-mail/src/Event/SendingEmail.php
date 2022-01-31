<?php

declare(strict_types=1);

namespace Snicco\Component\BetterWPMail\Event;

use Snicco\Component\BetterWPMail\ValueObjects\Email;

/**
 * If you want to customize the email before sending you have to replace the email.
 * EMAILS ARE IMMUTABLE.
 * $event->email = $event->email->withSubject('new subject');
 *
 * @api
 */
final class SendingEmail
{
    
    public Email $email;
    
    public function __construct(Email $email)
    {
        $this->email = $email;
    }
    
}