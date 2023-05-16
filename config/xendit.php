<?php

return [
    'key_auth' => base64_encode(env("XENDIT_API_KEY") . ':')
];
