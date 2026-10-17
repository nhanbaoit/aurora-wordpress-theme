# Upwork Proposal — WordPress Website Redesign (Responsive, Keep Content & URLs)

> Copy phần dưới đây vào phần cover letter khi ứng tuyển trên Upwork. Điền thông tin trong ngoặc vuông trước khi gửi.

---

Hi there,

I've read your brief carefully — refresh an outdated WordPress theme while keeping **all existing content, menus and URLs intact**, fully responsive on mobile and tablet, with clean CSS. That's exactly the kind of project I do, and I've prepared a working demo of my approach before even bidding.

**What I've already built (see attached):** "Aurora", a lightweight custom WordPress theme that demonstrates the exact scope you described:

- **New visual identity** — modern color tokens, fluid typography (`clamp()`), consistent spacing scale, all defined as CSS custom properties so the accent color is even changeable from the Customizer without touching code.
- **Redesigned key pages** — homepage (hero + post grid), content/post page, blog with sidebar, and a contact page with a working, sanitized form (nonce-protected).
- **Truly responsive** — fluid 3 → 2 → 1 column grid, hamburger navigation below 768px, tested breakpoints at 1024/768/480px, `prefers-reduced-motion` support.
- **Content untouched** — the theme only changes presentation. Permalinks, menus, posts and pages stay exactly as they are; no URL changes, no redirects needed.
- **Clean, optimized CSS** — one organized stylesheet, BEM naming, no framework, no page builder, no `!important`. I also remove unused legacy styles/theme files as part of the handover.

**How I'd run your project:**

1. Set up a staging copy of your current site (so the live site is never at risk).
2. Build the new theme against your real content and menus — you review on staging at any time.
3. Cross-device QA (phone/tablet/desktop), performance pass (image handling, minimal JS), then deploy.
4. Hand over clean code + a short guide on maintaining the new look.

I'm confident I can deliver a polished result quickly because the design system and core templates are already proven in the attached demo — your content just plugs in.

Happy to jump on a quick call or answer any questions right here. Looking forward to working with you!

Best regards,
[Tên của bạn]

---

## Attachments cần đính kèm khi ứng tuyển

1. Ảnh screenshot trang chủ demo (chụp từ file `preview/index.html` ở cả desktop và mobile viewport).
2. File theme `aurora/` (zip lại) hoặc link GitHub nếu bạn push lên repo.
3. Portfolio: link 1–2 website WordPress bạn từng làm (nếu có).

## Mẹo khi ứng tuyển

- Đặt 2–3 câu hỏi ngắn trong proposal (ví dụ: "Does the current site use a page builder like Elementor, or a classic theme?") — Upwork đánh giá cao contractor đọc kỹ yêu cầu.
- Giá đề xuất tham khảo cho phạm vi này: **800–1,200 USD**, thời gian 5–7 ngày, trọn gói (khớp ngân sách 1,750 USD của client, chừa dư địa thương lượng).
- Đề cập rõ: "no content or URL changes, staging-first workflow" — đúng 2 mối lo lớn nhất của khách.
