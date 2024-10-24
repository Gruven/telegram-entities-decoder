<?php

include '../src/EntityDecoder.php';

use lucadevelop\TelegramEntitiesDecoder\EntityDecoder;

$telegramUpdateExample = '
{
    "update_id": 123456789,
    "message": {
        "message_id": 1234,
        "from": {
            "id": 123456789,
            "is_bot": false,
            "first_name": "First Name",
            "username": "UserName",
            "language_code": "en"
        },
        "chat": {
            "id": 123456789,
            "first_name": "First Name",
            "username": "UserName",
            "type": "private"
        },
        "date": 1729790164,
        "text": "Quoted message\\nTest message. Bold. Italic. Underline. Mono. \\\\Slash.\\nconsole.log(\'Test message. `\\"```test` \\\\Slash\');",
        "entities": [
            {
                "offset": 0,
                "length": 14,
                "type": "blockquote"
            },
            {
                "offset": 29,
                "length": 4,
                "type": "bold"
            },
            {
                "offset": 35,
                "length": 6,
                "type": "italic"
            },
            {
                "offset": 43,
                "length": 9,
                "type": "underline"
            },
            {
                "offset": 54,
                "length": 4,
                "type": "code"
            },
            {
                "offset": 68,
                "length": 47,
                "type": "pre",
                "language": "javascript"
            }
        ]
    }
}';

$updateObj = json_decode($telegramUpdateExample);

$entity_decoder = new EntityDecoder('MarkdownV2');
$decoded_text = $entity_decoder->decode($updateObj->message);

var_export($decoded_text);
