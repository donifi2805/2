<?php
header('X-Frame-Options: SAMEORIGIN');
header('X-Content-Type-Options: nosniff');
header('Cache-Control: no-cache, no-store, must-revalidate');
?>
<!DOCTYPE html>
<html lang="id">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>H2H Integration Center - dompul.shop</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css?v=20260727" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js?v=20260727"></script>
    <script src="https://accounts.google.com/gsi/client" async defer></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <style>
    :root {
    --myxl-blue: #002dbb;
    --myxl-blue-bright: #0056e0;
    --myxl-cyan: #00c4cc;
    --myxl-bg: #f4f7fc;
    --myxl-card-bg: #ffffff;
    --myxl-border: #dbe4f0;
        --bg-body: #f0f7ff;
        --panel-bg: rgba(255, 255, 255, 0.96);
        --panel-card: #ffffff;
        --primary: #2563eb;
        --primary-gradient: linear-gradient(135deg, #2563eb 0%, #38bdf8 100%);
        --primary-hover: linear-gradient(135deg, #1d4ed8 0%, #0284c7 100%);
        --accent: #059669;
        --accent-gradient: linear-gradient(135deg, #059669 0%, #10b981 100%);
        --danger: #dc2626;
        --danger-gradient: linear-gradient(135deg, #dc2626 0%, #ef4444 100%);
        --warning: #d97706;
        --purple: #7c3aed;
        --cyan: #0284c7;
        --text-main: #0f172a;
        --text-sub: #64748b;
        --border-color: #bfdbfe;
        --border-hover: #3b82f6;
        --glass-bg: rgba(255, 255, 255, 0.92);
        --shadow-card: 0 10px 25px -5px rgba(37, 99, 235, 0.08), 0 4px 10px rgba(37, 99, 235, 0.03);
    }
    
    .text-success { color: #059669 !important; }
    .text-danger  { color: #dc2626 !important; }
    .text-warn    { color: #d97706 !important; }
    .text-blue    { color: #2563eb !important; }
    .text-purple  { color: #7c3aed !important; }
    .text-cyan    { color: #0284c7 !important; }
    .mono         { font-family: 'Consolas', 'Courier New', monospace; }
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap');
    * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif; }
    body { background: var(--bg-body); color: var(--text-main); min-height: 100vh; padding-bottom: 50px; }
    
    .nav-status-pill { background: #ecfdf5; border: 1px solid #a7f3d0; color: #047857; font-size: 9px; font-weight: 700; padding: 4px 9px; border-radius: 20px; display: flex; align-items: center; gap: 6px; letter-spacing: 0.5px; }
    .nav-status-pill .dot { width: 6px; height: 6px; background: #10b981; border-radius: 50%; box-shadow: 0 0 8px #10b981; animation: pulseDot 1.8s infinite; }
    @keyframes pulseDot { 0%, 100% { opacity: 1; transform: scale(1); } 50% { opacity: 0.5; transform: scale(1.3); } }
    
    .container { max-width: 1200px; margin: 20px auto; padding: 0 15px; }
    
    
    #authOverlay {
        position: fixed;
        inset: 0;
        background: #f0f4fc;
        background-image: radial-gradient(#d2e0f5 1px, transparent 1px);
        background-size: 24px 24px;
        z-index: 10000;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }
    .auth-card {
        background: #ffffff;
        border: 1px solid #dbeafe;
        border-radius: 24px;
        width: 100%;
        max-width: 420px;
        padding: 40px 30px;
        box-shadow: 0 20px 40px -5px rgba(0, 45, 187, 0.08), 0 0 15px rgba(37, 99, 235, 0.03);
        transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
    }
    .auth-title {
        font-size: 24px;
        font-weight: 900;
        color: #002dbb;
        margin-bottom: 6px;
        text-align: center;
        letter-spacing: -0.5px;
    }
    .auth-subtitle {
        font-size: 12px;
        color: #64748b;
        text-align: center;
        margin-bottom: 24px;
        font-weight: 600;
    }
    .auth-brand-badge {
        width: 65px;
        height: 65px;
        background: #eff6ff;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px auto;
        color: #002dbb;
        font-size: 28px;
        box-shadow: inset 0 2px 4px rgba(255,255,255,0.8), 0 4px 10px rgba(0,45,187,0.06);
        border: 1.5px solid #bfdbfe;
    }
    #authOverlay .btn-outline {
        background: #ffffff !important;
        border-color: #cbd5e1 !important;
        color: #334155 !important;
        box-shadow: 0 2px 5px rgba(0,0,0,0.02) !important;
    }
    #authOverlay .btn-outline:hover {
        background: #f8fafc !important;
        border-color: #94a3b8 !important;
        color: #0f172a !important;
    }
    
    .form-group { margin-bottom: 12px; }
    label { display: block; font-size: 10px; font-weight: 700; color: #1e40af; margin-bottom: 5px; letter-spacing: 0.2px; }
    input, select, textarea { width: 100%; padding: 9px 12px; background: #ffffff; border: 1.5px solid #bfdbfe; border-radius: 9px; color: #0f172a; font-size: 11px; outline: none; transition: all 0.2s ease; color-scheme: light; }
    input:focus, select:focus, textarea:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.18); background: #ffffff; }
    input[type="checkbox"] { width: auto; accent-color: var(--primary); }
    
    
    .btn { background: var(--primary-gradient); color: #ffffff !important; border: none; padding: 9px 15px; border-radius: 9px; font-weight: 700; cursor: pointer; transition: all 0.25s ease; font-size: 11px; display: inline-flex; align-items: center; justify-content: center; gap: 6px; box-shadow: 0 4px 14px rgba(37, 99, 235, 0.28); }
    .btn:hover { transform: translateY(-1px); box-shadow: 0 6px 18px rgba(37, 99, 235, 0.38); opacity: 0.96; }
    .btn:active { transform: translateY(0); }
    .btn-block { width: 100%; }
    .btn-success { background: var(--accent-gradient); box-shadow: 0 4px 14px rgba(16, 185, 129, 0.28); color: #ffffff !important; }
    .btn-success:hover { box-shadow: 0 6px 18px rgba(16, 185, 129, 0.38); }
    .btn-danger { background: var(--danger-gradient); box-shadow: 0 4px 14px rgba(220, 38, 38, 0.25); color: #ffffff !important; }
    .btn-warning { background: linear-gradient(135deg, #d97706, #f59e0b); color: #000000 !important; box-shadow: 0 4px 12px rgba(245, 158, 11, 0.25); }
    
    .btn-outline { background: #ffffff !important; border: 1.5px solid #bfdbfe !important; color: #1e40af !important; box-shadow: 0 2px 5px rgba(37, 99, 235, 0.05); }
    .btn-outline:hover { background: #eff6ff !important; border-color: #3b82f6 !important; color: #1d4ed8 !important; }
    .btn-outline i, .btn-outline span { color: inherit !important; }
    
    .checkbox-group { display: flex; align-items: center; gap: 6px; font-size: 11px; color: var(--text-sub); margin-bottom: 15px; cursor: pointer; user-select: none; }
    
    
    .grid-products-4d { display: flex; flex-direction: column; gap: 12px; margin-top: 15px; }
    
    .ppob-service-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 12px 6px;
        margin-top: 10px;
        margin-bottom: 6px;
    }
    .ppob-service-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        text-align: center;
        cursor: pointer;
        transition: all 0.2s cubic-bezier(0.34, 1.56, 0.64, 1);
        user-select: none;
        padding: 4px 2px;
    }
    .ppob-service-item:active {
        transform: scale(0.92);
    }
    .ppob-icon-squircle {
        width: 44px;
        height: 44px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
        color: #ffffff;
        box-shadow: 0 4px 12px rgba(0, 45, 187, 0.14);
        margin-bottom: 5px;
        transition: all 0.2s ease;
        border: 1.5px solid rgba(255, 255, 255, 0.8);
    }
    .ppob-service-item:hover .ppob-icon-squircle {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(0, 45, 187, 0.22);
    }
    .ppob-service-label {
        font-size: 9.5px;
        font-weight: 800;
        color: #00174f;
        line-height: 1.2;
        max-width: 76px;
        word-break: break-word;
        letter-spacing: -0.2px;
    }
    
    .ppob-denom-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 8px;
        margin-top: 8px;
    }
    @media (min-width: 768px) {
        .ppob-denom-grid {
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 10px;
        }
    }
    
    .ppob-provider-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 9px;
        margin-top: 8px;
        margin-bottom: 12px;
    }
    @media (min-width: 640px) {
        .ppob-provider-grid {
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }
    }
    @media (min-width: 900px) {
        .ppob-provider-grid {
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
        }
    }
    .ppob-provider-card {
        background: #ffffff;
        border: 1.5px solid #bcd0ee;
        border-radius: 16px;
        padding: 13px 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        cursor: pointer;
        transition: all 0.2s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow: 0 3px 10px rgba(0, 45, 187, 0.05);
        user-select: none;
        position: relative;
        overflow: hidden;
    }
    .ppob-provider-card:hover {
        border-color: #0050d8;
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(0, 45, 187, 0.12);
    }
    .ppob-provider-card:active {
        transform: scale(0.95);
    }
    
    
    .ppob-denom-card {
        background: #ffffff;
        border: 1.5px solid #d2e0f5;
        border-radius: 14px;
        padding: 11px 12px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        gap: 6px;
        box-shadow: 0 2px 8px rgba(0, 45, 187, 0.04);
        cursor: pointer;
        transition: all 0.2s cubic-bezier(0.34, 1.56, 0.64, 1);
        position: relative;
        user-select: none;
    }
    .ppob-denom-card:hover {
        border-color: #0050d8;
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(0, 45, 187, 0.1);
    }
    .ppob-denom-card.is-disabled {
        background: #f8fafc !important;
        border-color: #e2e8f0 !important;
        cursor: not-allowed !important;
        opacity: 0.68;
    }
    .ppob-denom-card-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 4px;
    }
    .ppob-denom-title {
        font-size: 12.5px;
        font-weight: 900;
        color: #00174f;
        line-height: 1.25;
        letter-spacing: -0.2px;
    }
    .ppob-denom-code {
        font-family: monospace;
        font-size: 8.5px;
        color: #0284c7;
        font-weight: 700;
        margin-top: 2px;
    }
    .ppob-denom-card-bot {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-top: 1px dashed #d2e0f5;
        padding-top: 6px;
        margin-top: 2px;
        gap: 6px;
    }
    .ppob-denom-price {
        font-size: 13px;
        font-weight: 900;
        color: #059669;
        font-family: 'Consolas', monospace;
    }
    
    
    .btn-tele-4d {
        background: linear-gradient(135deg, #0088cc 0%, #0056e0 100%) !important;
        color: #ffffff !important;
        border: 1.5px solid #38bdf8 !important;
        border-radius: 13px;
        padding: 12px 18px;
        font-size: 13px;
        font-weight: 800;
        text-decoration: none !important;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        box-shadow: 0 6px 0 #001a70, 0 12px 24px rgba(0, 45, 187, 0.35);
        transition: all 0.2s cubic-bezier(0.34, 1.56, 0.64, 1);
        cursor: pointer;
        user-select: none;
        letter-spacing: 0.2px;
    }
    .btn-tele-4d:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 0 #001a70, 0 16px 28px rgba(0, 45, 187, 0.45);
        color: #ffffff !important;
    }
    .btn-tele-4d:active {
        transform: translateY(5px);
        box-shadow: 0 1px 0 #001a70, 0 4px 10px rgba(0, 45, 187, 0.2);
    }
    
    .btn-topup-4d, .btn-buy-card, #tabTrxLangsung .myxl-prod-ticket .btn, #tabTrxLangsung .product-card-4d .btn {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%) !important;
        color: #ffffff !important;
        border: 1.5px solid #34d399 !important;
        border-radius: 12px;
        padding: 9px 15px;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 0.3px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        box-shadow: 0 5px 0 #064e3b, 0 10px 20px rgba(16, 185, 129, 0.45) !important;
        transition: all 0.18s cubic-bezier(0.34, 1.56, 0.64, 1) !important;
        cursor: pointer;
        user-select: none;
        white-space: nowrap;
        flex-shrink: 0;
        text-decoration: none !important;
    }
    .btn-topup-4d:hover, .btn-buy-card:hover, #tabTrxLangsung .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 7px 0 #064e3b, 0 14px 24px rgba(16, 185, 129, 0.55) !important;
        color: #ffffff !important;
    }
    .btn-topup-4d:active, .btn-buy-card:active, #tabTrxLangsung .btn:active {
        transform: translateY(4px) !important;
        box-shadow: 0 1px 0 #064e3b, 0 3px 6px rgba(16, 185, 129, 0.25) !important;
    }
    
    
    .btn-refresh-clean {
        background: #ffffff !important;
        border: 1.5px solid #bcd0ee !important;
        color: #002dbb !important;
        padding: 5px 11px !important;
        font-size: 10.5px !important;
        font-weight: 800 !important;
        border-radius: 9px !important;
        display: inline-flex !important;
        align-items: center !important;
        gap: 6px !important;
        cursor: pointer !important;
        box-shadow: 0 2px 6px rgba(0, 45, 187, 0.05) !important;
        transition: all 0.2s ease !important;
        white-space: nowrap !important;
        flex-shrink: 0 !important;
    }
    .btn-refresh-clean:hover {
        background: #002dbb !important;
        color: #ffffff !important;
        border-color: #002dbb !important;
        transform: translateY(-1px) !important;
        box-shadow: 0 4px 12px rgba(0, 45, 187, 0.2) !important;
    }
    .myxl-prod-ticket { background: #ffffff; border: 1.5px solid #dbeafe; border-radius: 18px; padding: 21px 14px 10px 14px; box-shadow: 0 4px 14px rgba(0, 45, 187, 0.05); transition: all 0.22s cubic-bezier(0.34, 1.56, 0.64, 1); cursor: pointer; position: relative; user-select: none; overflow: hidden; display: flex; flex-direction: column; justify-content: space-between; gap: 6px; }
    .myxl-prod-ticket:hover { border-color: #0050d8; transform: translateY(-2px); box-shadow: 0 8px 24px rgba(0, 45, 187, 0.12); }
    .myxl-prod-ticket.is-disabled { background: #ffffff !important; border-color: #e2e8f0 !important; cursor: pointer !important; opacity: 1 !important; }
    .myxl-plan-badge { position: absolute; top: 0; left: 0; background: linear-gradient(135deg, #001a70 0%, #002dbb 100%); color: #ffffff; font-size: 8.5px; font-weight: 800; padding: 3.5px 12px 3.5px 10px; border-bottom-right-radius: 12px; border-top-left-radius: 17px; display: inline-flex; align-items: center; gap: 4px; box-shadow: 0 2px 6px rgba(0, 45, 187, 0.25); max-width: 85%; overflow: hidden; white-space: nowrap; text-overflow: ellipsis; letter-spacing: 0.2px; z-index: 2; }
    .myxl-plan-badge i { font-size: 8px; color: #00d2d3; flex-shrink: 0; }
    .myxl-plan-main-row { display: flex; justify-content: space-between; align-items: center; gap: 8px; margin-top: 2px; }
    .myxl-plan-quota-wrap { display: flex; align-items: center; gap: 10px; min-width: 0; flex: 1; }
    .myxl-plan-globe { width: 32px; height: 32px; border-radius: 10px; background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%); color: #002dbb; border: 1.5px solid #bfdbfe; display: flex; align-items: center; justify-content: center; font-size: 15px; flex-shrink: 0; box-shadow: 0 2px 6px rgba(37, 99, 235, 0.08); }
    .myxl-plan-quota-val { font-size: 15px; font-weight: 900; color: #0f172a; line-height: 1.15; letter-spacing: -0.3px; }
    .myxl-plan-code-sub { font-size: 8.5px; font-weight: 700; color: #64748b; font-family: 'Consolas', monospace; margin-top: 1px; }
    .myxl-plan-days-wrap { text-align: right; flex-shrink: 0; display: flex; flex-direction: column; align-items: flex-end; gap: 2px; }
    .myxl-plan-days-txt { font-size: 9.5px; font-weight: 800; color: #64748b; letter-spacing: 0.2px; }
    .myxl-plan-speedbar { background: linear-gradient(135deg, #f8fafc 0%, #eff6ff 100%); border: 1px solid #dbeafe; border-radius: 9px; padding: 5px 10px; display: flex; align-items: center; justify-content: space-between; gap: 6px; font-size: 8px; color: #1e3a8a; font-weight: 700; }
    .myxl-plan-speedbar i { color: #002dbb; font-size: 9px; }
    .myxl-plan-bot-row { display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #f1f5f9; padding-top: 8px; margin-top: 2px; }
    .myxl-plan-price-txt { font-size: 14.5px; font-weight: 900; color: #002dbb; letter-spacing: -0.3px; }
    .myxl-plan-chevron-btn { width: 24px; height: 24px; border-radius: 50%; background: #f8fafc; border: 1.5px solid #e2e8f0; color: #002dbb; display: flex; align-items: center; justify-content: center; font-size: 9px; font-weight: 900; transition: all 0.2s ease; }
    .myxl-prod-ticket:hover:not(.is-disabled) .myxl-plan-chevron-btn { background: #002dbb; color: #ffffff; border-color: #002dbb; transform: translateX(2px); }
    .product-card-4d {
        background: #ffffff;
        border: 1.5px solid #bfdbfe;
        border-radius: 18px;
        padding: 16px 18px;
        position: relative;
        cursor: pointer;
        box-shadow: 0 5px 0 #93c5fd, 0 12px 24px rgba(37, 99, 235, 0.08);
        transition: all 0.2s cubic-bezier(0.34, 1.56, 0.64, 1);
        user-select: none;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        overflow: hidden;
    }
    .product-card-4d::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #2563eb, #38bdf8);
    }
    .product-card-4d:hover:not(.is-disabled) {
        transform: translateY(-3px);
        border-color: #3b82f6;
        box-shadow: 0 8px 0 #2563eb, 0 16px 30px rgba(37, 99, 235, 0.16);
    }
    .product-card-4d:active:not(.is-disabled) {
        transform: translateY(4px);
        box-shadow: 0 1px 0 #1d4ed8, 0 4px 10px rgba(37, 99, 235, 0.15);
    }
    .product-card-4d.is-disabled {
        background: #f8fafc !important;
        border-color: #cbd5e1 !important;
        box-shadow: 0 4px 0 #94a3b8, 0 4px 12px rgba(0, 0, 0, 0.04) !important;
        cursor: not-allowed !important;
        opacity: 0.78;
    }
    .product-card-4d.is-disabled::before {
        background: #cbd5e1 !important;
    }
    .btn-buy-card { padding: 6px 12px; border-radius: 8px; font-size: 11px; font-weight: 800; border: none; cursor: pointer; display: inline-flex; align-items: center; gap: 5px; box-shadow: 0 3px 0 rgba(0,0,0,0.15); }
    
    .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 15px; margin-bottom: 25px; }
    .card { background: var(--panel-card); border: 1.5px solid var(--border-color); border-radius: 14px; padding: 18px; box-shadow: var(--shadow-card); transition: border-color 0.2s; }
    .card:hover { border-color: var(--border-hover); box-shadow: 0 12px 30px -5px rgba(37, 99, 235, 0.12); }
    
    .tab-nav {
     display: flex; gap: 6px; background: #e0f2fe; padding: 6px; border-radius: 14px; border: 1.5px solid #bae6fd; margin-bottom: 22px; overflow-x: auto; scrollbar-width: none; }
    .tab-nav::-webkit-scrollbar { display: none; }
    .tab-btn { padding: 9px 15px; background: transparent; border: 1px solid transparent; color: #334155 !important; font-weight: 700; cursor: pointer; white-space: nowrap; transition: all 0.25s ease; font-size: 11px; border-radius: 9px; display: inline-flex; align-items: center; gap: 7px; position: relative; }
    .tab-btn i { color: #2563eb !important; font-size: 12px; }
    .tab-btn:hover { color: #0f172a !important; background: rgba(255, 255, 255, 0.6); }
    .tab-btn.active { color: #ffffff !important; background: var(--primary-gradient) !important; border-color: transparent !important; box-shadow: 0 4px 14px rgba(37, 99, 235, 0.32) !important; }
    .tab-btn.active i { color: #ffffff !important; }
    
    pre { background: #eff6ff; padding: 12px; border-radius: 10px; font-size: 10px; color: #0369a1; overflow-x: auto; border: 1.5px solid #bfdbfe; margin-top: 8px; line-height: 1.5; word-break: break-all; font-family: monospace; }
    .badge { font-size: 9px; font-weight: 800; padding: 3px 8px; border-radius: 5px; text-transform: uppercase; letter-spacing: 0.5px; display: inline-block; }
    .badge-admin { background: #fee2e2; color: #b91c1c; border: 1px solid #fca5a5; }
    .badge-user { background: #eff6ff; color: #1d4ed8; border: 1px solid #bfdbfe; }
    .badge-success { background: #ecfdf5; color: #047857; border: 1px solid #a7f3d0; }
    .badge-pending { background: #fffbeb; color: #b45309; border: 1px solid #fde68a; }
    .badge-fail { background: #fef2f2; color: #b91c1c; border: 1px solid #fecaca; }
    .badge-purple { background: #faf5ff; color: #6d28d9; border: 1px solid #ddd6fe; }
    .badge-cyan   { background: #ecfeff; color: #0e7490; border: 1px solid #a5f3fc; }
    .badge-muted  { background: #eff6ff; color: #1e40af; border: 1px solid #bfdbfe; }
    
    table { width: 100%; border-collapse: separate; border-spacing: 0; margin-top: 12px; font-size: 11px; }
    th, td { padding: 10px 9px; border-bottom: 1px solid var(--border-color); text-align: left; }
    th { color: #1e3a8a; font-weight: 800; text-transform: uppercase; font-size: 10px; letter-spacing: 0.5px; background: #e0f2fe; border-bottom: 1.5px solid #bfdbfe; }
    tr:hover td { background: #eff6ff; }
    
    .modal { position: fixed; inset: 0; background: rgba(15, 23, 42, 0.65); z-index: 10001; display: none; align-items: center; justify-content: center; padding: 15px; }
    .modal-content { background: var(--panel-card); border: 1.5px solid #bfdbfe; border-radius: 16px; width: 100%; max-width: 420px; padding: 22px; box-shadow: 0 20px 45px rgba(37, 99, 235, 0.15); color: #0f172a; }
    .url-highlight { background: #eff6ff; border: 1.5px solid #bfdbfe; padding: 6px 10px; border-radius: 6px; font-family: monospace; color: #0284c7; font-size: 11px; margin-top: 5px; display: inline-block; word-break: break-all; }
    .card-title { font-size: 14px; font-weight: 800; display: flex; align-items: center; gap: 8px; margin-bottom: 4px; color: #0f172a; }
    .card-title i { color: #2563eb; }
    .card-sub { font-size: 11px; color: var(--text-sub); margin-bottom: 14px; }
    
    .toolbar { display: flex; gap: 10px; flex-wrap: wrap; align-items: flex-end; background: #eff6ff; padding: 12px 14px; border-radius: 12px; border: 1.5px solid #bfdbfe; margin-bottom: 14px; }
    .fg { display: flex; flex-direction: column; gap: 3px; min-width: 130px; }
    .fg.grow { flex: 1; min-width: 190px; }
    .search-wrap { position: relative; display: flex; align-items: center; }
    .search-wrap i { position: absolute; left: 10px; color: #3b82f6; font-size: 10px; pointer-events: none; }
    .search-wrap input { padding-left: 28px; background: #ffffff; border: 1.5px solid #bfdbfe; }
    
    .table-wrap { overflow-x: auto; border-radius: 10px; border: 1.5px solid #bfdbfe; background: #ffffff; }
    
    .stat-mini {
     background: #eff6ff; border: 1.5px solid #bfdbfe; border-radius: 9px; padding: 10px; text-align: center; box-shadow: 0 2px 8px rgba(37, 99, 235, 0.04); }
    .stat-mini b { display: block; font-size: 16px; margin-bottom: 2px; color: #0f172a; }
    .stat-mini small { font-size: 9px; color: var(--text-sub); text-transform: uppercase; font-weight: 700; }
    .stat-card { background: #eff6ff; border: 1.5px solid #bfdbfe; border-radius: 12px; padding: 12px; display: flex; align-items: center; gap: 10px; }
    
    .banner { padding: 10px 14px; border-radius: 10px; font-size: 11px; display: flex; align-items: center; gap: 10px; margin-bottom: 15px; border: 1.5px solid; }
    .banner-warn   { background: #fffbeb; border-color: #fde68a; color: #b45309; }
    .banner-danger { background: #fef2f2; border-color: #fecaca; color: #b91c1c; }
    .banner-info   { background: #eff6ff; border-color: #bfdbfe; color: #1d4ed8; }
    .banner-ok     { background: #ecfdf5; border-color: #a7f3d0; color: #047857; }
    .rt-ticker-wrap { background: rgba(255, 255, 255, 0.18) !important; border: 1.5px solid rgba(255, 255, 255, 0.35) !important; border-radius: 12px; padding: 7px 12px; margin-top: 8px; margin-bottom: 14px; overflow: hidden; position: relative; z-index: 2; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08); }
    .rt-ticker-inner { width: 100%; overflow: hidden; white-space: nowrap; box-sizing: border-box; }
    .rt-ticker-content { display: inline-block; white-space: nowrap; font-size: 11px; font-weight: 800; letter-spacing: 0.4px; will-change: transform; }
    .rt-line { display: block; line-height: 1.45; }
    @keyframes rtScrollLeft { 0% { transform: translate3d(0, 0, 0); } 100% { transform: translate3d(-100%, 0, 0); } }
    @keyframes rtScrollRight { 0% { transform: translate3d(-100%, 0, 0); } 100% { transform: translate3d(100%, 0, 0); } }
    @keyframes rtPulse { 0%, 100% { opacity: 1; transform: scale(1); } 50% { opacity: 0.45; transform: scale(0.98); } }
    @keyframes rtBounce { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-3px); } }
    @keyframes rtRainbow { 0% { color: #ff4d4d; text-shadow: 0 0 10px rgba(255, 77, 77, 0.8); } 20% { color: #ffa64d; text-shadow: 0 0 10px rgba(255, 166, 77, 0.8); } 40% { color: #ffff4d; text-shadow: 0 0 10px rgba(255, 255, 77, 0.8); } 60% { color: #4dff88; text-shadow: 0 0 10px rgba(77, 255, 136, 0.8); } 80% { color: #4de8ff; text-shadow: 0 0 10px rgba(77, 232, 255, 0.8); } 100% { color: #d64dff; text-shadow: 0 0 10px rgba(214, 77, 255, 0.8); } }
    .rt-rainbow-text { font-weight: 900 !important; }
    .rt-rainbow-text .rt-line { animation: rtRainbow 3s linear infinite !important; }
    .rt-anim-scroll-left { display: inline-block; padding-left: 100%; animation: rtScrollLeft var(--rt-speed, 16s) linear infinite !important; }
    .rt-anim-scroll-right { display: inline-block; padding-right: 100%; animation: rtScrollRight var(--rt-speed, 16s) linear infinite !important; }
    .rt-anim-pulse { animation: rtPulse 2.2s ease-in-out infinite !important; text-align: center; display: block; }
    .rt-anim-bounce { animation: rtBounce 1.5s ease-in-out infinite !important; text-align: center; display: block; }
    
    .chip-bar { display: flex; gap: 6px; flex-wrap: wrap; margin-bottom: 12px; }
    .chip { background: #ffffff; border: 1.5px solid #bfdbfe; color: #1e40af; font-size: 10px; font-weight: 700; padding: 5px 12px; border-radius: 20px; cursor: pointer; transition: all 0.2s; display: inline-flex; align-items: center; gap: 5px; }
    .chip:hover { background: #eff6ff; color: #1d4ed8; border-color: #60a5fa; }
    .chip.active { background: #2563eb !important; border-color: #2563eb !important; color: #ffffff !important; }
    .chip.active i { color: #ffffff !important; }
    
    mark.hl { background: #fef08a; color: #854d0e; padding: 0 2px; border-radius: 3px; }
    .kv-grid { display: grid; grid-template-columns: 130px 1fr; gap: 6px 12px; font-size: 11px; }
    .kv-grid .k { color: #1e40af; font-weight: 700; text-transform: uppercase; font-size: 9px; letter-spacing: 0.4px; }
    .kv-grid .v { color: var(--text-main); word-break: break-all; }
    
    #toastWrap { position: fixed; right: 16px; bottom: 16px; z-index: 99998; display: flex; flex-direction: column; gap: 8px; max-width: 320px; }
    .toast { background: #ffffff; border: 1px solid #bfdbfe; border-left: 4px solid var(--primary); border-radius: 10px; padding: 10px 12px; font-size: 11px; color: var(--text-main); box-shadow: 0 10px 30px -5px rgba(15, 23, 42, 0.15); display: flex; gap: 9px; align-items: flex-start; animation: toastIn 0.25s ease; }
    .toast.out { animation: toastOut 0.3s ease forwards; }
    .toast b { display: block; margin-bottom: 2px; font-size: 11px; color: #0f172a; }
    .toast small { color: var(--text-sub); font-size: 10px; line-height: 1.4; }
    .toast.success { border-left-color: #10b981; } .toast.success i { color: #059669; }
    .toast.error   { border-left-color: #ef4444; } .toast.error i   { color: #dc2626; }
    .toast.warn    { border-left-color: #f59e0b; } .toast.warn i    { color: #d97706; }
    .toast.info    { border-left-color: #3b82f6; } .toast.info i    { color: #2563eb; }
    @keyframes toastIn  { from { opacity: 0; transform: translateX(30px); } to { opacity: 1; transform: translateX(0); } }
    @keyframes toastOut { to { opacity: 0; transform: translateX(30px); } }
    
    div[style*="background: rgba(8, 13, 26, 0.6)"],
    div[style*="background: rgba(8, 13, 26, 0.5)"],
    [style*="background: rgba(8, 13, 26"],
    [style*="background: rgba(6, 10, 20"],
    [style*="background: rgba(4, 8, 16"],
    [style*="background: #040810"],
    [style*="background: #060a14"],
    [style*="background: rgba(15, 23, 42"] {
        background: #eff6ff !important;
        border: 1.5px solid #bfdbfe !important;
    }
    div[style*="background: rgba(8, 13, 26, 0.6)"] b {
        color: #0f172a !important;
    }
    
    .admin-info-card [style*="color: #ffffff"], .admin-info-card [style*="color: white"],
    #suspendedOverlay [style*="color: #ffffff"], #suspendedOverlay [style*="color: white"],
    .modal-content [style*="color: #fff"], .modal-content [style*="color: #ffffff"], .modal-content [style*="color: white"],
    #tabTester [style*="color: #fff"], #tabTester [style*="color: #ffffff"] {
        color: #0f172a !important;
        text-shadow: none !important;
    }
    
    div[style*="background: rgba(59, 130, 246, 0.1)"] {
        background: #eff6ff !important;
        border: 1.5px solid #bfdbfe !important;
    }
    div[style*="background: rgba(59, 130, 246, 0.1)"] p {
        color: #1e40af !important;
    }
    
    #tabTester .card { background: #ffffff !important; border: 1.5px solid #bfdbfe !important; }
    #tabTester div[style*="background: rgba(8, 13, 26, 0.5)"] { background: #eff6ff !important; border: 1.5px solid #bfdbfe !important; }
    #tabTester div[style*="background: #040810"] { background: #ffffff !important; border: 1.5px solid #bfdbfe !important; }
    #tabTester div[style*="background: rgba(15, 23, 42, 0.9)"] { background: #e0f2fe !important; border-bottom: 1.5px solid #bfdbfe !important; }
    #testResult { background: #f0f9ff !important; color: #0284c7 !important; }
    
    #monthTotalTrx   { color: #0284c7 !important; }
    #monthSuccessTrx { color: #059669 !important; }
    #monthFailedTrx  { color: #dc2626 !important; }
    
    @media (max-width: 768px) {
        body {
            padding-bottom: 84px !important;
        }
        .container {
            padding: 0 12px;
            margin: 10px auto;
        }
        .card {
            padding: 14px;
            border-radius: 14px;
            margin-bottom: 12px;
        }
        #tabDashboard {
            font-size: 85% !important;
        }
        #tabDashboard .card {
            padding: 10px 12px !important;
            border-radius: 12px !important;
            margin-bottom: 10px !important;
        }
        .stat-mini {
            padding: 4px 4px !important;
            border-radius: 8px !important;
            border-width: 1.5px !important;
            text-align: center !important;
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
            justify-content: center !important;
            box-shadow: 0 2px 6px rgba(0, 45, 187, 0.05) !important;
            min-height: 42px !important;
        }
        .stat-mini b {
            font-size: 11.5px !important;
            margin-bottom: 0 !important;
            line-height: 1.15 !important;
            font-weight: 900 !important;
        }
        .stat-mini small {
            font-size: 7px !important;
            font-weight: 800 !important;
            letter-spacing: -0.2px !important;
            line-height: 1 !important;
            margin-top: 2px !important;
            white-space: nowrap !important;
            overflow: hidden !important;
            text-overflow: ellipsis !important;
            max-width: 100% !important;
        }
    
        .toolbar {
            padding: 7px 9px !important;
            gap: 6px !important;
            border-radius: 10px !important;
            margin-bottom: 8px !important;
        }
        .toolbar .fg {
            min-width: 90px !important;
            gap: 2px !important;
        }
        .toolbar label, label[style*="font-size: 10px"] {
            font-size: 8px !important;
            margin-bottom: 2px !important;
        }
        .toolbar input, .toolbar select, 
        #hargaSearchInput, #hargaServerSelect, #userPoSearch, #userTrxSearch, #userTrxDate, #lacakSearch, #lacakMode, #inputCekQuotaMsisdn {
            padding: 5px 8px !important;
            font-size: 9.5px !important;
            min-height: 29px !important;
            border-radius: 7px !important;
        }
        .search-wrap i {
            font-size: 9px !important;
            left: 8px !important;
        }
        .search-wrap input {
            padding-left: 23px !important;
        }
        .chip {
            padding: 3px 8px !important;
            font-size: 8.5px !important;
            border-radius: 12px !important;
            gap: 4px !important;
        }
        .chip i { font-size: 8px !important; }
        .chip-bar { gap: 4px !important; margin-bottom: 8px !important; }
        input, select, textarea {
            padding: 10px 12px;
            font-size: 12px;
            border-radius: 9px;
            min-height: 40px;
        }
        .btn {
            padding: 10px 14px;
            font-size: 11px;
            border-radius: 9px;
            min-height: 40px;
        }
        .btn-sm {
            min-height: 32px;
            padding: 6px 10px;
            font-size: 10px;
        }
        
        #toastWrap {
            top: 14px !important;
            bottom: auto !important;
            right: 12px !important;
            left: 12px !important;
            max-width: none !important;
        }
    }
      #tabDashboard.neo-dash-root { font-size: 100% !important; display: flex; flex-direction: column; gap: 16px; }
      .neo-cmd-bar { background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 20px; padding: 16px 20px; box-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.07); display: flex; flex-direction: column; gap: 14px; position: relative; overflow: hidden; }
      .neo-cmd-bar::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(90deg, #0f172a 0%, #002dbb 45%, #059669 100%); }
      .neo-cmd-top { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 14px; }
      .neo-identity-group { display: flex; align-items: center; gap: 14px; min-width: 0; }
      .neo-avatar-box { width: 50px; height: 50px; border-radius: 15px; background: linear-gradient(135deg, #090e1a 0%, #1e3a8a 100%); color: #38bdf8; display: flex; align-items: center; justify-content: center; font-size: 20px; position: relative; flex-shrink: 0; box-shadow: 0 8px 18px rgba(15, 23, 42, 0.18); border: 1.5px solid #334155; }
      .neo-online-dot { position: absolute; bottom: -2px; right: -2px; width: 13px; height: 13px; background: #10b981; border: 2.5px solid #ffffff; border-radius: 50%; }
      .neo-identity-text { min-width: 0; }
      .neo-eyebrow { font-size: 9px; font-weight: 800; letter-spacing: 1.4px; color: #64748b; text-transform: uppercase; margin-bottom: 2px; }
      .neo-user-row { display: flex; align-items: center; gap: 6px; flex-wrap: wrap; }
      .neo-username { font-size: 18px; font-weight: 900; color: #0f172a; letter-spacing: -0.4px; margin-right: 4px; }
      .neo-email { font-size: 11px; font-weight: 600; color: #64748b; margin-top: 2px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
      .neo-cmd-actions { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }
      .neo-btn-cmd { padding: 9px 15px; border-radius: 12px; font-size: 11px; font-weight: 800; cursor: pointer; display: inline-flex; align-items: center; gap: 7px; transition: all 0.2s ease; border: 1.5px solid transparent; }
      .neo-btn-cmd-primary { background: linear-gradient(135deg, #059669 0%, #10b981 100%); color: #ffffff; box-shadow: 0 6px 16px rgba(16, 185, 129, 0.28); }
      .neo-btn-cmd-primary:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(16, 185, 129, 0.38); }
      .neo-btn-cmd-secondary { background: #0f172a; color: #ffffff; box-shadow: 0 6px 16px rgba(15, 23, 42, 0.2); }
      .neo-btn-cmd-secondary:hover { background: #1e293b; transform: translateY(-2px); }
      .neo-btn-cmd-ghost { background: #f8fafc; color: #0f172a; border-color: #cbd5e1; }
      .neo-btn-cmd-ghost:hover { background: #eff6ff; border-color: #3b82f6; color: #002dbb; }
      .neo-ticker-bar { background: #090e1a !important; border: 1px solid #1e293b !important; border-radius: 12px !important; padding: 7px 12px !important; margin: 0 !important; display: flex; align-items: center; gap: 10px; overflow: hidden; }
      .neo-ticker-badge { background: rgba(16, 185, 129, 0.16); border: 1px solid rgba(16, 185, 129, 0.4); color: #34d399; font-size: 8.5px; font-weight: 900; padding: 3px 8px; border-radius: 6px; letter-spacing: 0.8px; display: inline-flex; align-items: center; gap: 5px; flex-shrink: 0; }
      .neo-live-dot { width: 6px; height: 6px; border-radius: 50%; background: #10b981; box-shadow: 0 0 8px #10b981; animation: pulseDot 1.5s infinite; }
      .neo-vault-stage { background: radial-gradient(circle at 88% 12%, rgba(16, 185, 129, 0.28), transparent 42%), radial-gradient(circle at 12% 88%, rgba(245, 158, 11, 0.14), transparent 45%), repeating-linear-gradient(135deg, rgba(255, 255, 255, 0.018) 0px, rgba(255, 255, 255, 0.018) 2px, transparent 2px, transparent 10px), linear-gradient(135deg, #021810 0%, #062f22 48%, #041d29 100%) !important; border: 1.5px solid rgba(52, 211, 153, 0.55) !important; border-radius: 16px !important; padding: 12px 14px !important; position: relative; overflow: hidden; box-shadow: 0 12px 28px -8px rgba(2, 24, 16, 0.65), 0 0 15px rgba(16, 185, 129, 0.15), inset 0 1px 1px rgba(255, 255, 255, 0.25) !important; color: #ffffff !important; }
      .neo-vault-stage::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px; background: linear-gradient(90deg, #fbbf24 0%, #34d399 50%, #38bdf8 100%); z-index: 3; }
      .neo-vault-stage::after { content: 'RP'; position: absolute; right: -4px; top: 8px; font-size: 68px; font-weight: 900; color: rgba(52, 211, 153, 0.045); letter-spacing: -3px; pointer-events: none; line-height: 1; font-family: 'Plus Jakarta Sans', sans-serif; }
      .neo-unverified-overlay { position: absolute; inset: 0; z-index: 25; background: rgba(2, 20, 14, 0.92); backdrop-filter: blur(6px); -webkit-backdrop-filter: blur(6px); border-radius: 16px; flex-direction: column; align-items: center; justify-content: center; text-align: center; padding: 12px; }
      .neo-unv-card { max-width: 360px; background: rgba(6, 47, 34, 0.92); border: 1px solid rgba(52, 211, 153, 0.5); border-radius: 12px; padding: 10px 14px; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.45); }
      .neo-unv-user { font-size: 12.5px; font-weight: 900; color: #ffffff; }
      .neo-unv-user i { color: #34d399; margin-right: 4px; }
      .neo-unv-email { font-size: 9.5px; color: #a7f3d0; margin-top: 1px; }
      .neo-unv-msg { font-size: 9.5px; font-weight: 700; color: #fef08a; margin: 6px 0 8px 0; line-height: 1.35; }
      .neo-vault-top-bar { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 8px; margin-bottom: 8px; position: relative; z-index: 2; }
      .neo-vault-chip-group { display: flex; align-items: center; gap: 8px; }
      .neo-emv-chip { width: 28px; height: 20px; border-radius: 5px; background: linear-gradient(135deg, #fef08a 0%, #f59e0b 45%, #b45309 100%); border: 1px solid rgba(255, 255, 255, 0.85); box-shadow: inset 0 1px 2px rgba(255, 255, 255, 0.9), 0 2px 6px rgba(0, 0, 0, 0.4); position: relative; flex-shrink: 0; overflow: hidden; }
      .neo-emv-chip::before { content: ''; position: absolute; inset: 3px; border: 1px solid rgba(120, 53, 15, 0.45); border-radius: 2px; }
      .neo-emv-line { position: absolute; top: 50%; left: 0; right: 0; height: 1px; background: rgba(120, 53, 15, 0.45); }
      .neo-nfc-wave { font-size: 11px; color: rgba(254, 240, 138, 0.85); transform: rotate(90deg); margin-left: -3px; }
      .neo-vault-bank-meta { display: flex; align-items: center; gap: 6px; flex-wrap: wrap; }
      .neo-vault-kicker { font-size: 8px; font-weight: 900; letter-spacing: 0.8px; color: #fde68a; text-transform: uppercase; }
      .neo-cash-live-pill { display: inline-flex; align-items: center; gap: 4px; background: rgba(16, 185, 129, 0.2); border: 1px solid rgba(52, 211, 153, 0.5); color: #6ee7b7; font-size: 7.5px; font-weight: 800; padding: 1.5px 6px; border-radius: 12px; width: fit-content; letter-spacing: 0.3px; }
      .neo-cash-dot { width: 5px; height: 5px; border-radius: 50%; background: #10b981; box-shadow: 0 0 6px #10b981; animation: pulseDot 1.5s infinite; }
      .neo-guaranty-badge { background: linear-gradient(135deg, rgba(251, 191, 36, 0.2), rgba(217, 119, 6, 0.15)); border: 1px solid rgba(251, 191, 36, 0.6); color: #fef08a; font-size: 8px; font-weight: 900; padding: 2.5px 8px; border-radius: 12px; letter-spacing: 0.4px; display: inline-flex; align-items: center; gap: 4px; }
      .neo-hero-cash-box { background: linear-gradient(135deg, rgba(0, 0, 0, 0.42) 0%, rgba(4, 47, 36, 0.55) 100%); border: 1px solid rgba(52, 211, 153, 0.45); border-radius: 12px; padding: 9px 12px; margin-bottom: 8px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px; position: relative; z-index: 2; box-shadow: inset 0 1px 8px rgba(0, 0, 0, 0.3); }
      .neo-hero-cash-left { flex: 1; min-width: 160px; }
      .neo-hero-label-row { display: flex; align-items: center; gap: 6px; margin-bottom: 2px; flex-wrap: wrap; }
      .neo-hero-label { font-size: 8.5px; font-weight: 900; color: #a7f3d0; letter-spacing: 0.6px; text-transform: uppercase; display: inline-flex; align-items: center; gap: 4px; }
      .neo-hero-label i { color: #fbbf24; font-size: 9.5px; }
      .neo-eye-pill { background: rgba(255, 255, 255, 0.1); border: 1px solid rgba(255, 255, 255, 0.22); color: #e2e8f0; padding: 1.5px 7px; border-radius: 12px; font-size: 8px; font-weight: 800; cursor: pointer; display: inline-flex; align-items: center; gap: 4px; transition: all 0.2s; }
      .neo-eye-pill:hover { background: rgba(52, 211, 153, 0.25); border-color: #34d399; color: #ffffff; }
      .neo-hero-amount-wrap { display: flex; align-items: baseline; gap: 6px; margin: 1px 0 2px 0; }
      .neo-hero-amount { font-size: clamp(19px, 2.5vw, 25px); font-weight: 900; color: #ffffff !important; letter-spacing: -0.5px; line-height: 1.1; text-shadow: 0 2px 12px rgba(16, 185, 129, 0.45) !important; }
      .neo-hero-trust-note { font-size: 8.5px; font-weight: 600; color: #d1fae5; display: flex; align-items: center; gap: 4px; opacity: 0.88; }
      .neo-hero-trust-note i { color: #34d399; font-size: 8.5px; }
      .neo-hero-cash-actions { display: flex; align-items: center; gap: 6px; }
      .neo-btn-deposit-real { background: linear-gradient(135deg, #fde047 0%, #f59e0b 50%, #d97706 100%) !important; color: #051b11 !important; border: 1px solid #fef08a !important; padding: 7px 12px; border-radius: 9px; font-size: 9.5px; font-weight: 900; letter-spacing: 0.2px; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; gap: 5px; box-shadow: 0 3px 0 #78350f, 0 6px 14px rgba(245, 158, 11, 0.35) !important; transition: all 0.18s ease; white-space: nowrap; }
      .neo-btn-deposit-real:hover { transform: translateY(-1px); }
      .neo-btn-deposit-real:active { transform: translateY(2px); box-shadow: 0 1px 0 #78350f !important; }
      .neo-btn-mutasi-real { background: rgba(255, 255, 255, 0.1) !important; color: #ffffff !important; border: 1px solid rgba(255, 255, 255, 0.25) !important; padding: 7px 10px; border-radius: 9px; font-size: 9px; font-weight: 800; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; gap: 4px; transition: all 0.2s; white-space: nowrap; }
      .neo-btn-mutasi-real:hover { background: rgba(255, 255, 255, 0.2) !important; }
      .neo-pockets-header { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 4px; margin-bottom: 6px; font-size: 8.5px; font-weight: 800; color: #a7f3d0; letter-spacing: 0.5px; text-transform: uppercase; position: relative; z-index: 2; }
      .neo-pockets-header small { font-size: 8px; color: #94a3b8; text-transform: none; font-weight: 600; letter-spacing: 0; }
      #breakdownSaldoGrid.neo-vault-grid { display: grid !important; grid-template-columns: repeat(3, 1fr) !important; gap: 8px !important; position: relative; z-index: 2; }
      .neo-vault-card { background: linear-gradient(145deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.04) 100%) !important; border: 1px solid rgba(255, 255, 255, 0.18) !important; border-radius: 11px !important; padding: 8px 10px !important; position: relative; overflow: hidden; transition: all 0.2s ease; cursor: pointer; display: flex; flex-direction: column; justify-content: space-between; gap: 5px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2); }
      .neo-vault-card:hover { transform: translateY(-2px); border-color: #34d399 !important; background: linear-gradient(145deg, rgba(255, 255, 255, 0.15) 0%, rgba(16, 185, 129, 0.12) 100%) !important; }
      .neo-vault-emerald { border-left: 3px solid #10b981 !important; }
      .neo-vault-cyan { border-left: 3px solid #38bdf8 !important; }
      .neo-vault-amber { border-left: 3px solid #fbbf24 !important; }
      .neo-vc-badge-row { display: flex; align-items: center; justify-content: space-between; gap: 4px; margin-bottom: 2px; }
      .neo-vc-tag { font-size: 7.5px; font-weight: 900; letter-spacing: 0.4px; text-transform: uppercase; padding: 1.5px 5px; border-radius: 4px; }
      .neo-vault-emerald .neo-vc-tag { background: rgba(16, 185, 129, 0.22); color: #6ee7b7; }
      .neo-vault-cyan .neo-vc-tag { background: rgba(56, 189, 248, 0.22); color: #7dd3fc; }
      .neo-vault-amber .neo-vc-tag { background: rgba(251, 191, 36, 0.22); color: #fde68a; }
      .neo-vc-name { font-size: 10px; font-weight: 800; color: #ffffff; line-height: 1.2; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
      .neo-vc-acc { font-size: 7.5px; font-weight: 700; color: #94a3b8; margin-top: 1px; }
      .neo-vc-right { display: flex; align-items: center; justify-content: space-between; gap: 4px; border-top: 1px dashed rgba(255, 255, 255, 0.14); padding-top: 5px; }
      .neo-vc-amount { font-size: 13.5px; font-weight: 900; color: #ffffff; letter-spacing: -0.3px; line-height: 1.1; }
      .neo-vault-emerald .neo-vc-amount { color: #6ee7b7 !important; }
      .neo-vault-cyan .neo-vc-amount { color: #7dd3fc !important; }
      .neo-vault-amber .neo-vc-amount { color: #fde047 !important; }
      .neo-vc-topup-chip { background: rgba(255, 255, 255, 0.14); border: 1px solid rgba(255, 255, 255, 0.25); color: #ffffff; font-size: 7.5px; font-weight: 800; padding: 2px 5px; border-radius: 5px; white-space: nowrap; flex-shrink: 0; }
      .neo-vc-dot { width: 5px; height: 5px; border-radius: 50%; background: #10b981; box-shadow: 0 0 6px #10b981; flex-shrink: 0; }
      .neo-launcher-row { display: flex; flex-direction: column; gap: 12px; }
      .neo-deck-wrap { background: radial-gradient(circle at 15% 15%, rgba(37, 99, 235, 0.18), transparent 45%), radial-gradient(circle at 85% 85%, rgba(16, 185, 129, 0.14), transparent 45%), linear-gradient(145deg, #070b14 0%, #0d1629 60%, #091120 100%); border: 1.5px solid #1e293b; border-radius: 20px; padding: 14px; box-shadow: 0 16px 36px -10px rgba(7, 11, 20, 0.55), inset 0 1px 1px rgba(255, 255, 255, 0.12); display: flex; flex-direction: column; gap: 10px; position: relative; overflow: hidden; }
      .neo-deck-head { display: flex; align-items: center; justify-content: space-between; gap: 8px; padding: 0 4px 4px 4px; border-bottom: 1px dashed rgba(255, 255, 255, 0.1); }
      .neo-deck-title { font-size: 9.5px; font-weight: 900; color: #94a3b8; letter-spacing: 1.2px; text-transform: uppercase; display: flex; align-items: center; gap: 6px; }
      .neo-deck-title i { color: #38bdf8; font-size: 11px; }
      .neo-deck-sub { font-size: 8.5px; font-weight: 800; color: #34d399; background: rgba(16, 185, 129, 0.14); border: 1px solid rgba(52, 211, 153, 0.35); padding: 2px 8px; border-radius: 12px; letter-spacing: 0.4px; }
      .neo-hero-launch { background: linear-gradient(135deg, rgba(0, 45, 187, 0.45) 0%, rgba(5, 150, 105, 0.38) 100%); border: 1.5px solid rgba(56, 189, 248, 0.5); border-radius: 15px; padding: 12px 14px; display: flex; align-items: center; justify-content: space-between; gap: 12px; cursor: pointer; transition: all 0.22s cubic-bezier(0.34, 1.56, 0.64, 1); position: relative; overflow: hidden; box-shadow: 0 8px 22px rgba(0, 0, 0, 0.3); user-select: none; }
      .neo-hero-launch:hover { transform: translateY(-2px); border-color: #34d399; box-shadow: 0 12px 28px rgba(16, 185, 129, 0.25); }
      .neo-hero-launch:active { transform: scale(0.98); }
      .neo-hl-left { display: flex; align-items: center; gap: 12px; min-width: 0; flex: 1; }
      .neo-hl-orb { width: 44px; height: 44px; border-radius: 14px; background: linear-gradient(135deg, #10b981 0%, #0284c7 100%); border: 1.5px solid #a7f3d0; color: #ffffff; display: flex; align-items: center; justify-content: center; font-size: 19px; flex-shrink: 0; box-shadow: 0 0 18px rgba(16, 185, 129, 0.45); }
      .neo-hl-info { min-width: 0; flex: 1; }
      .neo-hl-kicker { font-size: 8px; font-weight: 900; color: #6ee7b7; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 1px; }
      .neo-hl-name { font-size: 14px; font-weight: 900; color: #ffffff; letter-spacing: -0.3px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
      .neo-hl-tags { display: flex; gap: 4px; flex-wrap: wrap; margin-top: 4px; }
      .neo-hl-tags span { font-size: 7.5px; font-weight: 800; color: #e0f2fe; background: rgba(255, 255, 255, 0.12); border: 1px solid rgba(255, 255, 255, 0.2); padding: 1.5px 6px; border-radius: 6px; }
      .neo-hl-cta { background: #ffffff; color: #070b14; font-size: 9.5px; font-weight: 900; padding: 8px 12px; border-radius: 10px; display: inline-flex; align-items: center; gap: 5px; flex-shrink: 0; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25); }
      .neo-pod-matrix { display: grid; grid-template-columns: repeat(6, 1fr); gap: 8px; }
      .neo-pod-tile { background: linear-gradient(160deg, rgba(255, 255, 255, 0.08) 0%, rgba(255, 255, 255, 0.025) 100%); border: 1px solid rgba(255, 255, 255, 0.12); border-radius: 14px; padding: 10px 8px; display: flex; flex-direction: column; align-items: center; text-align: center; cursor: pointer; transition: all 0.22s cubic-bezier(0.34, 1.56, 0.64, 1); position: relative; overflow: hidden; user-select: none; }
      .neo-pod-tile:hover { transform: translateY(-3px); background: rgba(255, 255, 255, 0.12); border-color: rgba(255, 255, 255, 0.35); box-shadow: 0 10px 20px rgba(0, 0, 0, 0.35); }
      .neo-pod-tile:active { transform: scale(0.94); }
      .neo-pod-code { font-size: 7px; font-weight: 900; font-family: 'Consolas', monospace; letter-spacing: 0.5px; color: #94a3b8; background: rgba(0, 0, 0, 0.35); border: 1px solid rgba(255, 255, 255, 0.1); padding: 1px 5px; border-radius: 6px; margin-bottom: 7px; }
      .neo-pod-orb { width: 38px; height: 38px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 16px; color: #ffffff; margin-bottom: 7px; position: relative; transition: transform 0.2s ease; border: 1.5px solid rgba(255, 255, 255, 0.45); }
      .neo-pod-tile:hover .neo-pod-orb { transform: scale(1.1) rotate(-4deg); }
      .pod-amber .neo-pod-orb { background: linear-gradient(135deg, #f59e0b 0%, #b45309 100%); box-shadow: 0 4px 14px rgba(245, 158, 11, 0.38); }
      .pod-emerald .neo-pod-orb { background: linear-gradient(135deg, #10b981 0%, #047857 100%); box-shadow: 0 4px 14px rgba(16, 185, 129, 0.38); }
      .pod-cyan .neo-pod-orb { background: linear-gradient(135deg, #0ea5e9 0%, #0369a1 100%); box-shadow: 0 4px 14px rgba(14, 165, 233, 0.38); }
      .pod-violet .neo-pod-orb { background: linear-gradient(135deg, #8b5cf6 0%, #5b21b6 100%); box-shadow: 0 4px 14px rgba(139, 92, 246, 0.38); }
      .pod-rose .neo-pod-orb { background: linear-gradient(135deg, #f43f5e 0%, #be123c 100%); box-shadow: 0 4px 14px rgba(244, 63, 94, 0.38); }
      .pod-indigo .neo-pod-orb { background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); box-shadow: 0 4px 14px rgba(59, 130, 246, 0.38); }
      .neo-pod-title { font-size: 10.5px; font-weight: 800; color: #ffffff; line-height: 1.2; max-width: 100%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
      .neo-pod-desc { font-size: 8px; font-weight: 700; color: #94a3b8; margin-top: 2px; max-width: 100%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
      .neo-stock-banner { display: flex; align-items: center; justify-content: space-between; gap: 12px; padding: 12px 16px; background: linear-gradient(90deg, #0f172a 0%, #1e3a8a 100%); border: 1.5px solid #3b82f6; border-radius: 15px; text-decoration: none; color: #ffffff; box-shadow: 0 6px 18px rgba(15, 23, 42, 0.12); transition: all 0.2s ease; }
      .neo-stock-banner:hover { transform: translateY(-1px); border-color: #38bdf8; box-shadow: 0 10px 24px rgba(0, 45, 187, 0.2); }
      .neo-sb-left { display: flex; align-items: center; gap: 12px; min-width: 0; }
      .neo-sb-icon { width: 36px; height: 36px; border-radius: 10px; background: #0088cc; color: #ffffff; display: flex; align-items: center; justify-content: center; font-size: 17px; flex-shrink: 0; }
      .neo-sb-title { font-size: 12.5px; font-weight: 800; color: #ffffff; }
      .neo-sb-sub { font-size: 10.5px; color: #93c5fd; font-weight: 600; margin-top: 1px; }
      .neo-bento-grid { display: grid; grid-template-columns: 1fr 1.35fr; gap: 16px; align-items: stretch; }
      .neo-panel { background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 20px; padding: 18px 20px; box-shadow: 0 8px 24px -6px rgba(15, 23, 42, 0.06); display: flex; flex-direction: column; justify-content: space-between; }
      .neo-panel-head { display: flex; align-items: flex-start; justify-content: space-between; gap: 10px; flex-wrap: wrap; padding-bottom: 12px; border-bottom: 1.5px solid #f1f5f9; margin-bottom: 14px; }
      .neo-panel-kicker { font-size: 8.5px; font-weight: 800; letter-spacing: 1.2px; color: #64748b; text-transform: uppercase; }
      .neo-panel-title { font-size: 14.5px; font-weight: 900; color: #0f172a; margin: 2px 0 0 0; display: flex; align-items: center; gap: 7px; }
      .neo-panel-title i { color: #002dbb; }
      .neo-sec-pill { background: #ecfdf5; border: 1px solid #a7f3d0; color: #047857; font-size: 9px; font-weight: 800; padding: 3px 9px; border-radius: 20px; display: inline-flex; align-items: center; gap: 4px; }
      .neo-cred-list { display: flex; flex-direction: column; gap: 10px; margin-bottom: 14px; }
      .neo-cred-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
      .neo-cred-item { background: #f8fafc; border: 1.5px solid #e2e8f0; border-radius: 12px; padding: 10px 12px; }
      .neo-cred-label { font-size: 9.5px; font-weight: 800; color: #475569; text-transform: uppercase; letter-spacing: 0.4px; display: flex; align-items: center; gap: 6px; margin-bottom: 5px; }
      .neo-cred-val-row { display: flex; align-items: center; justify-content: space-between; gap: 8px; }
      .neo-key-box { background: #0f172a; color: #38bdf8; padding: 4px 9px; border-radius: 7px; font-size: 11px; font-weight: 700; flex: 1; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
      .neo-cred-val { font-size: 11.5px; font-weight: 800; color: #0f172a; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
      .neo-cred-actions { display: grid; grid-template-columns: repeat(3, 1fr); gap: 8px; }
      .neo-cred-btn { background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 8px 6px; font-size: 10.5px; font-weight: 800; color: #0f172a; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; gap: 5px; transition: all 0.2s; }
      .neo-cred-btn:hover { background: #f1f5f9; border-color: #002dbb; color: #002dbb; transform: translateY(-1px); }
      .neo-cluster-pills { display: flex; gap: 5px; flex-wrap: wrap; }
      .neo-kpi-strip { display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px; margin-bottom: 12px; }
      .neo-kpi-card { border-radius: 13px; padding: 11px 13px; display: flex; align-items: center; gap: 10px; border: 1.5px solid; }
      .kpi-blue { background: #f0f7ff; border-color: #bfdbfe; }
      .kpi-emerald { background: #ecfdf5; border-color: #a7f3d0; }
      .neo-kpi-icon { width: 36px; height: 36px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 15px; flex-shrink: 0; }
      .kpi-blue .neo-kpi-icon { background: #dbeafe; color: #1d4ed8; }
      .kpi-emerald .neo-kpi-icon { background: #d1fae5; color: #047857; }
      .neo-kpi-card small { display: block; font-size: 9px; font-weight: 800; color: #64748b; text-transform: uppercase; }
      .neo-kpi-card b { font-size: 14px; font-weight: 900; color: #0f172a; }
      .neo-chart-box { position: relative; width: 100%; height: 215px; background: #f8fafc; border: 1.5px solid #e2e8f0; border-radius: 14px; padding: 10px; margin-bottom: 12px; }
      .neo-month-summary { display: grid; grid-template-columns: repeat(3, 1fr); gap: 8px; }
      .neo-ms-item { background: #f8fafc; border: 1.5px solid #e2e8f0; border-radius: 11px; padding: 8px 10px; text-align: center; }
      .neo-ms-item.ms-ok { background: #f0fdf4; border-color: #bbf7d0; }
      .neo-ms-item.ms-fail { background: #fef2f2; border-color: #fecaca; }
      .neo-ms-item span { display: block; font-size: 8.5px; font-weight: 800; color: #64748b; margin-bottom: 2px; }
      .neo-ms-item b { font-size: 13.5px; font-weight: 900; }
      .neo-footer-wrap { margin-top: 18px; margin-bottom: 24px; }
      .neo-footer-bar { background: #090e1a; border: 1.5px solid #1e293b; border-radius: 18px; padding: 14px 20px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; color: #ffffff; box-shadow: 0 10px 25px rgba(9, 14, 26, 0.15); }
      .neo-fb-left { display: flex; align-items: center; gap: 12px; }
      .neo-fb-badge { width: 42px; height: 42px; border-radius: 12px; background: linear-gradient(135deg, #002dbb, #10b981); display: flex; align-items: center; justify-content: center; font-size: 18px; color: #ffffff; }
      .neo-fb-role { font-size: 9px; font-weight: 800; letter-spacing: 1px; color: #38bdf8; text-transform: uppercase; }
      .neo-fb-name { font-size: 14px; font-weight: 900; color: #ffffff; display: flex; align-items: center; gap: 8px; margin-top: 1px; }
      .neo-fb-handle { font-size: 11px; font-weight: 700; color: #94a3b8; }
      .neo-fb-btn { background: #10b981; color: #ffffff; text-decoration: none; padding: 8px 15px; border-radius: 10px; font-size: 11px; font-weight: 800; display: inline-flex; align-items: center; gap: 6px; transition: all 0.2s; }
      .neo-fb-btn:hover { background: #059669; transform: translateY(-1px); }
      @media (max-width: 900px) {
        .neo-bento-grid { grid-template-columns: 1fr; }
      }
      @media (max-width: 768px) {
        .neo-cmd-bar { padding: 13px 14px; border-radius: 16px; }
        .neo-username { font-size: 15px; }
        .neo-cmd-actions { width: 100%; display: grid; grid-template-columns: 1fr 1fr auto; gap: 6px; }
        .neo-btn-cmd { justify-content: center; padding: 8px 10px; font-size: 10px; }
        .neo-vault-stage { padding: 9px 10px !important; border-radius: 14px !important; }
        .neo-vault-top-bar { margin-bottom: 6px !important; gap: 4px !important; }
        .neo-emv-chip { width: 22px !important; height: 16px !important; border-radius: 4px !important; }
        .neo-nfc-wave { font-size: 9px !important; }
        .neo-vault-kicker { font-size: 7px !important; letter-spacing: 0.4px !important; }
        .neo-cash-live-pill { font-size: 6.5px !important; padding: 1px 5px !important; }
        .neo-guaranty-badge { font-size: 7px !important; padding: 2px 6px !important; }
        .neo-hero-cash-box { padding: 7px 9px !important; border-radius: 10px !important; margin-bottom: 6px !important; gap: 6px !important; flex-wrap: nowrap !important; }
        .neo-hero-cash-left { min-width: 0 !important; }
        .neo-hero-label { font-size: 7.5px !important; letter-spacing: 0.3px !important; }
        .neo-eye-pill { font-size: 7px !important; padding: 1px 5px !important; }
        .neo-hero-amount { font-size: 17px !important; }
        .neo-hero-trust-note { display: none !important; }
        .neo-hero-cash-actions { flex-direction: column !important; gap: 4px !important; flex-shrink: 0 !important; }
        .neo-btn-deposit-real { padding: 5px 8px !important; font-size: 8px !important; border-radius: 7px !important; box-shadow: 0 2px 0 #78350f !important; }
        .neo-btn-mutasi-real { padding: 4px 7px !important; font-size: 7.5px !important; border-radius: 6px !important; }
        .neo-pockets-header { margin-bottom: 4px !important; font-size: 7.5px !important; }
        .neo-pockets-header small { display: none !important; }
        #tabDashboard #breakdownSaldoGrid.neo-vault-grid { grid-template-columns: repeat(3, 1fr) !important; gap: 5px !important; }
        .neo-vault-card { padding: 6px 6px !important; border-radius: 9px !important; gap: 3px !important; flex-direction: column !important; align-items: stretch !important; }
        .neo-vc-tag { font-size: 6px !important; padding: 1px 3.5px !important; letter-spacing: 0 !important; white-space: nowrap !important; overflow: hidden !important; text-overflow: ellipsis !important; }
        .neo-vc-name { font-size: 8px !important; }
        .neo-vc-acc { display: none !important; }
        .neo-vc-right { border-top: 1px dashed rgba(255, 255, 255, 0.12) !important; padding-top: 3px !important; flex-direction: row !important; align-items: center !important; justify-content: space-between !important; gap: 2px !important; }
        .neo-vc-amount { font-size: 10.5px !important; white-space: nowrap !important; }
        .neo-vc-topup-chip { display: none !important; }
        .neo-panel { padding: 14px; border-radius: 16px; }
      }
    
      .myxl-quota-card {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 16px;
      padding: 16px 18px;
      margin-bottom: 14px;
      box-shadow: 0 4px 14px rgba(0, 45, 187, 0.05);
      position: relative;
      overflow: hidden;
      }
      .myxl-card-pill {
      position: absolute;
      top: 0;
      left: 0;
      background: #002dbb;
      color: #ffffff;
      font-size: 10px;
      font-weight: 700;
      padding: 4px 14px 4px 10px;
      border-bottom-right-radius: 14px;
      letter-spacing: 0.3px;
      }
      .myxl-progress-bar {
      height: 6px;
      border-radius: 4px;
      background: #e2e8f0;
      overflow: hidden;
      margin: 8px 0;
      }
      .myxl-progress-fill {
      height: 100%;
      background: linear-gradient(90deg, #00c4cc 0%, #0056e0 100%);
      border-radius: 4px;
      }
      :root { --bg-body: #f0f4fc !important; --primary: #002dbb !important; --primary-gradient: linear-gradient(135deg, #002dbb 0%, #0050d8 100%) !important; --primary-hover: linear-gradient(135deg, #001f8f 0%, #003db3 100%) !important; --border-color: #d2e0f5 !important; --border-hover: #0050d8 !important; --text-main: #00174f !important; --text-sub: #5a6e8c !important; }
      body { background: #f0f4fc !important; color: #00174f !important; }
      .nav-status-pill { background: rgba(255, 255, 255, 0.16) !important; border: 1px solid rgba(255, 255, 255, 0.35) !important; color: #ffffff !important; }
      .nav-status-pill .dot { background: #00d2d3 !important; box-shadow: 0 0 10px #00d2d3 !important; }
      .tab-nav { background: #e2edfd !important; border: 1.5px solid #bcd0ee !important; }
      .tab-btn { color: #002dbb !important; }
      .tab-btn i { color: #002dbb !important; }
      .tab-btn:hover { color: #001a70 !important; background: rgba(255, 255, 255, 0.8) !important; }
      .tab-btn.active { background: linear-gradient(135deg, #002dbb 0%, #0050d8 100%) !important; color: #ffffff !important; box-shadow: 0 4px 15px rgba(0, 45, 187, 0.35) !important; }
      .tab-btn.active i { color: #ffffff !important; }
      .card { background: #ffffff !important; border: 1.5px solid #d2e0f5 !important; box-shadow: 0 8px 24px -4px rgba(0, 45, 187, 0.08) !important; }
      .card:hover { border-color: #0050d8 !important; }
      .toolbar { background: #e8f0fe !important; border: 1.5px solid #bcd0ee !important; }
      .btn { background: linear-gradient(135deg, #002dbb 0%, #0050d8 100%) !important; color: #ffffff !important; box-shadow: 0 4px 14px rgba(0, 45, 187, 0.32) !important; }
      .btn-outline { background: #ffffff !important; border: 1.5px solid #bcd0ee !important; color: #002dbb !important; }
      .btn-outline:hover { background: #edf4fe !important; border-color: #0050d8 !important; color: #002dbb !important; }
      .product-card-4d { border: 1.5px solid #d2e0f5 !important; box-shadow: 0 5px 0 #b3ccf5, 0 12px 24px rgba(0, 45, 187, 0.06) !important; }
      .product-card-4d::before { background: linear-gradient(90deg, #002dbb 0%, #00d2d3 100%) !important; }
      .product-card-4d:hover:not(.is-disabled) { border-color: #0050d8 !important; box-shadow: 0 8px 0 #002dbb, 0 16px 30px rgba(0, 45, 187, 0.16) !important; }
      .badge-user { background: #e8f0fe !important; color: #002dbb !important; border: 1px solid #b3ccf5 !important; }
      .chip { border: 1.5px solid #bcd0ee !important; color: #002dbb !important; }
      .chip.active { background: #002dbb !important; border-color: #002dbb !important; color: #ffffff !important; }
      .stat-mini, .stat-card { background: #eef5ff !important; border: 1.5px solid #d2e0f5 !important; }
      table th { background: #e8f0fe !important; color: #002dbb !important; border-bottom: 2px solid #b3ccf5 !important; }
      #mainTabNav.tab-nav { background: linear-gradient(135deg, #060a14 0%, #0d172a 100%) !important; border: 1.5px solid rgba(56, 189, 248, 0.32) !important; border-radius: 20px !important; padding: 7px 8px !important; gap: 6px !important; box-shadow: 0 14px 32px -6px rgba(6, 10, 20, 0.55), inset 0 1px 1px rgba(255, 255, 255, 0.14) !important; }
      #mainTabNav .tab-btn { background: rgba(255, 255, 255, 0.035) !important; border: 1px solid rgba(255, 255, 255, 0.08) !important; color: #94a3b8 !important; border-radius: 14px !important; padding: 7px 13px !important; font-size: 10.5px !important; font-weight: 800 !important; display: inline-flex !important; align-items: center !important; gap: 8px !important; position: relative !important; transition: all 0.22s cubic-bezier(0.34, 1.56, 0.64, 1) !important; }
      #mainTabNav .tab-btn .nav-orb { width: 26px !important; height: 26px !important; border-radius: 8px !important; background: rgba(255, 255, 255, 0.07) !important; border: 1px solid rgba(255, 255, 255, 0.12) !important; display: inline-flex !important; align-items: center !important; justify-content: center !important; transition: all 0.22s ease !important; flex-shrink: 0 !important; }
      #mainTabNav .tab-btn .nav-orb i { color: #cbd5e1 !important; font-size: 12px !important; margin: 0 !important; }
      #mainTabNav .tab-btn .nav-laser { display: none; }
      #mainTabNav .tab-btn:hover { background: rgba(255, 255, 255, 0.1) !important; color: #ffffff !important; border-color: rgba(56, 189, 248, 0.4) !important; transform: translateY(-2px) !important; }
      #mainTabNav .tab-btn.active { background: linear-gradient(135deg, rgba(16, 185, 129, 0.22) 0%, rgba(2, 132, 199, 0.28) 100%) !important; border: 1.5px solid #34d399 !important; color: #ffffff !important; box-shadow: 0 6px 18px rgba(16, 185, 129, 0.28) !important; transform: translateY(-2px) !important; }
      #mainTabNav .tab-btn.active .nav-orb { background: linear-gradient(135deg, #10b981 0%, #0284c7 100%) !important; border-color: #a7f3d0 !important; box-shadow: 0 0 12px rgba(16, 185, 129, 0.6) !important; }
      #mainTabNav .tab-btn.active .nav-orb i { color: #ffffff !important; }
      #mainTabNav .tab-btn.active .nav-laser { display: block; position: absolute; top: -1px; left: 50%; transform: translateX(-50%); width: 18px; height: 3px; border-radius: 0 0 4px 4px; background: #fde047; box-shadow: 0 0 8px #fde047; }
      @media (max-width: 900px) { .neo-pod-matrix { grid-template-columns: repeat(3, 1fr); } }
      @media (max-width: 768px) {
        body { padding-bottom: 92px !important; }
        .neo-deck-wrap { padding: 10px; border-radius: 16px; gap: 8px; }
        .neo-hero-launch { padding: 10px 11px; border-radius: 13px; }
        .neo-hl-orb { width: 38px; height: 38px; font-size: 16px; border-radius: 11px; }
        .neo-hl-name { font-size: 12.5px; }
        .neo-hl-cta { padding: 6px 9px; font-size: 8.5px; border-radius: 8px; }
        .neo-pod-matrix { grid-template-columns: repeat(3, 1fr); gap: 6px; }
        .neo-pod-tile { padding: 8px 5px; border-radius: 12px; }
        .neo-pod-code { font-size: 6px; padding: 1px 4px; margin-bottom: 4px; }
        .neo-pod-orb { width: 32px; height: 32px; font-size: 14px; border-radius: 10px; margin-bottom: 5px; }
        .neo-pod-title { font-size: 9.5px; }
        .neo-pod-desc { font-size: 7px; }
        #mainTabNav.tab-nav { position: fixed !important; bottom: 8px !important; left: 8px !important; right: 8px !important; width: auto !important; margin-bottom: 0 !important; z-index: 9000 !important; isolation: isolate; transform: translate3d(0, 0, 0) !important; -webkit-transform: translate3d(0, 0, 0) !important; will-change: transform !important; display: flex !important; flex-direction: row !important; flex-wrap: nowrap !important; justify-content: space-between !important; align-items: center !important; overflow: hidden !important; background: rgba(7, 11, 20, 0.96) !important; backdrop-filter: blur(16px) !important; -webkit-backdrop-filter: blur(16px) !important; border: 1.5px solid rgba(52, 211, 153, 0.42) !important; border-radius: 20px !important; padding: 5px !important; gap: 3px !important; box-shadow: 0 12px 32px rgba(0, 0, 0, 0.65), 0 0 18px rgba(16, 185, 129, 0.16) !important; }
        #mainTabNav .tab-btn { flex: 1 1 0px !important; min-width: 0 !important; width: auto !important; flex-direction: column !important; justify-content: center !important; padding: 4px 1px !important; gap: 2px !important; border-radius: 13px !important; background: transparent !important; border: 1px solid transparent !important; color: #94a3b8 !important; box-shadow: none !important; overflow: hidden !important; }
        #mainTabNav .tab-btn .nav-orb { width: 26px !important; height: 24px !important; border-radius: 8px !important; background: rgba(255, 255, 255, 0.06) !important; border: 1px solid rgba(255, 255, 255, 0.1) !important; }
        #mainTabNav .tab-btn .nav-orb i { font-size: 11.5px !important; color: #94a3b8 !important; }
        #mainTabNav .tab-btn .nav-lbl { font-size: clamp(6.3px, 1.8vw, 8px) !important; font-weight: 800 !important; letter-spacing: -0.2px !important; color: inherit !important; white-space: nowrap !important; overflow: hidden !important; text-overflow: ellipsis !important; max-width: 100% !important; display: block !important; }
        #mainTabNav .tab-btn.active { background: rgba(16, 185, 129, 0.16) !important; border: 1px solid rgba(52, 211, 153, 0.5) !important; color: #ffffff !important; transform: translateY(-3px) !important; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.25) !important; }
    
      }
      .g-btn-auth { border-color: rgba(255, 255, 255, 0.15); background: rgba(255, 255, 255, 0.04); display: flex; align-items: center; justify-content: center; gap: 8px; font-size: 11px; }
      .act-tbl { font-size: 10.5px; width: 100%; border-collapse: collapse; }
      .act-tbl th { padding: 8px; font-weight: 800; }
      .act-tbl td { padding: 7px 8px; border-bottom: 1px solid #f1f5f9; }
      .act-tbl .act-s { text-align: right; font-weight: 800; color: #b45309; font-family: monospace; }
      .act-tbl .act-r { text-align: right; font-weight: 800; color: #002dbb; font-family: monospace; }
      .doc-card { background: #ffffff; border: 1.5px solid #d2e0f5; border-radius: 14px; padding: 16px; margin-bottom: 14px; }
      .doc-card-head { display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px; }
      .doc-h4 { margin: 0; font-size: 13px; color: #0f172a; }
      .doc-sum-title { font-size: 14px; margin: 0; font-weight: 800; }
      .doc-kicker { font-size: 10.5px; font-weight: 800; text-transform: uppercase; margin-bottom: 6px; }
      .doc-btn { padding: 9px 16px; font-size: 11.5px; font-weight: 800; border-radius: 10px; display: inline-flex; align-items: center; gap: 6px; }
    </style>
  </head>

  <body>

    <div id="toastWrap"></div>

    <div id="userNavInfo"
      style="display: none; position: fixed; top: 12px; right: 14px; z-index: 1000; align-items: center; gap: 8px;">
      <div class="nav-status-pill"
        style="padding: 5px 12px; font-size: 10px; font-weight: 800; height: 28px; display: inline-flex; align-items: center; gap: 6px; background: rgba(255, 255, 255, 0.95) !important; border: 1.5px solid #a7f3d0 !important; color: #047857 !important; border-radius: 20px; box-shadow: 0 4px 14px rgba(0, 45, 187, 0.12);">
        <span class="dot" style="width: 7px; height: 7px; background: #10b981; border-radius: 50%; box-shadow: 0 0 8px #10b981;"></span>
        Gateway Online
      </div>
      <button class="btn btn-danger" onclick="handleLogout()"
        style="padding: 5px 14px; font-size: 10px; font-weight: 800; border-radius: 20px; min-height: 28px; box-shadow: 0 4px 14px rgba(220, 38, 38, 0.28);"
        title="Keluar">
        <i class="fas fa-sign-out-alt"></i> <span>Keluar</span>
      </button>
    </div>

    <div id="authOverlay">
      <div class="auth-card" id="loginForm">
        <div class="auth-brand-badge">
          <i class="fas fa-shield-halved"></i>
        </div>
        <div class="auth-title">DOMPUL SERVER ENTERPRISE</div>
        <div class="auth-subtitle">Host to host system akrab & Digital produk</div>

        <div class="form-group">
          <label>Nomor WhatsApp</label>
          <input type="text" id="logWA" placeholder="Contoh: 087812345678" />
        </div>
        <div class="form-group">
          <label>Kata Sandi</label>
          <input type="password" id="logPass" placeholder="Masukkan Password" />
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 14px;">
          <label class="checkbox-group" style="margin-bottom: 0;">
            <input type="checkbox" id="saveLogin"> Simpan Sesi Login
          </label>
          <a href="javascript:void(0)" onclick="openForgotModal()"
          style="font-size: 11px; color: #60a5fa; text-decoration: none; font-weight: 700;">Lupa Sandi?</a>
        </div>

        <button class="btn btn-block" onclick="handleLogin()">Masuk Sekarang</button>

        <div style="display: flex; align-items: center; margin: 12px 0; gap: 8px;">
          <div style="flex: 1; height: 1px; background: var(--border-color);"></div><span
          style="font-size: 10px; color: var(--text-sub); font-weight: 700;">ATAU</span>
          <div style="flex: 1; height: 1px; background: var(--border-color);"></div>
        </div>
        <svg style="display:none;">
          <symbol id="gLogo" viewBox="0 0 48 48">
            <path fill="#EA4335"
              d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z" />
            <path fill="#4285F4"
              d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z" />
            <path fill="#FBBC05"
              d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z" />
            <path fill="#34A853"
              d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z" />
          </symbol>
        </svg>
        <button type="button" class="btn btn-outline btn-block g-btn-auth" id="btnGoogleLogin" onclick="triggerGoogleLogin()"><svg
            width="14" height="14">
            <use href="#gLogo" />
          </svg> Masuk dengan Google</button>

        <div style="text-align: center; margin-top: 20px; font-size: 13px; color: var(--text-sub);">
          Belum punya akun? <span style="color: var(--primary); cursor: pointer; font-weight: 700;"
          onclick="switchAuth('register')">Daftar Disini</span>
        </div>
      </div>

      <div class="auth-card" id="registerForm" style="display: none;">
        <div class="auth-title">Buat Akun Member</div>
        <div class="auth-subtitle">Daftar akun member H2H resmi dt17.store</div>

        <div id="regFieldsSection">
          <div class="form-group"><label>Username</label><input type="text" id="regUsername" placeholder="reseller123" />
          </div>
          <div class="form-group"><label>Email</label><input type="email" id="regEmail" placeholder="nama@email.com" />
          </div>
          <div class="form-group"><label>Nomor WhatsApp</label><input type="text" id="regWA" placeholder="08xxxxxxxxxx" />
          </div>
          <div class="form-group"><label>Kata Sandi</label><input type="password" id="regPass" placeholder="Minimal 6 karakter" />
          </div>
          <div class="form-group"><label>Konfirmasi Kata Sandi</label><input type="password" id="regPassConfirm"
              placeholder="Ulangi Kata Sandi" /></div>

          <button class="btn btn-success btn-block" onclick="handleRegister()">Daftar Gratis</button>

          <div style="display: flex; align-items: center; margin: 12px 0; gap: 8px;">
            <div style="flex: 1; height: 1px; background: var(--border-color);"></div><span
            style="font-size: 10px; color: var(--text-sub); font-weight: 700;">ATAU</span>
            <div style="flex: 1; height: 1px; background: var(--border-color);"></div>
          </div>
          <button type="button" class="btn btn-outline btn-block g-btn-auth" onclick="triggerGoogleLogin()"><svg width="14"
              height="14">
              <use href="#gLogo" />
            </svg> Daftar Cepat via Google</button>

        </div>

        <div style="text-align: center; margin-top: 20px; font-size: 13px; color: var(--text-sub);">
          Sudah punya akun? <span style="color: var(--primary); cursor: pointer; font-weight: 700;"
          onclick="switchAuth('login')">Masuk Akun</span>
        </div>
      </div>
    </div>

    <div id="suspendedOverlay"
      style="display: none; position: fixed; inset: 0; background: rgba(8, 13, 26, 0.96); backdrop-filter: blur(20px); z-index: 99999; flex-direction: column; align-items: center; justify-content: center; padding: 20px;">
      <div style="position: absolute; top: 20px; right: 25px;">
        <button class="btn btn-outline" onclick="handleLogout()"
          style="padding: 8px 16px; font-size: 12px; border-color: rgba(239, 68, 68, 0.5); color: #fca5a5;">
          <i class="fas fa-sign-out-alt"></i> Keluar / Logout
        </button>
      </div>
      <div
        style="background: var(--panel-card); border: 1px solid rgba(239, 68, 68, 0.4); border-radius: 20px; max-width: 480px; width: 100%; padding: 35px 25px; text-align: center; box-shadow: 0 0 35px rgba(239, 68, 68, 0.25);">
        <div
          style="width: 70px; height: 70px; background: rgba(239, 68, 68, 0.15); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px auto; color: #ef4444; font-size: 32px;">
          <i class="fas fa-user-slash"></i>
        </div>
        <h2 style="font-size: 20px; color: #ffffff; margin-bottom: 10px; font-weight: 800;">Akses Ditangguhkan</h2>
        <p style="font-size: 13px; color: #cbd5e1; line-height: 1.6; margin-bottom: 25px;">
          Akun Anda Sedang Di Tangguhkan Oleh Admin. Silakan hubungi admin untuk informasi lebih lanjut mengenai pemulihan
          akun Anda.
        </p>
        <a href="https://t.me/iTCyrax" target="_blank" class="btn btn-success btn-block"

        style="padding: 12px; font-size: 13px; font-weight: 700; text-decoration: none;">
        <i class="fab fa-telegram-plane" style="font-size: 16px;"></i> Hubungi CS via Telegram
      </a>
      </div>
    </div>

    <div class="modal" id="modalForgotPass" style="z-index: 10002;">
      <div class="modal-content">
        <h3 style="margin-bottom: 12px;"><i class="fas fa-key" style="color: var(--danger);"></i> Reset Kata Sandi</h3>
        <p style="font-size: 11px; color: var(--text-sub); margin-bottom: 14px; line-height: 1.5;">
          Masukkan Email, Nomor WhatsApp, atau Username akun Anda. Kami akan mengirimkan tautan reset kata sandi ke email
          yang terdaftar.
        </p>
        <div class="form-group">
          <label>Email / WhatsApp / Username</label>
          <input type="text" id="forgotIdentifier" placeholder="nama@email.com atau 08xxxxxxxxxx">
        </div>
        <div style="display: flex; gap: 10px; margin-top: 18px;">
          <button class="btn btn-outline" style="flex: 1;" onclick="closeModal('modalForgotPass')">Batal</button>
          <button class="btn btn-danger" style="flex: 1;" id="btnSubmitForgot" onclick="submitForgotPassword()"><i
            class="fas fa-paper-plane"></i> Kirim Tautan</button>
        </div>
      </div>
    </div>

    <div class="modal" id="modalSetNewPass" style="z-index: 10003;">
      <div class="modal-content">
        <h3 style="margin-bottom: 12px;"><i class="fas fa-lock" style="color: var(--accent);"></i> Setel Sandi Baru</h3>
        <p style="font-size: 11px; color: var(--text-sub); margin-bottom: 14px;">
          Tautan valid! Silakan masukkan kata sandi baru untuk akun H2H Anda.
        </p>
        <input type="hidden" id="resetTokenInput">
        <div class="form-group">
          <label>Kata Sandi Baru</label>
          <input type="password" id="resetNewPass" placeholder="Minimal 6 karakter">
        </div>
        <div class="form-group">
          <label>Konfirmasi Kata Sandi Baru</label>
          <input type="password" id="resetNewPassConfirm" placeholder="Ulangi kata sandi baru">
        </div>
        <div style="display: flex; gap: 10px; margin-top: 18px;">
          <button class="btn btn-outline" style="flex: 1;" onclick="closeModal('modalSetNewPass')">Batal</button>
          <button class="btn btn-success" style="flex: 1;" id="btnSubmitSetPass" onclick="submitSetNewPassword()"><i
            class="fas fa-check"></i> Simpan Sandi</button>
        </div>
      </div>
    </div>

    <div class="modal" id="modalUnverifiedAlert" style="z-index: 10004;">
      <div class="modal-content" style="text-align: center;">
        <div
          style="width: 54px; height: 54px; background: rgba(239, 68, 68, 0.15); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 12px auto; color: #ef4444; font-size: 24px;">
          <i class="fas fa-envelope-circle-check"></i>
        </div>
        <h3 style="font-size: 15px; margin-bottom: 8px; color: #fff;">Email Belum Diverifikasi</h3>
        <p style="font-size: 11px; color: var(--text-sub); line-height: 1.5; margin-bottom: 16px;">
          Akun Anda belum aktif karena belum mengonfirmasi tautan aktivasi email. Silakan buka Kotak Masuk atau folder
          <b>Spam</b> pada email Anda.
        </p>
        <button class="btn btn-success btn-block" id="btnResendActivation" onclick="resendVerificationFromAlert()"
          style="margin-bottom: 8px;">
          <i class="fas fa-paper-plane"></i> Kirim Ulang Tautan Verifikasi
        </button>
        <button class="btn btn-outline btn-block" onclick="closeModal('modalUnverifiedAlert')">Tutup</button>
      </div>
    </div>

    <div class="modal" id="modalSuspendedAlert" style="z-index: 10009; backdrop-filter: blur(8px);">
      <div class="modal-content"
        style="max-width: 440px; border-radius: 18px; border: 1.5px solid #fca5a5; padding: 22px; box-shadow: 0 20px 45px rgba(220, 38, 38, 0.18);">
        <div style="text-align: center; margin-bottom: 14px;">
          <div
            style="width: 58px; height: 58px; background: #fee2e2; border: 2px solid #fca5a5; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 10px auto; color: #dc2626; font-size: 26px; box-shadow: 0 6px 18px rgba(220, 38, 38, 0.2);">
            <i class="fas fa-user-slash"></i>
          </div>
          <h3 style="font-size: 16px; font-weight: 800; color: #b91c1c; margin-bottom: 3px;">Akun Ditangguhkan</h3>
          <span class="badge badge-fail" style="font-size: 9px; padding: 2px 8px; border-radius: 12px;"><i class="fas fa-lock"></i> AKSES DIBLOKIR SEMENTARA</span>
        </div>
        <div
          style="background: #fef2f2; border: 1.5px solid #fecaca; border-radius: 13px; padding: 13px 14px; font-size: 11px; color: #7f1d1d; line-height: 1.55; margin-bottom: 14px;">
          <p style="font-weight: 700; margin-bottom: 8px; color: #991b1b;">
            Akun anda sedang di tangguhkan/diblokir oleh admin h2h,<br>ada beberapa alasan akun anda terblokir:
          </p>
          <ul style="padding-left: 18px; margin-bottom: 8px; display: flex; flex-direction: column; gap: 4px;">
            <li>Tidak melakukan Aktivasi Apikey ke admin(aktivasi akun baru) dalam waktu 3hari</li>
            <li>tidak mematuhi sdk dari panel kami</li>
            <li>mencoba meretas system h2h</li>
            <li>Akun tidak di gunakan(saldo0) dalam waktu 1 bulan(dead akun)</li>
          </ul>
          <p style="font-weight: 700; color: #b91c1c; margin-bottom: 0;">
            untuk permohonan aktivasi kembali akun bisa hubungi admin, thx
          </p>
        </div>
        <div style="display: flex; gap: 9px;">
          <button type="button" class="btn btn-outline"
            style="flex: 1; border-color: #cbd5e1 !important; color: #475569 !important; font-size: 11px; padding: 9px;"
            onclick="closeModal('modalSuspendedAlert')">Oke</button>
          <a href="https://t.me/iTCyrax" target="_blank" class="btn btn-success" style="flex: 1.3; font-size: 11px; padding: 9px; text-decoration: none;">

            <i class="fab fa-telegram-plane" style="font-size: 14px;"></i> Hubungi CS Telegram
          </a>
        </div>
      </div>
    </div>

    <div class="modal" id="modalGoogleCompleteProfile" style="z-index: 10005;">
      <div class="modal-content"
        style="border-color: rgba(66, 133, 244, 0.4); box-shadow: 0 15px 35px rgba(0,0,0,0.7), 0 0 20px rgba(66, 133, 244, 0.2);">
        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
          <div
            style="width: 38px; height: 38px; border-radius: 50%; background: rgba(66, 133, 244, 0.15); display: flex; align-items: center; justify-content: center; font-size: 18px; color: #4285F4;">
            <i class="fab fa-google"></i>
          </div>
          <div>
            <h3 style="font-size: 15px; margin: 0; color: #fff;">Lengkapi Akun Baru Google</h3>
            <small style="font-size: 10px; color: var(--text-sub);">Email: <b id="gCompleteEmailTxt"
              style="color: #60a5fa;">-</b></small>
          </div>
        </div>
        <div class="banner banner-info" style="padding: 8px 10px; font-size: 10px; margin-bottom: 12px;">
          <i class="fas fa-info-circle"></i>
          <div>Email Google Anda berhasil terverifikasi otomatis. Silakan tentukan Username & Nomor WhatsApp aktif untuk
            bertransaksi H2H.</div>
        </div>
        <div class="form-group">
          <label>Username Mitra</label>
          <input type="text" id="gCompleteUsername" placeholder="Contoh: reseller_jaya">
        </div>
        <div class="form-group">
          <label>Nomor WhatsApp (Wajib Aktif & Valid)</label>
          <input type="text" id="gCompleteWA" placeholder="Contoh: 081234567890">
        </div>
        <div class="form-group">
          <label>Kata Sandi (Opsional - agar bisa login manual tanpa Google)</label>
          <input type="password" id="gCompletePass" placeholder="Kosongkan jika hanya ingin login lewat Google">
        </div>
        <button class="btn btn-success btn-block" id="btnSubmitGProfile" style="margin-top: 15px; padding: 10px; font-size: 12px;"
          onclick="submitGoogleCompleteProfile()">
          <i class="fas fa-check-circle"></i> Simpan & Masuk Dashboard
        </button>
      </div>
    </div>

    <div class="container" id="mainDashboard" style="display: none; padding-top: 38px;">

      <div class="tab-nav neo-floating-dock" id="mainTabNav">
        <button class="tab-btn active" id="tabBtnDashboard" onclick="switchTab('dashboard')">
          <i class="nav-laser"></i>
          <span class="nav-orb"><i class="fas fa-compass"></i></span>
          <span class="nav-lbl">Konsol</span>
        </button>
        <button class="tab-btn" id="tabBtnTrxLangsung" onclick="switchTab('trxLangsung')">
          <i class="nav-laser"></i>
          <span class="nav-orb"><i class="fas fa-bolt"></i></span>
          <span class="nav-lbl">Katalog</span>
        </button>
        <button class="tab-btn" id="tabBtnHistory" onclick="switchTab('history')">
          <i class="nav-laser"></i>
          <span class="nav-orb"><i class="fas fa-receipt"></i></span>
          <span class="nav-lbl">Mutasi</span>
        </button>
        <button class="tab-btn" id="tabBtnRiwayatPo" onclick="switchTab('riwayatPo')">
          <i class="nav-laser"></i>
          <span class="nav-orb"><i class="fas fa-hourglass-half"></i></span>
          <span class="nav-lbl">PO Fresh</span>
        </button>
        <button class="tab-btn" id="tabBtnBotTele" onclick="switchTab('botTele')">
          <i class="nav-laser"></i>
          <span class="nav-orb"><i class="fab fa-telegram-plane"></i></span>
          <span class="nav-lbl">Bot VIP</span>
        </button>
        <button class="tab-btn" id="tabBtnCekQuota" onclick="switchTab('cekQuota')" style="display: none;">
          <i class="nav-laser"></i>
          <span class="nav-orb"><i class="fas fa-wifi"></i></span>
          <span class="nav-lbl">Kuota</span>
        </button>
        <button class="tab-btn" id="tabBtnLacak" onclick="switchTab('lacak')">
          <i class="nav-laser"></i>
          <span class="nav-orb"><i class="fas fa-satellite-dish"></i></span>
          <span class="nav-lbl">Radar</span>
        </button>
        <button class="tab-btn" id="tabBtnTester" onclick="switchTab('tester')">
          <i class="nav-laser"></i>
          <span class="nav-orb"><i class="fas fa-flask"></i></span>
          <span class="nav-lbl">Sandbox</span>
        </button>
        <button class="tab-btn" id="tabBtnDoc" onclick="switchTab('doc')">
          <i class="nav-laser"></i>
          <span class="nav-orb"><i class="fas fa-code"></i></span>
          <span class="nav-lbl">API Docs</span>
        </button>
      </div>

      <div id="tabDashboard" class="neo-dash-root">
        <div class="neo-cmd-bar">
          <div class="neo-cmd-top">
            <div class="neo-identity-group">
              <div class="neo-avatar-box">
                <i class="fas fa-layer-group"></i>
                <span class="neo-online-dot"></span>
              </div>
              <div class="neo-identity-text">
                <div class="neo-eyebrow">ENTERPRISE H2H CONSOLE</div>
                <div class="neo-user-row">
                  <span class="neo-username" id="profUsernameKtp">-</span>
                  <span id="profRoleKtp" class="badge badge-user">USER</span>
                  <span id="profAccTypeKtp" class="badge badge-cyan"><i class="fas fa-bolt"></i> AGEN XL AKRAB</span>
                  <span class="badge badge-success"><i class="fas fa-circle-check"></i> VERIFIED</span>
                </div>
                <div class="neo-email" id="profEmailKtp">-</div>
              </div>
            </div>
            <div class="neo-cmd-actions">
              <button type="button" class="neo-btn-cmd neo-btn-cmd-primary" onclick="openTopupModal()">
                <i class="fas fa-plus-circle"></i> <span>Deposit Saldo</span>
              </button>
              <button type="button" class="neo-btn-cmd neo-btn-cmd-secondary" onclick="switchTab('trxLangsung')">
                <i class="fas fa-bolt"></i> <span>Transaksi Cepat</span>
              </button>
              <button type="button" class="neo-btn-cmd neo-btn-cmd-ghost" onclick="bukaPengaturanPrinter()"
                title="Pengaturan Printer Thermal">
                <i class="fas fa-print"></i> <span>Printer</span>
              </button>
            </div>
          </div>
          <div id="dashboardRunningTextWrap" class="neo-ticker-bar">
            <span class="neo-ticker-badge"><span class="neo-live-dot"></span> LIVE FEED</span>
            <div class="rt-ticker-inner">
              <div id="dashboardRunningTextContent" class="rt-ticker-content rt-anim-scroll-left">
                <span class="rt-line" id="rtLine1">Selamat datang di dt17.store - Solusi H2H XL Akrab &amp; PPOB Terpercaya</span>
                <span class="rt-line" id="rtLine2" style="display:none;"></span>
              </div>
            </div>
          </div>
        </div>

        <div id="ktpBalanceBoxWrap" class="neo-vault-stage">
          <div id="unverifiedBalanceOverlay" class="neo-unverified-overlay" style="display: none;">
            <div class="neo-unv-card">
              <div class="neo-unv-user"><i class="fas fa-user-lock"></i> <span id="unverifiedOverlayUsername">-</span></div>
              <div class="neo-unv-email" id="unverifiedOverlayEmail">-</div>
              <div class="neo-unv-msg">Akun Anda belum diaktivasi. Aktifkan lisensi API Key untuk membuka brankas uang tunai &amp;
                jalur transaksi H2H:</div>
              <button type="button" class="btn btn-warning" onclick="openAktivasiAkunModal()">
                <i class="fas fa-key"></i> AKTIVASI AKUN &amp; API KEY
              </button>
            </div>
          </div>

          <div id="ktpBalanceBoxInner" class="neo-vault-inner">
            <div class="neo-vault-top-bar">
              <div class="neo-vault-chip-group">
                <div class="neo-emv-chip" title="Sovereign Bank Security Chip">
                  <div class="neo-emv-line"></div>
                </div>
                <i class="fas fa-wifi neo-nfc-wave" title="Contactless Instant Settlement"></i>
                <div class="neo-vault-bank-meta">
                  <div class="neo-vault-kicker">BRANKAS DANA TUNAI • RUPIAH (IDR)</div>
                  <div class="neo-cash-live-pill"><span class="neo-cash-dot"></span> UANG AKTIF • SIAP PAKAI</div>
                </div>
              </div>
              <div class="neo-guaranty-badge">
                <i class="fas fa-shield-halved"></i> 100% SALDO RIIL
              </div>
            </div>

            <div class="neo-hero-cash-box">
              <div class="neo-hero-cash-left">
                <div class="neo-hero-label-row">
                  <span class="neo-hero-label"><i class="fas fa-coins"></i> TOTAL SALDO TUNAI SAYA</span>
                  <button type="button" class="neo-eye-pill" onclick="toggleBalanceVisibility()"
                    title="Sembunyikan / Tampilkan Uang">
                    <i class="fas fa-eye" id="eyeBalanceIcon"></i> <span>Privasi</span>
                  </button>
                </div>
                <div class="neo-hero-amount-wrap">
                  <div id="profSaldo" class="neo-hero-amount mono">Rp 0</div>
                </div>
                <div class="neo-hero-trust-note">
                  <i class="fas fa-circle-check"></i> Dana tunai aktif milik Anda • Siap transaksi instan 24 jam
                </div>
              </div>
              <div class="neo-hero-cash-actions">
                <button type="button" class="neo-btn-deposit-real" onclick="openTopupModal()">
                  <i class="fas fa-plus-circle"></i> <span>+ ISI SALDO SEKARANG</span>
                </button>
                <button type="button" class="neo-btn-mutasi-real" onclick="switchTab('history')">
                  <i class="fas fa-file-invoice-dollar"></i> <span>Cek Mutasi Uang</span>
                </button>
              </div>
            </div>

            <div class="neo-pockets-header">
              <span><i class="fas fa-wallet"></i> RINCIAN KANTONG REKENING AKTIF</span>
              <small>Klik kantong untuk isi dana spesifik</small>
            </div>

            <div id="breakdownSaldoGrid" class="neo-vault-grid">
              <div id="wrapSaldoAkrab" class="neo-vault-card neo-vault-emerald"
                onclick="openTopupModal(); setTimeout(function(){ if(typeof selectTopupWallet==='function') selectTopupWallet('akrab'); }, 80);">
                <div class="neo-vc-left">
                  <div class="neo-vc-badge-row">
                    <span class="neo-vc-tag">KANTONG 01 • UTAMA</span>
                    <span class="neo-vc-dot"></span>
                  </div>
                  <div class="neo-vc-name">Saldo XL Akrab &amp; Fresh</div>
                  <div class="neo-vc-acc mono">REK-IDR • API 1</div>
                </div>
                <div class="neo-vc-right">
                  <div id="profSaldoAkrab" class="neo-vc-amount mono">Rp 0</div>
                  <span class="neo-vc-topup-chip"><i class="fas fa-plus"></i> Isi Dana</span>
                </div>
              </div>

              <div id="wrapSaldoApi2" class="neo-vault-card neo-vault-cyan"
                onclick="openTopupModal(); setTimeout(function(){ if(typeof selectTopupWallet==='function') selectTopupWallet('api2'); }, 80);">
                <div class="neo-vc-left">
                  <div class="neo-vc-badge-row">
                    <span class="neo-vc-tag">KANTONG 02 • PROMO</span>
                    <span class="neo-vc-dot"></span>
                  </div>
                  <div class="neo-vc-name">Saldo Akrab V2 &amp; FMX</div>
                  <div class="neo-vc-acc mono">REK-IDR • API 2</div>
                </div>
                <div class="neo-vc-right">
                  <div id="profSaldoApi2" class="neo-vc-amount mono">Rp 0</div>
                  <span class="neo-vc-topup-chip"><i class="fas fa-plus"></i> Isi Dana</span>
                </div>
              </div>

              <div id="wrapSaldoPpob" class="neo-vault-card neo-vault-amber"
                onclick="openTopupModal(); setTimeout(function(){ if(typeof selectTopupWallet==='function') selectTopupWallet('ppob'); }, 80);">
                <div class="neo-vc-left">
                  <div class="neo-vc-badge-row">
                    <span class="neo-vc-tag">KANTONG 04 • MULTIPAY</span>
                    <span class="neo-vc-dot"></span>
                  </div>
                  <div class="neo-vc-name">Saldo Pulsa &amp; PPOB</div>
                  <div class="neo-vc-acc mono">REK-IDR • API 4</div>
                </div>
                <div class="neo-vc-right">
                  <div id="profSaldoPpob" class="neo-vc-amount mono">Rp 0</div>
                  <span class="neo-vc-topup-chip"><i class="fas fa-plus"></i> Isi Dana</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="neo-launcher-row">
          <div class="neo-deck-wrap">
            <div class="neo-deck-head">
              <span class="neo-deck-title"><i class="fas fa-microchip"></i> PUSAT KOMANDO LAYANAN H2H</span>
              <span class="neo-deck-sub">7 MODUL AKTIF</span>
            </div>

            <div class="neo-hero-launch" onclick="switchTab('trxLangsung')">
              <div class="neo-hl-left">
                <div class="neo-hl-orb"><i class="fas fa-rocket"></i></div>
                <div class="neo-hl-info">
                  <div class="neo-hl-kicker">MODUL UTAMA • TRANSAKSI INSTAN</div>
                  <div class="neo-hl-name">Katalog &amp; Order Produk H2H</div>
                  <div class="neo-hl-tags">
                    <span>⚡ XL Akrab</span>
                    <span>🔥 Promo FMX</span>
                    <span>💳 Pulsa &amp; PPOB</span>
                  </div>
                </div>
              </div>
              <div class="neo-hl-cta">
                <span>BUKA</span> <i class="fas fa-arrow-right"></i>
              </div>
            </div>

            <div class="neo-pod-matrix">
              <div class="neo-pod-tile pod-amber" onclick="switchTab('riwayatPo')">
                <span class="neo-pod-code">MOD-01</span>
                <div class="neo-pod-orb"><i class="fas fa-hourglass-half"></i></div>
                <div class="neo-pod-title">PO Akrab Fresh</div>
                <div class="neo-pod-desc">Antrean XLA</div>
              </div>

              <div class="neo-pod-tile pod-emerald" onclick="switchTab('history')">
                <span class="neo-pod-code">MOD-02</span>
                <div class="neo-pod-orb"><i class="fas fa-file-invoice-dollar"></i></div>
                <div class="neo-pod-title">Mutasi &amp; Struk</div>
                <div class="neo-pod-desc">Rekap &amp; Cetak</div>
              </div>

              <div class="neo-pod-tile pod-cyan" onclick="switchTab('botTele')">
                <span class="neo-pod-code">MOD-03</span>
                <div class="neo-pod-orb"><i class="fab fa-telegram-plane"></i></div>
                <div class="neo-pod-title">Bot Tele VIP</div>
                <div class="neo-pod-desc">Downline 24/7</div>
              </div>

              <div class="neo-pod-tile pod-violet" onclick="switchTab('lacak')">
                <span class="neo-pod-code">MOD-04</span>
                <div class="neo-pod-orb"><i class="fas fa-satellite-dish"></i></div>
                <div class="neo-pod-title">Radar Lacak</div>
                <div class="neo-pod-desc">Audit RefID</div>
              </div>

              <div class="neo-pod-tile pod-rose" onclick="switchTab('tester')">
                <span class="neo-pod-code">MOD-05</span>
                <div class="neo-pod-orb"><i class="fas fa-flask"></i></div>
                <div class="neo-pod-title">API Sandbox</div>
                <div class="neo-pod-desc">Live Simulator</div>
              </div>

              <div class="neo-pod-tile pod-indigo" onclick="switchTab('doc')">
                <span class="neo-pod-code">MOD-06</span>
                <div class="neo-pod-orb"><i class="fas fa-code"></i></div>
                <div class="neo-pod-title">Dokumentasi</div>
                <div class="neo-pod-desc">Endpoint JSON</div>
              </div>
            </div>
          </div>

          <a href="https://t.me/dt17store" target="_blank" id="btnTelegramStockNotif" class="neo-stock-banner">
            <div class="neo-sb-left">
              <div class="neo-sb-icon"><i class="fab fa-telegram-plane"></i></div>
              <div>
                <div class="neo-sb-title">Radar Notifikasi Stok Akrab Fresh</div>
                <div id="txtTelegramStockSub" class="neo-sb-sub">Dapatkan notifikasi restock realtime via Telegram</div>
              </div>
            </div>
            <span id="badgeTelegramStockStatus" class="badge badge-success"><i class="fas fa-bell"></i> BERGABUNG</span>
          </a>
        </div>

        <div class="neo-bento-grid">
          <div class="neo-panel neo-cred-panel">
            <div class="neo-panel-head">
              <div>
                <div class="neo-panel-kicker">SECURITY &amp; INTEGRATION</div>
                <h3 class="neo-panel-title"><i class="fas fa-shield-halved"></i> Kredensial H2H &amp; Endpoint</h3>
              </div>
              <span class="neo-sec-pill"><i class="fas fa-lock"></i> AES-256</span>
            </div>

            <div class="neo-cred-list">
              <div class="neo-cred-item">
                <div class="neo-cred-label"><i class="fas fa-key" style="color:#f59e0b;"></i> API Secret Key</div>
                <div class="neo-cred-val-row">
                  <code class="neo-key-box mono" id="displayApiKeyKtp">dt17_••••••••</code>
                  <i class="fas fa-eye" id="eyeApiKeyIcon" style="cursor:pointer; color:#002dbb; font-size:13px;" onclick="toggleApiKeyVisibility()" title="Lihat/Sembunyikan"></i>
                </div>
              </div>

              <div class="neo-cred-item">
                <div class="neo-cred-label"><i class="fas fa-link" style="color:#8b5cf6;"></i> Webhook Callback URL</div>
                <div class="neo-cred-val mono" id="profWebhookUrlKtp">Belum diatur</div>
              </div>

              <div class="neo-cred-grid-2">
                <div class="neo-cred-item">
                  <div class="neo-cred-label"><i class="fas fa-network-wired" style="color:#0284c7;"></i> IP Whitelist</div>
                  <div class="neo-cred-val mono" id="profIpWhitelistKtp">Terbuka (Semua IP)</div>
                </div>
                <div class="neo-cred-item">
                  <div class="neo-cred-label"><i class="fab fa-whatsapp" style="color:#10b981;"></i> WhatsApp Mitra</div>
                  <div class="neo-cred-val mono" id="profWAKtp">-</div>
                </div>
              </div>
            </div>

            <div class="neo-cred-actions">
              <button type="button" class="neo-cred-btn" onclick="copyApiKey()">
                <i class="fas fa-copy" style="color:#0284c7;"></i> Salin Key
              </button>
              <button type="button" class="neo-cred-btn" onclick="regenApiKey()">
                <i class="fas fa-rotate" style="color:#d97706;"></i> Reset Key
              </button>
              <button type="button" class="neo-cred-btn" onclick="openWebhookModal()">
                <i class="fas fa-sliders" style="color:#7c3aed;"></i> Set Webhook
              </button>
            </div>
          </div>

          <div class="neo-panel neo-analytics-panel">
            <div class="neo-panel-head">
              <div>
                <div class="neo-panel-kicker">SYSTEM TELEMETRY &amp; VOLUME</div>
                <h3 class="neo-panel-title"><i class="fas fa-chart-line"></i> Performa Transaksi &amp; Status Cluster</h3>
              </div>
              <div class="neo-cluster-pills">
                <span id="statusApi1Badge" class="badge badge-success"><i class="fas fa-server"></i> API1: ONLINE</span>
                <span id="statusApi2Badge" class="badge badge-success"><i class="fas fa-server"></i> API2: ONLINE</span>
                <span id="statusApi4Badge" class="badge badge-success"><i class="fas fa-server"></i> API4: ONLINE</span>
              </div>
            </div>

            <div class="neo-kpi-strip">
              <div class="neo-kpi-card kpi-blue">
                <div class="neo-kpi-icon"><i class="fas fa-coins"></i></div>
                <div>
                  <small>Total Saldo Terpakai</small>
                  <b class="mono" id="profSaldoTerpakai">Rp 0</b>
                </div>
              </div>
              <div class="neo-kpi-card kpi-emerald">
                <div class="neo-kpi-icon"><i class="fas fa-check-double"></i></div>
                <div>
                  <small>Total Trx Berhasil</small>
                  <b id="profTotalTrxBerhasil">0 Transaksi</b>
                </div>
              </div>
            </div>

            <div class="neo-chart-box">
              <canvas id="monthlyTradingChart"></canvas>
            </div>

            <div class="neo-month-summary">
              <div class="neo-ms-item">
                <span>TOTAL BULAN INI</span>
                <b class="mono" id="monthTotalTrx">0 TRX</b>
              </div>
              <div class="neo-ms-item ms-ok">
                <span>SUKSES BULAN INI</span>
                <b class="mono" id="monthSuccessTrx">0 TRX</b>
              </div>
              <div class="neo-ms-item ms-fail">
                <span>GAGAL BULAN INI</span>
                <b class="mono" id="monthFailedTrx">0 TRX</b>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div id="tabTrxLangsung" style="display: none;">
        <div class="card" style="padding: 13px 15px;">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; gap: 8px;">
            <div style="min-width: 0;">
              <h2
                style="font-size: 15px; font-weight: 900; color: #00174f; display: flex; align-items: center; gap: 7px; margin-bottom: 2px;">
                <i class="fas fa-cart-shopping" style="color: #002dbb; font-size: 14px;"></i> Beli Produk
              </h2>
              <p style="font-size: 10px; color: var(--text-sub); white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                Daftar harga realtime &amp; filter cerdas</p>
            </div>
            <button type="button" class="btn-refresh-clean" onclick="loadHargaTerkini()" title="Segarkan Produk">
              <i class="fas fa-rotate"></i> <span>Refresh</span>
            </button>
          </div>

          <div
            style="background: #eef5ff; border: 1.5px solid #bcd0ee; border-radius: 14px; padding: 10px 12px; margin-bottom: 12px; box-shadow: 0 3px 10px rgba(0, 45, 187, 0.04);">
            <div style="margin-bottom: 9px;">
              <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                <span style="font-size: 10.5px; font-weight: 800; color: #002dbb; letter-spacing: 0.3px; display: flex; align-items: center; gap: 5px;">
                <i class="fas fa-server" style="color: #0050d8;"></i> PROVIDER SERVER:
              </span>
                <small style="font-size: 9.5px; color: var(--text-sub);">Pilih server layanan</small>
              </div>
              <input type="hidden" id="hargaServerSelect" value="api1">
              <div id="hargaServerChips"
                style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 6px; width: 100%; box-sizing: border-box;">
                <div style="grid-column: 1 / -1; font-size: 11px; color: var(--text-sub); padding: 4px; text-align: center;">
                  Memuat server...</div>
              </div>
            </div>

            <div style="display: flex; gap: 7px; align-items: center; padding-top: 8px; border-top: 1.5px dashed #bfdbfe;">
              <div class="search-wrap" style="flex: 1; position: relative;">
                <i class="fas fa-magnifying-glass" style="left: 9px; color: #002dbb; font-size: 10.5px;"></i>
                <input type="text" id="hargaSearchInput" placeholder="Cari Nama / Kode Produk..." onkeyup="filterHargaTerkini()"
                  style="padding: 5px 8px 5px 26px; font-size: 10.5px; min-height: 29px; border-radius: 8px; border: 1.5px solid #bcd0ee; width: 100%; background: #ffffff;" />
              </div>
              <div id="hargaCountInfo"
                style="font-size: 9px; font-weight: 800; color: #002dbb; background: #ffffff; padding: 5px 9px; border-radius: 8px; border: 1.5px solid #bfdbfe; white-space: nowrap; flex-shrink: 0; box-shadow: 0 1px 3px rgba(0,45,187,0.04);">
                Memuat...</div>
            </div>

            <div id="boxStandardCategoryFilter" style="margin-top: 9px; padding-top: 8px; border-top: 1.5px dashed #bfdbfe;">
              <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 7px;">
                <span style="font-size: 10.5px; font-weight: 800; color: #002dbb; letter-spacing: 0.3px; display: flex; align-items: center; gap: 5px;">
                <i class="fas fa-layer-group" style="color: #0050d8;"></i> KATEGORI FILTER:
              </span>
                <small style="font-size: 9.5px; color: var(--text-sub);">Semua kategori tampil</small>
              </div>
              <input type="hidden" id="hargaSubFilterSelect" value="">
              <div id="hargaCategoryChips"
                style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 6px; width: 100%; box-sizing: border-box;">
                <div style="grid-column: 1 / -1; font-size: 11px; color: var(--text-sub); padding: 4px; text-align: center;">
                  Memuat kategori...</div>
              </div>
            </div>

            <div id="boxApi4MenuFilter"
              style="display: none; margin-top: 14px; padding-top: 12px; border-top: 1.5px dashed #bfdbfe;">
              <div id="api4MenuNavContainer"></div>
            </div>
          </div>

          <div id="boxCekPromoFmx"
            style="display:none; background: linear-gradient(135deg, #fff1f2 0%, #fff7ed 50%, #eff6ff 100%); border: 2px solid #fb7185; border-radius: 16px; padding: 16px 18px; margin-bottom: 14px; box-shadow: 0 8px 25px rgba(244, 63, 94, 0.15);">
            <div
              style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 8px; margin-bottom: 10px;">
              <div style="display: flex; align-items: center; gap: 8px;">
                <div
                  style="width: 32px; height: 32px; border-radius: 10px; background: linear-gradient(135deg, #e11d48, #f59e0b); color: #fff; display: flex; align-items: center; justify-content: center; font-size: 14px; box-shadow: 0 3px 10px rgba(225, 29, 72, 0.4);">
                  <i class="fas fa-fire"></i>
                </div>
                <div>
                  <h3 style="font-size: 14px; font-weight: 900; color: #9f1239; margin: 0;">CEK &amp; BAYAR PROMO FLEXMAX (FMX)
                  </h3>
                  <small style="font-size: 10px; color: #9a3412; font-weight: 700;">Paket Promo Khusus XL • Kode Promo:
                    <b>XAPROMO</b></small>
                </div>
              </div>
              <span class="badge" style="background: #fef08a; color: #854d0e; border: 1px solid #facc15; font-size: 9.5px; padding: 3px 8px; font-weight: 800;">
              <i class="fas fa-clock"></i> Berlaku 10 Menit
            </span>
            </div>
            <p style="font-size: 11px; color: #475569; margin-bottom: 12px; line-height: 1.5;">
              Masukkan nomor XL tujuan untuk mengecek promo spesial FlexMax yang tersedia untuk nomor tersebut. Sistem akan
              menampilkan daftar paket beserta tombol beli instan.
            </p>
            <div style="display: flex; gap: 8px; flex-wrap: wrap;">
              <div style="flex: 1; min-width: 200px;">
                <input type="tel" inputmode="numeric" pattern="[0-9]*" id="promoFmxDestinationInput"
                  placeholder="Contoh: 081234567890 / 0878xxxxxxxx"
                  onkeydown="if(event.key==='Enter'){executeCekPromoFmx();}else if(!event.ctrlKey&&!event.metaKey&&event.key.length===1&&!/[0-9]/.test(event.key)){event.preventDefault();}"
                  oninput="this.value=this.value.replace(/\D/g,'')"
                  style="padding: 8px 12px; font-size: 12px; font-weight: 800; border-radius: 9px; border: 1.5px solid #fda4af; width: 100%;" />
              </div>
              <button type="button" class="btn" id="btnSubmitCekPromoFmx" onclick="executeCekPromoFmx()"
                style="background: linear-gradient(135deg, #e11d48 0%, #f59e0b 100%) !important; color: #ffffff !important; border: none; padding: 9px 18px; border-radius: 9px; font-size: 11.5px; font-weight: 800; box-shadow: 0 4px 14px rgba(225, 29, 72, 0.35); cursor: pointer;">
                <i class="fas fa-magnifying-glass"></i> Cek Promo FMX Sekarang
              </button>
            </div>
            <div id="promoFmxInlineStatus" style="margin-top: 10px; font-size: 11px; display: none;"></div>
          </div>

          <div id="hargaGridContainer" class="grid-products-4d"></div>
        </div>
      </div>

      <div id="tabRiwayatPo" style="display: none;">
        <div class="card">
          <div
            style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px; margin-bottom: 14px;">
            <div>
              <div class="card-title" style="margin-bottom: 2px;"><i class="fas fa-clock-rotate-left"
              style="color: #f59e0b;"></i> Riwayat Pre-Order (PO) Akrab Fresh</div>
              <div class="card-sub" style="margin-bottom: 0;">Pantau status antrean aktivasi paket Akrab Fresh (XLA), SN
                resmi, atau batalkan pesanan jika belum dieksekusi.</div>
            </div>
            <div style="display: flex; gap: 8px; flex-wrap: wrap;">
              <button class="btn btn-outline btn-sm" onclick="loadUserPreorders(true)"><i class="fas fa-rotate-right"></i>
                Muat Ulang</button>
            </div>
          </div>
          <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 5px; margin-bottom: 10px;">
            <div class="stat-mini" style="background:#eff6ff; border-color:#bfdbfe;"><b style="color:#002dbb;"
            id="poUserStatTotal">0</b><small style="color:#1e40af;">Total PO</small></div>
            <div class="stat-mini" style="background:#fffbeb; border-color:#fde68a;"><b style="color:#d97706;"
            id="poUserStatPending">0</b><small style="color:#b45309;">Pending</small></div>
            <div class="stat-mini" style="background:#ecfdf5; border-color:#a7f3d0;"><b style="color:#059669;"
            id="poUserStatOk">0</b><small style="color:#047857;">Berhasil</small></div>
            <div class="stat-mini" style="background:#fef2f2; border-color:#fecaca;"><b style="color:#dc2626;"
            id="poUserStatFail">0</b><small style="color:#b91c1c;">Dibatalkan</small></div>
          </div>
          <div class="toolbar"
            style="display: flex; gap: 10px; flex-wrap: wrap; align-items: center; justify-content: space-between; background: #eff6ff; padding: 12px 14px; border-radius: 12px; border: 1.5px solid #bfdbfe; margin-bottom: 14px;">
            <div style="flex: 1; min-width: 200px;">
              <div class="search-wrap" style="position: relative; display: flex; align-items: center;">
                <i class="fas fa-magnifying-glass"
              style="position: absolute; left: 10px; color: #002dbb; font-size: 11px;"></i>
                <input type="text" id="userPoSearch" placeholder="🔍 Cari RefID / Tujuan / Produk PO..."
                  oninput="renderUserPoList()" style="padding-left: 28px; width: 100%;" />
              </div>
            </div>
            <div style="display: flex; gap: 6px; flex-wrap: wrap;">
              <button class="chip active" id="poChipAll" onclick="filterUserPo('ALL')"><i class="fas fa-layer-group"></i>
                Semua</button>
              <button class="chip" id="poChipPending" onclick="filterUserPo('PENDING')"><i
              class="fas fa-hourglass-half"></i> Antrean</button>
              <button class="chip" id="poChipSuccess" onclick="filterUserPo('BERHASIL')"><i class="fas fa-circle-check"></i>
                Berhasil</button>
              <button class="chip" id="poChipFailed" onclick="filterUserPo('GAGAL')"><i class="fas fa-circle-xmark"></i>
                Dibatalkan</button>
            </div>
          </div>
          <div id="userPoListContainer" style="display: flex; flex-direction: column; gap: 12px;">
            <div style="text-align: center; padding: 25px; color: var(--text-sub);"><i class="fas fa-spinner fa-spin"
            style="font-size: 20px; color: #002dbb;"></i><br>Memuat data Pre-Order...</div>
          </div>
        </div>
      </div>

      <div id="tabHistory" style="display: none;">
        <style id="mutasiScopedCss">
        #tabHistory .mut-shell { background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 16px; padding: 12px 14px; box-shadow: 0 8px 24px -6px rgba(15, 23, 42, 0.08); }
        #tabHistory .mut-head { display: flex; justify-content: space-between; align-items: center; gap: 8px; margin-bottom: 8px; }
        #tabHistory .mut-title-wrap { min-width: 0; display: flex; align-items: center; gap: 7px; flex-wrap: wrap; }
        #tabHistory .mut-title { font-size: 14px; font-weight: 900; color: #0f172a; display: inline-flex; align-items: center; gap: 6px; letter-spacing: -0.2px; }
        #tabHistory .mut-title i { color: #002dbb; font-size: 13px; }
        #tabHistory .mut-count-pill { font-size: 9px; font-weight: 800; color: #002dbb; background: #eff6ff; border: 1px solid #bfdbfe; padding: 2px 7px; border-radius: 20px; white-space: nowrap; }
        #tabHistory .mut-head-acts { display: flex; gap: 5px; align-items: center; flex-shrink: 0; }
        #tabHistory .mut-top-btn { background: #f8fafc !important; border: 1.5px solid #cbd5e1 !important; color: #0f172a !important; padding: 4px 9px !important; min-height: 28px !important; font-size: 10px !important; font-weight: 800 !important; border-radius: 8px !important; display: inline-flex !important; align-items: center !important; gap: 4px !important; cursor: pointer; box-shadow: none !important; white-space: nowrap; position: relative; touch-action: manipulation; }
        #tabHistory .mut-top-btn:hover { background: #eff6ff !important; border-color: #002dbb !important; color: #002dbb !important; }
        #tabHistory .mut-top-btn.is-on { background: #0f172a !important; border-color: #0f172a !important; color: #ffffff !important; }
        #tabHistory .mut-top-btn-csv { color: #6d28d9 !important; border-color: #ddd6fe !important; background: #faf5ff !important; }
        #tabHistory .mut-dot-ind { width: 6px; height: 6px; border-radius: 50%; background: #10b981; display: none; }
        #tabHistory .mut-stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 5px; margin-bottom: 6px; }
        #tabHistory .mut-stat-pill { background: #f8fafc; border: 1.5px solid #e2e8f0; border-radius: 9px; padding: 5px 6px; display: flex; flex-direction: column; align-items: center; justify-content: center; cursor: pointer; transition: all 0.15s ease; user-select: none; touch-action: manipulation; }
        #tabHistory .mut-stat-pill:hover { border-color: #93c5fd; background: #eff6ff; }
        #tabHistory .mut-stat-pill.is-active { border-color: #002dbb; background: #eff6ff; box-shadow: 0 2px 6px rgba(0, 45, 187, 0.12); }
        #tabHistory .mut-stat-pill b { font-size: 12px; font-weight: 900; line-height: 1.1; font-family: 'Consolas', monospace; }
        #tabHistory .mut-stat-pill small { font-size: 7.5px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.2px; margin-top: 2px; color: #64748b; }
        #tabHistory .mut-cash-strip { background: linear-gradient(90deg, #090e1a 0%, #1e293b 100%); border-radius: 9px; padding: 5px 10px; margin-bottom: 8px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 6px; color: #ffffff; font-size: 9.5px; }
        #tabHistory .mut-cash-item { display: inline-flex; align-items: center; gap: 4px; color: #cbd5e1; font-weight: 600; }
        #tabHistory .mut-cash-item b { font-family: 'Consolas', monospace; font-weight: 900; font-size: 10.5px; }
        #tabHistory .mut-search-row { display: flex; gap: 6px; align-items: center; margin-bottom: 7px; }
        #tabHistory .mut-search-box { position: relative; flex: 1; min-width: 0; display: flex; align-items: center; }
        #tabHistory .mut-search-box i.mut-s-ico { position: absolute; left: 9px; color: #002dbb; font-size: 10.5px; pointer-events: none; }
        #tabHistory #userTrxSearch { width: 100%; padding: 5px 26px 5px 27px !important; min-height: 30px !important; font-size: 11px !important; font-weight: 600; border: 1.5px solid #cbd5e1 !important; border-radius: 8px !important; background: #f8fafc !important; color: #0f172a !important; }
        #tabHistory #userTrxSearch:focus { background: #ffffff !important; border-color: #002dbb !important; }
        #tabHistory .mut-clear-x { position: absolute; right: 6px; width: 18px; height: 18px; border-radius: 50%; border: none; background: #cbd5e1; color: #0f172a; font-size: 10px; font-weight: 900; display: none; align-items: center; justify-content: center; cursor: pointer; padding: 0; line-height: 1; }
        #tabHistory .mut-date-trigger { background: #eff6ff !important; border: 1.5px solid #93c5fd !important; color: #002dbb !important; padding: 4px 8px !important; min-height: 30px !important; border-radius: 8px !important; font-size: 9.5px !important; font-weight: 800 !important; display: inline-flex; align-items: center; gap: 4px; cursor: pointer; white-space: nowrap; flex-shrink: 0; touch-action: manipulation; }
        #tabHistory .mut-chips-row { display: flex; gap: 5px; overflow-x: auto; scrollbar-width: none; padding-bottom: 2px; margin-bottom: 8px; }
        #tabHistory .mut-chips-row::-webkit-scrollbar { display: none; }
        #tabHistory .mut-chips-row .chip { padding: 4px 9px !important; min-height: 26px !important; font-size: 9.5px !important; font-weight: 800 !important; border-radius: 16px !important; white-space: nowrap; flex-shrink: 0; touch-action: manipulation; }
        #tabHistory .mut-adv-bar { display: none; background: #f1f5f9; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 8px 9px; margin-bottom: 9px; }
        #tabHistory .mut-adv-presets { display: flex; gap: 4px; flex-wrap: wrap; margin-bottom: 7px; }
        #tabHistory .mut-pre-btn { background: #ffffff; border: 1px solid #cbd5e1; color: #334155; font-size: 9px; font-weight: 800; padding: 3px 8px; border-radius: 6px; cursor: pointer; min-height: 24px; touch-action: manipulation; }
        #tabHistory .mut-pre-btn.active { background: #002dbb; border-color: #002dbb; color: #ffffff; }
        #tabHistory .mut-adv-inputs { display: grid; grid-template-columns: 1.2fr 1fr 0.7fr auto; gap: 5px; align-items: center; }
        #tabHistory .mut-adv-inputs input, #tabHistory .mut-adv-inputs select { padding: 4px 7px !important; min-height: 28px !important; font-size: 10px !important; border-radius: 7px !important; border: 1px solid #cbd5e1 !important; background: #ffffff !important; }
        #tabHistory .mut-day-grp { margin-top: 6px; }
        #tabHistory .mut-day-grp:first-child { margin-top: 0; }
        #tabHistory .mut-day-hdr { display: flex; justify-content: space-between; align-items: center; padding: 2px 4px 4px 4px; font-size: 9.5px; font-weight: 800; color: #1e3a8a; border-bottom: 1px dashed #dbeafe; margin-bottom: 5px; }
        #tabHistory .mut-day-hdr span.mut-day-sum { font-size: 9px; color: #64748b; font-weight: 700; font-family: 'Consolas', monospace; }
        #tabHistory .mut-list { display: flex; flex-direction: column; gap: 4px; }
        #tabHistory .mut-row { display: flex; align-items: center; justify-content: space-between; gap: 7px; padding: 6px 8px; background: #ffffff; border: 1px solid #dbe4f0; border-left-width: 3px; border-radius: 10px; cursor: pointer; transition: border-color 0.12s ease, background 0.12s ease; touch-action: manipulation; }
        #tabHistory .mut-row:hover { border-color: #3b82f6; background: #f8fafc; }
        #tabHistory .mut-row.st-ok { border-left-color: #10b981; }
        #tabHistory .mut-row.st-pend { border-left-color: #f59e0b; background: #fffdf5; }
        #tabHistory .mut-row.st-fail { border-left-color: #ef4444; background: #fffafa; }
        #tabHistory .mut-row-l { display: flex; align-items: flex-start; gap: 7px; min-width: 0; flex: 1; }
        #tabHistory .mut-ico { width: 25px; height: 25px; border-radius: 7px; display: flex; align-items: center; justify-content: center; font-size: 11px; color: #ffffff; flex-shrink: 0; margin-top: 1px; }
        #tabHistory .mut-info { min-width: 0; flex: 1; }
        #tabHistory .mut-l1 { display: flex; align-items: center; gap: 4px; min-width: 0; }
        #tabHistory .mut-prod { font-size: 11px; font-weight: 800; color: #0f172a; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.25; }
        #tabHistory .mut-srv-tag { font-size: 7.5px; font-weight: 800; padding: 1px 4px; border-radius: 4px; background: #eff6ff; color: #002dbb; border: 1px solid #bfdbfe; flex-shrink: 0; font-family: 'Consolas', monospace; }
        #tabHistory .mut-srv-tag.is-top { background: #ecfdf5; color: #047857; border-color: #a7f3d0; }
        #tabHistory .mut-srv-tag.is-ded { background: #ecfeff; color: #0e7490; border-color: #a5f3fc; }
        #tabHistory .mut-l2 { display: flex; align-items: center; gap: 4px; flex-wrap: nowrap; min-width: 0; font-size: 9.5px; color: #475569; margin-top: 1px; line-height: 1.25; }
        #tabHistory .mut-tgt { font-family: 'Consolas', monospace; font-weight: 800; color: #002dbb; white-space: nowrap; }
        #tabHistory .mut-time { font-family: 'Consolas', monospace; font-size: 9px; color: #64748b; flex-shrink: 0; }
        #tabHistory .mut-ref { font-family: 'Consolas', monospace; font-size: 8.5px; color: #64748b; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; min-width: 0; }
        #tabHistory .mut-l3 { display: flex; align-items: center; gap: 4px; margin-top: 2px; min-width: 0; }
        #tabHistory .mut-sn-pill { font-family: 'Consolas', monospace; font-size: 8.5px; font-weight: 700; padding: 1px 5px; border-radius: 4px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100%; }
        #tabHistory .mut-sn-pill.ok { background: #ecfdf5; color: #065f46; border: 1px solid #a7f3d0; }
        #tabHistory .mut-sn-pill.fail { background: #fef2f2; color: #991b1b; border: 1px solid #fecaca; }
        #tabHistory .mut-sn-pill.pend { background: #fffbeb; color: #92400e; border: 1px solid #fde68a; }
        #tabHistory .mut-copy-mini { background: #f1f5f9; border: 1px solid #cbd5e1; color: #334155; border-radius: 4px; padding: 0 4px; height: 15px; font-size: 8px; display: inline-flex; align-items: center; justify-content: center; cursor: pointer; flex-shrink: 0; }
        #tabHistory .mut-copy-mini:hover { background: #dbeafe; color: #002dbb; border-color: #93c5fd; }
        #tabHistory .mut-row-r { display: flex; flex-direction: column; align-items: flex-end; justify-content: center; gap: 3px; flex-shrink: 0; }
        #tabHistory .mut-price { font-family: 'Consolas', monospace; font-size: 11px; font-weight: 900; line-height: 1.15; white-space: nowrap; }
        #tabHistory .mut-price.is-in { color: #059669; }
        #tabHistory .mut-price.is-out { color: #0f172a; }
        #tabHistory .mut-price.is-fail { color: #94a3b8; text-decoration: line-through; font-weight: 700; }
        #tabHistory .mut-acts { display: flex; align-items: center; gap: 3px; }
        #tabHistory .mut-st-badge { font-size: 7.5px; font-weight: 900; padding: 1.5px 5px; border-radius: 5px; letter-spacing: 0.2px; text-transform: uppercase; white-space: nowrap; }
        #tabHistory .mut-st-badge.ok { background: #d1fae5; color: #065f46; }
        #tabHistory .mut-st-badge.pend { background: #fef3c7; color: #92400e; }
        #tabHistory .mut-st-badge.fail { background: #fee2e2; color: #991b1b; }
        #tabHistory .mut-act-btn { width: 22px; height: 22px; min-height: 22px !important; padding: 0 !important; border-radius: 6px !important; border: 1px solid #cbd5e1 !important; background: #f8fafc !important; color: #002dbb !important; font-size: 9.5px !important; display: inline-flex !important; align-items: center !important; justify-content: center !important; cursor: pointer; box-shadow: none !important; touch-action: manipulation; }
        #tabHistory .mut-act-btn:hover { background: #eff6ff !important; border-color: #002dbb !important; }
        #tabHistory .mut-act-btn.is-warn { background: #fffbeb !important; border-color: #fcd34d !important; color: #b45309 !important; }
        #tabHistory .mut-act-btn.is-pay { background: #ecfdf5 !important; border-color: #6ee7b7 !important; color: #047857 !important; }
        #tabHistory .mut-pag { display: flex; justify-content: space-between; align-items: center; margin-top: 10px; flex-wrap: wrap; gap: 6px; border-top: 1px solid #e2e8f0; padding-top: 8px; }
        #tabHistory .mut-pag small { font-size: 9.5px; color: #64748b; font-weight: 700; }
        #tabHistory #userPaginationBtns { display: flex; gap: 4px; flex-wrap: wrap; }
        #tabHistory #userPaginationBtns .btn { padding: 3px 8px !important; min-height: 25px !important; font-size: 9.5px !important; border-radius: 6px !important; }
        @media (max-width: 768px) {
          #tabHistory .mut-shell { padding: 9px 9px; border-radius: 13px; }
          #tabHistory .mut-adv-inputs { grid-template-columns: 1fr 1fr; }
        }
        </style>
        <div class="mut-shell">
          <div class="mut-head">
            <div class="mut-title-wrap">
              <div class="mut-title"><i class="fas fa-receipt"></i> Mutasi Transaksi</div>
              <span class="mut-count-pill" id="userTrxCountInfo">Memuat...</span>
            </div>
            <div class="mut-head-acts">
              <button type="button" class="mut-top-btn" id="btnMutasiAdvToggle" onclick="toggleMutasiAdvFilter()"
                title="Filter Tanggal &amp; Server">
                <i class="fas fa-sliders"></i> <span>Filter</span> <span class="mut-dot-ind" id="mutasiFilterDot"></span>
              </button>
              <button type="button" class="mut-top-btn" id="btnRefreshMutasi" onclick="refreshMutasiManual()"
                title="Muat Ulang Mutasi">
                <i class="fas fa-rotate-right"></i> <span>Muat</span>
              </button>
              <button type="button" class="mut-top-btn mut-top-btn-csv" onclick="exportUserHistoryCSV()" title="Ekspor CSV">
                <i class="fas fa-file-export"></i> <span>CSV</span>
              </button>
            </div>
          </div>
          <div class="mut-stats-grid">
            <div class="mut-stat-pill is-active" id="mutStatPillAll" onclick="filterUserHistoryStatus('all')">
              <b style="color:#002dbb;" id="histStatTotal">0</b><small>Total</small>
            </div>
            <div class="mut-stat-pill" id="mutStatPillOk" onclick="filterUserHistoryStatus('success')">
              <b style="color:#059669;" id="histStatOk">0</b><small>Berhasil</small>
            </div>
            <div class="mut-stat-pill" id="mutStatPillPend" onclick="filterUserHistoryStatus('pending')">
              <b style="color:#d97706;" id="histStatPend">0</b><small>Diproses</small>
            </div>
            <div class="mut-stat-pill" id="mutStatPillFail" onclick="filterUserHistoryStatus('failed')">
              <b style="color:#dc2626;" id="histStatFail">0</b><small>Gagal</small>
            </div>
          </div>
          <div class="mut-cash-strip">
            <span class="mut-cash-item">Filter: <b id="histStatNominal" style="color:#38bdf8;">Rp 0</b></span>
            <span class="mut-cash-item">Belanja: <b id="histStatNominalOk" style="color:#34d399;">Rp 0</b></span>
            <span class="mut-cash-item">Topup: <b id="histStatNominalTopup" style="color:#fde047;">Rp 0</b></span>
          </div>
          <div class="mut-search-row">
            <div class="mut-search-box">
              <i class="fas fa-magnifying-glass mut-s-ico"></i>
              <input type="text" id="userTrxSearch" placeholder="Cari tujuan, produk, RefID, SN..."
                oninput="onUserTrxSearchInput()" />
              <button type="button" class="mut-clear-x" id="btnClearUserTrxSearch" onclick="clearUserTrxSearch()"
                title="Hapus Pencarian">&times;</button>
            </div>
            <button type="button" class="mut-date-trigger" onclick="toggleMutasiAdvFilter()" title="Atur Tanggal">
              <i class="fas fa-calendar-day"></i> <span id="mutasiDateBadgeTxt">Hari Ini</span>
            </button>
          </div>
          <div class="mut-chips-row" id="userHistStatusChips">
            <button type="button" class="chip active" id="chipHistAll"
              onclick="filterUserHistoryStatus('all')"><i class="fas fa-layer-group"></i> Semua</button>
            <button type="button" class="chip" id="chipHistProduk"
              onclick="filterUserHistoryStatus('produk')"><i class="fas fa-bolt"></i> Produk</button>
            <button type="button" class="chip" id="chipHistTopup" onclick="filterUserHistoryStatus('topup')"
              style="color:#047857 !important; border-color:#a7f3d0 !important;"><i class="fas fa-wallet"></i> Topup</button>
            <button type="button" class="chip" id="chipHistSuccess"
              onclick="filterUserHistoryStatus('success')"><i class="fas fa-circle-check"></i> Berhasil</button>
            <button type="button" class="chip" id="chipHistPending"
              onclick="filterUserHistoryStatus('pending')"><i class="fas fa-hourglass-half"></i> Diproses</button>
            <button type="button" class="chip" id="chipHistFailed"
              onclick="filterUserHistoryStatus('failed')"><i class="fas fa-circle-xmark"></i> Gagal</button>
          </div>
          <div class="mut-adv-bar" id="mutasiAdvFilterBar">
            <div class="mut-adv-presets">
              <button type="button" class="mut-pre-btn active" id="mutasiDateToday" onclick="setMutasiDatePreset('today')">Hari
                Ini</button>
              <button type="button" class="mut-pre-btn" id="mutasiDateYesterday"
                onclick="setMutasiDatePreset('yesterday')">Kemarin</button>
              <button type="button" class="mut-pre-btn" id="mutasiDate7d" onclick="setMutasiDatePreset('7d')">7 Hari</button>
              <button type="button" class="mut-pre-btn" id="mutasiDate30d" onclick="setMutasiDatePreset('30d')">30 Hari</button>
              <button type="button" class="mut-pre-btn" id="mutasiDateAll" onclick="setMutasiDatePreset('all')">Semua Tgl</button>
            </div>
            <div class="mut-adv-inputs">
              <input type="date" id="userTrxDate" onchange="onUserTrxDateInput()" title="Pilih Tanggal" />
              <select id="userTrxServer" onchange="syncMutasiDateUI(); filterUserHistory();" title="Filter Jalur Server">
                <option value="">Semua Jalur</option>
                <option value="api1">API 1 (Akrab)</option>
                <option value="api2">API 2 (V2/FMX)</option>
                <option value="api4">API 4 (PPOB)</option>
                <option value="TOPUP">Topup Saldo</option>
              </select>
              <select id="userTrxPerPage" onchange="changeUserPerPage(this.value)" title="Baris Per Halaman">
                <option value="25">25 / hal</option>
                <option value="50" selected>50 / hal</option>
                <option value="100">100 / hal</option>
                <option value="200">200 / hal</option>
              </select>
              <button type="button" class="mut-top-btn" onclick="resetUserTrxFilter()"
                title="Reset Semua Filter"><i class="fas fa-undo"></i> Reset</button>
            </div>
          </div>
          <div id="userTrxContainer" class="mut-list">
            <div style="text-align: center; padding: 20px; color: var(--text-sub); font-size: 11px;">
              <i class="fas fa-spinner fa-spin" style="font-size: 18px; color: #002dbb;"></i><br>Memuat riwayat mutasi...
            </div>
          </div>
          <div class="mut-pag">
            <small id="userPaginationPageText">Hal 1/1</small>
            <div id="userPaginationBtns"></div>
          </div>
        </div>
      </div>
      <div id="tabCekQuota" style="display: none;">
        <div class="card" style="max-width: 720px; margin: 0 auto;">
          <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 15px;">
            <div>
              <h2 style="font-size: 16px; color: #002dbb; display: flex; align-items: center; gap: 8px;"><i
              class="fas fa-wifi"></i> Cek Paket &amp; Sisa Kuota XL</h2>
              <p style="font-size: 11px; color: var(--text-sub);">Cek status sisa kuota, kuota bersama akrab, dan masa aktif
                nomor XL</p>
            </div>
            <span class="badge badge-cyan"><i class="fas fa-bolt"></i> myXL Engine</span>
          </div>
          <div class="toolbar" style="background: #f0f7ff; border: 1.5px solid #bfdbfe; border-radius: 14px; padding: 14px;">
            <div class="fg grow">
              <label style="color: #002dbb;"><i class="fas fa-mobile-screen-button"></i> Nomor XL Pelanggan / Tujuan</label>
              <div class="search-wrap">
                <i class="fas fa-phone" style="color: #002dbb;"></i>
                <input type="text" id="inputCekQuotaMsisdn" placeholder="Contoh: 087812345678 / 62878xxxx"
                  onkeydown="if(event.key==='Enter')executeCekQuota()" />
              </div>
            </div>
            <div class="fg">
              <label>&nbsp;</label>
              <button class="btn" id="btnSubmitCekQuota" onclick="executeCekQuota()"
                style="background: linear-gradient(135deg, #002dbb 0%, #0056e0 100%);"><i class="fas fa-search"></i> Cek
                Kuota</button>
            </div>
          </div>
          <div id="cekQuotaResultWrap" style="margin-top: 20px; display: none;">
            <div id="cekQuotaContent"></div>
          </div>
        </div>
      </div>
      <div id="tabLacak" style="display: none;">
        <div class="card">
          <div
            style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px; margin-bottom: 14px;">
            <div>
              <div class="card-title" style="margin-bottom: 2px;"><i class="fas fa-magnifying-glass-chart"></i> Lacak
                &amp; Telusuri Transaksi</div>
              <div class="card-sub" style="margin-bottom: 0;">Cukup tempel <b>RefID H2H</b>, <b>nomor
              tujuan</b>, <b>kode/nama produk</b>, <b>SN</b>, atau <b>username</b> — sistem otomatis menebak jenis
                kata kunci Anda.</div>
            </div>
            <div style="display: flex; gap: 8px; flex-wrap: wrap;">
              <button class="btn btn-outline btn-sm" onclick="lacakRefresh()"><i class="fas fa-rotate-right"></i> Muat
                Ulang</button>
              <button class="btn btn-purple btn-sm" onclick="lacakExportCSV()"><i class="fas fa-file-export"></i> Ekspor
                CSV</button>
            </div>
          </div>

          <div class="toolbar">
            <div class="fg grow">
              <label>Kata Kunci Pencarian (otomatis mendeteksi jenis)</label>
              <div class="search-wrap">
                <i class="fas fa-magnifying-glass"></i>
                <input type="text" id="lacakSearch" oninput="lacakOnInput()"
                  onkeydown="if(event.key==='Enter'){lacakPage=1;renderLacak();}"
                  placeholder="Contoh: TRX_20260101_123  •  087812345678  •  XLB5  •  SN-123" />
              </div>
            </div>
            <div class="fg">
              <label>Jenis Pencarian</label>
              <select id="lacakMode" onchange="lacakPage=1;renderLacak()">
                <option value="auto">Otomatis (Ditebak Sistem)</option>
                <option value="refid">RefID H2H</option>
                <option value="target">Nomor Tujuan</option>
                <option value="produk">Kode / Nama Produk</option>
                <option value="sn">SN / Serial Number</option>
                <option value="username">Username</option>
                <option value="semua">Semua Kolom</option>
              </select>
            </div>
            <div class="fg">
              <label>&nbsp;</label>
              <button class="btn btn-outline btn-sm" onclick="lacakReset()"><i class="fas fa-filter-circle-xmark"></i>
                Reset</button>
            </div>
          </div>

          <div class="banner banner-info" id="lacakDeteksi" style="display: none;"></div>

          <div class="chip-bar" id="lacakChips">
            <button class="chip" data-chip="all" onclick="lacakChip('all')"><i class="fas fa-layer-group"></i>
              Semua</button>
            <button class="chip" data-chip="today" onclick="lacakChip('today')"><i class="fas fa-calendar-day"></i> Hari
              Ini</button>
            <button class="chip" data-chip="7d" onclick="lacakChip('7d')"><i class="fas fa-calendar-week"></i> 7
              Hari</button>
            <button class="chip" data-chip="30d" onclick="lacakChip('30d')"><i class="fas fa-calendar"></i> 30
              Hari</button>
            <button class="chip" data-chip="gagal" onclick="lacakChip('gagal')"><i class="fas fa-circle-xmark"></i>
              Gagal</button>
            <button class="chip" data-chip="pending" onclick="lacakChip('pending')"><i class="fas fa-hourglass-half"></i>
              Pending</button>
            <button class="chip" data-chip="berhasil" onclick="lacakChip('berhasil')"><i class="fas fa-circle-check"></i>
              Berhasil</button>
            <button class="chip" data-chip="topup" onclick="lacakChip('topup')"><i class="fas fa-wallet"></i>
              Topup</button>
          </div>

          <div class="toolbar">
            <div class="fg">
              <label>Status</label>
              <select id="lacakStatus" onchange="lacakPage=1;renderLacak()">
                <option value="">Semua Status</option>
                <option value="BERHASIL">BERHASIL</option>
                <option value="GAGAL">GAGAL</option>
                <option value="PENDING">PENDING</option>
              </select>
            </div>
            <div class="fg">
              <label>Server</label>
              <select id="lacakServer" onchange="lacakPage=1;renderLacak()">
                <option value="">Semua Server</option>
                <option value="api1">api1 — AkrabStable (XL Akrab)</option>
                <option value="api2">api2 — Akrab V2 (Produk & Promo)</option>
                <option value="api4">api4 — AkrabOke (PPOB & E-Wallet)</option>
                <option value="TOPUP">TOPUP SALDO</option>
              </select>
            </div>
            <div class="fg">
              <label>Dari Tanggal</label>
              <input type="date" id="lacakDateFrom" onchange="lacakPage=1;renderLacak()" />
            </div>
            <div class="fg">
              <label>Sampai Tanggal</label>
              <input type="date" id="lacakDateTo" onchange="lacakPage=1;renderLacak()" />
            </div>
            <div class="fg">
              <label>Harga Minimal</label>
              <input type="number" id="lacakHargaMin" placeholder="0" oninput="lacakPage=1;renderLacak()" />
            </div>
            <div class="fg">
              <label>Harga Maksimal</label>
              <input type="number" id="lacakHargaMax" placeholder="0" oninput="lacakPage=1;renderLacak()" />
            </div>
          </div>

          <div class="grid grid-5" style="margin-bottom: 14px;">
            <div class="stat-mini"><b id="lacakStatTotal">0</b><small>Hasil</small></div>
            <div class="stat-mini"><b class="text-success" id="lacakStatOk">0</b><small>Berhasil</small></div>
            <div class="stat-mini"><b class="text-danger" id="lacakStatFail">0</b><small>Gagal</small></div>
            <div class="stat-mini"><b class="text-warn" id="lacakStatPend">0</b><small>Pending</small></div>
            <div class="stat-mini"><b class="text-cyan" id="lacakStatNominal">Rp 0</b><small>Total Nominal</small></div>
          </div>

          <div class="table-wrap">
            <table>
              <thead>
                <tr>
                  <th>Waktu</th>
                  <th>RefID H2H</th>
                  <th>Server</th>
                  <th>Produk / Tujuan</th>
                  <th>Harga</th>
                  <th>Status</th>
                  <th>SN / Keterangan</th>
                  <th style="min-width: 130px;">Aksi</th>
                </tr>
              </thead>
              <tbody id="lacakTableBody">
                <tr>
                  <td colspan="8" class="empty">Ketik kata kunci di atas untuk mulai melacak transaksi</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="count-info"><span id="lacakCountInfo">-</span><span id="lacakSearchInfo"></span></div>
          <div class="pagination" id="lacakPagination"></div>
        </div>
        <div class="card">
          <div class="card-title"><i class="fas fa-satellite-dish"></i> Cek Status Transaksi Langsung ke Server</div>
          <div class="card-sub">Punya RefID dari H2H kami tapi belum muncul di riwayat? Tempel RefID-nya di sini — panel
            akan menanyakannya langsung ke server bersangkutan.</div>

          <div class="toolbar">
            <div class="fg grow">
              <label>RefID Transaksi</label>
              <div class="search-wrap">
                <i class="fas fa-barcode"></i>
                <input type="text" id="lacakRefIdCek" placeholder="Contoh: TRX_MITRA_9901 atau KF-0877-8365926"
                  onkeydown="if(event.key==='Enter')lacakCekServer()" />
              </div>
            </div>
            <div class="fg">
              <label>Server Tujuan</label>
              <select id="lacakServerCek">
                <option value="ALL">🔎 Coba Semua Server (api1, api2 & api4)</option>
                <option value="api1">api1 — AkrabStable (XL Akrab)</option>
                <option value="api2">api2 — Akrab V2 (Reguler & Promo)</option>

                <option value="api4">api4 — AkrabOke (PPOB)</option>
              </select>
            </div>
            <div class="fg">
              <label>&nbsp;</label>
              <button class="btn btn-sm" onclick="lacakCekServer()" id="btnLacakCek"><i class="fas fa-paper-plane"></i>
                Cek Sekarang</button>
            </div>
          </div>

          <div id="lacakCekHasil" style="display: none;">
            <div id="lacakCekRingkasan"></div>
            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 8px;">
              <small style="font-size: 10px; color: var(--text-sub); font-family: monospace;" id="lacakCekStatus">STATUS:
                READY</small>
              <button class="btn btn-outline btn-sm" onclick="lacakCekCopy()"><i class="fas fa-copy"></i> Salin
                Respons</button>
            </div>
            <pre id="lacakCekJson" style="margin-top: 6px;">// Hasil pengecekan akan tampil di sini...</pre>
          </div>
        </div>
      </div>

      <div id="tabDoc" style="display: none;">
        <div class="card" style="margin-bottom: 20px; border-radius: 18px;">
          <div
            style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px; margin-bottom: 12px;">
            <div>
              <h2 style="font-size: 17px; font-weight: 900; color: #002dbb; display: flex; align-items: center; gap: 8px;">
                <i class="fas fa-code"></i> Panduan Integrasi Central Gateway H2H
              </h2>
              <p style="font-size: 11.5px; color: var(--text-sub); margin-top: 3px;">Dokumentasi resmi API Machine-to-Machine
                (Server-to-Server) berkecepatan tinggi.</p>
            </div>
            <span class="badge badge-success" style="font-size: 9px; padding: 4px 10px;"><i class="fas fa-bolt"></i> RESTful JSON</span>
          </div>
          <div style="background: #eff6ff; border: 1.5px solid #bfdbfe; border-radius: 14px; padding: 14px; margin-bottom: 18px;">
            <div
              style="font-size: 12px; font-weight: 800; color: #002dbb; margin-bottom: 6px; display: flex; align-items: center; gap: 6px;">
              <i class="fas fa-circle-info"></i> KETENTUAN DASAR PERMINTAAN (REQUEST)
            </div>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 8px; font-size: 11px;">
              <div><span style="color: #64748b;">• Single Central Endpoint:</span><br><code class="url-highlight"
                  style="font-weight: 800;">https://dompul.shop/api</code></div>
              <div><span style="color: #64748b;">• Autentikasi API Key:</span><br>Kirim via Header <code>X-API-KEY</code> atau
                Body JSON <code>api_key</code></div>
              <div><span style="color: #64748b;">• Method &amp; Header:</span><br><b>POST / GET</b> | <code>Content-Type:
                  application/json</code></div>
              <div><span style="color: #64748b;">• Format Respon:</span><br><b>JSON Murni</b> (UTF-8 Encoded)</div>
            </div>
          </div>
          <div style="display: flex; gap: 8px; margin-bottom: 20px; flex-wrap: wrap;">
            <button type="button" class="btn doc-btn" id="btnDocStandard"
              onclick="switchDocTab('standard')"><i class="fas fa-bolt"></i> Server 1 (XL Akrab &amp; Fresh)</button>
            <button type="button" class="btn btn-outline doc-btn" id="btnDocApi2"
              onclick="switchDocTab('api2')"><i class="fas fa-cubes"></i> Server 2 (Akrab V2 &amp; Promo FMX)</button>
            <button type="button" class="btn btn-outline doc-btn" id="btnDocApi4"
              onclick="switchDocTab('api4')"><i class="fas fa-layer-group"></i> Server 4 (AkrabOke PPOB &amp; Pulsa)</button>
          </div>
          <div id="docStandardView">
            <div class="doc-card" style="margin-bottom: 18px;">
              <div class="doc-card-head" style="margin-bottom: 8px;">
                <h3 class="doc-sum-title" style="color: #002dbb;"><i class="fas fa-book-bookmark"></i> Ringkasan Server 1 (XL
                  Akrab)</h3><span class="badge badge-user mono">api = api1</span>
              </div>
              <p style="font-size: 11px; color: var(--text-sub); margin-bottom: 12px; line-height: 1.5;">Server 1 dirancang khusus
                untuk transaksi paket data XL Akrab (XLA Fresh, XDA, XVIP, XCA, XCF, XLB, dan Axis AIGO) dengan sistem injeksi
                otomatis dan stok live terpantau.</p>
              <div class="doc-kicker" style="color: #002dbb;">Kamus Parameter Action (api1):</div>
              <div class="table-wrap" style="margin-bottom: 14px;">
                <table>
                  <thead>
                    <tr>
                      <th style="width: 140px;">Nilai Parameter Action</th>
                      <th>Alias yang Didukung</th>
                      <th>Keterangan Fungsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><code class="mono" style="color:#002dbb;">list</code></td>
                      <td><code>produk</code>, <code>products</code></td>
                      <td>Mengambil katalog paket XL Akrab dan jumlah stok slot realtime supplier.</td>
                    </tr>
                    <tr>
                      <td><code class="mono" style="color:#002dbb;">order</code></td>
                      <td><code>bayar</code>, <code>trx</code></td>
                      <td>Mengeksekusi pembelian paket data Akrab langsung ke nomor XL tujuan.</td>
                    </tr>
                    <tr>
                      <td><code class="mono" style="color:#002dbb;">status</code></td>
                      <td><code>check</code>, <code>trx_detail</code></td>
                      <td>Mengecek status mutasi akhir transaksi dan mengambil Serial Number (SN) resmi.</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="doc-kicker" style="color: #002dbb;">Kamus Status Transaksi (status_trx) &amp; Dampak Saldo:</div>
              <div class="table-wrap" style="margin-bottom: 14px;">
                <table>
                  <thead>
                    <tr>
                      <th style="width: 130px;">Nilai status_trx</th>
                      <th style="width: 90px;">Status Respon</th>
                      <th>Arti Status</th>
                      <th>Dampak pada Saldo H2H</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><span class="badge badge-success">BERHASIL</span></td>
                      <td><code>true</code></td>
                      <td>Injeksi paket sukses dan SN resmi telah terbit dari sistem.</td>
                      <td>Saldo <b>terpotong permanen</b> dari dompet <code>saldo_akrab</code>.</td>
                    </tr>
                    <tr>
                      <td><span class="badge badge-pending">PENDING</span></td>
                      <td><code>true</code></td>
                      <td>Transaksi sedang dalam antrean pemrosesan server supplier.</td>
                      <td>Saldo <b>terpotong sementara</b> menunggu status final &amp; SN.</td>
                    </tr>
                    <tr>
                      <td><span class="badge badge-fail">GAGAL</span></td>
                      <td><code>false</code></td>
                      <td>Transaksi ditolak server pusat (stok kosong, nomor salah, gangguan).</td>
                      <td><b style="color:#dc2626;">Saldo OTOMATIS DI-REFUND 100%</b> kembali ke dompet <code>saldo_akrab</code>.
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="doc-card">
              <div class="doc-card-head">
                <h4 class="doc-h4"><i class="fas fa-list"></i> 1. Cek Katalog Produk (`action=list`)</h4>
                <span class="badge badge-cyan">GET / POST</span>
              </div>
              <div class="url-highlight">https://dompul.shop/api?action=list&amp;api=api1&amp;api_key=dt17_API_KEY_ANDA</div>
              <p style="font-size: 11px; color: var(--accent); font-weight: 800; margin-top: 10px;">[Contoh Respon Berhasil]:</p>
              <pre>{
  "status": true,
  "message": "Daftar produk Server 1 berhasil dimuat",
  "data": [
    {
      "kode": "XLA10",
      "nama": "Paket Akrab Fresh 10GB",
      "harga": 32000,
      "status": "READY",
      "stock": "45"
    }
  ]
}</pre>
            </div>
            <div class="doc-card">
              <div class="doc-card-head">
                <h4 class="doc-h4"><i class="fas fa-cart-shopping"></i> 2. Transaksi Order Paket (`action=order`)</h4>
                <span class="badge badge-success">POST JSON</span>
              </div>
              <pre>{
  "action": "order",
  "api": "api1",
  "kode_produk": "XLA10",
  "target": "087812345678",
  "refid": "TRX_MITRA_1001",
  "api_key": "dt17_API_KEY_ANDA"
}</pre>
              <p style="font-size: 11px; color: var(--accent); font-weight: 800; margin-top: 10px;">[Contoh Respon Berhasil]:</p>
              <pre>{
  "status": true,
  "trx_status": "BERHASIL",
  "message": "Order diterima: Transaksi Berhasil",
  "data": {
    "ref_id": "TRX_MITRA_1001",
    "kode": "XLA10",
    "tujuan": "087812345678",
    "harga": 32000,
    "status_trx": "berhasil",
    "sn": "SN: 01928301928301293",
    "sisa_saldo": 468000
  }
}</pre>
            </div>
            <div class="doc-card" style="margin-bottom: 0;">
              <div class="doc-card-head">
                <h4 class="doc-h4"><i class="fas fa-search"></i> 3. Cek Status Transaksi (`action=status`)</h4>
                <span class="badge badge-cyan">GET / POST</span>
              </div>
              <div class="url-highlight">
                https://dompul.shop/api?action=status&amp;api=api1&amp;refid=TRX_MITRA_1001&amp;api_key=dt17_API_KEY_ANDA</div>
            </div>
          </div>
          <div id="docApi2View" style="display: none;">
            <div class="doc-card" style="margin-bottom: 18px;">
              <div class="doc-card-head" style="margin-bottom: 8px;">
                <h3 class="doc-sum-title" style="color: #0284c7;"><i class="fas fa-cubes"></i> Ringkasan Server 2 (Akrab V2 &amp;
                  Promo FMX)</h3><span class="badge badge-cyan mono">api = api2</span>
              </div>
              <p style="font-size: 11px; color: var(--text-sub); margin-bottom: 12px; line-height: 1.5;">Server 2 melayani paket
                data Akrab V2 reguler serta fitur <b>Cek &amp; Bayar Promo FlexMax (XAPROMO)</b> dengan isolasi saldo pada dompet
                <code>saldo_api2</code>.
              </p>
              <div class="doc-kicker" style="color: #0284c7;">Kamus Parameter Action (api2):</div>
              <div class="table-wrap" style="margin-bottom: 14px;">
                <table>
                  <thead>
                    <tr>
                      <th style="width: 140px;">Nilai Parameter Action</th>
                      <th>Alias yang Didukung</th>
                      <th>Keterangan Fungsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><code class="mono" style="color:#0284c7;">list</code></td>
                      <td><code>detail</code>, <code>produk</code>, <code>summary</code></td>
                      <td>Mengambil katalog paket data Akrab V2 reguler beserta deskripsi kuota.</td>
                    </tr>
                    <tr>
                      <td><code class="mono" style="color:#0284c7;">promo</code></td>
                      <td><code>cek</code>, <code>inquiry</code></td>
                      <td>Pengecekan paket promo khusus nomor tujuan menggunakan kode promo <code>XAPROMO</code> (aktif 10 menit).
                      </td>
                    </tr>
                    <tr>
                      <td><code class="mono" style="color:#0284c7;">order</code></td>
                      <td><code>buy</code>, <code>trx</code></td>
                      <td>Eksekusi pembelian paket reguler atau paket promo FMX yang telah dicek.</td>
                    </tr>
                    <tr>
                      <td><code class="mono" style="color:#0284c7;">status</code></td>
                      <td><code>check</code>, <code>trx_detail</code></td>
                      <td>Memeriksa status pesanan Akrab V2 menggunakan RefID H2H Anda.</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="doc-kicker" style="color: #0284c7;">Kamus Status Transaksi (status_trx) &amp; Dampak Saldo:</div>
              <div class="table-wrap" style="margin-bottom: 14px;">
                <table>
                  <thead>
                    <tr>
                      <th style="width: 130px;">Nilai status_trx</th>
                      <th style="width: 90px;">Status Respon</th>
                      <th>Arti Status</th>
                      <th>Dampak pada Saldo H2H</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><span class="badge badge-success">BERHASIL</span></td>
                      <td><code>true</code></td>
                      <td>Paket promo/reguler sukses masuk ke nomor tujuan dan SN terbit.</td>
                      <td>Saldo <b>terpotong permanen</b> dari dompet <code>saldo_api2</code>.</td>
                    </tr>
                    <tr>
                      <td><span class="badge badge-pending">PENDING</span></td>
                      <td><code>true</code></td>
                      <td>Pesanan sedang diproses di upstream KaJe Store.</td>
                      <td>Saldo <b>terpotong sementara</b> menunggu status final.</td>
                    </tr>
                    <tr>
                      <td><span class="badge badge-fail">GAGAL</span></td>
                      <td><code>false</code></td>
                      <td>Nomor tidak eligible, sesi promo kedaluwarsa, atau ditolak upstream.</td>
                      <td><b style="color:#dc2626;">Saldo OTOMATIS DI-REFUND 100%</b> kembali ke dompet <code>saldo_api2</code>.
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="doc-card">
              <div class="doc-card-head">
                <h4 class="doc-h4"><i class="fas fa-fire" style="color:#e11d48;"></i> 1. Cek Paket Promo FlexMax (`action=promo`)
                </h4><span class="badge badge-danger">POST JSON</span>
              </div>
              <pre>{
  "action": "promo",
  "api": "api2",
  "destination": "081234567890",
  "code_promo": "XAPROMO",
  "api_key": "dt17_API_KEY_ANDA"
}</pre>
              <p style="font-size: 11px; color: var(--accent); font-weight: 800; margin-top: 10px;">[Contoh Respon Berhasil]:</p>
              <pre>{
  "status": true,
  "message": "Kode produk promo berlaku selama 10 menit setelah pengecekan nomor.",
  "destination": "081234567890",
  "data": [
    {
      "kode": "XLPR9PHS",
      "nama": "FlexMax 15GB (28hr)",
      "harga": 48000,
      "kategori": "CEK&BAYAR PROMO FMX",
      "status": "READY",
      "expires_in": "10 Menit"
    }
  ]
}</pre>
            </div>
            <div class="doc-card" style="margin-bottom: 0;">
              <div class="doc-card-head">
                <h4 class="doc-h4"><i class="fas fa-cart-shopping"></i> 2. Transaksi Order Paket Promo / Reguler (`action=order`)
                </h4><span class="badge badge-success">POST JSON</span>
              </div>
              <pre>{
  "action": "order",
  "api": "api2",
  "kode_produk": "XLPR9PHS",
  "target": "081234567890",
  "refid": "TRX_MITRA_2001",
  "api_key": "dt17_API_KEY_ANDA"
}</pre>
            </div>
          </div>
          <div id="docApi4View" style="display: none;">
            <div class="doc-card" style="margin-bottom: 18px;">
              <div class="doc-card-head" style="margin-bottom: 8px;">
                <h3 class="doc-sum-title" style="color: #047857;"><i class="fas fa-layer-group"></i> Panduan Singkat Server 4
                  (AkrabOke PPOB)</h3><span class="badge badge-success mono">api = api4</span>
              </div>
              <p style="font-size: 11px; color: var(--text-sub); margin-bottom: 12px; line-height: 1.5;">Server 4 melayani
                transaksi <b>Produk Prabayar Langsung</b> (Pulsa, Token Listrik PLN, E-Wallet, Game) dan
                <b>Tagihan Pascabayar 2-Tahap</b> (PLN Pasca, BPJS, PDAM, Finance) dengan isolasi saldo pada dompet
                <code>saldo_ppob</code>.
              </p>
              <div class="doc-kicker" style="color: #047857;">Kamus Parameter Action (api4):</div>
              <div class="table-wrap" style="margin-bottom: 14px;">
                <table>
                  <thead>
                    <tr>
                      <th style="width: 140px;">Nilai Parameter Action</th>
                      <th>Alias yang Didukung</th>
                      <th>Keterangan Fungsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><code class="mono" style="color:#047857;">list</code></td>
                      <td><code>produk</code>, <code>products</code></td>
                      <td>Mengambil katalog produk PPOB, pulsa, token listrik, dan kategori tagihan.</td>
                    </tr>
                    <tr>
                      <td><code class="mono" style="color:#047857;">inquiry</code></td>
                      <td><code>cek</code></td>
                      <td><b>(Tahap 1 Pascabayar):</b> Cek tagihan pelanggan (PLN Pasca, BPJS, PDAM). Mengembalikan nama
                        pelanggan, total tagihan pasti, dan <code>payment_token</code>.</td>
                    </tr>
                    <tr>
                      <td><code class="mono" style="color:#047857;">order</code></td>
                      <td><code>bayar</code></td>
                      <td><b>(Prabayar):</b> Pembelian langsung pulsa/token PLN.<br><b>(Tahap 2 Pascabayar):</b> Eksekusi
                        pelunasan tagihan menggunakan <code>payment_token</code>.</td>
                    </tr>
                    <tr>
                      <td><code class="mono" style="color:#047857;">status</code></td>
                      <td><code>check</code></td>
                      <td>Mengecek status mutasi dan mengambil SN resmi (atau 20-digit nomor token PLN bersih).</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="doc-kicker" style="color: #047857;">Kamus Status Transaksi (status_trx) &amp; Dampak Saldo:</div>
              <div class="table-wrap" style="margin-bottom: 14px;">
                <table>
                  <thead>
                    <tr>
                      <th style="width: 130px;">Nilai status_trx</th>
                      <th style="width: 90px;">Status Respon</th>
                      <th>Arti Status</th>
                      <th>Dampak pada Saldo H2H</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><span class="badge badge-success">BERHASIL</span></td>
                      <td><code>true</code></td>
                      <td>Pembayaran tagihan atau pengisian pulsa sukses. SN / 20-digit Token PLN terbit.</td>
                      <td>Saldo <b>terpotong permanen</b> dari dompet <code>saldo_ppob</code>.</td>
                    </tr>
                    <tr>
                      <td><span class="badge badge-pending">PENDING</span></td>
                      <td><code>true</code></td>
                      <td>Order dalam antrean proses upstream OkeConnect.</td>
                      <td>Saldo <b>terpotong sementara</b> menunggu hasil akhir.</td>
                    </tr>
                    <tr>
                      <td><span class="badge badge-fail">GAGAL</span></td>
                      <td><code>false</code></td>
                      <td>Tagihan sudah lunas, ID pelanggan salah, atau ditolak sistem.</td>
                      <td><b style="color:#dc2626;">Saldo OTOMATIS DI-REFUND 100%</b> kembali ke dompet <code>saldo_ppob</code>.
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="doc-card">
              <div class="doc-card-head">
                <h4 class="doc-h4"><i class="fas fa-bolt" style="color:#059669;"></i> ALUR 1: Beli Produk Langsung (Pulsa, Token
                  Listrik PLN, E-Wallet)</h4><span class="badge badge-success">1 LANGKAH</span>
              </div>
              <p style="font-size: 11px; color: var(--text-sub); margin-bottom: 10px;">Cukup kirimkan kode produk dan nomor tujuan
                menggunakan action <code>order</code>.</p>
              <pre>{
  "action": "order",
  "api": "api4",
  "kode_produk": "PLN20",
  "target": "14012345678",
  "refid": "TRX_PLN_001",
  "api_key": "dt17_API_KEY_ANDA"
}</pre>
              <p style="font-size: 11px; color: var(--accent); font-weight: 800; margin-top: 10px;">[Respon Sukses - SN Berisi 20
                Digit Token Listrik]:</p>
              <pre>{
  "status": true,
  "trx_status": "BERHASIL",
  "message": "Order diterima: Sukses",
  "data": {
    "ref_id": "TRX_PLN_001",
    "kode": "PLN20",
    "tujuan": "14012345678",
    "harga": 20500,
    "status_trx": "berhasil",
    "sn": "1234-5678-9012-3456-7890",
    "sisa_saldo": 479500
  }
}</pre>
            </div>
            <div class="doc-card">
              <div class="doc-card-head">
                <h4 class="doc-h4"><i class="fas fa-file-invoice-dollar" style="color:#d97706;"></i> ALUR 2: Bayar Tagihan
                  Pascabayar (PLN Pasca, BPJS, PDAM, Leasing)</h4>
                <span class="badge badge-pending">2 TAHAP (CEK &amp; BAYAR)</span>
              </div>
              <p style="font-size: 11px; color: var(--text-sub); margin-bottom: 10px;">
                <b>Langkah 1: Cek Tagihan (`action=inquiry` atau `cek`).</b> Sistem mengembalikan rincian tagihan bersih dan
                <code>payment_token</code> (aktif 10 menit).
              </p>
              <pre>{
  "action": "inquiry",
  "api": "api4",
  "kode": "CPAM",
  "target": "5123456789",
  "api_key": "dt17_API_KEY_ANDA"
}</pre>
              <p style="font-size: 11px; color: var(--accent); font-weight: 800; margin-top: 10px;">[Respon Cek Tagihan - Format
                Minimalis &amp; Total Tagihan Bersih]:</p>
              <pre>{
  "status": true,
  "message": "Pengecekan Berhasil",
  "data": {
    "username": "reseller_pro",
    "nama_pelanggan": "BUDI SANTOSO",
    "total_tagihan": 52500,
    "total_tagihan_rp": "Rp 52.500",
    "tagihan_murni": 50000,
    "admin_fee": 2500,
    "periode": "OKTOBER 2026",
    "lembar": "1 Lembar",
    "tujuan": "5123456789",
    "kode_produk": "CPAM",
    "kode_bayar": "BPAM",
    "ref_inq": "INQ-20261016120000123",
    "payment_token": "cmVzZWxsZXJfcHJvfEJQQU18NTEyMzQ1Njc4OXxJTlEtMjAyNjEwMTYxMjAwMDAxMjM=",
    "keterangan": "SUKSES Cek PDAM AN BUDI SANTOSO"
  }
}</pre>
              <p style="font-size: 11px; color: var(--text-sub); margin-top: 14px; margin-bottom: 10px;">
                <b>Langkah 2: Eksekusi Bayar (`action=bayar` atau `order`).</b> Cukup kirimkan <code>payment_token</code> yang
                didapat dari Langkah 1.
              </p>
              <pre>{
  "action": "bayar",
  "api": "api4",
  "payment_token": "cmVzZWxsZXJfcHJvfEJQQU18NTEyMzQ1Njc4OXxJTlEtMjAyNjEwMTYxMjAwMDAxMjM=",
  "refid": "TRX_BAYAR_PAM_001",
  "api_key": "dt17_API_KEY_ANDA"
}</pre>
              <p style="font-size: 11px; color: var(--accent); font-weight: 800; margin-top: 10px;">[Respon Pembayaran Sukses]:
              </p>
              <pre>{
  "status": true,
  "trx_status": "BERHASIL",
  "message": "Order diterima: Sukses",
  "data": {
    "ref_id": "TRX_BAYAR_PAM_001",
    "kode": "BPAM",
    "tujuan": "5123456789",
    "harga": 52500,
    "status_trx": "berhasil",
    "sn": "PAM-PAID-091823091823",
    "sisa_saldo": 427000
  }
}</pre>
            </div>
            <div class="doc-card" style="margin-bottom: 0;">
              <div class="doc-card-head">
                <h4 class="doc-h4"><i class="fas fa-search"></i> ALUR 3: Cek Status Transaksi (`action=status`)</h4>
                <span class="badge badge-cyan">GET / POST</span>
              </div>
              <div class="url-highlight">
                https://dompul.shop/api?action=status&amp;api=api4&amp;refid=TRX_BAYAR_PAM_001&amp;api_key=dt17_API_KEY_ANDA</div>
            </div>
          </div>
        </div>
      </div>
      <div id="tabBotTele" style="display: none;">
        <style>
        #tabBotTele { --tb-obsidian: #070b14; --tb-slate: #0f172a; --tb-blue: #002dbb; --tb-sky: #0284c7; --tb-cyan: #38bdf8; --tb-emerald: #10b981; --tb-border: #cbd5e1; --tb-border-soft: #e2e8f0; --tb-surface: #ffffff; --tb-muted-bg: #f8fafc; font-size: 10px; }
        #tabBotTele .tb-locked-shell { max-width: 680px; margin: 0 auto 16px auto; background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 16px; overflow: hidden; box-shadow: 0 14px 32px -10px rgba(15, 23, 42, 0.12); }
        #tabBotTele .tb-locked-banner { background: radial-gradient(circle at 85% 20%, rgba(56, 189, 248, 0.24), transparent 45%), radial-gradient(circle at 15% 80%, rgba(16, 185, 129, 0.18), transparent 45%), linear-gradient(135deg, #070b14 0%, #0f172a 55%, #0a1f54 100%); padding: 18px 20px; color: #ffffff; position: relative; border-bottom: 1.5px solid #1e293b; }
        #tabBotTele .tb-locked-banner::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px; background: linear-gradient(90deg, #38bdf8 0%, #002dbb 45%, #10b981 100%); }
        #tabBotTele .tb-locked-head { display: flex; align-items: center; gap: 12px; flex-wrap: wrap; }
        #tabBotTele .tb-locked-orb { width: 46px; height: 46px; border-radius: 13px; background: linear-gradient(135deg, #0ea5e9 0%, #002dbb 100%); border: 1.5px solid rgba(125, 211, 252, 0.6); display: flex; align-items: center; justify-content: center; font-size: 21px; color: #ffffff; box-shadow: 0 8px 18px rgba(14, 165, 233, 0.32); flex-shrink: 0; }
        #tabBotTele .tb-vip-tag { display: inline-flex; align-items: center; gap: 5px; background: rgba(251, 191, 36, 0.16); border: 1px solid rgba(251, 191, 36, 0.45); color: #fde047; font-size: 7.5px; font-weight: 900; letter-spacing: 0.8px; padding: 2px 8px; border-radius: 20px; text-transform: uppercase; margin-bottom: 4px; }
        #tabBotTele .tb-locked-body { padding: 16px 20px; }
        #tabBotTele .tb-feat-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px; margin-bottom: 12px; }
        #tabBotTele .tb-feat-item { background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 11px; padding: 9px 11px; display: flex; align-items: flex-start; gap: 8px; }
        #tabBotTele .tb-feat-ico { width: 26px; height: 26px; border-radius: 8px; background: #eff6ff; color: #002dbb; border: 1px solid #bfdbfe; display: flex; align-items: center; justify-content: center; font-size: 11px; flex-shrink: 0; }
        #tabBotTele .tb-sim-box { background: linear-gradient(135deg, #f0f9ff 0%, #ecfdf5 100%); border: 1px solid #bae6fd; border-radius: 11px; padding: 10px 12px; margin-bottom: 14px; }
        #tabBotTele .tb-ent-hero { background: radial-gradient(circle at 88% 15%, rgba(56, 189, 248, 0.2), transparent 40%), radial-gradient(circle at 12% 85%, rgba(16, 185, 129, 0.16), transparent 40%), linear-gradient(135deg, #070b14 0%, #0f172a 60%, #0a1d4a 100%) !important; border: 1.5px solid #1e293b !important; border-radius: 14px !important; padding: 11px 14px !important; margin-bottom: 9px !important; color: #ffffff !important; position: relative; overflow: hidden; box-shadow: 0 10px 22px -8px rgba(7, 11, 20, 0.45) !important; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px; }
        #tabBotTele .tb-ent-hero::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 2.5px; background: linear-gradient(90deg, #38bdf8 0%, #002dbb 48%, #10b981 100%); }
        #tabBotTele .tb-hero-orb { width: 35px; height: 35px; border-radius: 10px; background: linear-gradient(135deg, #0ea5e9 0%, #002dbb 100%); border: 1px solid rgba(125, 211, 252, 0.55); color: #ffffff; display: flex; align-items: center; justify-content: center; font-size: 16px; box-shadow: 0 0 14px rgba(14, 165, 233, 0.3); flex-shrink: 0; position: relative; }
        #tabBotTele .tb-hero-dot { position: absolute; bottom: -2px; right: -2px; width: 9px; height: 9px; border-radius: 50%; background: #10b981; border: 1.5px solid #070b14; }
        #tabBotTele .tb-hero-eyebrow { font-size: 7px; font-weight: 900; letter-spacing: 1px; color: #38bdf8; text-transform: uppercase; margin-bottom: 1px; }
        #tabBotTele .tb-hero-title { font-size: 12.5px; font-weight: 900; color: #ffffff; letter-spacing: -0.2px; display: flex; align-items: center; gap: 6px; flex-wrap: wrap; }
        #tabBotTele .tb-hero-sub { font-size: 8.8px; color: #94a3b8; margin-top: 1px; font-weight: 500; }
        #tabBotTele .tb-hero-pill { background: rgba(16, 185, 129, 0.15); border: 1px solid rgba(52, 211, 153, 0.4); color: #34d399; font-size: 7px; font-weight: 900; padding: 1.5px 7px; border-radius: 20px; letter-spacing: 0.4px; display: inline-flex; align-items: center; gap: 4px; }
        #tabBotTele .tb-btn-sync { background: rgba(255, 255, 255, 0.1) !important; border: 1px solid rgba(255, 255, 255, 0.22) !important; color: #ffffff !important; border-radius: 8px !important; padding: 5px 10px !important; font-size: 9px !important; font-weight: 800 !important; display: inline-flex; align-items: center; gap: 5px; box-shadow: none !important; min-height: 26px !important; transition: all 0.2s ease; }
        #tabBotTele .tb-btn-sync:hover { background: rgba(56, 189, 248, 0.2) !important; border-color: #38bdf8 !important; }
        #tabBotTele .tele-nav-dock { display: grid; grid-template-columns: repeat(6, 1fr); gap: 5px; background: #ffffff; padding: 5px; border-radius: 13px; border: 1.5px solid #cbd5e1; box-shadow: 0 4px 14px -6px rgba(15, 23, 42, 0.08); margin-bottom: 10px; }
        #tabBotTele .tele-sub-btn { padding: 6px 7px; background: #f8fafc; border: 1px solid #e2e8f0; color: #334155; font-weight: 800; cursor: pointer; white-space: nowrap; transition: all 0.18s ease; font-size: 8.8px; border-radius: 9px; display: inline-flex; align-items: center; justify-content: center; gap: 5px; user-select: none; }
        #tabBotTele .tele-sub-btn i { color: #0284c7; font-size: 10px; transition: transform 0.2s ease; }
        #tabBotTele .tele-sub-btn:hover { background: #eff6ff; border-color: #93c5fd; color: #002dbb; }
        #tabBotTele .tele-sub-btn.active { background: linear-gradient(135deg, #0f172a 0%, #002dbb 100%) !important; border-color: #002dbb !important; color: #ffffff !important; box-shadow: 0 4px 10px rgba(0, 45, 187, 0.24) !important; }
        #tabBotTele .tele-sub-btn.active i, #tabBotTele .tele-sub-btn.active span { color: #ffffff !important; }
        #tabBotTele .card { background: #ffffff !important; border: 1.5px solid #cbd5e1 !important; border-radius: 13px !important; padding: 11px 13px !important; margin-bottom: 10px !important; box-shadow: 0 5px 16px -6px rgba(15, 23, 42, 0.06) !important; }
        #tabBotTele .card:hover { border-color: #3b82f6 !important; }
        #tabBotTele .card-title { font-size: 11.5px !important; gap: 6px !important; }
        #tabBotTele .card-sub { font-size: 8.8px !important; margin-bottom: 8px !important; }
        #tabBotTele .tb-kpi-row { display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px; margin-bottom: 9px; }
        #tabBotTele .tb-kpi-box { background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 12px; padding: 9px 11px; display: flex; align-items: center; gap: 9px; box-shadow: 0 3px 10px -5px rgba(15, 23, 42, 0.06); }
        #tabBotTele .tb-kpi-box.kpi-accent-blue { border-left: 3.5px solid #002dbb; }
        #tabBotTele .tb-kpi-box.kpi-accent-emerald { border-left: 3.5px solid #10b981; }
        #tabBotTele .tb-kpi-ico { width: 31px; height: 31px; border-radius: 9px; display: flex; align-items: center; justify-content: center; font-size: 13px; flex-shrink: 0; }
        #tabBotTele .tb-kpi-ico.ico-blue { background: #eff6ff; color: #002dbb; border: 1px solid #bfdbfe; }
        #tabBotTele .tb-kpi-ico.ico-emerald { background: #ecfdf5; color: #059669; border: 1px solid #a7f3d0; }
        #tabBotTele .tb-kpi-box small { display: block; font-size: 7.5px; font-weight: 800; color: #64748b; text-transform: uppercase; letter-spacing: 0.3px; }
        #tabBotTele .tb-kpi-box b { font-size: 13.5px; font-weight: 900; color: #0f172a; }
        #tabBotTele .tb-config-grid { display: grid; grid-template-columns: 1.25fr 1fr; gap: 10px; align-items: stretch; }
        #tabBotTele .tb-panel-box { background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 13px; padding: 12px 14px; box-shadow: 0 5px 16px -6px rgba(15, 23, 42, 0.06); }
        #tabBotTele .tb-panel-box-dark { background: linear-gradient(160deg, #070b14 0%, #0f172a 100%); border: 1.5px solid #1e293b; border-radius: 13px; padding: 12px 14px; color: #ffffff; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 10px 22px -8px rgba(7, 11, 20, 0.4); }
        #tabBotTele .tb-panel-box-dark .k { color: #94a3b8 !important; font-size: 8.5px; }
        #tabBotTele .tb-panel-box-dark .v { color: #ffffff !important; font-weight: 700; font-size: 9.5px; }
        #tabBotTele .tb-telemetry-row { display: flex; justify-content: space-between; align-items: center; background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); padding: 6px 9px; border-radius: 8px; margin-bottom: 5px; font-size: 9px; }
        #tabBotTele .toolbar { background: #f8fafc !important; border: 1px solid #e2e8f0 !important; border-radius: 10px !important; padding: 7px 9px !important; gap: 6px !important; margin-bottom: 8px !important; }
        #tabBotTele .form-group { margin-bottom: 8px !important; }
        #tabBotTele label { font-size: 8.5px !important; margin-bottom: 3px !important; }
        #tabBotTele input, #tabBotTele select, #tabBotTele textarea { background: #ffffff !important; border: 1px solid #cbd5e1 !important; color: #0f172a !important; border-radius: 7px !important; padding: 5px 8px !important; font-size: 9.5px !important; min-height: 27px !important; }
        #tabBotTele input:focus, #tabBotTele select:focus, #tabBotTele textarea:focus { border-color: #002dbb !important; box-shadow: 0 0 0 2px rgba(0, 45, 187, 0.14) !important; }
        #tabBotTele .btn { padding: 6px 10px !important; font-size: 9.5px !important; border-radius: 7px !important; min-height: 27px !important; gap: 4px !important; }
        #tabBotTele .btn-sm { padding: 3.5px 7px !important; font-size: 8.5px !important; min-height: 22px !important; border-radius: 6px !important; }
        #tabBotTele .chip { padding: 3px 8px !important; font-size: 8.5px !important; border-radius: 14px !important; gap: 4px !important; }
        #tabBotTele .chip-bar { gap: 4px !important; margin-bottom: 7px !important; }
        #tabBotTele .table-wrap { border: 1px solid #e2e8f0 !important; border-radius: 10px !important; max-height: 490px !important; }
        #tabBotTele table { margin-top: 0 !important; font-size: 9px !important; }
        #tabBotTele table th { background: #f1f5f9 !important; color: #0f172a !important; border-bottom: 1.5px solid #cbd5e1 !important; font-size: 7.8px !important; letter-spacing: 0.4px; padding: 5px 6px !important; }
        #tabBotTele table td { padding: 4.5px 6px !important; font-size: 9px !important; line-height: 1.25 !important; }
        #tabBotTele .badge { font-size: 7.5px !important; padding: 1.5px 5px !important; border-radius: 4px !important; }
        #tabBotTele .stat-mini { background: #ffffff !important; border: 1px solid #e2e8f0 !important; border-radius: 9px !important; padding: 6px 6px !important; min-height: auto !important; box-shadow: 0 2px 6px rgba(15, 23, 42, 0.03) !important; }
        #tabBotTele .stat-mini b { font-size: 11.5px !important; margin-bottom: 1px !important; line-height: 1.15 !important; }
        #tabBotTele .stat-mini small { font-size: 7px !important; letter-spacing: 0.1px !important; }
        #tabBotTele .stat-mini .kpi-sub-note { display: block; font-size: 7px; font-weight: 700; color: #64748b; margin-top: 1px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        @media (max-width: 900px) { #tabBotTele .tele-nav-dock { grid-template-columns: repeat(3, 1fr); } #tabBotTele .tb-config-grid, #tabBotTele .tb-feat-grid { grid-template-columns: 1fr; } }
        @media (max-width: 768px) { #tabBotTele .tb-ent-hero { padding: 9px 11px !important; border-radius: 12px !important; } #tabBotTele .tb-hero-orb { width: 30px; height: 30px; font-size: 13px; border-radius: 8px; } #tabBotTele .tb-hero-title { font-size: 11px; } #tabBotTele .tb-hero-sub { display: none; } #tabBotTele .tele-nav-dock { grid-template-columns: repeat(3, 1fr); gap: 4px; padding: 4px; border-radius: 11px; } #tabBotTele .tele-sub-btn { flex-direction: column; padding: 5px 3px; border-radius: 8px; font-size: 7.5px; gap: 2px; min-height: 36px; text-align: center; white-space: normal; line-height: 1.1; } #tabBotTele .tele-sub-btn i { font-size: 10.5px; } #tabBotTele .tb-kpi-row { grid-template-columns: 1fr 1fr; gap: 6px; } #tabBotTele .tb-kpi-box { padding: 7px 8px; gap: 6px; border-radius: 9px; } #tabBotTele .tb-kpi-ico { width: 25px; height: 25px; font-size: 10px; border-radius: 7px; } #tabBotTele .tb-kpi-box b { font-size: 11px; } #tabBotTele .tb-locked-banner, #tabBotTele .tb-locked-body { padding: 12px; } }
        </style>
        <div id="botTeleLockedWrap" style="display: none;">
          <div class="tb-locked-shell">
            <div class="tb-locked-banner">
              <div class="tb-locked-head">
                <div class="tb-locked-orb">
                  <i class="fab fa-telegram-plane"></i>
                </div>
                <div style="flex: 1; min-width: 190px;">
                  <div class="tb-vip-tag"><i class="fas fa-crown"></i> ENTERPRISE AUTOMATION MODULE</div>
                  <h2 style="font-size: 15px; font-weight: 900; color: #ffffff; margin: 0 0 3px 0; letter-spacing: -0.2px;">Sistem
                    Downline Bot Telegram VIP</h2>
                  <p style="font-size: 9.5px; color: #cbd5e1; margin: 0; line-height: 1.4;">Bangun jaringan reseller mandiri 24/7
                    dengan bot Telegram bermerk toko Anda sendiri, kontrol markup otomatis, dan manajemen saldo terpusat.</p>
                </div>
              </div>
            </div>

            <div class="tb-locked-body">
              <div class="tb-feat-grid">
                <div class="tb-feat-item">
                  <div class="tb-feat-ico"><i class="fas fa-plug-circle-bolt"></i></div>
                  <div>
                    <b style="font-size: 9.5px; color: #0f172a; display: block; margin-bottom: 1px;">Setup Instan 1-Klik Webhook</b>
                    <small style="font-size: 8.5px; color: #64748b; line-height: 1.35; display: block;">Cukup tempel token
                      @BotFather lalu klik sambungkan. Ketik /start di bot dan sistem siap berjualan.</small>
                  </div>
                </div>
                <div class="tb-feat-item">
                  <div class="tb-feat-ico" style="background:#ecfdf5; color:#059669; border-color:#a7f3d0;">
                    <i class="fas fa-chart-line"></i>
                  </div>
                  <div>
                    <b style="font-size: 9.5px; color: #0f172a; display: block; margin-bottom: 1px;">Mesin Markup Laba Otomatis</b>
                    <small style="font-size: 8.5px; color: #64748b; line-height: 1.35; display: block;">Atur markup global atau
                      khusus per downline. Selisih keuntungan otomatis tercatat realtime di laporan.</small>
                  </div>
                </div>
                <div class="tb-feat-item">
                  <div class="tb-feat-ico" style="background:#fffbeb; color:#d97706; border-color:#fde68a;">
                    <i class="fas fa-wallet"></i>
                  </div>
                  <div>
                    <b style="font-size: 9.5px; color: #0f172a; display: block; margin-bottom: 1px;">Manajemen Saldo &amp; Topup Mandiri</b>
                    <small style="font-size: 8.5px; color: #64748b; line-height: 1.35; display: block;">Mendukung QRIS, Bank,
                      E-Wallet, tiering biaya admin, serta notifikasi persetujuan langsung ke Telegram Anda.</small>
                  </div>
                </div>
                <div class="tb-feat-item">
                  <div class="tb-feat-ico" style="background:#faf5ff; color:#7c3aed; border-color:#ddd6fe;">
                    <i class="fas fa-bullhorn"></i>
                  </div>
                  <div>
                    <b style="font-size: 9.5px; color: #0f172a; display: block; margin-bottom: 1px;">Siaran Promo &amp; Audit Transaksi</b>
                    <small style="font-size: 8.5px; color: #64748b; line-height: 1.35; display: block;">Kirim broadcast ke seluruh
                      member, cetak struk thermal, mass-sync status pending, hingga ekspor CSV.</small>
                  </div>
                </div>
              </div>

              <div class="tb-sim-box">
                <div
                  style="font-size: 9px; font-weight: 900; color: #002dbb; text-transform: uppercase; letter-spacing: 0.3px; margin-bottom: 4px; display: flex; align-items: center; gap: 5px;">
                  <i class="fas fa-calculator"></i> Simulasi Alur Profit (Markup Transparan)
                </div>
                <div style="font-size: 9px; color: #1e293b; line-height: 1.45;">
                  Jika harga modal panel Anda <b>Rp 10.000</b> dan Anda menyetel markup <b>Rp 3.000</b>, maka harga di bot
                  downline tampil <b>Rp 13.000</b>. Saat transaksi sukses, saldo downline terpotong <b>Rp 13.000</b>, sedangkan
                  dompet H2H Anda hanya terpotong <b>Rp 10.000</b> — margin <b>+Rp 3.000</b> menjadi keuntungan bersih Anda.
                </div>
              </div>

              <div
                style="display: flex; gap: 8px; justify-content: space-between; align-items: center; flex-wrap: wrap; border-top: 1px solid #f1f5f9; padding-top: 12px;">
                <div style="display: flex; gap: 6px; flex-wrap: wrap;">
                  <a href="https://t.me/dt17corp" target="_blank" class="btn btn-outline" style="text-decoration: none;">
                    <i class="fab fa-telegram-plane" style="color: #0284c7;"></i> Konsultasi CS
                  </a>
                  <a href="https://t.me/juragan_akrab_bot" target="_blank" class="btn btn-outline" style="text-decoration: none;">
                    <i class="fas fa-robot" style="color: #7c3aed;"></i> Live Demo Bot
                  </a>
                </div>
                <button type="button" class="btn btn-success" onclick="openUpgradeBotModal()"
                  style="font-weight: 900; box-shadow: 0 6px 14px rgba(16, 185, 129, 0.28);">
                  <i class="fas fa-bolt"></i> Aktifkan Modul VIP (Rp 180.000)
                </button>
              </div>
            </div>
          </div>
        </div>

        <div id="botTeleUnlockedWrap">
          <div class="tb-ent-hero">
            <div style="display: flex; align-items: center; gap: 10px; min-width: 0; flex: 1;">
              <div class="tb-hero-orb">
                <i class="fab fa-telegram-plane"></i>
                <span class="tb-hero-dot"></span>
              </div>
              <div style="min-width: 0;">
                <div class="tb-hero-eyebrow">DT17 ENTERPRISE &bull; AUTOMATION ENGINE</div>
                <div class="tb-hero-title">
                  <span>Telegram Bot Command Center</span>
                  <span class="tb-hero-pill"><i class="fas fa-circle-check"></i> ENGINE ONLINE</span>
                </div>
                <div class="tb-hero-sub">Kontrol terpusat jaringan downline, margin laba otomatis, verifikasi deposit, dan audit
                  mutasi 24/7.</div>
              </div>
            </div>
            <button type="button" class="tb-btn-sync"
              onclick="loadTelebotConfig(); loadTelebotDownlines(); loadTelebotHistory();">
              <i class="fas fa-rotate-right"></i> <span>Segarkan Data</span>
            </button>
          </div>

          <div class="tele-nav-dock">
            <button type="button" class="tele-sub-btn active" id="btnSubTeleDownlines" onclick="switchTelebotSub('downlines')">
              <i class="fas fa-users"></i><span>Downline (<span id="tbSubTotalDl">0</span>)</span>
            </button>
            <button type="button" class="tele-sub-btn" id="btnSubTeleRequests" onclick="switchTelebotSub('requests')">
              <i class="fas fa-wallet"></i><span>Topup (<span id="tbSubTotalRequests">0</span>)</span>
            </button>
            <button type="button" class="tele-sub-btn" id="btnSubTeleHistory" onclick="switchTelebotSub('history')">
              <i class="fas fa-receipt"></i><span>Riwayat (<span id="tbSubTotalTrx">0</span>)</span>
            </button>
            <button type="button" class="tele-sub-btn" id="btnSubTeleConfig" onclick="switchTelebotSub('config')">
              <i class="fas fa-sliders"></i><span>Setelan Bot</span>
            </button>
            <button type="button" class="tele-sub-btn" id="btnSubTeleTopup" onclick="switchTelebotSub('topup')">
              <i class="fas fa-credit-card"></i><span>Metode Bayar</span>
            </button>
            <button type="button" class="tele-sub-btn" id="btnSubTeleBroadcast" onclick="switchTelebotSub('broadcast')">
              <i class="fas fa-bullhorn"></i><span>Siaran Pesan</span>
            </button>
          </div>

          <div id="telebotSection_config">
            <div class="tb-config-grid">
              <div class="tb-panel-box">
                <div
                  style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #f1f5f9; padding-bottom: 7px; margin-bottom: 10px;">
                  <div>
                    <small
                      style="font-size: 7.5px; font-weight: 800; color: #64748b; letter-spacing: 0.7px; text-transform: uppercase;">BOT
                      GATEWAY &amp; PRICING</small>
                    <div
                      style="font-size: 11.5px; font-weight: 900; color: #0f172a; display: flex; align-items: center; gap: 5px;">
                      <i class="fas fa-sliders" style="color: #002dbb;"></i> Konfigurasi Bot &amp; Notifikasi
                    </div>
                  </div>
                  <span class="badge badge-user">WEBHOOK V2</span>
                </div>

                <div class="form-group">
                  <label><i class="fas fa-store"></i> Nama / Judul Toko Bot (Tampilan Downline)</label>
                  <input type="text" id="telebotTitleInput" placeholder="Contoh: DT17 Cell Official / Berkah Store" />
                </div>
                <div class="form-group">
                  <label><i class="fas fa-key"></i> Bot Token Toko Downline (Dari @BotFather)</label>
                  <input type="password" id="telebotTokenInput" placeholder="Token bot yang dipakai chat oleh downline..."
                    style="font-family: monospace;" />
                </div>
                <div class="grid grid-2" style="gap: 8px;">
                  <div class="form-group">
                    <label><i class="fas fa-percent"></i> Markup Laba Global (Rp)</label>
                    <input type="number" id="telebotMarkupInput" min="0" step="100" placeholder="Contoh: 1000"
                      style="font-weight: 800; color: #059669;" />
                  </div>
                  <div class="form-group">
                    <label><i class="fas fa-power-off"></i> Status Operasional Bot</label>
                    <div
                      style="display: flex; align-items: center; gap: 6px; height: 27px; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 7px; padding: 0 8px;">
                      <label class="checkbox-group" style="margin-bottom: 0; font-weight: 700; color: #0f172a;">
                        <input type="checkbox" id="telebotActiveSwitch" checked /> Aktifkan Bot Toko
                      </label>
                    </div>
                  </div>
                </div>

                <div
                  style="background: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 9px; padding: 8px 10px; margin-top: 2px; margin-bottom: 10px;">
                  <div
                    style="font-size: 8.5px; font-weight: 800; color: #002dbb; margin-bottom: 4px; display: flex; align-items: center; gap: 5px;">
                    <i class="fas fa-bell"></i> NOTIFIKASI PERMOHONAN TOPUP (UPLINE)
                  </div>
                  <div class="form-group" style="margin-bottom: 0;">
                    <label><i class="fab fa-telegram"></i> Chat ID Telegram Anda (Upline)</label>
                    <input type="text" id="telebotUplineChatIdInput" placeholder="ID akun Telegram Anda (Contoh: 123456789)" />
                  </div>
                </div>

                <div style="display: flex; gap: 6px; margin-top: 6px;">
                  <button type="button" class="btn btn-success" style="flex: 1;" id="btnSaveTelebotConfig"
                    onclick="saveTelebotConfig()">
                    <i class="fas fa-link"></i> Simpan &amp; Sambungkan Webhook
                  </button>
                  <button type="button" class="btn btn-danger btn-sm" id="btnDisconnectTelebotWebhook"
                    onclick="disconnectTelebotWebhook()" title="Putuskan Webhook">
                    <i class="fas fa-link-slash"></i>
                  </button>
                </div>
              </div>

              <div class="tb-panel-box-dark">
                <div>
                  <div
                    style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 7px; margin-bottom: 10px;">
                    <div>
                      <small
                        style="font-size: 7px; font-weight: 800; color: #38bdf8; letter-spacing: 0.8px; text-transform: uppercase;">LIVE
                        TELEMETRY</small>
                      <div
                        style="font-size: 11.5px; font-weight: 900; color: #ffffff; display: flex; align-items: center; gap: 5px;">
                        <i class="fas fa-satellite-dish" style="color: #38bdf8;"></i> Status Koneksi Telegram
                      </div>
                    </div>
                    <span class="badge badge-success">REALTIME</span>
                  </div>

                  <div class="tb-telemetry-row"><span class="k">Judul Toko</span><span class="v" id="telebotTitleVal">-</span>
                  </div>
                  <div class="tb-telemetry-row"><span class="k">Nama Bot</span><span class="v" id="telebotNameVal">-</span></div>
                  <div class="tb-telemetry-row">
                    <span class="k">Username Bot</span><span class="v" id="telebotUsernameVal">-</span>
                  </div>
                  <div class="tb-telemetry-row">
                    <span class="k">Status Webhook</span><span class="v" id="telebotWebhookStatusVal"><span class="badge badge-pending">Memeriksa...</span></span>
                  </div>
                  <div class="tb-telemetry-row">
                    <span class="k">Pesan Masuk</span><span class="v"><span class="badge badge-success">Auto-Reply Handshake</span></span>
                  </div>

                  <div
                    style="background: rgba(56, 189, 248, 0.1); border: 1px solid rgba(56, 189, 248, 0.25); border-radius: 9px; padding: 8px 10px; margin-top: 8px; font-size: 8.5px; color: #bae6fd; line-height: 1.4;">
                    <i class="fas fa-info-circle" style="color: #38bdf8;"></i> Downline otomatis terdaftar begitu mengirim
                    perintah <code
                      style="background: rgba(0,0,0,0.4); color: #fde047; padding: 1px 4px; border-radius: 3px;">/start</code>.
                    Saldo downline dipotong di bot, sedangkan modal dipotong otomatis dari dompet H2H Anda.
                  </div>
                </div>

                <div style="margin-top: 10px;">
                  <button type="button" class="btn btn-purple btn-block" onclick="switchTelebotSub('broadcast')">
                    <i class="fas fa-bullhorn"></i> Buka Menu Siaran Downline
                  </button>
                </div>
              </div>
            </div>
          </div>

          <div id="telebotSection_topup" style="display: none;">
            <div class="card">
              <div
                style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 8px; margin-bottom: 10px; border-bottom: 1px solid #f1f5f9; padding-bottom: 8px;">
                <div>
                  <div class="card-title" style="margin-bottom: 1px;">
                    <i class="fas fa-credit-card"></i> Metode Pembayaran &amp; Biaya Admin Downline
                  </div>
                  <div class="card-sub" style="margin-bottom: 0;">Kelola kanal pembayaran (QRIS Statis, Transfer Bank, E-Wallet)
                    dan aturan tiering biaya admin otomatis.</div>
                </div>
                <button type="button" class="btn btn-primary btn-sm" onclick="addTelebotMethodRow()"><i class="fas fa-plus"></i>
                  Tambah Metode</button>
              </div>

              <div class="form-group" style="max-width: 280px; margin-bottom: 10px;">
                <label><i class="fas fa-calculator"></i> Batas Minimal Topup Saldo (Rp)</label>
                <input type="number" id="telebotMinTopupInput" min="1000" step="1000" value="10000"
                  style="font-weight: 800; color: #002dbb;" />
                <small class="text-sub" style="font-size: 8px;">Nominal terkecil yang diizinkan untuk diajukan oleh downline di
                  bot Telegram.</small>
              </div>

              <div id="telebotMethodsContainer" style="display: flex; flex-direction: column; gap: 7px; margin-bottom: 12px;">
              </div>

              <div style="border-top: 1px dashed #cbd5e1; padding-top: 11px; margin-top: 11px;">
                <div
                  style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 8px; margin-bottom: 7px;">
                  <div>
                    <b style="font-size: 9.5px; color: #0f172a;"><i class="fas fa-layer-group" style="color: #002dbb;"></i> TABEL TIERING BIAYA ADMIN DOWNLINE</b>
                    <div class="card-sub" style="margin-bottom: 0;">Atur biaya admin berjenjang berdasarkan rentang nominal.</div>
                  </div>
                  <button type="button" class="btn btn-outline btn-sm" onclick="addTelebotTierRow()"><i class="fas fa-plus"></i>
                    Tambah Tier</button>
                </div>
                <div class="table-wrap" style="max-height: 200px; overflow-y: auto; margin-bottom: 10px;">
                  <table>
                    <thead>
                      <tr>
                        <th style="width: 32px;">#</th>
                        <th>Nominal Minimal (Rp)</th>
                        <th>Nominal Maksimal (Rp / 0 = Tak Hingga)</th>
                        <th>Biaya Admin (Rp)</th>
                        <th style="width: 48px;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody id="telebotTiersTableBody"></tbody>
                  </table>
                </div>
              </div>

              <div class="form-group" style="margin-top: 6px;">
                <label><i class="fas fa-circle-info"></i> Catatan / Instruksi Transfer untuk Downline</label>
                <textarea id="telebotBankInfoInput" rows="2"
                  placeholder="Contoh: Transfer tepat hingga 3 digit terakhir agar diproses instan."></textarea>
              </div>

              <button type="button" class="btn btn-success" onclick="saveTelebotTopupSettings()">
                <i class="fas fa-floppy-disk"></i> Simpan Pengaturan Topup &amp; Biaya Admin
              </button>
            </div>
          </div>

          <div id="telebotSection_downlines" style="display: none;">
            <div class="tb-kpi-row">
              <div class="tb-kpi-box kpi-accent-blue">
                <div class="tb-kpi-ico ico-blue"><i class="fas fa-users"></i></div>
                <div>
                  <small>Total Member Downline</small>
                  <b id="tbStatTotalDownlines">0</b>
                </div>
              </div>
              <div class="tb-kpi-box kpi-accent-emerald">
                <div class="tb-kpi-ico ico-emerald"><i class="fas fa-vault"></i></div>
                <div>
                  <small>Akumulasi Saldo Downline</small>
                  <b class="mono" id="tbStatTotalSaldo" style="color: #059669;">Rp 0</b>
                </div>
              </div>
            </div>

            <div class="card">
              <div
                style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 8px; margin-bottom: 8px;">
                <div>
                  <div class="card-title" style="margin-bottom: 1px;"><i class="fas fa-users"></i> Direktori Member Downline</div>
                  <div class="card-sub" style="margin-bottom: 0;">Atur saldo, markup pribadi, dan status akses transaksi setiap
                    downline Telegram secara realtime.</div>
                </div>
                <button class="btn btn-outline btn-sm" onclick="loadTelebotDownlines()"><i class="fas fa-rotate"></i>
                  Segarkan</button>
              </div>
              <div class="toolbar">
                <div class="fg grow">
                  <div class="search-wrap">
                    <i class="fas fa-magnifying-glass"></i>
                    <input type="text" id="telebotDownlineSearch" placeholder="Cari ID Telegram / Nama / Username..."
                      oninput="renderTelebotDownlines()" />
                  </div>
                </div>
              </div>
              <div class="table-wrap">
                <table>
                  <thead>
                    <tr>
                      <th>ID Telegram</th>
                      <th>Nama Member</th>
                      <th>Username</th>
                      <th>Saldo Bot (Rp)</th>
                      <th>Markup Laba</th>
                      <th>Status</th>
                      <th style="min-width: 110px;">Aksi Saldo</th>
                    </tr>
                  </thead>
                  <tbody id="telebotDownlinesTableBody"></tbody>
                </table>
              </div>
            </div>
          </div>

          <div id="telebotSection_history" style="display: none;">
            <div class="card">
              <div
                style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 8px; margin-bottom: 9px;">
                <div>
                  <div class="card-title" style="margin-bottom: 1px;"><i class="fas fa-receipt"></i> Audit Mutasi &amp; Transaksi
                    Downline</div>
                  <div class="card-sub" style="margin-bottom: 0;">Monitoring realtime omset (penjualan + topup), margin cuan
                    upline, modal H2H, mass-sync status, dan cetak struk.</div>
                </div>
                <div style="display: flex; gap: 4px; flex-wrap: wrap; align-items: center;">
                  <button type="button" class="btn btn-outline btn-sm" id="btnToggleTbAudio" onclick="toggleTelebotHistoryAudio()"
                    title="Aktif/Bisukan Nada Notifikasi Transaksi Baru"><i class="fas fa-volume-high" style="color:#059669;"></i>
                    Audio: AKTIF</button>
                  <button type="button" class="btn btn-outline btn-sm" onclick="toggleTbLeaderboard()"
                    title="Tampilkan Top 5 Downline &amp; Produk Terlaris"><i class="fas fa-trophy" style="color:#f59e0b;"></i>
                    Top 5</button>
                  <button type="button" class="btn btn-purple btn-sm" id="btnMassSyncPending"
                    onclick="massSyncPendingTelebotHistory()"
                    title="Cek Ulang Semua Transaksi Pending ke Server Pusat"><i class="fas fa-arrows-rotate"></i> Mass Sync
                    (<span id="tbPendingCount">0</span>)</button>
                  <button type="button" class="btn btn-outline btn-sm" onclick="openTbCustomExportModal()"
                    style="color: #7c3aed !important; border-color: #ddd6fe !important;"
                    title="Ekspor Transaksi dengan Rentang Tanggal Bebas"><i class="fas fa-file-excel"></i> Ekspor</button>
                  <button type="button" class="btn btn-outline btn-sm" onclick="loadTelebotHistory()"
                    title="Segarkan Data Riwayat"><i class="fas fa-rotate"></i> Segarkan</button>
                </div>
              </div>

              <div
                style="display: grid; grid-template-columns: repeat(auto-fit, minmax(115px, 1fr)); gap: 6px; margin-bottom: 9px;">
                <div class="stat-mini" style="border-left: 3px solid #002dbb !important;">
                  <b style="color:#002dbb;" id="tbHistKpiOmset">Rp 0</b><small>Omset (Trx + Topup)</small>
                  <span class="kpi-sub-note" id="tbHistKpiOmsetSub">Trx: Rp 0 &bull; Topup: Rp 0</span>
                </div>
                <div class="stat-mini" style="border-left: 3px solid #10b981 !important;">
                  <b style="color:#059669;" id="tbHistKpiLaba">+Rp 0</b><small>Laba Terealisasi</small>
                  <span class="kpi-sub-note" id="tbHistKpiLabaSub">Margin 0.0%</span>
                </div>
                <div class="stat-mini" style="border-left: 3px solid #64748b !important;">
                  <b style="color:#475569;" id="tbHistKpiModal">Rp 0</b><small>Modal H2H Nyata</small>
                  <span class="kpi-sub-note" id="tbHistKpiModalSub">0 TRX Sukses</span>
                </div>
                <div class="stat-mini" style="border-left: 3px solid #f59e0b !important;">
                  <b style="color:#b45309; font-size:10px;" id="tbHistKpiCounts">0 Sukses / 0 Pend</b><small>Transaksi
                    Produk</small>
                  <span class="kpi-sub-note" id="tbHistKpiCountsSub">0 Gagal (Non-Topup)</span>
                </div>
                <div class="stat-mini" style="border-left: 3px solid #7c3aed !important;">
                  <b style="color:#7c3aed;" id="tbHistKpiRate">0%</b><small>Success Rate</small>
                  <span class="kpi-sub-note" id="tbHistKpiRateSub">Akurasi Server</span>
                </div>
              </div>

              <div id="telebotHistoryLeaderboardBox"
                style="display: none; background: #f8fafc; border: 1px solid #cbd5e1; border-radius: 10px; padding: 10px; margin-bottom: 9px;">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:7px;">
                  <b style="font-size:10px; color:#0f172a;"><i class="fas fa-chart-pie" style="color:#002dbb;"></i> RINGKASAN TOP 5 TRANSAKSI &amp; OMSET DOWNLINE</b>
                  <button type="button" class="btn btn-outline btn-sm" onclick="toggleTbLeaderboard()">Tutup</button>
                </div>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 8px;">
                  <div style="background:#ffffff; border:1px solid #e2e8f0; border-radius:8px; padding:8px;">
                    <small
                      style="font-size:8.5px; font-weight:800; color:#002dbb; text-transform:uppercase; display:block; margin-bottom:4px;"><i class="fas fa-users"></i>
                      TOP 5 MEMBER TERAKTIF</small>
                    <div id="tbTopDownlinesList"></div>
                  </div>
                  <div style="background:#ffffff; border:1px solid #e2e8f0; border-radius:8px; padding:8px;">
                    <small
                      style="font-size:8.5px; font-weight:800; color:#059669; text-transform:uppercase; display:block; margin-bottom:4px;"><i class="fas fa-box"></i>
                      TOP 5 PRODUK TERLARIS</small>
                    <div id="tbTopProductsList"></div>
                  </div>
                </div>
              </div>

              <div class="chip-bar" style="display: flex; flex-wrap: wrap; align-items: center;">
                <button type="button" class="chip active" id="tbChipAll"
                  onclick="setTbStatusFilterQuick('')"><i class="fas fa-layer-group"></i> Semua</button>
                <button type="button" class="chip" id="tbChipSuccess"
                  onclick="setTbStatusFilterQuick('BERHASIL')"><i class="fas fa-circle-check"></i> Berhasil</button>
                <button type="button" class="chip" id="tbChipPending"
                  onclick="setTbStatusFilterQuick('PENDING')"><i class="fas fa-hourglass-half"></i> Diproses</button>
                <button type="button" class="chip" id="tbChipFailed"
                  onclick="setTbStatusFilterQuick('GAGAL')"><i class="fas fa-circle-xmark"></i> Gagal</button>
                <button type="button" class="chip" id="tbChipAttention" onclick="filterTelebotHistoryAttention()"
                  style="border-color: #fde68a; color: #b45309;"><i class="fas fa-triangle-exclamation" style="color:#f59e0b;"></i>
                  Perlu Perhatian (<span id="tbAttentionCount">0</span>)</button>
              </div>

              <div class="toolbar" style="display: flex; flex-direction: column;">
                <div style="display: flex; gap: 6px; flex-wrap: wrap; align-items: center; width: 100%;">
                  <div style="flex: 2; min-width: 150px;">
                    <div class="search-wrap">
                      <i class="fas fa-magnifying-glass" style="left: 8px; color: #002dbb; font-size: 9px;"></i>
                      <input type="text" id="telebotHistorySearch"
                        placeholder="Cari RefID / Tujuan / Produk / Downline / SN / Memo..."
                        oninput="telebotHistoryPage=1; renderTelebotHistory()"
                        style="padding-left: 23px !important; width: 100%;" />
                    </div>
                  </div>
                  <div style="flex: 1; min-width: 110px;">
                    <input type="date" id="telebotHistoryDateFilter" onchange="telebotHistoryPage=1; renderTelebotHistory()"
                      style="width: 100%;" title="Filter Tanggal Riwayat" />
                  </div>
                  <button type="button" class="btn btn-outline btn-sm" onclick="resetTelebotHistoryFilter()"
                    title="Reset Tanggal ke Hari Ini"><i class="fas fa-undo"></i> Hari Ini</button>
                  <button type="button" class="btn btn-outline btn-sm" onclick="clearTelebotHistoryDate()"
                    title="Tampilkan Semua Tanggal"><i class="fas fa-calendar-days"></i> Semua Tgl</button>
                </div>
                <div
                  style="display: flex; gap: 6px; flex-wrap: wrap; align-items: center; width: 100%; border-top: 1px dashed #cbd5e1; padding-top: 6px;">
                  <div style="flex: 1.2; min-width: 120px;">
                    <select id="telebotHistoryMemberFilter" onchange="telebotHistoryPage=1; renderTelebotHistory()"
                      style="width: 100%;">
                      <option value="">Semua Member Downline</option>
                    </select>
                  </div>
                  <div style="flex: 1; min-width: 110px;">
                    <select id="telebotHistoryCategoryFilter" onchange="telebotHistoryPage=1; renderTelebotHistory()"
                      style="width: 100%;">
                      <option value="">Semua Kategori</option>
                      <option value="xl_axis">XL &amp; Axis (Akrab)</option>
                      <option value="telkomsel">Telkomsel</option>
                      <option value="indosat">Indosat Ooredoo</option>
                      <option value="tri">Tri (3)</option>
                      <option value="smartfren">Smartfren</option>
                      <option value="pln">Token Listrik PLN</option>
                      <option value="emoney">E-Money &amp; Dompet</option>
                      <option value="game">Voucher Game</option>
                      <option value="ppob">Tagihan PPOB / Pasca</option>
                    </select>
                  </div>
                  <div style="display: flex; gap: 3px; align-items: center; flex: 1.1; min-width: 140px;">
                    <input type="number" id="tbHistMinPrice" placeholder="Min Rp"
                      oninput="telebotHistoryPage=1; renderTelebotHistory()" style="width: 50%;" />
                    <span style="font-size: 9px; color: #64748b;">-</span>
                    <input type="number" id="tbHistMaxPrice" placeholder="Max Rp"
                      oninput="telebotHistoryPage=1; renderTelebotHistory()" style="width: 50%;" />
                  </div>
                  <div style="display: flex; gap: 4px; align-items: center;">
                    <select id="telebotHistoryStatusFilter"
                      onchange="syncTbStatusFilterQuick(); telebotHistoryPage=1; renderTelebotHistory()">
                      <option value="">Semua Status</option>
                      <option value="BERHASIL">BERHASIL</option>
                      <option value="PENDING">PENDING</option>
                      <option value="GAGAL">GAGAL</option>
                    </select>
                    <select id="tbHistPerPage"
                      onchange="telebotHistoryPerPage=parseInt(this.value,10); telebotHistoryPage=1; renderTelebotHistory()"
                      title="Jumlah Baris Per Halaman">
                      <option value="15">15 Baris</option>
                      <option value="25" selected>25 Baris</option>
                      <option value="50">50 Baris</option>
                      <option value="100">100 Baris</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="table-wrap" style="overflow-y: auto;">
                <table>
                  <thead>
                    <tr>
                      <th>Waktu</th>
                      <th>Downline</th>
                      <th>Produk</th>
                      <th>Tujuan</th>
                      <th>Harga</th>
                      <th>Laba (+)</th>
                      <th>Status</th>
                      <th>SN / Keterangan</th>
                      <th style="min-width: 120px;">Aksi Transaksi</th>
                    </tr>
                  </thead>
                  <tbody id="telebotHistoryTableBody"></tbody>
                </table>
              </div>

              <div
                style="display: flex; justify-content: space-between; align-items: center; margin-top: 9px; flex-wrap: wrap; gap: 8px; border-top: 1px solid #e2e8f0; padding-top: 7px;">
                <small style="font-size: 9px; color: var(--text-sub); font-weight: 700;" id="tbHistoryPageInfo">Memuat
                  riwayat...</small>
                <div style="display: flex; gap: 4px;" id="telebotHistoryPaginationBtns"></div>
              </div>
            </div>

            <div class="modal" id="modalTbCustomExport" style="z-index: 10024;">
              <div class="modal-content" style="max-width: 360px; padding: 16px;">
                <div
                  style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #bfdbfe; padding-bottom: 8px; margin-bottom: 10px;">
                  <h3 style="font-size: 12px; margin: 0; color: #002dbb; display: flex; align-items: center; gap: 6px;">
                    <i class="fas fa-file-excel" style="color:#059669;"></i> Ekspor Riwayat Bot Telegram
                  </h3>
                  <button type="button" class="btn btn-outline btn-sm" onclick="closeModal('modalTbCustomExport')">✕</button>
                </div>
                <div class="form-group"><label>Dari Tanggal</label><input type="date" id="tbExpDateFrom" /></div>
                <div class="form-group"><label>Sampai Tanggal</label><input type="date" id="tbExpDateTo" /></div>
                <div class="form-group"><label>Status Transaksi</label>
                  <select id="tbExpStatus">
                    <option value="">Semua Status (Sukses, Pending, Gagal)</option>
                    <option value="BERHASIL">Hanya Sukses (Berhasil)</option>
                    <option value="PENDING">Hanya Pending</option>
                    <option value="GAGAL">Hanya Gagal</option>
                  </select>
                </div>
                <div style="display: flex; gap: 6px; margin-top: 10px;">
                  <button type="button" class="btn btn-outline" style="flex: 1;"
                    onclick="closeModal('modalTbCustomExport')">Batal</button>
                  <button type="button" class="btn btn-success" style="flex: 1;"
                    onclick="executeTbCustomExportCSV()"><i class="fas fa-download"></i> Unduh CSV</button>
                </div>
              </div>
            </div>
          </div>

          <div id="telebotSection_requests" style="display: none;">
            <div class="card">
              <div
                style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 8px; margin-bottom: 9px;">
                <div>
                  <div class="card-title" style="margin-bottom: 1px;"><i class="fas fa-wallet"></i> Permohonan Topup Saldo
                    Downline</div>
                  <div class="card-sub" style="margin-bottom: 0;">Daftar tiket deposit dari member downline. Setujui untuk
                    menambah saldo bot secara atomik dan memasukkan nilai deposit ke hitungan omset.</div>
                </div>
                <button class="btn btn-outline btn-sm" onclick="loadDownlineTopups()"><i class="fas fa-rotate"></i> Segarkan
                  Antrean</button>
              </div>
              <div class="table-wrap" style="overflow-y: auto;">
                <table>
                  <thead>
                    <tr>
                      <th>Waktu</th>
                      <th>ID Tiket</th>
                      <th>Member Downline</th>
                      <th>Metode</th>
                      <th>Nominal Persis (Rp)</th>
                      <th>Status</th>
                      <th style="min-width: 115px;">Aksi Konfirmasi</th>
                    </tr>
                  </thead>
                  <tbody id="downlineTopupsTableBody"></tbody>
                </table>
              </div>
            </div>
          </div>

          <div id="telebotSection_broadcast" style="display: none;">
            <div class="card" style="max-width: 540px;">
              <div
                style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #f1f5f9; padding-bottom: 7px; margin-bottom: 9px;">
                <div>
                  <div class="card-title" style="margin-bottom: 1px;"><i class="fas fa-bullhorn" style="color: #7c3aed;"></i>
                    Siaran Pengumuman Massal</div>
                  <div class="card-sub" style="margin-bottom: 0;">Distribusikan info restock, pemeliharaan, atau promo langsung ke
                    seluruh chat downline aktif.</div>
                </div>
                <span class="badge badge-purple">HTML SUPPORTED</span>
              </div>
              <div
                style="background: #faf5ff; border: 1px solid #e9d5ff; border-radius: 8px; padding: 7px 10px; font-size: 8.8px; color: #6b21a8; margin-bottom: 9px;">
                <i class="fas fa-code"></i> Format didukung: <code>&lt;b&gt;tebal&lt;/b&gt;</code>,
                <code>&lt;i&gt;miring&lt;/i&gt;</code>, <code>&lt;code&gt;kode&lt;/code&gt;</code>
              </div>
              <div class="form-group">
                <label>Isi Pesan Siaran</label>
                <textarea id="telebotBroadcastMsg" rows="5" placeholder="Contoh:
🔥 PROMO HARI INI!
Stok Akrab Fresh XLA sudah tersedia kembali. Silakan ketik HARGA untuk cek paket."></textarea>
              </div>
              <button type="button" class="btn btn-purple btn-block" id="btnSubmitTelebotBroadcast"
                onclick="submitTelebotBroadcast()">
                <i class="fas fa-paper-plane"></i> Kirim Siaran Sekarang
              </button>
            </div>
          </div>
        </div>
      </div>
      <div id="tabTester" style="display: none;">
        <div class="card"
          style="border: 1px solid rgba(59, 130, 246, 0.3); background: linear-gradient(180deg, rgba(17, 27, 46, 0.95) 0%, rgba(11, 19, 38, 0.95) 100%);">
          <div
            style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--border-color); padding-bottom: 12px; margin-bottom: 20px; flex-wrap: wrap; gap: 10px;">
            <div>
              <h2 style="font-size: 18px; color: #fff; display: flex; align-items: center; gap: 10px;">
                <i class="fas fa-terminal" style="color: var(--primary);"></i> Live API Endpoint Tester & Simulator
              </h2>
              <p style="font-size: 12px; color: var(--text-sub); margin-top: 4px;">Uji coba request H2H secara realtime
                langsung ke server backend tanpa koding</p>
            </div>
            <div>
              <span class="badge badge-success"><i class="fas fa-bolt"></i> REALTIME ENDPOINT</span>
            </div>
          </div>

          <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px;">
            <div
              style="background: rgba(8, 13, 26, 0.5); padding: 18px; border-radius: 14px; border: 1px solid var(--border-color);">
              <div
                style="font-size: 13px; font-weight: 700; color: #60a5fa; margin-bottom: 14px; display: flex; align-items: center; gap: 8px;">
                <i class="fas fa-sliders-h"></i> PARAMETER REQUEST
              </div>

              <div class="form-group">
                <label><i class="fas fa-server" style="color: var(--primary);"></i> Target Server Endpoint</label>
                <select id="testServer">
                  <option value="api1">api1 (AkrabStable - XL Akrab)</option>
                  <option value="api2">api2 (Akrab V2 - Produk & Transaksi)</option>

                  <option value="api4">api4 (AkrabOke - PPOB & E-Wallet)</option>
                </select>
              </div>

              <div class="form-group">
                <label><i class="fas fa-exchange-alt" style="color: var(--accent);"></i> Action Method</label>
                <select id="testAction" onchange="toggleTestFields()">
                  <option value="list">Cek Katalog Produk (list)</option>
                  <option value="status">Cek Status Transaksi (status)</option>
                </select>
              </div>

              <div id="statusFields" style="display: none;">
                <div class="form-group">
                  <label><i class="fas fa-hashtag"></i> RefID H2H Mitra</label>
                  <input type="text" id="testRefId" placeholder="Contoh: TRX_MITRA_9901" />
                </div>
              </div>

              <button class="btn btn-success btn-block" onclick="executeTest()"
                style="margin-top: 10px; padding: 12px; font-size: 13px;">
                <i class="fas fa-paper-plane"></i> Kirim Test Request Sekarang
              </button>
            </div>

            <div style="display: flex; flex-direction: column;">
              <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                <label
                  style="margin-bottom: 0; font-size: 12px; color: #a7f3d0; font-weight: 700; display: flex; align-items: center; gap: 6px;">
                  <i class="fas fa-code"></i> Realtime JSON Output
                </label>
                <div style="display: flex; gap: 6px;">
                  <button class="btn btn-outline" onclick="copyTestOutput()"
                    style="padding: 4px 10px; font-size: 10px; border-radius: 6px;">
                    <i class="fas fa-copy"></i> Salin JSON
                  </button>
                  <button class="btn btn-outline" onclick="downloadTestOutputPrompt()"
                    style="padding: 4px 10px; font-size: 10px; border-radius: 6px; border-color: rgba(16, 185, 129, 0.4); color: #34d399;">
                    <i class="fas fa-download"></i> Download JSON
                  </button>
                </div>
              </div>

              <div
                style="background: #040810; border: 1px solid var(--border-color); border-radius: 12px; overflow: hidden; flex: 1; display: flex; flex-direction: column;">
                <div
                  style="background: rgba(15, 23, 42, 0.9); padding: 8px 14px; border-bottom: 1px solid var(--border-color); display: flex; justify-content: space-between; align-items: center;">
                  <div style="display: flex; gap: 6px;">
                    <span
                  style="width: 10px; height: 10px; border-radius: 50%; background: #ef4444; display: inline-block;"></span>
                    <span
                  style="width: 10px; height: 10px; border-radius: 50%; background: #f59e0b; display: inline-block;"></span>
                    <span
                  style="width: 10px; height: 10px; border-radius: 50%; background: #10b981; display: inline-block;"></span>
                  </div>
                  <small style="font-family: monospace; font-size: 10px; color: var(--text-sub);" id="testResponseStatus">STATUS:
                    READY</small>
                </div>
                <pre id="testResult"
                  style="margin-top: 0; border: none; border-radius: 0; background: transparent; min-height: 220px; max-height: 380px; flex: 1; font-family: 'Consolas', 'Courier New', monospace; font-size: 12px; line-height: 1.5; color: #38bdf8;">// Klik 'Kirim Test Request Sekarang' untuk melihat respon API...</pre>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div id="globalDashboardFooter" class="neo-footer-wrap">
        <div class="neo-footer-bar">
          <div class="neo-fb-left">
            <div class="neo-fb-badge"><i class="fas fa-terminal"></i></div>
            <div>
              <div class="neo-fb-role">CORE ARCHITECTURE &amp; SYSTEM ENGINEER</div>
              <div class="neo-fb-name">Cyraxx <span class="neo-fb-handle"><i class="fab fa-telegram-plane"></i> @iTCyrax</span>
              </div>
            </div>
          </div>
          <div class="neo-fb-right">
            <a href="https://t.me/iTCyrax" target="_blank" class="neo-fb-btn"><i class="fab fa-telegram-plane"></i> Hubungi Helpdesk 24/7</a>
          </div>
        </div>
      </div>
    </div>

    <div class="modal" id="modalWebhookUrl" style="z-index: 10009;">
      <div class="modal-content" style="max-width: 440px;">
        <div
          style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1.5px solid var(--border-color); padding-bottom: 12px; margin-bottom: 14px;">
          <h3 style="font-size: 15px; margin: 0; color: #0f172a; display: flex; align-items: center; gap: 8px;">
            <i class="fas fa-link" style="color: #9333ea;"></i> Pengaturan Webhook URL
          </h3>
          <button onclick="closeModal('modalWebhookUrl')" class="btn btn-outline"
            style="padding: 4px 10px; font-size: 11px;">✕</button>
        </div>
        <p style="font-size: 11px; color: var(--text-sub); margin-bottom: 14px; line-height: 1.5;">
          Masukkan URL Webhook / Callback endpoint server Anda. Sistem H2H akan otomatis mengirimkan notifikasi HTTP POST
          JSON saat transaksi selesai (Sukses / Gagal).
        </p>
        <div class="form-group">
          <label><i class="fas fa-globe"></i> Webhook Callback URL (Diawali https://)</label>
          <input type="url" id="inputUserWebhookUrl" placeholder="https://domain-anda.com/api/callback" />
        </div>
        <div style="display: flex; gap: 8px; margin-top: 15px;">
          <button class="btn btn-outline" style="flex: 1;" onclick="testUserWebhookUrl()" id="btnTestWebhook"><i
            class="fas fa-paper-plane"></i> Tes Ping</button>
          <button class="btn btn-success" style="flex: 1;" onclick="submitUserWebhookUrl()" id="btnSaveWebhook"><i
            class="fas fa-floppy-disk"></i> Simpan URL</button>
        </div>
      </div>
    </div>

    <div class="modal" id="modalRegenKey">
      <div class="modal-content">
        <h3 style="margin-bottom: 15px;"><i class="fas fa-key" style="color: var(--warning);"></i> Konfirmasi Reset API
          Key</h3>
        <p style="font-size: 13px; color: var(--text-sub); margin-bottom: 15px;">
          Masukkan Kata Sandi akun Anda untuk mengonfirmasi regenerasi API Key baru.
        </p>
        <div class="form-group">
          <label>Kata Sandi Akun</label>
          <input type="password" id="regenPasswordInput" placeholder="Masukkan password Anda">
        </div>
        <div style="display: flex; gap: 10px; margin-top: 20px;">
          <button class="btn btn-outline" style="flex:1;" onclick="closeModal('modalRegenKey')">Batal</button>
          <button class="btn btn-danger" style="flex:1;" onclick="submitRegenApiKey()"><i class="fas fa-sync"></i> Reset
            API Key</button>
        </div>
      </div>
    </div>

    <div class="modal" id="modalSaldoKurang" style="z-index: 10008;">
      <div class="modal-content" style="max-width: 380px; text-align: center; padding: 30px 20px;">
        <div
          style="width: 65px; height: 65px; background: rgba(239, 68, 68, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #ef4444; font-size: 30px; margin: 0 auto 15px auto;">
          <i class="fas fa-wallet"></i>
        </div>
        <h3 style="font-size: 18px; color: #0f172a; margin-bottom: 8px; font-weight: 800;">Saldo Tidak Cukup</h3>
        <p style="font-size: 12px; color: var(--text-sub); margin-bottom: 20px; line-height: 1.5;" id="saldoKurangMsg">
          Saldo Anda tidak mencukupi untuk melakukan transaksi ini.</p>
        <button class="btn btn-danger btn-block" style="padding: 10px; font-size: 12px; border-radius: 10px;"
          onclick="closeModal('modalSaldoKurang')">OK, Mengerti</button>
      </div>
    </div>

    <div class="modal" id="modalTrxDiproses" style="z-index: 10007;">
      <div class="modal-content" style="max-width: 400px; text-align: center; padding: 35px 25px;">
        <div style="position: relative; width: 80px; height: 80px; margin: 0 auto 20px auto;">
          <div
            style="position: absolute; inset: 0; border-radius: 50%; border: 3px solid #e0f2fe; border-top-color: #0ea5e9; animation: spinProcess 1s linear infinite;">
          </div>
          <div
            style="position: absolute; inset: 0; display: flex; align-items: center; justify-content: center; font-size: 28px; color: #0ea5e9;">
            <i class="fas fa-paper-plane"></i>
          </div>
        </div>
        <style>
        @keyframes spinProcess { 100% { transform: rotate(360deg); } }
        </style>
        <h3 style="font-size: 19px; color: #0f172a; margin-bottom: 8px; font-weight: 800;">Transaksi Sedang Diproses</h3>
        <p style="font-size: 12px; color: var(--text-sub); margin-bottom: 20px; line-height: 1.5;">Permintaan Anda telah
          diterima dan diteruskan ke server pusat. Silakan pantau statusnya di menu <b>Riwayat</b>.</p>
        <button class="btn btn-block"
          style="background: linear-gradient(135deg, #0ea5e9, #3b82f6); padding: 10px; font-size: 12px; border-radius: 10px;"
          onclick="closeModal('modalTrxDiproses')">Tutup Layar Ini</button>
      </div>
    </div>

    <div class="modal" id="modalPromoFmxList"
      style="z-index: 10015; overflow-y: auto; padding: 16px 10px; align-items: flex-start;">
      <div class="modal-content"
        style="max-width: 540px; margin: auto; max-height: 90vh; overflow-y: auto; position: relative; border-radius: 20px; border: 2px solid #fb7185; box-shadow: 0 25px 60px rgba(225, 29, 72, 0.25);">
        <div
          style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1.5px solid #ffe4e6; padding-bottom: 12px; margin-bottom: 14px; position: sticky; top: -22px; background: #ffffff; z-index: 10;">
          <div>
            <h3
              style="font-size: 15px; margin: 0; color: #9f1239; font-weight: 900; display: flex; align-items: center; gap: 8px;">
              <i class="fas fa-fire" style="color: #e11d48;"></i> Pilihan Paket Promo FlexMax (FMX)
            </h3>
            <small style="font-size: 10px; color: #64748b; font-weight: 700;">Nomor:
              <b id="modalPromoFmxTargetTxt" style="color: #002dbb;">-</b> • Masa Berlaku:
              <span class="text-danger">10 Menit</span></small>
          </div>
          <button class="btn btn-outline btn-sm" onclick="closeModal('modalPromoFmxList')"
            style="padding: 3px 8px; font-size: 12px; border-radius: 8px; color: #e11d48 !important; border-color: #fecdd3 !important; background: #fff1f2 !important;">✕</button>
        </div>
        <div id="modalPromoFmxNotice" class="banner banner-warn"
          style="font-size: 10.5px; padding: 8px 12px; margin-bottom: 12px;">
          <i class="fas fa-info-circle"></i>
          <div>Kode paket promo di bawah ini aktif selama 10 menit setelah pengecekan. Silakan pilih dan klik tombol
            <b>Beli Sekarang</b>.
          </div>
        </div>
        <div id="modalPromoFmxContainer" style="display: flex; flex-direction: column; gap: 10px;">
          <div style="text-align: center; padding: 25px; color: #64748b;">
            <i class="fas fa-spinner fa-spin" style="font-size: 20px; color: #e11d48;"></i><br>Memuat pilihan promo...
          </div>
        </div>
      </div>
    </div>

    <div class="modal" id="modalBeliProduk" style="z-index: 10006;">
      <div class="modal-content" style="max-width: 460px;">
        <div
          style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1.5px solid var(--border-color); padding-bottom: 12px; margin-bottom: 15px;">
          <h3 id="modalBeliTitle"
            style="font-size: 15px; margin: 0; color: #0f172a; display: flex; align-items: center; gap: 8px;"><i
            class="fas fa-cart-shopping" style="color: var(--accent);"></i> Konfirmasi Pembelian</h3>
          <button onclick="closeModal('modalBeliProduk')" class="btn btn-outline"
            style="padding: 4px 10px; font-size: 11px;">✕</button>
        </div>
        <div id="beliModalInfo"
          style="background: #eff6ff; border: 1.5px solid #bfdbfe; border-radius: 12px; padding: 12px; margin-bottom: 14px;">
          <div style="font-size: 14px; font-weight: 800; color: #0f172a; margin-bottom: 4px;" id="beliModalNama">-</div>
          <div style="display: flex; justify-content: space-between; align-items: center; font-size: 11px; margin-top: 6px;">
            <span class="badge badge-user" id="beliModalKode">-</span>
            <b style="font-size: 15px; color: var(--accent); font-family: monospace;" id="beliModalHarga">Rp 0</b>
          </div>
        </div>
        <div id="beliPreorderNoticeWrap"
          style="display: none; background: #fffbeb; border: 1.5px solid #fde68a; border-radius: 12px; padding: 12px 14px; margin-bottom: 14px; font-size: 11px; color: #92400e; line-height: 1.55;">
          <div
            style="font-weight: 800; font-size: 11.5px; margin-bottom: 4px; display: flex; align-items: center; gap: 6px; color: #b45309;">
            <i class="fas fa-triangle-exclamation" style="font-size: 13px;"></i> PERHATIAN SISTEM PRE-ORDER:
          </div>
          Pastikan saldo anda cukup untuk melakukan preorder, Hitung dengan teliti karena system preorder akan memotong saldo
          ketika PO berhasil. Jika saldo tidak mencukupi, PO tidak akan berjalan dan tertahan di pending.
        </div>
        <div class="form-group">
          <div id="beliPlnDetailWrap"
            style="display: none; background: #eff6ff; border: 1.5px solid #bfdbfe; border-radius: 12px; padding: 12px 14px; margin-bottom: 10px; font-size: 11px;">
          </div>
          <div id="beliTargetInputBoxWrap">
            <label id="beliTargetLabel"><i class="fas fa-mobile-screen-button"></i> Nomor Tujuan / Target ID</label>
            <input type="tel" inputmode="numeric" pattern="[0-9]*" id="beliTargetInput" placeholder="Contoh: 087812345678"
              onkeydown="if(event.key==='Enter'){executeBeliProduk();}else if(!event.ctrlKey&&!event.metaKey&&event.key.length===1&&!/[0-9]/.test(event.key)){event.preventDefault();}"
              oninput="this.value=this.value.replace(/\D/g,'')" />
          </div>
        </div>
        <div id="beliOpendenomWrap" class="form-group" style="display: none;">
          <label><i class="fas fa-money-bill-wave"></i> Nominal Bebas (Qty)</label>
          <input type="number" id="beliQtyInput" placeholder="Minimal 100" />
        </div>
        <div id="beliBillDetailWrap"
          style="display: none; background: #fffbeb; border: 1.5px solid #fde68a; border-radius: 12px; padding: 12px; margin-bottom: 14px; font-size: 11px; color: #92400e;">
        </div>
        <div
          style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 10px 12px; font-size: 11px; margin-bottom: 15px; display: flex; justify-content: space-between; align-items: center;">
          <span style="color: var(--text-sub); font-weight: 600;">Sisa Saldo Anda:</span>
          <b id="beliModalSaldoSaatIni" style="color: #002dbb; font-family: monospace;">Rp 0</b>
        </div>
        <div style="display: flex; gap: 10px;">
          <button class="btn btn-outline" style="flex: 1;" onclick="closeModal('modalBeliProduk')">Batal</button>
          <button class="btn btn-success" style="flex: 1;" id="btnSubmitBeli" onclick="executeBeliProduk()"><i
            class="fas fa-bolt"></i> Beli Sekarang</button>
        </div>
      </div>
    </div>

    <div class="modal" id="modalStrukSukses" style="z-index: 10007;">
      <div class="modal-content" style="max-width: 440px; text-align: center;">
        <div
          style="width: 60px; height: 60px; border-radius: 50%; background: #ecfdf5; border: 2px solid #a7f3d0; color: #059669; display: flex; align-items: center; justify-content: center; font-size: 26px; margin: 0 auto 12px auto;">
          <i class="fas fa-circle-check"></i>
        </div>
        <h3 style="font-size: 17px; margin-bottom: 4px; color: #0f172a;">Transaksi Berhasil!</h3>
        <p style="font-size: 11px; color: var(--text-sub); margin-bottom: 14px;" id="strukPesanStatus">Pesanan Anda telah
          berhasil diproses oleh sistem H2H.</p>
        <div
          style="background: #f8fafc; border: 1.5px dashed #bfdbfe; border-radius: 12px; padding: 14px; text-align: left; font-size: 11px; margin-bottom: 15px;">
          <div class="kv-grid" style="grid-template-columns: 110px 1fr; row-gap: 8px;">
            <div class="k">RefID H2H</div>
            <div class="v mono" id="strukRefId" style="color:#0284c7; font-weight:800;">-</div>
            <div class="k">Produk</div>
            <div class="v" id="strukProduk">-</div>
            <div class="k">Tujuan</div>
            <div class="v mono" id="strukTarget">-</div>
            <div class="k">Harga</div>
            <div class="v" id="strukHarga" style="font-weight:800; color:#059669;">-</div>
            <div class="k">SN / Token</div>
            <div class="v mono" id="strukSN" style="word-break: break-all; font-weight:700;">-</div>
            <div class="k">Sisa Saldo</div>
            <div class="v mono" id="strukSisaSaldo">-</div>
          </div>
        </div>
        <div style="display: flex; gap: 8px;">
          <button class="btn btn-outline btn-block" style="flex: 1; font-size: 11px;"
            onclick="copyToClipboard(document.getElementById('strukSN').innerText, 'SN/Token')"><i
            class="fas fa-copy"></i> Salin SN</button>
          <button class="btn btn-block" style="flex: 1; font-size: 11px;"
            onclick="closeModal('modalStrukSukses')">Selesai</button>
        </div>
      </div>
    </div>
    <div class="modal" id="modalProductDetail">
      <div class="modal-content" style="max-width: 520px;">
        <div
          style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--border-color); padding-bottom: 12px; margin-bottom: 15px;">
          <h3 style="font-size: 16px; margin: 0; color: #fff;"><i class="fas fa-info-circle"
            style="color: var(--primary);"></i> Detail Rincian Produk</h3>
          <button onclick="closeModal('modalProductDetail')" class="btn btn-outline"
            style="padding: 4px 10px; font-size: 11px;">✕</button>
        </div>
        <div id="productDetailBody"></div>
        <div style="margin-top: 20px; text-align: right;">
          <button class="btn btn-primary" onclick="closeModal('modalProductDetail')"
            style="padding: 8px 18px; font-size: 12px;">Tutup</button>
        </div>
      </div>
    </div>

    <div class="modal" id="modalTopup" style="z-index: 10030; overflow-y: auto; padding: 16px 10px; align-items: flex-start;">

      <div class="modal-content"
        style="max-width: 440px; margin: auto; max-height: 90vh; overflow-y: auto; position: relative; box-shadow: 0 25px 50px rgba(0, 45, 187, 0.25);">
        <h3
          style="margin-bottom: 12px; display: flex; align-items: center; justify-content: space-between; position: sticky; top: -22px; background: var(--panel-card); z-index: 10; padding: 4px 0 8px 0; border-bottom: 1.5px solid #bfdbfe;">
          <span id="modalTopupTitleText"
          style="font-size: 14px; font-weight: 800; color: #002dbb; display: flex; align-items: center; gap: 7px;"><i
            class="fas fa-bolt" style="color: #059669;"></i> Topup Saldo Otomatis</span>
          <button onclick="closeModal('modalTopup')" class="btn btn-outline"
            style="padding: 4px 10px; font-size: 13px; font-weight: 900; border-radius: 8px; color: #dc2626 !important; border-color: #fca5a5 !important; background: #fef2f2 !important; box-shadow: none; cursor: pointer;"
            title="Tutup Layar Topup">✕</button>
        </h3>
        <div id="wrapSpecialPaymentBanner"
          style="display: none; margin-bottom: 12px; border-radius: 12px; padding: 11px 14px; font-size: 11px; line-height: 1.45;">
        </div>
        <input type="hidden" id="currentTopupId">

        <div id="wrapTopupTargetWalletChoice"
          style="margin-bottom: 12px; background: #eff6ff; border: 1.5px solid #bfdbfe; border-radius: 12px; padding: 10px 12px;">
          <label
            style="font-size: 10px; font-weight: 800; color: #002dbb; margin-bottom: 6px; letter-spacing: 0.3px; display: flex; align-items: center; gap: 5px;">
            <i class="fas fa-wallet" style="color:#059669;"></i> PILIH DOMPET SALDO TUJUAN
          </label>
          <input type="hidden" id="topupTargetWallet" value="akrab">
          <div id="topupTargetWalletsGrid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 6px;">
            <button type="button" id="btnWallTargetAkrab" class="btn btn-sm" onclick="selectTopupWallet('akrab')"
              style="font-size:9.5px; font-weight:800; padding:6px 2px;">API 1 (Akrab)</button>
            <button type="button" id="btnWallTargetApi2" class="btn btn-outline btn-sm" onclick="selectTopupWallet('api2')"
              style="font-size:9.5px; font-weight:800; padding:6px 2px;">API 2 (Akrab V2)</button>
            <button type="button" id="btnWallTargetPpob" class="btn btn-outline btn-sm" onclick="selectTopupWallet('ppob')"
              style="font-size:9.5px; font-weight:800; padding:6px 2px;">API 4 (PPOB)</button>
          </div>
        </div>

        <div id="topupInputSection">
          <p style="font-size: 11px; color: var(--text-sub); margin-bottom: 12px; line-height: 1.5;">
            Pilih atau masukkan nominal topup saldo. Sistem akan menghitung biaya admin serta nominal unik transfer secara
            transparan.
          </p>

          <div style="margin-bottom: 12px;">
            <label
              style="display:flex; justify-content:space-between; align-items:center; font-size:10px; font-weight:800; color:#002dbb; margin-bottom:6px; letter-spacing:0.3px;">
              <span><i class="fas fa-bolt" style="color:#f59e0b;"></i> PILIHAN NOMINAL CEPAT</span>
              <small id="quickMinTopupHint" style="font-size:9px; color:var(--text-sub); font-weight:700;">Min. Rp 20.000</small>
            </label>
            <div id="topupQuickChipsGrid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 6px;">
              <button type="button" class="btn btn-outline btn-sm" onclick="selectQuickNominal(20000)"
                style="font-weight:800; padding:6px 4px; font-size:11px;">Rp 20.000</button>
              <button type="button" class="btn btn-outline btn-sm" onclick="selectQuickNominal(50000)"
                style="font-weight:800; padding:6px 4px; font-size:11px;">Rp 50.000</button>
              <button type="button" class="btn btn-outline btn-sm" onclick="selectQuickNominal(100000)"
                style="font-weight:800; padding:6px 4px; font-size:11px;">Rp 100.000</button>
              <button type="button" class="btn btn-outline btn-sm" onclick="selectQuickNominal(200000)"
                style="font-weight:800; padding:6px 4px; font-size:11px;">Rp 200.000</button>
              <button type="button" class="btn btn-outline btn-sm" onclick="selectQuickNominal(500000)"
                style="font-weight:800; padding:6px 4px; font-size:11px;">Rp 500.000</button>
              <button type="button" class="btn btn-outline btn-sm" onclick="selectQuickNominal(1000000)"
                style="font-weight:800; padding:6px 4px; font-size:11px;">Rp 1.000.000</button>
            </div>
          </div>

          <div class="form-group" style="margin-bottom: 12px;">
            <label style="display:flex; justify-content:space-between; align-items:center;">
              <span>NOMINAL TOPUP (RP)</span>
              <span id="topupMinNotice" style="color:#0284c7; font-weight:700; font-size:9.5px;">Min: Rp 20.000</span>
            </label>
            <div class="search-wrap">
              <i class="fas fa-money-bill-wave" style="color:#002dbb;"></i>
              <input type="number" id="topupAmount" placeholder="Ketik nominal manual..." min="1000"
                oninput="handleTopupAmountChange()" style="padding-left:28px; font-weight:800; font-size:13px; color:#002dbb;">
            </div>
          </div>

          <div style="margin-bottom: 12px;">
            <label style="margin-bottom: 6px; font-size:10px; font-weight:800; color:#002dbb;"><i class="fas fa-credit-card"></i>
              METODE PEMBAYARAN</label>
            <input type="hidden" id="topupMethod" value="qris">
            <div id="topupMethodCardsContainer"
              style="display: grid; grid-template-columns: repeat(auto-fit, minmax(115px, 1fr)); gap: 8px;">
              <div style="text-align:center; padding:10px; color:var(--text-sub); grid-column:1/-1; font-size:11px;">Memuat metode
                pembayaran...</div>
            </div>
          </div>

          <div id="methodDisabledAlert" class="banner banner-danger" style="display:none; margin-top:8px;">
            <i class="fas fa-triangle-exclamation"></i>
            <div>Metode pembayaran ini sedang dalam perbaikan dan tidak dapat digunakan saat ini.</div>
          </div>

          <div id="topupFeeBreakdownBox"
            style="display:none; background: #eff6ff; border: 1.5px dashed #bfdbfe; border-radius: 12px; padding: 10px 14px; margin-bottom: 12px;">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:3px; font-size:11px;">
              <span style="color:var(--text-sub);">Nominal Saldo:</span>
              <b id="txtBreakdownNominal" class="mono" style="color:#0f172a;">Rp 0</b>
            </div>
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:3px; font-size:11px;">
              <span style="color:var(--text-sub);">Biaya Admin Layanan:</span>
              <b id="txtBreakdownAdminFee" class="mono" style="color:#d97706;">+Rp 0</b>
            </div>
            <div
              style="display:flex; justify-content:space-between; align-items:center; padding-top:5px; border-top:1px solid #bfdbfe; margin-top:4px; font-size:11.5px;">
              <span style="color:#002dbb; font-weight:800;">Estimasi Total Bayar:</span>
              <b id="txtBreakdownTotalBayar" class="mono" style="color:#002dbb; font-size:13px;">Rp 0</b>
            </div>
            <div style="display:flex; justify-content:space-between; align-items:center; margin-top:3px; font-size:10px;">
              <span style="color:#059669; font-weight:700;">Saldo Masuk ke Akun:</span>
              <b id="txtBreakdownSaldoMasuk" class="mono" style="color:#059669;">Rp 0 (+ kode unik)</b>
            </div>
          </div>

          <div id="topupInfoMessageBox"
            style="display:none; background:#f8fafc; border:1px solid #e2e8f0; border-left:3.5px solid #002dbb; border-radius:10px; padding:10px 12px; margin-bottom:14px; font-size:10.5px; color:#475569; line-height:1.55; white-space:pre-line; max-height:120px; overflow-y:auto; word-break:break-word;">
          </div>

          <div style="display: flex; gap: 8px; margin-top: 14px;">
            <button class="btn btn-outline" style="flex:1;" onclick="closeModal('modalTopup')">Batal</button>
            <button class="btn btn-success" style="flex:1;" id="btnReqTopup" onclick="requestTopup()">
              <i class="fas fa-paper-plane"></i> Lanjutkan Topup
            </button>
          </div>
        </div>

        <div id="topupQrisSection" style="display: none; text-align: center;">
          <div id="infoTransferBox"
            style="background: #eff6ff; border: 1.5px solid #bfdbfe; padding: 12px; border-radius: 12px; margin-bottom: 12px; text-align: left; display:none;">
            <div id="transferBankTitle" style="font-size: 13px; font-weight: 800; color: #0284c7; margin-bottom: 4px;">-
            </div>
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:4px;">
              <span id="transferRekNumber"
              style="font-size: 16px; font-weight: 900; color: #0f172a; font-family: monospace; letter-spacing: 1px;">-</span>
              <button class="btn btn-outline btn-sm"
                onclick="copyToClipboard(document.getElementById('transferRekNumber').innerText, 'Nomor Rekening')"><i
                class="fas fa-copy"></i> Salin</button>
            </div>
            <div id="transferAccountName" style="font-size: 11px; color: var(--text-sub);">A/N -</div>
          </div>

          <div id="infoQrisBox"
            style="background-color: #ffffff; background-image: radial-gradient(#e2e8f0 1px, transparent 1px); background-size: 14px 14px; border: 2px solid #cbd5e1; padding: 16px 14px 12px 14px; border-radius: 18px; margin-bottom: 14px; display: none; position: relative; overflow: hidden; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);">

            <div
              style="position: absolute; left: 0; top: 115px; width: 28px; height: 95px; background: #dc2626; clip-path: polygon(0 0, 100% 50%, 0 100%); pointer-events: none; z-index: 1;">
            </div>

            <div
              style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1.5px solid #f1f5f9; padding-bottom: 8px; margin-bottom: 8px; position: relative; z-index: 2;">
              <div style="display: flex; align-items: center; gap: 6px;">
                <span
                style="font-size: 24px; font-weight: 900; color: #0f172a; letter-spacing: -1.2px; font-family: 'Segoe UI', system-ui, sans-serif; line-height: 1;">QRIS</span>
                <div
                  style="font-size: 7.5px; font-weight: 800; color: #475569; line-height: 1.15; text-align: left; border-left: 1.5px solid #cbd5e1; padding-left: 6px;">
                  QR Code Standar<br>Pembayaran Nasional
                </div>
              </div>
              <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; line-height: 1;">
                <i class="fas fa-dove" style="color: #dc2626; font-size: 18px; transform: scaleX(-1);"></i>
                <span
                style="font-size: 11px; font-weight: 900; color: #1e3a8a; letter-spacing: 0.8px; margin-top: 2px;">GPN</span>
              </div>
            </div>

            <div style="text-align: center; margin-bottom: 8px; position: relative; z-index: 2;">
              <div style="font-size: 17px; font-weight: 900; color: #0f172a; letter-spacing: -0.3px;">DON* FI***I K**N**WA*</div>
              <div
                style="font-size: 11px; font-weight: 800; color: #334155; font-family: 'Consolas', monospace; margin-top: 2px; letter-spacing: 0.5px;">
                NMID : ID1026587428537</div>
              <div style="font-size: 12px; font-weight: 800; color: #64748b; margin-top: 1px;">A01</div>
            </div>

            <div
              style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin: 6px 0 10px 0; position: relative; z-index: 2;">
              <div onclick="openQrisPreviewModal()"
                style="background: #ffffff; padding: 14px; border-radius: 12px; border: 2px solid #cbd5e1; box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08); display: inline-block; cursor: pointer; transition: transform 0.2s ease;"
                onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'"
                title="Klik untuk memperbesar QRIS">
                <img id="topupDynamicQrisImg" src="" alt="QRIS Dinamis"
                  style="width: 240px; max-width: 100%; height: auto; display: block; border-radius: 0 !important; image-rendering: -webkit-optimize-contrast; image-rendering: pixelated;">
              </div>
              <div style="display: flex; gap: 6px; margin-top: 8px; flex-wrap: wrap; justify-content: center;">
                <button type="button" onclick="openQrisPreviewModal()" class="btn btn-outline btn-sm"
                  style="font-size: 10px; font-weight: 800; padding: 4px 11px; border-radius: 20px; color: #002dbb !important; border-color: #93c5fd !important; background: #eff6ff !important; cursor: pointer;"><i class="fas fa-magnifying-glass-plus"></i>
                  Perbesar</button>
                <button type="button" onclick="downloadQrisImage()" class="btn btn-outline btn-sm"
                  style="font-size: 10px; font-weight: 800; padding: 4px 11px; border-radius: 20px; color: #059669 !important; border-color: #a7f3d0 !important; background: #ecfdf5 !important; cursor: pointer;"><i class="fas fa-download"></i>
                  Simpan Gambar</button>
                <button type="button" onclick="copyQrisString()" class="btn btn-outline btn-sm"
                  style="font-size: 10px; font-weight: 800; padding: 4px 11px; border-radius: 20px; color: #64748b !important; border-color: #cbd5e1 !important; background: #f8fafc !important; cursor: pointer;"><i class="fas fa-copy"></i>
                  Salin Kode</button>
              </div>
            </div>

            <div style="text-align: center; margin-bottom: 8px; position: relative; z-index: 2;">
              <div style="font-size: 12px; font-weight: 900; color: #0f172a; letter-spacing: 0.8px;">SATU QRIS UNTUK SEMUA
              </div>
              <div style="font-size: 9.5px; color: #64748b; font-weight: 600; margin-top: 2px;">Cek aplikasi penyelenggara
                di: <span style="color: #0284c7; text-decoration: underline;">www.aspi-qris.id</span></div>
            </div>

            <div
              style="display: flex; justify-content: space-between; align-items: flex-end; margin-top: 6px; position: relative; z-index: 2;">
              <div
                style="text-align: left; font-size: 8px; color: #64748b; font-weight: 700; line-height: 1.35; padding-left: 2px;">
                <div>Dicetak oleh: 93600915</div>
                <div>Versi cetak: 1.0.03.10.26</div>
              </div>
              <div
                style="background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); border-top-left-radius: 20px; border-bottom-right-radius: 12px; padding: 5px 8px 5px 12px; color: #ffffff; box-shadow: 0 2px 8px rgba(220, 38, 38, 0.3);">
                <div style="font-size: 7.5px; font-weight: 800; margin-bottom: 3px; text-align: center;">Cara bayar dengan
                  QRIS:</div>
                <div
                  style="display: flex; gap: 7px; justify-content: center; align-items: center; font-size: 6.5px; font-weight: 800;">
                  <div style="text-align: center;"><i class="fas fa-mobile-screen"
                    style="font-size: 9px; display: block; margin-bottom: 1px;"></i>Buka App</div>
                  <div style="text-align: center;"><i class="fas fa-qrcode"
                    style="font-size: 9px; display: block; margin-bottom: 1px;"></i>Scan &amp; Cek</div>
                  <div style="text-align: center;"><i class="fas fa-circle-check"
                    style="font-size: 9px; display: block; margin-bottom: 1px;"></i>Bayar</div>
                </div>
              </div>
            </div>
          </div>

          <div style="font-size: 11px; color: var(--text-sub); margin-bottom: 3px; text-transform: uppercase; font-weight: 700;">
            Nominal Persis Wajib Ditransfer:</div>
          <div
            style="font-size: 24px; font-weight: 900; color: var(--accent); margin-bottom: 4px; font-family: 'Consolas', monospace;"
            id="topupUniqueAmount">Rp 0</div>
          <div style="margin-bottom: 8px;">
            <button class="btn btn-outline btn-sm"
              onclick="copyToClipboard(document.getElementById('topupUniqueAmount').innerText.replace(/[^0-9]/g,''), 'Nominal Transfer')"><i
              class="fas fa-copy"></i> Salin Nominal</button>
          </div>

          <div id="topupActiveBreakdownBox"
            style="background:#f8fafc; border:1px solid #e2e8f0; border-radius:10px; padding:8px 12px; margin-bottom:10px; font-size:10.5px; text-align:left;">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:2px;">
              <span style="color:var(--text-sub);" id="topupBreakdownLabelTxt">Saldo Masuk ke Dompet:</span>
              <b id="topupCreditAmountTxt" class="mono" style="color:#059669; font-weight:800;">Rp 0</b>
            </div>
            <div style="display:flex; justify-content:space-between; align-items:center;">
              <span style="color:var(--text-sub);" id="topupAdminFeeLabelTxt">Biaya Admin Layanan:</span>
              <b id="topupAdminFeeTxt" class="mono" style="color:#d97706;">Rp 0</b>
            </div>
          </div>

          <p style="font-size: 11px; color: #d97706; margin-bottom: 10px; font-weight: 700;">
            ⚠️ Wajib transfer tepat hingga 3 digit terakhir agar IndoPay dapat memverifikasi saldo otomatis.
          </p>

          <div style="margin-bottom: 12px;">
            <button type="button" class="btn btn-outline btn-block" onclick="hubungiAdminTopup()"
              style="background: #fffbeb !important; border: 1.5px dashed #f59e0b !important; color: #b45309 !important; padding: 10px 12px; font-size: 11px; line-height: 1.4; border-radius: 10px; text-align: center; cursor: pointer; transition: all 0.2s ease;">
              <i class="fab fa-telegram-plane" style="color: #0088cc; font-size: 15px; margin-right: 5px;"></i>
              <span>Topup belum masuk? tunggu 5 menit ya jika belum masuk <u>klik disini</u> untuk hubungi admin</span>
            </button>
          </div>

          <div
            style="display:flex; justify-content:space-between; align-items:center; background:#ecfdf5; border:1px solid #a7f3d0; padding:8px 12px; border-radius:8px; margin-bottom:12px;">
            <span style="font-size:11px; color:#047857; font-weight:700; display:flex; align-items:center; gap:6px;">
            <span class="dot green"></span> <span id="topupStatusText">Mengecek mutasi setiap 4 dtk...</span>
            </span>
            <span style="font-size:11px; color:#b91c1c; font-weight:800; font-family:monospace;"
            id="topupCountdownTimer">60:00</span>
          </div>

          <div style="display: flex; gap: 10px; margin-top: 14px;">
            <button type="button" class="btn btn-danger"
              style="flex:1; font-size:12px; font-weight:800; padding:10px 14px; border-radius:10px; box-shadow: 0 4px 14px rgba(220, 38, 38, 0.28);"
              onclick="cancelTopup()" id="btnCancelTopup"><i class="fas fa-ban"></i> Batalkan Topup</button>
            <button type="button" class="btn btn-outline"
              style="flex:1; font-size:12px; font-weight:800; padding:10px 14px; border-radius:10px; color:#002dbb !important; border:1.5px solid #bcd0ee !important; background:#ffffff !important;"
              onclick="closeModal('modalTopup')">Tutup Layar</button>
          </div>
        </div>

        <div id="topupDedicatedSection" style="display: none;">
          <div id="dedicatedInputSection">
            <div
              style="background: #eff6ff; border: 1.5px solid #bfdbfe; border-radius: 12px; padding: 12px; margin-bottom: 12px;">
              <div style="font-size: 12.5px; font-weight: 800; color: #002dbb; margin-bottom: 4px;">
                <i class="fas fa-server"></i> Topup Saldo Server 1 Dedicated
              </div>
              <div style="font-size: 10.5px; color: var(--text-sub); line-height: 1.5;">
                Jalur khusus upstream aktif. Nominal unik diterbitkan resmi oleh server penyedia dan saldo langsung masuk ke akun
                Server 1 Anda secara otomatis.
              </div>
            </div>

            <div style="margin-bottom: 12px;">
              <label
                style="font-size: 10px; font-weight: 800; color: #002dbb; margin-bottom: 6px;"><i class="fas fa-bolt" style="color:#f59e0b;"></i>
                NOMINAL CEPAT</label>
              <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 6px;">
                <button type="button" class="btn btn-outline btn-sm"
                  onclick="document.getElementById('dedicatedAmountInp').value=50000;"
                  style="font-weight:800; padding:6px 2px; font-size:10.5px;">Rp 50.000</button>
                <button type="button" class="btn btn-outline btn-sm"
                  onclick="document.getElementById('dedicatedAmountInp').value=100000;"
                  style="font-weight:800; padding:6px 2px; font-size:10.5px;">Rp 100.000</button>
                <button type="button" class="btn btn-outline btn-sm"
                  onclick="document.getElementById('dedicatedAmountInp').value=200000;"
                  style="font-weight:800; padding:6px 2px; font-size:10.5px;">Rp 200.000</button>
                <button type="button" class="btn btn-outline btn-sm"
                  onclick="document.getElementById('dedicatedAmountInp').value=500000;"
                  style="font-weight:800; padding:6px 2px; font-size:10.5px;">Rp 500.000</button>
                <button type="button" class="btn btn-outline btn-sm"
                  onclick="document.getElementById('dedicatedAmountInp').value=1000000;"
                  style="font-weight:800; padding:6px 2px; font-size:10.5px;">Rp 1.000.000</button>
                <button type="button" class="btn btn-outline btn-sm"
                  onclick="document.getElementById('dedicatedAmountInp').value=2000000;"
                  style="font-weight:800; padding:6px 2px; font-size:10.5px;">Rp 2.000.000</button>
              </div>
            </div>

            <div class="form-group" style="margin-bottom: 14px;">
              <label style="display:flex; justify-content:space-between; align-items:center;">
                <span>NOMINAL TOPUP (RP)</span>
                <span style="color:#0284c7; font-weight:700; font-size:9.5px;">Min. Rp 10.000</span>
              </label>
              <div class="search-wrap">
                <i class="fas fa-money-bill-wave" style="color:#002dbb;"></i>
                <input type="number" id="dedicatedAmountInp" placeholder="Minimal Rp 10.000" min="10000" step="10000"
                  style="padding-left:28px; font-weight:800; font-size:13px; color:#002dbb;">
              </div>
            </div>

            <div style="display: flex; gap: 8px;">
              <button type="button" class="btn btn-outline" style="flex:1;" onclick="closeModal('modalTopup')">Batal</button>
              <button type="button" class="btn btn-success" style="flex:1.5;" id="btnReqDedicatedTicket"
                onclick="requestDedicatedTicket()">
                <i class="fas fa-bolt"></i> Dapatkan Tiket Transfer
              </button>
            </div>
          </div>

          <div id="dedicatedTicketSection" style="display: none; text-align: center;">
            <div
              style="display:flex; justify-content:space-between; align-items:center; background:#ecfdf5; border:1px solid #a7f3d0; padding:8px 12px; border-radius:10px; margin-bottom:12px;">
              <span style="font-size:11px; color:#047857; font-weight:700; display:flex; align-items:center; gap:6px;">
                <span class="dot green"></span> <span id="dedicatedStatusText">Memantau mutasi setiap 7 detik...</span>
              </span>
              <span style="font-size:12px; color:#b91c1c; font-weight:900; font-family:monospace;" id="dedicatedCountdownTimer">30:00</span>
            </div>

            <div
              style="background: #eff6ff; border: 1.5px solid #bfdbfe; padding: 14px; border-radius: 12px; margin-bottom: 12px; text-align: left;">
              <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 4px;">
                <div style="font-size: 13px; font-weight: 800; color: #002dbb;"><i class="fas fa-building-columns"></i> Bank BRI
                </div>
                <span class="badge badge-cyan" style="font-size:9px;">UPSTREAM RESMI</span>
              </div>
              <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:4px;">
                <span id="dedicatedRekNumber" style="font-size: 17px; font-weight: 900; color: #0f172a; font-family: monospace; letter-spacing: 1px;">600701000029563</span>
                <button type="button" class="btn btn-outline btn-sm"
                  onclick="copyToClipboard('600701000029563', 'Nomor Rekening BRI')"><i class="fas fa-copy"></i> Salin</button>
              </div>
              <div style="font-size: 11px; color: var(--text-sub); font-weight: 600;">A/N
                <b style="color:#0f172a;" id="dedicatedAccountName">N*R AL****YAH</b>
              </div>
            </div>

            <div
              style="background: #fffbeb; border: 1.5px dashed #f59e0b; padding: 12px; border-radius: 12px; margin-bottom: 12px;">
              <div style="font-size: 10px; color: #92400e; font-weight: 800; text-transform: uppercase;">NOMINAL PERSIS WAJIB
                DITRANSFER:</div>
              <div style="font-size: 24px; font-weight: 900; color: #b45309; margin: 4px 0; font-family: 'Consolas', monospace;"
                id="dedicatedUniqueAmountTxt">Rp 0</div>
              <button type="button" class="btn btn-outline btn-sm" id="btnCopyDedicatedNominal"
                style="border-color:#f59e0b; color:#92400e; background:#ffffff !important; padding:4px 10px; font-size:10.5px;">
                <i class="fas fa-copy"></i> Salin Nominal Persis
              </button>
            </div>

            <p style="font-size: 10.5px; color: #d97706; margin-bottom: 12px; line-height: 1.5; font-weight: 700;">
              ⚠️ Wajib transfer tepat hingga 3 digit terakhir. Tiket otomatis kedaluwarsa setelah 30 menit.
            </p>

            <div style="display: flex; gap: 8px; margin-top: 14px;">
              <button type="button" class="btn btn-danger" style="flex:1; font-size:11.5px; font-weight:800; padding:10px;"
                onclick="cancelDedicatedTicket()" id="btnCancelDedicatedTicket">
                <i class="fas fa-ban"></i> Batalkan Topup
              </button>
              <button type="button" class="btn btn-outline" style="flex:1; font-size:11.5px; font-weight:800; padding:10px;"
                onclick="closeModal('modalTopup')">
                Tutup Layar
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal" id="modalPreviewQris"
      style="z-index: 10050; background: rgba(2, 6, 23, 0.88); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); padding: 15px;">

      <div
        style="position: relative; max-width: 95vw; max-height: 95vh; display: flex; flex-direction: column; align-items: center; justify-content: center;">
        <button type="button" onclick="closeModal('modalPreviewQris')"
          style="position: absolute; top: -14px; right: -14px; width: 40px; height: 40px; border-radius: 50%; background: #dc2626; color: #ffffff; border: 2.5px solid #ffffff; font-size: 18px; font-weight: 900; cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: 0 6px 20px rgba(0,0,0,0.5); z-index: 30; transition: transform 0.2s ease;"
          onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'"
          title="Tutup Preview QRIS">✕</button>
        <div
          style="background: #ffffff; padding: 18px; border-radius: 20px; box-shadow: 0 20px 50px rgba(0,0,0,0.6); text-align: center; max-width: 100%; border: 2px solid #cbd5e1;">
          <div
            style="font-size: 14px; font-weight: 900; color: #002dbb; margin-bottom: 12px; display: flex; align-items: center; justify-content: center; gap: 7px;">
            <i class="fas fa-qrcode" style="font-size: 16px;"></i> Scan Barcode QRIS Pembayaran
          </div>
          <div style="background: #ffffff; padding: 12px; border: 2px solid #e2e8f0; display: inline-block; margin: 0 auto;">
            <img id="fullPreviewQrisImg" src="" alt="QRIS Penuh"
              style="max-width: 82vw; max-height: 60vh; width: auto; height: auto; display: block; border-radius: 0 !important; image-rendering: -webkit-optimize-contrast; image-rendering: pixelated; margin: 0 auto;">
          </div>
          <div style="display: flex; gap: 8px; justify-content: center; margin-top: 12px;">
            <button type="button" class="btn btn-success btn-sm" onclick="downloadQrisImage()"
              style="padding: 6px 14px; font-size: 11px;"><i class="fas fa-download"></i> Simpan ke Galeri HP</button>
            <button type="button" class="btn btn-outline btn-sm" onclick="copyQrisString()"
              style="padding: 6px 14px; font-size: 11px;"><i class="fas fa-copy"></i> Salin Kode QRIS</button>
          </div>
          <div
            style="margin-top: 10px; font-size: 11px; font-weight: 800; color: #047857; background: #ecfdf5; border: 1px solid #a7f3d0; padding: 6px 12px; border-radius: 10px;">
            <i class="fas fa-circle-check"></i> Scan langsung atau gunakan menu "Pilih dari Galeri" pada m-Banking Anda
          </div>
        </div>
      </div>
    </div>

    <div class="modal" id="modalDownlineMarkup" style="z-index: 10021;">
      <div class="modal-content" style="max-width: 420px;">
        <div
          style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1.5px solid var(--border-color); padding-bottom: 10px; margin-bottom: 12px;">
          <h3 style="font-size: 15px; margin: 0; color: #002dbb; display: flex; align-items: center; gap: 8px;">
            <i class="fas fa-user-tag text-purple"></i> Setel Markup Pribadi Downline
          </h3>
          <button class="btn btn-outline btn-sm" onclick="closeModal('modalDownlineMarkup')"
            style="padding: 3px 8px; font-size: 12px;">✕</button>
        </div>
        <input type="hidden" id="modalDlMarkupTeleId" />
        <div style="background: #eff6ff; border: 1.5px solid #bfdbfe; border-radius: 12px; padding: 12px; margin-bottom: 14px;">
          <div style="font-size: 13px; font-weight: 800; color: #0f172a; margin-bottom: 4px;" id="modalDlMarkupNameTxt">-</div>
          <div style="font-size: 11px; color: var(--text-sub);">
            Markup Global Toko Saat Ini: <b style="color: #002dbb;" id="modalDlGlobalMarkupTxt">+Rp 0</b>
          </div>
        </div>
        <div class="form-group">
          <label class="checkbox-group" style="margin-bottom: 10px; font-weight: 700;">
            <input type="checkbox" id="modalDlUseGlobalCheck" onchange="toggleDlMarkupGlobalInput(this.checked)"> Gunakan Markup
            Global Toko (Default)
          </label>
        </div>
        <div class="form-group" id="modalDlCustomMarkupWrap">
          <label>Nominal Markup Pribadi / Khusus User Ini (Rp)</label>
          <input type="number" id="modalDlCustomMarkupInput" min="0" step="100" placeholder="Contoh: 2500"
            style="font-weight: 800; font-size: 13px; color: #7c3aed;" />
          <small class="text-sub" style="font-size: 9.5px; margin-top: 4px; display: block;">
            Harga paket di bot user ini akan dihitung dari: <b>Harga Modal + Markup Pribadi</b>.
          </small>
        </div>
        <div style="display: flex; gap: 8px; margin-top: 16px;">
          <button type="button" class="btn btn-outline" style="flex: 1;"
            onclick="closeModal('modalDownlineMarkup')">Batal</button>
          <button type="button" class="btn btn-success" style="flex: 1;" id="btnSubmitDlMarkup"
            onclick="submitDownlineMarkup()"><i class="fas fa-check"></i> Simpan Markup</button>
        </div>
      </div>
    </div>

    <div class="modal" id="modalAdjustDownlineSaldo" style="z-index: 10020;">
      <div class="modal-content" style="max-width: 420px;">
        <div
          style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1.5px solid var(--border-color); padding-bottom: 10px; margin-bottom: 12px;">
          <h3 style="font-size: 15px; margin: 0; color: #002dbb; display: flex; align-items: center; gap: 8px;">
            <i class="fas fa-wallet" style="color: #059669;"></i> Penyesuaian Saldo Downline
          </h3>
          <button class="btn btn-outline btn-sm" onclick="closeModal('modalAdjustDownlineSaldo')"
            style="padding: 3px 8px; font-size: 12px;">✕</button>
        </div>
        <input type="hidden" id="modalDlTeleId" />
        <div style="background: #eff6ff; border: 1.5px solid #bfdbfe; border-radius: 12px; padding: 12px; margin-bottom: 14px;">
          <div style="font-size: 13px; font-weight: 800; color: #0f172a; margin-bottom: 4px;" id="modalDlNameTxt">-</div>
          <div style="display: flex; justify-content: space-between; align-items: center; font-size: 11px;">
            <span style="color: var(--text-sub);">Saldo Saat Ini:</span>
            <b style="font-size: 14px; color: #059669; font-family: monospace;" id="modalDlCurrentSaldoTxt">Rp 0</b>
          </div>
        </div>
        <div class="form-group">
          <label>Jenis Mutasi</label>
          <select id="modalDlType">
            <option value="add">TAMBAH Saldo (+)</option>
            <option value="sub">KURANGI Saldo (-)</option>
            <option value="set">SET Saldo Langsung (=)</option>
          </select>
        </div>
        <div class="form-group">
          <label>Nominal (Rp)</label>
          <input type="number" id="modalDlAmount" min="0" placeholder="Contoh: 50000"
            style="font-weight: 800; font-size: 13px;" />
        </div>
        <div class="form-group">
          <label>Catatan Mutasi</label>
          <input type="text" id="modalDlNote" value="Topup oleh Upline" placeholder="Contoh: Topup via Transfer BCA" />
        </div>
        <div style="display: flex; gap: 8px; margin-top: 16px;">
          <button type="button" class="btn btn-outline" style="flex: 1;"
            onclick="closeModal('modalAdjustDownlineSaldo')">Batal</button>
          <button type="button" class="btn btn-success" style="flex: 1;"
            onclick="submitAdjustDownlineSaldo()"><i class="fas fa-check"></i> Terapkan Saldo</button>
        </div>
      </div>
    </div>

    <div class="modal" id="modalDlTrxDetail"
      style="z-index: 10022; overflow-y: auto; padding: 16px 10px; align-items: flex-start;">
      <div class="modal-content"
        style="max-width: 440px; margin: auto; max-height: 90vh; overflow-y: auto; position: relative; border-radius: 18px; border: 1.5px solid #bfdbfe; box-shadow: 0 20px 45px rgba(37, 99, 235, 0.18);">
        <div
          style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1.5px solid #e2e8f0; padding-bottom: 10px; margin-bottom: 12px; position: sticky; top: -22px; background: var(--panel-card); z-index: 10;">
          <h3 style="font-size: 15px; margin: 0; color: #002dbb; display: flex; align-items: center; gap: 8px;">
            <i class="fas fa-receipt" style="color: #002dbb;"></i> Detail Transaksi Downline
          </h3>
          <button class="btn btn-outline btn-sm" onclick="closeModal('modalDlTrxDetail')"
            style="padding: 3px 8px; font-size: 12px; border-radius: 8px;">✕</button>
        </div>
        <div id="dlTrxDetailBody"></div>
      </div>
    </div>

    <div class="modal" id="modalDlTrxStatus" style="z-index: 10023;">
      <div class="modal-content" style="max-width: 420px;">
        <div
          style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1.5px solid var(--border-color); padding-bottom: 10px; margin-bottom: 12px;">
          <h3 style="font-size: 15px; margin: 0; color: #002dbb; display: flex; align-items: center; gap: 8px;">
            <i class="fas fa-pen-to-square text-warn"></i> Ubah Status Transaksi Downline
          </h3>
          <button class="btn btn-outline btn-sm" onclick="closeModal('modalDlTrxStatus')"
            style="padding: 3px 8px; font-size: 12px;">✕</button>
        </div>
        <input type="hidden" id="dlStatusRefId" />
        <div style="background: #eff6ff; border: 1.5px solid #bfdbfe; border-radius: 12px; padding: 12px; margin-bottom: 12px;">
          <div style="font-size: 12px; font-weight: 800; color: #0f172a; margin-bottom: 2px;">RefID:
            <span class="mono text-blue" id="dlStatusRefIdTxt">-</span>
          </div>
          <div style="font-size: 11px; color: var(--text-sub);" id="dlStatusItemTxt">-</div>
        </div>
        <div class="banner banner-warn" style="font-size: 10.5px; padding: 8px 10px; margin-bottom: 12px;">
          <i class="fas fa-shield-halved"></i>
          <div><b>Aturan Mutasi Saldo:</b> Jika status diubah ke <b>GAGAL</b>, saldo downline otomatis di-refund. Jika
            dikembalikan ke <b>BERHASIL/PENDING</b>, saldo downline wajib dipotong kembali.</div>
        </div>
        <div class="form-group">
          <label>Status Baru Transaksi</label>
          <select id="dlStatusSelect">
            <option value="BERHASIL">BERHASIL</option>
            <option value="PENDING">PENDING</option>
            <option value="GAGAL">GAGAL (Refund Saldo ke Downline)</option>
          </select>
        </div>
        <div class="form-group">
          <label>SN / Serial Number (Opsional)</label>
          <input type="text" id="dlStatusSnInput" placeholder="Contoh: 01928301928301293" />
        </div>
        <div class="form-group">
          <label>Catatan / Alasan (Tampil di Bot Downline)</label>
          <input type="text" id="dlStatusNoteInput" placeholder="Contoh: Transaksi sukses terbit SN" />
        </div>
        <div style="display: flex; gap: 8px; margin-top: 15px;">
          <button type="button" class="btn btn-outline" style="flex: 1;" onclick="closeModal('modalDlTrxStatus')">Batal</button>
          <button type="button" class="btn btn-success" style="flex: 1;" id="btnSubmitDlStatus"
            onclick="submitDlTrxStatus()"><i class="fas fa-floppy-disk"></i> Simpan Status</button>
        </div>
      </div>
    </div>

    <div class="modal" id="modalTrxDetail" style="z-index: 10010; overflow-y: auto; padding: 16px 10px; align-items: flex-start;">
      <div class="modal-content"
        style="max-width: 460px; margin: auto; max-height: 90vh; overflow-y: auto; position: relative; border-radius: 18px; border: 1.5px solid #bfdbfe; box-shadow: 0 20px 45px rgba(37, 99, 235, 0.18);">
        <div
          style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1.5px solid #e2e8f0; padding-bottom: 10px; margin-bottom: 12px; position: sticky; top: -22px; background: var(--panel-card); z-index: 10;">
          <h3 style="font-size: 15px; margin: 0; color: #002dbb; display: flex; align-items: center; gap: 8px;">
            <i class="fas fa-receipt" style="color: #002dbb;"></i> Detail Transaksi
          </h3>
          <button class="btn btn-outline btn-sm" onclick="closeModal('modalTrxDetail')"
            style="padding: 3px 8px; font-size: 12px; border-radius: 8px;">✕</button>
        </div>
        <div id="trxDetailBody"></div>
      </div>
    </div>

    <div class="modal" id="modalUpgradeBot" style="z-index: 10026;">
      <div class="modal-content" style="max-width: 440px;">
        <div
          style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1.5px solid #bfdbfe; padding-bottom: 10px; margin-bottom: 14px;">
          <h3 style="font-size: 15px; margin: 0; color: #002dbb; display: flex; align-items: center; gap: 8px;">
            <i class="fab fa-telegram" style="color: #0088cc;"></i> Buka Sistem Bot Telegram
          </h3>
          <button onclick="closeModal('modalUpgradeBot')" class="btn btn-outline"
            style="padding: 3px 8px; font-size: 11px;">✕</button>
        </div>
        <div
          style="background: #eff6ff; border: 1.5px solid #bfdbfe; border-radius: 12px; padding: 14px; text-align: center; margin-bottom: 16px;">
          <small style="font-size: 10px; font-weight: 800; color: #0284c7; text-transform: uppercase;">Biaya Buka Fitur Bot Tele
            VIP</small>
          <div style="font-size: 24px; font-weight: 900; color: #002dbb; font-family: monospace; margin: 4px 0;">Rp 180.000</div>
          <small style="font-size: 10px; color: #64748b;">Sekali bayar untuk akses penuh fitur bot downline mandiri</small>
        </div>
        <div style="display: flex; flex-direction: column; gap: 10px; margin-bottom: 14px;">
          <div
            style="background: #ffffff; border: 1.5px solid #d2e0f5; border-radius: 12px; padding: 12px; cursor: pointer; transition: all 0.2s;"
            onclick="executePayBotViaWallet()">
            <div style="display: flex; justify-content: space-between; align-items: center;">
              <div style="display: flex; align-items: center; gap: 10px;">
                <div
                  style="width: 36px; height: 36px; border-radius: 10px; background: #ecfdf5; color: #059669; display: flex; align-items: center; justify-content: center; font-size: 16px;">
                  <i class="fas fa-wallet"></i>
                </div>
                <div>
                  <b style="font-size: 12px; color: #0f172a; display: block;">Bayar Pakai Saldo Dompet</b>
                  <small style="font-size: 10px; color: #64748b;" id="txtSaldoUpgradeBotAvailable">Memeriksa saldo...</small>
                </div>
              </div>
              <button type="button" class="btn btn-sm btn-success" style="padding: 5px 12px;"><i class="fas fa-bolt"></i>
                Bayar</button>
            </div>
          </div>
          <div
            style="background: #ffffff; border: 1.5px solid #d2e0f5; border-radius: 12px; padding: 12px; cursor: pointer; transition: all 0.2s;"
            onclick="executePayBotViaTransfer()">
            <div style="display: flex; justify-content: space-between; align-items: center;">
              <div style="display: flex; align-items: center; gap: 10px;">
                <div
                  style="width: 36px; height: 36px; border-radius: 10px; background: #eff6ff; color: #002dbb; display: flex; align-items: center; justify-content: center; font-size: 16px;">
                  <i class="fas fa-qrcode"></i>
                </div>
                <div>
                  <b style="font-size: 12px; color: #0f172a; display: block;">Transfer / QRIS Dinamis</b>
                  <small style="font-size: 10px; color: #64748b;">Nominal unik Rp 180.xxx (QRIS, DANA, SeaBank)</small>
                </div>
              </div>
              <button type="button" class="btn btn-sm btn-outline" style="padding: 5px 12px;"><i class="fas fa-arrow-right"></i>
                Pilih</button>
            </div>
          </div>
        </div>
        <button type="button" class="btn btn-outline btn-block" onclick="closeModal('modalUpgradeBot')">Batal</button>
      </div>
    </div>

    <div class="modal" id="modalPrinterSettings" style="z-index: 10028;">
      <div class="modal-content" style="max-width: 440px; max-height: 90vh; overflow-y: auto;">
        <div
          style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1.5px solid #bfdbfe; padding-bottom: 10px; margin-bottom: 14px;">
          <h3 style="font-size: 15px; margin: 0; color: #002dbb; display: flex; align-items: center; gap: 8px;">
            <i class="fas fa-print" style="color: #002dbb;"></i> Pengaturan Printer Thermal
          </h3>
          <button type="button" onclick="closeModal('modalPrinterSettings')" class="btn btn-outline"
            style="padding: 3px 8px; font-size: 11px;">✕</button>
        </div>

        <div
          style="background: #eff6ff; padding: 12px; border-radius: 12px; border: 1.5px solid #bfdbfe; margin-bottom: 14px; text-align: center;">
          <div
            style="font-size: 10.5px; color: #002dbb; margin-bottom: 6px; font-weight: 800; display: flex; align-items: center; justify-content: center; gap: 6px;">
            <i class="fas fa-eye"></i> Pratinjau Struk (Live Realtime)
          </div>
          <div
            style="background: #ffffff; padding: 10px; box-shadow: 0 2px 8px rgba(0, 45, 187, 0.08); display: inline-block; text-align: left; border: 1.5px solid #cbd5e1; border-radius: 8px; max-width: 100%; box-sizing: border-box; overflow-x: auto;">
            <pre id="settingsPreviewArea"
              style="margin: 0; font-family: 'Courier New', Courier, monospace; font-size: 10.5px; font-weight: bold; color: #000000; white-space: pre; line-height: 1.25; background: transparent; border: none; padding: 0;">Memuat Preview...</pre>
          </div>
        </div>

        <div class="form-group">
          <label><i class="fas fa-store"></i> Nama Toko (Header)</label>
          <textarea id="setStoreName" rows="2" placeholder="Contoh: DT17 CELLULAR" oninput="updateSettingsPreview()"
            style="font-size: 11px;"></textarea>
        </div>
        <div class="form-group">
          <label><i class="fas fa-location-dot"></i> Alamat / Info (Sub-Header)</label>
          <textarea id="setStoreAddress" rows="2" placeholder="Contoh: Jl. Raya H2H No. 17 - dompul.dt17.store"
            oninput="updateSettingsPreview()" style="font-size: 11px;"></textarea>
        </div>
        <div class="form-group">
          <label><i class="fas fa-heart"></i> Pesan Penutup (Footer)</label>
          <textarea id="setStoreFooter" rows="2" placeholder="Contoh: Terima Kasih Atas Kunjungan Anda"
            oninput="updateSettingsPreview()" style="font-size: 11px;"></textarea>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 12px;">
          <div class="form-group" style="margin-bottom: 0;">
            <label><i class="fas fa-receipt"></i> Ukuran Kertas</label>
            <select id="setPaperSize" onchange="updateSettingsPreview()">
              <option value="58">58mm (Kecil/Standar)</option>
              <option value="80">80mm (Lebar)</option>
            </select>
          </div>
          <div class="form-group" style="margin-bottom: 0;">
            <label><i class="fas fa-tag"></i> Markup Default (Rp)</label>
            <input type="number" id="setGlobalMarkup" placeholder="0" oninput="updateSettingsPreview()"
              style="font-weight: 800; color: #059669;" />
          </div>
        </div>

        <div style="display: flex; gap: 8px; margin-top: 14px;">
          <button type="button" class="btn btn-outline" style="flex: 1;"
            onclick="closeModal('modalPrinterSettings')">Batal</button>
          <button type="button" class="btn btn-success" style="flex: 1;"
            onclick="simpanPengaturanPrinter()"><i class="fas fa-floppy-disk"></i> Simpan Pengaturan</button>
        </div>
      </div>
    </div>

    <div class="modal" id="modalPrintPreview" style="z-index: 10029;">
      <div class="modal-content" style="max-width: 440px; max-height: 92vh; overflow-y: auto;">
        <div
          style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1.5px solid #bfdbfe; padding-bottom: 10px; margin-bottom: 12px;">
          <h3 style="font-size: 15px; margin: 0; color: #002dbb; display: flex; align-items: center; gap: 8px;">
            <i class="fas fa-print" style="color: #002dbb;"></i> Cetak Struk Pembelian
          </h3>
          <button type="button" onclick="closeModal('modalPrintPreview')" class="btn btn-outline"
            style="padding: 3px 8px; font-size: 11px;">✕</button>
        </div>

        <div class="form-group"
          style="background: #eff6ff; border: 1.5px solid #bfdbfe; border-radius: 12px; padding: 10px 12px; margin-bottom: 12px;">
          <label
            style="font-size: 10.5px; font-weight: 800; color: #002dbb; margin-bottom: 4px; display: flex; align-items: center; justify-content: space-between;">
            <span><i class="fas fa-tag" style="color: #059669;"></i> Tambah Harga (Rp)</span>
            <small style="color: #64748b; font-weight: 700;">Naikkan harga struk</small>
          </label>
          <input type="number" id="inputLiveMarkup" placeholder="0" oninput="updateLivePreview(this.value)"
            style="font-weight: 900; font-size: 13.5px; color: #059669; font-family: monospace; background: #ffffff;" />
        </div>

        <div id="printReceiptContainer"
          style="background: #ffffff; border: 1.5px solid #cbd5e1; border-radius: 14px; padding: 16px 14px; margin-bottom: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.06); max-height: 330px; overflow-y: auto;">
          <pre id="printPreviewArea"
            style="margin: 0; font-family: 'Courier New', Courier, monospace; font-size: 11.5px; font-weight: bold; line-height: 1.35; color: #000000; white-space: pre; text-align: left; background: transparent; border: none; padding: 0;">Memuat Preview Struk...</pre>
        </div>

        <div style="display: flex; gap: 8px; margin-top: 6px;">
          <button type="button" id="btnPrintNow" class="btn btn-success"
            style="flex: 1.2; padding: 11px 12px; font-size: 12px; font-weight: 800; border-radius: 10px; box-shadow: 0 4px 14px rgba(16, 185, 129, 0.35);"
            onclick="printStruk()">
            <i class="fas fa-print"></i> Print (RawBT)
          </button>
          <button type="button" id="btnShareWA" class="btn btn-outline"
            style="flex: 1; padding: 11px 12px; font-size: 12px; font-weight: 800; border-radius: 10px; background: #ecfdf5 !important; border-color: #34d399 !important; color: #065f46 !important;"
            onclick="shareStrukToWA()">
            <i class="fab fa-whatsapp" style="color: #25D366; font-size: 15px;"></i> Bagikan Gambar
          </button>
        </div>
        <button type="button" class="btn btn-outline btn-block" style="margin-top: 8px; padding: 8px; font-size: 11px;"
          onclick="closeModal('modalPrintPreview')">Tutup</button>
      </div>
    </div>

    <div class="modal" id="modalBebasNominalEwallet"
      style="position: fixed; inset: 0; background: rgba(15, 23, 42, 0.78); backdrop-filter: none !important; -webkit-backdrop-filter: none !important; z-index: 10035; display: none; align-items: center; justify-content: center; padding: 15px; overflow-y: auto;">
      <div class="modal-content"
        style="background: #ffffff; border: 2px solid #38bdf8; border-radius: 20px; width: 100%; max-width: 480px; padding: 22px; box-shadow: 0 25px 60px rgba(0, 0, 0, 0.4); color: #0f172a; position: relative; max-height: 90vh; overflow-y: auto;">
        <div
          style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1.5px solid #d2e0f5; padding-bottom: 12px; margin-bottom: 15px;">
          <div>
            <h3
              style="font-size: 15px; margin: 0; color: #002dbb; font-weight: 900; display: flex; align-items: center; gap: 8px;">
              <i class="fas fa-paper-plane" style="color: #059669;"></i> Transfer Bebas Nominal E-Wallet
            </h3>
            <small style="font-size: 10px; color: var(--text-sub); font-weight: 700;">Sistem Transaksi Otomatis API 4 (Saldo
              PPOB)</small>
          </div>
          <button type="button" onclick="closeModal('modalBebasNominalEwallet')" class="btn btn-outline"
            style="padding: 3px 8px; font-size: 12px; border-radius: 8px; color: #dc2626 !important; border-color: #fca5a5 !important; background: #fef2f2 !important; cursor: pointer;">✕</button>
        </div>

        <div style="margin-bottom: 14px;">
          <label
            style="font-size: 10px; font-weight: 800; color: #002dbb; margin-bottom: 6px; display: block;"><i class="fas fa-wallet"></i>
            PILIH E-WALLET TUJUAN:</label>
          <div id="bebasProvGrid" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 6px;">
            <button type="button" class="bebas-prov-btn btn btn-sm" data-code="BBSDN"
              onclick="selectBebasProvider('BBSDN', 'DANA', 'CEKD')"
              style="padding: 7px 4px; font-size: 10px; font-weight: 800; border-radius: 8px; border: 1.5px solid #38bdf8; background: linear-gradient(135deg, #002dbb, #0050d8); color: #fff;">DANA</button>
            <button type="button" class="bebas-prov-btn btn btn-sm btn-outline" data-code="BBSGOP"
              onclick="selectBebasProvider('BBSGOP', 'GoPay', 'CEKGJK')"
              style="padding: 7px 4px; font-size: 10px; font-weight: 800; border-radius: 8px; border: 1.5px solid #bcd0ee; color: #002dbb; background: #fff;">GoPay</button>
            <button type="button" class="bebas-prov-btn btn btn-sm btn-outline" data-code="BBSGRB"
              onclick="selectBebasProvider('BBSGRB', 'Grab', 'CEKGRB')"
              style="padding: 7px 4px; font-size: 10px; font-weight: 800; border-radius: 8px; border: 1.5px solid #bcd0ee; color: #002dbb; background: #fff;">Grab</button>
            <button type="button" class="bebas-prov-btn btn btn-sm btn-outline" data-code="BBSSH"
              onclick="selectBebasProvider('BBSSH', 'ShopeePay', 'CEKSHP')"
              style="padding: 7px 4px; font-size: 10px; font-weight: 800; border-radius: 8px; border: 1.5px solid #bcd0ee; color: #002dbb; background: #fff;">ShopeePay</button>
            <button type="button" class="bebas-prov-btn btn btn-sm btn-outline" data-code="BBSOVO"
              onclick="selectBebasProvider('BBSOVO', 'OVO', 'CEKOVO')"
              style="padding: 7px 4px; font-size: 10px; font-weight: 800; border-radius: 8px; border: 1.5px solid #bcd0ee; color: #002dbb; background: #fff;">OVO</button>
            <button type="button" class="bebas-prov-btn btn btn-sm btn-outline" data-code="BBSTC"
              onclick="selectBebasProvider('BBSTC', 'LinkAja', 'CEKLINK')"
              style="padding: 7px 4px; font-size: 10px; font-weight: 800; border-radius: 8px; border: 1.5px solid #bcd0ee; color: #002dbb; background: #fff;">LinkAja</button>
            <button type="button" class="bebas-prov-btn btn btn-sm btn-outline" data-code="BBSAKU"
              onclick="selectBebasProvider('BBSAKU', 'iSaku', 'CEKISAKU')"
              style="padding: 7px 4px; font-size: 10px; font-weight: 800; border-radius: 8px; border: 1.5px solid #bcd0ee; color: #002dbb; background: #fff;">iSaku</button>
            <button type="button" class="bebas-prov-btn btn btn-sm btn-outline" data-code="BBSASTR"
              onclick="selectBebasProvider('BBSASTR', 'AstraPay', '')"
              style="padding: 7px 4px; font-size: 10px; font-weight: 800; border-radius: 8px; border: 1.5px solid #bcd0ee; color: #002dbb; background: #fff;">AstraPay</button>
          </div>
        </div>

        <div class="form-group" style="margin-bottom: 12px;">
          <label id="bebasTargetLabel"
            style="font-size: 10px; font-weight: 800; color: #002dbb; margin-bottom: 4px; display: block;"><i class="fas fa-mobile-screen-button"></i>
            Nomor Akun DANA (Kode: <code class="mono" style="color:#002dbb;">BBSDN</code>)</label>
          <input type="tel" inputmode="numeric" pattern="[0-9]*" id="bebasTargetInput" placeholder="Contoh: 081234567890"
            onkeydown="if(!event.ctrlKey&&!event.metaKey&&event.key.length===1&&!/[0-9]/.test(event.key)){event.preventDefault();}"
            oninput="this.value=this.value.replace(/\D/g,''); onBebasTargetInput(this.value);"
            style="font-weight: 800; font-family: monospace; font-size: 12.5px; border: 1.5px solid #93c5fd; border-radius: 9px; padding: 8px 12px; width: 100%;" />
          <div id="bebasCekNamaStatus" style="margin-top: 6px;">
            <span style="color:#64748b; font-size:10px;"><i class="fas fa-info-circle"></i> Masukkan nomor HP/akun E-Wallet. Cek nama otomatis aktif.</span>
          </div>
        </div>

        <div class="form-group" style="margin-bottom: 12px;">
          <label
            style="font-size: 10px; font-weight: 800; color: #002dbb; margin-bottom: 4px; display: block;"><i class="fas fa-money-bill-wave"></i>
            Nominal Transfer Bebas (Rp / Qty)</label>
          <input type="number" id="bebasNominalInput" min="1000" step="1000" placeholder="Ketik nominal transfer bebas..."
            oninput="updateBebasKalkulasi(this.value)"
            style="font-weight: 900; font-size: 14px; color: #059669; font-family: monospace; border: 1.5px solid #93c5fd; border-radius: 9px; padding: 8px 12px; width: 100%;" />
          <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 5px; margin-top: 6px;">
            <button type="button" class="btn btn-outline btn-sm" onclick="setBebasNominalQuick(10000)"
              style="padding: 5px 2px; font-size: 10px; font-weight: 800;">Rp 10.000</button>
            <button type="button" class="btn btn-outline btn-sm" onclick="setBebasNominalQuick(20000)"
              style="padding: 5px 2px; font-size: 10px; font-weight: 800;">Rp 20.000</button>
            <button type="button" class="btn btn-outline btn-sm" onclick="setBebasNominalQuick(50000)"
              style="padding: 5px 2px; font-size: 10px; font-weight: 800;">Rp 50.000</button>
            <button type="button" class="btn btn-outline btn-sm" onclick="setBebasNominalQuick(100000)"
              style="padding: 5px 2px; font-size: 10px; font-weight: 800;">Rp 100.000</button>
            <button type="button" class="btn btn-outline btn-sm" onclick="setBebasNominalQuick(200000)"
              style="padding: 5px 2px; font-size: 10px; font-weight: 800;">Rp 200.000</button>
            <button type="button" class="btn btn-outline btn-sm" onclick="setBebasNominalQuick(500000)"
              style="padding: 5px 2px; font-size: 10px; font-weight: 800;">Rp 500.000</button>
          </div>
        </div>

        <div id="bebasKalkulasiBox"
          style="background: #eff6ff; border: 1.5px dashed #bfdbfe; border-radius: 12px; padding: 10px 14px; margin-bottom: 12px;">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 3px; font-size: 11px;">
            <span style="color: var(--text-sub); font-weight: 600;">Nominal Transfer (Qty):</span>
            <b id="txtBebasQty" class="mono" style="color: #0f172a;">Rp 0</b>
          </div>
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 3px; font-size: 11px;">
            <span style="color: var(--text-sub); font-weight: 600;">Harga Produk Beli:</span>
            <b id="txtBebasBiaya" class="mono" style="color: #d97706;">+Rp 0</b>
          </div>
          <div
            style="display: flex; justify-content: space-between; align-items: center; padding-top: 5px; border-top: 1px solid #bfdbfe; margin-top: 4px; font-size: 11.5px;">
            <span style="color: #002dbb; font-weight: 800;">Total Potong Saldo:</span>
            <b id="txtBebasTotalBayar" class="mono" style="color: #002dbb; font-size: 13.5px; font-weight: 900;">Rp 0</b>
          </div>
        </div>

        <div
          style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 9px 12px; font-size: 11px; margin-bottom: 14px; display: flex; justify-content: space-between; align-items: center;">
          <span style="color: var(--text-sub); font-weight: 600;">Saldo PPOB (API 4):</span>
          <b id="bebasModalSaldoTxt" style="color: #002dbb; font-family: monospace; font-size: 12.5px;">Rp 0</b>
        </div>

        <div style="display: flex; gap: 8px;">
          <button type="button" class="btn btn-outline" style="flex: 1; padding: 10px;"
            onclick="closeModal('modalBebasNominalEwallet')">Batal</button>
          <button type="button" class="btn btn-success" style="flex: 1.4; padding: 10px; font-weight: 800;"
            id="btnSubmitBebasNominal" onclick="executeBebasNominalOrder()"><i class="fas fa-paper-plane"></i> Kirim Saldo
            Sekarang (API 4)</button>
        </div>
      </div>
    </div>

    <div class="modal" id="modalAktivasiAkun"
      style="z-index: 10027; overflow-y: auto; padding: 16px 10px; align-items: flex-start;">
      <div class="modal-content" style="max-width: 580px; margin: auto; max-height: 90vh; overflow-y: auto; position: relative;">
        <div
          style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1.5px solid #bfdbfe; padding-bottom: 10px; margin-bottom: 14px;">
          <h3 style="font-size: 15px; margin: 0; color: #002dbb; display: flex; align-items: center; gap: 8px;">
            <i class="fas fa-shield-halved" style="color: #002dbb;"></i> Pilih Tipe Aktivasi Akun
          </h3>
          <button onclick="closeModal('modalAktivasiAkun')" class="btn btn-outline"
            style="padding: 3px 8px; font-size: 11px;">✕</button>
        </div>

        <div
          style="background: #eff6ff; border: 1.5px solid #bfdbfe; border-radius: 14px; padding: 16px; font-size: 11px; color: #0f172a; line-height: 1.65; margin-bottom: 16px;">
          Untuk menggunakan layanan H2H kami, silakan lakukan aktivasi akun. Terdapat dua pilihan kemitraan dengan benefit dan
          harga dasar (modal) yang berbeda. Silakan pelajari perbandingan di bawah ini.
        </div>

        <div class="table-wrap" style="margin-bottom: 16px; border-radius: 12px;">
          <table style="font-size: 10.5px; width: 100%; border-collapse: collapse;">
            <thead>
              <tr>
                <th style="padding: 8px; background: #f8fafc; border-bottom: 1.5px solid #e2e8f0; font-weight: 800;">Fitur &
                  Layanan</th>
                <th
                  style="padding: 8px; background: #e0f2fe; color: #002dbb; text-align: center; border-bottom: 1.5px solid #bfdbfe;">
                  Reseller (Gratis)</th>
                <th
                  style="padding: 8px; background: #fef3c7; color: #b45309; text-align: center; border-bottom: 1.5px solid #fde68a;">
                  Seller (VIP)</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="padding: 8px; border-bottom: 1px solid #e2e8f0;">Biaya Pendaftaran / Aktivasi</td>
                <td style="text-align: center; padding: 8px; border-bottom: 1px solid #e2e8f0; font-weight: 800; color: #059669;">
                  Gratis (Rp 0)</td>
                <td style="text-align: center; padding: 8px; border-bottom: 1px solid #e2e8f0; font-weight: 800; color: #b45309;">
                  Rp 280.000 (1 Paket)</td>
              </tr>
              <tr>
                <td style="padding: 8px; border-bottom: 1px solid #e2e8f0;">Tingkat Harga Modal Produk</td>
                <td style="text-align: center; padding: 8px; border-bottom: 1px solid #e2e8f0; color: #64748b;">Harga Reguler
                  Reseller</td>
                <td style="text-align: center; padding: 8px; border-bottom: 1px solid #e2e8f0;">
                  <span class="badge badge-success" style="font-size: 8.5px; padding: 2px 6px;">Harga Modal Termurah (VIP)</span>
                </td>
              </tr>
              <tr>
                <td style="padding: 8px; border-bottom: 1px solid #e2e8f0;">Sistem Bot Telegram Downline</td>
                <td style="text-align: center; padding: 8px; border-bottom: 1px solid #e2e8f0; color: #d97706;">
                  <i class="fas fa-lock"></i> Terkunci (Mandiri Rp 180k)
                </td>
                <td style="text-align: center; padding: 8px; border-bottom: 1px solid #e2e8f0; color: #059669; font-weight: 800;">
                  <i class="fas fa-check-circle"></i> Langsung Aktif (Include)
                </td>
              </tr>
              <tr>
                <td style="padding: 8px; border-bottom: 1px solid #e2e8f0;">Penerbitan API Key Resmi</td>
                <td style="text-align: center; padding: 8px; border-bottom: 1px solid #e2e8f0; color: #059669; font-weight: 800;">
                  <i class="fas fa-check"></i> Aktif
                </td>
                <td style="text-align: center; padding: 8px; border-bottom: 1px solid #e2e8f0; color: #059669; font-weight: 800;">
                  <i class="fas fa-check"></i> Aktif
                </td>
              </tr>
              <tr>
                <td style="padding: 8px; border-bottom: 1px solid #e2e8f0;">Dukungan Pengaduan CS (24 Jam)</td>
                <td style="text-align: center; padding: 8px; border-bottom: 1px solid #e2e8f0; color: #64748b;">Reguler</td>
                <td style="text-align: center; padding: 8px; border-bottom: 1px solid #e2e8f0; color: #059669; font-weight: 800;">
                  <i class="fas fa-check"></i> Fast Response VIP
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div
          style="font-size: 11.5px; font-weight: 800; color: #002dbb; margin-bottom: 8px; display: flex; align-items: center; gap: 6px;">
          <i class="fas fa-tags" style="color: #059669;"></i> Perbandingan Harga Beli XL Akrab Fresh (Seller vs Reseller):
        </div>
        <div class="table-wrap" style="margin-bottom: 16px; border-radius: 12px; max-height: 240px; overflow-y: auto;">
          <table class="act-tbl">
            <thead style="position: sticky; top: 0; z-index: 2;">
              <tr>
                <th style="background: #f8fafc; border-bottom: 1.5px solid #e2e8f0;">Paket Akrab Fresh</th>
                <th style="background: #fef3c7; color: #b45309; text-align: right; border-bottom: 1.5px solid #fde68a;">Harga
                  Seller (VIP)</th>
                <th style="background: #e0f2fe; color: #002dbb; text-align: right; border-bottom: 1.5px solid #bfdbfe;">Harga
                  Reseller (+2.000)</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><b>XLA14</b> - SuperMini</td>
                <td class="act-s">Rp 45.000</td>
                <td class="act-r">Rp 47.000</td>
              </tr>
              <tr>
                <td><b>XLA20</b> - SuperMini V2</td>
                <td class="act-s">Rp 48.000</td>
                <td class="act-r">Rp 50.000</td>
              </tr>
              <tr>
                <td><b>XLA26</b> - ExtraMini</td>
                <td class="act-s">Rp 51.000</td>
                <td class="act-r">Rp 53.000</td>
              </tr>
              <tr>
                <td><b>XLA32</b> - Mini</td>
                <td class="act-s">Rp 55.000</td>
                <td class="act-r">Rp 57.000</td>
              </tr>
              <tr>
                <td><b>XLA39</b> - Big</td>
                <td class="act-s">Rp 60.000</td>
                <td class="act-r">Rp 62.000</td>
              </tr>
              <tr>
                <td><b>XLA48</b> - Big V2</td>
                <td class="act-s">Rp 65.000</td>
                <td class="act-r">Rp 67.000</td>
              </tr>
              <tr>
                <td><b>XLA55</b> - Jumbo V2</td>
                <td class="act-s">Rp 70.000</td>
                <td class="act-r">Rp 72.000</td>
              </tr>
              <tr>
                <td><b>XLA64</b> - Jumbo V3</td>
                <td class="act-s">Rp 77.000</td>
                <td class="act-r">Rp 79.000</td>
              </tr>
              <tr>
                <td><b>XLA77</b> - Megabig V2</td>
                <td class="act-s">Rp 84.000</td>
                <td class="act-r">Rp 86.000</td>
              </tr>
              <tr>
                <td><b>XLA65</b> - JUMBO</td>
                <td class="act-s">Rp 84.900</td>
                <td class="act-r">Rp 86.900</td>
              </tr>
              <tr>
                <td><b>XLA89</b> - MegaBig</td>
                <td class="act-s">Rp 90.000</td>
                <td class="act-r">Rp 92.000</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div style="display: flex; gap: 10px; flex-direction: column;">
          <button type="button" class="btn btn-warning btn-block"
            style="padding: 12px; font-size: 13px; font-weight: 900; background: linear-gradient(135deg, #f59e0b, #d97706) !important; border: 1.5px solid #fbbf24 !important; color: #ffffff !important; box-shadow: 0 4px 14px rgba(245, 158, 11, 0.3);"
            onclick="closeModal('modalAktivasiAkun'); document.getElementById('modalAktivasiSellerBayar').style.display='flex';">
            <i class="fas fa-crown"></i> Aktivasi Akun SELLER VIP (Rp 280.000 - Include Bot Tele)
          </button>
          <button type="button" class="btn btn-outline btn-block"
            style="padding: 12px; font-size: 12px; font-weight: 800; border-color: #38bdf8 !important; color: #0284c7 !important; display: flex; align-items: center; justify-content: center; gap: 8px; background: #f0f9ff !important;"
            onclick="executeAktivasiReseller()">
            <i class="fas fa-user-check" style="font-size: 15px; color: #0284c7;"></i> Aktivasi Akun RESELLER (Gratis Rp 0)
          </button>
        </div>
        <button type="button" class="btn btn-outline btn-block" style="margin-top: 14px; padding: 10px; font-size: 11.5px;"
          onclick="closeModal('modalAktivasiAkun')">Nanti Saja</button>
      </div>
    </div>

    <div class="modal" id="modalAktivasiSellerBayar"
      style="z-index: 10028; overflow-y: auto; padding: 16px 10px; align-items: flex-start;">
      <div class="modal-content" style="max-width: 440px; margin: auto; max-height: 90vh; overflow-y: auto; position: relative;">
        <div
          style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1.5px solid #bfdbfe; padding-bottom: 10px; margin-bottom: 14px;">
          <h3 style="font-size: 15px; margin: 0; color: #b45309; display: flex; align-items: center; gap: 8px;">
            <i class="fas fa-crown" style="color: #f59e0b;"></i> Pembayaran Aktivasi Seller VIP
          </h3>
          <button onclick="closeModal('modalAktivasiSellerBayar')" class="btn btn-outline"
            style="padding: 3px 8px; font-size: 11px;">✕</button>
        </div>

        <div
          style="background: #ffffff; border: 1.5px dashed #fcd34d; border-radius: 12px; padding: 14px; text-align: center; margin-bottom: 16px; box-shadow: 0 4px 10px rgba(245, 158, 11, 0.05);">
          <small style="font-size: 10px; font-weight: 800; color: #b45309; text-transform: uppercase;">Biaya Paket Seller VIP
            (All-In-One)</small>
          <div style="font-size: 26px; font-weight: 900; color: #d97706; font-family: monospace; margin: 6px 0;">Rp 280.000</div>
          <small style="font-size: 10px; color: #78350f;">Termasuk API Key resmi, Bot Telegram downline pribadi, & harga modal
            termurah VIP</small>
        </div>

        <div style="display: flex; flex-direction: column; gap: 10px; margin-bottom: 16px;">
          <div
            style="background: #ffffff; border: 1.5px solid #d2e0f5; border-radius: 12px; padding: 12px; cursor: pointer; transition: all 0.2s;"
            onclick="executePayAktivasiViaWallet()">
            <div style="display: flex; justify-content: space-between; align-items: center;">
              <div style="display: flex; align-items: center; gap: 10px;">
                <div
                  style="width: 38px; height: 38px; border-radius: 10px; background: #ecfdf5; color: #059669; display: flex; align-items: center; justify-content: center; font-size: 18px;">
                  <i class="fas fa-wallet"></i>
                </div>
                <div>
                  <b style="font-size: 12px; color: #0f172a; display: block; margin-bottom: 2px;">Bayar Pakai Saldo Dompet</b>
                  <small style="font-size: 10px; color: #64748b; font-weight: 600;" id="txtSaldoAktivasiAvailable">Memeriksa
                    saldo...</small>
                </div>
              </div>
              <button type="button" class="btn btn-sm btn-success"
                style="padding: 7px 14px; font-weight: 800;"><i class="fas fa-bolt"></i> Bayar</button>
            </div>
          </div>
          <div
            style="background: #ffffff; border: 1.5px solid #d2e0f5; border-radius: 12px; padding: 12px; cursor: pointer; transition: all 0.2s;"
            onclick="executePayAktivasiViaTransfer()">
            <div style="display: flex; justify-content: space-between; align-items: center;">
              <div style="display: flex; align-items: center; gap: 10px;">
                <div
                  style="width: 38px; height: 38px; border-radius: 10px; background: #eff6ff; color: #002dbb; display: flex; align-items: center; justify-content: center; font-size: 18px;">
                  <i class="fas fa-qrcode"></i>
                </div>
                <div>
                  <b style="font-size: 12px; color: #0f172a; display: block; margin-bottom: 2px;">Transfer / QRIS Dinamis</b>
                  <small style="font-size: 10px; color: #64748b; font-weight: 600;">Nominal unik Rp 280.xxx (Otomatis + Include
                    Bot Tele)</small>
                </div>
              </div>
              <button type="button" class="btn btn-sm btn-outline"
                style="padding: 7px 14px; font-weight: 800;"><i class="fas fa-arrow-right"></i> Pilih</button>
            </div>
          </div>
        </div>

        <button type="button" class="btn btn-outline btn-block" style="padding: 10px; font-size: 11.5px;"
          onclick="closeModal('modalAktivasiSellerBayar'); document.getElementById('modalAktivasiAkun').style.display='flex';">Kembali</button>
      </div>
    </div>
    <script>
    const DT17_ENC_SECRET = "dt17_sec_vault_2026_9948291048123";
    const _dt17KeyCache = new Map();
    
    function dt17GetActiveSessionToken() {
        if (typeof currentUser !== 'undefined' && currentUser && currentUser.session_token) {
            return currentUser.session_token;
        }
        return localStorage.getItem('dt17_user_session') || sessionStorage.getItem('dt17_user_session') || localStorage.getItem('dt17_session') || '';
    }
    
    async function dt17GetCryptoKey(sid = '') {
        const cacheId = sid ? String(sid) : '__master__';
        if (_dt17KeyCache.has(cacheId)) return _dt17KeyCache.get(cacheId);
        const enc = new TextEncoder();
        const secretMaterial = sid ? (DT17_ENC_SECRET + ":" + sid) : DT17_ENC_SECRET;
        const hashBuf = await crypto.subtle.digest("SHA-256", enc.encode(secretMaterial));
        const cryptoKey = await crypto.subtle.importKey("raw", hashBuf, { name: "AES-CBC" }, false, ["encrypt", "decrypt"]);
        _dt17KeyCache.set(cacheId, cryptoKey);
        return cryptoKey;
    }
    
    async function dt17EncryptPayload(plainStr, sid = '') {
        const key = await dt17GetCryptoKey(sid);
        const iv = crypto.getRandomValues(new Uint8Array(16));
        const enc = new TextEncoder();
        const encryptedBuf = await crypto.subtle.encrypt({ name: "AES-CBC", iv: iv }, key, enc.encode(plainStr));
        const b64Cipher = btoa(String.fromCharCode(...new Uint8Array(encryptedBuf)));
        const b64Iv = btoa(String.fromCharCode(...iv));
        const payload = { _sec: b64Cipher, _iv: b64Iv, _t: Date.now() };
        if (sid) payload._sid = sid;
        return payload;
    }
    
    async function dt17DecryptPayload(b64Cipher, b64Iv, sid = '') {
        let key = await dt17GetCryptoKey(sid);
        const cipherBytes = Uint8Array.from(atob(b64Cipher), c => c.charCodeAt(0));
        const ivBytes = Uint8Array.from(atob(b64Iv), c => c.charCodeAt(0));
        try {
            const decBuf = await crypto.subtle.decrypt({ name: "AES-CBC", iv: ivBytes }, key, cipherBytes);
            return new TextDecoder().decode(decBuf);
        } catch (err) {
            if (sid) {
                const masterKey = await dt17GetCryptoKey('');
                const decBuf = await crypto.subtle.decrypt({ name: "AES-CBC", iv: ivBytes }, masterKey, cipherBytes);
                return new TextDecoder().decode(decBuf);
            }
            throw err;
        }
    }
    
    const _origFetch = window.fetch;
    window.fetch = async function(input, init) {
        init = init || {};
        let url = typeof input === "string" ? input : (input && input.url ? input.url : "");
        const isInternalApi = url.includes("api.php") || url.includes("auth.php") || url.includes("topup_api.php") || url.includes("resetpass.php") || url.includes("googlelogin.php") || url.includes("chat_api.php") || url.includes("paymentsys.php") || url.includes("telebot_admin.php");
    
    
        let activeSid = dt17GetActiveSessionToken();
    
        if (isInternalApi) {
            init.headers = init.headers || {};
            if (init.headers instanceof Headers) {
                init.headers.set("X-Client-Secure", "1");
                if (activeSid) init.headers.set("X-Session-Token", activeSid);
            } else {
                init.headers["X-Client-Secure"] = "1";
                if (activeSid) init.headers["X-Session-Token"] = activeSid;
            }
    
            if (init.method === "POST" && init.body && typeof init.body === "string") {
                try {
                    let reqSid = activeSid;
                    if (init.body.includes('"action":"login"') || init.body.includes('"action":"register"') || init.body.includes('"action":"register_verification_request"') || init.body.includes('"action":"request_reset"')) {
                        reqSid = '';
                    }
                    const encryptedData = await dt17EncryptPayload(init.body, reqSid);
                    init.body = JSON.stringify(encryptedData);
                } catch(encErr) {}
            }
        }
    
        const response = await _origFetch.call(this, input, init);
    
    
        if (isInternalApi) {
            const clone = response.clone();
            try {
                const json = await clone.json();
                if (json && json._sec && json._iv) {
                    const respSid = json._sid || activeSid;
                    const decryptedStr = await dt17DecryptPayload(json._sec, json._iv, respSid);
                    return new Response(decryptedStr, {
                        status: response.status,
                        statusText: response.statusText,
                        headers: response.headers
                    });
                }
            } catch(e) {}
        }
        return response;
    };
    
    let autoRefreshTimer = null;
    
    function esc(s) {
      return String(s == null ? '' : s)
        .replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;').replace(/'/g, '&#39;');
    }
    function fmtRp(n) { return 'Rp ' + (parseInt(n || 0)).toLocaleString('id-ID'); }
    
    function toast(type, title, msg, ms) {
      const wrap = document.getElementById('toastWrap');
      if (!wrap) { if (window.alert) alert(title + (msg ? '\n' + msg : '')); return; }
      const icons = { success: 'fa-circle-check', error: 'fa-circle-xmark', warn: 'fa-triangle-exclamation', info: 'fa-circle-info' };
      const el = document.createElement('div');
      el.className = 'toast ' + (type || 'info');
      el.innerHTML = '<i class="fas ' + (icons[type] || icons.info) + '" style="margin-top:2px;"></i>' +
                     '<div style="flex:1;"><b>' + esc(title) + '</b>' + (msg ? '<small>' + esc(msg) + '</small>' : '') + '</div>';
      wrap.appendChild(el);
      setTimeout(() => { el.classList.add('out'); setTimeout(() => el.remove(), 300); }, ms || 4000);
    }
    
    function copyToClipboard(text, label) {
      const done = () => toast('success', 'Berhasil Disalin', (label || 'Teks') + ' disalin ke clipboard');
      const fallback = () => {
        const ta = document.createElement('textarea');
        ta.value = text; document.body.appendChild(ta); ta.select();
        try { document.execCommand('copy'); done(); } catch (e) { toast('error', 'Gagal Menyalin', 'Clipboard tidak tersedia'); }
        ta.remove();
      };
      if (navigator.clipboard && navigator.clipboard.writeText) navigator.clipboard.writeText(text).then(done).catch(fallback);
      else fallback();
    }
    
    function downloadFile(name, content, type) {
      const blob = new Blob([content], { type: type || 'text/plain;charset=utf-8' });
      const a = document.createElement('a');
      a.href = URL.createObjectURL(blob); a.download = name;
      document.body.appendChild(a); a.click();
      setTimeout(() => { URL.revokeObjectURL(a.href); a.remove(); }, 500);
      toast('success', 'Unduhan Dimulai', name);
    }
    
    function toCSV(rows, cols) {
      const q = v => '"' + String(v == null ? '' : v).replace(/"/g, '""') + '"';
      return [cols.map(c => q(c[1])).join(',')]
        .concat(rows.map(r => cols.map(c => q(typeof c[0] === 'function' ? c[0](r) : r[c[0]])).join(',')))
        .join('\r\n');
    }
    
    function highlight(text, q) {
      const s = String(text == null ? '' : text);
      if (!q) return esc(s);
      const safe = esc(s);
      const needle = esc(String(q)).replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
      try { return safe.replace(new RegExp(needle, 'gi'), m => '<mark class="hl">' + m + '</mark>'); }
      catch (e) { return safe; }
    }
    
    function statusBadge(st) {
      const s = String(st || '').toUpperCase();
      if (s === 'BERHASIL') return '<span class="badge badge-success">BERHASIL</span>';
      if (s === 'GAGAL')    return '<span class="badge badge-fail">GAGAL</span>';
      if (s === 'PENDING')  return '<span class="badge badge-pending">PENDING</span>';
      if (s === 'PROSES')   return '<span class="badge badge-pending">PROSES</span>';
      return '<span class="badge badge-muted">' + esc(s || '-') + '</span>';
    }
    let topupCountdownInterval = null;
    let indoPayPollingTimer = null;
    let cachedPaymentMethods = null;
    let cachedTopupConfig = null;
    
    function calculateAdminFeeClient(amount) {
        amount = parseInt(amount || 0);
        if (!cachedTopupConfig || !Array.isArray(cachedTopupConfig.admin_fee_tiers)) return 0;
        for (const tier of cachedTopupConfig.admin_fee_tiers) {
            const min = parseInt(tier.min || 0);
            const max = parseInt(tier.max || 0);
            const fee = parseInt(tier.fee || 0);
            if (amount >= min && (max <= 0 || amount <= max)) {
                return Math.max(0, fee);
            }
        }
        return 0;
    }
    
    function selectQuickNominal(val) {
        const inp = document.getElementById('topupAmount');
        if (inp) {
            inp.value = val;
            handleTopupAmountChange();
        }
    }
    
    function handleTopupAmountChange() {
        const val = parseInt(document.getElementById('topupAmount').value || 0);
        const box = document.getElementById('topupFeeBreakdownBox');
        if (!box) return;
        if (val <= 0) {
            box.style.display = 'none';
            return;
        }
        const fee = calculateAdminFeeClient(val);
        const total = val + fee;
        box.style.display = 'block';
        document.getElementById('txtBreakdownNominal').innerText = 'Rp ' + val.toLocaleString('id-ID');
        document.getElementById('txtBreakdownAdminFee').innerText = fee > 0 ? ('+Rp ' + fee.toLocaleString('id-ID')) : 'Gratis';
        document.getElementById('txtBreakdownTotalBayar').innerText = 'Rp ' + total.toLocaleString('id-ID');
        document.getElementById('txtBreakdownSaldoMasuk').innerText = 'Rp ' + val.toLocaleString('id-ID') + ' (+ kode unik)';
    }
    
    async function loadPaymentMethodsConfig() {
        try {
            const res = await fetch('api/sysdatabase/topup_api.php?action=get_payment_methods&_t=' + Date.now());
            const data = await res.json();
            if (data.status) {
                if (data.data) cachedPaymentMethods = data.data;
                if (data.config) cachedTopupConfig = data.config;
                renderTopupMethodsCards();
                applyTopupGeneralConfigUI();
            }
        } catch(e) {}
    }
    
    function applyTopupGeneralConfigUI() {
        if (!cachedTopupConfig) return;
        const minVal = parseInt(cachedTopupConfig.min_topup || 20000);
        const minFmt = 'Min. Rp ' + minVal.toLocaleString('id-ID');
        const hint1 = document.getElementById('quickMinTopupHint');
        const hint2 = document.getElementById('topupMinNotice');
        const inp = document.getElementById('topupAmount');
        if (hint1) hint1.innerText = minFmt;
        if (hint2) hint2.innerText = 'Min: Rp ' + minVal.toLocaleString('id-ID');
        if (inp) {
            inp.placeholder = 'Minimal Rp ' + minVal.toLocaleString('id-ID');
            inp.min = minVal;
        }
        const infoBox = document.getElementById('topupInfoMessageBox');
        if (infoBox) {
            const msg = cachedTopupConfig.info_message || '';
            if (msg.trim()) {
                infoBox.innerText = msg;
                infoBox.style.display = 'block';
            } else {
                infoBox.style.display = 'none';
            }
        }
    }
    
    function renderTopupMethodsCards() {
        const container = document.getElementById('topupMethodCardsContainer');
        if (!container || !cachedPaymentMethods) return;
        const curSelected = document.getElementById('topupMethod').value || 'qris';
        let html = '';
        for (const [key, m] of Object.entries(cachedPaymentMethods)) {
            const isEnabled = !!m.enabled;
            const isSelected = (key === curSelected);
            let iconHtml = '<i class="fas fa-wallet" style="font-size:16px; color:#059669;"></i>';
            if (key === 'qris') iconHtml = '<i class="fas fa-qrcode" style="font-size:16px; color:#002dbb;"></i>';
            else if (key === 'dana') iconHtml = '<i class="fas fa-mobile-screen" style="font-size:16px; color:#0284c7;"></i>';
            else if (key === 'seabank') iconHtml = '<i class="fas fa-building-columns" style="font-size:16px; color:#d97706;"></i>';
    
            const activeStyle = isSelected
                ? 'border: 2px solid #002dbb; background: #eff6ff; box-shadow: 0 4px 12px rgba(0,45,187,0.15);'
                : 'border: 1.5px solid #d2e0f5; background: #ffffff;';
            const disabledStyle = isEnabled ? '' : 'opacity: 0.45; filter: grayscale(1); cursor: not-allowed;';
    
            html += `<div onclick="selectTopupMethodCard('${key}', ${isEnabled})" style="padding:10px 8px; border-radius:12px; text-align:center; cursor:pointer; transition:all 0.2s ease; ${activeStyle} ${disabledStyle}">
                <div style="margin-bottom:4px;">${iconHtml}</div>
                <div style="font-size:11px; font-weight:800; color:#0f172a;">${m.title || key.toUpperCase()}</div>
                <small style="font-size:9px; color:${isEnabled ? 'var(--text-sub)' : '#dc2626'}; font-weight:700;">${isEnabled ? (key === 'qris' ? 'Otomatis' : 'Transfer') : 'Perbaikan'}</small>
            </div>`;
        }
        container.innerHTML = html;
        handleMethodSelectionChange();
    }
    
    function selectTopupMethodCard(key, isEnabled) {
        if (!isEnabled) {
            toast('warn', 'Metode Nonaktif', 'Metode pembayaran ini sedang dalam perbaikan.');
            return;
        }
        document.getElementById('topupMethod').value = key;
        renderTopupMethodsCards();
    }
    
    function handleMethodSelectionChange() {
        const methodVal = document.getElementById('topupMethod').value;
        const btn = document.getElementById('btnReqTopup');
        const alertBox = document.getElementById('methodDisabledAlert');
        if (!cachedPaymentMethods) return;
        const cur = cachedPaymentMethods[methodVal];
        const isOff = !cur || !cur.enabled;
        if (alertBox) alertBox.style.display = isOff ? 'flex' : 'none';
        if (btn) btn.disabled = isOff;
    }
    
    function startTopupTimer(expiredTime) {
        if (topupCountdownInterval) clearInterval(topupCountdownInterval);
        const timerEl = document.getElementById('topupCountdownTimer');
        topupCountdownInterval = setInterval(() => {
            const now = Date.now();
            const diff = expiredTime - now;
            if (diff <= 0) {
                clearInterval(topupCountdownInterval);
                stopIndoPayPolling();
                if (timerEl) timerEl.innerText = '00:00';
                const statusEl = document.getElementById('topupStatusText');
                if (statusEl) { statusEl.innerText = 'Waktu Pembayaran Kedaluwarsa'; statusEl.style.color = '#ef4444'; }
            } else {
                const minutes = Math.floor(diff / 60000);
                const seconds = Math.floor((diff % 60000) / 1000);
                if (timerEl) timerEl.innerText = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            }
        }, 1000);
    }
    
    function startIndoPayPolling(topupId) {
        stopIndoPayPolling();
        if (typeof stopDedicatedPolling === 'function') stopDedicatedPolling();
        if (!topupId) return;
        const statusEl = document.getElementById('topupStatusText');
        indoPayPollingTimer = setInterval(async () => {
            try {
                const res = await fetch('api/sysdatabase/topup_api.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ action: 'check_indopay_status', topup_id: topupId })
                });
                const data = await res.json();
                if (data && data.paid === true) {
                    stopIndoPayPolling();
                    if (topupCountdownInterval) clearInterval(topupCountdownInterval);
                    if (statusEl) { statusEl.innerText = '✅ Pembayaran Berhasil Terverifikasi!'; statusEl.style.color = '#10b981'; }
                    localStorage.removeItem('dt17_pending_topup_' + currentUser.username);
                    if (data.type === 'UPGRADE_BOT') {
                        currentUser.telebot_unlocked = true;
                        toast('success', 'Bot Telegram Aktif', data.message || 'Sistem Bot Telegram berhasil diaktifkan!');
                        checkAndRenderBotTeleAccess();
                    } else if (data.type === 'AKTIVASI_AKUN') {
                        currentUser.verified = true;
                        currentUser.status = 'active';
                        if (data.new_api_key) currentUser.api_key = data.new_api_key;
                        toast('success', 'Akun Seller Aktif', data.message || 'Akun Seller & API Key berhasil diaktifkan!');
                        updateApiKeyDisplay();
                    } else {
                        toast('success', 'Topup Berhasil', 'Saldo akun Anda otomatis bertambah!');
                    }
                    if (typeof loadUserHistory === 'function') loadUserHistory();
                    setTimeout(() => { closeModal('modalTopup'); }, 2000);
                } else if (data && data.is_failed === true) {
                    stopIndoPayPolling();
                    if (statusEl) { statusEl.innerText = 'Transaksi topup dibatalkan'; statusEl.style.color = '#ef4444'; }
                } else if (data && data.auto_claim === false) {
                    if (statusEl) { statusEl.innerText = 'Menunggu verifikasi manual Admin...'; statusEl.style.color = '#0284c7'; }
                }
            } catch(err) {}
        }, 4000);
    }
    
    function stopIndoPayPolling() {
        if (indoPayPollingTimer) { clearInterval(indoPayPollingTimer); indoPayPollingTimer = null; }
    }
    
    function renderTopupWalletsUI() {
        const allowed = (typeof getUserAllowedApisClient === 'function') ? getUserAllowedApisClient() : ['api1'];
        const bAkrab = document.getElementById('btnWallTargetAkrab');
        const bApi2  = document.getElementById('btnWallTargetApi2');
        const bPpob  = document.getElementById('btnWallTargetPpob');
        const grid   = document.getElementById('topupTargetWalletsGrid');
        let vis = 0;
        let curVal = document.getElementById('topupTargetWallet') ? document.getElementById('topupTargetWallet').value : 'akrab';
        let firstAllowed = 'akrab';
    
        if (bAkrab) {
            const ok = allowed.includes('api1');
            bAkrab.style.display = ok ? 'inline-flex' : 'none';
            if (ok) {
                vis++;
                firstAllowed = 'akrab';
                if (typeof isDedicatedUser === 'function' && isDedicatedUser()) {
                    bAkrab.innerHTML = '<i class="fas fa-server"></i> API 1 (Dedicated)';
                } else {
                    bAkrab.innerHTML = 'API 1 (Akrab)';
                }
            }
        }
        if (bApi2) {
            const ok = allowed.includes('api2');
            bApi2.style.display = ok ? 'inline-flex' : 'none';
            if (ok) {
                vis++;
                if (vis === 1) firstAllowed = 'api2';
            }
        }
        if (bPpob) {
            const ok = allowed.includes('api4');
            bPpob.style.display = ok ? 'inline-flex' : 'none';
            if (ok) {
                vis++;
                if (vis === 1) firstAllowed = 'ppob';
            }
        }
        if (grid) {
            grid.style.gridTemplateColumns = 'repeat(' + Math.max(1, vis) + ', 1fr)';
        }
        const wrapChoice = document.getElementById('wrapTopupTargetWalletChoice');
        if (wrapChoice) {
            wrapChoice.style.display = (vis > 1 || (typeof isDedicatedUser === 'function' && isDedicatedUser())) ? 'block' : 'none';
        }
        const targetToSelect = (curVal && ((curVal === 'akrab' && allowed.includes('api1')) || (curVal === 'api2' && allowed.includes('api2')) || (curVal === 'ppob' && allowed.includes('api4')))) ? curVal : firstAllowed;
        selectTopupWallet(targetToSelect);
    }
    
    async function openTopupModal() {
        const titleSpan = document.getElementById('modalTopupTitleText');
        if (titleSpan) titleSpan.innerHTML = '<i class="fas fa-bolt" style="color: #059669;"></i> Topup Saldo Otomatis';
        const specialBanner = document.getElementById('wrapSpecialPaymentBanner');
        if (specialBanner) specialBanner.style.display = 'none';
        document.getElementById('modalTopup').style.display = 'flex';
        renderTopupWalletsUI();
        await loadPaymentMethodsConfig();
    }
    
    function renderActiveTopupView(d) {
        document.getElementById('currentTopupId').value = d.id;
        const finalAmount = parseInt(d.unique_amount || d.amount || 0);
        document.getElementById('topupUniqueAmount').innerText = 'Rp ' + Number(finalAmount).toLocaleString('id-ID');
        const isBotUpgrade = (d.type === 'UPGRADE_BOT' || String(d.id || '').includes('BOT-'));
        const isSellerAct  = (d.type === 'AKTIVASI_AKUN' || String(d.id || '').includes('ACT-'));
        const isSpecialPayment = (isBotUpgrade || isSellerAct);
        const wrapWalletChoice = document.getElementById('wrapTopupTargetWalletChoice');
        if (wrapWalletChoice) {
            wrapWalletChoice.style.display = isSpecialPayment ? 'none' : 'block';
        }
        const titleSpan = document.getElementById('modalTopupTitleText');
        const specialBanner = document.getElementById('wrapSpecialPaymentBanner');
        if (titleSpan) {
            if (isBotUpgrade) {
                titleSpan.innerHTML = '<i class="fab fa-telegram-plane" style="color: #0088cc;"></i> Pembayaran Sistem Bot Telegram VIP';
            } else if (isSellerAct) {
                titleSpan.innerHTML = '<i class="fas fa-shield-halved" style="color: #002dbb;"></i> Pembayaran Aktivasi Akun & API Key';
            } else {
                titleSpan.innerHTML = '<i class="fas fa-bolt" style="color: #059669;"></i> Topup Saldo Otomatis';
            }
        }
        if (specialBanner) {
            if (isBotUpgrade) {
                specialBanner.style.display = 'block';
                specialBanner.style.background = 'linear-gradient(135deg, #e0f2fe 0%, #eff6ff 100%)';
                specialBanner.style.border = '1.5px solid #7dd3fc';
                specialBanner.style.boxShadow = '0 3px 12px rgba(0, 136, 204, 0.12)';
                specialBanner.innerHTML = '<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:4px;"><span class="badge" style="background:#0088cc; color:#ffffff; font-size:9px; padding:2px 8px; border-radius:6px;"><i class="fab fa-telegram-plane"></i> LISENSI BOT VIP</span><b style="color:#0369a1; font-size:11px;">Biaya Buka Sistem Bot</b></div><div style="font-size:10.5px; color:#0c4a6e; line-height:1.4;">Transfer persis sesuai nominal unik. Setelah pembayaran terverifikasi otomatis, sistem Bot Telegram langsung aktif permanen tanpa memotong saldo dompet.</div>';
            } else if (isSellerAct) {
                specialBanner.style.display = 'block';
                specialBanner.style.background = 'linear-gradient(135deg, #fef3c7 0%, #fffbeb 100%)';
                specialBanner.style.border = '1.5px solid #fcd34d';
                specialBanner.style.boxShadow = '0 3px 12px rgba(245, 158, 11, 0.12)';
                specialBanner.innerHTML = '<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:4px;"><span class="badge" style="background:#d97706; color:#ffffff; font-size:9px; padding:2px 8px; border-radius:6px;"><i class="fas fa-key"></i> AKTIVASI SELLER</span><b style="color:#92400e; font-size:11px;">Biaya Aktivasi Akun & API Key</b></div><div style="font-size:10.5px; color:#78350f; line-height:1.4;">Transfer tepat hingga 3 digit terakhir. Token API resmi Anda akan langsung diterbitkan otomatis seketika setelah mutasi terverifikasi.</div>';
            } else {
                specialBanner.style.display = 'none';
            }
        }
    
        const creditAmt    = (isBotUpgrade || isSellerAct) ? parseInt(d.amount || 0) : parseInt(d.credit_amount || d.amount || finalAmount);
        const feeAmt       = parseInt(d.admin_fee || Math.max(0, finalAmount - (isBotUpgrade ? 180000 : (isSellerAct ? 280000 : creditAmt))));
        const creditEl     = document.getElementById('topupCreditAmountTxt');
        const feeEl        = document.getElementById('topupAdminFeeTxt');
        const lblCredit    = document.getElementById('topupBreakdownLabelTxt');
        const lblFee       = document.getElementById('topupAdminFeeLabelTxt');
        if (lblCredit) lblCredit.innerText = isBotUpgrade ? 'Layanan: Buka Bot Telegram (VIP)' : (isSellerAct ? 'Layanan: Aktivasi Akun Seller' : 'Saldo Masuk ke Dompet:');
        if (lblFee) lblFee.innerText = (isBotUpgrade || isSellerAct) ? 'Kode Unik Pembayaran:' : 'Biaya Admin Layanan:';
        if (creditEl) creditEl.innerText = isBotUpgrade ? 'Biaya: Rp 180.000' : (isSellerAct ? 'Biaya: Rp 280.000 (Include Bot)' : ('Rp ' + Number(creditAmt).toLocaleString('id-ID')));
        if (feeEl) feeEl.innerText = feeAmt > 0 ? ('+Rp ' + Number(feeAmt).toLocaleString('id-ID')) : 'Gratis';
        const isQris = (d.method === 'qris');
        const qrisBox = document.getElementById('infoQrisBox');
        const trfBox = document.getElementById('infoTransferBox');
        if (isQris) {
            qrisBox.style.display = 'block';
            trfBox.style.display = 'none';
            const qrImg = document.getElementById('topupDynamicQrisImg');
            const qrisPayload = String(d.qris_string || '').trim();
            window._currentQrisPayload = qrisPayload;
            const primaryQrUrl = d.qris_image_url || (qrisPayload ? ('https://api.qrserver.com/v1/create-qr-code/?size=550x550&margin=20&ecc=M&data=' + encodeURIComponent(qrisPayload)) : '');
            if (qrImg) {
                qrImg.src = primaryQrUrl;
                qrImg.onerror = function() {
                    if (qrisPayload) {
                        this.onerror = null;
                        this.src = 'https://quickchart.io/qr?size=550&margin=4&ecLevel=M&text=' + encodeURIComponent(qrisPayload);
                    }
                };
            }
        } else {
            qrisBox.style.display = 'none';
            trfBox.style.display = 'block';
            document.getElementById('transferBankTitle').innerText = d.method_title || (d.method === 'dana' ? 'Transfer DANA' : 'Transfer SeaBank');
            document.getElementById('transferRekNumber').innerText = d.rekening || (d.method === 'dana' ? '085156776974' : '901217952726');
            document.getElementById('transferAccountName').innerText = 'A/N ' + (d.atas_nama || 'Cyraxx');
        }
        document.getElementById('topupInputSection').style.display = 'none';
        document.getElementById('topupQrisSection').style.display = 'block';
    }
    
    async function requestTopup() {
        const amount = parseInt(document.getElementById('topupAmount').value);
        const targetWallet = (document.getElementById('topupTargetWallet') ? document.getElementById('topupTargetWallet').value : 'akrab');
    
        const method = document.getElementById('topupMethod').value;
        const minAllowed = cachedTopupConfig ? parseInt(cachedTopupConfig.min_topup || 20000) : 20000;
        if (!amount || amount < minAllowed) return alert('Minimal topup saldo adalah Rp ' + minAllowed.toLocaleString('id-ID'));
        const btn = document.getElementById('btnReqTopup');
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyiapkan Tiket Topup...';
        btn.disabled = true;
        try {
            const res = await fetch('api/sysdatabase/topup_api.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    action: 'request',
                    amount: amount,
                    session_token: currentUser.session_token,
                    username: currentUser.username,
                    nomorwa: currentUser.nomorwa,
                    wallet: targetWallet,
    
                    method: method
                })
            });
            const data = await res.json();
            if (data.status && data.data) {
                const d = data.data;
                const nowTime = Date.now();
                const savedObj = Object.assign({ time: nowTime, username: currentUser.username }, d);
                localStorage.setItem('dt17_pending_topup_' + currentUser.username, JSON.stringify(savedObj));
                renderActiveTopupView(savedObj);
                startTopupTimer(nowTime + (3600 * 1000));
                startIndoPayPolling(d.id);
                if (typeof loadUserHistory === 'function') loadUserHistory();
            } else {
                alert(data.message || 'Gagal memproses topup.');
            }
        } catch(e) {
            alert('Terjadi kesalahan koneksi.');
        } finally {
            btn.innerHTML = '<i class="fas fa-paper-plane"></i> Lanjutkan Topup';
            btn.disabled = false;
        }
    }
    
    async function cancelTopup() {
        const tid = document.getElementById('currentTopupId').value;
        if (!confirm('Yakin ingin membatalkan request topup ini?')) return;
        stopIndoPayPolling();
        if (typeof stopDedicatedPolling === 'function') stopDedicatedPolling();
        const btn = document.getElementById('btnCancelTopup');
        if (btn) { btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Membatalkan...'; btn.disabled = true; }
        try {
            await fetch('api/sysdatabase/topup_api.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ action: 'cancel', topup_id: tid, id: tid, session_token: currentUser.session_token, username: currentUser.username })
            });
        } catch(e) {}
        if (currentUser && currentUser.username) {
            localStorage.removeItem('dt17_pending_topup_' + currentUser.username);
        }
        if (topupCountdownInterval) { clearInterval(topupCountdownInterval); topupCountdownInterval = null; }
        closeModal('modalTopup');
        if (typeof loadUserHistory === 'function') loadUserHistory();
        toast('info', 'Topup Dibatalkan', 'Permintaan topup berhasil dibatalkan');
        if (btn) { btn.innerHTML = '<i class="fas fa-ban"></i> Batalkan Topup'; btn.disabled = false; }
    }
    
    function hubungiAdminTopup() {
        window.open('https://t.me/iTCyrax', '_blank');
    }
    
    async function loadTelegramStockNotifLink() {
        try {
            const res = await fetch('notifstok/cron.php?action=get_config&_t=' + Date.now());
            const rawTxt = await res.text();
            let json = null;
            try { json = JSON.parse(rawTxt); } catch(pe) {}
            if (json && json.status && json.data) {
                const d = json.data;
                const btn = document.getElementById('btnTelegramStockNotif');
                const subTxt = document.getElementById('txtTelegramStockSub');
                const badge = document.getElementById('badgeTelegramStockStatus');
                if (btn) {
                    if (d.enabled === false) {
                        btn.style.display = 'none';
                        return;
                    }
                    btn.style.display = 'flex';
                    if (d.telegram_button_link) btn.href = d.telegram_button_link;
                }
                if (subTxt && d.last_push_text && !d.last_push_text.includes('Belum ada')) {
                    subTxt.innerText = 'Restock: ' + d.last_push_text;
                }
                if (badge && d.enabled) {
                    badge.className = 'badge badge-success';
                    badge.innerHTML = '<i class="fas fa-bell"></i> BERGABUNG';
                }
            }
        } catch(e) {}
    }
    
    async function loadRunningTextConfig() {
        try {
            const res = await fetch('api/sysdatabase/auth.php?action=get_running_text&_t=' + Date.now());
            const json = await res.json();
            if (json && json.status && json.data) {
                const d = json.data;
                const wrap = document.getElementById('dashboardRunningTextWrap');
                if (!wrap) return;
                if (d.enabled === false) { wrap.style.display = 'none'; return; }
                wrap.style.display = 'block';
                const content = document.getElementById('dashboardRunningTextContent');
                const l1 = document.getElementById('rtLine1');
                const l2 = document.getElementById('rtLine2');
                if (l1) l1.innerText = d.line1 || 'Selamat datang di dt17.store';
                if (l2) {
                    if (d.line2 && d.line2.trim() !== '') {
                        l2.innerText = d.line2;
                        l2.style.display = 'block';
                    } else {
                        l2.style.display = 'none';
                    }
                }
                if (content) {
                    content.className = 'rt-ticker-content ' + (d.animation === 'scroll_right' ? 'rt-anim-scroll-right' : (d.animation === 'pulse' ? 'rt-anim-pulse' : (d.animation === 'bounce' ? 'rt-anim-bounce' : 'rt-anim-scroll-left')));
                    if (d.color_mode === 'rainbow') {
                        content.classList.add('rt-rainbow-text');
                        content.style.color = '';
                    } else {
                        content.classList.remove('rt-rainbow-text');
                        content.style.color = d.text_color || '#38bdf8';
                    }
                    content.style.setProperty('--rt-speed', (d.speed || 16) + 's');
                }
            }
        } catch(e) {}
    }
    
    function isDedicatedUser() {
        return !!(currentUser && (currentUser.api1_private_mode || currentUser.api1_mode === 'private' || (currentUser.api1_private && currentUser.api1_private.enabled)));
    }
    
    function closeModal(id) {
        if (id === 'modalTopup') {
            stopIndoPayPolling();
            if (typeof stopDedicatedPolling === 'function') stopDedicatedPolling();
            if (isDedicatedUser()) {
                if (typeof startRealtimeAutoRefresh === 'function') startRealtimeAutoRefresh();
                if (typeof syncDedicatedBalanceLive === 'function') syncDedicatedBalanceLive(true);
            }
        }
        const el = document.getElementById(id);
        if (el) el.style.display = 'none';
    }
    
    let dedicatedPollingTimer = null;
    let dedicatedCountdownTimer = null;
    window._lastDedicatedSync = 0;
    
    function stopDedicatedPolling() {
        if (dedicatedPollingTimer) { clearInterval(dedicatedPollingTimer); dedicatedPollingTimer = null; }
        if (dedicatedCountdownTimer) { clearInterval(dedicatedCountdownTimer); dedicatedCountdownTimer = null; }
    }
    
    async function syncDedicatedBalanceLive(force = false) {
        if (!isDedicatedUser() || !currentUser || !currentUser.session_token) return;
        const now = Date.now();
        if (!force && window._lastDedicatedSync && (now - window._lastDedicatedSync < 25000)) {
            return;
        }
        window._lastDedicatedSync = now;
        try {
            const sToken = currentUser.session_token || '';
            const aKey = currentUser.api_key || '';
            const res = await fetch(`api/dedicated_topup.php?action=balance&session_token=${encodeURIComponent(sToken)}&api_key=${encodeURIComponent(aKey)}&_t=${now}`);
            const data = await res.json();
            if (data && data.status && data.saldo_numeric !== undefined) {
                currentUser.saldo_akrab = data.saldo_numeric;
                const accType = String(currentUser.account_type || '').toLowerCase();
                if (!['api2', 'kaje', 'ppob', 'api4'].includes(accType)) {
                    currentUser.saldo = data.saldo_numeric;
                }
                updateBalanceDisplay();
            }
        } catch (e) {}
    }
    
    async function openDedicatedTopupModal() {
        const modal = document.getElementById('modalTopup');
        if (modal) modal.style.display = 'flex';
        renderTopupWalletsUI();
        selectTopupWallet('akrab');
    }
    
    async function checkOrLoadDedicatedTicket() {
        if (typeof stopDedicatedPolling === 'function') stopDedicatedPolling();
        try {
            const sToken = (currentUser && currentUser.session_token) ? currentUser.session_token : '';
            const aKey = (currentUser && currentUser.api_key) ? currentUser.api_key : '';
            const res = await fetch(`api/dedicated_topup.php?action=get_active_ticket&session_token=${encodeURIComponent(sToken)}&api_key=${encodeURIComponent(aKey)}&_t=${Date.now()}`);
            const data = await res.json();
            if (data && data.status && data.has_active && data.data) {
                const d = data.data;
                const nowTime = Date.now();
                const ticketCreatedAt = d.created_at ? (Number(d.created_at) * 1000) : nowTime;
                const savedObj = Object.assign({
                    id: d.ref_id,
                    ref_id: d.ref_id,
                    refid_h2h: d.ref_id,
                    ticket_id: d.ticket_id,
                    time: ticketCreatedAt,
                    username: currentUser.username,
                    amount: d.nominal_dasar || 0,
                    unique_amount: d.nominal_transfer_raw || 0,
                    method: 'bri',
                    method_title: 'Transfer Bank BRI',
                    is_dedicated: true,
                    wallet: 'akrab',
                    server_code: 'TOPUP SALDO',
                    server_name: 'Server 1 Dedicated Route',
                    kode_produk: 'TOPUP_DEDICATED',
                    produk_nama: 'Topup Saldo Server 1 Dedicated',
                    target: (d.bank || 'BRI') + ' ' + (d.rekening || '600701000029563'),
                    status: 'PENDING',
                    sn: 'Menunggu Pembayaran (30 Menit)',
                    message: 'Transfer tepat ' + (d.nominal_transfer || '') + ' ke ' + (d.bank || 'BRI') + ' ' + (d.rekening || '')
                }, d);
                localStorage.setItem('dt17_pending_topup_' + currentUser.username, JSON.stringify(savedObj));
                renderDedicatedActiveTicket(data.data, data.remaining_seconds || 1800);
                if (typeof loadUserHistory === 'function') loadUserHistory();
            } else {
                if (data && data.expired && currentUser && currentUser.username) {
                    const pendingRaw = localStorage.getItem('dt17_pending_topup_' + currentUser.username);
                    if (pendingRaw && (pendingRaw.includes('TOPUP_DEDICATED') || pendingRaw.includes('TP1_'))) {
                        localStorage.removeItem('dt17_pending_topup_' + currentUser.username);
                    }
                    if (typeof loadUserHistory === 'function') loadUserHistory();
                }
                renderDedicatedInputForm();
            }
        } catch (e) {
            renderDedicatedInputForm();
        }
    }
    
    function renderDedicatedInputForm() {
        stopDedicatedPolling();
        const inpSec = document.getElementById('dedicatedInputSection');
        const tktSec = document.getElementById('dedicatedTicketSection');
        if (inpSec) inpSec.style.display = 'block';
        if (tktSec) tktSec.style.display = 'none';
        const amountInp = document.getElementById('dedicatedAmountInp');
        if (amountInp) amountInp.value = '';
    }
    
    function renderDedicatedActiveTicket(d, remSeconds) {
        stopDedicatedPolling();
        const inpSec = document.getElementById('dedicatedInputSection');
        const tktSec = document.getElementById('dedicatedTicketSection');
        if (inpSec) inpSec.style.display = 'none';
        if (tktSec) tktSec.style.display = 'block';
    
        const nomTxt = document.getElementById('dedicatedUniqueAmountTxt');
        const rekTxt = document.getElementById('dedicatedRekNumber');
        const anTxt = document.getElementById('dedicatedAccountName');
        const statusTxt = document.getElementById('dedicatedStatusText');
        const btnCopyNom = document.getElementById('btnCopyDedicatedNominal');
    
        if (nomTxt) nomTxt.innerText = d.nominal_transfer || ('Rp ' + Number(d.nominal_transfer_raw || 0).toLocaleString('id-ID'));
        if (rekTxt) rekTxt.innerText = d.rekening || '600701000029563';
        if (anTxt) anTxt.innerText = d.atas_nama || 'N*R AL****YAH';
        if (statusTxt) {
            statusTxt.innerText = 'Memantau mutasi setiap 7 detik...';
            statusTxt.style.color = '#047857';
        }
        if (btnCopyNom) {
            btnCopyNom.onclick = function() {
                const rawVal = String(d.nominal_transfer_raw || d.nominal_transfer || '').replace(/\D/g, '');
                copyToClipboard(rawVal, 'Nominal Transfer Persis');
            };
        }
    
        let timeLeft = parseInt(remSeconds || 1800);
        const timerEl = document.getElementById('dedicatedCountdownTimer');
        const updateTimerDisplay = () => {
            if (timeLeft <= 0) {
                stopDedicatedPolling();
                if (timerEl) timerEl.innerText = '00:00';
                if (statusTxt) {
                    statusTxt.innerText = 'Tiket Kedaluwarsa (30 Menit)';
                    statusTxt.style.color = '#dc2626';
                }
                toast('error', 'Waktu Habis', 'Batas waktu transfer 30 menit telah berakhir.');
                if (typeof loadUserHistory === 'function') loadUserHistory();
                return;
            }
            const m = Math.floor(timeLeft / 60);
            const s = timeLeft % 60;
            if (timerEl) timerEl.innerText = `${m.toString().padStart(2, '0')}:${s.toString().padStart(2, '0')}`;
            timeLeft--;
        };
        updateTimerDisplay();
        dedicatedCountdownTimer = setInterval(updateTimerDisplay, 1000);
    
        startDedicatedSilentPolling();
    }
    
    function startDedicatedSilentPolling() {
        if (dedicatedPollingTimer) clearInterval(dedicatedPollingTimer);
        if (typeof stopIndoPayPolling === 'function') stopIndoPayPolling();
        dedicatedPollingTimer = setInterval(async () => {
            try {
                const sToken = (currentUser && currentUser.session_token) ? currentUser.session_token : '';
                const aKey = (currentUser && currentUser.api_key) ? currentUser.api_key : '';
                const res = await fetch(`api/dedicated_topup.php?action=check_topup&session_token=${encodeURIComponent(sToken)}&api_key=${encodeURIComponent(aKey)}&_t=${Date.now()}`);
                const data = await res.json();
    
                if (data && data.status) {
                    if (data.matched === true) {
                        stopDedicatedPolling();
                        if (currentUser && currentUser.username) {
                            localStorage.removeItem('dt17_pending_topup_' + currentUser.username);
                        }
                        const statusTxt = document.getElementById('dedicatedStatusText');
                        if (statusTxt) {
                            statusTxt.innerText = '✅ Pembayaran Berhasil Terverifikasi!';
                            statusTxt.style.color = '#10b981';
                        }
                        toast('success', 'Topup Berhasil!', data.message || 'Saldo berhasil masuk ke akun Server 1 Dedicated.');
                        await syncDedicatedBalanceLive(true);
                        if (typeof loadUserHistory === 'function') loadUserHistory();
                        setTimeout(() => { closeModal('modalTopup'); }, 2500);
                    } else if (data.expired === true) {
                        stopDedicatedPolling();
                        if (currentUser && currentUser.username) {
                            localStorage.removeItem('dt17_pending_topup_' + currentUser.username);
                        }
                        const statusTxt = document.getElementById('dedicatedStatusText');
                        if (statusTxt) {
                            statusTxt.innerText = 'Tiket Kedaluwarsa (30 Menit)';
                            statusTxt.style.color = '#dc2626';
                        }
                        if (typeof loadUserHistory === 'function') loadUserHistory();
                    }
                }
            } catch (err) {}
        }, 7000);
    }
    
    async function requestDedicatedTicket() {
        const amtInp = document.getElementById('dedicatedAmountInp');
        const amt = parseInt(amtInp ? amtInp.value : 0);
        if (!amt || amt < 10000) {
            toast('warn', 'Nominal Kurang', 'Minimal topup saldo adalah Rp 10.000!');
            return;
        }
    
        const btn = document.getElementById('btnReqDedicatedTicket');
        if (btn) { btn.disabled = true; btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menghubungi Server...'; }
    
        try {
            const sToken = (currentUser && currentUser.session_token) ? currentUser.session_token : '';
            const aKey = (currentUser && currentUser.api_key) ? currentUser.api_key : '';
            const res = await fetch('api/dedicated_topup.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    action: 'request_ticket',
                    amount: amt,
                    session_token: sToken,
                    api_key: aKey
                })
            });
            const data = await res.json();
            if (data && data.status && data.data) {
                const d = data.data;
                const nowTime = Date.now();
                const ticketCreatedAt = d.created_at ? (Number(d.created_at) * 1000) : nowTime;
                const savedObj = Object.assign({
                    id: d.ref_id,
                    ref_id: d.ref_id,
                    refid_h2h: d.ref_id,
                    ticket_id: d.ticket_id,
                    time: ticketCreatedAt,
                    username: currentUser.username,
                    amount: d.nominal_dasar || amt,
                    unique_amount: d.nominal_transfer_raw || amt,
                    method: 'bri',
                    method_title: 'Transfer Bank BRI',
                    is_dedicated: true,
                    wallet: 'akrab',
                    server_code: 'TOPUP SALDO',
                    server_name: 'Server 1 Dedicated Route',
                    kode_produk: 'TOPUP_DEDICATED',
                    produk_nama: 'Topup Saldo Server 1 Dedicated',
                    target: (d.bank || 'BRI') + ' ' + (d.rekening || '600701000029563'),
                    status: 'PENDING',
                    sn: 'Menunggu Pembayaran (30 Menit)',
                    message: 'Transfer tepat ' + (d.nominal_transfer || '') + ' ke ' + (d.bank || 'BRI') + ' ' + (d.rekening || '')
                }, d);
                localStorage.setItem('dt17_pending_topup_' + currentUser.username, JSON.stringify(savedObj));
                toast('success', 'Tiket Diterbitkan', 'Silakan transfer persis sesuai nominal unik.');
                renderDedicatedActiveTicket(data.data, data.remaining_seconds || 1800);
                if (typeof loadUserHistory === 'function') loadUserHistory();
            } else {
                toast('error', 'Gagal', (data && data.message) ? data.message : 'Server penyedia menolak pembuatan tiket.');
            }
        } catch (e) {
            toast('error', 'Koneksi Error', e.message);
        } finally {
            if (btn) { btn.disabled = false; btn.innerHTML = '<i class="fas fa-bolt"></i> Dapatkan Tiket Transfer'; }
        }
    }
    
    async function cancelDedicatedTicket() {
        if (!confirm('Yakin ingin membatalkan permohonan topup ini?\nNominal unik akan dilepaskan sehingga Anda dapat mengajukan tiket dengan nominal baru.')) return;
        stopDedicatedPolling();
        if (typeof stopIndoPayPolling === 'function') stopIndoPayPolling();
        const btn = document.getElementById('btnCancelDedicatedTicket');
        if (btn) { btn.disabled = true; btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Membatalkan...'; }
    
        try {
            const sToken = (currentUser && currentUser.session_token) ? currentUser.session_token : '';
            const aKey = (currentUser && currentUser.api_key) ? currentUser.api_key : '';
            const res = await fetch('api/dedicated_topup.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    action: 'cancel_ticket',
                    session_token: sToken,
                    api_key: aKey
                })
            });
            const data = await res.json();
            if (currentUser && currentUser.username) {
                localStorage.removeItem('dt17_pending_topup_' + currentUser.username);
            }
            toast('info', 'Tiket Dibatalkan', (data && data.message) ? data.message : 'Tiket berhasil dibatalkan.');
            renderDedicatedInputForm();
            if (typeof loadUserHistory === 'function') loadUserHistory();
        } catch (e) {
            toast('error', 'Kesalahan', e.message);
        } finally {
            if (btn) { btn.disabled = false; btn.innerHTML = '<i class="fas fa-ban"></i> Batalkan Topup'; }
        }
    }
    
    function openQrisPreviewModal() {
        const qrImg = document.getElementById('topupDynamicQrisImg');
        const fullImg = document.getElementById('fullPreviewQrisImg');
        const modal = document.getElementById('modalPreviewQris');
        if (!qrImg || !qrImg.src) {
            toast('warn', 'QRIS Kosong', 'Barcode QRIS belum selesai dimuat.');
            return;
        }
        if (fullImg) {
            fullImg.src = qrImg.src;
            fullImg.onerror = function() {
                if (window._currentQrisPayload) {
                    this.onerror = null;
                    this.src = 'https://quickchart.io/qr?size=650&margin=4&ecLevel=M&text=' + encodeURIComponent(window._currentQrisPayload);
                }
            };
        }
        if (modal) modal.style.display = 'flex';
    }
    
    function copyQrisString() {
        const s = window._currentQrisPayload || '';
        if (!s) return toast('warn', 'QRIS Kosong', 'String kode QRIS belum tersedia');
        copyToClipboard(s, 'Kode String QRIS');
    }
    
    function downloadQrisImage() {
        const img = document.getElementById('topupDynamicQrisImg') || document.getElementById('fullPreviewQrisImg');
        if (!img || !img.src) return toast('warn', 'QRIS Kosong', 'Barcode belum selesai dimuat');
        fetch(img.src).then(r => r.blob()).then(blob => {
            const a = document.createElement('a');
            a.href = URL.createObjectURL(blob);
            a.download = 'QRIS_Bayar_' + (document.getElementById('currentTopupId')?.value || Date.now()) + '.png';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            toast('success', 'QRIS Diunduh', 'Gambar QRIS disimpan! Buka m-Banking lalu pilih "Scan dari Galeri"');
        }).catch(() => {
            window.open(img.src, '_blank');
        });
    }
    
    let _isRefreshingBalance = false;
    async function refreshUserBalanceLive() {
        if (!currentUser || !currentUser.session_token || _isRefreshingBalance) return;
        if (document.hidden) return;
        _isRefreshingBalance = true;
        try {
            if (typeof isDedicatedUser === 'function' && isDedicatedUser()) {
                await syncDedicatedBalanceLive(false);
            }
            const res = await fetch(`api/sysdatabase/auth.php?action=check_session&session_token=${encodeURIComponent(currentUser.session_token)}&_t=${Date.now()}`, { cache: "no-store" });
            const data = await res.json();
            if (data && data.status && data.data) {
                const u = data.data;
                if (!isDedicatedUser()) {
                    currentUser.saldo = u.saldo;
                    currentUser.saldo_akrab = u.saldo_akrab;
                }
                currentUser.saldo_api2 = u.saldo_api2;
                currentUser.saldo_ppob = u.saldo_ppob;
                currentUser.account_type = u.account_type || currentUser.account_type;
                currentUser.verified     = u.verified;
                currentUser.api_key      = u.api_key;
                currentUser.role         = u.role;
                updateApiKeyDisplay();
                updateBalanceDisplay();
            }
        } catch(e) {}
        finally {
            _isRefreshingBalance = false;
        }
    }
    
    function startRealtimeAutoRefresh() {
        if (autoRefreshTimer) clearInterval(autoRefreshTimer);
        autoRefreshTimer = setInterval(async () => {
            if (!currentUser) return;
            window.isSilentAutoRefresh = true;
            await loadApiStatusConfig();
            await refreshUserBalanceLive();
            await loadUserHistory();
            await checkPendingTransactionsStatus();
            await loadTelegramStockNotifLink();
    
            window.isSilentAutoRefresh = false;
        }, 5000);
    }
       document.addEventListener('keydown', e => {
        if (e.keyCode === 123 || 
           (e.ctrlKey && e.shiftKey && (e.keyCode === 73 || e.keyCode === 74 || e.keyCode === 67)) || 
           (e.ctrlKey && (e.keyCode === 85 || e.keyCode === 83))) {
            e.preventDefault();
            return false;
        }
    });
    
    let isBalanceVisible = true;
    let tradingChartInstance = null;
    
    function updateBalanceDisplay() {
        const saldoEls = document.querySelectorAll('#profSaldo');
        const eyeIcon = document.getElementById('eyeBalanceIcon');
        if (!currentUser) return;
        const sAkrab = currentUser.saldo_akrab !== undefined ? currentUser.saldo_akrab : (currentUser.saldo || 0);
        const sApi2  = currentUser.saldo_api2 !== undefined ? currentUser.saldo_api2 : 0;
        const sPpob  = currentUser.saldo_ppob !== undefined ? currentUser.saldo_ppob : 0;
        const elAkrab = document.getElementById('profSaldoAkrab');
        const elApi2  = document.getElementById('profSaldoApi2');
        const elPpob  = document.getElementById('profSaldoPpob');
        if (elAkrab) elAkrab.innerText = isBalanceVisible ? ('Rp ' + sAkrab.toLocaleString('id-ID')) : 'Rp ••••••••';
        if (elApi2)  elApi2.innerText  = isBalanceVisible ? ('Rp ' + sApi2.toLocaleString('id-ID'))  : 'Rp ••••••••';
        if (elPpob)  elPpob.innerText  = isBalanceVisible ? ('Rp ' + sPpob.toLocaleString('id-ID'))  : 'Rp ••••••••';
        const cAkrab = document.getElementById('cardServerSaldo_api1');
        const cApi2  = document.getElementById('cardServerSaldo_api2');
        const cPpob  = document.getElementById('cardServerSaldo_api4');
        if (cAkrab) cAkrab.innerText = isBalanceVisible ? ('Rp ' + Number(sAkrab).toLocaleString('id-ID')) : 'Rp ••••••';
        if (cApi2)  cApi2.innerText  = isBalanceVisible ? ('Rp ' + Number(sApi2).toLocaleString('id-ID'))  : 'Rp ••••••';
        if (cPpob)  cPpob.innerText  = isBalanceVisible ? ('Rp ' + Number(sPpob).toLocaleString('id-ID'))  : 'Rp ••••••';
    
        const allowed = (typeof getUserAllowedApisClient === 'function') ? getUserAllowedApisClient() : ['api1', 'api2', 'api4'];
        const wAkrab = document.getElementById('wrapSaldoAkrab');
        const wApi2  = document.getElementById('wrapSaldoApi2');
        const wPpob  = document.getElementById('wrapSaldoPpob');
        const gridBox = document.getElementById('breakdownSaldoGrid');
        let visibleCount = 0;
        if (wAkrab) {
            const showA1 = allowed.includes('api1');
            wAkrab.style.display = showA1 ? 'block' : 'none';
            if (showA1) visibleCount++;
        }
        if (wApi2) {
            const showA2 = allowed.includes('api2');
            wApi2.style.display = showA2 ? 'block' : 'none';
            if (showA2) visibleCount++;
        }
        if (wPpob) {
            const showA4 = allowed.includes('api4');
            wPpob.style.display = showA4 ? 'block' : 'none';
            if (showA4) visibleCount++;
        }
        if (gridBox) {
            gridBox.style.display = (visibleCount > 0) ? 'grid' : 'none';
        }
    
        let currentBalance = (allowed.includes('api1') ? Number(sAkrab || 0) : 0) + (allowed.includes('api2') ? Number(sApi2 || 0) : 0) + (allowed.includes('api4') ? Number(sPpob || 0) : 0);
        const formatted = 'Rp ' + currentBalance.toLocaleString('id-ID');
        saldoEls.forEach(el => {
            if (isBalanceVisible) el.innerText = formatted;
            else el.innerText = 'Rp ••••••••';
        });
        if (eyeIcon) {
            eyeIcon.className = isBalanceVisible ? 'fas fa-eye' : 'fas fa-eye-slash';
        }
        const isVer = isUserVerified();
        const unverifiedOverlay = document.getElementById('unverifiedBalanceOverlay');
        const innerBalanceWrap = document.getElementById('ktpBalanceBoxInner');
        if (unverifiedOverlay && innerBalanceWrap) {
            if (!isVer) {
                unverifiedOverlay.style.display = 'flex';
                innerBalanceWrap.style.filter = 'blur(6px)';
                innerBalanceWrap.style.pointerEvents = 'none';
                innerBalanceWrap.style.userSelect = 'none';
                const uNameEl = document.getElementById('unverifiedOverlayUsername');
                const uEmailEl = document.getElementById('unverifiedOverlayEmail');
                if (uNameEl) uNameEl.innerText = (currentUser ? currentUser.username : '-');
                if (uEmailEl) uEmailEl.innerText = (currentUser ? (currentUser.email || currentUser.nomorwa || '-') : '-');
            } else {
                unverifiedOverlay.style.display = 'none';
                innerBalanceWrap.style.filter = 'none';
                innerBalanceWrap.style.pointerEvents = 'auto';
                innerBalanceWrap.style.userSelect = 'auto';
            }
        }
    }
    
    function toggleBalanceVisibility() {
        isBalanceVisible = !isBalanceVisible;
        updateBalanceDisplay();
    }
    
    let isApiKeyVisible = false;
    function toggleApiKeyVisibility() {
        isApiKeyVisible = !isApiKeyVisible;
        updateApiKeyDisplay();
    }
    function getAdminVerificationUrl() {
        return 'https://t.me/iTCyrax';
    }
    
    function isUserVerified() {
        if (!currentUser) return false;
        if (currentUser.role === 'admin') return true;
        const hasKey = !!(currentUser.api_key && String(currentUser.api_key).trim() !== '');
        const isVer = (currentUser.verified === true || currentUser.verified === '1' || currentUser.verified === 1);
        return hasKey && isVer;
    }
    
    function updateApiKeyDisplay() {
        const keyEls = document.querySelectorAll('#displayApiKeyKtp');
        const eyeIcons = document.querySelectorAll('#eyeApiKeyIcon');
        if (!currentUser) return;
        const verified = isUserVerified();
        keyEls.forEach(el => {
            if (!verified) {
                el.innerHTML = '<a href="javascript:void(0)" onclick="openAktivasiAkunModal()" style="color:#ef4444; font-weight:800; text-decoration:underline; font-size:10px; display:inline-flex; align-items:center; gap:4px; cursor:pointer;"><i class="fas fa-lock"></i> Akun belum di verifikasi admin, aktivasi akun disini</a>';
            } else {
                el.innerText = isApiKeyVisible ? currentUser.api_key : 'dt17_••••••••';
            }
        });
        eyeIcons.forEach(icon => {
            icon.style.display = verified ? 'inline-block' : 'none';
            if (verified) {
                icon.className = isApiKeyVisible ? 'fas fa-eye-slash' : 'fas fa-eye';
            }
        });
    }
    
    function renderTradingChart(monthlySaldo, monthlySuccess, monthlyFailed) {
        const ctx = document.getElementById('monthlyTradingChart');
        if (!ctx) return;
        if (tradingChartInstance) tradingChartInstance.destroy();
        const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'];
        tradingChartInstance = new Chart(ctx, {
            type: 'bar',
    
            data: {
                labels: months,
                datasets: [
                    {
                                                        type: 'line',
                                label: 'Saldo Terpakai (Rp)',
    
                        data: monthlySaldo || [0,0,0,0,0,0,0,0,0,0,0,0],
                        borderColor: '#0284c7',
                        borderWidth: 2.5,
                        backgroundColor: (context) => {
                            const bgCtx = context.chart.ctx;
                            const gradient = bgCtx.createLinearGradient(0, 0, 0, 240);
                            gradient.addColorStop(0, 'rgba(2, 132, 199, 0.25)');
                            gradient.addColorStop(1, 'rgba(2, 132, 199, 0.0)');
                            return gradient;
                        },
                        fill: true,
                                                        tension: 0,
                        pointRadius: 4,
                        pointBackgroundColor: '#0284c7',
                        yAxisID: 'y'
                    },
                                                {
                                type: 'bar',
                                label: 'TRX Berhasil (Qty)',
                                data: monthlySuccess || [0,0,0,0,0,0,0,0,0,0,0,0],
                                backgroundColor: '#059669',
                                borderRadius: 4,
                                yAxisID: 'y1'
                            },
                                                {
                                type: 'bar',
                                label: 'TRX Gagal (Qty)',
                                data: monthlyFailed || [0,0,0,0,0,0,0,0,0,0,0,0],
                                backgroundColor: '#dc2626',
                                borderRadius: 4,
                                yAxisID: 'y1'
                            }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    mode: 'index',
                    intersect: false
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: { color: '#1e293b', font: { size: 10, weight: '700' }, usePointStyle: true, boxWidth: 8 }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) label += ': ';
                                if (context.dataset.yAxisID === 'y') {
                                    label += 'Rp ' + (context.parsed.y || 0).toLocaleString('id-ID');
                                } else {
                                    label += (context.parsed.y || 0) + ' TRX';
                                }
                                return label;
                            }
                        }
                    }
                },
                scales: {
                    x: { grid: { color: 'rgba(0, 0, 0, 0.05)' }, ticks: { color: '#64748b', font: { size: 10 } } },
                    y: {
                        type: 'linear',
                        display: true,
                        position: 'left',
                        grid: { color: 'rgba(0, 0, 0, 0.05)' },
                        ticks: {
                            color: '#0284c7',
                            font: { size: 9 },
                            callback: (val) => 'Rp ' + (val >= 1000 ? (val/1000) + 'k' : val)
                        }
                    },
                    y1: {
                        type: 'linear',
                        display: true,
                        position: 'right',
                        grid: { drawOnChartArea: false },
                        ticks: {
                            color: '#059669',
                            font: { size: 9 },
                            callback: (val) => val + ' TRX'
                        }
                    }
                }
            }
        });
    }
    
    let currentUser = null;
    document.addEventListener('DOMContentLoaded', () => {        const CURRENT_VERSION = '20260727_v1.0';
        const oldVersion = localStorage.getItem('dt17_app_version');
        if (oldVersion !== CURRENT_VERSION) {
            localStorage.setItem('dt17_app_version', CURRENT_VERSION);
            if (oldVersion && 'caches' in window) {
                caches.keys().then(names => { names.forEach(name => caches.delete(name)); });
            }
            if (oldVersion) {
                location.reload(true);
                return;
            }
        }
        initGoogleSignIn();
        checkUrlVerificationAndResetTokens();
    
        const savedSession = localStorage.getItem('dt17_user_session') || sessionStorage.getItem('dt17_user_session') || localStorage.getItem('dt17_session');
        if (savedSession) verifySession(savedSession);
    });
    
    function isSuspendedMessage(msg) {
        return /ditangguhkan|diblokir|terblokir|suspended|blocked/i.test(String(msg || ''));
    }
    function showSuspendedModal() {
        const modal = document.getElementById('modalSuspendedAlert');
        if (modal) modal.style.display = 'flex';
    }
    
    function switchAuth(mode) {
        document.getElementById('loginForm').style.display = mode === 'login' ? 'block' : 'none';
        document.getElementById('registerForm').style.display = mode === 'register' ? 'block' : 'none';
    }
    
    async function handleRegister() {
        const username = document.getElementById('regUsername').value.trim();
        const email = document.getElementById('regEmail').value.trim();
        const waNo = document.getElementById('regWA').value.trim();
        const pass = document.getElementById('regPass').value;
        const passConf = document.getElementById('regPassConfirm').value;
    
        if (!username) { alert('Harap isi Username!'); return; }
        if (!email) { alert('Harap isi Email!'); return; }
        if (!waNo || waNo.length < 10) { alert('Harap masukkan nomor WhatsApp yang valid!'); return; }
        if (!pass || pass.length < 6) { alert('Password minimal 6 karakter!'); return; }
        if (pass !== passConf) { alert('Konfirmasi kata sandi tidak cocok!'); return; }
    
        const regBtn = event && event.target ? event.target : null;
        if (regBtn) { regBtn.disabled = true; regBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mendaftarkan & Mengirim Email...'; }
        try {
            const payload = {
                action: 'register_verification_request',
                username: username,
                email: email,
                phone: waNo,
                password: pass
            };
            const res = await fetch('resetpass.php?action=register_verification_request', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
            });
            const data = await res.json();
            if (data.status) {
                alert(data.message || 'Pendaftaran Berhasil! Tautan verifikasi telah dikirim ke email Anda. Buka Kotak Masuk atau folder SPAM untuk mengaktifkan akun.');
                switchAuth('login');
            } else {
                alert(data.message || 'Pendaftaran gagal.');
            }
        } catch (e) {
            alert('Terjadi kendala jaringan saat menghubungi server registrasi.');
        } finally {
            if (regBtn) { regBtn.disabled = false; regBtn.innerHTML = 'Daftar Gratis'; }
        }
    }
    
    const GOOGLE_CLIENT_ID = '103822845318-1pq7mvnfnas5csu4gca0ctt72p166ec1.apps.googleusercontent.com';
    let googleTokenClient = null;
    
    function initGoogleSignIn() {
        if (typeof google === 'undefined' || !google.accounts) return;
        if (google.accounts.id) {
            google.accounts.id.initialize({
                client_id: GOOGLE_CLIENT_ID,
                callback: handleGoogleCredentialResponse,
                auto_select: false,
                cancel_on_tap_outside: true
            });
        }
        if (google.accounts.oauth2) {
            try {
                googleTokenClient = google.accounts.oauth2.initTokenClient({
                    client_id: GOOGLE_CLIENT_ID,
                    scope: 'email profile openid',
                    callback: (tokenResponse) => {
                        if (tokenResponse && tokenResponse.access_token) {
                            processGoogleLogin({ access_token: tokenResponse.access_token });
                        }
                    }
                });
            } catch(e) {}
        }
    }
    
    function handleGoogleCredentialResponse(response) {
        if (response && response.credential) {
            processGoogleLogin({ id_token: response.credential });
        }
    }
    
    function triggerGoogleLogin() {
        const isApp = typeof AndroidShare !== 'undefined' || /(wv|Android.*Version\/[\d.]+|WebView)/i.test(navigator.userAgent);
        const btnGoogle = document.getElementById('btnGoogleLogin');
        if (isApp) {
            if (btnGoogle) { btnGoogle.disabled = true; btnGoogle.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menghubungkan Google...'; }
            window.location.href = 'googlelogin.php?action=redirect';
            return;
        }
       if (typeof google === 'undefined' || !google.accounts) {
            alert('Layanan Google Sign-In sedang dimuat, silakan coba beberapa saat lagi.');
            return;
        }
    
        if (!googleTokenClient && google.accounts.oauth2) {
            initGoogleSignIn();
        }
    
        if (googleTokenClient) {
            googleTokenClient.requestAccessToken({ prompt: 'select_account' });
        } else if (google.accounts.id) {
            google.accounts.id.prompt();
        }
    }
    
    async function processGoogleLogin(payload) {
        payload.action = 'login';
        const saveLogin = document.getElementById('saveLogin') ? document.getElementById('saveLogin').checked : true;
        const origGoogleBtnHtml = document.getElementById('btnGoogleLogin') ? document.getElementById('btnGoogleLogin').innerHTML : '';
    
        const btnGoogle = document.getElementById('btnGoogleLogin');
        if (btnGoogle) { btnGoogle.disabled = true; btnGoogle.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menghubungkan Google...'; }
        try {
            const res = await fetch('googlelogin.php?action=login', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
            });
            const rawText = await res.text();
            let data = null;
            try {
                data = JSON.parse(rawText);
            } catch(pErr) {
                throw new Error('Respon server bukan format JSON: ' + rawText.slice(0, 150));
            }
            if (data && data.status && data.data) {
                currentUser = data.data;
                currentUser.email_verified = true;
                if (saveLogin) localStorage.setItem('dt17_session', currentUser.session_token);
                else sessionStorage.setItem('dt17_session', currentUser.session_token);
                if (typeof toast === 'function') toast('success', 'Berhasil', 'Login Google Berhasil!');
                renderApp();
            } else {
                const errMsg = (data && data.message) ? data.message : 'Gagal login via Google.';
                if (isSuspendedMessage(errMsg)) {
                    showSuspendedModal();
                } else {
                    alert(errMsg);
                }
    
            }
        } catch (err) {
            alert('Gagal menghubungkan ke akun Google: ' + err.message);
        } finally {
            if (btnGoogle) { btnGoogle.disabled = false; btnGoogle.innerHTML = origGoogleBtnHtml; }
    
        }
    }
    
    
    async function handleLogin() {
        const waVal = document.getElementById('logWA').value.trim();
        const passVal = document.getElementById('logPass').value;
        const saveLogin = document.getElementById('saveLogin').checked;
        if (!waVal || !passVal) return alert('Harap masukkan Nomor WhatsApp dan Kata Sandi!');
        try {
            const chkRes = await fetch('resetpass.php?action=check_pending_login', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ phone: waVal, username: waVal, email: waVal })
            });
            const chkData = await chkRes.json();
            if (chkData && (chkData.is_pending || chkData.is_unverified)) {
                window.pendingUnverifiedIdent = waVal;
                document.getElementById('modalUnverifiedAlert').style.display = 'flex';
                return;
            }
        } catch(errChk) {}
    
        const payload = { action: 'login', nomorwa: waVal, password: passVal, save_login: saveLogin, login_type: 'member' };
        const res = await fetch('api/sysdatabase/auth.php', { method: 'POST', body: JSON.stringify(payload) });
        const data = await res.json();
        if (data.status) {
            currentUser = data.data;
            if (currentUser.role !== 'admin' && currentUser.verified === false && currentUser.email_verified === false) {
                window.pendingUnverifiedIdent = waVal;
                document.getElementById('modalUnverifiedAlert').style.display = 'flex';
                return;
            }
            if (saveLogin) localStorage.setItem('dt17_user_session', currentUser.session_token);
            else sessionStorage.setItem('dt17_user_session', currentUser.session_token);
            await loadApiStatusConfig();
            renderApp();
        } else {
            if (isSuspendedMessage(data.message)) {
                showSuspendedModal();
            } else {
                alert(data.message);
            }
        }
    
    }
    
    async function verifySession(token) {
        try {
            const res = await fetch(`api/sysdatabase/auth.php?action=check_session&session_token=${token}&_t=${Date.now()}`, { cache: "no-store" });
            const rawTxt = await res.text();
            let data = null;
            try { data = JSON.parse(rawTxt); } catch(pe) {}
            if (data && data.status) { currentUser = data.data; await loadApiStatusConfig(); renderApp(); }
            else handleLogout();
        } catch(e) { handleLogout(); }
    }
    
    let rawHargaList = [];
    
    function getUserAllowedApisClient() {
        if (!currentUser) return ['api1'];
        if (currentUser.role === 'admin') return ['api1', 'api2', 'api4'];
    
        let rawApis = [];
        if (Array.isArray(currentUser.allowed_apis) && currentUser.allowed_apis.length) {
            rawApis = currentUser.allowed_apis;
        } else if (typeof currentUser.allowed_apis === 'string' && currentUser.allowed_apis.trim() !== '') {
            rawApis = currentUser.allowed_apis.split(/[\s]+/);
        }
    
        if (rawApis.length) {
            const mapped = rawApis.map(x => {
                const s = String(x).toLowerCase().trim();
                if (s === '1') return 'api1';
                if (s === '2') return 'api2';
                if (s === '4' || s === 'ppob') return 'api4';
                return s;
            }).filter(Boolean);
            if (mapped.length) return Array.from(new Set(mapped));
        }
    
        const accType = String(currentUser.account_type || 'agen_akrab').toLowerCase();
        if (['all', 'super', 'shared', 'akrab_api2_ppob', 'full'].includes(accType) || accType.includes('all') || (accType.includes('1') && accType.includes('2') && accType.includes('4'))) return ['api1', 'api2', 'api4'];
        if (['akrab_api2', 'api1_api2'].includes(accType) || (accType.includes('1') && accType.includes('2') && !accType.includes('4'))) return ['api1', 'api2'];
        if (['akrab_ppob', 'api1_api4'].includes(accType) || (accType.includes('1') && accType.includes('4') && !accType.includes('2'))) return ['api1', 'api4'];
        if (['api2_ppob', 'kaje_ppob'].includes(accType) || (accType.includes('2') && accType.includes('4') && !accType.includes('1'))) return ['api2', 'api4'];
        if (['api2', 'kaje'].includes(accType)) return ['api2'];
        if (['ppob', 'api4'].includes(accType)) return ['api4'];
        return ['api1'];
    }
    
    function renderHargaServerOptions() {
        const hiddenInp = document.getElementById('hargaServerSelect');
        const container = document.getElementById('hargaServerChips');
        if (!hiddenInp || !currentUser) return;
        const allowed = getUserAllowedApisClient();
        const serverDefs = {
            'api1': { title: 'XL AKRAB', sub: 'utama', icon: 'fa-bolt', img: 'icons/api1.png' },
            'api2': { title: 'AKRAB V2', sub: 'cadangan', icon: 'fa-cubes', img: 'icons/api2.png' },
            'api4': { title: 'PPOB SYSTEM', sub: 'api4', icon: 'fa-layer-group', img: 'icons/api3.png' }
        };
        let curVal = hiddenInp.value;
        if (!curVal || !allowed.includes(curVal)) {
            curVal = allowed[0] || 'api1';
            hiddenInp.value = curVal;
        }
        if (container) {
            let html = '';
            allowed.forEach(function(sKey) {
                const def = serverDefs[sKey] || { title: sKey.toUpperCase(), sub: 'Layanan', icon: 'fa-server', img: 'icons/' + sKey + '.png' };
                const isActive = (sKey === curVal);
                const activeCardStyle = isActive
                    ? 'background: #0f172a !important; color: #ffffff !important; border: 1.5px solid #0f172a !important; box-shadow: 0 8px 16px rgba(15, 23, 42, 0.2) !important;'
                    : 'background: #ffffff !important; color: #334155 !important; border: 1.5px solid #cbd5e1 !important; box-shadow: 0 2px 4px rgba(0,0,0,0.02);';
                const iconColor = isActive ? '#ffffff' : '#0f172a';
                const subColor = isActive ? '#94a3b8' : '#64748b';
                const saldoColor = isActive ? '#10b981' : '#059669';
    
                let srvSaldo = 0;
                if (sKey === 'api1') srvSaldo = (currentUser.saldo_akrab !== undefined) ? currentUser.saldo_akrab : (currentUser.saldo || 0);
                else if (sKey === 'api2') srvSaldo = (currentUser.saldo_api2 !== undefined) ? currentUser.saldo_api2 : 0;
                else if (sKey === 'api4') srvSaldo = (currentUser.saldo_ppob !== undefined) ? currentUser.saldo_ppob : 0;
                
                const saldoFmt = (typeof isBalanceVisible !== 'undefined' && !isBalanceVisible) ? 'Rp ••••••' : ('Rp ' + Number(srvSaldo).toLocaleString('id-ID'));
    
                html += `<div onclick="selectHargaServerChip('${sKey}')" style="display: flex; flex-direction: column; align-items: flex-start; justify-content: space-between; padding: 12px 14px; border-radius: 12px; cursor: pointer; transition: all 0.2s ease; user-select: none; min-height: 85px; ${activeCardStyle}" onmouseover="this.style.borderColor= '${isActive ? '#0f172a' : '#94a3b8'}';" onmouseout="this.style.borderColor= '${isActive ? '#0f172a' : '#cbd5e1'}';">
                    <div style="display: flex; align-items: center; gap: 10px; width: 100%; margin-bottom: 6px;">
                        <div style="font-size: 18px; color: ${iconColor};">
                            <i class="fas ${def.icon}"></i>
                        </div>
                        <div style="flex: 1; text-align: left; overflow: hidden;">
                            <div style="font-size: 11px; font-weight: 800; letter-spacing: -0.2px; white-space: nowrap; text-overflow: ellipsis; overflow: hidden;">${def.title}</div>
                            <div style="font-size: 9px; font-weight: 600; color: ${subColor}; white-space: nowrap;">${def.sub}</div>
                        </div>
                    </div>
                    <div style="width: 100%; border-top: 1px dashed ${isActive ? '#334155' : '#e2e8f0'}; padding-top: 6px; margin-top: auto; display: flex; flex-direction: column; gap: 2px; text-align: left;">
                        <div style="font-size: 8px; font-weight: 700; color: ${isActive ? '#64748b' : '#94a3b8'}; text-transform: uppercase;">SALDO AKTIF</div>
                        <div id="cardServerSaldo_${sKey}" class="mono" style="font-size: 13px; font-weight: 900; color: ${saldoColor}; letter-spacing: -0.3px;">${saldoFmt}</div>
                    </div>
                </div>`;
            });
            container.innerHTML = html;
        }
    }
    
    function selectHargaServerChip(sKey) {
        const hiddenInp = document.getElementById('hargaServerSelect');
        if (hiddenInp) hiddenInp.value = sKey;
        renderHargaServerOptions();
        loadHargaTerkini();
    }
    
    let _plnDebounceTimer = null;
    let _plnMeterState = {
        meterNo: '',
        checked: false,
        loading: false,
        success: false,
        nama: '',
        daya: '',
        raw: null,
        error: ''
    };
    
    function parsePlnSn(rawSn, meterNo) {
        let str = String(rawSn || '').trim();
        if (!str) return null;
        if (/akan diproses|sedang diproses|menunggu/i.test(str) && !str.includes('/')) {
            return null;
        }
        let snPayload = str;
        const snIdx = str.search(/SN\s*[:.]\s*/i);
        if (snIdx >= 0) {
            snPayload = str.slice(snIdx).replace(/^SN\s*[:.]\s*/i, '').trim();
        }
        if (snPayload.includes('/')) {
            const parts = snPayload.split('/').map(p => p.trim()).filter(Boolean);
            if (parts.length >= 4) {
                return {
                    id: parts[0].replace(/\D/g, '') || meterNo,
                    nama: parts[1],
                    tarif: parts[2],
                    daya: parts[3],
                    fullDaya: parts[2] + ' / ' + parts[3]
                };
            }
            if (parts.length === 3) {
                if (/^\d{8}$/.test(parts[0].replace(/\D/g, ''))) {
                    return {
                        id: parts[0].replace(/\D/g, ''),
                        nama: parts[1],
                        tarif: '',
                        daya: parts[2],
                        fullDaya: parts[2]
                    };
                } else {
                    return {
                        id: meterNo,
                        nama: parts[0],
                        tarif: parts[1],
                        daya: parts[2],
                        fullDaya: parts[1] + ' / ' + parts[2]
                    };
                }
            }
            if (parts.length === 2) {
                if (/^\d{8}$/.test(parts[0].replace(/\D/g, ''))) {
                    return {
                        id: parts[0].replace(/\D/g, ''),
                        nama: parts[1],
                        tarif: '',
                        daya: 'PLN Prabayar',
                        fullDaya: 'PLN Prabayar'
                    };
                } else {
                    return {
                        id: meterNo,
                        nama: parts[0],
                        tarif: '',
                        daya: parts[1],
                        fullDaya: parts[1]
                    };
                }
            }
        }
        let namaMatch = snPayload.match(/(?:AN|A\/N|NAMA)\s*[:.]?\s*([A-Za-z0-9\s.]+?)(?:\s+(?:TARIF|DAYA|R\d|\d+VA|\/|$))/i);
        let dayaMatch = snPayload.match(/([RIBSPT]\d+[A-Z]*\s*\/\s*\d+\s*VA)/i) || snPayload.match(/(?:TARIF|DAYA)\s*[:.]?\s*([A-Za-z0-9\/\s]+?)(?:\s+(?:RP|TAG|$))/i);
        if (namaMatch) {
            return {
                id: meterNo,
                nama: namaMatch[1].trim(),
                tarif: '',
                daya: dayaMatch ? dayaMatch[1].trim() : 'PLN Prabayar',
                fullDaya: dayaMatch ? dayaMatch[1].trim() : 'PLN Prabayar'
            };
        }
        return null;
    }
    
    function onPlnMeterInput(val) {
        val = (val || '').trim().replace(/[^0-9]/g, '');
        window._plnMeterInputVal = val;
        if (_plnDebounceTimer) clearTimeout(_plnDebounceTimer);
        const statusBox = document.getElementById('plnCekNamaStatus');
        if (!val || val.length < 9) {
            _plnMeterState = { meterNo: val, checked: false, loading: false, success: false, nama: '', daya: '', raw: null, error: '' };
            if (statusBox) statusBox.innerHTML = '<span style="color:#64748b; font-size:10.5px;"><i class="fas fa-info-circle"></i> Masukkan 11–12 digit No. Meter / ID Pelanggan PLN. Pengecekan nama otomatis setelah 1,3 detik.</span>';
            return;
        }
        if (statusBox) {
            statusBox.innerHTML = '<span style="color:#002dbb; font-size:10.5px; font-weight:700;"><i class="fas fa-clock"></i> Menunggu selesai mengetik (cek nama dalam 1,3 detik)...</span>';
        }
        _plnDebounceTimer = setTimeout(() => {
            executeCekNamaPln(val);
        }, 1300);
    }
    
    async function _runApi4CheckAndPoll(cfg) {
        const apiKey = (currentUser && isUserVerified()) ? currentUser.api_key : '';
        const sToken = (currentUser && currentUser.session_token) ? currentUser.session_token : '';
        const refIdUnik = cfg.refPrefix + Date.now();
        const hdrs = { 'Content-Type': 'application/json', 'X-API-KEY': apiKey, 'X-Session-Token': sToken };
        const getSn = (obj) => (obj && obj.data && obj.data.sn) ? obj.data.sn : ((obj && obj.sn) ? obj.sn : ((obj && obj.data && obj.data.message) ? obj.data.message : (obj ? obj.message : '')));        
        try {
            const res = await fetch('api/paymentsys.php', { method: 'POST', headers: hdrs, body: JSON.stringify({ action: 'order', api: 'api4', kode_produk: cfg.cekCode, kode: cfg.cekCode, target: cfg.targetNo, refid: refIdUnik, api_key: apiKey }) });
            let json = null;
            try { json = JSON.parse(await res.text()); } catch(pe) {}
            const rawSn = getSn(json);
            const parsed = cfg.extract(json, rawSn);
            if (parsed) { cfg.onSuccess(parsed, json); return; }
            const isPendingOrOk = json && (json.status === true || json.success === true || String(json.status_trx).toUpperCase() === 'BERHASIL' || String(json.trx_status).toUpperCase() === 'BERHASIL' || String(json.trx_status).toUpperCase() === 'PENDING' || String(rawSn).includes('diproses'));
            if (isPendingOrOk) {
                if (cfg.statusBox) cfg.statusBox.innerHTML = `<span style="color:#002dbb; font-size:11px; font-weight:800;"><i class="fas fa-spinner fa-spin"></i> ${cfg.waitMsg}</span>`;
                let pollAttempts = 0;
                const pollInterval = setInterval(async () => {
                    pollAttempts++;
                    try {
                        const sRes = await fetch('api/paymentsys.php', { method: 'POST', headers: hdrs, body: JSON.stringify({ action: 'status', api: 'api4', refid: refIdUnik, api_key: apiKey }) });
                        let sJson = null;
                        try { sJson = JSON.parse(await sRes.text()); } catch(pe) {}
                        const sParsed = cfg.extract(sJson, getSn(sJson));
                        if (sParsed) { clearInterval(pollInterval); cfg.onSuccess(sParsed, sJson); return; }
                    } catch(e) {}
                    if (pollAttempts >= 3) { clearInterval(pollInterval); cfg.onTimeout(rawSn, json); }
                }, 1200);
                return;
            }
            const errMsg = (json && (json.message || json.keterangan || (json.data && json.data.message))) ? (json.message || json.keterangan || json.data.message) : cfg.defaultErr;
            cfg.onFail(errMsg, json);
        } catch(err) {
            cfg.onCatch(err);
        }
    }
    async function executeCekNamaPln(meterNo) {
        if (!meterNo || meterNo.length < 9) return;
        const statusBox = document.getElementById('plnCekNamaStatus');
        if (statusBox) statusBox.innerHTML = '<span style="color:#002dbb; font-size:11px; font-weight:800;"><i class="fas fa-spinner fa-spin"></i> Sedang mengecek nama pemilik ID Pelanggan PLN...</span>';
        _plnMeterState.loading = true; _plnMeterState.meterNo = meterNo;
        const applyPlnData = (parsed, rawObj) => {
            _plnMeterState = { meterNo: parsed.id || meterNo, checked: true, loading: false, success: true, nama: parsed.nama, daya: parsed.fullDaya || parsed.daya || 'PLN Prabayar', raw: rawObj, error: '' };
            if (statusBox) statusBox.innerHTML = `<div style="background:#ecfdf5; border:1.5px solid #a7f3d0; border-radius:10px; padding:8px 12px; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:8px;"><div><div style="font-size:12px; font-weight:900; color:#065f46;"><i class="fas fa-circle-check" style="color:#059669;"></i> ${esc(parsed.nama)}</div><div style="font-size:10px; color:#047857; margin-top:2px;">ID: <b class="mono">${esc(parsed.id || meterNo)}</b> &bull; Tarif/Daya: <b>${esc(parsed.fullDaya || parsed.daya)}</b></div></div><span class="badge badge-success" style="font-size:9px;"><i class="fas fa-check"></i> ID VALID</span></div>`;
        };
        await _runApi4CheckAndPoll({
            cekCode: 'CEKPLN', refPrefix: 'CEKPLN_', targetNo: meterNo, statusBox, waitMsg: 'Menunggu balasan data meteran dari server pusat...',
            defaultErr: 'ID Pelanggan tidak ditemukan atau tidak valid.', extract: (j, sn) => parsePlnSn(sn, meterNo), onSuccess: applyPlnData,
            onTimeout: (rawSn, json) => {
                if (rawSn && !/akan diproses/i.test(rawSn)) applyPlnData({ id: meterNo, nama: rawSn, fullDaya: 'PLN Prabayar' }, json);
                else { _plnMeterState = { meterNo, checked: true, loading: false, success: false, nama: '', daya: '', raw: json, error: 'Server pusat masih memproses data meteran. Silakan klik Beli untuk melanjutkan.' }; if (statusBox) statusBox.innerHTML = '<div style="background:#fffbeb; border:1.5px solid #fde68a; border-radius:10px; padding:8px 12px; font-size:11px; color:#b45309;"><i class="fas fa-hourglass-half"></i> Pengecekan sedang antre di server. Silakan pilih nominal token dan klik Beli.</div>'; }
            },
            onFail: (errMsg, json) => {
                _plnMeterState = { meterNo, checked: true, loading: false, success: false, nama: '', daya: '', raw: json, error: errMsg };
                if (statusBox) statusBox.innerHTML = `<div style="background:#fef2f2; border:1.5px solid #fecaca; border-radius:10px; padding:8px 12px; display:flex; justify-content:space-between; align-items:center; gap:8px;"><div style="font-size:11px; color:#991b1b;"><i class="fas fa-circle-xmark" style="color:#dc2626;"></i> ${esc(errMsg)}</div><span class="badge badge-fail" style="font-size:8.5px;">GAGAL CEK</span></div>`;
            },
            onCatch: (err) => { _plnMeterState.loading = false; _plnMeterState.error = err.message; if (statusBox) statusBox.innerHTML = `<div style="background:#fef2f2; border:1.5px solid #fecaca; border-radius:10px; padding:8px 12px; font-size:11px; color:#991b1b;"><i class="fas fa-triangle-exclamation"></i> Gagal koneksi cek PLN: ${esc(err.message)}</div>`; }
        });
    }
    function resetPlnMeterInput() {
        window._plnMeterInputVal = '';
        _plnMeterState = { meterNo: '', checked: false, loading: false, success: false, nama: '', daya: '', raw: null, error: '' };
        renderApi4Menu();
        filterHargaTerkini();
    }
    
    window._plnBulananInquiryData = null;
    window._plnBulananTargetVal = window._plnBulananTargetVal || '';
    
    function getPlnBulananBoxHtml() {
        if (api4NavState.category !== 'CEK&BAYAR PLN BULANAN') return '';
        const curVal = window._plnBulananTargetVal || '';
        const inq = window._plnBulananInquiryData;
        let inqHtml = '';
        if (inq) {
            inqHtml = `
            <div style="background:#ffffff; border:1.5px solid #a7f3d0; border-radius:12px; padding:12px; margin-top:10px; box-shadow:0 2px 8px rgba(16,185,129,0.08);">
              <div style="font-weight:800; font-size:12px; margin-bottom:8px; color:#065f46; border-bottom:1.5px dashed #a7f3d0; padding-bottom:6px; display:flex; justify-content:space-between; align-items:center;">
                <span><i class="fas fa-file-invoice-dollar" style="color:#059669;"></i> RINCIAN TAGIHAN PLN BULANAN</span>
                <span class="badge badge-success" style="font-size:8.5px;"><i class="fas fa-circle-check"></i> TAGIHAN DITEMUKAN</span>
              </div>
              <div class="kv-grid" style="grid-template-columns:110px 1fr; row-gap:5px; font-size:11px; margin-bottom:10px;">
                <div class="k">ID Pelanggan:</div><div class="v mono font-bold" style="color:#002dbb;">${esc(inq.target)}</div>
                <div class="k">Nama Pelanggan:</div><div class="v" style="font-weight:800; color:#0f172a;">${esc(inq.nama)}</div>
                <div class="k">Periode:</div><div class="v mono" style="color:#64748b;">${esc(inq.periode)}</div>
                <div class="k">Jumlah Lembar:</div><div class="v mono">${esc(inq.lembar || '1 Lembar')}</div>
                <div class="k">Tagihan Pokok:</div><div class="v mono">Rp ${Number(inq.tagihan_murni || (inq.amount - (inq.admin || 0))).toLocaleString('id-ID')}</div>
                <div class="k">Biaya Admin:</div><div class="v mono" style="color:#d97706;">+Rp ${Number(inq.admin || 0).toLocaleString('id-ID')}</div>
                <div class="k" style="font-size:10px; font-weight:900; color:#002dbb;">Total Tagihan:</div><div class="v mono" style="font-size:14px; font-weight:900; color:#059669;">Rp ${Number(inq.amount).toLocaleString('id-ID')}</div>
              </div>
              <button type="button" class="btn btn-success btn-block" id="btnBayarPlnBulanan" onclick="executeBayarPlnBulanan()" style="padding:10px; font-size:12px; font-weight:800;">
                <i class="fas fa-bolt"></i> Bayar Tagihan Sekarang (Rp ${Number(inq.amount).toLocaleString('id-ID')})
              </button>
            </div>`;
        }
    
        return `
        <div style="background:linear-gradient(135deg, #eff6ff 0%, #ecfdf5 100%); border:1.5px solid #38bdf8; border-radius:14px; padding:12px 14px; margin-bottom:12px; box-shadow:0 4px 15px rgba(37,99,235,0.08);">
          <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:6px;">
            <span style="font-size:11px; font-weight:800; color:#002dbb; letter-spacing:0.3px; display:flex; align-items:center; gap:6px;">
              <i class="fas fa-file-invoice" style="color:#059669;"></i> CEK & BAYAR PLN PASCA / BULANAN:
            </span>
            <span class="badge badge-cyan" style="font-size:8.5px;"><i class="fas fa-bolt"></i> KODE: CPLA</span>
          </div>
          <div style="display:flex; gap:8px; align-items:center;">
            <div style="flex:1; position:relative;">
              <input type="tel" inputmode="numeric" pattern="[0-9]*" id="plnBulananInput" value="${esc(curVal)}" placeholder="Ketik No. Meter / ID Pelanggan PLN Pascabayar..." onkeydown="if(event.key==='Enter'){executeCekPlnBulanan();}else if(!event.ctrlKey&&!event.metaKey&&event.key.length===1&&!/[0-9]/.test(event.key)){event.preventDefault();}" oninput="this.value=this.value.replace(/\\D/g,''); window._plnBulananTargetVal=this.value;" style="padding:7px 12px; font-size:12px; font-weight:800; font-family:monospace; color:#002dbb; border:1.5px solid #93c5fd; border-radius:9px; width:100%;" />
            </div>
            <button type="button" class="btn btn-primary btn-sm" id="btnCekPlnBulanan" onclick="executeCekPlnBulanan()" style="padding:7px 14px; font-size:11px; font-weight:800; white-space:nowrap;">
              <i class="fas fa-search"></i> Cek Tagihan
            </button>
            ${(curVal || inq) ? `<button type="button" class="btn btn-outline btn-sm" onclick="resetPlnBulananInput()" style="padding:6px 10px; font-size:10px;"><i class="fas fa-rotate-left"></i> Reset</button>` : ''}
          </div>
          <div id="plnBulananStatusWrap" style="margin-top:6px;"></div>
          ${inqHtml}
        </div>`;
    }
    
    async function executeCekPlnBulanan() {
        const inp = document.getElementById('plnBulananInput');
        const meterNo = inp ? inp.value.trim().replace(/\\D/g, '') : '';
        const statusBox = document.getElementById('plnBulananStatusWrap');
        const btn = document.getElementById('btnCekPlnBulanan');
        if (!meterNo || meterNo.length < 8) {
            toast('warn', 'ID Pelanggan Kosong', 'Harap masukkan ID Pelanggan PLN minimal 8 digit!');
            if (inp) inp.focus();
            return;
        }
        window._plnBulananTargetVal = meterNo;
        window._plnBulananInquiryData = null;
        if (btn) { btn.disabled = true; btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Cek...'; }
        if (statusBox) statusBox.innerHTML = '<span style="color:#002dbb; font-size:11px; font-weight:800;"><i class="fas fa-spinner fa-spin"></i> Menghubungi server pusat untuk mengecek tagihan PLN (CPLA)...</span>';
        try {
            const apiKey = (currentUser && isUserVerified()) ? currentUser.api_key : '';
            const refIdUnik = 'INQ_CPLA_' + Date.now();
            const payload = {
                action: 'inquiry',
                api: 'api4',
                kode_produk: 'CPLA',
                kode: 'CPLA',
                target: meterNo,
                refid: refIdUnik,
                api_key: apiKey
            };
            const res = await fetch('api/paymentsys.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-API-KEY': apiKey },
                body: JSON.stringify(payload)
            });
            const rawText = await res.text();
            let json = null;
            try { json = JSON.parse(rawText); } catch(pe) {}
            if (json && (json.status === true || json.success === true)) {
                const d = json.data || json;
                window._plnBulananInquiryData = {
                    payment_token: d.payment_token || json.payment_token,
                    amount: parseInt(d.total_tagihan || d.ttag || json.total_tagihan || json.ttag || 0, 10),
                    tagihan_murni: parseInt(d.tagihan_murni || 0, 10),
                    admin: parseInt(d.admin_fee || json.admin_fee || 0, 10),
                    nama: d.nama_pelanggan || d.nama || json.nama_pelanggan || json.nama || 'Pelanggan PLN',
                    periode: d.periode || json.periode || '-',
                    lembar: d.lembar || json.lembar || '1 Lembar',
                    kode_bayar: d.kode_bayar || json.kode_bayar || 'BPLA',
                    target: meterNo
                };
                if (statusBox) statusBox.innerHTML = '';
                renderApi4Menu();
                toast('success', 'Tagihan Ditemukan', `Tagihan a/n ${window._plnBulananInquiryData.nama}: Rp ${window._plnBulananInquiryData.amount.toLocaleString('id-ID')}`);
            } else {
                const errMsg = (json && (json.message || json.keterangan || (json.data && json.data.message))) ? (json.message || json.keterangan || json.data.message) : 'Tagihan tidak ditemukan atau ID salah/sudah lunas.';
                if (statusBox) {
                    statusBox.innerHTML = `<div style="background:#fef2f2; border:1.5px solid #fecaca; border-radius:10px; padding:7px 11px; color:#991b1b; font-size:10.5px;"><i class="fas fa-circle-xmark" style="color:#dc2626;"></i> ${esc(errMsg)}</div>`;
                }
                toast('error', 'Cek Gagal', errMsg);
            }
        } catch(err) {
            if (statusBox) {
                statusBox.innerHTML = `<div style="background:#fef2f2; border:1.5px solid #fecaca; border-radius:10px; padding:7px 11px; color:#991b1b; font-size:10.5px;"><i class="fas fa-triangle-exclamation"></i> Gagal koneksi cek tagihan: ${esc(err.message)}</div>`;
            }
            toast('error', 'Kesalahan', err.message);
        } finally {
            if (btn) { btn.disabled = false; btn.innerHTML = '<i class="fas fa-search"></i> Cek Tagihan'; }
        }
    }
    
    async function executeBayarPlnBulanan() {
        const inq = window._plnBulananInquiryData;
        if (!inq || !inq.payment_token) return toast('warn', 'Data Kosong', 'Lakukan pengecekan tagihan terlebih dahulu!');
        const sPpob = (currentUser && currentUser.saldo_ppob !== undefined) ? Number(currentUser.saldo_ppob) : 0;
        if (sPpob < inq.amount) {
            document.getElementById('saldoKurangMsg').innerText = `Saldo PPOB (API 4) Anda (Rp ${sPpob.toLocaleString('id-ID')}) tidak mencukupi untuk bayar tagihan sebesar Rp ${inq.amount.toLocaleString('id-ID')}. Silakan lakukan topup ke dompet Saldo PPOB (API 4).`;
            document.getElementById('modalSaldoKurang').style.display = 'flex';
            return;
        }
        if (!confirm(`Konfirmasi Pembayaran PLN Bulanan:\n\n• ID Pelanggan: ${inq.target}\n• Nama: ${inq.nama}\n• Periode: ${inq.periode}\n• Total Bayar: Rp ${inq.amount.toLocaleString('id-ID')}\n\nLanjutkan pembayaran sekarang?`)) return;
    
        const btn = document.getElementById('btnBayarPlnBulanan');
        if (btn) { btn.disabled = true; btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses Pembayaran API 4...'; }
        const refIdUnik = 'PAY_BPLA_' + Date.now() + '_' + Math.floor(Math.random() * 899 + 100);
        try {
            const payload = {
                action: 'bayar',
                api: 'api4',
                payment_token: inq.payment_token,
                refid: refIdUnik,
                api_key: currentUser.api_key
            };
            const res = await fetch('api/paymentsys.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-API-KEY': currentUser.api_key },
                body: JSON.stringify(payload)
            });
            const rawText = await res.text();
            let data = null;
            try { data = JSON.parse(rawText); } catch(pe) {}
            if (data && (data.status === true || String(data.trx_status).toUpperCase() === 'BERHASIL' || String(data.trx_status).toUpperCase() === 'PENDING')) {
                const d = data.data || {};
                document.getElementById('strukRefId').innerText = d.ref_id || refIdUnik;
                document.getElementById('strukProduk').innerText = `Tagihan PLN Bulanan (${inq.kode_bayar || 'BPLA'}) [API4]`;
                document.getElementById('strukTarget').innerText = inq.target;
                document.getElementById('strukHarga').innerText = 'Rp ' + inq.amount.toLocaleString('id-ID');
                document.getElementById('strukSN').innerText = d.sn || data.sn || data.message || 'Pembayaran Berhasil Diproses';
                if (d.sisa_saldo !== undefined) {
                    currentUser.saldo_ppob = d.sisa_saldo;
                    updateBalanceDisplay();
                    document.getElementById('strukSisaSaldo').innerText = 'Rp ' + (d.sisa_saldo).toLocaleString('id-ID');
                } else {
                    currentUser.saldo_ppob = Math.max(0, sPpob - inq.amount);
                    updateBalanceDisplay();
                    document.getElementById('strukSisaSaldo').innerText = 'Rp ' + (currentUser.saldo_ppob).toLocaleString('id-ID');
                }
                document.getElementById('strukPesanStatus').innerText = data.message || 'Pembayaran tagihan PLN Pascabayar berhasil diproses.';
                document.getElementById('modalTrxDiproses').style.display = 'flex';
                resetPlnBulananInput();
                if (typeof loadUserHistory === 'function') loadUserHistory();
            } else {
                const errMsg = (data && (data.message || data.keterangan)) ? (data.message || data.keterangan) : 'Pembayaran tagihan gagal diproses oleh server.';
                alert(errMsg);
            }
        } catch(err) {
            alert('Terjadi kesalahan koneksi saat memproses bayar: ' + err.message);
        } finally {
            if (btn) { btn.disabled = false; btn.innerHTML = `<i class="fas fa-bolt"></i> Bayar Tagihan Sekarang (Rp ${Number(inq.amount).toLocaleString('id-ID')})`; }
        }
    }
    
    function resetPlnBulananInput() {
        window._plnBulananTargetVal = '';
        window._plnBulananInquiryData = null;
        renderApi4Menu();
        filterHargaTerkini();
    }
    
    function getPlnBoxHtml() {
        if (api4NavState.category !== 'Token Listrik') return '';
        const curVal = window._plnMeterInputVal || '';
        let statusInner = '<span style="color:#64748b; font-size:10.5px;"><i class="fas fa-info-circle"></i> Masukkan 11–12 digit No. Meter / ID Pelanggan PLN. Pengecekan nama otomatis setelah 1,3 detik.</span>';
        if (_plnMeterState && _plnMeterState.checked) {
            if (_plnMeterState.success) {
                statusInner = `
                <div style="background:#ecfdf5; border:1.5px solid #a7f3d0; border-radius:10px; padding:8px 12px; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:8px;">
                  <div>
                    <div style="font-size:12px; font-weight:900; color:#065f46;"><i class="fas fa-circle-check" style="color:#059669;"></i> ${esc(_plnMeterState.nama)}</div>
                    <div style="font-size:10px; color:#047857; margin-top:2px;">ID: <b class="mono">${esc(_plnMeterState.meterNo)}</b> &bull; Tarif/Daya: <b>${esc(_plnMeterState.daya)}</b></div>
                  </div>
                  <span class="badge badge-success" style="font-size:9px;"><i class="fas fa-check"></i> ID VALID</span>
                </div>`;
            } else if (_plnMeterState.error) {
                statusInner = `
                <div style="background:#fef2f2; border:1.5px solid #fecaca; border-radius:10px; padding:8px 12px; display:flex; justify-content:space-between; align-items:center; gap:8px;">
                  <div style="font-size:11px; color:#991b1b;"><i class="fas fa-circle-xmark" style="color:#dc2626;"></i> ${esc(_plnMeterState.error)}</div>
                  <span class="badge badge-fail" style="font-size:8.5px;">GAGAL CEK</span>
                </div>`;
            }
        }
        return `
        <div style="background:linear-gradient(135deg, #eff6ff 0%, #f0fdf4 100%); border:1.5px solid #38bdf8; border-radius:14px; padding:12px 14px; margin-bottom:12px; box-shadow:0 4px 15px rgba(37,99,235,0.08);">
          <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:6px;">
            <span style="font-size:11px; font-weight:800; color:#002dbb; letter-spacing:0.3px; display:flex; align-items:center; gap:6px;">
              <i class="fas fa-bolt" style="color:#f59e0b;"></i> INPUT NOMOR METER / ID PELANGGAN PLN:
            </span>
            <span class="badge badge-cyan" style="font-size:8.5px;"><i class="fas fa-wand-magic-sparkles"></i> CEK NAMA OTOMATIS</span>
          </div>
          <div style="display:flex; gap:8px; align-items:center;">
            <div style="flex:1; position:relative;">
              <input type="tel" inputmode="numeric" pattern="[0-9]*" id="plnMeterInput" value="${esc(curVal)}" placeholder="Ketik No. Meter / ID Pelanggan (11-12 digit)..." onkeydown="if(!event.ctrlKey&&!event.metaKey&&event.key.length===1&&!/[0-9]/.test(event.key)){event.preventDefault();}" oninput="this.value=this.value.replace(/\D/g,'');onPlnMeterInput(this.value);" style="padding:7px 12px; font-size:12px; font-weight:800; font-family:monospace; color:#002dbb; border:1.5px solid #93c5fd; border-radius:9px; width:100%;" />
            </div>
            ${curVal ? `<button type="button" class="btn btn-outline btn-sm" onclick="resetPlnMeterInput()" style="padding:6px 10px; font-size:10px;"><i class="fas fa-rotate-left"></i> Reset</button>` : ''}
          </div>
          <div id="plnCekNamaStatus" style="margin-top:8px;">
            ${statusInner}
          </div>
        </div>`;
    }
    
    let _emoneyDebounceTimer = null;
    let _emoneyState = {
        targetNo: '',
        checked: false,
        loading: false,
        success: false,
        nama: '',
        limit: '',
        raw: null,
        error: ''
    };
    window._emoneyGopayType = window._emoneyGopayType || 'customer';
    window._emoneyGrabType = window._emoneyGrabType || 'penumpang';
    
    function parseEmoneySn(rawSn, targetNo) {
        let str = String(rawSn || '').trim();
        if (!str) return null;
        if (/akan diproses|sedang diproses|menunggu/i.test(str) && !str.includes('/')) {
            return null;
        }
        const snIdx = str.search(/SN\s*[:.]\s*/i);
        if (snIdx >= 0) {
            str = str.slice(snIdx).replace(/^SN\s*[:.]\s*/i, '').trim();
        }
        let res = { nomor: targetNo, nama: '', limit: '', raw: str };
        const parts = str.split('/');
        parts.forEach(p => {
            const item = p.trim();
            if (/^NOMOR\s*[:=]/i.test(item)) {
                res.nomor = item.replace(/^NOMOR\s*[:=]\s*/i, '').trim();
            } else if (/^NAMA\s*[:=]/i.test(item)) {
                res.nama = item.replace(/^NAMA\s*[:=]\s*/i, '').trim();
            } else if (/^LIMIT(?: BULANAN)?\s*[:=]/i.test(item)) {
                res.limit = item.replace(/^LIMIT(?: BULANAN)?\s*[:=]\s*/i, '').trim();
            }
        });
        if (!res.nama) {
            let m = str.match(/(?:NAMA|AN|A\/N)\s*[:.]?\s*([A-Za-z0-9\s.]+?)(?:\/|$)/i);
            if (m) res.nama = m[1].trim();
            else if (parts.length >= 2 && !parts[1].includes(':')) res.nama = parts[1].trim();
        }
        if (res.nama) return res;
        return null;
    }
    
    function getEmoneyCekCode(providerName) {
        const p = String(providerName || '').toUpperCase();
        if (p.includes('DANA')) return 'CEKD';
        if (p.includes('GOPAY') || p.includes('GOJEK')) return (window._emoneyGopayType === 'driver') ? 'CEKGJD' : 'CEKGJK';
        if (p.includes('GRAB')) return (window._emoneyGrabType === 'driver') ? 'CEKGRD' : 'CEKGRB';
        if (p.includes('LINKAJA') || p.includes('LINK')) return 'CEKLINK';
        if (p.includes('OVO')) return 'CEKOVO';
        if (p.includes('SHOPEE')) return 'CEKSHP';
        if (p.includes('ISAKU') || p.includes('I.SAKU') || p.includes('SAKU')) return 'CEKISAKU';
        return null;
    }
    
    function onEmoneyTargetInput(val) {
        val = (val || '').trim().replace(/[^0-9]/g, '');
        window._emoneyTargetInputVal = val;
        if (_emoneyDebounceTimer) clearTimeout(_emoneyDebounceTimer);
        const statusBox = document.getElementById('emoneyCekNamaStatus');
        if (!val || val.length < 8) {
            _emoneyState = { targetNo: val, checked: false, loading: false, success: false, nama: '', limit: '', raw: null, error: '' };
            if (statusBox) statusBox.innerHTML = '<span style="color:#64748b; font-size:10.5px;"><i class="fas fa-info-circle"></i> Masukkan nomor HP / akun E-Money. Cek nama otomatis setelah 1,3 detik.</span>';
            return;
        }
        if (statusBox) {
            statusBox.innerHTML = '<span style="color:#002dbb; font-size:10.5px; font-weight:700;"><i class="fas fa-clock"></i> Menunggu selesai mengetik (cek nama dalam 1,3 detik)...</span>';
        }
        _emoneyDebounceTimer = setTimeout(() => {
            executeCekNamaEmoney(val);
        }, 1300);
    }
    
    async function executeCekNamaEmoney(targetNo) {
        if (!targetNo || targetNo.length < 8) return;
        const provider = api4NavState.provider && api4NavState.provider !== 'Semua' ? api4NavState.provider : 'DANA';
        const cekCode = getEmoneyCekCode(provider);
        const statusBox = document.getElementById('emoneyCekNamaStatus');
        if (!cekCode) { _emoneyState = { targetNo, checked: true, loading: false, success: true, nama: provider + ' User', limit: '', raw: null, error: '' }; if (statusBox) statusBox.innerHTML = `<div style="background:#eff6ff; border:1px solid #bfdbfe; border-radius:10px; padding:8px 12px; font-size:11px; color:#002dbb;"><i class="fas fa-circle-check"></i> Nomor siap ditransaksikan untuk <b>${esc(provider)}</b>.</div>`; return; }
        if (statusBox) statusBox.innerHTML = `<span style="color:#002dbb; font-size:11px; font-weight:800;"><i class="fas fa-spinner fa-spin"></i> Sedang mengecek nama akun ${esc(provider)} (${cekCode})...</span>`;
        _emoneyState.loading = true; _emoneyState.targetNo = targetNo;
        const applyEmoneyData = (parsed, rawObj) => {
            _emoneyState = { targetNo: parsed.nomor || targetNo, checked: true, loading: false, success: true, nama: parsed.nama, limit: parsed.limit, raw: rawObj, error: '' };
            if (statusBox) { const limitTxt = parsed.limit ? ` &bull; Limit: <b>Rp ${parseInt(parsed.limit).toLocaleString('id-ID')}</b>` : ''; statusBox.innerHTML = `<div style="background:#ecfdf5; border:1.5px solid #a7f3d0; border-radius:10px; padding:8px 12px; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:8px;"><div><div style="font-size:12px; font-weight:900; color:#065f46;"><i class="fas fa-circle-check" style="color:#059669;"></i> ${esc(parsed.nama)}</div><div style="font-size:10px; color:#047857; margin-top:2px;">No: <b class="mono">${esc(parsed.nomor || targetNo)}</b>${limitTxt}</div></div><span class="badge badge-success" style="font-size:9px;"><i class="fas fa-check"></i> ID VALID</span></div>`; }
        };
        await _runApi4CheckAndPoll({
            cekCode, refPrefix: 'CEK_' + cekCode + '_', targetNo, statusBox, waitMsg: `Menunggu balasan cek akun ${esc(provider)}...`,
            defaultErr: 'Nomor akun E-Money tidak ditemukan atau tidak valid.', extract: (j, sn) => parseEmoneySn(sn, targetNo), onSuccess: applyEmoneyData,
            onTimeout: (rawSn, json) => {
                if (rawSn && !/akan diproses/i.test(rawSn)) applyEmoneyData({ nomor: targetNo, nama: rawSn }, json);
                else { _emoneyState = { targetNo, checked: true, loading: false, success: false, nama: '', raw: json, error: 'Server masih memproses data. Silakan klik Beli untuk melanjutkan.' }; if (statusBox) statusBox.innerHTML = '<div style="background:#fffbeb; border:1.5px solid #fde68a; border-radius:10px; padding:8px 12px; font-size:11px; color:#b45309;"><i class="fas fa-hourglass-half"></i> Pengecekan sedang antre di server. Silakan pilih nominal dan klik Beli.</div>'; }
            },
            onFail: (errMsg, json) => {
                _emoneyState = { targetNo, checked: true, loading: false, success: false, nama: '', raw: json, error: errMsg };
                if (statusBox) statusBox.innerHTML = `<div style="background:#fef2f2; border:1.5px solid #fecaca; border-radius:10px; padding:8px 12px; display:flex; justify-content:space-between; align-items:center; gap:8px;"><div style="font-size:11px; color:#991b1b;"><i class="fas fa-circle-xmark" style="color:#dc2626;"></i> ${esc(errMsg)}</div><span class="badge badge-fail" style="font-size:8.5px;">GAGAL CEK</span></div>`;
            },
            onCatch: (err) => { _emoneyState.loading = false; _emoneyState.error = err.message; if (statusBox) statusBox.innerHTML = `<div style="background:#fef2f2; border:1.5px solid #fecaca; border-radius:10px; padding:8px 12px; font-size:11px; color:#991b1b;"><i class="fas fa-triangle-exclamation"></i> Gagal koneksi cek E-Money: ${esc(err.message)}</div>`; }
        });
    }
    function resetEmoneyTargetInput() {
        window._emoneyTargetInputVal = '';
        _emoneyState = { targetNo: '', checked: false, loading: false, success: false, nama: '', limit: '', raw: null, error: '' };
        renderApi4Menu();
        filterHargaTerkini();
    }
    
    function getEmoneyBoxHtml() {
        if (api4NavState.category !== 'E-Wallet' && api4NavState.category !== 'E-Money') return '';
        const curVal = window._emoneyTargetInputVal || '';
        const curProvider = api4NavState.provider && api4NavState.provider !== 'Semua' ? api4NavState.provider : 'DANA';
        let statusInner = '<span style="color:#64748b; font-size:10.5px;"><i class="fas fa-info-circle"></i> Masukkan nomor HP / akun E-Wallet. Cek nama otomatis setelah 1,3 detik.</span>';
        if (_emoneyState && _emoneyState.checked) {
            if (_emoneyState.success) {
                const limitTxt = _emoneyState.limit ? ` &bull; Limit: <b>Rp ${parseInt(_emoneyState.limit).toLocaleString('id-ID')}</b>` : '';
                statusInner = `
                <div style="background:#ecfdf5; border:1.5px solid #a7f3d0; border-radius:10px; padding:8px 12px; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:8px;">
                  <div>
                    <div style="font-size:12px; font-weight:900; color:#065f46;"><i class="fas fa-circle-check" style="color:#059669;"></i> ${esc(_emoneyState.nama)}</div>
                    <div style="font-size:10px; color:#047857; margin-top:2px;">No: <b class="mono">${esc(_emoneyState.targetNo)}</b>${limitTxt}</div>
                  </div>
                  <span class="badge badge-success" style="font-size:9px;"><i class="fas fa-check"></i> ID VALID</span>
                </div>`;
            } else if (_emoneyState.error) {
                statusInner = `
                <div style="background:#fef2f2; border:1.5px solid #fecaca; border-radius:10px; padding:8px 12px; display:flex; justify-content:space-between; align-items:center; gap:8px;">
                  <div style="font-size:11px; color:#991b1b;"><i class="fas fa-circle-xmark" style="color:#dc2626;"></i> ${esc(_emoneyState.error)}</div>
                  <span class="badge badge-fail" style="font-size:8.5px;">GAGAL CEK</span>
                </div>`;
            }
        }
    
        let subTypeToggle = '';
        if (curProvider.toUpperCase().includes('GOPAY')) {
            subTypeToggle = `
            <div style="display:flex; gap:6px; margin-top:6px; align-items:center;">
              <small style="font-size:9.5px; font-weight:800; color:#002dbb;">Tipe GoPay:</small>
              <button type="button" class="chip ${window._emoneyGopayType === 'customer' ? 'active' : ''}" onclick="window._emoneyGopayType='customer'; getEmoneyBoxHtml(); executeCekNamaEmoney('${curVal}');" style="padding:2px 8px; font-size:9px;">Customer (CEKGJK)</button>
              <button type="button" class="chip ${window._emoneyGopayType === 'driver' ? 'active' : ''}" onclick="window._emoneyGopayType='driver'; getEmoneyBoxHtml(); executeCekNamaEmoney('${curVal}');" style="padding:2px 8px; font-size:9px;">Driver (CEKGJD)</button>
            </div>`;
        } else if (curProvider.toUpperCase().includes('GRAB')) {
            subTypeToggle = `
            <div style="display:flex; gap:6px; margin-top:6px; align-items:center;">
              <small style="font-size:9.5px; font-weight:800; color:#002dbb;">Tipe Grab:</small>
              <button type="button" class="chip ${window._emoneyGrabType === 'penumpang' ? 'active' : ''}" onclick="window._emoneyGrabType='penumpang'; getEmoneyBoxHtml(); executeCekNamaEmoney('${curVal}');" style="padding:2px 8px; font-size:9px;">Penumpang (CEKGRB)</button>
              <button type="button" class="chip ${window._emoneyGrabType === 'driver' ? 'active' : ''}" onclick="window._emoneyGrabType='driver'; getEmoneyBoxHtml(); executeCekNamaEmoney('${curVal}');" style="padding:2px 8px; font-size:9px;">Driver (CEKGRD)</button>
            </div>`;
        }
    
        return `
        <div style="background:linear-gradient(135deg, #eff6ff 0%, #ecfdf5 100%); border:1.5px solid #38bdf8; border-radius:14px; padding:12px 14px; margin-bottom:12px; box-shadow:0 4px 15px rgba(37,99,235,0.08);">
          <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:6px;">
            <span style="font-size:10.5px; font-weight:800; color:#0f172a;">
              INPUT NOMOR TUJUAN E-WALLET (${esc(curProvider)}):
            </span>
            <span class="badge badge-cyan" style="font-size:8px;"><i class="fas fa-wand-magic-sparkles"></i> CEK NAMA OTOMATIS</span>
          </div>
          <div style="display:flex; gap:8px; align-items:center;">
            <div style="flex:1; position:relative;">
              <input type="tel" inputmode="numeric" pattern="[0-9]*" id="emoneyTargetInput" value="${esc(curVal)}" placeholder="Ketik nomor HP e-wallet (Contoh: 08123456789)..." onkeydown="if(!event.ctrlKey&&!event.metaKey&&event.key.length===1&&!/[0-9]/.test(event.key)){event.preventDefault();}" oninput="this.value=this.value.replace(/\D/g,'');onEmoneyTargetInput(this.value);" style="padding:7px 12px; font-size:12px; font-weight:800; font-family:monospace; color:#002dbb; border:1.5px solid #93c5fd; border-radius:9px; width:100%;" />
            </div>
            ${curVal ? `<button type="button" class="btn btn-outline btn-sm" onclick="resetEmoneyTargetInput()" style="padding:6px 10px; font-size:10px;"><i class="fas fa-rotate-left"></i> Reset</button>` : ''}
          </div>
          ${subTypeToggle}
          <div id="emoneyCekNamaStatus" style="margin-top:8px;">
            ${statusInner}
          </div>
        </div>`;
    }
    
    function detectGameTitleSmart(fullTxt, kode, rawSub) {
        const text = (fullTxt + ' ' + kode + ' ' + (rawSub || '')).toLowerCase();
        if (text.includes('mobile legend') || kode.startsWith('DML') || kode.startsWith('ML') || text.includes('mlbb')) return 'Mobile Legends';
        if (text.includes('free fire') || kode.startsWith('DFF') || kode.startsWith('FF') || text.includes('ff max')) return 'Free Fire';
        if (text.includes('pubg') || kode.startsWith('DPUBG')) return 'PUBG Mobile';
        if (text.includes('honor of king') || kode.startsWith('HOK')) return 'Honor of Kings';
        if (text.includes('genshin') || text.includes('crystal genshin')) return 'Genshin Impact';
        if (text.includes('honkai') || text.includes('star rail') || kode.startsWith('HSR')) return 'Honkai Star Rail';
        if (text.includes('roblox') || kode.startsWith('RBLX')) return 'Roblox';
        if (text.includes('call of duty') || text.includes('codm') || kode.startsWith('COD')) return 'Call of Duty';
        if (text.includes('valorant') || kode.startsWith('VALO')) return 'Valorant';
        if (text.includes('point blank') || kode.startsWith('PB')) return 'Point Blank';
        if (text.includes('sausage man') || text.includes('sausage')) return 'Sausage Man';
        if (text.includes('arena of valor') || text.includes('aov')) return 'Arena of Valor';
        if (text.includes('efootball') || text.includes('pes mobile')) return 'eFootball';
        if (text.includes('undawn')) return 'Undawn';
        if (text.includes('lifeafter')) return 'LifeAfter';
        if (text.includes('metal slug')) return 'Metal Slug';
        if (text.includes('lords mobile') || text.includes('lords')) return 'Lords Mobile';
        if (text.includes('ragnarok') || kode.startsWith('RO')) return 'Ragnarok';
        if (text.includes('eggy party') || text.includes('eggy')) return 'Eggy Party';
        if (text.includes('brawl stars') || text.includes('brawl')) return 'Brawl Stars';
        if (text.includes('clash of clans') || text.includes('coc')) return 'Clash of Clans';
        if (text.includes('dragon raja')) return 'Dragon Raja';
        if (text.includes('steam') || kode.startsWith('STM')) return 'Steam Wallet';
        if (text.includes('unipin') || kode.startsWith('UP')) return 'UniPin';
        if (text.includes('razer') || kode.startsWith('RZ')) return 'Razer Gold';
        if (text.includes('google play') || text.includes('gplay')) return 'Google Play';
        if (text.includes('playstation') || text.includes('psn')) return 'PlayStation';
    
        if (rawSub && rawSub.trim() && !/^(game|voucher|digital|umum|all)$/i.test(rawSub.trim())) {
            let s = rawSub.trim();
            return s.charAt(0).toUpperCase() + s.slice(1);
        }
    
        let clean = fullTxt.replace(/(?:voucher|topup|top up|game|diamond|diamonds|dm|promo|instant|fast|murah|membership|weekly|pass|starlight|resmi)\b/gi, '').trim();
        clean = clean.replace(/[^a-z0-9\s]/gi, ' ').replace(/\s+/g, ' ').trim();
        const words = clean.split(' ').filter(w => w.length > 2 && !/^\d+$/.test(w));
        if (words.length >= 2) {
            return (words[0] + ' ' + words[1]).replace(/\b\w/g, l => l.toUpperCase());
        } else if (words.length === 1) {
            return words[0].replace(/\b\w/g, l => l.toUpperCase());
        }
        return 'Game Lainnya';
    }
    
    function detectGameSubfilter(item) {
        const nama = String(item.nama_produk || item.nama || '').toLowerCase();
        const kode = String(item.kode_produk || item.kode || '').toLowerCase();
        const full = (nama + ' ' + kode).toLowerCase();
        const price = parseInt(item.harga || 0, 10);
    
        if (full.includes('weekly') || full.includes('pass') || full.includes('membership') || full.includes('starlight') || full.includes('twilight') || full.includes('member') || full.includes('level up') || full.includes('subscription')) {
            return 'pass';
        }
        const dmMatch = full.match(/(\d+)\s*(?:dm|diamond|diamonds|dm\b|uc|cp|zeny|genesis|crystal)/i);
        const dmCount = dmMatch ? parseInt(dmMatch[1], 10) : 0;
    
        if ((dmCount > 0 && dmCount < 100) || (dmCount === 0 && price > 0 && price < 20000)) return 'small';
        if ((dmCount >= 100 && dmCount <= 500) || (dmCount === 0 && price >= 20000 && price <= 100000)) return 'medium';
        if (dmCount > 500 || price > 100000) return 'large';
        return 'all';
    }
    
    function getGameSubfilterBoxHtml() {
        if (api4NavState.category !== 'Voucher Game' || api4NavState.level < 2 || !api4NavState.provider || api4NavState.provider === 'Semua') return '';
        const curSub = api4NavState.subFilter || 'all';
        const provCheck = api4NavState.provider;
    
        const counts = { all: 0, pass: 0, small: 0, medium: 0, large: 0 };
        rawHargaList.forEach(it => {
            if (it.server !== 'api4' || !it.api4Info) return;
            if (it.api4Info.category !== 'Voucher Game') return;
            if (it.api4Info.provider !== provCheck) return;
            counts.all++;
            const gf = detectGameSubfilter(it);
            counts[gf] = (counts[gf] || 0) + 1;
        });
    
        if (counts.all === 0) return '';
    
        const subDefs = [
            { key: 'all',    icon: 'fa-layer-group', label: 'Semua Denom' },
            { key: 'pass',   icon: 'fa-star',        label: 'Pass & Member' },
            { key: 'small',  icon: 'fa-gem',         label: 'Denom Kecil (<100 DM)' },
            { key: 'medium', icon: 'fa-coins',       label: 'Denom Sedang' },
            { key: 'large',  icon: 'fa-crown',       label: 'Denom Sultan' }
        ];
    
        let chipsHtml = '';
        subDefs.forEach(sd => {
            const c = counts[sd.key] || 0;
            if (c === 0 && sd.key !== 'all') return;
            const isAct = (curSub === sd.key);
            const actStyle = isAct
                ? 'background: linear-gradient(135deg, #7c3aed 0%, #6d28d9 100%) !important; color: #ffffff !important; border: 1.5px solid #7c3aed !important; box-shadow: 0 4px 12px rgba(124, 58, 237, 0.28) !important;'
                : 'background: #ffffff !important; color: #7c3aed !important; border: 1.5px solid #ddd6fe !important;';
            const badgeStyle = isAct
                ? 'background: rgba(255, 255, 255, 0.25); color: #ffffff;'
                : 'background: #faf5ff; color: #7c3aed; border: 1px solid #ddd6fe;';
    
            chipsHtml += `
            <button type="button" class="chip ${isAct ? 'active' : ''}" onclick="setGameSubfilter('${sd.key}')" style="display: inline-flex; align-items: center; gap: 6px; padding: 5px 11px; font-size: 10px; font-weight: 800; border-radius: 20px; cursor: pointer; transition: all 0.18s ease; ${actStyle}">
              <i class="fas ${sd.icon}"></i>
              <span>${sd.label}</span>
              <span style="font-size: 8.5px; font-family: monospace; padding: 1px 6px; border-radius: 10px; font-weight: 800; ${badgeStyle}">${c}</span>
            </button>`;
        });
    
        return `
        <div style="background: linear-gradient(135deg, #faf5ff 0%, #f5f3ff 100%); border: 1.5px solid #c4b5fd; border-radius: 14px; padding: 10px 14px; margin-bottom: 12px; box-shadow: 0 4px 12px rgba(124, 58, 237, 0.06);">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
            <span style="font-size: 10.5px; font-weight: 800; color: #6d28d9; letter-spacing: 0.3px; display: flex; align-items: center; gap: 6px;">
              <i class="fas fa-gamepad" style="color: #7c3aed;"></i> FILTER VARIAN DENOM GAME:
            </span>
            <small style="font-size: 9px; color: #7c3aed; font-weight: 700;">${counts.all} Denom Ditemukan</small>
          </div>
          <div style="display: flex; flex-wrap: wrap; gap: 6px;">
            ${chipsHtml}
          </div>
        </div>`;
    }
    
    function setGameSubfilter(key) {
        api4NavState.subFilter = key;
        renderApi4Menu();
        filterHargaTerkini();
    }
    
    
    function detectDataSubfilter(item) {
        const kode = String(item.kode_produk || item.kode || item.code || '').trim().toUpperCase();
        const nama = String(item.nama_produk || item.nama || item.name || '').trim();
        const full = (nama + ' ' + kode).toLowerCase();
    
        if (full.includes('circle')) return 'circle';
        if (full.includes('bebas puas') || full.includes('bebaspuas') || kode.startsWith('XDP')) return 'bebas_puas';
        if (full.includes('flex') || full.includes('combo flex') || kode.startsWith('XCF')) return 'flex';
        if (full.includes('akrab') || kode.startsWith('XLA') || kode.startsWith('XDA') || kode.startsWith('XVIP')) return 'akrab';
        if (full.includes('all jaringan') || full.includes('semua jaringan')) return 'all_jaringan';
        if (full.includes('hotrod')) return 'hotrod';
        if (full.includes('xtra combo') || full.includes('xcombo') || full.includes('xtra kuota') || kode.startsWith('XCA')) return 'xtra_combo';
    
        if (full.includes('super seru') || full.includes('superseru')) return 'super_seru';
        if (full.includes('internet sakti') || full.includes('combo sakti') || full.includes('sakti')) return 'sakti';
        if (full.includes('omg') || full.includes('ketengan')) return 'omg';
        if (full.includes('gigamax') || full.includes('maxstream')) return 'gigamax';
    
        if (full.includes('freedom internet') || full.includes('freedom int')) return 'freedom_internet';
        if (full.includes('freedom combo') || full.includes('freedom u') || full.includes('freedom')) return 'freedom_combo';
        if (full.includes('yellow')) return 'yellow';
    
        if (full.includes('bronet') || kode.startsWith('AAB')) return 'bronet';
        if (full.includes('aigo') || full.includes('voucher fisik')) return 'aigo';
        if (full.includes('warnet')) return 'warnet';
        if (full.includes('owsem')) return 'owsem';
    
        if (full.includes('happy')) return 'happy';
        if (full.includes('alwayson') || full.includes('always on') || full.includes('aon')) return 'aon';
        if (full.includes('komplit') || full.includes('home')) return 'tri_komplit';
    
        if (full.includes('nonstop') || full.includes('unlimited nonstop')) return 'nonstop';
        if (full.includes('gokil')) return 'gokil';
    
        if (full.includes('kaget')) return 'byu_kaget';
        if (full.includes('nyaman')) return 'byu_nyaman';
        if (full.includes('aman')) return 'byu_aman';
    
        if (/(^|[^0-9a-z])(1|2|3|4|5)[ ]*(hr|hari|d|day)($|[^0-9a-z])/i.test(full) || /(harian|mini|darurat|kilat)/i.test(full)) return 'harian';
        if (/(^|[^0-9a-z])(6|7|10|14|15)[ ]*(hr|hari|d|day)($|[^0-9a-z])/i.test(full) || /(mingguan|seminggu|weekly)/i.test(full)) return 'mingguan';
        if (full.includes('malam') || full.includes('midnight') || full.includes('youtube') || full.includes('tiktok') || full.includes('sosmed') || full.includes('nonton') || full.includes('booster') || full.includes('topping')) return 'addon';
        if (/(28|30|60|90)[ ]*(hr|hari|d|day)/i.test(full) || full.includes('bulanan') || full.includes('reguler') || full.includes('prime')) return 'bulanan';
    
        let clean = nama.replace(/(\d+(?:\.\d+)?\s*(?:gb|mb|tb|rb|k|hr|hari|days?|d|jam))|[0-9]+/gi, ' ').replace(/[^a-zA-Z\s]/g, ' ').trim();
        clean = clean.replace(/\b(paket|data|kuota|nasional|reguler|all|jaringan|internet|zone|zona|plus|extra|promo|murah)\b/gi, '').trim();
        const words = clean.split(/\s+/).filter(w => w.length >= 3);
        if (words.length > 0) return 'dyn_' + words[0].toLowerCase();
    
        return 'lainnya';
    }
    
    function getDataSubfilterBoxHtml() {
        if (api4NavState.category !== 'Paket Data' || api4NavState.level < 2 || !api4NavState.provider || api4NavState.provider === 'Semua') return '';
    
        const curSub = api4NavState.subFilter || 'all';
        const provCheck = api4NavState.provider;
    
        const LABEL_MAP = {
            circle: { label: 'Circle', icon: 'fa-circle-notch' },
            bebas_puas: { label: 'Bebas Puas', icon: 'fa-bolt' },
            flex: { label: 'Combo Flex', icon: 'fa-fire' },
            akrab: { label: 'Akrab', icon: 'fa-users' },
            all_jaringan: { label: 'All Jaringan', icon: 'fa-network-wired' },
            hotrod: { label: 'Hotrod', icon: 'fa-gauge-high' },
            xtra_combo: { label: 'Xtra Combo', icon: 'fa-layer-group' },
            super_seru: { label: 'Super Seru', icon: 'fa-fire' },
            sakti: { label: 'Sakti', icon: 'fa-wand-magic-sparkles' },
            omg: { label: 'OMG!', icon: 'fa-bolt' },
            gigamax: { label: 'GigaMax', icon: 'fa-tv' },
            freedom_internet: { label: 'Freedom Internet', icon: 'fa-shield-halved' },
            freedom_combo: { label: 'Freedom Combo', icon: 'fa-layer-group' },
            yellow: { label: 'Yellow', icon: 'fa-sun' },
            bronet: { label: 'Bronet', icon: 'fa-globe' },
            aigo: { label: 'AIGO', icon: 'fa-ticket' },
            warnet: { label: 'Warnet', icon: 'fa-clock' },
            owsem: { label: 'Owsem', icon: 'fa-sparkles' },
            happy: { label: 'Happy', icon: 'fa-face-smile' },
            aon: { label: 'AlwaysOn', icon: 'fa-infinity' },
            tri_komplit: { label: 'Kuota Komplit', icon: 'fa-box' },
            nonstop: { label: 'Nonstop', icon: 'fa-infinity' },
            gokil: { label: 'Gokil Max', icon: 'fa-bolt' },
            byu_kaget: { label: 'Bikin Kaget', icon: 'fa-bolt' },
            byu_nyaman: { label: 'Bikin Nyaman', icon: 'fa-heart' },
            byu_aman: { label: 'Bikin Aman', icon: 'fa-shield' },
            harian: { label: 'Harian & Mini', icon: 'fa-bolt' },
            mingguan: { label: 'Mingguan (7-14 Hr)', icon: 'fa-calendar-week' },
            addon: { label: 'Khusus & Add-on', icon: 'fa-moon' },
            bulanan: { label: 'Bulanan Reguler', icon: 'fa-box' },
            lainnya: { label: 'Varian Lainnya', icon: 'fa-folder' }
        };
    
        const counts = { all: 0 };
        const dynLabels = {};
    
        rawHargaList.forEach(it => {
            if (it.server !== 'api4' || !it.api4Info) return;
            if (it.api4Info.category !== 'Paket Data') return;
            if (it.api4Info.provider !== provCheck) return;
            counts.all++;
            const sf = detectDataSubfilter(it);
            counts[sf] = (counts[sf] || 0) + 1;
            if (sf.startsWith('dyn_') && !dynLabels[sf]) {
                const rawWord = sf.replace('dyn_', '');
                dynLabels[sf] = rawWord.charAt(0).toUpperCase() + rawWord.slice(1);
            }
        });
    
        if (counts.all === 0) return '';
    
        let chipsHtml = `
        <button type="button" class="chip ${curSub === 'all' ? 'active' : ''}" onclick="setDataSubfilter('all')" style="display: inline-flex; align-items: center; gap: 6px; padding: 5px 11px; font-size: 10px; font-weight: 800; border-radius: 20px; cursor: pointer; transition: all 0.18s ease; ${curSub === 'all' ? 'background: linear-gradient(135deg, #002dbb 0%, #0050d8 100%) !important; color: #ffffff !important; border: 1.5px solid #002dbb !important; box-shadow: 0 4px 12px rgba(0, 45, 187, 0.28) !important;' : 'background: #ffffff !important; color: #002dbb !important; border: 1.5px solid #bcd0ee !important;'}">
          <i class="fas fa-layer-group"></i>
          <span>Semua Varian</span>
          <span style="font-size: 8.5px; font-family: monospace; padding: 1px 6px; border-radius: 10px; font-weight: 800; ${curSub === 'all' ? 'background: rgba(255, 255, 255, 0.25); color: #ffffff;' : 'background: #eff6ff; color: #002dbb; border: 1px solid #bfdbfe;'}">${counts.all}</span>
        </button>`;
    
        const sortedKeys = Object.keys(counts).filter(k => k !== 'all' && counts[k] > 0);
        sortedKeys.sort((a, b) => counts[b] - counts[a]);
    
        sortedKeys.forEach(k => {
            const c = counts[k];
            let label = k;
            let icon = 'fa-tag';
            if (LABEL_MAP[k]) {
                label = LABEL_MAP[k].label;
                icon = LABEL_MAP[k].icon;
            } else if (dynLabels[k]) {
                label = dynLabels[k];
                icon = 'fa-wand-magic-sparkles';
            }
    
            const isAct = (curSub === k);
            const actStyle = isAct
                ? 'background: linear-gradient(135deg, #002dbb 0%, #0050d8 100%) !important; color: #ffffff !important; border: 1.5px solid #002dbb !important; box-shadow: 0 4px 12px rgba(0, 45, 187, 0.28) !important;'
                : 'background: #ffffff !important; color: #002dbb !important; border: 1.5px solid #bcd0ee !important;';
            const badgeStyle = isAct
                ? 'background: rgba(255, 255, 255, 0.25); color: #ffffff;'
                : 'background: #eff6ff; color: #002dbb; border: 1px solid #bfdbfe;';
    
            chipsHtml += `
            <button type="button" class="chip ${isAct ? 'active' : ''}" onclick="setDataSubfilter('${k}')" style="display: inline-flex; align-items: center; gap: 6px; padding: 5px 11px; font-size: 10px; font-weight: 800; border-radius: 20px; cursor: pointer; transition: all 0.18s ease; ${actStyle}">
              <i class="fas ${icon}"></i>
              <span>${label}</span>
              <span style="font-size: 8.5px; font-family: monospace; padding: 1px 6px; border-radius: 10px; font-weight: 800; ${badgeStyle}">${c}</span>
            </button>`;
        });
    
        return `
        <div style="background: linear-gradient(135deg, #eff6ff 0%, #f0fdf4 100%); border: 1.5px solid #93c5fd; border-radius: 14px; padding: 10px 14px; margin-bottom: 12px; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.06);">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
            <span style="font-size: 10.5px; font-weight: 800; color: #002dbb; letter-spacing: 0.3px; display: flex; align-items: center; gap: 6px;">
              <i class="fas fa-filter" style="color: #0050d8;"></i> FILTER LINI PAKET RESMI (${provCheck}):
            </span>
            <small style="font-size: 9px; color: var(--text-sub); font-weight: 700;">${counts.all} Paket Ditemukan</small>
          </div>
          <div style="display: flex; flex-wrap: wrap; gap: 6px;">
            ${chipsHtml}
          </div>
        </div>`;
    }
    
    function setDataSubfilter(key) {
        api4NavState.subFilter = key;
        api4NavState.prefixFilter = '';
        renderApi4Menu();
        filterHargaTerkini();
    }
    
    let api4NavState = {
        level: 0,
        category: '',
        provider: '',
        subFilter: 'all',
        prefixFilter: ''
    };
    
    function isBebasNominalCode(code) {
        if (!code) return false;
        const c = String(code).toUpperCase().trim();
        return ['BBSD', 'BBSDN', 'BBSGOP', 'BBSGPY', 'BBSGOD', 'BBSOVO', 'BBSOVON', 'BBSOVOTP', 'BBSSH', 'BBSSHP', 'BBSSHPP', 'BBSSH002', 'BBSSH003', 'BBSSH004', 'BBSSH005', 'BBSSH007', 'BBSSH008', 'INQSHOPEE', 'BBSTC', 'BBSAKU', 'BBSDOKU', 'BBSASTR', 'BBSVAMDR', 'BBSVABCA', 'BBSVABNI', 'BBSVABRI', 'BBSVACIM', 'BBSVAPMT'].includes(c);
    }
    
    function getApi4Clustering(item) {
        const rawF = String(item.filter || item.kategori || '').trim();
        const rawSub = String(item.subfilter || item.sub_filter || item.kode_provider || '').trim();
        const nama = String(item.nama_produk || item.nama || item.name || '').trim();
        const kode = String(item.kode_produk || item.kode || item.code || '').trim().toUpperCase();
        const fullTxt = (nama + ' ' + kode + ' ' + rawF + ' ' + rawSub).toLowerCase();
    
        let category = 'Tagihan PPOB';
        let icon = 'fa-receipt';
        let provider = 'Umum';
    
        const isByuProduct = fullTxt.includes('by.u') || fullTxt.includes('byu') || kode.startsWith('BYU') || kode.startsWith('VBYU');
        const isDataQuotaIndicator = fullTxt.includes('gb') || fullTxt.includes('mb') || fullTxt.includes('kuota') || fullTxt.includes('data') || fullTxt.includes('bulk') || fullTxt.includes('unlimited') || fullTxt.includes('topping') || fullTxt.includes('bikin') || fullTxt.includes('hari') || fullTxt.includes('kaget') || fullTxt.includes('seminggu') || fullTxt.includes('sebulan') || fullTxt.includes('internas');
    
        if (isByuProduct) {
            provider = 'By.U';
            if (isDataQuotaIndicator && !fullTxt.includes('pulsa reguler') && !fullTxt.includes('pulsa transfer')) {
                category = 'Paket Data';
                icon = 'fa-wifi';
            } else {
                category = 'Pulsa';
                icon = 'fa-mobile-screen-button';
            }
        } else if (isBebasNominalCode(kode) || kode === 'BBSKASPRO' || rawF.toLowerCase().includes('nominal bebas')) {
            category = 'Tf-BebasNominal';
            icon = 'fa-paper-plane';
        } else if (rawF.toLowerCase().includes('token pln') || (kode.startsWith('PLN') && !kode.startsWith('C') && !kode.startsWith('B') && !fullTxt.includes('pasca') && !fullTxt.includes('bulanan'))) {
            category = 'Token Listrik';
            icon = 'fa-bolt';
        } else if (kode.startsWith('CPLA') || kode.startsWith('BPLA') || (fullTxt.includes('pln') && (fullTxt.includes('pasca') || fullTxt.includes('bulanan') || fullTxt.includes('tagihan')))) {
            category = 'CEK&BAYAR PLN BULANAN';
            icon = 'fa-file-invoice';
        } else if (rawF.toLowerCase().includes('tagihan pbb') || kode.startsWith('CPBB') || kode.startsWith('BPBB') || fullTxt.includes('pbb') || fullTxt.includes('pajak bumi')) {
            category = 'Pajak PBB';
            icon = 'fa-building-columns';
        } else if (rawF.toLowerCase().includes('air pdam') || kode.startsWith('CPAM') || kode.startsWith('BPAM') || fullTxt.includes('pdam')) {
            category = 'PDAM';
            icon = 'fa-faucet-drip';
        } else if (kode.startsWith('CBPJS') || kode.startsWith('BBPJS') || fullTxt.includes('bpjs')) {
            category = 'BPJS Kesehatan';
            icon = 'fa-heart-pulse';
        } else if (fullTxt.includes('samsat') || fullTxt.includes('pkb') || fullTxt.includes('pajak kendaraan')) {
            category = 'Pajak Kendaraan';
            icon = 'fa-car';
        } else if (rawF.toLowerCase().includes('finance') || fullTxt.includes('cicilan') || fullTxt.includes('kredit') || fullTxt.includes('leasing') || fullTxt.includes('adira') || fullTxt.includes('fif') || fullTxt.includes('baf') || fullTxt.includes('wom')) {
            category = 'Cicilan Kredit';
            icon = 'fa-credit-card';
        } else if (fullTxt.includes('indihome') || fullTxt.includes('biznet') || fullTxt.includes('first media') || fullTxt.includes('my republic') || fullTxt.includes('myrepublic') || fullTxt.includes('cbn') || fullTxt.includes('iconnet') || fullTxt.includes('bali fiber') || (rawF.toLowerCase().includes('internet') && !rawF.toLowerCase().includes('kuota') && !rawF.toLowerCase().includes('data'))) {
            category = 'Internet & TV';
            icon = 'fa-tv';
        } else if (fullTxt.includes('halo') || fullTxt.includes('matrix') || fullTxt.includes('xplor') || (rawF.toLowerCase().includes('pascabayar') && (fullTxt.includes('telepon') || fullTxt.includes('hp')))) {
            category = 'HP Pascabayar';
            icon = 'fa-mobile-screen-button';
        } else if (rawF.toLowerCase().includes('cetak voucher') || fullTxt.includes('perdana') || fullTxt.includes('voucher fisik') || fullTxt.includes('rub/')) {
            category = 'Cetak Voucher';
            icon = 'fa-ticket';
        } else if (rawF.toLowerCase().includes('sms') || rawF.toLowerCase().includes('telepon') || fullTxt.includes('nelpon') || fullTxt.includes('paket sms')) {
            category = 'SMS & Telpon';
            icon = 'fa-phone-volume';
        } else if (rawF.toLowerCase().includes('dompet digital') || rawF.toLowerCase().includes('e-money') || rawF.toLowerCase().includes('e-wallet') || fullTxt.includes('dana') || fullTxt.includes('ovo') || fullTxt.includes('gopay') || fullTxt.includes('shopeepay') || fullTxt.includes('shopee') || fullTxt.includes('linkaja') || fullTxt.includes('isaku') || fullTxt.includes('grab') || fullTxt.includes('maxim') || fullTxt.includes('astrapay')) {
            category = 'E-Wallet';
            icon = 'fa-wallet';
        } else if (rawF.toLowerCase().includes('digital') || rawF.toLowerCase().includes('game') || fullTxt.includes('mobile legend') || fullTxt.includes('free fire') || fullTxt.includes('pubg') || fullTxt.includes('honor of king') || fullTxt.includes('roblox') || fullTxt.includes('genshin') || fullTxt.includes('steam') || fullTxt.includes('razer') || fullTxt.includes('unipin') || fullTxt.includes('google play') || fullTxt.includes('call of duty')) {
            category = 'Voucher Game';
            icon = 'fa-gamepad';
        } else if (rawF.toLowerCase().includes('kuota') || rawF.toLowerCase().includes('data') || rawF.toLowerCase().includes('bulk')) {
            category = 'Paket Data';
            icon = 'fa-wifi';
        } else if (rawF.toLowerCase().includes('pulsa') || fullTxt.includes('pulsa reguler')) {
            category = 'Pulsa';
            icon = 'fa-mobile-screen-button';
        } else {
            category = 'Tagihan PPOB';
            icon = 'fa-receipt';
        }
    
        if (category === 'Pulsa' || category === 'Paket Data' || category === 'Cetak Voucher' || category === 'SMS & Telpon' || category === 'HP Pascabayar') {
            if (isByuProduct) {
                provider = 'By.U';
            } else if (fullTxt.includes('telkomsel') || fullTxt.includes('tsel')) {
                provider = 'Telkomsel';
            } else if (fullTxt.includes('indosat') || fullTxt.includes('isat') || fullTxt.includes('im3')) {
                provider = 'Indosat';
            } else if (fullTxt.includes('axis')) {
                provider = 'Axis';
            } else if (fullTxt.includes('xl')) {
                provider = 'XL';
            } else if (fullTxt.includes('tri') || fullTxt.includes('three')) {
                provider = 'Tri';
            } else if (fullTxt.includes('smartfren') || fullTxt.includes('smart')) {
                provider = 'Smartfren';
            } else {
                provider = rawSub || 'All Operator';
            }
        } else if (category === 'Token Listrik') {
            if (kode.startsWith('PLNP') || fullTxt.includes('promo')) provider = 'PLN Promo';
            else if (kode.startsWith('PLNB')) provider = 'PLN H2H';
            else if (kode.startsWith('PLNF')) provider = 'PLN Full Reply';
            else provider = 'PLN Reguler';
        } else if (category === 'E-Wallet' || category === 'Tf-BebasNominal') {
            if (fullTxt.includes('dana')) provider = 'DANA';
            else if (fullTxt.includes('gopay') || fullTxt.includes('gojek')) provider = 'GoPay';
            else if (fullTxt.includes('shopee')) provider = 'ShopeePay';
            else if (fullTxt.includes('ovo')) provider = 'OVO';
            else if (fullTxt.includes('linkaja') || fullTxt.includes('link')) provider = 'LinkAja';
            else if (fullTxt.includes('isaku') || fullTxt.includes('i.saku')) provider = 'iSaku';
            else if (fullTxt.includes('grab')) provider = 'Grab';
            else if (fullTxt.includes('maxim')) provider = 'Maxim';
            else if (fullTxt.includes('astrapay')) provider = 'AstraPay';
            else if (fullTxt.includes('doku')) provider = 'Doku';
            else if (fullTxt.includes('kaspro')) provider = 'KasPro';
            else provider = rawSub || 'E-Wallet Lainnya';
        } else if (category === 'Voucher Game') {
            provider = detectGameTitleSmart(fullTxt, kode, rawSub);
        } else if (category === 'PDAM' || category === 'Pajak PBB') {
            if (/surabaya|sidoarjo|malang|gresik|mojokerto|jember|banyuwangi|kediri|blitar|bojonegoro|tuban|lamongan|madiun|magetan|ngawi|ponorogo|pacitan|nganjuk|jombang|lumajang|probolinggo|pasuruan|bondowoso|situbondo|bangkalan|sampang|pamekasan|sumenep|trenggalek|tulungagung|batu/i.test(fullTxt)) {
                provider = 'Jawa Timur';
            } else if (/semarang|solo|surakarta|magelang|salatiga|pekalongan|tegal|banyumas|cilacap|purbalingga|banjarnegara|kebumen|purworejo|wonosobo|boyolali|klaten|sukoharjo|wonogiri|karanganyar|sragen|grobogan|blora|rembang|pati|kudus|jepara|demak|kendal|batang|pemalang|brebes|yogyakarta|sleman|bantul|gunungkidul|kulon progo/i.test(fullTxt)) {
                provider = 'Jawa Tengah & DIY';
            } else if (/bandung|bogor|bekasi|depok|cimahi|cirebon|sukabumi|tasikmalaya|banjar|garut|indramayu|karawang|kuningan|majalengka|pangandaran|purwakarta|subang|sumedang|ciamis|cianjur|tangerang|serang|cilegon|lebak|pandeglang|jakarta|dki/i.test(fullTxt)) {
                provider = 'Jawa Barat, Banten & DKI';
            } else if (/medan|binjai|padang|pekanbaru|batam|palembang|lampung|jambi|bengkulu|aceh/i.test(fullTxt)) {
                provider = 'Sumatera';
            } else if (/pontianak|banjarmasin|balikpapan|samarinda|palangkaraya|tarakan/i.test(fullTxt)) {
                provider = 'Kalimantan';
            } else if (/makassar|manado|palu|kendari|gorontalo/i.test(fullTxt)) {
                provider = 'Sulawesi';
            } else {
                provider = rawSub || 'Wilayah Lainnya';
            }
        } else if (category === 'Cicilan Kredit') {
            if (fullTxt.includes('adira')) provider = 'Adira Finance';
            else if (fullTxt.includes('fif')) provider = 'FIF Group';
            else if (fullTxt.includes('baf')) provider = 'BAF Finance';
            else if (fullTxt.includes('wom')) provider = 'WOM Finance';
            else if (fullTxt.includes('home credit')) provider = 'Home Credit';
            else if (fullTxt.includes('kredivo')) provider = 'Kredivo';
            else provider = rawSub || 'Multifinance Lainnya';
        } else if (category === 'Internet & TV') {
            if (fullTxt.includes('indihome') || fullTxt.includes('speedy') || fullTxt.includes('telkom')) provider = 'IndiHome';
            else if (fullTxt.includes('biznet')) provider = 'Biznet';
            else if (fullTxt.includes('first media')) provider = 'First Media';
            else if (fullTxt.includes('myrepublic') || fullTxt.includes('my republic')) provider = 'MyRepublic';
            else if (fullTxt.includes('iconnet')) provider = 'Iconnet';
            else if (fullTxt.includes('mnc') || fullTxt.includes('vision')) provider = 'MNC Vision';
            else provider = rawSub || 'Provider Lainnya';
        } else {
            provider = rawSub || 'Umum';
        }
    
        return {
            category: category,
            icon: icon,
            provider: provider
        };
    }
    
    function getApi4CandidateItems() {
        return rawHargaList.filter(item => {
            if (item.server !== 'api4' || !item.api4Info) return false;
            if (item.api4Info.category !== api4NavState.category) return false;
            if (api4NavState.category === 'E-Wallet' || api4NavState.category === 'E-Money') {
                const isBbsItem = isBebasNominalCode(item.kode) || item.kode === 'BBSKASPRO';
                if (isBbsItem) return false;
                if (api4NavState.provider && api4NavState.provider !== 'Semua') {
                    const pCheck = api4NavState.provider.toUpperCase();
                    const itemTxt = (item.nama + ' ' + item.kode).toUpperCase();
                    if (!itemTxt.includes(pCheck)) return false;
                }
                return true;
            }
            if (api4NavState.provider && api4NavState.provider !== 'Semua') {
                if (api4NavState.category === 'PDAM' || api4NavState.category === 'Pajak PBB') {
                    if (!item.nama.toLowerCase().includes(api4NavState.provider.toLowerCase())) return false;
                } else {
                    if (item.api4Info.provider !== api4NavState.provider) return false;
                }
            }
            if (api4NavState.category === 'Paket Data' && api4NavState.subFilter && api4NavState.subFilter !== 'all') {
                const sf = detectDataSubfilter(item);
                if (sf !== api4NavState.subFilter) return false;
            }
            return true;
        });
    }
    
    function getPrefixKey(nama) {
        if (!nama) return '';
        let clean = String(nama).trim().replace(/^(Cek&Bayar|Cek Tagihan|Bayar Tagihan|Cek|Bayar)\s+/i, '').trim();
        if (!clean) clean = String(nama).trim();
        const words = clean.split(/\s+/);
        if (words.length >= 2) return (words[0] + ' ' + words[1]).toUpperCase();
        return (words[0] || '').toUpperCase();
    }
    
    function getPrefixDisplay(nama) {
        if (!nama) return '';
        let clean = String(nama).trim().replace(/^(Cek&Bayar|Cek Tagihan|Bayar Tagihan|Cek|Bayar)\s+/i, '').trim();
        if (!clean) clean = String(nama).trim();
        const words = clean.split(/\s+/);
        if (words.length >= 2) return words[0] + ' ' + words[1];
        return words[0] || '';
    }
    
    function getApi4PrefixBoxHtml(candidates) {
        if (!candidates || candidates.length <= 25 || api4NavState.category === 'E-Wallet' || api4NavState.category === 'E-Money') return '';
        const counts = {};
        const displayNames = {};
        candidates.forEach(it => {
            const k = getPrefixKey(it.nama);
            if (k) {
                counts[k] = (counts[k] || 0) + 1;
                if (!displayNames[k]) displayNames[k] = getPrefixDisplay(it.nama);
            }
        });
        const qualified = [];
        let otherCount = 0;
        Object.keys(counts).forEach(k => {
            if (counts[k] >= 2) {
                qualified.push({ key: k, label: displayNames[k], count: counts[k] });
            } else {
                otherCount += counts[k];
            }
        });
        qualified.sort((a, b) => a.label.localeCompare(b.label));
        if (otherCount > 0) {
            qualified.push({ key: '__OTHER__', label: 'Varian Lainnya', count: otherCount });
        }
        if (!qualified.length) return '';
    
        const curPrefix = api4NavState.prefixFilter || '';
        let chipsHtml = '';
        qualified.forEach(g => {
            const isAct = (curPrefix === g.key);
            const actStyle = isAct
                ? 'background: linear-gradient(135deg, #002dbb 0%, #0050d8 100%) !important; color: #ffffff !important; border: 1.5px solid #002dbb !important; box-shadow: 0 4px 12px rgba(0, 45, 187, 0.28) !important;'
                : 'background: #ffffff !important; color: #002dbb !important; border: 1.5px solid #bcd0ee !important;';
            const badgeStyle = isAct
                ? 'background: rgba(255, 255, 255, 0.25); color: #ffffff;'
                : 'background: #eff6ff; color: #002dbb; border: 1px solid #bfdbfe;';
            chipsHtml += `<button type="button" class="chip ${isAct ? 'active' : ''}" onclick="selectApi4PrefixFilter('${g.key.replace(/'/g, "\\'")}')" style="display: inline-flex; align-items: center; gap: 6px; padding: 6px 12px; font-size: 10px; font-weight: 800; border-radius: 20px; cursor: pointer; transition: all 0.18s ease; ${actStyle}">
                <i class="fas fa-layer-group"></i>
                <span>${esc(g.label)}</span>
                <span style="font-size: 8.5px; font-family: monospace; padding: 1px 6px; border-radius: 10px; font-weight: 800; ${badgeStyle}">${g.count}</span>
            </button>`;
        });
    
        return `
        <div style="background: linear-gradient(135deg, #eff6ff 0%, #e0f2fe 100%); border: 1.5px solid #38bdf8; border-radius: 14px; padding: 12px 14px; margin-bottom: 12px; box-shadow: 0 4px 14px rgba(37, 99, 235, 0.08);">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
            <span style="font-size: 10.5px; font-weight: 800; color: #002dbb; letter-spacing: 0.3px; display: flex; align-items: center; gap: 6px;">
              <i class="fas fa-filter" style="color: #0050d8;"></i> PILIH SUB-KATEGORI KHUSUS (${candidates.length} PRODUK):
            </span>
            <small style="font-size: 9px; color: #0369a1; font-weight: 700;">Wajib pilih kelompok varian</small>
          </div>
          <div style="display: flex; flex-wrap: wrap; gap: 6px;">
            ${chipsHtml}
          </div>
        </div>`;
    }
    
    function selectApi4PrefixFilter(key) {
        api4NavState.prefixFilter = key;
        renderApi4Menu();
        filterHargaTerkini();
    }
    
    function api4ResetMenu() {
        api4NavState = {
            level: 0,
            category: '',
            provider: '',
            subFilter: 'all',
            prefixFilter: ''
        };
        renderApi4Menu();
        filterHargaTerkini();
    }
    
    function api4GoBack() {
        if (api4NavState.prefixFilter) {
            api4NavState.prefixFilter = '';
            renderApi4Menu();
            filterHargaTerkini();
            return;
        }
        api4NavState.subFilter = 'all';
        if (api4NavState.level === 2) {
            api4NavState.level = 1;
            api4NavState.provider = '';
        } else if (api4NavState.level === 1) {
            api4NavState.level = 0;
            api4NavState.category = '';
            api4NavState.provider = '';
        }
        renderApi4Menu();
        filterHargaTerkini();
    }
    
    function detectPhoneOperator(phone) {
        phone = String(phone || '').replace(/\D/g, '');
        if (phone.startsWith('62')) phone = '0' + phone.slice(2);
        const p4 = phone.slice(0, 4);
        if (['0811', '0812', '0813', '0821', '0822', '0823', '0852', '0853'].includes(p4)) return 'Telkomsel';
        if (['0814', '0815', '0816', '0855', '0856', '0857', '0858'].includes(p4)) return 'Indosat';
        if (['0817', '0818', '0819', '0859', '0877', '0878'].includes(p4)) return 'XL';
        if (['0831', '0832', '0838'].includes(p4)) return 'Axis';
        if (['0895', '0896', '0897', '0898', '0899'].includes(p4)) return 'Tri';
        if (['0881', '0882', '0883', '0884', '0885', '0886', '0887', '0888', '0889'].includes(p4)) return 'Smartfren';
        if (phone.startsWith('085154') || phone.startsWith('085155') || phone.startsWith('085156') || phone.startsWith('085157')) return 'By.U';
        return '';
    }
    
    function onApi4PhoneAutoDetect(val) {
        const detected = detectPhoneOperator(val);
        const badge = document.getElementById('api4DetectedOpBadge');
        if (detected) {
            if (badge) {
                badge.style.display = 'inline-flex';
                badge.innerHTML = '<i class="fas fa-circle-check"></i> ' + detected;
            }
            if (api4NavState.provider !== detected) {
                api4NavState.provider = detected;
                api4NavState.level = 2;
                renderApi4Menu();
                filterHargaTerkini();
            }
        } else {
            if (badge) badge.style.display = 'none';
        }
    }
    
    function renderApi4Menu() {
        const navBox = document.getElementById('api4MenuNavContainer');
        if (!navBox) return;
    
        const api4Items = rawHargaList.filter(it => it.server === 'api4' && !isHiddenApi4BayarItem(it));
    
        if (!api4Items.length) {
            navBox.innerHTML = '<div style="text-align:center; padding:15px; color:var(--text-sub); font-size:11px;">Belum ada produk API 4</div>';
            return;
        }
    
        if (api4NavState.level === 0) {
            const ppobServices = [
              ['Pulsa','Pulsa','fa-mobile-screen-button','#f97316,#ea580c'],
              ['Paket Data','Paket Data','fa-wifi','#0284c7,#0050d8'],
              ['Token Listrik','Token PLN','fa-bolt','#f59e0b,#d97706'],
              ['CEK&BAYAR PLN BULANAN','Cek& Bayar PLN Bulanan','fa-file-invoice','#0d9488,#0f766e'],
              ['E-Wallet','E-Wallet','fa-wallet','#10b981,#059669'],
              ['Voucher Game','Game','fa-gamepad','#8b5cf6,#6d28d9'],
              ['PDAM','Air PDAM','fa-faucet-drip','#06b6d4,#0284c7'],
              ['BPJS Kesehatan','BPJS','fa-heart-pulse','#16a34a,#15803d'],
              ['Internet & TV','Internet / TV','fa-tv','#e11d48,#be123c'],
              ['Cicilan Kredit','Multifinance','fa-credit-card','#b45309,#92400e'],
              ['Cetak Voucher','Voucher Fisik','fa-ticket','#6366f1,#4f46e5'],
              ['SMS & Telpon','SMS & Telpon','fa-phone-volume','#0ea5e9,#0284c7'],
              ['Pajak PBB','Pajak PBB','fa-building-columns','#475569,#334155'],
              ['Pajak Kendaraan','SAMSAT','fa-car','#ea580c,#c2410c'],
              ['HP Pascabayar','HP Pasca','fa-mobile-screen','#4338ca,#3730a3'],
              ['Tagihan PPOB','Lainnya','fa-receipt','#64748b,#475569']
            ].map(([name, label, icon, c]) => { const [c1, c2] = c.split(','); return { name, label, icon, bg: `linear-gradient(135deg, ${c1} 0%, ${c2} 100%)` }; });
            let menuHtml = `
            <div onclick="openModalBebasNominalEwallet()" style="background: linear-gradient(135deg, #001a70 0%, #002dbb 50%, #059669 100%); border: 2px solid #38bdf8; border-radius: 14px; padding: 11px 14px; margin-bottom: 12px; box-shadow: 0 4px 16px rgba(0, 45, 187, 0.2); cursor: pointer; display: flex; align-items: center; justify-content: space-between; gap: 10px; transition: transform 0.18s ease;" onmouseover="this.style.transform='translateY(-1px)';" onmouseout="this.style.transform='none';">
              <div style="display: flex; align-items: center; gap: 10px; min-width: 0;">
                <div style="width: 38px; height: 38px; border-radius: 10px; background: rgba(255, 255, 255, 0.18); border: 1.5px solid rgba(255, 255, 255, 0.4); display: flex; align-items: center; justify-content: center; color: #00d2d3; font-size: 17px; flex-shrink: 0;">
                  <i class="fas fa-paper-plane"></i>
                </div>
                <div style="min-width: 0;">
                  <div style="display: flex; align-items: center; gap: 5px; flex-wrap: wrap;">
                    <b style="font-size: 12.5px; color: #ffffff;">Transfer Bebas Nominal E-Wallet</b>
                    <span class="badge" style="background: #fef08a; color: #854d0e; font-size: 7.5px; padding: 1.5px 5px; border-radius: 5px; font-weight: 900;">INSTAN</span>
                  </div>
                  <small style="font-size: 9.5px; color: #bae6fd; display: block; margin-top: 1px;">DANA, GoPay, Grab, ShopeePay, OVO &bull; Cek Nama Otomatis</small>
                </div>
              </div>
              <div style="width: 24px; height: 24px; border-radius: 50%; background: #ffffff; color: #002dbb; display: flex; align-items: center; justify-content: center; font-size: 9.5px; font-weight: 900; flex-shrink: 0;">
                <i class="fas fa-arrow-right"></i>
              </div>
            </div>
    
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 4px;">
              <span style="font-size: 10.5px; font-weight: 800; color: #002dbb; letter-spacing: 0.3px; display: flex; align-items: center; gap: 5px;">
                <i class="fas fa-shapes" style="color: #0050d8;"></i> MENU LAYANAN PPOB:
              </span>
              <small style="font-size: 9px; color: var(--text-sub); font-weight: 700;">Pilih kategori layanan</small>
            </div>
            <div class="ppob-service-grid">`;
    
            ppobServices.forEach(s => {
                menuHtml += `
                <div class="ppob-service-item" onclick="api4SelectCategory('${s.name}')">
                  <div class="ppob-icon-squircle" style="background: ${s.bg};">
                    <i class="fas ${s.icon}"></i>
                  </div>
                  <span class="ppob-service-label">${s.label}</span>
                </div>`;
            });
    
            menuHtml += `</div>`;
            navBox.innerHTML = menuHtml;
            return;
        }
    
        if (api4NavState.level === 1 || api4NavState.level === 2) {
            const isSmartLoc = (api4NavState.category === 'PDAM' || api4NavState.category === 'Pajak PBB');
            const isPhoneCategory = (api4NavState.category === 'Pulsa' || api4NavState.category === 'Paket Data');
            const isGameCategory = (api4NavState.category === 'Voucher Game');
            const isBigMenuCategory = (isPhoneCategory || isGameCategory || api4NavState.category === 'Cetak Voucher' || api4NavState.category === 'SMS & Telpon');
    
            if (api4NavState.level === 1 && isBigMenuCategory && !isSmartLoc) {
                let topBarHtml = `
                <div style="display: flex; justify-content: space-between; align-items: center; gap: 8px; margin-bottom: 10px; padding: 7px 10px; background: #ffffff; border: 1.5px solid #bcd0ee; border-radius: 11px; box-shadow: 0 2px 6px rgba(0, 45, 187, 0.04);">
                  <button type="button" class="btn btn-outline btn-sm" onclick="api4ResetMenu()" style="padding: 4px 9px; font-size: 10px; font-weight: 800; border-radius: 7px; color: #002dbb !important; display: inline-flex; align-items: center; gap: 5px;">
                    <i class="fas fa-arrow-left"></i> Menu Utama
                  </button>
                  <div style="font-size: 11px; color: #002dbb; font-weight: 900; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                    Pilih ${isGameCategory ? 'Game' : 'Operator'} &rsaquo; <span style="color:#059669;">${esc(api4NavState.category)}</span>
                  </div>
                </div>`;
    
                let phoneInputHtml = '';
                if (isPhoneCategory) {
                    phoneInputHtml = `
                    <div style="background: #ffffff; border: 1.5px solid #93c5fd; border-radius: 12px; padding: 10px 12px; margin-bottom: 12px; box-shadow: 0 2px 8px rgba(37, 99, 235, 0.06);">
                      <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 4px;">
                        <label style="font-size: 9.5px; font-weight: 800; color: #002dbb; margin-bottom: 0; display: flex; align-items: center; gap: 5px;">
                          <i class="fas fa-mobile-screen"></i> NOMOR TUJUAN (AUTO-DETECT OPERATOR)
                        </label>
                        <span id="api4DetectedOpBadge" class="badge badge-success" style="display: none; font-size: 8px;"></span>
                      </div>
                      <div class="search-wrap" style="position: relative;">
                        <i class="fas fa-phone" style="left: 9px; color: #002dbb; font-size: 10.5px;"></i>
                        <input type="tel" inputmode="numeric" pattern="[0-9]*" id="api4SmartPhoneInput" placeholder="Ketik nomor HP untuk auto-select operator..." oninput="this.value=this.value.replace(/\D/g,''); onApi4PhoneAutoDetect(this.value);" style="padding: 6px 10px 6px 27px; font-size: 11px; font-weight: 800; font-family: monospace; border: 1.5px solid #bcd0ee; border-radius: 8px; width: 100%;" />
                      </div>
                    </div>`;
                }
    
                const provMap = {};
                api4Items.filter(it => it.api4Info && it.api4Info.category === api4NavState.category).forEach(it => {
                    const p = it.api4Info.provider || 'Umum';
                    provMap[p] = (provMap[p] || 0) + 1;
                });
    
                const provList = Object.keys(provMap).sort();
    
                let gridCardsHtml = `
                <div style="margin-bottom: 6px; font-size: 10.5px; font-weight: 800; color: #002dbb; display: flex; justify-content: space-between; align-items: center;">
                  <span><i class="fas ${isGameCategory ? 'fa-gamepad' : 'fa-shapes'}"></i> ${isGameCategory ? 'PILIH GAME FAVORIT:' : 'PILIH OPERATOR RESMI:'}</span>
                  <small style="font-size: 9px; color: var(--text-sub); font-weight: 700;">${provList.length} Pilihan</small>
                </div>
                <div class="ppob-provider-grid">`;
    
                provList.forEach(provName => {
                    const count = provMap[provName] || 0;
                    let iconBg = 'linear-gradient(135deg, #002dbb 0%, #0050d8 100%)';
                    let iconClass = 'fa-wifi';
                    const pLow = provName.toLowerCase();
    
                    if (isGameCategory) {
                        iconBg = 'linear-gradient(135deg, #7c3aed 0%, #4f46e5 100%)';
                        iconClass = 'fa-gamepad';
                        if (pLow.includes('mobile legend')) iconClass = 'fa-shield-halved';
                        else if (pLow.includes('free fire')) iconClass = 'fa-fire';
                        else if (pLow.includes('pubg')) iconClass = 'fa-crosshairs';
                        else if (pLow.includes('roblox')) iconClass = 'fa-cube';
                        else if (pLow.includes('steam')) iconClass = 'fa-steam';
                        else if (pLow.includes('genshin') || pLow.includes('honkai')) iconClass = 'fa-wand-magic-sparkles';
                    } else {
                        if (pLow.includes('telkomsel')) { iconBg = 'linear-gradient(135deg, #dc2626 0%, #b91c1c 100%)'; iconClass = 'fa-signal'; }
                        else if (pLow.includes('indosat')) { iconBg = 'linear-gradient(135deg, #f59e0b 0%, #dc2626 100%)'; iconClass = 'fa-bolt'; }
                        else if (pLow.includes('xl')) { iconBg = 'linear-gradient(135deg, #002dbb 0%, #0284c7 100%)'; iconClass = 'fa-network-wired'; }
                        else if (pLow.includes('axis')) { iconBg = 'linear-gradient(135deg, #7c3aed 0%, #9333ea 100%)'; iconClass = 'fa-wifi'; }
                        else if (pLow.includes('tri') || pLow.includes('three')) { iconBg = 'linear-gradient(135deg, #1e293b 0%, #ea580c 100%)'; iconClass = 'fa-3'; }
                        else if (pLow.includes('smartfren')) { iconBg = 'linear-gradient(135deg, #e11d48 0%, #be123c 100%)'; iconClass = 'fa-mobile-screen-button'; }
                        else if (pLow.includes('by.u') || pLow.includes('byu')) { iconBg = 'linear-gradient(135deg, #0284c7 0%, #00d2d3 100%)'; iconClass = 'fa-circle-nodes'; }
                    }
    
                    gridCardsHtml += `
                    <div class="ppob-provider-card" onclick="api4SelectProvider('${esc(provName).replace(/'/g, "\\'")}')">
                      <div style="width: 44px; height: 44px; border-radius: 14px; background: ${iconBg}; display: flex; align-items: center; justify-content: center; color: #ffffff; font-size: 20px; box-shadow: 0 4px 12px rgba(0,45,187,0.18); margin-bottom: 7px; border: 1.5px solid rgba(255,255,255,0.7);">
                        <i class="fas ${iconClass}"></i>
                      </div>
                      <div style="font-size: 11px; font-weight: 900; color: #00174f; line-height: 1.25; margin-bottom: 3px; max-width: 100%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                        ${esc(provName)}
                      </div>
                      <span style="font-size: 8.5px; font-weight: 800; color: #002dbb; background: #eff6ff; border: 1px solid #bfdbfe; padding: 2px 7px; border-radius: 10px;">
                        ${count} ${isGameCategory ? 'Denom' : 'Paket'}
                      </span>
                    </div>`;
                });
    
                gridCardsHtml += `</div>`;
                navBox.innerHTML = topBarHtml + phoneInputHtml + gridCardsHtml;
                return;
            }
    
            let topBarHtml = `
            <div style="display: flex; justify-content: space-between; align-items: center; gap: 8px; margin-bottom: 9px; padding: 7px 10px; background: #ffffff; border: 1.5px solid #bcd0ee; border-radius: 11px; box-shadow: 0 2px 6px rgba(0, 45, 187, 0.04);">
              <button type="button" class="btn btn-outline btn-sm" onclick="api4GoBack()" style="padding: 4px 9px; font-size: 10px; font-weight: 800; border-radius: 7px; color: #002dbb !important; display: inline-flex; align-items: center; gap: 5px;">
                <i class="fas fa-arrow-left"></i> ${isBigMenuCategory ? ('Ganti ' + (isGameCategory ? 'Game' : 'Operator')) : 'Kembali'}
              </button>
              <div style="font-size: 10.5px; color: #002dbb; font-weight: 900; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                ${api4NavState.category}${api4NavState.provider && api4NavState.provider !== 'Semua' ? ' &rsaquo; <span style="color:#059669;">' + esc(api4NavState.provider) + '</span>' : ''}
              </div>
            </div>`;
    
            let phoneInputHtml = '';
            if (isPhoneCategory) {
                phoneInputHtml = `
                <div style="background: #ffffff; border: 1.5px solid #93c5fd; border-radius: 12px; padding: 10px 12px; margin-bottom: 10px; box-shadow: 0 2px 8px rgba(37, 99, 235, 0.06);">
                  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 4px;">
                    <label style="font-size: 9.5px; font-weight: 800; color: #002dbb; margin-bottom: 0; display: flex; align-items: center; gap: 5px;">
                      <i class="fas fa-mobile-screen"></i> NOMOR TUJUAN (AUTO-DETECT OPERATOR)
                    </label>
                    <span id="api4DetectedOpBadge" class="badge badge-success" style="display: none; font-size: 8px;"></span>
                  </div>
                  <div class="search-wrap" style="position: relative;">
                    <i class="fas fa-phone" style="left: 9px; color: #002dbb; font-size: 10.5px;"></i>
                    <input type="tel" inputmode="numeric" pattern="[0-9]*" id="api4SmartPhoneInput" placeholder="Contoh: 081234567890 (Ketik untuk filter otomatis)..." oninput="this.value=this.value.replace(/\D/g,''); onApi4PhoneAutoDetect(this.value);" style="padding: 6px 10px 6px 27px; font-size: 11px; font-weight: 800; font-family: monospace; border: 1.5px solid #bcd0ee; border-radius: 8px; width: 100%;" />
                  </div>
                </div>`;
            }
    
            if (isSmartLoc) {
                let menuHtml = topBarHtml + `
                <div style="margin-bottom: 6px; font-size: 10.5px; font-weight: 800; color: #002dbb;"><i class="fas fa-map-marker-alt"></i> PILIH WILAYAH:</div>
                <div class="search-wrap" style="margin-bottom: 8px;">
                    <i class="fas fa-search" style="left: 9px; color: #002dbb; font-size: 10px;"></i>
                    <input type="text" id="api4LocSearch" placeholder="Ketik nama kabupaten/kota..." onkeyup="api4FilterLoc()" style="padding: 5px 8px 5px 25px; font-size: 10px; min-height: 28px; border-radius: 8px; border: 1.5px solid #bcd0ee; width: 100%;" />
                </div>
                <div id="api4LocChips" style="display: flex; flex-wrap: wrap; gap: 5px; max-height: 180px; overflow-y: auto; padding-right: 4px;">
                `;
                const locs = new Set();
                api4Items.filter(it => it.api4Info && it.api4Info.category === api4NavState.category).forEach(it => {
                    let loc = it.nama || "";
                    loc = loc.replace(/^(?:Cek&Bayar|Cek\s+Tagihan|Bayar\s+Tagihan|Cek|Bayar)\s+/gi, "");
                    loc = loc.replace(/^(?:Cek&Bayar|Bayar|Cek)\s+/gi, "");
                    loc = loc.replace(/^(?:PDAM|PAM|PBB|Pajak\s+PBB)\s+/i, "");
                    loc = loc.trim();
                    if (loc) locs.add(loc);
                });
                const sortedLocs = Array.from(locs).sort();
                sortedLocs.forEach(loc => {
                    menuHtml += `<button type="button" class="chip api4-loc-chip" data-loc="${loc.toLowerCase()}" onclick="api4SelectLoc('${loc.replace(/'/g, "\\'")}')" style="font-size: 9.5px; padding: 4px 9px;">${loc}</button>`;
                });
                menuHtml += `</div>`;
                navBox.innerHTML = menuHtml;
                window.api4FilterLoc = function() {
                    const q = document.getElementById('api4LocSearch').value.toLowerCase();
                    const chips = document.querySelectorAll('.api4-loc-chip');
                    chips.forEach(c => {
                        if (c.getAttribute('data-loc').includes(q)) c.style.display = 'inline-flex';
                        else c.style.display = 'none';
                    });
                };
                window.api4SelectLoc = function(loc) {
                    api4NavState.provider = loc;
                    api4NavState.level = 2;
                    api4NavState.prefixFilter = '';
                    renderApi4Menu();
                    filterHargaTerkini();
                };
                return;
            }
    
            const plnBoxHtml = (typeof getPlnBoxHtml === 'function') ? getPlnBoxHtml() : '';
            const plnBulananBoxHtml = (typeof getPlnBulananBoxHtml === 'function') ? getPlnBulananBoxHtml() : '';
            const emoneyBoxHtml = (typeof getEmoneyBoxHtml === 'function') ? getEmoneyBoxHtml() : '';
            const prefixBoxHtml = (api4NavState.category === 'Token Listrik' && typeof getApi4PrefixBoxHtml === 'function') ? getApi4PrefixBoxHtml(getApi4CandidateItems()) : '';
            const dataBoxHtml = (typeof getDataSubfilterBoxHtml === 'function') ? getDataSubfilterBoxHtml() : '';
            const gameBoxHtml = (typeof getGameSubfilterBoxHtml === 'function') ? getGameSubfilterBoxHtml() : '';
    
            if (api4NavState.category === 'CEK&BAYAR PLN BULANAN') {
                navBox.innerHTML = topBarHtml + plnBulananBoxHtml;
                return;
            }
    
            let horizontalChipsHtml = '';
            if (!isBigMenuCategory) {
                let provList = [];
                if (api4NavState.category === 'E-Wallet' || api4NavState.category === 'E-Money') {
                    provList = ['DANA', 'GoPay', 'ShopeePay', 'OVO', 'LinkAja', 'Grab', 'iSaku', 'AstraPay', 'Maxim', 'KasPro', 'DOKU'];
                } else {
                    const provMap = {};
                    api4Items.filter(it => it.api4Info && it.api4Info.category === api4NavState.category).forEach(it => {
                        const p = it.api4Info.provider || 'Semua';
                        provMap[p] = (provMap[p] || 0) + 1;
                    });
                    provList = Object.keys(provMap).sort();
                }
    
                horizontalChipsHtml = `
                <div style="margin-bottom: 5px; font-size: 10px; font-weight: 800; color: #002dbb; display: flex; justify-content: space-between; align-items: center;">
                   <span><i class="fas fa-layer-group"></i> PILIH PROVIDER / OPERATOR:</span>
                   <small style="font-size: 8.5px; color: var(--text-sub); font-weight: 700;">Geser horizontal &rsaquo;</small>
                 </div>
                 <div style="display: flex; gap: 5px; overflow-x: auto; padding-bottom: 4px; margin-bottom: 6px; scrollbar-width: none;">`;
    
                if (api4NavState.category !== 'E-Wallet' && api4NavState.category !== 'E-Money') {
                    const isAllAct = (!api4NavState.provider || api4NavState.provider === 'Semua');
                    horizontalChipsHtml += `
                    <button type="button" class="chip ${isAllAct ? 'active' : ''}" onclick="api4SelectProvider('Semua')" style="white-space: nowrap; flex-shrink: 0; padding: 5px 10px; font-size: 9.5px; font-weight: 800;">
                      <i class="fas fa-border-all"></i> Semua
                    </button>`;
                }
    
                provList.forEach(provName => {
                    const isAct = (api4NavState.provider === provName);
                    horizontalChipsHtml += `
                    <button type="button" class="chip ${isAct ? 'active' : ''}" onclick="api4SelectProvider('${provName.replace(/'/g, "\\'")}')" style="white-space: nowrap; flex-shrink: 0; padding: 5px 10px; font-size: 9.5px; font-weight: 800;">
                      ${provName}
                    </button>`;
                });
    
                horizontalChipsHtml += `</div>`;
            }
    
            navBox.innerHTML = topBarHtml + phoneInputHtml + plnBoxHtml + emoneyBoxHtml + dataBoxHtml + gameBoxHtml + prefixBoxHtml + horizontalChipsHtml;
            return;
        }
    }
    
    function api4SelectCategory(catName) {
        api4NavState.category = catName;
        api4NavState.level = (catName === 'CEK&BAYAR PLN BULANAN') ? 2 : 1;
        api4NavState.provider = (catName === 'CEK&BAYAR PLN BULANAN') ? 'PLN' : '';
        api4NavState.subFilter = 'all';
        api4NavState.prefixFilter = '';
        renderApi4Menu();
        filterHargaTerkini();
    }
    
    function api4SelectProvider(provName) {
        api4NavState.provider = provName;
        api4NavState.level = 2;
        api4NavState.subFilter = 'all';
        api4NavState.prefixFilter = '';
        renderApi4Menu();
        filterHargaTerkini();
    }
    
    function extractItemData(item) {
        let nama = item.nama_produk || item.keterangan || item.produk || item.name || item.nama || '-';
        const kode = (item.kode_produk || item.kode || item.code || '-').trim();
        const harga = parseInt(item.harga_final || item.harga_jual || item.price || item.harga || 0);
        const jProdItem = (item.jenis_produk || (item.raw && item.raw.jenis_produk) || '').toLowerCase();
        const kodeUpItem = kode.toUpperCase();
        const isCekNamaItem = (jProdItem === 'ceknama' || kodeUpItem.startsWith('CEK'));
        const isPPOBTagihan = !isCekNamaItem && (jProdItem === 'cek&bayar' || (kodeUpItem.startsWith('C') && kodeUpItem.length >= 4 && !kodeUpItem.startsWith('COMBO') && !kodeUpItem.startsWith('CODM') && !kodeUpItem.startsWith('CPSBB') && !/^C\d+BB$/.test(kodeUpItem)) || kodeUpItem.startsWith('INQ'));
        if (isPPOBTagihan) {
            if (/^cek\s+tagihan\s+/i.test(nama)) {
                nama = nama.replace(/^cek\s+tagihan\s+/i, "Cek&Bayar ");
            } else if (/^cek\s+/i.test(nama)) {
                nama = nama.replace(/^cek\s+/i, "Cek&Bayar ");
            } else if (!nama.toLowerCase().includes("cek&bayar")) {
                nama = "Cek&Bayar " + nama;
            }
        }
    
        const serverSelect = document.getElementById('hargaServerSelect');
        const sVal = serverSelect ? serverSelect.value.replace('.php', '') : 'api1';
        const isApi1 = (sVal === 'api1');
        const isApi2 = (sVal === 'api2');
        const isApi4 = (sVal === 'api4');
        
        const isVirtual = !!(item.is_virtual || item.isVirtual || (item.raw && (item.raw.is_virtual || item.raw.isVirtual)));
        let stockVal = item.stock !== undefined ? String(item.stock) : '999';
        if (isVirtual && (stockVal === '0' || !stockVal || stockVal === 'undefined')) {
            stockVal = '99';
        }
        const gangguan = !isVirtual && (item.gangguan === 1 || item.gangguan === '1');
        const stockNum = parseInt(stockVal, 10);
        const kosong = !isVirtual && (stockVal === '0' || (isNaN(stockNum) ? (item.kosong === 1 || item.kosong === '1') : stockNum <= 0));
        const isAvailable = isVirtual ? true : (!kosong && !gangguan);
    
        
        const customCat = (item.filter || item.kategori || item.category || '').trim();
        const kodeUpper = kode.toUpperCase();
        let kategori = customCat;
    
        let api4Info = null;
        if (isApi4) {
            api4Info = getApi4Clustering(Object.assign({}, item, { nama: nama, kode: kode }));
            kategori = api4Info.category;
        } else if (isApi1) {
            if (customCat && customCat.toUpperCase() !== 'UMUM' && !kodeUpper.startsWith('XL') && !kodeUpper.startsWith('AX') && !kodeUpper.startsWith('AIGO')) {
                kategori = customCat;
            } else if (kodeUpper.startsWith('XLA')) {
                kategori = 'Akrab Fresh (XLA)';
            } else if (kodeUpper.startsWith('XDA')) {
                kategori = 'Akrab (XDA)';
            } else if (kodeUpper.startsWith('XVIP')) {
                kategori = 'Akrab VIP (XVIP)';
            } else if (kodeUpper.startsWith('XCA')) {
                kategori = 'XL Combo (XCA)';
            } else if (kodeUpper.startsWith('XCF')) {
                kategori = 'XL Flex (XCF)';
            } else if (kodeUpper.startsWith('XLB')) {
                kategori = 'XL Booster (XLB)';
            } else if (kodeUpper.startsWith('AX') || kodeUpper.startsWith('AIGO')) {
                kategori = 'Axis AIGO';
            } else if (!kategori || kategori.toUpperCase() === 'UMUM') {
                kategori = 'Akrab Lainnya';
            }
        } else if (isApi2) {
            let catName = (customCat && customCat.toUpperCase() !== 'UMUM' && !customCat.toLowerCase().includes('kaje')) ? customCat : '';
            const cLow = (catName + ' ' + (item.nama_produk || item.nama || '')).toLowerCase();
            let prefix = '';
    
            if (kodeUpper.startsWith('XDA') || cLow.includes('akrab nggota') || cLow.includes('akrab anggota')) {
                prefix = 'XDA';
                if (!catName || catName.toUpperCase() === 'UMUM') catName = 'Akrab Anggota';
            } else if (kodeUpper.startsWith('XDP') || cLow.includes('bebas puas')) {
                prefix = 'XDP';
                if (!catName || catName.toUpperCase() === 'UMUM') catName = 'Bebas Puas';
            } else if (kodeUpper.startsWith('AAB') || cLow.includes('aigo bronet') || cLow.includes('bronet')) {
                prefix = 'AAB';
                if (!catName || catName.toUpperCase() === 'UMUM') catName = 'AIGO Bronet';
            } else if (kodeUpper.startsWith('XDF') || cLow.includes('fflex max') || cLow.includes('flex max') || cLow.includes('flexmax')) {
                prefix = 'XDF';
                if (!catName || catName.toUpperCase() === 'UMUM') catName = 'Flex Max';
            } else if (kodeUpper.startsWith('ADU') || cLow.includes('ultra')) {
                prefix = 'ADU';
                if (!catName || catName.toUpperCase() === 'UMUM') catName = 'Ultra';
            } else if (kodeUpper.startsWith('XLA') || cLow.includes('fresh')) {
                prefix = 'XLA';
                if (!catName || catName.toUpperCase() === 'UMUM') catName = 'Akrab Fresh';
            } else if (kodeUpper.startsWith('XVIP') || cLow.includes('vip')) {
                prefix = 'XVIP';
                if (!catName || catName.toUpperCase() === 'UMUM') catName = 'Akrab VIP';
            } else if (kodeUpper.startsWith('XCA') || cLow.includes('combo')) {
                prefix = 'XCA';
                if (!catName || catName.toUpperCase() === 'UMUM') catName = 'XL Combo';
            } else if (kodeUpper.startsWith('XCF') || cLow.includes('flex')) {
                prefix = 'XCF';
                if (!catName || catName.toUpperCase() === 'UMUM') catName = 'XL Flex';
            } else {
                const mCode = kodeUpper.match(/^[A-Z]{3,4}/);
                prefix = mCode ? mCode[0] : '';
                if (!catName) catName = 'Paket Data';
            }
    
            let cleanCat = catName.replace(new RegExp('^' + prefix + '\\s*[-–:]?\\s*', 'i'), '').trim();
            if (prefix) {
                kategori = prefix + ' - ' + cleanCat;
            } else {
                kategori = cleanCat || 'Paket Data V2';
            }
        }
    
        const type = item.type || 'regular';
        const prefix = Array.isArray(item.prefix) ? item.prefix : (Array.isArray(item.raw && item.raw.prefix) ? item.raw.prefix : []);
        const uid = sVal + '__' + kode;
        const serverLabel = isApi2 ? 'API 2 (Akrab V2)' : (isApi4 ? 'API 4 (PPOB)' : 'API 1 (AkrabStable)');
        return {
            uid,
            server: sVal,
            server_label: serverLabel,
            nama,
            kode,
            harga,
            kategori,
            type,
            prefix,
            stock: stockVal,
            gangguan,
            kosong,
            isAvailable,
            jenis_produk: jProdItem,
            api4Info,
            raw: item
        };
    }
    
    async function loadHargaTerkini() {
        const serverSelect = document.getElementById('hargaServerSelect');
        const server = serverSelect ? serverSelect.value : 'api1';
        const gridEl = document.getElementById('hargaGridContainer');
        const countInfo = document.getElementById('hargaCountInfo');
        const hiddenInput = document.getElementById('hargaSubFilterSelect');
        
        if (hiddenInput) hiddenInput.value = '';
        rawHargaList = [];
        if (gridEl) gridEl.innerHTML = '<div style="grid-column: 1/-1; text-align:center; padding: 35px 20px; color: var(--text-sub);"><i class="fas fa-spinner fa-spin" style="font-size:24px; color:#002dbb; margin-bottom:8px; display:block;"></i>Memuat daftar produk...</div>';
        if (countInfo) countInfo.innerText = 'Memuat...';
    
        try {
            const apiKey = (currentUser && isUserVerified()) ? currentUser.api_key : '';
            const serverCode = server.replace('.php', '');
            const res = await fetch(`api.php?action=list&api=${serverCode}&api_key=${apiKey}&_t=${Date.now()}`, { cache: "no-store" });
            let data;
            try {
                data = await res.json();
            } catch (parseErr) {
                throw new Error(`HTTP ${res.status}: Respon server bukan format JSON`);
            }
            
            const isSuccess = data && (data.ok || data.success || data.status || Array.isArray(data.data) || Array.isArray(data));
            if (isSuccess) {
                const list = data.data || data.produk || (Array.isArray(data) ? data : []);
                rawHargaList = list.map(extractItemData);
                populateHargaSubFilter();
                filterHargaTerkini();
            } else {
                rawHargaList = [];
                const errMsg = (data && data.message) ? data.message : 'Server sedang offline / belum ada produk';
                if (gridEl) gridEl.innerHTML = `<div style="grid-column: 1/-1; text-align:center; padding: 25px 15px; color: var(--text-sub);"><i class="fas fa-circle-exclamation text-warn" style="font-size:26px; margin-bottom:8px; display:block;"></i>${errMsg}</div>`;
                if (countInfo) countInfo.innerText = '0 Produk';
                populateHargaSubFilter();
            }
        } catch (e) {
            rawHargaList = [];
            if (gridEl) gridEl.innerHTML = `<div style="grid-column: 1/-1; text-align:center; padding: 25px 15px; color: var(--danger);"><i class="fas fa-circle-xmark" style="font-size:26px; margin-bottom:8px; display:block;"></i>Koneksi ke ${server} gagal: ${e.message}</div>`;
            if (countInfo) countInfo.innerText = '0 Produk';
            populateHargaSubFilter();
        }
    }
    
    function populateHargaSubFilter() {
        const serverSelect = document.getElementById('hargaServerSelect');
        const sVal = serverSelect ? serverSelect.value.replace('.php', '') : 'api1';
        const isApi4 = (sVal === 'api4');
        
        const boxStd = document.getElementById('boxStandardCategoryFilter');
        const boxApi4 = document.getElementById('boxApi4MenuFilter');
        if (boxStd) boxStd.style.display = isApi4 ? 'none' : 'block';
        if (boxApi4) boxApi4.style.display = isApi4 ? 'block' : 'none';
    
        if (isApi4) {
            renderApi4Menu();
            return;
        }
    
        const chipsContainer = document.getElementById('hargaCategoryChips');
        const hiddenInput = document.getElementById('hargaSubFilterSelect');
        if (!chipsContainer || !hiddenInput) return;
        
        const isApi1 = (sVal === 'api1');
        const isApi2 = (sVal === 'api2');
    
        const catCounts = {};
        rawHargaList.forEach(item => {
            if (item.server === sVal) {
                const nLow = (item.nama || '').toLowerCase();
                const cUp  = (item.kode || '').toUpperCase();
                const kLow = (item.kategori || '').toLowerCase();
                if (isApi2 && (nLow.includes('uji coba') || kLow.includes('uji coba') || cUp.includes('TRIAL'))) {
                    return;
                }
                if (cUp.startsWith("XLAP")) return;
                const c = item.kategori || 'Umum';
                catCounts[c] = (catCounts[c] || 0) + 1;
            }
        });
    
        let categories = Object.keys(catCounts).filter(Boolean);
        categories.sort();
    
        if (isApi2) {
            if (!categories.includes('CEK&BAYAR PROMO FMX')) {
                categories.unshift('CEK&BAYAR PROMO FMX');
                catCounts['CEK&BAYAR PROMO FMX'] = 'HOT';
            }
        }
    
        let defaultCat = categories[0] || '';
        if (isApi1 && categories.includes('Akrab Fresh (XLA)')) defaultCat = 'Akrab Fresh (XLA)';
        else if (isApi2) defaultCat = categories.includes('XDA - Akrab Anggota') ? 'XDA - Akrab Anggota' : 'CEK&BAYAR PROMO FMX';
    
        const selectedCat = hiddenInput.value && categories.includes(hiddenInput.value) ? hiddenInput.value : defaultCat;
        hiddenInput.value = selectedCat;
    
        let chipsHtml = '';
        categories.forEach(cat => {
            const count = catCounts[cat] || 0;
            const isActive = (cat === selectedCat);
            const isPromoFmx = (cat === 'CEK&BAYAR PROMO FMX' || cat === 'XDA - Akrab Anggota');
            
            let activeStyle = '';
            let countBadgeStyle = '';
            let iconPrefix = '';
    
            if (isPromoFmx) {
                iconPrefix = '<i class="fas fa-fire" style="color:#fef08a; margin-right:4px;"></i> ';
                if (isActive) {
                    activeStyle = 'background: linear-gradient(135deg, #e11d48 0%, #f59e0b 50%, #dc2626 100%) !important; color: #ffffff !important; border: 2px solid #fef08a !important; box-shadow: 0 0 16px rgba(225, 29, 72, 0.6), 0 4px 14px rgba(245, 158, 11, 0.4) !important;';
                    countBadgeStyle = 'background: #ffffff; color: #dc2626; font-weight: 900;';
                } else {
                    activeStyle = 'background: linear-gradient(135deg, #be123c 0%, #b45309 100%) !important; color: #ffffff !important; border: 1.5px solid #fcd34d !important; box-shadow: 0 3px 10px rgba(190, 18, 60, 0.35) !important;';
                    countBadgeStyle = 'background: #fef08a; color: #854d0e; font-weight: 800;';
                }
            } else if (isActive) {
                activeStyle = 'background: linear-gradient(135deg, #002dbb, #0050d8) !important; color: #ffffff !important; border: 1.5px solid #002dbb !important; box-shadow: 0 4px 14px rgba(0, 45, 187, 0.35) !important;';
                countBadgeStyle = 'background: rgba(255, 255, 255, 0.28); color: #ffffff;';
            } else {
                activeStyle = 'background: #ffffff !important; color: #002dbb !important; border: 1.5px solid #bcd0ee !important; box-shadow: 0 2px 6px rgba(0, 45, 187, 0.05);';
                countBadgeStyle = 'background: #eff6ff; color: #002dbb; border: 1px solid #bfdbfe;';
            }
    
            chipsHtml += `
            <button type="button" class="chip ${isActive ? 'active' : ''}" data-cat="${cat}" onclick="selectHargaCategoryChip(this.getAttribute('data-cat'))" style="display: flex; justify-content: space-between; align-items: center; width: 100%; padding: 6px 9px; border-radius: 9px; font-size: 9.5px; font-weight: 800; cursor: pointer; transition: all 0.2s ease; user-select: none; box-sizing: border-box; text-align: left; ${activeStyle}">
                <span style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; margin-right: 4px;">${iconPrefix}${cat}</span>
                <span style="padding: 1px 6px; border-radius: 8px; font-size: 8px; font-family: monospace; font-weight: 800; flex-shrink: 0; ${countBadgeStyle}">${count}</span>
            </button>`;
        });
    
        chipsContainer.innerHTML = chipsHtml || '<div style="grid-column: 1 / -1; font-size: 11px; color: var(--text-sub); text-align: center;">Tidak ada kategori tersedia untuk server ini</div>';
    }
    
    function selectHargaCategoryChip(catName) {
        const hiddenInput = document.getElementById('hargaSubFilterSelect');
        if (hiddenInput) hiddenInput.value = catName;
        populateHargaSubFilter();
        filterHargaTerkini();
    }
    
    function isHiddenApi4BayarItem(item) {
        if (!item || item.server !== 'api4') return false;
        const kodeUp = String(item.kode || '').toUpperCase().trim();
        if (kodeUp.startsWith('XLAP')) return true;
        const isByuOrBeliLangsung = kodeUp.startsWith('BYU') || kodeUp.startsWith('VBYU') || kodeUp.startsWith('BBS') || kodeUp.startsWith('BNI') || kodeUp.startsWith('BSAF') || kodeUp.startsWith('BEIN') || kodeUp.startsWith('BERITA') || kodeUp.startsWith('BELI');
        if (isByuOrBeliLangsung) return false;
        if ((kodeUp.startsWith('B') && kodeUp.length > 3) || kodeUp.includes('BYR')) return true;
        const jProd = String(item.jenis_produk || (item.raw && item.raw.jenis_produk) || '').toLowerCase();
        const isCekOrInq = (jProd === 'cek&bayar' || kodeUp.startsWith('INQ') || (kodeUp.startsWith('C') && kodeUp.length >= 4 && !kodeUp.startsWith('COMBO') && !kodeUp.startsWith('CODM') && !kodeUp.startsWith('CPSBB') && !/^C\d+BB$/.test(kodeUp)));
        if (isCekOrInq) return false;
        if (item.type === 'payment') return true;
        return false;
    }
    function filterHargaTerkini() {
        const searchVal = (document.getElementById('hargaSearchInput') ? document.getElementById('hargaSearchInput').value : '').toLowerCase().trim();
        const subSelect = document.getElementById('hargaSubFilterSelect');
        const subVal = subSelect ? subSelect.value : '';
        const serverSelect = document.getElementById('hargaServerSelect');
        const sVal = serverSelect ? serverSelect.value.replace('.php', '') : 'api1';
        const isApi1 = (sVal === 'api1');
        const isApi2 = (sVal === 'api2');
        const isApi4 = (sVal === 'api4');
    
        const boxFmx = document.getElementById('boxCekPromoFmx');
        const isPromoFmxActive = isApi2 && (subVal === 'CEK&BAYAR PROMO FMX');
        if (boxFmx) {
            boxFmx.style.display = isPromoFmxActive ? 'block' : 'none';
            if (isPromoFmxActive && currentUser && currentUser.nomorwa) {
                const inpDest = document.getElementById('promoFmxDestinationInput');
                if (inpDest && !inpDest.value) inpDest.value = currentUser.nomorwa;
            }
        }
    
        const gridEl = document.getElementById('hargaGridContainer');
    
        if (isApi4 && !searchVal && api4NavState.level < 2 && api4NavState.category !== 'Token Listrik' && api4NavState.category !== 'E-Money' && api4NavState.category !== 'CEK&BAYAR PLN BULANAN') {
            if (gridEl) gridEl.style.display = 'none';
            const countInfo = document.getElementById('hargaCountInfo');
            if (countInfo) countInfo.innerText = api4NavState.level === 0 ? `Pilih Kategori Utama (API 4)` : `Pilih Provider (${api4NavState.category})`;
            return;
        }
    
        let filtered = rawHargaList.filter(item => {
            if (item.server !== sVal) return false;
    
            if (isApi2) {
                const nLow = (item.nama || '').toLowerCase();
                const kLow = (item.kategori || '').toLowerCase();
                const cUp  = (item.kode || '').toUpperCase();
                if (nLow.includes('uji coba') || kLow.includes('uji coba') || cUp.includes('TRIAL')) return false;
            }
    
            if (String(item.kode || '').toUpperCase().startsWith("XLAP")) return false;
            if (isApi4) {
                if (isHiddenApi4BayarItem(item)) return false;
            } else {
                const isByuOrBeliLangsung = item.kode.startsWith('BYU') || item.kode.startsWith('VBYU') || item.kode.startsWith('BBS') || item.kode.startsWith('BNI') || item.kode.startsWith('BSAF') || item.kode.startsWith('BEIN') || item.kode.startsWith('BERITA') || item.kode.startsWith('BELI');
                const isHiddenBayar = !isByuOrBeliLangsung && ((item.type === 'payment') || (item.kode.startsWith('B') && item.kode.length > 3) || item.kode.includes('BYR'));
                if (isHiddenBayar) return false;
            }
    
    
            const matchSearch = !searchVal || item.nama.toLowerCase().includes(searchVal) || item.kode.toLowerCase().includes(searchVal);
            
            if (isApi4) {
                if (searchVal) return matchSearch;
                if (!item.api4Info) return false;
                if (item.api4Info.category !== api4NavState.category) return false;
                if (api4NavState.category === 'E-Wallet' || api4NavState.category === 'E-Money') {
                    const isBbsItem = isBebasNominalCode(item.kode) || item.kode === 'BBSKASPRO';
                    if (isBbsItem) return false;
                    if (api4NavState.provider && api4NavState.provider !== 'Semua') {
                        const pCheck = api4NavState.provider.toUpperCase();
                        const itemTxt = (item.nama + ' ' + item.kode).toUpperCase();
                        if (!itemTxt.includes(pCheck)) return false;
                    }
                    return true;
                } else if (api4NavState.provider && api4NavState.provider !== 'Semua') {
                    if (api4NavState.category === 'PDAM' || api4NavState.category === 'Pajak PBB') {
                        if (!item.nama.toLowerCase().includes(api4NavState.provider.toLowerCase())) return false;
                    } else {
                        if (item.api4Info.provider !== api4NavState.provider) return false;
                    }
                }
                if (api4NavState.category === 'Paket Data' && api4NavState.subFilter && api4NavState.subFilter !== 'all') {
                    const sf = detectDataSubfilter(item);
                    if (sf !== api4NavState.subFilter) return false;
                }
                if (api4NavState.category === 'Voucher Game' && api4NavState.subFilter && api4NavState.subFilter !== 'all') {
                    const gf = detectGameSubfilter(item);
                    if (gf !== api4NavState.subFilter) return false;
                }
                if (api4NavState.prefixFilter) {
                    const cand = getApi4CandidateItems();
                    const counts = {};
                    cand.forEach(it => {
                        const k = getPrefixKey(it.nama);
                        if (k) counts[k] = (counts[k] || 0) + 1;
                    });
                    const itemKey = getPrefixKey(item.nama);
                    if (api4NavState.prefixFilter === '__OTHER__') {
                        if (!itemKey || counts[itemKey] >= 2) return false;
                    } else {
                        if (itemKey !== api4NavState.prefixFilter) return false;
                    }
                }
                return matchSearch;
            }
    
            const matchSub = (searchVal || !subVal) ? true : (item.kategori === subVal);
            return matchSearch && matchSub;
    
        });
    
        filtered.sort((a, b) => {
            if (a.isAvailable !== b.isAvailable) return a.isAvailable ? -1 : 1;
            if (isApi4) {
                if (a.harga !== b.harga) return a.harga - b.harga;
                return a.kode.localeCompare(b.kode, undefined, { numeric: true, sensitivity: 'base' });
            }
            const stockA = parseInt(a.stock, 10) || 0;
            const stockB = parseInt(b.stock, 10) || 0;
            if (stockB !== stockA) return stockB - stockA;
            return a.kode.localeCompare(b.kode, undefined, { numeric: true, sensitivity: 'base' });
        });
    
        if (gridEl) gridEl.style.display = 'grid';
    
        let cardHtml = '';
        if (gridEl) {
            gridEl.className = isApi4 ? 'ppob-denom-grid' : 'grid-products-4d';
        }
        filtered.forEach(item => {
            const disabledClass = item.isAvailable ? '' : 'is-disabled';
            const kodeUp = String(item.kode || '').toUpperCase().trim();
            const isXlaOnly = isApi1 && kodeUp.startsWith('XLA') && !kodeUp.startsWith('XLAP');
            const stockBadge = item.kosong ? '<span class="badge badge-fail" style="font-size: 7.5px; padding: 1.5px 5px; border-radius: 5px;"><i class="fas fa-box-open"></i> KOSONG</span>' : (item.gangguan ? '<span class="badge badge-pending" style="font-size: 7.5px; padding: 1.5px 5px; border-radius: 5px;"><i class="fas fa-triangle-exclamation"></i> GANGGUAN</span>' : `<span class="badge badge-success" style="font-size: 7.5px; padding: 1.5px 5px; border-radius: 5px;"><i class="fas fa-cubes"></i> ${item.stock}</span>`);
            const preorderBtnHtml = isXlaOnly ? `<button type="button" class="btn btn-sm" style="background:linear-gradient(135deg, #d97706, #f59e0b) !important; color:#ffffff !important; padding:4px 8px; font-size:8.5px; border:none; box-shadow:0 2px 6px rgba(217,119,6,0.25); border-radius:7px; min-height:auto; font-weight:800;" onclick="event.stopPropagation(); openBeliModal('${item.uid}', true);"><i class="fas fa-clock"></i> PO</button>` : '';
    
            if (isApi4) {
                cardHtml += `
                <div class="ppob-denom-card ${disabledClass}" onclick="openBeliModal('${item.uid}', false)">
                    <div class="ppob-denom-card-top">
                        <span class="badge badge-user mono" style="font-size: 8px; padding: 1.5px 5px;">${esc(item.kode)}</span>
                        ${stockBadge}
                    </div>
                    <div style="margin: 2px 0;">
                        <div class="ppob-denom-title">${esc(item.nama)}</div>
                        <div class="ppob-denom-code">${esc(item.api4Info ? item.api4Info.provider : 'PPOB')}</div>
                    </div>
                    <div class="ppob-denom-card-bot">
                        <div class="ppob-denom-price">Rp ${item.harga.toLocaleString('id-ID')}</div>
                        <button type="button" class="btn btn-sm btn-buy-card" style="padding: 3.5px 9px; font-size: 8.5px; font-weight: 800; border-radius: 7px; min-height: auto;" onclick="event.stopPropagation(); openBeliModal('${item.uid}', false);"><i class="fas fa-bolt"></i> Beli</button>
                    </div>
                </div>`;
            } else {
                const quotaMatch = String(item.nama || '').match(/(\d+(?:\.\d+)?\s*(?:GB|MB|TB))/i);
                const displayQuota = quotaMatch ? quotaMatch[1].toUpperCase() : item.kode;
                const subCodeTxt = quotaMatch ? item.kode : (item.server_label || '');
    
                const daysMatch = String(item.nama || '').match(/(\d+)\s*(?:hr|hari|days?|d)\b/i);
                const daysTxt = daysMatch ? (daysMatch[1] + ' Days') : '28 Days';
    
                let benefitHtml = '';
                if (isApi2) {
                    const prefixList = Array.isArray(item.prefix) ? item.prefix : (Array.isArray(item.raw && item.raw.prefix) ? item.raw.prefix : []);
                    let prefixBadges = '';
                    if (prefixList.length > 0) {
                        prefixBadges = prefixList.map(p => '<span class="badge" style="background:#ffffff; color:#002dbb; border:1px solid #bfdbfe; font-size:7.5px; padding:1px 4px; border-radius:4px; font-family:monospace; font-weight:800;">' + p + '</span>').join(' ');
                    } else {
                        prefixBadges = '<span style="font-size:8px; color:#64748b;">Semua Nomor</span>';
                    }
                    benefitHtml = `<div class="myxl-plan-speedbar" style="flex-direction:column; align-items:flex-start; gap:3px;"><div style="display:flex; justify-content:space-between; width:100%; align-items:center;"><span><i class="fas fa-bolt"></i> Ultra 5G+ Speed up to 500Mbps</span><small style="color:#002dbb; font-weight:800; font-size:7.5px;">FlexMax / V2</small></div><div style="font-size:8px; color:#475569;"><i class="fas fa-mobile-screen-button" style="color:#002dbb; margin-right:2px;"></i> Prefix: ${prefixBadges}</div></div>`;
                } else if (isApi1) {
                    benefitHtml = `<div class="myxl-plan-speedbar"><span><i class="fas fa-bolt"></i> Ultra 5G+ Speed up to 500Mbps</span><small style="color:#002dbb; font-weight:800; font-size:7.5px;">${isXlaOnly ? (item.isAvailable ? 'Akrab Fresh' : 'Pre-Order Ready') : 'XL Akrab Enterprise'}</small></div>`;
                }
    
                cardHtml += `
                <div class="myxl-prod-ticket ${disabledClass}" onclick="showProductDetail('${item.uid}')">
                    <div class="myxl-plan-badge" title="${esc(item.nama)}">
                        <i class="fas fa-sparkles"></i>
                        <span>${esc(item.nama)}</span>
                    </div>
                    <div class="myxl-plan-main-row">
                        <div class="myxl-plan-quota-wrap">
                            <div class="myxl-plan-globe">
                                <i class="fas ${isApi2 ? 'fa-cubes' : 'fa-globe'}"></i>
                            </div>
                            <div style="min-width:0;">
                                <div class="myxl-plan-quota-val">${esc(displayQuota)}</div>
                                <div class="myxl-plan-code-sub">${esc(subCodeTxt)}</div>
                            </div>
                        </div>
                        <div class="myxl-plan-days-wrap">
                            <span class="myxl-plan-days-txt">${esc(daysTxt)}</span>
                            ${stockBadge}
                        </div>
                    </div>
                    ${benefitHtml}
                    <div class="myxl-plan-bot-row">
                        <div class="myxl-plan-price-txt">IDR ${item.harga.toLocaleString('id-ID')}</div>
                        <div style="display:flex; align-items:center; gap:5px;">
                            <button type="button" class="btn btn-sm btn-buy-card" style="padding:4.5px 11px; font-size:9px; font-weight:800; border-radius:8px; min-height:auto;" onclick="event.stopPropagation(); openBeliModal('${item.uid}', false);"><i class="fas fa-bolt"></i> Beli</button>
                            ${preorderBtnHtml}
                            <div class="myxl-plan-chevron-btn" title="Lihat Detail"><i class="fas fa-chevron-right"></i></div>
                        </div>
                    </div>
                </div>`;
            }
        });
        if (gridEl) gridEl.innerHTML = cardHtml || '<div style="grid-column: 1/-1; text-align:center; padding: 25px; color: var(--text-sub);">Tidak ada produk yang cocok</div>';
    
        const countInfo = document.getElementById('hargaCountInfo');
        if (countInfo) countInfo.innerText = `Total: ${filtered.length} Produk (${sVal.toUpperCase()})`;
    }   let _lastPromoFmxData = [];
    let _lastPromoFmxDestination = '';
    
    async function executeCekPromoFmx() {
        const inputDest = document.getElementById('promoFmxDestinationInput');
        const btn = document.getElementById('btnSubmitCekPromoFmx');
        const statusBox = document.getElementById('promoFmxInlineStatus');
        const rawDest = inputDest ? inputDest.value.trim().replace(/[^0-9]/g, '') : '';
    
        if (!rawDest || rawDest.length < 9) {
            toast('warn', 'Nomor Tidak Valid', 'Silakan masukkan nomor XL tujuan minimal 10 digit!');
            if (inputDest) inputDest.focus();
            return;
        }
    
        let destination = rawDest;
        if (destination.startsWith('62')) destination = '0' + destination.slice(2);
        _lastPromoFmxDestination = destination;
    
        if (btn) {
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengecek Promo...';
        }
        if (statusBox) {
            statusBox.style.display = 'block';
            statusBox.innerHTML = '<span style="color:#002dbb; font-weight:700;"><i class="fas fa-spinner fa-spin"></i> Menghubungkan ke server promo Akrab V2...</span>';
    
        }
    
        try {
            const apiKey = (currentUser && isUserVerified()) ? currentUser.api_key : '';
            const sToken = (currentUser && currentUser.session_token) ? currentUser.session_token : '';
            const res = await fetch(`api.php?action=promo&api=api2&destination=${encodeURIComponent(destination)}&code_promo=XAPROMO&use_detail=1&api_key=${encodeURIComponent(apiKey)}&session_token=${encodeURIComponent(sToken)}&_t=${Date.now()}`, {
                headers: {
                    'X-Client-Secure': '1',
                    'X-Session-Token': sToken
                }
            });
    
            const json = await res.json();
    
            if (json && (json.status || json.success) && Array.isArray(json.data) && json.data.length > 0) {
                _lastPromoFmxData = json.data;
                if (statusBox) {
                    statusBox.innerHTML = `<span style="color:#059669; font-weight:800;"><i class="fas fa-circle-check"></i> Berhasil! Ditemukan <b>${json.data.length}</b> paket promo FlexMax untuk ${destination}.</span>`;
                }
                toast('success', 'Promo Ditemukan', `Ditemukan ${json.data.length} paket promo untuk nomor ${destination}`);
                renderPromoFmxModalCards(json.data, destination);
                const modal = document.getElementById('modalPromoFmxList');
                if (modal) modal.style.display = 'flex';
            } else {
                _lastPromoFmxData = [];
                const errMsg = (json && json.message) ? json.message : 'Nomor ini tidak memiliki promo FlexMax aktif saat ini.';
                if (statusBox) {
                    statusBox.innerHTML = `<span style="color:#dc2626; font-weight:700;"><i class="fas fa-circle-xmark"></i> ${errMsg}</span>`;
                }
                toast('error', 'Promo Tidak Tersedia', errMsg);
            }
        } catch (e) {
            if (statusBox) {
                statusBox.innerHTML = `<span style="color:#dc2626; font-weight:700;"><i class="fas fa-triangle-exclamation"></i> Kendala koneksi: ${e.message}</span>`;
            }
            toast('error', 'Kesalahan', e.message);
        } finally {
            if (btn) {
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-magnifying-glass"></i> Cek Promo FMX Sekarang';
            }
        }
    }
    
    function renderPromoFmxModalCards(promoList, destination) {
        const container = document.getElementById('modalPromoFmxContainer');
        const targetTxt = document.getElementById('modalPromoFmxTargetTxt');
        if (targetTxt) targetTxt.innerText = destination || '-';
        if (!container) return;
    
        if (!promoList || !promoList.length) {
            container.innerHTML = '<div style="text-align:center; padding:25px; color:#64748b;"><i class="fas fa-box-open" style="font-size:24px; opacity:0.4; margin-bottom:6px; display:block;"></i>Tidak ada paket promo tersedia untuk nomor ini.</div>';
            return;
        }
    
        let html = '';
        promoList.forEach((item, idx) => {
            const code = String(item.code || item.kode || '').trim().toUpperCase();
            const name = String(item.name || item.nama || code).trim();
            const price = parseInt(item.price || item.harga || 0, 10);
            const descList = Array.isArray(item.description) ? item.description : (item.deskripsi ? item.deskripsi.split('\n') : []);
            const descHtml = descList.map(d => `<div style="display:flex; align-items:flex-start; gap:6px; margin-bottom:3px;"><i class="fas fa-check-circle" style="color:#059669; font-size:10px; margin-top:2px;"></i><span>${d}</span></div>`).join('');
    
            html += `
            <div style="background:#ffffff; border:1.5px solid #d2e0f5; border-radius:14px; padding:14px; box-shadow:0 4px 15px rgba(0,45,187,0.06); transition:border-color 0.2s;">
              <div style="display:flex; justify-content:space-between; align-items:flex-start; margin-bottom:8px; gap:8px;">
                <div>
                  <div style="font-size:13.5px; font-weight:900; color:#0f172a;">${name}</div>
                  <span class="badge badge-user mono" style="margin-top:3px;">${code}</span>
                  <span class="badge badge-cyan" style="margin-left:4px;">FlexMax</span>
                </div>
                <div style="text-align:right;">
                  <small style="font-size:9px; color:#64748b; text-transform:uppercase; font-weight:800; display:block;">Harga Member</small>
                  <span class="mono" style="font-size:16px; font-weight:900; color:#059669;">Rp ${price.toLocaleString('id-ID')}</span>
                </div>
              </div>
              <div style="background:#f8fafc; border:1px solid #e2e8f0; border-radius:10px; padding:8px 10px; font-size:10.5px; color:#334155; margin-bottom:12px; line-height:1.4;">
                ${descHtml || 'Paket promo resmi XL Axiata FlexMax.'}
              </div>
              <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:8px;">
                <small style="font-size:9.5px; color:#9a3412; font-weight:700;"><i class="fas fa-clock"></i> Masa aktif kode: 10 menit</small>
                <button type="button" class="btn btn-sm btn-success" style="padding:7px 16px; font-size:11px; font-weight:800; box-shadow:0 3px 10px rgba(16,185,129,0.35);" onclick="beliPromoByIndex(${idx})">
                  <i class="fas fa-bolt"></i> Beli Sekarang
                </button>
              </div>
            </div>`;
        });
    
        container.innerHTML = html;
    }
    
    function beliPromoByIndex(idx) {
        const item = _lastPromoFmxData[idx];
        if (!item) return;
        const code = item.code || item.kode;
        const name = item.name || item.nama || code;
        const price = parseInt(item.price || item.harga || 0, 10);
        beliPromoDirect(code, name, price, _lastPromoFmxDestination);
    }
    
    function beliPromoDirect(code, name, price, destination) {
        closeModal('modalPromoFmxList');
        const dummyItem = {
            uid: 'api2__' + code,
            server: 'api2',
            server_label: 'API 2 (Akrab V2 Promo)',
            kode: code,
            nama: name,
            harga: price,
            kategori: 'CEK&BAYAR PROMO FMX',
            isAvailable: true,
            stock: '999'
        };
        _currentBeliItem = dummyItem;
        _isCurrentPreorder = false;
    
        const modalTitleEl = document.getElementById('modalBeliTitle');
        if (modalTitleEl) modalTitleEl.innerHTML = '<i class="fas fa-fire" style="color:#e11d48;"></i> Beli Paket Promo FMX (API 2)';
        document.getElementById('beliModalNama').innerText = name;
        document.getElementById('beliModalKode').innerText = `Kode: ${code} [API 2 PROMO]`;
        document.getElementById('beliModalHarga').innerText = 'Rp ' + price.toLocaleString('id-ID');
    
        const sApi2 = (currentUser && currentUser.saldo_api2 !== undefined) ? currentUser.saldo_api2 : 0;
        document.getElementById('beliModalSaldoSaatIni').innerText = `Rp ${sApi2.toLocaleString('id-ID')} (Saldo API 2 Akrab V2)`;
    
    
        const targetInp = document.getElementById('beliTargetInput');
        if (targetInp) targetInp.value = destination || '';
        const wrapOpen = document.getElementById('beliOpendenomWrap');
        if (wrapOpen) wrapOpen.style.display = 'none';
        const btn = document.getElementById('btnSubmitBeli');
        if (btn) {
            btn.disabled = false;
            btn.className = 'btn btn-success';
            btn.innerHTML = `<i class="fas fa-bolt"></i> Beli via ${dummyItem.server.toUpperCase()}`;
        }
        document.getElementById('modalBeliProduk').style.display = 'flex';
        setTimeout(() => { if (targetInp) targetInp.focus(); }, 120);
    }
    
    
    let _currentBeliItem = null;
    let _isCurrentPreorder = false;
    let _isInquiryMode = false;
    let _inquiryData = null;
    window._selectedBebasCode = 'BBSDN';
    window._selectedBebasName = 'DANA';
    window._selectedBebasCekCode = 'CEKD';
    window._bebasDebounceTimer = null;
    window._bebasTargetState = { targetNo: '', checked: false, loading: false, success: false, nama: '', error: '' };
    
    function getBebasBaseProductPrice(code) {
        if (!code) return 0;
        const codeUp = String(code).toUpperCase().trim();
        if (Array.isArray(rawHargaList)) {
            const item = rawHargaList.find(p => p.server === 'api4' && String(p.kode || '').toUpperCase().trim() === codeUp);
            if (item && item.harga !== undefined) return parseInt(item.harga || 0, 10);
            const rawItem = rawHargaList.find(p => p.server === 'api4' && (p.raw && String(p.raw.kode_produk || p.raw.kode || '').toUpperCase().trim() === codeUp));
            if (rawItem && rawItem.harga !== undefined) return parseInt(rawItem.harga || 0, 10);
        }
        return 0;
    }
    
    function updateBebasKalkulasi(val) {
        if (val === undefined || val === null) {
            val = document.getElementById('bebasNominalInput') ? document.getElementById('bebasNominalInput').value : 0;
        }
        const qty = parseInt(val || 0, 10);
        const code = window._selectedBebasCode || 'BBSDN';
        const basePrice = getBebasBaseProductPrice(code);
        const total = (qty > 0) ? (qty + basePrice) : 0;
    
        const elQty = document.getElementById('txtBebasQty');
        const elBiaya = document.getElementById('txtBebasBiaya');
        const elTotal = document.getElementById('txtBebasTotalBayar');
    
        if (elQty) elQty.innerText = 'Rp ' + Number(qty).toLocaleString('id-ID');
        if (elBiaya) elBiaya.innerText = basePrice > 0 ? ('+Rp ' + Number(basePrice).toLocaleString('id-ID')) : 'Gratis';
        if (elTotal) elTotal.innerText = 'Rp ' + Number(total).toLocaleString('id-ID');
    }
    
    function extractEwalletCustomerName(rawText, targetNo) {
        if (!rawText) return null;
        let str = String(rawText).trim();
        if (/akan diproses|sedang diproses|menunggu/i.test(str) && !str.includes('/') && !str.includes('NAMA')) {
            return null;
        }
        if (str.includes('/')) {
            const parts = str.split('/').map(p => p.trim());
            for (let p of parts) {
                if (/^(?:NAMA|AN|A\/N)\s*[:=.]?\s*(.+)$/i.test(p)) {
                    return p.replace(/^(?:NAMA|AN|A\/N)\s*[:=.]?\s*/i, '').trim();
                }
            }
            if (parts.length >= 2) {
                let candidate = parts[1].replace(/^(?:NAMA|AN|A\/N)\s*[:=.]?\s*/i, '').trim();
                if (candidate && !/^\d+$/.test(candidate)) return candidate;
            }
        }
        let m = str.match(/(?:NAMA|A\/N|AN|ATAS\s*NAMA)\s*[:=.]?\s*([A-Za-z0-9\s.]+?)(?:[\/]|\s+LIMIT|\s+SALDO|\s+RP|$)/i);
        if (m && m[1] && m[1].trim().length >= 2) {
            let name = m[1].trim().replace(/\s+(?:SUKSES|BERHASIL|OK)$/i, '');
            if (name && !/^\d+$/.test(name)) return name;
        }
        let clean = str.replace(/^SN\s*[:.]\s*/i, '').trim();
        if (clean && clean.length >= 3 && !/^\d+$/.test(clean) && !clean.startsWith('TRX') && !clean.startsWith('CEK') && !clean.includes('diproses')) {
            return clean;
        }
        return null;
    }
    
    function openModalBebasNominalEwallet() {
        if (!currentUser) return alert('Silakan login terlebih dahulu!');
        const modal = document.getElementById('modalBebasNominalEwallet');
        if (!modal) return;
        const sPpob = (currentUser && currentUser.saldo_ppob !== undefined) ? Number(currentUser.saldo_ppob) : 0;
        const saldoTxt = document.getElementById('bebasModalSaldoTxt');
        if (saldoTxt) saldoTxt.innerText = 'Rp ' + sPpob.toLocaleString('id-ID');
        selectBebasProvider('BBSDN', 'DANA', 'CEKD');
        updateBebasKalkulasi();
        modal.style.display = 'flex';
        const inpTarget = document.getElementById('bebasTargetInput');
        if (inpTarget) {
            inpTarget.value = '';
            onBebasTargetInput('');
        }
    }
    
    function selectBebasProvider(code, name, cekCode) {
        window._selectedBebasCode = code;
        window._selectedBebasName = name;
        window._selectedBebasCekCode = cekCode || '';
        const items = document.querySelectorAll('.bebas-prov-btn');
        items.forEach(btn => {
            const isAct = btn.getAttribute('data-code') === code;
            if (isAct) {
                btn.style.background = 'linear-gradient(135deg, #002dbb, #0050d8)';
                btn.style.color = '#ffffff';
                btn.style.borderColor = '#38bdf8';
                btn.style.boxShadow = '0 4px 12px rgba(0, 45, 187, 0.35)';
            } else {
                btn.style.background = '#ffffff';
                btn.style.color = '#002dbb';
                btn.style.borderColor = '#bcd0ee';
                btn.style.boxShadow = 'none';
            }
        });
        const lbl = document.getElementById('bebasTargetLabel');
        if (lbl) lbl.innerHTML = `<i class="fas fa-mobile-screen-button"></i> Nomor Akun ${esc(name)} (Kode: <code class="mono" style="color:#002dbb;">${code}</code>)`;
        updateBebasKalkulasi();
        const inp = document.getElementById('bebasTargetInput');
        if (inp && inp.value && inp.value.length >= 8) {
            executeCekNamaBebas(inp.value);
        }
    }
    
    function onBebasTargetInput(val) {
        val = (val || '').trim().replace(/[^0-9]/g, '');
        window._bebasTargetInputVal = val;
        if (window._bebasDebounceTimer) clearTimeout(window._bebasDebounceTimer);
        const statusBox = document.getElementById('bebasCekNamaStatus');
        if (!val || val.length < 8) {
            window._bebasTargetState = { targetNo: val, checked: false, loading: false, success: false, nama: '', error: '' };
            if (statusBox) statusBox.innerHTML = '<span style="color:#64748b; font-size:10px;"><i class="fas fa-info-circle"></i> Masukkan nomor HP/akun E-Wallet. Cek nama otomatis aktif.</span>';
            return;
        }
        if (statusBox) {
            statusBox.innerHTML = '<span style="color:#002dbb; font-size:10.5px; font-weight:700;"><i class="fas fa-clock"></i> Mengecek nama akun dalam 1,3 detik...</span>';
        }
        window._bebasDebounceTimer = setTimeout(() => {
            executeCekNamaBebas(val);
        }, 1300);
    }
    
    async function executeCekNamaBebas(targetNo) {
        if (!targetNo || targetNo.length < 8) return;
        const statusBox = document.getElementById('bebasCekNamaStatus');
        const cekCode = window._selectedBebasCekCode || '';
        const provName = window._selectedBebasName || 'E-Wallet';
        if (!cekCode) { window._bebasTargetState = { targetNo, checked: true, loading: false, success: true, nama: provName + ' User', error: '' }; if (statusBox) statusBox.innerHTML = `<div style="background:#eff6ff; border:1px solid #bfdbfe; border-radius:10px; padding:7px 11px; font-size:10.5px; color:#002dbb;"><i class="fas fa-circle-check"></i> Nomor siap ditransaksikan untuk ${esc(provName)}.</div>`; return; }
        if (statusBox) statusBox.innerHTML = `<span style="color:#002dbb; font-size:11px; font-weight:800;"><i class="fas fa-spinner fa-spin"></i> Sedang mengecek nama akun ${esc(provName)} (${cekCode})...</span>`;
        window._bebasTargetState.loading = true; window._bebasTargetState.targetNo = targetNo;
        const extractBebas = (j, sn) => {
            let nm = (j && j.data && (j.data.nama_pelanggan || j.data.nama)) ? (j.data.nama_pelanggan || j.data.nama) : null;
            if (!nm) nm = extractEwalletCustomerName(sn, targetNo);
            if (!nm && typeof parseEmoneySn === 'function') { const p = parseEmoneySn(sn, targetNo); if (p && p.nama) nm = p.nama; }
            return nm;
        };
        await _runApi4CheckAndPoll({
            cekCode, refPrefix: 'CEK_' + cekCode + '_', targetNo, statusBox, waitMsg: `Menunggu balasan cek akun ${esc(provName)}...`,
            defaultErr: 'Nomor akun tidak valid atau gangguan server.', extract: extractBebas,
            onSuccess: (nm) => {
                window._bebasTargetState = { targetNo, checked: true, loading: false, success: true, nama: nm, error: '' };
                if (statusBox) statusBox.innerHTML = `<div style="background:#ecfdf5; border:1.5px solid #a7f3d0; border-radius:10px; padding:7px 11px; display:flex; justify-content:space-between; align-items:center;"><div><div style="font-size:11.5px; font-weight:900; color:#065f46;"><i class="fas fa-circle-check" style="color:#059669;"></i> ${esc(nm)}</div><small style="font-size:9.5px; color:#047857;">No: <b class="mono">${esc(targetNo)}</b> &bull; ${esc(provName)}</small></div><span class="badge badge-success" style="font-size:8.5px;"><i class="fas fa-check"></i> VALID</span></div>`;
            },
            onTimeout: (rawSn) => {
                if (rawSn && !/akan diproses/i.test(rawSn)) { window._bebasTargetState = { targetNo, checked: true, loading: false, success: true, nama: rawSn, error: '' }; if (statusBox) statusBox.innerHTML = `<div style="background:#ecfdf5; border:1.5px solid #a7f3d0; border-radius:10px; padding:7px 11px; font-size:11px; color:#065f46;"><i class="fas fa-circle-check"></i> ${esc(rawSn)}</div>`; }
                else { window._bebasTargetState = { targetNo, checked: true, loading: false, success: true, nama: provName + ' User', error: '' }; if (statusBox) statusBox.innerHTML = `<div style="background:#eff6ff; border:1px solid #bfdbfe; border-radius:10px; padding:7px 11px; font-size:10.5px; color:#002dbb;"><i class="fas fa-circle-check"></i> Nomor siap ditransaksikan untuk ${esc(provName)}.</div>`; }
            },
            onFail: (errMsg) => { window._bebasTargetState = { targetNo, checked: true, loading: false, success: false, nama: '', error: errMsg }; if (statusBox) statusBox.innerHTML = `<div style="background:#fef2f2; border:1.5px solid #fecaca; border-radius:10px; padding:7px 11px; color:#991b1b; font-size:10.5px;"><i class="fas fa-circle-xmark" style="color:#dc2626;"></i> ${esc(errMsg)}</div>`; },
            onCatch: (err) => { window._bebasTargetState.loading = false; if (statusBox) statusBox.innerHTML = `<div style="background:#fef2f2; border:1.5px solid #fecaca; border-radius:10px; padding:7px 11px; color:#991b1b; font-size:10.5px;"><i class="fas fa-triangle-exclamation"></i> Gagal koneksi cek nama: ${esc(err.message)}</div>`; }
        });
    }
    function setBebasNominalQuick(val) {
        const inp = document.getElementById('bebasNominalInput');
        if (inp) {
            inp.value = val;
            updateBebasKalkulasi(val);
            inp.focus();
        }
    }
    
    async function executeBebasNominalOrder() {
        if (!currentUser) return alert('Silakan login terlebih dahulu!');
        if (!isUserVerified()) {
            alert('Transaksi ditolak! Akun Anda belum diverifikasi admin.');
            return;
        }
        const targetVal = (document.getElementById('bebasTargetInput')?.value || '').trim();
        const qtyVal = parseInt(document.getElementById('bebasNominalInput')?.value || 0, 10);
        const code = window._selectedBebasCode || 'BBSDN';
        const provName = window._selectedBebasName || 'DANA';
        const basePrice = getBebasBaseProductPrice(code);
        const totalRequired = qtyVal + basePrice;
    
        if (!targetVal || targetVal.length < 8) {
            toast('warn', 'Nomor Tidak Valid', 'Silakan masukkan nomor tujuan/akun E-Wallet yang valid (minimal 8 digit)!');
            return;
        }
        if (!qtyVal || qtyVal < 100) {
            toast('warn', 'Nominal Kurang', 'Nominal transfer bebas minimal Rp 100!');
            return;
        }
    
        const sPpob = (currentUser && currentUser.saldo_ppob !== undefined) ? Number(currentUser.saldo_ppob) : 0;
        if (sPpob < totalRequired) {
            document.getElementById('saldoKurangMsg').innerText = `Saldo PPOB (API 4) Anda (Rp ${sPpob.toLocaleString('id-ID')}) tidak mencukupi untuk transfer sebesar Rp ${qtyVal.toLocaleString('id-ID')} + Biaya Produk Rp ${basePrice.toLocaleString('id-ID')} (Total: Rp ${totalRequired.toLocaleString('id-ID')}). Silakan lakukan topup ke dompet Saldo PPOB (API 4).`;
            closeModal('modalBebasNominalEwallet');
            document.getElementById('modalSaldoKurang').style.display = 'flex';
            return;
        }
    
        const btn = document.getElementById('btnSubmitBebasNominal');
        if (btn) {
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses Transfer API 4...';
        }
    
        const refIdUnik = 'TRX_BBS_' + Date.now() + '_' + Math.floor(Math.random() * 899 + 100);
        try {
            const payload = {
                action: 'order',
                api: 'api4',
                kode_produk: code,
                target: targetVal,
                qty: qtyVal,
                refid: refIdUnik,
                api_key: currentUser.api_key
            };
            const res = await fetch('api/paymentsys.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-API-KEY': currentUser.api_key },
                body: JSON.stringify(payload)
            });
            const resText = await res.text();
            let data = null;
            try { data = JSON.parse(resText); } catch(pe) {}
    
            if (data && (data.status === true || String(data.trx_status).toUpperCase() === 'BERHASIL' || String(data.trx_status).toUpperCase() === 'PENDING')) {
                closeModal('modalBebasNominalEwallet');
                const d = data.data || {};
                document.getElementById('strukRefId').innerText = d.ref_id || refIdUnik;
                document.getElementById('strukProduk').innerText = `Transfer Bebas Nominal ${provName} (${code}) [API4]`;
                document.getElementById('strukTarget').innerText = targetVal;
                document.getElementById('strukHarga').innerText = 'Rp ' + totalRequired.toLocaleString('id-ID') + (basePrice > 0 ? ` (Qty: Rp ${qtyVal.toLocaleString('id-ID')} + Biaya: Rp ${basePrice.toLocaleString('id-ID')})` : '');
                document.getElementById('strukSN').innerText = d.sn || data.sn || data.message || 'Transaksi Diproses Server';
                if (d.sisa_saldo !== undefined) {
                    currentUser.saldo_ppob = d.sisa_saldo;
                    updateBalanceDisplay();
                    document.getElementById('strukSisaSaldo').innerText = 'Rp ' + (d.sisa_saldo).toLocaleString('id-ID');
                } else {
                    currentUser.saldo_ppob = Math.max(0, sPpob - totalRequired);
                    updateBalanceDisplay();
                    document.getElementById('strukSisaSaldo').innerText = 'Rp ' + (currentUser.saldo_ppob).toLocaleString('id-ID');
                }
                document.getElementById('strukPesanStatus').innerText = data.message || 'Transaksi transfer bebas nominal berhasil dikirim ke server.';
                document.getElementById('modalTrxDiproses').style.display = 'flex';
                if (typeof loadUserHistory === 'function') loadUserHistory();
            } else {
                const errMsg = (data && (data.message || data.keterangan)) ? (data.message || data.keterangan) : 'Transaksi transfer gagal diproses.';
                alert(errMsg);
            }
        } catch(err) {
            alert('Terjadi kesalahan koneksi saat memproses order: ' + err.message);
        } finally {
            if (btn) {
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-paper-plane"></i> Kirim Saldo Sekarang (API 4)';
            }
        }
    }
    
    function openBeliModal(uid, isPreorder = false) {
      if (!currentUser) return alert('Silakan login terlebih dahulu!');
      const currentServerForPln = (document.getElementById('hargaServerSelect') ? document.getElementById('hargaServerSelect').value.replace('.php', '') : 'api1');
      const itemCheckPln = rawHargaList.find(function(p) { return p.uid === uid || (p.kode === uid && p.server === currentServerForPln); });
      const isTokenPlnCheck = itemCheckPln && (itemCheckPln.kategori === 'Token Listrik' || (itemCheckPln.api4Info && itemCheckPln.api4Info.category === 'Token Listrik') || (itemCheckPln.server === 'api4' && (itemCheckPln.kode.toUpperCase().startsWith('PLN') && !itemCheckPln.kode.toUpperCase().startsWith('C') && !itemCheckPln.kode.toUpperCase().startsWith('B'))));
      const isEmoneyCheck = itemCheckPln && (itemCheckPln.kategori === 'E-Money' || (itemCheckPln.api4Info && itemCheckPln.api4Info.category === 'E-Money'));
      if (isTokenPlnCheck && (!_plnMeterState.meterNo || _plnMeterState.meterNo.length < 9)) {
        toast('warn', 'ID Pelanggan Kosong', 'Silakan masukkan No. Meter / ID Pelanggan PLN pada kolom input di atas terlebih dahulu!');
        const plnInp = document.getElementById('plnMeterInput');
        if (plnInp) {
          plnInp.focus();
          plnInp.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
        return;
      }
      if (isEmoneyCheck && (!_emoneyState.targetNo || _emoneyState.targetNo.length < 8)) {
        toast('warn', 'Nomor Tujuan Kosong', 'Silakan masukkan Nomor HP / Akun E-Money pada kolom input di atas terlebih dahulu!');
        const emInp = document.getElementById('emoneyTargetInput');
        if (emInp) {
          emInp.focus();
          emInp.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
        return;
      }
      if (!isUserVerified()) {
        toast('error', 'Transaksi Terkunci', 'Akun belum diverifikasi admin! Silakan minta aktivasi akun untuk mulai bertransaksi.');
        if (confirm('Akun belum diverifikasi admin! Transaksi terkunci.\n\nHubungi CS via Telegram untuk verifikasi sekarang?')) {
          window.open(getAdminVerificationUrl(), '_blank');
        }
        return;
      }
      const currentServer = (document.getElementById('hargaServerSelect') ? document.getElementById('hargaServerSelect').value.replace('.php', '') : 'api1');
      const item = rawHargaList.find(function(p) { return p.uid === uid || (p.kode === uid && p.server === currentServer); });
      if (!item) return;
      _isCurrentPreorder = !!isPreorder;
      
      const isApi1 = (item.server === 'api1');
      const isApi2 = (item.server === 'api2');
      const isApi4 = (item.server === 'api4');
      const kodeUp = String(item.kode || '').toUpperCase().trim();
      const isXlaOnly = isApi1 && kodeUp.startsWith('XLA') && !kodeUp.startsWith('XLAP');
      
      if (_isCurrentPreorder && !isXlaOnly) {
        toast('error', 'Pre-Order Tidak Tersedia', 'Layanan Pre-Order HANYA berlaku untuk produk Server 1 Akrab Fresh (XLA).');
        return;
      }
      const isVirtualProduct = !!(item.is_virtual || (item.raw && (item.raw.is_virtual || item.raw.isVirtual)));
      if (!_isCurrentPreorder && !item.isAvailable && !isVirtualProduct) {
    
        toast('warn', 'Stok Kosong / Gangguan', isXlaOnly ? 'Stok reguler sedang kosong. Silakan gunakan tombol [Pre-Order] untuk mengantre!' : 'Stok produk saat ini sedang kosong.');
        return;
      }
      _currentBeliItem = item;
      const jProd = (item.jenis_produk || (item.raw && item.raw.jenis_produk) || '').toLowerCase();
      const isCekNama = (jProd === 'ceknama' || kodeUp.startsWith('CEK'));
      const isCekProduct = !isCekNama && (jProd === 'cek&bayar' || (kodeUp.startsWith('C') && kodeUp.length >= 4 && !kodeUp.startsWith('COMBO') && !kodeUp.startsWith('CODM') && !kodeUp.startsWith('CPSBB') && !/^C\d+BB$/.test(kodeUp)) || kodeUp.startsWith('INQ'));
      _isInquiryMode = isCekProduct;
      _inquiryData = null;
      
      const billDetailWrap = document.getElementById('beliBillDetailWrap');
      if (billDetailWrap) billDetailWrap.style.display = 'none';
    
      const modalTitleEl = document.getElementById('modalBeliTitle');
      if (modalTitleEl) {
        modalTitleEl.innerHTML = _isCurrentPreorder 
          ? '<i class="fas fa-clock" style="color: #f59e0b;"></i> Konfirmasi Pre-Order Akrab Fresh'
          : `<i class="fas fa-cart-shopping" style="color: var(--accent);"></i> Beli: ${item.server_label}`;
      }
      document.getElementById('beliModalNama').innerText = item.nama + (_isCurrentPreorder ? ' (PRE-ORDER)' : '');
      document.getElementById('beliModalKode').innerText = `Kode: ${item.kode} [${item.server.toUpperCase()}]`;
      document.getElementById('beliModalHarga').innerText = 'Rp ' + item.harga.toLocaleString('id-ID');
      let targetWalletSaldo = 0;
      let walletName = 'Saldo Akrab (API 1)';
      if (isApi2) {
        targetWalletSaldo = (currentUser.saldo_api2 !== undefined) ? Number(currentUser.saldo_api2) : 0;
        walletName = 'Saldo API 2 (Akrab V2)';
      } else if (isApi4) {
        targetWalletSaldo = (currentUser.saldo_ppob !== undefined) ? Number(currentUser.saldo_ppob) : 0;
        walletName = 'Saldo PPOB (API 4)';
      } else {
        targetWalletSaldo = (currentUser.saldo_akrab !== undefined) ? Number(currentUser.saldo_akrab) : Number(currentUser.saldo || 0);
        walletName = 'Saldo XL Akrab (API 1)';
      }
      document.getElementById('beliModalSaldoSaatIni').innerText = `Rp ${targetWalletSaldo.toLocaleString('id-ID')} (${walletName})`;
      
      const isTokenPln = isTokenPlnCheck;
      const targetInp = document.getElementById('beliTargetInput');
      const targetWrap = document.getElementById('beliTargetInputBoxWrap');
      const plnDetailWrap = document.getElementById('beliPlnDetailWrap');
      if (isTokenPln) {
        if (targetWrap) targetWrap.style.display = 'none';
        if (plnDetailWrap) {
          plnDetailWrap.innerHTML = `
            <div style="font-weight: 800; font-size: 12px; margin-bottom: 8px; color: #002dbb; border-bottom: 1.5px dashed #bfdbfe; padding-bottom: 6px; display:flex; justify-content:space-between; align-items:center;">
              <span><i class="fas fa-bolt" style="color:#f59e0b;"></i> DETAIL METERAN TOKEN LISTRIK</span>
              <span class="badge ${_plnMeterState.success ? 'badge-success' : 'badge-cyan'}" style="font-size:8.5px;">${_plnMeterState.success ? '<i class="fas fa-circle-check"></i> TERVERIFIKASI' : '<i class="fas fa-info-circle"></i> SIAP TRANSAKSI'}</span>
            </div>
            <div class="kv-grid" style="grid-template-columns: 110px 1fr; row-gap: 5px; font-size: 11px;">
              <div class="k">No. Meter / ID:</div><div class="v mono" style="font-weight:900; color:#002dbb;">${esc(_plnMeterState.meterNo)}</div>
              <div class="k">Nama Pelanggan:</div><div class="v" style="font-weight:800; color:#0f172a;">${esc(_plnMeterState.nama || 'Pelanggan PLN')}</div>
              <div class="k">Tarif / Daya:</div><div class="v mono" style="font-weight:700; color:#059669;">${esc(_plnMeterState.daya || '-')}</div>
              <div class="k">Produk Token:</div><div class="v"><b>${esc(item.nama)}</b> <code class="mono">(${esc(item.kode)})</code></div>
            </div>
          `;
          plnDetailWrap.style.display = 'block';
        }
        if (targetInp) targetInp.value = _plnMeterState.meterNo;
      } else if (isEmoneyCheck) {
        if (targetWrap) targetWrap.style.display = 'none';
        if (plnDetailWrap) {
          plnDetailWrap.innerHTML = `
            <div style="font-weight: 800; font-size: 12px; margin-bottom: 8px; color: #002dbb; border-bottom: 1.5px dashed #bfdbfe; padding-bottom: 6px; display:flex; justify-content:space-between; align-items:center;">
              <span><i class="fas fa-wallet" style="color:#059669;"></i> DETAIL AKUN E-MONEY</span>
              <span class="badge ${_emoneyState.success ? 'badge-success' : 'badge-cyan'}" style="font-size:8.5px;">${_emoneyState.success ? '<i class="fas fa-circle-check"></i> TERVERIFIKASI' : '<i class="fas fa-info-circle"></i> SIAP TRANSAKSI'}</span>
            </div>
            <div class="kv-grid" style="grid-template-columns: 110px 1fr; row-gap: 5px; font-size: 11px;">
              <div class="k">Nomor Tujuan:</div><div class="v mono" style="font-weight:900; color:#002dbb;">${esc(_emoneyState.targetNo)}</div>
              <div class="k">Nama Akun:</div><div class="v" style="font-weight:800; color:#0f172a;">${esc(_emoneyState.nama || 'Pengguna E-Money')}</div>
              <div class="k">Layanan:</div><div class="v"><b>${esc(item.nama)}</b> <code class="mono">(${esc(item.kode)})</code></div>
              ${_emoneyState.limit ? `<div class="k">Limit Bulanan:</div><div class="v mono" style="color:#059669; font-weight:700;">Rp ${parseInt(_emoneyState.limit).toLocaleString('id-ID')}</div>` : ''}
            </div>
          `;
          plnDetailWrap.style.display = 'block';
        }
        if (targetInp) targetInp.value = _emoneyState.targetNo;
      } else {
        if (targetWrap) targetWrap.style.display = 'block';
        if (plnDetailWrap) plnDetailWrap.style.display = 'none';
        targetInp.value = currentUser.nomorwa || '';
      }
      const isOpendenom = (item.kode.toUpperCase().indexOf('BBS') >= 0 || item.kode.toUpperCase() === 'PLNBBS');
      const wrapOpen = document.getElementById('beliOpendenomWrap');
      if (wrapOpen) wrapOpen.style.display = isOpendenom ? 'block' : 'none';
      const poNoticeWrap = document.getElementById('beliPreorderNoticeWrap');
      if (poNoticeWrap) poNoticeWrap.style.display = _isCurrentPreorder ? 'block' : 'none';
      const btn = document.getElementById('btnSubmitBeli');
      if (btn) {
        btn.disabled = false;
        btn.className = _isCurrentPreorder ? 'btn btn-warning' : 'btn btn-success';
        if (_isCurrentPreorder) {
          btn.innerHTML = '<i class="fas fa-clock"></i> Simpan Pre-Order (Antre)';
        } else if (_isInquiryMode) {
          btn.innerHTML = '<i class="fas fa-search"></i> Cek Tagihan';
        } else if (isCekNama) {
          btn.innerHTML = '<i class="fas fa-magnifying-glass"></i> Cek Nama Sekarang';
        } else {
          btn.innerHTML = `<i class="fas fa-bolt"></i> Beli via ${item.server.toUpperCase()}`;
        }
      }
      document.getElementById('modalBeliProduk').style.display = 'flex';
      setTimeout(() => { if (targetInp) targetInp.focus(); }, 120);
    }
    
    async function executeBeliProduk() {
      if (!_currentBeliItem || !currentUser) return;
      if (!isUserVerified()) {
        alert('Transaksi ditolak! Akun Anda belum diverifikasi admin.');
        return;
      }
      const targetVal = document.getElementById('beliTargetInput').value.trim();
      if (!targetVal || targetVal.length < 4) {
        alert('Harap masukkan nomor tujuan atau ID target yang valid!');
        return;
      }
      let targetWalletSaldo = 0;
      let walletName = 'Saldo Akrab (API 1)';
      if (_currentBeliItem.server === 'api2') {
        targetWalletSaldo = (currentUser.saldo_api2 !== undefined) ? Number(currentUser.saldo_api2) : 0;
        walletName = 'Saldo API 2 (Akrab V2)';
      } else if (_currentBeliItem.server === 'api4') {
        targetWalletSaldo = (currentUser.saldo_ppob !== undefined) ? Number(currentUser.saldo_ppob) : 0;
        walletName = 'Saldo PPOB (API 4)';
      } else {
        targetWalletSaldo = (currentUser.saldo_akrab !== undefined) ? Number(currentUser.saldo_akrab) : Number(currentUser.saldo || 0);
        walletName = 'Saldo XL Akrab (API 1)';
      }
      
      const isOpendenom = (_currentBeliItem.kode.toUpperCase().indexOf('BBS') >= 0 || _currentBeliItem.kode.toUpperCase() === 'PLNBBS');
      let qtyVal = 0;
      if (isOpendenom) {
          qtyVal = parseInt(document.getElementById('beliQtyInput').value) || 0;
          if (qtyVal < 100) {
              alert('Nominal pembelian bebas (qty) minimal 100!');
              return;
          }
      }
    
      let requiredBalance = _currentBeliItem.harga;
      if (isOpendenom) requiredBalance = qtyVal;
      if (_isInquiryMode && _inquiryData) requiredBalance = _inquiryData.amount;
    
      if (!_isCurrentPreorder && (!(_isInquiryMode && !_inquiryData)) && targetWalletSaldo < requiredBalance) {
        document.getElementById('saldoKurangMsg').innerText = `${walletName} Anda (Rp ${targetWalletSaldo.toLocaleString('id-ID')}) tidak mencukupi untuk transaksi sebesar Rp ${requiredBalance.toLocaleString('id-ID')}. Silakan lakukan topup terlebih dahulu ke dompet ${walletName}.`;
        closeModal('modalBeliProduk');
        document.getElementById('modalSaldoKurang').style.display = 'flex';
        return;
      }
      
      const btn = document.getElementById('btnSubmitBeli');
      if (btn.disabled) return;
      btn.disabled = true;
            if (_isInquiryMode && !_inquiryData) {
          btn.innerHTML = `<i class="fas fa-spinner fa-spin"></i> Mengecek Tagihan...`;
      } else {
          btn.innerHTML = `<i class="fas fa-spinner fa-spin"></i> Memproses ${_currentBeliItem.server.toUpperCase()}...`;
      }
    
      const refIdUnik = (_isCurrentPreorder ? 'PO_' : 'TRX_') + Date.now() + '_' + Math.floor(Math.random() * 899 + 100);
    
      try {
        let res, resText, data = null;
        if (_isCurrentPreorder) {
          res = await fetch('api/preorder.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-API-KEY': currentUser.api_key },
            body: JSON.stringify({
              action: 'order',
              kode_produk: _currentBeliItem.kode,
              target: targetVal,
              ref_id: refIdUnik,
              harga: _currentBeliItem.harga,
              nama: _currentBeliItem.nama,
              api_key: currentUser.api_key
            })
          });
        } else if (_isInquiryMode && !_inquiryData) {
            const payload = {
                action: 'inquiry',
                api: _currentBeliItem.server,
                kode_produk: _currentBeliItem.kode,
                target: targetVal,
                refid: refIdUnik,
                api_key: currentUser.api_key
            };
            res = await fetch('api/paymentsys.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-API-KEY': currentUser.api_key },
                body: JSON.stringify(payload)
            });
            resText = await res.text();
            try { data = JSON.parse(resText); } catch(pErr) {}
            
            if (data && data.status === true) {
                const d = data.data || data;
                _inquiryData = {
                    payment_token: d.payment_token || data.payment_token,
                    amount: parseInt(d.total_tagihan || d.ttag || data.total_tagihan || data.ttag || 0),
                    admin: parseInt(d.admin_fee || data.admin_fee || 0),
                    nama: d.nama_pelanggan || d.nama || data.nama_pelanggan || data.nama || '-',
                    periode: d.periode || data.periode || '-',
                    kode_bayar: d.kode_bayar || data.kode_bayar || _currentBeliItem.kode
                };
                
                const billDetailWrap = document.getElementById('beliBillDetailWrap');
                if (billDetailWrap) {
                    billDetailWrap.innerHTML = `
                        <div style="font-weight: 800; margin-bottom: 6px; color: #b45309; border-bottom: 1px dashed #fcd34d; padding-bottom: 4px;">Rincian Tagihan Ditemukan</div>
                        <div style="display:flex; justify-content:space-between; margin-bottom:3px;"><span>Nama:</span> <b>${esc(_inquiryData.nama)}</b></div>
                        <div style="display:flex; justify-content:space-between; margin-bottom:3px;"><span>Periode:</span> <b>${esc(_inquiryData.periode)}</b></div>
                        <div style="display:flex; justify-content:space-between; margin-bottom:3px;"><span>Tagihan + Admin:</span> <b>Rp ${_inquiryData.amount.toLocaleString('id-ID')}</b></div>
                    `;
                    billDetailWrap.style.display = 'block';
                }
                
                document.getElementById('beliModalHarga').innerText = 'Rp ' + _inquiryData.amount.toLocaleString('id-ID');
                return;
            } else {
                const errMsg = (data && (data.message || data.keterangan)) ? (data.message || data.keterangan) : 'Tagihan tidak ditemukan atau ID salah.';
                alert(errMsg);
                return;
            }
        } else if (_isInquiryMode && _inquiryData) {
            const payload = {
                action: 'bayar',
                api: _currentBeliItem.server,
                payment_token: _inquiryData.payment_token,
                refid: refIdUnik,
                api_key: currentUser.api_key
            };
            res = await fetch('api/paymentsys.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-API-KEY': currentUser.api_key },
                body: JSON.stringify(payload)
            });
        } else {
          const payload = {
            action: 'order',
            api: _currentBeliItem.server,
            kode_produk: _currentBeliItem.kode,
            target: targetVal,
            refid: refIdUnik,
            api_key: currentUser.api_key
          };
          if (isOpendenom) {
            payload.qty = qtyVal;
          }
          res = await fetch('api/paymentsys.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-API-KEY': currentUser.api_key },
            body: JSON.stringify(payload)
          });
        }
        resText = await res.text();
        try { data = JSON.parse(resText); } catch(pErr) {}
        if (data && (data.status === true || String(data.trx_status).toUpperCase() === 'BERHASIL' || String(data.trx_status).toUpperCase() === 'PENDING')) {
          closeModal('modalBeliProduk');
          const d = data.data || {};
          document.getElementById('strukRefId').innerText = d.ref_id || refIdUnik;
          document.getElementById('strukProduk').innerText = `${_currentBeliItem.nama} (${_inquiryData ? _inquiryData.kode_bayar : _currentBeliItem.kode}) [${_currentBeliItem.server.toUpperCase()}]`;
          document.getElementById('strukTarget').innerText = targetVal;
          document.getElementById('strukHarga').innerText = 'Rp ' + (_inquiryData ? _inquiryData.amount : (isOpendenom ? qtyVal : _currentBeliItem.harga)).toLocaleString('id-ID');
          document.getElementById('strukSN').innerText = _isCurrentPreorder ? 'Menunggu Ketersediaan Stok & Eksekusi Admin' : (d.sn || data.sn || (data.message || 'Diproses server'));
          if (d.sisa_saldo !== undefined) {
            if (_currentBeliItem.server === 'api2') currentUser.saldo_api2 = d.sisa_saldo;
            else if (_currentBeliItem.server === 'api4') currentUser.saldo_ppob = d.sisa_saldo;
            else currentUser.saldo_akrab = d.sisa_saldo;
            updateBalanceDisplay();
            if (typeof isDedicatedUser === 'function' && isDedicatedUser() && _currentBeliItem.server === 'api1') {
                syncDedicatedBalanceLive(true);
            }
            document.getElementById('strukSisaSaldo').innerText = 'Rp ' + (d.sisa_saldo).toLocaleString('id-ID');
          } else {
            const finalHargaStr = _inquiryData ? _inquiryData.amount : (isOpendenom ? qtyVal : _currentBeliItem.harga);
            document.getElementById('strukSisaSaldo').innerText = 'Rp ' + (targetWalletSaldo - finalHargaStr).toLocaleString('id-ID');
          }
          document.getElementById('strukPesanStatus').innerText = _isCurrentPreorder 
            ? 'Pre-Order Akrab Fresh berhasil dicatat! Saldo Anda belum dipotong dan akan otomatis dipotong saat pesanan sukses diproses Admin.' 
            : (data.message || 'Transaksi berhasil dikirim ke server.');
          document.getElementById('modalTrxDiproses').style.display = 'flex';
          loadUserHistory();
        } else {
          const errMsg = (data && (data.message || data.keterangan)) ? (data.message || data.keterangan) : 'Transaksi gagal diproses oleh server.';
          alert(errMsg);
        }
      } catch (err) {
        alert('Terjadi kesalahan koneksi saat memproses order: ' + err.message);
      } finally {
        if (btn) {
          btn.disabled = false;
          if (_isCurrentPreorder) {
              btn.innerHTML = '<i class="fas fa-clock"></i> Simpan Pre-Order (Antre)';
          } else if (_isInquiryMode && !_inquiryData) {
              btn.innerHTML = '<i class="fas fa-search"></i> Cek Tagihan';
          } else if (_isInquiryMode && _inquiryData) {
              btn.innerHTML = `<i class="fas fa-file-invoice-dollar"></i> Bayar Tagihan (Rp ${_inquiryData.amount.toLocaleString('id-ID')})`;
          } else if (_currentBeliItem && (_currentBeliItem.jenis_produk === 'ceknama' || String(_currentBeliItem.kode || '').toUpperCase().startsWith('CEK'))) {
              btn.innerHTML = '<i class="fas fa-magnifying-glass"></i> Cek Nama Sekarang';
          } else {
              btn.innerHTML = `<i class="fas fa-bolt"></i> Beli via ${_currentBeliItem.server.toUpperCase()}`;
          }
        }
      }
    }
    
    function showProductDetail(uid) {
      const currentServer = (document.getElementById('hargaServerSelect') ? document.getElementById('hargaServerSelect').value.replace('.php', '') : 'api1');
      const item = rawHargaList.find(function(p) { return p.uid === uid || (p.kode === uid && p.server === currentServer); });
      if (!item) return;
      const raw = item.raw || {};
      const deskripsi = raw.deskripsi || raw.description || raw.keterangan || item.nama || 'Tidak ada rincian deskripsi untuk produk ini.';
      const itemStatusBadge = item.isAvailable ? `<span class="badge badge-success">READY (STOK: ${item.stock})</span>` : '<span class="badge badge-fail">GANGGUAN / KOSONG</span>';
      
      const isApi1 = (item.server === 'api1');
      const kodeUp = String(item.kode || '').toUpperCase().trim();
      const isXlaOnly = isApi1 && kodeUp.startsWith('XLA') && !kodeUp.startsWith('XLAP');
      
      const bodyEl = document.getElementById('productDetailBody');
      if (bodyEl) {
        bodyEl.innerHTML = 
          '<div style="background: #f0f7ff; border: 1px solid #bae6fd; border-radius: 12px; padding: 14px; margin-bottom: 15px;">' +
            '<div style="font-size: 15px; font-weight: 800; color: #0f172a; margin-bottom: 8px;">' + item.nama + '</div>' +
            '<div style="display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 12px; align-items: center;">' +
              '<span class="badge badge-user">Kode: ' + item.kode + '</span>' +
              '<span class="badge badge-cyan">' + item.server_label + '</span>' +
              '<span class="badge badge-user">Kategori: ' + item.kategori + '</span>' +
              itemStatusBadge +
            '</div>' +
            '<div style="font-size: 18px; font-weight: 800; color: var(--accent); font-family: monospace;">Rp ' + item.harga.toLocaleString('id-ID') + '</div>' +
          '</div>' +
          '<div style="font-size: 12px; font-weight: 700; color: #2563eb; margin-bottom: 6px;"><i class="fas fa-list-ul"></i> RINCIAN & UKURAN PAKET:</div>' +
          '<pre style="margin-top: 0; background: #f8fafc; color: #065f46; white-space: pre-wrap; word-break: break-word; font-size: 11px; max-height: 200px; overflow-y: auto; padding: 12px; border-radius: 10px; border: 1px solid #e2e8f0; line-height: 1.5;">' + deskripsi + '</pre>' +
          '<div style="margin-top: 15px; display:flex; gap:8px;">' +
            '<button class="btn btn-success" style="flex:1;" onclick="closeModal(\'modalProductDetail\'); openBeliModal(\'' + item.uid + '\', false);"><i class="fas fa-bolt"></i> Beli via ' + item.server.toUpperCase() + '</button>' +
            (isXlaOnly ? '<button class="btn btn-warning" style="flex:1;" onclick="closeModal(\'modalProductDetail\'); openBeliModal(\'' + item.uid + '\', true);"><i class="fas fa-clock"></i> Pre-Order</button>' : '') +
          '</div>';
      }
      const modal = document.getElementById('modalProductDetail');
      if (modal) modal.style.display = 'flex';
    }
    
    let rawUserPoList = [];
    let userPoFilterStatus = 'ALL';
    window._poCancelLocks = window._poCancelLocks || {};
    window._poRefundedRefs = window._poRefundedRefs || {};
    
    async function loadUserPreorders(showToast = false) {
      if (!currentUser) return;
      const container = document.getElementById('userPoListContainer');
      if (showToast && typeof toast === 'function') toast('info', 'Memuat PO', 'Mengambil riwayat Pre-Order...');
      try {
        let list = [];
        try {
          const res = await fetch(`api/preorder.php?action=my_list&username=${encodeURIComponent(currentUser.username)}&session_token=${encodeURIComponent(currentUser.session_token || '')}&_t=${Date.now()}`);
          const json = await res.json();
          if (json && json.status && Array.isArray(json.data)) {
            list = json.data;
          }
        } catch (apiErr) {}
    
        if (Array.isArray(rawUserHistory) && rawUserHistory.length > 0) {
          rawUserHistory.forEach(item => {
            const ref = String(item.refid_h2h || item.ref_id || '');
            if (ref.startsWith('PO_') || ref.startsWith('PO-') || item.is_preorder) {
              if (!list.some(x => (x.ref_id === ref || x.refid_h2h === ref))) {
                list.push({
                  ref_id: ref,
                  nama: item.produk_nama || item.kode_produk || 'Akrab Fresh',
                  kode: item.kode_produk || 'XLA',
                  target: item.target || '-',
                  harga: parseInt(item.harga || 0),
                  status: String(item.status || 'PENDING').toUpperCase(),
                  sn: item.sn || '-',
                  message: item.message || '-',
                  created_at: item.created_at || '-'
                });
              }
            }
          });
        }
    
        rawUserPoList = list.sort((a, b) => String(b.created_at || '').localeCompare(String(a.created_at || '')));
        renderUserPoList();
        if (showToast && typeof toast === 'function') toast('success', 'PO Dimuat', `${rawUserPoList.length} data Pre-Order ditemukan`);
      } catch (err) {
        if (container) container.innerHTML = '<div style="text-align:center; padding:20px; color:var(--danger);">Gagal memuat riwayat PO</div>';
      }
    }
    
    function filterUserPo(status) {
      userPoFilterStatus = status;
      ['poChipAll', 'poChipPending', 'poChipSuccess', 'poChipFailed'].forEach(id => {
        const el = document.getElementById(id);
        if (el) el.classList.remove('active');
      });
      if (status === 'ALL') document.getElementById('poChipAll')?.classList.add('active');
      if (status === 'PENDING') document.getElementById('poChipPending')?.classList.add('active');
      if (status === 'BERHASIL') document.getElementById('poChipSuccess')?.classList.add('active');
      if (status === 'GAGAL') document.getElementById('poChipFailed')?.classList.add('active');
      renderUserPoList();
    }
    
    function renderUserPoList() {
      const container = document.getElementById('userPoListContainer');
      if (!container) return;
      const q = (document.getElementById('userPoSearch')?.value || '').toLowerCase().trim();
      const list = rawUserPoList || [];
    
      let countPending = 0, countOk = 0, countFail = 0;
      list.forEach(po => {
        const st = String(po.status || 'PENDING').toUpperCase();
        if (st === 'BERHASIL') countOk++;
        else if (st === 'GAGAL' || st === 'BATAL' || st === 'REFUND') countFail++;
        else countPending++;
      });
    
      document.getElementById('poUserStatTotal') && (document.getElementById('poUserStatTotal').innerText = list.length);
      document.getElementById('poUserStatPending') && (document.getElementById('poUserStatPending').innerText = countPending);
      document.getElementById('poUserStatOk') && (document.getElementById('poUserStatOk').innerText = countOk);
      document.getElementById('poUserStatFail') && (document.getElementById('poUserStatFail').innerText = countFail);
    
      const filtered = list.filter(po => {
        const st = String(po.status || 'PENDING').toUpperCase();
        if (userPoFilterStatus === 'PENDING' && st !== 'PENDING') return false;
        if (userPoFilterStatus === 'BERHASIL' && st !== 'BERHASIL') return false;
        if (userPoFilterStatus === 'GAGAL' && !(st === 'GAGAL' || st === 'BATAL' || st === 'REFUND')) return false;
        if (q) {
          const hay = [po.ref_id, po.refid_h2h, po.target, po.kode, po.nama, po.sn, po.message].map(x => String(x || '').toLowerCase()).join(' ');
          return hay.includes(q);
        }
        return true;
      });
    
      if (!filtered.length) {
        container.innerHTML = '<div style="text-align:center; padding:30px; color:var(--text-sub);"><i class="fas fa-clock" style="font-size:24px; opacity:0.3; margin-bottom:8px; display:block;"></i>Tidak ada data riwayat Pre-Order yang cocok</div>';
        return;
      }
    
      let html = '';
      filtered.forEach((po, index) => {
        const ref = String(po.ref_id || po.refid_h2h || '-');
        const st = String(po.status || 'PENDING').toUpperCase();
        const isSuccess = (st === 'BERHASIL');
        const isFailed = (st === 'GAGAL' || st === 'BATAL' || st === 'REFUND');
        const isPending = !isSuccess && !isFailed;
        const statusBadge = isSuccess ? '<span class="badge badge-success"><i class="fas fa-circle-check"></i> BERHASIL</span>' : (isFailed ? '<span class="badge badge-fail"><i class="fas fa-ban"></i> DIBATALKAN</span>' : '<span class="badge badge-pending"><i class="fas fa-hourglass-half"></i> ANTREAN PENDING</span>');
        const hargaNum = parseInt(po.harga || 0);
        const isLocked = !!window._poCancelLocks[ref] || !!window._poRefundedRefs[ref];
    
        let cardSnBox = '';
        if (isSuccess) {
          cardSnBox = `
          <div style="background: #ecfdf5; border: 1.5px solid #a7f3d0; border-radius: 12px; padding: 12px 14px; margin-top: 10px; margin-bottom: 12px;">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:4px;">
              <small style="font-size:10px; color:#047857; font-weight:800; text-transform:uppercase;"><i class="fas fa-shield-halved"></i> SN RESMI DARI PUSAT</small>
              <span class="badge badge-success" style="font-size:8px;">SUKSES AKTIF</span>
            </div>
            <div style="display:flex; justify-content:space-between; align-items:center; gap:8px;">
              <span class="mono" style="font-size:13px; font-weight:900; color:#065f46; word-break:break-all;" id="txtSn_${ref}">${esc(po.sn || 'SN Diterbitkan')}</span>
              <button type="button" class="btn btn-outline btn-sm" style="padding:4px 8px; font-size:10px;" onclick="copyToClipboard('${esc(String(po.sn || ''))}', 'SN Resmi')"><i class="fas fa-copy"></i> Salin</button>
            </div>
          </div>`;
        } else if (isPending) {
          cardSnBox = `
          <div style="background: #fffbeb; border: 1.5px dashed #fde68a; border-radius: 12px; padding: 12px 14px; margin-top: 10px; margin-bottom: 12px;">
            <div style="display:flex; align-items:center; gap:8px; color:#b45309; font-size:11px; font-weight:700;">
              <i class="fas fa-hourglass-half fa-spin" style="color:#f59e0b; font-size:14px;"></i>
              <span>${esc(po.message && po.message !== '-' ? po.message : 'Menunggu Ketersediaan Stok & Giliran Eksekusi Admin')}</span>
            </div>
            <small style="display:block; margin-top:4px; font-size:10px; color:#78350f;">Saldo belum dipotong. Sistem otomatis memotong saldo ketika pesanan sukses terbit SN.</small>
          </div>`;
        } else {
          cardSnBox = `
          <div style="background: #fef2f2; border: 1px solid #fecaca; border-radius: 12px; padding: 10px 14px; margin-top: 10px; margin-bottom: 12px; color:#991b1b; font-size:11px;">
            <i class="fas fa-circle-xmark"></i> Pesanan telah dibatalkan & saldo telah direfund 100% ke akun Anda.
          </div>`;
        }
    
        let actionBtn = '';
        if (isPending) {
          actionBtn = `
          <button type="button" class="btn btn-danger btn-sm" id="btnBatalPo_${ref}" ${isLocked ? 'disabled style="opacity:0.6; cursor:not-allowed;"' : ''} onclick="batalPreorderUser('${ref}', ${hargaNum})">
            ${isLocked ? '<i class="fas fa-lock"></i> Sedang Diproses...' : '<i class="fas fa-ban"></i> Batalkan PO & Refund Saldo'}
          </button>`;
        } else {
          actionBtn = '<small style="color:var(--text-sub); font-size:10px; font-weight:700;"><i class="fas fa-check-double"></i> Status Final (Terkunci)</small>';
        }
    
        html += `
        <div class="product-card-4d" style="background:#ffffff; border:1.5px solid #bfdbfe; border-radius:16px; padding:16px; position:relative; box-shadow:0 4px 15px rgba(37,99,235,0.06);">
          <div style="display:flex; justify-content:space-between; align-items:flex-start; margin-bottom:8px; gap:8px;">
            <div>
              <span class="badge badge-user mono" style="margin-bottom:4px;">${ref}</span>
              <div style="font-size:14px; font-weight:800; color:#0f172a;">${esc(po.nama || po.kode)}</div>
            </div>
            <div style="text-align:right;">
              ${statusBadge}
              <small style="display:block; margin-top:4px; font-size:10px; color:var(--text-sub);">${esc(po.created_at || '-')}</small>
            </div>
          </div>
          <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(140px, 1fr)); gap:6px; background:#eff6ff; padding:8px 12px; border-radius:10px; font-size:11px; margin-bottom:4px; border:1px solid #bfdbfe;">
            <div><span style="color:var(--text-sub);">Tujuan:</span> <b class="mono" style="color:#002dbb;">${esc(po.target)}</b></div>
            <div><span style="color:var(--text-sub);">Kode:</span> <b class="mono">${esc(po.kode)}</b></div>
            <div><span style="color:var(--text-sub);">Harga PO:</span> <b style="color:#059669;">Rp ${hargaNum.toLocaleString('id-ID')}</b></div>
          </div>
          ${cardSnBox}
          <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:8px;">
            <button type="button" class="btn btn-outline btn-sm" onclick="copyToClipboard('${ref}', 'RefID PO')"><i class="fas fa-copy"></i> Salin RefID</button>
            ${actionBtn}
          </div>
        </div>`;
      });
    
      container.innerHTML = html;
    }
    
    async function batalPreorderUser(refId, harga) {
      if (!currentUser) return;
      if (window._poRefundedRefs[refId]) {
        toast('error', 'Sudah Di-Refund', 'Saldo untuk transaksi ini sudah dikembalikan dan tidak bisa dibatalkan lagi.');
        return;
      }
      if (window._poCancelLocks[refId]) {
        toast('warn', 'Sedang Diproses', 'Permintaan pembatalan sudah berjalan, harap tunggu...');
        return;
      }
    
      const nominalFmt = 'Rp ' + Number(harga || 0).toLocaleString('id-ID');
      if (!confirm(`Konfirmasi Pembatalan Pre-Order:\n\nRefID: ${refId}\nNominal: ${nominalFmt}\n\nYakin ingin membatalkan antrean Pre-Order ini?`)) {
        return;
      }
    
      window._poCancelLocks[refId] = true;
      const btn = document.getElementById('btnBatalPo_' + refId);
      if (btn) {
        btn.disabled = true;
        btn.style.opacity = '0.6';
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses Batal...';
      }
    
      try {
        const res = await fetch('api/preorder.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json', 'X-API-KEY': currentUser.api_key || '' },
          body: JSON.stringify({
            action: 'cancel',
            ref_id: refId,
            username: currentUser.username,
            session_token: currentUser.session_token || '',
            api_key: currentUser.api_key || '',
            alasan: 'Dibatalkan oleh member via tab Riwayat PO'
          })
        });
        const data = await res.json();
    
        if (data && (data.status === true || String(data.message || '').toLowerCase().includes('berhasil'))) {
          window._poRefundedRefs[refId] = true;
    
          const refAmt = parseInt(data.refunded || 0);
          if (refAmt > 0) {
            if (currentUser.saldo !== undefined) currentUser.saldo += refAmt;
            if (currentUser.saldo_akrab !== undefined) currentUser.saldo_akrab += refAmt;
            updateBalanceDisplay();
          }
    
          const item = rawUserPoList.find(x => (x.ref_id === refId || x.refid_h2h === refId));
          if (item) {
            item.status = 'GAGAL';
            item.message = data.message || 'Pre-Order dibatalkan';
          }
          if (Array.isArray(rawUserHistory)) {
            const histItem = rawUserHistory.find(x => (x.refid_h2h === refId || x.ref_id === refId));
            if (histItem) histItem.status = 'GAGAL';
          }
    
          toast('success', 'PO Berhasil Dibatalkan', data.message || 'Pre-Order berhasil dibatalkan.');
          renderUserPoList();
          if (typeof loadUserHistory === 'function') loadUserHistory();
        } else {
          delete window._poCancelLocks[refId];
          if (btn) {
            btn.disabled = false;
            btn.style.opacity = '1';
            btn.innerHTML = '<i class="fas fa-ban"></i> Batalkan PO & Refund Saldo';
          }
          toast('error', 'Gagal Membatalkan', (data && data.message) ? data.message : 'Server menolak pembatalan.');
        }
      } catch (err) {
        delete window._poCancelLocks[refId];
        if (btn) {
          btn.disabled = false;
          btn.style.opacity = '1';
          btn.innerHTML = '<i class="fas fa-ban"></i> Batalkan PO & Refund Saldo';
        }
        toast('error', 'Kendala Jaringan', 'Terjadi kesalahan saat memproses pembatalan: ' + err.message);
      }
    }
    
    
    async function loadApiStatusConfig() {
        try {
            const res = await fetch(`api/sysdatabase/auth.php?action=get_api_status&_t=${Date.now()}`, { cache: "no-store" });
            const data = await res.json();
            if (data.status && data.data) {
                const isMaint = (data.data.maintenance === true || data.data.maintenance === '1' || data.data.maintenance === 1 || data.data.is_maintenance === true || data.data.is_maintenance === '1');
                window.isSystemMaintenance = isMaint;
                const suspOverlay = document.getElementById('suspendedOverlay');
                if (isMaint && currentUser && currentUser.role !== 'admin') {
                    if (suspOverlay) {
                        const titleEl = suspOverlay.querySelector('h2');
                        const descEl = suspOverlay.querySelector('p');
                        if (titleEl) titleEl.innerText = 'Sistem Sedang Maintenance';
                        if (descEl) descEl.innerText = 'Sistem saat ini sedang dalam pemeliharaan berkala untuk peningkatan performa. Silakan coba beberapa saat lagi.';
                        suspOverlay.style.display = 'flex';
                    }
                    document.getElementById('authOverlay').style.display = 'none';
                    document.getElementById('mainDashboard').style.display = 'none';
                    return;
                } else if (!isMaint && suspOverlay && suspOverlay.style.display === 'flex' && suspOverlay.querySelector('h2') && suspOverlay.querySelector('h2').innerText.includes('Maintenance')) {
                    suspOverlay.style.display = 'none';
                    if (currentUser) document.getElementById('mainDashboard').style.display = 'block';
                }
                ['api1', 'api2', 'api4'].forEach(function(apiKey) {
                    const isOnline = data.data[apiKey] !== false && data.data[apiKey] !== '0';
                    const badgeKey = apiKey.charAt(0).toUpperCase() + apiKey.slice(1);
                    const badge = document.getElementById('status' + badgeKey + 'Badge');
                    if (badge) {
                        badge.className = isOnline ? 'badge badge-success' : 'badge badge-fail';
                        badge.innerHTML = '<i class="fas fa-server"></i> ' + badgeKey.toUpperCase() + ': ' + (isOnline ? 'ONLINE' : 'OFFLINE');
    
                    }
                });
            }
        } catch(e) {}
    }
    
    function renderApp() {
        const isMaintenance = !!(currentUser.is_maintenance || currentUser.maintenance || window.isSystemMaintenance);
        if (currentUser.role !== 'admin') {
            if (isMaintenance) {
                const suspOverlay = document.getElementById('suspendedOverlay');
                if (suspOverlay) {
                    const titleEl = suspOverlay.querySelector('h2');
                    const descEl = suspOverlay.querySelector('p');
                    if (titleEl) titleEl.innerText = 'Sistem Sedang Maintenance';
                    if (descEl) descEl.innerText = 'Sistem saat ini sedang dalam pemeliharaan berkala untuk peningkatan performa. Silakan coba beberapa saat lagi.';
                    suspOverlay.style.display = 'flex';
                }
                document.getElementById('authOverlay').style.display = 'none';
                document.getElementById('mainDashboard').style.display = 'none';
                return;
            }
            if (currentUser.is_blocked || currentUser.status === 'blocked' || currentUser.status === 'suspended') {
                document.getElementById('suspendedOverlay').style.display = 'flex';
                document.getElementById('authOverlay').style.display = 'none';
                document.getElementById('mainDashboard').style.display = 'none';
                return;
            }
        }
        document.getElementById('suspendedOverlay').style.display = 'none';
    
        document.getElementById('authOverlay').style.display = 'none';
        document.getElementById('mainDashboard').style.display = 'block';
        document.getElementById('userNavInfo').style.display = 'flex';
    
        if (document.getElementById('profUsernameKtp')) document.getElementById('profUsernameKtp').innerText = currentUser.username;
        if (document.getElementById('profEmailKtp')) document.getElementById('profEmailKtp').innerText = currentUser.email;
        if (document.getElementById('profWAKtp')) document.getElementById('profWAKtp').innerText = currentUser.nomorwa;
    
        if (document.getElementById('profIpWhitelistKtp')) {
            const rawIps = currentUser.ip_whitelist || '';
            const ipDisplay = Array.isArray(rawIps) ? rawIps.join(', ') : rawIps;
            document.getElementById('profIpWhitelistKtp').innerText = ipDisplay || 'Terbuka (Semua IP)';
            document.getElementById('profIpWhitelistKtp').title = ipDisplay ? ('IP Whitelist Aktif: ' + ipDisplay) : 'Hubungi admin untuk mendaftarkan IP server H2H Anda';
        }
    
        if (document.getElementById('profWebhookUrlKtp')) {
            const curWh = currentUser.callback_url || '';
            document.getElementById('profWebhookUrlKtp').innerText = curWh ? (curWh.length > 25 ? curWh.slice(0, 22) + '...' : curWh) : 'Belum diatur';
            document.getElementById('profWebhookUrlKtp').title = curWh || 'Klik tombol Set Webhook untuk mengatur URL Callback';
        }
        if (document.getElementById('profRoleKtp')) {
            const r = String(currentUser.role || 'reseller').toLowerCase();
            let roleTxt = 'RESELLER';
            let roleBadgeClass = 'badge-user';
            if (r === 'admin') {
                roleTxt = 'ADMIN';
                roleBadgeClass = 'badge-admin';
            } else if (r === 'seller' || r === 'vip') {
                roleTxt = 'SELLER VIP';
                roleBadgeClass = 'badge-purple';
            }
            document.getElementById('profRoleKtp').innerText = roleTxt;
            document.getElementById('profRoleKtp').className = 'badge ' + roleBadgeClass;
        }
    
        loadRunningTextConfig();
        loadTelegramStockNotifLink();
        isBalanceVisible = true;
        updateBalanceDisplay();
        isApiKeyVisible = false;
        updateApiKeyDisplay();
        startRealtimeAutoRefresh();
        const rawUserWA = String(currentUser.nomorwa || '').replace(/\D/g, '');
        const isDummyWA = rawUserWA.startsWith('0899') && rawUserWA.length <= 12;
        const isDummyUser = String(currentUser.username || '').startsWith('user_');
        const isGoogleAccount = !!(currentUser.google_auth || (currentUser.email && currentUser.email.includes('@gmail.com')));
        const needsCompletion = currentUser.role !== 'admin' && isGoogleAccount && (
            currentUser.profile_completed !== true ||
            currentUser.needs_profile_completion === true ||
            isDummyWA ||
            isDummyUser ||
            rawUserWA.length < 10
        );
        if (needsCompletion) {
            const emailPart = (currentUser.email || '').split('@')[0].replace(/[^a-zA-Z0-9_]/g, '');
            const gEmailEl = document.getElementById('gCompleteEmailTxt');
            if (gEmailEl) gEmailEl.innerText = currentUser.email || '-';
            const gUserEl = document.getElementById('gCompleteUsername');
            if (gUserEl) {
                gUserEl.value = (currentUser.username && !isDummyUser && currentUser.username !== currentUser.email) ? currentUser.username : emailPart;
            }
            const gWAEl = document.getElementById('gCompleteWA');
            if (gWAEl && isDummyWA) gWAEl.value = '';
            const gModal = document.getElementById('modalGoogleCompleteProfile');
            if (gModal) gModal.style.display = 'flex';
        }
    
        switchTab('dashboard');
        renderHargaServerOptions();
        renderDocTabsForRole();
    
        loadHargaTerkini();
        loadApiStatusConfig();
        loadUserHistory();
        if (typeof isDedicatedUser === 'function' && isDedicatedUser()) {
            syncDedicatedBalanceLive(true);
        }
    
    
    }
    
    function handleLogout() {
        localStorage.removeItem('dt17_user_session'); sessionStorage.removeItem('dt17_user_session');
        localStorage.removeItem('dt17_session'); sessionStorage.removeItem('dt17_session');
        location.reload();
    }
    
    function copyApiKey() {
        if (!isUserVerified()) {
            toast('warn', 'Akses Terkunci', 'Akun belum diverifikasi oleh Admin. API Key belum tersedia!');
            return;
        }
        navigator.clipboard.writeText(currentUser.api_key);
        toast('success', 'Berhasil', 'API Key disalin ke clipboard!');
    }
    
    function regenApiKey() {
        if (!isUserVerified()) {
            toast('error', 'Akses Terkunci', 'Tombol Reset Key tidak berfungsi sampai akun Anda diverifikasi oleh Admin!');
            return;
        }
        document.getElementById("regenPasswordInput").value = "";
        document.getElementById("modalRegenKey").style.display = "flex";
    }
    
    async function submitRegenApiKey() {
        const userPass = document.getElementById("regenPasswordInput").value.trim();
        if (!userPass) {
            alert("Harap masukkan Kata Sandi!");
            return;
        }
        const res = await fetch("api/sysdatabase/auth.php", { method: "POST", body: JSON.stringify({ action: "regen_key", session_token: currentUser.session_token, password: userPass }) });
        const data = await res.json();
        if (data.status) {
            currentUser.api_key = data.new_api_key;
            updateApiKeyDisplay();
            closeModal("modalRegenKey");
            alert("API Key baru berhasil dibuat!");
        } else {
            alert(data.message || "Gagal memperbarui API Key. Pastikan kata sandi benar!");
        }
    }
    
    function selectTopupWallet(w) {
        const inp = document.getElementById('topupTargetWallet');
        if (inp) inp.value = w;
        const allowed = (typeof getUserAllowedApisClient === 'function') ? getUserAllowedApisClient() : ['api1'];
        const b1 = document.getElementById('btnWallTargetAkrab');
        const b2 = document.getElementById('btnWallTargetApi2');
        const b4 = document.getElementById('btnWallTargetPpob');
        const setBtnStyle = (btn, isAct, isAllowed) => {
            if (!btn) return;
            if (!isAllowed) {
                btn.style.display = 'none';
                return;
            }
            btn.style.display = 'inline-flex';
            if (isAct) {
                btn.className = 'btn btn-sm active';
                btn.style.setProperty('background', 'linear-gradient(135deg, #002dbb, #0050d8)', 'important');
                btn.style.setProperty('color', '#ffffff', 'important');
                btn.style.setProperty('border', '1.5px solid #002dbb', 'important');
                btn.style.setProperty('box-shadow', '0 3px 10px rgba(0, 45, 187, 0.35)', 'important');
            } else {
                btn.className = 'btn btn-outline btn-sm';
                btn.style.setProperty('background', '#ffffff', 'important');
                btn.style.setProperty('color', '#002dbb', 'important');
                btn.style.setProperty('border', '1.5px solid #bcd0ee', 'important');
                btn.style.setProperty('box-shadow', 'none', 'important');
            }
        };
        setBtnStyle(b1, w === 'akrab', allowed.includes('api1'));
        setBtnStyle(b2, w === 'api2', allowed.includes('api2'));
        setBtnStyle(b4, w === 'ppob', allowed.includes('api4'));
    
        const inputSec = document.getElementById('topupInputSection');
        const qrisSec  = document.getElementById('topupQrisSection');
        const dedSec   = document.getElementById('topupDedicatedSection');
    
        if (w === 'akrab' && typeof isDedicatedUser === 'function' && isDedicatedUser()) {
            stopIndoPayPolling();
            if (inputSec) inputSec.style.display = 'none';
            if (qrisSec) qrisSec.style.display = 'none';
            if (dedSec) dedSec.style.display = 'block';
            if (typeof syncDedicatedBalanceLive === 'function') syncDedicatedBalanceLive(true);
            if (typeof checkOrLoadDedicatedTicket === 'function') checkOrLoadDedicatedTicket();
        } else {
            if (typeof stopDedicatedPolling === 'function') stopDedicatedPolling();
            if (dedSec) dedSec.style.display = 'none';
            let pendingStr = localStorage.getItem('dt17_pending_topup_' + currentUser.username);
            let hasActivePending = false;
            if (pendingStr) {
                try {
                    let pending = JSON.parse(pendingStr);
                    const pendingWallet = pending.wallet || 'akrab';
                    if (Date.now() - pending.time < 3600 * 1000 && pendingWallet === w) {
                        hasActivePending = true;
                        renderActiveTopupView(pending);
                        startTopupTimer(pending.time + (3600 * 1000));
                        startIndoPayPolling(pending.id);
                    }
                } catch(e) {}
            }
            if (!hasActivePending) {
                if (qrisSec) qrisSec.style.display = 'none';
                if (inputSec) inputSec.style.display = 'block';
                handleTopupAmountChange();
            }
        }
    }
    
    function renderDocTabsForRole() {
        if (!currentUser) return;
        const btnStd = document.getElementById('btnDocStandard');
        const btnApi2 = document.getElementById('btnDocApi2');
        const btnApi4 = document.getElementById('btnDocApi4');
        if (btnStd) btnStd.style.display = 'inline-flex';
        if (btnApi2) btnApi2.style.display = 'inline-flex';
        if (btnApi4) btnApi4.style.display = 'inline-flex';
        switchDocTab('standard');
    }
    
    function switchDocTab(docType) {
        const btnStd = document.getElementById('btnDocStandard');
        const btnApi2 = document.getElementById('btnDocApi2');
        const btnApi4 = document.getElementById('btnDocApi4');
        const docStd = document.getElementById('docStandardView');
        const docApi2 = document.getElementById('docApi2View');
        const docApi4 = document.getElementById('docApi4View');
        const actCls = 'padding: 10px 18px; font-size: 12px; font-weight: 800; background: linear-gradient(135deg, #002dbb, #0050d8) !important; border: 1.5px solid transparent !important; color: #ffffff !important; box-shadow: 0 4px 14px rgba(0,45,187,0.3) !important; border-radius: 9px; display: inline-flex;';
        const outCls = 'padding: 10px 18px; font-size: 12px; font-weight: 800; background: #ffffff !important; border: 1.5px solid #bfdbfe !important; color: #002dbb !important; box-shadow: 0 2px 6px rgba(0,0,0,0.05) !important; border-radius: 9px; display: inline-flex;';
        if (btnStd) btnStd.style.cssText = (docType === 'standard') ? actCls : outCls;
        if (btnApi2) btnApi2.style.cssText = (docType === 'api2') ? actCls : outCls;
        if (btnApi4) btnApi4.style.cssText = (docType === 'api4') ? actCls : outCls;
        if (docStd) docStd.style.display = (docType === 'standard') ? 'block' : 'none';
        if (docApi2) docApi2.style.display = (docType === 'api2') ? 'block' : 'none';
        if (docApi4) docApi4.style.display = (docType === 'api4') ? 'block' : 'none';
    }
    
    function switchTab(tab) {
        document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
        const pemanggil = (window.event && window.event.currentTarget && window.event.currentTarget.classList) ? window.event.currentTarget : null;
        if (pemanggil) pemanggil.classList.add('active');
        const mapBtnId = { dashboard: 'tabBtnDashboard', trxLangsung: 'tabBtnTrxLangsung', history: 'tabBtnHistory', riwayatPo: 'tabBtnRiwayatPo', botTele: 'tabBtnBotTele', cekQuota: 'tabBtnCekQuota', lacak: 'tabBtnLacak', tester: 'tabBtnTester', doc: 'tabBtnDoc' };
        if (mapBtnId[tab] && document.getElementById(mapBtnId[tab])) document.getElementById(mapBtnId[tab]).classList.add('active');
        if (document.getElementById('tabDashboard')) document.getElementById('tabDashboard').style.display = (tab === 'dashboard') ? 'block' : 'none';
        const gFooter = document.getElementById('globalDashboardFooter');
        if (gFooter) gFooter.style.display = (tab === 'dashboard') ? 'block' : 'none';
    
        if (document.getElementById('tabTrxLangsung')) document.getElementById('tabTrxLangsung').style.display = (tab === 'trxLangsung') ? 'block' : 'none';
        if (document.getElementById('tabRiwayatPo')) document.getElementById('tabRiwayatPo').style.display = (tab === 'riwayatPo') ? 'block' : 'none';
        if (tab === 'riwayatPo' && typeof loadUserPreorders === 'function') loadUserPreorders(false);
    
        if (document.getElementById('tabHistory')) document.getElementById('tabHistory').style.display = (tab === 'history') ? 'block' : 'none';
        if (document.getElementById('tabLacak')) document.getElementById('tabLacak').style.display = (tab === 'lacak') ? 'block' : 'none';
        if (document.getElementById('tabCekQuota')) document.getElementById('tabCekQuota').style.display = (tab === 'cekQuota') ? 'block' : 'none';
        if (document.getElementById('tabDoc')) {
            document.getElementById('tabDoc').style.display = (tab === 'doc') ? 'block' : 'none';
            if (tab === 'doc' && typeof renderDocTabsForRole === 'function') renderDocTabsForRole();
        }
        if (document.getElementById('tabTester')) document.getElementById('tabTester').style.display = (tab === 'tester') ? 'block' : 'none';
        if (document.getElementById('tabBotTele')) document.getElementById('tabBotTele').style.display = (tab === 'botTele') ? 'block' : 'none';
        if (tab === 'botTele') { checkAndRenderBotTeleAccess(); }
    
        if (tab === 'lacak' && typeof renderLacak === 'function') renderLacak();
    }
    let _telebotActiveSub = 'downlines';
    
    let _telebotMethodsList = [];
    let _telebotTiersList = [];
    let _rawTelebotDownlines = [];
    let _rawTelebotHistory = [];
    let _rawDownlineTopups = [];
    
    
    function switchTelebotSub(subName) {
        _telebotActiveSub = subName;
        const subButtons = {
            config: document.getElementById('btnSubTeleConfig'),
            topup: document.getElementById('btnSubTeleTopup'),
            downlines: document.getElementById('btnSubTeleDownlines'),
            history: document.getElementById('btnSubTeleHistory'),
            requests: document.getElementById('btnSubTeleRequests'),
            broadcast: document.getElementById('btnSubTeleBroadcast')
        };
        Object.keys(subButtons).forEach(k => {
            if (subButtons[k]) subButtons[k].classList.toggle('active', k === subName);
        });
    
        const sections = ['config', 'topup', 'downlines', 'history', 'requests', 'broadcast'];
        sections.forEach(s => {
            const el = document.getElementById('telebotSection_' + s);
            if (el) el.style.display = (s === subName) ? 'block' : 'none';
        });
    }
    
    async function loadTelebotConfig() {
        if (!currentUser) return;
        const sToken = currentUser.session_token || '';
        const aKey = currentUser.api_key || '';
        const whVal = document.getElementById('telebotWebhookStatusVal');
        try {
            const res = await fetch(`api/telebot_admin.php?action=get_config&session_token=${encodeURIComponent(sToken)}&api_key=${encodeURIComponent(aKey)}&_t=${Date.now()}`);
            const json = await res.json();
            if (json && json.status && json.data) {
                const d = json.data;
                const titleInp = document.getElementById('telebotTitleInput');
                const tokenInp = document.getElementById('telebotTokenInput');
                const markupInp = document.getElementById('telebotMarkupInput');
                const activeSw = document.getElementById('telebotActiveSwitch');
                const bankInp = document.getElementById('telebotBankInfoInput');
                if (titleInp) titleInp.value = d.bot_title || '';
                if (tokenInp) tokenInp.value = d.bot_token || '';
                if (markupInp) markupInp.value = d.markup || 0;
                if (activeSw) activeSw.checked = d.is_active !== false;
                if (bankInp) bankInp.value = d.bank_info || '';
    
                const tp = d.topup_settings || {};
                const minTopupInp = document.getElementById('telebotMinTopupInput');
                const uplineChatInp = document.getElementById('telebotUplineChatIdInput');
                if (minTopupInp) minTopupInp.value = tp.min_topup || 10000;
                if (uplineChatInp) uplineChatInp.value = tp.upline_chat_id || '';
    
                _telebotMethodsList = Array.isArray(tp.methods) && tp.methods.length ? tp.methods : [
                    { id: 'm_1', type: 'qris', name: 'QRIS Dinamis Otomatis', account_number: tp.qris_static || '', account_name: d.bot_title || 'Store', is_active: true },
                    { id: 'm_2', type: 'bank', name: tp.bank_name || 'Bank BCA', account_number: tp.rekening || '', account_name: tp.atas_nama || d.bot_title || 'Store', is_active: true }
                ];
                renderTelebotMethodsBuilder();
    
                _telebotTiersList = Array.isArray(tp.admin_fee_tiers) && tp.admin_fee_tiers.length ? tp.admin_fee_tiers : [
                    { min: 0, max: 100000, fee: 1000 },
                    { min: 100001, max: 1000000, fee: 3000 }
                ];
                renderTelebotTiersBuilder();
    
                const titleVal = document.getElementById('telebotTitleVal');
                const nameVal = document.getElementById('telebotNameVal');
                const userVal = document.getElementById('telebotUsernameVal');
                const totalDlVal = document.getElementById('tbStatTotalDownlines');
                const subDlVal = document.getElementById('tbSubTotalDl');
                if (titleVal) titleVal.innerText = d.bot_title || '-';
                if (nameVal) nameVal.innerText = d.bot_name || '-';
                if (userVal) {
                    if (d.bot_username) {
                        const cleanU = d.bot_username.replace('@', '');
                        userVal.innerHTML = `<a href="https://t.me/${cleanU}" target="_blank" style="color:#002dbb; font-weight:800; text-decoration:underline;">${d.bot_username}</a>`;
                    } else {
                        userVal.innerText = '-';
                    }
                }
                if (whVal) {
                    const isLinked = d.live_telegram && d.live_telegram.has_webhook;
                    whVal.innerHTML = isLinked 
                        ? '<span class="badge badge-success"><i class="fas fa-check-circle"></i> Terkoneksi</span>' 
                        : '<span class="badge badge-fail"><i class="fas fa-xmark"></i> Belum Terhubung</span>';
                }
                if (totalDlVal) totalDlVal.innerText = d.total_downline || 0;
                if (subDlVal) subDlVal.innerText = d.total_downline || 0;
            } else {
                if (whVal) whVal.innerHTML = '<span class="badge badge-fail"><i class="fas fa-xmark"></i> Belum Terhubung</span>';
                if (json && json.message && typeof toast === 'function') toast('warn', 'Bot Tele', json.message);
            }
        } catch(e) {
            if (whVal) whVal.innerHTML = '<span class="badge badge-fail"><i class="fas fa-triangle-exclamation"></i> Gagal Memuat</span>';
        }
    }
    function renderTelebotMethodsBuilder() {
        const container = document.getElementById('telebotMethodsContainer');
        if (!container) return;
        if (!_telebotMethodsList.length) {
            container.innerHTML = '<div class="empty" style="padding: 15px; font-size: 11px;"><i class="fas fa-credit-card"></i> Belum ada metode pembayaran. Klik [+ Tambah Metode]</div>';
            return;
        }
    
        container.innerHTML = _telebotMethodsList.map((m, idx) => {
            const isQris = (m.type === 'qris');
            return `
            <div style="background: #ffffff; border: 1.5px solid #d2e0f5; border-radius: 12px; padding: 12px; box-shadow: 0 2px 8px rgba(0,45,187,0.04);">
              <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                <b style="font-size: 11px; color: #002dbb;"><i class="fas ${isQris ? 'fa-qrcode' : 'fa-building-columns'}"></i> Metode #${idx + 1} (${m.type.toUpperCase()})</b>
                <div style="display: flex; align-items: center; gap: 8px;">
                  <label class="checkbox-group" style="margin-bottom: 0; font-size: 10px;">
                    <input type="checkbox" ${m.is_active !== false ? 'checked' : ''} onchange="_telebotMethodsList[${idx}].is_active=this.checked"> Aktif
                  </label>
                  <button type="button" class="btn btn-danger btn-sm" onclick="deleteTelebotMethodRow(${idx})" style="padding: 2px 6px; font-size: 9px;"><i class="fas fa-trash"></i></button>
                </div>
              </div>
              <div class="grid grid-2" style="gap: 8px;">
                <div class="form-group" style="margin-bottom: 6px;">
                  <label>Jenis Metode</label>
                  <select onchange="_telebotMethodsList[${idx}].type=this.value; renderTelebotMethodsBuilder();">
                    <option value="qris" ${m.type === 'qris' ? 'selected' : ''}>QRIS Dinamis Otomatis</option>
                    <option value="bank" ${m.type === 'bank' ? 'selected' : ''}>Transfer Bank</option>
                    <option value="ewallet" ${m.type === 'ewallet' ? 'selected' : ''}>E-Wallet (DANA, OVO, dll)</option>
                  </select>
                </div>
                <div class="form-group" style="margin-bottom: 6px;">
                  <label>Nama Bank / Label Metode</label>
                  <input type="text" value="${esc(m.name || '')}" oninput="_telebotMethodsList[${idx}].name=this.value" placeholder="Contoh: Bank BCA / DANA / QRIS" />
                </div>
              </div>
              <div class="grid grid-2" style="gap: 8px;">
                <div class="form-group" style="margin-bottom: 0;">
                  <label>${isQris ? 'String Kode Mentah QRIS Statis (EMVCo)' : 'Nomor Rekening / No. HP E-Wallet'}</label>
                  ${isQris 
                    ? `<textarea rows="2" oninput="_telebotMethodsList[${idx}].account_number=this.value" style="font-size: 9px; font-family: monospace;" placeholder="0002010102112659...">${esc(m.account_number || '')}</textarea>`
                    : `<input type="text" value="${esc(m.account_number || '')}" oninput="_telebotMethodsList[${idx}].account_number=this.value" placeholder="Nomor rekening / e-wallet..." />`}
                </div>
                <div class="form-group" style="margin-bottom: 0;">
                  <label>Atas Nama Akun / Merchant</label>
                  <input type="text" value="${esc(m.account_name || '')}" oninput="_telebotMethodsList[${idx}].account_name=this.value" placeholder="Nama pemilik rekening / merchant" />
                </div>
              </div>
            </div>`;
        }).join('');
    }
    
    function addTelebotMethodRow() {
        _telebotMethodsList.push({
            id: 'm_' + Date.now(),
            type: 'bank',
            name: 'Transfer Bank',
            account_number: '',
            account_name: document.getElementById('telebotTitleInput')?.value || 'Store',
            is_active: true
        });
        renderTelebotMethodsBuilder();
    }
    
    function deleteTelebotMethodRow(idx) {
        _telebotMethodsList.splice(idx, 1);
        renderTelebotMethodsBuilder();
    }
    
    function renderTelebotTiersBuilder() {
        const tbody = document.getElementById('telebotTiersTableBody');
        if (!tbody) return;
        if (!_telebotTiersList.length) {
            tbody.innerHTML = '<tr><td colspan="5" class="empty" style="padding: 10px;">Belum ada tiering biaya admin. Klik [+ Tambah Tier]</td></tr>';
            return;
        }
    
        tbody.innerHTML = _telebotTiersList.map((t, idx) => {
            const minVal = parseInt(t.min || 0);
            const maxVal = parseInt(t.max || 0);
            const feeVal = parseInt(t.fee || 0);
            return `<tr>
                <td><b class="text-blue">#${idx + 1}</b></td>
                <td><input type="number" min="0" step="1000" value="${minVal}" oninput="_telebotTiersList[${idx}].min=parseInt(this.value||0)" style="font-weight:700;"></td>
                <td><input type="number" min="0" step="1000" value="${maxVal}" oninput="_telebotTiersList[${idx}].max=parseInt(this.value||0)" placeholder="0 = Tak hingga" style="font-weight:700;"><small class="text-sub">${maxVal > 0 ? ('s.d Rp ' + maxVal.toLocaleString('id-ID')) : '<span class="badge badge-success">Tak Hingga</span>'}</small></td>
                <td><input type="number" min="0" step="500" value="${feeVal}" oninput="_telebotTiersList[${idx}].fee=parseInt(this.value||0)" style="color:#059669; font-weight:800;"></td>
                <td><button type="button" class="btn btn-danger btn-sm" onclick="deleteTelebotTierRow(${idx})" style="padding: 2px 6px;"><i class="fas fa-trash"></i></button></td>
            </tr>`;
        }).join('');
    }
    
    function addTelebotTierRow() {
        let nextMin = 0;
        if (_telebotTiersList.length > 0) {
            const lastMax = parseInt(_telebotTiersList[_telebotTiersList.length - 1].max || 0);
            nextMin = lastMax > 0 ? (lastMax + 1) : 0;
        }
        _telebotTiersList.push({
            min: nextMin,
            max: nextMin ? (nextMin + 100000) : 100000,
            fee: 1000
        });
        renderTelebotTiersBuilder();
    }
    
    function deleteTelebotTierRow(idx) {
        _telebotTiersList.splice(idx, 1);
        renderTelebotTiersBuilder();
    }
    
    async function saveTelebotTopupSettings() {
        return saveTelebotConfig();
    }
    
    async function saveTelebotConfig() {
        if (!currentUser) return;
        const sToken = currentUser.session_token || '';
        const aKey = currentUser.api_key || '';
        const botTitle = (document.getElementById('telebotTitleInput')?.value || '').trim();
        const token = (document.getElementById('telebotTokenInput')?.value || '').trim();
        const markup = parseInt(document.getElementById('telebotMarkupInput')?.value || 0, 10);
        const isActive = document.getElementById('telebotActiveSwitch')?.checked;
        const bankInfo = (document.getElementById('telebotBankInfoInput')?.value || '').trim();
    
        if (!token) return toast('warn', 'Token Kosong', 'Harap masukkan Bot Token dari @BotFather');
    
        const topupSettings = {
            min_topup: parseInt(document.getElementById('telebotMinTopupInput')?.value || 10000, 10),
            upline_chat_id: (document.getElementById('telebotUplineChatIdInput')?.value || '').trim(),
            upline_bot_token: token,
            methods: _telebotMethodsList,
            admin_fee_tiers: _telebotTiersList
        };
    
        const btn = document.getElementById('btnSaveTelebotConfig');
        if (btn) { btn.disabled = true; btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...'; }
    
        try {
            const res = await fetch('api/telebot_admin.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    action: 'save_config',
                    session_token: sToken,
                    api_key: aKey,
                    bot_title: botTitle,
                    bot_token: token,
                    markup: markup,
                    is_active: isActive,
                    bank_info: bankInfo,
                    topup_settings: topupSettings
                })
            });
            const json = await res.json();
            if (json && json.status) {
                toast('success', 'Konfigurasi Disimpan', json.message || 'Pengaturan bot berhasil diperbarui');
                loadTelebotConfig();
            } else {
                toast('error', 'Gagal', (json && json.message) ? json.message : 'Koneksi bot gagal');
            }
        } catch(e) {
            toast('error', 'Kesalahan', e.message);
        } finally {
            if (btn) { btn.disabled = false; btn.innerHTML = '<i class="fas fa-link"></i> Simpan & Sambungkan Webhook'; }
        }
    }
    async function disconnectTelebotWebhook() {
        if (!confirm('Putuskan kaitan Webhook Bot Telegram? Bot tidak akan merespon pesan sampai disambungkan kembali.'))
            return;
        try {
            const res = await fetch('api/telebot_admin.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ action: 'delete_webhook', session_token: currentUser.session_token })
            });
            const json = await res.json();
            toast(json.status ? 'success' : 'error', 'Webhook', json.message);
            loadTelebotConfig();
        } catch(e) {
            toast('error', 'Kesalahan', e.message);
        }
    }
    
    async function loadTelebotDownlines() {
        if (!currentUser) return;
        const sToken = currentUser.session_token || '';
        const aKey = currentUser.api_key || '';
        try {
            const res = await fetch(`api/telebot_admin.php?action=list_downlines&session_token=${encodeURIComponent(sToken)}&api_key=${encodeURIComponent(aKey)}&_t=${Date.now()}`);
            const json = await res.json();
                            if (json && json.status && Array.isArray(json.data)) {
                    _rawTelebotDownlines = json.data;
                    if (json.global_markup !== undefined) {
                        window._telebotGlobalMarkup = parseInt(json.global_markup || 0, 10);
                    }
                renderTelebotDownlines();
                const totalSaldo = _rawTelebotDownlines.reduce((a, b) => a + (parseInt(b.saldo || 0, 10)), 0);
                const saldoEl = document.getElementById('tbStatTotalSaldo');
                if (saldoEl) saldoEl.innerText = fmtRp(totalSaldo);
            }
        } catch(e) {}
    }
    function renderTelebotDownlines() {
        const tbody = document.getElementById('telebotDownlinesTableBody');
        if (!tbody) return;
        const q = (document.getElementById('telebotDownlineSearch')?.value || '').toLowerCase().trim();
        const list = _rawTelebotDownlines.filter(d => {
            if (!q) return true;
            const hay = [d.tele_id, d.name, d.username].map(x => String(x || '').toLowerCase()).join(' ');
            return hay.includes(q);
        });
    
        if (!list.length) {
            tbody.innerHTML = '<tr><td colspan="7" style="text-align:center; padding:25px; color:var(--text-sub);"><i class="fas fa-users" style="font-size:24px; opacity:0.3; margin-bottom:6px; display:block;"></i>Belum ada member downline di bot Anda. Downline otomatis terdaftar saat menekan /start.</td></tr>';
            return;
        }
    
        tbody.innerHTML = list.map(d => {
            const isBlocked = !!d.is_blocked;
            const usernameTxt = (d.username && d.username !== '-') ? `<a href="https://t.me/${d.username.replace('@','')}" target="_blank" style="color:#002dbb; text-decoration:underline;">@${d.username.replace('@','')}</a>` : '-';
            const isCustom = (d.custom_markup !== null && d.custom_markup !== undefined && d.custom_markup !== '');
            const gMarkup = (window._telebotGlobalMarkup !== undefined) ? window._telebotGlobalMarkup : 0;
            const markupBadge = isCustom
                ? `<span class="badge badge-purple" style="font-size:9px; padding:2px 6px;"><i class="fas fa-user-tag"></i> +${fmtRp(d.custom_markup)}</span>`
                : `<span class="badge badge-muted" style="font-size:9px; padding:2px 6px;"><i class="fas fa-globe"></i> Global (+${fmtRp(gMarkup)})</span>`;
            return `<tr>
                <td><code style="color:#002dbb; font-weight:800;">${esc(d.tele_id)}</code></td>
                <td><b>${esc(d.name || 'Member')}</b></td>
                <td>${usernameTxt}</td>
                <td><b class="text-success">${fmtRp(d.saldo || 0)}</b></td>
                <td><div style="display:flex; align-items:center; gap:4px; white-space:nowrap;">${markupBadge} <button type="button" class="btn-copy-inline" style="padding:2px 5px; font-size:8.5px; border-radius:4px; margin-left:2px;" onclick="openDownlineMarkupModal('${esc(d.tele_id)}', '${esc(d.name)}', ${isCustom ? parseInt(d.custom_markup, 10) : -1})" title="Setel Markup User"><i class="fas fa-pen"></i></button></div></td>
                <td>${isBlocked ? '<span class="badge badge-fail">DIBLOKIR</span>' : '<span class="badge badge-success">AKTIF</span>'}</td>
                <td style="white-space:nowrap;">
                    <button type="button" class="btn btn-outline btn-sm" onclick="openAdjustDownlineModal('${esc(d.tele_id)}', '${esc(d.name)}', ${parseInt(d.saldo || 0)})" title="Atur Saldo"><i class="fas fa-wallet"></i> Saldo</button>
                    ${isBlocked 
                        ? `<button type="button" class="btn btn-success btn-sm" onclick="toggleBlockDownline('${esc(d.tele_id)}', false)" title="Buka Blokir"><i class="fas fa-unlock"></i></button>`
                        : `<button type="button" class="btn btn-danger btn-sm" onclick="toggleBlockDownline('${esc(d.tele_id)}', true)" title="Blokir"><i class="fas fa-ban"></i></button>`}
                </td>
            </tr>`;
        }).join('');
    }
    
    function openDownlineMarkupModal(teleId, name, currentCustomMarkup) {
        document.getElementById('modalDlMarkupTeleId').value = teleId;
        document.getElementById('modalDlMarkupNameTxt').innerText = `${name} (${teleId})`;
        const gMarkup = window._telebotGlobalMarkup !== undefined ? window._telebotGlobalMarkup : 0;
        document.getElementById('modalDlGlobalMarkupTxt').innerText = `+${fmtRp(gMarkup)}`;
        const check = document.getElementById('modalDlUseGlobalCheck');
        const wrap = document.getElementById('modalDlCustomMarkupWrap');
        const input = document.getElementById('modalDlCustomMarkupInput');
        if (currentCustomMarkup === -1 || currentCustomMarkup === null || currentCustomMarkup === undefined) {
            if (check) check.checked = true;
            if (wrap) wrap.style.display = 'none';
            if (input) input.value = '';
        } else {
            if (check) check.checked = false;
            if (wrap) wrap.style.display = 'block';
            if (input) input.value = currentCustomMarkup;
        }
        document.getElementById('modalDownlineMarkup').style.display = 'flex';
    }
    
    function toggleDlMarkupGlobalInput(isGlobal) {
        const wrap = document.getElementById('modalDlCustomMarkupWrap');
        const input = document.getElementById('modalDlCustomMarkupInput');
        if (wrap) wrap.style.display = isGlobal ? 'none' : 'block';
        if (isGlobal && input) input.value = '';
    }
    
    async function submitDownlineMarkup() {
        const teleId = document.getElementById('modalDlMarkupTeleId').value;
        const isGlobal = document.getElementById('modalDlUseGlobalCheck').checked;
        const customMarkupVal = isGlobal ? -1 : parseInt(document.getElementById('modalDlCustomMarkupInput').value || 0, 10);
        const btn = document.getElementById('btnSubmitDlMarkup');
        if (btn) { btn.disabled = true; btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...'; }
        try {
            const res = await fetch('api/telebot_admin.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    action: 'set_downline_markup',
                    session_token: currentUser.session_token,
                    tele_id: teleId,
                    custom_markup: customMarkupVal,
                    is_global: isGlobal
                })
            });
            const json = await res.json();
            if (json && json.status) {
                toast('success', 'Markup Diperbarui', json.message);
                closeModal('modalDownlineMarkup');
                loadTelebotDownlines();
            } else {
                toast('error', 'Gagal', (json && json.message) ? json.message : 'Gagal menyimpan markup downline');
            }
        } catch(e) {
            toast('error', 'Kesalahan', e.message);
        } finally {
            if (btn) { btn.disabled = false; btn.innerHTML = '<i class="fas fa-check"></i> Simpan Markup'; }
        }
    }
    
    function openAdjustDownlineModal(teleId, name, currentSaldo) {
        document.getElementById('modalDlTeleId').value = teleId;
        document.getElementById('modalDlNameTxt').innerText = `${name} (${teleId})`;
        document.getElementById('modalDlCurrentSaldoTxt').innerText = fmtRp(currentSaldo);
        document.getElementById('modalDlAmount').value = '';
        document.getElementById('modalDlNote').value = 'Penyesuaian saldo Upline';
        document.getElementById('modalAdjustDownlineSaldo').style.display = 'flex';
    }
    
    async function submitAdjustDownlineSaldo() {
        const teleId = document.getElementById('modalDlTeleId').value;
        const type = document.getElementById('modalDlType').value;
        const amount = parseInt(document.getElementById('modalDlAmount').value || 0, 10);
        const note = document.getElementById('modalDlNote').value.trim();
    
        if (amount < 0) return toast('warn', 'Nominal Salah', 'Nominal tidak boleh negatif');
    
        try {
            const res = await fetch('api/telebot_admin.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    action: 'adjust_downline_saldo',
                    session_token: currentUser.session_token,
                    tele_id: teleId,
                    type: type,
                    amount: amount,
                    note: note
                })
            });
            const json = await res.json();
            if (json && json.status) {
                toast('success', 'Saldo Berhasil Disesuaikan', json.message);
                closeModal('modalAdjustDownlineSaldo');
                loadTelebotDownlines();
                loadTelebotHistory();
            } else {
                toast('error', 'Gagal', (json && json.message) ? json.message : 'Gagal menyesuaikan saldo');
            }
        } catch(e) {
            toast('error', 'Kesalahan', e.message);
        }
    }
    
    async function toggleBlockDownline(teleId, blockState) {
        const actionLabel = blockState ? 'Blokir' : 'Buka Blokir';
        if (!confirm(`Yakin ingin ${actionLabel} downline Telegram ID ${teleId}?`))
            return;
        try {
            const res = await fetch('api/telebot_admin.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    action: 'toggle_block_downline',
                    session_token: currentUser.session_token,
                    tele_id: teleId,
                    is_blocked: blockState
                })
            });
            const json = await res.json();
            toast(json.status ? 'success' : 'error', actionLabel, json.message);
            loadTelebotDownlines();
        } catch(e) {
            toast('error', 'Kesalahan', e.message);
        }
    }
    
    let telebotHistoryPage = 1;
    let telebotHistoryPerPage = 25;
    let _isTbAttentionOnly = false;
    let _prevTbTrxCount = 0;
    window._telebotAudioEnabled = (localStorage.getItem('dt17_tb_audio') !== 'false');
    
    function toggleTelebotHistoryAudio() {
        window._telebotAudioEnabled = !window._telebotAudioEnabled;
        localStorage.setItem('dt17_tb_audio', window._telebotAudioEnabled);
        updateTbAudioBtn();
        if (window._telebotAudioEnabled) playTelebotChime();
    }
    
    function updateTbAudioBtn() {
        const btn = document.getElementById('btnToggleTbAudio');
        if (!btn) return;
        if (window._telebotAudioEnabled) {
            btn.innerHTML = '<i class="fas fa-volume-high" style="color:#059669;"></i> Audio: AKTIF';
            btn.style.borderColor = '#a7f3d0';
            btn.style.color = '#047857';
        } else {
            btn.innerHTML = '<i class="fas fa-volume-xmark" style="color:#dc2626;"></i> Audio: BISU';
            btn.style.borderColor = '#fca5a5';
            btn.style.color = '#b91c1c';
        }
    }
    
    function playTelebotChime() {
        if (!window._telebotAudioEnabled) return;
        try {
            const AudioCtx = window.AudioContext || window.webkitAudioContext;
            if (!AudioCtx) return;
            const ctx = new AudioCtx();
            const osc = ctx.createOscillator();
            const gain = ctx.createGain();
            osc.connect(gain);
            gain.connect(ctx.destination);
            osc.type = 'sine';
            osc.frequency.setValueAtTime(880, ctx.currentTime);
            osc.frequency.exponentialRampToValueAtTime(1320, ctx.currentTime + 0.12);
            gain.gain.setValueAtTime(0.2, ctx.currentTime);
            gain.gain.exponentialRampToValueAtTime(0.01, ctx.currentTime + 0.28);
            osc.start();
            osc.stop(ctx.currentTime + 0.28);
        } catch(e) {}
    }
    
    function getTbMemo(refId) {
        return localStorage.getItem('dt17_tb_memo_' + refId) || '';
    }
    
    function saveTbMemo(refId, text) {
        if (!text.trim()) localStorage.removeItem('dt17_tb_memo_' + refId);
        else localStorage.setItem('dt17_tb_memo_' + refId, text.trim());
        toast('success', 'Memo Disimpan', 'Catatan internal untuk ' + refId + ' berhasil disimpan');
        renderTelebotHistory();
    }
    
    function isTbDuplicateOrder(currentTrx, allList) {
        if (!currentTrx.target || !currentTrx.kode_produk || !currentTrx.created_at) return false;
        const curTime = new Date(String(currentTrx.created_at).replace(' ', 'T')).getTime();
        if (isNaN(curTime)) return false;
        return allList.some(other => {
            if (other.ref_id === currentTrx.ref_id) return false;
            if (other.tele_id !== currentTrx.tele_id) return false;
            if (other.target !== currentTrx.target || other.kode_produk !== currentTrx.kode_produk) return false;
            const otherTime = new Date(String(other.created_at).replace(' ', 'T')).getTime();
            if (isNaN(otherTime)) return false;
            return Math.abs(curTime - otherTime) <= (180 * 1000);
        });
    }
    
    function matchesTbCategory(item, cat) {
        if (!cat) return true;
        const txt = (String(item.kode_produk || '') + ' ' + String(item.nama_produk || '')).toLowerCase();
        const tgt = String(item.target || '');
        if (cat === 'xl_axis') return txt.includes('xl') || txt.includes('axis') || txt.includes('akrab') || txt.includes('aigo') || /^08(17|18|19|59|77|78|38|31|32)/.test(tgt);
        if (cat === 'telkomsel') return txt.includes('telkomsel') || txt.includes('tsel') || /^08(11|12|13|21|22|52|53|51)/.test(tgt);
        if (cat === 'indosat') return txt.includes('indosat') || txt.includes('isat') || txt.includes('im3') || /^08(14|15|16|55|56|57|58)/.test(tgt);
        if (cat === 'tri') return txt.includes('tri') || txt.includes('three') || /^08(95|96|97|98|99)/.test(tgt);
        if (cat === 'smartfren') return txt.includes('smartfren') || txt.includes('smart') || /^088/.test(tgt);
        if (cat === 'pln') return txt.includes('pln') || txt.includes('listrik') || txt.includes('token');
        if (cat === 'emoney') return txt.includes('dana') || txt.includes('ovo') || txt.includes('gopay') || txt.includes('shopee') || txt.includes('linkaja') || txt.includes('grab') || txt.includes('isaku') || txt.includes('maxim');
        if (cat === 'game') return txt.includes('game') || txt.includes('diamond') || txt.includes('ff') || txt.includes('ml') || txt.includes('pubg');
        if (cat === 'ppob') return txt.includes('pdam') || txt.includes('bpjs') || txt.includes('pbb') || txt.includes('tagihan') || txt.includes('pasca');
        return true;
    }
    
    function normalizeTbStatus(st) {
        const s = String(st || 'PENDING').toUpperCase().trim();
        if (['BERHASIL', 'SUCCESS', 'SUKSES', 'SELESAI', 'PAID', 'LUNAS'].includes(s)) return 'BERHASIL';
        if (['GAGAL', 'FAILED', 'FAIL', 'BATAL', 'CANCEL', 'CANCELLED', 'EXPIRED', 'DITOLAK', 'REJECTED', 'REFUND', 'REFUNDED'].includes(s)) return 'GAGAL';
        return 'PENDING';
    }
    
    function isTbTopupRecord(t) {
        if (!t) return false;
        if (t.is_topup === true) return true;
        const jenis = String(t.type || t.jenis || t.kategori || '').toLowerCase();
        const kode = String(t.kode_produk || '').toUpperCase().trim();
        const ref = String(t.ref_id || t.id || '').toUpperCase().trim();
        const nama = String(t.nama_produk || '').toLowerCase();
        if (jenis.includes('topup') || jenis.includes('deposit')) return true;
        if (['SALDO', 'TOPUP', 'TOPUP_SALDO', 'DEPOSIT', 'ADJ_SALDO'].includes(kode)) return true;
        if (ref.startsWith('TP-') || ref.startsWith('TP_') || ref.startsWith('TOPUP') || ref.startsWith('DEP-') || ref.startsWith('ADJ-')) return true;
        if ((nama.includes('topup saldo') || nama.includes('isi saldo') || nama.includes('deposit saldo')) && !/^08\d{7}$/.test(String(t.target || '').replace(/\D/g, ''))) return true;
    
    
        return false;
    }
    
    function calcTbTrxFinancial(t) {
        const st = normalizeTbStatus(t.status);
        const isTopup = isTbTopupRecord(t);
        const rawPrice = Math.max(0, parseInt(t.harga !== undefined ? t.harga : (t.harga_jual !== undefined ? t.harga_jual : (t.amount || 0)), 10) || 0);
    
        if (isTopup) {
            const topupAmt = Math.max(0, parseInt(t.unique_amount || t.amount || rawPrice || 0, 10) || 0);
            return {
                status: st,
                isTopup: true,
                hargaJual: topupAmt,
                modalH2H: 0,
                laba: 0,
                omset: (st === 'BERHASIL') ? topupAmt : 0,
                estimatedLaba: 0
            };
        }
    
        const rawModalField = (t.modal_h2h !== undefined && t.modal_h2h !== null && t.modal_h2h !== '') ? t.modal_h2h : ((t.harga_modal !== undefined && t.harga_modal !== null && t.harga_modal !== '') ? t.harga_modal : ((t.modal !== undefined && t.modal !== null && t.modal !== '') ? t.modal : t.harga_beli));
        let modal = Math.max(0, parseInt(rawModalField || 0, 10) || 0);
    
        const rawLabaField = (t.laba_upline !== undefined && t.laba_upline !== null && t.laba_upline !== '') ? t.laba_upline : ((t.laba !== undefined && t.laba !== null && t.laba !== '') ? t.laba : ((t.profit !== undefined && t.profit !== null && t.profit !== '') ? t.profit : null));
        const labaExplicit = (rawLabaField !== null) ? (parseInt(rawLabaField, 10) || 0) : null;
    
        if (modal <= 0 && rawPrice > 0) {
            if (labaExplicit !== null && labaExplicit >= 0 && labaExplicit <= rawPrice) {
                modal = Math.max(0, rawPrice - labaExplicit);
            } else {
                const kodeUp = String(t.kode_produk || '').toUpperCase().trim();
                const catalogItem = (typeof rawHargaList !== 'undefined' && Array.isArray(rawHargaList))
                    ? rawHargaList.find(p => String(p.kode || '').toUpperCase().trim() === kodeUp)
                    : null;
                if (catalogItem && parseInt(catalogItem.harga || 0, 10) > 0 && parseInt(catalogItem.harga || 0, 10) <= rawPrice) {
                    modal = parseInt(catalogItem.harga, 10);
                } else {
                    const gMarkup = parseInt(window._telebotGlobalMarkup || 0, 10) || 0;
                    if (gMarkup > 0 && rawPrice > gMarkup) {
                        modal = rawPrice - gMarkup;
                    } else {
                        modal = rawPrice;
                    }
                }
            }
        }
    
        const labaReal = Math.max(0, rawPrice - modal);
    
        if (st === 'BERHASIL') {
            return {
                status: st,
                isTopup: false,
                hargaJual: rawPrice,
                modalH2H: modal,
                laba: labaReal,
                omset: rawPrice,
                estimatedLaba: labaReal
            };
        }
        return {
            status: st,
            isTopup: false,
            hargaJual: rawPrice,
            modalH2H: 0,
            laba: 0,
            omset: 0,
            estimatedLaba: (st === 'PENDING') ? labaReal : 0
        };
    }
    
    async function loadTelebotHistory() {
        if (!currentUser) return;
        const sToken = currentUser.session_token || '';
        const aKey = currentUser.api_key || '';
        try {
            const safeFetchJson = async (u) => {
                try {
                    const r = await fetch(u);
                    const t = await r.text();
                    return JSON.parse(t);
                } catch(e) { return null; }
            };
            const [resH, resT] = await Promise.all([
                safeFetchJson(`api/telebot_admin.php?action=list_downline_trx&session_token=${encodeURIComponent(sToken)}&api_key=${encodeURIComponent(aKey)}&_t=${Date.now()}`),
                safeFetchJson(`api/telebot_admin.php?action=list_downline_topups&session_token=${encodeURIComponent(sToken)}&api_key=${encodeURIComponent(aKey)}&_t=${Date.now()}`)
            ]);
            if (resT && resT.status && Array.isArray(resT.data)) {
                _rawDownlineTopups = resT.data;
                renderDownlineTopups();
                const subReqEl = document.getElementById('tbSubTotalRequests');
                const pendingReqs = _rawDownlineTopups.filter(x => normalizeTbStatus(x.status) === 'PENDING').length;
                if (subReqEl) subReqEl.innerText = pendingReqs;
            }
            if (resH && resH.status && Array.isArray(resH.data)) {
                const trxOnlyList = resH.data.filter(x => !isTbTopupRecord(x));
                const isFirst = (_prevTbTrxCount === 0);
                const newCount = trxOnlyList.length - _prevTbTrxCount;
                if (!isFirst && newCount > 0) {
                    playTelebotChime();
                    toast('info', 'Transaksi Baru Masuk', `${newCount} transaksi baru diterima dari Bot Telegram!`);
                }
                _prevTbTrxCount = trxOnlyList.length;
                _rawTelebotHistory = resH.data;
                populateTbMemberFilterDropdown();
                renderTelebotHistory();
                const subTrxEl = document.getElementById('tbSubTotalTrx');
                if (subTrxEl) subTrxEl.innerText = trxOnlyList.length;
            }
        } catch(e) {}
    }
    function populateTbMemberFilterDropdown() {
        const sel = document.getElementById('telebotHistoryMemberFilter');
        if (!sel) return;
        const curVal = sel.value;
        const memberMap = {};
        (_rawTelebotHistory || []).forEach(t => {
            const id = t.tele_id || '';
            if (id && !memberMap[id]) memberMap[id] = t.downline || ('User ' + id);
        });
        (_rawTelebotDownlines || []).forEach(d => {
            const id = d.tele_id || '';
            if (id && !memberMap[id]) memberMap[id] = d.name || ('User ' + id);
        });
        let html = '<option value="">Semua Member Downline</option>';
        Object.entries(memberMap).forEach(([id, name]) => {
            html += `<option value="${esc(id)}">${esc(name)} (${esc(id)})</option>`;
        });
        sel.innerHTML = html;
        if (curVal && memberMap[curVal]) sel.value = curVal;
    }
    
    let isTelebotAllDatesSelected = false;
    function initTelebotHistoryDate() {
        if (isTelebotAllDatesSelected) return;
        const dateEl = document.getElementById('telebotHistoryDateFilter');
        if (dateEl && !dateEl.value) {
            dateEl.value = getTodayWIB();
        }
    }
    
    function resetTelebotHistoryFilter() {
        isTelebotAllDatesSelected = false;
        const searchEl = document.getElementById('telebotHistorySearch');
        const dateEl = document.getElementById('telebotHistoryDateFilter');
        const statusEl = document.getElementById('telebotHistoryStatusFilter');
        const memberEl = document.getElementById('telebotHistoryMemberFilter');
        const catEl = document.getElementById('telebotHistoryCategoryFilter');
        const minP = document.getElementById('tbHistMinPrice');
        const maxP = document.getElementById('tbHistMaxPrice');
        if (searchEl) searchEl.value = '';
        if (dateEl) dateEl.value = getTodayWIB();
        if (statusEl) statusEl.value = '';
        if (memberEl) memberEl.value = '';
        if (catEl) catEl.value = '';
        if (minP) minP.value = '';
        if (maxP) maxP.value = '';
        _isTbAttentionOnly = false;
        setTbStatusFilterQuick('');
        telebotHistoryPage = 1;
        renderTelebotHistory();
    }
    
    function clearTelebotHistoryDate() {
        isTelebotAllDatesSelected = true;
        const dateEl = document.getElementById('telebotHistoryDateFilter');
        if (dateEl) dateEl.value = '';
        telebotHistoryPage = 1;
        renderTelebotHistory();
        toast('info', 'Filter Tanggal Dibuka', 'Menampilkan seluruh riwayat transaksi bot tele dari semua tanggal');
    }
    
    function setTbStatusFilterQuick(st) {
        _isTbAttentionOnly = false;
        const statusEl = document.getElementById('telebotHistoryStatusFilter');
        if (statusEl) statusEl.value = st;
        syncTbStatusFilterQuick();
        telebotHistoryPage = 1;
        renderTelebotHistory();
    }
    
    function syncTbStatusFilterQuick() {
        const st = (document.getElementById('telebotHistoryStatusFilter')?.value || '').toUpperCase();
        const chips = {
            '': document.getElementById('tbChipAll'),
            'BERHASIL': document.getElementById('tbChipSuccess'),
            'PENDING': document.getElementById('tbChipPending'),
            'GAGAL': document.getElementById('tbChipFailed')
        };
        Object.keys(chips).forEach(k => {
            if (chips[k]) chips[k].classList.toggle('active', (k === st && !_isTbAttentionOnly));
        });
        const attChip = document.getElementById('tbChipAttention');
        if (attChip) attChip.classList.toggle('active', _isTbAttentionOnly);
    }
    
    function filterTelebotHistoryAttention() {
        _isTbAttentionOnly = !_isTbAttentionOnly;
        syncTbStatusFilterQuick();
        telebotHistoryPage = 1;
        renderTelebotHistory();
    }
    
    function toggleTbLeaderboard() {
        const box = document.getElementById('telebotHistoryLeaderboardBox');
        if (!box) return;
        const isShowing = (box.style.display !== 'none');
        box.style.display = isShowing ? 'none' : 'block';
        if (!isShowing) renderTbLeaderboard();
    }
    
    function renderTbLeaderboard() {
        const dlBox = document.getElementById('tbTopDownlinesList');
        const prodBox = document.getElementById('tbTopProductsList');
        if (!dlBox || !prodBox) return;
        const dlMap = {};
        const prodMap = {};
        const seenTopupRefs = new Set();
        (_rawTelebotHistory || []).forEach(t => {
            const fin = calcTbTrxFinancial(t);
            if (fin.status !== 'BERHASIL') return;
            const dlKey = String(t.tele_id || t.downline || 'User');
            const dlName = t.downline || ('User ' + dlKey);
            dlMap[dlKey] = dlMap[dlKey] || { name: dlName, tele_id: t.tele_id, trx: 0, omset: 0, laba: 0, topup: 0 };
    
            if (fin.isTopup) {
                const refK = String(t.ref_id || t.id || '').trim();
                if (refK) seenTopupRefs.add(refK);
                dlMap[dlKey].omset += fin.omset;
                dlMap[dlKey].topup += fin.omset;
                return;
            }
    
            dlMap[dlKey].trx++;
            dlMap[dlKey].omset += fin.omset;
            dlMap[dlKey].laba += fin.laba;
    
            const pKey = t.kode_produk || t.nama_produk || 'Produk';
            prodMap[pKey] = prodMap[pKey] || { name: t.nama_produk || pKey, kode: t.kode_produk, qty: 0, omset: 0, laba: 0 };
            prodMap[pKey].qty++;
            prodMap[pKey].omset += fin.omset;
            prodMap[pKey].laba += fin.laba;
        });
    
        (_rawDownlineTopups || []).forEach(tp => {
            if (normalizeTbStatus(tp.status) !== 'BERHASIL') return;
            const tpId = String(tp.id || tp.ref_id || '').trim();
            if (tpId && seenTopupRefs.has(tpId)) return;
            const tpAmt = Math.max(0, parseInt(tp.unique_amount || tp.amount || 0, 10) || 0);
            if (tpAmt <= 0) return;
            const dlKey = String(tp.tele_id || tp.downline_name || tp.username || 'User');
            const dlName = tp.downline_name || tp.username || ('User ' + dlKey);
            dlMap[dlKey] = dlMap[dlKey] || { name: dlName, tele_id: tp.tele_id, trx: 0, omset: 0, laba: 0, topup: 0 };
            dlMap[dlKey].omset += tpAmt;
            dlMap[dlKey].topup += tpAmt;
        });
    
        const topDl = Object.values(dlMap).sort((a, b) => b.omset - a.omset).slice(0, 5);
        const topProd = Object.values(prodMap).sort((a, b) => b.qty - a.qty).slice(0, 5);
    
        if (!topDl.length) {
            dlBox.innerHTML = '<div style="font-size:10px; color:#64748b; padding:6px;">Belum ada data omset berhasil.</div>';
        } else {
            dlBox.innerHTML = topDl.map((d, i) => `
                <div style="display:flex; justify-content:space-between; align-items:center; padding:4px 5px; border-bottom:1px dashed #e2e8f0; font-size:9.5px;">
                    <div><b style="color:#002dbb;">#${i+1} ${esc(d.name)}</b><br><small class="text-sub mono" style="font-size:8px;">${esc(d.tele_id || '-')}</small></div>
                    <div style="text-align:right;"><b style="color:#059669;">${fmtRp(d.omset)}</b><br><small style="color:#64748b; font-weight:700; font-size:8px;">${d.trx} TRX (+${fmtRp(d.laba)})${d.topup > 0 ? (' &bull; Topup ' + fmtRp(d.topup)) : ''}</small></div>
                </div>`).join('');
        }
    
        if (!topProd.length) {
            prodBox.innerHTML = '<div style="font-size:10px; color:#64748b; padding:6px;">Belum ada data produk terjual.</div>';
        } else {
            prodBox.innerHTML = topProd.map((p, i) => `
                <div style="display:flex; justify-content:space-between; align-items:center; padding:4px 5px; border-bottom:1px dashed #e2e8f0; font-size:9.5px;">
                    <div><b style="color:#0f172a;">#${i+1} ${esc(p.name)}</b><br><span class="badge badge-user mono" style="font-size:7.5px;">${esc(p.kode || '')}</span></div>
                    <div style="text-align:right;"><b style="color:#002dbb;">${p.qty} Terjual</b><br><small style="color:#059669; font-weight:700; font-size:8px;">${fmtRp(p.omset)} (+${fmtRp(p.laba)})</small></div>
                </div>`).join('');
        }
    }
    
    let _isMassSyncing = false;
    async function massSyncPendingTelebotHistory() {
        if (_isMassSyncing) return toast('warn', 'Sedang Berjalan', 'Pengecekan massal sedang berlangsung...');
        const pendings = (_rawTelebotHistory || []).filter(t => String(t.status || '').toUpperCase() === 'PENDING');
        if (!pendings.length) return toast('info', 'Tidak Ada Pending', 'Semua transaksi sudah memiliki status akhir.');
        if (!confirm(`Terdapat ${pendings.length} transaksi PENDING. Mulai sinkronisasi massal ke server pusat?`)) return;
        _isMassSyncing = true;
        const btn = document.getElementById('btnMassSyncPending');
        if (btn) { btn.disabled = true; btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Cek 0/' + pendings.length; }
        let countSuccess = 0;
        for (let i = 0; i < pendings.length; i++) {
            const ref = pendings[i].ref_id;
            try {
                await fetch('api/telebot_admin.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ action: 'sync_downline_trx_status', session_token: currentUser.session_token, ref_id: ref })
                });
                countSuccess++;
            } catch(e) {}
            if (btn) btn.innerHTML = `<i class="fas fa-spinner fa-spin"></i> Cek ${i + 1}/${pendings.length}`;
            await new Promise(r => setTimeout(r, 350));
        }
        _isMassSyncing = false;
        if (btn) { btn.disabled = false; btn.innerHTML = '<i class="fas fa-arrows-rotate"></i> Mass Sync (<span id="tbPendingCount">0</span>)'; }
        toast('success', 'Mass Sync Selesai', `${countSuccess} transaksi berhasil diperiksa statusnya.`);
        await loadTelebotHistory();
    }
    
    function openTbCustomExportModal() {
        document.getElementById('modalTbCustomExport').style.display = 'flex';
        const d1 = document.getElementById('tbExpDateFrom');
        const d2 = document.getElementById('tbExpDateTo');
        if (d1 && !d1.value) d1.value = getTodayWIB();
        if (d2 && !d2.value) d2.value = getTodayWIB();
    }
    
    function executeTbCustomExportCSV() {
        const d1 = document.getElementById('tbExpDateFrom')?.value || '';
        const d2 = document.getElementById('tbExpDateTo')?.value || '';
        const st = document.getElementById('tbExpStatus')?.value || '';
        const rows = (_rawTelebotHistory || []).filter(t => {
            const tgl = String(t.created_at || '').slice(0, 10);
            if (d1 && tgl && tgl < d1) return false;
            if (d2 && tgl && tgl > d2) return false;
            if (st && normalizeTbStatus(t.status) !== st) return false;
            return true;
        });
        if (!rows.length) return toast('warn', 'Data Kosong', 'Tidak ada data transaksi pada rentang tanggal tersebut.');
        closeModal('modalTbCustomExport');
        const fileName = `rekap-telebot-${d1 || 'all'}-sd-${d2 || 'all'}.csv`;
        downloadFile(fileName, toCSV(rows, [
            ['created_at', 'waktu'],
            ['ref_id', 'ref_id'],
            [r => isTbTopupRecord(r) ? 'TOPUP_SALDO' : 'TRANSAKSI', 'tipe_mutasi'],
            ['downline', 'downline'],
            ['tele_id', 'tele_id'],
            ['kode_produk', 'kode_produk'],
            ['nama_produk', 'nama_produk'],
            ['target', 'tujuan'],
            [r => calcTbTrxFinancial(r).hargaJual, 'harga_jual_bot'],
            [r => calcTbTrxFinancial(r).modalH2H, 'modal_h2h'],
            [r => calcTbTrxFinancial(r).laba, 'laba_upline'],
            [r => normalizeTbStatus(r.status), 'status'],
            ['sn', 'sn_atau_token'],
            [r => getTbMemo(r.ref_id), 'memo_internal']
        ]), 'text/csv');
        toast('success', 'Ekspor Berhasil', `${rows.length} baris data berhasil diekspor ke CSV`);
    }
    
    function printDlThermalReceipt(refId) {
        const t = (_rawTelebotHistory || []).find(x => String(x.ref_id) === String(refId));
        if (!t) return toast('warn', 'Data Kosong', 'Transaksi tidak ditemukan');
        const memo = getTbMemo(t.ref_id);
        const w = window.open('', '_blank', 'width=380,height=600');
        if (!w) return alert('Pop-up terblokir oleh browser. Izinkan pop-up untuk mencetak struk.');
        const html = `<!DOCTYPE html><html><head><title>Struk ${esc(t.ref_id)}</title><style>
            body { font-family: 'Courier New', monospace; font-size: 12px; margin: 0; padding: 10px; color: #000; width: 280px; }
            .text-center { text-align: center; }
            .text-right { text-align: right; }
            .divider { border-top: 1px dashed #000; margin: 6px 0; }
            .bold { font-weight: bold; }
            .row { display: flex; justify-content: space-between; margin-bottom: 2px; }
        </style></head><body onload="window.print(); setTimeout(() => window.close(), 600);">
            <div class="text-center bold" style="font-size: 14px;">STRUK PEMBELIAN RESMI</div>
            <div class="text-center" style="font-size: 10px;">TELEGRAM BOT TRANSACTION</div>
            <div class="divider"></div>
            <div class="row"><span>Waktu:</span><span>${esc(t.created_at || '-')}</span></div>
            <div class="row"><span>RefID:</span><span>${esc(t.ref_id || '-')}</span></div>
            <div class="row"><span>Member:</span><span>${esc(t.downline || '-')}</span></div>
            <div class="row"><span>Tujuan:</span><span class="bold">${esc(t.target || '-')}</span></div>
            <div class="divider"></div>
            <div class="row"><span class="bold">${esc(t.nama_produk || t.kode_produk || '-')}</span></div>
            <div class="row"><span>Status:</span><span class="bold">${esc(String(t.status || '').toUpperCase())}</span></div>
            <div class="row"><span>Harga:</span><span class="bold">Rp ${Number(t.harga || 0).toLocaleString('id-ID')}</span></div>
            <div class="divider"></div>
            <div style="font-size: 10px; word-break: break-all;"><b>SN / TOKEN:</b><br>${esc(t.sn || t.message || '-')}</div>
            ${memo ? `<div class="divider"></div><div style="font-size: 10px;"><b>Memo:</b> ${esc(memo)}</div>` : ''}
            <div class="divider"></div>
            <div class="text-center" style="font-size: 9px; margin-top: 8px;">Terima kasih atas transaksi Anda<br>Simpan struk ini sebagai bukti pembayaran</div>
        </body></html>`;
        w.document.open();
        w.document.write(html);
        w.document.close();
    }
    
    function shareDlReceiptWhatsApp(refId) {
        const t = (_rawTelebotHistory || []).find(x => String(x.ref_id) === String(refId));
        if (!t) return toast('warn', 'Data Kosong', 'Transaksi tidak ditemukan');
        const text = `*STRUK BUKTI TRANSAKSI RESMI*\n` +
            `----------------------------------------\n` +
            `• Waktu: ${t.created_at || '-'}\n` +
            `• RefID: ${t.ref_id || '-'}\n` +
            `• Member: ${t.downline || '-'}\n` +
            `• Produk: ${t.nama_produk || t.kode_produk || '-'}\n` +
            `• Tujuan: ${t.target || '-'}\n` +
            `• Total Bayar: Rp ${Number(t.harga || 0).toLocaleString('id-ID')}\n` +
            `• Status: *${String(t.status || '').toUpperCase()}*\n` +
            `• SN / Token: \`${t.sn || t.message || '-'}\`\n` +
            `----------------------------------------\n` +
            `Terima kasih telah bertransaksi!`;
        window.open('https://api.whatsapp.com/send?text=' + encodeURIComponent(text), '_blank');
    }
    
    async function resendReceiptToTelegramUser(refId) {
        const t = (_rawTelebotHistory || []).find(x => String(x.ref_id) === String(refId));
        if (!t) return toast('warn', 'Data Kosong', 'Transaksi tidak ditemukan');
        if (!confirm(`Kirim ulang struk transaksi [${refId}] langsung ke chat Telegram ${t.downline || 'user'}?`)) return;
        toast('info', 'Mengirim Struk', 'Menghubungkan bot Telegram ke chat user...');
        try {
            const res = await fetch('api/telebot_admin.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    action: 'resend_receipt',
                    session_token: currentUser.session_token,
                    ref_id: refId,
                    tele_id: t.tele_id
                })
            });
            const json = await res.json();
            toast(json && json.status ? 'success' : 'info', 'Struk Telegram', (json && json.message) ? json.message : 'Permintaan kirim ulang struk telah diteruskan ke bot.');
        } catch(e) {
            toast('info', 'Kirim Struk', 'Struk disiapkan untuk dikirim ke chat Telegram user.');
        }
    }
    
    function quickResubmitTelebotTrx(refId) {
        const t = (_rawTelebotHistory || []).find(x => String(x.ref_id) === String(refId));
        if (!t) return toast('warn', 'Data Kosong', 'Transaksi tidak ditemukan');
        if (confirm(`Ulangi transaksi untuk nomor ${t.target} dengan produk ${t.kode_produk}?`)) {
            closeModal('modalDlTrxDetail');
            switchTab('trxLangsung');
            const sInp = document.getElementById('hargaSearchInput');
            if (sInp) {
                sInp.value = t.kode_produk;
                if (typeof filterHargaTerkini === 'function') filterHargaTerkini();
            }
            toast('info', 'Pilih Produk', 'Silakan klik tombol Beli pada produk ' + t.kode_produk);
        }
    }
    
    function renderTelebotHistory() {
        const dateElCheck = document.getElementById('telebotHistoryDateFilter');
        if (dateElCheck && dateElCheck.value) {
            isTelebotAllDatesSelected = false;
        }
        initTelebotHistoryDate();
        updateTbAudioBtn();
        const tbody = document.getElementById('telebotHistoryTableBody');
        if (!tbody) return;
        const q = (document.getElementById('telebotHistorySearch')?.value || '').toLowerCase().trim();
        const st = (document.getElementById('telebotHistoryStatusFilter')?.value || '').toUpperCase().trim();
        const dateFilt = (document.getElementById('telebotHistoryDateFilter')?.value || '').trim();
        const memberFilt = (document.getElementById('telebotHistoryMemberFilter')?.value || '').trim();
        const catFilt = (document.getElementById('telebotHistoryCategoryFilter')?.value || '').trim();
        const minP = parseInt(document.getElementById('tbHistMinPrice')?.value || 0, 10);
        const maxP = parseInt(document.getElementById('tbHistMaxPrice')?.value || 0, 10);
    
        let countOk = 0, countPend = 0, countFail = 0;
        let omsetProduk = 0, omsetTopup = 0, totalLaba = 0, totalModal = 0, countAttention = 0;
        const nowMs = Date.now();
        const seenTopupIds = new Set();
    
        const allList = _rawTelebotHistory || [];
        const filtered = allList.filter(t => {
            const fin = calcTbTrxFinancial(t);
            const stVal = fin.status;
            const price = fin.hargaJual;
    
            let isAttention = false;
            if (!fin.isTopup) {
                if (stVal === 'PENDING') {
                    const dtMs = new Date(String(t.created_at || '').replace(' ', 'T')).getTime();
                    if (!isNaN(dtMs) && (nowMs - dtMs) > (300 * 1000)) isAttention = true;
                } else if (stVal === 'GAGAL') {
                    isAttention = true;
                }
            }
            if (isAttention) countAttention++;
    
            if (_isTbAttentionOnly && !isAttention) return false;
            if (st && stVal !== st) return false;
            if (dateFilt && t.created_at && !String(t.created_at).startsWith(dateFilt)) return false;
            if (memberFilt && String(t.tele_id) !== memberFilt) return false;
            if (minP > 0 && price < minP) return false;
            if (maxP > 0 && price > maxP) return false;
            if (catFilt && (fin.isTopup || !matchesTbCategory(t, catFilt))) return false;
    
            if (q) {
                const memo = getTbMemo(t.ref_id).toLowerCase();
                const hay = [t.ref_id, t.tele_id, t.downline, t.kode_produk, t.nama_produk, t.target, t.sn, t.message, memo].map(x => String(x || '').toLowerCase()).join(' ');
                if (!hay.includes(q)) return false;
            }
    
            if (fin.isTopup) {
                const refKey = String(t.ref_id || t.id || '').trim();
                if (refKey) seenTopupIds.add(refKey);
                if (stVal === 'BERHASIL') omsetTopup += fin.omset;
            } else {
                if (stVal === 'BERHASIL') {
                    countOk++;
                    omsetProduk += fin.omset;
                    totalModal += fin.modalH2H;
                    totalLaba += fin.laba;
                } else if (stVal === 'PENDING') {
                    countPend++;
                } else if (stVal === 'GAGAL') {
                    countFail++;
                }
            }
    
            return true;
        });
    
        const includeTopupInSummary = (!_isTbAttentionOnly && !catFilt && (!st || st === 'BERHASIL'));
        if (includeTopupInSummary) {
            (_rawDownlineTopups || []).forEach(tp => {
                if (normalizeTbStatus(tp.status) !== 'BERHASIL') return;
                const tpId = String(tp.id || tp.ref_id || '').trim();
                if (tpId && seenTopupIds.has(tpId)) return;
                if (dateFilt && tp.created_at && !String(tp.created_at).startsWith(dateFilt)) return;
                if (memberFilt && String(tp.tele_id || '') !== memberFilt) return;
                const tpAmt = Math.max(0, parseInt(tp.unique_amount || tp.amount || 0, 10) || 0);
                if (minP > 0 && tpAmt < minP) return;
                if (maxP > 0 && tpAmt > maxP) return;
                if (q) {
                    const tpHay = [tp.id, tp.ref_id, tp.tele_id, tp.downline_name, tp.username, tp.method].map(x => String(x || '').toLowerCase()).join(' ');
                    if (!tpHay.includes(q)) return;
                }
                omsetTopup += tpAmt;
            });
        }
    
        const totalOmset = omsetProduk + omsetTopup;
        const kpiOmset = document.getElementById('tbHistKpiOmset');
        const kpiOmsetSub = document.getElementById('tbHistKpiOmsetSub');
        const kpiLaba = document.getElementById('tbHistKpiLaba');
        const kpiLabaSub = document.getElementById('tbHistKpiLabaSub');
        const kpiModal = document.getElementById('tbHistKpiModal');
        const kpiModalSub = document.getElementById('tbHistKpiModalSub');
        const kpiCounts = document.getElementById('tbHistKpiCounts');
        const kpiCountsSub = document.getElementById('tbHistKpiCountsSub');
        const kpiRate = document.getElementById('tbHistKpiRate');
        const kpiRateSub = document.getElementById('tbHistKpiRateSub');
        const pendingCnt = document.getElementById('tbPendingCount');
        const attCnt = document.getElementById('tbAttentionCount');
    
        if (kpiOmset) kpiOmset.innerText = fmtRp(totalOmset);
        if (kpiOmsetSub) kpiOmsetSub.innerText = `Trx: ${fmtRp(omsetProduk)} • Topup: ${fmtRp(omsetTopup)}`;
        if (kpiLaba) kpiLaba.innerText = '+' + fmtRp(totalLaba);
        if (kpiLabaSub) {
            const marginPct = omsetProduk > 0 ? ((totalLaba / omsetProduk) * 100).toFixed(1) : '0.0';
            kpiLabaSub.innerText = `Margin ${marginPct}% dari produk`;
        }
        if (kpiModal) kpiModal.innerText = fmtRp(totalModal);
        if (kpiModalSub) kpiModalSub.innerText = `${countOk} TRX Sukses`;
        if (kpiCounts) kpiCounts.innerText = `${countOk} Sukses / ${countPend} Pend`;
        if (kpiCountsSub) kpiCountsSub.innerText = `${countFail} Gagal (Non-Topup)`;
        const totalFinalTrx = countOk + countFail;
        const sRate = totalFinalTrx > 0 ? Math.round((countOk / totalFinalTrx) * 100) : (countOk > 0 ? 100 : 0);
        if (kpiRate) kpiRate.innerText = sRate + '%';
        if (kpiRateSub) kpiRateSub.innerText = totalFinalTrx > 0 ? `${countOk}/${totalFinalTrx} Final TRX` : 'Belum ada data final';
        if (pendingCnt) pendingCnt.innerText = countPend;
        if (attCnt) attCnt.innerText = countAttention;
    
        const totalItems = filtered.length;
        const totalPages = Math.ceil(totalItems / telebotHistoryPerPage) || 1;
        if (telebotHistoryPage > totalPages) telebotHistoryPage = totalPages;
        if (telebotHistoryPage < 1) telebotHistoryPage = 1;
    
        const startIdx = (telebotHistoryPage - 1) * telebotHistoryPerPage;
        const pageItems = filtered.slice(startIdx, startIdx + telebotHistoryPerPage);
    
        if (!pageItems.length) {
            tbody.innerHTML = '<tr><td colspan="9" style="text-align:center; padding:18px; color:var(--text-sub);"><i class="fas fa-receipt" style="font-size:18px; opacity:0.3; margin-bottom:4px; display:block;"></i>Tidak ada transaksi downline yang cocok dengan filter.</td></tr>';
        } else {
            tbody.innerHTML = pageItems.map(t => {
                const fin = calcTbTrxFinancial(t);
                const stVal = fin.status;
                const badge = (stVal === 'BERHASIL') ? 'badge-success' : ((stVal === 'GAGAL') ? 'badge-fail' : 'badge-pending');
                const refClean = String(t.ref_id || '-');
                const price = fin.hargaJual;
                const isDup = !fin.isTopup && isTbDuplicateOrder(t, allList);
                const dupBadge = isDup ? '<span class="badge" style="background:#fffbeb; color:#b45309; border:1px solid #fde68a; font-size:7px; padding:1px 3px; border-radius:3px; margin-left:3px;" title="Pemesanan berulang dalam 3 menit"><i class="fas fa-triangle-exclamation"></i> Dup</span>' : '';
                const topupTag = fin.isTopup ? '<span class="badge badge-cyan" style="margin-left:3px;">TOPUP</span>' : '';
                const memo = getTbMemo(refClean);
                const memoBadge = memo ? `<i class="fas fa-note-sticky text-warn" style="font-size:9.5px; margin-left:3px; cursor:pointer;" title="Memo: ${esc(memo)}" onclick="openDlTrxDetail('${esc(refClean)}')"></i>` : '';
    
                const teleChatLink = t.tele_id ? `<a href="tg://user?id=${esc(t.tele_id)}" target="_blank" class="btn-copy-inline" style="padding:1px 3px; border-radius:3px; margin-left:2px; text-decoration:none;" title="Chat Langsung di Telegram"><i class="fab fa-telegram" style="color:#0088cc;"></i></a>` : '';
                const cleanSn = String(t.sn || t.message || '-');
    
                let labaCellHtml = '';
                if (fin.isTopup) {
                    labaCellHtml = '<span class="badge badge-cyan">Omset Topup</span>';
                } else if (stVal === 'BERHASIL') {
                    labaCellHtml = `<b class="mono" style="color:#059669; font-weight:900;">+${fmtRp(fin.laba)}</b><br><small class="mono text-sub" style="font-size:7.5px;">Mdl: ${fmtRp(fin.modalH2H)}</small>`;
                } else if (stVal === 'PENDING') {
                    labaCellHtml = `<span class="mono text-warn" style="font-weight:700;" title="Estimasi laba jika sukses">~+${fmtRp(fin.estimatedLaba)}</span><br><small class="text-sub" style="font-size:7.5px;">Pending</small>`;
                } else {
                    labaCellHtml = `<span class="mono text-sub" style="text-decoration:line-through; opacity:0.65;">Rp 0</span><br><small class="text-danger" style="font-size:7.5px;">Refund</small>`;
                }
    
                return `<tr>
                    <td><small style="font-size:8px;">${esc(t.created_at || '-')}</small></td>
                    <td>
                        <div style="display:flex; align-items:center; gap:2px;">
                            <b>${esc(t.downline || '-')}</b>
                            ${teleChatLink}
                        </div>
                        <small class="mono text-sub" style="font-size:8px;">${esc(t.tele_id || '-')}</small>
                    </td>
                    <td>
                        <div style="display:flex; align-items:center;"><code style="color:#002dbb; font-weight:800;">${esc(t.kode_produk || '-')}</code>${topupTag}${dupBadge}</div>
                        <small style="font-size:8px;">${esc(t.nama_produk || '-')}</small>
                    </td>
                    <td>
                        <div style="display:flex; align-items:center; gap:3px;">
                            <code class="mono" style="font-weight:700;">${esc(t.target || '-')}</code>
                            <button type="button" class="btn-copy-inline" onclick="copyToClipboard('${esc(t.target || '')}', 'Nomor Tujuan')" title="Salin Nomor Tujuan"><i class="fas fa-copy"></i></button>
                        </div>
                    </td>
                    <td><b class="text-main mono">${fmtRp(price)}</b></td>
                    <td>${labaCellHtml}</td>
                    <td><span class="badge ${badge}">${stVal}</span></td>
                    <td>
                        <div style="display:flex; align-items:center; gap:3px; max-width:155px;">
                            <code class="mono" style="font-size:8px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;" title="${esc(cleanSn)}">${esc(cleanSn)}</code>
                            ${cleanSn && cleanSn !== '-' ? `<button type="button" class="btn-copy-inline" onclick="copyToClipboard('${esc(cleanSn)}', 'SN / Token')" title="Salin SN"><i class="fas fa-copy"></i></button>` : ''}
                            ${memoBadge}
                        </div>
                    </td>
                    <td style="white-space:nowrap;">
                        <button type="button" class="btn btn-outline btn-sm" onclick="openDlTrxDetail('${esc(refClean)}')" title="Lihat Struk Detail &amp; Opsi Lengkap"><i class="fas fa-eye"></i></button>
                        <button type="button" class="btn btn-purple btn-sm" onclick="syncDlTrxStatus('${esc(refClean)}')" title="Cek Status Terkini ke Server Pusat"><i class="fas fa-rotate"></i></button>
                        <button type="button" class="btn btn-warning btn-sm" onclick="openDlTrxStatusModal('${esc(refClean)}', '${esc(stVal)}', '${esc(t.sn || '')}')" title="Ubah Status &amp; Saldo Downline"><i class="fas fa-pen-to-square"></i></button>
                        <button type="button" class="btn btn-outline btn-sm" onclick="quickResubmitTelebotTrx('${esc(refClean)}')" title="Ulangi / Order Cepat"><i class="fas fa-rotate-right"></i></button>
                    </td>
                </tr>`;
            }).join('');
        }
    
        const infoEl = document.getElementById('tbHistoryPageInfo');
        if (infoEl) {
            infoEl.innerText = `Menampilkan ${totalItems ? (startIdx + 1) : 0} - ${Math.min(startIdx + telebotHistoryPerPage, totalItems)} dari ${totalItems} mutasi (Hal ${telebotHistoryPage}/${totalPages})`;
        }
        renderPaginationBtns('telebotHistoryPaginationBtns', telebotHistoryPage, totalPages, 'changeTbHistoryPage');
    }
    
    function changeTbHistoryPage(p) {
        telebotHistoryPage = p;
        renderTelebotHistory();
    }
    
    function openDlTrxDetail(refId) {
        const t = (_rawTelebotHistory || []).find(x => String(x.ref_id) === String(refId));
        if (!t) return toast('warn', 'Tidak Ditemukan', 'Data transaksi downline tidak ditemukan.');
        const body = document.getElementById('dlTrxDetailBody');
        const fin = calcTbTrxFinancial(t);
        const st = fin.status;
        const isOk = (st === 'BERHASIL');
        const isFail = (st === 'GAGAL');
        const price = fin.hargaJual;
        const modal = fin.modalH2H;
        const laba = fin.laba;
        const memoVal = getTbMemo(t.ref_id);
        const cleanSn = String(t.sn && t.sn !== '-' ? t.sn : (t.message || '-'));
    
        body.innerHTML = `
        <div style="text-align: center; padding: 10px 0 14px 0;">
          <div style="width: 60px; height: 60px; border-radius: 50%; background: ${isOk ? '#ecfdf5' : (isFail ? '#fef2f2' : '#fffbeb')}; border: 2px solid ${isOk ? '#a7f3d0' : (isFail ? '#fecaca' : '#fde68a')}; color: ${isOk ? '#059669' : (isFail ? '#dc2626' : '#d97706')}; display: flex; align-items: center; justify-content: center; font-size: 26px; margin: 0 auto 10px auto;">
            <i class="fas ${isOk ? 'fa-circle-check' : (isFail ? 'fa-circle-xmark' : 'fa-clock')}"></i>
          </div>
          <h3 style="font-size: 16px; font-weight: 800; color: #0f172a; margin-bottom: 2px;">${fin.isTopup ? 'Mutasi Topup Saldo' : (isOk ? 'Transaksi Berhasil' : (isFail ? 'Transaksi Gagal (Refund)' : 'Transaksi Diproses'))}</h3>
          <div class="mono" style="font-size: 22px; font-weight: 900; color: #002dbb; margin: 4px 0;">${fmtRp(price)}</div>
          <div style="font-size: 11px; font-weight: 600; color: #64748b;">${esc(t.created_at || '-')} WIB</div>
        </div>
    
        <div style="background: #f8fafc; border: 1.5px solid #d2e0f5; border-radius: 14px; padding: 14px; text-align: left;">
          <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1.5px dashed #bfdbfe; padding-bottom: 8px; margin-bottom: 10px;">
            <div>
              <div style="font-size: 13px; font-weight: 800; color: #0f172a;">${esc(t.nama_produk || t.kode_produk || '-')}</div>
              <small style="font-size: 10px; color: #64748b;">Member: <b>${esc(t.downline || '-')}</b> <a href="tg://user?id=${esc(t.tele_id || '')}" target="_blank" style="color:#0088cc; font-weight:700;"><i class="fab fa-telegram"></i> Chat User</a></small>
            </div>
            <span class="badge ${isOk ? 'badge-success' : (isFail ? 'badge-fail' : 'badge-pending')}">${st}</span>
          </div>
          <div class="kv-grid" style="grid-template-columns: 110px 1fr; row-gap: 6px; font-size: 11px;">
            <div class="k">Nomor Tujuan</div>
            <div class="v mono" style="font-weight: 800; color: #002dbb; display:flex; align-items:center; gap:5px;">
                ${esc(t.target || '-')}
                <button type="button" class="btn-copy-inline" onclick="copyToClipboard('${esc(t.target || '')}', 'Tujuan')"><i class="fas fa-copy"></i></button>
            </div>
            <div class="k">RefID Bot</div><div class="v mono">${esc(t.ref_id || '-')}</div>
            <div class="k">ID Telegram</div><div class="v mono">${esc(t.tele_id || '-')}</div>
            <div class="k">${fin.isTopup ? 'Nominal Omset' : 'Harga Jual Bot'}</div><div class="v mono font-bold">${fmtRp(price)}</div>
            <div class="k">Modal H2H Nyata</div><div class="v mono">${fin.isTopup ? 'Rp 0 (Topup)' : fmtRp(modal)}</div>
            <div class="k">Laba Terealisasi</div><div class="v mono" style="color:${isOk && !fin.isTopup ? '#059669' : '#64748b'}; font-weight:900;">${fin.isTopup ? 'Rp 0 (Masuk Omset)' : (isOk ? ('+' + fmtRp(laba)) : (st === 'PENDING' ? ('~+' + fmtRp(fin.estimatedLaba) + ' (Pending)') : 'Rp 0 (Refund)'))}</div>
          </div>
          <div style="margin-top: 10px; padding: 10px; background: #eff6ff; border: 1.5px solid #bfdbfe; border-radius: 10px;">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom: 2px;">
                <span style="font-size: 9.5px; font-weight: 800; color: #0284c7; text-transform: uppercase;">SN / TOKEN RESMI</span>
                <button type="button" class="btn-copy-inline" onclick="copyToClipboard('${esc(cleanSn)}', 'SN')"><i class="fas fa-copy"></i> Salin</button>
            </div>
            <div class="mono" style="font-size: 11.5px; font-weight: 700; color: #0f172a; word-break: break-all;">${esc(cleanSn)}</div>
          </div>
    
          <div style="margin-top: 10px; padding: 10px; background: #fffbeb; border: 1px dashed #fcd34d; border-radius: 10px;">
            <small style="font-size: 9.5px; font-weight: 800; color: #92400e; text-transform: uppercase; display:block; margin-bottom:4px;"><i class="fas fa-note-sticky"></i> CATATAN MEMO INTERNAL (HANYA UPLINE)</small>
            <textarea id="inpMemo_${esc(t.ref_id)}" rows="2" placeholder="Tulis catatan komplain/tindak lanjut upline..." style="font-size:10.5px; width:100%; border:1px solid #fde68a; border-radius:6px; padding:4px 8px;">${esc(memoVal)}</textarea>
            <button type="button" class="btn btn-warning btn-sm" style="margin-top:4px; padding:3px 8px; font-size:9.5px;" onclick="saveTbMemo('${esc(t.ref_id)}', document.getElementById('inpMemo_${esc(t.ref_id)}').value)"><i class="fas fa-floppy-disk"></i> Simpan Memo</button>
          </div>
        </div>
    
        <div style="display: flex; flex-direction: column; gap: 6px; margin-top: 12px;">
          <div style="display: flex; gap: 6px;">
            <button type="button" class="btn btn-success" style="flex: 1; font-size: 10.5px; padding: 8px;" onclick="resendReceiptToTelegramUser('${esc(t.ref_id)}')"><i class="fab fa-telegram-plane"></i> Kirim Ulang Struk via Bot</button>
            <button type="button" class="btn btn-outline" style="flex: 1; font-size: 10.5px; padding: 8px;" onclick="printDlThermalReceipt('${esc(t.ref_id)}')"><i class="fas fa-print"></i> Cetak Thermal</button>
            <button type="button" class="btn btn-outline" style="flex: 1; font-size: 10.5px; padding: 8px;" onclick="shareDlReceiptWhatsApp('${esc(t.ref_id)}')"><i class="fab fa-whatsapp" style="color:#25D366;"></i> Bagikan WA</button>
          </div>
          <div style="display: flex; gap: 6px;">
            <button type="button" class="btn btn-purple" style="flex: 1; font-size: 11px; padding: 8px;" onclick="syncDlTrxStatus('${esc(t.ref_id)}')"><i class="fas fa-rotate"></i> Sync Pusat</button>
            <button type="button" class="btn btn-warning" style="flex: 1; font-size: 11px; padding: 8px;" onclick="closeModal('modalDlTrxDetail'); openDlTrxStatusModal('${esc(t.ref_id)}', '${esc(st)}', '${esc(t.sn || '')}')"><i class="fas fa-pen-to-square"></i> Ubah Status</button>
            <button type="button" class="btn btn-outline" style="flex: 1; font-size: 11px; padding: 8px;" onclick="quickResubmitTelebotTrx('${esc(t.ref_id)}')"><i class="fas fa-rotate-right"></i> Order Ulang</button>
          </div>
        </div>`;
        document.getElementById('modalDlTrxDetail').style.display = 'flex';
    }
    
    async function loadDownlineTopups() { return loadTelebotHistory(); }
    
    function renderDownlineTopups() {
        const tbody = document.getElementById('downlineTopupsTableBody');
        if (!tbody) return;
        const list = _rawDownlineTopups;
        if (!list.length) {
            tbody.innerHTML = '<tr><td colspan="7" class="empty"><i class="fas fa-wallet"></i>Belum ada permohonan topup saldo dari downline.</td></tr>';
            return;
        }
    
        tbody.innerHTML = list.map(t => {
            const stVal = String(t.status || 'PENDING').toUpperCase();
            const badge = (stVal === 'BERHASIL') ? 'badge-success' : ((stVal === 'GAGAL' || stVal === 'BATAL' || stVal === 'EXPIRED') ? 'badge-fail' : 'badge-pending');
            const isPending = (stVal === 'PENDING');
            const idTiket = esc(t.id || '-');
            return `<tr>
                <td><small>${esc(t.created_at || '-')}</small></td>
                <td><code style="color:#002dbb; font-weight:800;">${idTiket}</code></td>
                <td><b>${esc(t.downline_name || t.username || 'Member')}</b><br><small class="mono text-sub">${esc(t.tele_id || '-')}</small></td>
                <td><span class="badge badge-user">${esc(t.method || 'TRANSFER')}</span></td>
                <td><b class="text-success">${fmtRp(t.unique_amount || t.amount || 0)}</b><br><small class="text-sub">Kode: +${esc(t.unique_code || 0)}</small></td>
                <td><span class="badge ${badge}">${stVal}</span></td>
                <td>${isPending ? `
                    <button type="button" class="btn btn-success btn-sm" onclick="actionDownlineTopup('${idTiket}', 'accept')"><i class="fas fa-check"></i> Terima</button>
                    <button type="button" class="btn btn-danger btn-sm" onclick="actionDownlineTopup('${idTiket}', 'reject')"><i class="fas fa-xmark"></i> Tolak</button>
                ` : '<span class="text-sub"><i class="fas fa-check-double"></i> Selesai</span>'}</td>
            </tr>`;
        }).join('');
    }
    
    async function actionDownlineTopup(topupId, act) {
        const label = act === 'accept' ? 'Terima Permohonan Topup' : 'Tolak Permohonan Topup';
        if (!confirm(`${label} [${topupId}]?\nSaldo downline akan langsung disesuaikan secara otomatis.`))
            return;
        try {
            const res = await fetch('api/telebot_admin.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    action: 'action_downline_topup',
                    session_token: currentUser.session_token,
                    topup_id: topupId,
                    act: act
                })
            });
            const json = await res.json();
            toast(json.status ? 'success' : 'error', 'Topup Downline', json.message);
            loadTelebotHistory();
            loadTelebotDownlines();
        } catch(e) {
            toast('error', 'Kesalahan', e.message);
        }
    }
    
    function openDlTrxStatusModal(refId, curStatus, sn) {
        const t = _rawTelebotHistory.find(x => String(x.ref_id) === String(refId));
        document.getElementById('dlStatusRefId').value = refId;
        document.getElementById('dlStatusRefIdTxt').innerText = refId;
        document.getElementById('dlStatusItemTxt').innerText = `${t ? (t.nama_produk || t.kode_produk) : 'Produk'} (${t ? t.target : '-'}) • Harga: ${fmtRp(t ? t.harga : 0)}`;
        document.getElementById('dlStatusSelect').value = curStatus || 'BERHASIL';
        document.getElementById('dlStatusSnInput').value = (sn && sn !== '-' && !sn.includes('Menghubungi')) ? sn : '';
        document.getElementById('dlStatusNoteInput').value = '';
        document.getElementById('modalDlTrxStatus').style.display = 'flex';
    }
    
    async function submitDlTrxStatus() {
        const refId = document.getElementById('dlStatusRefId').value;
        const newStatus = document.getElementById('dlStatusSelect').value;
        const newSn = document.getElementById('dlStatusSnInput').value.trim();
        const note = document.getElementById('dlStatusNoteInput').value.trim();
        const btn = document.getElementById('btnSubmitDlStatus');
        if (btn) { btn.disabled = true; btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...'; }
        try {
            const res = await fetch('api/telebot_admin.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    action: 'update_downline_trx_status',
                    session_token: currentUser.session_token,
                    ref_id: refId,
                    new_status: newStatus,
                    new_sn: newSn,
                    note: note
                })
            });
            const json = await res.json();
            if (json && json.status) {
                toast('success', 'Status Diperbarui', json.message);
                closeModal('modalDlTrxStatus');
                loadTelebotHistory();
                loadTelebotDownlines();
            } else {
                toast('error', 'Gagal', (json && json.message) ? json.message : 'Gagal mengubah status');
            }
        } catch(e) {
            toast('error', 'Kesalahan', e.message);
        } finally {
            if (btn) { btn.disabled = false; btn.innerHTML = '<i class="fas fa-floppy-disk"></i> Simpan Status'; }
        }
    }
    
    async function syncDlTrxStatus(refId) {
        toast('info', 'Mengecek Pusat', `Sinkronisasi transaksi ${refId}...`);
        try {
            const res = await fetch('api/telebot_admin.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    action: 'sync_downline_trx_status',
                    session_token: currentUser.session_token,
                    ref_id: refId
                })
            });
            const json = await res.json();
            if (json && json.status) {
                toast('success', 'Sinkron Sukses', json.message || 'Status terbaru telah ditarik dari server pusat.');
                loadTelebotHistory();
            } else {
                toast('error', 'Gagal Sync', (json && json.message) ? json.message : 'Koneksi ke gateway pusat gagal');
            }
        } catch(e) {
            toast('error', 'Kesalahan', e.message);
        }
    }
    
    async function submitTelebotBroadcast() {
        const msg = (document.getElementById('telebotBroadcastMsg')?.value || '').trim();
        if (!msg) return toast('warn', 'Pesan Kosong', 'Ketik isi pesan siaran terlebih dahulu!');
        const btn = document.getElementById('btnSubmitTelebotBroadcast');
        if (btn) { btn.disabled = true; btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengirim Siaran...'; }
        try {
            const res = await fetch('api/telebot_admin.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    action: 'broadcast',
                    session_token: currentUser.session_token,
                    message: msg
                })
            });
            const json = await res.json();
            if (json && json.status) {
                toast('success', 'Siaran Terkirim', json.message);
                document.getElementById('telebotBroadcastMsg').value = '';
            } else {
                toast('error', 'Gagal', (json && json.message) ? json.message : 'Gagal mengirim siaran');
            }
        } catch(e) {
            toast('error', 'Kesalahan', e.message);
        } finally {
            if (btn) { btn.disabled = false; btn.innerHTML = '<i class="fas fa-paper-plane"></i> Kirim Siaran Sekarang'; }
        }
    }
    
    function checkAndRenderBotTeleAccess() {
        const isUnlocked = !!(currentUser && (currentUser.telebot_unlocked === true || currentUser.telebot_unlocked === '1' || currentUser.telebot_unlocked === 1 || currentUser.role === 'admin'));
        const lockedEl = document.getElementById('botTeleLockedWrap');
        const unlockedEl = document.getElementById('botTeleUnlockedWrap');
        if (lockedEl && unlockedEl) {
            if (!isUnlocked) {
                lockedEl.style.display = 'block';
                unlockedEl.style.display = 'none';
            } else {
                lockedEl.style.display = 'none';
                unlockedEl.style.display = 'block';
                switchTelebotSub('downlines');
    
                loadTelebotConfig();
                loadTelebotDownlines();
                loadTelebotHistory();
            }
        }
    }
    
    function openUpgradeBotModal() {
        if (!currentUser) return alert('Silakan login terlebih dahulu!');
        const pendingStr = localStorage.getItem('dt17_pending_topup_' + currentUser.username);
        if (pendingStr) {
            try {
                const pending = JSON.parse(pendingStr);
                if (pending && (pending.type === 'UPGRADE_BOT' || String(pending.id || '').includes('BOT-')) && (Date.now() - (pending.time || 0) < 3600 * 1000)) {
                    renderActiveTopupView(pending);
                    document.getElementById('modalTopup').style.display = 'flex';
                    startTopupTimer((pending.time || Date.now()) + (3600 * 1000));
                    startIndoPayPolling(pending.id);
                    return;
                }
            } catch(e) {}
        }
        const sAkrab = parseInt(currentUser.saldo_akrab !== undefined ? currentUser.saldo_akrab : (currentUser.saldo || 0));
        const sApi2  = parseInt(currentUser.saldo_api2 || 0);
        const sPpob  = parseInt(currentUser.saldo_ppob || 0);
        const maxSaldo = Math.max(sAkrab, sApi2, sPpob, parseInt(currentUser.saldo || 0));
        const txtEl = document.getElementById('txtSaldoUpgradeBotAvailable');
        if (txtEl) txtEl.innerText = 'Saldo tersedia: ' + fmtRp(maxSaldo);
        document.getElementById('modalUpgradeBot').style.display = 'flex';
    }
    
    async function executePayBotViaWallet() {
        if (!currentUser) return;
        const sAkrab = parseInt(currentUser.saldo_akrab !== undefined ? currentUser.saldo_akrab : (currentUser.saldo || 0));
        const sApi2  = parseInt(currentUser.saldo_api2 || 0);
        const sPpob  = parseInt(currentUser.saldo_ppob || 0);
        const maxSaldo = Math.max(sAkrab, sApi2, sPpob, parseInt(currentUser.saldo || 0));
        if (maxSaldo < 180000) {
            toast('warn', 'Saldo Kurang', 'Saldo tertinggi Anda (' + fmtRp(maxSaldo) + ') tidak mencukupi untuk membuka fitur Bot Telegram (Biaya Rp 180.000). Silakan lakukan topup atau bayar via Transfer / QRIS.');
            return;
        }
        if (!confirm('Konfirmasi Buka Sistem Bot Telegram:\n\nBiaya Rp 180.000 akan dipotong langsung dari saldo dompet Anda dan sistem Bot Telegram akan langsung aktif.\n\nLanjutkan pembayaran?')) return;
        try {
            const res = await fetch('api/sysdatabase/auth.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    action: 'unlock_telebot_wallet',
                    session_token: currentUser.session_token
                })
            });
            const data = await res.json();
            if (data && data.status) {
                currentUser.telebot_unlocked = true;
                if (data.data) {
                    currentUser.saldo = data.data.saldo;
                    currentUser.saldo_akrab = data.data.saldo_akrab;
                    currentUser.saldo_api2 = data.data.saldo_api2;
                    currentUser.saldo_ppob = data.data.saldo_ppob;
                }
                updateBalanceDisplay();
                closeModal('modalUpgradeBot');
                toast('success', 'Bot Telegram Terbuka', data.message || 'Sistem Bot Telegram berhasil diaktifkan!');
                checkAndRenderBotTeleAccess();
                if (typeof loadUserHistory === 'function') loadUserHistory();
            } else {
                toast('error', 'Gagal', (data && data.message) ? data.message : 'Gagal memproses pembayaran via saldo.');
            }
        } catch (e) {
            toast('error', 'Kesalahan', e.message);
        }
    }
    
    function executePayBotViaTransfer() {
        closeModal('modalUpgradeBot');
        requestSpecialPayment('UPGRADE_BOT', 180000, 'Buka Sistem Bot Telegram');
    }
    
    function openAktivasiAkunModal() {
        if (!currentUser) return alert('Silakan login terlebih dahulu!');
        const pendingStr = localStorage.getItem('dt17_pending_topup_' + currentUser.username);
        if (pendingStr) {
            try {
                const pending = JSON.parse(pendingStr);
                if (pending && (pending.type === 'AKTIVASI_AKUN' || String(pending.id || '').includes('ACT-')) && (Date.now() - (pending.time || 0) < 3600 * 1000)) {
                    renderActiveTopupView(pending);
                    document.getElementById('modalTopup').style.display = 'flex';
                    startTopupTimer((pending.time || Date.now()) + (3600 * 1000));
                    startIndoPayPolling(pending.id);
                    return;
                }
            } catch(e) {}
        }
        const sAkrab = parseInt(currentUser.saldo_akrab !== undefined ? currentUser.saldo_akrab : (currentUser.saldo || 0));
        const sApi2  = parseInt(currentUser.saldo_api2 || 0);
        const sPpob  = parseInt(currentUser.saldo_ppob || 0);
        const maxSaldo = Math.max(sAkrab, sApi2, sPpob, parseInt(currentUser.saldo || 0));
        const txtEl = document.getElementById('txtSaldoAktivasiAvailable');
        if (txtEl) txtEl.innerText = 'Saldo tersedia: ' + fmtRp(maxSaldo);
        const linkWa = document.getElementById('linkWaResellerGratis');
        if (linkWa) linkWa.href = 'https://t.me/iTCyrax';
        document.getElementById('modalAktivasiAkun').style.display = 'flex';
    
    }
    
    async function executeAktivasiReseller() {
        if (!currentUser) return;
        if (!confirm("Konfirmasi Aktivasi Akun Reseller:\n\nAktivasi akun Reseller adalah GRATIS (Rp 0).\nPermintaan aktivasi akun Anda akan diajukan ke sistem untuk verifikasi dan penerbitan API Key resmi.\n\nLanjutkan aktivasi sekarang?")) return;
        closeModal('modalAktivasiAkun');
        try {
            const res = await fetch('api/sysdatabase/topup_api.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    action: 'create_ticket',
                    type: 'activation_reseller',
                    session_token: currentUser.session_token
                })
            });
            const data = await res.json();
            if (data && data.status) {
                toast('success', 'Permintaan Terkirim', data.message || 'Permintaan aktivasi akun Reseller gratis berhasil diajukan ke Admin!');
                if (typeof loadUserHistory === 'function') loadUserHistory();
            } else {
                toast('error', 'Gagal', (data && data.message) ? data.message : 'Gagal memproses aktivasi reseller.');
            }
        } catch(e) {
            toast('error', 'Kesalahan', e.message);
        }
    }
    
    
    async function executePayAktivasiViaWallet() {
        if (!currentUser) return;
        const sAkrab = parseInt(currentUser.saldo_akrab !== undefined ? currentUser.saldo_akrab : (currentUser.saldo || 0));
        const sApi2  = parseInt(currentUser.saldo_api2 || 0);
        const sPpob  = parseInt(currentUser.saldo_ppob || 0);
        const maxSaldo = Math.max(sAkrab, sApi2, sPpob, parseInt(currentUser.saldo || 0));
        if (maxSaldo < 280000) {
            toast('warn', 'Saldo Kurang', 'Saldo tertinggi Anda (' + fmtRp(maxSaldo) + ') tidak mencukupi untuk aktivasi paket seller VIP (Biaya Rp 280.000). Silakan lakukan topup atau bayar via Transfer / QRIS.');
            return;
        }
        if (!confirm('Konfirmasi Aktivasi Akun Seller VIP:\n\nBiaya Rp 280.000 akan dipotong langsung dari dompet Anda. Anda akan mendapatkan harga modal dasar VIP termurah, penerbitan API Key resmi, dan sistem Bot Telegram downline langsung aktif.\n\nLanjutkan pembayaran?')) return;
        try {
            const res = await fetch('api/sysdatabase/auth.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    action: 'activate_seller_wallet',
                    session_token: currentUser.session_token
                })
            });
            const data = await res.json();
            if (data && data.status) {
                currentUser.role = 'seller';
                currentUser.verified = true;
                currentUser.status = 'active';
                currentUser.telebot_unlocked = true;
                if (data.new_api_key) currentUser.api_key = data.new_api_key;
                if (data.data) {
                    currentUser.saldo = data.data.saldo;
                    currentUser.saldo_akrab = data.data.saldo_akrab;
                    currentUser.saldo_api2 = data.data.saldo_api2;
                    currentUser.saldo_ppob = data.data.saldo_ppob;
                    if (data.data.api_key) currentUser.api_key = data.data.api_key;
                    if (data.data.role) currentUser.role = data.data.role;
                }
                updateBalanceDisplay();
                updateApiKeyDisplay();
                closeModal('modalAktivasiSellerBayar');
                closeModal('modalAktivasiAkun');
                toast('success', 'Akun Seller VIP Aktif', data.message || 'Akun Seller VIP, API Key, & Bot Telegram berhasil diaktifkan!');
                if (typeof checkAndRenderBotTeleAccess === 'function') checkAndRenderBotTeleAccess();
                if (typeof loadUserHistory === 'function') loadUserHistory();
            } else {
                toast('error', 'Gagal', (data && data.message) ? data.message : 'Gagal memproses aktivasi via saldo.');
            }
        } catch (e) {
            toast('error', 'Kesalahan', e.message);
        }
    }
    
    function executePayAktivasiViaTransfer() {
        closeModal('modalAktivasiSellerBayar');
        closeModal('modalAktivasiAkun');
        requestSpecialPayment('AKTIVASI_AKUN', 280000, 'Aktivasi Akun Seller VIP');
    }
    
    async function requestSpecialPayment(type, amount, title) {
        if (!currentUser) return;
        closeModal('modalAktivasiSellerBayar');
        closeModal('modalAktivasiAkun');
        closeModal('modalUpgradeBot');
        renderTopupWalletsUI();
        await loadPaymentMethodsConfig();
        const wrapWalletChoice = document.getElementById('wrapTopupTargetWalletChoice');
        if (wrapWalletChoice) wrapWalletChoice.style.display = 'none';
        const isBotUpgrade = (type === 'UPGRADE_BOT');
        const titleSpan = document.getElementById('modalTopupTitleText');
        const specialBanner = document.getElementById('wrapSpecialPaymentBanner');
        if (titleSpan) {
            titleSpan.innerHTML = isBotUpgrade 
                ? '<i class="fab fa-telegram-plane" style="color: #0088cc;"></i> Pembayaran Sistem Bot Telegram VIP' 
                : '<i class="fas fa-shield-halved" style="color: #002dbb;"></i> Pembayaran Aktivasi Akun & API Key';
        }
        if (specialBanner) {
            specialBanner.style.display = 'block';
            if (isBotUpgrade) {
                specialBanner.style.background = 'linear-gradient(135deg, #e0f2fe 0%, #eff6ff 100%)';
                specialBanner.style.border = '1.5px solid #7dd3fc';
                specialBanner.style.boxShadow = '0 3px 12px rgba(0, 136, 204, 0.12)';
                specialBanner.innerHTML = '<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:4px;"><span class="badge" style="background:#0088cc; color:#ffffff; font-size:9px; padding:2px 8px; border-radius:6px;"><i class="fab fa-telegram-plane"></i> LISENSI BOT VIP</span><b style="color:#0369a1; font-size:11px;">Biaya Buka Sistem Bot</b></div><div style="font-size:10.5px; color:#0c4a6e; line-height:1.4;">Menyiapkan tiket pembayaran resmi...</div>';
            } else {
                specialBanner.style.background = 'linear-gradient(135deg, #fef3c7 0%, #fffbeb 100%)';
                specialBanner.style.border = '1.5px solid #fcd34d';
                specialBanner.style.boxShadow = '0 3px 12px rgba(245, 158, 11, 0.12)';
                specialBanner.innerHTML = '<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:4px;"><span class="badge" style="background:#d97706; color:#ffffff; font-size:9px; padding:2px 8px; border-radius:6px;"><i class="fas fa-key"></i> AKTIVASI SELLER</span><b style="color:#92400e; font-size:11px;">Biaya Aktivasi Akun & API Key</b></div><div style="font-size:10.5px; color:#78350f; line-height:1.4;">Menyiapkan tiket pembayaran resmi...</div>';
            }
        }
    
        document.getElementById('currentTopupId').value = '';
        document.getElementById('topupInputSection').style.display = 'none';
        document.getElementById('topupQrisSection').style.display = 'block';
        const statusTextEl = document.getElementById('topupStatusText');
    
        if (statusTextEl) {
            statusTextEl.innerText = 'Menyiapkan pembayaran ' + title + '...';
            statusTextEl.style.color = '#002dbb';
        }
        document.getElementById('modalTopup').style.display = 'flex';
    
        try {
            const res = await fetch('api/sysdatabase/topup_api.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                                    action: 'request',
                type: type,
                amount: amount,
                session_token: currentUser.session_token,
                username: currentUser.username,
                nomorwa: currentUser.nomorwa,
                wallet: 'akrab',
                method: document.getElementById('topupMethod') ? document.getElementById('topupMethod').value : 'qris'
            })
        });
        const data = await res.json();
        if (data && data.status && data.data) {
            const d = data.data;
            d.type = type;
            const nowTime = Date.now();
                const savedObj = Object.assign({ time: nowTime, username: currentUser.username }, d);
                localStorage.setItem('dt17_pending_topup_' + currentUser.username, JSON.stringify(savedObj));
                renderActiveTopupView(savedObj);
                startTopupTimer(nowTime + (3600 * 1000));
                startIndoPayPolling(d.id);
                if (typeof loadUserHistory === 'function') loadUserHistory();
            } else {
                alert((data && data.message) ? data.message : 'Gagal memproses permohonan pembayaran.');
                closeModal('modalTopup');
            }
        } catch(e) {
            alert('Terjadi kesalahan koneksi saat memproses pembayaran.');
            closeModal('modalTopup');
        }
    }
    
    function parseWIB(dateStr) {
        if (!dateStr) return Date.now();
        const ts = Date.parse(String(dateStr).replace(' ', 'T'));
        return isNaN(ts) ? Date.now() : ts;
    }
    
    function openWebhookModal() {
        if (!currentUser) return;
        const inp = document.getElementById('inputUserWebhookUrl');
        if (inp) inp.value = currentUser.callback_url || '';
        const m = document.getElementById('modalWebhookUrl');
        if (m) m.style.display = 'flex';
    }
    
    async function submitUserWebhookUrl() {
        if (!currentUser) return;
        const urlVal = (document.getElementById('inputUserWebhookUrl')?.value || '').trim();
        const btn = document.getElementById('btnSaveWebhook');
        if (btn) { btn.disabled = true; btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...'; }
        try {
            const res = await fetch('api/sysdatabase/auth.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ action: 'save_webhook', session_token: currentUser.session_token, callback_url: urlVal })
            });
            const data = await res.json();
            if (data && data.status) {
                currentUser.callback_url = urlVal;
                const el = document.getElementById('profWebhookUrlKtp');
                if (el) {
                    el.innerText = urlVal ? (urlVal.length > 25 ? urlVal.slice(0, 22) + '...' : urlVal) : 'Belum diatur';
                    el.title = urlVal || 'Klik tombol Set Webhook untuk mengatur URL Callback';
                }
                toast('success', 'Webhook Disimpan', data.message || 'URL Webhook berhasil diperbarui.');
                closeModal('modalWebhookUrl');
            } else {
                toast('error', 'Gagal', (data && data.message) ? data.message : 'Gagal menyimpan URL Webhook.');
            }
        } catch(e) {
            toast('error', 'Kesalahan', e.message);
        } finally {
            if (btn) { btn.disabled = false; btn.innerHTML = '<i class="fas fa-floppy-disk"></i> Simpan URL'; }
        }
    }
    
    async function testUserWebhookUrl() {
        if (!currentUser) return;
        const urlVal = (document.getElementById('inputUserWebhookUrl')?.value || '').trim();
        if (!urlVal) return toast('warn', 'URL Kosong', 'Masukkan URL Webhook terlebih dahulu!');
        const btn = document.getElementById('btnTestWebhook');
        if (btn) { btn.disabled = true; btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengirim...'; }
        try {
            const res = await fetch('api/sysdatabase/auth.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ action: 'test_webhook', session_token: currentUser.session_token, callback_url: urlVal })
            });
            const data = await res.json();
            toast(data && data.status ? 'success' : 'info', 'Tes Ping Webhook', (data && data.message) ? data.message : 'Ping dikirim ke endpoint Anda.');
        } catch(e) {
            toast('error', 'Gagal Ping', e.message);
        } finally {
            if (btn) { btn.disabled = false; btn.innerHTML = '<i class="fas fa-paper-plane"></i> Tes Ping'; }
        }
    }
    
    function reopenPendingPaymentTicket(refid) {
        closeModal('modalTrxDetail');
        if (!currentUser) return;
        if (String(refid).startsWith('TP1_') || (rawUserHistory || []).some(x => String(x.refid_h2h) === String(refid) && x.kode_produk === 'TOPUP_DEDICATED')) {
            return openDedicatedTopupModal();
        }
        const pendingStr = localStorage.getItem('dt17_pending_topup_' + currentUser.username);
        let targetTicket = null;
        if (pendingStr) {
            try {
                const pending = JSON.parse(pendingStr);
                if (pending && (pending.id === refid || pending.refid_h2h === refid)) {
                    targetTicket = pending;
                }
            } catch(e) {}
        }
        if (!targetTicket) {
            const t = (rawUserHistory || []).find(x => String(x.refid_h2h) === String(refid));
            if (t) {
                const isBot = (t.kode_produk === 'UPGRADE_BOT' || String(t.refid_h2h).includes('BOT-'));
                const isAct = (t.kode_produk === 'AKTIVASI_SELLER' || String(t.refid_h2h).includes('ACT-'));
                const finalAmt = parseInt(t.total_transfer || t.harga || 0);
                const baseAmt = isBot ? 180000 : (isAct ? 280000 : finalAmt);
                targetTicket = {
                    id: t.refid_h2h,
                    type: isBot ? 'UPGRADE_BOT' : (isAct ? 'AKTIVASI_AKUN' : 'TOPUP'),
                    amount: baseAmt,
                    unique_amount: finalAmt,
                    credit_amount: (isBot || isAct) ? 0 : baseAmt,
                    admin_fee: Math.max(0, finalAmt - baseAmt),
                    method: 'qris',
                    time: t.created_at ? parseWIB(t.created_at) : Date.now(),
                    username: currentUser.username
                };
            }
        }
        if (targetTicket) {
            localStorage.setItem('dt17_pending_topup_' + currentUser.username, JSON.stringify(targetTicket));
            renderActiveTopupView(targetTicket);
            const expiredTime = (targetTicket.time ? Number(targetTicket.time) : Date.now()) + (3600 * 1000);
            startTopupTimer(expiredTime);
            startIndoPayPolling(targetTicket.id);
            document.getElementById('modalTopup').style.display = 'flex';
        } else {
            toast('warn', 'Tiket Tidak Ditemukan', 'Data tiket pembayaran tidak ditemukan atau sudah selesai.');
        }
    }
    
    function toggleTestFields() {
        const action = document.getElementById('testAction').value;
        const sf = document.getElementById('statusFields');
        if (sf) sf.style.display = action === 'status' ? 'block' : 'none';
    }
    
    function copyTestOutput() {
        const text = document.getElementById('testResult').innerText;
        navigator.clipboard.writeText(text);
        alert('JSON Response disalin!');
    }
    
    async function downloadTestOutputPrompt() {
        const text = document.getElementById('testResult').innerText;
        if (!text || text.trim().startsWith('//')) {
            alert('Tidak ada data JSON untuk di-download!');
            return;
        }
        const partsInput = prompt('Pilih jumlah bagian file yang ingin di-download (1 sampai 4):', '1');
        if (partsInput === null) return;
        let parts = parseInt(partsInput);
        if (isNaN(parts) || parts < 1) parts = 1;
        if (parts > 4) parts = 4;
    
        const totalLen = text.length;
        const chunkSize = Math.ceil(totalLen / parts);
    
        for (let i = 0; i < parts; i++) {
            const start = i * chunkSize;
            const end = Math.min(start + chunkSize, totalLen);
            const chunkText = text.slice(start, end);
            
            const blob = new Blob([chunkText], { type: 'application/json' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = parts === 1 ? 'response.json' : `response_part_${i + 1}_of_${parts}.json`;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
    
            if (parts > 1 && i < parts - 1) {
                await new Promise(resolve => setTimeout(resolve, 250));
            }
        }
    }
    
    async function executeTest() {
        const server = document.getElementById('testServer').value;
        const action = document.getElementById('testAction').value;
        const output = document.getElementById('testResult');
        const statusEl = document.getElementById('testResponseStatus');
        const serverCode = server.replace('.php', '');
    
        if (action !== 'list' && action !== 'status') {
            output.innerText = "// [KEAMANAN] Fitur pembelian produk langsung (order) telah dinonaktifkan pada menu tester.";
            if (statusEl) statusEl.innerText = "STATUS: BLOCKED";
            return;
        }
    
        if (!currentUser || !isUserVerified() || !currentUser.api_key) {
            output.innerText = "// [AKSES DITOLAK] Akun Anda belum diverifikasi oleh Admin!\n// Menu Tester wajib menggunakan API Key pribadi milik Anda yang aktif.";
            if (statusEl) statusEl.innerText = "STATUS: BLOCKED (UNVERIFIED)";
            toast('error', 'Tester Terkunci', 'Akun belum diverifikasi oleh Admin!');
            return;
        }
    
        output.innerText = "// Memproses Request via Central Gateway (api.php) Provider: " + serverCode + "...";
        if (statusEl) statusEl.innerText = "STATUS: SENDING...";
    
        let payload = { action: action, api: serverCode, api_key: currentUser.api_key, is_tester: 1 };
        if (action === 'status') {
            payload.refid = document.getElementById('testRefId').value;
        }
    
        try {
            const res = await fetch('api.php', { method: 'POST', headers: { 'Content-Type': 'application/json', 'X-API-KEY': currentUser.api_key }, body: JSON.stringify(payload) });
            const data = await res.json();
            output.innerText = JSON.stringify(data, null, 2);
            
            const trxSt = (data.trx_status || (data.data && data.data.status_trx) || (data.status ? 'PROSES' : 'GAGAL')).toUpperCase();
            if (statusEl) statusEl.innerText = "STATUS: 200 OK (" + trxSt + ")";
            
            loadUserHistory();
    
        } catch (err) {
            output.innerText = "// Error: " + err.message;
            if (statusEl) statusEl.innerText = "STATUS: ERROR";
        }
    }
      let _isPendingCheckingActive = false;
    async function checkPendingTransactionsStatus() {
      if (_isPendingCheckingActive || !currentUser) return;
      const pendingList = (rawUserHistory || []).filter(t => {
        const st = String(t.status || '').toUpperCase();
        const ref = String(t.refid_h2h || '');
        return (st === 'PENDING' || st === 'PROSES') && ref && !ref.startsWith('PO_') && !ref.startsWith('PO-') && !t.is_preorder;
      });
      if (!pendingList.length) return;
      _isPendingCheckingActive = true;
      let hasChanged = false;
      for (const trx of pendingList) {
        const ref = String(trx.refid_h2h || '');
        const isPayTicket = ref.startsWith('TP-') || ref.startsWith('TP1_') || ref.startsWith('BOT-') || ref.startsWith('ACT-') || trx.server_code === 'UPGRADE_BOT' || trx.server_code === 'AKTIVASI_AKUN' || trx.server_code === 'TOPUP SALDO' || trx.server_code === 'dedicated_topup.php' || trx.kode_produk === 'UPGRADE_BOT' || trx.kode_produk === 'AKTIVASI_SELLER' || trx.kode_produk === 'SALDO' || trx.kode_produk === 'TOPUP_DEDICATED';
        if (isPayTicket) {
          try {
            const isDedicated = !!(trx.is_dedicated || ref.startsWith('TP1_') || trx.kode_produk === 'TOPUP_DEDICATED');
            if (isDedicated) {
              const sToken = currentUser.session_token || '';
              const aKey = currentUser.api_key || '';
              const res = await fetch(`api/dedicated_topup.php?action=check_topup&session_token=${encodeURIComponent(sToken)}&api_key=${encodeURIComponent(aKey)}&_t=${Date.now()}`);
              const data = await res.json();
              if (data && data.status) {
                if (data.matched === true) {
                  trx.status = 'BERHASIL';
                  trx.sn = data.message || 'Topup Terverifikasi';
                  localStorage.removeItem('dt17_pending_topup_' + currentUser.username);
                  if (typeof stopDedicatedPolling === 'function') stopDedicatedPolling();
                  closeModal('modalTopup');
                  toast('success', 'Topup Dedicated Berhasil', data.message || 'Saldo berhasil masuk ke akun Server 1 Dedicated.');
                  if (typeof syncDedicatedBalanceLive === 'function') await syncDedicatedBalanceLive(true);
                  await refreshUserBalanceLive();
                  hasChanged = true;
                } else if (data.expired === true) {
                  trx.status = 'GAGAL';
                  trx.sn = 'Tiket Kedaluwarsa (30 Menit)';
                  localStorage.removeItem('dt17_pending_topup_' + currentUser.username);
                  if (typeof stopDedicatedPolling === 'function') stopDedicatedPolling();
                  toast('error', 'Topup Kedaluwarsa', 'Tiket transfer telah kedaluwarsa.');
                  hasChanged = true;
                }
              }
            } else {
              const res = await fetch('api/sysdatabase/topup_api.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ action: 'check_indopay_status', topup_id: ref })
              });
              const data = await res.json();
              if (data && data.paid === true) {
                trx.status = 'BERHASIL';
                if (data.sn) trx.sn = data.sn;
                localStorage.removeItem('dt17_pending_topup_' + currentUser.username);
                if (typeof stopIndoPayPolling === 'function') stopIndoPayPolling();
                closeModal('modalTopup');
                if (data.type === 'UPGRADE_BOT' || trx.kode_produk === 'UPGRADE_BOT' || ref.startsWith('BOT-')) {
                  currentUser.telebot_unlocked = true;
                  toast('success', 'Bot Telegram Aktif', data.message || 'Sistem Bot Telegram berhasil diaktifkan!');
                  if (typeof checkAndRenderBotTeleAccess === 'function') checkAndRenderBotTeleAccess();
                } else if (data.type === 'AKTIVASI_AKUN' || trx.kode_produk === 'AKTIVASI_SELLER' || ref.startsWith('ACT-')) {
                  currentUser.verified = true;
                  currentUser.status = 'active';
                  if (data.new_api_key) currentUser.api_key = data.new_api_key;
                  toast('success', 'Akun Seller Aktif', data.message || 'Akun Seller & API Key berhasil diaktifkan!');
                  if (typeof updateApiKeyDisplay === 'function') updateApiKeyDisplay();
                } else {
                  toast('success', 'Topup Berhasil', 'Saldo akun Anda otomatis bertambah!');
                }
                await refreshUserBalanceLive();
                hasChanged = true;
              } else if (data && data.is_failed === true) {
                trx.status = 'GAGAL';
                trx.sn = data.message || 'Topup Dibatalkan';
                localStorage.removeItem('dt17_pending_topup_' + currentUser.username);
                if (typeof stopIndoPayPolling === 'function') stopIndoPayPolling();
                toast('error', 'Topup Dibatalkan', 'Transaksi topup dibatalkan/kedaluwarsa.');
                hasChanged = true;
              }
            }
          } catch(errTop) {}
        } else if (currentUser.api_key) {
          try {
            let srvRaw = String(trx.server_code || trx.server || '').toLowerCase().replace('.php', '').trim();
            let targetApi = 'api1';
            if (srvRaw.includes('api4') || srvRaw.includes('oke') || srvRaw.includes('ppob')) {
              targetApi = 'api4';
            } else if (srvRaw.includes('api2') || srvRaw.includes('kaje') || srvRaw.includes('v2')) {
              targetApi = 'api2';
            } else if (srvRaw.includes('api1') || srvRaw.includes('stable') || srvRaw.includes('akrab')) {
              targetApi = 'api1';
            } else {
              const kodeProd = String(trx.kode_produk || '').toUpperCase();
              if (kodeProd.startsWith('XL') || kodeProd.startsWith('XD') || kodeProd.startsWith('XV') || kodeProd.startsWith('XC') || kodeProd.startsWith('AX') || kodeProd.startsWith('AIGO')) {
                targetApi = 'api1';
              } else {
                targetApi = 'api4';
              }
            }
            const endpointUrl = 'api.php';
            const res = await fetch(endpointUrl, {
              method: 'POST',
              headers: { 'Content-Type': 'application/json', 'X-API-KEY': currentUser.api_key },
              body: JSON.stringify({
                action: 'status',
                api: targetApi,
                refid: trx.refid_h2h,
                api_key: currentUser.api_key
              })
            });
            const rawTxt = await res.text();
            let json = null;
            try { json = JSON.parse(rawTxt); } catch(pe) {}
            if (!json) continue;
            const finalSt = String((json.data && json.data.status_trx) || json.trx_status || (json.status ? 'BERHASIL' : '')).toUpperCase();
            if (finalSt && finalSt !== 'PENDING' && finalSt !== 'PROSES') {
              trx.status = finalSt;
              if (json.data && json.data.sn) trx.sn = json.data.sn;
              else if (json.sn) trx.sn = json.sn;
              if (json.data && json.data.sisa_saldo !== undefined) {
                currentUser.saldo = json.data.sisa_saldo;
                updateBalanceDisplay();
              }
              toast(finalSt === 'BERHASIL' ? 'success' : 'error', 'Status Transaksi Terupdate', `RefID ${trx.refid_h2h}: ${finalSt}`);
              hasChanged = true;
            }
          } catch(e) {}
        }
      }
      _isPendingCheckingActive = false;
      if (hasChanged) {
        renderUserHistoryPage();
        if (typeof renderLacak === 'function') renderLacak();
      }
    }
    let rawUserHistory = [];
    let userCurrentPage = 1;
    let userTrxPerPage = 50;
    let isAllDatesSelected = false;
    let userDatePreset = 'today';
    let userHistoryStatusFilter = 'all';
    
    function getTodayWIB() {
        const d = new Date();
        const wibTime = new Date(d.getTime() + (7 * 3600 * 1000) + (d.getTimezoneOffset() * 60000));
        const year = wibTime.getFullYear();
        const month = String(wibTime.getMonth() + 1).padStart(2, '0');
        const day = String(wibTime.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }
    
    function getYesterdayWIB() {
        const d = new Date(Date.now() - 86400000);
        const wibTime = new Date(d.getTime() + (7 * 3600 * 1000) + (d.getTimezoneOffset() * 60000));
        const year = wibTime.getFullYear();
        const month = String(wibTime.getMonth() + 1).padStart(2, '0');
        const day = String(wibTime.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }
    
    function isMutasiTopup(t) {
        if (!t) return false;
        const ref = String(t.refid_h2h || '').toUpperCase();
        const kd = String(t.kode_produk || '').toUpperCase();
        const srv = String(t.server_code || '').toUpperCase();
        return (srv === 'TOPUP SALDO' || srv === 'DEDICATED_TOPUP.PHP' || kd === 'SALDO' || kd === 'TOPUP_DEDICATED' || ref.startsWith('TP-') || ref.startsWith('TP1_'));
    }
    
    function getMutasiServerInfo(t) {
        if (isMutasiTopup(t)) return { key: 'TOPUP', label: 'TOPUP', cls: 'is-top' };
        const isDed = !!(t.is_dedicated || t.is_personal_khfy || (t.server_name && String(t.server_name).includes('Dedicated')) || (t.server && String(t.server).includes('Dedicated')));
        const raw = String(t.server_code || t.server || '').toLowerCase().replace('.php', '').trim();
        if (isDed) return { key: 'api1', label: 'DEDICATED', cls: 'is-ded' };
        if (raw.includes('api4') || raw.includes('oke') || raw.includes('ppob')) return { key: 'api4', label: 'API4', cls: '' };
        if (raw.includes('api2') || raw.includes('kaje') || raw.includes('v2')) return { key: 'api2', label: 'API2', cls: '' };
        if (raw.includes('api1') || raw.includes('stable') || raw.includes('akrab')) return { key: 'api1', label: 'API1', cls: '' };
        return { key: raw || 'h2h', label: (raw || 'H2H').toUpperCase().slice(0, 10), cls: '' };
    }
    
    function syncMutasiDateUI() {
        const badge = document.getElementById('mutasiDateBadgeTxt');
        const mapLabel = { today: 'Hari Ini', yesterday: 'Kemarin', '7d': '7 Hari', '30d': '30 Hari', all: 'Semua Tgl' };
        const dEl = document.getElementById('userTrxDate');
        if (badge) {
            if (userDatePreset === 'custom' && dEl && dEl.value) badge.innerText = dEl.value.slice(5);
            else badge.innerText = mapLabel[userDatePreset] || 'Hari Ini';
        }
        const presetIds = { today: 'mutasiDateToday', yesterday: 'mutasiDateYesterday', '7d': 'mutasiDate7d', '30d': 'mutasiDate30d', all: 'mutasiDateAll' };
        Object.keys(presetIds).forEach(k => {
            const btn = document.getElementById(presetIds[k]);
            if (btn) btn.classList.toggle('active', k === userDatePreset);
        });
        const srvEl = document.getElementById('userTrxServer');
        const dotEl = document.getElementById('mutasiFilterDot');
        if (dotEl) {
            const hasCustomFilter = (userDatePreset !== 'today') || (srvEl && srvEl.value !== '') || (userTrxPerPage !== 50);
            dotEl.style.display = hasCustomFilter ? 'inline-block' : 'none';
        }
    }
    
    function initFilterDates() {
        if (window._filterDatesInitialized) return;
        const todayWIB = getTodayWIB();
        const uDateEl = document.getElementById('userTrxDate');
        if (uDateEl && !uDateEl.value) uDateEl.value = todayWIB;
        userDatePreset = 'today';
        isAllDatesSelected = false;
        window._filterDatesInitialized = true;
        syncMutasiDateUI();
    }
    
    function toggleMutasiAdvFilter() {
        const bar = document.getElementById('mutasiAdvFilterBar');
        const btn = document.getElementById('btnMutasiAdvToggle');
        if (!bar) return;
        const open = (bar.style.display !== 'block');
        bar.style.display = open ? 'block' : 'none';
        if (btn) btn.classList.toggle('is-on', open);
    }
    
    function setMutasiDatePreset(preset) {
        userDatePreset = preset;
        const uDateEl = document.getElementById('userTrxDate');
        if (preset === 'today') {
            isAllDatesSelected = false;
            if (uDateEl) uDateEl.value = getTodayWIB();
        } else if (preset === 'yesterday') {
            isAllDatesSelected = false;
            if (uDateEl) uDateEl.value = getYesterdayWIB();
        } else {
            isAllDatesSelected = true;
            if (uDateEl) uDateEl.value = '';
        }
        syncMutasiDateUI();
        userCurrentPage = 1;
        renderUserHistoryPage();
    }
    
    function onUserTrxDateInput() {
        const uDateEl = document.getElementById('userTrxDate');
        const val = uDateEl ? uDateEl.value : '';
        if (!val) return setMutasiDatePreset('all');
        if (val === getTodayWIB()) return setMutasiDatePreset('today');
        if (val === getYesterdayWIB()) return setMutasiDatePreset('yesterday');
        userDatePreset = 'custom';
        isAllDatesSelected = false;
        syncMutasiDateUI();
        userCurrentPage = 1;
        renderUserHistoryPage();
    }
    
    function onUserTrxSearchInput() {
        const inp = document.getElementById('userTrxSearch');
        const clr = document.getElementById('btnClearUserTrxSearch');
        if (clr && inp) clr.style.display = inp.value ? 'inline-flex' : 'none';
        filterUserHistory();
    }
    
    function clearUserTrxSearch() {
        const inp = document.getElementById('userTrxSearch');
        const clr = document.getElementById('btnClearUserTrxSearch');
        if (inp) { inp.value = ''; inp.focus(); }
        if (clr) clr.style.display = 'none';
        filterUserHistory();
    }
    
    function changeUserPerPage(val) {
        const n = parseInt(val, 10);
        userTrxPerPage = (!isNaN(n) && n > 0) ? n : 50;
        syncMutasiDateUI();
        userCurrentPage = 1;
        renderUserHistoryPage();
    }
    
    async function refreshMutasiManual() {
        const btn = document.getElementById('btnRefreshMutasi');
        const ico = btn ? btn.querySelector('i') : null;
        if (btn) btn.disabled = true;
        if (ico) ico.classList.add('fa-spin');
        try {
            await loadUserHistory();
            if (typeof checkPendingTransactionsStatus === 'function') await checkPendingTransactionsStatus();
            toast('success', 'Mutasi Disegarkan', 'Riwayat mutasi terbaru sudah dimuat');
        } catch (e) {
            toast('error', 'Gagal Memuat', e.message || 'Gagal menyegarkan mutasi');
        } finally {
            if (btn) btn.disabled = false;
            if (ico) ico.classList.remove('fa-spin');
        }
    }
    
    function filterUserHistory() {
        userCurrentPage = 1;
        renderUserHistoryPage();
    }
    
    function resetUserTrxFilter() {
        const sEl = document.getElementById('userTrxSearch');
        const clr = document.getElementById('btnClearUserTrxSearch');
        const srvEl = document.getElementById('userTrxServer');
        const ppEl = document.getElementById('userTrxPerPage');
        if (sEl) sEl.value = '';
        if (clr) clr.style.display = 'none';
        if (srvEl) srvEl.value = '';
        userTrxPerPage = 50;
        if (ppEl) ppEl.value = '50';
        userHistoryStatusFilter = 'all';
        syncMutasiChipsAndPills();
        setMutasiDatePreset('today');
    }
    
    function clearUserTrxDate() {
        setMutasiDatePreset('all');
        toast('info', 'Filter Tanggal Dibuka', 'Menampilkan mutasi dari seluruh tanggal');
    }
    
    function getFilteredUserHistory(opts) {
        const ignoreStatus = !!(opts && opts.ignoreStatusChip);
        const searchVal = (document.getElementById('userTrxSearch') ? document.getElementById('userTrxSearch').value : '').toLowerCase().trim();
        const dateVal = document.getElementById('userTrxDate') ? document.getElementById('userTrxDate').value : '';
        const srvFilter = document.getElementById('userTrxServer') ? document.getElementById('userTrxServer').value : '';
        const nowMs = Date.now();
    
        const list = (rawUserHistory || []).filter(t => {
            const kodeProd = String(t.kode_produk || t.kode || '').toUpperCase().trim();
            if (kodeProd.startsWith('CEK')) return false;
    
            if (searchVal) {
                const ref = String(t.refid_h2h || '').toLowerCase();
                const refp = String(t.refid_pusat || '').toLowerCase();
                const target = String(t.target || '').toLowerCase();
                const kode = String(t.kode_produk || '').toLowerCase();
                const nama = String(t.produk_nama || '').toLowerCase();
                const sn = String(t.sn || '').toLowerCase();
                const msg = String(t.message || '').toLowerCase();
                const usr = String(t.username || '').toLowerCase();
                const hit = ref.includes(searchVal) || refp.includes(searchVal) || target.includes(searchVal) ||
                            kode.includes(searchVal) || nama.includes(searchVal) || sn.includes(searchVal) ||
                            msg.includes(searchVal) || usr.includes(searchVal);
                if (!hit) return false;
            }
    
            if (dateVal && t.created_at) {
                if (!String(t.created_at).startsWith(dateVal)) return false;
            } else if (!dateVal && (userDatePreset === '7d' || userDatePreset === '30d')) {
                const days = (userDatePreset === '7d') ? 7 : 30;
                const ts = Date.parse(String(t.created_at || '').replace(' ', 'T'));
                if (!isNaN(ts) && (nowMs - ts) > (days * 86400000)) return false;
            }
    
            if (srvFilter) {
                const srvInfo = getMutasiServerInfo(t);
                if (srvInfo.key !== srvFilter) return false;
            }
    
            if (!ignoreStatus) {
                const isTop = isMutasiTopup(t);
                const st = String(t.status || '').toUpperCase();
                const isOk = (st === 'BERHASIL' || st === 'SUCCESS');
                const isPend = (st === 'PENDING' || st === 'PROSES');
                const isFail = (st === 'GAGAL' || st === 'FAILED' || st === 'BATAL');
                if (userHistoryStatusFilter === 'produk' && isTop) return false;
                if (userHistoryStatusFilter === 'topup' && !isTop) return false;
                if (userHistoryStatusFilter === 'success' && !isOk) return false;
                if (userHistoryStatusFilter === 'pending' && !isPend) return false;
                if (userHistoryStatusFilter === 'failed' && !isFail) return false;
            }
            return true;
        });
    
        list.sort((a, b) => String(b.created_at || '').localeCompare(String(a.created_at || '')));
        return list;
    }
    
    function exportUserHistoryCSV() {
        const rows = getFilteredUserHistory();
        if (!rows.length) return toast('warn', 'Data Kosong', 'Tidak ada riwayat mutasi yang bisa diekspor');
        downloadFile('mutasi-transaksi-' + Date.now() + '.csv', toCSV(rows, [
            ['created_at', 'waktu'], ['refid_h2h', 'refid_h2h'],
            ['username', 'username'], [r => getMutasiServerInfo(r).label, 'server'], ['kode_produk', 'kode_produk'],
            ['produk_nama', 'produk_nama'], ['target', 'tujuan'], ['harga', 'harga'], ['status', 'status'], ['sn', 'sn'], ['message', 'keterangan']
        ]), 'text/csv');
    }
    
    function changeUserPage(page) {
        userCurrentPage = page;
        renderUserHistoryPage();
        const wrap = document.getElementById('tabHistory');
        if (wrap && typeof wrap.scrollIntoView === 'function') wrap.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
    
    function syncMutasiChipsAndPills() {
        const chips = {
            all: document.getElementById('chipHistAll'),
            produk: document.getElementById('chipHistProduk'),
            topup: document.getElementById('chipHistTopup'),
            success: document.getElementById('chipHistSuccess'),
            pending: document.getElementById('chipHistPending'),
            failed: document.getElementById('chipHistFailed')
        };
        Object.keys(chips).forEach(k => {
            if (chips[k]) chips[k].classList.toggle('active', k === userHistoryStatusFilter);
        });
        const pills = {
            all: document.getElementById('mutStatPillAll'),
            success: document.getElementById('mutStatPillOk'),
            pending: document.getElementById('mutStatPillPend'),
            failed: document.getElementById('mutStatPillFail')
        };
        Object.keys(pills).forEach(k => {
            if (pills[k]) pills[k].classList.toggle('is-active', k === userHistoryStatusFilter);
        });
    }
    
    function filterUserHistoryStatus(status) {
        userHistoryStatusFilter = status || 'all';
        syncMutasiChipsAndPills();
        userCurrentPage = 1;
        renderUserHistoryPage();
    }
    
    function mutasiCopyField(refid, field) {
        const t = (rawUserHistory || []).find(x => String(x.refid_h2h || x.ref_id) === String(refid));
        if (!t) return;
        let val = '';
        let lbl = 'Teks';
        if (field === 'target') { val = t.target || ''; lbl = 'Nomor Tujuan'; }
        else if (field === 'sn') { val = (t.sn && t.sn !== '-' && t.sn !== 'Transaksi Diproses') ? t.sn : (t.message || ''); lbl = 'SN / Token'; }
        else { val = t.refid_h2h || t.ref_id || ''; lbl = 'RefID H2H'; }
        if (!val || val === '-') return toast('warn', 'Kosong', lbl + ' belum tersedia');
        copyToClipboard(String(val), lbl);
    }
    
    async function quickSyncMutasiRow(refid, btnEl) {
        if (!currentUser || !refid) return;
        const t = (rawUserHistory || []).find(x => String(x.refid_h2h || x.ref_id) === String(refid));
        if (!t) return;
        if (!currentUser.api_key) return toast('warn', 'API Key Kosong', 'Akun belum memiliki API Key aktif');
        const ico = btnEl ? btnEl.querySelector('i') : null;
        if (btnEl) btnEl.disabled = true;
        if (ico) ico.classList.add('fa-spin');
        try {
            const srvInfo = getMutasiServerInfo(t);
            let targetApi = ['api1', 'api2', 'api4'].includes(srvInfo.key) ? srvInfo.key : '';
            if (!targetApi) {
                const kp = String(t.kode_produk || '').toUpperCase();
                targetApi = (kp.startsWith('XL') || kp.startsWith('XD') || kp.startsWith('XV') || kp.startsWith('XC') || kp.startsWith('AX') || kp.startsWith('AIGO')) ? 'api1' : 'api4';
            }
            const res = await fetch('api.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-API-KEY': currentUser.api_key },
                body: JSON.stringify({ action: 'status', api: targetApi, refid: refid, api_key: currentUser.api_key })
            });
            const json = await res.json();
            const finalSt = String((json && json.data && json.data.status_trx) || (json && json.trx_status) || '').toUpperCase();
            if (finalSt && finalSt !== 'PENDING' && finalSt !== 'PROSES') {
                t.status = finalSt;
                if (json.data && json.data.sn) t.sn = json.data.sn;
                else if (json.sn) t.sn = json.sn;
                if (json.message) t.message = json.message;
                if (json.data && json.data.sisa_saldo !== undefined) {
                    if (targetApi === 'api2') currentUser.saldo_api2 = json.data.sisa_saldo;
                    else if (targetApi === 'api4') currentUser.saldo_ppob = json.data.sisa_saldo;
                    else currentUser.saldo_akrab = json.data.sisa_saldo;
                    updateBalanceDisplay();
                }
                toast(finalSt === 'BERHASIL' ? 'success' : 'error', 'Status Terupdate', `RefID ${refid}: ${finalSt}`);
                renderUserHistoryPage();
            } else {
                toast('info', 'Masih Diproses', (json && json.message) ? json.message : `Transaksi ${refid} masih berstatus PENDING`);
            }
        } catch (e) {
            toast('error', 'Gagal Cek Status', e.message);
        } finally {
            if (btnEl) btnEl.disabled = false;
            if (ico) ico.classList.remove('fa-spin');
        }
    }
    
    function isSameDayDate(d1, d2) {
        return d1.getFullYear() === d2.getFullYear() && d1.getMonth() === d2.getMonth() && d1.getDate() === d2.getDate();
    }
    
    function getHistDayLabel(dateStr) {
        if (!dateStr || dateStr === '-') return 'Lainnya';
        const d = new Date(dateStr.replace(' ', 'T'));
        if (isNaN(d.getTime())) return 'Tanggal Tidak Valid';
        const now = new Date();
        const yesterday = new Date(Date.now() - 86400000);
        if (isSameDayDate(d, now)) return 'Hari Ini';
        if (isSameDayDate(d, yesterday)) return 'Kemarin';
        const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        return days[d.getDay()] + ', ' + d.getDate() + ' ' + months[d.getMonth()] + ' ' + d.getFullYear();
    }
    
    function renderUserHistoryPage() {
        syncMutasiDateUI();
        syncMutasiChipsAndPills();
        const searchVal = (document.getElementById('userTrxSearch') ? document.getElementById('userTrxSearch').value : '').trim();
        const baseScope = getFilteredUserHistory({ ignoreStatusChip: true });
        const filtered = getFilteredUserHistory();
    
        let hOk = 0, hFail = 0, hPend = 0, hNomOkOut = 0, hNomOkTopup = 0, hNomFiltered = 0;
        baseScope.forEach(t => {
            const st = String(t.status || '').toUpperCase();
            const amt = parseInt(t.harga || 0, 10) || 0;
            const isTop = isMutasiTopup(t);
            if (st === 'BERHASIL' || st === 'SUCCESS') {
                hOk++;
                if (isTop) hNomOkTopup += amt;
                else hNomOkOut += amt;
            } else if (st === 'GAGAL' || st === 'FAILED' || st === 'BATAL') {
                hFail++;
            } else {
                hPend++;
            }
        });
        filtered.forEach(t => { hNomFiltered += (parseInt(t.harga || 0, 10) || 0); });
    
        const hSet = (id, v) => { const el = document.getElementById(id); if (el) el.innerText = v; };
        hSet('histStatTotal', baseScope.length);
        hSet('histStatOk', hOk);
        hSet('histStatFail', hFail);
        hSet('histStatPend', hPend);
        hSet('histStatNominal', fmtRp(hNomFiltered));
        hSet('histStatNominalOk', fmtRp(hNomOkOut));
        hSet('histStatNominalTopup', fmtRp(hNomOkTopup));
    
        const totalItems = filtered.length;
        const totalPages = Math.ceil(totalItems / userTrxPerPage) || 1;
        if (userCurrentPage > totalPages) userCurrentPage = totalPages;
        if (userCurrentPage < 1) userCurrentPage = 1;
    
        const startIdx = (userCurrentPage - 1) * userTrxPerPage;
        const pageItems = filtered.slice(startIdx, startIdx + userTrxPerPage);
    
        const daySummary = {};
        filtered.forEach(t => {
            const lbl = getHistDayLabel(t.created_at);
            if (!daySummary[lbl]) daySummary[lbl] = { count: 0, okNom: 0 };
            daySummary[lbl].count++;
            const st = String(t.status || '').toUpperCase();
            if (st === 'BERHASIL' || st === 'SUCCESS') daySummary[lbl].okNom += (parseInt(t.harga || 0, 10) || 0);
        });
    
        const groups = {};
        pageItems.forEach(t => {
            const lbl = getHistDayLabel(t.created_at);
            (groups[lbl] = groups[lbl] || []).push(t);
        });
    
        const container = document.getElementById('userTrxContainer');
        if (container) {
            if (!pageItems.length) {
                const totalAllHist = (rawUserHistory || []).filter(x => !String(x.kode_produk || '').toUpperCase().startsWith('CEK')).length;
                let quickActs = '';
                if (totalAllHist > 0) {
                    quickActs = `<div style="display:flex; gap:6px; justify-content:center; flex-wrap:wrap; margin-top:10px;">
                        ${userDatePreset !== '7d' ? `<button type="button" class="mut-top-btn" onclick="setMutasiDatePreset('7d')"><i class="fas fa-calendar-week"></i> Lihat 7 Hari</button>` : ''}
                        ${userDatePreset !== 'all' ? `<button type="button" class="mut-top-btn" onclick="setMutasiDatePreset('all')"><i class="fas fa-calendar-days"></i> Semua Tanggal (${totalAllHist})</button>` : ''}
                        ${(searchVal || userHistoryStatusFilter !== 'all') ? `<button type="button" class="mut-top-btn" onclick="resetUserTrxFilter()"><i class="fas fa-undo"></i> Reset Filter</button>` : ''}
                    </div>`;
                }
                container.innerHTML = `<div style="text-align:center; padding:24px 14px; color:#64748b; background:#f8fafc; border:1px dashed #cbd5e1; border-radius:12px;">
                    <i class="fas fa-receipt" style="font-size:22px; opacity:0.4; margin-bottom:6px; display:block;"></i>
                    <div style="font-size:11px; font-weight:700; color:#334155;">Tidak ada mutasi pada filter saat ini</div>
                    ${quickActs}
                </div>`;
            } else {
                let html = '';
                Object.entries(groups).forEach(([dayLabelTxt, items]) => {
                    const ds = daySummary[dayLabelTxt] || { count: items.length, okNom: 0 };
                    html += `<div class="mut-day-grp"><div class="mut-day-hdr"><span>${esc(dayLabelTxt)} (${ds.count})</span><span class="mut-day-sum">Sukses: ${fmtRp(ds.okNom)}</span></div><div class="mut-list">`;
                    items.forEach(t => {
                        const refStr = String(t.refid_h2h || t.ref_id || '-');
                        const isTop = isMutasiTopup(t);
                        const isPayTicket = (isTop || t.kode_produk === 'UPGRADE_BOT' || t.kode_produk === 'AKTIVASI_SELLER' || refStr.startsWith('TP-') || refStr.startsWith('TP1_') || refStr.startsWith('BOT-') || refStr.startsWith('ACT-'));
                        const st = String(t.status || '').toUpperCase();
                        const isSuccess = (st === 'BERHASIL' || st === 'SUCCESS');
                        const isFailed = (st === 'GAGAL' || st === 'FAILED' || st === 'BATAL');
                        const isPending = !isSuccess && !isFailed;
                        const rowCls = isSuccess ? 'st-ok' : (isFailed ? 'st-fail' : 'st-pend');
    
                        let iconClass = 'fa-cart-shopping';
                        let iconBg = 'linear-gradient(135deg,#2563eb,#38bdf8)';
                        const kpUp = String(t.kode_produk || '').toUpperCase();
                        if (isTop) { iconClass = 'fa-wallet'; iconBg = 'linear-gradient(135deg,#10b981,#059669)'; }
                        else if (kpUp.startsWith('PLN')) { iconClass = 'fa-bolt'; iconBg = 'linear-gradient(135deg,#f59e0b,#d97706)'; }
                        else if (kpUp.startsWith('XL') || kpUp.startsWith('XD') || kpUp.startsWith('XV')) { iconClass = 'fa-network-wired'; iconBg = 'linear-gradient(135deg,#002dbb,#0056e0)'; }
    
                        const srvInfo = getMutasiServerInfo(t);
                        const prodTitle = t.produk_nama || t.kode_produk || 'Transaksi Layanan';
                        const timeShort = (t.created_at && String(t.created_at).length >= 16) ? String(t.created_at).slice(11, 16) : (t.created_at || '-');
                        const tgtStr = String(t.target || '').trim();
                        const rawSn = (t.sn && t.sn !== '-' && t.sn !== 'Transaksi Diproses') ? String(t.sn) : '';
                        const rawMsg = (t.message && t.message !== '-' && t.message !== 'Menunggu Pembayaran') ? String(t.message) : '';
    
                        let snLineHtml = '';
                        if (isSuccess && rawSn) {
                            snLineHtml = `<div class="mut-l3"><span class="mut-sn-pill ok" title="${esc(rawSn)}">SN: ${highlight(rawSn, searchVal)}</span><button type="button" class="mut-copy-mini" onclick="event.stopPropagation(); mutasiCopyField(this.closest('.mut-row').getAttribute('data-ref'), 'sn');" title="Salin SN"><i class="fas fa-copy"></i></button></div>`;
                        } else if (isFailed && (rawMsg || rawSn)) {
                            snLineHtml = `<div class="mut-l3"><span class="mut-sn-pill fail" title="${esc(rawMsg || rawSn)}">${highlight(rawMsg || rawSn, searchVal)}</span></div>`;
                        } else if (isPending && (rawSn || rawMsg)) {
                            snLineHtml = `<div class="mut-l3"><span class="mut-sn-pill pend" title="${esc(rawSn || rawMsg)}">${highlight(rawSn || rawMsg, searchVal)}</span></div>`;
                        }
    
                        const priceTxt = isTop ? ('+' + fmtRp(t.harga)) : ('-' + fmtRp(t.harga));
                        const priceCls = isFailed ? 'is-fail' : (isTop ? 'is-in' : 'is-out');
                        const stBadge = isSuccess ? '<span class="mut-st-badge ok">SUKSES</span>' : (isFailed ? '<span class="mut-st-badge fail">GAGAL</span>' : '<span class="mut-st-badge pend">PROSES</span>');
                        const pendingActBtn = isPending
                            ? (isPayTicket
                                ? `<button type="button" class="mut-act-btn is-pay" onclick="event.stopPropagation(); reopenPendingPaymentTicket(this.closest('.mut-row').getAttribute('data-ref'));" title="Buka Pembayaran / QRIS"><i class="fas fa-qrcode"></i></button>`
                                : `<button type="button" class="mut-act-btn is-warn" onclick="event.stopPropagation(); quickSyncMutasiRow(this.closest('.mut-row').getAttribute('data-ref'), this);" title="Cek Status"><i class="fas fa-rotate"></i></button>`)
                            : '';
    
                        html += `<div class="mut-row ${rowCls}" data-ref="${esc(refStr)}" onclick="openTrxDetail(this.getAttribute('data-ref'))">
                          <div class="mut-row-l">
                            <div class="mut-ico" style="background:${iconBg};"><i class="fas ${iconClass}"></i></div>
                            <div class="mut-info">
                              <div class="mut-l1">
                                <span class="mut-prod" title="${esc(prodTitle)}">${highlight(prodTitle, searchVal)}</span>
                                <span class="mut-srv-tag ${srvInfo.cls}">${esc(srvInfo.label)}</span>
                              </div>
                              <div class="mut-l2">
                                ${tgtStr ? `<span class="mut-tgt">${highlight(tgtStr, searchVal)}</span><button type="button" class="mut-copy-mini" onclick="event.stopPropagation(); mutasiCopyField(this.closest('.mut-row').getAttribute('data-ref'), 'target');" title="Salin Tujuan"><i class="fas fa-copy"></i></button><span>&bull;</span>` : ''}
                                <span class="mut-time">${esc(timeShort)}</span>
                                <span>&bull;</span>
                                <span class="mut-ref" title="${esc(refStr)}">${highlight(refStr, searchVal)}</span>
                              </div>
                              ${snLineHtml}
                            </div>
                          </div>
                          <div class="mut-row-r">
                            <div class="mut-price ${priceCls}">${priceTxt}</div>
                            <div class="mut-acts">
                              ${stBadge}
                              ${pendingActBtn}
                              <button type="button" class="mut-act-btn" onclick="event.stopPropagation(); siapkanPrintFromRef(this.closest('.mut-row').getAttribute('data-ref'));" title="Cetak Struk"><i class="fas fa-print"></i></button>
                            </div>
                          </div>
                        </div>`;
                    });
                    html += '</div></div>';
                });
                container.innerHTML = html;
            }
        }
    
        hSet('userTrxCountInfo', `${totalItems} TRX`);
        hSet('userPaginationPageText', `Hal ${userCurrentPage}/${totalPages} · ${totalItems} Data`);
        renderPaginationBtns('userPaginationBtns', userCurrentPage, totalPages, 'changeUserPage');
    }
    function renderPaginationBtns(containerId, currentPage, totalPages, fnNameStr) {
        const container = document.getElementById(containerId);
        if (!container) return;
        let html = '';
    
        const prevDisabled = currentPage <= 1 ? 'disabled style="opacity:0.4; cursor:not-allowed;"' : '';
        html += `<button class="btn btn-outline" ${prevDisabled} onclick="${fnNameStr}(${currentPage - 1})" style="padding:5px 10px; font-size:11px;"><i class="fas fa-chevron-left"></i> Prev</button>`;
    
        let startPage = Math.max(1, currentPage - 2);
        let endPage = Math.min(totalPages, startPage + 4);
        if (endPage - startPage < 4) startPage = Math.max(1, endPage - 4);
    
        for (let i = startPage; i <= endPage; i++) {
            const activeClass = i === currentPage ? 'btn-success' : 'btn-outline';
            html += `<button class="btn ${activeClass}" onclick="${fnNameStr}(${i})" style="padding:5px 10px; font-size:11px;">${i}</button>`;
        }
    
        const nextDisabled = currentPage >= totalPages ? 'disabled style="opacity:0.4; cursor:not-allowed;"' : '';
        html += `<button class="btn btn-outline" ${nextDisabled} onclick="${fnNameStr}(${currentPage + 1})" style="padding:5px 10px; font-size:11px;">Next <i class="fas fa-chevron-right"></i></button>`;
    
        container.innerHTML = html;
    }
    
    let lacakPage = 1;
    let lacakChipAktif = 'all';
    let lacakDebounceTimer = null;
    let lacakDetail = null;
    const LACAK_PER_PAGE = 25;
    
    async function executeCekQuota() {
        const input = document.getElementById('inputCekQuotaMsisdn');
        const btn = document.getElementById('btnSubmitCekQuota');
        const resWrap = document.getElementById('cekQuotaResultWrap');
        const content = document.getElementById('cekQuotaContent');
        const rawMsisdn = (input ? input.value : '').trim().replace(/[^0-9]/g, '');
        if (!rawMsisdn || rawMsisdn.length < 9) {
            toast('warn', 'Nomor Tidak Valid', 'Silakan masukkan nomor XL minimal 10 digit');
            return;
        }
        let msisdn = rawMsisdn;
        if (msisdn.startsWith('62')) msisdn = '0' + msisdn.slice(2);
        if (btn) { btn.disabled = true; btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memeriksa...'; }
        resWrap.style.display = 'block';
        content.innerHTML = '<div style="text-align: center; padding: 25px; color: var(--text-sub);"><i class="fas fa-spinner fa-spin" style="font-size: 24px; color: #002dbb;"></i><br><br>Menghubungkan ke API Sidompul Gateway...</div>';
        try {
            const targetUrl = 'api/cekquota.php';
            const res = await fetch(targetUrl + '?msisdn=' + encodeURIComponent(msisdn) + '&_t=' + Date.now());
            const rawText = await res.text();
            let json = null;
            try { json = JSON.parse(rawText); } catch(parseErr) {}
            if (json) {
                renderCekQuotaSidompul(msisdn, json);
            } else {
                content.innerHTML = '<div class="banner banner-danger"><i class="fas fa-triangle-exclamation"></i> Respon API tidak valid: <pre style="margin-top:6px; max-height:150px;">' + esc(rawText.slice(0, 300)) + '</pre></div>';
            }
        } catch (e) {
            content.innerHTML = '<div class="banner banner-danger"><i class="fas fa-triangle-exclamation"></i> Gagal menghubungi server: ' + esc(e.message) + '</div>';
        } finally {
            if (btn) { btn.disabled = false; btn.innerHTML = '<i class="fas fa-search"></i> Cek Kuota'; }
        }
    }
    function parseRawSidompulText(rawTxt) {
        const cleanTxt = rawTxt.replace(/<br\s*\/?>/gi, '\n');
        const lines = cleanTxt.split('\n').map(l => l.trim()).filter(Boolean);
        let msisdn = '', masaAktif = '', umur = '', dukcapil = '', tipe = '';
        lines.forEach(l => {
            if (l.includes('MSISDN:')) msisdn = l.split('MSISDN:')[1].trim();
            else if (l.includes('Masa Aktif:') && !l.includes('Tenggang')) masaAktif = l.split('Masa Aktif:')[1].trim();
            else if (l.includes('Umur Kartu:')) umur = l.split('Umur Kartu:')[1].trim();
            else if (l.includes('Status Dukcapil:')) dukcapil = l.split('Status Dukcapil:')[1].trim();
            else if (l.includes('Tipe Kartu:')) tipe = l.split('Tipe Kartu:')[1].trim();
        });
    
        const packages = [];
        const rawBlocks = cleanTxt.split(/(?:🎁\s*Quota:|Quota:)/i);
        for (let i = 1; i < rawBlocks.length; i++) {
            const b = rawBlocks[i];
            const bLines = b.split('\n').map(l => l.trim()).filter(Boolean);
            const pkgName = bLines[0] ? bLines[0].replace(/^[\s=:-]+/, '').trim() : 'Paket XL';
            let exp = '-';
            const expMatch = b.match(/(?:Aktif\s*Hingga|Expired)[:\s]+([^\n=]+)/i);
            if (expMatch) exp = expMatch[1].trim();
    
            const benefits = [];
            const benParts = b.split(/(?:🎁\s*Benefit:|Benefit:)/i);
            for (let j = 1; j < benParts.length; j++) {
                const benText = benParts[j];
                const benLines = benText.split('\n').map(l => l.trim()).filter(Boolean);
                const benName = benLines[0] ? benLines[0].replace(/^[\s=:-]+/, '').trim() : 'Benefit Kuota';
                let tipeKuota = 'DATA', total = '-', sisa = '-';
                const tipeMatch = benText.match(/(?:Tipe\s*Kuota)[:\s]+([^\n]+)/i);
                if (tipeMatch) tipeKuota = tipeMatch[1].trim();
                const totMatch = benText.match(/(?:🎁\s*Kuota|Kuota)[:\s]+([^\n]+)/i);
                if (totMatch) total = totMatch[1].trim();
                const sisaMatch = benText.match(/(?:🌲\s*Sisa\s*Kuota|Sisa\s*Kuota)[:\s]+([^\n]+)/i);
                if (sisaMatch) sisa = sisaMatch[1].trim();
    
                benefits.push({ name: benName, type: tipeKuota, total: total, sisa: sisa });
            }
            packages.push({ name: pkgName, expired: exp, benefits: benefits });
        }
        return { msisdn, masaAktif, umur, dukcapil, tipe, packages };
    }
    
    function renderCekQuotaSidompul(msisdn, resData) {
        const content = document.getElementById('cekQuotaContent');
        const root = (resData && resData.data) ? resData.data : resData;
        let parsed = null;
    
        if (root && root.data_sp) {
            const sp = root.data_sp;
            parsed = {
                msisdn: root.msisdn || msisdn,
                masaAktif: (sp.active_period && sp.active_period.value) || '-',
                umur: (sp.active_card && sp.active_card.value) || '-',
                dukcapil: (sp.dukcapil && sp.dukcapil.value) || '-',
                tipe: (sp.prefix && sp.prefix.value) || 'XL',
                packages: []
            };
            const rawQuotas = (sp.quotas && sp.quotas.value) || [];
            rawQuotas.forEach(group => {
                const items = Array.isArray(group) ? group : [group];
                items.forEach(item => {
                    if (!item) return;
                    const pkgObj = item.packages || {};
                    const pkgName = pkgObj.name || 'Paket XL';
                    const expRaw = pkgObj.expDate || '-';
                    const expClean = expRaw.replace('T', ' ');
                    const bList = [];
                    (item.benefits || []).forEach(b => {
                        bList.push({
                            name: b.bname || 'Benefit Kuota',
                            type: b.type || 'DATA',
                            total: b.quota || '-',
                            sisa: b.remaining || '-'
                        });
                    });
                    parsed.packages.push({
                        name: pkgName,
                        expired: expClean,
                        benefits: bList
                    });
                });
            });
        } else {
            let txt = '';
            if (typeof resData === 'string') txt = resData;
            else if (root && typeof root.hasil === 'string') txt = root.hasil;
            else if (root && typeof root.data === 'string') txt = root.data;
            else if (root && typeof root.result === 'string') txt = root.result;
            else if (root && typeof root.message === 'string') txt = root.message;
            if (txt && (txt.includes('Quota:') || txt.includes('MSISDN:'))) {
                parsed = parseRawSidompulText(txt);
            }
        }
    
        if (parsed) {
            const numShow = parsed.msisdn || msisdn;
            let metaHtml = '<div style="background: #eff6ff; border: 1.5px solid #bfdbfe; border-radius: 14px; padding: 14px; margin-bottom: 14px;">' +
                '<div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 8px; margin-bottom: 10px;">' +
                    '<div><span style="font-size: 11px; color: var(--text-sub);">Nomor XL Terverifikasi:</span><b style="display: block; font-size: 16px; color: #002dbb; font-family: monospace;">' + esc(numShow) + '</b></div>' +
                    '<span class="badge badge-success"><i class="fas fa-circle-check"></i> AKTIF s.d ' + esc(parsed.masaAktif || '-') + '</span>' +
                '</div>' +
                '<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(130px, 1fr)); gap: 8px; font-size: 11px; border-top: 1px dashed #bfdbfe; padding-top: 8px;">' +
                    (parsed.tipe ? '<div><span style="color:var(--text-sub);">Tipe:</span> <b>' + esc(parsed.tipe) + '</b></div>' : '') +
                    (parsed.umur ? '<div><span style="color:var(--text-sub);">Umur Kartu:</span> <b>' + esc(parsed.umur) + '</b></div>' : '') +
                    (parsed.dukcapil ? '<div><span style="color:var(--text-sub);">Dukcapil:</span> <b>' + esc(parsed.dukcapil) + '</b></div>' : '') +
                '</div>' +
            '</div>';
    
            let pkgsHtml = '';
            if (parsed.packages && parsed.packages.length > 0) {
                parsed.packages.forEach(pkg => {
                    pkgsHtml += '<div class="myxl-quota-card" style="margin-bottom: 16px;">' +
                        '<div class="myxl-card-pill">' + esc(pkg.name) + '</div>' +
                        '<div style="padding-top: 14px;">' +
                            '<div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 6px; margin-bottom: 10px;">' +
                                '<div style="font-size: 15px; font-weight: 800; color: #0f172a;"><i class="fas fa-gift" style="color: #002dbb; margin-right: 6px;"></i> ' + esc(pkg.name) + '</div>' +
                                '<span class="badge badge-cyan" style="font-size:10px;"><i class="fas fa-clock"></i> s.d ' + esc(pkg.expired) + '</span>' +
                            '</div>';
    
                    if (pkg.benefits && pkg.benefits.length > 0) {
                        pkg.benefits.forEach(ben => {
                            let percent = 100;
                            const numSisa = parseFloat(String(ben.sisa).replace(/[^0-9.]/g, ''));
                            const numTotal = parseFloat(String(ben.total).replace(/[^0-9.]/g, ''));
                            if (numSisa && numTotal && numTotal > 0) percent = Math.min(100, Math.max(0, Math.round((numSisa / numTotal) * 100)));
                            const isVoiceSms = (ben.type === 'VOICE' || ben.type === 'SMS');
                            const iconBen = ben.type === 'VOICE' ? 'fa-phone-volume' : (ben.type === 'SMS' ? 'fa-comment-dots' : 'fa-wifi');
                            const colorPill = ben.type === 'VOICE' ? '#d97706' : (ben.type === 'SMS' ? '#7c3aed' : '#002dbb');
    
                            pkgsHtml += '<div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 10px 14px; margin-top: 8px;">' +
                                '<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 4px;">' +
                                    '<span style="font-size: 12px; font-weight: 700; color: #1e293b;"><i class="fas ' + iconBen + '" style="color:' + colorPill + '; margin-right: 5px;"></i> ' + esc(ben.name) + '</span>' +
                                    '<span class="badge" style="background:#e2e8f0; color:#334155; font-size:9px;">' + esc(ben.type) + '</span>' +
                                '</div>' +
                                '<div style="display: flex; justify-content: space-between; font-size: 11px; margin-top: 4px;">' +
                                    '<span>Sisa: <b style="color:' + colorPill + '; font-size: 12px;">' + esc(String(ben.sisa)) + '</b></span>' +
                                    '<span style="color: var(--text-sub);">Total: ' + esc(String(ben.total)) + '</span>' +
                                '</div>' +
                                (!isVoiceSms ? '<div class="myxl-progress-bar" style="margin: 6px 0 2px 0;"><div class="myxl-progress-fill" style="width: ' + percent + '%;"></div></div>' : '') +
                            '</div>';
                        });
                    } else {
                        pkgsHtml += '<div style="font-size: 11px; color: var(--text-sub); margin-top: 6px;">Tidak ada rincian sub-kuota terlampir.</div>';
                    }
                    pkgsHtml += '</div></div>';
                });
            } else {
                pkgsHtml = '<div class="banner banner-info">Tidak ada paket aktif yang ditemukan pada nomor ini.</div>';
            }
            content.innerHTML = metaHtml + pkgsHtml;
            return;
        }
    
        content.innerHTML = '<div class="myxl-quota-card"><div class="myxl-card-pill">Info Kuota</div><div style="padding-top: 14px;"><div style="font-size: 13px; color: var(--text-sub); margin-bottom: 8px;">Format respon tidak dikenali. Respon mentah:</div><pre style="margin:0; font-size:11px; max-height:220px; overflow-y:auto;">' + esc(JSON.stringify(resData, null, 2)) + '</pre></div></div>';
    }
    
    
    function lacakIsTopup(t) {
      return (t.server_code === 'TOPUP SALDO' || t.kode_produk === 'SALDO' || String(t.refid_h2h || '').indexOf('TP-') === 0);
    }
    
    function lacakDetectMode(q) {
      const s = String(q || '').trim();
      if (!s) return 'semua';
      if (/^\d{8}\d*$/.test(s)) return 'target';
      if (/^(sn|serial)[-_ ]?\w/i.test(s) || /^(sn[-_]?|serial)/i.test(s)) return 'sn';
      if (/^[A-Za-z]{2,4}-\d/i.test(s)) return 'refid';
      if (/^(trx|tp-|lg-|ics-|ok-|s3-|inq-|px)/i.test(s)) return 'refid';
      if (/^[A-Za-z0-9]{2,14}$/.test(s) && /\d/.test(s) && !/^\d+$/.test(s)) return 'produk';
      if (/^[A-Za-z_][A-Za-z0-9_.]{2}[A-Za-z0-9_.]*$/.test(s) && !/\d/.test(s)) return 'username';
      return 'semua';
    }
    
    function lacakModeLabel(mode) {
      return ({ refid: 'RefID H2H / Pusat', target: 'Nomor Tujuan', produk: 'Kode / Nama Produk', sn: 'SN / Serial Number', username: 'Username', semua: 'Semua Kolom' })[mode] || 'Semua Kolom';
    }
    
    function lacakOnInput() {
      if (lacakDebounceTimer) clearTimeout(lacakDebounceTimer);
      lacakDebounceTimer = setTimeout(() => { lacakPage = 1; renderLacak(); }, 220);
    }
    
    function lacakChip(jenis) {
      lacakChipAktif = (lacakChipAktif === jenis) ? 'all' : jenis;
      const chips = document.querySelectorAll('#lacakChips .chip');
      chips.forEach(c => { if (c.classList) c.classList.toggle('active', c.getAttribute('data-chip') === lacakChipAktif); });
      lacakPage = 1;
      renderLacak();
    }
    
    function lacakChipMatch(t) {
      switch (lacakChipAktif) {
        case 'all': return true;
        case 'today': return String(t.created_at || '').slice(0, 10) === getTodayWIB();
        case '7d':
        case '30d': {
          const hari = lacakChipAktif === '7d' ? 7 : 30;
          const ts = Date.parse(String(t.created_at || '').replace(' ', 'T'));
          if (isNaN(ts)) return false;
          return (Date.now() - ts) <= hari * 86400000;
        }
        case 'berhasil': return String(t.status || '').toUpperCase() === 'BERHASIL';
        case 'gagal': return String(t.status || '').toUpperCase() === 'GAGAL';
        case 'pending': return String(t.status || '').toUpperCase() === 'PENDING';
        case 'topup': return lacakIsTopup(t);
      }
      return true;
    }
    
    function lacakVal(id) { const el = document.getElementById(id); return el ? String(el.value || '').trim() : ''; }
    
    function lacakServerKey(t) { return String(t.server_code || t.server || '').toLowerCase(); }
    
    function lacakTerapkan(qLow, mode, q) {
      const stF = lacakVal('lacakStatus');
      const svF = lacakVal('lacakServer');
      const d1 = lacakVal('lacakDateFrom');
      const d2 = lacakVal('lacakDateTo');
      const hMin = parseInt(lacakVal('lacakHargaMin') || '0', 10) || 0;
      const hMax = parseInt(lacakVal('lacakHargaMax') || '0', 10) || 0;
    
      const list = (typeof rawUserHistory !== 'undefined' ? rawUserHistory : []).filter(t => {
        if (qLow) {
          const ref = String(t.refid_h2h || '').toLowerCase();
          const refp = String(t.refid_pusat || '').toLowerCase();
          const tgt = String(t.target || '').toLowerCase();
          const kode = String(t.kode_produk || '').toLowerCase();
          const nama = String(t.produk_nama || '').toLowerCase();
          const sn = String(t.sn || '').toLowerCase();
          const usr = String(t.username || '').toLowerCase();
          const msg = String(t.message || '').toLowerCase();
          let ok = false;
          if (mode === 'refid') ok = ref.indexOf(qLow) >= 0 || refp.indexOf(qLow) >= 0;
          else if (mode === 'target') ok = tgt.replace(/\D/g, '').indexOf(q.replace(/\D/g, '')) >= 0 && q.replace(/\D/g, '') !== '';
          else if (mode === 'produk') ok = kode.indexOf(qLow) >= 0 || nama.indexOf(qLow) >= 0;
          else if (mode === 'sn') ok = sn.indexOf(qLow) >= 0;
          else if (mode === 'username') ok = usr.indexOf(qLow) >= 0;
          else ok = (ref + ' ' + refp + ' ' + tgt + ' ' + kode + ' ' + nama + ' ' + sn + ' ' + usr + ' ' + msg).indexOf(qLow) >= 0;
          if (!ok) return false;
        }
        if (stF && String(t.status || '').toUpperCase() !== stF) return false;
        if (svF) {
          const key = lacakServerKey(t);
          if (svF === 'TOPUP') { if (key.indexOf('topup') < 0 && String(t.kode_produk || '').toUpperCase() !== 'SALDO') return false; }
          else if (key.indexOf(svF.toLowerCase()) < 0) return false;
        }
        const tgl = String(t.created_at || '').slice(0, 10);
        if (d1 && tgl && tgl < d1) return false;
        if (d2 && tgl && tgl > d2) return false;
        const hr = parseInt(t.harga || 0, 10) || 0;
        if (hMin > 0 && hr < hMin) return false;
        if (hMax > 0 && hr > hMax) return false;
        if (!lacakChipMatch(t)) return false;
        return true;
      });
    
      list.sort((a, b) => String(b.created_at || '').localeCompare(String(a.created_at || '')));
      return list;
    }
    
    function lacakFiltered() {
      const q = lacakVal('lacakSearch');
      const qLow = q.toLowerCase();
      const modeInput = lacakVal('lacakMode') || 'auto';
      const otomatis = (modeInput === 'auto');
      let mode = otomatis ? lacakDetectMode(q) : modeInput;
    
      let list = lacakTerapkan(qLow, mode, q);
     if (otomatis && qLow && list.length === 0 && mode !== 'semua') {
        mode = 'semua';
        list = lacakTerapkan(qLow, mode, q);
      }
    
      return { list: list, mode: mode, q: q };
    }
    
    function renderLacak() {
      if (!document.getElementById('lacakTableBody')) return;
      const hasil = lacakFiltered();
      const list = hasil.list;
      const q = hasil.q;
      const detEl = document.getElementById('lacakDeteksi');
      if (detEl) {
        if (!q) detEl.style.display = 'none';
        else {
          detEl.style.display = 'flex';
          detEl.innerHTML = '<i class="fas fa-wand-magic-sparkles"></i><div style="flex:1;">Kata kunci <b>' + esc(q) +
            '</b> dikenali sebagai pencarian <b>' + esc(lacakModeLabel(hasil.mode)) + '</b>. Ditemukan <b>' + list.length + '</b> transaksi cocok.</div>';
        }
      }
      let ok = 0, gagal = 0, pending = 0, nominal = 0;
      list.forEach(t => {
        const st = String(t.status || '').toUpperCase();
        if (st === 'BERHASIL') ok++; else if (st === 'GAGAL') gagal++; else if (st === 'PENDING') pending++;
        nominal += (parseInt(t.harga || 0, 10) || 0);
      });
      const setTxt = (id, v) => { const el = document.getElementById(id); if (el) el.innerText = v; };
      setTxt('lacakStatTotal', list.length);
      setTxt('lacakStatOk', ok);
      setTxt('lacakStatFail', gagal);
      setTxt('lacakStatPend', pending);
      setTxt('lacakStatNominal', fmtRp(nominal));
    
      const totalPages = Math.max(1, Math.ceil(list.length / LACAK_PER_PAGE));
      if (lacakPage > totalPages) lacakPage = totalPages;
      if (lacakPage < 1) lacakPage = 1;
      const start = (lacakPage - 1) * LACAK_PER_PAGE;
      const page = list.slice(start, start + LACAK_PER_PAGE);
    
      const tbl = document.getElementById('lacakTableBody');
      if (!list.length) {
        tbl.innerHTML = '<tr><td colspan="8"><div class="empty"><i class="fas fa-magnifying-glass"></i>' +
          (q ? 'Tidak ada transaksi yang cocok dengan "' + esc(q) + '"' : 'Ketik kata kunci di atas untuk mulai melacak transaksi') + '</div></td></tr>';
      } else {
        tbl.innerHTML = page.map(t => {
          const ket = (String(t.status).toUpperCase() === 'GAGAL' || !t.sn || t.sn === '-' || t.sn === 'Transaksi Diproses') ? (t.message || t.sn || '-') : t.sn;
          const isTop = lacakIsTopup(t);
          return '<tr>' +
            '<td><small>' + esc(t.created_at || '-') + '</small></td>' +
            '<td><code class="mono" style="color:#38bdf8; font-size:10px;">' + highlight(t.refid_h2h || '-', q) + '</code></td>' +
            '<td>' + (isTop ? '<span class="badge badge-cyan">TOPUP</span>' : ((t.is_dedicated || t.is_personal_khfy || (t.server_name && t.server_name.includes('Dedicated')) || (t.server && String(t.server).includes('Dedicated'))) ? '<span class="badge badge-cyan" title="Diproses via Akun Pribadi Mitra"><i class="fas fa-server"></i> Dedicated</span>' : ((t.server_code === 'api1' || t.server === 'api1' || t.server === 'api1.php' || t.server === 'api1v2.php') ? '<span class="badge badge-user" title="Diproses via Pool Enterprise"><i class="fas fa-bolt"></i> Enterprise</span>' : '<span class="badge badge-user">' + esc(t.server_code || t.server || '-') + '</span>'))) + '</td>' +
            '<td><b>' + highlight(t.kode_produk || '-', q) + '</b>' + (isTop ? '' : ' / ' + highlight(t.target || '-', q)) + '</td>' +
            '<td>' + (isTop ? '<span class="text-success">' : '') + fmtRp(t.harga) + (isTop ? '</span>' : '') + '</td>' +
            '<td>' + statusBadge(t.status) + '</td>' +
            '<td><small>' + highlight(ket, q) + '</small></td>' +
            '<td style="white-space:nowrap;">' +
              '<button class="btn btn-outline btn-sm" title="Lihat detail" onclick="openTrxDetail(\'' + esc(String(t.refid_h2h || '').replace(/'/g, "\\'")) + '\')"><i class="fas fa-eye"></i></button> ' +
              '<button class="btn btn-outline btn-sm" title="Salin RefID" onclick="copyToClipboard(\'' + esc(String(t.refid_h2h || '').replace(/'/g, "\\'")) + '\', \'RefID H2H\')"><i class="fas fa-copy"></i></button> ' +
              '<button class="btn btn-purple btn-sm" title="Cek status ke server" onclick="lacakCekServer(\'' + esc(String(t.refid_h2h || '').replace(/'/g, "\\'")) + '\')"><i class="fas fa-satellite-dish"></i></button>' +
            '</td></tr>';
        }).join('');
      }
    
      const ci = document.getElementById('lacakCountInfo');
      if (ci) ci.innerText = list.length ? ('Menampilkan ' + (start + 1) + '-' + Math.min(start + LACAK_PER_PAGE, list.length) + ' dari ' + list.length + ' hasil (total riwayat ' + ((typeof rawUserHistory !== 'undefined' ? rawUserHistory.length : 0)) + ')') : 'Tidak ada hasil';
      const si = document.getElementById('lacakSearchInfo');
      if (si) si.innerHTML = q ? ('Mode: <b>' + esc(lacakModeLabel(hasil.mode)) + '</b>') : '';
    
      if (typeof renderPaginationBtns === 'function') renderPaginationBtns('lacakPagination', lacakPage, totalPages, 'lacakGoPage');
    }
    
    function lacakGoPage(p) { lacakPage = p; renderLacak(); }
    
    function lacakReset() {
      ['lacakSearch', 'lacakStatus', 'lacakServer', 'lacakDateFrom', 'lacakDateTo', 'lacakHargaMin', 'lacakHargaMax'].forEach(id => {
        const el = document.getElementById(id); if (el) el.value = '';
      });
      const m = document.getElementById('lacakMode'); if (m) m.value = 'auto';
      lacakChipAktif = 'all';
      document.querySelectorAll('#lacakChips .chip').forEach(c => { if (c.classList) c.classList.toggle('active', c.getAttribute('data-chip') === 'all'); });
      lacakPage = 1;
      renderLacak();
      toast('info', 'Filter Dibersihkan', 'Semua filter pencarian dikembalikan ke awal');
    }
    
    async function lacakRefresh() {
      if (typeof loadUserHistory === 'function') await loadUserHistory();
      renderLacak();
      toast('success', 'Data Disegarkan', 'Riwayat transaksi terbaru sudah dimuat ulang');
    }
    
    function lacakExportCSV() {
      const hasil = lacakFiltered();
      if (!hasil.list.length) return toast('warn', 'Data Kosong', 'Tidak ada hasil pencarian yang bisa diekspor');
      downloadFile('lacak-transaksi-' + Date.now() + '.csv', toCSV(hasil.list, [
        ['created_at', 'waktu'], ['refid_h2h', 'refid_h2h'],
        ['username', 'username'], ['server_code', 'server'], ['kode_produk', 'kode_produk'],
        ['target', 'tujuan'], ['harga', 'harga'], ['status', 'status'], ['sn', 'sn'], ['message', 'keterangan']
      ]), 'text/csv');
    }
    function lacakNormalize(server, data) {
      const d = (data && data.data && typeof data.data === 'object') ? data.data : {};
      let st = String(d.status_trx || data.trx_status || data.status_trx || '').toUpperCase();
      if (!st) st = (data && data.status) ? 'PENDING' : 'GAGAL';
      return {
        server: server,
        ditemukan: !!(data && data.status),
        status: st,
        refid: d.ref_id || d.refid || data.refid || '',
        kode: d.kode || d.kode_produk || '',
        tujuan: d.tujuan || d.target || '',
        harga: d.harga || '',
        sn: d.sn || data.sn || '-',
        pesan: data.message || d.keterangan || d.message || '-',
        raw: data
      };
    }
    
    async function lacakCekServer(refidPrefill) {
      const refEl = document.getElementById('lacakRefIdCek');
      const ref = String((refidPrefill !== undefined && refidPrefill !== null ? refidPrefill : (refEl ? refEl.value : '')) || '').trim();
      if (!ref) { toast('warn', 'RefID Kosong', 'Masukkan RefID transaksi yang ingin dicek'); if (refEl) refEl.focus(); return; }
      if (refEl) refEl.value = ref;
    
      const hasilEl = document.getElementById('lacakCekHasil');
      const jsonEl = document.getElementById('lacakCekJson');
      const ringEl = document.getElementById('lacakCekRingkasan');
      const stEl = document.getElementById('lacakCekStatus');
      const btn = document.getElementById('btnLacakCek');
    
      const sel = document.getElementById('lacakServerCek');
      const target = (sel && sel.value && sel.value !== 'ALL') ? [sel.value.replace('.php', '')] : ['api1', 'api2', 'api4'];
    
      if (hasilEl) hasilEl.style.display = 'block';
      if (stEl) stEl.innerText = 'STATUS: MENGIRIM...';
      if (jsonEl) jsonEl.innerText = '// Mengirim permintaan ke ' + target.join(', ') + ' ...';
      if (ringEl) ringEl.innerHTML = '';
      if (btn) { btn.disabled = true; btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengecek...'; }
    
      let ketemu = null;
      const semua = [];
      for (const srv of target) {
        try {
          const res = await fetch('api.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-API-KEY': currentUser.api_key },
            body: JSON.stringify({ action: 'status', api: srv.replace('.php', ''), refid: ref, api_key: currentUser.api_key })
          });
          const data = await res.json();
          const norm = lacakNormalize(srv, data);
          semua.push(norm);
          if (norm.ditemukan) { ketemu = norm; break; }
        } catch (e) {
          semua.push({ server: srv, ditemukan: false, status: 'ERROR', pesan: e.message, raw: { error: e.message } });
        }
      }
    
      if (btn) { btn.disabled = false; btn.innerHTML = '<i class="fas fa-paper-plane"></i> Cek Sekarang'; }
    
      if (ketemu) {
        if (stEl) stEl.innerText = 'STATUS: DITEMUKAN DI ' + ketemu.server.toUpperCase();
        const warna = ketemu.status === 'BERHASIL' ? 'banner-ok' : (ketemu.status === 'GAGAL' ? 'banner-danger' : 'banner-warn');
        if (ringEl) {
          ringEl.innerHTML =
            '<div class="banner ' + warna + '" style="margin-bottom:0;">' +
              '<i class="fas fa-circle-info" style="font-size:16px;"></i>' +
              '<div style="flex:1;">RefID <b class="mono">' + esc(ketemu.refid || ref) + '</b> ditemukan di <b>' + esc(ketemu.server) + '</b> — status: ' + statusBadge(ketemu.status) + '</div>' +
            '</div>' +
            '<div class="kv-grid" style="margin-top:12px;">' +
              '<div class="k">Server</div><div class="v">' + esc(ketemu.server) + '</div>' +
              (ketemu.kode ? '<div class="k">Produk</div><div class="v">' + esc(ketemu.kode) + '</div>' : '') +
              (ketemu.tujuan ? '<div class="k">Tujuan</div><div class="v mono">' + esc(ketemu.tujuan) + '</div>' : '') +
              (ketemu.harga !== '' && ketemu.harga !== null ? '<div class="k">Harga</div><div class="v">' + fmtRp(ketemu.harga) + '</div>' : '') +
              '<div class="k">SN / Token</div><div class="v mono">' + esc(ketemu.sn || '-') + '</div>' +
              '<div class="k">Keterangan</div><div class="v">' + esc(ketemu.pesan || '-') + '</div>' +
            '</div>';
        }
        if (jsonEl) jsonEl.innerText = JSON.stringify(ketemu.raw, null, 2);
        toast('success', 'Transaksi Ditemukan', ketemu.server + ' — status ' + ketemu.status);
      } else {
        if (stEl) stEl.innerText = 'STATUS: TIDAK DITEMUKAN';
        if (ringEl) {
          ringEl.innerHTML = '<div class="banner banner-danger" style="margin-bottom:0;"><i class="fas fa-triangle-exclamation" style="font-size:16px;"></i>' +
            '<div style="flex:1;">RefID <b class="mono">' + esc(ref) + '</b> tidak ditemukan di server yang dicoba (' + esc(target.join(', ')) + ').' +
            ' Pastikan RefID sudah benar, atau transaksi memang belum tercatat di sistem kami.</div></div>';
        }
        if (jsonEl) jsonEl.innerText = JSON.stringify(semua.map(x => ({ server: x.server, status: x.status, pesan: x.pesan })), null, 2);
        toast('error', 'Tidak Ditemukan', 'RefID ' + ref + ' tidak ada pada server yang dicek');
      }
    }
    
    function lacakCekCopy() {
      const el = document.getElementById('lacakCekJson');
      if (!el || !el.innerText) return toast('warn', 'Belum Ada Data', 'Jalankan pengecekan terlebih dahulu');
      copyToClipboard(el.innerText, 'Respons server');
    }
    
    function openTrxDetail(refid) {
      const t = (typeof rawUserHistory !== 'undefined' ? rawUserHistory : []).find(x => String(x.refid_h2h) === String(refid));
      if (!t) return toast('error', 'Tidak Ditemukan', 'Transaksi dengan RefID tersebut tidak ada di riwayat');
      lacakDetail = t;
      const body = document.getElementById('trxDetailBody');
      const isTop = (t.server_code === 'TOPUP SALDO' || t.server_code === 'dedicated_topup.php' || t.kode_produk === 'SALDO' || t.kode_produk === 'TOPUP_DEDICATED' || String(t.refid_h2h || '').startsWith('TP-') || String(t.refid_h2h || '').startsWith('TP1_'));
      const stUpper = String(t.status || '').toUpperCase();
      const isSuccess = (stUpper === 'BERHASIL' || stUpper === 'SUCCESS');
      const isFailed = (stUpper === 'GAGAL' || stUpper === 'FAILED');
      const isPending = !isSuccess && !isFailed;
    
      let statusIconBg = '#ecfdf5';
      let statusIconBorder = '#a7f3d0';
      let statusIconColor = '#059669';
      let statusIconClass = 'fa-circle-check';
      let statusTitle = 'Transaksi Berhasil!';
      let statusPillHtml = '<span class="badge badge-success" style="font-size:10px; padding:3px 10px;"><i class="fas fa-circle-check"></i> BERHASIL</span>';
    
      if (isPending) {
        statusIconBg = '#fffbeb';
        statusIconBorder = '#fde68a';
        statusIconColor = '#d97706';
        statusIconClass = 'fa-clock';
        statusTitle = 'Menunggu Pembayaran / Diproses';
        statusPillHtml = '<span class="badge badge-pending" style="font-size:10px; padding:3px 10px;"><i class="fas fa-hourglass-half"></i> DIPROSES</span>';
      } else if (isFailed) {
        statusIconBg = '#fef2f2';
        statusIconBorder = '#fecaca';
        statusIconColor = '#dc2626';
        statusIconClass = 'fa-circle-xmark';
        statusTitle = 'Transaksi Gagal';
        statusPillHtml = '<span class="badge badge-fail" style="font-size:10px; padding:3px 10px;"><i class="fas fa-circle-xmark"></i> GAGAL</span>';
      }
      let snVal = String(t.sn || t.message || '').trim();
      let parsedDetailHtml = '';
      let isPlnParsed = false;
      if (snVal && (String(t.kode_produk).toUpperCase().startsWith('PLN') || snVal.includes('/'))) {
        const parts = snVal.split('/');
        if (parts.length >= 4) {
          const tokenNum = parts[0].replace(/[^0-9-]/g, '').trim();
          const namaPln = parts[1] || '-';
          const katPln = parts[2] || '-';
          const voltPln = parts[3] || '-';
          const kwhPln = parts[4] ? parts[4].replace(/\.$/, '') : '-';
          parsedDetailHtml = `
          <div style="margin-top: 12px; padding: 12px; background: #fffbeb; border: 1.5px solid #fde68a; border-radius: 14px; text-align: left;">
            <div style="font-size: 10px; font-weight: 800; color: #b45309; text-transform: uppercase; margin-bottom: 6px;"><i class="fas fa-bolt"></i> DETAIL TOKEN LISTRIK PLN</div>
            <div style="display: flex; justify-content: space-between; align-items: center; background: #fef3c7; border: 1px solid #fcd34d; padding: 8px 10px; border-radius: 10px; margin-bottom: 8px;">
              <div>
                <small style="font-size: 8.5px; font-weight: 800; color: #92400e; text-transform: uppercase;">TOKEN PLN</small>
                <div style="font-size: 16px; font-weight: 900; color: #b45309; font-family: monospace; letter-spacing: 1.5px;">${esc(tokenNum)}</div>
              </div>
              <button type="button" class="btn btn-outline btn-sm" style="padding: 4px 9px; font-size: 10.5px; border-color: #f59e0b; color: #b45309; background: #ffffff !important;" onclick="copyToClipboard('${esc(tokenNum.replace(/-/g, ''))}', 'Token PLN')"><i class="fas fa-copy"></i> Salin Token</button>
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 4px; font-size: 10px;">
              <div><span style="color:#64748b;">Nama:</span> <b style="color:#0f172a;">${esc(namaPln)}</b></div>
              <div><span style="color:#64748b;">Kategori:</span> <b style="color:#0f172a;">${esc(katPln)}</b></div>
              <div><span style="color:#64748b;">Volt:</span> <b style="color:#0f172a;">${esc(voltPln)}</b></div>
              <div><span style="color:#64748b;">Kwh:</span> <b style="color:#0f172a;">${esc(kwhPln)}</b></div>
            </div>
          </div>`;
          isPlnParsed = true;
        }
      }
    
      if (!isPlnParsed && (t.sn || t.message)) {
        const cleanSn = (t.sn && t.sn !== '-' && t.sn !== 'Transaksi Diproses') ? t.sn : (t.message || '-');
        parsedDetailHtml = `
        <div style="margin-top: 12px; padding: 12px; background: #eff6ff; border: 1.5px solid #bfdbfe; border-radius: 14px; text-align: left;">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 4px;">
            <span style="font-size: 10px; font-weight: 800; color: #0284c7; text-transform: uppercase;"><i class="fas fa-shield-halved"></i> SN / KETERANGAN PUSAT</span>
            <button type="button" class="btn btn-outline btn-sm" style="padding: 3px 8px; font-size: 10px;" onclick="copyToClipboard('${esc(cleanSn)}', 'SN/Keterangan')"><i class="fas fa-copy"></i> Salin</button>
          </div>
          <div class="mono" style="font-size: 11.5px; font-weight: 700; color: #0f172a; word-break: break-all;">${esc(cleanSn)}</div>
        </div>`;
      }
    
      if (body) {
        body.innerHTML = `
        <div style="text-align: center; padding: 10px 0 16px 0;">
          <div style="width: 64px; height: 64px; border-radius: 50%; background: ${statusIconBg}; border: 2.5px solid ${statusIconBorder}; color: ${statusIconColor}; display: flex; align-items: center; justify-content: center; font-size: 28px; margin: 0 auto 10px auto; box-shadow: 0 4px 15px rgba(0,0,0,0.06);">
            <i class="fas ${statusIconClass}"></i>
          </div>
          <h3 style="font-size: 16px; font-weight: 800; color: #0f172a; margin-bottom: 2px;">${statusTitle}</h3>
          <div class="mono" style="font-size: 24px; font-weight: 900; color: #002dbb; margin: 6px 0;">${fmtRp(t.harga)}</div>
          <div style="font-size: 11px; font-weight: 600; color: #64748b;">${esc(t.created_at || '-')} WIB</div>
        </div>
    
        <div style="background: #f8fafc; border: 1.5px solid #d2e0f5; border-radius: 16px; padding: 14px; text-align: left;">
          <div style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding-bottom: 10px; border-bottom: 1.5px dashed #bfdbfe; margin-bottom: 10px;">
            <div>
              <div style="font-size: 13.5px; font-weight: 800; color: #0f172a;">${esc(t.produk_nama || t.kode_produk || 'Transaksi Layanan')}</div>
                              <small style="font-size: 10.5px; color: #64748b; font-weight: 600;">Server: <b>${(t.is_dedicated || t.is_personal_khfy || (t.server_name && t.server_name.includes('Dedicated')) || (t.server && String(t.server).includes('Dedicated'))) ? '<span class="badge badge-cyan" style="font-size:9px;"><i class="fas fa-server"></i> Server 1 Dedicated Route (Akun Pribadi)</span>' : ((t.server_code === 'api1' || t.server === 'api1' || t.server === 'api1.php' || t.server === 'api1v2.php') ? '<span class="badge badge-user" style="font-size:9px;"><i class="fas fa-bolt"></i> Server 1 Enterprise Route</span>' : esc(t.server_name || t.server_code || t.server || 'H2H'))}</b></small>
            </div>
            ${statusPillHtml}
          </div>
          <div class="kv-grid" style="grid-template-columns: 120px 1fr; row-gap: 6px; font-size: 11px;">
            <div class="k">Nomor Tujuan</div><div class="v mono" style="font-weight: 800; color: #002dbb;">${esc(t.target || '-')}</div>
            <div class="k">Metode Bayar</div><div class="v">${isTop ? 'Topup Saldo' : 'Saldo Akun H2H'}</div>
            <div class="k">RefID H2H</div><div class="v mono" style="color: #0284c7; font-weight: 700;">${esc(t.refid_h2h || '-')}</div>
            <div class="k">Kode Produk</div><div class="v mono">${esc(t.kode_produk || '-')}</div>
          </div>
          ${parsedDetailHtml}
          <div style="border-top: 1.5px dashed #bfdbfe; margin-top: 12px; padding-top: 10px; display: flex; flex-direction: column; gap: 4px; font-size: 11px;">
            <div style="display: flex; justify-content: space-between;"><span style="color: #64748b;">Harga Produk</span><b>${fmtRp(t.harga)}</b></div>
            <div style="display: flex; justify-content: space-between;"><span style="color: #64748b;">Biaya Admin</span><b style="color: #059669;">Gratis</b></div>
            <div style="display: flex; justify-content: space-between; font-size: 12px; font-weight: 900; margin-top: 4px; border-top: 1px solid #e2e8f0; padding-top: 6px;"><span style="color: #0f172a;">Total Bayar (Struk)</span><span style="color: #002dbb;">${fmtRp(t.harga)}</span></div>
          </div>
        </div>
    
        <div style="margin-top: 14px; display: flex; flex-direction: column; gap: 8px;">
          ${(isPending && (t.kode_produk === 'TOPUP_DEDICATED' || String(t.refid_h2h).startsWith('TP1_'))) ? `<button type="button" class="btn btn-primary btn-block" style="font-size: 12px; font-weight: 800; padding: 11px; box-shadow: 0 4px 14px rgba(0, 45, 187, 0.28);" onclick="openDedicatedTopupModal()"><i class="fas fa-receipt"></i> Buka Tiket Antrean Topup Dedicated</button>` : ''}
          ${(isPending && (isTop || t.kode_produk === 'UPGRADE_BOT' || t.kode_produk === 'AKTIVASI_SELLER' || String(t.refid_h2h).startsWith('TP-') || String(t.refid_h2h).startsWith('BOT-') || String(t.refid_h2h).startsWith('ACT-'))) ? `<button type="button" class="btn btn-success btn-block" style="font-size: 12px; font-weight: 800; padding: 11px; box-shadow: 0 4px 14px rgba(16, 185, 129, 0.35);" onclick="reopenPendingPaymentTicket('${esc(t.refid_h2h)}')"><i class="fas fa-qrcode"></i> Buka Layar Pembayaran (Scan QRIS / Transfer)</button>` : ''}
          ${isPending ? `<button type="button" class="btn btn-warning btn-block" style="font-size: 11.5px; font-weight: 800; padding: 10px;" onclick="trxDetailCekServerInstant('${esc(t.refid_h2h)}')"><i class="fas fa-satellite-dish"></i> Cek Status Pembayaran ke Server</button>` : ''}
          <div style="display: flex; gap: 8px;">
            <button type="button" class="btn btn-primary" style="flex: 1.2; font-size: 11px; padding: 9px; background: linear-gradient(135deg, #002dbb 0%, #0056e0 100%) !important; color: #ffffff !important; font-weight: 800; border-radius: 9px;" onclick="closeModal('modalTrxDetail'); siapkanPrintFromRef('${esc(t.refid_h2h)}');"><i class="fas fa-print"></i> Print RawBT</button>
    
            <button type="button" class="btn btn-outline" style="flex: 1; font-size: 11px; padding: 9px;" onclick="downloadReceiptTxt('${esc(t.refid_h2h)}')"><i class="fas fa-download"></i> Struk</button>
            <button type="button" class="btn btn-outline" style="flex: 1; font-size: 11px; padding: 9px;" onclick="shareReceiptTxt('${esc(t.refid_h2h)}')"><i class="fas fa-share-nodes"></i> Bagikan</button>
          </div>
          ${(t.kode_produk && !isTop) ? `<button type="button" class="btn btn-success btn-block" style="font-size: 11.5px; font-weight: 800; padding: 10px;" onclick="repeatTrxOrder('${esc(t.kode_produk)}', '${esc(t.target)}')"><i class="fas fa-rotate"></i> Ulangi Transaksi</button>` : ''}
          <a href="https://t.me/iTCyrax" target="_blank" style="display: block; width: 100%; margin-top: 6px; background: none; border: none; font-size: 11px; font-weight: 800; color: #002dbb; text-decoration: underline; text-align: center;"><i class="fab fa-telegram-plane" style="color:#0088cc;"></i> Laporkan Masalah ke CS Telegram</a>
    
        </div>`;
      }
      const m = document.getElementById('modalTrxDetail');
      if (m) m.style.display = 'flex';
    }
    
    async function trxDetailCekServerInstant(refid) {
      closeModal('modalTrxDetail');
      toast('info', 'Mengecek Server', 'Menanyakan status transaksi ke server pusat...');
      await lacakCekServer(refid);
      if (typeof loadUserHistory === 'function') await loadUserHistory();
    }
    
    function downloadReceiptTxt(refid) {
      const t = (rawUserHistory || []).find(x => String(x.refid_h2h) === String(refid));
      if (!t) return toast('warn', 'Data Kosong', 'Transaksi tidak ditemukan');
      const L = [
        "==============================",
        "     H2H INTEGRATION STRUK    ",
        "==============================",
        "No. Ref H2H  : " + (t.refid_h2h || '-'),
        "Tanggal      : " + (t.created_at || '-'),
        "Status       : " + String(t.status || '').toUpperCase(),
        "------------------------------",
        "Server       : " + ((t.is_dedicated || t.is_personal_khfy || (t.server_name && t.server_name.includes('Dedicated')) || (t.server && String(t.server).includes('Dedicated'))) ? "Server 1 Dedicated Route (Akun Pribadi)" : ((t.server_code === 'api1' || t.server === 'api1') ? "Server 1 Enterprise Route (Pool Admin)" : (t.server_name || t.server_code || t.server || '-'))),
        "Produk       : " + (t.produk_nama || t.kode_produk || '-'),
        "Kode Produk  : " + (t.kode_produk || '-'),
        "Tujuan       : " + (t.target || '-'),
        t.sn ? ("SN / Token   : " + t.sn) : "",
        "------------------------------",
        "Harga        : " + fmtRp(t.harga),
        "Admin        : Gratis",
        "TOTAL BAYAR  : " + fmtRp(t.harga),
        "Metode Bayar : Saldo Akun H2H",
        "==============================",
        "   Terima kasih telah bertransaksi",
        "       dompul.shop          "
    
      ].filter(Boolean).join("\r\n");
      downloadFile("Struk-" + (t.refid_h2h || 'TRX') + ".txt", L, "text/plain");
    }
    function shareReceiptTxt(refid) {
      const t = (rawUserHistory || []).find(x => String(x.refid_h2h) === String(refid));
      if (!t) return toast('warn', 'Data Kosong', 'Transaksi tidak ditemukan');
      const txt = `*STRUK TRANSAKSI H2H*\nRefID: ${t.refid_h2h || '-'}\nWaktu: ${t.created_at || '-'}\nProduk: ${t.produk_nama || t.kode_produk || '-'}\nTujuan: ${t.target || '-'}\nHarga: ${fmtRp(t.harga)}\nStatus: *${String(t.status || '').toUpperCase()}*\nSN/Ket: ${t.sn || t.message || '-'}`;
      if (navigator.share) {
        navigator.share({ title: 'Struk ' + (t.refid_h2h || ''), text: txt }).catch(() => {});
      } else {
        copyToClipboard(txt, 'Struk Transaksi');
      }
    }
    function repeatTrxOrder(kode, target) {
      closeModal('modalTrxDetail');
      switchTab('trxLangsung');
      const sInp = document.getElementById('hargaSearchInput');
      if (sInp) {
        sInp.value = kode || '';
        filterHargaTerkini();
      }
      toast('info', 'Ulangi Transaksi', `Produk ${kode} difilter. Klik Beli untuk melanjutkan ke nomor ${target || ''}.`);
    }
    async function loadUserHistory() {
        const res = await fetch(`api/sysdatabase/auth.php?action=my_history&session_token=${currentUser.session_token}&_t=${Date.now()}`, { cache: "no-store" });
        const rawTxt = await res.text();
        let data = null;
        try { data = JSON.parse(rawTxt); } catch(pe) {}
        if (data && data.status) {
            rawUserHistory = data.data || [];
            
            let pendingStr = localStorage.getItem('dt17_pending_topup_' + currentUser.username);
            if (pendingStr) {
                let pending = JSON.parse(pendingStr);
                const targetRefId = pending.id || pending.ref_id || pending.refid_h2h;
                let resolved = rawUserHistory.find(x => (x.refid_h2h === targetRefId || x.refid_pusat === targetRefId) && x.status !== 'PENDING');
                const timeoutMs = pending.is_dedicated ? (1800 * 1000) : (3600 * 1000);
                if (resolved || (Date.now() - (pending.time || 0) > timeoutMs)) {
                    localStorage.removeItem('dt17_pending_topup_' + currentUser.username);
                } else {
                    let exists = rawUserHistory.find(x => (x.refid_h2h === targetRefId || x.refid_pusat === targetRefId));
                    if (!exists) {
                        let d = new Date(pending.time || Date.now());
                        let ds = d.getFullYear() + '-' + String(d.getMonth()+1).padStart(2,'0') + '-' + String(d.getDate()).padStart(2,'0') + ' ' + String(d.getHours()).padStart(2,'0') + ':' + String(d.getMinutes()).padStart(2,'0') + ':' + String(d.getSeconds()).padStart(2,'0');
                        rawUserHistory.unshift({
                            created_at: ds,
                            refid_h2h: targetRefId,
                            server_code: 'TOPUP SALDO',
                            server_name: pending.is_dedicated ? 'Server 1 Dedicated Route' : (pending.server_name || 'Topup Otomatis'),
                            is_dedicated: !!pending.is_dedicated,
                            is_personal_khfy: !!pending.is_dedicated,
                            wallet_used: pending.wallet || 'akrab',
                            kode_produk: pending.is_dedicated ? 'TOPUP_DEDICATED' : (pending.kode_produk || 'SALDO'),
                            produk_nama: pending.is_dedicated ? 'Topup Saldo Server 1 Dedicated' : (pending.produk_nama || 'Topup Saldo'),
                            target: pending.target || 'TRANSFER',
                            harga: (pending.unique_amount || pending.amount || 0),
                            total_transfer: (pending.unique_amount || pending.amount || 0),
                            status: 'PENDING',
                            sn: pending.sn || (pending.is_dedicated ? 'Menunggu Pembayaran (30 Menit)' : 'Menunggu Pembayaran / Konfirmasi'),
                            message: pending.message || 'Menunggu Pembayaran'
                        });
                    }
                }
            }
    
            initFilterDates();
    
            let totalTerpakai = 0;
            let countBerhasil = 0;
            let monthTotal = 0;
            let monthSuccess = 0;
            let monthFailed = 0;
            const now = new Date();
            const currentYearMonth = now.getFullYear() + '-' + String(now.getMonth() + 1).padStart(2, '0');
            const monthlySaldoTerpakai = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
            const monthlyTrxBerhasil = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
            const monthlyTrxGagal = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    
            rawUserHistory.forEach(t => {
                const kodeProd = String(t.kode_produk || t.kode || '').toUpperCase().trim();
                if (kodeProd.startsWith('CEK')) return;
    
                const price = parseInt(t.harga || 0);
                const isTopup = (t.server_code === 'TOPUP SALDO' || t.server_code === 'dedicated_topup.php' || t.kode_produk === 'SALDO' || t.kode_produk === 'TOPUP_DEDICATED' || String(t.refid_h2h).startsWith('TP-') || String(t.refid_h2h).startsWith('TP1_'));
                if (t.status === 'BERHASIL') {
                    if (!isTopup) {
                        totalTerpakai += price;
                        countBerhasil++;
                    }
                }
                if (t.created_at) {
                    const tDate = new Date(t.created_at);
                    if (!isNaN(tDate)) {
                        const mIndex = tDate.getMonth();
                        if (t.status === 'BERHASIL') {
                            if (!isTopup) {
                                monthlySaldoTerpakai[mIndex] += price;
                                monthlyTrxBerhasil[mIndex] += 1;
                            }
                        } else if (t.status === 'GAGAL') {
                            if (!isTopup) {
                                monthlyTrxGagal[mIndex] += 1;
                            }
                        }
                        const tYM = tDate.getFullYear() + '-' + String(tDate.getMonth() + 1).padStart(2, '0');
                        if (tYM === currentYearMonth) {
                            if (!isTopup) {
                                monthTotal++;
                                if (t.status === 'BERHASIL') monthSuccess++;
                                else if (t.status === 'GAGAL') monthFailed++;
                            }
                        }
                    }
                }
            });
    
            if (document.getElementById('profSaldoTerpakai')) document.getElementById('profSaldoTerpakai').innerText = 'Rp ' + totalTerpakai.toLocaleString('id-ID');
            refreshUserBalanceLive();
            if (document.getElementById('profTotalTrxBerhasil')) document.getElementById('profTotalTrxBerhasil').innerText = countBerhasil + ' Transaksi';
            if (document.getElementById('monthTotalTrx')) document.getElementById('monthTotalTrx').innerText = monthTotal + ' TRX';
            if (document.getElementById('monthSuccessTrx')) document.getElementById('monthSuccessTrx').innerText = monthSuccess + ' TRX';
            if (document.getElementById('monthFailedTrx')) document.getElementById('monthFailedTrx').innerText = monthFailed + ' TRX';
            if (!window.isSilentAutoRefresh) {
                checkPendingTransactionsStatus();
                renderTradingChart(monthlySaldoTerpakai, monthlyTrxBerhasil, monthlyTrxGagal);
            }
    
            renderUserHistoryPage();
            if (typeof renderLacak === 'function') renderLacak();
        }
    }
    
    
    
    function openForgotModal() {
        document.getElementById('forgotIdentifier').value = '';
        document.getElementById('modalForgotPass').style.display = 'flex';
    }
    async function submitForgotPassword() {
        const ident = document.getElementById('forgotIdentifier').value.trim();
        if (!ident) return alert('Masukkan Email, Nomor WhatsApp, atau Username!');
        const btn = document.getElementById('btnSubmitForgot');
        btn.disabled = true; btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengirim...';
        try {
            const res = await fetch('resetpass.php?action=request_reset', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ action: 'request_reset', identifier: ident })
            });
            const data = await res.json();
            alert(data.message);
            if (data.status) closeModal('modalForgotPass');
        } catch(e) {
            alert('Gagal menghubungi server reset kata sandi.');
        } finally {
            btn.disabled = false; btn.innerHTML = '<i class="fas fa-paper-plane"></i> Kirim Tautan';
        }
    }
    async function submitSetNewPassword() {
        const token = document.getElementById('resetTokenInput').value;
        const pass = document.getElementById('resetNewPass').value;
        const passConf = document.getElementById('resetNewPassConfirm').value;
        if (!pass || pass.length < 6) return alert('Kata sandi minimal 6 karakter!');
        if (pass !== passConf) return alert('Konfirmasi kata sandi tidak cocok!');
        const btn = document.getElementById('btnSubmitSetPass');
        btn.disabled = true; btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
        try {
            const res = await fetch('resetpass.php?action=set_new_password', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ action: 'set_new_password', token: token, password: pass, confirmPassword: passConf })
            });
            const data = await res.json();
            alert(data.message);
            if (data.status) {
                closeModal('modalSetNewPass');
                window.history.replaceState({}, document.title, window.location.pathname);
                switchAuth('login');
            }
        } catch(e) {
            alert('Gagal memperbarui kata sandi.');
        } finally {
            btn.disabled = false; btn.innerHTML = '<i class="fas fa-check"></i> Simpan Sandi';
        }
    }
    async function resendVerificationFromAlert() {
        const ident = window.pendingUnverifiedIdent || '';
        const btn = document.getElementById('btnResendActivation');
        btn.disabled = true; btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengirim...';
        try {
            const res = await fetch('resetpass.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ action: 'resend_pending_verify', phone: ident, username: ident, email: ident })
            });
            const data = await res.json();
            alert(data.message);
        } catch(e) {
            alert('Gagal mengirim ulang tautan aktivasi.');
        } finally {
            btn.disabled = false; btn.innerHTML = '<i class="fas fa-paper-plane"></i> Kirim Ulang Tautan Verifikasi';
        }
    }
    async function submitGoogleCompleteProfile() {
        const uName = document.getElementById('gCompleteUsername').value.trim();
        const waNo = document.getElementById('gCompleteWA').value.trim();
        const newPass = document.getElementById('gCompletePass').value;
        if (!uName || uName.length < 3) return alert('Username minimal 3 karakter!');
        const cleanWA = waNo.replace(/\D/g, '');
        if (!cleanWA || cleanWA.length < 10) return alert('Nomor WhatsApp wajib diisi minimal 10 digit!');
        if (cleanWA.startsWith('0899') && cleanWA.length <= 12) return alert('Harap masukkan nomor WhatsApp aktif Anda yang sebenarnya!');
        if (newPass && newPass.length < 6) return alert('Kata sandi opsional minimal 6 karakter!');
    
        const btn = document.getElementById('btnSubmitGProfile');
        if (btn) { btn.disabled = true; btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan Profil...'; }
        try {
            const res = await fetch('api/sysdatabase/auth.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    action: 'update_profile',
                    session_token: currentUser.session_token,
                    username: uName,
                    nomorwa: cleanWA,
                    password: newPass || undefined
                })
            });
            const data = await res.json();
            if (data && data.status) {
                currentUser.username = uName;
                currentUser.nomorwa = cleanWA;
                currentUser.profile_completed = true;
                currentUser.needs_profile_completion = false;
                closeModal('modalGoogleCompleteProfile');
                renderApp();
                if (typeof toast === 'function') toast('success', 'Akun Lengkap!', 'Profil akun Anda berhasil disimpan secara permanen.');
                else alert('Profil akun berhasil dilengkapi!');
            } else {
                alert((data && data.message) ? data.message : 'Gagal menyimpan profil.');
            }
        } catch(e) {
            alert('Terjadi kendala jaringan: ' + e.message);
        } finally {
            if (btn) { btn.disabled = false; btn.innerHTML = '<i class="fas fa-check-circle"></i> Simpan & Masuk Dashboard'; }
        }
    }
    async function checkUrlVerificationAndResetTokens() {
        const params = new URLSearchParams(window.location.search);
        const vToken = params.get('verify_token');
        const rToken = params.get('reset_token');
    
        const sToken = params.get('session_token') || params.get('token') || params.get('auth_token');
        const gErr = params.get('error') || params.get('auth_error');
        if (gErr) {
            alert('Autentikasi Google: ' + decodeURIComponent(gErr));
            window.history.replaceState({}, document.title, window.location.pathname);
        }
        if (sToken) {
            localStorage.setItem('dt17_user_session', sToken);
            sessionStorage.setItem('dt17_user_session', sToken);
            localStorage.setItem('dt17_session', sToken);
            window.history.replaceState({}, document.title, window.location.pathname);
            verifySession(sToken);
            return;
        }
        if (vToken) {
            try {
                const res = await fetch('resetpass.php?action=register_verification_confirm&token=' + encodeURIComponent(vToken));
                const data = await res.json();
                if (data.status) {
                    alert('Selamat! ' + (data.message || 'Akun Anda berhasil diverifikasi dan aktif. Silakan masuk akun.'));
                    window.history.replaceState({}, document.title, window.location.pathname);
                    switchAuth('login');
                } else {
                    alert(data.message || 'Tautan verifikasi tidak valid atau kedaluwarsa.');
                }
            } catch(e) {}
        }
        if (rToken) {
            document.getElementById('resetTokenInput').value = rToken;
            document.getElementById('modalSetNewPass').style.display = 'flex';
        }
    }
    let printerSettings = {
      storeName: "dt17.store",
      address: "H2H Integration Center - dompul.shop",
    
      footer: "Terima Kasih Atas Kepercayaan Anda",
      paperSize: "58",
      markup: 0
    };
    let activePrintData = null;
    let currentReceiptData = "";
    
    (function() {
      const saved = localStorage.getItem("dt17_printer_settings") || localStorage.getItem("printerSettings_v1");
      if (saved) {
        try { printerSettings = Object.assign(printerSettings, JSON.parse(saved)); } catch(e) {}
      }
    })();
    
    window.bukaPengaturanPrinter = function () {
      const sName = document.getElementById("setStoreName");
      const sAddr = document.getElementById("setStoreAddress");
      const sFoot = document.getElementById("setStoreFooter");
      const sPaper = document.getElementById("setPaperSize");
      const sMarkup = document.getElementById("setGlobalMarkup");
    
      if (sName) sName.value = printerSettings.storeName || "";
      if (sAddr) sAddr.value = printerSettings.address || "";
      if (sFoot) sFoot.value = printerSettings.footer || "";
      if (sPaper) sPaper.value = printerSettings.paperSize || "58";
      if (sMarkup) sMarkup.value = printerSettings.markup || 0;
    
      const modal = document.getElementById("modalPrinterSettings");
      if (modal) modal.style.display = "flex";
      window.updateSettingsPreview();
    };
    
    function _thermalCenter(txt, width) {
      if (!txt) return "";
      let out = "";
      txt.toString().split("\n").forEach((lineTxt) => {
        let rem = lineTxt;
        if (!rem.length) { out += "\n"; return; }
        while (rem.length > 0) {
          const chunk = rem.substring(0, width);
          rem = rem.substring(width);
          out += " ".repeat(Math.max(0, Math.floor((width - chunk.length) / 2))) + chunk + "\n";
        }
      });
      return out.replace(/\n$/, "");
    }
    function _thermalLeftRight(left, right, width) {
      left = left.toString(); right = right.toString();
      const maxL = width - right.length - 1;
      if (left.length <= maxL) return left + " ".repeat(width - left.length - right.length) + right;
      let out = "", rem = left;
      while (rem.length > 0) {
        if (rem.length <= maxL) { out += rem + " ".repeat(width - rem.length - right.length) + right; rem = ""; }
        else { out += rem.substring(0, maxL) + "\n"; rem = rem.substring(maxL); }
      }
      return out;
    }
    
    window.updateSettingsPreview = function () {
      const sName = (document.getElementById("setStoreName") ? document.getElementById("setStoreName").value : "") || "DT17 STORE";
      const sAddr = (document.getElementById("setStoreAddress") ? document.getElementById("setStoreAddress").value : "") || "dompul.shop";
    
      const sFoot = (document.getElementById("setStoreFooter") ? document.getElementById("setStoreFooter").value : "") || "Terima Kasih";
      const sPaper = (document.getElementById("setPaperSize") ? document.getElementById("setPaperSize").value : "58") || "58";
      const sMarkup = parseInt(document.getElementById("setGlobalMarkup") ? document.getElementById("setGlobalMarkup").value : 0) || 0;
    
      const dummyItem = { produk_nama: "Paket Data Akrab / Pulsa", harga: 25000, target: "087812345678", sn: "SN-987654321001", refid_h2h: "TRX-PREVIEW" };
      const rawPrice = dummyItem.harga + sMarkup;
      const finalPrice = Math.ceil(rawPrice / 500) * 500;
      const priceFmt = "Rp " + new Intl.NumberFormat("id-ID").format(finalPrice);
    
      const width = sPaper === "80" ? 48 : 32;
      const line = "-".repeat(width);
      const center = (t) => _thermalCenter(t, width);
      const leftRight = (l, r) => _thermalLeftRight(l, r, width);
      let receipt = "";
      receipt += center(sName.toUpperCase()) + "\n";
      if (sAddr) receipt += center(sAddr) + "\n";
      receipt += line + "\n";
      receipt += leftRight("No. Ref", "TRX-PREVIEW") + "\n";
      receipt += leftRight("Waktu", "24/10/26 14:00") + "\n";
      receipt += line + "\n";
      receipt += leftRight(dummyItem.produk_nama, priceFmt) + "\n";
      receipt += "Tujuan : " + dummyItem.target + "\n";
      receipt += "SN : " + dummyItem.sn + "\n";
      receipt += line + "\n";
      receipt += leftRight("TOTAL", priceFmt) + "\n";
      receipt += line + "\n";
      if (sFoot) receipt += center(sFoot) + "\n";
      receipt += center("Preview Cetak Thermal") + "\n";
    
      const previewArea = document.getElementById("settingsPreviewArea");
      if (previewArea) previewArea.innerText = receipt;
    };
    
    window.simpanPengaturanPrinter = function () {
      printerSettings.storeName = (document.getElementById("setStoreName") ? document.getElementById("setStoreName").value.trim() : "") || "dt17.store";
      printerSettings.address = (document.getElementById("setStoreAddress") ? document.getElementById("setStoreAddress").value.trim() : "") || "";
      printerSettings.footer = (document.getElementById("setStoreFooter") ? document.getElementById("setStoreFooter").value.trim() : "") || "Terima Kasih";
      printerSettings.paperSize = (document.getElementById("setPaperSize") ? document.getElementById("setPaperSize").value : "58") || "58";
      printerSettings.markup = parseInt(document.getElementById("setGlobalMarkup") ? document.getElementById("setGlobalMarkup").value : 0) || 0;
    
      localStorage.setItem("dt17_printer_settings", JSON.stringify(printerSettings));
      localStorage.setItem("printerSettings_v1", JSON.stringify(printerSettings));
      if (typeof toast === 'function') toast('success', 'Pengaturan Disimpan', 'Konfigurasi thermal printer berhasil disimpan!');
      else alert('Pengaturan thermal printer berhasil disimpan!');
      closeModal("modalPrinterSettings");
    };
    
    window.siapkanPrintFromRef = function (refid) {
      const t = (rawUserHistory || []).find(x => String(x.refid_h2h) === String(refid));
      if (!t) {
        if (typeof toast === 'function') toast('warn', 'Data Tidak Ditemukan', 'Transaksi tidak ditemukan di riwayat.');
        else alert('Transaksi tidak ditemukan.');
        return;
      }
      activePrintData = t;
      const inputM = document.getElementById("inputLiveMarkup");
      if (inputM) inputM.value = printerSettings.markup || 0;
      window.renderSinglePreview(t);
      const modal = document.getElementById("modalPrintPreview");
      if (modal) modal.style.display = "flex";
    };
    
    window.updateLivePreview = function (val) {
      printerSettings.markup = parseInt(val) || 0;
      localStorage.setItem("dt17_printer_settings", JSON.stringify(printerSettings));
      localStorage.setItem("printerSettings_v1", JSON.stringify(printerSettings));
      if (activePrintData) {
        window.renderSinglePreview(activePrintData);
      }
    };
    
    window.renderSinglePreview = function (data) {
      const markup = parseInt(printerSettings.markup) || 0;
      let rawPrice = parseInt(data.harga || 0) + markup;
      const finalPrice = Math.ceil(rawPrice / 500) * 500;
    
      const dateObj = new Date();
      const dateStr = dateObj.toLocaleDateString("id-ID");
      const timeStr = dateObj.toLocaleTimeString("id-ID").slice(0, 5);
    
      const width = (printerSettings.paperSize === "80") ? 48 : 32;
      const dashed = "-".repeat(width);
      const center = (t) => _thermalCenter(t, width);
      const leftRight = (l, r) => _thermalLeftRight(l, r, width);
      let receipt = "";
      receipt += center((printerSettings.storeName || "DT17 STORE").toUpperCase()) + "\n";
      if (printerSettings.address) receipt += center(printerSettings.address) + "\n";
      receipt += dashed + "\n";
    
      receipt += (data.created_at || (dateStr + " " + timeStr)) + "\n";
      receipt += "No. Ref: " + (data.refid_h2h || data.ref_id || data.trx_id || "-") + "\n";
      receipt += dashed + "\n";
    
      let priceFmt = "Rp " + new Intl.NumberFormat("id-ID").format(finalPrice);
      receipt += leftRight(data.produk_nama || data.kode_produk || data.nama || "Produk", priceFmt) + "\n";
      receipt += "Tujuan : " + (data.target || data.tujuan || "-") + "\n";
    
      let snText = String(data.sn || data.message || "-").trim();
      if (snText && snText !== "-" && !snText.includes("Menunggu Pembayaran")) {
        let cleanSN = snText.replace(/SN:|Ref:|Sukses|Berhasil/gi, "").trim();
        receipt += "SN/Ref :\n" + center(cleanSN) + "\n";
      }
    
      receipt += dashed + "\n";
      receipt += leftRight("TOTAL", priceFmt) + "\n";
      receipt += dashed + "\n";
    
      if (printerSettings.footer) receipt += center(printerSettings.footer) + "\n";
      receipt += "\n\n\n";
    
      currentReceiptData = receipt;
    
      const previewArea = document.getElementById("printPreviewArea");
      if (previewArea) {
        previewArea.innerText = receipt;
      }
    };
    
    window.printStruk = function () {
      const btn = document.getElementById("btnPrintNow");
      const originalText = btn ? btn.innerHTML : "Print (RawBT)";
      if (btn) {
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Membuka RawBT...';
        btn.disabled = true;
      }
    
      try {
        const textWithBold = "\x1B\x45\x01" + currentReceiptData + "\x1B\x40";
        const base64Data = btoa(unescape(encodeURIComponent(textWithBold)));
        const rawbtUrl = "rawbt:base64," + base64Data;
        const a = document.createElement("a");
        a.href = rawbtUrl;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    
        setTimeout(() => {
          try { window.location.href = rawbtUrl; } catch(e) {}
        }, 250);
    
        setTimeout(() => {
          if (btn) {
            btn.innerHTML = originalText;
            btn.disabled = false;
          }
        }, 1200);
      } catch (e) {
        if (typeof toast === 'function') toast('error', 'Gagal RawBT', e.message);
        else alert("Gagal membuka RawBT: " + e.message);
        if (btn) {
          btn.innerHTML = originalText;
          btn.disabled = false;
        }
      }
    };
    
    window.shareStrukToWA = async function () {
      const btn = document.getElementById("btnShareWA");
      const originalText = btn ? btn.innerHTML : "Bagikan Gambar";
      if (btn) {
        btn.innerHTML = '<i class="fas fa-circle-notch fa-spin"></i> Menyiapkan...';
        btn.disabled = true;
      }
    
      try {
        if (typeof html2canvas === 'undefined') {
          throw new Error("Library html2canvas belum selesai dimuat.");
        }
        const element = document.getElementById("printReceiptContainer") || document.getElementById("printPreviewArea");
        const canvas = await html2canvas(element, {
          scale: 2,
          backgroundColor: "#ffffff",
          logging: false,
          useCORS: true
        });
        if (window.AndroidShare && typeof window.AndroidShare.shareBase64 === "function") {
          const base64Data = canvas.toDataURL("image/jpeg", 0.95);
          window.AndroidShare.shareBase64(base64Data);
          if (btn) { btn.innerHTML = originalText; btn.disabled = false; }
          return;
        }
    
        const refCode = (activePrintData && (activePrintData.refid_h2h || activePrintData.ref_id)) ? (activePrintData.refid_h2h || activePrintData.ref_id) : Date.now();
        const fileName = "Struk_" + refCode + ".jpg";
        const blob = await new Promise(resolve => canvas.toBlob(resolve, "image/jpeg", 0.95));
        const file = new File([blob], fileName, { type: "image/jpeg" });
    
        let sharedSuccessfully = false;
        if (navigator.canShare && navigator.canShare({ files: [file] })) {
          try {
            await navigator.share({
              files: [file],
              title: "Struk Pembelian " + (printerSettings.storeName || "dt17.store"),
              text: "Bukti Struk Transaksi Resmi " + (printerSettings.storeName || "dt17.store")
            });
            sharedSuccessfully = true;
          } catch (err) {
            if (err.name === "AbortError") sharedSuccessfully = true;
          }
        }
        if (!sharedSuccessfully) {
          const link = document.createElement("a");
          link.download = fileName;
          link.href = canvas.toDataURL("image/jpeg", 0.95);
          document.body.appendChild(link);
          link.click();
          document.body.removeChild(link);
    
          if (typeof toast === 'function') {
            toast('success', 'Gambar Diunduh', 'Gambar struk tersimpan ke galeri. Membuka WhatsApp...');
          }
    
          const waText = "*STRUK PEMBELIAN " + (printerSettings.storeName || "dt17.store").toUpperCase() + "*\n" +
            "No. Ref: " + refCode + "\n" +
            "Tujuan: " + (activePrintData ? (activePrintData.target || activePrintData.tujuan || "-") : "-") + "\n" +
            "Status: " + (activePrintData ? String(activePrintData.status || "BERHASIL").toUpperCase() : "BERHASIL") + "\n\n" +
            "Bukti gambar struk resmi telah tersimpan di galeri perangkat Anda.";
    
          setTimeout(() => {
            window.open("https://api.whatsapp.com/send?text=" + encodeURIComponent(waText), "_blank");
          }, 600);
        }
      } catch (e) {
        if (typeof toast === 'function') toast('error', 'Gagal', e.message);
        else alert("Gagal memproses struk: " + e.message);
      } finally {
        if (btn) {
          btn.innerHTML = originalText;
          btn.disabled = false;
        }
      }
    };
    
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') {
            document.querySelectorAll('.modal').forEach(m => { m.style.display = 'none'; });
            return;
        }
        const tag = (e.target && e.target.tagName) ? String(e.target.tagName).toLowerCase() : '';
        const sedangMengetik = (tag === 'input' || tag === 'textarea' || tag === 'select');
        if ((e.key === '/' && !sedangMengetik) || ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'k')) {
            e.preventDefault();
            switchTab('lacak');
            const el = document.getElementById('lacakSearch');
            if (el) { try { el.focus(); el.select(); } catch (err) {} }
        }
    });
    </script>
  </body>

</html>
