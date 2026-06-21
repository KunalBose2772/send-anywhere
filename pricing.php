<?php
// pricing.php - Send Anywhere Pricing Page
require_once __DIR__ . '/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Anywhere Pricing - Free File Transfer, No Limits, No Hidden Cost</title>
    <meta name="description" content="Send Anywhere pricing is simple: the core P2P file transfer is 100% free with no file size limits. Learn about free vs premium plans and what you get with Send Anywhere India.">
    <meta name="keywords" content="send anywhere pricing, send anywhere free, send anywhere plans, send anywhere cost, free file transfer, send large files free, send anywhere india price">
    <link rel="canonical" href="https://send-anywhere.in/pricing" />

    <!-- Hreflang Tags -->
    <link rel="alternate" hreflang="x-default" href="https://send-anywhere.in/pricing" />
    <link rel="alternate" hreflang="en-in" href="https://send-anywhere.in/pricing" />
    <link rel="alternate" hreflang="en" href="https://send-anywhere.in/pricing" />

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://send-anywhere.in/pricing">
    <meta property="og:title" content="Send Anywhere Pricing - Free File Transfer, No Limits">
    <meta property="og:description" content="Send Anywhere pricing is simple: the core P2P file transfer is 100% free forever. No file size cap, no uploads to cloud, no account needed. Start sending now.">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://send-anywhere.in/pricing">
    <meta property="twitter:title" content="Send Anywhere Pricing - Free File Transfer, No Limits">
    <meta property="twitter:description" content="Send Anywhere is 100% free for P2P file transfer. No hidden cost, no file size limit. Start now.">

    <!-- Schema.org: Offer/Product -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Product",
        "name": "Send Anywhere - Free P2P File Transfer",
        "description": "Send Anywhere lets you transfer files of any size directly between devices for free using peer-to-peer technology. No cloud storage, no file size limit.",
        "brand": { "@type": "Brand", "name": "Send Anywhere India" },
        "offers": {
            "@type": "Offer",
            "price": "0",
            "priceCurrency": "INR",
            "availability": "https://schema.org/InStock",
            "url": "https://send-anywhere.in/"
        }
    }
    </script>

    <link rel="stylesheet" href="style.css">
    <style>
        /* Pricing Page Specific Styles */
        .pricing-hero {
            background: linear-gradient(135deg, var(--primary-purple) 0%, #2d1b6e 100%);
            padding: 80px 40px 110px;
            color: var(--text-white);
            text-align: center;
            position: relative;
        }
        .pricing-hero::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0; right: 0;
            height: 50px;
            background: var(--bg-light);
            clip-path: polygon(0 100%, 100% 100%, 100% 0);
        }
        .pricing-hero h1 {
            font-size: 46px;
            font-weight: 800;
            max-width: 780px;
            margin: 0 auto 20px;
            line-height: 1.2;
        }
        .pricing-hero h1 span { color: #ffd054; }
        .pricing-hero p {
            font-size: 19px;
            color: rgba(255,255,255,0.85);
            max-width: 600px;
            margin: 0 auto 14px;
        }
        .pricing-hero .badge {
            display: inline-block;
            background: rgba(255,208,84,0.2);
            border: 1px solid rgba(255,208,84,0.5);
            color: #ffd054;
            font-size: 14px;
            font-weight: 700;
            padding: 6px 16px;
            border-radius: 100px;
            margin-bottom: 22px;
            letter-spacing: 0.5px;
        }

        /* Pricing Cards Grid */
        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(290px, 1fr));
            gap: 30px;
            margin-bottom: 60px;
        }
        .pricing-card {
            background: var(--bg-card);
            border-radius: 20px;
            padding: 40px 34px;
            box-shadow: var(--shadow-card);
            text-align: center;
            position: relative;
            transition: var(--transition-smooth);
            border: 2px solid transparent;
        }
        .pricing-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 24px 60px rgba(77, 50, 160, 0.15);
        }
        .pricing-card.featured {
            border-color: var(--primary-purple);
            background: linear-gradient(160deg, #faf9ff 0%, #f0ebff 100%);
        }
        .pricing-card.featured:hover {
            box-shadow: 0 24px 60px rgba(77, 50, 160, 0.25);
        }
        .popular-badge {
            position: absolute;
            top: -14px;
            left: 50%;
            transform: translateX(-50%);
            background: linear-gradient(90deg, var(--primary-purple), var(--accent-red));
            color: var(--text-white);
            font-size: 12px;
            font-weight: 700;
            padding: 5px 18px;
            border-radius: 100px;
            white-space: nowrap;
            letter-spacing: 0.5px;
        }
        .plan-name {
            font-size: 15px;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 16px;
        }
        .plan-price {
            font-size: 58px;
            font-weight: 800;
            color: var(--primary-purple);
            line-height: 1;
            margin-bottom: 6px;
        }
        .plan-price sup {
            font-size: 22px;
            vertical-align: super;
            font-weight: 700;
        }
        .plan-price span {
            font-size: 18px;
            font-weight: 500;
            color: var(--text-muted);
        }
        .plan-tagline {
            font-size: 14px;
            color: var(--text-muted);
            margin-bottom: 30px;
        }
        .plan-features {
            list-style: none;
            padding: 0;
            margin: 0 0 32px;
            text-align: left;
        }
        .plan-features li {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-size: 15px;
            color: var(--text-muted);
            padding: 9px 0;
            border-bottom: 1px solid #f0eef8;
        }
        .plan-features li:last-child { border-bottom: none; }
        .feat-check {
            color: #22c55e;
            font-size: 17px;
            font-weight: 700;
            flex-shrink: 0;
            margin-top: 1px;
        }
        .feat-cross {
            color: #d1d5db;
            font-size: 17px;
            font-weight: 700;
            flex-shrink: 0;
            margin-top: 1px;
        }
        .plan-btn {
            display: block;
            width: 100%;
            padding: 14px 24px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 700;
            text-decoration: none;
            text-align: center;
            transition: var(--transition-smooth);
            border: none;
            cursor: pointer;
        }
        .plan-btn-free {
            background: #f0ebff;
            color: var(--primary-purple);
        }
        .plan-btn-free:hover {
            background: var(--primary-purple);
            color: var(--text-white);
            transform: translateY(-2px);
        }
        .plan-btn-pro {
            background: linear-gradient(135deg, var(--primary-purple), var(--accent-red));
            color: var(--text-white);
            box-shadow: 0 8px 20px rgba(77, 50, 160, 0.3);
        }
        .plan-btn-pro:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(77, 50, 160, 0.4);
        }

        /* Feature comparison table */
        .compare-wrap {
            overflow-x: auto;
            margin-bottom: 50px;
        }
        .compare-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
        }
        .compare-table th {
            background: var(--primary-purple);
            color: var(--text-white);
            padding: 16px 20px;
            text-align: center;
            font-weight: 700;
            font-size: 15px;
        }
        .compare-table th:first-child {
            text-align: left;
            border-radius: 12px 0 0 0;
        }
        .compare-table th:last-child { border-radius: 0 12px 0 0; }
        .compare-table td {
            padding: 14px 20px;
            border-bottom: 1px solid #eef0f6;
            font-size: 15px;
            text-align: center;
            color: var(--text-muted);
        }
        .compare-table td:first-child {
            text-align: left;
            font-weight: 600;
            color: var(--text-dark);
        }
        .compare-table tr:last-child td { border-bottom: none; }
        .compare-table tr:hover td { background: #faf9ff; }
        .ck { color: #22c55e; font-weight: 700; font-size: 18px; }
        .cx { color: #d1d5db; font-weight: 700; font-size: 18px; }

        /* Trust badges */
        .trust-bar {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 24px;
            margin: 40px 0 60px;
        }
        .trust-badge {
            display: flex;
            align-items: center;
            gap: 10px;
            background: var(--bg-card);
            padding: 14px 22px;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.06);
            font-size: 14px;
            font-weight: 600;
            color: var(--text-dark);
        }
        .trust-badge span { font-size: 22px; }

        @media (max-width: 768px) {
            .pricing-hero h1 { font-size: 32px; }
            .plan-price { font-size: 44px; }
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <a href="index.php" class="logo">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="fill: var(--accent-red)">
                <path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM10 16.5V7.5L16 12L10 16.5Z"/>
            </svg>
            send<span>anywhere</span>.in
        </a>
        <ul class="nav-links">
            <li><a href="index.php">Transfer</a></li>
            <li><a href="file-transfer">File Transfer</a></li>
            <li><a href="product">Product</a></li>
            <li><a href="pricing" style="color:#fff; border-bottom: 2px solid rgba(255,255,255,0.5);">Pricing</a></li>
        </ul>
    </header>

    <!-- Quick P2P Transfer Bar -->
    <div class="quick-transfer-bar">
        <div class="quick-transfer-title">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="fill: var(--primary-purple)">
                <path d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z"/>
            </svg>
            Quick P2P Transfer:
        </div>
        <div>
            <button class="quick-send-btn" onclick="document.getElementById('quick-file-input').click()">
                📁 Choose File to Send
            </button>
            <input type="file" id="quick-file-input" style="display: none;">
        </div>
        <div class="quick-receive-group">
            <input type="text" class="quick-receive-input" id="quick-receive-key" maxlength="6" placeholder="6-digit Key">
            <button class="quick-receive-btn" id="btn-quick-receive">Receive</button>
        </div>
    </div>

    <!-- Pricing Hero -->
    <section class="pricing-hero">
        <div class="badge">🇮🇳 Send Anywhere India — Honest Pricing</div>
        <h1>Simple, <span>Honest Pricing</span><br>for Everyone</h1>
        <p>The core Send Anywhere P2P file transfer is free — forever. No credit card. No hidden fees. No file size limit. Just pure, direct sharing.</p>
    </section>

    <!-- Pricing Cards -->
    <section style="max-width: 1100px; margin: 0 auto; padding: 60px 20px 20px;">

        <!-- Trust Badges -->
        <div class="trust-bar">
            <div class="trust-badge"><span>🔒</span> End-to-End Encrypted</div>
            <div class="trust-badge"><span>☁️</span> Zero Cloud Storage</div>
            <div class="trust-badge"><span>∞</span> No File Size Limit</div>
            <div class="trust-badge"><span>🆓</span> No Account Required</div>
            <div class="trust-badge"><span>⚡</span> Instant P2P Transfer</div>
        </div>

        <h2 style="text-align:center; font-size:32px; font-weight:800; color:var(--primary-purple); margin-bottom:36px;">Choose Your Send Anywhere Plan</h2>

        <div class="pricing-grid">

            <!-- Free Plan -->
            <div class="pricing-card">
                <div class="plan-name">Free</div>
                <div class="plan-price"><sup>₹</sup>0<span>/mo</span></div>
                <div class="plan-tagline">Perfect for everyday personal transfers</div>
                <ul class="plan-features">
                    <li><span class="feat-check">✓</span> Unlimited P2P file transfers</li>
                    <li><span class="feat-check">✓</span> No file size limit</li>
                    <li><span class="feat-check">✓</span> Works in any browser</li>
                    <li><span class="feat-check">✓</span> 6-digit key system</li>
                    <li><span class="feat-check">✓</span> Android & iOS apps</li>
                    <li><span class="feat-check">✓</span> E2E encrypted transfer</li>
                    <li><span class="feat-check">✓</span> No account needed</li>
                    <li><span class="feat-cross">✗</span> Link-based sharing</li>
                    <li><span class="feat-cross">✗</span> Transfer history log</li>
                    <li><span class="feat-cross">✗</span> Priority support</li>
                </ul>
                <a href="index.php" class="plan-btn plan-btn-free">Start Transferring Free →</a>
            </div>

            <!-- Plus Plan (Featured) -->
            <div class="pricing-card featured">
                <div class="popular-badge">⭐ Most Popular</div>
                <div class="plan-name">Plus</div>
                <div class="plan-price"><sup>₹</sup>199<span>/mo</span></div>
                <div class="plan-tagline">Best for professionals & frequent sharers</div>
                <ul class="plan-features">
                    <li><span class="feat-check">✓</span> Everything in Free</li>
                    <li><span class="feat-check">✓</span> Link-based sharing (URL)</li>
                    <li><span class="feat-check">✓</span> Transfer history (30 days)</li>
                    <li><span class="feat-check">✓</span> No ads in apps</li>
                    <li><span class="feat-check">✓</span> Transfer resumption</li>
                    <li><span class="feat-check">✓</span> Scheduled transfers</li>
                    <li><span class="feat-check">✓</span> Gmail & Outlook add-on</li>
                    <li><span class="feat-check">✓</span> Priority email support</li>
                    <li><span class="feat-check">✓</span> Desktop apps (Win/Mac/Linux)</li>
                    <li><span class="feat-check">✓</span> Direct Wi-Fi local transfer</li>
                </ul>
                <a href="index.php" class="plan-btn plan-btn-pro">Get Plus — ₹199/month →</a>
            </div>

            <!-- Business Plan -->
            <div class="pricing-card">
                <div class="plan-name">Business</div>
                <div class="plan-price"><sup>₹</sup>499<span>/mo</span></div>
                <div class="plan-tagline">For teams, companies & power users</div>
                <ul class="plan-features">
                    <li><span class="feat-check">✓</span> Everything in Plus</li>
                    <li><span class="feat-check">✓</span> Up to 10 team members</li>
                    <li><span class="feat-check">✓</span> Transfer history (unlimited)</li>
                    <li><span class="feat-check">✓</span> Admin dashboard</li>
                    <li><span class="feat-check">✓</span> API access</li>
                    <li><span class="feat-check">✓</span> Custom branding (white-label)</li>
                    <li><span class="feat-check">✓</span> Dedicated account manager</li>
                    <li><span class="feat-check">✓</span> SLA guarantee</li>
                    <li><span class="feat-check">✓</span> Priority phone support</li>
                    <li><span class="feat-check">✓</span> Compliance & audit logs</li>
                </ul>
                <a href="index.php" class="plan-btn plan-btn-free">Contact Us for Business →</a>
            </div>

        </div>

        <!-- Feature Comparison Table -->
        <h2 style="font-size:28px; font-weight:800; color:var(--primary-purple); margin-bottom:24px; text-align:center;">Full Feature Comparison</h2>
        <div class="compare-wrap">
            <table class="compare-table">
                <thead>
                    <tr>
                        <th>Feature</th>
                        <th>Free</th>
                        <th>Plus</th>
                        <th>Business</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>P2P File Transfer (6-digit key)</td>
                        <td><span class="ck">✓</span></td>
                        <td><span class="ck">✓</span></td>
                        <td><span class="ck">✓</span></td>
                    </tr>
                    <tr>
                        <td>File Size Limit</td>
                        <td>None</td>
                        <td>None</td>
                        <td>None</td>
                    </tr>
                    <tr>
                        <td>No Account Required</td>
                        <td><span class="ck">✓</span></td>
                        <td><span class="ck">✓</span></td>
                        <td><span class="ck">✓</span></td>
                    </tr>
                    <tr>
                        <td>E2E Encryption</td>
                        <td><span class="ck">✓</span></td>
                        <td><span class="ck">✓</span></td>
                        <td><span class="ck">✓</span></td>
                    </tr>
                    <tr>
                        <td>Android & iOS App</td>
                        <td><span class="ck">✓</span></td>
                        <td><span class="ck">✓</span></td>
                        <td><span class="ck">✓</span></td>
                    </tr>
                    <tr>
                        <td>Link-Based Sharing</td>
                        <td><span class="cx">✗</span></td>
                        <td><span class="ck">✓</span></td>
                        <td><span class="ck">✓</span></td>
                    </tr>
                    <tr>
                        <td>Transfer History</td>
                        <td><span class="cx">✗</span></td>
                        <td>30 days</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <td>Gmail & Outlook Add-on</td>
                        <td><span class="cx">✗</span></td>
                        <td><span class="ck">✓</span></td>
                        <td><span class="ck">✓</span></td>
                    </tr>
                    <tr>
                        <td>Desktop Apps (Win/Mac/Linux)</td>
                        <td><span class="cx">✗</span></td>
                        <td><span class="ck">✓</span></td>
                        <td><span class="ck">✓</span></td>
                    </tr>
                    <tr>
                        <td>API Access</td>
                        <td><span class="cx">✗</span></td>
                        <td><span class="cx">✗</span></td>
                        <td><span class="ck">✓</span></td>
                    </tr>
                    <tr>
                        <td>Admin Dashboard</td>
                        <td><span class="cx">✗</span></td>
                        <td><span class="cx">✗</span></td>
                        <td><span class="ck">✓</span></td>
                    </tr>
                    <tr>
                        <td>Priority Support</td>
                        <td><span class="cx">✗</span></td>
                        <td>Email</td>
                        <td>Phone + Email</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </section>

    <!-- SEO Long-Form Content -->
    <section class="seo-section" style="padding-top: 0;">
        <div class="seo-card">

            <h2 id="why-free">Why is Send Anywhere Free?</h2>
            <p>The most common question people ask about <strong><a href="index.php">Send Anywhere</a></strong> is: "How can it be free if there's no file size limit?" The answer lies in the architecture. Traditional file-sharing services like WeTransfer, Dropbox, or Google Drive charge fees because they store your files on their servers — servers that cost money to build, maintain, and secure. The more data stored, the higher the operating cost, and that cost is passed on to you in the form of subscriptions and storage quotas.</p>

            <p><strong>Send Anywhere is different by design.</strong> Our core product is a peer-to-peer (P2P) <a href="file-transfer">file transfer</a> engine. When you send a file using <a href="index.php">Send Anywhere</a>, the data never touches our servers. It goes directly from your device to the receiver's device through a secure, encrypted WebRTC data channel. Because we do not store any files, we have no storage costs — and that allows us to offer the core transfer function completely free to everyone, forever.</p>

            <h2 id="free-plan-details">What Exactly is Included in the Free Plan?</h2>
            <p>The <a href="index.php">Send Anywhere</a> free plan is not a crippled demo — it is a fully functional, production-ready <a href="file-transfer">file transfer</a> tool. Here is what you get with zero cost and zero sign-up:</p>
            <ul>
                <li><strong>Unlimited transfers:</strong> You can send as many files as you want, as many times per day as you need, with zero usage caps.</li>
                <li><strong>No file size limit:</strong> Whether you are sending a 100KB document or a 50GB video file, Send Anywhere imposes no artificial file size restrictions. The only limit is your internet connection's bandwidth and stability.</li>
                <li><strong>Instant P2P transfer:</strong> Files go directly from device to device using our WebRTC engine. No upload-then-download delay. The transfer starts the moment both sides connect.</li>
                <li><strong>Works on any device:</strong> The web version of <a href="index.php">Send Anywhere</a> works on any device with a modern browser — smartphone, tablet, laptop, or desktop — regardless of operating system.</li>
                <li><strong>6-digit key system:</strong> Generate a secure, temporary 6-digit key to share with your recipient. The key expires after 10 minutes, ensuring that only the intended recipient can access the transfer.</li>
                <li><strong>End-to-end encryption:</strong> All data channels are encrypted using WebRTC's built-in DTLS protocol, so your files are private and secure by default.</li>
            </ul>

            <h2 id="plus-plan-details">Who Should Choose the Send Anywhere Plus Plan?</h2>
            <p>The Plus plan is designed for professionals and frequent users who need more flexibility in how they share files. If any of the following scenarios apply to you, the Plus plan at ₹199/month is a worthwhile upgrade from the free tier:</p>

            <h3>You Share Files with Non-Technical Recipients</h3>
            <p>The 6-digit key system is efficient, but it requires the recipient to have <a href="index.php">Send Anywhere</a> open and ready to enter the key. With link-based sharing (available on Plus), you can generate a direct download link and share it via WhatsApp, email, or SMS. The recipient can download the file with a single tap, even without knowing what <a href="file-transfer">Send Anywhere</a> is.</p>

            <h3>You Need a Record of Your Transfers</h3>
            <p>The Plus plan includes a 30-day transfer history log. This is invaluable for professionals who need to track which files were sent, when, and to whom — whether for compliance, accountability, or simple convenience.</p>

            <h3>You Rely on Email for File Sharing</h3>
            <p>The Gmail add-on and Outlook add-in (available on Plus) let you share files of any size directly from your email compose window, bypassing the 25MB attachment limit. Instead of a bulky attachment, <a href="index.php">Send Anywhere</a> inserts a clean download link. This is the most seamless email file-sharing experience available.</p>

            <h2 id="india-pricing">Why Send Anywhere India Has India-Specific Pricing</h2>
            <p>Global software pricing in USD is often unaffordable for Indian users. At ₹199/month, the <strong>Send Anywhere India Plus plan</strong> is priced specifically for the Indian market — equivalent to the cost of a single coffee at a cafe. We believe that professional-grade <a href="file-transfer">file transfer</a> tools should be accessible to every Indian freelancer, student, entrepreneur, and business owner, not just those who can afford to pay in dollars.</p>

            <p>India is one of the world's fastest-growing digital economies, with hundreds of millions of smartphone users and a booming creator economy. From Bollywood video editors sending massive RAW files, to software developers transferring large codebases, to students sharing study materials — the need for fast, free, and unlimited <a href="index.php">Send Anywhere</a> file transfers is enormous. Our India-specific pricing reflects our commitment to making this tool universally accessible.</p>

            <h2 id="no-hidden-cost">No Hidden Costs — Our Promise to You</h2>
            <p>We believe in full transparency. Here is a complete list of things <strong>Send Anywhere India</strong> will never charge you for, on any plan:</p>
            <ul>
                <li>Transfer speed throttling — your connection is your speed limit, not ours</li>
                <li>File size restrictions on any plan</li>
                <li>Extra charges for cross-device transfers (Android to iPhone, PC to Mac, etc.)</li>
                <li>Charges for using the web version — it is always free</li>
                <li>Data storage fees — we never store your files</li>
                <li>Account creation fees — the core <a href="file-transfer">file transfer</a> works without an account</li>
            </ul>

            <h2 id="business-plan">The Business Plan: Built for Teams</h2>
            <p>For companies, agencies, and teams that share files as part of their daily workflow, the <a href="index.php">Send Anywhere</a> Business plan at ₹499/month provides an enterprise-grade toolset. Key features include team management (up to 10 members), a full administrative dashboard for usage oversight, compliance-ready audit logs, and white-label branding for businesses that want to present the tool under their own identity. The Business plan also includes full API access, allowing development teams to integrate <a href="file-transfer">Send Anywhere file transfer</a> directly into their own applications and workflows.</p>

            <h2 id="faq">Frequently Asked Questions About Pricing</h2>
            <div class="faq-container">
                <div class="faq-item">
                    <div class="faq-question">Is Send Anywhere really free with no file size limit?</div>
                    <div class="faq-answer">
                        Yes, completely. The core <a href="index.php">Send Anywhere</a> P2P <a href="file-transfer">file transfer</a> feature is 100% free, with no file size limit and no transfer count limit. Because files are never stored on our servers, we have no storage costs to pass on to you.
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">Do I need a credit card to start using Send Anywhere?</div>
                    <div class="faq-answer">
                        No. The free plan requires no credit card, no account, and no sign-up of any kind. Just open <a href="index.php">send-anywhere.in</a>, select your files, and share the 6-digit key with your recipient.
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">Can I cancel the Plus or Business plan at any time?</div>
                    <div class="faq-answer">
                        Yes. All paid plans are billed monthly with no long-term commitment. You can cancel at any time and your account will revert to the free plan at the end of the billing cycle. No cancellation fees apply.
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">What payment methods are accepted?</div>
                    <div class="faq-answer">
                        We accept all major Indian payment methods including UPI (Google Pay, PhonePe, Paytm), credit and debit cards (Visa, Mastercard, RuPay), net banking, and wallets. All payments are processed securely.
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">Is there a student discount?</div>
                    <div class="faq-answer">
                        Students can use the free plan of <a href="index.php">Send Anywhere</a> indefinitely — it covers all core <a href="file-transfer">file transfer</a> needs including large file sharing with no size limits. For institutional or bulk licensing, please contact us.
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Transfer Modal -->
    <div class="transfer-modal" id="transfer-modal">
        <div class="modal-content">
            <span class="modal-close" id="modal-close">&times;</span>
            <div class="modal-body">
                <h3 id="modal-title" style="margin-bottom: 15px; color: var(--primary-purple);">File Transfer</h3>
                <div id="modal-sender-view" style="display: none;">
                    <p>Share this 6-digit key with the receiver:</p>
                    <div class="pin-display" id="modal-pin-code" style="font-size: 36px; margin: 10px 0;">000 000</div>
                    <div class="countdown" id="modal-sender-status">Waiting for receiver to connect...</div>
                </div>
                <div id="modal-receiver-view" style="display: none;">
                    <p id="modal-receiver-status">Connecting to sender...</p>
                </div>
                <div class="progress-container" id="modal-progress-container" style="display: none; margin-top: 20px;">
                    <div class="progress-bar-bg">
                        <div class="progress-bar-fill" id="modal-progress-bar"></div>
                    </div>
                    <div class="progress-stats">
                        <span id="modal-percentage">0%</span>
                        <span id="modal-speed">0 KB/s</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>© <?php echo date('Y'); ?> <a href="index.php">Send Anywhere India</a> — Free P2P <a href="file-transfer">File Transfer</a> | <a href="product">Product</a> | <a href="pricing">Pricing</a></p>
        <p style="margin-top: 8px;">No cloud storage. No file size limits. 100% free and private.</p>
    </footer>

    <script>
        // FAQ Accordion
        document.querySelectorAll('.faq-question').forEach(q => {
            q.addEventListener('click', () => {
                q.parentElement.classList.toggle('active');
            });
        });

        // WebRTC Signaling (Quick Transfer Bar)
        const rtcConfig = {
            iceServers: [
                { urls: 'stun:stun.l.google.com:19302' },
                { urls: 'stun:stun1.l.google.com:19302' }
            ]
        };
        let localConnection = null, dataChannel = null, transferId = null, pollInterval = null;

        const modal = document.getElementById('transfer-modal');
        const modalClose = document.getElementById('modal-close');
        const modalTitle = document.getElementById('modal-title');
        const modalSenderView = document.getElementById('modal-sender-view');
        const modalReceiverView = document.getElementById('modal-receiver-view');
        const modalPinCode = document.getElementById('modal-pin-code');
        const modalSenderStatus = document.getElementById('modal-sender-status');
        const modalReceiverStatus = document.getElementById('modal-receiver-status');
        const modalProgressContainer = document.getElementById('modal-progress-container');
        const modalProgressBar = document.getElementById('modal-progress-bar');
        const modalPercentage = document.getElementById('modal-percentage');
        const modalSpeed = document.getElementById('modal-speed');

        function showModal() { modal.style.display = 'flex'; }
        function hideModal() { modal.style.display = 'none'; resetTransferState(); }

        modalClose.addEventListener('click', hideModal);
        modal.addEventListener('click', e => { if (e.target === modal) hideModal(); });

        function resetTransferState() {
            if (pollInterval) clearInterval(pollInterval);
            if (localConnection) localConnection.close();
            localConnection = null; dataChannel = null; transferId = null; pollInterval = null;
            modalSenderView.style.display = 'none';
            modalReceiverView.style.display = 'none';
            modalProgressContainer.style.display = 'none';
        }

        // SENDER FLOW
        document.getElementById('quick-file-input').addEventListener('change', async function () {
            const file = this.files[0];
            if (!file) return;
            resetTransferState();
            showModal();
            modalTitle.textContent = 'Sending: ' + file.name;
            modalSenderView.style.display = 'block';
            modalSenderStatus.textContent = 'Setting up connection...';

            localConnection = new RTCPeerConnection(rtcConfig);
            dataChannel = localConnection.createDataChannel('fileTransfer');

            const offer = await localConnection.createOffer();
            await localConnection.setLocalDescription(offer);

            localConnection.onicecandidate = async (event) => {
                if (event.candidate) {
                    await fetch('api/signal.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ action: 'add_candidate', transfer_id: transferId, role: 'sender', candidate: event.candidate })
                    });
                }
            };

            const res = await fetch('api/signal.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ action: 'create', sdp: offer.sdp, sdp_type: offer.type, filename: file.name, filesize: file.size })
            });
            const data = await res.json();
            if (!data.success) { alert('Failed to create session.'); hideModal(); return; }
            transferId = data.transfer_id;
            const key = data.key.toString();
            modalPinCode.textContent = key.substring(0, 3) + ' ' + key.substring(3);
            modalSenderStatus.textContent = 'Share this key. Waiting for receiver...';

            dataChannel.onopen = () => {
                modalSenderStatus.textContent = 'Connected! Sending...';
                modalProgressContainer.style.display = 'block';
                const chunkSize = 16384;
                const reader = new FileReader();
                let offset = 0;
                const startTime = Date.now();
                const readSlice = o => { reader.readAsArrayBuffer(file.slice(o, o + chunkSize)); };
                reader.onload = e => {
                    dataChannel.send(e.target.result);
                    offset += e.target.result.byteLength;
                    const pct = Math.round((offset / file.size) * 100);
                    modalProgressBar.style.width = pct + '%';
                    modalPercentage.textContent = pct + '%';
                    modalSpeed.textContent = ((offset / ((Date.now() - startTime) / 1000)) / 1024).toFixed(1) + ' KB/s';
                    if (offset < file.size) readSlice(offset);
                    else modalSenderStatus.textContent = '✅ Transfer Complete!';
                };
                readSlice(0);
            };

            pollInterval = setInterval(async () => {
                if (!transferId) return;
                const r = await fetch(`api/signal.php?action=poll&transfer_id=${transferId}&role=receiver`);
                const d = await r.json();
                if (d.answer_sdp) {
                    clearInterval(pollInterval); pollInterval = null;
                    await localConnection.setRemoteDescription({ type: 'answer', sdp: d.answer_sdp });
                    if (d.candidates) for (const c of d.candidates) await localConnection.addIceCandidate(new RTCIceCandidate(c));
                }
            }, 1500);
        });

        // RECEIVER FLOW
        document.getElementById('btn-quick-receive').addEventListener('click', async function () {
            const key = document.getElementById('quick-receive-key').value.trim();
            if (!key || key.length !== 6) { alert('Please enter a valid 6-digit key.'); return; }
            resetTransferState();
            showModal();
            modalTitle.textContent = 'Receiving File...';
            modalReceiverView.style.display = 'block';
            modalReceiverStatus.textContent = 'Looking up transfer key...';

            const res = await fetch(`api/signal.php?action=lookup&key=${key}`);
            const data = await res.json();
            if (!data.success) { alert('Invalid or expired key.'); hideModal(); return; }
            transferId = data.transfer_id;
            modalReceiverStatus.textContent = 'Connecting to sender...';

            localConnection = new RTCPeerConnection(rtcConfig);
            await localConnection.setRemoteDescription({ type: data.sdp_type, sdp: data.sdp });
            const answer = await localConnection.createAnswer();
            await localConnection.setLocalDescription(answer);

            localConnection.onicecandidate = async (event) => {
                if (event.candidate) {
                    await fetch('api/signal.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ action: 'add_candidate', transfer_id: transferId, role: 'receiver', candidate: event.candidate })
                    });
                }
            };

            await fetch('api/signal.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ action: 'answer', transfer_id: transferId, sdp: answer.sdp, sdp_type: answer.type })
            });

            if (data.candidates) for (const c of data.candidates) await localConnection.addIceCandidate(new RTCIceCandidate(c));

            let receiveBuffer = [], receivedSize = 0;
            const fileName = data.filename || 'received_file';
            const fileSize = data.filesize || 0;
            const startTime = Date.now();
            modalProgressContainer.style.display = 'block';

            localConnection.ondatachannel = (event) => {
                event.channel.onmessage = e => {
                    receiveBuffer.push(e.data);
                    receivedSize += e.data.byteLength;
                    if (fileSize > 0) {
                        const pct = Math.round((receivedSize / fileSize) * 100);
                        modalProgressBar.style.width = pct + '%';
                        modalPercentage.textContent = pct + '%';
                        modalSpeed.textContent = ((receivedSize / ((Date.now() - startTime) / 1000)) / 1024).toFixed(1) + ' KB/s';
                        if (receivedSize === fileSize) {
                            const a = document.createElement('a');
                            a.href = URL.createObjectURL(new Blob(receiveBuffer));
                            a.download = fileName;
                            a.click();
                            modalReceiverStatus.textContent = '✅ File downloaded!';
                        }
                    }
                };
            };
        });
    </script>

</body>
</html>
