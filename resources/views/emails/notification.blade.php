<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: 'Montserrat', sans-serif; line-height: 1.6; color: #1a1a1a; background-color: #fdfcf0; padding: 20px; }
        .mail-box { background: #ffffff; border: 3px solid #1a1a1a; box-shadow: 6px 6px 0 #1a1a1a; padding: 30px; max-width: 600px; margin: 0 auto; }
        .footer { margin-top: 30px; font-size: 0.8rem; color: #666; text-align: center; border-top: 2px dashed #efc849; padding-top: 15px; }
    </style>
</head>
<body>

<div class="mail-box">
    <div class="content" style="white-space: pre-line; font-size: 1rem;">
        <h1>Le Repère - Nouvelle notification</h1>
        <img src="{{ asset('images/logo_lerepere.png') }}" loading="lazy">
        {{ $details['message'] }}
    </div>

    <div class="footer">
        <p>Ceci est un mail automatique, merci de ne pas y répondre :)</p>
        <p>Pour ne plus recevoir ces alertes, vous pouvez vous désabonner</p>
    </div>
</div>

</body>
</html>
