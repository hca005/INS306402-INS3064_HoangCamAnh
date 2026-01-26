<?php
// Timezone Việt Nam
date_default_timezone_set("Asia/Ho_Chi_Minh");

// Lấy giờ hiện tại
$hour = (int)date("H");

// (1) Lời chào theo thời gian
if ($hour >= 5 && $hour < 12) {
  $greeting = "Chào buổi sáng";
} elseif ($hour >= 12 && $hour < 18) {
  $greeting = "Chào buổi chiều";
} else {
  $greeting = "Chào buổi tối";
}

// (2) Thứ trong tuần bằng tiếng Việt
$daysVN = [
  "Chủ nhật", "Thứ hai", "Thứ ba", "Thứ tư", "Thứ năm", "Thứ sáu", "Thứ bảy"
];
$dayIndex = (int)date("w"); // 0=CN ... 6=Thứ bảy
$dayVN = $daysVN[$dayIndex];

// (3) Số ngày còn lại trong tháng
$today = new DateTime("today");
$endOfMonth = new DateTime("last day of this month");
$daysLeft = (int)$today->diff($endOfMonth)->format("%a"); // số ngày chênh lệch (không tính hôm nay)

// Thời gian hiển thị
$nowText = date("H:i:s - d/m/Y");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Welcome - Hoàng Cẩm Anh</title>
  <style>
    * { box-sizing: border-box; }
    body{
      margin:0;
      font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
      min-height:100vh;
      display:flex;
      align-items:center;
      justify-content:center;
      padding:24px;
      background: linear-gradient(135deg, #0ea5e9, #9333ea);
      color:#0f172a;
    }
    .card{
      width:100%;
      max-width:760px;
      background: rgba(255,255,255,0.92);
      border-radius:18px;
      box-shadow:0 20px 50px rgba(0,0,0,0.25);
      overflow:hidden;
    }
    .header{
      padding:22px 26px;
      background: rgba(15,23,42,0.92);
      color:#fff;
      display:flex;
      justify-content:space-between;
      align-items:center;
      gap:12px;
      flex-wrap:wrap;
    }
    .header h1{ margin:0; font-size:22px; }
    .badge{
      background: rgba(255,255,255,0.12);
      border:1px solid rgba(255,255,255,0.22);
      padding:8px 12px;
      border-radius:999px;
      font-size:13px;
      white-space:nowrap;
    }
    .content{ padding:24px 26px 28px; }
    .big{
      font-size:26px;
      font-weight:800;
      margin: 0 0 14px 0;
      line-height:1.2;
    }
    .sub{
      margin:0 0 18px 0;
      color:#334155;
      font-size:14px;
    }
    .grid{
      display:grid;
      grid-template-columns:1fr 1fr;
      gap:14px;
    }
    @media (max-width:640px){ .grid{ grid-template-columns:1fr; } }
    .item{
      background:#fff;
      border:1px solid #e2e8f0;
      border-radius:14px;
      padding:14px 16px;
    }
    .label{
      font-size:12px;
      color:#64748b;
      margin-bottom:6px;
      text-transform:uppercase;
      letter-spacing:.6px;
    }
    .value{
      font-size:16px;
      font-weight:700;
      color:#0f172a;
    }
    .footer{
      margin-top:16px;
      padding:14px 16px;
      border-radius:14px;
      background:#f8fafc;
      border:1px dashed #cbd5e1;
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap:10px;
      flex-wrap:wrap;
    }
    .time{
      font-weight:700;
      background:#e2e8f0;
      padding:8px 12px;
      border-radius:10px;
      font-size:13px;
    }
  </style>
</head>
<body>
  <div class="card">
    <div class="header">
      <h1>Trang Chào Mừng</h1>
      <div class="badge">PHP • welcome.php</div>
    </div>

    <div class="content">
      <p class="big"><?= htmlspecialchars($greeting) ?>, Hoàng Cẩm Anh 👋</p>
      <p class="sub">Hôm nay là <b><?= htmlspecialchars($dayVN) ?></b>. Dưới đây là thông tin động theo yêu cầu bài.</p>

      <div class="grid">
        <div class="item">
          <div class="label">Lời chào theo thời gian</div>
          <div class="value"><?= htmlspecialchars($greeting) ?></div>
        </div>

        <div class="item">
          <div class="label">Thứ trong tuần (Tiếng Việt)</div>
          <div class="value"><?= htmlspecialchars($dayVN) ?></div>
        </div>

        <div class="item">
          <div class="label">Số ngày còn lại trong tháng</div>
          <div class="value"><?= $daysLeft ?> ngày</div>
        </div>

        <div class="item">
          <div class="label">Giờ hiện tại</div>
          <div class="value"><?= htmlspecialchars(date("H:i:s")) ?></div>
        </div>
      </div>

      <div class="footer">
        <div>Thời điểm truy cập:</div>
        <div class="time"><?= htmlspecialchars($nowText) ?></div>
      </div>
    </div>
  </div>
</body>
</html>
