<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style>
  body { font-family: 'Segoe UI', sans-serif; background: #f0f4f8; margin: 0; padding: 30px; }
  .card { background: #fff; border-radius: 12px; max-width: 560px; margin: 0 auto; padding: 36px; box-shadow: 0 4px 20px rgba(0,0,0,.08); }
  h2 { color: #0f2d6b; margin-top: 0; }
  .label { font-size: 12px; color: #6b7280; text-transform: uppercase; letter-spacing: .05em; margin-bottom: 4px; }
  .value { font-size: 15px; color: #111827; margin-bottom: 20px; }
  .message-box { background: #f0f4f8; border-left: 4px solid #0f2d6b; border-radius: 6px; padding: 16px; color: #374151; line-height: 1.6; }
  .footer { margin-top: 28px; font-size: 12px; color: #9ca3af; text-align: center; }
</style>
</head>
<body>
<div class="card">
  <h2>📬 New Portfolio Message</h2>

  <div class="label">From</div>
  <div class="value">{{ $contact->name }} &lt;{{ $contact->email }}&gt;</div>

  <div class="label">Subject</div>
  <div class="value">{{ $contact->subject }}</div>

  <div class="label">Message</div>
  <div class="message-box">{{ $contact->message }}</div>

  <div class="footer">
    Received {{ $contact->created_at->format('d M Y, H:i') }} via sherifaudu.com
  </div>
</div>
</body>
</html>
