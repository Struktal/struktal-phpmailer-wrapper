<?php

namespace struktal\MailWrapper;

class MailWrapper extends \PHPMailer\PHPMailer\PHPMailer {
    /** @var callable|null $setupFunction */
    private static $setupFunction = null;
    private static bool $redirectAllMails = false;
    private static string $redirectMailAddress = "";

    public static function setSetupFunction(callable $setupFunction): void {
        self::$setupFunction = $setupFunction;
    }

    public static function setRedirectAllMails(bool $redirectAllMails, string $redirectMailAddress = ""): void {
        self::$redirectAllMails = $redirectAllMails;
        self::$redirectMailAddress = $redirectMailAddress;
    }

    public function __construct($exceptions = null) {
        parent::__construct($exceptions);
        if(self::$setupFunction !== null) {
            (self::$setupFunction)($this);
        }
    }

    public function send(): bool {
        if(!self::$redirectAllMails) {
            return parent::send();
        }

        $this->clearAllRecipients();
        $this->addAddress(self::$redirectMailAddress);
        return parent::send();
    }
}
