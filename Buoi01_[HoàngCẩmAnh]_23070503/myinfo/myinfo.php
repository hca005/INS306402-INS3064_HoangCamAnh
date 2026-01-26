<?php

// Đặt timezone Việt Nam để giờ hiển thị đúng
date_default_timezone_set("Asia/Ho_Chi_Minh");

// Thông tin cá nhân (bạn sửa nội dung ở đây)
$fullname = "Hoàng Cẩm Anh";
$dob      = "04/01/2005";        
$hometown = "Hà Nội, Việt Nam";  
$hobbies  = ["Nghe nhạc", "Thiết kế UI", "Làm web", "Chụp ảnh"];

$visitTime = date("H:i:s - d/m/Y");
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My Info - <?= htmlspecialchars($fullname) ?></title>
  <style>
    * { box-sizing: border-box; }
    body {
      margin: 0;
      font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
      background: linear-gradient(135deg, #5b21b6, #2563eb);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 24px;
      color: #0f172a;
    }
    .card {
      width: 100%;
      max-width: 760px;
      background: rgba(255,255,255,0.92);
      border-radius: 18px;
      box-shadow: 0 20px 50px rgba(0,0,0,0.25);
      overflow: hidden;
    }
    .header {
      padding: 22px 26px;
      background: rgba(15, 23, 42, 0.92);
      color: #fff;
      display: flex;
      gap: 14px;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
    }
    .header h1 {
      margin: 0;
      font-size: 22px;
      letter-spacing: 0.2px;
    }
    .badge {
      background: rgba(255,255,255,0.12);
      border: 1px solid rgba(255,255,255,0.22);
      padding: 8px 12px;
      border-radius: 999px;
      font-size: 13px;
    }
    .content {
      padding: 24px 26px 28px;
    }
    .grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 14px;
    }
    @media (max-width: 640px) {
      .grid { grid-template-columns: 1fr; }
    }
    .item {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 14px;
      padding: 14px 16px;
    }
    .label {
      font-size: 12px;
      color: #64748b;
      margin-bottom: 6px;
      text-transform: uppercase;
      letter-spacing: 0.6px;
    }
    .value {
      font-size: 16px;
      font-weight: 650;
      color: #0f172a;
      line-height: 1.4;
    }
    .hobbies {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      margin-top: 6px;
    }
    .chip {
      background: #eef2ff;
      border: 1px solid #c7d2fe;
      color: #3730a3;
      padding: 6px 10px;
      border-radius: 999px;
      font-size: 13px;
      font-weight: 600;
    }
    .footer {
      margin-top: 16px;
      padding: 14px 16px;
      border-radius: 14px;
      background: #f8fafc;
      border: 1px dashed #cbd5e1;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 10px;
      flex-wrap: wrap;
    }
    .hint {
      color: #475569;
      font-size: 13px;
    }
    .time {
      font-weight: 700;
      color: #0f172a;
      background: #e2e8f0;
      padding: 8px 12px;
      border-radius: 10px;
      font-size: 13px;
    }
  </style>
</head>
<body>
  <div class="card">
    <div class="header">
      <h1>Trang Thông Tin Cá Nhân</h1>
      <div class="badge">PHP • MyInfo</div>
    </div>

    <div class="content">
      <div class="grid">
        <div class="item">
          <div class="label">Họ tên</div>
          <div class="value"><?= htmlspecialchars($fullname) ?></div>
        </div>

        <div class="item">
          <div class="label">Ngày sinh</div>
          <div class="value"><?= htmlspecialchars($dob) ?></div>
        </div>

        <div class="item">
          <div class="label">Quê quán</div>
          <div class="value"><?= htmlspecialchars($hometown) ?></div>
        </div>

        <div class="item">
          <div class="label">Sở thích</div>
          <div class="hobbies">
            <?php foreach ($hobbies as $h): ?>
              <span class="chip"><?= htmlspecialchars($h) ?></span>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <div class="footer">
        <div class="hint">Ngày giờ truy cập:</div>
        <div class="time"><?= htmlspecialchars($visitTime) ?></div>
      </div>
    </div>
  </div>
</body>
</html>
