<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
</head>
<body style="font-family: sans-serif; color: #1e293b;">
    <h2>Nouveau message depuis le portfolio</h2>
    <p><strong>De :</strong> {{ $senderName }} ({{ $senderEmail }})</p>
    <hr>
    <p style="white-space: pre-line;">{{ $messageBody }}</p>
</body>
</html>
