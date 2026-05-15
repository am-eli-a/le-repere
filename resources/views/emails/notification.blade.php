<div style="background-color: #1a1a1a; color: #ffffff; padding: 30px; font-family: 'Helvetica', sans-serif; border-radius: 10px;">
    <h1 style="color: #efc849; border-bottom: 2px solid #efc849; padding-bottom: 10px;">
    Le Repère - Nouvelle Notification
</h1>
    <p style="font-size: 16px;">Bonjour l'équipe,</p>
    <p style="background: #333; padding: 15px; border-left: 4px solid #efc849;">
        <strong>Action :</strong> {{ $subject }} <br>
        <strong>Utilisateur :</strong> {{ $details['nom'] ?? 'Anonyme' }} <br>
        <strong>Email :</strong> {{ $details['email'] ?? 'Non fourni' }}
    </p>
    <div style="margin-top: 20px;">
        <strong>Message :</strong><br>
        <p style="font-style: italic; color: #ccc;">"{{ $details['message'] ?? $details['description'] ?? 'Pas de texte fourni' }}"</p>
    </div>
    <p style="margin-top: 30px; font-size: 12px; color: #777;">
        Ceci est un mail automatique envoyé aux Super-Admins.
    </p>
</div>
