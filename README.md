# Evermore Sourcing

> **The Future of Opulence**

A modern and elegant corporate website for **Evermore Sourcing**, a global apparel sourcing company focused on fashion, product development, sustainability, and end-to-end support for fashion brands.

The website presents Evermore's services, product categories, sustainability commitment, company vision, global locations, and contact options through a responsive and visually focused interface.

---

## 🌐 Live Website

**Evermore Sourcing:**
https://evermorebrand.com](https://sourcing.evermorebrand.com/

---

## ✨ Features

* Modern luxury-focused website design
* Fully responsive layout
* Fashion and apparel-focused product presentation
* About Us section
* Vision & Mission section
* Sustainability section
* Sustainability commitment and material showcase
* Product category showcase
* Service / offering section
* Global locations section
* Contact form with email delivery
* Optional file attachment through contact form
* Form validation and input sanitization
* Smooth visual animations and transitions
* Mobile-friendly navigation and layout

---

## 🏢 About Evermore

Evermore is positioned as a **one-stop solution for global fashion brands**, supporting the journey from concept development to final shipment of apparel products.

The website highlights services including design support, sample development, technical support, and flexible order quantities.

### 🌍 Global Locations

* Italy
* Canada
* France
* UAE
* UK
* Bangladesh
* USA

The website provides dedicated contact options for business inquiries.

---

## ♻️ Sustainability

Sustainability is one of the core themes of the website.

The sustainability section highlights the company's commitment to sustainable materials and responsible production, including:

* BCI Cotton
* EcoVero
* TENCEL
* Refibra
* Birla Cellulose
* Recycled Polyester
* Recycled Cotton
* Organic Cotton
* World Linen

The website also communicates a long-term commitment toward increasing the use of sustainable materials.

---

## 👕 Product Categories

The website showcases different apparel and lifestyle product categories, including:

### Knitwear

* Sweater
* Cardigan
* Mini Dress
* Blouse
* T-Shirt
* Polo Shirt
* Beanies
* Scarf
* Socks
* Outerwear

### Leather

* Wallet
* Belt
* Women's Handbag
* Backpack
* Duffle Bag
* Tote Bag
* Watch Strap
* Jacket
* Blazer
* Hat
* Passport Holder

### Jute & Craft

* Tote Bag
* Backpack
* Footwear
* Storage Bin
* Table Runner
* Wall Decor
* Basket
* Lamp Shade
* Plant Hanger
* Handmade Craft Items

### Home & Decor

The product presentation is designed to communicate Evermore's ability to support different fashion and lifestyle product requirements.

---

## 🛠️ Technologies

### Frontend

* HTML5
* CSS3
* JavaScript
* Google Fonts
* Responsive CSS
* CSS animations and transitions

### Backend

* PHP
* PHP `mail()` function
* JSON responses
* Multipart email handling

---

## 📩 Contact Form

The website includes a PHP-powered contact form.

The form collects:

* Brand Name
* Name
* Email
* Phone
* Message
* Optional Attachment

The backend validates required fields and checks email format before processing the request.

### Attachment Support

Users can optionally attach a file to their inquiry.

The backend currently supports attachments up to **10 MB** and sends them as multipart email attachments.

### Email Delivery

Contact submissions are sent to:

`info@evermorebrand.com`

The backend also sets a `Reply-To` header using the sender's email address, making it easier to respond directly to inquiries.

---

## 📁 Project Structure

```text
evermore/
│
├── index.html
├── send-email.php
│
├── assets/
│   ├── images/
│   ├── icons/
│   └── fonts/
│
└── README.md
```

> The exact asset structure may vary depending on the deployment version of the project.

---

## 🚀 Getting Started

### 1. Clone the repository

```bash
git clone https://github.com/YOUR-USERNAME/evermore.git
```

### 2. Open the project

```bash
cd evermore
```

### 3. Run the frontend

Since the website uses HTML, CSS and JavaScript, the frontend can be opened directly in a browser or served through a local development server.

For example, using VS Code's Live Server extension:

```text
Right Click → Open with Live Server
```

### 4. Configure PHP

The contact form requires a PHP-enabled server.

For local development, you can use:

* XAMPP
* WAMP
* Laragon
* PHP built-in server

For production, `send-email.php` should be placed in the same directory as the website's `index.html`, as required by the current implementation.

---

## ☁️ Deployment

The website can be deployed on a PHP-compatible hosting environment such as cPanel hosting.

Basic deployment:

```text
1. Upload website files
2. Upload assets
3. Upload send-email.php
4. Keep send-email.php alongside index.html
5. Configure the hosting email environment
6. Test the contact form
```

The PHP backend returns JSON responses for successful and failed submissions, making it suitable for asynchronous form submission from the frontend.

---

## 🔐 Security Considerations

The contact handler includes several basic protections:

* POST-only request handling
* Required-field validation
* Email validation
* Header injection prevention
* HTML escaping
* Attachment size limitation
* Sanitized attachment filename

For example, newline characters are removed from user-controlled values to reduce the risk of email header injection.

---

## 🎯 Project Goals

The website was designed to:

* Establish Evermore's digital presence
* Present the company as a premium fashion sourcing partner
* Showcase apparel and lifestyle product capabilities
* Communicate sustainability initiatives
* Highlight global locations
* Provide a direct communication channel for potential clients
* Create a premium and visually engaging brand experience

---

## 🤝 Services Highlighted

* Design Support
* Sample Development
* Technical Support
* Apparel Production
* Sustainable Material Solutions
* Flexible Order Quantities
* Global Fashion Sourcing

---

## 📞 Contact

**Evermore Sourcing**

Website:
https://evermorebrand.com](https://sourcing.evermorebrand.com/

Email:

* [shawon@evermorebrand.com](mailto:shawon@evermorebrand.com)
* [mak@evermorebrand.com](mailto:mak@evermorebrand.com)

---

## 📄 License

This project is developed for **Evermore Sourcing**.

All branding, images, content, and business materials belong to their respective owners.

---
